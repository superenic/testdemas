<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CrearUsuarioCommand extends CommandDecorator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:crearusuario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un usuario solo para identificar la contraña sera password';

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
        $nombreDeUsuario = $this->ask('Que nombre le pondremos al usuario?');
        $correo = $this->ask('Nombre de correo electronico?');
        $user = User::factory()->make();
        $user->name =$nombreDeUsuario;
        $user->email = $correo;
        $user->save();

        return 0;
    }
}
