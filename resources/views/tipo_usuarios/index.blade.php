@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px;">
    <h1>Tipos de Usuario</h1>

    {{-- Mostrar lista de tipos existentes --}}
    @if($tipos->count())
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Número</th> {{-- Mostrar número si tienes ese campo --}}
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->numero ?? '' }}</td> {{-- Campo número opcional --}}
                        <td>{{ $tipo->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No hay tipos de usuario registrados.</div>
    @endif

    <h2>Agregar nuevo Tipo de Usuario</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tipo_usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input
                type="number"
                name="numero"
                id="numero"
                class="form-control"
                placeholder="Ejemplo: 1"
                value="{{ old('numero') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Tipo de Usuario</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                class="form-control"
                placeholder="Ejemplo: Administrador"
                value="{{ old('nombre') }}"
                required>
        </div>

        <button type="submit" class="btn btn-success">Agregar Tipo de Usuario</button>
    </form>
</div>
@endsection




