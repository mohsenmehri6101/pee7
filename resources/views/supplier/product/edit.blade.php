@extends('supplier.layouts.master')

@section('content')
    <div class="card card-warning card-outline">
        <div class="card-header bg-light-gradient">
            <h3 class="card-title">
                ویرایش {{ $product->name }}
            </h3>
        </div>
        <form id="product_form" method="post" action="{{ route('supplier.product.update',['id'=>$product->id]) }}" enctype="multipart/form-data" >
            <div class="card-body">
                <!--begin::Form-->
                @csrf
                <div class="m-portlet__body">
                    <!-- bproduct -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">کالای مرجع</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select name="bproduct_id" id="bproduct_id" class="form-control select2" data-live-search="true">
                                <option value="">نام/کد کالای مرجع را انتخاب کنید</option>
                                @foreach($bproducts as $bproduct)
                                    <option value="{{ $bproduct->id }}" {{ $bproduct->id==$product->bproduct_id ? 'selected' : '' }}  >
                                        {{ $bproduct->name }} -
                                        <span class="text-secondary">
                                            {{ $bproduct->code }}
                                        </span>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- bproduct -->
                    <!-- category_id -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">گروه کالا</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select name="category_id" id="category_id" class="form-control select2" data-live-search="true">
                                <option value="">گروه کالای خود را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"  {{ $category->id==$product->category_id ? 'selected': '' }} >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- name -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">نام</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- province_id -->
                    <div class="form-group  row">
                        <label for="delivery" class="col-form-label col-lg-3 col-sm-12">نوع تحویل کالا</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select  name="delivery" id="delivery"  class="form-control select2" data-live-search="true">
                                <option value="0" >نوع تحویل کالا به مشتری را وارد کنید</option>
                                <option value="1" {{ $product->delivery==1 ? 'selected' : '' }}  >درب کارخانه</option>
                                <option value="2" {{ $product->delivery==2 ? 'selected' : '' }}  >نزدیک ترین نمایندگی</option>
                                <option value="3" {{ $product->delivery==3 ? 'selected' : '' }}  >ارسال با پست (هزینه پست توسط مشتری)</option>
                                <option value="4" {{ $product->delivery==4 ? 'selected' : '' }}  >ارسال با پست ( هزینه پست توسط کارخانه/شرکت)</option>
                            </select>
                        </div>
                    </div>
                    <!-- brad -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">برند</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="brand" value="{{ $product->brand }}" id="brand" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- amount -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">وضعیت</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="form-check">
                                <input type="checkbox" id="state_1" {{ $product->state == 1 ? 'checked'  : '' }} name="state" value="1" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck2">موجود است</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">تعداد (در صورت موجود بودن)</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" value="{{ $product->amount }}" name="amount" id="amount" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- unit -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">واحد</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select class="form-control select2" name="unit_id" id="unit_id">
                                <option value="0" selected>واحد کالای خود را انتخاب کنید</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}"  {{ $product->unit_id==$unit->id ? 'selected' : '' }}   >{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- price -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">قیمت هر واحد</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="price" value="{{ $product->price }}" id="price" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- expire_date -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">مدت اعتبار</label>
                        <div class="col-lg-5 col-md-5 col-sm-09">
                            <input type="number" name="expire_date" value="{{ $product->expire_date }}" id="expire_date" class="form-control "
                                   placeholder="">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-3">
                            روز
                        </div>
                    </div>
                    <!-- description -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">توضیحات تکمیلی</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <textarea name="description" id="description" cols="30" rows="8" class="form-control text-justify">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="form-group row">
                        <label for="technical" class="col-form-label col-lg-3 col-sm-12">مشخصات فنی</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <textarea name="technical" id="technical" cols="30" rows="8" class="form-control text-justify">{{ $product->technical }}</textarea>
                        </div>
                    </div>
                    <!-- files -->
                    <div class="form-group row">
                        <label for="technical" class="col-form-label col-lg-3 col-sm-12">وارد کردن فایل</label>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <input type="file" name="file" id="file" class="form-control " >
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <span>
                                درصورت انتخاب فایل جدید <a href="{{ url('files/'.$product->file)  }}" target="_blank">فایل قدیم</a> پاک خواهد شد
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top bg-light-gradient">
                <div class="row">
                    <div class="col-lg-9 mx-auto" style="text-align: center">
                        <button  type="submit" class="btn btn-warning">ویرایش</button>
                        <button type="reset" class="btn btn-outline-warning">پاک کردن فرم</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.product.create') }}">ویرایش {{ $product->name }}</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.product.index') }}">نمایش کالا</a></li>
@endsection

@section('personalize_script')
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();
            $('#state_1').change(function(){
                if(this.checked)
                {
                    $('#amount').prop('disabled',false);
                }
                else{
                    $('#amount').prop('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
@endsection

@section('title')
    ویرایش کالا
@endsection