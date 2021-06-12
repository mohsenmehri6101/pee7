@section('content')
    <div class="card">
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
                    <a type="button" class="float-left btn btn-info ml-1" href="{{ route('supplier.product.all') }}">
                        همه کالا ها
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col">
                <table class="table border" id="tableme">
                    <thead>
                    <tr class="text-center">
                        <th class="border-right">کد کالا</th>
                        <th class="border-right">نام کالا</th>
                        <th class="border-right">وضعیت</th>
                        <th class="border-right">تاریخ انقضا</th>
                        <th class="border-right">تنظیمات</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('personalize_script')
    <script src=" {{ url('js/jquery.dataTables.min.js') }} "></script>
    <script>
        $(function() {
            $('#tableme').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('supplier.product.all') !!}',
                columns: [
                    { data:'code', name: 'code'},
                    { data:'name', name: 'name' },
                    { data:'state', name: 'state' },
                    { data:'DT_RowData.data-expire',name:'expire',orderable:false,searchable:false },
                    { data:'setting',name:'setting',orderable:false,searchable:false},
                ]
            });
            $('input[type="search"]').addClass('form-control');
            $('input[type="search"]').attr("placeholder","جستجو...");
            $('select[name="tableme_length"]').addClass('rounded');
        });
    </script>
    <script>
        $(document).ready(function(){
            edit_product=function(tthis){
                let stri=(tthis.parent()).parent().attr('id');
                let last=stri.slice(0,stri.indexOf("_"));
                let link_page=window.location.href;
                tthis.link=link_page+'/edit/'+last;
                window.open(tthis.link);
            }
        });
    </script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    {{--<script>
        document.addEventListener("DOMContentLoaded", function(event) {
            $(document).ready(function(){console.log('every thins is ok')});
        });
    </script>--}}
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.product.index') }}">نمایش کالا</a></li>
@endsection

@include('layouts.title',['title'=>'مشاهده و مدیریت کالاها'])

@extends('supplier.layouts.master')