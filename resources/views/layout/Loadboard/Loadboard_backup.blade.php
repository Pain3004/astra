<style>

.navtabs_2{
    
    
    width: 100%;
    /* padding: 20px 10px;  */
    font-size:12px
    
  }
  .nav-tab-list{
      margin-bottom: 0px;
  }
  
    .custom_tab-list{
      background-color: #056d92;
      padding: 15px;
      border: 1px solid black;
      border-width: 100%;
      
    }
    .tab{
      border: 1px black;
      background-color: rgb(244, 240, 240);
      border-radius: 5px;
      padding: 5px;
      color: black;
      font-weight: bold;
      margin: 2px;
    }
  
  
  
      .tab-content{
      /* border: 1px black; */
      border-bottom: 1px solid;
    border-left: 1px solid;
    border-right: 1px solid;
      background-color: rgb(245, 239, 239);
      padding: 20px 20px;
      /* border-radius: 20px; */
      border-bottom-left-radius:20px ;
    border-bottom-right-radius: 20px;
      
       color: black; 
      font-weight: bold;
      text-decoration: none;
    } 
    
    .container1{
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }
    .container2{
      
      padding: 20px;
      display: flex;
      justify-content: space-between;
    }
    
  .name1
  {
      display: flex;
      flex-direction: column;
  }
  
   
  .name1 input
  {
      width: 139px;
  }
  
  .custom_tab-list{
      display: flex;
      
      
  }


  .tab_style{
        /* border: 1px black; */
        border-bottom: 1px solid;
    border-left: 1px solid;
    border-right: 1px solid;
    background-color: rgb(245, 239, 239);
    padding: 20px 20px;
    /* border-radius: 20px; */
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    color: black;
    font-weight: bold;
    text-decoration: none;
  }

  .nav-item-custom{
    background-color: #fff;
    padding-left: 10;
    color: #000;
    margin-right: 5px;
    border-radius: 15px;
  }

  .active1{
    background-color: #fff;
    color: #000;
  }

</style>


@include('layout.dashboard.header')

@include('layout.loader')


<div class="page-main">
    @include('layout.dashboard.navigation')
     @include('layout.dashboard.sidebar')
  <!--app-content open-->
  <div class="app-content main-content mt-0" id="LB">
    <div class="side-app">
      <!-- CONTAINER -->
      <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        <div class="page-header">
          <div>
            <h1 class="page-title">Loadboard</h1>
          </div>
          <div class="ms-auto pageheader-btn">
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="javascript:void(0);">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Loadboard</li>
            </ul>
          </div>
          <!-- <div class="dropdown"> -->
          <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
          <!-- </div> -->
        </div>
        <!-- PAGE-HEADER END -->
        <!-- ROW-4 -->
        <input type="hidden" name="_token" id="tokenLoadboard" value="{{ csrf_token() }}" />
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card-body">
              <div class="row">
                <!-- <div class="col-2 btn-group submitter-group"><a href="#" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a></div> -->
                <div class="col-2">
                  <!-- <a href="#addLoadBoardModal" data-toggle="modal" data-target="#addLoadBoardModal" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a> -->
                  <a href="#" id="addLoadBoard" class="button-57_alt">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <span>New Active Load</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- COL END -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card-body">
              <div class="row">
                <!-- <div class="col-2 btn-group submitter-group"><a href="#" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a></div> -->
                <div class="col-3">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="list-unstyled dropdown-menu dropdown-menu-lb" role="menu">
                      <li>
                        <label for="c1" style="display: block;">
                          <input style="margin-right: 2px;" type="checkbox" id="c1" data-col="col-name" class="col-checkbox" />Name </label>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-8 submitter-group ">
                  <input type="checkbox" data-name="Open" class="filter-checkbox checkbox_new" />
                  <input type="checkbox" data-name="Dispatched" class="filter-checkbox checkbox_new" />
                  <input type="checkbox" data-name="Arrived Shipper" class="checkbox_new_alt" />
                  <input type="checkbox" data-name="Loaded" class="checkbox_new" />
                  <input type="checkbox" data-name="On Route" class="checkbox_new_alt2" />
                  <input type="checkbox" data-name="Arrived Consignee" class="checkbox_new_alt3" />
                  <input type="checkbox" data-name="Delivered" class="checkbox_new" />
                  <input type="checkbox" data-name="Break Down" class="checkbox_new_alt4" />
                </div>
                <div class="col-1">
                  <button type="" class="button-70">
                    <i class="fa fa-search" style="font-size: 11px;margin-left: -5px;margin-right: 5px;"></i>Filter </button>
                </div>
                <!-- <div class="col-9 btn-group submitter-group "><ul class="filter-wrapper ks-cboxtags" ><li><input type="checkbox" class="filter-checkbox" id="checkboxOne" value="Open"><label for="checkboxOne">Open</label></li><li><input type="checkbox" class="filter-checkbox" id="checkboxTwo" value="Dispatched"><label for="checkboxTwo">Dispatched</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Shipper"><label for="">Arrived Shipper</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Loaded"><label for="">Loaded</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="On Route"><label for="">On Route</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Consignee"><label for="">Arrived Consignee</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Delivered"><label for="">Delivered</label></li><li><input type="checkbox" class="filter-checkbox" id="" value="Break Down"><label for="">Break Down</label></li></ul></div> -->
              </div>
            </div>
            <div class="card-body">
              <input type="hidden" class="_id">
              <div class="table-responsive">
                <table class="table dataTable no-footer" style="max-height: 100%;overflow: hidden;border-spacing: 4px;border-collapse: unset !important;">
                  <thead class="thead_th">
                    <tr class="tr">
                      <th class="th_new">ID</th>
                      <th class="th_new">Invoice</th>
                      <th class="th_new">Order Id</th>
                      <th class="th_new">Status</th>
                      <th class="th_new">Ship-Date</th>
                      <th class="th_new">Del-Date</th>
                      <th class="th_new">Customer</th>
                      <th class="th_new">Carrier/Driver/Owner Operator</th>
                      <th class="th_new">Origin</th>
                      <th class="th_new">Destination</th>
                      <th class="th_new">Truck</th>
                      <th class="th_new">Trailer</th>
                      <th class="th_new">Load Pay</th>
                      <th class="th_new">Carrier Pay/Driver Pay</th>
                    </tr>
                  </thead>
                  <tbody id="LoadBoardTable"></tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- COL END -->
        </div>
        <!-- ROW-4 END -->
      </div>
    </div>
  </div>
  <!-- CONTAINER END -->
