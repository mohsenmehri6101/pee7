<?php
namespace App\Http\Controllers\Fathers\layouts\Profile;

use Illuminate\Http\Request;

trait notificationProfileTrait
{
    
    /*
    public function notificationPost(Request $request){
        return "hiiii";
        $notification=array();
        $notification=array_keys(makeInputs($request));
        auth()->user()->update(['notification'=>$notification]);
        alert()->success('اطلاع رسانی شما با موفقیت ویرایش شد','ویرایش شد');
        return redirect()->route('profile.index');
    }
    */
    

    public function notificationGet(){
        $notification=auth()->user()->notification;
        return view('layouts.panel.profile.notification',compact('notification'));
    }

}
