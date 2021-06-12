<?php
namespace App\Http\Controllers\Test\Traits;
use App\Models\City;
use App\Models\Clerk;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Person;
use App\Models\Province;
use App\Models\Role;
use App\Models\Supplier;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Ybazli\Faker\Facades\Faker as PFaker;

trait PrivateFunctionCreateUserTestTrait
{
    private function createLocation($id, $typeLocation=null){
        $provinceRandom=Province::all()->random();
        $city=City::where('province_id',$provinceRandom->id)->get()->random()->name;
        $province=$provinceRandom->name;
        $location=Location::create(['province'=>$province,'city'=>$city,'address'=>PFaker::address(),'plate'=>rand(20,120)]);
        $typeLocation=='user' ? $location->update(['user_id'=>$id]) : null;
        $typeLocation=='agency' ? $location->update(['agency_id'=>$id]) : null;
        return $location;
    }

    private function createContact($id, $typeLocation=null){
        $contact=Contact::create([
            'fax'=>PFaker::melliCode(),
            'mobiles'=>[PFaker::melliCode(),PFaker::melliCode()],
            'phones'=>[PFaker::melliCode(),PFaker::melliCode(),PFaker::melliCode(),PFaker::melliCode()],
            'telegram'=>'@'.PFaker::lastname(),
            'website','user_id','agency_id']);
        $typeLocation=='user' ? $contact->update(['user_id'=>$id]) : null;
        $typeLocation=='agency' ? $contact->update(['agency_id'=>$id]) : null;
        return $contact;
    }

    private function getRandomUser($level=null){
        $this->checkUserExist($level);
        return $level ? User::whereLevel($level)->get()->random() : User::all()->random();
    }

    private function setRole($user, $level){
        $IdRole=Role::whereName($level)->first()->id;
        $user->roles()->sync([$IdRole]);
    }

    private function cherkLevelExist($level=null){
        $list=['supplier','clerk','company','person'];
        !$level ? $level=$list[array_rand($list)] : null;
        return $level;
    }

    private function CreateUser($level=null, $number=10)
    {
        $level=$this->cherkLevelExist($level);
        $faker = Faker::create();
        for ($x = 0; $x < $number; $x++)
        {
            $user = User::firstOrCreate([
                'password' => Hash::make('12345678'),
                'email' => $faker->email,
                'name' => PFaker::fullName(),
                'phone' => PFaker::mobile(),
            ]);
            $user->update([
                'level' => $level,
                'active'=>rand(0,1),
                //'active' => true
            ]);
            $this->setRole($user,$level);
            $this->createLocation($user->id,'user');
            $this->createContact($user->id,'user');
            // level = supplier(),clerk(),admin(),company(),person()
            $this->$level($user);
        }
    }

    private function loginUser($level = null){
        $this->checkUserExist($level);
        return $this->getRandomUser($level);
    }

    private function checkUserExist($level=null){
        $level!=null ? $count=User::whereLevel($level)->count() : $count=User::all()->count();
        $count==0 ? $this->createUser($level) : null;
    }

    private function clerk($user){
        $this->checkUserExist('supplier');

        Clerk::create([
            'user_id'=>$user->id,
            'supplier_id'=>$this->getRandomUser('supplier')->id,
            'about'=>PFaker::sentence()
        ]);
    }

    private function supplier($user){
        Supplier::create([
            'user_id'=>$user->id,
            'about'=>PFaker::sentence()
        ]);
    }

    private function company($user){
        Company::create([
            'user_id'=>$user->id,
            'id_company'=>PFaker::melliCode(),
            'id_recording'=>PFaker::melliCode(),
            'about'=>PFaker::sentence()
        ]);
    }

    private function person($user){
        Person::create([
            'user_id'=>$user->id,
            'self_id'=>PFaker::melliCode(),
            'about'=>PFaker::sentence()
        ]);
    }
}
