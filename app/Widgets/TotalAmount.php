<?php

namespace App\Widgets;

use App\Order;
use Microboard\Foundations\Widget;

class TotalAmount extends Widget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
//        'size' => '',
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
            'title' => 'مجموع أرباح الموقع',
            'info' => 'هذا الرقم هو بشكل تقريبي',
            'icon' => 'fa fa-database',
            'count' => number_format(Order::sum('amount'), 0) . ' ر.س ',
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
