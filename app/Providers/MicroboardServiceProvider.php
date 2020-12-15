<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MicroboardServiceProvider extends ServiceProvider
{
    /**
     * Get dashboard's home page widgets.
     *
     * @return string[]
     */
    public function widgets()
    {
        return [
            '\App\Widgets\TotalAmount',
            '\App\Widgets\PendingOrders',
            '\Microboard\Widgets\UsersInThisMonth',
            '\App\Widgets\ActiveAdvertisements' => [
                'size' => 'col-xl-3 xol-md-4'
            ],
        ];
    }
}
