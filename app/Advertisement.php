<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Advertisement extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'url', 'started_at', 'expired_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    public function scopeAvailable(Builder $query)
    {
        return $query->whereDate('started_at', '<=', now())
            ->whereDate('expired_at', '>=', now());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->useFallbackPath($image = asset('storage/no-image.jpg'))
            ->useFallbackUrl($image);
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'image' => $this->getFirstMediaUrl('image')
        ];
    }
}
