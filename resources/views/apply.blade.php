@extends('layouts.templates')



@section('content')
<BR>
<H1><center>JOB APPLICATION FORM</center></H1>
<br>

          <div class="col-md-16" width="100%">        

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Personal Information</h5>
              </div>
              <div class="card-body ">
                   {!! Form::open(['method'=> 'post','url' => 'cert', 'files' => true ]) !!}

                    <div class="row">
                        
                          

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Title') }}
                <select class="form-control input-sm" name="ccy" required="">
                                 <option value="">Choose Title</option>
                                 <option>Mr</option>
                                 <option>Mrs</option>
                                 <option>Miss</option>
                               </select>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'First Name') }}
                                {{ Form::text('client_name', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Last Name') }}
                                {{ Form::text('inst_date', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Other Names') }}
                                {{ Form::text('desc', '', array('class' => 'form-control input-sm ')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'P.O Box') }}
                                {{ Form::text('ben_name', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Town') }}
                                {{ Form::text('ben_id', 'Postal Code', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Phone No') }}
                                {{ Form::number('ben_phone', '', array('class' => 'form-control input-sm')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Email Address') }}
                                {{ Form::email('loc_delivery', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'DOB') }}
                                {{ Form::date('loc_delivery', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Gender') }}
                               <select class="form-control input-sm" name="ccy" required="">
                                 <option value="">Choose Gender</option>
                                 <option>Male</option>
                                 <option>Female</option>
                               </select>
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'ID/Passport ') }}
                                {{ Form::text('passport', '', array('class' => 'form-control input-sm')) }}
                            </div>

                              <div class="form-group col-md-4">
                                {{ Form::label('email', 'County') }}
                                {{ Form::date('delivery_date', '', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' Home District') }}
                                {{ Form::text('rate', '', array('class' => 'form-control input-sm')) }}
                            </div>


                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Any Disability') }}
                               <select class="form-control input-sm" name="ccy" required="">
                                 <option value="">Choose option</option>
                                 <option>No</option>
                                 <option>Yes</option>
                               </select>
                            </div>

                            <div class="form-group col-md-6">
                                {{ Form::label('name', ' Description Of Disability') }}
                                {{ Form::text('rate', '', array('class' => 'form-control input-sm')) }}
                            </div>

                          

                       


                    </div>
                            

                </div>
                <div class="card-footer">
                    {{ Form::submit('Submit & Procceed', array('class' => 'btn btn-success pull-right')) }}


                </div>
                                            {{ Form::close() }}
              </div>
          </div>
   {{--      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <div class="row">
                   @include('apps.education')
                </div>
        
                <div class="row">
                   @include('apps.cert')
                </div>
        
                <div class="row">
                   @include('apps.membership')
                </div>
       
                <div class="row">
                   @include('apps.other')
                </div>
        
                <div class="row">
                   @include('apps.employee')
                </div>
     
                <div class="row">
                   @include('apps.referees')
                </div>
       
                <div class="row">
                   @include('apps.attach')
                </div>
        </table> --}}


      

@endsection


