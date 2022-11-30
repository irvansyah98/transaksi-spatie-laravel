<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->fullname }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @hasanyrole('admin|guest')
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ url('backend') }}"><i class="fa fa-circle-o"></i> <span>Dashboard</span></a></li>
        @endhasanyrole
        @role('admin')
        <li class="header">MASTER</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.index') }}"><i class="fa fa-circle-o"></i> Admin</a></li>
            <li><a href="{{ route('guest.index') }}"><i class="fa fa-circle-o"></i> Guest</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/backend/order') }}"><i class="fa fa-circle-o"></i> <span>Order</span></a></li>
        @endrole
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>