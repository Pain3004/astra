<!------------------------------------------------------------------- Add   modal ------------------------------------------------------------------->
<div class="container">
  <!-- The Modal -->
  <div class="modal fade" data-backdrop="static" id="addLoadBoardModal">
    <div class="modal-dialog modal-dialog-scrollable custom_modal">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="cursor:none !important;">Add New LoadBoard</h4>
          <button type="button" class="button-24 closeAddNewLoadBoard">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" style="overflow-y: auto !important;">
          <!-- Row -->
          <div class="row">
            <div class="row row-sm">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="export-table">
                      <!-- <form id="addLoadBoardForm"> -->
                         @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                            <label for="CompanyName">Select Your Company <span style="color:#ff0000">*</span>
                            </label>
                            <div class="form-group">
                               
                              <input list="browserscompany" placeholder="Search here..." class="form-control" id="lb_Company"  name="selectCompany" onkeyup="doSearch(this.value,'browserscompany')" autocomplete="off">
                              <datalist id="browserscompany">
                              </datalist>

                            </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Customer &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBCustomerPlus" style='color:blue !important'></i>
                                </label>
                            <div class="dropdown show">
                              <input list="browserscustomer" placeholder="Search here..." class="form-control"  id="LB_Customer" name="customerlist" onkeyup="doSearch(this.value,'browserscustomer')" onchange="getCustomer(this.value)" autocomplete="off">
                              <datalist id="browserscustomer"></datalist> 
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Dispatcher">Dispatcher <span style="color:#ff0000">*</span>
                          </label>
                          <div class="dropdown show">
                            <input list="browsersdispatcher" placeholder="Search here..."  class="form-control" id="lb_Dispatcher"  name="dispatcherlist" onkeyup="doSearch(this.value,'browsersdispatcher')" autocomplete="off">
                            <datalist id="browsersdispatcher"></datalist>
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="CN">CN No. <span style="color:#ff0000">*</span>
                          </label>
                          <input type="text" class="form-control" id="lbCN_No" placeholder="CN">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Status">Status</label>
                          <select class="form-control" id="lb_status">
                            <option value="Open" selected="">0) Open</option>
                            <option value="Dispatched" disabled="">1) Dispatched</option>
                            <option value="Arrived Shipper" disabled="">2) Arrived Shipper</option>
                            <option value="Loaded" disabled="">3) Loaded</option>
                            <option value="On Route" disabled="">4) On Route</option>
                            <option value="Arrived Consignee" disabled="">5) Arrived Consignee</option>
                            <option value="Delivered" disabled="">6) Delivered</option>
                            <option value="Invoiced" disabled="">7) Invoiced</option>
                            <option value="Paid" disabled="">8) Paid</option>
                            <option value="Completed" disabled="">9) Completed</option>
                            <option value="Break Down" disabled="">10) Break Down</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label>Active Type &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBLoadTypePlus" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <input list="browsersloadtype" placeholder="Search here..." class="form-control" id="lb_load" name="loadtypelist" value="" onchange="enableUnits(this.value)" onkeyup="doSearch(this.value,'browsersloadtype')" autocomplete="off">
                            <datalist id="browsersloadtype"></datalist>
                          </div>
                        </div>
                        <div class="form-group col-md-1">
                          <label for="rateAmount">Rate <span style="color:#ff0000">*</span>
                          </label>
                          <input class="form-control" placeholder="Rate" type="number" id="rateAmount" value="" onkeyup="getTotal()">
                        </div>
                        <div class="form-group col-md-1">
                          <label for="units"># of Units</label>
                          <input type="text" class="form-control telephone4" id="units" placeholder="Units" onkeyup="getTotal()" disabled>
                        </div>
                        <div class="form-group col-md-2">
                          <label style="display:inline">F.S.C.</label>
                          <div style="display:inline" class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="fsc_percentage" onclick="getTotal()" data-parsley-multiple="groups" data-parsley-mincheck="2" >
                            <label class="custom-control-label" for="fsc_percentage">Rate%</label>
                          </div>
                          <div>
                            <input class="form-control mt-2" placeholder="F.S.C." type="number" id="fsc" name="fsc" value="" onkeyup="getTotal()">
                          </div>
                        </div>
                        <div class="form-group col-md-1">
                          <label>Oth Chg</label>
                          <span herf="#" id="addOthChgModal" class="glyphicon glyphicon-plus-sign" data-toggle="modal" style="cursor:pointer;"></span>
                          <input class="form-control" placeholder="Other Charges" type="text" id="MainOtherCharges" modal-value="[]" onkeyup="getTotal()" readonly="">
                        </div>
                        <div class="form-group col-md-2">
                          <label>Total Rate</label>
                          <div>
                            <input class="form-control" placeholder="Total Rate" type="number" id="totalAmount">
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label>Equipment Type &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBEquipmentTypePlus" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <input list="browsersequipment" class="form-control" placeholder="Search here..." id="lb_EquipmentType" value="" name="equipmentlist" onkeyup="doSearch(this.value,'browsersequipment')" autocomplete="off">
                            <datalist id="browsersequipment"></datalist>
                          </div>
                        </div>
                      </div>
                      <!-- -------------------- Radio Buttons ------------------- -->
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <!-- <div><input type="radio" name="radio_buttons" value="Driver" id="Driver"><label for="Driver">Driver</label></div><div><input type="radio" name="radio_buttons" value="OwnerOperator" id="OwnerOperator"><label for="OwnerOperator">OwnerOperator</label></div></div><div> -->
                          <div>
                            <input type="radio" name="country" value="Carrier" id="Carrier">
                            <label for="Carrier">Carrier</label>
                          </div>
                          <div>
                            <input type="radio" name="country" value="Driver" id="Driver">
                            <label for="Driver">Driver</label>
                          </div>
                          <div>
                            <input type="radio" name="country" value="OwnerOperator" id="OwnerOperator">
                            <label for="OwnerOperator">OwnerOperator</label>
                          </div>
                        </div>

                       
                        <!-- --------------carrier radio list------------ -->
                        <div class="form-group col-md-2 Carrierlist">
                          <label>Carrier Name <i title="Add Carrier" class="mdi mdi-plus-circle plus" id="LBCarrierPlus" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <input list="browserscarrier" class="form-control" placeholder="Search here..." id="LB_Carrier" name="carrierlist" onkeyup="doSearch(this.value,'browserscarrier')" onchange="getCarrier(this.value)" autocomplete="off">
                            <datalist id="browserscarrier"></datalist>
                          </div>
                        </div>
                        <div class="form-group col-md-2 Carrierlist">
                          <label>Flat Rate</label>
                          <div class="dropdown show">
                            <input class="form-control "  id="LB_FlatRate" placeholder="Search Here" onkeyup="getCarrierTotal()" value="">
                            
                          </div>
                        </div>
                        <div class="form-group col-md-2 Carrierlist">
                          <label>Advance Charges <i title="Add Customer" class="mdi mdi-plus-circle plus" id="Adv_carrier" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <input class="form-control"  id="Advcarrier" placeholder="Other Charges"  value="" onkeyup="getCarrierTotal()" readonly>
                            </div>
                          </div>
                          <div class="form-group col-md-2 Carrierlist">
                            <label>Total</label>
                            <div class="dropdown show">
                              <input class="form-control CarrierListSet" list="CarrierListSet" name="" id="LB_CarrierTotal" placeholder="Search Here">
                            </div>
                          </div>
                          <div class="form-group col-md-2 Carrierlist">
                            <label>Currency</label>
                            <div class="dropdown show">
                              <input class="form-control "  id="LB_CarrierCurrency" placeholder="USD" readonly>
                            </div>
                          </div>
                        <!-- --------------driver radio list------------ -->
                        <div class="form-group col-md-2 Driverlist">
                          <label>Driver Name &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBDriverPlus" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <input list="browsersdriver" class="form-control" placeholder="Search here..." id="LB_Driver" name="driverlist" onkeyup="doSearch(this.value,'browsersdriver')" onchange="getDriver(this.value);" autocomplete="off">
                            <datalist id="browsersdriver"></datalist>
                            
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Truck</label>
                          <div class="dropdown show">
                            <!-- <input class="form-control TruckListSet" list="TruckListSet" id="LB_Truck" placeholder="Search Here"> -->
                            <select class="form-control select2-show-search form-select TruckListSet" list="TruckListSet" id="LB_Truck" placeholder>
                            <option value="">Select Here</option>
                            <?php
                                foreach($truck as $single_Truck){                              
                                  foreach($single_Truck['truck'] as $i_s){
                                    $i_s_name=$i_s['truckNumber'];              
                                    $i_s_id=$i_s['_id'];              
                                    ?>
                                      <option value="{{$i_s_id}}">{{$i_s_name}}</option>
                                    <?php
                                  }
                                }
                            ?>                                                          
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Trailer &nbsp; <i title="Add Trailer" class="mdi mdi-plus-circle plus" id="LBTrailerPlus1" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <select class="form-control select2-show-search form-select TrailerListSet" list="TrailerListSet" id="LB_Trailer" placeholder>
                            <option value="">Select Here</option>
                            <?php
                                foreach($trailer as $single){                              
                                  foreach($single['trailer'] as $i_s){
                                    $name=$i_s['trailerNumber'];              
                                    $id=$i_s['_id'];              
                                    ?>
                                      <option value="{{$id}}-{{$name}}">{{$name}}</option>
                                    <?php
                                  }
                                }
                            ?>                                                          
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Loaded Mi</label>
                          <div class="dropdown show">
                            <input type="text" class="form-control" id="lb_LoadedMiles" placeholder="LoadedMiles">
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Empty Mi</label>
                          <div>
                            <input type="text" class="form-control" id="lb_EmptyMiles" placeholder="EmptyMiles">
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Other &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="Other_driver" style='color:blue !important'></i>
                          </label>
                          <div>
                            <input type="text" class="form-control" id="lb_driver_Other" placeholder="Other" readonly="">
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Trap</label>
                          <div>
                            <input type="text" class="form-control" id="lb_Tarp" placeholder="Tarp">
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Flat</label>
                          <div>
                            <input type="text" class="form-control" id="lb_Flat" placeholder="Flat" onkeyup="changeDriverTotal()">
                          </div>
                        </div>
                        <div class="form-group col-md-1 Driverlist">
                          <label>Total</label>
                          <div>
                            <input type="text" class="form-control" id="LB_loadertotal" placeholder="Total">
                          </div>
                        </div>
                        <!-- --------------end of driver radio list------------ -->
                        <!-- --------------Owner Operator radio list------------ -->
                        <div class="form-group col-md-2 OwnerOperatorlist">
                          <label>Owner Operator&nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBDriverPlus" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <!-- <input class="form-control OwnerOperatorlist" list="OwnerOperatorlist" id="lb_owner" placeholder="Search Here"> -->
                            <input list="browsersowner" class="form-control" placeholder="Search here..." id="lb_owner" name="ownerlist" onkeyup="doSearch(this.value,'browsersowner')" onchange="getOwner(this.value)" autocomplete="off">
                            <datalist id="browsersowner"></datalist>
                          </div>
                        </div>
                        <div class="form-group col-md-2 OwnerOperatorlist">
                          <label>Pay Percentage</label>
                          <div class="dropdown show">
                            <input class="form-control " readonly=""  id="lb_owner_percentage" placeholder="Pay Percentage ">
                          </div>
                        </div>
                        <div class="form-group col-md-1 OwnerOperatorlist">
                          <label>Truck</label>
                          <div class="dropdown show" id="lbownertruck">
                          <input list="browsers1truck" class="form-control" placeholder="Search here..." id="lb_owner_truck" name="truck1list" onkeyup="doSearch(this.value,'browsers1truck');" onchange="getTruck(this.value,'browsers1truck');" autocomplete="off">
                          <datalist id="browsers1truck"></datalist> 
                          
                          </div>
                        </div>
                        <div class="form-group col-md-1 OwnerOperatorlist">
                          <label>Trailer &nbsp; <i title="Add Trailer" class="mdi mdi-plus-circle plus" id="LBTrailerPlus2" style='color:blue !important'></i>
                          </label>
                          <div class="dropdown show">
                            <select class="form-control select2-show-search form-select TrailerListSet" list="TrailerListSet" id="lb_owner_trailer" placeholder>
                            <option value="">Select Here</option>
                            <?php
                                foreach($trailer as $single){                              
                                  foreach($single['trailer'] as $i_s){
                                    $name=$i_s['trailerNumber'];              
                                    $id=$i_s['_id'];              
                                    ?>
                                      <!-- <option value="{{$id}}-{{$name}}">{{$name}}</option> -->
                                      <option value="{{$id}}">{{$name}}</option>
                                    <?php
                                  }
                                }
                            ?>                                                          
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-2 OwnerOperatorlist">
                          <label>Other &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="Other_OwnerOperator" style='color:blue !important'></i>
                          </label>
                          <div>
                            <input class="form-control " readonly="" id="lb_owner_other" placeholder="Other" modal-value="">
                          </div>
                        </div>
                        <div class="form-group col-md-2 OwnerOperatorlist">
                          <label>Total</label>
                          <div class="dropdown show">
                            <input class="form-control OwnerOperatorlist" id="lb_owner_total" placeholder="$ Total">
                          </div>
                        </div>
                        <!-- --------------End Of Owner Operator radio list------------ -->
                      </div>
                      <!-- -------------------- End Radio Buttons ------------------- -->
                      <!-- <div class="form-row"><button id="add-tab">Add Form</button><div class="tab-container"><ul class="nav nav-tabs"><li class="active"><a href="#tab-1" data-toggle="tab">Form 1</a></li></ul><div class="tab-content"><div class="tab-pane active" id="tab-1"><form><div class="tab-content" id="myTabContent"><div class="tab-pane fade show active" id="home0" role="tabpanel"aria-labelledby="home-tab"><div class="row m-2"><div class="form-group col-md-12"><label>Name*</label><input   type="hidden" id="shipperId" name="shipperId"><div class="form-group"><select class="form-control select2-show-search form-select" id="lb_shipperName"><option>Select Here </option></select></div></div></div></div></form></div></div></div></div> -->
                      <!-- add shipper   -->
                      <div class="form-row">
                        <div class="navtabs_2">
                          <h6>
                          <img src="{{URL::to('/')}}/assets/images/home.png" style="cursor:pointer" height="50px" width="50px" id="startLocation" modal-value="" data-toggle="tooltip" data-placement="top" title="Click here to add start location.">
                            <!-- <a class="button-29 shipperName" onclick="add_fields();" data-toggle="tooltip" data-placement="top" title="Click here to add more shippers." style="color: #ffffff;">ADD SHIPPER</a> -->
                            <a class="button-29" onclick="add_fields();" data-toggle="tooltip" data-placement="top" title="Click here to add more shippers." style="color: #ffffff;">ADD SHIPPER</a>

                            <i class="mdi mdi-plus-circle plus-xs" id="add_shipper_modal"></i>
                          </h6>
                          <div class="card m-b-30" id="sc-card">
                            <div class="custom_tab-list cardbg">
                              <ul class="nav nav-tabs main-tabs" id="myTab" role="tablist" style="border-bottom: none;">
                                <li class="nav-item-custom nav-item list-item" id="home-title^0">
                                  <button class="nav-tab-list active" id="home-tab0" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true" style=""> Shipper </button>
                                  <button type="button" class="button-25" onclick="removeTab('home-title^0','home0')">×</button>
                                  <!-- <a type="button" class="button-25" onclick="removeTab('home-title^0','home0')" aria-hidden="true"></a> -->
                                </li>
                              </ul>
                            </div>
                            <form id="shipperForm">
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row m-2">
                                    <!-- <div class="form-group col-md-3">
                                      <label>Name*</label>
                                      <input type="hidden" id="shipperId" name="shipperId">
                                      <div class="form-group">
                                        <select class="form-control select2-show-search form-select lb_shipperName" id="lb_shipperName" name="shipperName[]">
                                          <option>Select Here </option>
                                        </select>
                                      </div>
                                    </div> -->
                                    <div class="form-group col-md-3">
                                        <label for="customerPaymentTerms">Name<span style="color: red">*</span></label>
                                        <div class="dropdown show">
                                          <!-- <input class="form-control" placeholder="Search here..." list="shipper" id="lb_shipperName" name="shipperName[]" onkeyup="doSearch(this.value,'searchActiveShipper',0)"> -->
                                          <input class="form-control" placeholder="Search here..." list="shipper" id="shipperlist" name="shipperName[]" onchange="getShipper(this.value,0)" onkeyup="doSearch(this.value,'searchActiveShipper',0)">
                                          <datalist id="shipper" name="shipper">
                                          </datalist>
                                        </div>
                                    </div>
                                

                                    <div class="form-group col-md-2">
                                      <label>Address<span style="color: red">*</span></label>
                                      <div>
                                        <input class="form-control" placeholder="Address *" type="text" id="shipperaddress0" name="shipperaddress[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Location <span style="color: red">*</span></label>
                                      <div>
                                        <input class="form-control location_view" placeholder="Enter a location" type="text" data-location="activeshipper0" id="activeshipper0" onkeydown="getLocation('activeshipper0')" name="shipperLocation[]">
                                        <!-- <input type="text" class="form-control location_view" data-location="customerLocation"  id="customerLocation" placeholder="Enter Location"> -->

                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Pickup Date</label>
                                      <div>
                                        <input class="form-control" type="date" id="shipperdate" name="shipperdate[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Pickup Time</label>
                                      <div>
                                        <input class="form-control" type="time" id="shippertime" name="shippertime[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label>Type<span style="color: red">*</span></label>
                                      <div class="row">
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="tl0" name="loadType[]" value="TL" checked>
                                          <label class="custom-control-label" for="tl0">TL</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="ltl0" value="LTL" name="loadType[]">
                                          <label class="custom-control-label" for="ltl0">LTL</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Commodity</label>
                                      <div>
                                        <input class="form-control" type="text" placeholder="Commodity" id="shippercommodity" name="shippercommodity[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1 ">
                                      <label>Qty</label>
                                      <div>
                                        <input class="form-control" placeholder="Qty" id="shipperqty" name="shipperqty[]" type="text">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                      <label>Weight</label>
                                      <div>
                                        <input class="form-control" type="text" placeholder="Weight" id="shipperweight" name="shipperweight[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Pickup #</label>
                                      <div>
                                        <input class="form-control" placeholder="Pickup #" type="text" id="shipperpickup" name="shipperpickup[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label>Sr#</label>
                                      <div>
                                        <input class="form-control" placeholder="Sr#" type="number" id="shipseq0" name="shipseq[]" value="0">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label>Pickup Notes</label>
                                      <div>
                                        <textarea rows="1" cols="30" class="form-control" type="textarea" id="shippernotes" name="shippernotes[]"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- add CONSIGNEE   -->
                      <div class="form-row">
                        <div class="navtabs_2">
                          <h6>
                            <img src="{{URL::to('/')}}/assets/images/destination.png" style="cursor:pointer" height="50px" id="endLocation" modal-value="" data-toggle="tooltip" data-placement="top" title="Click here to enter destination." width="50px">
                            <a class="button-29" onclick="add_consignee();" data-toggle="tooltip" data-placement="top" title="Click here to add more consignees." style="color: #ffffff;">ADD CONSIGNEE</a>
                            <i class="mdi mdi-plus-circle plus-xs" id="add_consignee_modal"></i>
                          </h6>
                          <div class="card m-b-30" id="sc-card">
                            <div class="custom_tab-list cardbg">
                              <ul class="nav nav-tabs main-tabs" id="consignee" role="tablist" style="border-bottom: none;">
                                <li name="customconsigneetab" class="nav-item-custom nav-item list-item" id="consig-title^0">
                                  <button class="nav-tab-list active consignee list-anchors-consig" id="consig-tab0" data-toggle="tab" href="#consig0" role="tab" aria-controls="home" aria-selected="true" style=""> Consignee 1</button>
                                  <button type="button" class="button-25" onclick="removeConsignee('consig-title^0','consig0')">×</button>
                                  <!-- <a type="button" class="button-25" onclick="removeTab('home-title^0','home0')" aria-hidden="true"></a> -->
                                </li>
                              </ul>
                            </div>
                            <form id="consigneeForm">
                              <div class="tab-content" id="consigneeContent">
                                <div class="tab-pane fade show active" id="consig0" role="tabpanel" aria-labelledby="consig-tab0">
                                  <div class="row m-2">

                                  <div class="form-group col-md-3">
                                        <label for="customerPaymentTerms">Name<span style="color: red">*</span></label>
                                        <div class="dropdown show">
                                          <!-- <input class="form-control" placeholder="Search here..." list="shipper" id="lb_shipperName" name="shipperName[]" onkeyup="doSearch(this.value,'searchActiveShipper',0)"> -->
                                          <input class="form-control" placeholder="Search here..." list="consigneee" id="lb_consignee" name="consigneelist[]" onchange="getConsignee(this.value,0)" onclick="doSearch(this.value,'searchActiveConsignee', 0)" onkeyup="doSearch(this.value,'searchActiveConsignee', 0)" autocomplete="off">
                                          <datalist id="consigneee" name="consigneee">
                                          </datalist>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group col-md-2">
                                      <label>Address<span style='color:#ff0000'>*</span></label>
                                      <div>
                                        <input class="form-control" placeholder="Address *" type="text" id="consigneeaddress0" name="consigneeaddress[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Location <span style='color:#ff0000'>*</span></label>
                                      <div>
                                        <input class="form-control" placeholder="Enter a location" type="text"  data-location="activeconsignee0" id="activeconsignee0" onkeydown="getLocation('activeconsignee0')" name="activeconsignee[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Delivery Date</label>
                                      <div>
                                        <input class="form-control" type="date" id="consigneepickdate" name="consigneepickdate[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Delivery Time</label>
                                      <div>
                                        <input class="form-control" type="time" id="consigneepicktime" name="consigneepicktime[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label>Type<span style="color: red">*</span></label>
                                      <div class="row">
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="ctl0" name="ctl[]" value="TL" checked>
                                          <label class="custom-control-label" for="ctl">TL</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" class="custom-control-input" id="cltl0" value="LTL" name="ctl[]">
                                          <label class="custom-control-label" for="cltl0">LTL</label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Commodity</label>
                                      <div>
                                        <input class="form-control" type="text" placeholder="Commodity" id="consigneecommodity" name="consigneecommodity[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1 ">
                                      <label>Qty</label>
                                      <div>
                                        <input class="form-control" placeholder="Qty" type="text" id="consigneeqty" name="consigneeqty[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2 ">
                                      <label>Weight</label>
                                      <div>
                                        <input class="form-control" type="text" placeholder="Weight" id="consigneeweight" name="consigneeweight[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Delivery #</label>
                                      <div>
                                        <input class="form-control" placeholder="Delivery #" type="text" id="consigneedelivery" name="consigneedelivery[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-1">
                                      <label>Sr#</label>
                                      <div>
                                        <input class="form-control" placeholder="Sr#" type="number" id="consigseq0" name="consigseq[]" value="0">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label>Delivery Notes</label>
                                      <div>
                                        <textarea rows="1" cols="30" placeholder="Delivery Notes" class="form-control" type="textarea" id="deliverynotes" name="deliverynotes[]"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="row col-md-12 ">
                          <div class="form-group col-md-2">
                            <label>Tarp</label>
                            <select class="form-control" id="driverTarpSelect">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                          <div class="form-group col-md-2 ">
                            <label>Calculate Miles</label>
                            <div>
                              <button id="calcmiles" class="button-29" type="button" onclick="calculateMiles()">
                                <span class="spinner-border spinner-border-sm loader1" role="status" style="display:none"></span> Calculate Miles </button>
                            </div>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Loaded Miles</label>
                            <div>
                              <input class="form-control" placeholder="Loaded Miles" type="text" id="loadedmiles" value="0">
                            </div>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Empty Miles</label>
                            <div>
                              <input class="form-control" placeholder="Empty Miles" type="text" id="emptymiles" value="0">
                            </div>
                          </div>
                          <div class="form-group col-md-2">
                            <label>Driver Miles</label>
                            <div>
                              <input class="form-control" placeholder="Driver Miles" type="text" id="drivermiles" value="0">
                            </div>
                          </div>
                          <div class="form-group col-md-2 Carrierlist carrier">
                            <label>Driver Name</label>
                            <div>
                              <input class="form-control" placeholder="Driver Name" type="text" id="">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Driver Contact</label>
                              <div>
                                <input class="form-control" placeholder="Driver Name" type="text" id="">
                              </div>
                            </div>
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Truck</label>
                              <div>
                                <input class="form-control" placeholder="Driver Name" type="text" id="">
                              </div>
                            </div>
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Trailer</label>
                              <div>
                                <input class="form-control" placeholder="Trailer" type="text" id="">
                              </div>
                            </div>
                            <!-- </div><div class="form-row"><div class="form-group col-md-6"><label>Load Notes</label><div><input class="form-control" placeholder="Load Notes" type="text" id="loadnotes"></div></div></div> -->
                            <div class="form-group col-md-5">
                              <label>Load Notes</label>
                              <div>
                                <input class="form-control" placeholder="Load Notes" type="text" id="loadnotes">
                              </div>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="hidden" id="is-ifta" value="">
                                <input type="hidden" id="is-uniton" value="">
                                <input type="hidden" id="carrier-parent" value="">
                                <input type="hidden" id="customer-parent" value="">
                                <input type="hidden" id="driver-parent" value="">
                                <input type="hidden" id="owner-parent" value="">
                                <input type="hidden" id="load-id" value="">
                                <input type="hidden" id="create-date" value="">
                                <input type="hidden" id="isbroker" value="">
                                <input type="hidden" id="custdays" value="">
                                <input type="hidden" id="cardays" value="">
                                
                            </div>
                          </div>
                        </div>
                        <form id="carrierfilesForm">
                          <div class="form-row">
                            <div class="upload-button carrier">
                              <label>Upload Files
                              &nbsp; <i title="view Upload Files" class="mdi mdi-eye" id="view_Upload_Files" style='color:blue !important'></i>
                                  </label>
                              <br>
                              <!-- <button class="button-29">Upload a file</button> -->
                              <!-- <input type="file" id="carrierfiles" name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" /> -->
                              <input type="file" class="form-control" id="carrierfiles"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                              <!-- <div class="trailer_img">
                              </div> -->
                            </div>
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Send carrier rate con</label>
                              <div>
                                <button type="button" class="btn-first-modal button-29" id="carrierratecon" > Add Email </button>
                              </div>
                            </div>
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Send customer rate con</label>
                              <div>
                                <button class="btn-first-modal button-29"  id="customerratecon"> Add Email </button>
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
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="button-29" id="addLBSubmit">Submit</button>
            <button type="button" class="button-29 closeAddNewLoadBoard">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="AccessorialModal">
      <div class="modal-dialog modal-dialog-scrollable custom_modal_small_7">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Accessorial</h4>
            <button type="button" class="button-24 closeAcc">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" style="overflow-y: auto !important;">
            <div class="export-table">
              <form id="AccessorialModalForm">
                  <div id="items" class="form-group">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="Description">Description</label>
                    <div>
                      <!-- <input type="text" class="form-control" name="Description[]"> -->
                      <input type="text" class="form-control" name="otherDescription[]">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="Amount">Amount</label>
                    <div>
                      <!-- <input type="number" class="form-control" name="Amount[]" id="amo"> -->
                      <input type="number" class="form-control" name="other_charges[]" id="amo">
                    </div>
                  </div>
                  <!-- <div class="form-group col-md-2"><label for="Amount">Amount</label><div><button type="button" name="Amount" class="delete_1 btn btn-danger"><span aria-hidden="true">&times;</span></button></div></div> -->
                </div>
                  </div>
              </form>
              <button type="button" id="add_1" class="button-29" data-toggle="tooltip" data-original-title="Add more controls">
                <i class="mdi mdi-gamepad-down"></i> ADD </button>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="button-29" id="AccLBSubmit" onclick="getOtherCharges()">Submit</button>
            <button type="button" class="button-29 closeAcc">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="AccessorialModal_carrier" style="z-index:1000000000">
      <div class="modal-dialog modal-dialog-scrollable custom_modal_small_7">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Accessorial</h4>
            <button type="button" class="button-24 closeAccCarrier">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" style="overflow-y: auto !important;">
            <div class="export-table">
              <form id="carrierOtherModalForm">
                  <div id="items_carrier" class="form-group">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="Description">Description</label>
                        <div>
                          <input type="text" class="form-control" name="Description_car[]">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Advance">Advance</label>
                        <div>
                          <input type="number" class="form-control" name="Advance_car[]">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Charges">Charges</label>
                        <div>
                          <input type="number" class="form-control" name="Charges_car[]">
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-2"><label for="Amount">Amount</label><div><button type="button" name="Amount" class="delete_1 btn btn-danger"><span aria-hidden="true">&times;</span></button></div></div> -->
                    </div>
                  </div>
              </form>
              <button type="button" id="add_1_carrier" class="button-29" data-toggle="tooltip" data-original-title="Add more controls">
                <i class="mdi mdi-gamepad-down"></i> ADD </button>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="button-29" id="carrLBSubmit" onclick="getcarrierOtherCharges()">Submit</button>
            <button type="button" class="button-29 closeAccCarrier">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="AccessorialModal_driver">
      <div class="modal-dialog modal-dialog-scrollable custom_modal_small_7">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Accessorial</h4>
            <button type="button" class="button-24 closeAccdriver">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" style="overflow-y: auto !important;">
            <div class="export-table">
              <form id="driver_other_modal">
                  <div id="items_driver" class="form-group">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="Description">Description</label>
                        <div>
                          <input type="text" class="form-control" name="Description_dri[]">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Advance">Amount</label>
                        <div>
                          <input type="number" class="form-control" name="Amount_dri[]">
                        </div>
                      </div>
                      <!-- <div class="form-group col-md-2"><label for="Amount">Amount</label><div><button type="button" name="Amount" class="delete_1 btn btn-danger"><span aria-hidden="true">&times;</span></button></div></div> -->
                    </div>
                  </div>
              </form>
              <button type="button" id="add_1_driver" class="button-29" data-toggle="tooltip" data-original-title="Add more controls">
                <i class="mdi mdi-gamepad-down"></i> ADD </button>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="button-29" id="driLBSubmit" onclick="getdriverOtherCharges()" modal-value="">Submit</button>
            <button type="button" class="button-29 closeAccdriver">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="AccessorialModal_owneroperator">
      <div class="modal-dialog modal-dialog-scrollable custom_modal_small_7">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Accessorial</h4>
            <button type="button" class="button-24 closeAccowneroperator">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" style="overflow-y: auto !important;">
            <div class="export-table">
                <form id="owneroperator_other_modal">
                    <div id="items_owneroperator" class="form-group">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="Description">Description</label>
                          <div>
                            <input type="text" class="form-control" name="Description_own[]">
                          </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="Advance">Amount</label>
                          <div>
                            <input type="number" class="form-control" name="Amount_own[]">
                          </div>
                        </div>
                        <!-- <div class="form-group col-md-2"><label for="Amount">Amount</label><div><button type="button" name="Amount" class="delete_1 btn btn-danger"><span aria-hidden="true">&times;</span></button></div></div> -->
                      </div>
                    </div>
                </form>
              <button type="button" id="add_1_owneroperator" class="button-29" data-toggle="tooltip" data-original-title="Add more controls">
                <i class="mdi mdi-gamepad-down"></i> ADD </button>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="button-29" id="ownLBSubmit" onclick="getownerOtherCharges()">Submit</button>
            <button type="button" class="button-29 closeAccowneroperator">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- -----home modal------ -->
