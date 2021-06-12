<?php
namespace App\Traits\Tools\Session;

trait SessionToolTrait
{

    public function setSession($key,$value)
    {
        return session([$key=>$value]);
    }

    public function getSession($key)
    {
        return session($key);
    }

    public function deleteSession($key)
    {
        return session()->forget($key);
    }
}
