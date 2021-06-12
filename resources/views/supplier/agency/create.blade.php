@extends('supplier.layouts.master')

@section('page_header')
<li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.agency.create') }}">معرفی نمایندگی جدید</a></li>
<li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.agency.index') }}">نمایندگی ها</a></li>
@endsection

@section('title')
معرفی نمایندگی جدید
@endsection

@section('content')
<div class="row">
    @include('supplier.layouts.erorrs')
    <div class="col-md-12">
        <form action="{{ route('supplier.agency.store') }}" method="post" >
            {{ csrf_field() }}
            <div class="card card-success card-outline">
                <div class="card-header bg-light-gradient">
                    <h3 class="card-title">معرفی نمایندگی جدید</h3>
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
                                <input class="form-control" name="management" placeholder="نام مدیر نمایندگی" value="{{ old('management') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="code_agency" placeholder="کد دفتر" value="{{ old('code_agency') }}">
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
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="city" id="city"  class="form-control select2" data-live-search="true">
                            <option value="" id="province_city">لطفا ابتدا استان خود را انتخاب نمایید</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="address" placeholder="آدرس" value="{{ old('address') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="plate" placeholder="کد پستی" value="{{ old('plate') }}">
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
                        <input class="form-control" name="mobiles" value="{{ old('mobiles') }}"  onfocus="show('help_input_mobiles')" onfocusout="hide('help_input_mobiles')"  placeholder="تلفن همراه">
                        <p id="help_input_mobiles" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phones" value="{{ old('phones') }}" onfocus="show('help_input_phones')" onfocusout="hide('help_input_phones')" placeholder="تلفن ثابت">
                        <p id="help_input_phones" class="blinking py-2"  style="display:none">اگر میخواهید بیش از یک شماره وارد کنید آن ها را با "-" از یکدیگر جدا کنید</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="website" placeholder="آدرس وب سایت" value="{{ old('website') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="fax" placeholder="شماره فکس" value="{{ old('fax') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" name="telegram" placeholder="شماره/آیدی تلگرام" value="{{ old('telegram') }}">
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
                        <textarea name="description" rows="5" style="width:100%;" class="form-group rounded border text-justify p-3">{{ old('description') }}</textarea>
                    </div>
                    <!-- contact -->
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                </div>
                <div class="card-footer border-top bg-light-gradient">
                    <div class="float-left">
                        <button type="submit" class="btn btn-success"> ارسال</button>
                    </div>
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
    })
    //ajax cities
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        ClassicEditor
            .create(document.querySelector('#textckeditor'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
        // bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5({
            toolbar: { fa: true }
        })
    })
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