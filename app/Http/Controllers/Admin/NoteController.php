<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Note;
use App\Traits\ImageTrait;

class NoteController extends AdminFatherController
{
    use ImageTrait;

    public function index()
    {
        $notes=Note::latest()->paginate(12);
        return view('admin.setting.notes.index',compact('notes'));
    }

    //ajax request
    public function status(Request $request)
    {
        $note=Note::find($request->id);
        $note->update([
            'status'=>($note->status + 1) % 2
        ]);
        return ['status'=>$note->status];
    }

    public function create()
    {
        $user=auth()->user();
        return view('admin.setting.notes.create',compact('user'));
    }

    public function store(StoreNoteRequest $request)
    {
        $note=new Note();
        $note->user_id=$request->id;
        $note->title=$request->title;
        $note->text=$request->text;
        if ($request->hasFile('image'))
        {
            $note->image=$this->SaveImage($request->file ( 'image' ) );
        }
        if($request->hasFile('images'))
        {
            $note->images=$this->SaveImages($request->file('images'));
        }
        if($note->save())
        {
            alert()->success ('یادداشت شما با موفقیت ذخیره شد','ذخیره شد');
            return redirect()->route('admin.setting.note.index');
        }
    }

    public function show(Note $note)
    {
        return view('admin.setting.notes.show',compact('note'));
    }

    public function edit(Note $note)
    {
        $user=auth()->user();
        return view('admin.setting.notes.edit',compact('user','note'));
    }

    public function update(Request $request)
    {
        $note=NOte::find($request->id);
        $note->update([
            'title'=>$request->title,
            'text'=>$request->text
        ]);
        //save/delete image
        if ($request->hasFile('image'))
        {
            $this->DeleteImage($note->image);
            $note->image=$this->SaveImage($request->file ( 'image' ) );
        }
        //save/delete image
        $new_images=array();
        $images=array();
        $images=$note->images;
        if ($request->bimages and  $request->hasFile('images'))
        {
            $this->DeleteImages($request->bimages);
            $new_images=$this->SaveImages($request->file('images'));
            $diff_images=array_diff($note->images,$request->bimages);
            $images=array_merge($new_images,$diff_images);
        }
        elseif ($request->bimages)
        {
            $this->DeleteImages($request->bimages);
            $images=array_diff($note->images,$request->bimages);
        }
        elseif ($request->hasFile('images'))
        {
            $new_images=$this->SaveImages($request->file('images'));
            if(!$note->images)
                $images=$new_images;
            else
                $images=array_merge($new_images,$note->images);
        }
        $note->update(['images'=>$images]);
        alert()->success ('ویرایش با موفقیت انجام شد','ویرایش شد');
        return redirect()->route('admin.setting.note.index');

    }

    public function destroy(Request $request)
    {
        $note=Note::find($request->id);
        if($note->image)
            $this->DeleteImage($note->image);
        if($note->images)
            $this->DeleteImages($note->images);
        $note->delete();
        alert ()->success( "حذف با موفقیت انجام شد", 'حذف شد' )->autoclose ( '3500' );
        return redirect ()->route ( 'admin.setting.note.index' );
    }
}
