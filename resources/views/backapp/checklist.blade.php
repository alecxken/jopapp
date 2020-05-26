

          <div class="col-md-12" width="100%">        

            <div class="box box-primary box-outline">
              <div class="box-header with-border">
                    <h5 class="m-0">CHECKLIST</h5>
              </div>
             
              <div class="box-body ">


  
                    <div class="">

                      
                       <table class="table table-bordered table-hover order-listON " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  Requirement Condition
                                </th>
                                <th class="text-center">
                                  Fullfilled ?
                                </th>
                                 <th class="text-center">
                                  Comment
                                </th>
                            
                               
                              </tr>
                            </thead>
                            <tbody>
                            
                             
                            
                              @foreach($req as $item)
                               <tr>
                                <input type="hidden" name="job_ref[]" value="{{$item->ref_token}}">
                                <td class="bg-info"><input type="hidden" name="checklist[]" value="{{$item->requirement}}">{{$item->requirement}}</td>
                                <td >
                                <select required="" name="passed[]">
                                  <option value="">Choose</option>
                                  <option>Yes</option>
                                  <option>No</option>
                                </select>
                              </td>
                                <td ><input type="text" name="comments[]"></td>


                              </tr>
                              @endforeach
                            
                            </tbody>
                          </table>

                          </div>
                        </div>
                      </div>
                    </div>

                       
                          

                  
                 