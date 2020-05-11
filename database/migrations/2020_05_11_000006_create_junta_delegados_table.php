<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuntaDelegadosTable extends Migration
{
    public function up()
    {
        Schema::create('junta_delegados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->longText('texto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
