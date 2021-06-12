<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\Profile\createOrUpdateProfileTrait;
use App\Http\Controllers\Fathers\ProfileControllerFather;

class ProfileController extends ProfileControllerFather
{
    use createOrUpdateProfileTrait;
    # method index in profileControllerFather
    # method create - store and update - store in createOrUpdateProfileTrait
    # method notificationGet and notificationPost in profileControllerFather
    
}
