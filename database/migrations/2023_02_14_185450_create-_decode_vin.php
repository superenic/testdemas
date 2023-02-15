<?php

use App\Models\DecodeVin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecodeVin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DecodeVin::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Value', 250)->nullable()->default(null);
            $table->string('ValueId', 250)->nullable()->default(null);
            $table->string('Variable', 250)->nullable()->default(null);
            $table->integer('VariableId')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(DecodeVin::TABLE_NAME);
    }
}
