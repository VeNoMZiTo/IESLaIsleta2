<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('curso_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_1108628')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('curso_id');
            $table->foreign('curso_id', 'curso_id_fk_1108628')->references('id')->on('cursos')->onDelete('cascade');
        });

    }
}
