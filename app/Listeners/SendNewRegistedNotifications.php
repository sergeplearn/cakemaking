<?php

namespace App\Listeners;

use App\Events\Createnewregisteredusers;
use App\Mail\Sende_email_to_new_user;
use App\Models\User;
use Mail;

class SendNewRegistedNotifications
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
    public function handle(Createnewregisteredusers $event): void
    {
        $user = User::find($event->User->id)->toArray();
        Mail::to('shemlonsergeyuka14@gmail.com', $user)->send(new Sende_email_to_new_user());

    }
}
