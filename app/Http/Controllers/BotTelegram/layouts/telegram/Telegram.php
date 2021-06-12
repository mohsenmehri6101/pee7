<?php
namespace App\Http\Controllers\BotTelegram\layouts\telegram;

use TelegramErrorLogger;

class Telegram
{

    // Class constructor

    /**
     * Create a Telegram instance from the bot token
     * \param $bot_token the bot token
     * \param $log_errors enable or disable the logging
     * \param $proxy array with the proxy configuration (url, port, type, auth)
     * \return an instance of the class.
     */
    public function __construct($bot_token=null, $log_errors = true, array $proxy = [])
    {
        $this->bot_token = $bot_token;
        $this->data = $this->getData();
        $this->log_errors = $log_errors;
        $this->proxy = $proxy;
    }
    /**
     * Constant for type Inline Query.
     */
    const INLINE_QUERY = 'inline_query';
    /**
     * Constant for type Callback Query.
     */
    const CALLBACK_QUERY = 'callback_query';
    /**
     * Constant for type Edited Message.
     */
    const EDITED_MESSAGE = 'edited_message';
    /**
     * Constant for type Reply.
     */
    const REPLY = 'reply';
    /**
     * Constant for type Message.
     */
    const MESSAGE = 'message';
    /**
     * Constant for type Photo.
     */
    const PHOTO = 'photo';
    /**
     * Constant for type Video.
     */
    const VIDEO = 'video';
    /**
     * Constant for type Audio.
     */
    const AUDIO = 'audio';
    /**
     * Constant for type Voice.
     */
    const VOICE = 'voice';
    /**
     * Constant for type animation.
     */
    const ANIMATION = 'animation';
    /**
     * Constant for type sticker.
     */
    const STICKER = 'sticker';
    /**
     * Constant for type Document.
     */
    const DOCUMENT = 'document';
    /**
     * Constant for type Location.
     */
    const LOCATION = 'location';
    /**
     * Constant for type Contact.
     */
    const CONTACT = 'contact';
    /**
     * Constant for type Channel Post.
     */
    const CHANNEL_POST = 'channel_post';

    private $bot_token = '';
    private $data = [];
    private $updates = [];
    private $log_errors;
    private $proxy;



    // Do requests to Telegram Bot API

    public function endpoint($api, array $content, $post = true)
    {
        $url = 'https://api.telegram.org/bot'.$this->bot_token.'/'.$api;
        if ($post) {
            $reply = $this->sendAPIRequest($url, $content);
        } else {
            $reply = $this->sendAPIRequest($url, [], false);
        }

        return json_decode($reply, true);
    }

    // A method for testing your bot.

    public function getMe()
    {
        return $this->endpoint('getMe', [], false);
    }

    // A method for responding http to Telegram.

    public function respondSuccess()
    {
        http_response_code(200);

        return json_encode(['status' => 'success']);
    }

    // Send a message
    public function sendMessage(array $content)
    {
        return $this->endpoint('sendMessage', $content);
    }

    // Forward a message
    public function forwardMessage(array $content)
    {
        return $this->endpoint('forwardMessage', $content);
    }

    // Send a photo
    public function sendPhoto(array $content)
    {
        return $this->endpoint('sendPhoto', $content);
    }

    // Send an audio
    public function sendAudio(array $content)
    {
        return $this->endpoint('sendAudio', $content);
    }

    // Send a document
    public function sendDocument(array $content)
    {
        return $this->endpoint('sendDocument', $content);
    }

    // Send an animation
    public function sendAnimation(array $content)
    {
        return $this->endpoint('sendAnimation', $content);
    }

    // Send a sticker
    public function sendSticker(array $content)
    {
        return $this->endpoint('sendSticker', $content);
    }

    // Send a video

    public function sendVideo(array $content)
    {
        return $this->endpoint('sendVideo', $content);
    }

    // Send a voice message
    public function sendVoice(array $content)
    {
        return $this->endpoint('sendVoice', $content);
    }

    // Send a location
    public function sendLocation(array $content)
    {
        return $this->endpoint('sendLocation', $content);
    }

    // Edit Message Live Location
    public function editMessageLiveLocation(array $content)
    {
        return $this->endpoint('editMessageLiveLocation', $content);
    }

