<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">خانه</a>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!--login and Notifications -->
    <ul class="navbar-nav mr-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">15 اتفاق افتاده!</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                    <span class="float-left text-muted text-sm">3 دقیقه</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                    <span class="float-left text-muted text-sm">12 ساعت</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                    <span class="float-left text-muted text-sm">2 روز</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه اتفاق‌ها</a>
            </div>
        </li>
        <!-- logout button -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-o"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="{{ urlCustom('profile') }}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media pt-3" style="min-height:80px !important">
                        <img src="{{ url('images/'.auth()->user()->image)}}" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ auth()->user()->name }}
                                <span class="float-left text-sm text-danger"></span>
                            </h3>
                            <p class="text-sm text-muted">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="bg-dark dropdown-item dropdown-footer pointer_pointer">خروج</button>
                </form>
            </div>
        </li>
        <!-- logout button -->
    </ul>
    <!-- login and Notifications -->
</nav>
