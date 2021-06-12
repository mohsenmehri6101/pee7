@extends('admin.layouts.master')
@section('title')
    ویرایش اطلاعات {{ $user->name }}
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a href="{{ route('admin.profile.edit.get') }}">ویرایش اطلاعات</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('profile.index') }}">پروفایل</a></li>
@endsection

@section('content')
<div class="row">
    {{--@include('admin.layouts.erorrs')--}}
    <div class="col-md-12">
        <form action="{{ route('admin.profile.edit.post' , ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="card card-warning card-outline">
                <div class="card-header">
                    <h3 class="card-title">ویرایش اطلاعات<a href="{{ route('profile.index') }}"> {{ $user->name }}</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="name" placeholder="نام" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" title="ایمیل را نمیتوانید تغییر دهید!" disabled value="{{ $user->email }}" name="email"  placeholder="ایمیل">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="mobiles" value="{{ $user->contact->mobiles }}"  onfocus="show('help_input_mobiles')" onfocusout="hide('help_input_mobiles')" placeholder="تلفن همراه">
                        <p id="help_input_mobiles" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phones" value="{{ $user->contact->phones }}" onfocus="show('help_input_phones')" onfocusout="hide('help_input_phones')" placeholder="تلفن ثابت">
                        <p id="help_input_phones" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        @include('layouts.panel.profile.layouts.editProvinces')
                    </div>
                    <div class="form-group">
                        <select name="city" id="city_id"  class="form-control select2" data-live-search="true">
                            <option id="city_now" value="{{ $user->location->city }}"  selected >{{ $user->location->city }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="" class="form-control textarea" rows="1" placeholder="آدرس">{{ $user->location->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="plate" class="form-control" placeholder="کد پستی ده رقمی" value="{{ $user->location->plate }}">
                    </div>
                    <div class="form-group">
                        <textarea name="about" id="" class="form-control textarea" rows="5" placeholder="توضیحات بیشتر(اختیاری...)">{{ $user->admin->about }}</textarea>
                    </div>
                    <div class="form-group">
                        @if($user->image)
                            <a href="{{ url('images/'.$user->image) }}" target="_blank">
                                <img src="{{ url('images/'.$user->image) }}" class="rounded" width="80" alt="">
                            </a>
                        @endif
                        <input id="image" class="form-control" type="file" name="image" hidden>
                        <a class="btn btn-sm btn-warning" onclick="confirm_input_file()">
                            <i class="fa fa-plus"></i>
                            ویرایش عکس
                        </a>
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

@section('personalize_script')
    <script>
        confirm_input_file=function () {
            document.getElementById('image').click();
        };
        show=function(id){
            document.getElementById(id).style.display = "block";
        };
        hide=function (id) {
            document.getElementById(id).style.display="none";
        };
    </script>
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
@endsection

@section('personalize_css')
<link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
<style>
    .blinking{
        animation:blinkingText 2.5s infinite;
    }
    @keyframes blinkingText{
        0%{ color: #000;}
        49%{color: #000;}
        60%{color: transparent;}
        99%{color:transparent;}
        100%{color: #000;}
    }
</style>
@endsection
