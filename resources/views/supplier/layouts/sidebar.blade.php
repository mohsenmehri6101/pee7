<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url ('/') }}" target="_blank" class="brand-link">
        <img  src="{{ url ('images/default/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3"
              style="background-color:white;">
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
                        <a href="{{ route('supplier.index') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'supplier'])">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('supplier.product.index') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'supplier/product'])">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                کالا
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('supplier.auction.index') }}" class="nav-link @include('layouts.panel.sidebar.active',['class'=>'active','url'=>'supplier/auction/index'])">
                            <i class="nav-icon fa fa-gavel"></i>
                            <p>
                              مزاعده
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('company/ticket') }}" class="nav-link">
                            <i class="fa fa-comment nav-icon"></i>
                            <p>
                                گفتگو
                            </p>
                            <span id="message_count_sidebar" style="margin-top: 3px;float: left;" class="badge badge-success"></span>

                        </a>
                    </li>
                    @include('layouts.panel.sidebar.sidebarProfile')
                    <li class="nav-header">
                        پیام ها
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