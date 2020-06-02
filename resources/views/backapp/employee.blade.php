@extends('layouts.template')
@section('content')


            <div class="box box-primary ">
              <div class="box-heading">
                <h3><center>STAGE III: EMPLOYMENT/EXPERIENCE DETAILS ({{$token}})</center></h3>
              </div>
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'referee1', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">
                         <div class="box-body">
                            @include('backapp.employer')

                        
                            @include('backapp.referees')

                            @include('backapp.checklist')
                            <hr>
                            <div class="form-group ">
                                {{ Form::label('email', 'Application Document Signed') }}
                               <select class="form-control input-sm" name="signed" required="">
                                 <option value="">Choose option</option>
                                 <option>No</option>
                                 <option>Yes</option>
                               </select>
                            </div>
                        </div>
                         
                         
              </div>
                <div class="box-footer">
                    {{ Form::submit('Click To Complete Submission', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
        
             
                    @endsection