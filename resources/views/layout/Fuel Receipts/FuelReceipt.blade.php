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
    <!-- <div class="modal fade" data-backdrop="static" id="Fuel Receipts"> -->
    <div class="modal fade" data-backdrop="static" id="fuelReceiptModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fuel Receipts</h4>
                    <button type="button" class="button-24 fuelReceiptClose" >&times;</button>
                </div>
                <div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    @if($insertUser== 1)
                        <a href="#" class="button-57_alt create_fuel_receipt_modal_form_btn" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Fuel Receipts</span></a>
                    @endif 
                    
                    @if($deleteUser== 1)    
                        <a href="#" class="button-57_alt restoreFuelReceiptData" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>
                        <input type="hidden" name="checked_id" id="checked_fuelRecepit_delete" value="">
                        <input type="hidden" name="company_id" id="checked_fuelRecepit_company_ids_delete" value="">
                        <a id="delete_Fuel_ReceiptData"  class="button-57_alt delete_Fuel_ReceiptData" disabled><i class="fa fa-trash" aria-hidden="true"></i><span>Delete </span></a>

                    @endif
                    <!-- <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="searchText_Fuel" placeholder="search" style="margin-left: 5px;"
                    data-name="fuel_receipt_search">
                    <select style="margin-left: 3px;" class="form-control col-md-2 col-sm-4 col-lg-2 float-right"
                        name="shipper_search" id="shipper_search" 
                        data-name="fuel_receipt_select">
                        <option value="">---select---</option>
                        <option value="driverNumber">Driver Number</option>
                        <option value="cardNo">Card No</option>
                        <option value="locationName">Location Name</option>
                        <option value="locationCity">Location City</option>
                        <option value="locationState">Location State</option>
                        <option value="invoiceNo">Invoice No</option>
                    </select> -->
                    </div>

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="fuelReceiptPagiTable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                        <tr >
                                           
                                            <th scope="col" col width="50"> <input type="checkbox" name="fuel_ids[]" class="fuel_recepit_ids_delete"></th>
                                            <!-- <th scope="col" col width="50"> <input type="checkbox" disabled></th>     -->

                                            <th >No</th>
                                            <th >Driver Name</th>
                                            <th >Transaction Date </th>
                                            <th >Payment Type</th>
                                            <th >Card Number </th>
                                            <th >Truck Number </th>
                                            <th >Driver Number</th>
                                            <th >Transaction Time</th>
                                            <th >Location Name </th>
                                            <th >Location City</th>
                                            <th > Location State </th>
                                            <th >Fuel Vendor</th>
                                            <th >Fuel Type</th>
                                            <th >Amount</th>
                                            <th >Quantity</th>
                                            <th >Total Amount </th>
                                            <th >Transaction Discount</th>
                                            <th >Transaction Fee</th>
                                            <th >Transaction Gross </th>
                                            <th >Invoice No </th>
                                            <th >Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="FuelReceTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th ></th>
                                            <th >No</th>
                                            <th >Driver Name</th>
                                            <th >Transaction Date </th>
                                            <th >Card Number </th>
                                            <th >Number </th>
                                            <th >Driver Number</th>
                                            <th >Transaction Time</th>
                                            <th >Location Name </th>
                                            <th >Location City</th>
                                            <th > Location State </th>
                                            <th >Fuel Vendor</th>
                                            <th >Fuel Type</th>
                                            <th >Amount</th>
                                            <th >Quantity</th>
                                            <th >Total Amount </th>
                                            <th >Transaction Discount</th>
                                            <th >Transaction Fee</th>
                                            <th >Transaction Gross </th>
                                            <th >Invoice No </th>
                                            <th >Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <!-- <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf-->
                    @if($exportUser == 1) 
                        <button class="button-29" style="vertical-align:middle" id="exportFuelReceiptsDetails"><span>Export</span></button>
                    @endif
                <!-- </form> -->
                    <button type="button" class="button-29 fuelReceiptClose">Close</button>
                    <nav aria-label="..." class="float-right">
                        <div class="pagination" id="paginate" data-name="fuel_receipt_pagination">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

