<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendario extends Model
{
    use SoftDeletes;

    public $table = 'calendarios';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tipo',
        'tema',
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TIPO_SELECT = [
        'Evaluación' => 'Evaluación',
        'Festivo'    => 'Festivo',
        'Padres'     => 'Padres',
        'Singular'   => 'Singular',
        'Libre'      => 'Libre',
    ];

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
