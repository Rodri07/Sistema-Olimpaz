<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividade extends Model
{
    use HasFactory;

    // tabla debil
    // actividades - eventos
    public function eventos()
    {   // N - 1
        return $this->belongsTo(evento::class);
    }

    // tabla fuerte
    // actividades - puntajes
    public function puntajes()
    {   // 1 - 1
        return $this->hasOne(puntaje::class);
    }
}
