<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_puntaje'; // toma como prioridad "id_puntaje"

    // tabla debil
    // puntaje - actividades
    public function actividades()
    {   // 1 - 1
        return $this->belongsTo(actividade::class);
    }

    // tabla fuerte
    public function equipos(){
        return $this->belongsToMany(equipo::class, 'equipo_puntaje', 'id_equipo', 'id_puntaje');
    }
}
