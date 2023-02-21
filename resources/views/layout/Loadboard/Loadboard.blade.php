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

	<!-- PAGE -->
	<div class="page">
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
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Loadboard</li>
								</ol>
							</div>
							<!-- <div class="dropdown"> -->
								
								<!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div> -->
							<!-- </div> -->
						</div>
						<!-- PAGE-HEADER END -->

                       

						<!-- ROW-4 -->
						<input type="hidden" name="_token" id="tokenLoadboard" value="{{ csrf_token() }}" />

						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="card product-sales-main">
									<div class="thead_lb ">
											<div class="row" style="height:5%;">
                                                <!-- <div class="col-2 btn-group submitter-group">
													<a href="#" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a>
												</div> -->
                                                <div class="col-2 btn-group submitter-group">
                                                    <!-- <a href="#addLoadBoardModal" data-toggle="modal" data-target="#addLoadBoardModal" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a> -->
                                                    <a href="#" id="addLoadBoard" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a>

                                                </div>
												<div class="col-1">
												</div>
												<div class="col-9 btn-group submitter-group ">
													<ul class="filter-wrapper ks-cboxtags" >
														<li><input type="checkbox" class="filter-checkbox" id="checkboxOne" value="Open"><label for="checkboxOne">Open</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="checkboxTwo" value="Dispatched"><label for="checkboxTwo">Dispatched</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Shipper"><label for="">Arrived Shipper</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="Loaded"><label for="">Loaded</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="On Route"><label for="">On Route</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Consignee"><label for="">Arrived Consignee</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="Delivered"><label for="">Delivered</label></li>
														<li><input type="checkbox" class="filter-checkbox" id="" value="Break Down"><label for="">Break Down</label></li>
													</ul>												
												</div>
											</div>
									</div>
									<div class="card-body">
										<input type="hidden" class="_id">
                                            <!-- <div class="content">
                                                <div class="row">
                                                    <div class="col-2">
														<input type="hidden" name="_token" id="tokenLoadboard" value="{{ csrf_token() }}" />
	                                                </div>
                                                    <div class="col-10"> -->
                                                        <!-- <div class="btn-group submitter-group float-right">
                                                            <ul class="filter-wrapper ks-cboxtags">
                                                                <li><input type="checkbox" class="filter-checkbox" id="checkboxOne" value="Open"><label for="checkboxOne">Open</label></li>
                                                                <li><input type="checkbox" class="filter-checkbox" id="checkboxTwo" value="Dispatched"><label for="checkboxTwo">Dispatched</label></li>
																<li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Shipper"><label for="">Arrived Shipper</label></li>
                                                                <li><input type="checkbox" class="filter-checkbox" id="" value="Loaded"><label for="">Loaded</label></li>
																<li><input type="checkbox" class="filter-checkbox" id="" value="On Route"><label for="">On Route</label></li>
                                                                <li><input type="checkbox" class="filter-checkbox" id="" value="Arrived Consignee"><label for="">Arrived Consignee</label></li>
																<li><input type="checkbox" class="filter-checkbox" id="" value="Delivered"><label for="">Delivered</label></li>
                                                                <li><input type="checkbox" class="filter-checkbox" id="" value="Break Down"><label for="">Break Down</label></li>
                                                            </ul>
                                                        </div> -->
                                                    <!-- </div>
                                                </div>
                                            </div> -->
										<div class="table-responsive">
                                            <table id="example" class="" style="max-height: 100%;overflow: hidden;" >
                                                <thead class="thead_th_lb">
                                                    <tr class="tr" >
                                                        <th>ID</th>
                                                        <th>Invoice</th>
														<th>Order Id</th>
                                                        <th>Status</th>
                                                        <th>Ship-Date</th>
                                                        <th>Del-Date</th>
                                                        <th>Customer</th> 
                                                        <th>Carrier/Driver/Owner Operator</th>
                                                        <th>Origin</th>
                                                        <th>Destination</th>
                                                        <th>Truck</th>
                                                        <th>Trailer</th>
                                                        <th>Load Pay</th>
                                                        <th>Carrier Pay/Driver Pay</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="LoadBoardTable">
                                                   
                                                </tbody>
                                            </table>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
						</div>
						<!-- ROW-4 END -->

					</div>
				</div>
			</div>
			<!-- CONTAINER END -->
		</div>

<!-- <div class="invoice_menu">
    <div class="invoice_menu_inner">
        <ul>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Menu 3</a></li>            
        </ul>
    </div>
</div>		 -->

