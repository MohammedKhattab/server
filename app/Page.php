<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'slug', 'body'
    ];

    public function getRouteKeyName()
    {
        if (request()->is('*admin*')) {
            return parent::getRouteKeyName();
        }

        return 'slug';
    }
}
