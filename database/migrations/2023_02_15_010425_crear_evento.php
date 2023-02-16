<?php
use App\Models\Evento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CrearEvento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Evento::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 50)->nullable();
            $table->string('descripcion', 250)->nullable();
            $sentence = 'DROP PROCEDURE IF  EXISTS crear_evento;
            CREATE PROCEDURE crear_evento (IN nombre_in varchar(50), IN descripcion_in VARCHAR(250))
            BEGIN
                INSERT INTO eventos(nombre, descripcion) VALUES(nombre_in, descripcion_in);
            END;
            DROP PROCEDURE IF EXISTS vw_reporte;
            create view vw_reporte as
                select mf.Make_Name
                from ManufactureMake mf
                inner join make mk on mk.Make_ID=mf.Make_ID ;
            ';
            db::unprepared($sentence);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Evento::TABLE_NAME);
    }
}
