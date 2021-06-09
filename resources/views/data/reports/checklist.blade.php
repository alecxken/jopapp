@extends('layouts.template')
@section('content')

  

<div class="box-body">
   {!! Form::open(['method'=> 'post','url' => 'store-checklist-filter', 'files' => true ]) !!}
        <div class="box-body"> 

           <div class="form-group col-md-8 center">
             {!! Form::label('weight', 'Job Position ', ['class' => 'awesome'])!!}
             <select class="form-control" name="post" id="residence">
               <option  value="">SELECT JOB POSITION</option>
               @foreach($post as  $columns)
                    <option>{{$columns->title}}</option>
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
              <h3 class="box-title">Jobs Created</h3>
            </div>
         <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="box-success">  
               <th>Reference</th>
               <th>Title</th>
             
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)

<!--  -->
              <tr>
                <td>{{$user->prefix}}</td>
                <td>{{$user->title}}</td>            
          
                <td><a href="{{url('job_check/'.$user->token)}}" class="btn btn-danger">View Applicants</a></td>
            
              
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
   
 <script >


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

 $('.textarea').summernote()
   
  })

 
</script>

@endsection
