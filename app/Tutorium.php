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
        'descarga',
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
        'hora_atencion',
        'departamento_id',
        'abreviatura_departamento',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function getDescargaAttribute()
    {
        return $this->getMedia('descarga')->last();
    }
}
