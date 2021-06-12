<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class YahooAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('yahoo')->redirect();
    }

    public function callback()
    {
        try
        {
        $yahooUser=Socialite::driver('yahoo')->user();
        $user=User::whereEmail($yahooUser->email)->first();
        if($user){
            auth()->loginUsingId($user->id);
        }else{
            $newUser=User::create([
                'name'=>$yahooUser->name,
                'email'=>$yahooUser->email,
                'password'=>bcrypt(\Str::random(16))
            ]);

            auth()->loginUsingId($newUser->id);
        }
        //return
        return redirect('/');
        } catch(\Exception $error1)
        {
            try
            {
                $yahooUser=Socialite::driver('yahoo')->stateless()->user();
                $user=User::whereEmail($yahooUser->email)->first();
                if($user){
                    auth()->loginUsingId($user->id);
                }
                else
                {
                    $newUser=User::create([
                        'name'=>$yahooUser->name,
                        'email'=>$yahooUser->email,
                        'password'=>bcrypt(\Str::random(16))
                    ]);
        
                    auth()->loginUsingId($newUser->id);
                }
                //return
                return redirect('/');

            } catch(\Exception $error2)
            {
                //alert error

            }
        }
    }
    
}
