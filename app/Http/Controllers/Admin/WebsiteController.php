<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Tools\Image\ImageToolTrait;
use App\Models\Web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    use ImageToolTrait;

    public function index()
    {
        $web=Web::latest()->first();
        return view('admin.setting.web.index',compact('web'));
    }

    public function edit()
    {
        $web=Web::latest()->first();
        return view('admin.setting.web.edit',compact('web'));
    }

    public function update(Request $request)
    {
        $web=Web::latest()->first();
        $filename=$web->logo;
        if ($request->file( 'logo' ))
        {
            // delete image before
            $delete_image=$this->DeleteImage($web->logo);
            // delete image before
            $file = $request->file( 'logo' );
            $filename = $this->SaveImage( $file );
            //$filename = $this->ReSizeImageByReplace($filename,"200");
            //$web->update(['logo'=>$filename]);
            //$request->logo=$filename;
        }

        $web->update(array_merge($request->all(),['logo'=>$filename]));

        alert()->success ('تغییرات با موفقیت اعمال شد','انجام شد');
        return redirect()->route('admin.setting.web.index');
    }

    public function destroy($id)
    {
        //
    }
}
