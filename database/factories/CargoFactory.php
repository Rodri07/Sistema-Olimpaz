<?php

namespace Database\Factories;

use App\Models\docente;
use App\Models\estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // numeros aleatorios verificando la tabla que se desea generar
        // mediane el models
        $idEstudiante = estudiante::pluck('id_estudiante')->random();
        $idDocente = docente::pluck('id_docente')->random();
        return [
            'cargo'=>$this->faker->randomElement(['Encargo del 2 Semestre', 'Encargo del 4 Semestre', 'Encargo del 6 Semestre', 'Encargo del 8 Semestre']),
            'id_estudiante'=>$idEstudiante,
            'id_docente'=>$idDocente,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
