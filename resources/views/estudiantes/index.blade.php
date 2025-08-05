@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 900px;
        margin: 2em auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #2e4d26; /* verde oscuro */
    }
    h1, h2 {
        color: #388e3c; /* verde intenso */
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5em;
        box-shadow: 0 2px 8px rgba(102,187,106,0.2);
        background-color: #f1f8f4; /* fondo muy claro verde */
        border-radius: 8px;
        overflow: hidden;
    }
    thead {
        background-color: #66bb6a; /* verde hoja */
        color: white;
        font-weight: 600;
    }
    th, td {
        padding: 10px 12px;
        border-bottom: 1px solid #a5d6a7; /* verde claro */
        text-align: left;
        vertical-align: middle;
    }
    tbody tr:nth-child(even) {
        background-color: #e0f2e9; /* verde claro alternado */
    }
    tbody tr:hover {
        background-color: #c8e6c9; /* verde hover */
        cursor: pointer;
    }
    form {
        background-color: #e8f5e9; /* verde muy claro */
        padding: 1.2em 1.5em;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(102,187,106,0.15);
        max-width: 400px;
        margin: 0 auto;
    }
    form h2 {
        margin-top: 0;
        margin-bottom: 1em;
        color: #388e3c; /* verde intenso */
        text-align: center;
    }
    form input[type="text"],
    form input[type="email"],
    form input[type="number"] {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 1em;
        border: 1px solid #a5d6a7; /* verde claro */
        border-radius: 6px;
        font-size: 1em;
        color: #2e4d26;
        background-color: #f9fff9;
        transition: border-color 0.3s ease;
    }
    form input[type="text"]:focus,
    form input[type="email"]:focus,
    form input[type="number"]:focus {
        outline: none;
        border-color: #66bb6a; /* verde hoja */
        background-color: #ffffff;
    }
    form button {
        background-color: #66bb6a; /* verde hoja */
        color: white;
        border: none;
        padding: 10px 18px;
        font-size: 1em;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    form button:hover {
        background-color: #4a945a; /* verde más oscuro */
    }
    .success-message {
        color: #388e3c;
        font-weight: 600;
        margin-bottom: 1em;
        text-align: center;
    }
    .btn-eliminar {
        background-color:#388e3c;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 0.85em;
        border: none;
        color: white;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }
    .btn-eliminar:hover {
        background-color: #2e7d32;
    }
</style>

<div class="container">
    <h1>Lista de Estudiantes</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de estudiantes --}}
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Género</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->numero }}</td>
                    <td>{{ $estudiante->cedula }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->celular }}</td>
                    <td>{{ $estudiante->genero }}</td>
                    <td>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" onsubmit="return confirmarEliminacion('{{ $estudiante->id }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Formulario para agregar nuevo estudiante --}}
    <form action="{{ route('estudiantes.store') }}" method="POST" novalidate>
        @csrf
        <h2>Agregar nuevo estudiante</h2>

        <input type="number" name="numero" placeholder="Número" required>

        <input type="text" name="cedula" placeholder="Cédula" required>
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="email" name="correo" placeholder="Correo" required>
        <input type="text" name="celular" placeholder="Celular" required>
        <input type="text" name="genero" placeholder="Género" required>

        <button type="submit">Agregar</button>
    </form>
</div>

<script>
function confirmarEliminacion(id) {
    return confirm('¿Seguro que deseas eliminar el estudiante con ID ' + id + '?');
}
</script>
@endsection



