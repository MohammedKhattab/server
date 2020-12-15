<?php

namespace App\Widgets;

use App\Order;
use Microboard\Foundations\Widget;

class RejectedOrders extends Widget
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
            'title' => 'طلبات مرفوضة',
            'info' => 'مرفوضة أو لم يتم دفعها',
            'icon' => 'fa fa-database',
            'count' => Order::whereIn('status', [1, 4])->count(),
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
