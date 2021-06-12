<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    protected $fillable=['user_id','id_company','id_recording','about'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
