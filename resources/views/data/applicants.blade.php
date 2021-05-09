
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
                                  App-Ref 
                                </th>
                                <th class="text-center">
                                  Post
                                </th>
                                <th class="text-center">
                                  Applicant Name
                                </th>
                           
                            
                                 <th class="text-center">
                                  Application Status
                                </th>
                              
                                 <th class="text-center">
                                 Action
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
@if(!empty($data))
                              @foreach($data as $apps)
                           @if(Auth::id() == $apps->captured_by)
                              <tr id='t0'>

                        

                                <td>{{$apps->app_id}}</td>
                                <td>{{$apps->title}}</td> 
                                <td>{{$apps->fname}} {{$apps->lname}}</td>
                                
                              
                                <td>
                                   @if($apps->app_status == 'Complete')                  
                  
                                   <label class="label label-success"> {{$apps->app_status}}</label>
                                  @else
                                  <label class="label label-warning"> {{$apps->app_status}}</label>
                                  @endif
                                </td>  
                                <td>
                                  @if($apps->app_status == 'Complete')
                                  no action
                                  @else
                                  <a href="{{url('my-ref/'.$apps->ref_token.'/'.$apps->token)}}" class="btn btn-primary">Proceed</a>
                                  @endif
                                </td>                            
                              </tr>

                              @endif
                              @endforeach
                               @endif

                            </tbody>
                             
                      </table>
                  </div>
              </div>
          </div>


         @endsection