<!--================================ create fuel receipts modal ======================= -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="Create_FuelReceiptsModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Fuel Receipts </h4>
                    <button type="button" class="closeFuelReceiptsModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form   >
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_addFuelReceipts" value="{{ csrf_token() }}" />
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Driver Name<span style="color:#ff0000">*</span>
                                                    </label>
                                                    <div>
                                                    <input type="hidden" class="form-control driver_name_fuelReceipt" name="driverName"> 
                                                       <select class="form-control addFuelReceiptDriver_name cardHolderName cardHolderChangeCardtYPE" name="driverName"> 
                                                         <option>select one </option>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Payment Type<span style="color:#ff0000">*</span>
                                                    </label>
                                                    <div>
                                                       <select class="form-control paymentType apayment_type_fuel_re" name="payment_type"> 
                                                         <option  value="unselected">---select----- </option>
                                                         <option value="Receipt">Receipt </option>
                                                         <option value="Cash Advance">Cash Advance</option>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Driver No<span style="color:#ff0000">*</span>
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control  add_fuelReceiptDriverNumber" type="text" 
                                                            name="driverNo" readonly />
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2 driver_nu_cashAd" >
                                                    <label>Card Number <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <!-- <input class="form-control addFuelReceiptCardNumber"  type="text"  name="cardNumber" readonly /> -->
                                                         <select class="form-control total_cards_fuel_re addFuelReceiptCardNumber" name="cardNumber"> 
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 driver_nu_cashAd">
                                                    <label>Fuel Vendor<span style="color:#ff0000">*</span> </label>
                                                    <div>
                                                        <input class="form-control  seleted_fuel_vend_type addFuelReceiptFuelVendor" type="text" name="fuelVendor" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Fuel Type</label>
                                                    <div>
                                                        <input class="form-control addFuelReFuelType" type="text" name="fuelType">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Truck Number<span style="color:#ff0000">*</span>
                                                        </label>
                                                    <input type="text" class="form-control addFuelReceiptTruckNumber"    list="truck_nummberFuelReceipt"name="truckNumber" required>
                                                    <datalist id="truck_nummberFuelReceipt">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <!-- row 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label >Date<span style="color:#ff0000">*</span></label>
                                                    <input class="form-control addFuelReceiptDate"  type="date"  name="date" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Transaction Time <span style="color:#ff0000">*</span> </label>
                                                    <input class="form-control addFuelReceiptTransactionTime"  type="time"  name="transactionTime">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location Name <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control addFuelReceiptLocationName location_view" data-location="fuelAddLocationRecepit" id="fuelAddLocationRecepit" name="locationName" required >
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location City</label>
                                                    <input class="form-control addFuelReceiptLocationCity location_view" data-location="fuel_receipt_dlocation" id="fuel_receipt_dlocation" name="locationCity" type="text">
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Location State <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control addFuelReceiptLocationState registered_state" name="locationState" list="registered_state"  required autocomplete="off"   > 
                                                </div>
                                               
                                                <div class="form-group col-md-2">
                                                    <label >Quantity <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control addFuelReceiptQuantity " name="quantity " type="number" required>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Amount <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control addFuelReceiptAmount " name="amount " type="number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Total Amount </label>
                                                    <input class="form-control addFuelReceipttotalAmount " name="totalAmount " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Discount </label>
                                                    <input class="form-control addFuelReceipttransactionDiscount " name="transactionDiscount " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Fee </label>
                                                    <input class="form-control addFuelReceipttransactionFee " name="transactionFee " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Gross </label>
                                                    <input class="form-control addFuelReceipttransactionGross " name="transactionGross " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Invoice No</label>
                                                    <select class="form-control addFuelReceiptinvoiceNo fuel_recepit_invoice_no_list" name="invoiceNo "> 
                                                        <!-- <option>select one </option> -->
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
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29 saveFuelReceiptsModal"  >save</button>
                    <button type="button"style="vertical-align:middle" class=" closeFuelReceiptsModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
 <!--============================ end create fuel receipts =========================== -->



 <!--================================ update fuel receipts modal ======================= -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="update_FuelReceiptsModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Fuel Receipts </h4>
                    <button type="button" class="closeUpdateFuelReceiptsModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form   >
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_updateFuelReceipts" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="fuel_recepit_id" class="fuel_recepit_id_edit" >
                                            <input type="hidden" name="comp_id_furl_re" class="comp_id_furl_re_edit" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Driver Name<span style="color:#ff0000">*</span>
                                                        <!-- <span style="color:#ff0000">*</span> -->
                                                    </label>
                                                    <div>
                                                    <input type="hidden" class="form-control driver_name_fuelReceipt_edit" name="driverName"> 
                                                       <select class="form-control updateFuelReceipt_Driver_name cardHolderName cardHolderChangeCardtYPE" name="driverName"> 
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Payment Type<span style="color:#ff0000">*</span>
                                                    </label>
                                                    <div>
                                                       <select class="form-control paymentType updateapayment_type_fuel_re" name="payment_type"> 
                                                         <option value='unselected'>----select-----</option>
                                                         <option value="Receipt">Receipt </option>
                                                         <option value="Cash Advance">Cash Advance</option>
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Driver No
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control update_fuelReceiptDriverNumber " type="text" 
                                                            name="driverNo" readonly />
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2 driver_nu_cashAd">
                                                    <label>Card Number</label>
                                                    <div>
                                                            <select class="form-control total_cards_fuel_re updateFuelReceiptCardNumber" name="cardNumber"> 
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 driver_nu_cashAd ">
                                                    <label>Fuel Vendor </label>
                                                    <div>
                                                        <input class="form-control seleted_fuel_vend_type updateFuelReceiptFuelVendor" type="text" name="fuelVendor" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Fuel Type</label>
                                                    <div>
                                                        <input class="form-control updateFuelReFuelType" type="text" name="fuelType">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Truck Number<span style="color:#ff0000">*</span>
                                                        </label>
                                                    <input type="text" class="form-control updateFuelReceiptTruckNumber" list="truck_nummberFuelReceipt"  name="truckNumber" required>
                                                    <datalist id="truck_nummberFuelReceipt">
                                                    </datalist>
                                                </div>
                                            </div>
                                            <!-- row 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label >Date<span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateFuelReceiptDate"  type="date"  name="date" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Transaction Time <span style="color:#ff0000">*</span> </label>
                                                    <input class="form-control updateFuelReceiptTransactionTime"  type="time"  name="transactionTime">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location Name <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control updateFuelReceiptLocationName location_view" id="fuelUpdateLocationRecepit" data-location="fuelUpdateLocationRecepit" name="locationName" required > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location City</label>
                                                    <input class="form-control updateFuelReceiptLocationCity" name="locationCity" type="text">
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Location State <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateFuelReceiptLocationState registered_state" name="locationState" list="registered_state"  required autocomplete="off" > 
                                                        <!-- <option> select one</option>
                                                    </select> -->
                                                </div>
                                               
                                                <div class="form-group col-md-2">
                                                    <label >Quantity <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateFuelReceiptQuantity " name="quantity " type="number" required>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Amount <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateFuelReceiptAmount " name="amount " type="number" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Amount </label>
                                                    <input class="form-control updateFuelReceipttotalAmount " name="totalAmount " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Discount </label>
                                                    <input class="form-control updateFuelReceipttransactionDiscount " name="transactionDiscount " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Fee </label>
                                                    <input class="form-control updateFuelReceipttransactionFee " name="transactionFee " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Transaction Gross </label>
                                                    <input class="form-control updateFuelReceipttransactionGross " name="transactionGross " type="number" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >Invoice No</label>
                                                    <select class="form-control UpdateFuelReceiptinvoiceNo fuel_recepit_invoice_no_list" name="invoiceNo " id="UpdateFuelReceiptinvoiceNo"> 
                                                        <option>select one </option>
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
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29 UpdateFuelReceiptsModal"  >Update</button>
                    <button type="button"style="vertical-align:middle" class=" closeUpdateFuelReceiptsModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
 <!--============================ end edit fuel receipts =========================== -->


 <!--============================= start restore fuel recepit data =============== -->
 <div class="container">
    <!-- The Modal -->
    <!-- <div class="modal fade" data-backdrop="static" id="Fuel Receipts"> -->
    <div class="modal fade" data-backdrop="static" id="restore_fuelReceiptModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Fuel Receipts</h4>
                    <button type="button" class="button-24 restorefuelReceiptClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_fuelRecepit" value="">
                    <input type="hidden" name="company_id" id="checked_fuelRecepit_company_ids" value="">
                    <button id="restore_Fuel_ReceiptData"  class="button-57_alt restore_Fuel_ReceiptData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>
                    
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="RestorefuelReceiptPagiTable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th ><input type="checkbox" name="fuel_ids[]" class="fuel_recepit_ids"></th>
                                                <th >Driver Name</th>
                                                <th >Transaction Date </th>
                                                <th >Card Number </th>
                                                <th >Truck Number </th>
                                                <th >Driver Number</th>
                                                <th >Transaction Time</th>
                                                <th >Location Name </th>
                                                <th >Location City</th>
                                                <th > Location State </th>
                                                <th >Fuel Vendor</th>
                                                <th >Fuel Type</th>
                                                <th >Amount</th>
                                                <th >Quantity</th>
                                                <th >Total Amount </th>
                                                <th >Transaction Discount</th>
                                                <th >Transaction Fee</th>
                                                <th >Transaction Gross </th>
                                                <th >Invoice No </th>
                                            </tr>
                                        </thead>

                                        <tbody id="restoreFuelReceTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restorefuelReceiptClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
  <!--============================ end restore fuel recepit data ================= -->