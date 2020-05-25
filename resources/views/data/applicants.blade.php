
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Applicants</h3>
            </div>
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
                                  Applicant Email
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
                                <td>{{$apps->app_email}}</td>      
                                <td>{{$apps->app_status}}</td>
                                <td><label class="label label-warning"> Pending</label></td>  
                                <td>
                                  @if($apps->app_status == 'Complete')
                                  no action
                                  @else
                                  <a href="{{url('my-ref/'.$apps->ref_token.'/'.$apps->token)}}" class="btn btn-primary">Proceed</a>
                                  @endif
                                </td>                            
                              </tr>
                              @endforeach

                            </tbody>
                             
                      </table>
                  </div>
              </div>
          </div>


         @endsection