@include('layout.dashboard.header')

@include('layout.loader')

	<!-- PAGE -->
	<div class="page">
		<div class="page-main">
@include('layout.dashboard.navigation')

@include('layout.dashboard.sidebar')
		
			<!--app-content open-->
			<div class="app-content main-content mt-3">
				<div class="side-app">
					 <!-- CONTAINER -->
					 <div class="main-container container-fluid">
					

    <div class="row">
          <div id="menu-wrapper" class="menu-wrapper">
	           <div id="menu" class="menu">
               <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3 item">
								<div class="card overflow-hidden card-now">
									<div class="card-body gradient-1">
										<div class="row">
											<div class="col" id="dashcomrev">
												<!-- <h3 class="mb-2 fw-semibold">1,12,324</h3>
												<p class="text-muted fs-13 mb-0">Daily Visitors</p> -->
												<!-- <p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class="fa fa-long-arrow-up"></i>
														42%</span>
													since last month
												</p> -->
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"></path></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
								<div class="card overflow-hidden card-now ">
									<div class="card-body gradient-2">
										<div class="row">
											<div class="col" id="dashcomexpence">
												<!-- <h3 class="mb-2 fw-semibold">12,563</h3>
												<p class="text-muted fs-13 mb-0">Total Orders</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-danger fw-semibold fs-13 me-1">
														<i class='fa fa-long-arrow-down'></i>
														12%</span>
													since last month
												</p> -->
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.5,7H16V5.9169922c0-2.2091064-1.7908325-4-4-4s-4,1.7908936-4,4V7H4.5C4.4998169,7,4.4996338,7,4.4993896,7C4.2234497,7.0001831,3.9998169,7.223999,4,7.5V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7.5c0-0.0001831,0-0.0003662,0-0.0006104C19.9998169,7.2234497,19.776001,6.9998169,19.5,7z M9,5.9169922c0-1.6568604,1.3431396-3,3-3s3,1.3431396,3,3V7H9V5.9169922z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V8h3v2.5C8,10.776123,8.223877,11,8.5,11S9,10.776123,9,10.5V8h6v2.5c0,0.0001831,0,0.0003662,0,0.0005493C15.0001831,10.7765503,15.223999,11.0001831,15.5,11c0.0001831,0,0.0003662,0,0.0006104,0C15.7765503,10.9998169,16.0001831,10.776001,16,10.5V8h3V19z"/></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

          					<div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
								<div class="card overflow-hidden card-now">
									<div class="card-body gradient-3">
										<div class="row">
											<div class="col" id="dashpayable">
												<!-- <h3 class="mb-2 fw-semibold">$5,178</h3>
												<p class="text-muted fs-13 mb-0">Conversion Rate</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class='fa fa-long-arrow-up'></i>
														27%</span>
													since last month
												</p> -->
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-info dash ms-auto box-shadow-info">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M7.5,12C7.223877,12,7,12.223877,7,12.5v5.0005493C7.0001831,17.7765503,7.223999,18.0001831,7.5,18h0.0006104C7.7765503,17.9998169,8.0001831,17.776001,8,17.5v-5C8,12.223877,7.776123,12,7.5,12z M19,2H5C3.3438721,2.0018311,2.0018311,3.3438721,2,5v14c0.0018311,1.6561279,1.3438721,2.9981689,3,3h14c1.6561279-0.0018311,2.9981689-1.3438721,3-3V5C21.9981689,3.3438721,20.6561279,2.0018311,19,2z M21,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H5c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V5c0.0014038-1.1040039,0.8959961-1.9985962,2-2h14c1.1040039,0.0014038,1.9985962,0.8959961,2,2V19z M12,6c-0.276123,0-0.5,0.223877-0.5,0.5v11.0005493C11.5001831,17.7765503,11.723999,18.0001831,12,18h0.0006104c0.2759399-0.0001831,0.4995728-0.223999,0.4993896-0.5v-11C12.5,6.223877,12.276123,6,12,6z M16.5,10c-0.276123,0-0.5,0.223877-0.5,0.5v7.0005493C16.0001831,17.7765503,16.223999,18.0001831,16.5,18h0.0006104C16.7765503,17.9998169,17.0001831,17.776001,17,17.5v-7C17,10.223877,16.776123,10,16.5,10z"/></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

         					<div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
								<div class="card overflow-hidden card-now">
									<div class="card-body gradient-4">
										<div class="row">
											<div class="col" id="dashrecevable">
												<!-- <h3 class="mb-2 fw-semibold">$43,987</h3>
												<p class="text-muted fs-13 mb-0">Avg Orders</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class='fa fa-long-arrow-up'></i>
														9%</span>
													since last month
												</p> -->
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-warning dash ms-auto box-shadow-warning">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M9,10h2.5c0.276123,0,0.5-0.223877,0.5-0.5S11.776123,9,11.5,9H10V8c0-0.276123-0.223877-0.5-0.5-0.5S9,7.723877,9,8v1c-1.1045532,0-2,0.8954468-2,2s0.8954468,2,2,2h1c0.5523071,0,1,0.4476929,1,1s-0.4476929,1-1,1H7.5C7.223877,15,7,15.223877,7,15.5S7.223877,16,7.5,16H9v1.0005493C9.0001831,17.2765503,9.223999,17.5001831,9.5,17.5h0.0006104C9.7765503,17.4998169,10.0001831,17.276001,10,17v-1c1.1045532,0,2-0.8954468,2-2s-0.8954468-2-2-2H9c-0.5523071,0-1-0.4476929-1-1S8.4476929,10,9,10z M21.5,12H17V2.5c0.000061-0.0875244-0.0228882-0.1735229-0.0665283-0.2493896c-0.1375732-0.2393188-0.4431152-0.3217773-0.6824951-0.1842041l-3.2460327,1.8603516L9.7481079,2.0654297c-0.1536865-0.0878906-0.3424072-0.0878906-0.4960938,0l-3.256897,1.8613281L2.7490234,2.0664062C2.6731567,2.0227661,2.5871582,1.9998779,2.4996338,1.9998779C2.2235718,2.000061,1.9998779,2.223938,2,2.5v17c0.0012817,1.380188,1.119812,2.4987183,2.5,2.5H19c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-6.5006104C21.9998169,12.2234497,21.776001,11.9998169,21.5,12z M4.5,21c-0.828064-0.0009155-1.4990845-0.671936-1.5-1.5V3.3623047l2.7412109,1.5712891c0.1575928,0.0872192,0.348877,0.0875854,0.5068359,0.0009766L9.5,3.0761719l3.2519531,1.8583984c0.157959,0.0866089,0.3492432,0.0862427,0.5068359-0.0009766L16,3.3623047V19c0.0008545,0.7719116,0.3010864,1.4684448,0.7803345,2H4.5z M21,19c0,1.1045532-0.8954468,2-2,2s-2-0.8954468-2-2v-6h4V19z"/></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

      						<div class="col-lg-6 col-sm-12 col-md-6 col-xl-3 item">
								<div class="card overflow-hidden card-now">
									<div class="card-body gradient-5">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold">1,12,324</h3>
												<p class="text-muted fs-13 mb-0">Daily Visitors</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class="fa fa-long-arrow-up"></i>
														42%</span>
													since last month
												</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"></path></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3 item">
								<div class="card overflow-hidden card-now">
									<div class="card-body gradient-6">
										<div class="row">
											<div class="col">
												<h3 class="mb-2 fw-semibold">1,12,324</h3>
												<p class="text-muted fs-13 mb-0">Daily Visitors</p>
												<p class="text-muted mb-0 mt-2 fs-12">
													<span class="icn-box text-success fw-semibold fs-13 me-1">
														<i class="fa fa-long-arrow-up"></i>
														42%</span>
													since last month
												</p>
											</div>
											<div class="col col-auto top-icn dash">
												<div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
													<svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"></path></svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                    </div>

	            <div class="arrows">
		             <button id="leftArrow" class="left-arrow arrow hidden">
                     <img src="http://127.0.0.1:8000/assets/images/brand/left-arrow.png" alt="">
		            </button>
		             <button id="rightArrow" class="right-arrow arrow">
                     <img src="http://127.0.0.1:8000/assets/images/brand/right-arrow.png" alt="">
		            </button>
	          </div>

            </div>
        </div>



						<div class="row">
							<div class="col-sm-12 col-md-12 col-xl-4 col-lg-6 ">
                            
								<div class="row">
								    <div class="col-xl-4 padd-n">
                  				<a href="#" id="add_dashboard" class="button-57_alt button-58_alt">New Active Load</a>
                                </div>

                                <div class="redio-btn col-xl-2 padd-g">
							                 	   <div class="radio">
   								                     <input id="radio-1" name="radio" type="radio" checked>
    						                          <label for="radio-1" class="radio-label">MC</label>
  								                         </div>

  								                      <div class="radio">
   								                          <input id="radio-2" name="radio" type="radio">
    							                            <label  for="radio-2" class="radio-label">DOT
    							                             </label>
  								                             </div>
								                                 </div>

                                    <div class="col-1 psd-1">
                                        <div class="searchmenu"> 
                                          <input type="search" name="searchinput" value="" class="search-input" placeholder="search">
                                             <button name="search" value="" id="" class="search"><i class="fa fa-search"></i></button>
                                          </div>
                                    </div>

                                <div class="col-xl-5"  style="display:flex">
                                        <i class="mdi mdi-play-circle float-right tour-icon" id="dashboard_tour" title="Take a Tour"
                                            style="margin-top: -8px;font-size:35px"></i>
                                            <select name="dashtype" style="width: 100%;" class="form-control" id="dashfilter_by" onchange="dateWiseDashData(this.value)">
                                                <option value="">---select---</option>
                                                <option value="ship_date" selected="true">Ship Date</option>
                                                <option value="deliver_date">Delivery Date</option>
                                                <option value="invoice_date">Invoice Date</option>
                                                <option value="creation_date">Creation Date</option>
                                            </select>
                                    </div>
                                    
								</div>
							</div>

                            

          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8 float-right">	
					      <div class="tabBox">
  						    <ul class="tabs">
   							  <li><a href="#tab1">Customer</a></li>
						      <li><a href="#tab2">Profit/Loss</a></li>
    						  <li><a href="#tab3">Dispatcher</a></li>
   							  <li><a href="#tab4">Driver</a></li>
   							  <li><a href="#tab5">Company</a></li>
    						  <li><a href="#tab6">Truck</a></li>
    						  <li><a href="#tab7">Carrier</a></li>
   							  <li><a href="#tab8">Equipment</a></li>
   							  <li><a href="#tab9">Sales Representative</a></li>
  
  							</ul>
							</div> 
							
       </div>
		</div>

		<div class="row">
		   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
		      <div class="tabContainer">
             <div id="tab1" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">CUSTOMER RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Customer Revenue
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

          <canvas id="badCanvas2" width="400" height="100">Your browser does not support the canvas element.</canvas>
         <!-- ROW-3 -->

        <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span
                         class="bartitle"></span>&nbsp;<span class="linetitledata">Customer Revenue
                          </span><span class="float-right" id="linec_name"></span></h5>
               
               <!-- Row start -->
                           <div class="row gutters align-items-center padd-top">
                               <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="monthly-avg cut-text">
                                   <h5>Current Month</h5>
                                 <div class="avg-block">
                                    <h3 class="avg-total text-success" id="current_loadd">0</h3>
                                     <h6 class="avg-label">Load</h6>
                                     </div>
                                      <div class="avg-block">
                                     <div class="tooltip1">
                           <span class="revenue">
                            <h3 class="avg-total text-info" id="current_amountd">$0.00</h3>
                          </span>
                          <h4 class="toolrevenue" id="current_amountdtool"></h4>
                        </div>
                      <h6 class="avg-label avg-label-2">Revenue</h6>

                     </div>
                   </div>
                  </div>
                 <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                <figure class="highcharts-figure">
               <div id="line-chart"></div>
            </figure>
           </div>
           <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
               <div class="monthly-avg cut-text">
                <h5>Previous Month</h5>
                <div class="avg-block">
                    <h3 class="avg-total text-success" id="previous_loadd">0</h3>
                    <h6 class="avg-label">Load</h6>
                </div>
                <div class="avg-block">

                    <div class="tooltip1">
                        <span class="revenue">
                            <h3 class="avg-total text-info" id="previous_amountd">$0.00</h3>
                        </span>
                        <h4 class="toolrevenue" id="previous_amountdtool"></h4>
                    </div>
                    <h6 class="avg-label avg-label-2">Revenue</h6>
                </div>
            </div>
        </div>
       </div>
    <!-- Row end -->
      </div>
     </div>
     </div>							
    </div>

   </div>
     
   <div id="tab2" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">FUEL CARD</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Total Revenue
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

         
          <div class="row">
		        <div class="col-xs-12 col-lg-6">
                   <div class="card-body add-truck">
                     <div class="widget">
					   <div class="widget-heading">
					    <div class="">
                                    <h5 class="custome-line">Bank</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		<div class="col-xs-12 col-lg-6">
            <div class="card-body add-truck">
                <div class="widget">
					<div class="widget-heading">
					<div class="">
                                    <h5 class="custome-line">Truck Average</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
	</div>

    </div>
    <!-- Row end -->
        </div>
    </div>
    </div>							

    <div id="tab3" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">DISPATCHER RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Dispatcher Loads
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

         
            <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Dispatcher Incentive
                          </span><span class="float-right" id="linec_name"></span></h5>
               
               <!-- Row start -->
                           <div class="row gutters align-items-center padd-top">
                               <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="monthly-avg cut-text">
                                   <h5>Current Month</h5>
                                 <div class="avg-block">
                                    <h3 class="avg-total text-success" id="current_loadd">0</h3>
                                     <h6 class="avg-label">Load</h6>
                                     </div>
                                      <div class="avg-block">
                                     <div class="tooltip1">
                           <span class="revenue">
                            <h3 class="avg-total text-info" id="current_amountd">$0.00</h3>
                          </span>
                          <h4 class="toolrevenue" id="current_amountdtool"></h4>
                        </div>
                      <h6 class="avg-label avg-label-2">Revenue</h6>

                     </div>
                   </div>
                  </div>
                 <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                <figure class="highcharts-figure">
               <div id="line-chart"></div>
            </figure>
           </div>
           <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
               <div class="monthly-avg cut-text">
                <h5>Previous Month</h5>
                <div class="avg-block">
                    <h3 class="avg-total text-success" id="previous_loadd">0</h3>
                    <h6 class="avg-label">Load</h6>
                </div>
                <div class="avg-block">

                    <div class="tooltip1">
                        <span class="revenue">
                            <h3 class="avg-total text-info" id="previous_amountd">$0.00</h3>
                        </span>
                        <h4 class="toolrevenue" id="previous_amountdtool"></h4>
                    </div>
                    <h6 class="avg-label avg-label-2">Revenue</h6>
                </div>
            </div>
        </div>
       </div>
    <!-- Row end -->
      </div>
     </div>
     </div>							
    </div>
    </div>
    <!-- Row end -->

    <div id="tab4" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">DRIVER RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Driver Loads
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

         
            <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Driver Pay
                          </span><span class="float-right" id="linec_name"></span></h5>
               
               <!-- Row start -->
                           <div class="row gutters align-items-center padd-top">
                               <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="monthly-avg cut-text">
                                   <h5>Current Month</h5>
                                 <div class="avg-block">
                                    <h3 class="avg-total text-success" id="current_loadd">0</h3>
                                     <h6 class="avg-label">Load</h6>
                                     </div>
                                      <div class="avg-block">
                                     <div class="tooltip1">
                           <span class="revenue">
                            <h3 class="avg-total text-info" id="current_amountd">$0.00</h3>
                          </span>
                          <h4 class="toolrevenue" id="current_amountdtool"></h4>
                        </div>
                      <h6 class="avg-label avg-label-2">Revenue</h6>

                     </div>
                   </div>
                  </div>
                 <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                <figure class="highcharts-figure">
               <div id="line-chart"></div>
            </figure>
           </div>
           <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
               <div class="monthly-avg cut-text">
                <h5>Previous Month</h5>
                <div class="avg-block">
                    <h3 class="avg-total text-success" id="previous_loadd">0</h3>
                    <h6 class="avg-label">Load</h6>
                </div>
                <div class="avg-block">

                    <div class="tooltip1">
                        <span class="revenue">
                            <h3 class="avg-total text-info" id="previous_amountd">$0.00</h3>
                        </span>
                        <h4 class="toolrevenue" id="previous_amountdtool"></h4>
                    </div>
                    <h6 class="avg-label avg-label-2">Revenue</h6>
                </div>
            </div>
        </div>
       </div>
    <!-- Row end -->
      </div>
     </div>
     </div>							
    </div>
    </div>

    <div id="tab5" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">COMPANY RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Company Loads
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>
            <div class="row">
		        <div class="col-xs-12 col-lg-6">
                   <div class="card-body add-truck">
                     <div class="widget">
					   <div class="widget-heading">
					    <div class="">
                                    <h5 class="custome-line">Company Expense Chart</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		<div class="col-xs-12 col-lg-6">
            <div class="card-body add-truck">
                <div class="widget">
					<div class="widget-heading">
					<div class="">
                                    <h5 class="custome-line">Company Cashflow Chart</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		
	</div>
    </div>

    <div id="tab6" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">TRUCK RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Truck Map
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          
                     </div>

                 </div>
               </div>

            </div>


            <div class="row">
		        <div class="col-xs-12 col-lg-4">
                   <div class="card-body add-truck">
                     <div class="widget">
					   <div class="widget-heading">
					    <div class="">
                                    <h5 class="custome-line">Truck Miles</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>

        <div class="col-xs-12 col-lg-4">
                   <div class="card-body add-truck">
                     <div class="widget">
					   <div class="widget-heading">
					    <div class="">
                                    <h5 class="custome-line">Truck Average</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>

		<div class="col-xs-12 col-lg-4">
            <div class="card-body add-truck">
                <div class="widget">
					<div class="widget-heading">
					<div class="">
                                    <h5 class="custome-line">Truck Earning</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		
	</div>
    </div>

    <div id="tab7" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">CARRIER RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Carrier Loads
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

         
            <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Carrier Pay

                          </span><span class="float-right" id="linec_name"></span></h5>             
               <!-- Row start -->
                           <div class="row gutters align-items-center padd-top">
                               <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="monthly-avg cut-text">
                                   <h5>Current Month</h5>
                                 <div class="avg-block">
                                    <h3 class="avg-total text-success" id="current_loadd">0</h3>
                                     <h6 class="avg-label">Load</h6>
                                     </div>
                                      <div class="avg-block">
                                     <div class="tooltip1">
                           <span class="revenue">
                            <h3 class="avg-total text-info" id="current_amountd">$0.00</h3>
                          </span>
                          <h4 class="toolrevenue" id="current_amountdtool"></h4>
                        </div>
                      <h6 class="avg-label avg-label-2">Revenue</h6>

                     </div>
                   </div>
                  </div>
                 <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                <figure class="highcharts-figure">
               <div id="line-chart"></div>
            </figure>
           </div>
           <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
               <div class="monthly-avg cut-text">
                <h5>Previous Month</h5>
                <div class="avg-block">
                    <h3 class="avg-total text-success" id="previous_loadd">0</h3>
                    <h6 class="avg-label">Load</h6>
                </div>
                <div class="avg-block">

                    <div class="tooltip1">
                        <span class="revenue">
                            <h3 class="avg-total text-info" id="previous_amountd">$0.00</h3>
                        </span>
                        <h4 class="toolrevenue" id="previous_amountdtool"></h4>
                    </div>
                    <h6 class="avg-label avg-label-2">Revenue</h6>
                </div>
            </div>
        </div>
       </div>
    <!-- Row end -->
      </div>
     </div>
     </div>							
    </div>
    </div>


    <div id="tab8" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">EQUIPMENT RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   <div class="card">
                                   <div class="card-header border-hide">
				                   <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Equipment Loads
                                    </span><span class="float-right" id="linec_name"></span></h5>
                                 </div>
                                <div class="card-body">
                                <div class="sales-stats d-flex">
                               <div>
                                <div class="text-muted fs-13">Total Sales
                                <span class="p-2 br-5 text-success"><i class="fe fe-arrow-up-right"></i></span>
                               </div>
                               <h3 class="fw-semibold">$582,857.97</h3>
                            <div><span class="text-success fs-13 me-1">32%</span>Increase Since last Year</div>
                            </div>
                          </div>
                          <div id="chartD"></div>
                     </div>

                 </div>
               </div>

            </div>

         
            <div class="row">
              <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="custome-line"><span class="baricone"><i class="mdi mdi-coin"></i></span><span class="bartitle"></span>&nbsp;<span class="linetitledata">Equipment Revenue
                          </span><span class="float-right" id="linec_name"></span></h5>             
               <!-- Row start -->
                           <div class="row gutters align-items-center padd-top">
                               <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
                                <div class="monthly-avg cut-text">
                                   <h5>Current Month</h5>
                                 <div class="avg-block">
                                    <h3 class="avg-total text-success" id="current_loadd">0</h3>
                                     <h6 class="avg-label">Load</h6>
                                     </div>
                                      <div class="avg-block">
                                     <div class="tooltip1">
                           <span class="revenue">
                            <h3 class="avg-total text-info" id="current_amountd">$0.00</h3>
                          </span>
                          <h4 class="toolrevenue" id="current_amountdtool"></h4>
                        </div>
                      <h6 class="avg-label avg-label-2">Revenue</h6>

                     </div>
                   </div>
                  </div>
                 <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12">
                <figure class="highcharts-figure">
               <div id="line-chart"></div>
            </figure>
           </div>
           <div class="col-xl-2 col-lg-3 col-md-12 col-sm-12 col-12">
               <div class="monthly-avg cut-text">
                <h5>Previous Month</h5>
                <div class="avg-block">
                    <h3 class="avg-total text-success" id="previous_loadd">0</h3>
                    <h6 class="avg-label">Load</h6>
                </div>
                <div class="avg-block">

                    <div class="tooltip1">
                        <span class="revenue">
                            <h3 class="avg-total text-info" id="previous_amountd">$0.00</h3>
                        </span>
                        <h4 class="toolrevenue" id="previous_amountdtool"></h4>
                    </div>
                    <h6 class="avg-label avg-label-2">Revenue</h6>
                </div>
            </div>
        </div>
       </div>
    <!-- Row end -->
      </div>
     </div>
     </div>							
    </div>
    </div>

    <div id="tab9" class="tabContent">
		        <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4 col-lg-6">
                       <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12">
                              <div class="card overflow-hidden">
                                  <div class="card-header border-bottom card-padd">

                                     <div class="card-body custom-card" style="padding:0rem">
                                         <div class="wrapper__header">
                                              <div class=""><img src="{{URL::to('/')}}/assets/images/cup.png" height="45" width="45"></div>
                                                  <div class="b_caption">
                                                       <span id="ranking_table" style="float:left">SALES REPRESENTATIVE RANKING</span>
                                                    </div>
                                                    </div>
                                                    <div class="wrapper__content" id="dashtable"></div>
                                                   <div class="b_footer">
                                                 <p></p>
                                               </div>
                                            </div>
                                          </div>
                        
                                        </div>
                                       </div>
                
                                     </div>
                                   </div>

                                 <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8">
                                   
                                 <div class="row">
		        <div class="col-xs-12 col-lg-6">
                   <div class="card-body add-truck">
                     <div class="widget">
					   <div class="widget-heading">
					    <div class="">
                                    <h5 class="custome-line">Company Expense Chart</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		<div class="col-xs-12 col-lg-6">
            <div class="card-body add-truck">
                <div class="widget">
					<div class="widget-heading">
					<div class="">
                                    <h5 class="custome-line">Company Cashflow Chart</h5>
                                </div>
					</div>
				</div>
		     </div>

		</div>
		
	</div>
                              
    </div>
	</div>
	</div>
    </div> 							
        </div>
        </div> </div>

		<!--TASK MODAL-->
		<div class="modal fade" id="Vertically">
			<div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
				<div class="modal-content modal-content-demo">

					<div class="modal-header p-5">
						<h4 class="modal-title text-dark">#1. Sit sed takimata sanctus invidunt</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">Project Name</p>
								<p class="m-0 wp-70 text-dark">Noa Dashboard UI</p>
							</div>
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">Assigned To</p>
								<div class="m-0 wp-70 text-dark d-flex align-items-center">
									<div class="me-2">
										<img alt="User Avatar" class="rounded-circle avatar-sm" src="../assets/images/users/7.jpg">
									</div>
									<div>
										<p class="mb-1">Daniel Obrien</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">Start Date</p>
								<p class="m-0 wp-70 text-dark">30-10-2021</p>
							</div>
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">Status</p>
								<div class="m-0 wp-70 text-dark">
									<span class="mb-0 mt-1 status-main in-progress">In Progress</span>
								</div>
							</div>
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">End Date</p>
								<p class="m-0 wp-70 text-dark">---</p>
							</div>
							<div class="col-md-12 d-flex mb-4">
								<p class="m-0 wp-30 text-muted">Description</p>
								<p class="m-0 wp-70 text-dark">Kasd dolore lorem eos stet at, dolor ipsum elitr sea amet amet stet justo, sed.</p>
							</div>
						</div>
					</div>

					<div class="modal-footer p-0 border-top-0">

						<!-- Tabs -->
						<div class="tabs-menu4 w-100">
							<nav class="nav border-bottom px-4 d-block d-lg-flex flex-2">
								<a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1 active" data-bs-toggle="tab" href="#task-files">
									Files
								</a>
								<a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-subtask">
									Sub Task
								</a>
								<a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-tracktime">
									Track Time
								</a>
								<a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-comments">
									Comments
								</a>
							</nav>
						</div><!-- /Tabs -->

						<div class="tab-content w-100">
							<div class="tab-pane active task-files-tab" id="task-files">
								<div class="row">
									<div class="file-upload-text">
										<input type="file" id="task-file-input" multiple>
										<label for="task-file-input" class="text-primary">
											<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
											Upload Files
											<span class="text-muted"></span>
										</label>
										<i class="fa fa-times-circle remove"></i>
									</div>
								</div>
								<div class="row">
									<div class="mt-3">
										<table class="table table-bordered br-7">
											<thead>
												<tr class="row-first">
													<th>File Name</th>
													<th>Date</th>
													<th>Type</th>
													<th>Size</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="recent-files">
															<svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#b6dfff" d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#86cbff" d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z"/></svg>
															<span class="mb-1 font-weight-semibold">noa documentation</span>
														</div>
													</td>
													<td>
														<span class="text-muted modified-date">07/10/21, 03:30</span>
													</td>
													<td>
														<span>doc</span>
													</td>
													<td>
														<span class="text-muted file-size">15kb</span>
													</td>
												</tr>
												<tr>
													<td>
														<div class="recent-files">
															<svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#f2c8db" d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z"/><path fill="#eaa4c4" d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z"/></svg>

															<span class="mb-1 font-weight-semibold">sample video</span>
														</div>
													</td>
													<td>
														<span class="text-muted modified-date">07/10/21, 03:30</span>
													</td>
													<td>
														<span>mp4</span>
													</td>
													<td>
														<span class="text-muted file-size">30mb</span>
													</td>
												</tr>
												<tr class="row-last">
													<td>
														<div class="recent-files">
															<svg class="file-manager-icon w-icn me-2"  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#c8e4a6" d="M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z"/><path fill="#add679" d="M19,2H5C3.34515,2.00483,2.00483,3.34515,2,5v8.86l3.88-3.88c1.18747-1.13,3.05253-1.13,4.24,0l2.87139,2.887l0.88752-0.88751c1.17344-1.16662,3.06874-1.16662,4.24218,0L22,15.8584V5C21.99517,3.34515,20.65485,2.00483,19,2z M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z"/><path fill="#8FBD56" d="M10.12,9.98c-1.18747-1.13-3.05253-1.13-4.24,0L2,13.86V19c0.00484,1.65484,1.34516,2.99516,3,3h14c0.81512-0.00034,1.59497-0.3325,2.16-0.92L10.12,9.98z"/><path fill="#c8e4a6" d="M22,15.8584l-3.87891-3.87891c-1.17345-1.1666-3.06873-1.1666-4.24218,0L12.99139,12.867l8.16425,8.20856C21.69776,20.5208,22.00089,19.77567,22,19V15.8584z"/></svg>
															<span class="mb-1 font-weight-semibold">sample image</span>
														</div>
													</td>
													<td>
														<span class="text-muted modified-date">07/10/21, 03:30</span>
													</td>
													<td>
														<span>jpeg</span>
													</td>
													<td>
														<span class="text-muted file-size">15kb</span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="task-subtask">
								<div class="row">
									<div class="col-md-12">
										<div class="d-flex add-task-container">
											<input type="text" class="form-control wp-40 subtask-input" placeholder="Type Task Here..." id="subTaskInput">
											<a href="javascript:void(0)" role="button" class="text-teritary text-center ms-2 me-2" id="addTask">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-teritary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
												Add
											</a>
											<a href="javascript:void(0)" role="button" class="text-primary text-center ms-2" id="completedAll">
												<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
												Mark All
											</a>
										</div>
										<label for="subTaskInput" class="w-100 d-block text-danger" id="errorNote"></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mt-3">
										<ul class="sub-list-container">
											<li class="sub-list-item task-completed">
												<div class="sub-list-main">
													<div class="check-btn"></div>
													<span class="sub-list-text text-muted" onclick="taskCompleted(event)">Gubergren vero nonumy vero no.</span>
												</div>
												<i class="fe fe-trash delete-main text-muted"></i>
											</li>
											<li class="sub-list-item">
												<div class="sub-list-main">
													<div class="check-btn"></div>
													<span class="sub-list-text text-muted" onclick="taskCompleted(event)">Duo no elitr diam labore sit invidunt. Magna gubergren erat.</span>
												</div>
												<i class="fe fe-trash delete-main text-muted"></i>
											</li>
											<li class="sub-list-item">
												<div class="sub-list-main">
													<div class="check-btn"></div>
													<span class="sub-list-text text-muted" onclick="taskCompleted(event)">Consetetur clita diam est eos invidunt. Eirmod magna.</span>
												</div>
												<i class="fe fe-trash delete-main text-muted"></i>
											</li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-end mt-3">
										<a href="javascript:void(0)" role="button" class="text-danger" id="deleteAllTasks">
											<svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-danger" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
											Delete All
										</a>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="task-tracktime">
								<div class="row">
									<table class="table table-bordered">
										<thead>
											<tr class="row-first">
												<th class="bg-transparent border-bottom-0">Team Member</th>
												<th class="bg-transparent border-bottom-0">Start Date & Time</th>
												<th class="bg-transparent border-bottom-0">End Date & Time</th>
												<th class="bg-transparent border-bottom-0">Total Time</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="me-2">
															<img alt="User Avatar" class="rounded-circle avatar-md" src="../assets/images/users/8.jpg">
														</div>
														<div>
															<h6 class="mb-1">Skyler Hilda</h6>
															<span class="text-muted fs-12">member@spruko.com</span>
														</div>
													</div>
												</td>
												<td class="text-muted fs-13 fw-semibold">31 Oct 21 & 14:56</td>
												<td class="text-muted fs-13 fw-semibold">01 Nov 21 & 09:35</td>
												<td class="text-dark fs-13 fw-semibold">Days: 4<br>Hours: 10<br>Minutes: 22</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="me-2">
															<img alt="User Avatar" class="rounded-circle avatar-md" src="../assets/images/users/2.jpg">
														</div>
														<div>
															<h6 class="mb-1">Lisa Morgan</h6>
															<span class="text-muted fs-12">member@spruko.com</span>
														</div>
													</div>
												</td>
												<td class="text-muted fs-13 fw-semibold">30 Oct 21 & 12:56</td>
												<td class="text-muted fs-13 fw-semibold">11 Nov 21 & 09:35</td>
												<td class="text-dark fs-13 fw-semibold">Days: 15<br>Hours: 12<br>Minutes: 52</td>
											</tr>
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="me-2">
															<img alt="User Avatar" class="rounded-circle avatar-md" src="../assets/images/users/11.jpg">
														</div>
														<div>
															<h6 class="mb-1">Tyler Durder</h6>
															<span class="text-muted fs-12">member@spruko.com</span>
														</div>
													</div>
												</td>
												<td class="text-muted fs-13 fw-semibold">15 Oct 21 & 15:56</td>
												<td class="text-muted fs-13 fw-semibold">01 Nov 21 & 16:40</td>
												<td class="text-dark fs-13 fw-semibold">Days: 18<br>Hours: 8<br>Minutes: 52</td>
											</tr>
											<tr class="row-last">
												<td>
													<div class="d-flex align-items-center">
														<div class="me-2">
															<img alt="User Avatar" class="rounded-circle avatar-lg" src="../assets/images/users/14.jpg">
														</div>
														<div>
															<h6 class="mb-1">Jorah Randy</h6>
															<span class="text-muted fs-12">member@spruko.com</span>
														</div>
													</div>
												</td>
												<td class="text-muted fs-13 fw-semibold">18 Oct 21 & 10:30</td>
												<td class="text-muted fs-13 fw-semibold">09 Nov 21 & 09:45</td>
												<td class="text-dark fs-13 fw-semibold">Days: 22<br>Hours: 10<br>Minutes: 12</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="tab-pane" id="task-comments">
								<div class="row">
									<div class="mt-5">
										<div class="media mb-5 overflow-visible">
											<div class="me-3">
												<a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="../assets/images/users/5.jpg"> </a>
											</div>
											<div class="media-body overflow-visible">
												<div class="border mb-5 p-4 br-5">
													<nav class="nav float-end">
														<div class="dropdown">
															<a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
															<div class="dropdown-menu dropdown-menu-end">
																<a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
																<a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
																<a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
																<a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
															</div>
														</div>
													</nav>
													<h5 class="mt-0">Gavin Murray <span class="text-muted fs-12 ms-1">1 Day ago</span></h5>
													<span><i class="fe fe-thumb-up text-danger"></i></span>
													<p class="font-13 text-muted">Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter
														what industry you’re working in, as a blogger, you should live and die by this statement.</p>
													<a class="like" href="javascript:;">
														<span class="badge btn-danger-light rounded-pill py-2 px-3">
															<i class="fe fe-heart me-1"></i>56</span>
													</a>
													<span class="reply" id="1">
														<a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
													</span>
												</div>
												<div class="media mb-5 overflow-visible">
													<div class="me-3">
														<a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="../assets/images/users/2.jpg"> </a>
													</div>
													<div class="media-body border p-4 overflow-visible br-5">
														<nav class="nav float-end">
															<div class="dropdown">
																<a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
																<div class="dropdown-menu dropdown-menu-end">
																	<a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
																	<a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
																	<a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
																	<a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
																</div>
															</div>
														</nav>
														<h5 class="mt-0">Mozelle Belt <span class="text-muted fs-12 ms-1 bg-normal-light">Reply to Gavin Murray</span><span class="text-muted fs-12 ms-1">2 min ago</span></h5>
														<span><i class="fe fe-thumb-up text-danger"></i></span>
														<p class="font-13 text-muted">Nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter what industry you’re working in, as a blogger, you should
															live and die by this statement.</p>
														<a class="like" href="javascript:;"><span class="badge btn-danger-light rounded-pill py-2 px-3"><i class="fe fe-heart me-1"></i>56</span></a>
														<span class="reply" id="2">
															<a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--TASK MODAL ENDS-->

		<!-- Country-selector modal-->
		<div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content country-select-modal">
                    <div class="modal-header">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row row-sm p-3">
                            <li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt="unitedstates" src="{{URL::to('/')}}/assets/images/flags/us_flag.jpg" class="me-2 language"></span>United States
                                </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt="italy" src="{{URL::to('/')}}/assets/images/flags/italy_flag.jpg" class="me-2 language"></span>Italy
                                </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="spain" src="{{URL::to('/')}}/assets/images/flags/spain_flag.jpg" class="me-2 language"></span>Spain
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
								    <span class="country-selector"><img alt="india" src="{{URL::to('/')}}/assets/images/flags/india_flag.jpg" class="me-2 language"></span>India
                               </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
								    <span class="country-selector"><img alt="french" src="{{URL::to('/')}}/assets/images/flags/french_flag.jpg" class="me-2 language"></span>French
                                </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="russia" src="{{URL::to('/')}}/assets/images/flags/russia_flag.jpg" class="me-2 language"></span>Russia
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
								    <span class="country-selector"><img alt="germany" src="{{URL::to('/')}}/assets/images/flags/germany_flag.jpg" class="me-2 language"></span>Germany
                               	</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="argentina" src="{{URL::to('/')}}/assets/images/flags/argentina_flag.jpg" class="me-2 language"></span>Argentina
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
								    <span class="country-selector"><img alt="uae" src="{{URL::to('/')}}/assets/images/flags/uae_flag.jpg" class="me-2 language"></span>UAE
                               	</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="austria" src="{{URL::to('/')}}/assets/images/flags/austria_flag.jpg" class="me-2 language"></span>Austria
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="mexico" src="{{URL::to('/')}}/assets/images/flags/mexico_flag.jpg" class="me-2 language"></span>Mexico
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
								    <span class="country-selector"><img alt="china" src="{{URL::to('/')}}/assets/images/flags/china_flag.jpg" class="me-2 language"></span>China
                               </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="poland" src="{{URL::to('/')}}/assets/images/flags/poland_flag.jpg" class="me-2 language"></span>Poland
                                </a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="canada" src="{{URL::to('/')}}/assets/images/flags/canada_flag.jpg" class="me-2 language"></span>Canada
								</a>
							</li>
							<li class="col-lg-4 mb-2">
                                <a class="btn btn-country btn-lg btn-block">
									<span class="country-selector"><img alt="malaysia" src="{{URL::to('/')}}/assets/images/flags/malaysia_flag.jpg" class="me-2 language"></span>Malaysia
                                </a>
							</li>
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Country-selector modal-->

