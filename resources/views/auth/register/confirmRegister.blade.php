@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <h4>
                        تایید ثبت نام
                    </h4>
                </div>
            </div>
            <hr>
            @error('activeCode')
                <span style="color:red !important;">
                    {{ $message }}
                </span>
            @enderror
            <!-- /top-wizard -->
            <form id="formConfirm" method="POST" action="{{ route('register.confirm.phone.post') }}" >
                {{ csrf_field () }}
                <!-- Leave for security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <br>
                        <span class="text-info">
                            پیامک تایید برای برای شما ارسال شد.
                        </span>
                        <br><br>
                        <input type="text" name="phone" value="{{ $phone }}" style="visibility:hidden!important;" class="hidden" >
                        <div class="form-group">
                            <input type="text" name="confirm" class="form-control {{ isValidOrNot($errors,'confirm') }}" placeholder="کد تایید" >
                            {!! showMessageError($errors,'confirm') !!}
                        </div>
                        <div class="form-group">
                            <a id="LinkTimer" class="text-info cursor_pointer"
                               style="font-size:85%;">
                            </a>
                        </div>
                        <!-- recaptcha -->
                        <div class="form-group">
                            {{--@include('layouts.recaptcha.recaptcha')--}}
                        </div>
                        <!-- recaptcha -->
                    </div>
                    <!-- /step-->
                </div>
                <!-- /middle-wizard -->
                <div id="bottom-wizard" style="margin-top:1px !important;">
                    <button type="submit" class="button-me"> ورود </button>
                </div>
                <!-- /bottom-wizard -->
            </form>
        </div>
        <!-- /Wizard container -->
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        let globalStart=2;
        let textTimer=globalStart;
        let LinkTimer=$('#LinkTimer');
        let setinterval=null;
        let HtmlLoader='<div id="loader_form" style="display: block;"><div data-loader="circle-side-2"></div></div>';
        function stopTimer() {
            clearInterval(setinterval);
            LinkTimer.toggleClass('text-danger text-info cursor_no_drop cursor_pointer');
            LinkTimer.text('ارسال دوباره پیامک')
        }
       function startTimer() {
           LinkTimer.toggleClass('text-danger text-info cursor_no_drop cursor_pointer');
            let HtmlTextTimer='ارسال دوباره پیامک بعد از <span id="timer"></span> ثانیه';
            LinkTimer.html(HtmlTextTimer);
            $('#timer').text(globalStart);
            setinterval=setInterval(function () {
                textTimer=parseInt($('#timer').text());
                textTimer--;
                if(textTimer==0)
                    stopTimer();
                $('#timer').text(textTimer);
            },1000)
       }
       startTimer();
        LinkTimer.click(function () {
            if(textTimer==0){
                let phone=$('input[name=phone]').val();
                $('#LinkTimer').html(HtmlLoader);
                $.ajax({
                    type:"get",
                    url:"{{ route('register.confirm.ajax.phone') }}",
                    data:{phone:phone},
                    success:function (data) {
                        if(!data.state){
                            /*console.log(data)
                            window.open("{{ route('home.index') }}")*/
                            //data.globalStart=60;
                        }
                        globalStart=data.globalStart;
                        startTimer();
                    },
                    error:function (){
                        alert("مشکلی رخ داده");
                    }
                });
            }
        });
    })
    let validate = new validation(
        'formConfirm',
        {
            'confirm':'required|numeric'
        }
    );
</script>
@endsection

