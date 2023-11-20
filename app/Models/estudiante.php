<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_estudiante'; // toma como prioridad "id_estudiante"

    protected $fillable =[
        'nombre',
        'apellido_p',
        'apellido_m',
        'id_carrera',
    ];

    // tabla debil
    // estudiante - carreas
    public function carreras()
    {   // 1 - 1
        return $this->belongsTo(carrera::class);
    }

    // tabla fuerte
    // estudiantes - cargos
    public function cargos(){
        // 1 - 1
        return $this->hasOne(cargo::class);
    }

    // tabla fuerte
    public function equipos()
    {
        return $this->belongsToMany(equipo::class, 'equipo_estudiante', 'id_equipo', 'id_estudiante')->withTimestamps();
    }
}

