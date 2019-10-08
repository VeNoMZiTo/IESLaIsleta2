<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiaTable extends Migration
{
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');

            $table->string('subtitulo');

            $table->string('descripcion');

            $table->date('fecha');

            $table->string('autor');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
