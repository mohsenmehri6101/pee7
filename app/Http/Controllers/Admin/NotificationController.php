<?php
namespace App\Http\Controllers\Admin;

use App\Models\Agency;
use App\Http\Controllers\Admin\Traits\Notification\PublicityNotificationTrait;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends AdminFatherController
{
    use PublicityNotificationTrait;
}
