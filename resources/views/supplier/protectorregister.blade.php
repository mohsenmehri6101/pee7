@extends('supplier.layouts.master')

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        تعریف پشتیبان
                    </h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right">
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">نام</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="email" class="form-control m-input"
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">نام خانوادگی</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="email" class="form-control m-input"
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">سمت </label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="email" class="form-control m-input"
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">شماره تماس</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="email" class="form-control m-input"
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">ایمیل</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="email" class="form-control m-input"
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">آپلود عکس</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="file" class=""
                               aria-describedby="emailHelp" placeholder="">
                    </div>
                </div>


            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <div class="row">
                        <div class="col-lg-9 mx-auto" style="text-align: center">
                            <button type="reset" class="btn btn-brand">ارسال</button>
                            <button type="reset" class="btn btn-secondary">پاک کردن فرم</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>

@endsection

@section('sub_header')
    تعریف پشتیبان جدید
@endsection

@section('title')
    ایجاد پشتیبان
@endsection


@section('end_script')
    <!-- pirvate-script-file for this page  -->
@endsection


@section('head_css')
    <!-- pirvate-css-file for this page  -->
@endsection