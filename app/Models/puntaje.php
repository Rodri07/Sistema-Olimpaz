<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puntaje extends Model
{
    use HasFactory;

    // tabla debil
    // puntaje - actividades
    public function actividades()
    {   // 1 - 1
        return $this->belongsTo(actividade::class);
    }
}
