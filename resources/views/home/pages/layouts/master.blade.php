<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="fa" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        {{ $web->title }}
    </title>
    <link rel="icon" href="{{ url('images/'.$web->logo) }}" type="image/icon type">
@include('home.layouts.head')
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('panel/plugins/font-awesome/css/font-awesome.css') }}">
    <!-- Font Awesome Icons -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('css/gradients.min.css') }}">
    <!-- Font Awesome Icons -->
<!-- personalize_css'-->
@yield('personalize_css')
<!-- personalize_css'-->
</head>
<body class="bg-light">
<!-- begin : header -->
@include('home.layouts.header')
<!-- end : heeader -->
<!-- begin : nav top -->
@include('home.layouts.navigation')
<!-- end : nav top -->
<!-- main -->
<main id="content" class="container-fluid mt-5 mb-5">
    @yield('content')
</main>
<!-- main -->
<!-- footer -->
@include('home.layouts.footer')
<!-- footer -->
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
<!-- need.js -->
<script src="{{ url('home/js/need.js') }}"></script>
<!-- need.js -->
<!-- personalize_script'-->
@yield('personalize_script')
<!-- personalize_script'-->
<!-- sweet alert message -->
@include('sweet::alert')
<!-- sweet alert message -->
</body>
</html>