<div class="container">
  <div class="modal" id="addstartlocation" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog first-email">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add Start Location</h4>
          <button type="button" class="close button-24 closestartlocation"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
              <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="Email">Name<span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Start Location" type="text" id="add_start_location" name="add_start_location" onkeydown="getLocation('add_start_location')">
                    </div>
                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-second-modal button-29 closestartlocation" >Close</button>
          <button type="button" onclick="addStartLocation()" id="" class="btn btn-primary waves-effect waves-light">
              <i class="mdi mdi-shield-lock-outline"></i> Save
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -----Destination modal------ -->
<div class="container">
  <div class="modal" id="endlocationmodal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog first-email">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add Destination</h4>
          <button type="button" class="close button-24 closeEndlocationmodal"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
              <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="Email">Name<span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="End Location" type="text" id="add_end_location" name="add_end_location" onkeydown="getLocation('add_end_location')">                    </div>
                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-second-modal button-29 closeEndlocationmodal" >Close</button>
          <button type="button" onclick="addEndLocation()" id="" class="btn btn-primary waves-effect waves-light">
            <i class="mdi mdi-shield-lock-outline"></i> Save
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- -----mail modal------ -->
<div class="container">
  <div class="modal" id="carrierrateconModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog first-email">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">carrier Email</h4>
          <button type="button" class="close button-24 closeEmailModal1"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
              <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="Email">Email-1 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-1" type="text" id="emailcarrier1">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="Email">Email-2 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-2" type="text" id="emailcarrier2">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="Email">Email-3 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-3" type="text" id="emailcarrier3">
                    </div>
                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-second-modal button-29 closeEmailModal1" >Close</button>
          <button type="button" class="btn-second-modal button-29 closeEmailModal1">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="modal" id="customerrateconModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog first-email">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Customer Email</h4>
          <button type="button" class="close button-24 closeEmailModal2" ><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group col-md-12">
              <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="Email">Email-1 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-1" type="text" id="emailcustomer1">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="Email">Email-2 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-2" type="text" id="emailcustomer2">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="Email">Email-3 <span style="color:#ff0000">*</span></label>
                      <input class="form-control" placeholder="Email-3" type="text" id="emailcustomer3">
                    </div>
                </div>
              </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-second-modal button-29 closeEmailModal2" >Close</button>
          <button type="button" class="btn-second-modal button-29 closeEmailModal2">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
    //when the Add Field button is clicked
    $("#add_1").click(function(e) {
      $(".delete_1").fadeIn("1500");
      //Append a new row of code to the "#items" div
      $("#items").append(
          '<div class="next-referral form-row">'+
          '<div class="form-group col-md-5">'+
          '<label for="Description">Description</label>'+
          '<div>'+
          '<input type="text" class="form-control" name="otherDescription[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-5">'+
          '<label for="Amount">Amount</label>'+
          '<div>'+
          '<input type="number" class="form-control" name="other_charges[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-2">'+
          '<label for="Delete">Delete</label>'+
          '<div>'+
          '<button type="button" name="Delete" class="delete_1 btn btn-danger"><span aria-hidden="true">&times;</span> </button>'+
          '</div>'+
          '</div>'+
          '</div>'
      );
    });
    $("body").on("click", ".delete_1", function(e) {
      $(".next-referral").last().remove();
    });
  });


  $(document).ready(function() {
    //when the Add Field button is clicked
    $("#add_1_carrier").click(function(e) {
      $(".delete_1_carrier").fadeIn("1500");
      //Append a new row of code to the "#items" div
      $("#items_carrier").append(
        '<div class="next-referral form-row">'+
        	'<div class="form-group col-md-3">'+
          		'<label for="Description">Description</label>'+
          		'<div>'+
          			'<input type="text" class="form-control" name="Description_car[]">'+
          		'</div>'+
          	'</div>'+
          	'<div class="form-group col-md-3">'+
          		'<label for="Advance">Advance</label>'+
          		'<div>'+
          			'<input type="number" class="form-control" name="Advance_car[]">'+
          		'</div>'+
          	'</div>'+
			'<div class="form-group col-md-3">'+
          		'<label for="Charges">Charges</label>'+
          		'<div>'+
          			'<input type="number" class="form-control" name="Charges_car[]">'+
          		'</div>'+
          	'</div>'+
          	'<div class="form-group col-md-2">'+
          		'<label for="Delete">Delete</label>'+
          		'<div>'+
          			'<button type="button" name="Delete" class="delete_1_carrier btn btn-danger"><span aria-hidden="true">&times;</span> </button>'+
          		'</div>'+
          	'</div>'+
          '</div>'
      );
    });
    $("body").on("click", ".delete_1_carrier", function(e) {
      $(".next-referral").last().remove();
    });
  });


  $(document).ready(function() {
    //when the Add Field button is clicked
    $("#add_1_driver").click(function(e) {
      $(".delete_1_driver").fadeIn("1500");
      //Append a new row of code to the "#items" div
      $("#items_driver").append(
          '<div class="next-referral form-row">'+
          '<div class="form-group col-md-5">'+
          '<label for="Description">Description</label>'+
          '<div>'+
          '<input type="text" class="form-control" name="Description_dri[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-5">'+
          '<label for="Amount">Amount</label>'+
          '<div>'+
          '<input type="number" class="form-control" name="Amount_dri[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-2">'+
          '<label for="Delete">Delete</label>'+
          '<div>'+
          '<button type="button" name="Delete" class="delete_1_driver btn btn-danger"><span aria-hidden="true">&times;</span> </button>'+
          '</div>'+
          '</div>'+
          '</div>'
      );
    });
    $("body").on("click", ".delete_1_driver", function(e) {
      $(".next-referral").last().remove();
    });
  });


  $(document).ready(function() {
    //when the Add Field button is clicked
    $("#add_1_owneroperator").click(function(e) {
      $(".delete_1_owneroperator").fadeIn("1500");
      //Append a new row of code to the "#items" div
      $("#items_owneroperator").append(
          '<div class="next-referral form-row">'+
          '<div class="form-group col-md-5">'+
          '<label for="Description">Description</label>'+
          '<div>'+
          '<input type="text" class="form-control" name="Description_own[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-5">'+
          '<label for="Amount">Amount</label>'+
          '<div>'+
          '<input type="number" class="form-control" name="Amount_own[]">'+
          '</div>'+
          '</div>'+
          '<div class="form-group col-md-2">'+
          '<label for="Delete">Delete</label>'+
          '<div>'+
          '<button type="button" name="Delete" class="delete_1_owneroperator btn btn-danger"><span aria-hidden="true">&times;</span> </button>'+
          '</div>'+
          '</div>'+
          '</div>'
      );
    });
    $("body").on("click", ".delete_1_owneroperator", function(e) {
      $(".next-referral").last().remove();
    });
  });



