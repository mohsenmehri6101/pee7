<?php

namespace App\Http\Controllers\Supplier;
use App\Models\Contact;
use App\Http\Controllers\Common\FatherProfileController;
use App\Models\Supplier;
use App\Http\Requests\SupplierProfileStoreRequest;
use App\Models\Province;
use App\Models\Location;
use Illuminate\Http\Request;

class ProfileController extends FatherProfileController
{
    public function edit(){
        $user=auth()->user();
        $provinces = Province::orderBy('id')->get();
        return view('supplier.profile.edit',compact('user','provinces'));
    }

    public function update(SupplierProfileStoreRequest $request)
    {
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
        //save supplier
        $supplier =$user->supplier->update( [
            'user_id'=>$user->id,
            'about' => $inputs['about'],
        ] );
        //save supplier
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
        if ($location and $supplier and $image and $contact) {
            alert ()->success("ویرایش اطلاعات با موفقیت انجام شد", 'تشکر از شما!' )->autoclose ( '3000' );
            return redirect ()->route ( 'supplier.profile.index' );
        } else {
            alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'supplier.profile.index' );
        }
    }

    public function create()
    {
        $user=auth()->user();
        $provinces = Province::orderBy('id')->get();
        if($user->company)
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->persistent('باشه فهمیدم');
            return redirect ()->route ( 'supplier.profile.index');
        }
        return view('supplier.profile.create',compact('user','provinces'));
    }

    public function store(SupplierProfileStoreRequest $request)
    {
        $user=auth()->user();
        if (!$user->supplier)
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
            //save supplier
            $supplier = Supplier::create([
                'about' => $inputs['about'],
                'user_id'=>$user->id
            ] );
            //save supplier
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
            if ($contact and $location and $supplier and $error_image) {
                alert ()->success ( "تکمیل اطلاعات با موفقیت انجام شد", 'تشکر از شما!' )->autoclose ( '3000' );
                    return redirect ()->route ( 'supplier.profile.index' );
            } else {
                alert ()->error ( "خطایی رخ داده دوباره امتحان کنید", 'خطا' )->autoclose ( '3000' );
                return redirect ()->route ( 'supplier.profile.create' );
            }
        }
        else
        {
            alert ()->error ( "شما اجازه دسترسی به چنین روتی را ندارید", 'خطا' )->autoclose ( '3000' );
            return redirect ()->route ( 'supplier.profile.index');
        }
    }
}
