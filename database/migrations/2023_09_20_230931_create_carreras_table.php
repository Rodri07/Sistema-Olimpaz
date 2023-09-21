<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // N
    public function up(): void
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('id_carrera');
            $table->string('nombre',45);

            //foreing key columna
            $table->unsignedBigInteger('id_facultad');

            //foreing key columna relacion
            $table->foreign('id_facultad')
                    ->references('id_facultad')
                    ->on('facultades')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
