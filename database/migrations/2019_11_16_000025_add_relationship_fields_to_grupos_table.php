<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGruposTable extends Migration
{
    public function up()
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->unsignedInteger('curso_id');

            $table->foreign('curso_id', 'curso_fk_611481')->references('id')->on('grupos');
        });
    }
}
