<?php
namespace App\Http\Controllers\Admin;
use App\Category;
use App\Unit;
use Illuminate\Http\Request;
use App\Bproduct;

class BaseProductController extends AdminFatherController
{
    //'name','code','brand','category','description','technical','unit'
    public function index(){
        $products=Bproduct::latest()->paginate(12);
        return view('admin.bproduct.index',compact('products'));
    }

    public function show(Request $request){

        $product=Bproduct::find($request->id);

        return ['name'=>$product->name,
            'code'=>$product->code,
            'brand'=>$product->barnd,
            'category_id'=>$product->category->name,
            'created_at'=>$product->created_at,
            'description'=>$product->description,
            'technical'=>$product->technical,
            'unit_id'=>$product->unit->name,
        ];
    }

    public function create(){
        $categories = Category::orderBy('id')->get();
        $units = Unit::orderBy('id')->get();
        return view('admin.bproduct.create',compact('categories','units'));
    }

    public function store(Request $request){
        $bproduct=Bproduct::create($request->all());
        alert()->success ('کالای مرجع با موفقیت ذخیره شد','ذخیره شد')->autoclose(3000);
        return redirect()->route('admin.bproduct.index');
    }

    public function edit(Bproduct $bproduct)
    {
        $categories = Category::orderBy('id')->get();
        $units = Unit::orderBy('id')->get();
        return view('admin.bproduct.edit',compact('bproduct','categories','units'));
    }

    public function update(Request $request){
        Bproduct::find($request->id)->update($request->all());
        alert()->success ('کالای مرجع با موفقیت ویرایش شد','ویرایش شد')->autoclose(3000);
        return redirect()->route('admin.bproduct.index');
    }

    public function destroy(Request $request)
    {
        Bproduct::find($request->id)->delete();
        alert()->success ('کالای مرجع با موفقیت حذف شد','حذف شد')->autoclose(3000);
        return redirect()->route('admin.bproduct.index');
    }

}
