<?php $varr=auth()->user()->level;?>
@extends("{$varr}.layouts.master")

@section('title')
    پروفایل تولیدکننده
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ urlCustom('profile') }}">پروفایل</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                @include('layouts.panel.header.widget_user_header')
                <div class="card-footer p-5">
                    <form action="{{ urlCustom('profile/notification') }}" method="POST" >
                        @csrf
                        <div class="row text-center  p-3">
                            <div class="col bg-gray  p-3">
                                <label class="label" for="email">
                                    عملیات
                                </label>
                            </div>
                            <div class="col">
                                <label class="label pointer_pointer" for="email">ایمیل</label>
                            </div>
                            <div class="col">
                                <label class="label pointer_pointer" for="sms">پیامک</label>
                            </div>
                            <div class="col">
                                <label class="label pointer_no_drop" for="databaseshow" >اعلانات سایت</label>
                            </div>
                            <div class="col">
                                <label class="label pointer_no_drop text-muted" for="telegram">تلگرام</label>
                            </div>
                        </div>
                        <div class="row p-3 text-center">
                            <div class="col bg-gray p-3">
                                <label class="label" for="email">اطلاع رسانی</label>
                            </div>
                            <div class="col">
                                <input type="checkbox" name="email" id="email" value="1" {{ in_array("email",$notification) ? 'checked' : ''}} class="form-control checkbox">
                            </div>
                            <div class="col">
                                <input type="checkbox" name="sms" id="sms" value="1" {{ in_array("sms",$notification) ? 'checked' : ''}} class="form-control checkbox">
                            </div>
                            <div class="col">
                                <input disabled type="checkbox" name="databaseshow" id="databaseshow"  checked class="form-control checkbox">
                                <input hidden type="checkbox" name="database" value="1" checked>
                            
                            </div>
                            <div class="col">
                                <input disabled type="checkbox" name="telegram" id="telegram" value="0" class="form-control pointer_no_drop checkbox">
                            </div>
                        </div>
                        <div class="row p-3 text-center">
                            <button class="btn p-2 btn-block bg-success" type="submit">ثبت تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
                <!-- /.widget-user -->
            </div>
        </div>
@endsection

@section('personalize_script')
@endsection

@section('personalize_css')
@endsection