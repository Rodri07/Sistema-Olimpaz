<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultade extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_facultad'; // para que tomo en cuenta el id_facultad
    // tabla fuerte

    // facultade - carrera
    public function carreras()
    {
        // 1 - N
        return $this->hasMany(carrera::class);
    }
}
