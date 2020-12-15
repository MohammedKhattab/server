<?php

namespace App\View;

use Illuminate\Database\Eloquent\Collection;

class SettingsCollection extends Collection
{
    public function delimit($delimiter)
    {
        $key = explode('.', $delimiter);
        $group = $key[0];

        if (! isset($key[1])) {
            throw new \InvalidArgumentException("There is no key provided!");
        }
        $key = $key[1];

        return $this->where('group', $group)
            ->where('key', $key)
            ->first();
    }

    public function value($delimiter, $default = null)
    {
        return optional(
            $this->delimit($delimiter)
        )->value ?? $default;
    }

    public function image($delimiter, $default = false)
    {
        $image = optional(
            $this->delimit($delimiter)
        )->getFirstMediaUrl();

        return $image ?? $default;
    }

    public function images($delimiter)
    {
        return optional(
            $this->delimit($delimiter)
        )->getMedia();
    }

    public function logo()
    {
        return $this->image('site.logo');
    }

    public function news()
    {
        return $this->images('news.images')->map(function ($image) {
            return [
                'name' => $image->name,
                'url' => $image->getUrl()
            ];
        })->all();
    }

    public function socialLinks()
    {
        return [
            'facebook' => $this->value('social.facebook_url', false),
            'twitter' => $this->value('social.twitter_url', false),
            'instagram' => $this->value('social.instagram_url', false),
            'whatsapp' => $this->value('social.whatsApp_url', false)
        ];
    }
}
