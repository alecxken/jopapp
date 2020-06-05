@extends('layouts.template')
@section('content')


            <div class="box box-primary ">
              <div class="box-heading">
                <h3><center> APPLICANTS</center></h3>
              </div>
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'searchapplicant', 'files' => true ]) !!}
          
                         <div class="box-body">
                         
                          
                            <div class="form-group ">
                             {{ Form::label('email', 'Application Document Signed') }}
                              {{ Form::text('app_ref',) }}
                            </div>

                              <div class="form-group ">
                                {{ Form::label('email', 'action') }}
                              {{ Form::submit('Click To Complete Submission', array('class' => 'btn btn-success pull-right')) }}
                            </div>
                        </div>
                         
                         {{ Form::close() }}
              </div>

              <div class="box-body ">

                @if(!empty($datas))
                  @foreach($datas as $data)
                         <dl>
               
                             <div class="form-group col-md-4">
                                     
                               <dt> {{ Form::label('email', 'Applicant Ref') }}</dt>
                                <dd><label>{{$data->token}}</label></dd>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Title') }}
                                <label>{{$data->title}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'First Name') }}
                                <label>{{$data->fname}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Last Name') }}
                               <label>{{$data->lname}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Other Names') }}
                              <label>{{$data->oname}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'P.O Box') }}
                                <label>{{$data->po_box}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Town') }}
                               <label>{{$data->postal_code}}</label>
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Phone No') }}
                               <label>{{$data->phone_no}}</label>
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Email Address') }}
                               <label>{{$data->email}}</label>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'DOB') }}
                                <label>{{$data->dob}}</label>
                            </div>
                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Gender') }}
                              <label>{{$data->gender}}</label>
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'ID/Passport ') }}
                               <label>{{$data->passport}}</label>
                            </div>

                              <div class="form-group col-md-4">
                                {{ Form::label('email', 'County') }}
                               <label>{{$data->county}}</label>                               
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' Home District') }}
                               <label>{{$data->district}}</label>
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('disability', ' Current Salary') }}
                                 <label>{{$data->current_salary}}</label>
                            </div>
                           

                            <div class="">
                                   <div class="form-group col-md-4">
                                {{ Form::label('disability', ' Expected Salary') }}
                                <label>{{$data->expected_salary}}</label>
                            </div>
                          </div>
                        </dl>
                      </div>
                            @endforeach
                      @endif
              </div>
               
                      
              </div>
        
             
                    @endsection