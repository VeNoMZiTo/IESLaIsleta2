<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Tutorium extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'tutoria';

    protected $appends = [
        'imprimir',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nivel',
        'grupo',
        'tutor',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'departamento',
        'hora_atencion',
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
