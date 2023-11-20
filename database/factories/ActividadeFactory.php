<?php

namespace Database\Factories;

use App\Models\evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\actividade>
 */
class ActividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idEvento = evento::pluck('id_evento')->random();
        return [
            'nombre'=>$this->faker->firstName(),
            'id_evento'=>$idEvento,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
