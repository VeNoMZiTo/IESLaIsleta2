<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendariosTable extends Migration
{
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('tema');
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
