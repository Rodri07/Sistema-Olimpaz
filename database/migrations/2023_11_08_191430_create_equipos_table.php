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
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id_equipo');
            $table->string('nombre');

              // foreing key columna
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_actividad');
            $table->unsignedBigInteger('id_puntaje');

              // foreing key relacion
            $table->foreign('id_facultad')->references('id_facultad')->on('facultades')->onDelete('cascade');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_evento')->references('id_evento')->on('eventos')->onDelete('cascade');
            $table->foreign('id_actividad')->references('id_actividad')->on('actividades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
