

          <div class="col-md-16" width="100%">        

            <div class="card card-primary card-outline">
            
              <div class="card-body ">


  
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
                                                               
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                           
                                <td>
                                <input type="text" name="name[]" placeholder="Requirement Name" class="form-control"/>
                                </td>
                                
                               
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrowref" value="Add Requirement " />
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

                            cols += '<td><input type="text" name="name[]" placeholder="Requirement Name" class="form-control"/></td>';


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
                 