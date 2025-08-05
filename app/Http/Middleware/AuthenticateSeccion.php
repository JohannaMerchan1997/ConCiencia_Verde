<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSeccion
{
    public function handle(Request $request, Closure $next, $guard = 'seccion')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('seccion.login');
        }

        return $next($request);
    }
}


