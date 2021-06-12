@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <table class="table border" id="tableme">
            <thead>
            <tr>
                <th>آیدی</th>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تاریخ ساخت</th>
                <th>تاریخ آپدیت</th>
            </tr>
            </thead>
        </table>
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
                ajax: '{!! route('test.yajra.one_getusers') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                ]
            });
            $('input[type="search"]').addClass('form-control');
            $('input[type="search"]').attr("placeholder","جستجو...");
            $('select[name="tableme_length"]').addClass('rounded');
        });
    </script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('title')
   قسمت اول
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('test.yajra.three') }}">قسمت سوم</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('test.yajra.two') }}">قسمت دوم</a></li>
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('test.yajra.one') }}">قسمت اول</a></li>
@endsection