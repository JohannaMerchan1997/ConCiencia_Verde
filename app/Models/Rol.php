<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';  // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre', 'tipo'];  // Campos que se pueden asignar masivamente
}

