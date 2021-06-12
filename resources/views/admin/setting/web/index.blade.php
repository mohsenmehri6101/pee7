@extends('admin.layouts.master')

@section('title')
@endsection

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.web.index') }}">تنظیمات کلی سایت</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-9 border-left">
        <a href="http://127.0.0.1:8000/admin/setting/web/edit" class="btn btn-outline-secondary float-left">ویرایش</a>
        <h4>
            <i class="fa  fa-asterisk ">
                نام سایت :
            </i>
            {{ $web->name }}
        </h4>

        <h5 class="pt-4 pl-2">
                <i class="fa fa-info  pl-2" > توضیح کوتاه سایت : </i>
        </h5>
        <p class="pt-1 text-justify">
                {{ $web->about }}
        </p>

        <p class="bg-gray-light p-2 rounded border">
            <i class="fa fa-tag">
                برچسب :
            </i>
            {{ $web->tags }}
        </p>

    </div>
    <div class="col-3">
        <div class="col my-1 bg-gray-light p-2 rounded border">
            <h6>راه های ارتباطی</h6>
            <hr>
            <p>
                <i class="fa fa-phone">
                    تلفن ثابت :
                </i>
                <span>
                    {{ $web->phone }}
                </span>
            </p>

            <p>
                <i class="fa fa-mobile"> شماره موبایل : </i>
                <span>
                    {{ $web->mobile }}
                </span>
            </p>

            <p>
                <i class="fa fa-fax"> شماره فکس  : </i>
                <span>
                    {{ $web->fax }}
                </span>
            </p>
        </div>
        <div class="col my-1 bg-gray-light p-2 rounded border">
            <h6>شبکه های اجتماعی</h6>
            <hr>

            <p>
                <i class="fa fa-instagram"> اینستاگرام  : </i>
                <span>
                    {{ $web->instagram }}
                </span>
            </p>

            <p>
                <i class="fa fa-telegram"> تلگرام  : </i>
                <span>
                    {{ $web->telegram }}
                </span>
            </p>

            <p>
                <i class="fa fa-facebook"> فیس بوک  : </i>
                <span>
                    {{ $web->telegram }}
                </span>
            </p>

        </div>
    </div>
</div>
@endsection

@section('personalize_script')
@endsection
@section('personalize_css')
@endsection