    // Stop Message Live Location
    public function stopMessageLiveLocation(array $content)
    {
        return $this->endpoint('stopMessageLiveLocation', $content);
    }

    // Set Chat Sticker Set
    public function setChatStickerSet(array $content)
    {
        return $this->endpoint('setChatStickerSet', $content);
    }

    // Delete Chat Sticker Set
    public function deleteChatStickerSet(array $content)
    {
        return $this->endpoint('deleteChatStickerSet', $content);
    }

    // Send Media Group
    public function sendMediaGroup(array $content)
    {
        return $this->endpoint('sendMediaGroup', $content);
    }

    // Send Venue
    public function sendVenue(array $content)
    {
        return $this->endpoint('sendVenue', $content);
    }

    //Send contact
    public function sendContact(array $content)
    {
        return $this->endpoint('sendContact', $content);
    }

    // Send a chat action
    public function sendChatAction(array $content)
    {
        return $this->endpoint('sendChatAction', $content);
    }

    // Get a list of profile pictures for a user
    public function getUserProfilePhotos(array $content)
    {
        return $this->endpoint('getUserProfilePhotos', $content);
    }

    // Use this method to get basic info about a file and prepare it for downloading
    public function getFile($file_id)
    {
        $content = ['file_id' => $file_id];

        return $this->endpoint('getFile', $content);
    }

    // Kick Chat Member
    public function kickChatMember(array $content)
    {
        return $this->endpoint('kickChatMember', $content);
    }

    // Leave Chat
    public function leaveChat(array $content)
    {
        return $this->endpoint('leaveChat', $content);
    }

    // un_ban Chat Member
    public function unbanChatMember(array $content)
    {
        return $this->endpoint('unbanChatMember', $content);
    }

    // Get Chat Information
    public function getChat(array $content)
    {
        return $this->endpoint('getChat', $content);
    }
    public function getChatAdministrators(array $content)
    {
        return $this->endpoint('getChatAdministrators', $content);
    }
    public function getChatMembersCount(array $content)
    {
        return $this->endpoint('getChatMembersCount', $content);
    }

    public function getChatMember(array $content)
    {
        return $this->endpoint('getChatMember', $content);
    }
    public function answerInlineQuery(array $content)
    {
        return $this->endpoint('answerInlineQuery', $content);
    }

    // Set Game Score
    public function setGameScore(array $content)
    {
        return $this->endpoint('setGameScore', $content);
    }

    // Answer a callback Query
    public function answerCallbackQuery(array $content)
    {
        return $this->endpoint('answerCallbackQuery', $content);
    }
    public function editMessageText(array $content)
    {
        return $this->endpoint('editMessageText', $content);
    }
    public function editMessageCaption(array $content)
    {
        return $this->endpoint('editMessageCaption', $content);
    }
    public function editMessageReplyMarkup(array $content)
    {
        return $this->endpoint('editMessageReplyMarkup', $content);
    }

