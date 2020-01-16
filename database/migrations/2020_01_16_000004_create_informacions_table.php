<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionsTable extends Migration
{
    public function up()
    {
        Schema::create('informacions', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('subtitulo')->nullable();

            $table->longText('texto');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
