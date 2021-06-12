<?php
namespace App\Http\Controllers\Auth\Traits\ForgetPassword;

use App\Mail\ForgetPasswordEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use DB;

trait ForgotPasswordControllerPrivateFunctionTrait
{

    protected function sendEmail(User $user,$token){
        Mail::to($user->email)->send(new forgetPasswordEmail($user,$token));
    }

    protected function sendMessage(User $user,$token){
        #$message="رمز یکبار مصرف"."   ".$token;
        $message=$token;
        return sendMessagePhone($message,$user->getPhone());
    }

    private function updateUpdatedAtPasswordReset($phone=null,$email=null)
    {
        DB::table('password_resets')
            ->where('phone',$phone)
            ->orWhere('email', $email)
            ->update(['updated_at'=>now()]);
    }

    protected function createOrGetToken(User $user)
    {
        if (! $this->checkPasswordReset($user))
        {
            $this->PASSWORD_REST_LINK=true;
            $this->createPasswordReset($user);
        }
        $this->updateToken($user);
        return $this->getPasswordReset($user);
    }

    protected function getPasswordReset(User $user){
        return DB::table('password_resets')
            ->where('phone',$user->phone)
            ->orWhere('email', $user->email)
            ->first();
    }

    protected function checkPasswordReset(User $user){
        return DB::table('password_resets')
            ->where('phone',$user->phone)
            ->orWhere('email', $user->email)
            ->first() ? true : false;
    }

    protected function createPasswordReset(User $user){
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'phone' => $user->phone,
            'created_at' => $now=now(),
            'updated_at' => $now
        ]);
    }

    protected function updateToken(User $user){
        # define token
        #$this->token=Str::random(60);
        $this->token = rand(11111, 99999);
        DB::table('password_resets')
            ->where('phone',$user->phone)
            ->orWhere('email', $user->email)
            ->update(
                [
                    'token' => Hash::make($this->token)
                ]);
    }

    protected function createMessageFlash($text,$type){
        session()->flash
        (
            'status',
            [
                'text'=>$text,
                "type"=>$type
            ]
        );
    }

    # email
    protected function getEmail(Request $request)
    {
        return $request->only('email');
    }

    # phone
    protected function getPhone(Request $request)
    {
        return $request->only('phone');
    }

}
