<?php

namespace App\Providers;

use App\Events\Createnewregisteredusers;
use App\Events\greetingevent;
use App\Events\NewcakeCreated;
use App\Events\Newuserhasregisteredevent;
use App\Listeners\greetinglistener;
use App\Listeners\SendNewcakeNotifications;
use App\Listeners\SendNewRegistedNotifications;
use App\Listeners\welcomenewuserListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        NewcakeCreated::class => [
            SendNewcakeNotifications::class,
        ],
        Createnewregisteredusers::class => [
            SendNewRegistedNotifications::class,
        ],
        greetingevent::class => [
            greetinglistener::class,
        ],

        Newuserhasregisteredevent::class => [
            welcomenewuserListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
