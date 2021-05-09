
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
             <a href="{{url('summary-app')}}" class="btn btn-xs btn-success">Click To Go Back</a> <h3 class="box-title">Applicants Details</h3> 
            </div>
 				 <table class="table table-bordered table-hover order-list4  small" id="">
                            <thead class="bg-info small">
                              <tr >
                                <th>#</th>
                                <th class="">App ID </th>
                                <th class="">Job Title</th>
                                <th class="">Name</th>                                
                                 <th class="">Action</th>
                               
                              </tr>
                            </thead>
                            <tbody>
@if(!empty($data))
                              @foreach($data as $key => $apps)
                      
                              <tr id='t0'>
                                <td>{{$key +1 }}</td>
                                 <td>{{$apps->app_id}}</td>
                                <td>{{$apps->title}}</td> 
                                 <td>{{$apps->fname}} {{$apps->lname}}</td>
                            
                              
                                <td>
                            

                                  <a href="{{url('view-individual-details/'.$apps->token)}}" class="btn btn-xs btn-info" align="center">View Details</a>

                                  <a href="{{url('delete-details/'.$apps->token)}}" class="btn btn-xs btn-danger" align="center">Drop</a>
                               

                                 
                                </td>                            
                              </tr>

                           
                              @endforeach
                               @endif

                            </tbody>
                             
                      </table>
                  </div>
              </div>
          </div>


         @endsection