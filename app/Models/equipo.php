<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_equipo';

    // tabla fuerte
    public function carreras()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    // tabla fuerte
    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }

    // tabla fuerte
    public function actividades() {
        return $this->belongsTo(actividade::class, 'id_actividad');
    }

    //tablaa fuerte
    public function puntajes()
    {
        return $this->belongsToMany(puntaje::class, 'equipo_puntaje', 'id_equipo', 'id_puntaje')->withTimestamps();
    }

    //tabla fuerte
    public function facultades()
    {
        return $this->belongsTo(facultade::class, 'id_facultad');
    }

    // Tabla fuerte
    public function estudiantes()
    {
        return $this->belongsToMany(estudiante::class, 'equipo_estudiante', 'id_equipo', 'id_estudiante')->withTimestamps();
    }
}