<!------------------------------------------------------------------- Add   modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addLoadBoardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New LoadBoard</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
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
                                            <form>
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="CompanyName">Select Your Company <span style="color:#ff0000">*</span> </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control companyListSet" list="companyListSet" name="" id="lb_Company" placeholder="Search Here">
                                                            <datalist id="companyListSet" class="companyListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Customer &nbsp;<i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBCustomerPlus" style='color:blue !important' ></i></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control customerListSet" list="customerListSet" name="" id="LB_Customer" placeholder="Search Here">
                                                            <datalist id="customerListSet" class="customerListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="Dispatcher">Dispatcher <span style="color:#ff0000">*</span> </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control DispatcherListSet" list="DispatcherListSet" name="" id="lb_Dispatcher" placeholder="Search Here">
                                                            <datalist id="DispatcherListSet" class="DispatcherListSet"></datalist>    
                                                        </div>  
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="CN">CN No.<span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lbCN_No" placeholder="CN">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="Status">Status <span style="color:#ff0000">*</span> </label>
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
                                                        <label>Active Type &nbsp;<i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBLoadTypePlus" style='color:blue !important'></i></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control LoadTypeListSet" list="LoadTypeListSet"  id="lb_load" placeholder="Search Here">
                                                            <datalist id="LoadTypeListSet" class="LoadTypeListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="rateAmount">Rate <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input class="form-control" placeholder="Rate" type="number" id="rateAmount"  value="" >
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="units"># of Units</label>
                                                        <input type="text" class="form-control telephone4"
                                                            id="units" placeholder="Units">
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label style="display:inline">F.S.C.</label>
                                                        <div style="display:inline" class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="fsc_percentage" data-parsley-multiple="groups" data-parsley-mincheck="2" onclick="getTotal()">
                                                            <label class="custom-control-label" for="fsc_percentage">Rate%</label>
                                                        </div>
                                                        <div>
                                                            <input class="form-control mt-2" placeholder="F.S.C." type="number" id="fsc" name="fsc" value="" onkeyup="getTotal()">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label>Oth Chg</label>
                                                        <span herf="#addOthChgModal" data-target="#addOthChgModal" class="glyphicon glyphicon-plus-sign"  data-toggle="modal"  style="cursor:pointer;" ></span>
                                                        
                                                            
                                                            <input class="form-control" placeholder="Other Charges" type="text" id="MainOtherCharges" modal-value="[]" onkeyup="getTotal()" readonly="">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Total Rate</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Total Rate" type="number" id="totalAmount" name="totalAmount" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Equipment Type &nbsp;<i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBEquipmentTypePlus" style='color:blue !important'></i></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control EquipmentTypeListSet" list="EquipmentTypeListSet" name="" id="lb_EquipmentType">
                                                            <datalist id="EquipmentTypeListSet" class="EquipmentTypeListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <div>
                                                            <input type="radio" name="show" id="showdriver"  onclick="javascript:showCheck();">
                                                            <label for="driver">Driver</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name="show" id="showowner"  onclick="javascript:showCheck();">
                                                            <label for="owner">OwnerOperator</label>
                                                        </div>
                                                    </div>
                                                    <div id="showdrivername" style="visibility:hidden" class="form-group col-md-2">
                                                        <label>Driver Name &nbsp;<i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBDriverPlus" style='color:blue !important'></i></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control DriverListSet" list="DriverListSet" name="" id="LB_Driver" placeholder="Search Here">
                                                            <datalist id="DriverListSet" class="DriverListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div id="showowneroperator" style="visibility:hidden" class="form-group col-md-2">
                                                        <label for="OwnerOperator">OwnerOperator<span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lb_OwnerOperator" placeholder="OwnerOperator">
                                                    </div>
                                                    <div id="showtruck" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="Truck">Truck<span style="color:#ff0000">*</span></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control TruckListSet" list="TruckListSet" name="" id="LB_Truck" placeholder="Search Here">
                                                            <datalist id="TruckListSet" class="TruckListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div id="showtrailer" style="visibility:hidden" class="form-group col-md-1">
                                                        <label>Trailer &nbsp;<i title="Add Customer" class="mdi mdi-plus-circle plus" id="LBTrailerPlus" style='color:blue !important'></i></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control TrailerListSet" list="TrailerListSet" name="" id="LB_Trailer" placeholder="Search Here">
                                                            <datalist id="TrailerListSet" class="TrailerListSet"></datalist>    
                                                        </div>
                                                    </div>
                                                    <div id="showloadedmiles" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="LoadedMiles">Loaded Mi<span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lb_LoadedMiles" placeholder="LoadedMiles">
                                                    </div>
                                                    <div id="showemptymiles" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="EmptyMiles">Empty Mi<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lb_EmptyMiles" placeholder="EmptyMiles">
                                                    </div>
                                                    <div id="showother" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="Other">Other<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="Other" placeholder="Other">
                                                    </div>
                                                    <div id="showtarp" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="Tarp">Tarp<span  style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lb_Tarp"  placeholder="Tarp">
                                                    </div>
                                                    <div id="showflat" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="Flat">Flat<span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="lb_Flat" placeholder="Flat">
                                                    </div>
                                                    <div id="showtotal" style="visibility:hidden" class="form-group col-md-1">
                                                        <label for="Total">Total<span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="LB_loadertotal" placeholder="Total">
                                                    </div>
                                                </div>

                                              <!-- add shipper   -->
                                                <div class="form-row">
                                                    <div class="navtabs_2">
                                                    <h6>
                                                        <a class="button-29" onclick="add_fields();" data-toggle="tooltip"
                                                            data-placement="top" title="Click here to add more shippers." style="color: #ffffff;">ADD SHIPPER</a>
                                                        <i class="mdi mdi-plus-circle plus-xs" id="add_shipper_modal"></i>
                                                    </h6>
                                                    <div class="card m-b-30" id="sc-card">
                                                        <div class="custom_tab-list cardbg">
                                                            <ul class="nav nav-tabs main-tabs" id="myTab" role="tablist" style="border-bottom: none;">
                                                                <li class="nav-item-custom nav-item list-item" id="home-title^0">
                                                                    <button class="nav-tab-list active" id="home-tab0" data-toggle="tab"href="#home0" role="tab" aria-controls="home" aria-selected="true" style="">
                                                                        Shipper 1</button>
                                                                        <button type="button" class="button-25" onclick="removeTab('home-title^0','home0')">×</button>
                                                                        <!-- <a type="button" class="button-25" onclick="removeTab('home-title^0','home0')" aria-hidden="true"></a> -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="home0" role="tabpanel"aria-labelledby="home-tab">
                                                                <div class="row m-2">
                                                                    <div class="form-group col-md-3">
                                                                        <label>Name*</label>
                                                                        <!-- <div class="dropdown show">
                                                                            <input class="form-control shipperlist" list="shipperlist" name="" id="LB_shipper" placeholder="Search Here">
                                                                            <datalist id="shipperlist" class="shipperlist"></datalist>    
                                                                        </div>
                                                                        <label for="Truck">Truck<span style="color:#ff0000">*</span></label> -->
                                                                        <div class="dropdown show">
                                                                            <input class="form-control ShipperListSet" list="ShipperListSet" name="" id="LB_Shipper" placeholder="Search Here">
                                                                            <datalist id="ShipperListSet" class="ShipperListSet"></datalist>    
                                                                        </div>
                                                                        
                                                             
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Address*</label>
                                                                        <div>
                                                                            <input class="form-control" placeholder="Address *" type="text" id="shipperaddress0" name="shipperaddress">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Location *</label>
                                                                        <div>
                                                                            <input class="form-control" placeholder="Enter a location" type="text" id="activeshipper0" name="activeshipper">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Pickup Date</label>
                                                                        <div>
                                                                            <input class="form-control" type="date" id="shipperdate" name="shipperdate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Pickup Time</label>
                                                                        <div>
                                                                            <input class="form-control" type="time" id="shippertime" name="shippertime">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-1">
                                                                        <label>Type*</label>
                                                                        <div class="row">
                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                <input type="radio" class="custom-control-input" id="tl0" name="tl0" value="TL" checked>
                                                                                <label class="custom-control-label" for="tl0">TL</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                <input type="radio" class="custom-control-input" id="ltl0" value="LTL" name="tl0">
                                                                                <label class="custom-control-label" for="ltl0">LTL</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Commodity</label>
                                                                        <div>
                                                                            <input class="form-control" type="text" placeholder="Commodity" id="shippercommodity" name="shippercommodity">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-1 ">
                                                                        <label>Qty</label>
                                                                        <div>
                                                                            <input class="form-control" placeholder="Qty" id="shipperqty"  name="shipperqty" type="text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2 ">
                                                                        <label>Weight</label>
                                                                        <div>
                                                                            <input class="form-control" type="text" placeholder="Weight"  id="shipperweight" name="shipperweight">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Pickup #</label>
                                                                        <div>
                                                                            <input class="form-control" placeholder="Pickup #" type="text" id="shipperpickup" name="shipperpickup">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-1">
                                                                        <label>Sr#</label>
                                                                        <div>
                                                                            <input class="form-control" placeholder="Sr#" type="number" id="shipseq0" name="shipseq" value="0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>Pickup Notes</label>
                                                                        <div>
                                                                            <textarea rows="1" cols="30" class="form-control" type="textarea" id="shippernotes" name="shippernotes"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



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
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#showdriver').prop('checked',true);
        $('#showowner').prop('checked',false);
        showCheck();
    });
    function showCheck() {
        // $('#showowner').prop('checked',false);
    if (document.getElementById('showdriver').checked) {
        document.getElementById('showdrivername').style.visibility = 'visible';
        document.getElementById('showtruck').style.visibility = 'visible';
        document.getElementById('showtrailer').style.visibility = 'visible';
        document.getElementById('showloadedmiles').style.visibility = 'visible';
        document.getElementById('showemptymiles').style.visibility = 'visible';
        document.getElementById('showother').style.visibility = 'visible';
        document.getElementById('showtarp').style.visibility = 'visible';
        document.getElementById('showflat').style.visibility = 'visible';
        document.getElementById('showtotal').style.visibility = 'visible';
    }
    else {
        $('#showdriver').prop('checked',false);
        document.getElementById('showdrivername').style.visibility = 'hidden';
        document.getElementById('showtruck').style.visibility = 'hidden';
        document.getElementById('showtrailer').style.visibility = 'hidden';
        document.getElementById('showloadedmiles').style.visibility = 'hidden';
        document.getElementById('showemptymiles').style.visibility = 'hidden';
        document.getElementById('showother').style.visibility = 'hidden';
        document.getElementById('showtarp').style.visibility = 'hidden';
        document.getElementById('showflat').style.visibility = 'hidden';
        document.getElementById('showtotal').style.visibility = 'hidden';
    }
    if (document.getElementById('showowner').checked) {
        document.getElementById('showowneroperator').style.visibility = 'visible';
    }
    else {
        document.getElementById('showowneroperator').style.visibility = 'hidden';
    }

}

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
    '<input list="shipper' +
    room +
    '" class="form-control ShipperListSet"  list="ShipperListSet" placeholder="Search here..." id="shipperlist' +
    room +
    '" name="shipperlist" onchange="getShipper(this.value,' +
    room +
    '); " onkeyup="doSearch(this.value,' +
    "'searchActiveShipper'" +
    "," +
    room +
    '); "  autocomplete="off">\n' +
    '<datalist  id="ShipperListSet" class="ShipperListSet"' +
    room +
    '" name="shipper">\n' +
    "                                                 </datalist>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Address*</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" id = "shipperaddress' +
    room +
    '" name="shipperaddress" placeholder="Address *" type="text"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Location *</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" placeholder="Enter a location"\n' +
    '                                                           type="text" id = "activeshipper' +
    room +
    '" onkeydown="getLocation(this.id)"  name="activeshipper">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup Date</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control"  name="shipperdate" type="date"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup Time</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" name="shippertime" type="time"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-1">\n' +
    "                                                <label>Type*</label>\n" +
    '                                                <div class="row">\n' +
    '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
    '                                                        <input type="radio" class="custom-control-input shipperloadtype"\n' +
    '                                                               id="tl' +
    room +
    '" name="tl' +
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
    '"  value = "LTL" name="tl' +
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
    '                                                    <input class="form-control" name="shippercommodity" type="text"\n' +
    '                                                           placeholder="Commodity" " >\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '<div class="form-group col-md-1 ">\n' +
    "                                                <label>Qty</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" placeholder="Qty" name="shipperqty" type="text" >\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2 ">\n' +
    "                                                <label>Weight</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" type="text" name="shipperweight" placeholder="Weight">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-2">\n' +
    "                                                <label>Pickup #</label>\n" +
    "                                                <div>\n" +
    '                                                    <input class="form-control" name="shipperpickup" placeholder="Pickup #" type="text"\n' +
    "                                                           >\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                                <div class="form-group col-md-1">\n' +
    "                                                <label>Sr#</label>\n" +
    "                                                <div>\n" +
    '                                                <input class="form-control" placeholder="Sr#" type="number" id="shipseq' +
    room +
    '" name="shipseq" value="0">\n' +
    "                                                </div>\n" +
    "                                            </div>\n" +
    '                                            <div class="form-group col-md-4">\n' +
    "                                                <label>Pickup Notes</label>\n" +
    "                                                <div>\n" +
    '                                                    <textarea rows="1" cols="30" class="form-control" name = "shippernotes" type="textarea"\n' +
    "                                                              ></textarea>\n" +
    "                                                </div>\n" +
    "                                            </div>\n" +
    "                                        </div></div>";
  //contentTo.innerHTML += contenttest;
  $(contentTo).append(contenttest);
  renameShipper();
  makeActive();
 
}


var mainID = "'home-title^" + room + "'";
  var contentID = "'home" + room + "'";


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
    swal({
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
    swal({
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

$('.LBshipper').click(function(){
   alert(); 
});
</script>

<!-------------------------------------------------------------------End modal------------------------------------------------------------------->		

@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
