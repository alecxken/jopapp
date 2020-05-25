@extends('layouts.template')
@section('content')


            <div class="box box-primary box-outline">
          
                  <div class="box-header with-border">
                   <h5><center>STEP II: EDUCATION DETAILS ({{$token}})</center></h5>
              </div>
            
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'employee', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">
                         <div class="box-body">
                            @include('apps.education')

                        </div>
                          <div class="box-body">
                          @include('apps.membership')
                        </div>
                        <div class="box-body">
                          @include('apps.certificate')
                        </div>
                          <div class="box-body">
                          @include('apps.other')
                        </div>
              </div>
                <div class="box-footer">
                    {{ Form::submit('Submit & Proceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
          </div>
             
                    @endsection