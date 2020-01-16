<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsginaturaGrupoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('asginatura_grupo', function (Blueprint $table) {
            $table->unsignedInteger('asginatura_id');

            $table->foreign('asginatura_id', 'asginatura_id_fk_875622')->references('id')->on('asginaturas')->onDelete('cascade');

            $table->unsignedInteger('grupo_id');

            $table->foreign('grupo_id', 'grupo_id_fk_875622')->references('id')->on('grupos')->onDelete('cascade');
        });
    }
}
