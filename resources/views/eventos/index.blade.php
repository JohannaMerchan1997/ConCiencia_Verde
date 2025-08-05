@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eventos</h1>

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

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="d-none">ID</th> <!-- Oculto -->
                <th>Número</th>
                <th>Nombre</th>
                <th>Fecha Evento</th>
                <th>Duración</th>
                <th>Auspiciante 1</th>
                <th>Auspiciante 2</th>
                <th>Auspiciante 3</th>
                <th>Auspiciante 4</th>
                <th>Auspiciante 5</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventos as $evento)
            <tr>
                <td class="d-none">{{ $evento->id }}</td> <!-- Oculto -->
                <td>{{ $loop->iteration }}</td> <!-- Número -->
                <td>{{ $evento->nombre }}</td>
                <td>{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y') }}</td>
                <td>{{ $evento->duracion }}</td>
                <td>{{ $evento->auspiciante1 }}</td>
                <td>{{ $evento->auspiciante2 }}</td>
                <td>{{ $evento->auspiciante3 }}</td>
                <td>{{ $evento->auspiciante4 }}</td>
                <td>{{ $evento->auspiciante5 }}</td>
                <td>
                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success" onclick="return confirm('¿Seguro que quieres eliminar este evento?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center">No hay eventos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card p-3 mt-4">
        <h4 id="form-title">Agregar nuevo evento</h4>
        <form id="eventoForm" action="{{ route('eventos.store') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="id" id="evento_id"> <!-- Sigue oculto -->

            <div class="row g-2">
                <div class="col-md-3">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del evento" required>
                </div>
                <div class="col-md-2">
                    <input type="date" name="fecha_evento" id="fecha_evento" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="duracion" id="duracion" class="form-control" placeholder="Duración" required>
                </div>
                @for ($i = 1; $i <= 5; $i++)
                <div class="col-md-2">
                    <input type="text" name="auspiciante{{ $i }}" id="auspiciante{{ $i }}" class="form-control" placeholder="Auspiciante {{ $i }}">
                </div>
                @endfor
                <div class="col-md-1 d-grid">
                    <button type="submit" class="btn btn-success" id="submitButton">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function llenarFormularioEditar(evento) {
        document.getElementById('form-title').innerText = 'Editar evento';
        document.getElementById('submitButton').innerText = 'Actualizar';
        document.getElementById('eventoForm').action = '/eventos/' + evento.id;
        document.getElementById('evento_id').value = evento.id;

        // Cambiar método a PUT
        document.querySelector('input[name="_method"]').value = 'PUT';

        document.getElementById('nombre').value = evento.nombre;
        document.getElementById('fecha_evento').value = evento.fecha_evento;
        document.getElementById('duracion').value = evento.duracion;

        for (let i = 1; i <= 5; i++) {
            document.getElementById('auspiciante' + i).value = evento['auspiciante' + i] || '';
        }
    }
</script>
@endsection





