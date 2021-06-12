@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.index') }}">کاربران</a></li>
@endsection

@section('title')
    تنظیمات سایت
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h5>
                        دسته بندی کاربران
                    </h5>
                </div>
                <div class="float-left col-md-6 col-sm-6">
                    <a type="button" class="float-left btn btn-outline-success mr-1" href="{{ route('admin.users.sub.create.admin') }}">
                        ایجاد کاربر ادمین
                    </a>
                    <a type="button" class="float-left btn btn-outline-success mr-1" href="{{ route('admin.users.sub.create.supplier') }}">
                        ایجاد کاربر تولید کننده
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- suppliers -->
                    @include('admin.users.layouts.card',['count'=>$counts['suppliers'],'link'=>'admin.users.suppliers','icon'=>'industry','title'=>'تولید کنندگان'])
                    <!-- suppliers -->
                        <!-- companies -->
                    @include('admin.users.layouts.card',['count'=>$counts['companies'],'link'=>'admin.users.companies','icon'=>'building','title'=>'شرکت ها'])
                    <!-- companies -->
                        <!-- persons -->
                    @include('admin.users.layouts.card',['count'=>$counts['persons'],'link'=>'admin.users.persons','icon'=>'users','title'=>'اشخاص حقیقی'])
                    <!-- persons -->
                        <!-- clerks -->
                    @include('admin.users.layouts.card',['count'=>$counts['clerks'],'link'=>'admin.users.clerks','icon'=>'user-circle-o','title'=>'پشتیبان ها'])
                    <!-- clerks -->
                    <!-- admins -->
                    @include('admin.users.layouts.card',['count'=>$counts['admins'],'link'=>'admin.users.admins','icon'=>'user-circle','title'=>'مدیران سایت'])
                    <!-- admins -->
                    <!-- all users -->
                    @include('admin.users.layouts.card',['count'=>$counts['all'],'link'=>'admin.users.all','icon'=>'user','title'=>'همه کاربران ...'])
                    <!-- all users -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
@endsection
