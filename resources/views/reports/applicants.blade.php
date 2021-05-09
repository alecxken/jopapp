
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Applicants</h3>
            </div>
 				 <table class="table table-bordered table-hover order-list4  small" id="">
                            <thead class="bg-info small">
                              <tr >
                                <th>#</th>
                                <th class="">
                                  REPORT TITLE
                                </th>
                                <th class="">
                                  TOTAL DONE
                                </th>
                             
                                 <th class="">
                                 ACTION
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
@if(!empty($data))
                              @foreach($data as $key => $apps)
                      
                              <tr id='t0'>
                                <td>{{$key +1 }}</td>

                        

                                <td>{{$apps->title}}</td>
                                <td>{{$apps->num}}</td> 
                              
                                <td>
                            

                                @if($apps->num > 0)

                                  <a href="{{url('view-job-details/'.$apps->title)}}" class="btn btn-xs btn-info" align="center">View Details</a>
                                  @else
                                  No Data
                                  @endif 

                                 
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