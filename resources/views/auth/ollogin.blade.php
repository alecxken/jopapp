@extends('layouts.templates')
@section('content')

<div class="col-sm-4"></div>
   <div  class="col-sm-8 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
<div class="panel panel-success">
  <div class="panel-heading">
       Sign in Page
  </div>
  <div class="panel-body" style="border-radius: 20px;">
   
      
          
           <form method="POST" action="{{ route('login') }}">
                        @csrf
                 <div class="form-group has-feedback{{ __('E-Mail Address') }}">
                  <label>Email Address</label>
                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  required autofocus placeholder="Windows Username">
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                       @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert"> 
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                       @endif
                  
                  </div>


                  <div class="form-group has-feedback">
                    <label>Password</label>
                      <input type="password" name="password" required placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" >
                     
                           @if ($errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                               </span>
                          @endif
                      <span class="fa fa-lock form-control-feedback"></span>
                  </div>
     
     
        <!-- /.col -->
              <div class="panel-footer">
                <button type="submit" style="border-radius: 20px;" class="btn btn-success btn-block btn-flat">Sign In</button>
                        <center>OR</center>  

                 <button type="submit" style="border-radius: 20px;" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
         
          </form>

  </div>
  <!-- /.login-box-body -->
</div>
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


@endsection
