<?php

namespace App\Console;

use App\Console\Commands\FetchApiCommand;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\CrearReportesCommand;
use App\Console\Commands\EnviarReporteCommand;
use App\Console\Commands\IniciarSesionCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        FetchApiCommand::class,
        CrearReportesCommand::class,
        EnviarReporteCommand::class,
        IniciarSesionCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
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
