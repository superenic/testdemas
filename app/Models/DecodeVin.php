<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DecodeVin extends Model
{
    use HasFactory;

    const TABLE_NAME = 'decodevin';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'Value',
        'ValueId',
        'Variable',
        'VariableId',
    ];

    public static function fetchFlat()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvalues/5UXWX7C5*BA?format=json&modelyear=2011"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        Storage::disk('vehicleAPI')->put('decodevin.json', json_encode($results));
    }

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/5UXWX7C5*BA?format=json&modelyear=2011"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        self::insert($results);
    }
}
