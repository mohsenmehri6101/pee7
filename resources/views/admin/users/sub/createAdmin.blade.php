@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.sub.create.admin') }}">ایجاد کاربر ادمین</a></li>
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.index') }}">کاربران</a></li>
@endsection

@section('title')
    ایجاد کاربر ادمین
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light-gradient">
            <div class="row my-2">
                <div class="float-right col-md-6 col-sm-6">
                    <h5>
                        ایجاد کاربر ادمین
                    </h5>
                </div>
                <div class="float-left col-md-6 col-sm-6">
                    <a type="button" class="float-left btn btn-outline-info mr-1" href="{{ route('admin.users.admins') }}">
                        مشاهده کاربرهای ادمین
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form pt-3" action="{{ route('admin.users.sub.create.admin.post') }}" method="POST">
                @csrf
                <div class="row py-1">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="نام" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="شماره همراه" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row py-1">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" name="email" placeholder="ایمیل" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    @foreach($permissions as $permission)
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" name="permission[]"
                                 type="checkbox" value="{{ $permission->id }}" id="{{$permission->name}}">
                                <label class="form-check-label" for="{{$permission->name}}">
                                    {{ $permission->title }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row pt-3 pb-0 mb-0">
                    <div class="col">
                        <div class="form-group pb-0 mb-0">
                            <button class="btn btn-block btn-outline-success">
                                ایجاد ادمین
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
