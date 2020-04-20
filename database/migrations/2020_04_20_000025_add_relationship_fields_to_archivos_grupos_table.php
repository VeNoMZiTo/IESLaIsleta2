<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToArchivosGruposTable extends Migration
{
    public function up()
    {
        Schema::table('archivos_grupos', function (Blueprint $table) {
            $table->unsignedInteger('grupo_id');
            $table->foreign('grupo_id', 'grupo_fk_1344594')->references('id')->on('grupos');
            $table->unsignedInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_1344788')->references('id')->on('teams');
        });

    }
}
