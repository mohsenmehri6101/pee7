<?php

namespace App\Http\Controllers\Supplier;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function create(User $user)
    {
        $permissions=Permission::latest()->get();
        return view('supplier.permission.create',compact('user','permissions'));
    }

    public function store(Request $request){
        $inputs=$request->all();
        //validate
        /*$this->validate($request,
            [
                'permissions'=>'required'
            ]);*/
        //validate
        $user=User::whereId($inputs['id'])->first();
        $user->permissions()->sync($inputs['permissions']);
        alert ()->success( "سطح دسترسی کاربر با موفقیت ذخیره شد", 'انجام شد' )->autoclose ( '3000' );
        return redirect ()->route ( 'supplier.clerk.index' );
    }

    public function edit(User $user){
        $permissions=Permission::latest()->get();
        return view('supplier.permission.edit',compact('permissions','user'));
    }

    public function update(Request $request){
       $user=User::whereId($request->id)->first();
       $user->permissions()->sync($request->permissions);
       alert ()->success( "تغییرات سطح دسترسی اعمال شد", 'اعمال شد' )->autoclose ( '3000' );
       return redirect ()->route ( 'supplier.clerk.index' );
    }
}