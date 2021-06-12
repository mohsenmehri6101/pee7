<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //Ticket
    public function removeSubstringFromEnd(string $string, int $length)
    {
        return substr($string, 0, strlen($string) - $length);
    }
    public function ticket()
    {
        return view('admin.ticket.ticket');
    }
    public function save_ticket(Request $request)
    {
        $user = User::whereLevel('admin')->first();
        $ticket = new Ticket($request->all());
        $ticket->sender_id = $user->id;
        $ticket->user_id = $request->reciver_id;

        if ($ticket->save())
        {
            $data = ['date'=>verta()->formatDifference(),'msg_id'=>$ticket->id,'state'=>1,'user_id'=>$ticket->sender_id,'user_name'=>$user->name];
            return $data;
        }
        return "false";
    }
    public function single_ticket(Request $request)
    {
        Ticket::where('user_id',$request->user_id)->where('reciver_id',Auth::user()->id)->update(['seen'=>1]);
        $tickets = Ticket::where('user_id',$request->user_id)->get();

        $view = view('admin.ticket.ticketcontent',['tickets'=>$tickets]);
        return response($view);
    }
    public function delete_ticket(Request $request)
    {
        $ticket = Ticket::whereUser_id($request->id)->delete();
        if ($ticket)
        {
            return ["state"=>1,"name"=>$request->name];
        }
        else
        {
            return ["state"=>0];
        }
    }
    public function search_ticket(Request $request)
    {
        $users = User::where('name','LIKE','%'.$request->search.'%')->orWhere('email','LIKE','%'.$request->search.'%')->pluck('id');
        $chat_list = array();
        $chats = Ticket::whereIn('user_id',$users)->get()->groupBy('user_id');
        foreach ($chats as $key=>$value)
        {
            $count = $value->where('reciver_id',Auth::user()->id)->where('seen',0)->count();
            $x = count($value)-1;
            $chat = ['key'=>$key,'last_message'=>mb_substr($value[$x]->message,0,38)."...",'created_at'=>$value[$x]->created_at,'count'=>$count];
            array_push($chat_list,$chat);
        }

        $view = view('admin.ticket.ticketlist',compact('chat_list'));
        return $view;
    }
    //EndTicket

    //count Ticket

    public function count()
    {
        $count =  Ticket::where('reciver_id',Auth::user()->id)->where('seen',0)->count();
        if ($count != 0)
        {
            $time = Ticket::where('reciver_id',Auth::user()->id)->where('seen',0)->latest()->first()->created_at;
            return ['count'=>$count,'time'=>verta($time)->formatDifference()];
        }
        return ['count'=>$count,'time'=>"0"];
    }

    //end Count Ticket

    //ban user
    public function ban_user(Request $request)
    {
        $user = User::find($request->id);
        if ($user->is_ban)
        {
            $user->is_ban = 0;
        }
        else
        {
            $user->is_ban = 1;
        }
        if ($user->update())
        {
            return ["state"=>1,"name"=>$request->name,"key"=>$request->id];
        }
    }
    //end ban user
}
