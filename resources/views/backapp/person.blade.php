 <div class="col-md-12" width="100%">        

            <div class="box box-success ">
               <div class="box-header with-border">
                   <h5 class="m-0">Personal Information - {{$job_id}}</h5>
              </div>
              {!! Form::open(['method'=> 'post','url' => 'cert1', 'files' => true ]) !!}
               {{ Form::hidden('job_id', $job_id, array('class' => 'form-control input-sm','readonly')) }}
               {{ Form::hidden('token', $token, array('class' => 'form-control input-sm','readonly')) }}
              <div class="box-body ">
 
                        
           
                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Applicant Ref') }}
                                {{ Form::text('app_id', NULL, array('class' => 'form-control input-sm','placeholder'=>'E.G KURA/DE/23/1')) }}
                            </div>

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Title') }}
                                  <select class="form-control input-sm" name="title" required="">
                                 <option value="">Choose Title</option>
                                 <option>Mr</option>
                                 <option>Mrs</option>
                                 <option>Ms</option>
                                 <option>Miss</option>
                                 <option>Prof</option>
                                 <option>Eng.</option>
                                 <option>Dr.</option>
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
                                       {{-- {{ Form::label('email', 'Last Name') }} --}}
                                {{ Form::text('postal_code','', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('email', 'Phone No') }}
                                {{ Form::number('phone_no', '', array('class' => 'form-control input-sm')) }}
                            </div> 

                            <div class="form-group col-md-4">
                                {{ Form::label('name', 'Email Address') }}
                                @if(!empty($email))
                                {{ Form::email('email',null, array('class' => 'form-control input-sm','readonly')) }}
                                @else
                                {{ Form::email('email',null, array('class' => 'form-control input-sm')) }}
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
                                <select class="form-control input-sm select2" name="county" required="">
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
                                {{ Form::label('name', ' Ethnicity') }}
                                {{ Form::text('district', '', array('class' => 'form-control input-sm')) }}
                            </div>

                             <div class="form-group col-md-4">
                                {{ Form::label('disability', ' Current Salary') }}
                                {{ Form::number('current_salary', '', array('class' => 'form-control input-sm')) }}
                            </div>
                            <div class="form-group col-md-12">
                                
                            </div>

                            <div class="">
                                   <div class="form-group col-md-4">
                                {{ Form::label('disability', ' Expected Salary') }}
                                {{ Form::number('expected_salary', '', array('class' => 'form-control input-sm')) }}
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

                            </div>
                          
                           

                             <div class="form-group col-md-12">
                                {{ Form::label('email', 'Have You every been convicted of any criminal offence or a subject of probation?') }}
                               <select class="form-control input-sm" id="is_convicted"  name="is_convicted" required="" onclick="convicted()">
                                 <option value="">Choose option</option>
                                 <option>No</option>
                                 <option>Yes</option>
                               </select>
                            </div>

                              <div class="form-group col-md-12" id="offence" style="display: block;">
                                {{ Form::label('disability', 'If Yes State Nature of Offence, the year and duration of offence') }}
                                {{ Form::text('conviction', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            <div class="form-group col-md-12">
                                {{ Form::label('disability', ' Have you Ever been Dismissed or otherwise removed from Employment?') }}
                                <select class="form-control input-sm"  id="is_dismissed" name="is_dismissed" required="" onclick="dismissed()">
                                 <option value="">Choose option</option>
                                 <option>No</option>
                                 <option>Yes</option>
                               </select>
                            </div>

                               <div class="form-group col-md-12" id="dismissed" style="display: block;">
                                {{ Form::label('disability', 'If Yes State State reason (s) for dismissal/removal and effective date (dd/mm/yyyy)') }}
                                {{ Form::text('dismissed', '', array('class' => 'form-control input-sm')) }}
                            </div>

                            
         


                          

                       

   </div> 
                <div class="box-footer">
                    
                    {{ Form::submit('Procceed', array('class' => 'btn btn-success pull-right')) }}
                </div>
                            

             

          {{ Form::close() }}
              </div>
          </div>
          <script type="text/javascript">
    function convicted() {
        var x = document.getElementById("is_convicted").value;
        var mydiv = document.getElementById('convicted');

        if ( x = "Yes") 
        {
            mydiv.style.display = "block";
        }
         else
        {
            mydiv.style.display = "none";
        }

      }

         function dismissed() {
        var x = document.getElementById("is_dismissed").value;
        var mydiv = document.getElementById('dismissed');

        if ( x = "Yes") 
        {
            mydiv.style.display = "block";
        }
         else
        {
            mydiv.style.display = "none";
        }

      }
</script>
                   