<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->

<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="TrailerModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Trailer</h4>
                    <button type="button" class="button-24 coseTrilershow" data-dismiss="modal">&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
<<<<<<< HEAD
<<<<<<< HEAD
                    <a href="#addDriverModal" class="button-57 addTrailerModal">
                        <i class="fa fa-plus " aria-hidden="true"></i>
                        <span>Add trailer</span>
                    </a>
                    <a href="#setupDriverModal" class="button-57" data-toggle="modal"
                        data-target="#setupDriverModal">
                        <i class="fa fa-sliders" aria-hidden="true"></i>
                        </span><span>Button 2</span>
                    </a>
                    <a href="#contractCategoryModal" class="button-57_alt" data-toggle="modal"
                        data-target="#contractCategoryModal">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        </span><span>Button 3</span>
                    </a>
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                    <!-- <a href="#addDriverModal" class="button-57 addTrailerModal">
                        <i class="fa fa-plus " aria-hidden="true"></i>
                        <span>Add trailer</span>
                    </a> -->

                    @if($insertUser== 1)
                        <a href="#addDriverModal" class="button-57_alt addTrailerModal"><i class="fa fa-plus " aria-hidden="true"></i> <span>Add trailer</span> </a>
                    @endif 
                    
                    @if($deleteUser== 1)    
                        <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                    @endif
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
<<<<<<< HEAD
<<<<<<< HEAD
                 <!-- <button type="button" class="btn btn-primary btn-lg addTrailerModal" >ADD</button> -->
                    <!-- Row -->
                    <div class="row">
                   
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Trailer</th>
                                                        <th>Trailer Type</th>
                                                        <th>License Plate</th>
                                                        <th>Plate Expiry</th>
                                                        <th>Inspection Expiration</th>
                                                        <th>Status</th>
                                                        <th>Model</th>
                                                        <th>Year</th>
                                                        <th>Axles</th>
                                                        <th>Registered State</th>
                                                        <th>VIN</th>
                                                        <th>DOT Expiry Date	</th>
                                                        <th>Activation Date	</th>
                                                        <th>Internal Notes	</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="trailer_tbl">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
=======
                        <table id="" class="table">
                            <thead class="thead_th">
                                <tr class="tr">
                                    <th>NO</th>
                                    <th>Trailer</th>
                                    <th>Trailer Type</th>
                                    <th>License Plate</th>
                                    <th>Plate Expiry</th>
                                    <th>Inspection Expiration</th>
                                    <th>Status</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Axles</th>
                                    <th>Registered State</th>
                                    <th>VIN</th>
                                    <th>DOT Expiry Date	</th>
                                    <th>Activation Date	</th>
                                    <th>Internal Notes	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="trailer_tbl">
                                
                            </tbody>
                        </table>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                        <table id="" class="table">
                            <thead class="thead_th">
                                <tr class="tr">
                                    <th>NO</th>
                                    <th>Trailer</th>
                                    <th>Trailer Type</th>
                                    <th>License Plate</th>
                                    <th>Plate Expiry</th>
                                    <th>Inspection Expiration</th>
                                    <th>Status</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Axles</th>
                                    <th>Registered State</th>
                                    <th>VIN</th>
                                    <th>DOT Expiry Date	</th>
                                    <th>Activation Date	</th>
                                    <th>Internal Notes	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="trailer_tbl">
                                
                            </tbody>
                        </table>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
<<<<<<< HEAD
<<<<<<< HEAD
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
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
                    <button type="button" class="button-29 coseTrilershow" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>


 <!-- ============ start addTrailerModal================ -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="addTrailerModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Trailer</h4>
                    <button type="button" class="closeAddTrailerModal" >&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
<<<<<<< HEAD
<<<<<<< HEAD
                                        <form id="addTrailerForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_tokenTrailer" value="{{ csrf_token() }}" />
=======
                                        <form  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_Trailer" value="{{ csrf_token() }}" />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                        <form  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_Trailer" value="{{ csrf_token() }}" />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Trailer Number<span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="trailer_number" name="trailer_number" required />
