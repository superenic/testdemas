<?php

use App\Models\Manufacture;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearManufactura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Manufacture::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Country', 250)->nullable()->defautl(null);
            $table->string('Mfr_CommonName', 250)->nullable()->defautl(null);
            $table->string('Mfr_ID', 250)->nullable()->defautl(null);
            $table->string('Mfr_Name', 250)->nullable()->defautl(null);
            $table->string('VehicleTypes', 250)->nullable()->defautl(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Manufacture::TABLE_NAME);
    }
}
