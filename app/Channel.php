<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        if ($this->media()->first()) {
            return $this->media()->first()->getFullUrl('thumb');
        }

        return null;
    }

    public function registerMediaCollections(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)->height(100);
    }
}
