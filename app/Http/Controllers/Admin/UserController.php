<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Traits\User\createAdminTrait;
use App\Http\Controllers\Admin\Traits\User\showUsersTrait;
use App\Http\Controllers\Admin\Traits\User\subCreate;
use App\Http\Controllers\Controller;
use App\Traits\Tools\Cache\CacheToolTrait;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use CacheToolTrait;
    use subCreate;# two Trait createAdminTrait and createSupplierTrait
    use showUsersTrait;

    private function countUsers(){
        return [
            'suppliers'=>User::whereLevel('supplier')->count(),
            'clerks'=>User::whereLevel('clerk')->count(),
            'companies'=>User::whereLevel('company')->count(),
            'persons'=>User::whereLevel('person')->count(),
            'admins'=>User::whereLevel('admin')->count(),
            'all'=>User::all()->count()
        ];
    }

    public function index(){
        $counts=$this->countUsers();
        return view('admin.users.index',compact('counts'));
    }

    public function inTable(Request $request)
    {
        $level=$this->getCache('level');
        return Datatables::of(User::GiveUserWithLevel($level))
            ->addColumn('setting', function(User $user){
                return view('admin.users.layouts.settingColumn',compact('user'));})
            ->addIndexColumn()
            ->make(true);
    }

    public function block(User $user)
    {
        //update user
        $user->changeIsBan();
       $user->isBan() ? alert()->success($user->name.'  بلاک شد') : alert()->success($user->name.'  بلاک نیست');
       return back();
        // back
    }

    public function show(User $user)
    {
        return view('admin.users.showUser',compact('user'));
    }
}
