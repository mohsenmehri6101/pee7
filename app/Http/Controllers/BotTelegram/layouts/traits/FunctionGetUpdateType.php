<?php
namespace App\Http\Controllers\BotTelegram\layouts\traits;

trait FunctionGetUpdateType
{
    // define variable
    public $fetchAudio=null;
    public $fetchVoice=null;
    public $fetchDocument=null;
    public $fetchVideo=null;
    public $fetchPhoto=null;
    public $fetchCaptionPhoto=null;
    public $fetchCaptionDocument=null;
    public $fetchCaptionAudio=null;
    public $fetchTitleAudio=null;
    public $fetchPerformerAudio=null;
    public $fetchCaptionVideo=null;
    public $fetchMessage=null;
    public $fetchCallbackQueryData=null;
    public $fetchCallbackQueryMessageText=null;
    public $fetchSticker=null;
    public $fetchReply=null;
    // define variable
    // fetch main method
    public function fetchInformation()
    {
        $this->request=$this->telegram->getData();
        //audio,voice,document,video,photo,message
        //get name function
        $nameFunction=$this->messageType=$this->telegram->getUpdateType();
        // run with name function
        //$this->$nameFunction();
    }
    // fetch main method

    //fetch  methods
    public function audio(){
        $this->fetchAudio=$this->request["message"]["audio"]["file_id"];
        $this->fetchCaptionAudio=isset($this->request["message"]["caption"])? $this->request["message"]["caption"]:null;
        $this->fetchTitleAudio=isset($this->request["message"]["audio"]["title"])? $this->request["message"]["audio"]["title"]:null;
        $this->fetchPerformerAudio=isset($this->request["message"]["audio"]["performer"])? $this->request["message"]["audio"]["performer"]:null;
    }
    public function voice(){
        $this->fetchVoice=$this->request["message"]["voice"]["file_id"];
    }
    public function document(){
        $this->fetchDocument=$this->request["message"]["document"]["file_id"];
        $this->fetchCaptionDocument=isset($this->request["message"]["caption"])? $this->request["message"]["caption"]:null;
    }
    public function video(){
        $this->fetchVideo=$this->request["message"]["video"]["file_id"];
        $this->fetchCaptionVideo=isset($this->request["message"]["caption"])? $this->request["message"]["caption"]:null;
    }
    public function animation(){}
    public function sticker(){
        $this->fetchSticker=$this->request["message"]["sticker"]["file_id"];
    }
    public function inline_query(){}
    public $fetchCallbackQuery=null;
    public function callback_query(){
        $this->fetchCallbackQueryData=$this->request["callback_query"]["data"];
        $this->fetchCallbackQueryMessageText=$this->request["callback_query"]["message"]["text"];
    }
    public function edited_message(){}
    public function contact(){}
    public function location(){}
    public function reply(){
        $this->reply=$this->request["message"]["reply_to_message"]["text"];
    }
    public function channel_post(){}
    public function photo(){
        //$this->saveImage();
        $this->fetchPhoto=$this->request["message"]["photo"][sizeof($this->request["message"]["photo"])-1]["file_id"];
    }
    public function message(){

        if (isset($this->request['message']['reply_to_message'])) {
            $this->fetchReply=$this->request["message"]["reply_to_message"]["text"];
        }
        $this->fetchMessage=isset($this->request["message"]["text"])? $this->request["message"]["text"]:null;
    }
    // fetch methods
    //send methods
    public function sendMessage(){}
    public function sendVoice(){ }
    public function sendAnimation(){}
    public function sendInlineQuery(){}
    public function sendCallbackQuery(){}
    public function sendEditedMessage(){}
    public function sendReply(){}
    public function sendChannel_post(){}
    public function sendContact($phoneNumber,$chatId,$firstName,$lastName=null){
        $content = [
            'chat_id' => $chatId,
            'phone_number'=>$phoneNumber,
            'first_name'=>$firstName,
            'last_name'=>$lastName
        ];
        return $this->telegram->sendContact($content);
    }
    public function sendLocation($latitude,$longitude,$chatId){
        $content = [
            'chat_id' => $chatId,
            'latitude' =>$latitude,
            'longitude'=>$longitude
        ];
        return $this->telegram->sendLocation($content);
    }
    public function sendSticker($sticker,$chatId){
        $content = [
            'chat_id' => $chatId,
            'sticker' => new \CURLFile(realpath('stickers/' . $sticker)),
        ];
        return $this->telegram->sendSticker($content);
    }
    public function sendDocument($document,$chatId,$caption=null){
        $content = [
            'chat_id' => $chatId,
            'document' => new \CURLFile(realpath('documents/' . $document)),
            'caption' => $caption,
        ];
        return $this->telegram->sendDocument($content);
    }
    public function sendVideo($video,$chatId,$caption=null){
        $content = [
            'chat_id' => $chatId,
            'video' => new \CURLFile(realpath('videos/' . $video)),
            'caption' => $caption,
        ];
        return $this->telegram->sendVideo($content);
    }
    public function sendPhoto($image,$chatId,$caption=null){
        //9C01604423434.jpg
        $content=[
            'chat_id'=>$chatId,
            'photo'=>new \CURLFile(realpath('images/'.$image)),
            'caption'=>$caption
        ];
        return $this->telegram->sendPhoto($content);
    }
    public function sendAudio($audio,$chatId,$caption=null,$title=null,$performer=null){
        //9C01604423434.jpg
        $content = [
            'chat_id' => $chatId,
            'audio' => new \CURLFile(realpath('audios/' . $audio)),
            'caption' => $caption,
            'title' => $title,
            'performer' => $performer,
        ];
        return $this->telegram->sendAudio($content);
    }
    // send methods
    // forward methods
    public function forwardMessage($chat_id)
    {
        $content =['chat_id' => $chat_id,
            'text' =>$this->getTextMessage(),
            'reply_markup'=>$this->menu];
        return $this->telegram->sendMessage($content);
    }
    public function forwardPhoto($chat_id)
    {
        $content=[
            'chat_id'=>$chat_id,
            'photo'=>$this->fetchPhoto,
            'caption'=>$this->fetchCaptionPhoto
        ];
        return $this->telegram->sendPhoto($content);
    }
    public function forwardDocument($chat_id)
    {
        $content=[
            'chat_id'=>$chat_id,
            'document'=>$this->fetchDocument,
            'caption'=>$this->fetchCaptionDocument
        ];
        return $this->telegram->sendDocument($content);
    }
    public function forwardAudio($chat_id)
    {
        $content=[
            'chat_id'=>$chat_id,
            'audio'=>$this->fetchAudio,
            'caption'=>$this->fetchCaptionAudio,
            'title'=>$this->fetchTitleAudio,
            'performer'=>$this->fetchPerformerAudio,
        ];
        return $this->telegram->sendAudio($content);
    }
    public function forwardSticker($chat_id)
    {
        $content =[
            'chat_id' => $chat_id,
            'sticker' =>$this->fetchSticker,
        ];
        return $this->telegram->sendSticker($content);
    }
    public function forwardVideo($chat_id)
    {
        $content=[
            'chat_id' => $chat_id,
            'video' => $this->fetchVideo,
            'caption' => $this->fetchCaptionVdieo,
        ];
        return $this->telegram->sendVideo($content);
    }
    public function forwardVoice($chat_id)
    {
        $content=[
            'chat_id' => $chat_id,
            'voice' => $this->fetchVoice,
        ];
        return $this->telegram->sendVoice($content);
    }
    public function forwardAnimation($chat_id)
    {
        /*$content=[
            'chat_id' => $chat_id,
            'animation' => $this->request["animation"]["file_id"],
        ];
        return $this->telegram->sendAnimation($content);*/
    }
    public function forwardMessageAll($chat_id)
    {
        $content=[
            'chat_id' => $chat_id,
            'from_chat_id'=>1494495227,
            'message_id'=>$this->request["message"]["message_id"],
            "disable_notification"=>false
        ];
        return $this->telegram->endpoint("forwardMessage",$content);
    }
    //copy methods
    // method Copy message (any kind like : video , message , audio ... )
    public function copyMessageAll($chat_id)
    {
        $content=[
            'chat_id'=>$chat_id,
            'from_chat_id'=>$chat_id,
            'message_id'=>$this->request["message"]["message_id"],
        ];
        /*'caption',
        'parse_mode',
        'caption_entities',
        'disable_notification',
        'reply_to_message_id',
        'allow_sending_without_reply',
        'reply_markup'*/
        return $this->telegram->endpoint("copyMessage",$content);
    }

    // get methods
    public function getAudio(){
            return $this->fetchAudio;
    }
    public function getVoice(){
            return $this->fetchVoice;
    }
    public function getDocument(){
            return $this->fetchDocument;
    }
    public function getVideo(){
            return $this->fetchVideo;
    }
    public function getAnimation(){
            //
    }
    public function getSticker(){
        return $this->fetchSticker;
    }
    public function getInlineQuery(){}
    public function getCallbackQuery(){
    }
    public function getEditedMessage(){}
    public function getContact(){}
    public function getLocation(){
        //
    }
    public function getReply(){
        return $this->fetchReply;
    }
    public function getChannelPost(){}
    public function getPhoto(){
        return $this->fetchPhoto;
    }
    public function getMessage(){
        return $this->fetchMessage;
    }
    // get methods
}
