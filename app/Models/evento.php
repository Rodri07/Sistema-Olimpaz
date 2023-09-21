<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    use HasFactory;


    //tablas fuerte
    //eventos - carrera
    public function carreras()
    {   // N - M
        return$this->belongsToMany(carrera::class);
    }

    //tabla fuerte
    // eventos - actividades
    public function actividades(){
        // 1 - N
        return $this->hasMany(actividade::class);
    }
}
