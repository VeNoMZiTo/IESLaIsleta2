<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoriaTable extends Migration
{
    public function up()
    {
        Schema::create('tutoria', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nivel');

            $table->string('grupo');

            $table->string('tutor');

            $table->string('departamento');

            $table->string('email');

            $table->string('hora_atencion');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
