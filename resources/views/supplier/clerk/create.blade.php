@extends('supplier.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a href="{{ route('supplier.clerk.create') }}">ایجاد پشتیبان</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('supplier.clerk.index') }}">پشتیبان</a></li>
@endsection

@section('title')
    ایجاد پشتیبان
@endsection

@section('content')
<div class="row">
@include('supplier.layouts.erorrs')
<div class="col-md-9">
    <form action="{{ route('supplier.clerk.store' , ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="card card-primary card-outline">
            <div class="card-header bg-light-gradient">
                <h3 class="card-title">
                    ایجاد پشتیبان
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control" name="name" placeholder="نام و نام خانوادگی" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" value="{{ old('email') }}" name="email"  placeholder="ایمیل">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="تلفن همراه" >
                    <input type="text" value="" class="form-control" name="password" hidden>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-light-gradient">
                    <div class="float-left">
                        <button type="submit" class="btn btn-primary">ایجاد</button>
                    </div>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /. box -->
        </div>
    </form>
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