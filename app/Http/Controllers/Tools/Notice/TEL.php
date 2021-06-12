<?php
namespace App\Http\Controllers\Tools\Notice;

use App\Http\Controllers\BotTelegram\layouts\telegram\Telegram;
use App\Http\Controllers\Tools\Notice\Layouts\NoticeDB;
use App\Http\Controllers\Tools\Notice\layouts\notificationInterface;
use App\Models\Contact;

class TEL extends NoticeDB implements notificationInterface
{
    public  const TYPE="TEL";

    public static function saveInDB($message,$chatId){
        $to=Contact::GiveMeUserIDForThisTelegramId($chatId);
        static::noticeInDatabase($message,$to,self::TYPE);
    }

    public static function fire($message, $chatID)
    {
        #save in DB
        static::saveInDB($chatID,$message);
        # send email
        return false;
        #return static::sendMessage($idChat,$textMessage) ? true : false;
    }

    private static function sendMessage($text, $chat_id){
        $telegram=new Telegram(env('TELEGRAM_TOKEN',false));
        $content = array('chat_id' => $chat_id, 'text' =>$text);
        static::$telegram->sendMessage($content);
    }
}
