<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;

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
}
