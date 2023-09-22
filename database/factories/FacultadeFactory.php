<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\facultade>
 */
class FacultadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' =>$this->faker->randomElement(['FACEA', 'Ingieneria']),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
