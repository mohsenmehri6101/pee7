@extends('admin.layouts.master')

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.bproduct.create') }}">ایجاد کالای مرجع</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.bproduct.index') }}">کالای مرجع</a></li>
@endsection

@section('title')
ایجاد کالای مرجع
@endsection

@section('content')
<div class="row">
@include('admin.layouts.erorrs')
<div class="col-md-9">
    <form action="{{ route('admin.bproduct.store') }}" method="post" >
        {{ csrf_field() }}
        <div class="card card-success card-outline">
            <div class="card-header bg-light-gradient">
                <h3 class="card-title">ایجاد کالای مرجع</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name" class="form-group">نام</label>
                            <input class="form-control" name="name" placeholder="نام" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="code" class="form-group">کد</label>
                            <input class="form-control" name="code" placeholder="کد" value="{{ old('code') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="col-form-label col-lg-3 col-sm-12">واحد</label>
                            <select name="unit_id" id="unit_id" class="form-control select2" data-live-search="true">
                                <option value="">واحد خود را انتخاب کنید</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label class="col-form-label col-lg-3 col-sm-12">گروه کالا</label>
                            <select name="category_id" id="category_id" class="form-control select2" data-live-search="true">
                                <option value="">گروه کالای خود را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="unit" class="form-group col-lg-3 col-sm-12">برند</label>
                            <input class="form-control" name="brand" placeholder="برند" value="{{ old('brand') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="technical" class="form-group">مشخصات فنی</label>
                    <textarea name="technical" class="form-group" id="textckeditor">{{ old('technical') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="form-group">توضیح</label>
                    <textarea name="description" style="width:100%;" class="form-group">{{ old('description') }}</textarea>
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
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
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
