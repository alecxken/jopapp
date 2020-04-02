@extends('layouts.templates')
@section('content')
<BR>
<H1><center>JOB APPLICATION : EMPLOYMENT/EXPERIENCE DETAILS</center></H1>
<br>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"></h5>
              </div>
              <div class="card-body ">
                   {!! Form::open(['method'=> 'post','url' => 'attach', 'files' => true ]) !!}
                         <div>
                            @include('apps.employer')

                        </div>
                           <div>
                            @include('apps.referees')

                        </div>
                         
                         
              </div>
                <div class="card-footer">
                    {{ Form::submit('Submit & Proceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
              </div>
        
             
                    @endsection