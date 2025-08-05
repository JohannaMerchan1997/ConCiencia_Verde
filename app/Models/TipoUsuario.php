<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'tipo_usuario_id');
    }
}
