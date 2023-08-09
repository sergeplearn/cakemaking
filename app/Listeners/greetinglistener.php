<?php

namespace App\Listeners;

use App\Events\greetingevent;
use App\Models\User;
use App\Notifications\greetingsnotification;
use Mail;

class greetinglistener
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
    public function handle(greetingevent $event): void
    {

        $User->notify(new greetingsnotification($event->User));
        // Mail::to(event->User->email, $event->User-name)->send(new Sende_email_to_new_user());
    }
}
