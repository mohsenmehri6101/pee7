@extends('company.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a href="{{ route('company.profile.create') }}">اطلاعات تکمیلی</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('company.profile.index') }}">پروفایل</a></li>
@endsection

@section('title')
    اطلاعات تکمیلی {{ auth()->user()->name }}
@endsection

@section('content')
    <div class="row">
    @include('company.layouts.erorrs')
    <div class="col-md-9">
        <form action="{{ route('company.profile.store' , ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">اطلاعات تکمیلی <a href="{{ route('company.profile.index') }}"> {{ $user->name }}</a></h3>
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
                        <input class="form-control" name="id_company" value="{{old('id_company')}}" placeholder="شناسه شرکت">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="id_recording" value="{{old('id_recording')}}" placeholder="شماره ثبت">
                    </div>
                    <div class="form-group">
                       <input class="form-control" name="mobiles" value="{{ old('mobiles') }}"  onfocus="show('help_input_mobiles')" onfocusout="hide('help_input_mobiles')"  placeholder="تلفن همراه">
                        <p id="help_input_mobiles" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phones" value="{{ old('phones') }}" onfocus="show('help_input_phones')" onfocusout="hide('help_input_phones')" placeholder="تلفن ثابت">
                        <p id="help_input_phones" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <select  name="province" id="provinces"  class="form-control select2" data-live-search="true">
                            <option value="0">استان خود را انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="city" id="city_id"  class="form-control select2" data-live-search="true">
                            <option value="" id="province_city">لطفا ابتدا استان خود را انتخاب نمایید</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="" class="form-control textarea" rows="1" placeholder="آدرس">{{ old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="plate" class="form-control" placeholder="کد پستی ده رقمی" value="{{ old('plate') }}">
                    </div>
                    <div class="form-group">
                        <textarea name="about" id="" class="form-control textarea" rows="5" placeholder="توضیحات بیشتر(اختیاری...)">{{ old('about') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input id="image" class="form-control" type="file" name="image" hidden>
                        <a class="btn btn-sm btn-warning" onclick="confirm_input_file()">
                            <i class="fa fa-plus"></i>
                            آپلود عکس
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
<script>
    $('.select2').select2();
    $('#provinces').on('change',function () {
        cs = $(this).children("option:selected").val();
        $.ajax({
            url: "{{ url('/ajax/getcity') }}",
            method : "GET",
            data : {name : cs},
            dataType : 'json',
        }).done(function (data) {
            $('#city_id').html(data);
        });
    })
</script>
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