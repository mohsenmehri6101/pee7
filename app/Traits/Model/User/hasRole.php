<?php
namespace App\Traits\Model\User;

use App\Models\Permission;
use App\Models\Role;

trait hasRole
{
    /* permissions */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }
    public function hasPermission($permission)
    {
        return $this->permissions->contains('name' , $permission->name) || $this->hasRole($permission->roles);
    }
    /* permissions */
}
