 
 
 
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
    <div class="modal fade" data-backdrop="static" id="iftaTollModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
 
 
                    <h4 class="modal-title">Fuel Receipts</h4>
 
                    <h4 class="modal-title">Fuel Toll</h4>
 
 
                    <h4 class="modal-title">Fuel Toll</h4>
 
                    <button type="button" class="button-24 iftaTollClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
 
 
                    <a href="#addDriverModal" class="button-57" data-toggle="modal"data-target="#addDriverModal"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#contractCategoryModal" class="button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a>
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
                        <!-- <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div> -->
 
                @if($insertUser== 1)
                    <a href="#" class="button-57_alt createIftaTollModalBtn" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Fuel Toll</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt restoreIftaTollData" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>
                    <input type="hidden" name="checked_id" id="delete_checked_ifta_toll_ids" value="">
                    <input type="hidden" name="company_id" id="delete_checked_iftaToll_company_ids" value="">
                    <button id="delete_IftaTollData_btn"  class="button-57_alt delete_IftaTollData_btn" disabled><i class="fa fa-trash" aria-hidden="true"></i><span>Delete fuel vendor</span></button>

                @endif
                    <!-- <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#contractCategoryModal" class="button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a> -->
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
 
 
                    </div>

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
 
 
                                        <thead>
                                        <tr>
 
                                        <thead class="thead_th">
                                        <tr class="tr">
 
 
                                        <thead class="thead_th">
                                        <tr class="tr">
 
                                           
                                            <th scope="col" col width="50"> <input type="checkbox" name="all_ids[]" class="delete_all_checked_ids"></th>
                                            <th >No</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction Type</th>
                                            <th>Location</th>
                                            <th>Transponder</th>
                                            <th>License Plate</th>
                                            <th>Amount</th>
                                            <th>Truck No.</th>
                                            <th>Invoice No.</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="iftaTollTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th ></th>
                                            <th >No</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction Type</th>
                                            <th>Location</th>
                                            <th>Transponder</th>
                                            <th>License Plate</th>
                                            <th>Amount</th>
                                            <th>Truck No.</th>
                                            <th>Invoice No.</th>
                                            <th>Action</th>
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
 
 
 
                <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form>
 
 
                    <button type="button" class="button-29 iftaTollClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--==================================== start ifta toll create ====================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="createIftaTollFormModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Toll</h4>
                    <button type="button" class="closeIftaToll" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="" >
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_createIftaToll" value="{{ csrf_token() }}" />
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-4">
                                                    <label >Invoice No</label>
                                                    <select class="form-control createIftaTollNo fuel_recepit_invoice_no_list" name="invoiceNo "> 
                                                        <option>select one </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Date<span style="color:#ff0000">*</span></label>
                                                    <input class="form-control createIftaTollDate"  type="date"  name="tollDate" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> Time  </label>
                                                    <input class="form-control createIftaTollTime"  type="time"  name="transactionTime">
                                                </div>
                                                 <div class="form-group col-md-2">
                                                    <label >Transaction Type  <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control createIftaTollTransactionType" name="transType" required > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location  <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control createIftaTollLocationName" name="location" required > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Truck Number<span style="color:#ff0000">*</span>
                                                        </label>
                                                    <input type="text" class="form-control createIftaTollTruckNumber"  name="truckno" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Transponder     </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control createIftaTollTransponder" type="text" 
                                                            name="transponder" required />
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>License Plate <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control createIftaTollLicensePlate"  type="text"
                                                            name="licensePlate" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Amount <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control createIftaTollAmount " name="amount " type="number" required>
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
                    <button type="button" style="vertical-align:middle" class="button-29 saveIftaToll"  >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeIftaToll button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--================================ end ifta toll create =============================== -->

<!--========================== start edit  ifta toll create ====================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="updateIftaTollFormModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Toll</h4>
                    <button type="button" class="closeUpdateIftaToll" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="" >
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_updateIftaToll" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="iftaTollId" class="updateiftaTollId" >
                                            <input type="hidden" name="iftaComId" class="updateIftaComId" >
                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-4">
                                                    <label >Invoice No</label>
                                                    <select class="form-control updateIftaTollNo fuel_recepit_invoice_no_list" name="invoiceNo "> 
                                                        <option>select one </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Date<span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateIftaTollDate"  type="date"  name="tollDate" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> Time  </label>
                                                    <input class="form-control updateIftaTollTime"  type="time"  name="transactionTime">
                                                </div>
                                                 <div class="form-group col-md-2">
                                                    <label >Transaction Type  <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control updateIftaTollTransactionType" name="transType" required > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Location  <span style="color:#ff0000">*</span></label>
                                                    <input type="text" class="form-control updateIftaTollLocationName" name="location" required > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Truck Number<span style="color:#ff0000">*</span>
                                                        </label>
                                                    <input type="text" class="form-control updateIftaTollTruckNumber"  name="truckno" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Transponder     </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control updateIftaTollTransponder" type="text" 
                                                            name="transponder" required />
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>License Plate <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control updateIftaTollLicensePlate"  type="text"
                                                            name="licensePlate" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Amount <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control updateIftaTollAmount " name="amount " type="number" required>
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
                    <button type="button" style="vertical-align:middle" class="button-29 updateIftaToll"  >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeUpdateIftaToll button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--============================== end ifta toll create ============================= -->


<!--=========================== start restore ifta toll ============================ -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restoreiftaTollModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Ifta Tolls</h4>
                    <button type="button" class="button-24 closeIftaTollRestore" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                        <input type="hidden" name="checked_id" id="checked_ifta_toll_ids" value="">
                        <input type="hidden" name="company_id" id="checked_iftaToll_company_ids" value="">
                        <button id="restoreIftaTollData_btn"  class="button-57_alt restoreIftaTollData_btn" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore fuel vendor</span></button>

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
                                        <tr  class="tr">
                                            <th ><input type="checkbox" name="all_ids[]" class="all_checked_ids"></th>
                                            <th>Transaction Date</th>
                                            <th>Transaction Type</th>
                                            <th>Location</th>
                                            <th>Transponder</th>
                                            <th>License Plate</th>
                                            <th>Amount</th>
                                            <th>Truck No.</th>
                                            <th>Invoice No.</th>
                                        </tr>
                                        </thead>

                                        <tbody id="restoreIftaTollTable">

                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeIftaTollRestore">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--=================================== end restore ifta toll ===================== -->