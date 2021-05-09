@extends('layouts.template')
@section('content')

  

<div class="box-body">
  
<div class="row">
<div class="col-md-12">
    <div class="box box-danger">
            <div class="box-header with-border bg-danger disabled">
                <h6 class="box-title ">Job Registration</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'job-reg' ,'files' => true]) !!}
           
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Job Title', ['class' => 'col-form-label '])!!}
                    {!!Form::text('title',Null,['class' => 'form-control' ])!!}
                </div>
                
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Experience (Yrs):', ['class' => 'col-form-label '])!!}
                    {!!Form::number('qualification',Null,['class' => 'form-control','placeholder'=>'2' ])!!}
                </div> 
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Job App Prefix:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('prefix',Null,['placeholder'=>'KURA/DE/TR/1','class' => 'form-control','required' ])!!}
                </div>  
                 <div class="form-group col-md-3 ">
                    {!! Form::label('C_Name', 'Job applicantation deadline', ['class' => 'col-form-label '])!!}
                    {!!Form::date('deadline',Null,['class' => 'form-control' ])!!}
                </div>
                 <div class="form-group col-md-4 ">
                    {!! Form::label('C_Name', 'Document Name:', ['class' => 'col-form-label '])!!}
                    <input type="file" name="file" class="form-control" >
                   
                </div>
                 <div class="form-group col-md-8  ">
                    {!! Form::label('C_Name', 'Responsibilty:', ['class' => 'col-form-label '])!!}
                    {!!Form::textarea('responsibility',Null,['class' => 'form-control','rows'=>'1' ])!!}
                </div>  
                
                
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Job requirements', ['class' => 'col-form-label '])!!}
                     @include('data.require')
                </div>
                  <div class="form-group  ">
                     {!! Form::label('C_Name', 'Job Creteria', ['class' => 'col-form-label '])!!}
                    @include('data.qualify')
                  </div>  
                 
          </div>
           <div class="box-footer">
              <button type="submit" class="btn btn-primary ">Submit Document Head</button>
            </div>
           {!!Form::close()!!}
   </div>


 </div>



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
               <th>Dealine</th>
                <th>File</th>
                <th>Action</th>
                                                           
            </tr>
          </thead>
           <tbody> @if(!empty($data))
           @foreach ($data as $user)

<!--  -->
              <tr>
                <td>{{$user->prefix}}</td>
                <td>{{$user->title}}</td>            
                <td>{{$user->deadline}}</td>
                <td>{{$user->file}}</td>
                <td><a href="{{url('deletejob/'.$user->token)}}" class="btn btn-danger">Drop</a></td>
            
              
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
