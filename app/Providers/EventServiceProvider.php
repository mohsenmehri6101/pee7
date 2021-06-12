<?php
namespace App\Providers;
use App\Events\User\Register\UserActivationEvent;
use App\Listeners\User\Register\SendMailNotificationListener;
use App\Listeners\User\Register\SendSMSNotificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserActivationEvent::class => [
            SendSMSNotificationListener::class
        ],
    ];

    public function boot()
    {
        parent::boot();
        //
    }
}
