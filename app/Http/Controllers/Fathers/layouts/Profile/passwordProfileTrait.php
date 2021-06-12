<?php
namespace App\Http\Controllers\Fathers\layouts\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait passwordProfileTrait
{
    public function passwordGet(){
        # TODO ConfirmPassword
        $user=auth()->user();
        return view('layouts.panel.profile.password',compact('user'));
    }

    public function passwordPost(Request $request){
        $user=auth()->user();
        $inputs=makeInputs($request);
        $user_password=$user->getAuthPassword();
        $past_password=$inputs['past_password'];
        if(Hash::check($past_password,$user_password))
        {
            $request->user()->fill([
                'password' => Hash::make($inputs['password'])
            ])->save();
            # TODO SEND EMAIL/SMS CHANGE_PASSWORD
            alert ()->success( "تغییر پسورد با موفقیت انجام شد", 'انجام شد' )->autoclose ( '3000' );
            return redirect()->route('profile.index');
        }
        alert ()->error( "پسورد قبلی را درست وارد نکردید", "اخطار" )->persistent('باشه');
        return redirect()->route('profile.password.get');
    }

    public function forgetPassword(){
        auth()->logout();
        return redirect()->route('password.request');
    }
}
