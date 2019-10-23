<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class EquipoDocente extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'equipo_docentes';

    protected $appends = [
        'imprimir',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cargo',
        'email',
        'profesores',
        'created_at',
        'updated_at',
        'deleted_at',
        'departamento',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getImprimirAttribute()
    {
        return $this->getMedia('imprimir')->last();
    }
}
