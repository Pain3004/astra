<!------------------------------------------------------------------- Shipper & Consignee modal ------------------------------------------------------------------->

<div class="container">
    <div class="modal fade" data-backdrop="static" id="Shipper_and_ConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h4 class="modal-title">Consignee</h4> -->
                    
                    <span class="model-statistics1" data-name="shipper_total" id="total_shipper"></span>

                    <button type="button" class="button-24 closeShipperModal">&times;</button>
                </div>
                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        <nav class="nav d-sm-flex d-block">
                                            <input type="hidden" class="editAddressType">
                                            <button class="button-29 shipperConsignee_navbar" href="#ShipperAndConsigneeTable" id=""> Shipper </button>
                                            <button class="button-29 consignee_viewList" style="margin-left:6px;" >Consignee</button>
                                        </nav>
                                    </div>
                                </div>
                <div>
                <div class="panel-body tabs-menu-body">
                <a href="#" class="button-29  createShipperModalBtn" data-toggle="modal" data-target="#">Add</a>
                                                        <a href="#" class="button-29  restoreshipperAndConsigneeBtn" style="height:37px;"><span>Restore </span></a>


                                                        <input type="file" class="form-control float-right" id="Shipperfiles" name="Shipperfiles[]" multiple="" accept=".png, .jpg, .jpeg, .pdf" style="width: auto;">
                                                        <a href="#setupDriverModal" class="button-29 button-58_alt float-right" data-toggle="modal" data-target="#viewDriverApplicationModal"> XLSX format</a> &nbsp;&nbsp;&nbsp;

                </div>
</div>
<div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th">
                  <tr class="tr" >
                                    <th ><p style="margin-top:18px;">No</p></th>
                                    <th > <p style="width:100px;  margin-top:18px;">Name</p></th>
                                    <th><p style="width:100px; margin-top:18px;">Type</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Address</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Location</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Postal / Zip</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Contact Name</p></th>
                                  <th ><p style="width:100px; margin-top:18px;">Contact Email</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Telephone</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Ext</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Toll Free</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Fax</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Shipping Hours </p></th>
                                    <th ><p >Appt</p></th>
                                    <th ><p style="width:200px; margin-top:18px;">Major Instructions/Directions</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Status</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Shipping Notes</p></th>
                                    <th ><p style="width:100px; margin-top:18px;">Internal Notes</p></th>
                            
                                    <th>Action</th>
                                </tr>
                  </thead>
                  <tbody id="shipperTable" class="load-box"></tbody>
                </table>
              </div>
               
                <div class="modal-footer">
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29 btn btn-success button-29 " style=" background: #1b71bc; width: 115px; height:35px; font-size: 12px;"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29  closeShipperModal" style=" background: #1b71bc; width: 115px; font-size: 12px;" >Close</button>
                    <span class="mandatory_admin">Note: XLSX files must contain atmost 1000 rows at a time.</span>
                    <nav aria-label="..." data-name="shipper_pagination" class="float-right">
                        <div class="pagination" id="shipper_pagination">

                        </div>
                    </nav>
                </div>
            </div>             
                
            </div>
        </div>
    </div>
</div>
<!--========================================= end list ================================ -->


