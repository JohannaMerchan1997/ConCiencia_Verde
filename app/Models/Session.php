<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';  // nombre de la tabla en plural, por convención

    protected $fillable = [
        'codigo',
        'codigo_rol',
        'clave',
        'estado',
    ];
}






