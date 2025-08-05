<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\TipoUsuario;
use App\Models\Rol;  // Cambiar Role por Rol
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $roles = Rol::all();        // Cambiar Role por Rol
        $tipos = TipoUsuario::all();

        return view('usuarios.index', compact('usuarios', 'roles', 'tipos'));
    }

    public function create()
    {
        $roles = Rol::all();        // Cambiar Role por Rol
        $tipos = TipoUsuario::all();
        return view('usuarios.create', compact('roles', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios',
            'genero' => 'required',
            'tipo_usuario_id' => 'required|exists:tipo_usuarios,id',
            'role_id' => 'required|exists:roles,id',  // Nota: Aquí el campo puede seguir llamándose role_id si así está en la BD
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario creado correctamente.');
    }

    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();        // Cambiar Role por Rol
        $tipos = TipoUsuario::all();
        return view('usuarios.edit', compact('usuario', 'roles', 'tipos'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email|unique:usuarios,correo,'.$usuario->id,
            'genero' => 'required',
            'tipo_usuario_id' => 'required|exists:tipo_usuarios,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuario eliminado correctamente.');
    }
}



