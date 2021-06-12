<?php $setting=\App\Models\Setting::whereType('login')->first() ?>
<div class="col-lg-6 content-left">
    <div class="content-left-wrapper">
       {{-- <a href="index.html" id="logo"><img src="{{ url('form-wizard/img/logo.png') }}" alt="" width="49" height="35"></a>--}}
        <div id="social">
            <ul>
                {{--<li><a href="#0"><i class="icon-facebook"></i></a></li>
                <li><a href="#0"><i class="icon-twitter"></i></a></li>
                <li><a href="#0"><i class="icon-google"></i></a></li>
                <li><a href="#0"><i class="icon-linkedin"></i></a></li>--}}
            </ul>
        </div>
        <!-- /social -->
        <div>
            {{--<figure><img src="{{ url('images/'.$setting->images) }}" alt="" class="img-fluid"></figure>--}}
            <h2>
                {{ $setting->title }}
            </h2>
            <p class="text text-justify">
                {{ $setting->body }}
            </p>
            <a target="_blank" href="{{ $setting->list['link'] }}" class="btn_1 rounded">
                توضیحات بیشتر
            </a>
            <a href="#start" class="btn_1 rounded mobile_btn">شروع کن؟توی موبایل</a>
        </div>
        <div class="copy">1398/09/05</div>
    </div>
    <!-- /content-left-wrapper -->
</div>
