<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ArchivosGrupo extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'archivos_grupos';

    protected $appends = [
        'archivos',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'grupo_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);

    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');

    }

    public function getArchivosAttribute()
    {
        return $this->getMedia('archivos');

    }
}
