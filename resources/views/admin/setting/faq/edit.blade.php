@extends('admin.layouts.master')

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.faq.edit',['question'=>$question]) }}">
         ویرایش </a>
</li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.faq.index') }}">سوالات متداول</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
 ویرایش {{ $question->question }}
@endsection

@section('content')
<div class="row">
@include('admin.layouts.erorrs')
<div class="col-md-9">
    <form action="{{ route('admin.setting.faq.update' , ['id' => $question->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="card card-warning card-outline">
            <div class="card-header bg-light-gradient">
                <h3 class="card-title">ایجاد سوال</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="text" class="form-group">سوال</label>
                    <input class="form-control" name="question" placeholder="سوال خود را وارد کنید" value="{{ $question->question,old('question') }}">
                </div>
                <div class="form-group">
                    <label for="text" class="form-group">جواب</label>
                    <textarea name="answer" class="form-group" id="textckeditor">{{ $question->answer,old('answer') }}</textarea>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-left">
                        <button type="submit" class="btn bg-warning-gradient" > ارسال</button>
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
