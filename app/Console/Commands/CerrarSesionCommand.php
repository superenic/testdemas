<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CerrarSesionCommand extends CommandDecorator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:cerrarsesion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borrar las credenciales obtenidas en grupomas:iniciarsesion';

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
        Storage::disk('vehicleAPI')->delete('usuarioId.txt');
        $this->info('se ha cerrado sesion');

        return 0;
    }
}
