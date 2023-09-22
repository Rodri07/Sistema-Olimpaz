<?php

namespace Database\Seeders;

use App\Models\cargo;
use App\Models\carrera;
use App\Models\docente;
use App\Models\estudiante;
use App\Models\evento;
use App\Models\eventosycarreras;
use App\Models\facultade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatosTablaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        facultade::factory(3)->create();
        carrera::factory(8)->create();
        estudiante::factory(8)->create();
        docente::factory(8)->create();
        cargo::factory(8)->create();
        evento::factory(8)->create();
        eventosycarreras::factory(4)->create();
    }
}
