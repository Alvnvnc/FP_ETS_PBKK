<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Listeners\RedirectIfAuthenticated;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Event Laravel default
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\SendEmailVerificationNotification',
        ],

        // Event untuk login
        Login::class => [
            RedirectIfAuthenticated::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
