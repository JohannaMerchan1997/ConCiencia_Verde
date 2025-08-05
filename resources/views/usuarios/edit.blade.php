@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $usuario->cedula) }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ old('apellido', $usuario->apellido) }}" required>
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $usuario->correo) }}" required>
        </div>

        <div class="mb-3">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ old('celular', $usuario->celular) }}">
        </div>

        <div class="mb-3">
            <label>Género</label>
            <select name="genero" class="form-control" required>
                <option value="Masculino" {{ (old('genero', $usuario->genero) == 'Masculino') ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ (old('genero', $usuario->genero) == 'Femenino') ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ (old('genero', $usuario->genero) == 'Otro') ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de Usuario</label>
            <select name="tipo_usuario_id" class="form-control" required>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ (old('tipo_usuario_id', $usuario->tipo_usuario_id) == $tipo->id) ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role_id" class="form-control" required>
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ (old('role_id', $usuario->role_id) == $role->id) ? 'selected' : '' }}>{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
