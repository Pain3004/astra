<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="branchOfficeModal">
        <div class="modal-dialog custom_modal_small_4 modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Branch Office</h4>
                    <button type="button" class="button-24 branchOfficeClose" data-dismiss="modal">&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a href="#" class="button-57_alt" id="addBranchOffice"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Office</span></a>                
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">

                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th>Name</th>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="officeTable">

                                                </tbody>
                                            </table>
                                        </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29 branchOfficeClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-------------------------------------------------------------------over  modal------------------------------------------------------------------->
<!------------------------------------------------------------------- Add modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addBranchOfficeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Office</h5>
                    <button type="button" class="button-24 addBranchOfficeClose" >×</button>

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
                                            <input type="hidden" name="_token" id="_tokenbranchOffice" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="BranchOffice_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Location <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="BranchOffice_Location" placeholder=" Location">
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
                    <button type="button" class="button-29" id="saveBranchOffice" >Save</button>
                    <button type="button" class="button-29 addBranchOfficeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End Add  modal------------------------------------------------------------------->
<!------------------------------------------------------------------- edit modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editBranchOfficeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Office</h5>
                    <button type="button" class="button-24 editBranchOfficeClose" >×</button>

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
                                            <input type="hidden" name="_token" id="tokeneditbranchOffice" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="" id="officeid"  />
                                            <input type="hidden" name="" id="officeComid"  />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_BranchOffice_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Location <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_BranchOffice_Location" placeholder=" Location">
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
                    <button type="button" class="button-29" id="branchOfficeUpdatebutton" >update</button>
                    <button type="button" class="button-29 editBranchOfficeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End edit  modal------------------------------------------------------------------->
