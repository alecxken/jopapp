@extends('layouts.templates')

@section('content')
    
       <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">

        <div class="container">
           <div class="container">
          <div class="page-header">
              <h1>Available Positions</h1>
              <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">pages</a></li>
                <li class="active">FAQ's</li>
              </ol>
            </div>
          </div>
           <div class="col-md-11 col-sm-11">
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
                  <div class="panel-footer"> @auth <button>Apply Now</button> @else <a class="btn btn-success btn-sm" href="{{url('login')}}">Login/Signup to Apply </a> @endauth </div>
                </div>
              </div>
              @endforeach


            
            </div>
          </div>
        </div>
         <div class="col-sm-5 hidden-xs right-sec">
          <div class="bordered">
            <div class="row ">
              <div class="col-sm-16 bt-space wow fadeInUp animated" data-wow-delay="1s" data-wow-offset="50"> <img class="img-responsive" src="images/reg.jpg" width="336" height="280" alt=""/> <a href="#" class="sponsored">sponsored advert</a> </div>
            </div>
          </div>
        </div>


   {{--  <div class="row">
      
    
      <div class="col-md-1">
      </div>
        <div class="col-md-14">
          
          <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fa-bookmark"></span> Dashboard</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover order-listON " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Jop Title
                                </th>
                                 <th class="text-center">
                                  File
                                </th>
                                 <th class="text-center">
                                  Action
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              @php $job = \App\Job::all(); @endphp
                              @foreach($job as $jobs)
                              <tr id='t0'>
                               <td>{{$jobs->token}}</td>
                               <th>{{$jobs->title}}</th>
                               <td>{{$jobs->file}}</td>
                               <td><button>Apply</button></td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                </div>
            </div>

        </div>
    </div> --}}
</div>
        
      </div>
      <!-- banner outer end --> 
@endsection
