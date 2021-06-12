@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route($link) }}">{{ $level_show }}</a></li>
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.users.index') }}">کاربران</a></li>
@endsection

@section('title')
    تنظیمات سایت
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h5>
                       {{ $level_show }}
                    </h5>
                </div>
                <div class="float-left col-md-6 col-sm-6">
                    {{--<a type="button" class="float-left btn btn-outline-success mr-1" href="{{ route('supplier.product.create') }}">
                        کالای جدید
                    </a>--}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col">
                <table class="table table-hover" id="tableUsers">
                    <thead>
                    <tr>
                        <th>شماره</th>
                        <th>نام</th>
                        <th>شماره تلفن</th>
                        <th>وضعیت پروفایل</th>
                        <th class="text-center">تنظیمات</th>
                        {{--<th>وضعیت پروفایل</th>
                        <th>تاریخ ثبت نام</th>
                        <th>تنظیمات</th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div id="send_message_chat" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ارسال پیغام</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <lable for="user_name">نام کاربر : </lable>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" id="user_name" class="form-control" style="cursor:not-allowed" disabled="disabled" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <lable for="user_name">پیغام : </lable>
                        </div>
                        <div class="col-sm-9">
                            <textarea name="message" class="form-group" id="message" style="width: 100%;resize: none;height: 85px;"></textarea>
                        </div>
                    </div>
                    <input type="hidden" id="user_id" disabled="disabled" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="send_message()" style="margin-left: 10px;" class="btn btn-primary">ارسال پیغام</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
@endsection

@section('personalize_script')
    <script src=" {{ url('js/jquery.dataTables.min.js') }} "></script>
    <script>
        $(function() {
            $('#tableUsers').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.users.table') !!}',
                columns: [
                    { "data": 'DT_RowIndex',orderable: false,searchable: false},
                    { data:'name', name: 'name' },
                    { data:'phone', name: 'phone' },
                    { data:'phone', name: 'phone' },
                    { data:'setting',name:'setting',orderable:false,searchable:false}
                    /*{ data:'active', name: 'active' },
                    { data:'DT_RowData.data-expire',name:'expire',orderable:false,searchable:false },
                    { data:'setting',name:'setting',orderable:false,searchable:false},*/
                ]
            });
            $('input[type="search"]').addClass('form-control');
            $('input[type="search"]').attr("placeholder","جستجو...");
            $('select[name="tableme_length"]').addClass('rounded');
        });
    </script>
    <!-- script m m o r t e z a p u r -->
    <script>
        function show_message(id,name){
            $('#user_name').val(name);
            $('#user_id').val(id);
            $('#send_message_chat').modal('show');
        }

        function send_message() {
            $.ajax({
                url:"{{ route('admin.ticket.save') }}",
                method:'get',
                data:{reciver_id : $('#user_id').val(),message : $('#message').val()},
                success:function (data) {
                    $('#send_message_chat').modal('hide');
                    $('#message').val('')
                    if (data.state)
                    {
                        swal({
                            text : "پیغام شما با موفقیت برای کاربر " + $('#user_name').val() + " ارسال شد",
                            type: 'success'
                        });

                    }
                    else
                    {
                        swal({
                            text : "متاسفانه سرور با مشکل مواجه شده است. لطفا بعدا تلاش کنید",
                            type: 'error'
                        });
                    }
                }
            })
        }
    </script>
    <!-- script m m o r t e z a p u r -->
@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{ url('panel/css/dataTables.min.css') }}">
@endsection
