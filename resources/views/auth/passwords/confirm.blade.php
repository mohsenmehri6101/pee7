<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تایید رمز ورود</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('panel/css/box-shadow.css') }}">
    <link rel="stylesheet" href="{{ url('css/gradients.min.css') }}" >
</head>
<body class="p-5">
    <div class="container text-center p-5 m-5">
        <div class="card">
            <div class="card-header">
                <h2>تایید رمز</h2>
                </div>
            <form class="form boxshadow_1 p-5" method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">رمز ورود</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        @include('layouts.recaptcha.recaptcha')
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            تایید
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="float-right">
            <a class="text-muted px-5" style="font-size:90%;" href="{{ route('profile.password.forget') }}">
                رمز خودرا فراموش کردم
            </a>
        </div>
    </div>
</body>
</html>