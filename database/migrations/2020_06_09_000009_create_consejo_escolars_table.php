<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsejoEscolarsTable extends Migration
{
    public function up()
    {
        Schema::create('consejo_escolars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->longText('texto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
