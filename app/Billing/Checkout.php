<?php

namespace App\Billing;

use App\Order;
use App\Billing\Methods\Method;
use Exception;
use Illuminate\Support\Str;

class Checkout
{
    /**
     * @var Method
     */
    private Method $method;

    /**
     * @var Order
     */
    protected Order $order;

    /**
     * Checkout constructor.
     *
     * @param string $method
     * @param Order $order
     */
    public function __construct($method, Order $order)
    {
        $method = '\\App\\Billing\\Methods\\' . Str::studly($method);

        $this->method = app($method);
        $this->order = $order;
    }

    /**
     * Redirect to the pay page.
     *
     * @return mixed
     * @throws Exception
     */
    public function pay()
    {
        return $this->method->createPaymentPageFor($this->order);
    }

    /**
     * To make sure that payment was received correctly.
     *
     * @return boolean
     */
    public function validate()
    {
        return $this->method->validate($this->order);
    }
}
