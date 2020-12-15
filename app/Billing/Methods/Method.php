<?php

namespace App\Billing\Methods;

use App\Order;
use Exception;

interface Method
{
    /**
     * Create payment page url.
     *
     * @param Order $order
     * @return string
     * @throws Exception
     */
    public function createPaymentPageFor(Order $order);

    /**
     * Validate that the order payment has been stored successfully.
     *
     * @param Order $order
     * @return boolean
     */
    public function validate(Order $order);
}