    // Use this method to download a file
    public function downloadFile($telegram_file_path, $local_file_path)
    {
        $file_url = 'https://api.telegram.org/file/bot'.$this->bot_token.'/'.$telegram_file_path;
        $in = fopen($file_url, 'rb');
        $out = fopen($local_file_path, 'wb');

        while ($chunk = fread($in)) {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }

    // Set a WebHook for the bot
    public function setWebhook($url, $certificate = '')
    {
        if ($certificate == '') {
            $requestBody = ['url' => $url];
        } else {
            $requestBody = ['url' => $url, 'certificate' => "@$certificate"];
        }

        return $this->endpoint('setWebhook', $requestBody, true);
    }

    // Delete the WebHook for the bot
    public function deleteWebhook()
    {
        return $this->endpoint('deleteWebhook', [], false);
    }

    // Get the data of the current message
    public function getData()
    {
        if (empty($this->data)) {
            $rawData = file_get_contents('php://input');

            return json_decode($rawData, true);
        } else {
            return $this->data;
        }
    }

    // Set the data currently used
    public function setData(array $data)
    {
        $this->data = $data;
    }

    // Get the text of the current message
    public function Text()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['data'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['text'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['text'];
        }

        return @$this->data['message']['text'];
    }

    public function Caption()
    {
	$type = $this->getUpdateType();
	if ($type == self::CHANNEL_POST) {
		return @$this->data['channel_post']['caption'];
	}
	return @$this->data['message']['caption'];
    }

    // Get the chat_id of the current message
    public function ChatID()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['message']['chat']['id'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['chat']['id'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['chat']['id'];
        }
        if ($type == self::INLINE_QUERY) {
            return @$this->data['inline_query']['from']['id'];
        }

        return $this->data['message']['chat']['id'];
    }

    // Get the message_id of the current message
    public function MessageID()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['message']['message_id'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['message_id'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['message_id'];
        }

        return $this->data['message']['message_id'];
    }

    // Get the reply_to_message message_id of the current message
    public function ReplyToMessageID()
    {
        return $this->data['message']['reply_to_message']['message_id'];
    }

    // Get the reply_to_message text of the current message
    public function ReplyToMessageText()
    {
        return $this->data['message']['reply_to_message']['text'];
    }

    // Get the reply_to_message forward_from user_id of the current message
    public function ReplyToMessageFromUserID()
    {
        return $this->data['message']['reply_to_message']['forward_from']['id'];
    }

    // Get the inline_query of the current update
    public function Inline_Query()
    {
        return $this->data['inline_query'];
    }

    // Get the callback_query of the current update
    public function Callback_Query()
    {
        return $this->data['callback_query'];
    }

    // Get the callback_query id of the current update
    public function Callback_ID()
    {
        return $this->data['callback_query']['id'];
    }

    // Get the Get the data of the current callback
    public function Callback_Data()
    {
        return $this->data['callback_query']['data'];
    }

    // Get the Get the message of the current callback
    public function Callback_Message()
    {
        return $this->data['callback_query']['message'];
    }

    // Get the Get the chati_id of the current callback
    public function Callback_ChatID()
    {
        return $this->data['callback_query']['message']['chat']['id'];
    }

    // Get the date of the current message
    public function Date()
    {
        return $this->data['message']['date'];
    }

    // Get the first name of the user
    public function FirstName()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['from']['first_name'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['from']['first_name'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['from']['first_name'];
        }

        return @$this->data['message']['from']['first_name'];
    }

    // Get the last name of the user
    public function LastName()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['from']['last_name'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['from']['last_name'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['from']['last_name'];
        }

        return @$this->data['message']['from']['last_name'];
    }

    // Get the username of the user
    public function Username()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return @$this->data['callback_query']['from']['username'];
        }
        if ($type == self::CHANNEL_POST) {
            return @$this->data['channel_post']['from']['username'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['from']['username'];
        }

        return @$this->data['message']['from']['username'];
    }

    // Get the location in the message
    public function Location()
    {
        return $this->data['message']['location'];
    }

    // Get the update_id of the message
    public function UpdateID()
    {
        return $this->data['update_id'];
    }

    // Get the number of updates
    public function UpdateCount()
    {
        return count($this->updates['result']);
    }

    // Get user's id of current message
    public function UserID()
    {
        $type = $this->getUpdateType();
        if ($type == self::CALLBACK_QUERY) {
            return $this->data['callback_query']['from']['id'];
        }
        if ($type == self::CHANNEL_POST) {
            return $this->data['channel_post']['from']['id'];
        }
        if ($type == self::EDITED_MESSAGE) {
            return @$this->data['edited_message']['from']['id'];
        }

        return $this->data['message']['from']['id'];
    }

    // Get user's id of current forwarded message
    public function FromID()
    {
        return $this->data['message']['forward_from']['id'];
    }

    // Get chat's id where current message forwarded from
    public function FromChatID()
    {
        return $this->data['message']['forward_from_chat']['id'];
    }

    // Tell if a message is from a group or user chat
    public function messageFromGroup()
    {
        if ($this->data['message']['chat']['type'] == 'private') {
            return false;
        }

        return true;
    }

    // Get the title of the group chat
    public function messageFromGroupTitle()
    {
        if ($this->data['message']['chat']['type'] != 'private') {
            return $this->data['message']['chat']['title'];
        }
    }

    // Set a custom keyboard
    public function buildKeyBoard(array $options, $onetime = false, $resize = false, $selective = true)
    {
        $replyMarkup = [
            'keyboard'          => $options,
            'resize_keyboard'   => $resize,
            'one_time_keyboard' => $onetime,
            'selective'         => $selective,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);

        return $encodedMarkup;
    }

