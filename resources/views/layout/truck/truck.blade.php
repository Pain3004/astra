<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
	
<!------------------------------------------------------------------- get truck  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="truckModal">
        <div class="modal-dialog custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Truck</h4>
                    <button type="button" class=" button-24 closeTruckModal" >&times;</button>
                </div>
<div style="display:flex; flex-direction:row;">
@if($insertUser== 1)
                                            <a href="#" style="margin:10px;"  class="button-29 addtruckModal" ><span>Add </span></a>
                                        @endif 
                                        
                                        @if($deleteUser== 1)    
                                            <a href="#" style="margin:10px;" class="button-29 restore_truckData" ></span><span>Restore Truck</span></a>

                                        @endif

</div>
                <!-- Modal body -->


                <div >
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th" style="height:40px;">
                  <tr class="tr">

<th>NO</th>
<th>Truck</th>
<th>Truck Type</th>
<th>License Plate</th>
<th>Plate Expiry</th>
<th> Inspection Expiration</th>
<th>Status</th>
<th>Ownership</th>
<th>Mileage</th>
<th>Axles</th>
<th> Year</th>
<th> Fuel Type</th>
<th>Start Date </th>
<th>Deactivation Date </th>
<th> IFTA Truck</th>
<th> Registered State</th>
<th> Insurance Policy</th>
<th> Empty/Gross Weight</th>
<th> VIN</th>
<th>DOT Expiry Date</th>
<th>Transponder></th>
<th>Internal Notes </th>

<th>Action</th>
</tr>
                  </thead>
                  <tbody id="truckTable" class="load-box"></tbody>
                </table>
              </div>
                    <!-- <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive export-table">
                                        @if($insertUser== 1)
                                            <a href="#"  class="button-57_alt addtruckModal" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add </span></a>
                                        @endif 
                                        
                                        @if($deleteUser== 1)    
                                            <a href="#" class="button-57_alt restore_truckData" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore Truck</span></a>

                                        @endif

                                            

                                            <table  class="table" >

                                                <thead class="thead_th">
                                                    <tr class="tr">

                                                        <th>NO</th>
                                                        <th>Truck</th>
                                                        <th>Truck Type</th>
                                                        <th>License Plate</th>
                                                        <th>Plate Expiry</th>
                                                        <th> Inspection Expiration</th>
                                                        <th>Status</th>
                                                        <th>Ownership</th>
                                                        <th>Mileage</th>
                                                        <th>Axles</th>
                                                        <th> Year</th>
                                                        <th> Fuel Type</th>
                                                        <th>Start Date </th>
                                                        <th>Deactivation Date </th>
                                                        <th> IFTA Truck</th>
                                                        <th> Registered State</th>
                                                        <th> Insurance Policy</th>
                                                        <th> Empty/Gross Weight</th>
                                                        <th> VIN</th>
                                                        <th>DOT Expiry Date</th>
                                                        <th>Transponder></th>
                                                        <th>Internal Notes </th>
                                                      
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="truckTable">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <!-- <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form> -->
                    <button type="button" class="button-29 closeTruckModal"  >Close</button>
                    <nav aria-label="..." data-name="truck_pagination" class="float-right">
                        <div class="pagination" id="truck_pagination">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<!------------------------------------------------------------------- over truck  modal ------------------------------------------------------------------->
<!------------------------------------------------------------------  add driver modal ------------------------------------------------------------------>

 <!------------------------------------------------------------------- add truck  modal ------------------------------------------------------------------->
