<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEquipoDirectivosTable extends Migration
{
    public function up()
    {
        Schema::table('equipo_directivos', function (Blueprint $table) {
            $table->unsignedInteger('departamento_id');

            $table->foreign('departamento_id', 'departamento_fk_507675')->references('id')->on('departamentos');
        });
    }
}
