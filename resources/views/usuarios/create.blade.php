@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}" required>
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}" required>
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
        </div>

        <div class="mb-3">
            <label>Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ old('celular') }}">
        </div>

        <div class="mb-3">
            <label>Género</label>
            <select name="genero" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Masculino" {{ old('genero')=='Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero')=='Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ old('genero')=='Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tipo de Usuario</label>
            <select name="tipo_usuario_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ old('tipo_usuario_id')==$tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role_id" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id')==$role->id ? 'selected' : '' }}>{{ $role->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
