<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class= "@yield('nav1')">
            <a href="{{URL::route('admin.index')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class= "@yield('nav2')">
            <a href="{{URL::route('admin.streaming.index')}}">
            <i class="fa fa-television"></i> <span>Streaming</span>
            </a>
        </li>
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>