=======
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="trailerNumber" name="trailer_number" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="trailerNumber" name="trailer_number" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="trailertype">Trailer Type <span style="color:#ff0000">*</span>&nbsp; 

                                                    <!-- <a href="#addDriverModal" class="button-57 addTrailerType">
                                                        <i class="fa fa-plus " aria-hidden="true"></i>
                                                    </a> -->
                                                    <span class="glyphicon glyphicon-plus-sign addTrailerType " id="addTrailerType" data-toggle="modal"  style="cursor:pointer;"></span>
                                                </label>
                                                        <div class="dropdown show">
                                                            <select  class="form-control trailerTypeSet trailerType_Set_id" name="trailerType" >
                                                                <option>Select Here</option>
                                                            </select>
                                                            <!-- <input class="form-control trailerTypeSet" list="trailerTypeSet" name="trailerType" id="trailerType">
                                                            <datalist id="trailerTypeSet" class="trailerTypeSet">
                                                                <option>Select Here</option>
                                                              
                                                            </datalist> -->
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>License Plate <span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="License Plate" type="text" id="trailerlicense_plate"
=======
                                                        <input class="form-control" placeholder="License Plate" type="text" id="trailer_license_plate"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="License Plate" type="text" id="trailer_license_plate"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            name="license_plate" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Plate Expiry <span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control date_formate_change" type="date" id="trailerplate_expiry" name="plate_expiry" required />
=======
                                                        <input class="form-control date_formate_change" type="date" id="trailer_plate_expiry" name="plate_expiry" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control date_formate_change" type="date" id="trailer_plate_expiry" name="plate_expiry" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Inspection Expiration</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="date" id="trailerinspection" name="inspection">
=======
                                                        <input class="form-control" type="date" id="trailer_inspection" name="inspection">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="date" id="trailer_inspection" name="inspection">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>
                                                        Status</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                    <select class="form-control" id="trailer_status" name="status">
=======
                                                    <select class="form-control" id="trailerStatus" name="status">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                    <select class="form-control" id="trailerStatus" name="status">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Not Available">Not Available</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="trailerModel">Model</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                    <input class="form-control" placeholder="Model" type="text" id="model" name="model">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Year">Year</label>
                                                    <input class="form-control" placeholder="Year" type="text" id="traileryear" name="year">
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    <input class="form-control" placeholder="Model" type="text" id="model_trailer" name="model">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Year">Year</label>
                                                    <input class="form-control" placeholder="Year" type="text" id="trailer_year" name="year">
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Axles">Axles</label>
                                                    <input class="form-control" placeholder="Axles" type="text" id="traileraxies" name="axies">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <p class="form-box">
                                                        <label for="RegisteredState">Registered State</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" id="trailerRegisteredState" name="registered_state"
=======
                                                        <input class="form-control" id="trailer_RegisteredState" name="registered_state"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" id="trailer_RegisteredState" name="registered_state"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            list="registered_state" placeholder="Registered State" required autocomplete="off" />
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>VIN <span class="mandatory" style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="text" placeholder="VIN #" id="trailervin" name="vin" required>
=======
                                                        <input class="form-control" type="text" placeholder="VIN #" id="trailer_vin" name="vin" required>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="text" placeholder="VIN #" id="trailer_vin" name="vin" required>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-2">
                                                    <label>Activation Date</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="activation"
=======
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="activation_trailer"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="activation_trailer"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            name="activation">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>DOT Expiry Date</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="date" id="trailer_dot" name="dot">
=======
                                                        <input class="form-control" type="date" id="trailerDot" name="dot">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="date" id="trailerDot" name="dot">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Internal Notes</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="trailerinternal_note" placeholder="Internal Note" name="internal_note"></textarea>
=======
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="trailer_internal_note" placeholder="Internal Note" name="internal_note"></textarea>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="trailer_internal_note" placeholder="Internal Note" name="internal_note"></textarea>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Upload Files</label>
                                                    <div >
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input type="file" class="form-control" id="trailerfiles"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
=======
                                                        <input type="file" class="form-control" id="trailer_files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input type="file" class="form-control" id="trailer_files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                        
                                                    </div>
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
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29" id="TrailerSavebutton" >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeAddTrailerModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!-- ========== end addTrailerModal ========== -->
 <!--============================== over add modal =========== -->
