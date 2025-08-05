@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Lista de Roles</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($roles->count() > 0)
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Número</th>
                    <th>Nombre</th>
                    {{-- Quitamos columna de acciones --}}
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $rol)
                    <tr>
                        <td>{{ $rol->numero }}</td> {{-- Mostrar número --}}
                        <td>{{ $rol->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No hay roles registrados.</div>
    @endif

    {{-- Formulario para agregar nuevo rol --}}
    <div class="card p-3 mt-4">
        <h4>Agregar nuevo rol</h4>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="number" name="numero" class="form-control" placeholder="Número" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
</div>
@endsection









