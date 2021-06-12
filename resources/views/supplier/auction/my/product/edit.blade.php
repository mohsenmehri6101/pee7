@extends('supplier.layouts.master')
<?php $bproduct_name = $bproducts->find($product->bproduct_id)->name ?>
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5 style="margin-bottom: 0">
                        ویرایش کالای : {{$bproduct_name}}
                    </h5>
                </div>
            </div>
        </div>
        <div class="card-body" >


            <div class="row">
                <div class="col-sm-12">
                    @include('supplier.layouts.erorrs')
                </div>
                <div class="col-sm-12">
                    <form method="post" id="auction_form" role="form" action="{{route('supplier.auction.product.update',['id'=>$product->id])}}" enctype="multipart/form-data">
                        @csrf
                        <input name="auction_id" value="{{$product->auction_id}}" type="hidden">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="bproduct">کالای مرجع</label>
                                <select name="bproduct" id="bproduct" class="form-control select2"  data-live-search="true">
                                    <option value="">کالای مرجع را انتخاب نمایید</option>
                                    @foreach($bproducts as $bproduct)
                                        <option value="{{$bproduct->id}}" @if($bproduct->id == $product->bproduct_id) selected @endif>{{$bproduct->name}} - {{$bproduct->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label for="fresh">وضعیت کالا </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fresh" id="fresh1" value="1" @if($product->fresh) checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">کالای نو</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fresh" id="fresh0" value="0" @if(! $product->fresh) checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">کالای دست دوم</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="m_year">سال ساخت</label>
                                    <input type="number" value="{{$product->m_year}}" class="form-control" name="m_year" id="m_year">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="number">مقدار کالا</label>
                                    <input type="number" value="{{$product->number}}" class="form-control" name="number" id="number">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="price">قیمت پایه</label>
                                    <input type="number" class="form-control" value="{{ $price }}" name="price" id="price" placeholder="250000">

                                    <small class="text-danger">
                                        توجه! قیمت را به ریال وارد نمایید.
                                    </small>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tech_file">فایل مشخصات فنی</label>
                                <input type="file" class="form-control" name="tech_file" id="tech_file">
                                <span>
                                    <small class="text-danger">
                                        دانلود <a target="_blank" href="{{url('/images/'.$product->tech_file)}}" class="text-primary">فایل ضمیمه</a> قدیم
                                    </small>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description" class="form-control" style="height: 50px;resize: none" >{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" id="submit_form_btn" class="btn btn-primary">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>



@endsection
@section('title')
    ویرایش کالا
@endsection

@section('page_header')
    <li class="breadcrumb-item">
        <a class="text-info" href="{{ route('supplier.auction.index') }}">
            ویرایش  {{$bproduct_name}}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-secondary" href="{{ route('supplier.auction.myauction',['id'=>$product->auction_id]) }}">
            {{$auction_title}}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-secondary" href="{{ route('supplier.auction.index') }}">
            مزایده های من
        </a>
    </li>
@endsection

@section('personalize_script')
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection

@section('personalize_css')

    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
    <style>
        .select2{
            width: 100% !important;
        }
        .select2-selection{
            height: 36px!important;
        }
    </style>


@endsection
