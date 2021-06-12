<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\Tools\Image\ImageToolTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use  ImageToolTrait;

    public function index(){
        return view('admin.setting.index');
    }

    public function login()
    {
        $setting=Setting::whereType('login')->first();
        return view('admin.setting.pages.login',compact('setting'));
    }

    public function login_edit(){
        $setting=Setting::whereType('login')->first();
        return view('admin.setting.pages.login_edit',compact('setting'));
    }

    public function login_update(Request $request){
        $setting=Setting::whereType('login')->first();
        $list=['link'=>$request->link];
        $setting->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'list'=>$list
        ]);
        if($request->base_image)
        {
            if($setting->images!='info_graphic_1.svg') {
                $this->DeleteImage( $setting->images);
            }
            $setting->update(['images'=>'info_graphic_1.svg']);
        }
        else if ($request->hasFile('image'))
        {
            //delete
            if($setting->images!='info_graphic_1.svg') {
                $this->DeleteImage( $setting->images);
            }
            //save new image
            $image=$this->SaveImage($request->file( 'image' ) );
            $image=$this->ReSizeImageByReplace($image,425);
            $setting->update(['images'=>$image]);
        }
        alert()->success ('ویرایش صفحه لاگین با موفقیت انجام شد','انجام شد')->autoclose(3500);
        return redirect()->route('admin.setting.login.index');
    }

    //register
    public function register()
    {
        $setting=Setting::whereType('register')->first();
        return view('admin.setting.pages.register',compact('setting'));
    }

    public function register_edit(){
        $setting=Setting::whereType('register')->first();
        return view('admin.setting.pages.register_edit',compact('setting'));
    }

    public function register_update(Request $request){
        $setting=Setting::whereType('register')->first();
        $list=['link'=>$request->link];
        $setting->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'list'=>$list
        ]);
        if($request->base_image)
        {
            if($setting->images!='info_graphic_1.svg') {
                $this->DeleteImage( $setting->images);
            }
            $setting->update(['images'=>'info_graphic_1.svg']);
        }
        else if ($request->hasFile('image'))
        {
            //delete
            if($setting->images!='info_graphic_1.svg') {
                $this->DeleteImage( $setting->images);
            }
            //save new image
            $image=$this->SaveImage($request->file( 'image' ) );
            $image=$this->ReSizeImageByReplace($image,425);
            $setting->update(['images'=>$image]);
        }
        alert()->success ('ویرایش صفحه لاگین با موفقیت انجام شد','انجام شد')->autoclose(3500);
        return redirect()->route('admin.setting.register.index');
    }
    //register
}
