<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej: Interno, Externo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_usuarios');
    }
}

