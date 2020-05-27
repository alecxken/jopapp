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
          <li  class="{{ (request()->is('dashboard')) ? 'active' : '' }}"><a href="{{url('dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
          
           <li><a href="{{url('jobs-apps')}}"><i class="fa fa-link"></i> <span>New Applicant</span></a></li>
           @role('Reports')
           <li  class="{{ (request()->is('my-apps1')) ? 'active' : '' }}"><a href="{{url('my-apps1')}}"><i class="fa fa-link text-green"></i> <span>Job Applicants List</span></a></li>
           @endrole
           @role('Admin')
          <li class="treeview {{ (request()->is('job')) ? 'active' : '' }} ">
            <a href="#"><i class="fa fa-cog"></i> <span> Setting Sections</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
            <li><a href="{{url('job')}}"><i class="fa fa-link"></i> <span>New Job Upload</span></a></li>
            <li><a href="{{url('admin')}}"><i class="fa fa-link"></i> <span>User Management</span></a></li>
            <li><a href="#" data-href="delete.php?id=23" data-toggle="modal" data-target="#confirm-delete"> <i class="fa fa-link"></i>Delete All Records</a>
</li>
          
            </ul>
          </li>
          @endrole

        </ul>

        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               Delete All Applicants
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="{{url('delete-all')}}" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>