<div class="container">

    <div class="modal fade" data-backdrop="static" id="addTruckModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h4 class="modal-title">Add Truck</h4>
                        <button type="button" class="closeAddTruckModal" >&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form >
                                                <input type="hidden" name="_token" id="_tokenTruck" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label>Truck Number <span style="color:#ff0000">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Truck Number" type="text" id="truck_number" name="truck_number" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="trucktype">Truck Type <span style="color:#ff0000">*</span>&nbsp; <span class="glyphicon glyphicon-plus-sign create_truck_type" id="addTruckType" style="color:blue !important; cursor:pointer;" ></span></label>
                                                            <div class="dropdown show">
                                                                <!-- <input class="form-control truckTypeSet" list="truckTypeSet" name="truckType" id="truckType">
                                                                <datalist id="truckTypeSet" class="truckTypeSet">
                                                                    <option>Select Here</option>
                                                                </datalist> -->
                                                                <select  id="truckType" class="truckTypeSet truck_Type_Set form-control" list="truckTypeSet">
                                                                <option> Select  </option>
                                                            </select>
                                                            </div>

                                                    
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>License Plate <span style="color:#ff0000">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="License Plate" type="text" id="license_plate"
                                                                name="license_plate" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Plate Expiry <span style="color:#ff0000">*</span></label>
                                                        <div>
                                                            <input class="form-control" type="date" id="plate_expiry" name="plate_expiry" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Inspection Expiration</label>
                                                        <div>
                                                            <input class="form-control" type="date" id="inspection" name="inspection">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>
                                                            Status</label>
                                                        <select class="form-control" id="truck_status" name="status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                            <option value="Not Available">Not Available</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- row 2 -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="customerBillingAddressChkbox">Ownership <span style="color:#ff0000">*</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                        <input type="radio" class="form-check-input radioButton" id="ownership" name="Ownership" value="CompanyTruck" >Company Truck &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="radio" class="form-check-input radioButton" id="Own" name="Ownership" value="OwnerOperator" >Owner Operator
                                                    </div>
                                                </div>
                                                <!-- row 3 -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="TruckNumber">Mileage</label>
                                                        <input class="form-control" placeholder="Mileage" type="text" id="mileage" name="mileage">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="Axles">Axles</label>
                                                        <input class="form-control" placeholder="Axles" type="text" id="axies" name="axies">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Year</label>
                                                        <input class="form-control" placeholder="Year" type="number" id="year" name="year" max-length="8">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Fuel Type</label>
                                                        <select class="form-control" id="fuel_type" name="fuel_type">
                                                        <option selected='' disabled>----select-----</option>
                                                            <option value="gas">gas</option>
                                                            <option value="Diesel">Diesel</option>
                                                            <option value="Reffer">Reffer</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Start Date</label>
                                                        <input class="form-control" type="date" id="start_date" name="start_date">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Deactivation Date</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Toll Free" type="date" id="deactivation"
                                                                name="deactivation">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- row 4 -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <p class="form-box">
                                                            <label for="RegisteredState">Registered State</label>
                                                            <input class="form-control" id="RegisteredState" name="registered_state"
                                                                list="registered_state" placeholder="Registered State" required autocomplete="off" />
                                                        </p>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Insurance Policy</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Insurance Policy #" type="text"
                                                                id="Insurance_Policy" name="Insurance_Policy">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Empty / Gross Weight</label>
                                                        <div>
                                                            <input class="form-control" type="text" placeholder="Empty / Gross Weight" id="gross"
                                                                name="gross">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>VIN <span class="mandatory" style="color:red">*</span></label>
                                                        <div>
                                                            <input class="form-control" type="text" placeholder="VIN #" id="vin" name="vin" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>DOT Expiry Date</label>
                                                        <div>
                                                            <input class="form-control" type="date" id="dot" name="dot">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2 ">
                                                        <label>Transponder</label>
                                                        <div>
                                                            <input class="form-control" type="text" placeholder="Transponder" id="transponder"
                                                                name="transponder">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-2" data-name="selectifta">
                                                        <label>IFTA Truck</label>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="ifta" name="ifta"
                                                                data-parsley-multiple="groups" data-parsley-mincheck="2" value="IFTA Truck">
                                                            <label class="custom-control-label" for="ifta">Include this Truck for IFTA</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Internal Notes</label>
                                                        <div>
                                                            <textarea rows="2" cols="30" class="form-control" type="textarea" id="internal_note" placeholder="Internal Note" name="internal_note"></textarea>
                                                            <!-- <input type="hidden" id="companyId" name="companyId"
                                                                value=""> -->
                                                        </div>
                                                    </div>

                                                <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->


                                                    <div class="form-group col-md-2">
                                                        <label>Upload Files</label>
                                                        <div >
                                                            <!-- <button class="custom-btn">Choose file
                                                            </button> -->
                                                            <!-- <input type="file" id="files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" /> -->
                                                            <input type="file" class="form-control" id="files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                                                            
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                                            <input class="form-control file-input" type="file" id="formFileMultiple" multiple>
                                                        </div> -->
                                                    </div>
                                                </div>


                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="button-29" id="truckSavebutton" >Save</button>
                        <button type="button" class="button-29 closeAddTruckModal" >Close</button>
                    </div>
            
            </div>
        </div>
    </div>

