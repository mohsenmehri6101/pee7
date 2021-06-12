<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=['user_id','about'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Clerks()
    {
        return $this->hasMany(Clerk::class,'supplier_id');
    }
}
