<!------------------------------------------------------------------- Equipment Type modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="EquipmentTypeModal" role="dialog">
        <div class="modal-dialog custom_modal_small3 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Equipment Type</h5>
                    <button type="button" class="button-24 EquipmentTypeClose" >×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <a  class="button-57" id="addEquipmentType"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <table id="EquipmentType_table_pagination" class="table">
                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="EquipmentTypeTable">
                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                    
                </div>
                <div class="modal-footer">
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29 EquipmentTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Equipment Type modal------------------------------------------------------------------->


<!------------------------------------------------------------------- Add Equipment Type modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addEquipmentTypeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Equipment Type</h5>
                    <button type="button" class="button-24 addEquipmentTypeClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                            <input type="hidden" name="_token" id="_tokenEquipmentType" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="EquipmentType_name" placeholder=" Name">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <div class="modal-footer">
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29" id="saveEquipmentType" >Save</button>
                    <button type="button" class="button-29 addEquipmentTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Add Equipment Type modal------------------------------------------------------------------->


<script>

$(document).ready(function() {
    $('#EquipmentType_table_pagination').DataTable({

        "columnDefs": [
            {
                "targets": [ 2 ],
                "searchable": false,
                "sortable":false
            },
        ]

    });
});

</script>