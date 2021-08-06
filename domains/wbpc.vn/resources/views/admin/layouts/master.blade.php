<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('admin_title','Trang quản lý đồ án')</title>
    <meta name="csrf-token" content="HO8EdP6N7knA08D13RtxjE6JLKbKk902piZtWVqz">
    <link rel="stylesheet" href="{{ asset('admin/app.css') }}">
    

    <style>
        .color_warning {
            color:red !important;
        }
        #notify {
            text-align: center;
            background: red;
            color: #fff;
            padding: 5px;
        }
        .notify {
            display: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation" style="border-radius: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.get.product.list') }}">Admin</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Sản phẩm ▼
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.get.product.create') }}">Thêm mới </a></li>
                    <li><a href="{{ route('admin.get.product.list') }}">Danh sách </a></li>
                </ul>
            </li>
            
            <li><a href="{{ route('admin.get.user.list') }}">Thành viên</a></li>
            <li><a href="{{ route('admin.get.bill.list') }}">Quản lý Bill</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="" id="notification"></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào! {{ \Auth::guard('admins')->user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('get.admin.logout') }}">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<main>
    @yield('content')
</main>
<script>
	var HIDE_NOTIFY = "";
</script>
<script src="{{ asset('admin/app.js') }}"></script>
<script src="source/assets/dest/js/jquery.js"></script>
<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="source/assets/dest/vendors/animo/Animo.js"></script>
<script src="source/assets/dest/js/scripts.min.js"></script>
<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="source/assets/dest/js/waypoints.min.js"></script>
<script src="source/assets/dest/js/wow.min.js"></script>
   
@stack('js')
</body>
</html>