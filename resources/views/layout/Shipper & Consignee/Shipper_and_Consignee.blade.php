<!------------------------------------------------------------------- Shipper & Consignee modal ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="Shipper_and_ConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Shipper & Consignee</h4>
                    <button type="button" class="button-24 closeShipperModal">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        <nav class="nav d-sm-flex d-block">
                                            <input type="hidden" class="editAddressType">
                                            <!-- <a class="nav-link border border-bottom-0 br-sm-5 me-2 active shipper_tab" data-bs-toggle="tab" href="#tab25" style="width: 15%; !important"> Shipper </a>
                                            <a class="nav-link border border-bottom-0 br-sm-5 me-2 consignee_tab" data-bs-toggle="tab" href="#tab26" style="width: 15% !important ;">Consignee</a> -->
                                        </nav>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                <!-- <div class="tab-pane active " id="tab25"> -->
                                                    <div class="table-responsive export-table">
                                                        <a href="#" class="button-57_alt createShipperModalBtn" data-toggle="modal" data-target="#">Add</a>
                                                        <a href="#" class="button-57_alt restoreshipperAndConsigneeBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></a>


                                                        <input type="file" class="form-control float-right" id="Shipperfiles" name="Shipperfiles[]" multiple="" accept=".png, .jpg, .jpeg, .pdf" style="width: auto;">
                                                        <a href="#setupDriverModal" class="button-29 float-right" data-toggle="modal" data-target="#viewDriverApplicationModal"> XLSX format</a> &nbsp;&nbsp;&nbsp;

                                                        <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

                                                            <thead class="thead_th">
                                                                <tr class="tr">
                                                                    <th >NO</th>
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

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="shipperTable">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                <!-- </div> -->
                                                <!-- <div class="tab-pane " id="tab26">
                                                    <div class="table-responsive export-table">
                                                        <a href="#" class="button-29 createShipperModalBtn" data-toggle="modal" data-target="#">Add</a>
                                                        <input type="file" class="form-control float-right" id="Shipperfiles" name="Shipperfiles[]" multiple="" accept=".png, .jpg, .jpeg, .pdf" style="width: auto;">
                                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#"> XLSX format</a> &nbsp;&nbsp;&nbsp;

                                                        <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

                                                            <thead class="thead_th">
                                                                <tr class="tr">
                                                                    <th >NO</th>
                                                                    <th >Consignee Name</th>
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

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="consigneeTable">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29 btn btn-success" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29 btn btn-secondary closeShipperModal" >Close</button>
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
                    <h4 class="modal-title">Add Shipper & Consignee</h4>
                    <button type="button" class="button-24 closeCreateShipperAndConsigneeModal">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu4 border-bottomo-sm">
                                        <!-- <nav class="nav d-sm-flex d-block">
                                            <input type="hidden" class="addressType" value="shipper">
                                            <a class="nav-link border border-bottom-0 br-sm-5 me-2 active  getValueShipper" data-bs-toggle="tab" href="#shipperTab1" style="width: 15%; !important"> Shipper </a>
                                            <a class="nav-link border border-bottom-0 br-sm-5 me-2 getValueConsignee" data-bs-toggle="tab" href="#consigneeTab1" style="width: 15% !important ;">Consignee</a>
                                        </nav> -->
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div class="tab-content">
                                                <!-- <div class="tab-pane active " id="shipperTab1"> -->
                                                    <div class="table-responsive export-table">
                                                        <form>
                                                            @csrf
                                                            <input type="hidden" name="_token" id="_token_AddShipperAndConsignee" value="{{ csrf_token() }}" />
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label>Name<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperName" placeholder="Shipper Name " type="text"  name="shipperName" required />
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
                                                                        <input class="form-control addshipperAddress" placeholder="Address  " type="text"  name="shipperAddress" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Location <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperLocation" placeholder="Location " type="text"  name="shipperLocation" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Postal / Zip <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addshipperPostal" type="text"  name="shipperPostal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Name </label>
                                                                    <div>
                                                                        <input class="form-control addshipperContact" type="text"  name="shipperContact">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Email</label>
                                                                    <div>
                                                                        <input class="form-control addshipperEmail" type="email"  name="shipperEmail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Telephone</label>
                                                                    <div>
                                                                        <input class="form-control addshipperTelephone" type="number"  name="shipperTelephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Ext</label>
                                                                    <div>
                                                                        <input class="form-control addshipperExt" type="text"  name="shipperExt">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Toll Free</label>
                                                                    <div>
                                                                        <input class="form-control addshipperTollFree" type="number"  name="shipperTollFree">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Fax</label>
                                                                    <div>
                                                                        <input class="form-control addshipperFax" type="number"  name="shipperFax">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label class="infoasConsignee">Reciving Hours</label>
                                                                    <label class="infoasShipper">Shipping Hours</label>
                                                                    <div>
                                                                        <input class="form-control addshipperShippingHours" type="text"  name="shipperShippingHours">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Appointments</label>
                                                                    <select class="form-control addshipperAppointments"  name="shipperAppointments">
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
                                                                        <label class="infoasConsignee">Add as Consignee</label>
                                                                        <label class="infoasShipper">Add as Shipper</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Status</label>
                                                                    <div>
                                                                    <select class="form-control addshipperstatus"  name="shipperstatus">
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
                                                <!-- </div> -->
                                                <!-- <div class="tab-pane " id="consigneeTab1">
                                                    <div class="table-responsive export-table">
                                                    <form>
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-2">
                                                                    <label>Consignee Name<span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeName" placeholder="Consignee Name " type="text"  name="consigneeName" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label for="trailertype">Address <span style="color:#ff0000">*</span>&nbsp; 
                                                                    </label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeAddress" placeholder="Address  " type="text"  name="consigneeAddress" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Location <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeLocation" placeholder="Location " type="text"  name="consigneeLocation" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Postal / Zip <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control addconsigneePostal" type="text"  name="consigneePostal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Name </label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeContact" type="text"  name="consigneeContact">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Email</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeEmail" type="email"  name="consigneeEmail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Telephone</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeTelephone" type="number"  name="consigneeTelephone">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Ext</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeExt" type="text"  name="consigneeExt">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Toll Free</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeTollFree" type="number"  name="consigneeTollFree">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Fax</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeFax" type="number"  name="consigneeFax">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Consignee Hours</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeShippingHours" type="text"  name="consigneeShippingHours">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Appointments</label>
                                                                    <select class="form-control addconsigneeAppointments"  name="consigneeAppointments">
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Major Instruction/Directions</label>
                                                                    <div>
                                                                        <input class="form-control addconsigneeIntersaction" type="text" placeholder="Major Instruction/Directions" name="consigneeIntersaction">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Duplicate Info </label>
                                                                    <div>
                                                                        <input class="addconsigneeASconsignee" type="checkbox" name="consigneeASconsignee" value="0">
                                                                        <label >Add as Shipper</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Status</label>
                                                                    <div>
                                                                    <select class="form-control addconsigneeStatus"  name="consigneestatus">
                                                                        <option  value="Active">Active</option>
                                                                        <option value="Inactive">Inactive</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Enter Receiving Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control addconsigneeNotes" type="textarea"  placeholder="Internal Note" name="consigneeNotes"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Internal Notes</label>
                                                                    <div>
                                                                        <textarea rows="2" cols="30" class="form-control addconsigneeInternalNotes" type="textarea"  placeholder="Internal Note" name="internal_note"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div> -->
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
                    <div class="row">
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
                                                                        <input type="text" value="Shipper"class="shipper_type_ed" readonly>
                                                                        <input type="text" value="Consignee"class="consignee_type_ed" readonly>
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
                                                                        <input class="form-control updateshipperLocation" placeholder="Location " type="text"  name="shipperLocation" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Postal / Zip <span style="color:#ff0000">*</span></label>
                                                                    <div>
                                                                        <input class="form-control updateshipperPostal" type="text"  name="shipperPostal" required />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Name </label>
                                                                    <div>
                                                                        <input class="form-control updateshipperContact" type="text"  name="shipperContact">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Contact Email</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperEmail" type="email"  name="shipperEmail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Telephone</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperTelephone" type="number"  name="shipperTelephone">
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
                                                                        <input class="form-control updateshipperTollFree" type="number"  name="shipperTollFree">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label>Fax</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperFax" type="number"  name="shipperFax">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2 ">
                                                                    <label> Hours</label>
                                                                    <div>
                                                                        <input class="form-control updateshipperShippingHours" type="text"  name="shipperShippingHours">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-2">
                                                                    <label>Appointments</label>
                                                                    <select class="form-control updateshipperAppointments"  name="shipperAppointments">
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
                    <h4 class="modal-title">Restore Shipper & Consignee</h4>
                    <button type="button" class="button-24 closeRestoreShipperModal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_RestoreShipperModal_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreShipperModal_company_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreShipperModal_type" value="">
                    <button id="restore_RestoreShipperModal_data"  class="button-57_alt restore_RestoreShipperModal_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore</span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
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
                                                            <tbody id="RestoreshipperTable">

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
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 btn btn-secondary closeRestoreShipperModal" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=================================== end restore =================================== -->