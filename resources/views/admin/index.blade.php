@extends('layouts.template')

@section('title', '| Users')

@section('content')



    <div class="col-md-8 box box-success">
      <div class="col-lg-10 col-lg-offset-1">
          <h1><i class="fa fa-users"></i> User Administration <a href="{{ url('roles_index') }}" class="btn btn-default pull-right">Roles</a>
          <a href="{{ url('permissions_index') }}" class="btn btn-default pull-right">Permissions</a>
        <a href="{{ url('users_create') }}" class="btn btn-success">Add User</a>
      </h1>
          <hr>
      <div class="table-responsive">
       <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Date/Time Added</th> -->
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if(is_null($user->roles()))

                      <p>No Role</p>
                      @else

                      {{  $user->roles()->pluck('name')->implode(' ,') }}</td>
                      @endif
                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                      {!! Form::open([ 'method' => 'post', 'url' => ['user_edit/'. $user->id] ]) !!}
                      {!! Form::submit('Edit ', ['class' => 'btn btn-primary pull-left']) !!}
                      {!! Form::close() !!}
                      {!! Form::open(['method' => 'DELETE', 'url' => ['user_destroy/'.$user->id] ]) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger pull-left']) !!}
                      {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
      </div>
    </div>
</div>

@endsection
