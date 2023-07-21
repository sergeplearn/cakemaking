<?php

namespace App\Listeners;

use App\Events\NewcakeCreated;
use App\Models\User;
use App\Notifications\Newcakenotify;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewcakeNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewcakeCreated $event): void
    {
        foreach (User::whereNot('id', $event->newcake->user_id)->cursor() as $user) {
            $user->notify(new Newcakenotify($event->newcake));
        }
    }
}
