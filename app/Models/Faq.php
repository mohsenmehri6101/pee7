<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
    protected $fillable=['question','answer','tags','status','category','user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
