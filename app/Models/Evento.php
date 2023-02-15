<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Model
{
    use HasFactory;

    const TABLE_NAME = 'evento';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name',
        'descripcion"',
    ];

    public function save($model = [])
    {
        parent::save($model);

        // $este = $this;
        // if (!empty($model)) {
        //     $este = $model;
        // }
        // $nombre = $este->nombre;
        // $descripcion =  $este->descripcion;
        // DB::select(DB::raw('exec crear_evento(:Param1, :Param2);'), [
        //     ':Param1' => $nombre,
        //     ':Param2' => $descripcion,
        // ]);
        // DB::select('exec crear_evento "'.$nombre.'", "'.$descripcion.'"');
    }
}
