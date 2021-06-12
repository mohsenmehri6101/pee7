<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Clerk extends Model
{
    protected $fillable=['supplier_id','about','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
