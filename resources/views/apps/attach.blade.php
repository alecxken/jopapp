@extends('layouts.templates')
@section('content')
<BR>
<H1><center>Final Step : ATTACHMENT SECTION ({{$token}})</center></H1>
<br>
  <div class="col-lg-16">
   
            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0">Attachments {{$token}} </h5>
              </div>
          {!! Form::open(['method'=> 'post','url' => 'attachment', 'files' => true ]) !!}
          <input type="hidden" name="token" value="{{$token}}">
               <div class="card-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list3 " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Description
                                </th>
                                <th class="text-center">
                                  File
                                </th>
                                                             
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                                <td>                           
                                	Curriculum Vitae
                                </td>
                                <td>
                                <input type="file" name='cv' placeholder='Position' class="form-control"/>
                                </td>
                              </tr>

                                <tr id='t1'>
                                <td>
                                2
                                </td>
                                <td>                            
                                	Education Certificates
                                </td>
                                <td>
                                <input type="file" name='files[]' multiple="" placeholder='Position' class="form-control"/>
                                </td>
                              </tr>

                            </tbody>
                       
                          </table>
                   
                    </div>

                </div>
                 <div class="card-footer">
                  <br>
                    {{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }}
               
              </div>
          </div>
      @endsection