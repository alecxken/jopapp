@extends('layouts.template')
@section('content')


            <div class="box box-primary ">
              <div class="box-heading">
                <h3><center> Criteria Center</center></h3>
              </div>
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'searchapplicant', 'files' => true ]) !!}
          
                         <div class="box-body">
                         
                          
                            <div class="form-group  col-sm-3">
                             {{ Form::label('email', 'Applicant Reference') }}
                               {{ Form::text('app_ref', '', array('class' => 'form-control input-sm')) }}
                            </div>
                             <div class="form-group  col-sm-3">
                             {{ Form::label('email', 'Job Ref') }}
                               {{ Form::text('app_ref', '', array('class' => 'form-control input-sm')) }}
                            </div>
                             <div class="form-group  col-sm-3">
                             {{ Form::label('email', 'Keyword') }}
                               {{ Form::text('app_ref', '', array('class' => 'form-control input-sm')) }}
                            </div>

                              <div class="form-group col-sm-3 ">
                                {{ Form::label('email', 'action') }}
                              {{ Form::submit('Click To Complete Submission', array('class' => ' form-control btn btn-success ')) }}
                            </div>
                        </div>
                         
                         {{ Form::close() }}
              </div>
            </div>

     @if(!empty($datas))
                  @foreach($datas as $data)
              <div class="box box-success ">
              <div class="box-heading">
                <h3><center> APPLICANT {{$data->token}}</center></h3>
              </div>

              <div class="box-body ">

               
                         <dl>
               
                             <div class="form-group col-sm-2">
                                     
                               <dt>Applicant Ref</dt>
                                <dd>{{$data->token}}</dd>
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
                                <dd>{{$data->is_convicted}}</dd>
                            </div>

                             <div class="form-group col-sm-2">
                                {{ Form::label('disability', ' Ever Dismissed?') }}
                                <dd>{{$data->is_dismissed}}</dd>
                            </div>

                             <div class="form-group col-sm-12">
                               <LABEL class="label label-success">Education Details</LABEL>
                            </div>

                              <div class="form-group col-sm-12">
                               {{ Form::label('disability', ' Education Details') }}
                                @foreach(explode(',', $data->education) as $edu)
                                <dd>{{$edu}}</dd><br>
                                @endforeach
                            </div>

                         


                        </dl>
                        </div>
                      
                           
              </div>
                @endforeach
                      @endif

               
              
        
             
                    @endsection