</script>


<script>

"use strict";
var companyid = $("#companyid").val();
var privilege = $("#privilege").val();
var room = 0;
var count = 0;
var otherDescription = [""];
var otherCharges = ["0"];
var carrierotherDescription = [""];
var carrierotherCharges = ["0"];
var carrierotherAdvances = ["0"];
var driverotherDescription = [""];
var driverotherCharges = ["0"];
var ownerotherDescription = [""];
var ownerotherCharges = ["0"];
var startLocation = "";
var endLocation = "";
var loadedHour = "";
var EmptyHour = "";
var isIfta = 0;
var tarp = 0;
var distance = 0;
var total = 0;
var pickrate = 0;
var pickafter = 0;
var droprate = 0;
var dropafter = 0;
var driverRate = "mile";
var customeremail = "";
var emailcustomer2 = "";
var emailcustomer3 = "";
var carrieremail = "";
var email2 = "";
var email3 = "";
var companyid = $("#companyid").val();
var is_unit_on = "off";
var carrier_parent = "";
var customer_parent = "";
var driver_parent = "";
var owner_parent = "";
var percentage = "";
var isbroker = "off";
var customerName = "";
var response = [];


function add_fields() {

   
   
  room = document.getElementById("myTab").getElementsByTagName("li").length;

  var mainID = "'home-title^" + room + "'";
  var contentID = "'home" + room + "'";
  var objTo = document.getElementById("myTab");
  var divtest =
    '<li class="nav-item-custom nav-item list-item" id = "home-title^' +
    room +
    '"><button class = "nav-tab-list shipper list-anchors LBshipper" id = "home-tab' +
    room +
    '" data-toggle="tab" href="#home' +
    room +
    '" role="tab" aria-controls="home" aria-selected="false">Shipper</button><button type="button" class="button-25" onclick="removeTab('+
    mainID +
    "," +
    contentID +
    ')" >×</button></li>';
  objTo.innerHTML += divtest;
  document.getElementById("sc-card").classList.add("shadow");
  //var contentTo = document.getElementById("myTabContent");
  var contentTo = $("#myTabContent");

  var contenttest =
    '<div class="tab-pane fade" id="home' +
    room +
    '" role="tabpanel" aria-labelledby="home-tab' +
    room +
    '"><div class="row m-2">\n' +
    ' <div class="form-group col-md-3">\n' +
    "<label>Name<span style='color:#ff0000'>*</span></label>\n" +
    // '<select class="form-control select2-show-search form-select lb1_shipperName" id="lb1_shipperName" name="shipperName[]"> <option>Select Here </option> </select>'+
    '<input list="shipper' +
    room +
    '" class="form-control"  list="shipper" placeholder="Search here..." id="shipperlist' +
    room +
    '" name="shipperName[]" onchange="getShipper(this.value,' +
    room +
    '); " onkeyup="doSearch(this.value,' +
    "'searchActiveShipper'" +
    "," +
    room +
    '); "  autocomplete="off">\n' +
    '<datalist   name="shipper" id="shipper' +
    room +
    '" name="shipper">\n' +
    "                                                 </datalist>\n" +

    // <input class="form-control" placeholder="Search here..." list="shipper" id="shipperlist" name="shipperName[]" onkeyup="doSearch(this.value,'searchActiveShipper',0)">
    //                                       <datalist id="shipper" name="shipper">
    //                                       </datalist>

    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Address*</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control shipperaddress" id = "shipperaddress' +
    room +
    '" name="shipperaddress[]" placeholder="Address *" type="text"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Location *</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control shipperLocation" placeholder="Enter a location"\n' +
    '                                                           type="text" id = "activeshipper' +
    room +
    '" onkeydown="getLocation(this.id)"  name="shipperLocation[]">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup Date</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control"  name="shipperdate[]" type="date"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup Time</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" name="shippertime[]" type="time"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-1">\n' +
    "                                                <label>Type*</label>\n" +
    '                                              <div class="row">\n' +
    '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
    '                                                        <input type="radio" class="custom-control-input shipperloadtype"\n' +
    '                                                               id="tl' +
    room +
    '" name="loadType[]' +
    room +
    '"\n' +
    '                                                                value = "TL" checked>\n' +
    '                                                        <label class="custom-control-label"\n' +
    '                                                               for="tl' +
    room +
    '">TL</label>\n' +
    "                                                    </div>\n" +
    '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
    '                                                        <input type="radio" class="custom-control-input"\n' +
    '                                                               id="ltl' +
    room +
    '"  value = "LTL" name="loadType[]' +
    room +
    '">\n' +
    '                                                        <label class="custom-control-label" for="ltl' +
    room +
    '">LTL</label>\n' +
    "                                                    </div>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Commodity</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" name="shippercommodity[]" type="text"\n' +
    '                                                           placeholder="Commodity" " >\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '<div class="form-group col-md-1 ">\n' +
    "                                                <label>Qty</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" placeholder="Qty" name="shipperqty[]" type="text" >\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2 ">\n' +
    "                                                <label>Weight</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" type="text" name="shipperweight[]" placeholder="Weight">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup #</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" name="shipperpickup[]" placeholder="Pickup #" type="text"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                                <div class="form-group col-md-1">\n' +
    "                                                <label>Sr#</label>\n" +
    "                                                <div>\n" +
    '                                                <input class="form-control" placeholder="Sr#" type="number" id="shipseq' +
    room +
    '" name="shipseq[]" value="0">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-4">\n' +
    "                                                <label>Pickup Notes</label>\n" +
    "                                                <div>\n" +
    '                                                    <textarea rows="1" cols="30" class="form-control" name = "shippernotes[]" type="textarea"\n' +
    "                                                              ></textarea>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    "                                        </div></div>";
  //contentTo.innerHTML += contenttest;
  $(contentTo).append(contenttest);
  renameShipper();
  makeActive();
//   $("#lb1_shipperName"+room).change(function(){
//     // $(document).on('change','.lb1_shipperName', function(){
//   //var id=$("#LB_Shipper").val();
//   var Shipper=$('.lb1_shipperName'+room).val().split('-');
 
// //   $("#shipperId").val(Shipper[0]);
//   $("#shipperaddress"+room).val(Shipper[1]);
//   $("#shipperLocation"+room).val(Shipper[2]);

// }); 
}


