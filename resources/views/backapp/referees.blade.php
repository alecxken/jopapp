

          <div class="col-md-12" width="100%">        

            <div class="box box-primary box-outline">
              <div class="box-header">
                <h5 class="m-0">Applicant Referee</h5><br>
              </div>
              <div class="box-body ">


  
                    <div class="">

                      
                       <table class="table table-bordered table-hover order-listref " id="">
                            <thead class="bg-success small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Name
                                </th>
                                 <th class="text-center">
                                  Company
                                </th>
                                 <th class="text-center">
                                  Position
                                </th>
                                <th class="text-center">
                                  Email
                                </th>
                                 <th class="text-center">
                                  Phone
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                           
                                <td>
                                <input type="text" name="ref_name[]" placeholder="Customer Name" class="form-control"/>
                                </td>
                                  <td>
                                <input type="text" name="ref_company[]" placeholder="Company" class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name="ref_position[]" placeholder="Position" class="form-control"/>
                                </td>
                                 <td>
                              <input type="email" name="ref_email[]" placeholder="Email" class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name="ref_phone[]" placeholder="Phone" class="form-control"/>
                                </td>
                               
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrowref" value="Add Referee " />
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tfoot>
                          </table>

                          </div>
                        </div>
                       
                          
             
                
              </div>
          </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                        var counter = 2;

                        $("#addrowref").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                         
                            cols += '<td><input type="text" name="ref_name[]" placeholder="Customer Name" class="form-control"/></td>';
                            cols += '<td><input type="text" name="ref_company[]" placeholder="Company" class="form-control"/></td>';
                            cols += '<td><input type="text" name="ref_position[]" placeholder="Position" class="form-control"/></td>';
                             cols += '<td><input type="email" name="ref_email[]" placeholder="Email" class="form-control"/></td>';
                              cols += '<td><input type="number" name="ref_phone[]" placeholder="Phone" class="form-control"/></td>';

                            cols += '<td><input type="button" class="ibtnDelref btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-listref").append(newRow);
                            counter++;
                        });



                        $("table.order-listref").on("click", ".ibtnDelref", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });



                  
                    </script>
                 