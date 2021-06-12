<?php
namespace App\Http\Controllers\Auth;

# use App\Events\User\Register\UserActivationEvent;
use App\Events\User\Register\UserActivationEvent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
# use App\User;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            //check active user or not
            if(!auth()->user()->isActive()) {
                event(new UserActivationEvent(User::findOrFail(auth()->user()->getAuthIdentifier())));
                auth()->logout();
                return view('auth.confirmRegister');
            }
            //check active user or not
            return $this->sendLoginResponse($request);
        }


        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        $login = request()->input('user');
        if(is_numeric($login)){
            $field = 'phone';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }
        request()->merge([$field => $login]);
        # request()->request->remove('user');
        return $field;
    }

    protected function validateFor($field){
        $list=[
            'phone'=>'required|numeric',
            'email'=>'required|email',
            'username'=>'required'
        ];
        return $list[$field];
    }

    protected function validateLogin(Request $request)
    {
        $field=$this->username();
        $request->validate(
        [
            $field => $this->validateFor($field),
            'user'=>'required',
            'password' => 'required|string',
        ]);

    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [Lang::get('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])],
        ])->status(Response::HTTP_TOO_MANY_REQUESTS);
    }
}
