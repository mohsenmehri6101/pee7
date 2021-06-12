@extends('admin.layouts.master')

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.note.edit',['note'=>$note]) }}">
         ویرایش {{ $note->title }}</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.note.index') }}">مقاله های ثبت شده</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
 ویرایش {{ $note->title }}
@endsection

@section('content')
<div class="row">
@include('admin.layouts.erorrs')
<div class="col-md-9">
    <form action="{{ route('admin.setting.note.update' , ['id' => $note->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="text" name="id" value="{{ $note->id }}" hidden>
        <div class="card card-warning card-outline">
            <div class="card-header bg-light-gradient">
                <h3 class="card-title">
                    ویرایش یادداشت
                    <a target="_blank" href="{{ route('admin.setting.note.show',['note'=>$note])}}">{{ $note->title }}</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="text" class="form-group">عنوان</label>
                    <input class="form-control" name="title" value="{{ $note->title,old('title')}}">
                </div>
                <div class="form-group">
                    <label for="text" class="form-group">متن خود را وارد کنید</label>
                    <textarea name="text" class="form-group text-right" id="textckeditor">{{$note->text,old('text') }}</textarea>
                </div>
                <br>
                <span class="m-0 p-0 float-right px-4 pb-1">عکس شاخص</span>
                <hr class="float-none">
                <div class="row">
                    <div class="col-12 my-2 py-2">
                        <div class="form-group">
                            @if($note->image)
                                <a href="{{ url('images/'.$note->image) }}" target="_blank">
                                    <img src="{{ url('images/'.$note->image) }}" class="rounded mx-2" width="80" alt="">
                                </a>
                            @endif
                            <input id="image" class="form-control" type="file" name="image" hidden>
                            <a class="btn btn-sm btn-warning mx-2" onclick="confirm_input_file('image')">
                                <i class="fa fa-plus"></i>
                               آپلود عکس شاخص
                            </a>
                        </div>
                    </div>
                </div>
                <span class="m-0 p-0 float-right px-4 pb-1">آلبوم</span>
                <hr class="float-none">
                <div class="row">
                    @if($note->images)
                        @foreach($note->images as $image)
                            <div class="my2 mx-3">
                                <input onclick="checkbox_function('{{ str_limit($image,5,'id') }}')" name="bimages[]" value="{{ $image }}" type="checkbox" class="form-control my-1" data-toggle="tooltip" title="حذف عکس زیر">
                                <a href="{{ url('images/'.$image) }}" target="_blank">
                                    <img id="{{str_limit($image,5,'id')}}"  src="{{ url('images/'.$image) }}" class="rounded" width="60" >
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="mt-3 col-12">
                        <div class="form-group">
                            <input id="images" class="form-control" type="file" name="images[]" multiple hidden>
                            <a class="btn btn-sm bg-warning-gradient" onclick="confirm_input_file('images')">
                                <i class="fa fa-file-photo-o"></i>
                                <i class="fa fa-file-photo-o"></i>
                                <i class="fa fa-file-photo-o"></i>
                                <i class="">...</i>
                                آپلود آلبوم
                            </a>
                        </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-left">
                        <button type="submit" class="btn bg-warning-gradient"> ارسال</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /. box -->
        </div>
    </form>
</div>
</div>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
    <style>
        .blurr{
            filter: blur(2px) !important;
        }
        .blinking{
            animation:blinkingText 2.5s infinite;
        }
        @keyframes blinkingText{
            0%{     color: #000;    }
            49%{    color: #000; }
            60%{    color: transparent; }
            99%{    color:transparent;  }
            100%{   color: #000;    }
        }
    </style>
@endsection

@section('personalize_script')
    <script>
        checkbox_function=function (id){
            $('#'+id).toggleClass('blurr');
        }
    </script>
    <script>
        confirm_input_file=function (id) {
            document.getElementById(id).click();
        };
    </script>
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#textckeditor'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })
            // bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5({
                toolbar: { fa: true }
            })
        })
    </script>
@endsection
