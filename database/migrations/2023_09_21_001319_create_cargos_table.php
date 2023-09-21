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
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id_cargo');
            $table->string('cargo',45);

            // foreing key columna estudiante
            $table->unsignedBigInteger('id_estudiante');

            // foreing key realacion estudiante
            $table->foreign('id_estudiante')
                    ->references('id_estudiante')
                    ->on('estudiantes')
                    ->onDelete('cascade');

             // foreing key columna docentes
             $table->unsignedBigInteger('id_docente');

             // foreing key realacion
             $table->foreign('id_docente')
                     ->references('id_docente')
                     ->on('docentes')
                     ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
