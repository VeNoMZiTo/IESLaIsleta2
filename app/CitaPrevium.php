<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CitaPrevium extends Model
{
    use SoftDeletes;

    public $table = 'cita_previa';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha',
        'curso_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'asignatura_id',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asginatura::class, 'asignatura_id');
    }

    public function curso()
    {
        return $this->belongsTo(Grupo::class, 'curso_id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
