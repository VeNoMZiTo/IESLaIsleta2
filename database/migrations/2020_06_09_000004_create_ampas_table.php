<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmpasTable extends Migration
{
    public function up()
    {
        Schema::create('ampas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->longText('texto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
