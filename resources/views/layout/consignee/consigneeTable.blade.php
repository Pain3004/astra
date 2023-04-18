<!------------------------------------------------------------------- Shipper & Consignee modal ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="View_ConsigneeModal">
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
                <div style="margin-top: 15px; margin-left: 15px;">
                    <button class="button-57_alt AddExternalCarrierBtn" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add </span></button>
                    <button class="button-57_alt restoreExternalCarrierBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="row1 row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                <table  class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

                                    <thead class="thead_th">
                                        <tr class="tr">
                                            <th >No</th>
                                            <th > Name</th>
                                            <th>Type</th>
                                            <th >Address</th>
                                            <th >Location</th>
                                            <th ><p style="width:100px;">Postal / Zip</p></th>
                                            <th ><p style="width:100px;">Contact Name</p></th>
                                            <th ><p style="width:100px;">Contact Email</p></th>
                                            <th >Telephone</th>
                                            <th >Ext</th>
                                            <th ><p style="width:100px;">Toll Free</p></th>
                                            <th ><p style="width:110px;">Fax</p></th>
                                            <th ><p style="width:130px;">Consignee Hours </p> </th>
                                            <th >Appt</th>
                                            <th ><p style="width:200px;">Major Instructions/Directions</p></th>
                                            <th >Status</th>
                                            <th ><p style="width:130px;">Consignee Notes</p></th>
                                            <th ><p style="width:130px;">Internal Notes</p></th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="consigneeTableData" class="tablecss">

                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="col-md-12">
                            <div class="card">
                                
                                <div class="card-body p-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body tabs-menu-body">
                                            <div>
                                                    <div class="table-responsive export-table">
                                                        <a href="#" class="button-57_alt createShipperModalBtn" data-toggle="modal" data-target="#">Add</a>
                                                        <a href="#" class="button-57_alt restoreConsigneeBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></a>
 -->

                                                        <!-- <input type="file" class="form-control float-right" id="Consigneefiles" name="Consigneefiles[]" multiple="" accept=".png, .jpg, .jpeg, .pdf" style="width: auto;">
                                                        <a href="#setupDriverModal" class="button-29 float-right" data-toggle="modal" data-target="#viewDriverApplicationModal"> XLSX format</a> &nbsp;&nbsp;&nbsp; -->

                                                        <!-- <table id="ShipperAndConsigneeTable" class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

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
                                                                    <th >Consignee Hours </th>
                                                                    <th >Appt</th>
                                                                    <th >Major Instructions/Directions</th>
                                                                    <th >Status</th>
                                                                    <th >Consignee Notes</th>
                                                                    <th >Internal Notes</th>

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="consigneeTableData">

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
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <!-- <button class="button-29 btn btn-success" style="vertical-align:middle"><span>Export</span></button> -->
                    </form>
                    <button type="button" class="button-29  closeShipperModal" >Close</button>
                    <span class="mandatory_admin">Note: XLSX files must contain atmost 1000 rows at a time.</span>
                    <nav aria-label="..." data-name="consignee_pagination" class="float-right">
                        <div class="pagination" id="consignee_pagination">

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--========================================= end list ================================ -->
<!-- =================== start restore ================================ -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestoreConsigneeModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Consignee </h4>
                    <button type="button" class="button-24 closeRestoreConsigneeModal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_RestoreConsigneeModal_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreConsigneeModal_company_ids" value="">
                    <input type="hidden" name="company_id" id="checked_RestoreConsigneeModal_type" value="">
                    <button id="restore_RestoreConsigneeModal_data"  class="button-57_alt restore_RestoreConsigneeModal_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore</span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
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
                                                    

                                                        <table class="table editable-table table-nowrap table-bordered table-edit wp-100" style="height:500px; width:1000px;">

                                                            <thead class="thead_th">
                                                                <tr class="tr">
                                                                    <th ><input type="checkbox" name="checkallIds[]" class="ConsigneeChecked"></th>
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
                                                            <tbody class="RestoreConsigneeTable" id="RestoreConsigneeTable">

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
                    <button type="button" class="button-29 closeRestoreConsigneeModal" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================== end restore ================================== -->
