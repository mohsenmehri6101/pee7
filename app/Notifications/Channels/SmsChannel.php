<?php
namespace App\Notifications\Channels;

use App\Http\Controllers\Tools\Notice\SMS;
use App\Notifications\MainNotification;

class SmsChannel
{
    public function send($user,MainNotification $notification)
    {
        # get information
        $message=$notification->toSms();
        //send message
        $numberPhone= $user->phone ?? null;
        return $numberPhone ? SMS::fire($numberPhone,$message) : null;
    }

}
