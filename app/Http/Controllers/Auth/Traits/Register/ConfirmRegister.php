<?php
namespace App\Http\Controllers\Auth\Traits\Register;
use App\Events\User\Register\UserActivationEvent;
use App\Models\ActivationCode;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

trait ConfirmRegister
{

    public function showConfirmRegistrationForm($phone){
        return view('auth.register.confirmRegister',['phone'=>$phone]);
    }

    public function RequestAjaxConfirmPhone(Request $request)
    {
        $user=User::wherePhone($request->phone)->first();
        if($user) {
            $code=ActivationCode::GetMeCodeObjectForUser($user);
            $expireTme=$code->getExpire();
            $now=now();
            if ($now > $expireTme) {
                event(new UserActivationEvent($user));
                return response()->json([
                    'state' => true,
                    'globalStart' => 60,
                ]);
            }
            return response()->json([
                'state' => true,
                'globalStart' => $now->diffInSeconds($expireTme),
            ]);
        }
        return response()->json([
            'state' => false,
            'globalStart' => "180",
        ]);
    }

    public function ConfirmRegistrationForm(Request $request)
    {
        // validate
        $this->validatorConfrim($request->all())->validate();
        //validate
        $confirm=$request->confirm;
        $phone=$request->phone;

        if(ActivationCode::checkCode($confirm))
        {
            $user=ActivationCode::GetMeUserForCode($confirm);# find User

            if(ActivationCode::checkCodAndExpire($confirm) && $user->getPhone()===$phone)
            {
                $user->activeUser();# active User
                ActivationCode::deleteActiveCodeForUser($user); # delete  code for user
                # $this->guard()->login($user);# login user
                alert()->success("پنل شما فعال شد. هم اکنون میتوانید از صفحه ورود وارد پنل کابری خود شوید.","خوش آمدید"); # welcome message
                # TODO sweet alert
                return redirect()->route('home.index'); # route main
            }
            else
            {
                //code expire
                event(new UserActivationEvent($user));
                alert()->error('کد شما منقضی شده بود - کد دوباره ارسال شد دوباره امتحان کنید');
                return back();
            }
        }
        //alert code is wrong
        return back()->withErrors(['confirm'=>'کد اشتباه است']);
    }

    protected function validatorConfrim(array $data)
    {
        return Validator::make($data, [
            'confirm' => ['required', 'numeric',],
            'phone' => ['required', 'numeric',],
            //'g-recaptcha-response' => ['required','captcha'],
        ]);
    }

}
