@extends('layouts.template')
@section('content')


            <div class="box box-primary box-outline">
          
                  <div class="box-header with-border bg-info">
                   <h5><center>STEP II: EDUCATION DETAILS ({{$token}})</center></h5>
                     <center>
                      <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{url('jobs-apps-steps/'.$token)}}" class="btn btn-info  btn-xs {{ (request()->is('steponeuser')) ? 'active' : '' }}"> Go Back One Step</a>
                                              
                      </div>
                   </center>            
              </div>
            
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'employee1', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">

                         <div class="box-body">
                          @include('backapp.education')

                        
                          @include('backapp.membership')
                     
                          @include('backapp.certificate')
                      
                          @include('backapp.other')

                          
                        </div>
              </div>
                <div class="box-footer">
                    {{ Form::submit('Submit & Proceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
          </div>
             
                    @endsection