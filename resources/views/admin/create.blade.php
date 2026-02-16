@extends('layouts.template')

@section('title', '| Add User')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-user-plus"></i> Add New User</h3>
                </div>

                {{ Form::open(array('url' => 'user_store', 'method' => 'POST')) }}
                @csrf

                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Validation Error!</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Full Name *') }}
                                {{ Form::text('name', old('name'), array('class' => 'form-control', 'placeholder' => 'Enter full name', 'required' => true)) }}
                                <small class="text-muted">This will be used as the username</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('email', 'Email Address *') }}
                                {{ Form::email('email', old('email'), array('class' => 'form-control', 'placeholder' => 'user@example.com', 'required' => true)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('phone', 'Phone Number') }}
                                {{ Form::text('phone', old('phone'), array('class' => 'form-control', 'placeholder' => '+254...')) }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('password', 'Password *') }}
                                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Minimum 6 characters', 'required' => true)) }}
                                <small class="text-muted">Minimum 6 characters</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('password_confirmation', 'Confirm Password *') }}
                                {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Re-type password', 'required' => true)) }}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h4><b><i class="fa fa-lock"></i> Assign Roles</b></h4>
                            <p class="text-muted">Select one or more roles for this user</p>

                            <div class="form-group">
                                @if(isset($roles) && count($roles) > 0)
                                    <div class="row">
                                        @foreach ($roles as $role)
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        {{ Form::checkbox('roles[]', $role->id, false, array('id' => 'role_'.$role->id)) }}
                                                        <strong>{{ ucfirst($role->name) }}</strong>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fa fa-exclamation-triangle"></i> No roles available. Please create roles first.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    {{ Form::submit('Create User', array('class' => 'btn btn-primary btn-lg')) }}
                    <a href="{{ url('user_index') }}" class="btn btn-default btn-lg">Cancel</a>
                </div>

                {{ Form::close() }}

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Highlight selected roles
    $('input[type="checkbox"][name="roles[]"]').change(function() {
        if($(this).is(':checked')) {
            $(this).parent().parent().parent().addClass('bg-light-blue');
        } else {
            $(this).parent().parent().parent().removeClass('bg-light-blue');
        }
    });
});
</script>

@endsection
