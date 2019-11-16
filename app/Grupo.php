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
        'curso_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'curso_id', 'id');
    }

    public function curso()
    {
        return $this->belongsTo(Grupo::class, 'curso_id');
    }
}
