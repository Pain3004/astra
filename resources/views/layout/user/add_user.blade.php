<div class="container">
    <div class="modal fade" data-backdrop="static" id="addUserModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="button-24 addUserModalClose">&times;</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                   <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form method="post">
                                                 @csrf 
                                                 <input type="hidden" name="_token" id="csrf"
                                                    value="{{Session::token()}}">
                                                <div class="form-row">
                                                   
                                                    <div class="form-group col-md-3">
                                                        <label for="inputFirstName4">First Name<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="inputFirstName4"
                                                            id="inputFirstName4" placeholder="First Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputLastName4">Last Name<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="inputLastName4"
                                                            id="inputLastName4" placeholder="Last Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputUsername4">Username<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="inputUsername4"
                                                            id="inputUsername4" placeholder="Username">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Email<span
                                                                class="required"></span></label>
                                                        <input type="email" class="form-control email" name="inputEmail4"
                                                            id="inputEmail4" placeholder="Email">
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputPassword4">Password<span
                                                                class="required"></span></label>
                                                        <input type="password" class="form-control"
                                                            name="inputPassword4" id="inputPassword4"
                                                            placeholder="Password">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputAddress">Address<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="inputAddress"
                                                            id="inputAddress" placeholder="1234 Main St">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputLocation">Location</label>
                                                        <input type="text" class="form-control location_view" data-location="inputLocation" name="inputLocation"
                                                            id="inputLocation"
                                                            placeholder="Apartment, studio, or floor">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputZip">Zip</label>
                                                        <input type="number" class="form-control" name="inputZip"
                                                            id="inputZip">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                <div class="form-group col-md-2">
                                                        <label>Company Name &nbsp; 
                                                        <span class="glyphicon glyphicon-plus-sign add_Company_Name_modal_form_btn "  data-toggle="modal"  style="cursor:pointer; color:blue !important;" ></span>
                                                        </label>
                                                            <div class="dropdown show">
                                                            <select  class="form-control set_company_name" name="company_name" id="inputCompanyName">
                                                                    <option>Select Here</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="">Office
                                                        <span class="glyphicon glyphicon-plus-sign add_office_model_form_btn"  style="color:blue !important" data-toggle="modal"  style="cursor:pointer;"></span>
                                                        </label>
                                                            <div class="dropdown show">
                                                                <select  class="form-control  office_name_set" name="officeName" id="inputOffice">
                                                                    <option>Select Here</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputTelephone">Telephone</label>
                                                        <input type="text" class="form-control " name="inputTelephone"
                                                            id="inputTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputExt">Ext</label>
                                                        <input type="text" class="form-control" name="inputExt"
                                                            id="inputExt" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="inputTollFree">Toll Free</label>
                                                        <input type="tel" class="form-control" name="inputTollFree"
                                                            id="inputTollFree" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputFax">Fax</label>
                                                        <input type="text" class="form-control" name="inputFax"
                                                            id="inputFax" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label >Insert</label>
                                                        <input type="checkbox" class="insertUser" name="insertUser">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label >Update</label>
                                                        <input type="checkbox" class="updateUser"  name="updateUser">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label >Delete</label>
                                                        <input type="checkbox"  name="deleteUser" class="deleteUser">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label >Import</label>
                                                        <input type="checkbox"  name="importUser" class="importUser">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label >Export</label>
                                                        <input type="checkbox"  name="exportUsers" class="exportUsers">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div id="privilege-data" class="tabs">
                                                            <div class="tab-header">
                                                                <div class="tab selectedpriviladge" id="dashboard_priviladge_main" name="tab-1" onclick="changeTab('tab-1'); managePriviladgeSelect(this) ">
                                                                    <i class="icon-graph-rising" style="vertical-align:middle;"></i> Dashboard
                                                                </div>
                                                                <div class="tab" id="custom_priviladge_main"  name="tab-2" onclick="changeTab('tab-2'); managePriviladgeSelect(this)">
                                                                    <i class="icon-life-buoy" style="vertical-align:middle;"></i> Custom
                                                                </div>
                                                                <div class="tab" id="admin_priviladge_main" name="tab-3" onclick="changeTab('tab-3'); managePriviladgeSelect(this)">
                                                                    <i class="icon-squares" style="vertical-align:middle;"></i> Admin
                                                                </div>
                                                                <div class="tab" id="ifta_priviladge_main" name="tab-4" onclick="changeTab('tab-4'); managePriviladgeSelect(this)">
                                                                    <i class="icon-graph"  style="vertical-align:middle;"></i> IFTA
                                                                </div>
                                                                <div class="tab" id="account_priviladge_main" name="tab-5" onclick="changeTab('tab-5'); managePriviladgeSelect(this)">
                                                                    <i class="icon-paper-pen" style="vertical-align:middle;"></i> Finance
                                                                </div>
                                                                <div class="tab" id="report_priviladge_main" name="tab-6" onclick="changeTab('tab-6'); managePriviladgeSelect(this)">
                                                                    <i class="icon-life-buoy" style="vertical-align:middle;"></i> Report
                                                                </div>

                                                                <div class="tab" id="settlements_priviladge_main" name="tab-7" onclick="changeTab('tab-7'); managePriviladgeSelect(this)">
                                                                    <i class="icon-life-buoy" style="vertical-align:middle;"></i> Settlements
                                                                </div>
                                                            </div>
                                                            <div class="tab-indicator"></div>
                                                            <div class="tab-content">
                                                                <div id="tab-1" class="tab-dashboard active" style="display:inline-block">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    id="select-all_l1"
                                                                                    value="Select All_l1">
                                                                                <label for="select-all_l1">Select
                                                                                    All</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-1" />
                                                                                <label for="checkbox-1">New Active
                                                                                    Load</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-2" />
                                                                                <label
                                                                                    for="checkbox-2">Profit/Loss</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-3" />
                                                                                <label
                                                                                    for="checkbox-3">Dispatcher</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-4" />
                                                                                <label for="checkbox-4">Driver</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-5" />
                                                                                <label for="checkbox-5">Company</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-6" />
                                                                                <label for="checkbox-6">Truck</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-7" />
                                                                                <label for="checkbox-7">Carrier</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-8" />
                                                                                <label
                                                                                    for="checkbox-8">Equipment</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox1" type="checkbox"
                                                                                    name="checkbox" id="checkbox-9" />
                                                                                <label for="checkbox-9">Sales
                                                                                    Representative</label>
                                                                            </li>
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div id="tab-2" class="tab-master">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" id="select-all_l2" value="Select All_l2">
                                                                                <label for="select-all_l2">Select All</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_1" />
                                                                                <label
                                                                                    for="checkboxl2_1">Company</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_2" />
                                                                                <label for="checkboxl2_2">Branch Office Location</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_10" />
                                                                                <label for="checkboxl2_10">Currency Setting</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_12" />
                                                                                <label for="checkboxl2_12">Payment Terms</label>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_4" />
                                                                                <label for="checkboxl2_4">Add Terms & Conditions</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_6" />
                                                                                <label for="checkboxl2_6">Status</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_7" />
                                                                                <label for="checkboxl2_7">Load Type</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_5" />
                                                                                <label for="checkboxl2_5">Equipment Type</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_13" />
                                                                                <label for="checkboxl2_13">Reccurance Category</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_3" />
                                                                                <label for="checkboxl2_3">Truck & Trailer make</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_8" />
                                                                                <label for="checkboxl2_8">User Privillege</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox" name="checkbox" id="checkboxl2_9" />
                                                                                <label for="checkboxl2_9">Setting</label>
                                                                            </li>

                                                                            <!-- <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox" id="checkboxl2_4" />
                                                                                <label for="checkboxl2_4">Trailer
                                                                                    Type</label>
                                                                            </li> -->
                                                                           
                                                                           
                                                                           
                                                                            <!-- <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox" id="checkboxl2_8" />
                                                                                <label for="checkboxl2_8">Fuel Card
                                                                                    Type</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox" id="checkboxl2_9" />
                                                                                <label for="checkboxl2_9">Fix Pay
                                                                                    Category</label>
                                                                            
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl2_11" />
                                                                                <label for="checkboxl2_11">Add
                                                                                    Notes</label>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl2_13" />
                                                                                <label for="checkboxl2_13">Dispatcher
                                                                                    Incentive</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl2_14" />
                                                                                <label for="checkboxl2_14">Sales
                                                                                    Incentive</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox2" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl2_15" />
                                                                                <label for="checkboxl2_15">Document
                                                                                    Type</label>
                                                                            </li> -->

                                                                            </li>
                                                                            </li>
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div class="tab-admin" id="tab-3">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" id="select-all_l3" value="Select All_l3">
                                                                                <label for="select-all_l3">Select  All</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="admin" id="checkboxl3_8" />
                                                                                <label for="checkboxl3_8">Admin</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox"  name="customer" id="checkboxl3_1" />
                                                                                <label
                                                                                    for="checkboxl3_1">Customer</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_2" />
                                                                                <label
                                                                                    for="checkboxl3_2">Shipper & Consignee</label>
                                                                            </li>
                                                                            <!-- <li>
                                                                                <input class="checkbox3" type="checkbox"
                                                                                    name="checkbox" id="checkboxl3_3" />
                                                                                <label
                                                                                    for="checkboxl3_3">Consignee</label>
                                                                            </li> -->
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_4" />
                                                                                <label
                                                                                    for="checkboxl3_4">External Carrier</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_5" />
                                                                                <label for="checkboxl3_5">Driver & Owner Operator</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_6" />
                                                                                <label for="checkboxl3_6">User</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_7" />
                                                                                <label for="checkboxl3_7">Truck</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_10" />
                                                                                <label
                                                                                    for="checkboxl3_10">Trailer</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox3" type="checkbox" name="checkbox" id="checkboxl3_9" />
                                                                                <label for="checkboxl3_9">Factoring
                                                                                    Company</label>
                                                                            </li>
                                                                            <!-- <li>
                                                                                <input class="checkbox3" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl3_10" />
                                                                                <label for="checkboxl3_10">Bank</label>
                                                                            </li> -->
                                                                           
                                                                            
                                                                            <!-- <li>
                                                                                <input class="checkbox3" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl3_13" />
                                                                                <label for="checkboxl3_13">Fuel
                                                                                    Card</label>
                                                                            </li> -->
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div class="tab-ifta" id="tab-4">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" id="select-all_l4" value="Select All_l4">
                                                                                <label for="select-all_l4">Select All</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" name="checkbox" id="checkboxl4_2" />
                                                                                <label for="checkboxl4_2">Ifta</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" name="checkbox" id="checkboxl4_1" />
                                                                                <label for="checkboxl4_1">Fuel Vendor</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" name="checkbox" id="checkboxl3_13" />
                                                                                <label for="checkboxl3_13">Fuel Card</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox"  name="checkbox" id="checkboxl4_3" />
                                                                                <label for="checkboxl4_3">Fuel Reciepts & Cash Advance</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" name="checkbox" id="checkboxl4_4" />
                                                                                <label for="checkboxl4_4">Tolls</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox4" type="checkbox" name="checkbox" id="checkboxl4_5" />
                                                                                <label for="checkboxl4_5">IFTA Trips</label>
                                                                            </li>
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div id="tab-5" class="tab-account">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" id="select-all_l5" value="Select All_l5">
                                                                                <label for="select-all_l5">Select All</label>
                                                                            </li>
                                                                            <li>
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_6" />
                                                                                <label for="checkboxl5_6">Account</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_5" />
                                                                                <label for="checkboxl5_5">Bank</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_4" />
                                                                                <label for="checkboxl5_4">Credit card</label>
                                                                            </li>

                                                                             <!-- <li>
                                                                                <input class="checkbox3" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl3_11" />
                                                                                <label for="checkboxl3_11">Credit
                                                                                    Card</label>
                                                                            </li> -->
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_3" />
                                                                                <label for="checkboxl5_3">Sub Credit card</label>
                                                                            </li>

                                                                            <!-- <li>
                                                                                <input class="checkbox3" type="checkbox"
                                                                                    name="checkbox"
                                                                                    id="checkboxl3_12" />
                                                                                <label for="checkboxl3_12">Sub Credit
                                                                                    Card</label>
                                                                            </li> -->
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_1" />
                                                                                <label for="checkboxl5_1">Accounting Manager</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox5" type="checkbox" name="checkbox" id="checkboxl5_2" />
                                                                                <label for="checkboxl5_2">Payment & Receipt Registration</label>
                                                                            </li>
                                                                            
                                                                            
                                                                            
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div id="tab-6" class="tab-report">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" id="select-all_l6" value="Select All_l6">
                                                                                <label for="select-all_l6">Select All</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" name="checkbox" id="checkboxl6_6" />
                                                                                <label for="checkboxl6_6">Reports</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" name="checkbox" id="checkboxl6_7" />
                                                                                <label for="checkboxl6_7">Aging Report</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" name="checkbox" id="checkboxl6_12" />
                                                                                <label for="checkboxl6_12">Revenue Report</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" name="checkbox" id="checkboxl6_11" />
                                                                                <label for="checkboxl6_11">Expense Report</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox6" type="checkbox" name="checkbox" id="checkboxl6_10" />
                                                                                <label for="checkboxl6_10">1099 Report</label>
                                                                            </li>
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_1" />
                                                                                <label for="checkboxl6_1">Driver Pay
                                                                                    Settlement</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_2" />
                                                                                <label for="checkboxl6_2">Bank
                                                                                    Statment</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_3" />
                                                                                <label for="checkboxl6_3">Credit Card
                                                                                    Statement</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_4" />
                                                                                <label for="checkboxl6_4">Fuel Card
                                                                                    Report</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_5" />
                                                                                <label for="checkboxl6_5">Fuel
                                                                                    Report</label>
                                                                            </li> -->
                                                                          
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_8" />
                                                                                <label for="checkboxl6_8">Payable
                                                                                    Report</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_9" />
                                                                                <label for="checkboxl6_9">Receivable
                                                                                    Report</label>
                                                                            </li> -->
                                                                            
                                                                            
                                                                           
                                                                        </ul>
                                                                    </h6>
                                                                </div>
                                                                <div id="tab-7" class="tab-settlements">
                                                                    <h6>
                                                                        <ul class="ks-cboxtags">
                                                                            <li>
                                                                                <input class="checkbox7" type="checkbox" id="select-all_l7" value="Select All_l7">
                                                                                <label for="select-all_l7">Select All</label>
                                                                            </li>
                                                                          
                                                                            <li>
                                                                                <input class="checkbox7" type="checkbox" name="checkbox" id="checkboxl7_1" />
                                                                                <label for="checkboxl7_1"> Settlements</label>
                                                                            </li>
                                                                            <li>
                                                                                <input class="checkbox7" type="checkbox" name="checkbox" id="checkboxl7_2" />
                                                                                <label for="checkboxl7_2">Driver Pay Settlements</label>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                <input class="checkbox7" type="checkbox" name="checkbox" id="checkboxl7_3" />
                                                                                <label for="checkboxl7_3">Customer Settlement</label>
                                                                            </li>

                                                                            <li>
                                                                                <input class="checkbox7" type="checkbox"  name="checkbox" id="checkboxl7_4" />
                                                                                <label for="checkboxl7_4">Carrier Settlement</label>
                                                                            </li>
                                                                            <!-- <li>
                                                                                <input class="checkbox7" type="checkbox" name="checkbox" id="checkboxl6_5" />
                                                                                <label for="checkboxl6_12">Factoring company</label>
                                                                            </li> -->
                                                                              <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_1" />
                                                                                <label for="checkboxl6_1">Driver Pay
                                                                                    Settlement</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_2" />
                                                                                <label for="checkboxl6_2">Bank
                                                                                    Statment</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_3" />
                                                                                <label for="checkboxl6_3">Credit Card
                                                                                    Statement</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_4" />
                                                                                <label for="checkboxl6_4">Fuel Card
                                                                                    Report</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_5" />
                                                                                <label for="checkboxl6_5">Fuel
                                                                                    Report</label>
                                                                            </li> -->

                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_8" />
                                                                                <label for="checkboxl6_8">Payable
                                                                                    Report</label>
                                                                            </li> -->
                                                                            <!-- <li>
                                                                                <input class="checkbox6" type="checkbox"
                                                                                    name="checkbox" id="checkboxl6_9" />
                                                                                <label for="checkboxl6_9">Receivable
                                                                                    Report</label>
                                                                            </li> -->
                                                                        </ul>
                                                                    </h6>
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
                    <button type="submit" class="button-29" data-dismiss="modal" id="usersave">Submit</button>
                    <button type="button" class="button-29 addUserModalClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======================== add office modal ==================================== -->
<div class="modal fade" id="add_office_modal_form"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Create Office</h5>
                <button type="button" class="close close_office_modal_form" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAdd_office_modal" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control add_officeName" placeholder="Office Name "  id="add_officeName " name="officeName" required >
                        </div>
                        <label>Location<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control location_view" data-location="add_officeLocation" id="add_officeLocation" name="officeLocation" required />
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 close_office_modal_form" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 save_office_modal_data " >Save </button>
            </div>
        </div>
    </div>
</div>
 <!--=============================== end add office modal========================= -->