<?php
namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Clerk;
use Illuminate\Support\Str;

class ClerkController extends Controller
{

    public function index()
    {
        $supplier=auth()->user();
        $clerks=Clerk::where('supplier_id',$supplier->id)->pluck('user_id');
        $users=User::find($clerks);
        return view('supplier.clerk.index',compact('users','supplier'));
    }

    public function create()
    {
        $user=auth()->user();
        return view('supplier.clerk.create',compact('user'));
    }

    public function randomString($length = 10, $chars = '1234567890') {
        // Alpha lowercase
        $randomString='';
        if ($chars == 'alphalower') {
            $chars = 'abcdefghijklmnopqrstuvwxyz';
        }
        // Numeric
        if ($chars == 'numeric') {
            $chars = '1234567890';
        }
        // Alpha Numeric
        if ($chars == 'alphanumeric') {
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        }
        // Hex
        if ($chars == 'hex') {
            $chars = 'ABCDEF1234567890';
        }
        $charLength = strlen($chars)-1;
        for($i = 0 ; $i < $length ; $i++)
        {
            $randomString .= $chars[mt_rand(0,$charLength)];
        }
        return $randomString;
    }

    public function store(ClerkStoreRequest $request)
    {
       $inputs=$request->all();
       $password=Str::random(8);
       $password=$this->randomString(3,'alphalower').$this->randomString(4,'numeric').$this->randomString(1,'alphalower');
       //save user
        $user = new User();
        $user->password=bcrypt($password);
        $user->email =$inputs['email'];
        $user->name =$inputs['name'];
        $user->level='clerk';
        $user->image='default/user-avator.jpg';
        $user->active=false;
        $user->save();
        //save user
       $clerk=Clerk::create([
           'supplier_id'=>$inputs['id'],
           'user_id'=>$user->id
       ]);
        $contact=Contact::create([
            'mobiles'=>$inputs['mobile'],
            'user_id'=>$user->id
        ]);
        $location=Location::create([
            'user_id'=>$user->id
        ]);
       if($clerk and $location and $user and $contact)
       {
           alert()->success('ایمیل برای پشتیبان ارسال شد','ثبت نام انجام شد')->persistent('باشه');
           //event(new UserActivation($user));
           //send mail user and password
           $mail=$user->email;
           $title='ارسال ایمیل توسط   :    '.auth()->user()->name;
           $body='ایمیل   :   '.$user->email.' کلمه عبور    :            '.$password;
           $this->sendmail ($mail,$title,$body);
           //send mail user and password
           return redirect()->route('supplier.clerk.index');
       }
    }

    public function show($id)
    {
        $user=User::whereId($id)->first();
        return $user;
        return view('supplier.clerk.show',compact('user'));
    }
}
