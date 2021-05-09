  @extends('layouts.template')
@section('content')

  <div class="box box-success ">
              <div class="box-heading">
                <h3><a href="{{url('summary-app')}}" class="btn btn-xs btn-success">Click To Go Back</a><center> APPLICANT {{$data->app_id}} : {{$data->fname}} {{$data->oname}}</center></h3>
              </div>

              <div class="box-body ">

               
                         <dl>
               
                             <div class="form-group col-sm-2">
                                     
                               <dt>Applicant Ref</dt>
                                <dd>{{$data->app_id}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('name', 'Title') }}
                                <dd>{{$data->title}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('email', 'First Name') }}
                                <dd>{{$data->fname}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('email', 'Last Name') }}
                               <dd>{{$data->lname}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('name', 'Other Names') }}
                              <dd>{{$data->oname}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('email', 'P.O Box') }}
                                <dd>{{$data->po_box}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('email', 'Town') }}
                               <dd>{{$data->postal_code}}</dd>
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('email', 'Phone No') }}
                               <dd>{{$data->phone_no}}</dd>
                            </div> 

                            <div class="form-group col-sm-2">
                                {{ Form::label('name', 'Email Address') }}
                               <dd>{{$data->email}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('name', 'DOB') }}
                                <dd>{{$data->dob}}</dd>
                            </div>
                            <div class="form-group col-sm-2">
                                {{ Form::label('email', 'Gender') }}
                              <dd>{{$data->gender}}</dd>
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('email', 'ID/Passport ') }}
                               <dd>{{$data->passport}}</dd>
                            </div>

                              <div class="form-group col-sm-2">
                                {{ Form::label('email', 'County') }}
                               <dd>{{$data->county}}</dd>                               
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('name', ' Home District') }}
                               <dd>{{$data->district}}</dd>
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('disability', ' Current Salary') }}
                                 <dd>{{$data->current_salary}}</dd>
                            </div>
                           
                            <div class="form-group col-sm-2">
                              
                                {{ Form::label('disability', ' Expected Salary') }}
                                <dd>{{$data->expected_salary}}</dd>
                            </div>

                            <div class="form-group col-sm-2">
                                {{ Form::label('disability', ' Disabled?') }}
                                 <dd>{{$data->disability}}</dd>
                            </div>
                           
                             <div class="form-group col-sm-2">
                                {{ Form::label('disability', ' Is Convicted?') }}
                                <dd>{{$data->convicted}}</dd>
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('disability', ' Ever Dismissed?') }}
                                <dd>{{$data->dismissed}}</dd>
                            </div>
                            <div class="col-sm-12">
                              <hr>
                            </div>

                            @if(!empty($data->education))
                             <div class="form-group col-sm-6">
                                <hr>
                               <dt class="label label-success">Education Details</dt>
                          {{--   </div>

                              <div class="form-group col-sm-6">
                               {{ Form::label('disability', ' Education Details') }} --}}
                               
                                @foreach(explode(',', $data->education) as $edu)
                                <dd>{{$edu}}</dd><br>
                                @endforeach
                            </div>
                            @endif

                            @if(!empty($data->membership))
                             <div class="form-group col-sm-6">
                              <hr>
                               <dt class="label label-primary">Membership Details</dt>
                            {{-- </div>

                              <div class="form-group col-sm-6">
                               {{ Form::label('disability', ' Education Details') }} --}}
                        
                                @foreach(explode(',', $data->membership) as $membership)
                                <dd>{{$membership}}</dd><br>
                                @endforeach
                            </div>
                            @endif


                            @if(!empty($data->certificates))
                           <div class="form-group col-sm-6">
                            <hr>
                               <dt class="label label-warning">Certificate Details</dt>
                         {{--    </div>

                              <div class="form-group col-sm-6">
                               {{ Form::label('disability', ' Education Details') }} --}}
                               
                                @foreach(explode(',', $data->certificates) as $certificates)
                                <dd>{{$certificates}}</dd><br>
                                @endforeach
                            </div>
                            @endif


                             @if(!empty($data->employer))
                              <div class="form-group col-sm-6">
                                <hr>
                               <dt class="label label-success">Employer Details</dt>
                          {{--   </div>

                              <div class="form-group col-sm-6"> --}}
                        
                                @foreach(explode(',', $data->employer) as $employer)
                                <dd>{{$employer}}</dd><br>
                                @endforeach
                            </div>  
                            @endif

                             @if(!empty($data->other_training))

                              <div class="form-group col-sm-6">
                                 <hr>
                               <dt class="label label-info">Other Training/Skills Details</dt>
                     
                            
                                @foreach(explode(',', $data->other_training) as $other_training)
                                <dd>{{$other_training}}</dd><br>
                                @endforeach
                            </div>
                              @endif

                                @if(!empty($data->referees))
                              <div class="form-group col-sm-6">
                                     <hr>
                               <dt class="label label-primary">Referees Details</dt>
                          
                      
                                @foreach(explode(',', $data->referees) as $referees)
                                <dd>{{$referees}}</dd><br>
                                @endforeach
                            </div>    @endif

                         


                        </dl>
                        </div>
                      
                           
              </div>

              @endsection