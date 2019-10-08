<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'boton',
        'titulo',
        'created_at',
        'updated_at',
        'deleted_at',
        'descripcion',
    ];
}
