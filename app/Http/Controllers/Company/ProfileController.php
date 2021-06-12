<?php

namespace App\Http\Controllers\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends FatherController
{
    use ImageTrait;

    public function index()
    {
        $user=auth()->user();
        return view('company.profile.index');
    }

    public function edit(){
        $user=auth()->user();
        $provinces = Province::orderBy('id')->get();
        return view('company.profile.edit',compact('user','provinces'));
    }

    public function update(CompanyRequest $request)
    {
        //return $request->all();
        $user =auth()->user();
        $inputs = $request->all();
        //save image
        $image = false;
        if ($request->file( 'image' )) {
            // delete image before
            $delete_image=$this->DeleteImage($user->image);
            // delete image before
            $file = $request->file( 'image' );
            $filename = $this->SaveImage( $file );
            $filename = $this->ReSizeImageByReplace($filename,"200");
            $userr=$user->update ([
                'image' => $filename,
                'name' => $inputs['name']
            ] );
            if ($filename and $userr and $delete_image)
            {
                $image = true;
            }
        } else {
            $user->update ( [
                'name' => $inputs['name']
            ] );
            $image = true;
        }
        //save image
        //save company
        $company =$user->company->update( [
            'user_id'=>$user->id,
            'id_recording' => $inputs['id_recording'],
            'id_company' => $inputs['id_company'],
            'about' => $inputs['about'],
        ] );
        //save company
        //save location
        $location =$user->location->update( [
            'province' => $inputs['province'],
            'city' => $inputs['city'],
            'plate' => $inputs['plate'],
            'address'=>$inputs['address'],
        ]);
        // save contact
        $contact=$user->Contact->update(
            [
                'mobiles'=>$inputs['mobiles'],
                'phones'=>$inputs['phones']
            ]
        );
        if ($location and $company and $image and $contact) {
            alert ()->success("ویرایش اطلاعات با موفقیت انجام شد", 'تشکر از شما!' )->autoclose ( '3000' );
            return redirect ()->route ( 'company.profile.index' );
        } else {
            alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'company.profile.index' );
        }
    }


    public function create()
    {
        $user=auth()->user();
        $provinces = Province::orderBy('id')->get();
        if($user->company)
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->persistent('باشه فهمیدم');
            return redirect ()->route ( 'company.profile.index');
        }
        return view('company.profile.create',compact('user','provinces'));
    }
    public function store(CompanyRequest $request)
    {
        $user=auth()->user();
        if (!$user->company)
        {
            $inputs = $request->all ();
            //save image
            $error_image = false;
            if ($request->file ( 'image' )) {
                $file = $request->file ( 'image' );
                $filename = $this->SaveImage( $file );
                $filename = $this->ReSizeImageByReplace($filename,"200");
                $image = $user->update ( [
                    'image' => $filename,
                    'name' => $inputs['name']
                ] );
                if ($filename and $image) {
                    $error_image = true;
                }
            } else {
                $user->update( [
                    'name' => $inputs['name']
                ] );
                $error_image = true;
            }
            //save image
            //save other information people table
            $company = Company::create( [
                'id_recording' => $inputs['id_recording'],
                'id_company' => $inputs['id_company'],
                'about' => $inputs['about'],
                'user_id'=>$user->id
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
            //save contacts
            $contact = Contact::create ( [
                'mobiles' => $inputs['mobiles'],
                'phones' => $inputs['phones'],
                'user_id' => $user->id
            ]);
            if ($contact and $location and $company and $error_image) {
                alert ()->success ( "تکمیل اطلاعات با موفقیت انجام شد", 'تشکر از شما!' )->autoclose ( '3000' );
                    return redirect ()->route ( 'company.profile.index' );
            } else {
                alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
                return redirect ()->route ( 'company.profile.create' );
            }
        }
        else
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'company.profile.index');
        }
    }
    /*                  COMPANY                     */
    /*                  PASSWORD                     */
    // request -> PasswordRequest
    public function password(){
        $user=auth()->user();
        if(! $user->company)
        {
            toastr()->error('ابتدا باید اطلاعات کاربری خود را تکمیل کنید', 'خطا');
            return back();
        }
        return view('company.profile.password',compact('user'));
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
            return redirect ()->route ( 'company.profile.index' );
        }
        else
        {
            toastr()->error('رمز ورود قبلی را اشتباه وارد کردید', 'خطا');
            return redirect()->back();
        }
    }
    /*                  PASSWORD                     */
    /*                  SESSIONS                     */
    public function sessions(){
        alert ()->warning( "این قابلیت فعلا غیرفعال میباشد", 'توجه' )->autoclose ( '3500' );
        return redirect ()->route ( 'company.profile.index' );
    }
    /*                  SESSIONS                     */
}
//function toastr(string $message = null, string $type = 'success', string $title = '', array $options = []);
