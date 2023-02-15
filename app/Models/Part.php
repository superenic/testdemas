<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Part extends Model
{
    use HasFactory;
    const TABLE_NAME = 'parts';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        "CoverLetterURL",
        "LetterDate",
        "ManufacturerId",
        "ManufacturerName",
        "ModelYearFrom",
        "ModelYearTo",
        "Name",
        "Type",
        "URL",
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/GetParts?type=565&fromDate=1/1/2015&toDate=5/5/2015&format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        self::insert($results);
    }
}
