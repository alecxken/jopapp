

          <div class="col-md-12" width="100%">        

            <div class="box box-primary box-outline">
              <div class="box-header with-border">
                    <h5 class="m-0">PROFESSIONAL CERTIFICATION</h5>
              </div>
             
              <div class="box-body ">


  
                    <div class="">

                      
                       <table class="table table-bordered table-hover order-listON " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Certificate
                                </th>
                                 <th class="text-center">
                                  Institution
                                </th>
                                 <th class="text-center">
                                  Comp Yr
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                           
                                <td>
                                <input type="text" name='cert1[]' placeholder='Certificate' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='institution1[]' placeholder='Institution' class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name='year1[]' placeholder='Year' class="form-control"/>
                                </td>
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrowON" value="Add Professional Certs" />
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

                        $("#addrowON").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                         
                            cols += '<td><input type="text" name="cert1[]" placeholder="Certificate" class="form-control"/></td>';
                               cols += '<td><input type="text" class="form-control"  placeholder="Institution " name="institution1[]"/></td>';
                                  cols += '<td><input type="text" class="form-control"  placeholder="Year" name="year1[]"/></td>';

                            cols += '<td><input type="button" class="ibtnDelON btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-listON").append(newRow);
                            counter++;
                        });



                        $("table.order-listON").on("click", ".ibtnDelON", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });



                  
                    </script>
                 