<?php
namespace App\Events\User\Register;
use App\Models\ActivationCode;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActivationEvent
{
    #listeners :
    /*
     * SendMailNotificationListener::class,
     * SendSMSNotificationListener::class,
     *
     * */
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private int $code;
    protected $user;

    public function __construct(User $user)
    {
        $this->user=$user;
        $this->code=ActivationCode::createCode($user);
    }

    public function getCode(){
        return $this->code;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function getPhone(){
        return $this->user->getPhone();
    }

    public function fire(){

    }
}