var mainID = "'home-title^" + room + "'";
  var contentID = "'home" + room + "'";


   
  $(document).on('click','.shipperName', function(){
    // $(".lb1_shipperName").select2({
    // placeholder: "Select a programming language",
    // allowClear: true,
    // dropdownParent: $('#addLoadBoardModal')
    // });
    // // alert();
    // $.ajax({
    //     type: "GET",
    //     url: base_path+"/admin/Shipper",
    //     async: false,
    //     success: function(Result) { 
    //     createshipperList(Result);
    //     }
    // });
    // function createshipperList(Result) {           
    //     var Length = 0;    
    //     if (Result != null) {
    //         Length = Result.shipper.length;
    //     }

    //     if (Length > 0) {
    //         // var no=1;
    //         // $(".ShipperListSet").html('');
    //         for (var i = 0; i < Length; i++) { 
    //             var shipperLength =Result.shipper[i].shipper.length;
    //             for (var j = 0; j < shipperLength; j++) {  
    //             var id =Result.shipper[i].shipper[j]._id;
    //             var shipperName =Result.shipper[i].shipper[j].shipperName;
    //             var shipperAddress =Result.shipper[i].shipper[j].shipperAddress;
    //             var shipperLocation =Result.shipper[i].shipper[j].shipperLocation;
    //             // var shipperNumber =Result.shipper[i].shipper[j].shipperNumber;
    //             var deleteStatus =Result.shipper[i].shipper[j].deleteStatus;

    //             // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
    //                 var List = "<option class='LB_Shipper' value='"+id+"-"+shipperAddress+"-"+shipperLocation+"'>"+shipperName+"</option>"                   
    //                 // $("#lb_shipperName").append(List);
    //                 $(".lb1_shipperName").append(List);
    //             // }
    //             }
    //         }
    //     }
        
    // }

})
 

    

