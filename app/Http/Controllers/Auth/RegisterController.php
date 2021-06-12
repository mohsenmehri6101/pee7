<?php
namespace App\Http\Controllers\Auth;

use App\Events\User\Register\UserActivationEvent;
use App\Http\Controllers\Auth\Traits\Register\ConfirmRegister;
use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use ConfirmRegister;
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm($level)
    {
        return
            ($level=='company' || $level=='person')
            ?
                view('auth.register',compact('level'))
            :
                redirect()->route('choose.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required','string','max:255','unique:users'],
            'password' => ['required', 'string','min:8','confirmed'],
            'phone' => ['required','numeric','unique:users'],
            //'phone' => ['required', 'numeric', 'unique:users',    '^(?:0|98|\+98|\+980|0098|098|00980)?(9\d{9})$'],
            'terms'=>['required'],
            'level'=>['required',Rule::in(['company','person'])],
            //'g-recaptcha-response' => ['required','captcha'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'phone' => $data['phone'],
            'level' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        //validate
        $this->validator($request->all())->validate();
        //validate

        //save Users
        event(new Registered($user = $this->create($request->all())));
        //save Users

        //myCodes... Event Activation register
        event(new UserActivationEvent($user));
        //myCodes... Event Activation register
        return redirect()->route('register.confirm.phone.get',['phone'=>"$request->phone"]);

        /* $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());*/
    }
}
