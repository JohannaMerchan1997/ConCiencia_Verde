<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        // Cargar las relaciones y ordenar por evento y fecha
        $registros = Registro::with(['usuario', 'evento', 'estudiante'])
            ->orderBy('codigo_evento')
            ->orderBy('fecha_registro')
            ->get();

        $usuarios = Usuario::all();
        $eventos = Evento::all();
        $estudiantes = Estudiante::all();

        return view('registros.index', compact('registros', 'usuarios', 'eventos', 'estudiantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer', 
            'codigo_usuario' => 'required|integer|exists:usuarios,id',
            'codigo_evento' => 'required|integer|exists:eventos,id',
            'codigo_estudiante' => 'required|integer|exists:estudiantes,id',
            'fecha_registro' => 'required|date',
            'carrera' => 'required|string|max:255',
            'ciclo' => 'required|string|max:255',
            'jornada_evento' => 'required|string|max:255',
            'area_asignada' => 'required|string|max:255',
        ]);

        Registro::create($request->all());

        return redirect()->route('registros.index')->with('success', 'Registro creado correctamente.');
    }

    public function destroy($id)
    {
        $registro = Registro::findOrFail($id);
        $registro->delete();

        return redirect()->route('registros.index')->with('success', 'Registro eliminado correctamente.');
    }
}









