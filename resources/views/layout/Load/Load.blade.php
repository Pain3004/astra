<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
<!------------------------------------------------------------------- view  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="LoadModal" role="dialog">
        <div class="modal-dialog custom_modal_small3 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Load Type</h5>
                    <button type="button" class="button-24 LoadClose">×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
<<<<<<< HEAD
<<<<<<< HEAD
                    <a  class="button-57" id="addloadType"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                @if($insertUser== 1)
                    <a  class="button-57_alt" id="addloadType"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                    
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
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
<<<<<<< HEAD
<<<<<<< HEAD
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form>
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
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
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Load Type</h5>
                    <button type="button" class="button-24 addLoadTypeClose" >×</button>

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
                                            <input type="hidden" name="_token" id="_tokenLoadType" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="loadType_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
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


