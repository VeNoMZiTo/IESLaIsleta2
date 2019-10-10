<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
