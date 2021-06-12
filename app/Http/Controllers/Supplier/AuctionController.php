<?php

namespace App\Http\Controllers\Supplier;

use App\Models\Auction;
use App\Models\Bauction;
use App\Models\Bproduct;
use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Traits\Tools\Image\ImageToolTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    use ImageToolTrait;
    public function all()
    {
        return view('supplier.auction.index');
    }

    public function index()
    {
        $auctions = Auction::where('user_id',Auth::user()->id)->paginate(25);
        return view('supplier.auction.my.index',compact('auctions'));
    }

    public function create()
    {
        return view('supplier.auction.my.create');
    }

    public function store(Request $request)
    {
        $auction = new Auction();
        $auction->title = $request->title;
        $auction->description = $request->description;
        $auction->time = Carbon::now()->addDays($request->day)->addHours($request->hour);
        $auction->user_id = Auth::user()->id;
        if ($request->hasFile('images'))
        {
            $auction->images = $this->SaveImages($request->file('images'));
        }
        if ($auction->save())
        {
            return redirect(route('supplier.auction.index'));
        }

    }

    public function myauction($id)
    {
        $auction = Auction::find($id);
        if ($auction->user_id != Auth::user()->id)
        {
            alert ()->error( 'شما اجازه دسترسی به این بخش را ندارید!', 'هشدار' )->autoclose (3000);
            return back();
        }
        $bproducts = Bproduct::select('id','name','code','unit_id')->get();
        $bauctions = Bauction::where('auction_id',$id)->get();

        return view('supplier.auction.my.myauction',compact('auction','bproducts','bauctions'));
    }

    public function savemyauction(Request $request)
    {
        $id = Auth::user()->id;
        $auction = Auction::find($request->auction_id);
        if ($auction->user_id != $id)
        {
            alert ()->error( 'دسترسی غیر مجاز!در صورت تکرار مورد پیگیری قرار خواهید گرفت.', 'هشدار' )->autoclose (3000);
            return back();
        }
        $bauction = new Bauction();
        $bauction->auction_id = $request->auction_id ;
        $bauction->m_year = $request->m_year ;
        $bauction->bproduct_id = $request->bproduct ;
        $bauction->fresh = $request->fresh ;
        $bauction->number = $request->number ;
        $bauction->description = $request->description ;
        if ($request->hasFile('tech_file'))
        {
            $bauction->tech_file = $this->SaveImage($request->tech_file);
        }
        else
        {
            alert ()->warning( 'متاسفانه مشکلی پیش آمده ، لطفا بعدا تلاش کنید.', 'توجه!' )->autoclose (3000);
            return redirect()->back();
        }
        if ($bauction->save())
        {
            $price = new Price();
            $price->price = $request->price;
            $price->bproduct_auction_id = $bauction->id;
            $price->user_id = $id;
            if ($price->save())
            {
                alert()->success("کالای مورد نظر با موفقیت درج شد.")->autoclose (3000);
            }
            else
            {
                alert()->warning("در ثبت قیمت مشکلی به وجود آمده، لطفا از قسمت ویرایش قیمت جدید وارد نمایید.",'توجه !')->autoclose (3000);
            }
            return redirect()->back();
        }
        else
        {
            alert ()->warning( 'متاسفانه مشکلی پیش آمده ، لطفا بعدا تلاش کنید.', 'توجه!' )->autoclose (3000);
            return redirect()->back();
        }
    }

    public function edit_product($id){
        $u_id = Auth::user()->id;
        $product = Bauction::find($id);
        $auction = Auction::find($product->auction_id);
        $auction_title = $auction->title;
        $auction_title = $auction->title;
        $price = Price::select('price')->where('bproduct_auction_id',$id)->where('user_id',$u_id)->latest()->get()[0]->price;
        $user_id = $auction->user_id;
        $bproducts = Bproduct::select('id','name','code')->get();
        if ($user_id != $u_id)
        {
            alert ()->error( 'دسترسی غیر مجاز!در صورت تکرار مورد پیگیری قرار خواهید گرفت.', 'هشدار' )->autoclose (3000);
            return back();
        }
        return view("supplier.auction.my.product.edit",compact('product','bproducts','auction_title','price'));
    }

    public function update_product(Request $request,$id)
    {

        $rule = [
            'bproduct'=>'required',
            'auction_id'=>'required',
            'fresh'=>'required|boolean',
            'm_year'=>'required|numeric|min:1300|max:2040',
            'number'=>'required|numeric|min:1',
            'price'=>'required|numeric|min:10',
            'description'=>'required',
            'tech_file'=>'mimes:pdf|max:1024',
        ];

        $attribute = [
            'bproduct' => 'کالای مرجع',
            'auction_id' => 'مزایده',
            'fresh' => 'وضعیت کالا',
            'number' => 'مقدار کالا',
            'm_year' => 'سال ساخت',
            'description' => 'توضیحات',
            'price' => 'قیمت پایه',
            'tech_file' => 'فایل مشخصات فنی',

        ];

        $valid = $this->validate($request,$rule,[],$attribute);
        if (! $valid)
        {
            return redirect()->back();
        }
        $user_id = Auction::find($request->auction_id)->user_id;
        if ($user_id != Auth::user()->id)
        {
            alert ()->error( 'دسترسی غیر مجاز!در صورت تکرار مورد پیگیری قرار خواهید گرفت.', 'هشدار' )->autoclose (3000);
            return back();
        }
        $product = Bauction::find($id);
        if ($request->hasFile('tech_file'))
        {
            $product->tech_file = $this->SaveImage($request->tech_file);
        }
        $product->m_year = $request->m_year ;
        $product->bproduct_id = $request->bproduct ;
        $product->fresh = $request->fresh ;
        $product->number = $request->number ;
        $product->description = $request->description ;

        $price = Price::where('bproduct_auction_id',$product->id)->where('user_id',$user_id)->latest()->get()[0];
        $price->price = $request->price;
        if ($price->update())
        {
            if ($product->update())
            {
                alert()->success("کالای مورد نظر با موفقیت ویرایش شد.")->autoclose (3000);
            }
            else
            {
                alert()->warning("متاسفانه سرور با مشکل مواجه شده است.\nلطفا بعدا تلاش کنید.",'توجه !')->autoclose (3000);
            }
        }
        else
        {
            alert()->warning("در ثبت قیمت مشکلی به وجود آمده، لطفا از قسمت ویرایش قیمت جدید وارد نمایید.",'توجه !')->autoclose (3000);

        }
        return redirect(route('supplier.auction.myauction',['id'=>$product->auction_id]));
    }

    public function edit_auction($id){
        $auction = Auction::find($id);
        if ($auction->user_id != Auth::user()->id)
        {
            alert ()->error( 'دسترسی غیر مجاز!در صورت تکرار مورد پیگیری قرار خواهید گرفت.', 'هشدار' )->autoclose (3000);
            return back();
        }
        return view('supplier.auction.my.edit',compact('auction'));
    }

    public function update_auction(Request $request,$id){
        $auction = Auction::find($id);
        if ($auction->user_id != Auth::user()->id)
        {
            alert ()->error( 'دسترسی غیر مجاز!در صورت تکرار مورد پیگیری قرار خواهید گرفت.', 'هشدار' )->autoclose (3000);
            return back();
        }
        $rules = [
            'title'=>'required',
            'day'=>'required|integer|min:0|max:7',
            'hour'=>'required|integer|min:0|max:23',
            'description'=>'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ];
//        return $request->all();

        $attribute = [
            'title' => 'عنوان',
            'day' => 'روزهای اعتبار',
            'hour' => 'ساعت اعتبار',
            'description' => 'شرح مزایده',
            'images.*' => 'ارسال عکس',
            'images'=>'ارسال عکس',
        ];
        if (($request->bimages) == ($auction->images))
        {
            $rules = array_merge($rules,['images'=>'required']);

        }
        $valid = $this->validate($request,$rules,[],$attribute);
        $images = array();
        if (! $request->bimages)
        {
            $request->bimages = array();
        }
        $images = array_diff($auction->images,$request->bimages);
        if ($request->bimages)
        {
            $this->DeleteImages($request->bimages);
        }
        if ($request->hasFile('images'))
        {
            $auction->images = array_merge($images,$this->SaveImages($request->images));
        }

        $auction->title = $request->title;
        $auction->description = $request->description;
        $auction->time = Carbon::now()->addDays($request->day)->addHours($request->hour);

        if ($auction->update())
        {
            alert()->success("کالای مورد نظر با موفقیت ویرایش شد.")->autoclose (3000);

        }
        else
        {
            alert()->warning("متاسفانه سرور با مشکل مواجه شده است.\nلطفا بعدا تلاش کنید.",'توجه !')->autoclose (3000);
        }
        return redirect(route('supplier.auction.index'));

    }
}
