@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Bienvenido al menú principal</h1>
    <p>Aquí puedes gestionar tus datos haciendo clic en las opciones:</p>

    <div class="d-flex flex-wrap gap-3">
        <a href="{{ route('roles.index') }}" class="btn btn-success">Roles</a>
        <a href="{{ route('tipo_usuarios.index') }}" class="btn btn-success">Tipo Usuarios</a>
        <a href="{{ route('tipo_eventos.index') }}" class="btn btn-success">Tipo Eventos</a>
        <a href="{{ route('usuarios.index') }}" class="btn btn-success">Usuarios</a>
        <a href="{{ route('eventos.index') }}" class="btn btn-success">Eventos</a>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-success">Estudiantes</a>
        <a href="{{ route('registros.index') }}" class="btn btn-success">Registros</a>
        
            
    </div>
</div>
@endsection


