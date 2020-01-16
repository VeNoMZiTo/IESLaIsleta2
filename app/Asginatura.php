<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asginatura extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'asginaturas';

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

    public function asignaturaCitaPrevia()
    {
        return $this->hasMany(CitaPrevium::class, 'asignatura_id', 'id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Grupo::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
