<?php

namespace App\Widgets;

use App\Order;
use Microboard\Foundations\Widget;

class PendingOrders extends Widget
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
        'icon-background' => 'primary',
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return view('microboard::state', [
            'config' => $this->config,
            'title' => 'طلبات قيد المراجعة',
            'info' => 'هذه الطلبات تحتاج إلى أن تقوم بالتعامل معها',
            'icon' => 'fa fa-database',
            'count' => Order::where('status', 0)->count(),
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
