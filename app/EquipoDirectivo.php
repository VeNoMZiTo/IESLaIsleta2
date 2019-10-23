<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipoDirectivo extends Model
{
    use SoftDeletes;

    public $table = 'equipo_directivos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cargo',
        'email',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
        'departamento_id',
        'abreviatura_departamento',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
}
