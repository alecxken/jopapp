@extends('layouts.template')

@section('title', '| Edit User')

@section('content')
<div class="col-md-8 box box-primary">
          <div class="box-header with-border">
            <h1 class="box-title"><i class='fa fa-user-plus'> Edit {{$user->name}}</i></h1>
          </div>
<div class='col-lg-4 col-lg-offset-4'>

    <hr>

    {{ Form::open(['method'=>'POST','url'=>'user_update/'.$user->id]) }}{{-- Form model binding to automatically populate our fields with user data --}}
@csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $user->name, array('class' => 'form-control', 'readonly')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control', 'readonly')) }}
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    <!-- <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}


    </div> -->
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}


</div>
</div>

@endsection
