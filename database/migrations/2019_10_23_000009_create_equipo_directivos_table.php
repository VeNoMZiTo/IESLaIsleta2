<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoDirectivosTable extends Migration
{
    public function up()
    {
        Schema::create('equipo_directivos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cargo');

            $table->string('nombre');

            $table->string('departamento');

            $table->string('email');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
