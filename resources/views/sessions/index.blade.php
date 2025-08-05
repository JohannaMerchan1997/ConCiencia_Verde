@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sesiones</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('sessions.create') }}" class="btn btn-primary mb-3">Crear Nueva Sesión</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Código Rol</th>
                <th>Clave</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sessions as $session)
                <tr>
                    <td>{{ $session->id }}</td>
                    <td>{{ $session->codigo }}</td>
                    <td>{{ $session->codigo_rol }}</td>
                    <td>{{ $session->clave }}</td>
                    <td>{{ $session->estado }}</td>
                    <td>
                        <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta sesión?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No hay sesiones registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