    // Set an InlineKeyBoard
    public function buildInlineKeyBoard(array $options)
    {
        $replyMarkup = [
            'inline_keyboard' => $options,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);
        return $encodedMarkup;
    }

    // Create an InlineKeyboardButton
    public function buildInlineKeyboardButton($text, $url = '', $callback_data = '', $switch_inline_query = null, $switch_inline_query_current_chat = null, $callback_game = '', $pay = '')
    {
        $replyMarkup = [
            'text' => $text,
        ];
        if ($url != '') {
            $replyMarkup['url'] = $url;
        } elseif ($callback_data != '') {
            $replyMarkup['callback_data'] = $callback_data;
        } elseif (!is_null($switch_inline_query)) {
            $replyMarkup['switch_inline_query'] = $switch_inline_query;
        } elseif (!is_null($switch_inline_query_current_chat)) {
            $replyMarkup['switch_inline_query_current_chat'] = $switch_inline_query_current_chat;
        } elseif ($callback_game != '') {
            $replyMarkup['callback_game'] = $callback_game;
        } elseif ($pay != '') {
            $replyMarkup['pay'] = $pay;
        }

        return $replyMarkup;
    }

    // Create a KeyboardButton
    public function buildKeyboardButton($text, $request_contact = false, $request_location = false)
    {
        $replyMarkup = [
            'text'             => $text,
            'request_contact'  => $request_contact,
            'request_location' => $request_location,
        ];

        return $replyMarkup;
    }

    // Hide a custom keyboard
    public function buildKeyBoardHide($selective = true)
    {
        $replyMarkup = [
            'remove_keyboard' => true,
            'selective'       => $selective,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);

        return $encodedMarkup;
    }

    // Display a reply interface to the user
    public function buildForceReply($selective = true)
    {
        $replyMarkup = [
            'force_reply' => true,
            'selective'   => $selective,
        ];
        $encodedMarkup = json_encode($replyMarkup, true);

        return $encodedMarkup;
    }

    // Payments
    // Send an invoice
    public function sendInvoice(array $content)
    {
        return $this->endpoint('sendInvoice', $content);
    }

    // Answer a shipping query
    public function answerShippingQuery(array $content)
    {
        return $this->endpoint('answerShippingQuery', $content);
    }

    // Answer a PreCheckout query
    public function answerPreCheckoutQuery(array $content)
    {
        return $this->endpoint('answerPreCheckoutQuery', $content);
    }

    // Send a video note
    public function sendVideoNote(array $content)
    {
        return $this->endpoint('sendVideoNote', $content);
    }

    // Restrict Chat Member
    public function restrictChatMember(array $content)
    {
        return $this->endpoint('restrictChatMember', $content);
    }

    // Promote Chat Member
    public function promoteChatMember(array $content)
    {
        return $this->endpoint('promoteChatMember', $content);
    }

    /// Export Chat Invite Link
    public function exportChatInviteLink(array $content)
    {
        return $this->endpoint('exportChatInviteLink', $content);
    }

    // Set Chat Photo
    public function setChatPhoto(array $content)
    {
        return $this->endpoint('setChatPhoto', $content);
    }

    // Delete Chat Photo
    public function deleteChatPhoto(array $content)
    {
        return $this->endpoint('deleteChatPhoto', $content);
    }

    // Set Chat Title
    public function setChatTitle(array $content)
    {
        return $this->endpoint('setChatTitle', $content);
    }

    // Set Chat Description
    public function setChatDescription(array $content)
    {
        return $this->endpoint('setChatDescription', $content);
    }

    // Pin Chat Message
    public function pinChatMessage(array $content)
    {
        return $this->endpoint('pinChatMessage', $content);
    }

    // Unpin Chat Message
    public function unpinChatMessage(array $content)
    {
        return $this->endpoint('unpinChatMessage', $content);
    }

    // Get Sticker Set
    public function getStickerSet(array $content)
    {
        return $this->endpoint('getStickerSet', $content);
    }

    // Upload Sticker File
    public function uploadStickerFile(array $content)
    {
        return $this->endpoint('uploadStickerFile', $content);
    }

    // Create New Sticker Set
    public function createNewStickerSet(array $content)
    {
        return $this->endpoint('createNewStickerSet', $content);
    }

    // Add Sticker To Set
    public function addStickerToSet(array $content)
    {
        return $this->endpoint('addStickerToSet', $content);
    }

