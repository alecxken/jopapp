@extends('layouts.log')
@section('content')


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
       <a href=""><center><img src="{{url('/images/ecologo.svg')}}" width="112px" height="60px"></center></a>
  </div>
  <div class="login-box-body" style="border-radius: 20px;">


     <div></div>
        <p class="login-box-msg">Sign in to start your session</p>
          
           <form method="POST" action="{{ route('login') }}">
                        @csrf
                 <div class="form-group has-feedback{{ __('E-Mail Address') }}">
                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus placeholder="Windows Username">
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                       @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert"> 
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                       @endif
                  
                  </div>


                  <div class="form-group has-feedback">
                      <input type="password" name="password" required placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >
                     
                           @if ($errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                               </span>
                          @endif
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
     
        <div class="col-xs-8">
         
        </div>
        <!-- /.col -->
        <div class="box-footer">
          <button type="submit" style="border-radius: 20px;" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
   
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


</body>
@endsection
