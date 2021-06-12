<?php
namespace App\Http\Controllers\Tools\Notice;

use App\Http\Controllers\Tools\Notice\Layouts\NoticeDB;
use App\Http\Controllers\Tools\Notice\layouts\notificationInterface;
use App\Mail\MainMail;
use App\User;
use Illuminate\Support\Facades\Mail as MailFacadeLaravel;

class MAIL extends NoticeDB implements notificationInterface
{
    public  const TYPE="MAIL";
    public static function saveInDB($message,$email){

        # to
        $user=User::whereEmail($email)->first();
        $to=isset($user) ? $user->id : null;

        static::noticeInDatabase($message,$to,self::TYPE);
    }


    /**
     * @param $message
     * @param $email
     * @return bool
     */
    public static function fire($message, $email): bool
    {
        #save in DB
        static::saveInDB($email,$message);
        # send email
        return MailFacadeLaravel::to($email)->send(new MainMail($message)) ? true : false;
    }
}
