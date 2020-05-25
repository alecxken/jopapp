@extends('layouts.templates')
@section('content')


            <div class="box box-primary ">
              <div class="box-heading">
                <h3><center>STAGE III: EMPLOYMENT/EXPERIENCE DETAILS ({{$token}})</center></h3>
              </div>
              <div class="box-body ">
                   {!! Form::open(['method'=> 'post','url' => 'referee', 'files' => true ]) !!}
                   <input type="hidden" name="token" value="{{$token}}">
                         <div class="box-body">
                            @include('apps.employer')

                        </div>
                           <div class="box-body">
                            @include('apps.referees')

                        </div>
                         
                         
              </div>
                <div class="box-footer">
                    {{ Form::submit('Submit & Proceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
        
             
                    @endsection