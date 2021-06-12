<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Traits\ForgetPassword\ForgotPasswordControllerPrivateFunctionTrait;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ForgotPasswordController extends Controller
{
    protected $token=null;
    protected $PASSWORD_REST_LINK=false;

    use SendsPasswordResetEmails;
    use ForgotPasswordControllerPrivateFunctionTrait;

    # Get
    public function showLinkRequestForm()
    {
        return view('auth.passwords.resetPassword');
    }

    # Post
    public function sendResetLinkEmail(Request $request)
    {
        # validate
        $this->validateEmail($request);

        # define variables

        $phone=$request->phone ?? null;
        $email=$request->email ?? null;

        if($user=User::whereEmail($email)->orWhere('phone',$phone)->first())
        {
            # create/get token
            $passwordReset=$this->createOrGetToken($user);

            # check Created_at Password Resets
            if(now()->diffInSeconds($passwordReset->updated_at)<60 && !$this->PASSWORD_REST_LINK)
            {
                $time=60 - now()->diffInSeconds($passwordReset->updated_at);
                $this->createMessageFlash("لطفا کمی صبر کنید. شما میتوانید $time ثانیه دیگر دوباره امتحان کنید","danger");
                return redirect()->back();
            }
            else
            {
                # update updated_at because we send email or phone
                $this->updateUpdatedAtPasswordReset(phone:$phone,email:$email);
            }
            if ($email)
            {
                # TODO SEND EMAIL
                $this->sendEmail($user,$this->token);
            }
            if ($phone)
            {
                # TODO SEND MESSAGE
                $this->sendMessage($user,$this->token);
                # go to form enter codePhone
                # show message
                $this->createMessageFlash("ما برای همراه شما پیام کد موقتی فرستادیم!","success");
                return redirect("phone/password/reset?phone=$phone");
            }

            # show message
            $this->createMessageFlash("لطفا ایمل خود را چک کنید ما برای شما ایمیل ارسال کردیم!","success");
            return redirect()->back();
            # show message
        }
        else
        {
            $this->createMessageFlash("ما نمیتوانیم کاربری با چنین ایمیل یا تلفن پیدا کنیم","danger");
            return redirect()->back();
        }

    }

    # Validation
    protected function validateEmail(Request $request)
    {
        # worked
        $request->validate([
            'email' => 'required_without:phone',
            'phone' => 'required_without:email',
        ]);
    }
}
