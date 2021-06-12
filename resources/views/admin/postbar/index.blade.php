@extends('admin.layouts.master')

@section('title')
    بررسی کد رهگیری
@endsection


@section('content')
    <div class="card card-success card-outline">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h3 class="card-title">بررسی کد رهگیری مرسوله پستی</h3>
                </div>
            </div>
        </div>
        <form id="product_form" method="post" action="{{ route('admin.notify.sendAll') }}">
            <div class="card-body">
                <!--begin::Form-->
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group  row">
                        <label for="barcode" class="col-form-label col-lg-3 col-sm-12">بررسی کد</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="barcode" id="barcode" class="form-control "
                                   placeholder="کد 20 یا 24 رقمی را وارد کنید">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top bg-light-gradient">
                <div class="row">
                    <div class="col-lg-9 mx-auto" style="text-align: center">
                        <button  type="submit" class="btn btn-block btn-success">بررسی کد</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('personalize_script')
    <script>
        var customer = {
            Username:'09352843550',
            Email:'jafar_rahimi_67@yahoo.com',
            Password:"0639856780Jr"
        };
        $.ajax({
            type:'POST',
            url:'https://postbar.ir/api/login',
            dataType:'json',
            contentType:"application/json; charset=utf-8",
            data:JSON.stringify(customer)
        });
        //me
        var customer = {
            Username:'09352843550',
            Email:'jafar_rahimi_67@yahoo.com',
            Password:"0639856780Jr"
        };
        $.ajax({
            type:'POST',
            url:'http://poffice.post.ir/tntsearch/getinfo.asmx',
            dataType:'json',
            contentType:"application/json; charset=utf-8",
            data:JSON.stringify(customer)
        });
    </script>
@endsection

@section('personalize_css')
@endsection
