<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        title
    </title>
    @include('auth.layouts.head')
    @yield('css')
</head>
<body>
<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Preload -->
<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /loader_form -->
<!-- nav -->
@include('auth.layouts.nav')
<!-- nav -->
<!-- /menu -->
<div class="container-fluid full-height">
    <div class="row row-height">
        <!-- /content-left -->
    @include('auth.layouts.content_left')
    <!-- /content-left -->
    <!-- /content-right -->
    @yield('content')
    <!-- /content-right-->
    </div>
    <!-- /row-->
</div>
<!-- /container-fluid -->
<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->
<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->
<a href="#0" class="cd-nav-trigger">فهرست<span class="cd-icon"></span></a>
<!-- /menu button -->
<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="termsLabel">قوانین و سیاست ها</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نافهم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-dismiss="modal">بستن</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- COMMON SCRIPTS -->
@include('auth.layouts.script')
@yield('script')
<!-- sweet alert message -->
@include('sweet::alert')
<!-- sweet alert message -->
</body>
</html>
