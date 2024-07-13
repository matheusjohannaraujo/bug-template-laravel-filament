<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /*
    https://laravel.com/docs/10.x/scheduling
    php82 artisan schedule:list
    php82 artisan schedule:run
    php82 artisan schedule:work
    */

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();->everyMinute();

        // Executa a cada 5min
        $schedule->call(function () {
            echo PHP_EOL, "Executa a cada 5min", PHP_EOL;
            echo "Start ", now()->format("d/m/Y H:i:s"), PHP_EOL;

            $actual_time = now()->subMinute(5)->format("Y-m-d H:i:s");


            echo "End ", now()->format("d/m/Y H:i:s"), PHP_EOL;
        })->everyFiveMinutes();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
