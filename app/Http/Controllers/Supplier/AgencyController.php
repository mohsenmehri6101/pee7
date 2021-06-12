<?php

namespace App\Http\Controllers\Supplier;

use App\Province;
use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agency;
use App\Location;
use App\Contact;

class AgencyController extends Controller
{
    public function index(){
        return view('supplier.agency.index');
    }

    public function create(){
        $provinces = Province::orderBy('id')->get();
        return view('supplier.agency.create',compact('provinces'));
    }

    public function store(Request $request)
    {
        $inputs=$request->all();
        $id=auth()->user()->id;
        if(auth()->user()->level=='clerk'){
            $id=auth()->user()->clerk->supplier_id;
        }
        //location
        $location = Location::create ( [
            'province' => $inputs['province'],
            'city' => $inputs['city'],
            'plate' => $inputs['plate'],
            'address' => $inputs['address'],
        ] );
        //location
        //contact
        $contact = Contact::create ( [
            'mobiles' => $inputs['mobiles'],
            'phones' => $inputs['phones'],
            'fax' => $inputs['fax'],
            'website' => $inputs['website'],
            'telegram' => $inputs['telegram'],
        ] );
        //contact
        //agency
        $agency=Agency::create([
            'location_id'=>$location->id,
            'contact_id'=>$contact->id,
            'user_id'=>$id,
            'management'=>$inputs['management'],
            'description'=>$inputs['description'],
            'code_agency'=>$inputs['code_agency']
        ]);
        //agency
        $contact->update(['agency_id'=>$agency->id]);
        $location->update(['agency_id'=>$agency->id]);
        alert()->success( "نمایندگی جدید با موفقیت ایجاد شد", "ذخیره شد" )->autoclose('3000');
        return redirect ()->route ( 'supplier.agency.index' );
    }

    public function search(Request $request)
    {
        $search=$request->search;
        $str = '%'.$search.'%';
        if($search == null)
        {
            $agencies=Agency::orderBy('id','desc')->with('location')->with('contact')->paginate(15);
        }
        else
        {
            $agencies=Agency::where('management','like',$str)->orwhere('description','like',$str)->orwhere('code_agency','like',$str)->paginate(15);
        }
        $view = view('supplier.agency.agencies',compact('agencies'))->render();
        return response($view);
    }

    public function show(Agency $agency){
        return view('supplier.agency.show',compact('agency'));
    }

    public function edit(Agency $agency){
        $provinces = Province::orderBy('id')->get();
        $id=Province::whereName($agency->location->province)->first()->id;
        $cities = City::where('province_id',$id)->orderBy('id')->get();
        return view('supplier.agency.edit',compact('provinces','agency','cities'));
    }

    public function update(Request $request)
    {
        $inputs=$request->all();
        $agency=Agency::find($request->id);
        //location
        $agency->location->update(
            [
                'province' => $inputs['province'],
                'city' => $inputs['city'],
                'plate' => $inputs['plate'],
                'address' => $inputs['address']
            ]
        );
        //location
        //contact
        $agency->contact->update(
            [
                'mobiles' => $inputs['mobiles'],
                'phones' => $inputs['phones'],
                'fax' => $inputs['fax'],
                'website' => $inputs['website'],
                'telegram' => $inputs['telegram']
            ]
        );
        //contact
        //agency
        $agency->update(
            [
                'management'=>$inputs['management'],
                'description'=>$inputs['description'],
                'code_agency'=>$inputs['code_agency']
            ]
        );
        //agency
        alert()->success( "ویرایش نمایندگی با موفقیت انجام شد", "ویرایش انجام شد" )->autoclose('3000');
        return redirect ()->route ( 'supplier.agency.index' );
    }

    public function destroy(Request $request){
        $agency=Agency::find($request->id);
        $agency->location->delete();
        $agency->contact->delete();
        $agency->delete();
        alert()->warning('حذف نمایندگی با موفقیت انجام شد','حذف شد')->autoclose('3000');
        return redirect()->route('supplier.agency.index');

    }
}