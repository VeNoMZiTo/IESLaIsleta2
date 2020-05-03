<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCursosTable extends Migration
{
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedInteger('asignatura_id');
            $table->foreign('asignatura_id', 'asignatura_fk_1109557')->references('id')->on('asginaturas');
        });

    }
}
