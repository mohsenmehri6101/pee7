<?php
namespace App;

use App\Notifications\Channels\MailChannel;
use App\Notifications\Channels\SmsChannel;
use App\Notifications\Channels\TelChannel;
use App\Traits\Model\User\defineRelationshipsUserTrait;
use App\Traits\Model\User\hasRole;
use App\Traits\Model\User\UserModelTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    use defineRelationshipsUserTrait;
    use hasRole;
    use UserModelTrait;

    protected $fillable=['name','phone','username','completeInfo','email','notification','password','level','active','image','is_ban'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime','notification'=>'array'];

    public function changeIsBan()
    {
        return $this->update(['is_ban'=>!$this->is_ban]);
    }
    public function isBan()
    {
        return $this->is_ban;
    }

    //refactor this function
    public function routeNotificationFor($driver, $notification = null)
    {
        if (method_exists($this, $method = 'routeNotificationFor'.Str::studly($driver))) {
            return $this->{$method}($notification);
        }

        switch ($driver) {
            case 'database':
                return $this->notifications();
            case 'mail':
                return MailChannel::class;
            case 'sms':
                return (SmsChannel::class);
            case 'telegram':
                return TelChannel::class;
        }
    }
}
