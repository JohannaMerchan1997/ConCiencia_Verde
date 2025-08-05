@extends('layouts.app')

@section('title', 'Conciencia Verde')

@section('content')

<div class="container" style="max-width: 900px; margin: 2em auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #2e4d26;">

  <!-- Portada -->
  <section style="text-align:center; margin-bottom: 3em;">
    <h1 style="color:#388e3c;">Conciencia Verde</h1>
    <p style="font-size: 1.3em; font-weight: 600; margin-bottom: 0.5em;">“Tu decisión cambia el entorno. Sé parte del cambio verde.”</p>
    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Conciencia Verde" style="max-width: 200px; margin-bottom: 1em;">
    <p><strong>Instituto Superior Tecnológico La Troncal</strong></p>
    <p><em>Duración: 4 semanas (30/05/2025 – 30/06/2025)</em></p>
  </section>

  <!-- Introducción breve -->
  <section style="margin-bottom: 3em;">
    <h2 style="border-bottom: 2px solid #4caf50; padding-bottom: 0.3em;">¿Por qué Conciencia Verde?</h2>
    <p>La contaminación ambiental afecta nuestro planeta y nuestra salud. <strong>Conciencia Verde</strong> es un proyecto estudiantil que busca fomentar hábitos ecológicos a través de actividades educativas y el desarrollo de una plataforma para registrar acciones ecológicas.</p>
  </section>

  <!-- Objetivos -->
  <section style="margin-bottom: 3em;">
    <h2 style="border-bottom: 2px solid #4caf50; padding-bottom: 0.3em;">Objetivos</h2>
    <ul style="list-style: inside disc; line-height: 1.6;">
      <li>Fomentar una cultura ecológica y responsabilidad ambiental en la comunidad educativa.</li>
      <li>Sensibilizar sobre el impacto del consumo y la gestión de residuos.</li>
      <li>Promover el reciclaje responsable y actividades participativas.</li>
      <li>Incentivar hábitos ecológicos diarios como el uso de botellas reutilizables.</li>
    </ul>
  </section>

  <!-- Actividades destacadas -->
  <section style="margin-bottom: 3em;">
    <h2 style="border-bottom: 2px solid #4caf50; padding-bottom: 0.3em;">Actividades Realizadas</h2>

    @php
      $actividades = [
        ['titulo' => 'Presentación de la campaña', 'descripcion' => 'Charla introductoria y lanzamiento oficial.', 'fecha' => 'Semana 1', 'imagen' => 'images/actividad1.jpeg'],
        ['titulo' => 'Charlas con especialistas', 'descripcion' => 'Conversatorios sobre reciclaje y cambio climático.', 'fecha' => 'Semanas 1-2', 'imagen' => 'images/charlas.jpeg'],
        ['titulo' => 'Instalación del Punto Verde', 'descripcion' => 'Colocación de recipientes para reciclaje.', 'fecha' => 'Semana 2', 'imagen' => 'images/eventos.jpeg'],
        ['titulo' => 'Concurso de reciclaje', 'descripcion' => 'Competencia entre grupos estudiantiles.', 'fecha' => 'Semanas 3-4', 'imagen' => 'images/conciencia.jpeg'],
        ['titulo' => 'Jornada de limpieza y siembra', 'descripcion' => 'Limpieza y plantación de especies nativas.', 'fecha' => 'Semana 4', 'imagen' => 'images/limpieza.jpeg'],
      ];
    @endphp

    <div style="display: flex; flex-direction: column; gap: 1.5em;">
      @foreach ($actividades as $act)
        <div style="display:flex; align-items:center; gap: 1em; border: 1px solid #c8e6c9; padding: 1em; border-radius: 10px; background-color: #f1f8e9;">
          <img src="{{ asset($act['imagen']) }}" alt="Imagen {{ $act['titulo'] }}" style="width: 120px; height: 90px; object-fit: cover; border-radius: 8px;">
          <div>
            <h4 style="margin: 0 0 0.3em 0; color: #2e7d32;">{{ $act['titulo'] }}</h4>
            <p style="margin: 0 0 0.2em 0; font-size: 0.95em;">{{ $act['descripcion'] }}</p>
            <small style="color: #558b2f;">Fecha: {{ $act['fecha'] }}</small>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Frase inspiradora -->
  <section style="margin-bottom: 3em; text-align: center;">
    <blockquote style="font-style: italic; font-size: 1.3em; color: #4caf50; border-left: 4px solid #81c784; padding-left: 1em;">
      "La Tierra no nos pertenece; nosotros pertenecemos a la Tierra. Lo que le hagamos a ella, nos lo hacemos a nosotros mismos."
      <br>— Chief Seattle
    </blockquote>
  </section>

  <!-- Contacto -->
  <section style="margin-bottom: 3em; border-top: 2px solid #4caf50; padding-top: 1em; font-size: 0.95em;">
    <h3>Contacto</h3>
    <p><strong>Jenny Jiménez</strong> – 5° Desarrollo de Aplicaciones Web</p>
    <p>📞 0979576484 | 📧 jejimenez@istlatroncal.edu.ec</p>
    <p><strong>Johanna Merchán</strong> – 5° Desarrollo de Aplicaciones Web</p>
    <p>📞 0967284372 | 📧 njmerchan@istlatroncal.edu.ec</p>
    <p><strong>Instituto Superior Tecnológico La Troncal</strong></p>
  </section>

</div>

@endsection










