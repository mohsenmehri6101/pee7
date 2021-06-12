@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <span class="text-muted blinking">{{ $phone }}</span>
                    <a class="cursor_pointer px-4 text-danger" onclick=' document.getElementById("sendAgain").submit();'  style="text-decoration: none;">
                        ارسال دوباره پیامک
                    </a>
                </div>
            </div>
            <hr>
            @if ($session=session('status'))
                <span class="text-{{$session['type']}}" role="alert">
                    {{ $session['text'] }}
                    <strong onclick="this.parentElement.remove()" class="float-left cursor_pointer p-1">X</strong>
                </span>
            @endif
        <!-- /top-wizard -->
            <form id="wrapped" method="POST" action="{{ route('auth.password.confirm.phone.post') }}" >
                {{ csrf_field () }}
                <input style="visibility:hidden!important;" class="hidden"  type="text" value="{{ $phone }}" name="phone">
                <!-- Leave for  اقا اگه security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <div class="form-group">
                            <input type="confirm" name="confirm" class="form-control {{ isValidOrNot($errors,'confirm') }}"
                                   value="{{ old('confirm') }}" placeholder="کد تایید را وارد کنید">
                            {!! showMessageError($errors,'confirm') !!}
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
    <! -- hidden input -->
    <form style="visibility: hidden!important;" method="POST" id="sendAgain" action="{{ route('password.forget.post') }}">
        @csrf
        <input id="phone" type="text" name="phone" value="{{ $phone }}">
    </form>
    <! -- hidden input -->
@endsection
