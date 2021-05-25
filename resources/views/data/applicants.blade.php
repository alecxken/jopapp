
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Applicants</h3>
            </div>
 				 <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-hover table-striped small">
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
                              @role('Admin')

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
                                  <a href="{{url('my-ref/'.$apps->ref_token.'/'.$apps->token)}}" class="btn  btn-xs btn-primary">Proceed</a>
                                  @endif
                                   <a href="{{url('jobs-apps-steps/'.$apps->token)}}" class="btn  btn-xs btn-warning">Edit</a>
                                </td>                            
                              </tr>
                              @else

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
                                  <a href="{{url('my-ref/'.$apps->ref_token.'/'.$apps->token)}}" class="btn  btn-xs btn-primary">Proceed</a>
                                  @endif
                                   <a href="{{url('jobs-apps-steps/'.$apps->token)}}" class="btn  btn-xs btn-warning">Edit</a>
                                </td>                            
                              </tr>

                              @endif
                              @endrole
                              @endforeach
                               @endif

                            </tbody>
                             
                      </table>
                    </div>
                  </div>
              </div>
          </div>
<script type="text/javascript">
  
     $(document).ready(function() {
var table = $('#report-table').DataTable(
    {
    paging     : true,
    lengthChange: true,
    searching   : true,
    ordering   : true,
    info       : true,
    autoWidth   : true,
    // buttons: [
    //    'excel'
    // ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );
</script>

         @endsection