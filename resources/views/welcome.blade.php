@extends('layouts.templates')

@section('content')
    
       <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">

        <div class="container">

    <div class="row">
      
    
      <div class="col-md-2">
      </div>
        <div class="col-md-12">
          
          <div class="panel panel-warning">
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
    </div>
</div>
        
      </div>
      <!-- banner outer end --> 
@endsection
