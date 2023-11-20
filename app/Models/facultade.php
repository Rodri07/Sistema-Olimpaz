<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultade extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_facultad'; // toma como prioridad "id_facultad"
    // tabla fuerte

    // facultade - carrera
    public function carreras()
    {
        // 1 - N
        return $this->hasMany(carrera::class);
    }

    // tabla debil
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_facultad');
    }
}
