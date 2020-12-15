<?php

namespace App\Widgets;

use App\Order;
use Microboard\Foundations\Widget;

class TotalOrders extends Widget
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
        'icon-background' => 'warning',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('microboard::state', [
            'config' => $this->config,
            'title' => 'إجمالي الطلبات',
            'info' => 'عدد الطلبات الإجمالي في الموقع',
            'icon' => 'fa fa-database',
            'count' => Order::count(),
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
