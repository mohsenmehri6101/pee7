@extends('supplier.layouts.master')

@section('title')
    اطلاعات کامل نمایندگی
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.agency.show',['agency'=>$agency]) }}">{{ $agency->code_agency }}</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.agency.index') }}">نمایندگی ها</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <a class="text-warning float-left" href="{{ route('supplier.agency.edit',['agency'=>$agency]) }}">
            <span class="fa fa-edit"></span>
        </a>
    </div>
</div>
<div class="row">
    <div class="col">
        <h5>
            معرفی نمایندگی
        </h5>
        <table class="table table-striped text-center" id="html_table" width="100%">
            <thead>
            <tr>
                <th class="font-weight-bold">نام مدیر</th>
                <th class="font-weight-bold">کد دفتر</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> {{ $agency->location->city }}</td>
                <td> {{ $agency->code_agency }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <h5>
            موقعیت مکانی
        </h5>
        <table class="table table-striped text-center" id="html_table" width="100%">
            <thead>
            <tr>
                <th class="font-weight-bold">استان</th>
                <th class="font-weight-bold">شهرستان</th>
                <th class="font-weight-bold">آدرس</th>
                <th class="font-weight-bold">کد پستی</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> {{ $agency->location->province }}</td>
                <td> {{ $agency->location->city }}</td>
                <td> {{ $agency->location->address }}</td>
                <td> {{ $agency->location->plate }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <h5>
            راه های ارتباطی
        </h5>
        <table class="table table-striped text-center" id="html_table" width="100%">
            <thead>
            <tr>
                <th class="font-weight-bold">تلفن همراه</th>
                <th class="font-weight-bold">تلفن ثابت</th>
                <th class="font-weight-bold">آدرس وب سایت</th>
                <th class="font-weight-bold">شماره فکس</th>
                <th class="font-weight-bold">شماره/آیدی تلگرام</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td> {{ $agency->contact->mobiles }}</td>
                <td> {{ $agency->contact->phones }}</td>
                <td> {{ $agency->contact->website }}</td>
                <td> {{ $agency->contact->fax }}</td>
                <td> {{ $agency->contact->telegram }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection