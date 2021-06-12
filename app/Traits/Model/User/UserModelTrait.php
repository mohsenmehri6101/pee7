<?php
namespace App\Traits\Model\User;

trait UserModelTrait
{
    public function level($level){
        return  $this->level==$level;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function getID(){
        return $this->id;
    }

    public function isActive(){
        return $this->active;
    }

    public function confirm($confirm){
        return $this->confirm==$confirm;
    }

    public function scopeGiveUserWithLevel($query,$level=null)
    {
        return $level ? $query->whereLevel($level) : $query;
    }

    public function scopeActiveUser($query)
    {
        return $query->update(['active'=>true]);
    }

}
