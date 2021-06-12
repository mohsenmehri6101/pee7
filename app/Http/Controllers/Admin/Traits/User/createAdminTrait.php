<?php
namespace App\Http\Controllers\Admin\Traits\User;
use App\Http\Controllers\Fathers\ProfileControllerFather;
use App\Models\Permission;
use Illuminate\Http\Request;

trait createAdminTrait
{
    public function createAdminGet()
    {
        $permissions=Permission::PermissionWithTag('admin')->get();
        return view('admin.users.sub.create',compact('permissions'));
    }

    public function createAdminPost(Request $request)
    {
        //save user
        $inputs=makeInputs($request);
        $user=ProfileControllerFather::createUser($inputs,'admin');
        isset($inputs['permission']) ? $user->permissions()->sync($inputs['permission']) : null;
        // TODO NotificationRegisterUser
        // process activation User
        alert ()->success("ذخیره کاربر ادمین با موفقیت انجام شد", $user->name."ذخیره شد" )->autoclose ( '3000' );
        return redirect()->route('admin.users.admins');
    }

}
