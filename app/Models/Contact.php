<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['fax','mobiles','phones','telegram','website','telegram_id','user_id','agency_id'];
    protected $casts=['mobiles'=>'array','phones'=>'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Agency(){
        return $this->belongsTo(Agency::class);
    }

    public static  function GiveMeTelegramID(User $user)
    {
        return static::where('user_id',$user->id)->first()->telegram_id ?? null;
    }
    public static  function GiveMeUserIDForThisTelegramId($chatID)
    {
        return static::where('telegram_id',$chatID)->first()->user_id ?? null;
    }
}
