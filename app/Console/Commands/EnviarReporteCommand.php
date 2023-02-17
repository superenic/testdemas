<?php

namespace App\Console\Commands;

use App\Mail\ReportEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EnviarReporteCommand extends CommandDecorator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'envia un reporte por correo electronico';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $correo = $this->ask('Correo electronico [nombre@gmail.com]?');
        $paquete = new ReportEmail();
        Mail::to($correo)->send($paquete);
        $this->info('Se ha enviado el correo');

        return 0;
    }
}
