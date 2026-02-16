@guest
  <meta http-equiv = "refresh" content = "1; url = {{url('/login')}}" />
@else
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EKE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <meta name="_token" content="{{csrf_token()}}" />
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">

  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-green.min.css')}}">
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/DataTables/datatables.min.css')}}"/>

  <link rel="stylesheet" href="{{asset('js/toastr/toastr.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini" >
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header" >

    <!-- Logo -->
    <a href="{{url('')}}" class="logo"  style=" background-image: linear-gradient(to right,#fff,#FFF);">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HR</b>AP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset('/images/logo.gif')}}" width="120px"><b></b></span>
    </a>

    <!-- Header Navbar -->
   @include('layouts.nav')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <section class="content-header">

   <!--     @if (session('status'))
        <div id="erros" class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Alert!</h4>

        <p> {{ session('status') }}</p>
      </div>
@elseif(session('error'))
<div id="erros" class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Warning!</h4>

        <p> {{ session('error') }}</p>
      </div>
@elseif(session('danger'))
<div id="erros" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Warning!</h4>

              <p> {{ session('danger') }}</p>
            </div>
@elseif(session('primary'))
<div id="erros" class="alert alert-primary alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Warning!</h4>

              <p> {{ session('primary') }}</p>
            </div>

@endif
@if ($errors->any())
    <div id="erros" class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4>Input Fields Error!!</h4>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </div>
@endif -->
    {{--   <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


      @yield('content')
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{date('Y')}} .</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<!-- REQUIRED JS SCRIPTS -->
 
<script type="text/javascript" src="{{asset('assets/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.min.js')}}"></script>
<!-- jQuery 3 -->
{{-- <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script> --}}
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

    
 <script src="{{asset('js/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
    toastr.options = {
      "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
  // "positionClass": "toast-top-center",
 // "preventDuplicates": true,
  // "onclick": null,
  "showDuration": "300",
   "hideDuration": "1000",
   "timeOut": "5000",
   "extendedTimeOut": "1000",
   "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@if(session("danger"))
  toastr.error("{{ session("danger") }}");
@elseif(session("status"))
    toastr.success("{{ session("status") }}");
@elseif(session("success"))
    toastr.success("{{ session("success") }}");
@elseif(session("info"))
 toastr.info("{{ session("info") }}");
@elseif(session("error"))
toastr.error("{{ session("error") }}");
@elseif(session("warning"))
 toastr.warning("{{ session("warning") }}");

@endif
 @if ($errors->any())
   @foreach ($errors->all() as $error)
              toastr.warning("{{ $error }}");
            @endforeach

 @endif
</script>
     <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

 
  })
</script>
</body>
</html>
@endguest
