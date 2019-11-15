<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTutoriaTable extends Migration
{
    public function up()
    {
        Schema::table('tutoria', function (Blueprint $table) {
            $table->unsignedInteger('departamento_id');

            $table->foreign('departamento_id', 'departamento_fk_507726')->references('id')->on('departamentos');
        });
    }
}
