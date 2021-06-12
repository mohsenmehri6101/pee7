<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url ('/') }}" target="_blank" class="brand-link">
        <img src="{{ url ('images/default/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8;background-color:white!important;">
        <span class="brand-text font-weight-light" style="font-size:70% !important;">سامانه بهبود خرید و فروش کالا</span>
    </a>
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img style="background-color: white;" src="{{ url('images/'.auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ urlCustom('profile') }}" class="d-block">
                        {{ auth()->user()->name }}
                    </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>
                                کاربران
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/product') }}" class="nav-link">
                            <i class="fa fa-product-hunt nav-icon"></i>
                            <p>
                                کالا
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bproduct.index') }}" class="nav-link">
                            <i class="fa fa-product-hunt nav-icon"></i>
                            <p>
                                کالای مرجع
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/ticket') }}" class="nav-link">
                            <i class="fa fa-comment nav-icon"></i>
                            <p>
                                گفتگو
                            </p>
                            <span id="message_count_sidebar" style="float:left;margin-top: 3px" class="badge badge-success"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/categories') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>
                                 دسته بندی
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/unit') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>
                                 مدیریت واحد ها
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <i class="fa fa-gears nav-icon"></i>
                            <p>
                                تنظیمات سایت
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>
                                تنظیمات سایت
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.postbar.get') }}" class="nav-link">
                            <i class="fa fa-list nav-icon"></i>
                            <p>
                                بررسی کد رهگیری(پستی)
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        @include('layouts.panel.sidebar.sidebarProfile')
                    </li>
                    <li class="nav-header">
                        <a href="{{ route('admin.notification.publicity.get') }}">
                            پیام
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-danger"></i>
                            <p class="text">
                                اعلان های عمومی
                            </p>
                            <span class="right badge badge-danger">
                12
                </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-warning"></i>
                            <p>
                                درخواست خرید
                            </p>
                            <span class="right badge badge-warning">
                  66
                </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-circle-o text-info"></i>
                            <p>
                                پاسخ داده نشده
                            </p>
                            <span class="right badge badge-info">
                7
                </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
