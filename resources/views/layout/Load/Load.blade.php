<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!------------------------------------------------------------------- view  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="LoadModal" role="dialog">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Load Type</h5>
                    <button type="button" class="button-24 LoadClose">×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a  class="button-57_alt" id="addloadType"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" id="restoreLoad" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>
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
                                                        <th style="display:none">NO</th>
                                                        <th>Name</th>
                                                        <th>Unit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="Load_typeTable">
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
                    <button type="button" class="button-29 LoadClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End  modal------------------------------------------------------------------->
<!------------------------------------------------------------------- Add ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addLoadTypeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Load Type</h5>
                    <button type="button" class="button-24 addLoadTypeClose" >×</button>

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
                                            <input type="hidden" name="_token" id="_tokenLoadType" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="loadType_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Type <span style="color:#ff0000">*</span></label>
                                                            <select class="form-control select2" id="loadUnit" tabindex="-1" aria-hidden="true">
                                                                <option>Yes</option>
                                                                <option>No</option>
                                                            </select>
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
                    <button type="button" class="button-29" id="saveLoadType" >Save</button>
                    <button type="button" class="button-29 addLoadTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End Add ------------------------------------------------------------------->
<!------------------------------------------------------------------- edit modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editLoadModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Load</h5>
                    <button type="button" class="button-24 editLoadClose" >×</button>

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
                                            <input type="hidden" name="_token" id="tokeneditLoad" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="" id="LoadId"/>
                                            <input type="hidden" name="" id="LoadComid"  />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="up_Load_name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_Load_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="up_Load_unit">Unit <span style="color:#ff0000">*</span></label>
                                                        <!-- <input type="text" class="form-control required" id="up_Load_unit" placeholder=" Location"> -->
                                                        <select  class="form-control  " type="text" id="up_Load_unit" name="cardType" >
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
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
                    <button type="button" class="button-29" id="loadUpdate" >update</button>
                    <button type="button" class="button-29 editLoadClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End edit  modal------------------------------------------------------------------->

<!------------------------------------------------------------------- start restore ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestoreLoadModal">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Branch Office</h4>
                    <button type="button" class="button-24 restoreLoadclose" data-dismiss="modal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_Load" value="">
                    <input type="hidden" name="company_id" id="checked_Load_company_ids" value="">
                    <button id="restore_LoadData"  class="button-57_alt restore_LoadData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>
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
                                                <th scope="col"><input type="checkbox" name="all_ids[]" class="Load_all_ids" style="height: 15px;"></th>
                                                <th>Name</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="RestoreLoadTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restoreLoadclose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------- End restore ------------------------------------------------------------------->

