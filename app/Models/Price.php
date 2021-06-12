<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable=['bproduct_auction_id','user_id','price'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
