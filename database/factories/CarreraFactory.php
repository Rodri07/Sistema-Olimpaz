<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idFacultad = $this->faker->numberBetween(1,3);

        return [

            'nombre'=>$this->faker->randomElement(['Sistemas', ' Redes', 'Ambiental', 'Comercial','Contabilidad']),
            'id_facultad' => $idFacultad,
            'created_at'=>now(),
            'updated_at'=>now(),

        ];
    }
}
