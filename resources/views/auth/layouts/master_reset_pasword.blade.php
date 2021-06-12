@extends('auth.layouts.master')

@section('title')
    login
@endsection

@section('personalize_css')
    <style>
        .button-me {
            border: none;
            color:
                    #fff;
            text-decoration: none;
            transition: background .5s ease;
            -moz-transition: background .5s ease;
            -webkit-transition: background .5s ease;
            -o-transition: background .5s ease;
            display: inline-block;
            cursor: pointer;
            outline: none;
            text-align: center;
            background:
                    #434bdf;
            position: relative;
            font-size: 14px;
            font-size: 0.875rem;
            font-weight: 600;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            border-radius: 3px;
            line-height: 1;
            padding: 12px 30px;
        }
    </style>
@endsection

@section('content_left')
    <div class="col-lg-6 content-left">
        <div class="content-left-wrapper">
            <a href="index.html" id="logo"><img src="{{ url('form-wizard/img/logo.png') }}" alt="" width="49" height="35"></a>
            <div id="social">
                <ul>
                    <li><a href="#0"><i class="icon-facebook"></i></a></li>
                    <li><a href="#0"><i class="icon-twitter"></i></a></li>
                    <li><a href="#0"><i class="icon-google"></i></a></li>
                    <li><a href="#0"><i class="icon-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /social -->
            <div>
                <figure><img src="{{ url('form-wizard/img/info_graphic_1.svg') }}" alt="" class="img-fluid"></figure>
                <h2>
                    عنوان لورم اسپیوم
                </h2>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نافهم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
                </p>
                <a href="#0" class="btn_1 rounded">
                    توضیحات بیشتر
                </a>
                <a href="#start" class="btn_1 rounded mobile_btn">شروع کن؟توی موبایل</a>
            </div>
            <div class="copy">1398/09/05</div>
        </div>
        <!-- /content-left-wrapper -->
    </div>
@endsection

@section('content_right')
    <div class="col-lg-6 content-right" id="start">
        <div id="wizard_container">
            <div id="top-wizard">
                <div id="progressbar">
                    <h4>
                        <a href="{{ route('home.mainpage') }}" style="color: #434bdf;">
                            ورود به سایت
                        </a>
                    </h4>
                </div>
            </div>
            <hr>
            <!-- /top-wizard -->
            <form id="wrapped" method="POST" action="{{ route('password.email') }}" >
                @csrf
                <input id="website"  type="text" value="">
                <!-- Leave for security protection, read docs for details -->
                <div id="middle-wizard">
                    <div class="step">
                        <br>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="{{ old ('email') }}" placeholder="ایمیل">
                        </div>
                        <!-- recaptcha -->
                        <div class="form-group">
                            <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
                            {!! NoCaptcha::display() !!}
                        </div>
                        <!-- recaptcha -->
                    </div>
                    <!-- /step-->
                </div>
                <div id="bottom-wizard" style="margin-top:1px !important;">
                    <button type="submit" class="button-me"> ارسال ایمیل  </button>
                </div>
                <!-- /bottom-wizard -->
            </form>
        </div>
        <!-- /Wizard container -->
    </div>
@endsection

@section('personalize_script')
    @error('email')
    <script>
        Command: toastr["warning"]("{{ $message }}");
    </script>
    @enderror
    @error('password')
    <script>
        Command: toastr["warning"]("{{ $message }}");
    </script>
    @enderror
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "12",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endsection