<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codigo_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('codigo_evento')->constrained('tipo_eventos')->onDelete('cascade');
            $table->foreignId('codigo_estudiante')->constrained('estudiantes')->onDelete('cascade');
            $table->date('fecha_registro');
            $table->string('carrera');
            $table->string('ciclo');
            $table->string('jornada_evento');
            $table->string('area_asignada');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
}

