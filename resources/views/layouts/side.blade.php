  <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('images/logo.png')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- search form (Optional) -->
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

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          <li  class="{{ (request()->is('home')) ? 'active' : '' }}"><a href="#"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
          <li  class="{{ (request()->is('job')) ? 'active' : '' }}"><a href="{{url('job')}}"><i class="fa fa-link text-green"></i> <span>New Advert</span></a></li>
         {{--  <li class="treeview {{ (request()->is('gallery')) ? 'active' : '' }} {{ (request()->is('data')) ? 'active' : '' }} {{ (request()->is('create-content')) ? 'active' : '' }}">
            <a href="#"><i class="fa fa-link"></i> <span>Content Manager</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('data')}}"><i class="fa fa-link"></i> <span>Slides</span></a></li>
              <li><a href="{{url('create-content')}}"><i class="fa fa-globe"></i> <span>Content</span></a></li>
              <li><a href="{{url('gallery')}}"><i class="fa fa-image"></i> <span>Gallery</span></a></li>
              <li><a href="{{url('category-create')}}"><i class="fa fa-link"></i> <span>Category</span></a></li>
            </ul>
          </li> --}}
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>