function makeActive() {
  for (var i = 0; i < room; i++) {
    var component = document.getElementById("home-tab" + i);
    var component1 = document.getElementById("home" + i);
    if (component && component1) {
      component.classList.remove("active1");
      component1.classList.remove("show");
      component1.classList.remove("active1");
      component.setAttribute("aria-selected", false);
    }
  }
  var newcomponent = document.getElementById("home-tab" + i);
  var newcomponent1 = document.getElementById("home" + i);
  newcomponent.classList.add("active1");
  newcomponent1.classList.add("show");
  newcomponent1.classList.add("active");
  newcomponent.setAttribute("aria-selected", true);
}

function renameShipper() {
    // console.log("rename function");
  var shippers = document.getElementsByClassName("shipper");
  for (
    var i = 0;
    i < document.getElementById("myTab").getElementsByTagName("li").length;
    i++
  ) {
    shippers[i].innerHTML = "Shipper " + (i + 1);
  }
}

function removeTab(mainid, contentid) {
  var element1 = document.getElementById(mainid);
  var element2 = document.getElementById(contentid);
  var ids = mainid.split("^");
  var tabID = ids[1];
  var tabContentID = contentid.charAt(contentid.length - 1);
  var newcomponent;
  var newcomponent1;
  if (mainid == "home-title^0") {
    swal.fire({
      title: "First Shipper Cannot be removed!!",
      type: "warning",
      type: "info",
      html: "",
      showCancelButton: true,
      confirmButtonText: "Yes, Continue!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger ml-2",
      buttonsStyling: false,
    });
    return;
  }

  for (var i = tabID - 1; i >= 0; i--) {
    if (document.getElementById("home-title^" + i)) {
      newcomponent = document.getElementById("home-tab" + i);
      newcomponent1 = document.getElementById("home" + i);
      break;
    }
  }

  if (document.getElementById("myTab").getElementsByTagName("li").length > 1) {
    for (var i = 0; i <= room; i++) {
      if (
        document.getElementById("home-tab" + i) &&
        document.getElementById("home" + i)
      ) {
        document.getElementById("home-tab" + i).classList.remove("active");
        document.getElementById("home" + i).classList.remove("show");
        document.getElementById("home" + i).classList.remove("active");
        document
          .getElementById("home-tab" + i)
          .setAttribute("aria-selected", false);
      }
    }

    document.getElementById("myTab").removeChild(element1);
    document.getElementById("myTabContent").removeChild(element2);

    newcomponent.classList.add("active");
    newcomponent.setAttribute("aria-selected", true);
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    renameShipper();
  } else {
    swal.fire({
      title: "First Shipper Cannot be removed!!",
      type: "warning",
      type: "info",
      html: "",
      showCancelButton: true,
      confirmButtonText: "Yes, Continue!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger ml-2",
      buttonsStyling: false,
    });
  }
}


