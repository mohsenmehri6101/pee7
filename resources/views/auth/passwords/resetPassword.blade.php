@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <h4>
                        <a href="{{ route('home.index') }}" style="color: #434bdf;">
                            <!-- title -->
                        </a>
                    </h4>
                </div>
            </div>
            <hr>
            @if($session=session('status'))
                <span class="text-{{$session['type']}}" role="alert">
                    {{ $session['text'] }}
                    <strong onclick="this.parentElement.remove()" class="float-left cursor_pointer p-1">X</strong>
                </span>
            @else
                <p>
                    از طریق ایمیل یا پیامک رمز ورود خود را دریافت کنید
                </p>
            @endif
            @error('activeCode')
                <span style="color:red !important;">
                    {{ $message }}
                </span>
            @enderror
            <!-- /top-wizard -->
            <form id="formPasswordForget" method="POST" action="{{ route('password.forget.post') }}" >
                {{ csrf_field () }}
                <input id="website"  type="text" value="">
                <!-- Leave for  اقا اگه security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <br>
                       {{-- <span class="text-danger blinking">
                        وارد کردن حداقل یک کدام الزامی است
                        </span>--}}
                        <br><br>
                        <div class="form-group" id="email-c">
                            <input type="email" name="email" id="email" class="form-control {{ isValidOrNot($errors,'email') }}" value="{{ old ('email') }}" placeholder="ایمیل">
                            {{ showMessageError($errors,'email') }}
                        </div>
                        <div class="form-group" id="phone-c">
                            <input type="phone" name="phone" id="phone" class="form-control {{ isValidOrNot($errors,'phone') }}" value="{{ old('phone') }}" placeholder="شماره همراه">
                            {{ showMessageError($errors,'phone') }}
                        <div class="form-group">
                            {{--@include('layouts.recaptcha.recaptcha')--}}
                        </div>
                        <!-- recaptcha -->
                    </div>
                    <!-- /step-->
                </div>
                <!-- /middle-wizard -->
                <div id="bottom-wizard" style="margin-top:1px !important;">
                    <button type="submit" class="button-me"> بازیابی </button>
                </div>
                <!-- /bottom-wizard -->
                </div>
            </form>
        </div>
        <!-- /Wizard container -->
    </div>
@endsection

@section('script')
<script>
    let validate = new validation(
        'formPasswordForget'
        ,
        {
            'email':'email',
            'phone':'numeric|phone'
        }
    );

</script>
@endsection
