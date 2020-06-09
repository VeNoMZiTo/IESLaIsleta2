<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsginaturasTable extends Migration
{
    public function up()
    {
        Schema::create('asginaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asginaturas');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
