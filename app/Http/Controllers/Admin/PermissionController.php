<?php
namespace App\Http\Controllers\Admin;
use App\Role;

class PermissionController extends AdminFatherController
{
    public function index()
    {
        $roles=Role::latest()->paginate(25);
        return view('admin.permission.index');
    }
}
