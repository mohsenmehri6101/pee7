<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Bproduct;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
		#every things ok
    public function getCityPost(Request $request)
    {
        $nameProvince=$request->nameProvince;
        $cities = City::getAllCitiesForProvince($nameProvince);
        $view = view("layouts.panel.profile.layouts.city",['cities'=>$cities])->render();
        return json_encode($view);
    }

    public function get_city_edit(Request $request)
    {
        $name = $request->name;
        $city_now=auth()->user()->location->city;
        $id=Province::whereName($name)->first()->id;
        $cities = City::where('province_id',$id)->orderBy('id')->get();
        $view = view("layouts.city_edit",['cities'=>$cities,'city_now'=>$city_now])->render();
        return json_encode($view);
    }

    /*public function testsearch(Request $request){
        //'name','code','brand','category_id','description','technical','unit_id'
        $search=$request->search;
        $str = '%'.$search.'%';
        if($search == null)
        {
            $bproducts=Bproduct::orderBy('id','desc')->get();
        }
        else
        {
            $bproducts=Bproduct::where('name','like',$str)->orwhere('code','like',$str)->get();
        }
        return response()->json($bproducts);
    }
    */

    public function get_bproduct(Request $request){
        //'name','code','brand','category_id','description','technical','unit_id'
        $search=$request->search;
        $str = '%'.$search.'%';
        if($search == null)
        {
            $bproducts=Bproduct::orderBy('id','desc')->get();
        }
        else
        {
            $bproducts=Bproduct::where('name','like',$str)->orwhere('code','like',$str)->get();
        }
        $view = view('layouts.bproducts',compact('bproduct'))->render();
        return response($view);
    }
}
