<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Carbon\Carbon;

class PrimaryBackupController extends Controller
{
    private function validateToken(Request $request): void
    {
        $token = (string) $request->query('token', '');
        abort_unless(
            hash_equals((string) env('PRIMARY_BACKUP_TOKEN'), $token),
            403,
            'Unauthorized'
        );
    }

    /**
     * Generate new backup
     */
    public function generate(Request $request)
    {
        $this->validateToken($request);

        $connection = config('database.default');
        $cfg = config("database.connections.$connection");

        if (($cfg['driver'] ?? null) !== 'mysql') {
            abort(500, 'Only MySQL supported');
        }

        $dir = 'backup';
        Storage::disk('local')->makeDirectory($dir);

        $filename = 'backup-' . Carbon::now()->format('Y-m-d_His') . '.sql.gz';
        $absolutePath = Storage::disk('local')->path("$dir/$filename");

        $cmd = sprintf(
            'mysqldump --single-transaction --quick --routines --triggers --events --column-statistics=0 -h%s -P%s -u%s %s | gzip -c > %s',
            escapeshellarg($cfg['host'] ?? '127.0.0.1'),
            escapeshellarg($cfg['port'] ?? 3306),
            escapeshellarg($cfg['username']),
            escapeshellarg($cfg['database']),
            escapeshellarg($absolutePath)
        );

        $process = Process::fromShellCommandline($cmd, base_path(), [
            'MYSQL_PWD' => (string) $cfg['password'],
        ]);

        $process->setTimeout(900);
        $process->run();

        if (!$process->isSuccessful()) {
            if (File::exists($absolutePath)) {
                File::delete($absolutePath);
            }
            abort(500, $process->getErrorOutput());
        }

        return response()->json([
            'success' => true,
            'filename' => $filename,
            'download_url' => url("/api/db/download/$filename?token=" . env('PRIMARY_BACKUP_TOKEN'))
        ]);
    }

    /**
     * Return latest backup info
     */
    public function latest(Request $request)
    {
        $this->validateToken($request);

        $dir = Storage::disk('local')->path('backup');

        if (!File::exists($dir)) {
            abort(404, 'No backup directory found');
        }

        $files = collect(File::files($dir))
            ->filter(fn($file) => str_ends_with($file->getFilename(), '.sql.gz'))
            ->sortByDesc(fn($file) => $file->getMTime())
            ->values();

        if ($files->isEmpty()) {
            abort(404, 'No backups available');
        }

        $latestFile = $files->first()->getFilename();

        return response()->json([
            'success' => true,
            'filename' => $latestFile,
            'download_url' => url("/api/db/download/$latestFile?token=" . env('PRIMARY_BACKUP_TOKEN'))
        ]);
    }

    /**
     * Download specific backup
     */
    public function download(Request $request, $filename)
    {
        $this->validateToken($request);

        $path = "backup/$filename";

        abort_unless(Storage::disk('local')->exists($path), 404);

        return response()->download(
            Storage::disk('local')->path($path),
            $filename,
            ['Content-Type' => 'application/gzip']
        );
    }
}
