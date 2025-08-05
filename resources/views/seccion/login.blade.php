@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <h2>Iniciar Sesión</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('seccion.login.submit') }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-success">Entrar</button>
    </form>
@endsection






