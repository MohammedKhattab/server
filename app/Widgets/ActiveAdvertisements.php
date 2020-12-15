<?php

namespace App\Widgets;

use App\Advertisement;
use Microboard\Foundations\Widget;

class ActiveAdvertisements extends Widget
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
        'icon-background' => 'success',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('microboard::state', [
            'config' => $this->config,
            'title' => 'عدد الإعلانات الفعالة',
            'info' => 'الإعلانات التي تظهر في الوقت الحالي في موقعك',
            'icon' => 'fa fa-images',
            'count' => Advertisement::available()->count(),
        ]);
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->can('viewAny', new Advertisement);
    }
}
