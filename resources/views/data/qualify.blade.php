  <div class="col-lg-12">
            <div class="card card-success card-outline">
         
                  {{ Form::open(array('url' => '')) }}
               <div class="card-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Qualification
                                </th>
                                <th class="text-center">
                                  Sample
                                </th>
                                 <th class="text-center">
                                  A must ?
                                </th>
                                 <th class="text-center">
                                 Field
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                                <td>
                                  <input type="text" name='education' value="Education" readonly="" class="form-control"/>
                                </td>
                                <td>
                            
                                <select required="" class="form-control select2" name="edu[]" multiple="">
                                  <option>Choose Education</option>
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
                                <select name="state" required=""  class="form-control">
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                                </td>
                                 <td>
                                <input type="text" name='institution[]' placeholder='course1,course2,...' class="form-control"/>
                                </td>
                                 
                               
                              </tr>

                               <tr id='t0'>
                                <td>
                                2
                                </td>
                                <td>
                                  <input type="text" name='membership' value="Membership" readonly="" class="form-control"/>
                                </td>
                                <td>
                            
                              <input type="text" name='memb_required[]' placeholder='member body1,member body2,...' class="form-control"/>
                                </td>
                                <td>
                                <select name="state" required="" class="form-control" >
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                                </td>
                                 <td>
                                <input type="text" name='memb_samples[]' placeholder='name1,name2,...' class="form-control"/>
                                </td>
                                 
                               
                              </tr>
                                 <tr id='t0'>
                                <td>
                                3
                                </td>
                                <td>
                                  <input type="text" name='certificate' value="Certificate" readonly="" class="form-control"/>
                                </td>
                                <td>
                            
                              <input type="text" name='memb_required[]' placeholder='body1 (ccna),body2 (cca),...' class="form-control"/>
                                </td>
                                <td>
                                <select name="state" required=""  class="form-control">
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                                </td>
                                 <td>
                                <input type="text" name='memb_samples[]' placeholder='course1,course2,...' class="form-control"/>
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