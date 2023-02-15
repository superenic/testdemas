<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WmiManufacture extends Model
{
    use HasFactory;

    const TABLE_NAME = 'wmi_manufacture';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        "Country",
        "CreatedOn",
        "DateAvailableToPublic",
        "Name",
        "UpdatedOn",
        "VehicleType",
        "WMI",
        "identificador",
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/GetWMIsForManufacturer/hon?format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        foreach($results as $index=> $item)
        {
            $results[$index]['identificador'] = $item['Id'];
            unset($results[$index]['Id']);
        }
        self::insert($results);
    }
}
