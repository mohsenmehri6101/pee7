<?php
namespace App\Listeners\User\Register;

use App\Events\User\Register\UserActivationEvent;
use App\Mail\MailActivationUserAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSMSNotificationListener
{
    public function __construct()
    {
        //
    }


    public function handle(UserActivationEvent $event): bool
    {
        # dd($event->getCode(),$event->getPhone());
        # sendMessagePhone(string|int $message,$phone): bool
        return sendMessagePhone($event->getCode(),$event->getPhone());
    }
}
