<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_evento'; // toma como prioridad "id_evento"

    //tablas fuerte
    //eventos - carrera
    public function carreras()
    {   // N - M
        return$this->belongsToMany(carrera::class);
    }

    //tabla fuerte
    // eventos - actividades
    public function actividades()
    {
        return $this->belongsToMany(actividade::class, 'actividad_evento', 'id_evento', 'id_actividad')->withTimestamps();
    }

    // tabla debil
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
