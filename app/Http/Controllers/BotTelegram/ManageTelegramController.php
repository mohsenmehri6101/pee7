<?php

namespace App\Http\Controllers\BotTelegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageTelegramController extends TelegramController
{
    public function requestApiPost($url,$content=null,$post=false)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    public function __construct()
    {
        parent::__construct();
    }

    public function indexGet()
    {
        //1318412648
        //$this->responseMessage('ok ok ok ','1318412648');
        return response()->json(['name'=>'masud joon'],200);
        return $this->telegram->sendMessage();
        return "hi";
    }

    public function index(Request $request)
    {
        return $this->responseMessage("oopps for yourself");
    }



    public function setHook($url)
    {
        $url="https://".$url.".ngrok.io";
        return $this->telegram->setWebhook($url);
    }

    public function deleteHook(){
        return $this->telegram->deleteWebhook();
    }

    public function getHook()
    {
        return $this->telegram->endpoint('getWebhookInfo', [], false);
    }
}
