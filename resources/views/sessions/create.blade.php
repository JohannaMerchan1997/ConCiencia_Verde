@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Session</h1>

    <form action="{{ route('sessions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Código Rol</label>
            <input type="text" name="codigo_rol" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Clave</label>
            <input type="text" name="clave" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
