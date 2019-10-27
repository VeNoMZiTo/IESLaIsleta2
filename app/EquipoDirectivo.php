<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class EquipoDirectivo extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'equipo_directivos';

    protected $appends = [
        'descargar',
    ];

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function getDescargarAttribute()
    {
        return $this->getMedia('descargar')->last();
    }
}
