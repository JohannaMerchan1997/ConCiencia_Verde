<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Rol;
use App\Models\TipoUsuario;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre exacto de la tabla
    protected $fillable = [
        'cedula', 'nombre', 'apellido', 'correo', 'celular', 'genero', 'tipo_usuario_id', 'role_id'
    ];

    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

    public function role()
    {
        return $this->belongsTo(Rol::class, 'role_id');
    }
}

