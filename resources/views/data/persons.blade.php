
@extends('layouts.template')
@section('content')

  

<div class="box-body">
  


   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Applicants Personal Info</h3>
            </div>
              <div class="box-body table-responsive" id="table_wrapper">
                
                     <table id="report-table" class="table table-bordered table-hover table-striped small">
 				 
                            <thead class="bg-primary small">
                              <tr >
                               <th>APPID</th>
                                <th class="text-center">
                                  Title
                                </th>
                                <th class="text-center">
                                  Last_Name
                                </th>
                                <th class="text-center">
                                  First_Name
                                </th>
                                <th class="text-center">
                                  Othernames
                                </th>
                                <th class="text-center">
                                  DOB
                                </th>
                                <th class="text-center">
                                  Phone No
                                </th>
                                <th class="text-center">
                                  Address
                                </th>
                                <th class="text-center">
                                  Postal Code
                                </th>
                              
                                <th class="text-center">
                                  Email Address
                                </th>
                                    <th class="text-center">
                                  Pass
                                </th>
                                    <th class="text-center">
                                 Fail
                                </th>
                                    <th class="text-center">
                                 Pecentage
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
                                   <td>{{$apps->lname}}</td>
                                   <td>{{$apps->fname}}</td>
                                   <td>{{$apps->oname}}</td>
                                   <td>{{$apps->dob}}</td>
                                   <td>{{$apps->phone_no}}</td>
                                   <td>{{$apps->po_box}}</td>
                                   <td>{{$apps->postal_code}}</td>
                                   <td>{{$apps->email}}</td>
                                     <td>{{$apps->passed}}</td>
                                       <td>{{$apps->failed}}</td>
                                         <td>
                                      <label class="label label-info">  {{$apps->percentage}}%</label>
                                       
                                         </td>
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