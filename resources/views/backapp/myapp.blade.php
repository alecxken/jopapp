@extends('layouts.template')

@section('content')
    
    <div class="col-md-12">
          
          <div class="box box-warning">
                <div class="box-heading">
                    <h5 class="box-title">
                        <span class="fa fa-bars"></span> Welcome  to {{Auth::user()->name}}
                      My Applications</h5>
                </div>
                <div class="box-body">
                  
     

         
               
            

                      
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
                                <td><label class="label label-warning"> Pending</label></td>  
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


      <!-- banner outer end --> 
@endsection
