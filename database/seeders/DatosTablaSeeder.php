<?php

namespace Database\Seeders;

use App\Models\actividade;
use App\Models\cargo;
use App\Models\carrera;
use App\Models\docente;
use App\Models\estudiante;
use App\Models\evento;
use App\Models\eventosycarreras;
use App\Models\facultade;
use App\Models\puntaje;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use Spatie\Permission\Contracts\Role;

class DatosTablaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        facultade::factory(5)->create();
        carrera::factory(10)->create();
        estudiante::factory(30)->create();
        docente::factory(20)->create();
        cargo::factory(8)->create();
        evento::factory(8)->create();
        eventosycarreras::factory(8)->create();
        actividade::factory(8)->create();
        puntaje::factory(20)->create();

        //$this->call(DatabaseSeeder::class);
        $this->call(RoleSeeder::class);
        //$this->call(UserSeeder::class);

    }
}