<script>
const leftArrow = document.getElementById('leftArrow');
const rightArrow = document.getElementById('rightArrow');
const menu = document.getElementById('menu');

// Establish unchanging constants and initialize variables.
const menuWrapperSize = document.getElementById('menu-wrapper').offsetWidth; 
const menuSize = document.getElementById('menu').offsetWidth;	
const menuInvisibleSize = Math.max(menuSize - menuWrapperSize, 0);	
const arrowSize = rightArrow.offsetWidth;	
const menuEndOffset = Math.max(menuInvisibleSize - arrowSize, 0);	
const itemsCount = document.getElementsByClassName('item').length; 
const itemSize = document.getElementsByClassName('item')[0].offsetWidth; 
const itemsSpaceBetween = (menuSize - (itemsCount * itemSize)) / (itemsCount -2.0);	
const distanceInPixels = itemSize + itemsSpaceBetween;	
const durationInMilliseconds = 530;
let starttime = null;

if (menuInvisibleSize === 0) {
	rightArrow.classList.add("hidden");
}

// Get current left position of menu in pixels.
const getMenuPosition = () => {
	return parseFloat(menu.style.left) || 0;
};

// Get current distance (in pixels) that we have scrolled.
const getScrolledDistance = () => {
	return -1 * getMenuPosition();	// Negate value because this is the only way it will work.
};

