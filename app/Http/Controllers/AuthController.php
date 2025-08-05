<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'clave' => 'required',
        ]);

        // Buscar usuario en la tabla seccion
        $seccion = Seccion::where('usuario', $request->usuario)->first();

        if (!$seccion) {
            return back()->with('error', 'Usuario no encontrado');
        }

        // Aquí validamos la clave
        // Si guardas clave en texto plano (no recomendado), compara directo:
        if ($request->clave !== $seccion->clave) {
            return back()->with('error', 'Clave incorrecta');
        }

        // Si usas hash para guardar claves, usar Hash::check()
        // if (!Hash::check($request->clave, $seccion->clave)) {
        //     return back()->with('error', 'Clave incorrecta');
        // }

        // Guardar usuario en sesión
        session(['usuario' => $seccion->usuario]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('usuario');
        return redirect()->route('login.form');
    }
}

