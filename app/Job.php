<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Job extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'phone', 'city', 'has_a_car'
    ];

    protected $casts = [
        'has_a_car' => 'boolean'
    ];
}
