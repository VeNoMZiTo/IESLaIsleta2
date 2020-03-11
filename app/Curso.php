<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    public $table = 'cursos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const NIVEL_SELECT = [
        '1' => '1º',
        '2' => '2º',
        '3' => '3º',
        '4' => '4º',
    ];

    const CURSO_SELECT = [
        'eso'          => 'ESO',
        'bachillerato' => 'Bachillerato',
        'pmar'         => 'PMAR',
    ];

    protected $fillable = [
        'nivel',
        'curso',
        'created_at',
        'updated_at',
        'deleted_at',
        'asignatura_id',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asginatura::class, 'asignatura_id');

    }
}
