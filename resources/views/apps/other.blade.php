  <div class="col-lg-16">
            <div class="card card-success card-outline">
              <div class="card-header">
                <h5 class="m-0">Other Training</h5>
              </div>
               
               <div class="card-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list4 " id="">
                            <thead class="bg-primary small">
                              <tr >
                                <th class="text-center">
                                  #
                                </th>
                                <th class="text-center">
                                  Training
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
                            
                                <input type="text" name='training[]' placeholder='Training' class="form-control"/>
                                </td>
                                <td>
                                <input type="text" name='cert2[]' placeholder='Certificate' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='institution2[]' placeholder='Institution' class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name='year2[]' placeholder='Year' class="form-control"/>
                                </td>
                               
                              </tr>

                            </tbody>
                              <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: left;">
                                    <input type="button" class="btn btn-sm btn-block " id="addrow4" value="Add Other Training" />
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tfoot>
                          </table>
                    <script type="text/javascript">
                        $(document).ready(function () {
                        var counter = 2;

                        $("#addrow4").on("click", function () {
                            var newRow = $("<tr id='t"+ counter +"'>");
                            var cols = "";

                            cols += '<td>'+ counter +'</td>';
                            cols += '<td> <input type="text" name="training[]" placeholder="Training" class="form-control"/></td>';
                            cols += '<td><input type="text" name="cert[]" placeholder="Certificate" class="form-control"/></td>';
                               cols += '<td><input type="text" class="form-control"  placeholder="Director Post" name="post[]"/></td>';
                                  cols += '<td><input type="text" class="form-control"  placeholder="Director Post" name="post[]"/></td>';

                            // cols += '<td><input type="button" class="ibtnDel4 btn btn-md btn-danger "  value="Delete"></td>';
                            newRow.append(cols);
                            $("table.order-list4").append(newRow);
                            counter++;
                        });



                        $("table.order-list4").on("click", ".ibtnDel4", function (event) {
                            $(this).closest("tr").remove();       
                            counter -= 1
                        });


                    });


                    </script>
                    </div>
                </div>
             {{--    <div class="card-footer">
                    {{ Form::submit('Submit For Approval', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }} --}}
              </div>
          </div>