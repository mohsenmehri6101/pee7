@extends('admin.layouts.master')

@section('content')
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        ایجاد دسته بندی های جدید
                    </h3>
                </div>
                <br><br>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" action="{{url('admin/categories')}}">
            {{ csrf_field() }}
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">دسته ی کالا</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <select name="subcategories_id" id="subcategories_id" class="form-control m-bootstrap-select selectpicker" data-live-search="true">
                            <option value="">دسته اصلی</option>
                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12">عنوان دسته</label>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="text" class="form-control m-input" name="name" id="name"
                               aria-describedby="emailHelp" placeholder="عنوان دسته را وارد نمایید">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 mx-auto" style="text-align: center">
                    <button type="submit" class="btn btn-brand">ارسال</button>
                    <button type="reset" class="btn btn-secondary">پاک کردن فرم</button>
                </div>
            </div>

        </form>
        <!--end::Form-->
    </div>

@endsection


@section('title')
    ایجاد دسته بندی جدید
@endsection


@section('end_script')
    <!-- pirvate-script-file for this page  -->
@endsection


@section('head_css')
    <!-- pirvate-css-file for this page  -->
@endsection