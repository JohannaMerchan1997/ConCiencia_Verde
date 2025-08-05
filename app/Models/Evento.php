<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'fecha_evento',
        'duracion',
        'auspiciante1',
        'auspiciante2',
        'auspiciante3',
        'auspiciante4',
        'auspiciante5',
    ];
}


