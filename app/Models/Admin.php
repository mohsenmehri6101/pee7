<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=['user_id','about'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
