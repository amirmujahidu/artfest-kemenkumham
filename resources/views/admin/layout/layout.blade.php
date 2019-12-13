<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HDKD | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('lte-admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('lte-admin/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte-admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('lte-admin/dist/css/skins/_all-skins.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('lte-admin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/ICON.png')}}">
  <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  #example1_filter,#example1_paginate{padding-right:50px;}

  </style>
  @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{URL::Route('index')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">HDKD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('lte-admin/dist/img/avatar5.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('lte-admin/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

                <p>
                 {{Auth::user()->name}}
                  <small>{{Auth::user()->email}}</small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                <button class="btn btn-default" 
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include("admin.layout.menu")

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield("content")
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Admin Panel</b>
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="http://hdkd.kemenkumham.go.id" target="_blank">Hari Dharma Karya Dhika</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('lte-admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('lte-admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('lte-admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('lte-admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte-admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('lte-admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte-admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('lte-admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('lte-admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js')}}"></script>

@yield('js')
</body>
</html>