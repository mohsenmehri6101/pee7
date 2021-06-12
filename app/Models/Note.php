<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Note extends Model
{
    protected $fillable=['title','image','images','text','user_id','status'];
    protected $casts=['images'=>'array'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
