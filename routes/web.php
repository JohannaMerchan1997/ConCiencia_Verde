<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\SeccionLoginController;

// Página principal pública
Route::get('/', function () {
    return view('welcome');
});

// Rutas de login y logout con tabla seccion
Route::get('/seccion/login', [SeccionLoginController::class, 'showLoginForm'])->name('seccion.login');
Route::post('/seccion/login', [SeccionLoginController::class, 'login'])->name('seccion.login.submit');
Route::post('/seccion/logout', [SeccionLoginController::class, 'logout'])->name('seccion.logout');

// Ruta para menú principal (vista con enlaces a tus tablas)
// Protegida con middleware auth:seccion
Route::get('/menu', function () {
    return view('menu');
})->name('menu')->middleware('auth:seccion');

// Rutas protegidas (solo accesibles tras login con auth:seccion)
Route::middleware(['auth:seccion'])->group(function () {
    Route::resource('tipo_eventos', TipoEventoController::class);
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('sessions', SessionController::class);
    Route::resource('registros', RegistroController::class);
    Route::resource('roles', RolController::class);
    Route::resource('tipo_usuarios', TipoUsuarioController::class);
    Route::resource('eventos', EventosController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('secciones', SeccionController::class);
});



