@extends('supplier.layouts.master')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h3 class="card-title">ایجاد کالا</h3>
                </div>
                <div class="float-left col-md-6 col-sm-6">
                    <a type="button" class="float-left btn btn-success mr-1" href="{{ route('supplier.product.create') }}">
                        کالای جدید
                    </a>
                    <a type="button" class="float-left btn btn-outline-info ml-1" href="{{ route('supplier.product.index') }}">
                        کالاهای من
                    </a>
                    <a type="button" class="float-left btn btn-outline-info ml-1" href="{{ route('supplier.product.all') }}">
                        همه کالا ها
                    </a>
                </div>
            </div>
        </div>
        <form id="product_form" method="post" action="{{ route('supplier.product.store') }}" enctype="multipart/form-data" >
        <div class="card-body">
            <!--begin::Form-->
                @csrf
                <div class="m-portlet__body">
                    <!-- testing -->
                    {{--<div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">کالای مرجع تستی</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select name="select_test" id="select_test" class="form-control"
                                    data-live-search="true" title="select category" >
                            </select>
                        </div>
                    </div>--}}
                    <!-- testing -->
                    <!-- bproduct -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">کالای مرجع</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select name="bproduct_id" id="bproduct_id" class="form-control select2" data-live-search="true">
                                <option value="0">نام/کد کالای مرجع را انتخاب کنید</option>
                                @foreach($bproducts as $bproduct)
                                    <option value="{{ $bproduct->id }}">
                                        {{ $bproduct->name }} -
                                        <span class="text-secondary">
                                            {{ $bproduct->code }}
                                        </span>
                                    </option>
                                @endforeach
                            </select>
                            <!-- no-bproducts -->
                            <div class="form-check">
                                <input type="checkbox" id="NoBproduct" class="form-check-input">
                                <label class="form-check-label text-muted" for="exampleCheck2">کالای مرجعی انتخاب نمیکنم</label>
                            </div>
                            <!-- no-bproducts -->
                        </div>
                    </div>
                    <!-- bproduct -->
                    <!-- category_id -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">گروه کالا</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select name="category_id" id="category_id" class="form-control select2" data-live-search="true">
                                <option value="0">گروه کالای خود را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- name -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">نام</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="name" id="name" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- province_id -->
                    <div class="form-group  row">
                        <label for="delivery" class="col-form-label col-lg-3 col-sm-12">نوع تحویل کالا</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select  name="delivery" id="delivery"  class="form-control select2" data-live-search="true">
                                    <option value="0">نوع تحویل کالا به مشتری را وارد کنید</option>
                                    <option value="1">درب کارخانه</option>
                                    <option value="2">نزدیک ترین نمایندگی</option>
                                    <option value="3">ارسال با پست (هزینه پست توسط مشتری)</option>
                                    <option value="4">ارسال با پست ( هزینه پست توسط کارخانه/شرکت)</option>
                            </select>
                        </div>
                    </div>
                    <!-- brad -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">برند</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="brand" id="brand" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- amount -->
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">وضعیت</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="form-check">
                                <input type="checkbox" id="state_1" checked name="state" value="1" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck2">موجود است</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">تعداد (در صورت موجود بودن)</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="amount" id="amount" class="form-control "
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
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- price -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">قیمت هر واحد</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="price" id="price" class="form-control "
                                   placeholder="">
                        </div>
                    </div>
                    <!-- expire_date -->
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">مدت اعتبار</label>
                        <div class="col-lg-5 col-md-5 col-sm-09">
                            <input type="number" name="expire_date" value="30" id="expire_date" class="form-control "
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
                            <textarea name="description" id="description" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="form-group row">
                        <label for="technical" class="col-form-label col-lg-3 col-sm-12">مشخصات فنی</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <textarea name="technical" id="technical" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                    </div>
                    <!-- files -->
                    <div class="form-group row">
                        <label for="technical" class="col-form-label col-lg-3 col-sm-12">وارد کردن فایل</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="file" name="file" id="file" class="form-control " >
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer border-top bg-light-gradient">
            <div class="row">
                <div class="col-lg-9 mx-auto" style="text-align: center">
                    <button  type="submit" class="btn btn-success">ارسال</button>
                    <button type="reset" id="resetForm" class="btn btn-outline-success">پاک کردن فرم</button>
                </div>
            </div>
        </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('page_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.product.create') }}">ایجاد کالای جدید</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.product.index') }}">نمایش کالا</a></li>
@endsection

@section('personalize_script')
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/js/bootstrap-select.min.js"></script>--}}
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
        $('#NoBproduct').on('change',function(e){
            let checkBoxNoBProduct=$('#NoBproduct').prop('checked');
            let SelectBProduct=$('#bproduct_id');
            SelectBProduct.prop('disabled',checkBoxNoBProduct);
        });
    </script>
   {{-- <script>
       $(document).ready(function(){
           $('#select_test').selectpicker();
       });
       $('#select_test').on('change',function(){
           $.ajax(
               {
                   url:"{{ route('ajaxSelectTest') }}",
                   method:"POST",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data:{search:''},
                   dataType:"json",
                   success:function(data)
                   {
                       var html='';
                       for (let count=0;count<data.length;count++){
                           html+='<option value="'+data[count].id+'>'+
                               data[count].code +
                               ' - ' +
                               data[count].name +
                               '</option>'
                       }
                       $('#select_test').html(html);
                       $('#select_test').selectpicker('refresh');
                   }
               });
       });
    </script>--}}
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.17/css/bootstrap-select.min.css">--}}
@endsection

@section('title')
    ایجاد کالا
@endsection