<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!------------------------------------------------------------------- Equipment Type modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="EquipmentTypeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Equipment Type</h5>
                    <button type="button" class="button-24 EquipmentTypeClose" >×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a  class="button-57_alt" id="addEquipmentType"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Equipment Type</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" id="restoreEquipmentType"><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                    
                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <table id="" class="table">
                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th style="display:none;">NO</th>
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
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                        @endif
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
        <div class="modal-dialog custom_modal_small_5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Equipment Type</h5>
                    <button type="button" class="button-24 addEquipmentTypeClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: 22px;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="export-table">
                                            <form>
                                            <input type="hidden" name="_token" id="_tokenEquipmentType" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
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
<!------------------------------------------------------------------- edit modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editEquipmentType" role="dialog">
        <div class="modal-dialog custom_modal_small_5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Equipment Type</h5>
                    <button type="button" class="button-24 editEquipmentTypeClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: 22px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="export-table">
                                            <form>
                                                <input type="hidden" name="_token" id="tokeneditEquipmentType" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="" id="EquipmentTypeid"  />
                                                <input type="hidden" name="" id="EquipmentTypeComid"  />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="up_EquipmentType_name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_EquipmentType_name" placeholder=" Name">
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
                        <!-- <button class="button-29" style="vertical-align:middle"><span>Export</span></button> -->
                    </form>
                    <button type="button" class="button-29" id="EquipmentTypeUpdate" >update</button>
                    <button type="button" class="button-29 editEquipmentTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End edit  modal------------------------------------------------------------------->
<!------------------------------------------------------------------- start restore ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestoreEquipmentTypeModal">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Equipment Type</h4>
                    <button type="button" class="button-24 restoreEquipmentTypeclose" data-dismiss="modal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_EquipmentType" value="">
                    <input type="hidden" name="company_id" id="checked_EquipmentType_company_ids" value="">
                    <button id="restore_EquipmentTypeData"  class="button-57_alt restore_EquipmentTypeData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th scope="col"><input type="checkbox" name="all_ids[]" class="EquipmentType_all_ids" style="height: 15px;"></th>
                                                <th style="display:none;"></th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="RestoreEquipmentTypeTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restoreEquipmentTypeclose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------- End restore ------------------------------------------------------------------->
