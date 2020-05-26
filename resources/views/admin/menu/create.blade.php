@extends('layouts.template')
@section('content')
<?php $data = \DB::table('menus')->get();
?>
<div class="box-body">
  

<div class="col-md-6">
    <div class="box box-success">
            <div class="box-header with-border bg-success">
                <h6 class="box-title "> Register Main Menu</h6>
            </div> 
           <div class="box-body">
              {!! Form::open(['method'=> 'post','url' => 'upload-menu' ,'files' => true]) !!}
               <div class="form-group  ">
                    {!! Form::label('C_Name', 'Select Menu Type:', ['class' => 'col-form-label '])!!}
                   <select class="form-control" id="type" name="type" onchange="transaction()">
                     <option value="">Choose Menu Type</option>
                     <option value="1">Main Navigation Menu</option>
                     <option value="0">Sub Menu</option>
                   </select>
                </div> 
                <div id="menu" style="display: none;">
                  <div class="form-group  ">
                    {!! Form::label('C_Name', 'Menu Name:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('mmenu',Null,['class' => 'form-control' ])!!}
                  </div> 
                </div>
                 <div id="submenu" style="display: none;">
                  <div class="form-group  ">
                     {!! Form::label('C_Name', 'Parent Menu:', ['class' => 'col-form-label '])!!}
                    <select class="form-control" name="parent">
                      <option value="NA">Select Parent Menu</option>
                      @foreach($data as $menu)
                      <option value="{{$menu->token}}" >{{$menu->name}}</option>
                      @endforeach
                    </select>
                  </div> 
                   <div class="form-group  ">
                    {!! Form::label('C_Name', 'Menu Name:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('smenu',Null,['class' => 'form-control' ])!!}
                  </div> 
                </div>
                
                 <div class="form-group  ">
                    {!! Form::label('C_Name', 'Menu Url:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('url','#',[ 'class' => 'form-control' ])!!}
                </div>
                <div class="form-group  ">
                    {!! Form::label('C_Name', 'Menu Description:', ['class' => 'col-form-label '])!!}
                    {!!Form::text('desc','NA',['class' => 'form-control' ,'max'=>'100'])!!}
                </div>   
          </div>
           <div class="box-footer box-primary">
              <button type="submit" class="btn btn-success ">Submit</button>
            </div>
           {!!Form::close()!!}
   </div>
</div>

<div class="col-md-6">
  <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Menus</h3>

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
               <th>ID</th>
               <th>Type</th>
               <th>Parent Menu</th> 
               <th>Child Name</th> 
               <th>URL</th>                      
            </tr>
          </thead>
          <tbody>
           @foreach ($data as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>
                  @if($user->type == 0)
                  <span class="label label-info">SubMenu</span>
                  @elseif($user->type == 1)
                  <span class="label label-success">Main Menu</span>
                  @endif
                </td>
                <td>{{$user->name}}</td>   
                <td>{{$user->submenu}}</td>  
                <td>{{$user->url}}</td>               
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
 <script type="text/javascript">
   function transaction() {
  var trans = document.getElementById("type").value;
  var sdiv = document.getElementById('submenu');
  var rdiv = document.getElementById('menu');

  switch(trans) {
      case "0":
      sdiv.style.display = "block";
      rdiv.style.display = "none";
      break;

      case "1":
      rdiv.style.display = "block";
      sdiv.style.display = "none";

      break;

      default:
      sdiv.style.display = "none";
      rdiv.style.display = "none";
        }
      }
 </script>
@endsection
