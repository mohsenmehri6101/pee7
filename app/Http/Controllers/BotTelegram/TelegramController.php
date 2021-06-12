<?php
namespace App\Http\Controllers\BotTelegram;

use App\Http\Controllers\BotTelegram\layouts\telegram\Telegram;
use App\Http\Controllers\BotTelegram\layouts\traits\FunctionGetUpdateType;
use App\Http\Controllers\Controller;

class TelegramController extends Controller
{
    //public $user=['username'=>null,'last_name'=>null,'first_name'=>null,'chat_id'=>null,'switch'=>null];
    public $telegram,$request,$text,$chat_id,$messageType,$menu=null;
    use FunctionGetUpdateType;
    public function __construct()
    {
        //set api token telegram
        $this->telegram = new Telegram(env('TELEGRAM_TOKEN'),false);

        //fetch information
        $this->fetchInformation();
    }

    public function forceReplyMessage($text,$chat_id=null)
    {
        if(!$chat_id)
            $chat_id=$this->getChatId();
        $content = array('chat_id' => $chat_id, 'text' =>$text,'reply_markup'=>$this->telegram->buildForceReply());
        $this->telegram->sendMessage($content);
    }

    public function replyToMessage($text,$chat_id=null)
    {
        if(!$chat_id)
            $chat_id=$this->getChatId();
        $content = array(
            'chat_id' => $chat_id,
            'text' =>$text,
            'reply_markup'=>$this->menu,
            'reply_to_message_id'=>$this->request["message"]["message_id"]);
        $this->telegram->sendMessage($content);
    }

    /**
     * @param $text
     * @param null $chat_id
     */
    public function responseMessage($text, $chat_id=null)
    {
        if(!$chat_id)
            $chat_id=$this->getChatId();
        $content = array('chat_id' => $chat_id, 'text' =>$text,'reply_markup'=>$this->menu);
        $this->telegram->sendMessage($content);
    }


    public function getTextMessage()
    {
        return isset($this->request["message"]["text"]) ? $this->request["message"]["text"] : null;
    }

    public function getChatId()
    {
        return $this->telegram->ChatID();
    }

    public function omen()
    {

    }
}
