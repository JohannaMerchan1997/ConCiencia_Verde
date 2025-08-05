@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 700px;"> {{-- Opcional, para limitar ancho --}}
    <h1 class="mb-4">Tipos de Evento</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mostrar tabla si hay registros --}}
    @if($tipo_eventos->count() > 0)
    <table class="table table-bordered table-sm"> {{-- table-sm para tabla compacta --}}
        <thead>
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th style="width: 120px;">Acciones</th> {{-- para no hacer muy ancho --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($tipo_eventos as $tipo)
            <tr>
                <td>{{ $tipo->numero }}</td> {{-- Mostramos número --}}
                <td>{{ $tipo->nombre }}</td>
                <td>
                    {{-- Usamos id internamente pero no mostramos --}}
                    <form action="{{ route('tipo_eventos.destroy', $tipo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que deseas eliminar este tipo de evento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No hay registros de tipos de evento.</p>
    @endif

    {{-- Formulario para agregar nuevo --}}
    <div class="card mt-4" style="max-width: 400px;"> {{-- Limitar ancho del formulario --}}
        <div class="card-header py-2">Agregar nuevo tipo de evento</div>
        <div class="card-body py-3">
            <form action="{{ route('tipo_eventos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="numero" class="form-label small">Número</label>
                    <input type="number" name="numero" class="form-control form-control-sm" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label small">Nombre</label>
                    <input type="text" name="nombre" class="form-control form-control-sm" required>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Agregar</button>
            </form>
        </div>
    </div>
</div>
@endsection





