@extends('company.layouts.master')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5 style="margin-bottom: 0">
                        گفتگو
                    </h5>
                </div>
            </div>


        </div>

        <div class="card-body" style="padding: 0">
            <div class="row" style="margin: 0">

                <div  class="col-sm-12" id="result">
                    @include('company.ticket.showticket')
                </div>

            </div>
        </div>

    </div>
    <div class="modal fade" id="NewTicket" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">افزودن دسته بندی جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('admin/insertunit')}}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">نام واحد</label>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control m-input" name="name" id="name"
                                           aria-describedby="emailHelp" placeholder="نام واحد را وارد نمایید">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 10px">انصراف</button>
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('title')
    گفتگوها
@endsection


@section('personalize_script')
    <script src="{{url('panel/js/perfect-scrollbar.js')}}"></script>
    <script>
        var $target = $('#chat_content');
        $target.animate({scrollTop: 1000000000}, 100);
        const ps = new PerfectScrollbar('#chat_content', {
        });
        ps.update();
    </script>

    <script>
        function send_message() {
            var message = $('input[name="description"]').val();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':"{{csrf_token()}}"
                }});
            $.ajax({
                method:'POST',
                url:'{{url("company/ticket")}}',
                data: {'message':message},
                success:function (data) {
                    if (data.state)
                    {
                        var msg1 = "                <div class=\"direct-chat-msg right\" id=\"chat_"+ data.msg_id +"\">\n" +
                            "                    <div class=\"direct-chat-info clearfix\">\n" +
                            "                        <span class=\"direct-chat-name float-right\">\n" +
                            data.user_name+
                            "                        </span>\n" +
                            "                        <span class=\"direct-chat-timestamp float-left\">\n" +
                            data.date +
                            "                        </span>\n" +
                            "                    </div>\n" +
                            "                    <!-- /.direct-chat-info -->\n" +
                            "                    <img class=\"direct-chat-img\" src=\"{{ auth()->user()->image ? url('images/'.auth()->user ()->image)  : url('images/default/user-avator.jpg') }}\" alt=\"message user image\">\n" +
                            "                    <!-- /.direct-chat-img -->\n" +
                            "                    <div class=\"direct-chat-text\" style=\"background: #007bff;border-color: #007bff;color: #fff;\">\n" +
                            "                        <p>\n" +
                            message +
                            "                        </p>\n" +
                            "                    </div>\n" +
                            "                    <!-- /.direct-chat-text -->\n" +
                            "                </div>\n";
                        $('#chat_content').append(msg1);
                        $('input[name="description"]').val('');
                        var $target = $('#chat_content');
                        $target.animate({scrollTop: 1000000000}, 10);
                    }
                    else
                    {
                        $('input[name="description"]').val('');
                        swal({
                           type:'error',
                           title:'خطا !',
                           text:'شما بلاک شده اید. لطفا با پشتیبانی سایت تماس بگیرید.'
                        });
                    }

                },
                error:function (data) {

                }
            });
        }
    </script>
    <script>
        $('#description').keypress(function (e) {
            if (e.which == 13)
            {
                $('#message_btn').click();
            }
        })
    </script>

@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{url('panel/css/perfect-scrollbar.css')}}">
@endsection