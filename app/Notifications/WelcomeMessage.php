<?php

namespace App\Notifications;

use App\Notifications\Channels\SMSChannel;
use App\Notifications\Services\SMSProvider;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class WelcomeMessage extends Notification
{
    use Queueable;

    /**
     * @var Order
     */
    public Order $order;

    /**
     * Create a new notification instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SMSChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return SMSProvider
     */
    public function toSMS($notifiable)
    {
        return (new SMSProvider)
            ->variables([
                'order_id' => $this->order->id,
                'user_name' => $notifiable->name,
                'from' => $this->order->city,
                'to' => $this->order->target_city,
            ])
            ->message(setting('notifications.welcome'));
    }
}