<datalist id="registered_state">
    <option value="AL">
    <option value="AK">
    <option value="AR">
    <option value="CA">
    <option value="CO">
    <option value="CT">
    <option value="DE">
    <option value="FL">
    <option value="GA">
    <option value="HI">
    <option value="ID">
    <option value="IL">
    <option value="IN">
    <option value="IA">
    <option value="KS">
    <option value="KY">
    <option value="LA">
    <option value="ME">
    <option value="MD">
    <option value="MA">
    <option value="MI">
    <option value="MN">
    <option value="MS">
    <option value="MO">
    <option value="MT">
    <option value="NE">
    <option value="NV">
    <option value="NH">
    <option value="NJ">
    <option value="NM">
    <option value="NY">
    <option value="NC">
    <option value="ND">
    <option value="OH">
    <option value="OK">
    <option value="OR">
    <option value="PA">
    <option value="RI">
    <option value="SC">
    <option value="SD">
    <option value="TN">
    <option value="TX">
    <option value="UT">
    <option value="VT">
    <option value="VA">
    <option value="WA">
    <option value="WV">
    <option value="WI">
    <option value="WY">
</datalist>


<!-- ========== strart addTrailer type Modal ========== -->
<div class="modal fade" id="addTrailerTypeModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Trailer Type</h5>
        <button type="button" class="close closeTrailerType" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<<<<<<< HEAD
<<<<<<< HEAD
        <form id="addTrailerTypeForm">
            @csrf
            <input type="hidden" name="_token" id="_tokenTrailerType" value="{{ csrf_token() }}" />
            <div class="form-group col-md-12">
                <label>Name<span style="color:#ff0000">*</span></label>
                <div>
                    <input class="form-control" placeholder="trailer type" type="text" id="addtrailer_type" name="trailer_type_name" required />
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
        <form id="">
            @csrf
            <input type="hidden" name="_token" id="_tokenTrailer_Type" value="{{ csrf_token() }}" />
            <div class="form-group col-md-12">
                <label>Name<span style="color:#ff0000">*</span></label>
                <div>
                    <input class="form-control" placeholder="trailer type" type="text" id="add_trailer_type" name="trailer_type_name" required />
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-29 closeTrailerType" data-dismiss="modal">Close</button>
        <button type="button" class="button-29 saveTrailerType " >Save </button>
      </div>
    </div>
  </div>
</div>

<!-- ==================== end add trailer type model ===================== -->

<!-- =================== start edit trailer model ======================== -->

<div class="container">
    <div class="modal fade" data-backdrop="static" id="editTrailerModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Trailer</h4>
                    <button type="button" class="closeEditTrailerModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
<<<<<<< HEAD
<<<<<<< HEAD
                                        <form id="editTrailerForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_tokenEditTrailer" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="id" id="edittrailer_id" >
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                        <form id="" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_EditTrailer" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="id" id="edit_trailer_id" >
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Trailer Number<span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="editetrailer_number" name="trailer_number" required />
=======
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="edite_trailer_number" name="trailer_number" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="edite_trailer_number" name="trailer_number" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="trailertype">Trailer Type <span style="color:#ff0000">*</span>&nbsp; 
                                                    <!-- <span class="glyphicon glyphicon-plus-sign addTrailerType "  data-toggle="modal"  style="cursor:pointer;"></span> -->
                                                </label>
                                                        <div class="dropdown show">
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <select  class="form-control trailerTypeSet trailerType_Set_id" name="trailerType" id="editTrailerType" >
=======
                                                        <select  class="form-control trailerTypeSet trailerType_Set_id" name="trailerType" id="edit_Trailer_Type" >
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <select  class="form-control trailerTypeSet trailerType_Set_id" name="trailerType" id="edit_Trailer_Type" >
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                                <option>Select Here</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>License Plate <span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="License Plate" type="text" id="editTrailerlicense_plate"
=======
                                                        <input class="form-control" placeholder="License Plate" type="text" id="edit_Trailerlicense_plate"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="License Plate" type="text" id="edit_Trailerlicense_plate"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            name="license_plate" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Plate Expiry <span style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="date" id="editTrailerplate_expiry" name="plate_expiry" required />
