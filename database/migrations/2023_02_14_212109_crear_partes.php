<?php

use App\Models\Part;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPartes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Part::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('CoverLetterURL')->nullable()->default(null);
            $table->string('LetterDate')->nullable()->default(null);
            $table->integer('ManufacturerId')->nullable()->default(null);
            $table->string('ManufacturerName')->nullable()->default(null);
            $table->string('ModelYearFrom')->nullable()->default(null);
            $table->string('ModelYearTo')->nullable()->default(null);
            $table->string('Name')->nullable()->default(null);
            $table->string('Type')->nullable()->default(null);
            $table->string('URL')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Part::TABLE_NAME);
    }
}
