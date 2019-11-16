<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('horario');

            $table->string('dia');

            $table->string('curso');

            $table->string('asignatura');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
