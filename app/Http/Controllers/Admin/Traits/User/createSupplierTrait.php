<?php
namespace App\Http\Controllers\Admin\Traits\User;

use App\Http\Controllers\Fathers\ProfileControllerFather;
use Illuminate\Http\Request;

trait createSupplierTrait
{
    public function createSupplierGet()
    {
        return view('admin.users.sub.createSupplier');
    }

    public function createSupplierPost(Request $request)
    {
        //save user
        $inputs=makeInputs($request);
        $user=ProfileControllerFather::createUser($inputs,'supplier');
        // TODO NotificationRegisterUser
        // process activation User
        alert ()->success("ذخیره کاربر تولیدکننده با موفقیت انجام شد", $user->name."ذخیره شد" )->autoclose ( '3000' );
        return redirect()->route('admin.users.admins');
    }

}
