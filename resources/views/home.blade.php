@extends('layouts.templates')

@section('content')
    
       <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">

        <div class="container">

    <div class="row">
      
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fa-bookmark"></span> MENU</h3>
                </div>
                <div class="panel-body"style="text-align: right;">

                    <a href="{{url('job')}}/" class="btn btn-success btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Job Admin</a>
                    
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-primary btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Opportunities</a>
                  
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-danger btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Website</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
          
          <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fa-bars"></span> Welcome  to {{Auth::user()->name}}
                      Dashboard</h3>
                </div>
                <div class="panel-body">
                  
          <div class="row">
            <div class="panel-group" id="accordion">

              @php $job = \App\Job::all(); @endphp
              @foreach($job as $jobs)
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse-1"><span class="fa fa-check"></span> {{$jobs->title}} </a> </h4>
                </div>
                <div id="collapse-1" class="panel-collapse collapse in">
                  <div class="panel-body"> {{$jobs->requirements}}. <a href="" class="label label-success">Job Details</a> </div>
                  <div class="panel-footer"> @auth <a class="btn btn-warning btn-sm"  href="{{url('apply-now/'.$jobs->token)}}">Apply Now</a> @else <a class="btn btn-success btn-sm" href="{{url('login')}}">Login/Signup to Apply </a> @endauth </div>
                </div>
              </div>
              @endforeach


            
           
          </div>
        </div>
                </div>
            </div>

        </div>
    </div>
</div>
        
      </div>
      <!-- banner outer end --> 
@endsection
