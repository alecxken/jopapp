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
          <li class="header">NAVIGATION</li>

          {{-- Dashboard: visible to all authenticated users --}}
          <li class="{{ (request()->is('dashboard') || request()->is('home')) ? 'active' : '' }}">
            <a href="{{url('dashboard')}}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          {{-- ── SELECTION SECTION (Selection + Admin) ─────────────────────── --}}
          @hasanyrole('Selection|Admin')
          <li class="header">SELECTION</li>

          <li class="{{ (request()->is('jobs-apps') || request()->is('jobs-apps-steps*')) ? 'active' : '' }}">
            <a href="{{url('jobs-apps')}}">
              <i class="fa fa-user-plus text-blue"></i> <span>New Applicant</span>
            </a>
          </li>

          <li class="{{ (request()->is('my-apps1')) ? 'active' : '' }}">
            <a href="{{url('my-apps1')}}">
              <i class="fa fa-users text-green"></i> <span>Job Applicants List</span>
            </a>
          </li>

          <li class="treeview {{ (request()->is('all-apps') || request()->is('show-persons') || request()->is('view-app*') || request()->is('view-individual*') || request()->is('view-job-details*') || request()->is('job_checks') || request()->is('applicants')) ? 'menu-open' : '' }}">
            <a href="#">
              <i class="fa fa-briefcase text-orange"></i>
              <span>Applicant Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ request()->is('all-apps') ? 'active' : '' }}">
                <a href="{{url('all-apps')}}"><i class="fa fa-list"></i> <span>View All Applicants</span></a>
              </li>
              <li class="{{ request()->is('show-persons') ? 'active' : '' }}">
                <a href="{{url('show-persons')}}"><i class="fa fa-id-card"></i> <span>View Persons</span></a>
              </li>
              <li class="{{ request()->is('applicants') ? 'active' : '' }}">
                <a href="{{url('applicants')}}"><i class="fa fa-address-book"></i> <span>Applicants</span></a>
              </li>
              <li class="{{ request()->is('job_checks') ? 'active' : '' }}">
                <a href="{{url('job_checks')}}"><i class="fa fa-check-square-o"></i> <span>Checklist Per Position</span></a>
              </li>
              <li class="{{ request()->is('view-checklist') ? 'active' : '' }}">
                <a href="{{url('view-checklist')}}"><i class="fa fa-tasks"></i> <span>View Checklist</span></a>
              </li>
            </ul>
          </li>
          @endhasanyrole

          {{-- ── REPORTS SECTION (Reports + Admin) ────────────────────────── --}}
          @hasanyrole('Reports|Admin')
          <li class="header">REPORTS</li>

          <li class="treeview {{ (request()->is('summary-app') || request()->is('get-applicant-summary') || request()->is('view-applicants') || request()->is('view-experience') || request()->is('reports*')) ? 'menu-open' : '' }}">
            <a href="#">
              <i class="fa fa-bar-chart text-purple"></i>
              <span>Report Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ request()->is('summary-app') ? 'active' : '' }}">
                <a href="{{url('summary-app')}}"><i class="fa fa-table"></i> <span>Summary Applicants</span></a>
              </li>
              <li class="{{ request()->is('get-applicant-summary') ? 'active' : '' }}">
                <a href="{{url('get-applicant-summary')}}"><i class="fa fa-download"></i> <span>Download Summary</span></a>
              </li>
              <li class="{{ request()->is('view-applicants') ? 'active' : '' }}">
                <a href="{{url('view-applicants')}}"><i class="fa fa-link"></i> <span>Applicants Page</span></a>
              </li>
              <li class="{{ request()->is('view-experience') ? 'active' : '' }}">
                <a href="{{url('view-experience')}}"><i class="fa fa-history"></i> <span>View Experience</span></a>
              </li>
              <li class="{{ (request()->is('reports') || request()->is('reports/*')) ? 'active' : '' }}">
                <a href="{{url('reports')}}">
                  <i class="fa fa-bar-chart text-green"></i>
                  <span>Report Module</span>
                  <span class="pull-right-container">
                    <span class="label label-success pull-right">NEW</span>
                  </span>
                </a>
              </li>
              <li class="{{ request()->is('reports/checklist') ? 'active' : '' }}">
                <a href="{{url('reports/checklist')}}">
                  <i class="fa fa-list-alt text-aqua"></i> <span>Checklist Report</span>
                </a>
              </li>
            </ul>
          </li>
          @endhasanyrole

          {{-- ── SETTINGS SECTION (Admin only) ────────────────────────────── --}}
          @role('Admin')
          <li class="header">ADMIN</li>

          <li class="treeview {{ (request()->is('job') || request()->is('admin') || request()->is('user_index') || request()->is('roles_index') || request()->is('permissions_index')) ? 'menu-open' : '' }}">
            <a href="#">
              <i class="fa fa-cog text-red"></i>
              <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ request()->is('job') ? 'active' : '' }}">
                <a href="{{url('job')}}"><i class="fa fa-upload"></i> <span>New Job Upload</span></a>
              </li>
              <li class="{{ (request()->is('admin') || request()->is('user_index') || request()->is('user_create') || request()->is('user_edit*')) ? 'active' : '' }}">
                <a href="{{url('user_index')}}"><i class="fa fa-users"></i> <span>User Management</span></a>
              </li>
              <li class="{{ (request()->is('roles_index') || request()->is('roles_create') || request()->is('roles_edit*')) ? 'active' : '' }}">
                <a href="{{url('roles_index')}}"><i class="fa fa-shield"></i> <span>Role Management</span></a>
              </li>
              <li class="{{ (request()->is('permissions_index') || request()->is('permission_create')) ? 'active' : '' }}">
                <a href="{{url('permissions_index')}}"><i class="fa fa-key"></i> <span>Permissions</span></a>
              </li>
            </ul>
          </li>
          @endrole

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
