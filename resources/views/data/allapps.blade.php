
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">All Applications</h3>
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

                              @foreach($data as $apps)
                       
                              <tr id='t0'>

                            @php
                             $a = \App\ApplicantMark::all()->where('job_token',$apps->token)->first();
                             $app = \App\KurraApp::all()->where('token',$apps->token)->first();
                             $job = \App\Job::all()->where('token',$apps->ref_token)->first();
                            @endphp

                                <td>{{$apps->app_id}}</td>
                                <td>{{$job->title}}</td> 
                                <td>{{$app->fname}} {{$app->lname}}</td>
                                
                              
                                <td>
                                   @if($apps->app_status == 'Complete')                  
                  
                                   <label class="label label-success"> {{$apps->app_status}}</label>
                                  @else
                                  <label class="label label-warning"> {{$apps->app_status}}</label>
                                  @endif
                                </td>  
                                <td>
                                 
                                 <a href="{{url('view-app/'.$apps->token)}}" class="label label-primary btn-sm">View </a> <span> |</span>
                                  <a href="{{url('drop-app/'.$apps->token)}}" class="label label-danger btn-sm">Drop </a>
                                
                                </td>                            
                              </tr>

                       
                              @endforeach

                            </tbody>
                             
                      </table>
                  </div>
              </div>
          </div>


         @endsection