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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id_estudiante');
            $table->string('nombre', 45);
            $table->string('apellido_p', 45);
            $table->string('apellido_m', 45);

            // foreing key columna
            $table->unsignedBigInteger('id_carrera');


            // foreing key relacion
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
