<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.media.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Media</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pages.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Pages</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.sliders.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Slider</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Services</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Portfolios</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.portfolios.index') }}"><i class="fa fa-circle-o"></i>All Portfolios</a></li>
                    <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i>Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Teams</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.teams.index') }}">All Teams</a></li>
                    <li><a href="{{ route('admin.positions.index') }}">Positions</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.partners.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Partners</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.clients.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Clients</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Company</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.html"><i class="fa fa-circle-o"></i>About</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i>Contact Info</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>