<!--====================== start store shipper & consignee =========================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="AddShipper_and_ConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h4 class="modal-title">Add Shipper & Consignee</h4> -->
                    <button type="button" class="button-24 closeCreateShipperAndConsigneeModal">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                    <div class="table-responsive export-table"style="width=100%">
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="_token" id="_token_AddShipperAndConsignee" value="{{ csrf_token() }}" />
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label>Name<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperName" placeholder="Enter Name " type="text"  name="shipperName" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Type<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <select class="form-control shipperConsiType addshipperConsiType" placeholder="Shipper Name " type="text" required >
                                                                            <option value="shipper">Shipper</option>
                                                                            <option value="consignee">Consignee</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Address <span style="color:#ff0000">*</span>&nbsp; 
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control addshipperAddress" placeholder="Enter Address  " type="text"  name="shipperAddress" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Location <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperLocation location_view" placeholder="Enter Location" data-location="UpdateConsiAnaddshipperLocation" id="UpdateConsiAnaddshipperLocation" placeholder="Location " type="text"  name="shipperLocation" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Postal / Zip <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperPostal" type="number" placeholder="Enter Postal/Zip"  name="shipperPostal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Name </label>
                                                                    <div>
                                                                        <input class="form-control addshipperContact" placeholder="Enter Contact Name " type="text"  name="shipperContact">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Email</label>
                                                                    <div>
                                                                        <input class="form-control addshipperEmail email" placeholder="Enter Contact Email" type="email"  name="shipperEmail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Telephone</label>
                                                                    <div>
                                                                        <input class="form-control addshipperTelephone" type="text" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  name="shipperTelephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Ext</label>
                                                                    <div>
                                                                        <input class="form-control addshipperExt" placeholder="Enter Ext" type="text"  name="shipperExt">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Toll Free</label>
                                                                    <div>
                                                                        <input class="form-control addshipperTollFree" type="text" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  name="shipperTollFree">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Fax</label>
                                                                    <div>
                                                                        <input class="form-control addshipperFax"  placeholder="(999) 999-9999" data-mask="(999) 999-9999" type="text"  name="shipperFax">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label class="infoasConsignee">Reciving Hours</label>
                                                                    <label class="infoasShipper">Shipping Hours</label>
                                                                    <div>
                                                                        <input class="form-control addshipperShippingHours"  placeholder="Enter Hours"  type="text"  name="shipperShippingHours">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Appointments</label>
                                                                    <select class="form-control addshipperAppointments"  name="shipperAppointments">
                                                                        <option selected="" disabled>---select---</option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Major Instruction/Directions</label>
                                                                    <div>
                                                                        <input class="form-control addshipperIntersaction" type="text" placeholder="Major Instruction/Directions" name="shipperIntersaction">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Duplicate Info </label>
                                                                    <div>
                                                                        <input class="addshipperASconsignee" value="0" type="checkbox" name="shipperASconsignee">
                                                                        <label class="infoasShipper">Add as Consignee</label>
                                                                        <label class="infoasConsignee">Add as Shipper</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Status</label>
                                                                    <div>
                                                                    <select class="form-control addshipperstatus"  name="shipperstatus">
                                                                        <option selected="" disabled>---Select---</option>
                                                                        <option  value="Active">Active</option>
                                                                        <option value="Inactive">Inactive</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label class="infoasShipper">Shipping Notes</label>
                                                                    <label class="infoasConsignee">Consignee Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control addshippingNotes" type="textarea"  placeholder="Internal Note" name="shippingNotes"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Internal Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control addinternal_note" type="textarea"  placeholder="Internal Note" name="internal_note"></textarea>
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeCreateShipperAndConsigneeModal" >Close</button>  
                    <button type="button" class="button-29 SaveCreateShipperAndConsigneeModal" >Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--========================= end store Shipper & consignee ============================ -->


