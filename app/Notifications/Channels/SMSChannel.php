<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class SMSChannel
{
    public function send($notifiable, Notification $notification)
    {
        if ($notifiable instanceof \App\User) {
            $phone = $notifiable->routeNotificationForSMS();
        } else {
            $phone = $notifiable->routeNotificationFor(SMSChannel::class);
        }

        $notification->toSMS($notifiable)
            ->phone($phone)
            ->send();
    }
}
