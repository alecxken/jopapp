@extends('layouts.template')

@section('title', '| Add User')

@section('content')




<div class="box-body">
  

    <div class="box box-success">
            <div class="box-header with-border bg-success">
                <h6 class="box-title ">  User Management </h6>
            </div> 
           <div class="box-body">

    {{ Form::open(array('url' => 'user_stores')) }}

    <div class="form-group">
        {{ Form::label('name', 'Full Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Email Address') }}
        {{ Form::text('email', '', array('class' => 'form-control')) }}
    </div>
    
      <div class="form-group">
        {{ Form::label('name', 'Phone Number') }}
        {{ Form::number('phone', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Default Password') }}
        {{ Form::text('password', '12345678', array('class' => 'form-control')) }}
    </div>
   {{--  --}}

  </div>
  <div class="box-footer"> 

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
</div>
    {{ Form::close() }}



@endsection
