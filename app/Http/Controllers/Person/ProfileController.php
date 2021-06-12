<?php

namespace App\Http\Controllers\Person;
use App\Company;
use App\Contact;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PeopleRequest;
use App\Province;
use App\Traits\ImageTrait;
use App\User;
use App\Person;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends FatherController
{
    use ImageTrait;

    public function index(){
        $user=auth()->user();
        return view('person.profile.index');
    }

    public function create()
    {
        $provinces = Province::orderBy('id')->get();
        $user=auth()->user();
        if($user->person)
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->persistent('باشه فهمیدم');
            return redirect ()->route ( 'user.profile.index');
        }
        return view('person.profile.create',compact('user','provinces'));
    }

    public function store(PeopleRequest $request)
    {
        $user=auth()->user();
        if (!$user->person)
        {
            $inputs = $request->all();
            //save image
            $error_image = false;
            if ($request->file ( 'image' )) {
                $file = $request->file ( 'image' );
                $filename = $this->SaveImage ( $file );
                $filename = $this->ReSizeImageByReplace($filename,"200");
                $image = $user->update ( [
                    'image' => $filename,
                    'name' => $inputs['name']
                ] );
                if ($filename and $image) {
                    $error_image = true;
                }
            } else {
                $user->update ( [
                    'name' => $inputs['name']
                ] );
                $error_image = true;
            }
            //save image
            //save other information people table
            $person = Person::create( [
                'user_id'=>$user->id,
                'self_id' => $inputs['self_id'],
                'about' => $inputs['about'],
            ] );
            //save other information people table
            //save location
            $location = Location::create ( [
                'province' => $inputs['province'],
                'city' => $inputs['city'],
                'plate' => $inputs['plate'],
                'address'=>$inputs['address'],
                'user_id' => $user->id
            ]);
            //save Contact
            $contact = Contact::create ( [
                'mobiles' => $inputs['phones'],
                'phones' => $inputs['mobiles'],
                'user_id' => $user->id
            ]);
            if ($location and $person and $error_image and $contact) {
                alert ()->success ( "تکمیل اطلاعات با موفقیت انجام شد", 'تشکر از شما!' )->autoclose ( '3000' );
                return redirect ()->route ( 'user.profile.index' );
            } else {
                alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
                return redirect ()->route ( 'user.profile.create' );
            }
        }
        else
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'user.profile.index');
        }
    }

    public function edit(){
        $user=auth()->user();
        $provinces = Province::orderBy('id')->get();
        return view('person.profile.edit',compact('user','provinces'));
    }

    //request PeopleRequest
    public function update(PeopleRequest $request)
    {
        $user = auth ()->user ();
        $inputs = $request->all ();
        //save image
        $error_image = false;
        if ($request->file ( 'image' )) {
            // delete image before
            $delete_image=$this->DeleteImage($user->image);
            // delete image before
            $file = $request->file ( 'image' );
            $filename = $this->SaveImage($file );
            $filename = $this->ReSizeImageByReplace($filename,"200");
            $image = $user->update([
                'image' => $filename,
                'name' => $inputs['name']
            ] );
            if ($filename and $image and $delete_image)
            {
                $error_image = true;
            }
        } else {
            $user->update ( [
                'name' => $inputs['name']
            ] );
            $error_image = true;
        }
        //save image
        //save other information
        $person =$user->person->update( [
            'self_id' => $inputs['self_id'],
            'about' => $inputs['about'],
        ] );
        //save other information
        //save location
        $location =$user->location->update( [
            'province' => $inputs['province'],
            'city' => $inputs['city'],
            'plate' => $inputs['plate'],
            'address'=>$inputs['address'],
        ] );
        $contact =$user->contact->update( [
            'mobiles' => $inputs['mobiles'],
            'phones' => $inputs['phones']
        ] );
        if ($location and $person and $error_image and $contact) {
            alert ()->success("ویرایش اطلاعات با موفقیت انجام شد", 'تشکر از شما' )->autoclose ( '3000' );
            return redirect ()->route ( 'user.profile.index' );
        } else {
            alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'user.profile.index' );
        }
    }

    // request -> PasswordRequest
    public function password(){
        $user=auth()->user();
        if(! $user->user)
        {
            toastr()->error('ابتدا باید اطلاعات کاربری خود را تکمیل کنید', 'خطا');
            return back();
        }
        return view('person.profile.password',compact('user'));
    }

    public function change_password(PasswordRequest $request){
        $user=auth()->user();
        $inputs=$request->all();
        $user_password=$user->getAuthPassword ();
        $past_password=$inputs['past_password'];
        if(Hash::check($past_password,$user_password))
        {
            $request->user()->fill([
                'password' => Hash::make($request->password)
            ])->save();
            alert ()->success( "تغییر پسورد با موفقیت انجام شد", 'انجام شد' )->autoclose ( '3000' );
            return redirect ()->route ( 'user.profile.index' );
        }
        else
        {
            toastr()->error('رمز ورود قبلی را اشتباه وارد کردید', 'خطا');
            return redirect()->back();
        }
    }
    /*                  PASSWORD                     */

    public function sessions(){
        alert ()->warning( "این قابلیت فعلا غیرفعال میباشد", 'توجه' )->autoclose ( '3500' );
        return redirect ()->route ( 'user.profile.index' );
    }
}