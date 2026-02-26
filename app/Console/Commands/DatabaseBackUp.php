<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;

class DatabaseBackUp extends Command
{
    protected $signature = 'database:backup {--keep=7}';
    protected $description = 'Database Backup Command';

    public function handle()
    {
        $connection = config('database.default');
        $dbConfig = config("database.connections.$connection");

        if (($dbConfig['driver'] ?? null) !== 'mysql') {
            $this->error('Only MySQL is supported.');
            return 1;
        }

        $host = $dbConfig['host'] ?? '127.0.0.1';
        $port = $dbConfig['port'] ?? 3306;
        $database = $dbConfig['database'];
        $username = $dbConfig['username'];
        $password = $dbConfig['password'];

        $dir = 'backup';
        Storage::disk('local')->makeDirectory($dir);

        $filename = 'backup-' . Carbon::now()->format('Y-m-d_His') . '.sql.gz';
        $absolutePath = Storage::disk('local')->path("$dir/$filename");

        $this->info("Creating backup...");

        $command = sprintf(
            'mysqldump --single-transaction --quick --routines --triggers --events --column-statistics=0 -h%s -P%s -u%s %s | gzip -c > %s',
            escapeshellarg($host),
            escapeshellarg($port),
            escapeshellarg($username),
            escapeshellarg($database),
            escapeshellarg($absolutePath)
        );

        $process = Process::fromShellCommandline($command, base_path(), [
            'MYSQL_PWD' => (string) $password,
        ]);

        $process->setTimeout(900);
        $process->run();

        if (! $process->isSuccessful()) {
            if (File::exists($absolutePath)) {
                File::delete($absolutePath);
            }

            $this->error("Backup failed:");
            $this->error($process->getErrorOutput());
            return 1;
        }

        $this->info("Backup saved to storage/app/backup/$filename");

        $this->cleanupOldBackups(
            Storage::disk('local')->path($dir),
            (int) $this->option('keep')
        );

        return 0;
    }

    private function cleanupOldBackups(string $directory, int $days)
    {
        if ($days <= 0 || !File::isDirectory($directory)) {
            return;
        }

        $cutoff = now()->subDays($days)->getTimestamp();

        foreach (File::files($directory) as $file) {
            if ($file->getMTime() < $cutoff) {
                File::delete($file->getPathname());
            }
        }

        $this->info("Old backups older than {$days} days removed.");
    }
}
