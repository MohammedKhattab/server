<?php

namespace App\Widgets;

use App\Advertisement;
use Microboard\Foundations\Widget;

class DisabledAdvertisements extends Widget
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
        'icon-background' => 'danger',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('microboard::state', [
            'config' => $this->config,
            'title' => 'إعلانات موقوفة',
            'info' => 'انتهت مدة هذه الإعلانات',
            'icon' => 'fa fa-images',
            'count' => Advertisement::whereDate('expired_at', '<', now()->toDateString())->count(),
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
