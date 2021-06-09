@extends('layouts.template')
@section('content')

  

<div class="box-body">
   {!! Form::open(['method'=> 'post','url' => 'store-checklist-filter', 'files' => true ]) !!}
        <div class="box-body"> 

           <div class="form-group col-md-8 center">
             {!! Form::label('weight', 'Job Position ', ['class' => 'awesome'])!!}
             <select class="form-control select2" name="post" id="residence">
               <option  value="">SELECT JOB POSITION</option>
               @foreach($post as  $columns)
                    <option value="{{$columns->token}}">{{$columns->title}}</option>
               @endforeach
             </select>
           </div>   
         
          <div class="form-group col-md-4 center">
             {!! Form::label('weight', 'ACTION ', ['class' => 'awesome'])!!}
             <br>
             <button class="btn btn-success form-control" type="Submit">Click To Filter</button>
          </div>
          </div>
            {!!Form::close()!!}
<div class="row">




   <div class="col-md-12">  
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Results View</h3>
            </div>
       		 <div class="box-body table-responsive" id="table_wrapper">
                @if(!empty($data))
                     <table id="report-table" class="table table-bordered table-hover table-striped small">
                            <thead class="bg-primary small">
                                <tr class="box-success">  
                                <th>APPLICANT REF</th>
                                <th>FNAME</th>
                                @foreach ($job as $jb )
                                    <th>{{$jb->requirement}}</th>
                                @endforeach          
                                </tr>
                            </thead>
                            <tbody>
                                    @if(!empty($data))
                                    @foreach ($data as $user)
                                        <tr>
                                            <td>{{$user->app_id}}</td>
                                            <td>{{$user->fname}} {{$user->lname}}</td>  
                                            @foreach ($listing as $l )
                                            @if($l->app_token == $user->token)
                                            <td>{{$l->passed}}</td>
                                            @endif
                                            @endforeach  
                                        </tr>
                                    @endforeach
                                    @endif
                            </tbody>
                       </table>
                    @endif
                </div>



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
