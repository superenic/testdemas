<?php
namespace App\Console\Commands;

use App\Models\User;
use App\Models\Evento;
use Illuminate\Console\Command;

abstract class CommandDecorator extends Command
{
    public function log($descripcion, $name)
    {
        $userId = User::inicioSesionPorComando();
        $evento = new Evento();
        $evento->nombre = $name;
        $evento->descripcion = $descripcion;
        $evento->userId = $userId;
        $evento->save();
    }

    public function info($string, $verbosity = null)
    {
        parent::info($string, $verbosity);
        $userId = User::inicioSesionPorComando();
        $evento = new Evento();
        $evento->nombre = $verbosity;
        $evento->descripcion = $string;
        $evento->userId = $userId;
        $evento->save();
    }
}