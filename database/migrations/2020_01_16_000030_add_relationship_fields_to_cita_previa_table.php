<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCitaPreviaTable extends Migration
{
    public function up()
    {
        Schema::table('cita_previa', function (Blueprint $table) {
            $table->unsignedInteger('asignatura_id');

            $table->foreign('asignatura_id', 'asignatura_fk_875644')->references('id')->on('asginaturas');

            $table->unsignedInteger('curso_id');

            $table->foreign('curso_id', 'curso_fk_875645')->references('id')->on('grupos');
        });
    }
}
