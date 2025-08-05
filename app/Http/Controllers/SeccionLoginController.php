<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeccionLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('seccion.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('usuario', 'password');

        if (Auth::guard('seccion')->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigir a /menu después del login
            return redirect()->intended('/menu');
        }

        return back()->withErrors([
            'usuario' => 'Credenciales incorrectas.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('seccion')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir a la página welcome (raíz)
        return redirect('/');
    }
}











