<?php

namespace App\Listeners;

use App\Events\OrderStatusChanged;
use App\Notifications\NewPaymentReceived;
use App\Notifications\OrderCanceledBecauseThatNoResponse;
use App\Notifications\OrderCompleted;
use App\Notifications\OrderConfirmedAndWaitForPayment;
use App\Notifications\TargetCanceledTheOrder;
use Microboard\Models\Role;

class HandleOrderStatus
{
    /**
     * Handle the event.
     *
     * @param OrderStatusChanged $event
     * @return void
     */
    public function handle(OrderStatusChanged $event)
    {
        $i = $event->order->status;
        if ($i == 1 && (setting('notifications.target-cancel-the-order', '') !== '')) {
            $instance = new TargetCanceledTheOrder($event->order);
        } elseif ($i == 2 && (setting('notifications.order-confirmed', '') !== '')) {
            $instance = new OrderConfirmedAndWaitForPayment($event->order);
        } elseif ($i == 4 && (setting('notifications.order-canceled-because-that-no-response', '') !== '')) {
            $instance = new OrderCanceledBecauseThatNoResponse($event->order);
        } elseif ($i == 5 && (setting('notifications.order-completed', '') !== '')) {
            $instance = new OrderCompleted($event->order);
        }

        if (isset($instance)) {
            $event->order->user->notify($instance);
        }

        if ($event->order->status === 3) {
            Role::with('users')->find(1)->users->each->notify(
                new NewPaymentReceived($event->order)
            );
        }
    }
}
