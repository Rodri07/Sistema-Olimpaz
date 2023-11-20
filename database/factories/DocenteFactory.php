<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idCarrera = $this->faker->numberBetween(1,10);
        return [
            'nombre'=>$this->faker->firstName(),
            'apellido_p'=>$this->faker->lastName(),
            'apellido_m'=>$this->faker->lastName(),
            'telefono'=>$this->faker->phoneNumber(),
            'id_carrera'=>$idCarrera,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
