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
        Schema::create('actividad_evento', function (Blueprint $table) {
            $table->id();

             // llaves foraneas
             $table->unsignedBigInteger('id_actividad');
             $table->unsignedBigInteger('id_evento');

             // Agrega las restricciones de clave foránea
             $table->foreign('id_actividad')->references('id_actividad')->on('actividades')->onDelete('cascade');
             $table->foreign('id_evento')->references('id_evento')->on('eventos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividad_evento');
    }
};
