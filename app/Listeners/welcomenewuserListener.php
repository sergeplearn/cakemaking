<?php

namespace App\Listeners;

use App\Events\Newuserhasregisteredevent;
use App\Mail\registeduser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class welcomenewuserListener implements ShouldQueue
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
    public function handle(Newuserhasregisteredevent $event): void
    {
        sleep(10);
        Mail::to($event->User->email, $event->User->name)->send(new registeduser($event->User));
    }
}
