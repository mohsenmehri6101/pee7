<?php
namespace App\Http\Controllers\Home;

use App\Events\User\Register\UserActivationEvent;
use App\Models\ActivationCode;
use App\Models\Faq;
use App\Models\Note;
use App\Models\Web;
use App\User;
use Illuminate\Support\Facades\Route;
use Trez\RayganSms\Facades\RayganSms;

class HomeController extends FatherController
{
    public function index()
    {
        return view('home.index',['web'=>Web::first()]);
    }

    public function faq()
    {
        $web=Web::latest()->first();
        $questions=Faq::whereStatus('1')->get();
        return view('home.pages.faq',compact('web','questions'));
    }

    public function note($id)
    {
        $web=Web::latest()->first();
        $note = Note::find ( $id )->first ();
        return view('home.pages.note',compact('note','web'));
    }

    public function BuyAndSell(){
        return "BuyAndSell";
    }

    public function RulesRegister()
    {
        return "ruls-register";
    }
}
