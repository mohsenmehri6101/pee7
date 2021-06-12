@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.register.index') }}">صفحه ثبت نام</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
    تنظیم صفحه ثبت نام
@endsection

@section('content')
    <section class="content">
        <div class="row float-left">
            <a href="{{route('admin.setting.register.edit') }}" class="btn bg-warning-gradient border ">
                ویرایش
            </a>
        </div>
        <br>
        <hr class="float-none">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5">{{ $setting->title }}</h2>
                <div class="row">
                    <div class="col">
                        @if($setting->images)
                            <a target="_blank" class="my-4" href="{{ url('images/'.$setting->images) }}">
                                <img class="rounded" width="300" height="auto" src="{{ url('images/'.$setting->images) }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text text-justify my-4">
                            {!! $setting->body !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="{{$setting->list['link']}}" class="float-left btn btn-primary">ادامه</a>
                        <br class="float-nones">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('personalize_script')
@endsection

@section('personalize_css')
@endsection