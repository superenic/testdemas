<?php

use App\Models\make;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMake extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(make::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("Make_ID")->nullable()->default(null);
            $table->string("Make_Name", 250)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(make::TABLE_NAME);
    }
}
