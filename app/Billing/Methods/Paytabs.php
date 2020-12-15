<?php

namespace App\Billing\Methods;

use App\Billing\Integrations\Paytabs as Service;
use App\Order;
use Exception;

class Paytabs implements Method
{
    /**
     * @var Service
     */
    private Service $paytabs;

    /**
     * @param Service $paytabs
     */
    public function __construct(Service $paytabs)
    {
        $this->paytabs = $paytabs;
    }

    /**
     * @param Order $order
     * @return bool
     */
    public function validate(Order $order)
    {
        try {
            $this->paytabs->verify(request('payment_reference'));
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @param Order $order
     * @return string
     * @throws Exception
     */
    public function createPaymentPageFor(Order $order)
    {
        $name = $order->user->name;
        $first_name = '';
        $last_name = 'لا يوجد';
        $explodedName = explode(' ', $name);
        if (isset($explodedName[0])) {
            $first_name = $explodedName[0];
        }
        if (isset($explodedName[1])) {
            $last_name = $explodedName[1];
        }

        return $this->paytabs->createPaymentPage([
            'site_url' => 'https://devnile.com',
            'return_url' => route('payments.callback', ['order' => $order, 'method' => 'paytabs']),
            'quantity' => '1',
            'other_charges' => 0,

            'products_per_title' => strip_tags($order->title),
            'unit_price' => $order->total,
            'discount' => 0,
            'amount' => $order->total,
            'reference_no' => $order->id,

            'title' => $name,
            'cc_first_name' => $first_name,
            'cc_last_name' => $last_name,
            'shipping_first_name' => $first_name,
            'shipping_last_name' => $last_name,
            'phone_number' => $order->user->phone,
            'email' => $order->user->email,

            'billing_address' => $order->city,
            'state' => $order->city,
            'city' => $order->city,
            'address_shipping' => $order->city,
            'state_shipping' => $order->city,
            'city_shipping' => $order->city,
        ]);
    }
}
