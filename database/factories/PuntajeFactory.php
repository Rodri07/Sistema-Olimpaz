<?php

namespace Database\Factories;

use App\Models\actividade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\puntaje>
 */
class PuntajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idActividad = actividade::pluck('id_actividad')->random();

        return [
            'primero'=>$this->faker->randomElement(['3000', '4500', '3000']),
            'segundo'=>$this->faker->randomElement(['2550', '3825']),
            'tercero'=>$this->faker->randomElement(['2100', '3150']),
            'participacion'=>$this->faker->randomElement(['1800', '2700', '1800']),
            'puntaje_extra'=>$this->faker->randomElement(['1000']),
            'id_actividad'=>$idActividad,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
