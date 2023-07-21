<?php

namespace App\Notifications;

use App\Models\newcake;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Newcakenotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public newcake $newcake)
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Cake from {$this->newcake->nameofperson}")
            ->greeting("New Cake from {$this->newcake->nameofperson}")
            ->line('it should be a cake wakl!')
            ->action('Go to new Cake', url("http://127.0.0.1:8000/newcake/{$this->newcake->id}"))
            ->line('Thank you for for ur time');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
