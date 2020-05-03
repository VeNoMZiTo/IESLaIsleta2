<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->date('fecha');
            $table->string('autor');
            $table->longText('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });

    }
}
