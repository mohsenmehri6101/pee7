@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item">
        <a class="text-info" href="{{ route('admin.bproduct.index') }}">
        کالای مرجع
        </a>
    </li>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">لیست کالاهای مرجع</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('admin.bproduct.create') }}" class="btn bg-light-gradient border ml-1">ایجاد کالای مرجع</a>
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
                                <th>کد کالا</th>
                                <th>نام کالا</th>
                                <th>دسته</th>
                                <th>برند کالا</th>
                                <th>واحد کالا</th>
                                <th>تنظیمات</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->code }}
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        {{ $product->brand }}
                                    </td>
                                    <td>
                                        {{ $product->unit->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.bproduct.edit',['bproduct'=>$product]) }}" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a data-id="{{ $product->id }}" data-toggle="modal" data-target="#show_bproduct" class="show btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-info px-1"></i>
                                        </a>
                                        <button onclick="destroy({{ $product->id }})" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form hidden id="{{$product->id}}_destroy" class="btn btn-sm btn-outline-danger" action="{{ route('admin.bproduct.destroy'  , ['id' => $product->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                        </form>
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
                {{ $products->render() }}
            </div>
        </div>
    </section>
@endsection

@section('title')
    لیست کالاهای مرجع
@endsection

@section('personalize_script')
    <!-- modal show complete information products -->
    <div class="modal fade bd-example-modal-lg" id="show_bproduct">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5  class="modal-title" id="show_bproduct_name"></h5>
                    <span id="show_bproduct_code" class="float-left text-secondary"></span>
                </div>
                <div class="modal-body">
                    <dl>
                        <dt>مشخصات فنی </dt>
                        <dd class="text-justify" id="show_bproduct_technical">
                        </dd>
                        <dt>توضیحات</dt>
                        <dd class="text-justify" id="show_bproduct_description">
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <!-- modal show complete information products -->
    <script>
        $(document).ready(function(){
            $('.show').on('click',function(){
                $this=$(this);
                var id=$this.data('id');
                // ajax
                $.ajax({
                    method:"get",
                    url:"{{route('admin.bproduct.show')}}",
                    data:{id:id},
                    success:function(data){
                        //console.log(data);
                       $('#show_bproduct_name').text(data.name);
                       $('#show_bproduct_code').text(data.code);
                       $('#show_bproduct_description').text(data.description);
                       $('#show_bproduct_technical').html(data.technical);
                    }
                })
                // ajax

            });
        });
    </script>
    <script>
        destroy=function(id){
            document.getElementById(id+"_destroy").submit();
        }
    </script>
@endsection

@section('personalize_css')
    <style>
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }
    </style>
@endsection