@extends('admin.layouts.master')

@section('title')
    ارسال پیام همگانی
@endsection

@section('content')
    <div class="card card-success card-outline">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h3 class="card-title">ارسال پیام</h3>
                </div>
            </div>
        </div>
        <form id="product_form" method="post" action="{{ route('admin.notification.publicity.post') }}">
            <div class="card-body">
                <!--begin::Form-->
                @csrf
                <div class="m-portlet__body">
                    <div class="form-group  row">
                        <label for="title" class="col-form-label col-lg-3 col-sm-12">عنوان</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <input type="text" name="title" id="title" class="form-control "
                                   placeholder="اختیاری">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-form-label col-lg-3 col-sm-12">متن</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <textarea name="message" id="message" cols="30" rows="8" placeholder="متن پیام را وارد کنید" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">ارسال به :</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <table class="table">
                                <tr>
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'all','label'=>'همه کاربران سایت','nameInput'=>'all'])
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'agency','label'=>'نمایندگی ها','nameInput'=>'agency'])
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'level','label'=>'تولید کنندگان','nameInput'=>'supplier'])
                                </tr>
                                <tr>
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'levels','label'=>'اشخاص حقیقی','nameInput'=>'person'])
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'levels','label'=>'اشخاص حقوقی','nameInput'=>'company'])
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'levels','label'=>'پشتیبان ها','nameInput'=>'clerk'])
                                </tr>
                                <tr>
                                    @include('admin.notification.publicity.layouts.boxForCheckBox',['name'=>'levels','label'=>'مدیران سایت','nameInput'=>'admin'])
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group  row">
                        <label class="col-form-label col-lg-3 col-sm-12">انتخاب افراد</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <select class="form-control js-example-basic-multiple" name="users[]" multiple="multiple">
                                {{--<optgroup label="GROUP A (Click Me To Select All)">--}}
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        <strong>
                                            {{ $user->name }}
                                        </strong>
                                        -
                                        <span class="spanInSelectClass">
                                            @include('admin.notification.publicity.layouts.translateLevelInSelect',['level'=>$user->level])
                                        </span>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top bg-light-gradient">
                <div class="row">
                    <div class="col-lg-9 mx-auto" style="text-align: center">
                        <button  type="submit" class="btn btn-block btn-success">ارسال</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@section('personalize_script')
    <script src="{{ url('panel/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.spanInSelectClass').each(function(){
                $(this).attr('font-size',"30%");
            });
        });
    </script>
@endsection

@section('personalize_css')
    <link href="{{ url('panel/css/select2.min.css') }}" rel="stylesheet" />
@endsection
