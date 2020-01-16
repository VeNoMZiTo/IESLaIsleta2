<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use SoftDeletes;

    public $table = 'grupos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'curso',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cursoHorarios()
    {
        return $this->hasMany(Horario::class, 'curso_id', 'id');
    }

    public function cursoCitaPrevia()
    {
        return $this->hasMany(CitaPrevium::class, 'curso_id', 'id');
    }

    public function cursosAsginaturas()
    {
        return $this->belongsToMany(Asginatura::class);
    }
}
