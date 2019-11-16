<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresosTable extends Migration
{
    public function up()
    {
        Schema::create('impresos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
