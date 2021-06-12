<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Traits\ResetPassword\ResetPasswordControllerFunctionTrait;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    use ResetPasswordControllerFunctionTrait;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        if($request->phone)
        {
            return view('auth.passwords.reset')->with(
                ['token' => $token, 'phone' => $request->phone]
            );
        }
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'email',
            'phone'=>'numeric',
            'password' => 'required|confirmed|min:8',
            /*
             * recaptcah need
             * email / phone required_without
             * */
        ];
    }

    protected function credentials(Request $request)
    {
        if($request->phone) {
            return $request->only(
                'phone', 'password', 'password_confirmation', 'token'
            );
        }
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    public function reset(Request $request)
    {

        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
        );


        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }
}
