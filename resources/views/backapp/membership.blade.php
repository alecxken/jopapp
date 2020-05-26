  <div class="col-md-12">
            <div class="box box-success box-outline">
            
                <div class="box-header with-border">
                    <h5 class="m-0">PROFFESSIONAL MEMBERSHIP</h5>
              </div>
              
               <div class="box-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list2 " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Membership Name
                                </th>
                                 <th class="text-center">
                                  Registration Body
                                </th>
                                 <th class="text-center">
                                 Membership No
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr id='t0'>
                                <td>
                                1
                                </td>
                           
                                <td>
                                <input type="text" name='member[]' placeholder='Membership Name' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='body[]' placeholder='Membership Body' class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name='membno[]' placeholder='Membership No' class="form-control"/>
                                </td>
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrow2" value="Add Membership" />
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tfoot>
                          </table>
                    <script type="text/javascript">
                        $(document).ready(function () {
                        var counter = 2;

                        $("#addrow2").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                         
                            cols += '<td><input type="text" name="member[]" placeholder="Membership Name" class="form-control"/></td>';
                               cols += '<td><input type="text" class="form-control"  placeholder="Membership Body" name="body[]"/></td>';
                                  cols += '<td><input type="number" class="form-control"  placeholder="Membership No" name="membno[]"/></td>';

                            // cols += '<td><input type="button" class="ibtnDel2 btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-list2").append(newRow);
                            counter++;
                        });



                        $("table.order-list2").on("click", ".ibtnDel2", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });



                    function calculateRow(row) {
                        var price = +row.find('input[name^="price"]').val();

                    }

                    function calculateGrandTotal() {
                        var grandTotal = 0;
                        $("table.order-list2").find('input[name^="price"]').each(function () {
                            grandTotal += +$(this).val();
                        });
                        $("#grandtotal").text(grandTotal.toFixed(2));
                    }
                    </script>
                    </div>
                </div>
               
              </div>
          </div>