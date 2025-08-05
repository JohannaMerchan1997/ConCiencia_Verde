<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Ecohuella - @yield('title', 'Inicio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background-image: url('{{ asset('images/hojas.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #e8f5e9;
            color: #2E7D32;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #banner {
            width: 100%;
            max-height: 180px;
            object-fit: cover;
            display: block;
            border-bottom: 2px solid #C8E6C9;
        }

        header {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(6px);
            padding: 1em 3em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        header h1 {
            color: #2E7D32;
            font-weight: 900;
            font-size: 1.8em;
            margin: 0;
        }

        nav {
            display: flex;
            gap: 1.5em;
        }

        /* Botones y enlaces del menú con amarillo */
        nav a, nav button {
            color: #2E7D32;
            background-color: #FFEB3B; /* amarillo */
            text-decoration: none;
            font-weight: 600;
            border: none;
            cursor: pointer;
            font-size: 1em;
            padding: 0.4em 1em;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        nav a:hover, nav button:hover {
            background-color: #FBC02D; /* amarillo más oscuro */
            color: #1B5E20;
        }

        .content-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1rem;
            flex: 1;
        }

        section {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            animation: fadeIn 0.6s ease;
        }

        section h2 {
            text-align: center;
            color: #1B5E20;
            margin-bottom: 1em;
            font-size: 2em;
        }

        footer {
            background-color: #2E7D32;
            color: white;
            text-align: center;
            padding: 1.5em 0;
            font-weight: 600;
            font-size: 0.95em;
            margin-top: auto;
        }

        /* Estilos para todas las tablas del sitio */
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


        tbody tr:nth-child(even) {
            background-color: #e0f2e9; /* verde claro alternado */
        }

        tbody tr:hover {
            background-color: #c8e6c9; /* verde hover */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Botones Salir y Eliminar - color verde, compactos y sin sombra */
        button,
        .btn-eliminar {
            background-color: #388e3c; /* verde */
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            border: none;
            cursor: pointer;
            box-shadow: none;
            transition: background-color 0.25s ease;
            min-width: auto;
            width: auto;
            display: inline-block;
            text-align: center;
        }

        button:hover,
        .btn-eliminar:hover {
            background-color: #2e6b26; /* verde más oscuro */
            box-shadow: none;
        }

        /* Para evitar que el botón Salir herede estilos extra */
        header nav form button {
            display: inline-block;
        }

        /* Formulario estilos */
        form {
            background-color: #e8f5e9;
            padding: 1.2em 1.5em;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(102,187,106,0.15);
            max-width: 400px;
            margin: 2em auto 0;
        }

        form h2 {
            margin-top: 0;
            margin-bottom: 1em;
            color: #388e3c;
            text-align: center;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="number"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 1em;
            border: 1px solid #a5d6a7;
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
            border-color: #66bb6a;
            background-color: #ffffff;
        }

        form button {
            background-color: #66bb6a;
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
            background-color: #4a945a;
        }

        .success-message {
            color: #388e3c;
            font-weight: 600;
            margin-bottom: 1em;
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1em;
            }

            nav {
                flex-wrap: wrap;
                gap: 1em;
            }
        }
    </style>
</head>
<body>

    {{-- Banner superior --}}
    <img src="{{ asset('images/baner.png') }}" alt="Banner ConCiencia Verde" id="banner" />

    {{-- Navbar / Encabezado --}}
    <header>
        <h1>ConCiencia Verde</h1>
        <nav>
            @if(request()->is('/'))
                <a href="{{ route('seccion.login') }}">Servicios</a>
            @else
                @auth('seccion')
                    @if(request()->is('seccion/login') || request()->is('menu'))
                        <form method="POST" action="{{ route('seccion.logout') }}">
                            @csrf
                            <button type="submit">Salir</button>
                        </form>
                    @else
                        <a href="{{ route('menu') }}">Regresar</a>
                    @endif
                @else
                    <a href="{{ route('seccion.login') }}">Servicios</a>
                @endauth
            @endif
        </nav>
    </header>

    {{-- Contenido dinámico --}}
    <main class="content-container">
        @yield('content')
    </main>

    {{-- Pie de página --}}
    <footer>
        &copy; {{ date('Y') }} ConCiencia Verde - Todos los derechos reservados
    </footer>

    
@stack('scripts')
</body>
</html>



















