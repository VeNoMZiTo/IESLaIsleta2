<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaPreviaTable extends Migration
{
    public function up()
    {
        Schema::create('cita_previa', function (Blueprint $table) {
            $table->increments('id');

            $table->datetime('fecha');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
