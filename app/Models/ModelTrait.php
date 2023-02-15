<?php
namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTrait extends Model
{
    protected $url = "";
    protected $adaptador = null;

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            $this->url
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        if ($this->adaptador !== null)
        {
            $results = $this->adaptador($results);
        }
        
        self::insert($results);
    }
}