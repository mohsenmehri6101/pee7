<?php
namespace App\Notifications;

use App\Notifications\Channels\MailChannel;
use App\Notifications\Channels\SmsChannel;
use App\Notifications\Channels\TelChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use JetBrains\PhpStorm\ArrayShape;

class MainNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $textMessage;
    public $notifications=array();

    /**
     * MainNotification constructor.
     * @param $textMessage
     * @param array|null $notifications
     */
    public function __construct($textMessage, array $notifications=null)
    {
        $this->notifications=$notifications;
        $this->textMessage=$textMessage;
    }

    private function listNotification($user)
    {
        $channels=array();
        $notifications=$user->notification;
        foreach($notifications as $item)
        {
            switch($item)
            {
                case 'sms':
                    array_push($channels, SmsChannel::class);
                    break;
                case 'database':
                    array_push($channels, 'database');
                    break;
                case 'email':
                    array_push($channels, MailChannel::class);
                    break;
                case 'telegram':
                    array_push($channels, TelChannel::class);
                    break;
            }
        }
        return $channels;
    }

    public function via($notifiable)
    {
        return $this->notifications ?? $this->listNotification($notifiable);
    }

    #[ArrayShape(['from' => "null", 'to' => "mixed", 'message' => ""])]
    public function toArray($notifiable): array
    {
        $from=giveIdUserLoggedIn();
        return [
            'from'=>$from,
            'to'=>$notifiable->getAuthIdentifier(),
            'message'=>$this->textMessage,
        ];
    }

    public function toSms(){
        return $this->textMessage;
    }

    public function toEmail(){
        return $this->textMessage;
    }

    public function toTel(){
        return $this->textMessage;
    }

}
