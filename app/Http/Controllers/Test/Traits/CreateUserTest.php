<?php
namespace App\Http\Controllers\Test\Traits;
use Illuminate\Support\LazyCollection;

trait CreateUserTest
{
    use PrivateFunctionCreateUserTestTrait;

    public function loginUsers($level=null){
        $user=$this->loginUser($level);
        auth()->loginUsingId($user->id);
        alert()->success($user->email,$user->name);
        return back();
    }

    public function createUsers($level=null, $number=10)
    {
        $this->createUser($level,$number);
        alert()->success($level.'Users created...','done');
        return back();
    }

    public function createUsersNumber($number){
        //set_time_limit(0);
        $collect=(LazyCollection::make(function() use ($number){
            for ($i=0;$i<$number;$i++){
                yield $this->createUser(null,1);
            }
        }
        ))->collect();
        //$collect->collect();
        alert()->success('( '.$number.') multi Users created...','done');
        return back();
    }
}
