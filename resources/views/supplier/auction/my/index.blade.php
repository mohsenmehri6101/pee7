@extends('supplier.layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست مزایده های من</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('supplier.auction.create') }}" class="btn bg-light-gradient border ml-1">ایجاد مزایده جدید</a>
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover bg-se text-center">
                            <tbody>
                            <tr class="bg-secondary-gradient">
                                <th>ردیف</th>
                                <th>عنوان مزایده</th>
                                <th>تاریخ ایجاد</th>
                                <th>توضیحات</th>
                                <th>تصاویر</th>
                                <th>مدت اعتبار</th>
                                <th>تنظیمات</th>
                            </tr>
                            @foreach($auctions as $auction)
                                <tr>
                                    <td>#</td>
                                    <td><a href="{{route('supplier.auction.myauction',['id'=>$auction->id])}}">
                                        {{$auction->title}}
                                    </a></td>
                                    <td>{{verta($auction->created_at)->format('%d %B %Y')}}</td>
                                    <td>{!! substr($auction->description  ,0,100) !!}</td>
                                    <td>pictures</td>
                                    @if(verta($auction->time)->gt(verta()))
                                        <td class="text-success">{{verta($auction->time)->formatDifference()}}</td>
                                    @else
                                        <td class="text-danger">منقضی شده است</td>
                                    @endif
                                    <td>
                                        <a href="{{route('supplier.auction.edit',['id'=>$auction->id])}}" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button onclick="" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                //render
            </div>
        </div>
    </section>
@endsection
@section('title')
    مزایده های من
@endsection
@section('page_header')
    <li class="breadcrumb-item">
        <a class="text-info" href="{{ route('supplier.auction.index') }}">
            مزایده های من
        </a>
    </li>
@endsection


@section('personalize_script')

@endsection

@section('personalize_css')

@endsection