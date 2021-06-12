@extends('supplier.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.clerk.index') }}">پشتیبان</a></li>
@endsection

@section('title')
صفحه پشتیبان
@endsection

@section('content')
<!-- create clerk -->
    <div class="row">
    <div class="col-12 my-1 py-3">
        <button type="button"  data-toggle="modal" data-target="#myModal" class="btn btn-sm border bg-light-gradient float-left">
            ایجاد پشتیبان
        </button>
    </div>
        <!-- modal -->
    <div style="margin-top:50;" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light-gradient">
                    <h4 class="modal-title">ایجاد پشتیبان</h4>
                </div>
                <div class="modal-body">
                    <form id="form_create_clerk" action="{{ route('supplier.clerk.store' , ['id' => $supplier->id]) }}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" name="name" placeholder="نام و نام خانوادگی" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" value="{{ old('email') }}" name="email"  placeholder="ایمیل">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="تلفن همراه" >
                                    <input type="password" value="" class="form-control" name="password" hidden >
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer bg-light-gradient">
                    <button type="button" onclick="submitform()" class="btn bg-success-gradient mx-1" data-dismiss="modal">ارسال</button>
                    <button type="button" class="btn bg-danger-gradient mx-1" data-dismiss="modal">بستن</button>
                    <script>
                        submitform=function () {
                            document.getElementById('form_create_clerk').submit();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
        <!-- modal -->
</div>
<!-- create clerk -->
    <div class="row">
<div class="col-md-12">
    <table class="table text-center table-bordered table-striped" id="html_table" width="100%">
        <thead class="bg-light-gradient">
        <tr>
            <th>نام</th>
            <th>ایمیل</th>
            <th>وضعیت پروفایل</th>
            <th>تنظیمات</th>
        </tr>
        </thead>
        <tbody style="font-size:97%;" class="bg-light-gradient">
        @foreach($users as $user)
            <tr style="">
                <td><a href="{{ route('supplier.clerk.show',['id'=>$user->id]) }}">{{ ($user->name) }}</a></td>
                <td> {{$user->email}} </td>
                <td>
                    @if($user->active)
                        <strong class="text-success">فعال</strong>
                    @else
                        <strong class="text-danger">غیرفعال</strong>
                    @endif
                </td>
                <td>
                    <a type="button" class="btn btn-default bg-light-gradient" title="مشاهده جزئیات">
                        <i class="fa fa-info"></i>
                    </a>
                    <a type="button" class="btn  bg-light-gradient btn-default" title="ارسال پیغام">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <a type="button" class="btn btn-default bg-light-gradient" title="بلاک">
                        <i class="fa fa-ban"></i>
                    </a>
                    <a type="button" class="btn btn-default bg-light-gradient"  title="حذف">
                        <i class="fa fa-trash"></i>
                    </a>
                    @if($user->permissions)
                        <a href="{{ route('supplier.clerk.permission.edit',['user'=>$user]) }}" type="button" class="btn btn-default bg-light-gradient"  title="تعیین سطح دسترسی">
                            <i class="fa fa-key p-0 m-0"></i>
                            {{--<i class="fa fa-lock p-0 m-0"></i>--}}
                        </a>
                    @else
                        <a href="{{ route('supplier.clerk.permission.create',['user'=>$user]) }}" type="button" class="btn btn-default bg-light-gradient"  title="تعیین سطح دسترسی">
                            <i class="fa fa-key p-0 m-0"></i>
                            {{--<i class="fa fa-lock p-0 m-0"></i>--}}
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="row" style="text-align: center">
        {{ $users->render() }}
    </div>--}}
</div>
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
