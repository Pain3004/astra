<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addContractCategory">
        <div class="modal-dialog modal-dialog-scrollable blur custom_modal_small2">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Contract Category</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                                @csrf
                                                <div class="form-row">
                                                <input type="hidden" name="_token" id="driver_csrf"
                                                    value="{{Session::token()}}">
                                                    <div class="form-group col-md-6">
                                                        <label for="contractCategory">Contract Category<span
                                                                style="color:#ff0000">*</span></label>
                                                        <!-- <input type="text" class="form-control required" id="contractCategory" placeholder="Contract Category"/> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4"></div>
                        <div class="form-group col-md-4" id="main_cat_val">

                        </div>
                        <div class="form-group col-md-4"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <table class="">
                            <thead>
                                <tr>
                                    <td>Contract Instructions</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody id="SubcategoryAdd1">

                            </tbody>
                            <tfoot></br>
                                <tr>
                                    <th colspan="12 " class="tableFooter">
                                        <button id="btnAddadv" type="button" class="button-29"
                                            data-toggle="tooltip"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;
                                            Add&nbsp;
                                        </button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="button-29 waves-effect waves-light"><i class="mdi mdi-shield-lock-outline"></i> Save </button>
                    <button type="button" class="button-29 waves-effect" data-dismiss="modal"> <i class='mdi mdi-close'></i> Close </button>
                </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(function() {
    $("#btnAddadv").bind("click", function() {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#SubcategoryAdd1").append(div);
    });
    $("body").on("click", ".removeSubCategory", function() {
        if (document.getElementsByClassName('removeSubCategory').length > 1) {
            $(this).closest("tr").remove();
        } else {
            swal("Warning", "All Instructions cannot be removed.", "warning");
        }
    });
});

function GetDynamicTextBox(value) {
    return '<td width="470"><input name="SubContractInfo" type="text" value = "' + value +
        '" class="form-control" /></td>' +
        '<td><button type="button" class="btn btn-danger removeSubCategory"><span aria-hidden="true">&times;</span></button></td>'
}
</script>