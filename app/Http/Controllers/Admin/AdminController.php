<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends AdminFatherController
{
    //index
    public function index()
    {
        return view('admin.index');
    }

    //supplier
    //endSupplier
    public function searchpersons(Request $request)
    {
        if ($request->persons_status == 0)
        {
            if($request->search == '')
            {
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where level = 'user' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.person.users' , compact('users'))->render();
                return response($view);
            }
        }
        elseif ($request->persons_status == 1)
        {
            if($request->search == '') {
                $users = User::where('active',1)->where('level','user')->paginate(25);
                $view = view('admin.person.users' , compact('users'))->render();
                return response($view);
            }
            else
            {
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where active = 1 and level = 'user' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.person.users' , compact('users'))->render();
                return response($view);
            }
        }
        elseif ($request->persons_status == 2)
        {
            if($request->search == '') {
                $users = User::where('active',0)->where('level','user')->paginate(25);
                $view = view('admin.person.users' , compact('users'))->render();
                return response($view);
            }
            else{
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where active = 0 and level = 'user' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.person.users' , compact('users'))->render();
                return response($view);
            }

        }
        else
        {
            alert('درخواست نامشخص است .')->error();
        }
    }
    //endPerson

    public function searchcompanies(Request $request)
    {
        if ($request->companies_status == 0)
        {
            if($request->search == '')
            {
                $users = User::whereLevel('company')->paginate(25);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }
            else
            {
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where level = 'company' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }
        }
        elseif ($request->companies_status == 1)
        {
            if($request->search == '') {
                $users = User::where('active',1)->where('level','company')->paginate(25);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }
            else
            {
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where active = 1 and level = 'company' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }
        }
        elseif ($request->companies_status == 2)
        {
            if($request->search == '') {
                $users = User::where('active',0)->where('level','company')->paginate(25);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }
            else{
                $str = '%'.$request->search.'%';
                $users = DB::select("select * from users where active = 0 and level = 'company' and (name LIKE ? or email LIKE ?)",[$str,$str]);
                $users = $this->arrayPaginator($users, $request);
                $view = view('admin.company.users' , compact('users'))->render();
                return response($view);
            }

        }
        else
        {
            alert('درخواست نامشخص است .')->error();
        }
    }
    //endCompany

    //Unit
    public function showunit(){
        return view('admin.unit');
    }

    public function getunit(Request $request){
        if ($request->ajax())
        {
            $units = Unit::where('name','LIKE','%'.$request->search.'%')->orderBy('id')->paginate(25);
            $view = view('admin.searchunit',['units'=>$units])->render();
            return response($view);
        }
        else
        {
            return response("<h1> سیستم با مشکل مواجه شده است لطفا بعدا تلاش کنید </h1>");
        }

    }

    public function insertunit(Request $request){
        $unit = new Unit($request->all());
        $unit->save();
        return redirect(url('admin/unit'));
    }

    //EndUnit

    //Category
    public function insertcategories()
    {
        $categories = Category::whereNull('subcategories_id')->get();
        return view('admin.insertcategories',['categories'=>$categories]);

    }

    public function savecategories(Request $request)
    {
        $result = new Category($request->all());
        $result->save();
        return redirect(url('admin/categories'));
    }

    public function showcategories()
    {
        $categories = Category::whereNull('subcategories_id')->get();
        return view('admin.showcategories',['categories'=>$categories]);
    }

    public function searchcategories(Request $request)
    {

        if ($request->categories_status)
        {
            if ($request->search == '')
            {
                $categories = Category::whereNull('subcategories_id')->orderBy('id')
                    ->paginate(25);
            }
            else
            {

                $categories = Category::whereNull('subcategories_id')
                    ->where('title','LIKE','%'.$request->search.'%')->orderBy('id')
                    ->paginate(25);
            }
        }
        else{
            if ($request->search == '')
            {

                $categories = Category::orderBy('id')->paginate(25);
            }
            else
            {
                $categories = Category::where('title','LIKE','%'.$request->search.'%')->orderBy('id')
                    ->paginate(25);
            }
        }
        $view = view('admin.Categories',['categories'=>$categories])->render();
        return response($view);
    }

    //EndCategory
}
