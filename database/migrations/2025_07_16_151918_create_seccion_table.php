<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionTable extends Migration
{
    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->unique();
            $table->string('clave');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seccion');
    }
}

