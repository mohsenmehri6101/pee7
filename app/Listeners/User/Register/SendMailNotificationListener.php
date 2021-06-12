<?php
namespace App\Listeners\User\Register;
use App\Events\User\Register\UserActivationEvent;
use App\Mail\MailActivationUserAccount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailNotificationListener
{
    public function __construct()
    {
        //
    }

    public function handle(UserActivationEvent $event)
    {
        /*if($this->checkSessionConfirm())
        {
            Mail::to($event->user)->send(new MailActivationUserAccount($event->user, $event->activationCodeEmail,$event->activationCodePhone));
        }*/
    }
}
