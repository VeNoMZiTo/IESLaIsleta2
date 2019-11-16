<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');

            $table->string('descripcion');

            $table->string('boton')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
