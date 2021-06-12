<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    protected $fillable = ['name','label','tag'];
    public $timestamps=false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeRoleWithTag($query,$tag)
    {
        return $query->whereTag($tag);
    }
}
