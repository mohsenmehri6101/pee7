@extends('admin.layouts.master')

@section('title')
صفحه پروفایل
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.web.edit') }}">ویرایش تنظیمات کلی سایت</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.web.index') }}">تنظیمات کلی سایت</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.setting.web.update' , ['id' => $web->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-mail-reply"></i></span>
                        </div>
                        <input name="email" placeholder="email" value="{{ $web->email,old('email') }}" type="email" class="form-control ltr">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-asterisk"></i></span>
                        </div>
                        <input name="name" placeholder="نام سایت" value="{{ $web->name,old('name') }}" type="text" class="form-control rtl">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-asterisk"></i></span>
                        </div>
                        <input name="title" placeholder="عنوان سایت" value="{{ $web->title,old('title') }}" type="text" class="form-control rtl">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input name="phone" placeholder="شماره تلفن ثابت" value="{{ $web->phone,old('phone') }}" type="text" class="form-control ltr">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                        </div>
                        <input name="mobile" placeholder="شماره موبایل" value="{{ $web->mobile,old('mobile') }}" type="text" class="form-control ltr">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fax"></i></span>
                        </div>
                        <input name="fax" placeholder="شماره فکس" value="{{ $web->fax,old('fax') }}" type="text" class="form-control ltr">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <input name="instagram" placeholder="instagram" value="{{ $web->instagram,old('instagram') }}" type="text" class="form-control ltr">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input name="telegram" placeholder="telegram" value="{{ $web->telegram,old('telegram') }}" type="text" class="form-control ltr">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-telegram"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <input name="facebook" placeholder="facebook" value="{{ $web->facebook,old('facebook') }}" type="text" class="form-control ltr">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-tags"></i></span>
                        </div>
                        <input name="tags" placeholder="برچسب" value="{{ $web->tags,old('tags') }}" type="text" class="form-control rtl">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <input name="map_link" placeholder="لینک نقشه" value="{{ $web->map_link,old('map_link') }}" type="text" class="form-control rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-map"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-info"></i>
                            </span>
                            <textarea name="about" class="form-control text-justify" col="auto" rows="10" cols="240">{{ $web->about,old('about') }}</textarea>
                            <span class="input-group-text">
                                <i class="fa fa-info"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-2">
                    <label for="">لوگوی سایت</label>
                </div>
                <div class="col-3">
                    <input name="logo" type="file">
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <button type="submit" class="form-control btn btn-primary">تایید</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('personalize_script')
@endsection
@section('personalize_css')
@endsection