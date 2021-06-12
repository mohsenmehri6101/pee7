@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <span>رمز عبور خود را تعریف کنید</span>
                </div>
            </div>
            <hr>
            <form id="wrapped" method="POST" action="{{ route('password.update') }}" >
                @if ($session=session('status'))
                    <p class="alert alert-{{$session['type']}}" role="alert">
                        {{ $session['text'] }}
                    </p>
                @endif
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input id="website"  type="text" value="">
                <!-- Leave for security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <br>
                        @if(isset($email))
                            <div class="form-group">
                                <input type="email" name="email" class="form-control {{ isValidOrNot($errors,'email') }}" value="{{ old ('email',$email) }}" placeholder="ایمیل">
                                {!! showMessageError($errors,'email') !!}
                            </div>
                        @endif
                        @if(isset($phone))
                            <div class="form-group">
                                <input type="phone" name="phone" class="form-control {{ isValidOrNot($errors,'phone') }}" value="{{ old ('phone',$phone) }}" placeholder="تلفن همراه">
                                {!! showMessageError($errors,'phone') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="password" name="password" class="form-control {{ isValidOrNot($errors,'password') }}" value="{{ old('password') }}" placeholder="رمز عبور">
                            {!! showMessageError($errors,'password') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control {{ isValidOrNot($errors,'password_confirmation') }}" value="{{ old('password') }}" placeholder="تایید رمز عبور">
                            {!! showMessageError($errors,'password_confirmation') !!}
                        </div>
                        <!-- recaptcha -->
                        @include('layouts.recaptcha.recaptcha')
                        <!-- recaptcha -->
                    </div>
                    <!-- /step-->
                </div>
                <div id="bottom-wizard" style="margin-top:1px !important;">
                    <button type="submit" class="button-me">تایید</button>
                </div>
                <!-- /bottom-wizard -->
            </form>
        </div>
        <!-- /Wizard container -->
    </div>
@endsection
