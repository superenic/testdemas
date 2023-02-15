<?php

use App\Models\WmiManufacture;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWmiManufacture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(WmiManufacture::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("Country",250)->nullable()->default(null);
            $table->date("CreatedOn",250)->nullable()->default(null);
            $table->string("DateAvailableToPublic",250)->nullable()->default(null);
            $table->string("Name",250)->nullable()->default(null);
            $table->date("UpdatedOn",250)->nullable()->default(null);
            $table->string("VehicleType",250)->nullable()->default(null);
            $table->string("WMI",250)->nullable()->default(null);
            $table->integer('identificador')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(WmiManufacture::TABLE_NAME);
    }
}
