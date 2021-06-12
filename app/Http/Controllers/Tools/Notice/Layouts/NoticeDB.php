<?php
namespace App\Http\Controllers\Tools\Notice\Layouts;

use App\Models\Notice;

class NoticeDB
{
    private static function addTypeToList($types,$type): array
    {
        $types[] = $type;
        $types=array_unique($types);
        return $types;
    }

    public static function noticeInDatabase($message,$to=null, $type=null,$from=null)
    {
        $from= $from  ? $from : (isset(auth()->user()->id) ? auth()->user()->id : null);
        $notice=Notice::firstOrCreate(
            [
                'from'=>$from,
                'to'=>$to,
                'message'=>$message
            ]
        );
        $notice->update([
            'type'=>static::addTypeToList($notice->type ?? array(),$type)
        ]);
        return $notice;
    }


}
