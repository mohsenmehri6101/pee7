@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <h4>
                        <a href="{{ route('home.index') }}" style="color: #434bdf;">
                            ورود به سایت
                        </a>
                    </h4>
                </div>
            </div>
            <hr>
            <!-- /top-wizard -->
            <form id="formLogin" method="POST" action="{{ route('login') }}" >
                {{ csrf_field () }}
                <input id="website"  type="text" value="">
                <!-- Leave for security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <br>
                        <div class="form-group">
                            <input type="text" name="user" class="form-control {{ isValidOrNot($errors,'user') }} {{ isValidOrNot($errors,'email') }} {{ isValidOrNot($errors,'phone') }} {{ isValidOrNot($errors,'username') }}" value="{{ old ('user') }}" placeholder="تلفن همراه یا ایمیل یا نام کاربری">
                            {!! showMessageError($errors,'user') !!}
                            {!! showMessageError($errors,'email','user') !!}
                            {!! showMessageError($errors,'phone','user') !!}
                            {!! showMessageError($errors,'username'.'user') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control {{ isValidOrNot($errors,'password') }}" value="{{ old('password') }}" placeholder="رمز عبور">
                            {!! showMessageError($errors,'password') !!}
                        </div>
                        <!-- recaptcha -->
                        <div class="form-group">
                            {{--@include('layouts.recaptcha.recaptcha')--}}
                        </div>
                        <!-- recaptcha -->
                        <!-- remember me -->
                        <div class="form-group terms">
                            <label class="container_check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                مرا به خاطر بسپار
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- remember me -->
                    </div>
                    <!-- /step-->
                </div>
                <!-- /middle-wizard -->
                <div id="forget_password">
                    <a href="{{ route('password.forget') }}">رمز عبور خود را فراموش کردم</a>
                </div>
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
        let validate = new validation(
            'formLogin'
            ,
            {
                'user':'required|min:3',
                'password':'required|min:6'
            }
        );
        validate.attributes['user']='* نام کاربری/تلفن همراه/ایمیل *';
    </script>
@endsection
