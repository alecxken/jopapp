@extends('layouts.template')
@section('content')
<?php $data = \DB::table('usersx')->get();
?>
<div class="box-body">
  

<div class="col-md-4">
    <div class="box box-success">
            <div class="box-header with-border bg-success">
                <h6 class="box-title "> Import STAFF</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'upload-staff' ,'files' => true]) !!}
                <div class="form-group  ">
                    {!! Form::label('C_Name', 'STAFF EXCEL FILE UPLOAD:', ['class' => 'col-form-label '])!!}
                    {!!Form::file('file',Null,['class' => 'form-control' ])!!}
                </div>  
          </div>
           <div class="box-footer box-primary">
              <button type="submit" class="btn btn-success ">Submit</button>
            </div>
           {!!Form::close()!!}
   </div>
</div>
<div class="col-md-8">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">STAFF</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
                <div class="btn-group">
                 
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
              <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
             <tr class="box-success">  
               <th>Id</th>
               <th>Date</th>
               <th>Currency</th> 
               <th>Rate</th>                      
            </tr>
          </thead>
          <tbody>
           @foreach ($data as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->empnumb}}</td>
                <td>{{$user->fname}}</td>   
                <td>{{$user->mname}}</td>  
                <td>{{$user->email}}</td>               
              </tr>
          @endforeach
          </tbody>
          </table>
          </div>



           </div>
       </div>
   </div>
</div>
    </div>
 
@endsection
