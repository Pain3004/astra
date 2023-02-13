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
					 <div class="container-fluid">
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
                                                <div class="col-2 btn-group submitter-group">
													<a href="#" class="button-57_alt"><i class="fa fa-plus" aria-hidden="true"></i><span>New Active Load</span></a>
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
<!-- <div class="container">
    <div class="modal modalLb" data-backdrop="static" id="lb_dropdown_list" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Truck & Trailer Make</h5>
                    <button type="button" class="button-24 addTruckTrailerMakeClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                            <input type="hidden" name="_token" id="_tokenTruckTrailerMake" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="tt_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Type <span style="color:#ff0000">*</span></label>
                                                            <select class="form-control select2" id="type" tabindex="-1" aria-hidden="true">
                                                                <option>Truck</option>
                                                                <option>Trailer</option>
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
                </div>
                <div class="modal-footer">
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29" id="saveTruckTrailerMake" >Save</button>
                    <button type="button" class="button-29 addTruckTrailerMakeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-------------------------------------------------------------------End modal------------------------------------------------------------------->		

@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
