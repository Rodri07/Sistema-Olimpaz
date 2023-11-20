<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('puntajes', function (Blueprint $table) {
            $table->bigIncrements('id_puntaje');
            $table->string('lugares');
            $table->integer('puntajes');

            // foreing key columna
            $table->unsignedBigInteger('id_actividad'); // definimos columna la columna foranea que acabamos de crear

            // foreing key relacion
            $table->foreign('id_actividad')// definimos el id primario de la tabla a referenciar
                    ->references('id_actividad') // y aque tabla sera
                    ->on('actividades')// si elimina algún datos que suceda en ambas tablas
                    ->onDelete('cascade');// hora de creacion y actualizacion.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntajes');
    }
};
