  <div class="col-lg-12">
            <div class="card card-success card-outline">
         
                  {{ Form::open(array('url' => '')) }}
               <div class="card-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list " id="">
                            <thead class="bg-primary small">
                              <tr >
                               <th class="text-center">
                                  Qualification
                                </th>
                                <th class="text-center">
                                  Required
                                </th>
                                 <th class="text-center">
                                  Field/Body/Category
                                </th>
                                 <th class="text-center">
                                 Sample
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>


                           

                               <tr id='t1'>
                                <td>
                                  <input type="text" name='cert' value="Certificate" readonly="" class="form-control"/>
                                </td>
                                 
                                   <td>
                                <select name="cert_state" required="" class="form-control" >
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                                </td>
                                <td>                           
                                <input type="text" name='cert_body' placeholder='member body1,member body2,...' class="form-control"/>
                                </td>
                             
                                 <td>
                                <input type="text" name='cert_samples' placeholder='cert1,cert2,...' class="form-control"/>
                                </td> 
                              </tr>

                                 <tr id='t1'>
                                <td>
                                  <input type="text" name='membership' value="Membership" readonly="" class="form-control"/>
                                </td>
                                 <td>
                                <select name="memb_state" required="" class="form-control" >
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                                </td>
                                <td>                            
                                <input type="text" name='memb_body' placeholder='member body1,member body2,...' class="form-control"/>
                                </td>
                               
                                 <td>
                                <input type="text" name='memb_samples' placeholder='cert1,cert2,...' class="form-control"/>
                                </td> 
                              </tr>
                                   <tr id='t0'>                             
                                <td>
                                  <input type="text" name='education' value="Education" readonly="" class="form-control"/>
                                </td>
                                 <td>
                                    <select name="state_edu" required=""  class="form-control">
                                      <option value="">Choose</option>
                                      <option>Yes</option>
                                      <option>No</option>
                                    </select>
                                </td>
                                <td>                            
                                    <select required="" class="form-control select2" name="edu_field[]" multiple="" placeholder ="Choose Required">
                                        <option value="">Choose Education</option>
                                          <option>Doctorate</option>
                                          <option>Masters</option>
                                          <option>Post Graduate Diploma</option>
                                          <option>Bachelors</option>
                                          <option>Advanced/Higher Diploma</option>
                                          <option>Diploma</option>
                                          <option>Advanced Certificate</option>
                                          <option>Certificate</option>
                                          <option>A level</option>
                                          <option>O Level</option>
                                   </select>
                                </td>
                               
                                 <td>
                                <input type="text" name='sample_edu' placeholder='course1,course2,...' class="form-control"/>
                                </td>
                                 
                               
                              </tr>
                                
                            </tbody>
                       
                          </table>
                 
                    </div>
                </div>
               {{--  <div class="card-footer">
                    {{ Form::submit('Submit For Approval', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }} --}}
              </div>
          </div>