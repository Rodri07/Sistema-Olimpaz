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
        Schema::create('equipo_puntaje', function (Blueprint $table) {
            $table->id(); // Puedes usar el método id() para agregar un campo ID único si es necesario

            // llaves foraneas
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_puntaje');

            // Agrega las restricciones de clave foránea
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos')->onDelete('cascade');
            $table->foreign('id_puntaje')->references('id_puntaje')->on('puntajes')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_puntaje');
    }
};
