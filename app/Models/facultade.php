<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facultade extends Model
{
    use HasFactory;

    // tabla fuerte

    // facultade - carrera
    public function carreras()
    {
        // 1 - N
        return $this->hasMany(carrera::class);
    }
}
