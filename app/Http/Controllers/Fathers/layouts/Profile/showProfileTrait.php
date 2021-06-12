<?php
namespace App\Http\Controllers\Fathers\layouts\Profile;

trait showProfileTrait
{

    public function index(){
        $user=auth()->user();
        $level=$user->level;
        return view('layouts.panel.profile.index',compact('user','level'));
    }
}
