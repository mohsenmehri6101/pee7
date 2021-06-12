@extends('admin.layouts.master')

@section('title')
    تغییر رمز عبور
@endsection


@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.profile.password') }}">تغییر رمز ورود</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.profile.index') }}">پروفایل</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ auth()->user()->image ? url('images/'.auth()->user ()->image)  : url('images/default/user-avator.jpg') }}" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">
                        تغییر رمز ورود
                    </h3>
                </div>
                <div class="card-footer p-0">
                    @if(auth()->user()->admin)
                        <div class="row">
                            <div class="col-lg-4 col-xs-12 px-4 py-2" style="font-size:95% !important;color: rgba(231,76,60,.8);">
                            @if(! count($errors) > 0)
                                <div id="alert-warning">
                                       <p class="my-0">چند نکته که بهتر است رعایت کنید :</p>
                                       <div class="p-3">
                                           <p>
                                               -
                                               حداقل یک حرف کوچک استفاده کنید
                                           </p>
                                           <p>
                                               -
                                               حداقل یک حرف بزرگ استفاده کنید
                                           </p>
                                           <p>
                                               -
                                               پسورد حداقل باید ۸ کاراکتر باشد
                                           </p>
                                           <p>
                                               -
                                               حداقل از یک عدد استفاده کنید
                                           </p>
                                       </div>
                                   </div>
                            @elseif(count($errors) > 0)
                                    <div id="alert_errors">
                                        <p class="my-0">موارد زیر را رعایت کنید :</p>
                                        <div class="p-3">
                                        @foreach($errors->all() as $error)
                                            <p>
                                                - {{ $error }}
                                            </p>
                                        @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4 col-xs-8 text-center">
                                <form class="p-2 my-2 bg-light" action="{{ route('admin.profile.password' , ['id' => $user->id]) }}" method="post" >
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input name="past_password" class="form-control text-center" placeholder="رمز ورود قبلی" type="password">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" class="form-control text-center" placeholder="رمز ورود جدید" type="password">
                                    </div>
                                    <div class="form-group">
                                        <input name="password_confirmation" class="form-control text-center" placeholder="تکرار رمز ورود جدید" type="password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info form-control">تایید</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-xs-0"></div>
                        </div>
                    @endif
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