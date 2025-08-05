<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_evento' => 'required|date',
            'duracion' => 'required|string|max:255',
            'auspiciante1' => 'nullable|string|max:255',
            'auspiciante2' => 'nullable|string|max:255',
            'auspiciante3' => 'nullable|string|max:255',
            'auspiciante4' => 'nullable|string|max:255',
            'auspiciante5' => 'nullable|string|max:255',
        ]);

        Evento::updateOrCreate(
            ['id' => $request->id],
            $request->only([
                'nombre',
                'fecha_evento',
                'duracion',
                'auspiciante1',
                'auspiciante2',
                'auspiciante3',
                'auspiciante4',
                'auspiciante5',
            ])
        );

        return redirect()->route('eventos.index')->with('success', 'Evento guardado correctamente');
    }

    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado correctamente');
    }
}


