@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tipo de Usuario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tipo_usuarios.update', $tipo_usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $tipo_usuario->nombre) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tipo_usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
