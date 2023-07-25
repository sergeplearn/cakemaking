<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\greetingsnotification;
use App\Events\greetingevent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
