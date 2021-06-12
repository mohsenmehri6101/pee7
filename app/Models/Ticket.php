<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ticket extends Model
{
    protected $fillable=[ 'reciver_id' , 'sender_id' ,  'message','user_id' ];

}
