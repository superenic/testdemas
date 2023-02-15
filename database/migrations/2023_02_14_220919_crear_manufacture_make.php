<?php

use App\Models\ManufactureMake;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearManufactureMake extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ManufactureMake::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Make_ID',250)->nullable()->default(null);
            $table->string('Make_Name',250)->nullable()->default(null);
            $table->string('Mfr_Name',250)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ManufactureMake::TABLE_NAME);
    }
}
