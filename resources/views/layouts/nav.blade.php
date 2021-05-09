  <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
<!--       <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
 -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                {{--   <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="images/logo.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Number of Mentees
                        <small><i class="fa fa-clock-o"></i> {{\App\Mentor::all()->where('emp_id',$item->emp_id)->first()->count}} Mentees</small>
                      </h4>
                      <p> You Have  {{\App\Mentee::all()->where('emp_id',Auth::user()->id)->where('status','Accept')->count()}} Mentees Out of 3</p>
                    </a>
                  </li> --}}
                  <!-- end message -->


                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->


          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
            
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="{{asset('/images/'.Auth::user()->image)}}" onerror="this.src='../../images/logo.png'" class="user-image" alt="User Image">
              <span class="hidden-xs"> {{(Auth::user()->username)}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('/images/'.Auth::user()->image)}}" onerror="this.src='../../images/logo.png'" class="img-circle" alt="User Image">

                <p>
                  {{(Auth::user()->username)}}
                  <small> {{(Auth::user()->email)}}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('HR/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">



                  <a href="{{ route('logout') }}"   onclick="event.preventDefault();    document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                       @csrf
                                   </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
