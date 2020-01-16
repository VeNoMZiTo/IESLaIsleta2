<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAsginaturasTable extends Migration
{
    public function up()
    {
        Schema::table('asginaturas', function (Blueprint $table) {
            $table->unsignedInteger('team_id')->nullable();

            $table->foreign('team_id', 'team_fk_875661')->references('id')->on('teams');
        });
    }
}
