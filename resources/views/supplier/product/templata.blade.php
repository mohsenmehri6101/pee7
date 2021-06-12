@extends('supplier.layouts.master')

@section('content')
    <div class="card card-success card-outline">
        <div class="card-header bg-light-gradient">
            <h3 class="card-title">اطلاعات تکمیلی <a href=""> {{ $user->name }}</a></h3>
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
                </div>
            </div>
            <div class="card-footer border-top bg-light-gradient">
                <div class="row">
                    <div class="col-lg-9 mx-auto" style="text-align: center">
                        <button  type="submit" class="btn btn-warning">ویرایش</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('personalize_script')
    <script>
        confirm_input_file=function () {
            document.getElementById('image').click();
        };
        show=function(id){
            document.getElementById(id).style.display = "block";
        };
        hide=function (id) {
            document.getElementById(id).style.display="none";
        };
    </script>
    <script src="{{ url('/plugins/select2/select2.full.js') }}"></script>
    <script>
        $('.select2').select2();
        $('#provinces').on('change',function () {
            cs = $(this).children("option:selected").val();
            $.ajax({
                url: "{{ url('/ajax/getcity') }}",
                method : "GET",
                data : {name : cs},
                dataType : 'json',
            }).done(function (data) {
                $('#city_id').html(data);
            });
        })
    </script>
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('plugins/select2/select2.css') }}">
    <style>
        .blinking{
            animation:blinkingText 2.5s infinite;
        }
        @keyframes blinkingText{
            0%{     color: #000;    }
            49%{    color: #000; }
            60%{    color: transparent; }
            99%{    color:transparent;  }
            100%{   color: #000;    }
        }
    </style>
@endsection

@section('title')
    اطلاعات تکمیلی {{ auth()->user()->name }}
@endsection