</div>
<!------------------------------------------------------------------- over add truck  modal ------------------------------------------------------------------->

<!------------------------------------------------------------------ over add modal ------------------------------------------------------------------>
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



<!--======================================== edit truck modal start ======================== -->


<div class="modal fade" data-backdrop="static" id="editTruckModal" role="dialog">
    <div class="modal-dialog custom_modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Truck</h4>
                <button type="button" class="closeEditTruckModal" >&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="addTruckForm">
                                        <input type="hidden" name="_token" id="_tokenEditTruck" value="{{ csrf_token() }}" />  
                                        <input type="hidden" name="id" id="truck_id" value="" />
                                        <input type="hidden" name="comId" id="comp_id_truck_edit" value="" />
                                        <!-- row 1 -->
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Truck Number <span style="color:#ff0000">*</span></label>
                                                <div>
                                                    <input class="form-control" placeholder="Truck Number" type="text" id="edit_truck_number" name="truckNumber" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="trucktype">Truck Type 
                                                    <span style="color:#ff0000">*</span>&nbsp; <span class="glyphicon glyphicon-plus-sign create_truck_type"  ></span>
                                                </label>
                                                    <div class="dropdown show">
                                                        <!-- <input class="form-control truckTypeSet" list="truckTypeSet" name="truckType" id="editTruckType">
                                                        <datalist id="truckTypeSet" class="truckTypeSet">
                                                            <option>Select Here</option>
                                                        </datalist> -->
                                                        <select  id="editTruckType" class="truckTypeSet truck_Type_Set form-control" list="truckTypeSet">
                                                            <option> Select  </option>
                                                        </select>
                                                    </div>

                                                
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>License Plate <span style="color:#ff0000">*</span></label>
                                                <div>
                                                    <input class="form-control" placeholder="License Plate" type="text" id="edit_truck_license_plate"
                                                        name="licensePlate" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Plate Expiry <span style="color:#ff0000">*</span></label>
                                                <div>
                                                    <input class="form-control" type="date" id="edit_truck_plate_expiry" name="plateExpiry" required />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Inspection Expiration</label>
                                                <div>
                                                    <input class="form-control" type="date" id="edit_truck_inspection" name="inspectionExpiry">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Status</label>
                                                <select class="form-control" id="edit_truck_status" name="status">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                    <option value="Not Available">Not Available</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- row 2 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="customerBillingAddressChkbox">Ownership <span style="color:#ff0000">*</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                                                <input type="radio" class="form-check-input radioButton company_own_truck" id="edit_truck_ownership" name="ownership" value="CompanyTruck" >Company Truck &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" class="form-check-input radioButton company_own_truck" id="edit_truck_Own" name="ownership" value="OwnerOperator" >Owner Operator
                                            </div>
                                        </div>
                                        <!-- row 3 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="TruckNumber">Mileage</label>
                                                <input class="form-control" placeholder="Mileage" type="text" id="edit_truck_mileage" name="mileage">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="Axles">Axles</label>
                                                <input class="form-control" placeholder="Axles" type="text" id="edit_truck_axies" name="axies">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Year</label>
                                                <input class="form-control" placeholder="YYYY" type="number" id="edit_truck_year" name="year">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Fuel Type</label>
                                                <select class="form-control" id="edit_truck_fuel_type" name="fuelType">
                                                    <option selected='' disabled>----select-----</option>
                                                    <option value="gas">gas</option>
                                                    <option value="Diesel">Diesel</option>
                                                    <option value="Reffer">Reffer</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Start Date</label>
                                                <input class="form-control" type="date" id="edit_truck_start_date" name="startDate">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Deactivation Date</label>
                                                <div>
                                                    <input class="form-control" placeholder="Toll Free" type="date" id="edit_truck_deactivation"
                                                        name="deactivationDate">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- row 4 -->
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <p class="form-box">
                                                    <label for="RegisteredState">Registered State</label>
                                                    <input class="form-control" id="edit_truck_RegisteredState" name="registeredState"
                                                        list="registered_state" placeholder="Registered State" required autocomplete="off" />
                                                </p>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Insurance Policy</label>
                                                <div>
                                                    <input class="form-control" placeholder="Insurance Policy #" type="text"
                                                        id="edit_truck_Insurance_Policy" name="insurancePolicy">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Empty / Gross Weight</label>
                                                <div>
                                                    <input class="form-control" type="text" placeholder="Empty / Gross Weight" id="edit_truck_gross"
                                                        name="grossWeight">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>VIN <span class="mandatory" STYLE="COLOR:RED!IMPORTANT">*</span></label>
                                                <div>
                                                    <input class="form-control" type="text" placeholder="VIN #" id="edit_truck_vin" name="vin" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>DOT Expiry Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="edit_truck_dot" name="dotexpiryDate">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2 ">
                                                <label>Transponder</label>
                                                <div>
                                                    <input class="form-control" type="text" placeholder="Transponder" id="edit_truck_transponder"
                                                        name="transponder">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-2" data-name="selectifta">
                                                <label>IFTA Truck</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="" id="edit_truck_ifta" name="ifta" value="IFTA Truck">
                                                    <label class="" for="ifta">Include this Truck for IFTA</label>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="2" cols="30" class="form-control" type="textarea" id="edit_truck_internal_note" placeholder="Internal Note" name="internalNotes"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Upload Files</label>
                                                <div >
                                                    <input type="file" class="form-control" id="edit_truck_files"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
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
                <button type="button" class="button-29 truckUpdateButton" >Save</button>
                <button type="button" class="button-29 closeEditTruckModal" >Close</button>
            </div>
          
        </div>
    </div>
