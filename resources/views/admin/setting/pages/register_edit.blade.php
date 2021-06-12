@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.register.edit') }}">
            ویرایش صفحه ثبت نام
        </a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.register.index') }}">تنظیم صفحه ثبت نام</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
    ویرایش صفحه ثبت نام
@endsection

@section('content')
    <div class="row">
        @include('admin.layouts.erorrs')
        <div class="col-md-9">
            <form action="{{ route('admin.setting.register.update' , ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <input type="text" name="id" value="{{ $setting->id }}" hidden>
                <div class="card card-warning card-outline">
                    <div class="card-header bg-light-gradient">
                        <h3 class="card-title">
                            ویرایش صفحه ورود
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text" class="form-group">عنوان</label>
                            <input class="form-control" name="title" value="{{ $setting->title,old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="body" class="form-group">متن خود را وارد کنید</label>
                            <textarea name="body" class="form-control" rows="5">{{$setting->body,old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="link" class="form-group">لینک</label>
                            <a style="cursor:pointer !important;color:white;" class="badge badge-info" data-toggle="collapse" data-target="#link_explain">توضیح</a>
                            <div  id="link_explain" class="collapse text text-justify text-secondary">
                                <br>
                                <p>
                                    برای توضیحات بیشتر(تبلیغات/اطلاع رسانی) میتوانید یک مقاله بسازید و لینک آن را در اینجا قرار دهید
                                </p>
                            </div>
                            <input type="text" class="form-control" name="link" value="{{$setting->list['link'],old('link')}}">
                        </div>
                        <br>
                        <hr class="float-none" style="visibility: hidden !important;" >
                        <div class="form-group">
                            <span class="m-0 p-0 float-right px-4 pb-1">عکس</span>
                            <a style="cursor:pointer !important;color:white;" class="badge badge-info" data-toggle="collapse" data-target="#image_explain">توضیح</a>
                            <div id="image_explain" class="collapse text text-justify text-secondary">
                                <br>
                                <p>
                                    در انتخاب عکس موارد زیر را رعایت کنید :
                                </p>
                                <p> - عکس انتخابی بهتر است png باشد
                                    (png عکسی که پشت صحنه ندارد)
                                </p>
                                <p>
                                    - عکس با هر سایزی که آپلود کنید عکس با 200*435 پیکسل ذخیره خواهد شد
                                </p>
                            </div>
                            <hr class="float-none">
                            <div class="row">
                                <div class="col-6 my-2 py-2">
                                    <div class="form-group">
                                        @if($setting->image)
                                            <a href="{{ url('images/'.$setting->image) }}" target="_blank">
                                                <img src="{{ url('images/'.$setting->image) }}" class="rounded mx-2" width="80" alt="">
                                            </a>
                                        @endif
                                        <input id="image" class="form-control" type="file" name="image" hidden>
                                        <a class="btn btn-sm btn-warning mx-2" onclick="confirm_input_file('image')">
                                            <i class="fa fa-plus"></i>
                                            آپلود عکس
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="my2 mx-3">
                                        <span>انتخاب عکس شاخص</span>
                                        <input  name="base_image" value="1" type="checkbox" class="form-control my-1" data-toggle="tooltip" title="حذف عکس زیر">
                                        <a href="{{ url('form-wizard/img/info_graphic_1.svg') }}"  target="_blank">
                                            <img src="{{ url('form-wizard/img/info_graphic_1.svg') }}" class="rounded" width="100" >
                                        </a>
                                    </div>
                                </div>
                            </div>
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
@endsection