const checkPosition = () => {
	// Calculate where we are right now.
	const menuPosition = getScrolledDistance();

	// Determine which arrow key(s) to display based on position.
	if (menuPosition <= arrowSize) {			
		leftArrow.classList.add("hidden");		
		rightArrow.classList.remove("hidden");
	} else if (menuPosition < menuEndOffset) {	
		leftArrow.classList.remove("hidden");
		rightArrow.classList.remove("hidden");
	} else if (menuPosition >= menuEndOffset) {	
		leftArrow.classList.remove("hidden");
		rightArrow.classList.add("hidden");
    }
	
	document.querySelector("#print-menu-position span").textContent = menuPosition + 'px';
};

const animateMenu = (timestamp, startingPoint, distance) => {
    const runtime = timestamp - starttime;
    let progress = runtime / durationInMilliseconds;
    progress = Math.min(progress, 1);
	let newValue = (startingPoint + (distance * progress)).toFixed(2) + 'px';
	menu.style.left = newValue;

	if (runtime < durationInMilliseconds) {	// If we still have time remaining...
        requestAnimationFrame(function(timestamp) {	// Request another animation frame and recursively call THIS function.
            animateMenu(timestamp, startingPoint, distance);
        })
    }
	checkPosition();
};
 
const animationFramesSetup = (timestamp, travelDistanceInPixels) => {
	timestamp = timestamp || new Date().getTime();	// if browser doesn't support requestAnimationFrame, generate our own timestamp using Date.
	starttime = timestamp;
	const startingPoint = getMenuPosition();		// This cannot be defined up top in constants. Need to read current value only during initial setup of arrow button click.
	animateMenu(timestamp, startingPoint, travelDistanceInPixels);
};

rightArrow.addEventListener('click', () => requestAnimationFrame(
	timestamp => animationFramesSetup(timestamp, -1 * distanceInPixels)
));
	
leftArrow.addEventListener('click', () => requestAnimationFrame(
	timestamp => animationFramesSetup(timestamp, distanceInPixels)
));

</script>



@include('layout.dashboard.footer')	
