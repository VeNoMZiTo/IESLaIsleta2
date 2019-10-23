<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;

    public $table = 'departamentos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipoDirectivos()
    {
        return $this->hasMany(EquipoDirectivo::class, 'departamento_id', 'id');
    }

    public function equipoDocentes()
    {
        return $this->hasMany(EquipoDocente::class, 'departamento_id', 'id');
    }

    public function tutoria()
    {
        return $this->hasMany(Tutorium::class, 'departamento_id', 'id');
    }
}
