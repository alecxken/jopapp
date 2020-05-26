  <div class="col-md-12">
            <div class="box box-success box-outline">
            
                <div class="box-header with-border">
                       <h5 class="m-0">EMPLOYMENT RECORDS</h5>
              </div>
        
               <div class="box-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list3 " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Employer
                                </th>
                                <th class="text-center">
                                  Position
                                </th>
                                 <th class="text-center">
                                  From
                                </th>
                                 <th class="text-center">
                                  To
                                </th>
                                 <th class="text-center">
                                  Contact Person
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                                <td>
                            
                                <input type="text" name='employer[]' placeholder='Employer' class="form-control"/>
                                </td>
                                <td>
                                <input type="text" name='position[]' placeholder='Position' class="form-control"/>
                                </td>
                                 <td>
                                <input type="date" name='from[]' placeholder='From' class="form-control"/>
                                </td>
                                <td>
                                <input type="date" name='to[]' placeholder='To' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='contact_person[]' placeholder='Contact person' class="form-control"/>
                                </td>
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrow3" value="Add Employer" />
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tfoot>
                          </table>
                    <script type="text/javascript">
                        $(document).ready(function () {
                        var counter = 2;

                        $("#addrow3").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                    cols += '<td> <input type="text" name="employer[]" placeholder="Employer" class="form-control"/></td>';
                    cols += '<td><input type="text" name="position[]" placeholder="Position" class="form-control"/></td>';
                    cols += '<td><input type="date" class="form-control"   name="from[]"/></td>';
                    cols += '<td><input type="date" class="form-control"  name="to[]"/></td>';
                    cols += '<td><input type="text" class="form-control" placeholder="Contact Person" name="contact_person[]"/></td>';

                            cols += '<td><input type="button" class="ibtnDel3 btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-list3").append(newRow);
                            counter++;
                        });



                        $("table.order-list3").on("click", ".ibtnDel3", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });



                    function calculateRow(row) {
                        var price = +row.find('input[name^="price"]').val();

                    }

                    function calculateGrandTotal() {
                        var grandTotal = 0;
                        $("table.order-list3").find('input[name^="price"]').each(function () {
                            grandTotal += +$(this).val();
                        });
                        $("#grandtotal").text(grandTotal.toFixed(2));
                    }
                    </script>
                    </div>
                </div>
               
              </div>
          </div>