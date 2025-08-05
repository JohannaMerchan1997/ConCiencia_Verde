<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_usuario',
        'codigo_evento',
        'codigo_estudiante',
        'fecha_registro',
        'carrera',
        'ciclo',
        'jornada_evento',
        'area_asignada',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario');
    }

    // Cambiado de tipoEvento a evento y TipoEvento a Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'codigo_evento');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'codigo_estudiante');
    }
}


