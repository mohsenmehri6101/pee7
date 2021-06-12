<?php
namespace App\Http\Controllers\Fathers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Fathers\layouts\Profile\functionsSaveUserTrait;
 use App\Http\Controllers\Fathers\layouts\Profile\notificationProfileTrait;
use App\Http\Controllers\Fathers\layouts\Profile\passwordProfileTrait;
use App\Http\Controllers\Fathers\layouts\Profile\sessionProfileTrait;
use App\Http\Controllers\Fathers\layouts\Profile\showProfileTrait;
use App\Traits\Tools\Image\ImageToolTrait;
use Illuminate\Http\Request;

class ProfileControllerFather extends Controller
{
    use passwordProfileTrait;
    use ImageToolTrait;
    use sessionProfileTrait;
    use notificationProfileTrait;
    use showProfileTrait;
    use functionsSaveUserTrait;

    public   function __construct() {
        $this->middleware('password.confirm')->only('passwordGet');
    }

    # method index in showProfileTrait
    # method notificationGet and notificationPost in notificationProfileTrait

    public function notificationPost(Request $request){
      $notification=array();
      $notification=array_keys(makeInputs($request));
      auth()->user()->update(['notification'=>$notification]);
      alert()->success('اطلاع رسانی شما با موفقیت ویرایش شد','ویرایش شد');
      return redirect()->route('profile.index');
    }
    
}
