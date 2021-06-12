@extends('supplier.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.agency.edit',['agency'=>$agency]) }}">{{ $agency->code_agency }}</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.agency.index') }}">نمایندگی ها</a></li>
@endsection

@section('title')
     ویرایش نمایندگی
@endsection

@section('content')
    <div class="row">
        @include('supplier.layouts.erorrs')
        <div class="col-md-12">
            <form action="{{ route('supplier.agency.update',['id'=>$agency->id]) }}" method="post" >
                {{ csrf_field() }}
                <div class="card card-warning card-outline">
                    <div class="card-header bg-light-gradient">
                        <h3 class="card-title">ویرایش {{ $agency->code_agency }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group mb-0">
                                    <label class="form-group">معرفی نمایندگی</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="management" placeholder="نام مدیر نمایندگی" value="{{ $agency->management,old('management') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="code_agency" placeholder="کد دفتر" value="{{ $agency->code_agency,old('code_agency') }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- location -->
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group mb-0">
                                    <label for="management" class="form-group">موقعیت مکانی</label>
                                  </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select  name="province" id="provinces"  class="form-control select2" data-live-search="true">
                                <option value="0">استان خود را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->name }}" {{ $province->name == $agency->location->province ? 'selected'  : '' }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="city" id="city"  class="form-control select2" data-live-search="true">
                                @foreach($cities as $city)
                                    <option value="{{ $city->name }}" {{ $city->name == $agency->location->city ? 'selected'  : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="address" placeholder="آدرس" value="{{ $agency->location->address,old('address') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="plate" placeholder="کد پستی" value="{{ $agency->location->plate,old('plate') }}">
                                </div>
                            </div>
                        </div>
                        <!-- location -->
                        <!-- contact -->
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group mb-0">
                                    <label for="management" class="form-group">راه های ارتباطی</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="mobiles" value="{{ $agency->contact->mobiles,old('mobiles') }}"  onfocus="show('help_input_mobiles')" onfocusout="hide('help_input_mobiles')"  placeholder="تلفن همراه">
                            <p id="help_input_mobiles" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phones" value="{{ $agency->contact->phones,old('phones') }}" onfocus="show('help_input_phones')" onfocusout="hide('help_input_phones')" placeholder="تلفن ثابت">
                            <p id="help_input_phones" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" placeholder="آدرس وب سایت" value="{{ $agency->contact->website,old('website') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="fax" placeholder="شماره فکس" value="{{ $agency->contact->fax,old('fax') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" name="telegram" placeholder="شماره/آیدی تلگرام" value="{{ $agency->contact->telegram,old('telegram') }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="form-group mb-0">
                                    <label for="management" class="form-group">توضیح</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="5" style="width:100%;" class="form-group rounded border text-justify p-3">{{ $agency->description,old('description') }}</textarea>
                        </div>
                        <!-- contact -->
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="float-left">
                                <button type="submit" class="btn btn-warning"> ویرایش </button>
                            </div>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /. box -->
                </div>
            </form>
        </div>
    </div>
@endsection


@section('personalize_script')
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        show=function(id){
            document.getElementById(id).style.display = "block";
        };
        hide=function (id) {
            document.getElementById(id).style.display="none";
        };
        //ajax cities
        $('#provinces').on('change',function () {
            cs = $(this).children("option:selected").val();
            $.ajax({
                url: "{{ route('getcity') }}",
                method : "GET",
                data : {name : cs},
                dataType : 'json',
            }).done(function (data) {
                $('#city').html(data);
            });
        });
        //ajax cities
    </script>
@endsection

@section('personalize_css')
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