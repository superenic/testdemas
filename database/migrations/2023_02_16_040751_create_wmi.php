<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWmi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wmi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("CommonName",250)->nullable()->default(null);
            $table->string("CreatedOn",250)->nullable()->default(null);
            $table->string("DateAvailableToPublic",250)->nullable()->default(null);
            $table->string("Make",250)->nullable()->default(null);
            $table->string("ManufacturerName",250)->nullable()->default(null);
            $table->string("ParentCompanyName",250)->nullable()->default(null);
            $table->string("URL",250)->nullable()->default(null);
            $table->string("UpdatedOn",250)->nullable()->default(null);
            $table->string("VehicleType",250)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wmi');
    }
}
