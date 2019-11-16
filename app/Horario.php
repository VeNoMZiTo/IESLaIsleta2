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
        'color',
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
}
