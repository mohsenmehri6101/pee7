<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Location extends Model
{
    protected $fillable=['province','city','address','plate','user_id','agency_id'];
    public $timestamps=false;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Agency(){
        return $this->belongsTo(Agency::class);
    }
}
