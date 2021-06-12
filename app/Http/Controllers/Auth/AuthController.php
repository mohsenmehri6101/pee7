<?php
namespace App\Http\Controllers\Auth;
use App\Models\ActivationCode;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function showConfirmForm(){
        return view('auth.confirm');
    }

    public function activation($token){
        $activationCode=ActivationCode::whereCode($token)->first();
        if(! $activationCode)
        {
            //not exist
            alert()->warning('چنین کدی وجود ندارد','خطا')->persistent('فهمیدم');
            return redirect('/');
        }
        if($activationCode->expire < Carbon::now())
        {
            //expire
            alert()->warning('این کد منقضی شده است','خطا')->persistent('فهمیدم');
            return redirect('/');
        }
        // action active...
        $activationCode->user()->update([
            'active'=>1,
            'confirm'=>'off'
        ]);
        $activationCode->user()->first()->activationCodes()->delete();
        auth()->loginUsingId($activationCode->user->id);
        alert()->success($activationCode->user->name." اکانت شما فعال شد",'خوش آمدید')->autoclose ('3000');
        return redirect()->route('home.index');
    }

    public function showChooseRegistrationPage()
    {
        return view('auth.chooseRegister');
    }

    public function personal_register_store(PersonalRegisterRequest $request)
    {
        //save user personal
        $user=User::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'mobile'=>request('mobile'),
            'confirm'=>0,
            'password'=>bcrypt( str_random(10))
        ]);
        //save user personal
        //send confirm email/mobile
        if(request('confirm_register')=="confirm_email")
        {
            $this->middleware(['auth','verified']);
            $confirm="email";
        }
        elseif(request('confirm_register')=="confirm_mobile"){
            $confirm="mobile";
        }
        return view('auth.confirm_register',compact ('confirm'));
        //send confirm email/mobile
    }

    public function confirm_register(Request $request){
        return $request;
    }

    public function confirm_register_view(){
        return view('auth.confirm_register');
    }

}
