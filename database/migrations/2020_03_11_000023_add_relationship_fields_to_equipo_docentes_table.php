<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEquipoDocentesTable extends Migration
{
    public function up()
    {
        Schema::table('equipo_docentes', function (Blueprint $table) {
            $table->unsignedInteger('departamento_id');
            $table->foreign('departamento_id', 'departamento_fk_1131894')->references('id')->on('teams');
        });

    }
}
