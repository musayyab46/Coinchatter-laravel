<?php

namespace App\Providers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;


class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(Registered::class, function ($event) {
            $user = $event->user;
            $user->referral_code = strtoupper(Str::random(10));
            $user->save();
        });
    
    }
}
