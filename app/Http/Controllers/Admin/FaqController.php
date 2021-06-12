<?php
namespace App\Http\Controllers\Admin;
use App\Admin;
use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Admin
{
    public function index()
    {
        $questions=Faq::latest()->paginate(12);
        return view('admin.setting.faq.index',compact('questions'));
    }

    //ajax request
    public function status(Request $request)
    {
        $faq=Faq::find($request->id);
        $faq->update([
            'status'=>($faq->status + 1) % 2
        ]);
        return ['status'=>$faq->status];
    }

    public function create()
    {
        $user=auth()->user();
        return view('admin.setting.faq.create',compact('user'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        auth()->user()->questions()->create($request->all());
        alert()->success ('ذخیره با موفقیت انجام شد','ذخیره شد');
        return redirect()->route('admin.setting.faq.index');
    }

    public function edit(Faq $faq)
    {
        $user=auth()->user();
        $question=$faq;
        return view('admin.setting.faq.edit',compact('user','question'));
    }

    public function update(Request $request)
    {
        $faq=Faq::find($request->id);
        $faq->update($request->all());
        alert()->success ('ویرایش با موفقیت انجام شد','ویرایش شد');
        return redirect()->route('admin.setting.faq.index');

    }
    public function destroy(Request $request)
    {
        $faq=Faq::find($request->id);
        $faq->delete();
        alert ()->success( "حذف با موفقیت انجام شد", 'حذف شد' )->autoclose ( '3500' );
        return redirect ()->route ( 'admin.setting.faq.index' );
    }
}
