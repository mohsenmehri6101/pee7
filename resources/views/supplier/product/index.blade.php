@extends('supplier.layouts.master')
@section('content')
    <div class="card card-info card-outline">
            <div class="card-header bg-light-gradient">
                <div class="row">
                    <div class="float-right col-md-6 col-sm-6">
                        <h5>
                            کالاها
                        </h5>
                    </div>
                    <div class="float-left col-md-6 col-sm-6">
                        <a type="button" class="float-left btn btn-outline-success mr-1" href="{{ route('supplier.product.create') }}">
                            کالای جدید
                        </a>
                        <a type="button" class="float-left btn {{ strpos($listInfo["route"], 'user')  ? "btn-info" : "btn-outline-info" }} ml-1" href="{{ route('supplier.product.index') }}">
                            کالاهای من
                        </a>
                        <a type="button" class="float-left btn {{ strpos($listInfo["route"], 'all')  ? "btn-info" : "btn-outline-info" }} ml-1" href="{{ route('supplier.product.all') }}">
                            همه کالا ها
                        </a>
                    </div>
                </div>
            </div>
        <div class="card-body">
            <div class="col">
                @include('layouts.product.productTable',['listInfo'=>$listInfo])
            </div>
        </div>
    </div>
    </div>
@endsection

@section('personalize_script')
    <script src=" {{ url('js/jquery.dataTables.min.js') }} "></script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.product.index') }}">نمایش کالا</a></li>
@endsection

@include('layouts.title',['title'=>'مشاهده و مدیریت کالاها'])