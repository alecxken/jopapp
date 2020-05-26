  <div class="col-md-12">
            <div class="box box-success ">
               <div class="box-header with-border">
                   <h5 class="m-0">Education Details</h5>
              </div>
            
                 
               <div class="box-body ">
                    <div class="">

                      
                        <table class="table table-bordered table-hover order-list " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Education
                                </th>
                                <th class="text-center">
                                  Course
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
                            
                                <select required="" class="form-control" name="edu[]">
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
                                <input type="text" name='cert[]' placeholder='Certificate' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='institution[]' placeholder='Institution' class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name='year[]' min="1950" max="{{date('Y')}}"  placeholder='Year' class="form-control"/>
                                </td>
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrow" value="Add Education" />
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tfoot>
                          </table>
                    <script type="text/javascript">
                        $(document).ready(function () {
                        var counter = 2;

                        $("#addrow").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                            cols += '<td> <select required="" class="form-control" name="edu[]"><option>Choose Education</option><option>Doctorate</option><option>Masters</option><option>Post Graduate Diploma</option><option>Bachelors</option>  <option>Advanced/Higher Diploma</option><option>Diploma</option><option>Advanced Certificate</option><option>Certificate</option><option>A level</option><option>O Level</option></select></td>';
                            cols += '<td><input type="text" name="cert[]" placeholder="Certificate" class="form-control"/></td>';
                               cols += '<td><input type="text" class="form-control"  placeholder="Institution" name="institution[]"/></td>';
                                  cols += '<td><input type="number" min="1950" max="{{date('Y')}}" class="form-control"  placeholder="Year" name="year[]"/></td>';

                            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-list").append(newRow);
                            counter++;
                        });



                        $("table.order-list").on("click", ".ibtnDel", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });



                    function calculateRow(row) {
                        var price = +row.find('input[name^="price"]').val();

                    }

                    function calculateGrandTotal() {
                        var grandTotal = 0;
                        $("table.order-list").find('input[name^="price"]').each(function () {
                            grandTotal += +$(this).val();
                        });
                        $("#grandtotal").text(grandTotal.toFixed(2));
                    }
                    </script>
                    </div>
                </div>
              
              </div>
     {{--      </div> --}}