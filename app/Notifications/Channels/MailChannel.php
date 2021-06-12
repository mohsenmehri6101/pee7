<?php
namespace App\Notifications\Channels;

use App\Http\Controllers\Tools\Notice\MAIL;
use App\Notifications\MainNotification;

class MailChannel
{
    public function send($user,MainNotification $notification)
    {
        # get information
        $message=$notification->toEmail();

        //send message
        $email= $user->email ?? null;
        return $email ? MAIL::fire(message: $message, email: $email) : null;
    }

}
