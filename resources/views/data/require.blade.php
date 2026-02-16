<div class="col-md-12" width="100%">        
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Requirements List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover order-listref">
                    <thead class="bg-success text-white">
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th class="text-center">Requirement Name</th>
                            <th class="text-center" style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id='t1'>
                            <td class="text-center">1</td>
                            <td>
                                <input type="text" name="name[]" placeholder="Enter requirement name" class="form-control"/>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-danger ibtnDelref" disabled>Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <button type="button" class="btn btn-success btn-sm" id="addrowref">
                                    <i class="fa fa-plus-circle"></i> Add Requirement
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script nonce="{{ csp_nonce() }}">
$(document).ready(function () {
    var counter = 2;
    
    $("#addrowref").on("click", function () {
        var newRow = $("<tr id='t" + counter + "'>");
        var cols = "";
        
        cols += '<td class="text-center">' + counter + '</td>';
        cols += '<td><input type="text" name="name[]" placeholder="Enter requirement name" class="form-control"/></td>';
        cols += '<td class="text-center"><button type="button" class="btn btn-sm btn-danger ibtnDelref"><i class="fa fa-trash"></i> Delete</button></td>';
        
        newRow.append(cols);
        $("table.order-listref tbody").append(newRow);
        counter++;
        
        // Enable delete on first row when more than 1 row
        if ($("table.order-listref tbody tr").length > 1) {
            $("table.order-listref tbody tr:first .ibtnDelref").prop('disabled', false);
        }
    });
    
    $("table.order-listref").on("click", ".ibtnDelref", function (event) {
        var rowCount = $("table.order-listref tbody tr").length;
        
        if (rowCount > 1) {
            $(this).closest("tr").remove();
            
            // Re-number rows
            $("table.order-listref tbody tr").each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
            counter = $("table.order-listref tbody tr").length + 1;
            
            // Disable delete on first row if only 1 row left
            if ($("table.order-listref tbody tr").length === 1) {
                $("table.order-listref tbody tr:first .ibtnDelref").prop('disabled', true);
            }
        }
    });
});
</script>
