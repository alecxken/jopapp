

@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Experience Section</h3>
            </div>
              <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-hover table-striped small">
 				 
                            <thead class="bg-primary small">
                              <tr >
                               
                                <th class="text-center">
                                  Applicant Ref
                                </th>
                                 <th class="text-center">
                                  Position
                                </th>
                                <th class="text-center">
                                  Applicant Name
                                </th>
                                <th class="text-center">
                                  From
                                </th>
                                <th class="text-center">
                                  To
                                </th>
                                <th class="text-center">
                                  Experience
                                </th>
                                         
                              {{--    <th class="text-center">
                                 Action
                                </th> --}}
                               
                              </tr>
                            </thead>
                            <tbody>

                              @foreach($data as $apps)
                       
                               <tr id='t0'>
                                  <td>{{$apps->app_id}}</td>
                                   <td>{{$apps->title}}</td>
                                   <td>{{$apps->name}}</td>
                                   <td>{{$apps->start_date}}</td>
                                   <td>{{$apps->end_date}}</td>
                                   <td class="bg-success">{{$apps->experience}}</td>
                               
                             {{--    <td>                                 
                                 <a href="{{url('view-app/'.$apps->token)}}" class="label label-primary btn-sm">View </a> <span> |</span>
                               
                                </td>    --}}                         
                              </tr>

                       
                              @endforeach

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
    buttons: [
       'excel'
    ]
    });

    table.buttons().container()
        .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

} );
</script>

         @endsection