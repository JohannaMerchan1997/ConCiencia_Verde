<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:255',
            'codigo_rol' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        Session::create($request->all());

        return redirect()->route('sessions.index')->with('success', 'Sesión creada correctamente.');
    }

    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'codigo' => 'required|string|max:255',
            'codigo_rol' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Sesión actualizada correctamente.');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Sesión eliminada correctamente.');
    }
}


