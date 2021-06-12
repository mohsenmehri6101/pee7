<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        
        try
        {
        $googleUser=Socialite::driver('google')->user();
        $user=User::whereEmail($googleUser->email)->first();
        if($user){
            auth()->loginUsingId($user->id);
        }else
        {
            $user=User::create([
                'name'=>$googleUser->name,
                'email'=>$googleUser->email,
                'password'=>bcrypt(\Str::random(16))
            ]);
            auth()->loginUsingId($user->id);
        }
            //return
            alert()->success('welcom','welcome');
            return redirect('/');
        } catch(\Exception $error1)
        {
            try
            {
                $googleUser=Socialite::driver('google')->stateless()->user();
                $user=User::whereEmail($googleUser->email)->first();
                if($user){
                    auth()->loginUsingId($user->id);
                }
                else
                {
                    $user=User::create([
                        'name'=>$googleUser->name,
                        'email'=>$googleUser->email,
                        'password'=>bcrypt(\Str::random(16))
                    ]);
                    auth()->loginUsingId($user->id);
                }
                //return
                alert()->success('welcom','welcome');
                return redirect('/');

            } catch(\Exception $error2)
            {
               alert()->error('Login With Google Was Not Success','ERROR');
               return redirect()->route('login');

            }
        }
    }
    
}