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
        Schema::create('carrera_evento', function (Blueprint $table) {
            $table->bigIncrements('id');

            // foreing key columnas
            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_evento');

            // foreing key relacion
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');
            $table->foreign('id_evento')->references('id_evento')->on('eventos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrera_evento');
    }
};
