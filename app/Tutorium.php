<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutorium extends Model
{
    use SoftDeletes;

    public $table = 'tutoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nivel',
        'grupo',
        'tutor',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'hora_atencion',
        'abreviatura_departamento',
    ];
}