=======
                                                        <input class="form-control" type="date" id="edit_Trailerplate_expiry" name="plate_expiry" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="date" id="edit_Trailerplate_expiry" name="plate_expiry" required />
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Inspection Expiration</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="date" id="editTrailerinspection" name="inspection">
=======
                                                        <input class="form-control" type="date" id="edit_Trailer_inspection" name="inspection">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="date" id="edit_Trailer_inspection" name="inspection">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>
                                                        Status</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                    <select class="form-control" id="editTrailer_status" name="status">
=======
                                                    <select class="form-control" id="edit_Trailer_status" name="status">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                    <select class="form-control" id="edit_Trailer_status" name="status">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Not Available">Not Available</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- row 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="trailerModel">Model</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                    <input class="form-control" placeholder="Model" type="text" id="editTrailerModel" name="model">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Year">Year</label>
                                                    <input class="form-control" placeholder="Year" type="text" id="editTraileryear" name="year">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Axles">Axles</label>
                                                    <input class="form-control" placeholder="Axles" type="text" id="trailer_axies" name="axies">
=======
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    <input class="form-control" placeholder="Model" type="text" id="edit_Trailer_Model" name="model">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Year">Year</label>
                                                    <input class="form-control" placeholder="Year" type="text" id="edit_Traileryear" name="year">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="Axles">Axles</label>
                                                    <input class="form-control" placeholder="Axles" type="text" id="Edit_trailerAxies" name="axies">
<<<<<<< HEAD
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <p class="form-box">
                                                        <label for="RegisteredState">Registered State</label>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" id="editTrailerRegisteredState" name="registered_state"
=======
                                                        <input class="form-control" id="editTrailer_Registered_State" name="registered_state"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" id="editTrailer_Registered_State" name="registered_state"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            list="registered_state" placeholder="Registered State" required autocomplete="off" />
                                                    </p>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>VIN <span class="mandatory" style="color:#ff0000">*</span></label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="text" placeholder="VIN #" id="editTrailervin" name="vin" required>
=======
                                                        <input class="form-control" type="text" placeholder="VIN #" id="edit_Trailer_vin" name="vin" required>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="text" placeholder="VIN #" id="edit_Trailer_vin" name="vin" required>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group col-md-2">
                                                    <label>Activation Date</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="edit_trailerActivation"
=======
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="edit_trailer_Activation"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" placeholder="Toll Free" type="date" id="edit_trailer_Activation"
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                            name="activation">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>DOT Expiry Date</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input class="form-control" type="date" id="edit_trailer_dot" name="dot">
=======
                                                        <input class="form-control" type="date" id="editTrailerdot" name="dot">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input class="form-control" type="date" id="editTrailerdot" name="dot">
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Internal Notes</label>
                                                    <div>
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="edit_trailerinternal_note" placeholder="Internal Note" name="internal_note"></textarea>
=======
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="editTrailerinternal_note" placeholder="Internal Note" name="internal_note"></textarea>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea" id="editTrailerinternal_note" placeholder="Internal Note" name="internal_note"></textarea>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Upload Files</label>
                                                    <div >
<<<<<<< HEAD
<<<<<<< HEAD
                                                        <input type="file" class="form-control" id="edit_trailerfiles"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                                                        
=======
                                                        <input type="file" class="form-control" id="edit_trailer_files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                                                        <div class="trailer_img">
                                                        </div>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
=======
                                                        <input type="file" class="form-control" id="edit_trailer_files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                                                        <div class="trailer_img">
                                                        </div>
>>>>>>> a9578ab2c12b05e4d51c8af156edfc7e4ed29341
                                                    </div>
                                                </div>
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29" id="TrailerEditbutton" >update</button>
                    <button type="button"style="vertical-align:middle" class=" closeEditTrailerModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>


