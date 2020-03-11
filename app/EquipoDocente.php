<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipoDocente extends Model
{
    use SoftDeletes;

    public $table = 'equipo_docentes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cargo',
        'email',
        'profesores',
        'created_at',
        'updated_at',
        'deleted_at',
        'departamento',
    ];
}
