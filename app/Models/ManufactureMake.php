<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManufactureMake extends Model
{
    use HasFactory;

    const TABLE_NAME = 'ManufactureMake';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'Make_ID',
        'Make_Name"',
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/GetMakeForManufacturer/honda?format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        self::insert($results);
    }
}
