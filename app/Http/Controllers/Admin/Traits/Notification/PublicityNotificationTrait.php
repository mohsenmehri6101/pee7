<?php
namespace App\Http\Controllers\Admin\Traits\Notification;

use App\Models\Agency;
use App\Notifications\MainNotification;
use App\User;
use Illuminate\Http\Request;

trait PublicityNotificationTrait
{
    public function notifyGet(){
        $users=User::select('name','id','level')->get();
        return view('admin.notification.publicity.sendAll',compact('users'));
    }

    private function checkInputLevel($inputs){
        $users=array();
        $levels=$inputs['levels'] ?? null;
        if($levels)
        {
            foreach($levels as $level){
                array_push($users,User::whereLevel($level));
            }
            return $users[0];
        }
        else
            return null;
    }

    public function notifyPost(Request $request)
    {
        $inputs=$request->all();
        $title=$inputs['title'];
        $message=$inputs['message'];

        /*//check input all
        if($inputs['all'])
        {
            return null;
        }*/
        # check input level
        $users=$this->checkInputLevel($inputs);
        $users ? $users->cursor()->each(function($user){
            $user->notify(new MainNotification("ok ok"));
        }) : null;
        dd("show me boy again because i,m not belief");
        return null;
        # check input agency
        # check input users
        /*$agenciesMobilesList=$this->getListMobilesAgenciesPrivate($inputs);

        $usersId=$this->getListUsersPrivate($inputs);
        $usersId=($agenciesMobilesList->unique())->values();

        $usersId->map(function($idUser){
            auth()->user()->notify(new sendNotifyNotification($idUser,$title,$message));
        });*/
        //auth()->user()->notify(new NoticeAllNotification($listMobiles));
    }

    private function CheckUsers($collection,$inputs,$level)
    {
        if(isset($inputs[$level]))
        {
            return $collection->merge(User::whereLevel($level)->get()->pluck('id'));
        }
        return $collection;
    }

    private function getMobilesAllAgency()
    {
        $agencies=Agency::all();
        $mobiles=collect();
        foreach ($agencies as $agency)
        {
            $mobiles=$mobiles->merge($agency->Contact->mobiles);
        }
        return $mobiles;
    }

    private function getListMobilesAgenciesPrivate($inputs){
        $agencies=collect();
        isset($inputs['agency']) ? $agencies=$this->getMobilesAllAgency() : null;
        return $agencies;
    }

    private function getListUsersPrivate($inputs){
        $users=collect();
        if(!isset($inputs['all'])){
            $users=$this->CheckUsers($users,$inputs,'supplier');
            $users=$this->CheckUsers($users,$inputs,'person');
            $users=$this->CheckUsers($users,$inputs,'clerk');
            $users=$this->CheckUsers($users,$inputs,'company');

            if(isset($inputs['users']))
            {
                $users=$users->merge(collect($inputs['users'])->map(function ($id){return (int)  $id;}));
            }
        }
        elseif(isset($inputs['all'])){
            $users=User::all()->pluck('id');
        }
    }

}
