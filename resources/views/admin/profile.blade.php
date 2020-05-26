@extends('layouts.template')
@section('content')
<div class="col-md-3">
<div class="box box-primary ">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('/images/'.$data->image)}}" onerror="this.src='../../dist/img/default.png'" src="" alt="User profile picture">

              <h3 class="profile-username text-center">{{$data->name}}</h3>

              <p class="text-muted text-center">Ecobank</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right">{{$data->name}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{$data->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Role</b> <a class="pull-right">Admin</a>
                </li>

              </ul>
<form method="post" action="{{url('profileupdate')}}" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="id" value="{{Auth::id()}}">
 <li class="list-group-item">
                  <b>Image</b> <input type="file" name="image">
                </li>
                <br>
<button type="submit" class="btn btn-primary btn-block">Upload Image</button>
</form>
            {{--   <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div>

</div>
<div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
            {{--  --}}
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
             
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
          @endsection