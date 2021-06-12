<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Person extends Model
{
    //protected $table = 'people';
    protected $fillable=['user_id','self_id','about'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
