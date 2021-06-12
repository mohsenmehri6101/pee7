<?php

namespace App\Http\Controllers\Clerk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index(){
        return view('clerk.dashboard');
    }
}
