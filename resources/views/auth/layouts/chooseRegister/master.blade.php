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
    <link rel="stylesheet" href="{{ url('home/css/bootstrap.css') }}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- fonts -->
    <link rel="stylesheet" href="{{ url('home/fonts/fonts.css') }}">
    <!-- fonts -->
    <!-- index css -->
    <link rel="stylesheet" href="{{ url('home/css/index_css.css') }}" >
    <!-- index css -->
    <!-- box-shadow-css -->
    <link rel="stylesheet" href="{{ url('home/css/box_shadow.css') }}" >
    <!-- box-shadow-css -->
    <style>
        /* Split the screen in half */
        .split {
            height: 100%;
            width: 50%;
            position: fixed;
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }
        /* Control the left side */
        .left {
            left: 0;
        }
        /* Control the right side */
        .right {
            right: 0;
        }
        * {
            padding: 0 !important;
            margin: 0 !important;
        }
        .zoom {
            transition: transform .2s; /* Animation */
            margin: 0 auto;
        }
        .zoom:hover {
            transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
</head>
<body>
<div class="container-fluid row">
    @yield('content')
</div>
<script src="{{ url ('home/js/jquery.js') }}"></script>
<script src="{{ url ('home/js/bootstrap.js') }}"></script>
</body>
</html>
