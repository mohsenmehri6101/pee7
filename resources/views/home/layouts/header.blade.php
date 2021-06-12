<header class="d-none d-sm-block  d-xl-block" style="margin-botton-style:16px !important;">
    <div class="row" style="max-height:60px !important;padding:0px !important;margin:0px !important;" >
        <div class="col-2 text-center" >
            <img src="{{ url ('home/img/logo.png') }}" class="img-fluid border" style="border-radius:50%;max-height:48% !important;" >
        </div>
        <div class="col-8">
            <h2 class="text-secondary" style="padding-top:09px;font-family:bold;font-family:irannastaligh;">
                سامانه خرید و فروش آنلاین</h2>
        </div>
        <div class="col-2 pt-3">
            @if(! auth()->user())
                <a href="{{ route('login') }}" class="pl-1 text-secondary pl-1 pr-1">
                    ورود
                </a>
                <a href="{{ route('choose.register') }}" class="pr-1 text-info pl-1 pr-1">
                    ثبت‌نام
                </a>
                <a href="{{ route('test.index') }}" class="pr-1 text-info pl-1 pr-1">
                    صفحه تست
                </a>
            @else
                {{--<a href="{{ urlCustom() }}" class="pr-1 text-info pl-1 pr-1">
                    ناحیه کاربری
                </a>--}}
            @endif
        </div>
    </div>
</header>
