<!DOCTYPE html>
<html>
<head>
    <title>Login - ConCiencia Verde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Ingreso al sistema</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('seccion.validar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Usuario</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Clave</label>
            <input type="password" name="clave" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Ingresar</button>
    </form>
</body>
</html>
