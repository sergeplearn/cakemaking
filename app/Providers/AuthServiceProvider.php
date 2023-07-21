<?php

namespace App\Providers;

use App\Models\comment;
use App\Models\newcake;
use App\Models\replycomment;
use App\Models\User;
use App\Policies\adminregistrationPolicy;
use App\Policies\CakePolicy;
use App\Policies\CommentPolicy;
use App\Policies\RegisterPolicy;
use App\Policies\ReplycommentsPolicy;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        newcake::class => CakePolicy::class,
        comment::class => CommentPolicy::class,
        User::class => RegisterPolicy::class,
        User::class => adminregistrationPolicy::class,
        replycomment::class => ReplycommentsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
