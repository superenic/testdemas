<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manufacture extends Model
{
    use HasFactory;

    const TABLE_NAME = 'manufature';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'Country',
        'Mfr_CommonName',
        'Mfr_ID',
        'Mfr_Name',
        'VehicleTypes',
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/getallmanufacturers?format=json&page=2"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        foreach($results as $index => $item)
        {
            $results[$index]['VehicleTypes'] = json_encode($results[$index]['VehicleTypes']);
        }
        self::insert($results);
    }
}
