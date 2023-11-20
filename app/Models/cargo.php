<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cargo'; // toma como prioridad "id_cargo"

    // tabla debil
    // cargos - estudiantes
    public function estudiantes()
    {   // 1 - 1
        return $this->belongsTo(estudiante::class);
    }

    // tabla debil
    // cargos - docentes
    public function docentes()
    {   // 1 - 1
        return $this->belongsTo(docente::class);
    }

}
