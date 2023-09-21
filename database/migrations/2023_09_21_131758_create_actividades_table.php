<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id_actividad'); // id auto incremental
            $table->string('nombre'); // calumna de cadena

            // foreing key columna
            $table->unsignedBigInteger('id_evento'); // columna foranea

            // foreing key relacion
            $table->foreign('id_evento') // definimos columna la columna foranea que acabamos de crear
                    ->references('id_evento') // definimos el id primario de la tabla a referenciar
                    ->on('eventos') // y aque tabla sera
                    ->onDelete('cascade'); // si elimina algún datos que suceda en ambas tablas

            $table->timestamps(); // hora de creacion y actualizacion.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
