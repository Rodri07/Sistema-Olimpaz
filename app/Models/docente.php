<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_docente'; // toma como prioridad "id_docente"

    // tabla debil
    // docentes - carreras
    public function carreras(){
        // N - 1
        return $this->belongsTo(carrera::class);
    }

    // tabla fuerte
    // docentes - cargos
    public function cargos()
    {   // 1 - 1
        return $this->hasOne(cargo::class);
    }
}
