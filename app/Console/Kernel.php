<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
         // ✅ Daily database backup at midnight


    // // ✅ Clear Telescope entries every 5 minutes
    // $schedule->command('telescope:clear')
    //     ->everyFiveMinutes()
    //     ->runInBackground();

    // // ✅ Prune old Telescope entries (older than 24 hours)
    // $schedule->command('telescope:prune --hours=24')
    //     ->everyFiveMinutes()
    //     ->runInBackground();
    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          $schedule->command('database:backup --keep=7')
        ->dailyAt('00:00')
        ->withoutOverlapping()
        ->runInBackground();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
