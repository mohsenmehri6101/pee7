<?php
namespace App\Notifications\Channels;

use App\Http\Controllers\Tools\Notice\TEL;
use App\Models\Contact;
use App\Notifications\MainNotification;

class TelChannel
{
    public function send($user,MainNotification $notification)
    {
        # get information
        $message=$notification->toTel();
        //send message
        $chatID=Contact::GiveMeTelegramID($user);
        return $chatID ? TEL::fire(message: $message, chatID: $chatID) : false;
    }


}
