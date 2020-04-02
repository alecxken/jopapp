@extends('layouts.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
  

<div class="card-body">
  
<div class="row">
<div class="col-md-6">
    <div class="card card-danger">
            <div class="card-header with-border bg-danger disabled">
                <h6 class="card-title ">Job Registration</h6>
            </div> 
           <div class="card-body">
              {!! Form::open(['method'=> 'post','url' => 'job-reg' ,'files' => true]) !!}
           
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Job Title', ['class' => 'col-form-label '])!!}
                    {!!Form::text('title',Null,['class' => 'form-control' ])!!}
                </div>
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Responsibilty:', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('responsibility',Null,['class' => 'form-control','rows'=>'2' ])!!}
                </div>  
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Job requirements', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('requirements',Null,['class' => 'form-control','rows'=>'2' ])!!}
                </div>
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Job qualification:', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('qualification',Null,['class' => 'form-control','rows'=>'2' ])!!}
                </div>  
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Job applicantation deadline', ['class' => 'col-form-label '])!!}
                    {!!Form::date('deadline',Null,['class' => 'form-control' ])!!}
                </div>
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Document Name:', ['class' => 'col-form-label '])!!}
                    <input type="file" name="file" class="form-control" >
                   
                </div>  
                 
          </div>
           <div class="card-footer">
              <button type="submit" class="btn btn-primary ">Submit Document Head</button>
            </div>
           {!!Form::close()!!}
   </div>


 </div>



   <div class="col-md-6">  
       <div class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Jobs Created</h3>
            </div>
         <div class="card-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="card-success">  
               <th>Reference</th>
               <th>Title</th>
               <th>Dealine</th>
                <th>File</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)
              <tr>
                <td>{{$user->token}}</td>
                <td>{{$user->title}}</td>
            
                <td>{{$user->deadline}}</td>
                <td>{{$user->file}}</td>
            
              
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
