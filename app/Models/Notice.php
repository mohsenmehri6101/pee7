<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable=['from','to','message','type'];
    # from = who send message
    # to = who get message
    # message = text message
    # type = telegram | sms | email
    protected $casts=['type'=>'array'];
}
