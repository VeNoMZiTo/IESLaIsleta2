<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHorariosTable extends Migration
{
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->unsignedInteger('curso_id');

            $table->foreign('curso_id', 'curso_fk_875606')->references('id')->on('grupos');
        });
    }
}
