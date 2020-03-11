<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Descargar extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'descargars';

    protected $appends = [
        'docente',
        'directiva',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);

    }

    public function getDocenteAttribute()
    {
        return $this->getMedia('docente')->last();

    }

    public function getDirectivaAttribute()
    {
        return $this->getMedia('directiva')->last();

    }
}
