@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Registro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registros.update', $registro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Código Usuario</label>
            <input type="number" name="user_id" class="form-control" value="{{ old('user_id', $registro->user_id) }}" required>
        </div>
        <div class="mb-3">
            <label for="tipo_evento_id" class="form-label">Código Evento</label>
            <input type="number" name="tipo_evento_id" class="form-control" value="{{ old('tipo_evento_id', $registro->tipo_evento_id) }}" required>
        </div>
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Código Estudiante</label>
            <input type="number" name="estudiante_id" class="form-control" value="{{ old('estudiante_id', $registro->estudiante_id) }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" class="form-control" value="{{ old('fecha_registro', $registro->fecha_registro) }}" required>
        </div>
        <div class="mb-3">
            <label for="carrera" class="form-label">Carrera</label>
            <input type="text" name="carrera" class="form-control" value="{{ old('carrera', $registro->carrera) }}" required>
        </div>
        <div class="mb-3">
            <label for="ciclo" class="form-label">Ciclo</label>
            <input type="text" name="ciclo" class="form-control" value="{{ old('ciclo', $registro->ciclo) }}" required>
        </div>
        <div class="mb-3">
            <label for="jornada_evento" class="form-label">Jornada de Evento</label>
            <input type="text" name="jornada_evento" class="form-control" value="{{ old('jornada_evento', $registro->jornada_evento) }}" required>
        </div>
        <div class="mb-3">
            <label for="area_asignada" class="form-label">Área Asignada</label>
            <input type="text" name="area_asignada" class="form-control" value="{{ old('area_asignada', $registro->area_asignada) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('registros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
