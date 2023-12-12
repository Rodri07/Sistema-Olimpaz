<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividade extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_actividad'; // toma como prioridad "id_actividad"
    protected $fillable = ['nombre'];
    // tabla debil
    // actividades - eventos
    public function eventos()
    {
        return $this->belongsToMany(evento::class, 'actividad_evento','id_actividad','id_evento')->withTimestamps();
    }

    // tabla fuerte
    public function puntajes()
    {
        return $this->hasMany(puntaje::class, 'id_actividad', 'id_actividad');
    }

    // tabla debil
    public function equipos() {
        return $this->hasMany(equipo::class);
    }
}
