 <div class="col-md-16" width="100%">        

            <div class="panel panel-success p">
              <div class="panel-heading">
                <h5 class="m-0">Personal Information</h5>
              </div>
              {!! Form::open(['method'=> 'post','url' => 'cert', 'files' => true ]) !!}
              <div class="panel-body ">
                   
{{-- 
                    <div class="row"> --}}
                        
                          
                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Job Ref') }}
                                {{ Form::text('token', $token, array('class' => 'form-control input-sm','readonly')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Title') }}
                                  <select class="form-control input-sm" name="title" required="">
                                 <option value="">Choose Title</option>
                                 <option>Mr</option>
                                 <option>Mrs</option>
                                 <option>Miss</option>
                               </select>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'First Name') }}
                                {{ Form::text('fname', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Last Name') }}
                                {{ Form::text('lname', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Other Names') }}
                                {{ Form::text('oname', '', array('class' => 'form-control input-sm ')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'P.O Box') }}
                                {{ Form::text('po_box', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Town') }}
                                {{ Form::text('postal_code', null, array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Phone No') }}
                                {{ Form::number('phone_no', '', array('class' => 'form-control input-sm')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Email Address') }}
                                @if(!empty($email))
                                {{ Form::email('email',$email, array('class' => 'form-control input-sm','readonly')) }}
                                @else
                                {{ Form::email('email',null, array('class' => 'form-control input-sm','readonly')) }}
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'DOB') }}
                                {{ Form::date('dob', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            

                            <div class="form-group col-md-4">
                                {{ Form::label('email', 'Gender') }}
                               <select class="form-control input-sm" name="gender" required="">
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
                                <select class="form-control" name="county" required="">
                                    <option value="">Choose Your County</option>
                                    <option>Mombasa</option>
                                    <option>Kwale</option>
                                    <option>Kilifi</option>
                                    <option>Tana River</option>
                                    <option>Lamu</option>
                                    <option>Taita–Taveta</option>
                                    <option>Garissa</option>
                                    <option>Wajir</option>
                                    <option>Mandera</option>
                                    <option>Marsabit</option>
                                    <option>Isiolo</option>
                                    <option>Meru</option>
                                    <option>Tharaka-Nithi</option>
                                    <option>Embu</option>
                                    <option>Kitui</option>
                                    <option>Machakos</option>
                                    <option>Makueni</option>
                                    <option>Nyandarua</option>
                                    <option>Nyeri</option>
                                    <option>Kirinyaga</option>
                                    <option>Murang'a</option>
                                    <option>Kiambu</option>
                                    <option>Turkana</option>
                                    <option>West Pokot</option>
                                    <option>Samburu</option>
                                    <option>Trans-Nzoia</option>
                                    <option>Uasin Gishu</option>
                                    <option>Elgeyo-Marakwet</option>
                                    <option>Nandi</option>
                                    <option>Baringo</option>
                                    <option>Laikipia</option>
                                    <option>Nakuru</option>
                                    <option>Narok</option>
                                    <option>Kajiado</option>
                                    <option>Kericho</option>
                                    <option>Bomet</option>
                                    <option>Kakamega</option>
                                    <option>Vihiga</option>
                                    <option>Bungoma</option>
                                    <option>Busia</option>
                                    <option>Siaya</option>
                                    <option>Kisumu</option>
                                    <option>Homa Bay</option>
                                    <option>Migori</option>
                                    <option>Kisii</option>
                                    <option>Nyamira</option>
                                    <option>Nairobi</option>



                                </select>
                               
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('name', ' Home District') }}
                                {{ Form::text('district', '', array('class' => 'form-control input-sm')) }}
                            </div>


                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Any Disability') }}
                               <select class="form-control input-sm" name="is_disabled" required="">
                                 <option value="">Choose option</option>
                                 <option>No</option>
                                 <option>Yes</option>
                               </select>
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('disability', ' Description Of Disability') }}
                                {{ Form::text('disability', '', array('class' => 'form-control input-sm')) }}
                            </div>

                          

                       


                <div class="panel-footer">
                    
                    {{ Form::submit('Submit & Procceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                            

                </div>

          {{ Form::close() }}
              </div>
          </div>