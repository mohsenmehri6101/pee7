<?php

namespace App\Http\Controllers\Supplier;

use App\Category;
use App\City;
use App\Http\Controllers\Controller;
use App\Product;
use App\Ticket;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use App\Province;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index(){
        return view('supplier.dashboard');
    }

    //Product
    public function search_product(Request $request){
        switch ($request->status)
        {
            case 0:
                $products = Product::where('name','LIKE','%'.$request->search.'%')
                    ->orWhere('brand','LIKE','%'.$request->search.'%')
                    ->orWhere('description','LIKE','%'.$request->search.'%')->paginate(20);
                $cities = City::orderBy('id')->get();
                $view = view('supplier.product.searchproduct' , ['products'=>$products,'cities'=>$cities])->render();
                return response($view);
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
        }
    }

    //Ticket
    public function ticket()
    {
        $id = Auth::user()->id;
        Ticket::where('user_id',$id)->where('reciver_id',$id)->update(['seen'=>1]);
        $tickets = Ticket::where('user_id',$id)->get();
        return view('supplier.ticket.ticket',compact('tickets'));
    }

    public function saveticket(Request $request)
    {
        $user = Auth::user();
        if (! $user->is_ban)
        {
            $user_id = $user->id;
            $ticket = new Ticket($request->all());
            $ticket->sender_id = $user_id;
            $ticket->user_id = $user_id;
            $ticket->reciver_id = User::whereLevel('admin')->first()->id;
            if($ticket->save())
            {
                $data = ['date'=>verta()->formatDifference(),'msg_id'=>$ticket->id,'state'=>1,'user_id'=>$ticket->sender_id,'user_name'=>User::find($ticket->sender_id)->name];
                return $data;
            }
        }
        else
        {
            $data = ['state'=>0];
            return $data;
        }
    }

    public function count_message(Request $request)
    {
        $id = Auth::user()->id;
        $count =  Ticket::where('reciver_id',$id)->where('seen',0)->count();
        if ($count != 0)
        {
            $time = Ticket::where('reciver_id',$id)->where('seen',0)->latest()->first()->created_at;
            return ['count'=>$count,'time'=>verta($time)->formatDifference()];
        }
        return ['count'=>$count,'time'=>"0"];
    }
    //EndTicket
}