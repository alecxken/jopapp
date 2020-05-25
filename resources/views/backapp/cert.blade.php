@extends('layouts.template')
@section('content')
<BR>
<h5><center>STEP II: EDUCATION DETAILS ({{$token}})</center></h5>
<br>

            <div class="box box-primary box-outline">
              <div class="box-header">
                <h5 class="m-0"></h5>
              </div>
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'employee', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">
                         <div>
                            @include('apps.education')

                        </div>
                          <div>
                          @include('apps.membership')
                        </div>
                        <div>
                          @include('apps.certificate')
                        </div>
                          <div>
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