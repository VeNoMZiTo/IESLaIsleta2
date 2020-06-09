<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoDocentesTable extends Migration
{
    public function up()
    {
        Schema::create('equipo_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departamento');
            $table->string('profesores');
            $table->string('cargo')->nullable();
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
