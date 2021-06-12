<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="fa" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        صفحه جدید
    </title>
    <link rel = "icon" type = "image/png" href = "{{ url('/images/default/logo-laravel.svg') }}">
    @include('home.layouts.head')
<!-- personalize_css'-->
@yield('personalize_css')
<!-- personalize_css'-->
</head>
<body class="bg-light">
<header class="header p-3 border-bottom">
        @if(! auth()->user())
            <a href="{{ route('login') }}" class="pl-1 text-secondary pl-1 pr-1">
                ورود
            </a>
            <a href="{{ route('choose.register') }}" class="pr-1 text-info pl-1 pr-1">
                ثبت‌نام
            </a>
        @else
        <?php $level=auth()->user()->level ?>
            <a href="{{ url("{$level}") }}" class="pr-1 text-info pl-1 pr-1">
                ناحیه کاربری
            </a>
        @endif
        <a href="{{ route('home.index') }}" class="float-right pr-1 text-info pl-1 pr-1">
            صفحه اصلی سایت
        </a>
</header>
<!-- main -->
<main id="content" class="container-fluid mt-5 mb-5">
    @yield('content')
</main>
<!-- main -->
<script src="{{ url('home/js/jquery.js') }}"></script>
<script src="{{ url('home/js/bootstrap.js') }}"></script>
<!-- script bootsidemenu -->
<script src="{{ url('home/js/BootSideMenu.js') }}" type="text/javascript"></script>
<!-- script bootsidemenu   -->
<!-- script nicescroll -->
<script src="{{ url('home/js/jquery.nicescroll.min.js') }}" type="text/javascript"></script>
<!-- script nicescroll   -->
<!-- index js -->
<script src="{{ url('home/js/index_js.js') }}"></script>
<!-- index js -->
<!-- personalize_script'-->
@yield('personalize_script')
<!-- personalize_script'-->
<!-- sweet alert message -->
@include('sweet::alert')
<!-- sweet alert message -->
</body>
</html>
