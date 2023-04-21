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
    <div class="modal fade" data-backdrop="static" id="FuelCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fuel Card</h4>
                    <button type="button" class="button-24 fuelCardClose" >&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    @if($insertUser== 1)
                        <a href="#" class="button-57_alt AddFuelCardFormModal" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Fuel Card </span></a>
                    @endif 
                    
                    @if($deleteUser== 1)    
                        <a href="#" class="button-57_alt restoreFuelCardData" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>
                    @endif
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
                                            <tr class="tr">
                                                <th scope="col" col width="40">No</th>
                                                <th scope="col" col width="100">Card Holder Name</th>
                                                <th scope="col" col width="100">IFTA Card No</th>
                                                <th scope="col" col width="100">CardType</th>
                                                <th scope="col" col width="40">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="FuelCardTable">

                                        </tbody>
                                        <!-- <tfoot>
                                            <tr class="tr">
                                                <th>No</th>
                                                <th>Card Holder Name</th>
                                                <th>IFTA Card No</th>
                                                <th>Card Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
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
                        @csrf
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                        @endif
                    </form> -->
                    <button type="button" class="button-29 fuelCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
 <!-- ================= start add fuelCard ========================================= -->
 <div class="modal fade" id="AddFuelCard"   role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Fuel Card User</h5>
                <button type="button" class="close closeAddFuelCard" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_token_addFuelCards" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label for="">Card Holder Name  <span style="color:#ff0000">*</span> </label>
                        <div class="dropdown show">
                            <input list="card_Holder" placeholder="Search here..."  class="form-control  addFuel_Card_holder_name "  name="" onkeyup="doSearch(this.value,'card_Holder')" autocomplete="off">
                            <datalist id="card_Holder"></datalist>
                        </div>
                        <div>
                            <input type= "hidden" class="form-control addFuelCard_employe "  name="employeeNo" readonly required />
                        </div>
                        <label>IFTA Card Number<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control add_IFTA_Card_Number " type="number" name="iftaCardNumber" required />
                        </div>
                        <label for="">Card Type <span style="color:#ff0000">*</span></label>
                        <div class="dropdown show">
                            <input list="card_type" placeholder="Search here..."  class="form-control  add_Fuel_Card_Type " id="card_vendar_addData"  name="" onkeyup="doSearch(this.value,'card_type')" autocomplete="off">
                            <datalist id="card_type"></datalist>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeAddFuelCard" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 FuelCardSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================ end add fuelCard  ===================== -->


<!--======================================= edit fual card ========================== -->
<div class="modal fade" id="UpdateFuelCard"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Edit Fuel Card User</h5>
                <button type="button" class="close closeUpdateFuelCard" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenEdit_fuel_card" value="{{ csrf_token() }}" />
                    <input type="hidden" name="fuel_card_id"  class="fuel_card_id_edit">
                    <input type="hidden" name="company_id" class="fuel_card_company_id">
                    <div class="form-group col-md-12">                         
                        <label for="">Card Holder Name <span style="color:#ff0000">*</span>  </label>
                        <div class="dropdown show">
                            <input list="update_cardHolder" placeholder="Search here..."  class="form-control  updateFuel_Card_holder_name "  name="" onkeyup="doSearch(this.value,'update_cardHolder')" autocomplete="off">
                            <datalist id="update_cardHolder"></datalist>
                        </div>
                        <label>IFTA Card Number<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control update_IFTA_Card_Number " type="number" name="iftaCardNumber" required />
                        </div>
                        <label for="">Card Type <span style="color:#ff0000">*</span></label>
                        <div class="dropdown show">
                            <input list="update_card_type" placeholder="Search here..."  class="form-control  update_Fuel_Card_Type " id="card_vendar_addData"  name="" onkeyup="doSearch(this.value,'update_card_type')" autocomplete="off">
                            <datalist id="update_card_type"></datalist>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeUpdateFuelCard" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 FuelCardUpdatebutton " >Update </button>
            </div>
        </div>
    </div>
</div>
 <!--======================================= end edit fual card ======================== -->

 <!--========================= start restore fuel card ======================== -->
 <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restore_fuel_card_modal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Fuel Card</h4>
                    <button type="button" class="button-24 restorefuelCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_fuelCard" value="">
                    <input type="hidden" name="company_id" id="checked_fuelCard_company_ids" value="">
                    <button id="restore_Fuel_CardData"  class="button-57_alt restore_Fuel_CardData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th scope="col" col width="40"><input type="checkbox" nam="all_ids[]" class="fuel_card_all_ids"></th>
                                                <th scope="col" col width="100">Card Holder Name</th>
                                                <th scope="col" col width="100">IFTA Card No</th>
                                                <th scope="col" col width="100">CardType</th>
                                            </tr>
                                        </thead>

                                        <tbody id="RestoreFuelCardTable">

                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restorefuelCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--========================= end restore fuel card =========================== -->