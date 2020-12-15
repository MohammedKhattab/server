<?php

namespace App\Widgets;

use App\Advertisement;
use Microboard\Foundations\Widget;

class FutureAdvertisements extends Widget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'size' => 'col-md-4',
        'background' => 'white',
        'text' => 'dark',
        'icon-background' => 'info'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('microboard::state', [
            'config' => $this->config,
            'title' => 'إعلانات قادمة',
            'info' => 'لم يأتي وقت بداية ظهور هذه الإعلانات',
            'icon' => 'fa fa-images',
            'count' => Advertisement::whereDate('started_at', '>', now()->toDateString())->count(),
        ]);
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
    }
}