function add_consignee() {
  count = document
    .getElementById("consignee")
    .getElementsByTagName("li").length;
  var mainID = "'consig-title^" + count + "'";
  var contentID = "'consig" + count + "'";
  var objTo = document.getElementById("consignee");
  var divtest =
        '<li class="nav-item-custom nav-item list-item" id="consig-title^' +
        count +
        '"><button class = "nav-tab-list consignee list-anchors-consig" id="consig-tab' +
        count +
        '" data-toggle="tab" href="#consig' +
        count +
        '" role="tab" aria-controls="home" aria-selected="false">Consignee</button><button type="button" class="button-25" onclick="removeConsignee('+
        mainID +
        "," +
        contentID +
        ')" >×</button></li>';
    objTo.innerHTML += divtest;

  //var contentTo = document.getElementById("consigneeContent");
  var contentTo = $("#consigneeContent");
  var contenttest =
        '<div class="tab-pane fade" id="consig' +
        count +
        '" role="tabpanel" aria-labelledby="consig-tab' +
        count +
        '"><div class="row m-2">\n' +
        ' <div class="form-group col-md-3">\n' +

        "<label>Name<span style='color:#ff0000'>*</span></label>\n" +
        '<input list="consigneee' +
        count +
        '" class="form-control " list="consigneee" placeholder="Search here..." id="lb_consignee' +
        count +
        '" name="consigneelist[]" onchange="getConsignee(this.value,' +
        count +
        '); " onkeyup="doSearch(this.value,' +
        "'searchActiveConsignee'" +
        "," +
        count +
        '); "  autocomplete="off">\n' +
        '<datalist   name="consignee" id="consigneee' +
        count +
        '" name="consignee">\n' +
        "</datalist>\n" +

        "</div>\n" +
        '<div class="form-group col-md-2">\n' +
        "<label>Address*</label>\n" +
        " <div>\n" +
        ' <input class="form-control" name="consigneeaddress[]" id="consigneeaddress' +
        count +
        '" placeholder="Address *" type="text"\n' +
        " >\n" +
        " </div>\n" +
        "  </div>\n" +
        ' <div class="form-group col-md-2">\n' +
        " <label>Location *</label>\n" +
        " <div>\n" +
        ' <input class="form-control" placeholder="Enter a location"\n' +
        ' type="text" onkeydown="getLocation(this.id)" id="activeconsignee' +
        count +
        '"name="activeconsignee[]">\n' +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-2">\n' +
        "                                                <label>Delivery Date</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control"  name="consigneepickdate[]" type="date"\n' +
        "                                                           >\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-2">\n' +
        "                                                <label>Delivery Time</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control" name="consigneepicktime[]" type="time"\n' +
        "                                                           >\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-1">\n' +
        "                                                <label>Type*</label>\n" +
        '                                                <div class="row">\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                      <input type="radio" class="custom-control-input consigneeloadtype"\n' +
        '                                                               id="ctl' +
        count +
        '" name="ctl[]' +
        count +
        '"\n' +
        '                                                                value = "TL" checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="ctl' +
        count +
        '">TL</label>\n' +
        "                                                    </div>\n" +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="cltl' +
        count +
        '"  value = "CLTL" name="ctl[]' +
        count +
        '">\n' +
        '                                                        <label class="custom-control-label" for="cltl' +
        count +
        '">LTL</label>\n' +
        "                                                    </div>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-2">\n' +
        "                                                <label>Commodity</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control" name="consigneecommodity[]" type="text"\n' +
        '                                                           placeholder="Commodity" " >\n' +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '<div class="form-group col-md-1 ">\n' +
        "                                                <label>Qty</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control" placeholder="Qty" name="consigneeqty[]" type="text" >\n' +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-2 ">\n' +
        "                                                <label>Weight</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control" type="text" name="consigneeweight[]" placeholder="Weight">\n' +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-2">\n' +
        "                                                <label>Delivery #</label>\n" +
        "                                                <div>\n" +
        '                                                    <input class="form-control" name="consigneedelivery[]" placeholder="Delivery #" type="text"\n' +
        "                                                           >\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                                <div class="form-group col-md-1">\n' +
        "                                                <label>Sr#</label>\n" +
        "                                                <div>\n" +
        '                                                <input class="form-control" placeholder="Sr#" type="number" id="consigseq' +
        count +
        '" name="consigseq[]" value="0">\n' +
        "                                                </div>\n" +
        "                                            </div>\n" +
        '                                            <div class="form-group col-md-4">\n' +
        "                                                <label>Delivery Notes</label>\n" +
        "                                                <div>\n" +
        '                                                    <textarea rows="1" cols="30" class="form-control" placeholder="Delivery Notes" name="deliverynotes[]" type="textarea"\n' +
        "                                                              ></textarea>\n" +
        "                                                </div>\n" +
        "                                            </div>\n" +
        "                                        </div></div>";
    //contentTo.innerHTML += contenttest;
  $(contentTo).append(contenttest);
  renameConsignee();
  makeConsigneeActive();
}


</script>

<!-------------------------------------------------------------------End modal------------------------------------------------------------------->		