<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;

    public $table = 'horarios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dia',
        'curso',
        'horario',
        'asignatura',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DIA_SELECT = [
        'lunes'     => 'Lunes',
        'martes'    => 'Martes',
        'miercoles' => 'Miércoles',
        'jueves'    => 'Jueves',
        'viernes'   => 'Viernes',
    ];

    const HORARIO_SELECT = [
        'primera' => '8:00 - 8:55',
        'segunda' => '8:55 - 9:50',
        'tercera' => '9:50 - 10:45',
        'cuarta'  => '11:15 - 12:10',
        'quinta'  => '12:10 - 13:05',
        'sexta'   => '13:05 - 14:00',
    ];

    const CURSO_SELECT = [
        'eso1a' => 'ESO 1ºA',
        'eso1b' => 'ESO 1ºB',
        'eso1c' => 'ESO 1ºC',
        'eso2a' => 'ESO 2ºA',
        'eso2b' => 'ESO 2ºB',
        'eso2c' => 'ESO 2ºC',
        'eso2d' => 'ESO 2ºD',
        'eso3a' => 'ESO 3ºA',
        'eso3b' => 'ESO 3ºB',
        'eso3c' => 'ESO 3ºC',
        'eso3d' => 'ESO 3ºD',
        'eso4a' => 'ESO 4ºA',
        'eso4b' => 'ESO 4ºB',
        'eso4c' => 'ESO 4ºC',
        'bac1a' => 'BAC 1ºA',
        'bac1b' => 'BAC 1ºB',
        'bac1c' => 'BAC 1ºC',
        'bac2a' => 'BAC 2ºA',
        'bac2b' => 'BAC 2ºB',
    ];
}
