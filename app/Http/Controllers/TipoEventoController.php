<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    public function index()
    {
        $tipo_eventos = TipoEvento::all();
        return view('tipo_eventos.index', compact('tipo_eventos'));
    }

    public function create()
    {
        return view('tipo_eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        TipoEvento::create($request->all());

        return redirect()->route('tipo_eventos.index')->with('success', 'Tipo de evento creado correctamente.');
    }

    public function edit(TipoEvento $tipo_evento)
    {
        return view('tipo_eventos.edit', compact('tipo_evento'));
    }

    public function update(Request $request, TipoEvento $tipo_evento)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipo_evento->update($request->all());

        return redirect()->route('tipo_eventos.index')->with('success', 'Tipo de evento actualizado correctamente.');
    }

    public function destroy(TipoEvento $tipo_evento)
    {
        $tipo_evento->delete();

        return redirect()->route('tipo_eventos.index')->with('success', 'Tipo de evento eliminado correctamente.');
    }
}

