@extends('person.layouts.master')

@section('title')
    صفحه پروفایل
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('user.profile.edit') }}">ویرایش اطلاعات</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('user.profile.index') }}">پروفایل</a></li>
@endsection

@section('content')
    <div class="row">
    @include('company.layouts.erorrs')
    <div class="col-md-6">
        <form action="{{ route('user.profile.update' , ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        ویرایش اطلاعات <a class="text" href="{{ route('user.profile.index') }}"> {{ $user->name }}</a>
                    </h3>
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
                        <input class="form-control" name="self_id" value="{{ $user->person->self_id }}" placeholder="شماره ملی">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="mobiles" value="{{ $user->contact->mobiles }}"  onfocus="show('help_input_mobiles')" onfocusout="hide('help_input_mobiles')"  placeholder="تلفن همراه">
                        <p id="help_input_mobiles" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phones" value="{{ $user->contact->phones }}" onfocus="show('help_input_phones')" onfocusout="hide('help_input_phones')" placeholder="تلفن ثابت">
                        <p id="help_input_phones" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <select  name="province" id="provinces"  class="form-control select2" data-live-search="true">
                            <option value="0">استان خود را انتخاب کنید</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}" {{ $province->name == $user->location->province ? 'selected'  : '' }} >{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="city" id="city"  class="form-control select2" data-live-search="true">
                            <option id="city_now" value="{{ $user->location->city }}"  selected >{{ $user->location->city }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="address" id="" class="form-control textarea" rows="1" >{{ $user->location->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="plate" class="form-control" value="{{ $user->location->plate }}">
                    </div>
                    <div class="form-group">
                        <textarea name="about" id="" class="form-control textarea" rows="5" placeholder="توضیحات بیشتر(اختیاری...)">{{ $user->person->about }}</textarea>
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
                            <button type="submit" class="btn btn-danger"> ارسال</button>
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
                $('#city').html(data);
            });
        });
        edit_ajax=function (cs)
        {
            $( document ).ready(function()
            {
                $.ajax(
                    {
                        url: "{{ url('/ajax/getcity-edit') }}",
                        method : "GET",
                        data : {name : cs},
                        dataType : 'json',
                    }).done(function (data)
                {
                    $('#city').html(data);
                });
            });
        };
        @foreach($provinces as $province)
        @if($province->name == $user->location->province)
        edit_ajax('{{$province->name}}');
        @endif
        @endforeach
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