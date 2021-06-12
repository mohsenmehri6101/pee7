<?php
namespace App\Notifications\Channels;

use App\Notifications\MainNotification;

class DbChannel
{
    public function send($user,MainNotification $notification)
    {
        # get information
        $data=$notification->toArray($user);

        //send message
        return $user->notifications()->firstOrCreate([
            'type'=>get_class($notification),
            'data'=>$data,
            'notifiable_type'=>get_class($user)
        ]);
    }
}
