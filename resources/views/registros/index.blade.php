@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $registrosPorEvento = $registros->groupBy(fn($r) => $r->evento->nombre ?? 'Evento desconocido');
    @endphp

    @foreach ($registrosPorEvento as $nombreEvento => $registrosEvento)
        <h3>Evento: {{ $nombreEvento }}</h3>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Usuario</th>
                    <th>Estudiante</th>
                    <th>Fecha Registro</th>
                    <th>Carrera</th>
                    <th>Ciclo</th>
                    <th>Jornada</th>
                    <th>Área Asignada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrosEvento as $registro)
                    <tr>
                        <td>{{ $registro->numero }}</td>
                        <td>{{ ($registro->usuario->nombre ?? '') . ' ' . ($registro->usuario->apellido ?? '') ?: 'Sin usuario' }}</td>
                        <td>{{ ($registro->estudiante->nombre ?? '') . ' ' . ($registro->estudiante->apellido ?? '') ?: 'Sin estudiante' }}</td>
                        <td>{{ $registro->fecha_registro }}</td>
                        <td>{{ $registro->carrera }}</td>
                        <td>{{ $registro->ciclo }}</td>
                        <td>{{ $registro->jornada_evento }}</td>
                        <td>{{ $registro->area_asignada }}</td>
                        <td>
                            <form method="POST" action="{{ route('registros.destroy', $registro->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

    <h2>Nuevo Registro</h2>
    <form method="POST" action="{{ route('registros.store') }}">
        @csrf

        <div class="mb-3">
            <label>Número</label>
            <input type="number" name="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Usuario</label>
            <select name="codigo_usuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }} {{ $usuario->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Evento</label>
            <select name="codigo_evento" class="form-control" required>
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Estudiante</label>
            <select name="codigo_estudiante" class="form-control" required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha de Registro</label>
            <input type="date" name="fecha_registro" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Carrera</label>
            <input type="text" name="carrera" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ciclo</label>
            <input type="text" name="ciclo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jornada</label>
            <input type="text" name="jornada_evento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Área Asignada</label>
            <input type="text" name="area_asignada" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection









