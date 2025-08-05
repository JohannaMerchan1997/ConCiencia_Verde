@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Evento</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $evento->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label>Fecha del Evento</label>
            <input type="date" name="fecha_evento" class="form-control" value="{{ old('fecha_evento', $evento->fecha_evento->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label>Duración</label>
            <input type="text" name="duracion" class="form-control" value="{{ old('duracion', $evento->duracion) }}" required>
        </div>

        <div class="mb-3">
            <label>Auspiciante 1</label>
            <input type="text" name="auspiciante1" class="form-control" value="{{ old('auspiciante1', $evento->auspiciante1) }}">
        </div>

        <div class="mb-3">
            <label>Auspiciante 2</label>
            <input type="text" name="auspiciante2" class="form-control" value="{{ old('auspiciante2', $evento->auspiciante2) }}">
        </div>

        <div class="mb-3">
            <label>Auspiciante 3</label>
            <input type="text" name="auspiciante3" class="form-control" value="{{ old('auspiciante3', $evento->auspiciante3) }}">
        </div>

        <div class="mb-3">
            <label>Auspiciante 4</label>
            <input type="text" name="auspiciante4" class="form-control" value="{{ old('auspiciante4', $evento->auspiciante4) }}">
        </div>

        <div class="mb-3">
            <label>Auspiciante 5</label>
            <input type="text" name="auspiciante5" class="form-control" value="{{ old('auspiciante5', $evento->auspiciante5) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
