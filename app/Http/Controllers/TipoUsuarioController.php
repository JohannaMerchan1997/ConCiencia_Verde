<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Mostrar listado de tipos de usuario
     */
    public function index()
    {
        $tipos = TipoUsuario::all();
        return view('tipo_usuarios.index', compact('tipos'));
    }

    /**
     * Mostrar formulario para crear un nuevo tipo de usuario
     */
    public function create()
    {
        return view('tipo_usuarios.create');
    }

    /**
     * Guardar un nuevo tipo de usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:tipo_usuarios,nombre',
        ]);

        TipoUsuario::create($request->all());

        return redirect()->route('tipo_usuarios.index')
            ->with('success', 'Tipo de usuario creado correctamente.');
    }

    /**
     * Mostrar formulario para editar un tipo de usuario existente
     */
    public function edit(TipoUsuario $tipoUsuario)
    {
        return view('tipo_usuarios.edit', compact('tipoUsuario'));
    }

    /**
     * Actualizar el tipo de usuario
     */
    public function update(Request $request, TipoUsuario $tipoUsuario)
    {
        $request->validate([
            'nombre' => 'required|unique:tipo_usuarios,nombre,' . $tipoUsuario->id,
        ]);

        $tipoUsuario->update($request->all());

        return redirect()->route('tipo_usuarios.index')
            ->with('success', 'Tipo de usuario actualizado correctamente.');
    }

    /**
     * Eliminar un tipo de usuario
     */
    public function destroy(TipoUsuario $tipoUsuario)
    {
        $tipoUsuario->delete();

        return redirect()->route('tipo_usuarios.index')
            ->with('success', 'Tipo de usuario eliminado correctamente.');
    }
}

