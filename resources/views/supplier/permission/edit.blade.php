@extends('supplier.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.clerk.permission.edit',['user'=>$user]) }}">تعیین سطح دسترسی پشتیبان</a></li>
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.clerk.index') }}">پشتیبان</a></li>
@endsection

@section('title')
    صفحه پشتیبان
@endsection

@section('content')
    <div class="row">
        @include('supplier.layouts.erorrs')
        <div class="col-md-12">
            <form class="bg-white rounded border" action="{{ route('supplier.clerk.permission.update' , ['id' => $user->id]) }}" method="post" >
                {{ csrf_field() }}
                <h4 class="pt-4 pr-4">تعیین سطح دسترسی <a href="{{ route('supplier.clerk.index') }}">{{ $user->name }}</a></h4>
                <div class="container-fluid p-5">
                    <input type="text" name="name" value="{{ $user->name }}" hidden>
                    <input type="text" name="id" value="{{ $user->id }}" hidden>
                    @foreach($permissions as $permission)
                        <div class="form-group">
                            <input class="choose" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ in_array(trim($permission->id),$user->permissions->pluck('id')->toArray()) ? 'checked'  : '' }} >
                            <label class="label">
                            <span class="text-info px-2">
                                {{ $permission->name }}
                            </span>
                                -
                                <span class="text-secondary">
                                {{ $permission->label }}
                            </span>
                            </label>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <input name="all" id="all_checked" type="checkbox">
                        <label class="label">
                            <span class="text-info px-2">
                                دسترسی کامل
                            </span>
                        </label>
                    </div>
                    <div class="card-footer bg-light-gradient">
                        <div class="float-left">
                            <button type="submit" class="btn btn-primary"> ارسال</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('personalize_script')
    <script src="{{ url('plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-red',
                radioClass: 'iradio_square-red',
                increaseArea: '20%' // optional
            });
        });
    </script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('plugins/iCheck/all.css') }}">
    <style>
        .input-ins{
            position: absolute;
            opacity: 0;
        }
        .ins{
            position:absolute;
            top:0%;
            left:0%;
            display:block;
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
            background:rgb(255, 255, 255) none repeat scroll 0% 0%;
            border:0px none;
            opacity:0;
        }
    </style>
@endsection