<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesExtraescolaresTable extends Migration
{
    public function up()
    {
        Schema::create('actividades_extraescolares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->longText('texto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
