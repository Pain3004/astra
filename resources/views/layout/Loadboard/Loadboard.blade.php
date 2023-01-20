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
						</div>
						<!-- PAGE-HEADER END -->

                       

						<!-- ROW-4 -->
						<div class="row">
							<div class="col-12 col-sm-12">
								<div class="card product-sales-main">
									<div class="card-header border-bottom">
										<h3 class="card-title mb-0">Table</h3>
									</div>
									<div class="card-body">
										<input type="hidden" class="_id">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-2">
                                                       
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="btn-group submitter-group float-right">
                                                            
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										<div class="table-responsive">
                                            
                                            <table id="example" class="table" style="height:100px;">
                                                <thead class="thead_th">
                                                    <tr class="tr">
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

		

		

@include('layout.dashboard.footer')	


<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
