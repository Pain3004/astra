<<<<<<< HEAD
=======
<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
<!------------------------------------------------------------------- view Recurrence Category modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="RecurrenceCategoryModal" role="dialog">
        <div class="modal-dialog custom_modal_small3 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Recurrence Category</h5>
                    <button type="button" class="button-24 RecurrenceCategoryClose" >×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
<<<<<<< HEAD
                    <a  class="button-57" id="addRecurrenceCategory"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
=======
                @if($insertUser== 1)
                    <a  class="button-57" id="addRecurrenceCategory"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                    
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
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
                                                <tbody id="RecurrenceCategoryTable">
                        
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
<<<<<<< HEAD
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
=======
                <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                    <button type="button" class="button-29 EquipmentTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Recurrence Category modal------------------------------------------------------------------->


<!------------------------------------------------------------------- Add Recurrence Category modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addRecurrenceCategoryModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Recurrence Category</h5>
                    <button type="button" class="button-24 addRecurrenceCategoryClose" >×</button>

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
                                            <input type="hidden" name="_token" id="_tokenRecurrenceCategory" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="fixPayType_name" placeholder=" Name">
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
                    <button type="button" class="button-29" id="saveRecurrenceCategory" >Save</button>
                    <button type="button" class="button-29 addRecurrenceCategoryClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Add Equipment Type modal------------------------------------------------------------------->


<script>

// $(document).ready(function() {
//     $('#EquipmentType_table_pagination').DataTable({

//         "columnDefs": [
//             {
//                 "targets": [ 2 ],
//                 "searchable": false,
//                 "sortable":false
//             },
//         ]

//     });
// });

</script>
<!-------------------------------------------------------------------End Add Equipment Type modal------------------------------------------------------------------->


<script>

// $(document).ready(function() {
//     $('#EquipmentType_table_pagination').DataTable({

//         "columnDefs": [
//             {
//                 "targets": [ 2 ],
//                 "searchable": false,
//                 "sortable":false
//             },
//         ]

//     });
// });

</script>