<?php

namespace App\Billing\Methods;

use App\Order;

class OnDelivery implements Method
{
    /**
     * @param Order $order
     * @return string|void
     */
    public function createPaymentPageFor(Order $order)
    {
        return route('payments.callback', ['order' => $order, 'method' => 'on-delivery']);
    }

    /**
     * @param Order $order
     * @return bool
     */
    public function validate(Order $order)
    {
        return true;
    }
}
