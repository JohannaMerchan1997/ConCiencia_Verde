<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Mostrar lista de roles
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    // Mostrar un rol específico
    public function show(Rol $rol)
    {
        return view('roles.show', compact('rol'));
    }

    // Guardar nuevo rol en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
        ]);

        Rol::create($request->only('numero', 'nombre', 'tipo'));

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    // Actualizar rol en la base de datos
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'numero' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
        ]);

        $rol->update($request->only('numero', 'nombre', 'tipo'));

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    // Eliminar un rol
    public function destroy(Rol $rol)
    {
        $rol->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
}




