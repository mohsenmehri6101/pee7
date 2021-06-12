@extends('admin.layouts.master')

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.faq.create') }}">ایجاد سوال</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.faq.index') }}">سوالات متداول</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
ایجاد سوال
@endsection

@section('content')
<div class="row">
@include('admin.layouts.erorrs')
<div class="col-md-9">
    <form action="{{ route('admin.setting.faq.store') }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="card card-success card-outline">
            <div class="card-header bg-light-gradient">
                <h3 class="card-title">ایجاد سوال</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="text" class="form-group">سوال</label>
                    <input class="form-control" name="question" placeholder="سوال خود را وارد کنید" value="{{ old('question') }}">
                </div>
                <div class="form-group">
                    <label for="text" class="form-group">جواب</label>
                    <textarea name="answer" class="form-group" id="textckeditor">{{ old('answer') }}</textarea>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-left">
                        <button type="submit" class="btn btn-primary"> ارسال</button>
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
