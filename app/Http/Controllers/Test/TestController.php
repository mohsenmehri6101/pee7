<?php
namespace App\Http\Controllers\Test;

use App\Http\Controllers\Test\Traits\CreateUserTest;
use App\Http\Controllers\Test\Traits\Yajra;
use App\Models\Agency;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Ybazli\Faker\Facades\Faker as PFaker;

class TestController extends Controller
{
    use CreateUserTest,Yajra;

    public function test(){
    }

    public function notificationAll(){

        /* working..
         * User::all()->filter(function ($user) {
            $user->id > 50 ? dd($user->name) : null;
        });*/
        //not working
        User::cursor()->filter(function ($user) {
            $user->id > 50 ? dd($user->name) : null;
        });

        //return $users;
    }

    private function createAgencyPrivate($userSupplierId,$contact,$location){
        return Agency::create([
                'location_id'=>$location->id,
                'contact_id'=>$contact->id,
                'user_id'=>$userSupplierId,
                'management'=>PFaker::fullName(),
                'description'=>PFaker::sentence(),
                'code_agency'=>rand(1000,9999)]
        );
    }

    public function createAgency($number=10)
    {
        for ($x = 0; $x < $number; $x++){
            $userSupplierRandomId=$this->getRandomUser('supplier')->id;
            $location=$this->createLocation($userSupplierRandomId);
            $contact=$this->createContact($userSupplierRandomId);
            $agency=$this->createAgencyPrivate($userSupplierRandomId,$contact,$location);
            $location->update(['agency_id'=>$agency->id]);
            $contact->update(['agency_id'=>$agency->id]);
        }
        alert()->success('agnecies faker saved...','DONE :)');
        return back();
    }

    public function bproduct(){
        if(!Category::all()->first()){
            Artisan::call("db:seed", ['--class' =>'CategorySeeder']);
        }
        if(!Unit::all()->first()){
            Artisan::call ( "db:seed", ['--class' => 'UnitSeeder'] );
        }
        Artisan::call("db:seed", ['--class' =>'BproductSeeder']);
        alert ()->success( 'multip-bproducts  created', 'done' )->autoclose (3000);
        return back();
    }

    public function product(){
        if(!User::whereLevel('supplier')->first())
        {
            Artisan::call("db:seed", ['--class' =>'UserSupplierSeeder']);
            $suppliers=User::whereLevel('supplier')->pluck('id')->toArray();
        }
        if(!Category::all()->first()){
            Artisan::call("db:seed", ['--class' =>'CategorySeeder']);
        }
        if(!Unit::all()->first()) {
            Artisan::call ( "db:seed", ['--class' => 'UnitSeeder'] );
        }
        Artisan::call("db:seed", ['--class' =>'ProductSeeder']);
        alert ()->success( 'multip-products  created', 'done' )->autoclose (3000);
        return back();
    }

    public function faq(){
        $admin=User::whereLevel('admin')->first();
        if(! $admin) {
            alert ()->error('ابتدا کاربر ادمین  بسازید', 'دقت شود' )->persistent('باشه فهمیدم');
            return back();
        }
        Artisan::call("db:seed", ['--class' =>'FaqSeeder']);
        alert ()->success ( 'faq ( questiion and answer) seeder done', 'done' )->autoclose (3000);
        return back();
    }

    public function index(){
        return view('test.index');
    }

    public function permissions(){
        Artisan::call("db:seed", ['--class' =>'PermissionSeeder']);
        alert ()->success ( 'faq ( questiion and answer) seeder done', 'done' )->autoclose (3000);
        return back();
    }

    public function sms(){
        return view('test.sms');
    }

    public function testmail(){
        $data['mail']='mohsen.mehri6101@gmail.com';
        $data['body']='لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این ';
        $data['title']='عنوان ایمیل';
        $data['url']=route('home.index');
        $data['button-text']='pezhvak';
        $this->sendmail($data['mail']);
        return "done check email :)";
    }

    public function testimage(){
        //        $this->SizeImage ("hQR1580915453.jpg","200","300");
        $url=$this->ReSizeImage ("N0J1580918367.png","200");
        //      $this->SizeImage ("hQR1580915453.jpg","300");
        return "done ceck this image in public/images/".$url;
        /* test for IMAGE-TRAIT */
    }

    public function categories(){
        Artisan::call("db:seed", ['--class' =>'CategorySeeder']);
        alert ()->success('multi test categories done','done')->autoclose(3000);
        return back();
    }

    public function units(){
        Artisan::call("db:seed", ['--class' =>'UnitSeeder']);
        alert ()->success('multi test units done','done')->autoclose(3000);
        return back();
    }
}
