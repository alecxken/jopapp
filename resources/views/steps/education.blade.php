@extends('layouts.template')
@section('content')


            <div class="box box-primary box-outline">
          
                  <div class="box-header with-border bg-info">
                   <h5><center>STEP II: EDUCATION DETAILS ({{$token}})    <a href="{{url('jobs-apps-steps/'.$token)}}" class="badge badge-warning {{ (request()->is('steponeuser')) ? 'active' : '' }}"> Click To Go Back to Personal Info</a></center> </h5>
                               
              </div>
            
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'update-user-cert', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">

                         <div class="box-body">
                          @include('steps.edu')


                          @include('steps.membership')
                     
                          @include('steps.certificate')
                      
                          @include('steps.other')


                        
                     
                          
                        </div>
              </div>
                <div class="box-footer">
                    {{ Form::submit('Submit & Proceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
          </div>
             
                    @endsection