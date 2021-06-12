<li class="nav-item has-treeview @include('layouts.panel.sidebar.active',['class'=>'menu-open','url'=>'*/profile*'])">
<a href="#" class="nav-link">
    <i class="nav-icon fa fa-user-circle"></i>
    <p>
        ناحیه کاربری
        <i class="fa fa-angle-left right"></i>
    </p>
</a>
<ul class="nav nav-treeview" style="font-size:92% !important;">
    <li class="nav-item">
        <a href="{{ route('profile.index') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'*/profile'])">
            <i class="fa fa-user-o nav-icon"></i>
            <p>
                پروفایل
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('profile.notification.get') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'*/profile/notification'])">
            <i class="fa fa-bell nav-icon"></i>
            <p>
                مدیریت اطلاع رسانی
            </p>
        </a>
    </li>
    <li class="nav-item">
        @if(auth()->user()->completeInfo)
            <a href="{{ url('profile/edit') }}" class="nav-link">
                <i class="fa fa-edit nav-icon"></i>
                <p>
                    ویرایش اطلاعات
                </p>
            </a>
        @else
            <a href="{{ urlCustom('profile/create') }}" class="nav-link">
                <i class="fa fa-info nav-icon"></i>
                <p>
                    تکمیل اطلاعات
                </p>
            </a>
        @endif
    </li>
    <li class="nav-item">
        <a href="{{ route('profile.session')  }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'*/profile/session'])">
            <i class="fa fa-user-secret nav-icon"></i>
            <p>
                مدیریت ورود به سایت
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('profile.password.get') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'*/profile/password'])">
            <i class="fa fa-lock nav-icon"></i>
            <p>
                تغییر رمز عبور
            </p>
        </a>
    </li>
</ul>
</li>