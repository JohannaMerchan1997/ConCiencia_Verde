<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_evento');
            $table->string('duracion');
            $table->string('auspiciante1')->nullable();
            $table->string('auspiciante2')->nullable();
            $table->string('auspiciante3')->nullable();
            $table->string('auspiciante4')->nullable();
            $table->string('auspiciante5')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}

