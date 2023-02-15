<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class make extends Model
{
    use HasFactory;

    const TABLE_NAME = 'make';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'Make_ID',
        'Make_Name"',
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        self::insert($results);
    }
}
