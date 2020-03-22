<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EKE Internal Web System</title>

  
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body class="hold-transition login-page" style="  background: -webkit-linear-gradient(left,#005b82 15%,#0082bb 100%); background-size: cover; ">
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="{{asset('/js/app.js')}}"></script> -->
 <!--    <script src="{{asset('dist/jquery.min.js')}}"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="{{url('dist/js/bootstrap.min.js')}}"></script> -->
<!-- iCheck -->

</body>
</html>