    // Set Sticker Position In Set
    public function setStickerPositionInSet(array $content)
    {
        return $this->endpoint('setStickerPositionInSet', $content);
    }

    // Delete Sticker From Set
    public function deleteStickerFromSet(array $content)
    {
        return $this->endpoint('deleteStickerFromSet', $content);
    }

    // Delete a message
    public function deleteMessage(array $content)
    {
        return $this->endpoint('deleteMessage', $content);
    }

    // Receive incoming messages using polling
    public function getUpdates($offset = 0, $limit = 100, $timeout = 0, $update = true)
    {
        $content = ['offset' => $offset, 'limit' => $limit, 'timeout' => $timeout];
        $this->updates = $this->endpoint('getUpdates', $content);
        if ($update) {
            if (is_array($this->updates['result']) && count($this->updates['result']) >= 1) { //for CLI working.
                $last_element_id = $this->updates['result'][count($this->updates['result']) - 1]['update_id'] + 1;
                $content = ['offset' => $last_element_id, 'limit' => '1', 'timeout' => $timeout];
                $this->endpoint('getUpdates', $content);
            }
        }

        return $this->updates;
    }

    // Serve an update
    public function serveUpdate($update)
    {
        $this->data = $this->updates['result'][$update];
    }

    // Return current update type
    public function getUpdateType()
    {
        $update = $this->data;
        if (isset($update['inline_query'])) {
            return self::INLINE_QUERY;
        }
        if (isset($update['callback_query'])) {
            return self::CALLBACK_QUERY;
        }
        if (isset($update['edited_message'])) {
            return self::EDITED_MESSAGE;
        }
        if (isset($update['message']['text'])) {
            return self::MESSAGE;
        }
        if (isset($update['message']['photo'])) {
            return self::PHOTO;
        }
        if (isset($update['message']['video'])) {
            return self::VIDEO;
        }
        if (isset($update['message']['audio'])) {
            return self::AUDIO;
        }
        if (isset($update['message']['voice'])) {
            return self::VOICE;
        }
        if (isset($update['message']['contact'])) {
            return self::CONTACT;
        }
        if (isset($update['message']['location'])) {
            return self::LOCATION;
        }
        if (isset($update['message']['reply_to_message'])) {
            return self::REPLY;
        }
        if (isset($update['message']['animation'])) {
            return self::ANIMATION;
        }
        if (isset($update['message']['sticker'])) {
                return self::STICKER;
        }
        if (isset($update['message']['document'])) {
                return self::DOCUMENT;
        }
        if (isset($update['channel_post'])) {
            return self::CHANNEL_POST;
        }
        return false;
        }

    private function sendAPIRequest($url, array $content, $post = true)
    {
        if (isset($content['chat_id'])) {
            $url = $url.'?chat_id='.$content['chat_id'];
            unset($content['chat_id']);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        }
        // 		echo "inside curl if";
        if (!empty($this->proxy)) {
            // 			echo "inside proxy if";
            if (array_key_exists('type', $this->proxy)) {
                curl_setopt($ch, CURLOPT_PROXYTYPE, $this->proxy['type']);
            }

            if (array_key_exists('auth', $this->proxy)) {
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy['auth']);
            }

            if (array_key_exists('url', $this->proxy)) {
                // 				echo "Proxy Url";
                curl_setopt($ch, CURLOPT_PROXY, $this->proxy['url']);
            }

            if (array_key_exists('port', $this->proxy)) {
                // 				echo "Proxy port";
                curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxy['port']);
            }
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        if ($result === false) {
            $result = json_encode(['ok'=>false, 'curl_error_code' => curl_errno($ch), 'curl_error' => curl_error($ch)]);
        }
        curl_close($ch);
        if ($this->log_errors) {
            if (class_exists('TelegramErrorLogger')) {
                $loggerArray = ($this->getData() == null) ? [$content] : [$this->getData(), $content];
                TelegramErrorLogger::log(json_decode($result, true), $loggerArray);
            }
        }

        return $result;
    }
}

// Helper for Uploading file using CURL
if (!function_exists('curl_file_create')) {
    function curl_file_create($filename, $mimetype = '', $postname = '')
    {
        return "@$filename;filename="
        .($postname ?: basename($filename))
        .($mimetype ? ";type=$mimetype" : '');
    }
}
