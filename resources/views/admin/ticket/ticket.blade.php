@extends('admin.layouts.master')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <h5 style="margin-bottom: 0">
                        گفتگوها
                    </h5>
                </div>
                {{----}}
                {{--<div class="col-sm-6">--}}
                    {{--<div style="float: left">--}}
                        {{--<button class="btn btn-dark" data-toggle="modal" data-target="#NewTicket">گفتگوی جدید</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{----}}
            </div>


        </div>

        <div class="card-body" style="padding: 0">
            <div class="row">
                <div class="col-sm-12" id="result">
                    <div class="row" style="padding: 0;">
                        <div class="col-sm-4" style="border-left: 1px solid rgba(0,0,0,0.1);padding-left: 0;">
                            <div style="padding: 1em;padding-bottom: 0;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input id="search" type="text" class="form-control" placeholder="جستجو بر اساس نام و ایمیل کاربر">
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-bottom: 0;">

                            <div id="chat_list" style="max-height: 550px;position: relative;">



                            </div>


                        </div>
                        <div class="col-sm-8" style="padding-right: 0;">


                            <div class="chat_content" style="height: 100%">
                                <div class="chat_profile">

                                </div>
                                <div style="padding: 2em;height: 586px;position: relative;overflow-x: hidden;scrollbar-y:right;" id="result_chat">
                                    <div style="width:100%;margin-top:225px;text-align: center ">
                                        <strong>
                                            برای شروع گفتگو یک صفحه چت انتخاب نمایید.
                                        </strong>
                                    </div>
                                </div>
                                <div class="input-group" id="message_input" style="">
                                    <input id="message" type="text" class="form-control" style="border-radius: 0 0 0 0">
                                    <span class="input-group-append">
                                        <button id="message_btn" onclick="send_message()" type="button" class="btn btn-info btn-flat" style="border-radius: 0 0 0 0.25rem">ارسال</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        $('#message_input').hide();
        const ps = new PerfectScrollbar('#result_chat', {
        });
        const ls = new PerfectScrollbar('#chat_list',{
            useBothWheelAxes: false,
            suppressScrollX: true
        });
        ls.update();
        ps.update();
    </script>
    <script>
        search_ticket();
        $('#search').keyup(function () {
            search_ticket($('#search').val());
        });
        var reciver_id;
        function get_chat(id)
        {
            reciver_id = id;
            $('#message_input').show();
            $.ajax({
                method:"get",
                url:"{{route('admin.ticket.single')}}",
                data:{user_id:id},
                success:function (data) {
                    $('#chat_id_'+id+' span.badge').remove();
                    $('#result_chat').html(data);
                    var $target = $('#result_chat');
                    $target.animate({scrollTop: 1000000000}, 100);
                }
            })
            count_message();
        }

        function unban_user(key,name) {
            event.stopPropagation();
            $.ajax({
                url: "{{route('admin.ticket.ban')}}",
                data: {id:key,name:name},
                success:function (data) {
                    if (data.state)
                    {
                        var btn = $('<button onclick="return ban_user( &quot;'+data.key.toString()+'&quot;,&quot;'+ data.name +'&quot;) " class="btn btn-sm btn-circle btn-outline-warning" style="border-radius: 50%;line-height: 1.428571429;font-size: 12px;padding: 6px 0;text-align: center;height: 30px;width: 30px" title="بلاک">\n' +
                            '                                                            <i class="fa fa-lock"></i>\n' +
                            '                                                        </button>');
                        $("#chat_id_"+data.key+" div.chat_setting button.btn-outline-success").remove();

                        $("#chat_id_"+data.key+" div.chat_setting").append(btn);

                        swal({
                            icon : "success",
                            title: "توجه",
                            text: "کاربر : "+ data.name +" با موفقیت آنبلاک شد.",
                        });
                    }
                    else
                    {
                        swal({
                            title:"توجه",
                            text:"متاسفانه سیستم با مشکل مواجه شده است.\n لطفا بعدا تلاش کنید" ,
                            icon: "error",

                        })
                    }
                }
            })
        }

        function ban_user(key,name)
        {
            event.stopPropagation();
            swal({
                title:"هشدار !",
                text:"در صورت بلاک کردن، کاربر : "+ name +" دیگر قادر به پیام دادن به شما نخواهد بود.",
                html:true,
                dangerMode: true,
                icon:"warning",
                buttons:['انصراف','بله،بلاک شود'],
            }).then(function (value) {
                if (value)
                {
                    $.ajax({
                        url: "{{route('admin.ticket.ban')}}",
                        data: {id:key,name:name},
                        success:function (data) {
                            if (data.state)
                            {
                                var btn = $('<button onclick="return unban_user( &quot;'+data.key+'&quot;,&quot;'+ data.name +'&quot;) " class="btn btn-sm btn-circle btn-outline-success" style="border-radius: 50%;line-height: 1.428571429;font-size: 12px;padding: 6px 0;text-align: center;height: 30px;width: 30px" title="بلاک">\n' +
                                    '                                                            <i class="fa fa-unlock"></i>\n' +
                                    '                                                        </button>');
                                $("#chat_id_"+data.key+" div.chat_setting button.btn-outline-warning").remove();

                                $("#chat_id_"+data.key+" div.chat_setting").append(btn);

                                swal({
                                    icon : "success",
                                    title: "توجه",
                                    text: "کاربر : "+ data.name +" با موفقیت بلاک شد.",
                                });
                            }
                            else
                            {
                                swal({
                                    title:"توجه",
                                    text:"متاسفانه سیستم با مشکل مواجه شده است.\n لطفا بعدا تلاش کنید" ,
                                    icon: "error",

                                })
                            }
                        }
                    })
                }
            })

        }

        function delete_chat(indata)
        {
            event.stopPropagation();
            swal({
                title:"هشدار !",
                text:"در صورت حذف تمامی پیام ها از دو طرف پاک خواهد شد.\n آیا چت "+ indata.name +" حذف شود ؟",
                html:true,
                dangerMode: true,
                icon:"warning",
                buttons:['انصراف','بله،حذف شود'],
            }).then(function (value) {
                if (value)
                {
                    $.ajax({
                        url: "{{route('admin.ticket.delete')}}",
                        data: {id:indata.key,name:indata.name},
                        success:function (data) {
                            if (data.state)
                            {
                                $("#chat_id_"+indata.key).remove();
                                swal({
                                    icon : "success",
                                    title: "توجه",
                                    text: "کلیه پیام های کاربر : "+ data.name +" حذف شدند."

                                });
                            }
                            else
                            {
                                swal({
                                    title:"توجه",
                                    text:"متاسفانه سیستم با مشکل مواجه شده است.\n لطفا بعدا تلاش کنید" ,
                                    icon: "error",

                                })
                            }
                        }
                    })
                }
            })
        }
        function send_message() {
            $.ajax({
                url:"{{ route('admin.ticket.save') }}",
                method:'get',
                data:{reciver_id : reciver_id,message : $('#message').val()},
                success:function (data) {
                    var message = $('#message').val();
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
                        $('#result_chat').append(msg1);
                        $('input[id="message"]').val('');
                        var $target = $('#result_chat');
                        $target.animate({scrollTop: 1000000000}, 100);
                    }
                    else
                    {
                        swal({
                            text : "متاسفانه سرور با مشکل مواجه شده است. لطفا بعدا تلاش کنید",
                            type: 'error'
                        });
                    }
                }
            });
        }
        function search_ticket(word='') {
            $.ajax({
                url : "{{route('admin.ticket.search')}}",
                method : "GET",
                data : {search:word},
                success: function (data) {
                    $('#chat_list').html(data)
                },
            })
        }
    </script>
    <script>
        $('#message').keypress(function (e) {
            if (e.which == 13)
            {
                $('#message_btn').click();
            }
        })
    </script>

@endsection

@section('personalize_css')
    <link rel="stylesheet" href="{{url('panel/css/perfect-scrollbar.css')}}">
    <style>
        .chat_img {
            float: left;

        }
        .swal-text{
            text-align: center;
        }
        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people{ overflow:hidden; clear:both;}

        .chat_list {
            cursor: pointer;
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 0;

        }

        .chat_list:hover
        {
            background-color: lightyellow;
        }


    </style>
@endsection