</div>

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
                                <select class="form-control select2-show-search form-select companyListSet" list="companyListSet" id="lb_Company">
                                <option>Select Here </option>
                                <?php
                                foreach($company as $single){                              
                                  foreach($single['company'] as $i_s){
                                    $i_s_name=$i_s['companyName'];              
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
                            <div class="form-group col-md-3">
                                <label>Customer &nbsp; <i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBCustomerPlus" style='color:blue !important'></i>
                                </label>
                            <div class="dropdown show">
                                <select class="form-control select2-show-search form-select customerListSet" list="customerListSet" id="LB_Customer" placeholder>
                                <?php
                                    foreach($customer as $customer){                              
                                        $custName=$customer['custName'];
                                        // $userLastName=$customer['userLastName']; 
                                        // $userLastName=$customer['userLastName'];
                                        // $userLastName=$customer['userLastName'];             
                                        $_id=$customer['_id'];              
                                        ?>
                                          <option value="{{$_id}}-{{$custName}}">{{$custName}} </option>
                                        <?php
                                    }
                                ?>                                                          
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Dispatcher">Dispatcher <span style="color:#ff0000">*</span>
                          </label>
                          <div class="dropdown show">
                            <select class="form-control select2-show-search form-select DispatcherListSet" list="DispatcherListSet" id="lb_Dispatcher" placeholder>
                            <?php
                                foreach($user as $user){                              
                                    $userFirstName=$user['userFirstName'];
                                    $userLastName=$user['userLastName'];              
                                    $_id=$user['_id'];              
                                    ?>
                                      <option value="{{$_id}}">{{$userFirstName}} {{$userLastName}}</option>
                                    <?php
                                }
                            ?>                                                          
                            </select>
                          </div>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="CN">CN No. <span style="color:#ff0000">*</span>
                          </label>
                          <input type="text" class="form-control" id="lbCN_No" placeholder="CN">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Status">Status <span style="color:#ff0000">*</span>
                          </label>
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
                            <select class="form-control select2-show-search form-select LoadTypeListSet" list="LoadTypeListSet" id="lb_load" placeholder>
                            <?php
                                foreach($Load_type as $single){                              
                                  foreach($single['loadType'] as $i_s){
                                    $i_s_name=$i_s['loadName'];              
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
                        <div class="form-group col-md-1">
                          <label for="rateAmount">Rate <span style="color:#ff0000">*</span>
                          </label>
                          <input class="form-control" placeholder="Rate" type="number" id="rateAmount" value="" onkeyup="getTotal()">
                        </div>
                        <div class="form-group col-md-1">
                          <label for="units"># of Units</label>
                          <input type="text" class="form-control telephone4" id="units" placeholder="Units" onkeyup="getTotal()">
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
                            <select class="form-control select2-show-search form-select EquipmentTypeListSet" list="EquipmentTypeListSet" id="lb_EquipmentType" placeholder>
                            <?php
                                foreach($EquipmentType as $single){                              
                                  foreach($single['equipment'] as $i_s){
                                    $equipmentType=$i_s['equipmentType'];              
                                    $id=$i_s['_id'];              
                                    ?>
                                      <option value="{{$id}}">{{$equipmentType}}</option>
                                    <?php
                                  }
                                }
                            ?>                                                          
                            </select>
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
                            <select class="form-control select2-show-search form-select CarrierListSet" list="CarrierListSet" id="LB_Carrier" placeholder>
                            <!-- <option value="">Select Here</option> -->
                        <?php
                            foreach($carrier as $single_carrier){                              
                              foreach($single_carrier['carrier'] as $i_c){
                                $i_c_name=$i_c['name'];              
                                $i_c_id=$i_c['_id'];              
                                ?>
                                  <option value="{{$i_c_id}}">{{$i_c_name}}</option>
                                <?php
                              }
                            }
                        ?>                                                          
                            </select>
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
                            <select class="form-control select2-show-search form-select DriverListSet" list="DriverListSet" id="LB_Driver" placeholder>
                            <?php
                                foreach($driver as $single){                              
                                  foreach($single['driver'] as $i_c){
                                    $name=$i_c['driverName'];              
                                    $id=$i_c['_id'];              
                                    ?>
                                      <option value="{{$id}}">{{$name}}</option>
                                    <?php
                                  }
                                }
                            ?>                                                          
                            </select>
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
                            <select class="form-control select2-show-search form-select " id="lb_owner" placeholder onkeyup="OwnerOperator(this.id)">
                            <?php
                                foreach($driver as $single){                              
                                  foreach($single['driver'] as $i_c){
                                    $name=$i_c['driverName'];
                                    $ownerOperator=$i_c['ownerOperatorStatus'];              
                                    $id=$i_c['_id']; 
                                    if($ownerOperator=="YES") {            
                                    ?>
                                      <option value="{{$id}}">{{$name}}</option>
                                    <?php
                                    }
                                  }
                                }
                            ?>                                                          
                            </select>
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
                            <select class="form-control select2-show-search form-select TruckListSet" list="TruckListSet" id="lb_owner_truck" placeholder name=mySelect2>
                            
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
                                      <option value="{{$id}}-{{$name}}">{{$name}}</option>
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
                            <input class="form-control " readonly="" id="lb_owner_other" placeholder="Other">
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
                            <a class="button-29 shipperName" onclick="add_fields();" data-toggle="tooltip" data-placement="top" title="Click here to add more shippers." style="color: #ffffff;">ADD SHIPPER</a>
                            <i class="mdi mdi-plus-circle plus-xs" id="add_shipper_modal"></i>
                          </h6>
                          <div class="card m-b-30" id="sc-card">
                            <div class="custom_tab-list cardbg">
                              <ul class="nav nav-tabs main-tabs" id="myTab" role="tablist" style="border-bottom: none;">
                                <li class="nav-item-custom nav-item list-item" id="home-title^0">
                                  <button class="nav-tab-list active" id="home-tab0" data-toggle="tab" href="#home0" role="tab" aria-controls="home" aria-selected="true" style=""> Shipper 1</button>
                                  <button type="button" class="button-25" onclick="removeTab('home-title^0','home0')">×</button>
                                  <!-- <a type="button" class="button-25" onclick="removeTab('home-title^0','home0')" aria-hidden="true"></a> -->
                                </li>
                              </ul>
                            </div>
                            <form id="shipperForm">
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab">
                                  <div class="row m-2">
                                    <div class="form-group col-md-3">
                                      <label>Name*</label>
                                      <input type="hidden" id="shipperId" name="shipperId">
                                      <div class="form-group">
                                        <select class="form-control select2-show-search form-select lb_shipperName" id="lb_shipperName" name="shipperName[]">
                                          <option>Select Here </option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Address*</label>
                                      <div>
                                        <input class="form-control" placeholder="Address *" type="text" id="shipperaddress" name="shipperaddress[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Location *</label>
                                      <div>
                                        <input class="form-control" placeholder="Enter a location" type="text" data-location="activeshipper0" id="activeshipper0" onkeydown="getLocation('activeshipper0')" name="shipperLocation[]">
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
                                      <label>Type*</label>
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
                                        <input class="form-control" placeholder="Sr#" type="number" id="shipseq" name="shipseq[]" value="0">
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
                                      <label>Name*</label>
                                      <div class="dropdown show">
                                        <!-- <input class="form-control consigneelist" list="consigneee" id="consigneelist" name="consigneelist[]" placeholder="Search Here"><datalist id="consigneee" name="consignee[]"></datalist>  -->
                                        <!-- <select class="form-control select2-show-search form-select  lb_shipperName" id="consigneelist" name="shipperName[]"> -->
                                        <select class="form-control select2-show-search form-select" list="consigneelist" id="lb_consignee" placeholder name="consigneelist[]">
                                            <option value="">Select Here</option>
                                            <?php
                                                foreach($Consignee as $single){                              
                                                  foreach($single['consignee'] as $i_s){
                                                    $id=$i_s['_id']; 
                                                    $consigneeName=$i_s['consigneeName']; 
                                                    $consigneeAddress=$i_s['consigneeAddress']; 
                                                    $consigneeLocation=$i_s['consigneeLocation']; 
                                                    $deleteStatus=$i_s['deleteStatus']; 
                                                    if($deleteStatus == "NO"){             
                                                      ?>
                                                        <option value="{{$id}}-{{$consigneeAddress}}-{{$consigneeLocation}}">{{$consigneeName}}</option>
                                                      <?php
                                                    }
                                                  }
                                                }
                                            ?>                                                          
                                          </select>
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Address*</label>
                                      <div>
                                        <input class="form-control" placeholder="Address *" type="text" id="consigneeaddress" name="consigneeaddress[]">
                                      </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                      <label>Location *</label>
                                      <div>
                                        <input class="form-control" placeholder="Enter a location" type="text" data-location="activeconsignee0" id="activeconsignee0" onkeydown="getLocation(this.name)" name="activeconsignee[]">
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
                                      <label>Type*</label>
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
                                        <input class="form-control" placeholder="Sr#" type="number" id="consigseq" name="consigseq[]" value="0">
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
                                <button id="carrierratecon"  class="button-29"> Add Email </button>
                              </div>
                            </div>
                            <div class="form-group col-md-2 Carrierlist carrier">
                              <label>Send customer rate con</label>
                              <div>
                                <button id="customerratecon"  class="button-29"> Add Email </button>
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
            <button type="submit" class="button-29" id="driLBSubmit" onclick="getdriverOtherCharges()">Submit</button>
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
          '<input type="number" class="form-control" name="Amount[]_own">'+
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
    // $(document).ready(function() {
    //     $('#showdriver').prop('checked',true);
    //     $('#showowner').prop('checked',false);
    //     showCheck();
    // });
    // function showCheck() {
    //     // $('#showowner').prop('checked',false);
    // if (document.getElementById('showdriver').checked) {
    //     document.getElementById('showdrivername').style.visibility = 'visible';
    //     document.getElementById('showtruck').style.visibility = 'visible';
    //     document.getElementById('showtrailer').style.visibility = 'visible';
    //     document.getElementById('showloadedmiles').style.visibility = 'visible';
    //     document.getElementById('showemptymiles').style.visibility = 'visible';
    //     document.getElementById('showother').style.visibility = 'visible';
    //     document.getElementById('showtarp').style.visibility = 'visible';
    //     document.getElementById('showflat').style.visibility = 'visible';
    //     document.getElementById('showtotal').style.visibility = 'visible';
    // }
    // else {
    //     $('#showdriver').prop('checked',false);
    //     document.getElementById('showdrivername').style.visibility = 'hidden';
    //     document.getElementById('showtruck').style.visibility = 'hidden';
    //     document.getElementById('showtrailer').style.visibility = 'hidden';
    //     document.getElementById('showloadedmiles').style.visibility = 'hidden';
    //     document.getElementById('showemptymiles').style.visibility = 'hidden';
    //     document.getElementById('showother').style.visibility = 'hidden';
    //     document.getElementById('showtarp').style.visibility = 'hidden';
    //     document.getElementById('showflat').style.visibility = 'hidden';
    //     document.getElementById('showtotal').style.visibility = 'hidden';
    // }
    // if (document.getElementById('showowner').checked) {
    //     document.getElementById('showowneroperator').style.visibility = 'visible';
    // }
    // else {
    //     document.getElementById('showowneroperator').style.visibility = 'hidden';
    // }

// }

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
    "<label>Name1*</label>\n" +
    '<select class="form-control select2-show-search form-select lb1_shipperName" id="lb1_shipperName" name="shipperName[]"> <option>Select Here </option> </select>'+
    // '<input list="shipper' +
    // room +
    // '" class="form-control ShipperListSet"  list="ShipperListSet" placeholder="Search here..." id="shipperlist' +
    // room +
    // '" name="shipperlist" onchange="getShipper(this.value,' +
    // room +
    // '); " onkeyup="doSearch(this.value,' +
    // "'searchActiveShipper'" +
    // "," +
    // room +
    // '); "  autocomplete="off">\n' +
    // '<datalist  id="ShipperListSet" class="ShipperListSet"' +
    // room +
    // '" name="shipper">\n' +
    // "                                                 </datalist>\n" +
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
    $(".lb1_shipperName").select2({
    placeholder: "Select a programming language",
    allowClear: true,
    dropdownParent: $('#addLoadBoardModal')
    });
    // alert();
    $.ajax({
        type: "GET",
        url: base_path+"/admin/Shipper",
        async: false,
        success: function(Result) { 
        createshipperList(Result);
        }
    });
    function createshipperList(Result) {           
        var Length = 0;    
        if (Result != null) {
            Length = Result.shipper.length;
        }

        if (Length > 0) {
            // var no=1;
            // $(".ShipperListSet").html('');
            for (var i = 0; i < Length; i++) { 
                var shipperLength =Result.shipper[i].shipper.length;
                for (var j = 0; j < shipperLength; j++) {  
                var id =Result.shipper[i].shipper[j]._id;
                var shipperName =Result.shipper[i].shipper[j].shipperName;
                var shipperAddress =Result.shipper[i].shipper[j].shipperAddress;
                var shipperLocation =Result.shipper[i].shipper[j].shipperLocation;
                // var shipperNumber =Result.shipper[i].shipper[j].shipperNumber;
                var deleteStatus =Result.shipper[i].shipper[j].deleteStatus;

                // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                    var List = "<option class='LB_Shipper' value='"+id+"-"+shipperAddress+"-"+shipperLocation+"'>"+shipperName+"</option>"                   
                    // $("#lb_shipperName").append(List);
                    $(".lb1_shipperName").append(List);
                // }
                }
            }
        }
        
    }

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
    console.log("rename function");
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
        "<label>Name1*</label>\n" +


        
        '<select list="consigneee' +
        count +
        '" class="form-control select2-show-search form-select consigneee"  placeholder id="lb_consignee' +
        count +
        '" name="consigneelist[]" autocomplete="off">\n' +
        // count +
        // ');"'  +
        // count +
        // '); "  autocomplete="off">\n' +
        '<option>Select Here</option>' +
        count +
        // '" name="consignee">\n' +
        // "</datalist>\n" +
        <?php
            foreach($Consignee as $single){                              
              foreach($single['consignee'] as $i_s){
                $id=$i_s['_id']; 
                $consigneeName=$i_s['consigneeName']; 
                $consigneeAddress=$i_s['consigneeAddress']; 
                $consigneeLocation=$i_s['consigneeLocation']; 
                $deleteStatus=$i_s['deleteStatus']; 
                if($deleteStatus == "NO"){             
                  ?>
                    '<option value="{{$id}}-{{$consigneeAddress}}-{{$consigneeLocation}}">{{$consigneeName}}</option>' +
                  <?php
                }
              }
            }
        ?>                                                          
      "</select>\n" +
     

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

function renameConsignee() {
  var consignee = document.getElementsByClassName("consignee");
  for (
    var i = 0;
    i < document.getElementById("consignee").getElementsByTagName("li").length;
    i++
  ) {
    consignee[i].innerHTML = "Consignee " + (i + 1);
  }
}

function makeConsigneeActive() {
  for (var i = 0; i < count; i++) {
    var component = document.getElementById("consig-tab" + i);
    var component1 = document.getElementById("consig" + i);
    if (component && component1) {
      component.classList.remove("active");
      component1.classList.remove("show");
      component1.classList.remove("active");
      component.setAttribute("aria-selected", false);
    }
  }
  var newcomponent = document.getElementById("consig-tab" + i);
  var newcomponent1 = document.getElementById("consig" + i);
  newcomponent.classList.add("active");
  newcomponent1.classList.add("show");
  newcomponent1.classList.add("active");
  newcomponent.setAttribute("aria-selected", true);
}

function removeConsignee(mainid, contentid) {
  var element1 = document.getElementById(mainid);
  var element2 = document.getElementById(contentid);
  var ids = mainid.split("^");
  var tabID = ids[1];
  var newcomponent;
  var newcomponent1;
  if (mainid == "consig-title^0") {
    swal.fire({
      title: "First Consignee Cannot be removed!!",
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
    if (document.getElementById("consig-title^" + i)) {
      newcomponent = document.getElementById("consig-tab" + i);
      newcomponent1 = document.getElementById("consig" + i);
      break;
    }
  }

  if (
    document.getElementById("consignee").getElementsByTagName("li").length > 1
  ) {
    for (var i = 0; i <= count; i++) {
      if (
        document.getElementById("consig-tab" + i) &&
        document.getElementById("consig" + i)
      ) {
        document.getElementById("consig-tab" + i).classList.remove("active");
        document.getElementById("consig" + i).classList.remove("show");
        document.getElementById("consig" + i).classList.remove("active");
        document
          .getElementById("consig-tab" + i)
          .setAttribute("aria-selected", false);
      }
    }

    document.getElementById("consignee").removeChild(element1);
    document.getElementById("consigneeContent").removeChild(element2);

    newcomponent.classList.add("active");
    newcomponent.setAttribute("aria-selected", true);
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    renameConsignee();
  } else {
    swal.fire({
      title: "First Consignee Cannot be removed!!",
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


$('.LBshipper').click(function(){
   alert(); 
});


// <!-- -------------------------------------------------------------------------AccessorialModal ------------------------------------------------------------------------- -->
function getOtherCharges(){
  
  var tagSelect = [];
  var tot =parseFloat(0);


  $('input[name^="other_charges"]').each(function(oneTag){
      var oneValue = $(this).val();
      alert(oneValue);
      tot=parseFloat(tot)+parseFloat(oneValue);
      $('#MainOtherCharges').val(tot);
      getTotal();
      $("#AccessorialModal").modal('hide');
  });
}
// // <!-- -------------------------------------------------------------------------end of AccessorialModal ------------------------------------------------------------------------- -->

//-----------------------total-----------------
function getTotal() {
  
    var rateAmount = document.getElementById('rateAmount').value;
    // alert(rateAmount);
    var noOfUnits = document.getElementById('units').value;
    var fsc = document.getElementById('fsc').value;
    var totalAmount = document.getElementById('totalAmount');
    var ratePercentage = document.getElementById('fsc_percentage');
    var otherCharges = document.getElementById('MainOtherCharges').value;

    if (rateAmount != "" && noOfUnits == "" && fsc == "" && otherCharges == "") {
        totalAmount.value = parseFloat(rateAmount).toFixed(2);
       //$('#totalAmount').val(totalAmountvalue);
    }

    if (noOfUnits != "" && fsc == "") {
        if (rateAmount != "") {
            totalAmount.value = parseFloat(rateAmount * noOfUnits).toFixed(2);
            //$('#totalAmount').val(totalAmountvalue);
        } else {
            swal.fire({
                title: 'Warning!',
                text: "Rate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });

        }
    }
    if (fsc != "" && otherCharges == "") {
      if ($("#fsc_percentage").is(":checked")) { 
        // if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100));
                totalAmount.value = total.toFixed(2);
                //$('#totalAmount').val(totalAmountvalue);
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
          alert();
            if (rateAmount != "") {
                if (typeof (rateAmount) == 'number') {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseInt(rateAmount * noOfUnits) + parseInt(fsc);
                    totalAmount.value = total.toFixed(2);
                    //$('#totalAmount').val(totalAmountvalue);
                } else {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseFloat(rateAmount * noOfUnits) + parseFloat(fsc);
                    totalAmount.value = total.toFixed(2);
                    //$('#totalAmount').val(totalAmountvalue);
                }
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }

    if (otherCharges != "") {
        if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 + parseFloat(otherCharges) : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100) + parseFloat(otherCharges));
                totalAmount.value = total.toFixed(2);
                //$('#totalAmount').val(totalAmountvalue);
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + getFSC(fsc) + parseFloat(otherCharges) : parseInt(rateAmount * noOfUnits) + getFSC(fsc) + parseFloat(otherCharges);
                totalAmount.value = total.toFixed(2);
                ////$('#totalAmount').val(totalAmountvalue);

            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }
}
function getFSC(fsc) {
  if (fsc == "") {
    return 0;
  } else {
    return parseFloat(fsc);
  }
}
//-----------------------end total-----------------


//-----------------------calculateMiles-----------------


function calculateMiles() {
  $(".loader1").css("display", "inline-block");
  document.getElementById("drivermiles").value = 0;
  document.getElementById("loadedmiles").value = 0;
  document.getElementById("emptymiles").value = 0;
  var shipLoc = document.getElementsByName("activeshipper");
  var shipseq = document.getElementsByName("shipseq");
  var consigLoc = document.getElementsByName("activeconsignee");
  var consigseq = document.getElementsByName("consigseq");
  var locations = [];
  var startFlag = 0;
  var endflag = 0;
  var startLocation = 'AKRON, OH';
  var endLocation = 'ADDISON, TX';
 // alert(startLocation);
  if (startLocation != "") {
    locations.push({ seq: "0", location: startLocation });
    startFlag = 1;
  }
  for (var i = 0; i < shipLoc.length; i++) {
    if (shipLoc[i].value == "") {
      swal.fire({
        title:
          "<h5>One of the shipper's location is empty. Please fill it to continue</h5>",
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
      $(".loader1").css("display", "none");
      return;
    }
    locations.push({ seq: shipseq[i].value, location: shipLoc[i].value });
  }
  for (var i = 0; i < consigLoc.length; i++) {
    if (consigLoc[i].value == "") {
      swal.fire({
        title:
          "<h5>One of the consignees's location is empty. Please fill it to continue</h5>",
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
      $(".loader1").css("display", "none");
      return;
    }
    locations.push({ seq: consigseq[i].value, location: consigLoc[i].value });
  }

  if (endLocation != "") {
    locations.push({ seq: "300", location: endLocation });
    endflag = 1;
  }
// alert(locations.length);
  if (locations.length <= 1) {
    swal.fire({
      title: "<h5>There should be atleast one shipper and one consignee</h5>",
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
  locations.sort(compare);
  var waypts = [];
  for (var i = 0; i < locations.length; i++) {
    waypts.push({ location: locations[i].location, stopover: true });
  }
  calcRoute(waypts, startFlag, endflag);
}

function compare(a, b) {
  const seqA = a.seq;
  const seqB = b.seq;

  let comparison = 0;
  if (seqA > seqB) {
    comparison = 1;
  } else if (seqA < seqB) {
    comparison = -1;
  }
  return comparison;
}
function calcRoute(waypts, startFlag, endflag) {
  EmptyHour = 0;
  loadedHour = 0;
  var request = {
    origin: waypts[0].location,
    destination: waypts[waypts.length - 1].location,
    waypoints: waypts,
    optimizeWaypoints: true,
    travelMode: google.maps.DirectionsTravelMode.DRIVING,
    unitSystem: google.maps.DirectionsUnitSystem.METRIC,


  };
  var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();

  directionsService.route(request, function (response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      var distance = 0;
      var time_taken = 0;
      var empty_km = 0;
      for (var i = 0; i < response.routes[0].legs.length; i++) {
        if (startFlag == 0 && endflag == 0) {
          distance += response.routes[0].legs[i].distance.value;
          loadedHour += response.routes[0].legs[i].duration.value;
          time_taken += response.routes[0].legs[i].duration.value;
        } else if (startFlag == 1 && endflag == 0) {
          if (i == 1) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
          }
        } else if (startFlag == 0 && endflag == 1) {
          if (i == response.routes[0].legs.length - 2) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
          }
        } else if (startFlag == 1 && endflag == 1) {
          if (i == 1) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else if (i == response.routes[0].legs.length - 2) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
          }
        }
      }

      //alert("loaded hour = "+loadedHour + "Empty hour = "+EmptyHour);
      var calc_distance = distance;

      function roundNumber(numbr, decimalPlaces) {
        var placeSetter = Math.pow(10, decimalPlaces);
        numbr = Math.round(numbr * placeSetter) / placeSetter;
        return numbr;
      }

      var mi = calc_distance / 1.609;
      mi = mi / 1000;
      mi = roundNumber(mi, 2);

      var empty_mi = empty_km / 1.609;
      empty_mi = empty_mi / 1000;
      empty_mi = roundNumber(empty_mi, 2);

      //alert("Total miles  = "+mi + "Empty miles = "+empty_mi);
      $("#drivermiles").val((empty_mi + mi).toFixed(2));
      $("#loadedmiles").val(Math.abs(mi).toFixed(2));
      $("#emptymiles").val(empty_mi);
      var type = document.getElementsByName("typeofloder");
      var checked = getTypeOfLoader(type);
      if (checked == "driver") {
        getDriverTotal();
      }
      $(".loader1").css("display", "none");
    } else {
      $(".loader1").css("display", "none");
      alert("Unable to find route!!!");
    }
  });

  
}
//-----------------------end calculateMiles-----------------
// //-----------------------other Carrier modal-----------------
// <!-- -------------------------------------------------------------------------Accessorial carrier Modal ------------------------------------------------------------------------- -->
function getcarrierOtherCharges(){
  
  // var tagSelect = [];
  var tot1 =parseFloat(0);
  var tot2 =parseFloat(0);
  var tot =parseFloat(0);


  $('input[name^="Advance_car"]').each(function(oneTag){
      var oneValue1 = $(this).val();
      tot1=parseFloat(tot1)+parseFloat(oneValue1);
  });
  $('input[name^="Charges_car[]"]').each(function(oneTag){
      var oneValue = $(this).val();
      tot2=parseFloat(tot2)+parseFloat(oneValue);
  });
  tot=parseFloat(tot1)+parseFloat(tot2)
  $('#Advcarrier').val(tot);
  getCarrierTotal();
  $("#AccessorialModal_carrier").modal('hide');
}

function getCarrierTotal() {
  var flatrate = document.getElementById("LB_FlatRate").value;
 console.log(flatrate);
  var advancecharges = document.getElementById("Advcarrier").value;
  var total_charges = document.getElementById("LB_CarrierTotal");
  if (flatrate != "" && advancecharges == "") {
    total_charges.value = parseFloat(flatrate).toFixed(2);
  }
  if (advancecharges != "") {
    if (flatrate == "") {
      swal.fire({
        title: "Warning!",
        text: "Flatrate cannot be empty",
        type: "warning",
        showCancelButton: true,
        cancelButtonClass: "btn btn-danger ml-2",
      });
    } else {
      total_charges.value = parseFloat(
        parseFloat(flatrate) + parseFloat(advancecharges)
      ).toFixed(2);
    }
  }
}
// //-----------------------other Carrier modal-----------------
// <!-- -------------------------------------------------------------------------Accessorial driver Modal ------------------------------------------------------------------------- -->
function getdriverOtherCharges(){
  var tot =parseFloat(0);
  $('input[name^="Amount_dri"]').each(function(oneTag){
      var oneValue = $(this).val();
      alert(oneValue);
      tot=parseFloat(tot)+parseFloat(oneValue);
      $('#lb_driver_Other').val(tot);
  });
  $("#AccessorialModal_driver").modal('hide');
  getDriverTotal();
  

  // $('input[name^="Amount_dri"]').each(function(oneTag){
  //     var oneValue = $(this).val();
  //     alert(oneValue);
  //     tot=parseFloat(tot)+parseFloat(oneValue);
  //     $('#lb_driver_Other').val(tot);
  //     getDriverTotal();
  //     $("#AccessorialModal_driver").modal('hide');
  // });
}
function getDriverTotal() {
    // getDriver(document.getElementById('LB_Driver').value);
    // getDriver(document.getElementById('select2-LB_Driver-container').value);
    var driver_other_charges = document.getElementById('lb_driver_Other');
    var driver_total = document.getElementById('LB_loadertotal');
    var loadedMiles = document.getElementById('lb_LoadedMiles');
    var emptyMiles = document.getElementById('lb_EmptyMiles');
    var totalMiles = document.getElementById('drivermiles');
    var shipLoc = document.getElementsByName('activeshipper');
    var consigLoc = document.getElementsByName('activeconsignee');
    var driverTotal = 0;
    var loadedTotal = 0;
    var pickTotal = 0;
    var dropTotal = 0;
    var emptyTotal = 0;
    var hourlyTotal = 0;
    var flat = document.getElementById('driverflat');
    var driverflat = document.getElementById("lb_Flat");
    if (driver_other_charges.value != "") {
        driverTotal += parseFloat(driver_other_charges.value);
    } else {
        driver_other_charges.value = 0;
    }
    var driver_tarp = document.getElementById('lb_Tarp');
    var tarp_select = document.getElementById('driverTarpSelect');


    if (tarp_select.value == "Yes") {
        if (driver_tarp.value == 0) {
            driver_tarp.value = tarp;
        } else {
            tarp = driver_tarp.value;

        }

        //driverTotal += parseFloat(parseFloat(driver_other_charges.value) + parseFloat(tarp)).toFixed(2);
        driverTotal += parseFloat(driver_other_charges.value) + parseFloat(tarp);

    } else if (tarp_select.value == "No") {
        if (driver_tarp.value != "") {
            driver_tarp.value = "";
            //driverTotal += parseFloat(driver_other_charges.value).toFixed(2);
            driverTotal += parseFloat(driver_other_charges.value);
        }
    } else {
        swal({
            title: 'Tarp is not added for selected driver.',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
    }

    if (driverRate == "mile") {
        if (loadedMiles.value != "") {
            loadedTotal = parseFloat(parseFloat(loadedMiles.value) * parseFloat(document.getElementById('loadedmile').value));

        }
        if (emptyMiles.value != "") {
            emptyTotal = parseFloat(parseFloat(emptyMiles.value) * parseFloat(document.getElementById('emptymile').value));

        }
        driverTotal += eval(loadedTotal + emptyTotal);
    } else if (driverRate == "hour") {
        if (loadedMiles.value != "") {
            loadedTotal = parseFloat(parseFloat(loadedHour / 3600) * parseFloat(document.getElementById('loadedmile').value));
        }
        if (emptyMiles.value != "") {
            emptyTotal = parseFloat(parseFloat(EmptyHour / 3600) * parseFloat(document.getElementById('emptymile').value));
        }
        driverTotal += eval(loadedTotal + emptyTotal);
    }
    if (loadedMiles.value != 0) {
        if (shipLoc.length >= 0) {
            if (pickrate > 0) {
                pickTotal += parseFloat(pickrate * (shipLoc.length - pickafter)).toFixed(2);
            }

        }
        if (consigLoc.length >= 0) {
            if (droprate > 0) {
                dropTotal += parseFloat(pickrate * (consigLoc.length - dropafter)).toFixed(2);

            }

        }

    }
    if (driverRate != 'percentage') {
        if (driverflat.value == "") {
            driverTotal += parseFloat(pickTotal) + parseFloat(dropTotal);
            driver_total.value = parseInt(driverTotal).toFixed(2);
        } else {
            driver_total.value = parseFloat(driverflat.value).toFixed(2);
        }


    }
}

function changeDriverTotal() {
  var driverflat = document.getElementById("lb_Flat");
  var driver_other_charges = document.getElementById("lb_driver_Other");
  var driver_total = document.getElementById("LB_loadertotal");

  if (driver_other_charges.value != "") {
    driver_total.value = parseFloat(
      parseFloat(driverflat.value) + parseFloat(driver_other_charges.value)
    ).toFixed(2);
  } else {
    driver_total.value = parseFloat(driverflat.value).toFixed(2);
  }
  if (driverflat.value == "") {
    driver_total.value = 0;
  }
}
// //-----------------------other driver modal-----------------
</script>

<!-------------------------------------------------------------------End modal------------------------------------------------------------------->		

@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
