<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncFromPrimary extends Command
{
    protected $signature = 'db:sync
                            {server : Primary server base URL}
                            {--token= : Primary server token}
                            {--keep : Keep downloaded backup file}';

    protected $description = 'Download latest DB dump from primary and import immediately (no Guzzle)';

    public function handle(): int
    {
        $server = rtrim($this->argument('server'), '/');
        $token = $this->option('token') ?? env('PRIMARY_BACKUP_TOKEN');

        // if (!$token) {
        //     $this->error('Token required.');
        //     return self::FAILURE;
        // }

        $latestUrl = "{$server}/api/db/latest?token={$token}";

        $this->info("Fetching latest backup info...");

        $latestResponse = $this->curlGet($latestUrl);
        if (!$latestResponse) {
            $this->error('Failed to fetch latest backup info.');
            return self::FAILURE;
        }

        $json = json_decode($latestResponse, true);
        $downloadUrl = $json['download_url'] ?? null;

        if (!$downloadUrl) {
            $this->error('Download URL missing.');
            return self::FAILURE;
        }

        $filename = basename(parse_url($downloadUrl, PHP_URL_PATH));

        $localDir = 'backup';
        Storage::disk('local')->makeDirectory($localDir);
        $localPath = Storage::disk('local')->path("{$localDir}/{$filename}");

        $this->info("Downloading latest dump...");

        if (!$this->curlDownloadToFile($downloadUrl, $localPath)) {
            $this->error('Download failed.');
            return self::FAILURE;
        }

        $this->info("Download complete.");

        $this->info("Importing into local database...");

        if (!$this->importGzToMysql($localPath)) {
            $this->error("Import failed.");
            return self::FAILURE;
        }

        $this->info("Database imported successfully.");

        if (!$this->option('keep')) {
            @unlink($localPath);
            $this->info("Temporary backup removed.");
        }

        return self::SUCCESS;
    }

    private function curlGet(string $url): ?string
    {
        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            $this->error("cURL error: $error");
            return null;
        }

        return $response;
    }

    private function curlDownloadToFile(string $url, string $filePath): bool
    {
        $fp = fopen($filePath, 'w');
        if (!$fp) {
            $this->error('Cannot write to local file.');
            return false;
        }

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_FILE => $fp,
            CURLOPT_TIMEOUT => 1800,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);

        $success = curl_exec($ch);
        $error = curl_error($ch);

        curl_close($ch);
        fclose($fp);

        if (!$success || $error) {
            $this->error("cURL download error: $error");
            @unlink($filePath);
            return false;
        }

        return true;
    }

    private function importGzToMysql(string $gzFile): bool
    {
        $connection = config('database.default');
        $cfg = config("database.connections.$connection");

        if (($cfg['driver'] ?? null) !== 'mysql') {
            $this->error('Only MySQL supported.');
            return false;
        }

        $mysqlBin = env('MYSQL_BIN', 'mysql');

        $gz = gzopen($gzFile, 'rb');
        if (!$gz) {
            $this->error('Could not open gzip file.');
            return false;
        }

        $cmd = [
            $mysqlBin,
            "-h{$cfg['host']}",
            "-P{$cfg['port']}",
            "-u{$cfg['username']}",
            $cfg['database'],
        ];

        $descriptors = [
            0 => ['pipe', 'w'],
            1 => ['pipe', 'r'],
            2 => ['pipe', 'r'],
        ];

        $env = $_ENV;
        $env['MYSQL_PWD'] = $cfg['password'];

        $proc = proc_open($cmd, $descriptors, $pipes, base_path(), $env);

        if (!is_resource($proc)) {
            gzclose($gz);
            return false;
        }

        while (!gzeof($gz)) {
            fwrite($pipes[0], gzread($gz, 1024 * 1024));
        }

        fclose($pipes[0]);
        gzclose($gz);

        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[1]);
        fclose($pipes[2]);

        $exit = proc_close($proc);

        if ($exit !== 0) {
            $this->error("MySQL error: $stderr");
            return false;
        }

        return true;
    }
}
