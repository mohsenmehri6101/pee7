@extends('test.layouts.master')

@section('content')
    <div class="container p-3">
    <di class="row">
        <div class="col">
            <h6 class="my-2 py-2">
                <a href="{{ route('test.faq') }}">ایجاد سوالات متداول</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.categories') }}">ایجاد دسته بندی های تستی</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.units') }}">ایجاد واحد های تستی</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.permissions') }}">ایجاد سطوح دسترسی</a>
            </h6>
        </div>
        <div class="col">
            <h6 class="my-2 py-2">
                <a href="{{ route('test.bproduct') }}">ایجاد کالا های مرجع تستی</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.product') }}">ایجاد کالا های  تستی</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.yajra.one') }}">yajra</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.agency') }}">ایجاد نمایندگی ها</a>
            </h6>
        </div>
    </di>
    <div class="row">
        <div class="col text-center">
            <h4 class="text text-info">ایجاد کاربر</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
            <h6 class="my-2 py-2">
                <a class="text-danger" href="{{ url('test/users/login/admin') }}">ورود ادمین</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/login/supplier') }}">ورود کاربر تولید کننده</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/login/person') }}">ورود کاربر حقیقی </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/login/company') }}">ورود کاربر حقوقی </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{url('test/users/login/clerk')}}">ورود کاربر پشتیبان </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ route('test.permissions') }}">
                </a>
            </h6>
        </div>
        <div class="col">
            <hr>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/create/supplier')}}">ایجاد چند کاربر تولید کننده</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/create/person') }}">ایجاد چند کاربر حقیقی </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/create/company') }}">ایجاد چند کاربر حقوقی </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/create/clerk') }}">ایجاد چند کاربر پشتیبان </a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/users/create/number/100') }}">ایجاد کاربر های مختلف (100 نفر)</a>
            </h6>
            <h6 class="my-2 py-2">
                <a href="{{ url('test/notificationAll') }}">اطلاع رسانی ( تست)</a>
            </h6>
        </div>
    </div>
    </div>
@endsection
