<?php
namespace App\Http\Controllers\Tools\Notice\layouts;

interface notificationInterface
{
    public static function saveInDB($message,$postLink);

    public static function fire($message,$postLink);
}
