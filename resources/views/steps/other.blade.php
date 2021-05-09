  <div class="col-md-12">
            <div class="box box-success box-outline">
              <div class="box-header">
                <h5 class="m-0">Other Training</h5>
              </div>
               
               <div class="box-body ">
                    <div class="row">

                      
                        <table class="table table-bordered table-hover order-list4 " id="">
                            <thead class="bg-primary small">
                              <tr >
                         <!--        <th class="text-center">
                                  #
                                </th> -->
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
                            	       @if(!empty($others))

                              @foreach($others as $other)
                              <tr id='t0'>
                              <!--   <td>
                                1
                                </td> -->
                                  <td>
                            
                                <input type="text" name='training[]' value="{{$other->training}}" placeholder='Training' class="form-control"/>
                                </td>
                                <td>
                                <input type="text" name='cert2[]' value="{{$other->cert2}}" placeholder='Certificate' class="form-control"/>
                                </td>
                                 <td>
                                <input type="text" name='institution2[]' value="{{$other->institution2}}" placeholder='Institution' class="form-control"/>
                                </td>
                                 <td>
                                <input type="number" name='year2[]' value="{{$other->year2}}" placeholder='Year' class="form-control"/>
                                </td>
                                   <td><a href="{{url('drop-others/'.$other->id)}}" class="badge bg-danger">Drop </a></td>
                               
                               
                              </tr>
                              @endforeach
                              @else
                               <tr id='t0'>
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
                              @endif



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

                            // cols += '<td>'+ counter +'</td>';
                            cols += '<td> <input type="text" name="training[]" placeholder="Training" class="form-control"/></td>';
                            cols += '<td><input type="text" name="cert2[]" placeholder="Certificate" class="form-control"/></td>';
                               cols += '<td><input type="text" class="form-control"  placeholder=" Institution" name="institution2[]"/></td>';
                                  cols += '<td><input type="number" class="form-control"  placeholder="Year" name="year2[]"/></td>';

                            cols += '<td><input type="button" class="ibtnDel4 btn btn-md btn-danger "  value="Delete"></td>';
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
             {{--    <div class="box-footer">
                    {{ Form::submit('Submit For Approval', array('class' => 'btn btn-success pull-right')) }}
                </div>
                      {{ Form::close() }} --}}
              </div>
          </div>