<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title', 'author', 'body'
    ];

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
            'title' => $this->title,
            'author' => $this->author,
            'excerpt' => Str::limit($this->body, 320),
            'body' => $this->body,
            'image' => $this->getFirstMediaUrl('image'),
            'created_at' => now()->translatedFormat('d/ M'),
        ];
    }
}
