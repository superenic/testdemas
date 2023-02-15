<?php

use App\Models\ManufactureDetail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufactureDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ManufactureDetail::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Address', 250)->nullable()->default(null);
            $table->string('Address2', 250)->nullable()->default(null);
            $table->string('City', 250)->nullable()->default(null);
            $table->string('ContactEmail', 250)->nullable()->default(null);
            $table->string('ContactFax', 250)->nullable()->default(null);
            $table->string('ContactPhone', 250)->nullable()->default(null);
            $table->string('Country', 250)->nullable()->default(null);
            $table->string('DBAs', 250)->nullable()->default(null);
            $table->string('EquipmentItems', 250)->nullable()->default(null);
            $table->string('LastUpdated', 250)->nullable()->default(null);
            $table->string('Mfr_CommonName', 250)->nullable()->default(null);
            $table->string('Mfr_ID', 250)->nullable()->default(null);
            $table->string('Mfr_Name', 250)->nullable()->default(null);
            $table->string('OtherManufacturerDetails', 250)->nullable()->default(null);
            $table->string('PostalCode', 250)->nullable()->default(null);
            $table->string('PrimaryProduct', 250)->nullable()->default(null);
            $table->string('PrincipalFirstName', 250)->nullable()->default(null);
            $table->string('PrincipalLastName', 250)->nullable()->default(null);
            $table->string('PrincipalPosition', 250)->nullable()->default(null);
            $table->string('StateProvince', 250)->nullable()->default(null);
            $table->string('SubmittedName', 250)->nullable()->default(null);
            $table->string('SubmittedOn', 250)->nullable()->default(null);
            $table->string('SubmittedPosition', 250)->nullable()->default(null);
            $table->string('ManufacturerTypes', 250)->nullable()->default(null);
            $table->string('VehicleTypes', 1000)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ManufactureDetail::TABLE_NAME);
    }
}
