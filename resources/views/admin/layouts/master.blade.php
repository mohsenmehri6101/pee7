<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    @include('layouts.panel.head.head')
    @yield('personalize_css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar --><!-- /.navbar -->
    @include('layouts.panel.navtop.navTop')
    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')
    <!-- Main Sidebar Container -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            @include('layouts.panel.header.pageHeader')
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid pl-5 pr-5 pb-5">
                @yield('content')
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    @include('layouts.panel.footer.footer')
    <!-- Main Footer -->
</div>
    <!-- sweet alert message -->
    @include('sweet::alert')
    <!-- sweet alert message -->
    @include('layouts.panel.script.script')
    @yield('personalize_script')
</body>
</html>
