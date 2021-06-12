<?php

namespace App\Http\Controllers\Supplier;
use App\Models\Bproduct;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use App\Models\Unit;
use App\Traits\Tools\File\FileToolTrait;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProductController extends Controller
{
    use FileToolTrait;

    public function index()
    {
        $listInfo=["route"=>route("ajax.product.user")];
        return view('supplier.product.index',compact('listInfo'));
    }

    public function all()
    {
        $listInfo=["route"=>route("ajax.product.all")];
        return view('supplier.product.index',compact('listInfo'));
    }

    public function create()
    {
        $provinces = Province::orderBy('id')->get();
        $units = Unit::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $bproducts=Bproduct::orderBy('id')->get();
        return view('supplier.product.create',compact('bproducts','provinces','units','categories'));
    }

    public function show(Product $product){
        return $product;
    }

    public function store(Request $request)
    {
        //return $request->all();
        //SaveFile
        $filename=null;
        if ($request->file('file' ))
        {
            $file = $request->file('file');
            $filename = $this->SaveFile($file);
        }
        //SaveFile
        $user=['user_id'=>auth()->user()->id];
        $request->request->add($user);
        $product = new Product($request->all());
        //expire_date
        $product->expire_date=Carbon::now()->addDays($request->expire_date);
        $product->file=$filename;
        $product->save();
        $product->update(['code'=>'p'.$product->id.'u'.auth()->user()->id]);
        alert()->success('کالا با موفقیت ذخیره شد','ذخیره شد');
        return redirect()->route('supplier.product.index');
    }

    public function edit($id){
        //$dtVancouver->diffInHours($dtToronto);
        $provinces = Province::orderBy('id')->get();
        $units = Unit::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $bproducts=Bproduct::orderBy('id')->get();
        $product=Product::find($id);
        //expire_date
        $product->expire_date=now()->diffInDays($product->expire_date);
        return view('supplier.product.edit',compact('product','units','categories','provinces','bproducts'));
    }

    public function block(Request $request)
    {
        $product=Product::find($request->idProduct);
        $product->update(['block'=>!$product->block]);
        return ['id'=>$product->id,'state'=>$product->block];
    }

    public function update(Request $request)
    {
        $request->request->add(['user_id'=>auth()->user()->id]);
        $inputs=$request->all();
        $product=Product::find($request->id);
        //mainer
        //SaveFile
        $filename=null;
        if ($request->file('file' ))
        {
            //remove file
            $this->DeleteFile($product->file);
            //remove file
            $file = $request->file('file');
            $inputs['file']= $this->SaveFile($file);
        }
        //SaveFile
        //expire_date
        $inputs['expire_date']=Carbon::now()->addDays($request->expire_date);
        //mainer
        $product->update($inputs);
        alert()->success('کالا با موفقیت ذخیره شد','ذخیره شد');
        return redirect()->route('supplier.product.index');
    }

    public function destroy(Request $request){
        $id=$request->id;
        $product=Product::findOrFail($id);
        //$renameFileToDeleteFile=$this->RenameDeleteFile($product->file);
        $product->update([
            //'file'=>$renameFileToDeleteFile,
            'delete'=>true
        ]);
        alert()->success('کالا با موفقیت حذف شد','حذف شد');
        return redirect()->back();

    }

}
