@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2em auto; color: #2e4d26; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <h1 style="color: #388e3c; text-align: center;">Usuarios</h1>

    @if(session('success'))
        <div style="background-color: #d7edcf; color: #2e4d26; border-radius: 8px; padding: 12px; margin-bottom: 1em; font-weight: 600; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    @if($usuarios->count())
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
                <th>Rol</th>
                <th>Tipo Usuario</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->numero }}</td>
                <td>{{ $usuario->cedula }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->celular }}</td>
                <td>{{ $usuario->genero }}</td>
                <td>{{ $usuario->role->nombre ?? 'N/A' }}</td>
                <td>{{ $usuario->tipoUsuario->nombre ?? 'N/A' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div style="background-color: #e8f5e9; color: #2e4d26; padding: 1em; border-radius: 8px; text-align: center;">
            No hay usuarios registrados.
        </div>
    @endif

    {{-- Formulario para agregar nuevo usuario --}}
    <form action="{{ route('usuarios.store') }}" method="POST" style="background-color: #e8f5e9; padding: 1.5em; border-radius: 8px; box-shadow: 0 2px 10px rgba(102,187,106,0.15); margin-top: 2em;">
        @csrf
        <h4 style="color: #388e3c; margin-bottom: 1em;">Agregar nuevo usuario</h4>
        <div style="display: flex; flex-wrap: wrap; gap: 1em;">
            <input type="text" name="cedula" placeholder="Cédula" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
            <input type="text" name="nombre" placeholder="Nombre" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
            <input type="text" name="apellido" placeholder="Apellido" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
            <input type="email" name="correo" placeholder="Correo" required style="flex: 1 1 200px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
            <input type="text" name="celular" placeholder="Celular" style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
            <select name="genero" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
                <option value="" disabled selected>Género</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            <select name="role_id" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
                <option value="" disabled selected>Selecciona Rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
            <select name="tipo_usuario_id" required style="flex: 1 1 150px; padding: 8px; border: 1px solid #a5d6a7; border-radius: 6px; font-size: 1em; color: #2e4d26; background-color: #f9fff9;">
                <option value="" disabled selected>Selecciona Tipo Usuario</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            <button type="submit" style="background-color: #66bb6a; color: white; border: none; padding: 10px 18px; font-size: 1em; border-radius: 6px; cursor: pointer; flex: 1 1 150px; transition: background-color 0.3s ease;">
                Agregar
            </button>
        </div>
    </form>
</div>
@endsection



