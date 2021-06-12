<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $fillable=['user_id','code','expire'];
    public $timestamps=false;
    private static $expireTime=60;

    public static function GetMeCodeForUser(User $user){
        return static::where('user_id',$user->id)->first()->code;
    }

    public static function GetMeCodeObjectForUser(User $user){
        return static::where('user_id',$user->id)->first();
    }

    private static function code()
    {
        do
        {
            $code = mt_rand(100000, 999999);
        }
        while
        (
            (static::where('code',$code)->get())->isNotEmpty()
        );
        return $code;
    }

    public static function createCode(User $user){
        # create code random
        $code=self::code();
        $user->activationCode()->updateOrCreate(
            ['user_id'=>$user->id]
            ,
            [
                'code'=>$code,
                'expire'=>now()->addSeconds((int)self::$expireTime)
            ]
        );
        # return code
        return $code;
    }

    public static function GetMeUserForCode($code)
    {
        // back user for this code
        return static::whereCode($code)->first()->user()->first();
    }

    public static function DeleteActiveCodeForUser(User $user)
    {
        return static::where('user_id',$user->id)->delete();
    }

    public function checkExpire(): bool
    {
        return $this->getExpire() >= now();
    }

    public static function checkCodAndExpire($code): bool
    {
        return (bool)static::whereCode($code)->where('expire', '>=', now())->first();
    }

    public static function checkCode($code): bool
    {
        return static::whereCode($code)->first() ? true : false;
    }

    public function getCode(){
        return $this->code;
    }

    public function getIdUser(){
        return $this->user_id;
    }

    public function getExpire()
    {
        return $this->expire;

    }

    # Defining Relationships
    public function User(){
        return $this->belongsTo(User::class);
    }
}
