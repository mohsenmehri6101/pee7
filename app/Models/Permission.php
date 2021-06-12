<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Permission extends Model
{
    protected $fillable = ['name','title','label','tag'];
    public $timestamps=false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function scopePermissionWithTag($query,$tag)
    {
        return $query->whereTag($tag);
    }
}
