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
    <div class="modal fade" data-backdrop="static" id="FuelVendorModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fuel Vendor</h4>
                    <button type="button" class="button-24 fuelVendorClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">

                    @if($insertUser== 1)
                        <a  class="button-57_alt create_fuel_vendor_model"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                        
                    @endif 
                    
                    @if($deleteUser== 1)    
                        <a href="#" class="button-57_alt restore_fuel_vendor" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                    @endif
                    
                    

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="FuelVendorDataTable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Name</th>
                                                <th>Opening Date</th>
                                                <th>Opening Amount</th>
                                                <th>Current Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="FuelVendorTable">
                                         
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
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle" id="exportFuelVendorDetails"><span>Export</span></button>
                        @endif
                    <button type="button" class="button-29 fuelVendorClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ============ start add fuelVendor ================ -->
<div class="modal fade" id="AddFuelVendor"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Create Fuel Vendor Name</h5>
                <button type="button" class="close closeAddFuelVendor" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAdd_fuel_vendor" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Fuel Card Type<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addFuel_Card_Type" placeholder="Fuel Card Type "  id="addFuel_Card_Type " name="fuelCardType" required >
                        </div>
                        <label>Opening Balance Date<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "date" class="form-control date_formate_change" id="Add_OpeningDate" name="openingDate" required />
                        </div>
                        <label>Opening Amount<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control " type="number" id="add_Opening_Amount" name="openingBalance" required />
                        </div>
                        <label>Current Amount<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control " type="number" id="add_currentBalance" name="currentBalance" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeAddFuelVendor" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 FuelVendorSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================ end add fuelVendor  ===================== -->

 <!-- ============ start update fuelVendor ================ -->
 <div class="modal fade" id="UpdateFuelVendor"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Update Fuel Vendor Name</h5>
                <button type="button" class="close closeFuelVendorUpdatebutton" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    @csrf
                    <input type="hidden" name="_token" id="_tokenUpdate_fuel_vendor" value="{{ csrf_token() }}" />
                    <input type="hidden" name="fuel_id" class="fuel_id">
                    <input type="hidden" name="comp_id" class="comp_id">
                    <div class="form-group col-md-12">
                        <label>Fuel Card Type<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updateFuel_Card_Type" placeholder="Fuel Card Type " name="fuelCardType" required >
                        </div>
                        <label>Opening Balance Date<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "date" class="form-control date_formate_change" id="update_OpeningDate" name="openingDate" required />
                        </div>
                        <!-- <label>Opening Amount<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control " type="text" id="update_Opening_Amount" name="openingBalance" required />
                        </div>
                        <label>Current Amount<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control " type="text" id="update_currentBalance" name="currentBalance" required />
                        </div> -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeFuelVendorUpdatebutton" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 FuelVendorUpdatebutton " >Update </button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================ end Update fuelVendor  ===================== -->

<!-- restore fuel vendor  -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restore_fuel_vendor_list">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Fuel Vendor</h4>
                    <button type="button" class="button-24 restorefuelVendorClose" >&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                        <input type="hidden" name="checked_id" id="checked_fuelVendor_ids" value="">
                        <input type="hidden" name="company_id" id="checked_fuel_vendor_company_ids" value="">
                        <button id="restore_fuelVendor_data"  class="button-57_alt restore_fuelVendor_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore fuel vendor</span></button>
                </div>  
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="RestoreFuelVendorDataTable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th><input type="checkbox" name="all_ids[]" class="fuel_all_ids"></th>
                                                <th>Name</th>
                                                <th>Opening Date</th>
                                                <th>Opening Amount</th>
                                                <th>Current Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="restoreFuelVendorTable">
                                         
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
                    <button type="button" class="button-29 restorefuelVendorClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>