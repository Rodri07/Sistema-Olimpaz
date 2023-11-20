<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carrera'; // toma como prioridad "id_carrera"
    // tabla debil
    // carrera - facultade
    public function facultade()
    {
        // N - 1
        return $this->belongsTo(facultade::class);
    }

    // tabla fuerte
    // carreras - docentes
    public function docentes()
    {
        // 1 - N
        return $this->hasMany(docente::class);
    }

    // tabla fuerte
    // carreras - estudiantes
    public function estudiantes()
    {   // 1- 1
        return $this->hasOne(estudiante::class);
    }

    //tablas fuerte
    // carrera - eventos
    public function eventos()
    {   // N - M
        return$this->belongsToMany(evento::class);
    }


    // tabla debil
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
