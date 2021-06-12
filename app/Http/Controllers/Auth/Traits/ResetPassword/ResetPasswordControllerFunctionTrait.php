<?php
namespace App\Http\Controllers\Auth\Traits\ResetPassword;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait ResetPasswordControllerFunctionTrait
{
    public function confirmCodePhonePost(Request $request)
    {
        # validate
        $this->validateConfirm($request);

        $confirm=$request->confirm;
        $phone=$request->phone;

        # check User

        $passwordReset = DB::table('password_resets')
            ->where([
                ['phone', '=', $request->phone],
            ])->first();
        if
        (
        $user=User::wherePhone($request->phone)->first()
            &&
            $passwordReset
            &&
            Hash::check($confirm,$passwordReset->token)
        )
        {
            return redirect(url("password/reset/$confirm?phone=$phone"));
        }
        else{
            # wrong ...
            return redirect()->back()->withErrors(["confirm"=>"We can't find a user with that phone confirm"]);
        }
    }

    public function confirmCodePhoneGet(Request $request)
    {
        return
            $request->phone
                ?
                view('auth.passwords.resetPhone',['phone'=>$request->phone])
                :
                null;
    }

    protected function validateConfirm(Request $request)
    {
        $request->validate([
            'confirm' => 'required|numeric',
            'phone' => 'required|numeric',
        ]);
    }

}
