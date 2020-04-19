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
                      My Applications</h3>
                </div>
                <div class="panel-body">
                  
          <div class="row">
            <div class="panel-group" id="accordion">

         
               
            

                      
                        <table class="table table-bordered table-hover order-list4 " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  AppRef
                                </th>
                                <th class="text-center">
                                  JobID
                                </th>
                            
                                 <th class="text-center">
                                  Application Status
                                </th>
                                <th class="text-center">
                                  Shortlisted
                                </th>
                                 <th class="text-center">
                                 Action
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>

                              @foreach($data as $apps)
                              <tr id='t0'>
                                <td>{{$apps->token}}</td> 
                                <td>{{$apps->ref_token}}</td>   
                                <td>{{$apps->app_status}}</td>
                                <td></td>  
                                <td>
                                  @if($apps->app_status == 'Complete')
                                  no action
                                  @else
                                  <a href="{{url('apply-now/'.$apps->ref_token)}}" class="btn btn-primary">Proceed</a>
                                  @endif
                                </td>                            
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
            </div>

        </div>
    </div>
</div>
        
      </div>
      <!-- banner outer end --> 
@endsection
