<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class IniciarSesionCommand extends CommandDecorator
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grupomas:iniciarsesion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cree una simulacion de inicio de sesion, para identicarlo en las peticiones';

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
        $correo = $this->ask('correo electronico?');
        $contrasena = $this->secret('contrasena [password]?');
        if (Auth::attempt(['email' => $correo, 'password' => $contrasena])) {
            $user = User::where(['email' => $correo])->first();
            $userId = $user->id;
            Storage::disk('vehicleAPI')->put('usuarioId.txt', $userId);
            $this->info('se ha iniciado sesion como ' .$correo);
        } else {
            $user = User::first();
            if (!$user) {
                $this->info('la tabla de usuarios esta vacia se debe crear un usuario un usuario');
                $user = User::factory()->make();
                $user->name = 'Ernesto';
                $user->email = 'enic.isordia@gmail.com';
                $user->save();
            }
            $this->info('no se inicio sesion porfavor intente con la contraseña: "password" usuario: '.$user->email);
        }

        return 0;
    }
}