</div>
 <!--================================= end update truck =========================== -->


 <!--================================= start restore truck ========================== -->
 <div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="restoretruckModal">
        <div class="modal-dialog custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Truck</h4>
                    <button type="button" style="background-color:red;" class="closeRestoreTruck button-24" >&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                        <input type="hidden" name="checked_id" id="checked_truck_ids" value="">
                        <input type="hidden" name="company_id" id="checked_truck_company_ids" value="">
                        <button id="restore_truck_data"  class="button-29 restore_truck_data" disabled><span>Restore Truck</span></button>
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
                                           
                                            <table  class="table editable-table table-nowrap table-bordered table-edit wp-100"  style="width:100%;height:500px">

                                                <thead  class="thead_th">
                                                    <tr class="th">
                                                        <th>  <input type="checkbox" name="all_truck_checked[]" class="all_truck_checkbox"> </th>
                                                        <!-- <th>NO</th> -->
                                                        <th>Truck</th>
                                                        <th>Truck Type</th>
                                                        <th>License Plate</th>
                                                        <th>Plate Expiry</th>
                                                        <th> Inspection Expiration</th>
                                                        <th>Status</th>
                                                        <th>Ownership</th>
                                                        <th>Mileage</th>
                                                        <th>Axles</th>
                                                        <th> Year</th>
                                                        <th> Fuel Type</th>
                                                        <th>Start Date </th>
                                                        <th>Deactivation Date </th>
                                                        <th> IFTA Truck</th>
                                                        <th> Registered State</th>
                                                        <th> Insurance Policy</th>
                                                        <th> Empty/Gross Weight</th>
                                                        <th> VIN</th>
                                                        <th>DOT Expiry Date</th>
                                                        <th>Transponder></th>
                                                        <th>Internal Notes </th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="restoretruckTable">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeRestoreTruck" >Close</button>                    
                </div>
            </div>
        </div>
    </div>

</div>
 <!--================================= end restore truck ========================== -->

 <!-- ========== strart addTruck type Modal ========== -->
<div class="modal fade" id="addTtruckTypeModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Truck Type</h5>
        <button type="button" class="close closeTruckType" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            @csrf
            <input type="hidden" name="_token" id="_tokenTruckType" value="{{ csrf_token() }}" />
            <div class="form-group col-md-12">
                <label>Name<span style="color:#ff0000">*</span></label>
                <div>
                    <input class="form-control" placeholder="truck type" type="text" id="addtruck_type" name="truck_type_name" required />
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-29 closeTruckType" data-dismiss="modal">Close</button>
        <button type="button" class="button-29 savetruckType " >Save </button>
      </div>
    </div>
  </div>
</div>

<!-- ==================== end add truck type model ===================== -->
