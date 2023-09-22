<?php

namespace Database\Factories;

use App\Models\carrera;
use App\Models\evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evento>
 */
class EventosycarrerasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idCarrera = carrera::pluck('id_carrera')->random();
        $idEvento = evento::pluck('id_evento')->random();

        return [
            'id_carrera'=>$idCarrera,
            'id_evento'=>$idEvento,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
