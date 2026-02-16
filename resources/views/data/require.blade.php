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
                            <td class="text-center align-middle">1</td>
                            <td>
                                <input type="text" name="name[]" placeholder="Enter requirement name" class="form-control" required/>
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-sm btn-danger ibtnDelref" disabled>
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-left">
                                <button type="button" class="btn btn-success btn-sm" id="addrowref">
                                    <i class="fas fa-plus-circle"></i> Add Requirement
                                </button>
                            </td>
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
    
    // Function to update row numbers
    function updateRowNumbers() {
        $("table.order-listref tbody tr").each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
        counter = $("table.order-listref tbody tr").length + 1;
    }
    
    // Add new row
    $("#addrowref").on("click", function () {
        var newRow = $("<tr id='t" + counter + "'>");
        var cols = "";
        
        cols += '<td class="text-center align-middle">' + counter + '</td>';
        cols += '<td><input type="text" name="name[]" placeholder="Enter requirement name" class="form-control" required/></td>';
        cols += '<td class="text-center align-middle"><button type="button" class="btn btn-sm btn-danger ibtnDelref"><i class="fas fa-trash"></i> Delete</button></td>';
        
        newRow.append(cols);
        $("table.order-listref tbody").append(newRow);
        
        counter++;
        
        // Enable delete button on first row if more than one row exists
        if ($("table.order-listref tbody tr").length > 1) {
            $("table.order-listref tbody tr:first .ibtnDelref").prop('disabled', false);
        }
        
        // Focus on new input
        newRow.find('input[type="text"]').focus();
        
        // Add animation
        newRow.hide().fadeIn(300);
    });
    
    // Delete row
    $("table.order-listref").on("click", ".ibtnDelref", function (event) {
        event.preventDefault();
        
        var rowCount = $("table.order-listref tbody tr").length;
        
        if (rowCount > 1) {
            $(this).closest("tr").fadeOut(300, function() {
                $(this).remove();
                updateRowNumbers();
                
                // Disable delete button on first row if only one row remains
                if ($("table.order-listref tbody tr").length === 1) {
                    $("table.order-listref tbody tr:first .ibtnDelref").prop('disabled', true);
                }
            });
        } else {
            alert("Cannot delete the last requirement!");
        }
    });
});
</script>

<style>
/* Additional styling for better UX */
.order-listref tbody tr {
    transition: all 0.3s ease;
}

.order-listref tbody tr:hover {
    background-color: #f8f9fa;
}

.order-listref input[type="text"] {
    border-radius: 4px;
}

.order-listref input[type="text"]:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
}

.card-header {
    background-color: #ffffff;
    border-bottom: 2px solid #28a745;
}
</style>
