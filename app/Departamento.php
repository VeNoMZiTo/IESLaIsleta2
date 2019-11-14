<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'departamentos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'team_id',
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

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
