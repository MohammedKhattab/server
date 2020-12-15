<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Notifications;
use Illuminate\Support\Facades\Notification;
use Microboard\Models\Role;

class HandleNewOrder
{
    /**
     * Handle the event.
     *
     * @param NewOrder $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        Role::with('users')->find(1)->users->each->notify(
            new Notifications\NewOrderNotification($event->order)
        );

        if (setting('notifications.welcome', '') !== '') {
            $event->order->user->notify(
                new Notifications\WelcomeMessage($event->order)
            );
        }

        if (setting('notifications.confirm-for-' . $event->order->type, '') !== '') {
            Notification::route(Notifications\Channels\SMSChannel::class, $event->order->target_phone)
                ->notify(new Notifications\ConfirmThatYouWantThisOrder($event->order));
        }
    }
}