<!-- ====================== update shipper & consignee ====================================-->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="UpdateShipper_and_ConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Shipper & Consignee</h4>
                    <button type="button" class="button-24 closeUpdateCreateShipperAndConsigneeModal">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        <nav class="nav d-sm-flex d-block">
                                        </nav>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                    <div class="table-responsive export-table">
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="_token" id="_token_UpdateAddShipperAndConsignee" value="{{ csrf_token() }}" />
                                                            <input type="hidden" class="shipperYaConsignee" class="shipper">
                                                            <input type="hidden" class="ship_con_id">
                                                            <input type="hidden" class="shippAndConCompID">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label>Name<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control updateshipperName" placeholder="Shipper Name " type="text"  name="shipperName" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Type<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input type="text" class="form-control shipper_type_ed"  value="Shipper"  readonly>
                                                                        <input type="text" class="form-control consignee_type_ed" value="Consignee"  readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Address <span style="color:#ff0000">*</span>&nbsp; 
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control updateshipperAddress" placeholder="Address  " type="text"  name="shipperAddress" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Location <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control updateshipperLocation location_view" placeholder="Enter Location" data-location="Update2ConsiAnaddshipperLocation" id="Update2ConsiAnaddshipperLocation  " type="text"  name="shipperLocation" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Postal / Zip <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control updateshipperPostal" type="number"  name="shipperPostal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Name </label>
                                                                    <div>
                                                                        <input class="form-control updateshipperContact" type="text" placeholder="Enter Contact Name" name="shipperContact">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Email</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperEmail email" placeholder="Enter Contact Email" type="email"  name="shipperEmail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Telephone</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperTelephone" type="text"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  name="shipperTelephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Ext</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperExt" type="text"  name="shipperExt">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Toll Free</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperTollFree"  placeholder="(999) 999-9999" data-mask="(999) 999-9999" type="text"  name="shipperTollFree">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Fax</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperFax" type="text"   placeholder="(999) 999-9999" data-mask="(999) 999-9999" name="shipperFax">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label> Hours</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperShippingHours" type="text" placeholder="Enter Hours" name="shipperShippingHours">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Appointments</label>
                                                                    <select class="form-control updateshipperAppointments"  name="shipperAppointments">
                                                                        <option selected="" disabled>---select---</option>
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Major Instruction/Directions</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperIntersaction" type="text" placeholder="Major Instruction/Directions" name="shipperIntersaction">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Status</label>
                                                                    <div>
                                                                    <select class="form-control updateshipperstatus"  name="shipperstatus">
                                                                        <option selected="" disabled>---select---</option>
                                                                        <option  value="Active">Active</option>
                                                                        <option value="Inactive">Inactive</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label> Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control updateshippingNotes" type="textarea"  placeholder="Internal Note" name="shippingNotes"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Internal Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control updateinternal_note" type="textarea"  placeholder="Internal Note" name="internal_note"></textarea>
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeUpdateCreateShipperAndConsigneeModal" >Close</button>  
                    <button type="button" class="button-29 UpdateCreateShipperAndConsigneeModal" >Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======================= end update shipper & consignee ================================ -->


<!--============================== start restore ========================================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestoreShipper_and_ConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Shipper </h4>
                    <button type="button" class="button-24 closeRestoreShipperModal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_RestoreShipperModal_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreShipperModal_company_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreShipperModal_type" value="">
                    <button id="restore_RestoreShipperModal_data"  class="button-29  restore_RestoreShipperModal_data" disabled><span>Restore</span></button>
                </div>
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th" style="height:40px;">
                  <tr class="tr">
                                                                    <th ><input type="checkbox" name="checkallIds[]" class="shipperAndConsigneeChecked"></th>
                                                                    <th > Name</th>
                                                                    <th>Type</th>
                                                                    <th >Address</th>
                                                                    <th >Location</th>
                                                                    <th >Postal / Zip</th>
                                                                    <th >Contact Name</th>
                                                                    <th >Contact Email</th>
                                                                    <th >Telephone</th>
                                                                    <th >Ext</th>
                                                                    <th >Toll Free</th>
                                                                    <th >Fax</th>
                                                                    <th >Shipping Hours </th>
                                                                    <th >Appt</th>
                                                                    <th >Major Instructions/Directions</th>
                                                                    <th >Status</th>
                                                                    <th >Shipping Notes</th>
                                                                    <th >Internal Notes</th>
                                                                </tr>
                  </thead>
                  <tbody id="RestoreshipperTable" class="load-box"></tbody>
                </table>
              </div>
                <!-- <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        <nav class="nav d-sm-flex d-block">
                                            <input type="hidden" class="editAddressType">
                                        </nav>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                    <div class="table-responsive export-table">
                                                    

                                                        <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

                                                            <thead class="thead_th">
                                                                <tr class="tr">
                                                                    <th ><input type="checkbox" name="checkallIds[]" class="shipperAndConsigneeChecked"></th>
                                                                    <th > Name</th>
                                                                    <th>Type</th>
                                                                    <th >Address</th>
                                                                    <th >Location</th>
                                                                    <th >Postal / Zip</th>
                                                                    <th >Contact Name</th>
                                                                    <th >Contact Email</th>
                                                                    <th >Telephone</th>
                                                                    <th >Ext</th>
                                                                    <th >Toll Free</th>
                                                                    <th >Fax</th>
                                                                    <th >Shipping Hours </th>
                                                                    <th >Appt</th>
                                                                    <th >Major Instructions/Directions</th>
                                                                    <th >Status</th>
                                                                    <th >Shipping Notes</th>
                                                                    <th >Internal Notes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="RestoreshipperTable" id="RestoreshipperTable">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-footer">
                    <button type="button" class="button-29 closeRestoreShipperModal" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=================================== end restore =================================== -->