@extends('layouts.template')
@section('content')

<div class="box-body">
<!--   <div id="erross" class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Warning!</h4>

        <p> Access To Company Data Is Monitored and Audited </p>
      </div> -->


<div class="col-md-12">
  
</div>
<div class="col-md-12">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">DAILY APPLICANTS REPORT </h3>

        
            </div>
               <div class="box-body table-responsive" id="table_wrapper">
     <table id="report-table" class="table table-bordered table-striped  table-fit small table-sm">
          <thead>
             <tr class="box-success">  
              <th> Filename</th>
        
              <th>Action</th>
                         
            </tr>
          </thead>
          <tbody>
            @if(!empty($data))
           @foreach ($data as $user)
              <tr>
                  <td>{{$user}}</td>                  
              
                <td>
                   {!! Form::open([ 'method' => 'post', 'url' => ['download-accounts/'.$user] ]) !!}
                      {!! Form::submit('Click Here Download  ', ['class' => 'btn-xs btn btn-primary']) !!}
                      {!! Form::close() !!}
               
         
                
                </td>                     
              </tr>
          @endforeach
          @endif
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

      

    <script type="text/javascript">      
       $(document).ready(function(){
          var url = "getcustomer";
            //display modal form for task editing
            $('.open-modal').click(function(){
                var task_id = $(this).val();

                $.get(url + '/' + task_id, function (data) {
                    //success data
                    console.log(data);
                    $('#id').val(data.id);
                    $('#names').val(data.name);
                    $('#phone').val(data.phone);
                     $('#loc').val(data.location);
                      $('#fav').val(data.fav);
                
                    $('#btn-save').val("update");
                    $('#myModal').modal('show');
                }) 
            });
          });



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
