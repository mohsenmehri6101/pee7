@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
    تنظیمات سایت
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-globe"></i>
                            </h3>
                            <p>
                                تنظیمات کلی سایت
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.web.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-sticky-note"></i>
                            </h3>
                            <p>
                                مقاله های ثبت شده
                            <span class="badge badge-secondary"></span>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.note.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-sign-in"></i>
                            </h3>
                            <p>
                                صفحه ورود
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.login.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-registered"></i>
                            </h3>
                            <p>
                                صفحه ثبت نام
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.register.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-gavel"></i>
                            </h3>
                            <p>
                                صفحه قوانین و مقررات
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.register.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
                <!-- col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light-gradient">
                        <div class="inner">
                            <h3>
                                <i class="text-secondary fa fa-question-circle-o"></i>
                            </h3>
                            <p>
                                سوالات متداول
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin.setting.faq.index') }}" style="color:black !important;" class="small-box-footer bg-secondary-gradient">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('personalize_script')
@endsection

@section('personalize_css')
@endsection