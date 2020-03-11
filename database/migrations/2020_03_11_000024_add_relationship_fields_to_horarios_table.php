<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHorariosTable extends Migration
{
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id', 'grupo_fk_1109460')->references('id')->on('grupos');
        });

    }
}
