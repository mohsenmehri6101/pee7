@extends('auth.layouts.master')

@section('content')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <h5>ثبت نام</h5>
            <hr>
            <form id="formRegister" method="POST" action="{{ route('register') }}" >
                {{ csrf_field () }}
                        <input type="text" name="level"  value="{{ $level }}" hidden >
                        <div class="form-group">
                            <input type="text" name="username" class="form-control {{ isValidOrNot($errors,'username') }}" value="{{ old('username') }}" placeholder="{{ $level == 'company' ?  'نام کاربری شرکت' : 'نام کاربری'}}">
                            {!! showMessageError($errors,'username') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control {{ isValidOrNot($errors,'phone') }}" value="{{ old ('phone') }}" placeholder="شماره همراه">
                            {!! showMessageError($errors,'phone') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control {{ isValidOrNot($errors,'password') }}" value="{{ old('password') }}" placeholder="رمز عبور">
                            {!! showMessageError($errors,'password') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control {{ isValidOrNot($errors,'password_confirmation') }} " value="{{ old('password_confirmation') }}" placeholder="تکرار رمز عبور">
                            {!! showMessageError($errors,'password_confirmation') !!}
                        </div>
                        <div class="form-group">
                            <label class="container_check">لطفا  <a href="#" data-toggle="modal" data-target="#terms-txt">قوانین و سیاست ها </a> را بادقت مطالعه کنید.
                                <input type="checkbox" name="terms" class="form-control {{ isValidOrNot($errors,'terms') }}" value="Yes" >
                                <br>
                                {!! showMessageError($errors,'terms') !!}
                                <span class="checkmark {{ isValidOrNot($errors,'terms') }}"></span>
                            </label>
                        </div>
                <div id="bottom-wizard">
                    <button type="submit" class="submit"> ثبت درخواست</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let validate=new validation(
        'formRegister',
        {
            'username':'required|min:3|char_just:en',
            'phone':'required|numeric|phone',
            'password':'required|password',
            'password_confirmation':'required|confirmed:password'
        })
    </script>
@endsection
