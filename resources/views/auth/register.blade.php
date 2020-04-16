@extends('layouts.templates')

@section('content')
<div class="container">
       <div class="page-header">
              <h1>Registration Page</h1>
              <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
               
              </ol>
            </div>
    <div class="row justify-content-center">
        <div class="col-sm-8">
        
                    <div class="sec-topic col-sm-16  wow fadeInDown animated " data-wow-delay="0.5s">
                      <div class="row">
                        <div class="col-sm-16"> <img width="1000" height="606" alt="" src="images/reg.jpg" class="img-thumbnail"> </div>
                     </div>
                       
            </div>
        </div>
             <div  class="col-sm-8 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('Registration Page') }}</div>
                  <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="panel-body">
                  

                        <div class="form-group row">
                            <label for="name" class=" col-form-label ">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class=" col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class=" col-form-label ">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                    
                </div>
                <div class="panel-footer">
                            <div class=" ">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Register') }}
                                </button>
                            </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
