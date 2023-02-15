<?php

namespace App\Models;

use App\service\VehicleService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManufactureDetail extends Model
{
    use HasFactory;

    const TABLE_NAME = 'manufacture_detail';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'Address',
        'Address2',
        'City',
        'ContactEmail',
        'ContactFax',
        'ContactPhone',
        'Country',
        'DBAs',
        'EquipmentItems',
        'LastUpdated',
        'Mfr_CommonName',
        'Mfr_ID',
        'Mfr_Name',
        'OtherManufacturerDetails',
        'PostalCode',
        'PrimaryProduct',
        'PrincipalFirstName',
        'PrincipalLastName',
        'PrincipalPosition',
        'StateProvince',
        'SubmittedName',
        'SubmittedOn',
        'SubmittedPosition',
        'ManufacturerTypes',
        'VehicleTypes',
    ];

    public static function fetch()
    {
        $service = new VehicleService();
        $response = $service->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/getmanufacturerdetails/honda?format=json"
        );
        $respuesta = json_decode($response->getBody(), true);
        $results = $respuesta["Results"];
        foreach($results as $index => $item)
        {
            $results[$index]['EquipmentItems'] = json_encode($results[$index]['EquipmentItems']);
            $results[$index]['ManufacturerTypes'] = json_encode($results[$index]['ManufacturerTypes']);
            $results[$index]['VehicleTypes'] = json_encode($results[$index]['VehicleTypes']);
        }
        self::insert($results);
    }
}
