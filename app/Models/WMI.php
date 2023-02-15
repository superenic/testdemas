<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WMI extends Model
{
    use HasFactory;

    public static function fetchFlat()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/decodewmi/1FD?format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        Storage::disk('vehicleAPI')->put('wmi.json', json_encode($results));
    }
}
