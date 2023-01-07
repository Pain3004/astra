<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="UserPrivillegeModal" role="dialog">
        <div class="modal-dialog custom_modal_small modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Privillege</h5>
                    <button type="button" class="button-24 UserPrivillegeClose" >×</button>
                </div>

                <div class="content" id="Privilege">
                    <div class="row">
                        <div class="col-md-1">
                            
                        </div>
                        <div class="form-group col-md-2" data-name="user_search">
                            <label>
                            <!-- Select User -->
                            </label>
                            <datalist id="userList">
                            </datalist>
                            <input list="PrivillegeUserList" placeholder="Search User..." class="form-control" id="PrivillegeUser" name="PrivillegeUser" >
                            <datalist id="PrivillegeUserList" class="PrivillegeUserList"><option>Select Here</option></datalist> 
                        </div>
                        <!-- <div class="col-md-2">
                            <label></label><br>
                            <a  class="button-57_alt" id="searchUser"><i class="fa fa-search" aria-hidden="true"></i><span>Search User</span></a>
                        </div> -->
                        <!-- <div class="content"> -->
                        <div class="col-md-1">
                            <label>Insert</label><br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="insert_user">
                                <label class="custom-control-label" for="insert_user"><i
                                        class="mdi mdi-lead-pencil setting-icon"></i></label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label>Update</label><br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="update_user">
                                <label class="custom-control-label" for="update_user"><i
                                        class="mdi mdi-pencil-plus setting-icon"></i></label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label>Delete</label><br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="delete_user">
                                <label class="custom-control-label" for="delete_user"><i
                                        class="mdi mdi-delete-sweep-outline setting-icon"></i></label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label>Import</label><br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="import_user">
                                <label class="custom-control-label" for="import_user"><i
                                        class="mdi mdi-file-import setting-icon"></i></label>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <label>Export</label><br>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="export_user">
                                <label class="custom-control-label" for="export_user"><i
                                        class="mdi mdi-file-export setting-icon"></i></label>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                    <div id="privilege-data" class="tabs">
                        <div class="tab-header">
                            <div class="tab selectedpriviladge" id="dashboard_priviladge_main" name="tab-1" onclick="changeTab1('tab1-1'); managePriviladgeSelect(this) ">
                                <i class="icon-graph-rising" style="vertical-align:middle;"></i> Dashboard
                            </div>
                            <div class="tab" id="custom_priviladge_main"  name="tab-2" onclick="changeTab1('tab1-2'); managePriviladgeSelect(this)">
                                <i class="icon-life-buoy" style="vertical-align:middle;"></i> Custom
                            </div>
                            <div class="tab" id="admin_priviladge_main" name="tab-3" onclick="changeTab1('tab1-3'); managePriviladgeSelect(this)">
                                <i class="icon-squares" style="vertical-align:middle;"></i> Admin
                            </div>
                            <div class="tab" id="ifta_priviladge_main" name="tab-4" onclick="changeTab1('tab1-4'); managePriviladgeSelect(this)">
                                <i class="icon-graph"  style="vertical-align:middle;"></i> IFTA
                            </div>
                            <div class="tab" id="account_priviladge_main" name="tab-5" onclick="changeTab1('tab1-5'); managePriviladgeSelect(this)">
                                <i class="icon-paper-pen" style="vertical-align:middle;"></i> Finance
                            </div>
                            <div class="tab" id="report_priviladge_main" name="tab-6" onclick="changeTab1('tab1-6'); managePriviladgeSelect(this)">
                                <i class="icon-life-buoy" style="vertical-align:middle;"></i> Report
                            </div>

                            <div class="tab" id="settlements_priviladge_main" name="tab-7" onclick="changeTab1('tab1-7'); managePriviladgeSelect(this)">
                                <i class="icon-life-buoy" style="vertical-align:middle;"></i> Settlements
                            </div>
                        </div>
                        <div class="tab-indicator"></div>
                        <div class="form-row">
                                
                        </div>
                        <div class="tab-content">
                            <div id="tab1-1" class="tab-dashboard active" style="display:inline-block">
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox1" type="checkbox" id="select-all_l" value="Select All_l1">
                                            <label for="select-all_l1">Select All</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox"  name="checkbox" id="upcheckbox-1" />
                                            <label for="upcheckbox-1">New Active Load</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox"  name="checkbox" id="upcheckbox-2" />
                                            <label for="upcheckbox-2">Profit/Loss</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-3" />
                                            <label for="upcheckbox-3">Dispatcher</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-4" />
                                            <label for="upcheckbox-4">Driver</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-5" />
                                            <label for="upcheckbox-5">Company</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-6" />
                                            <label for="upcheckbox-6">Truck</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-7" />
                                            <label for="upcheckbox-7">Carrier</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox" name="checkbox" id="upcheckbox-8" />
                                            <label for="upcheckbox-8">Equipment</label>
                                        </li>
                                        <li>
                                            <input class="checkbox1" type="checkbox"  name="checkbox" id="upcheckbox-9" />
                                            <label for="upcheckbox-9">Sales Representative</label>
                                        </li>
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-2" class="tab-master">
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox2" type="checkbox" id="select-all_l2" value="Select All_l2">
                                            <label for="select-all_l2">Select All</label>
                                        </li>
                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_1" />
                                            <label for="upcheckboxl2_1">Company</label>
                                        </li>
                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_2" />
                                            <label for="upcheckboxl2_2">Branch Office Location</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_10" />
                                            <label for="upcheckboxl2_10">Currency Setting</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_12" />
                                            <label for="upcheckboxl2_12">Payment Terms</label>
                                        </li>
                                        
                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_4" />
                                            <label for="upcheckboxl2_4">Add Terms & Conditions</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_6" />
                                            <label for="upcheckboxl2_6">Status</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_7" />
                                            <label for="upcheckboxl2_7">Load Type</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_5" />
                                            <label for="upcheckboxl2_5">Equipment Type</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_13" />
                                            <label for="upcheckboxl2_13">Reccurance Category</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_3" />
                                            <label for="upcheckboxl2_3">Truck & Trailer make</label>
                                        </li>

                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_8" />
                                            <label for="upcheckboxl2_8">User Privillege</label>
                                        </li>
                                        <li>
                                            <input class="checkbox2" type="checkbox" name="checkbox" id="upcheckboxl2_9" />
                                            <label for="upcheckboxl2_9">Setting</label>
                                        </li>

                                        
                                        </li>
                                        </li>
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-3" class="tab-admin" >
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox3" type="checkbox" id="upselect-all_l3" value="Select All_l3">
                                            <label for="select-all_l3">Select  All</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="admin" id="upcheckboxl3_8" />
                                            <label for="upcheckboxl3_8">Admin</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox"  name="customer" id="upcheckboxl3_1" />
                                            <label
                                                for="upcheckboxl3_1">Customer</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_2" />
                                            <label
                                                for="upcheckboxl3_2">Shipper & Consignee</label>
                                        </li>
                                        
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_4" />
                                            <label
                                                for="upcheckboxl3_4">External Carrier</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_5" />
                                            <label for="upcheckboxl3_5">Driver & Owner Operator</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_6" />
                                            <label for="upcheckboxl3_6">User</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_7" />
                                            <label for="upcheckboxl3_7">Truck</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_10" />
                                            <label
                                                for="upcheckboxl3_10">Trailer</label>
                                        </li>
                                        <li>
                                            <input class="checkbox3" type="checkbox" name="checkbox" id="upcheckboxl3_9" />
                                            <label for="upcheckboxl3_9">Factoring
                                                Company</label>
                                        </li>
                                        
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-4" class="tab-ifta" >
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox4" type="checkbox" id="upselect-all_l4" value="upSelect All_l4">
                                            <label for="upselect-all_l4">Select All</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox" name="checkbox" id="upcheckboxl4_2" />
                                            <label for="upcheckboxl4_2">Ifta</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox" name="checkbox" id="upcheckboxl4_1" />
                                            <label for="upcheckboxl4_1">Fuel Vendor</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox" name="checkbox" id="upcheckboxl3_13" />
                                            <label for="upcheckboxl3_13">Fuel Card</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox"  name="checkbox" id="upcheckboxl4_3" />
                                            <label for="upcheckboxl4_3">Fuel Reciepts & Cash Advance</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox" name="checkbox" id="upcheckboxl4_4" />
                                            <label for="upcheckboxl4_4">Tolls</label>
                                        </li>
                                        <li>
                                            <input class="checkbox4" type="checkbox" name="checkbox" id="upcheckboxl4_5" />
                                            <label for="upcheckboxl4_5">IFTA Trips</label>
                                        </li>
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-5" class="tab-account">
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox5" type="checkbox" id="upselect-all_l5" value="Select All_l5">
                                            <label for="select-all_l5">Select All</label>
                                        </li>
                                        <li>
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_6" />
                                            <label for="upcheckboxl5_6">Account</label>
                                        </li>
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_5" />
                                            <label for="upcheckboxl5_5">Bank</label>
                                        </li>
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_4" />
                                            <label for="upcheckboxl5_4">Credit card</label>
                                        </li>

                                        
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_3" />
                                            <label for="upcheckboxl5_3">Sub Credit card</label>
                                        </li>
                                        
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_1" />
                                            <label for="upcheckboxl5_1">Accounting Manager</label>
                                        </li>
                                        <li>
                                            <input class="checkbox5" type="checkbox" name="checkbox" id="upcheckboxl5_2" />
                                            <label for="upcheckboxl5_2">Payment & Receipt Registration</label>
                                        </li>
                                        
                                        
                                        
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-6" class="tab-report">
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox6" type="checkbox" id="select-all_l6" value="Select All_l6">
                                            <label for="select-all_l6">Select All</label>
                                        </li>

                                        <li>
                                            <input class="checkbox6" type="checkbox" name="checkbox" id="upcheckboxl6_6" />
                                            <label for="upcheckboxl6_6">Reports</label>
                                        </li>
                                        <li>
                                            <input class="checkbox6" type="checkbox" name="checkbox" id="upcheckboxl6_7" />
                                            <label for="upcheckboxl6_7">Aging Report</label>
                                        </li>
                                        <li>
                                            <input class="checkbox6" type="checkbox" name="checkbox" id="upcheckboxl6_12" />
                                            <label for="upcheckboxl6_12">Revenue Report</label>
                                        </li>
                                        <li>
                                            <input class="checkbox6" type="checkbox" name="checkbox" id="upcheckboxl6_11" />
                                            <label for="upcheckboxl6_11">Expense Report</label>
                                        </li>
                                        <li>
                                            <input class="checkbox6" type="checkbox" name="checkbox" id="upcheckboxl6_10" />
                                            <label for="upcheckboxl6_10">1099 Report</label>
                                        </li>
                                        
                                    </ul>
                                </h6>
                            </div>
                            <div id="tab1-7" class="tab-settlements">
                                <h6>
                                    <ul class="ks-cboxtags">
                                        <li>
                                            <input class="checkbox7" type="checkbox" id="upselect-all_l7" value="Select All_l7">
                                            <label for="select-all_l7">Select All</label>
                                        </li>
                                        
                                        <li>
                                            <input class="checkbox7" type="checkbox" name="checkbox" id="upcheckboxl7_1" />
                                            <label for="upcheckboxl7_1"> Settlements</label>
                                        </li>
                                        <li>
                                            <input class="checkbox7" type="checkbox" name="checkbox" id="upcheckboxl7_2" />
                                            <label for="upcheckboxl7_2">Driver Pay Settlements</label>
                                        </li>
                                        
                                        <li>
                                            <input class="checkbox7" type="checkbox" name="checkbox" id="upcheckboxl7_3" />
                                            <label for="upcheckboxl7_3">Customer Settlement</label>
                                        </li>

                                        <li>
                                            <input class="checkbox7" type="checkbox"  name="checkbox" id="upcheckboxl7_4" />
                                            <label for="upcheckboxl7_4">Carrier Settlement</label>
                                        </li>
                                        
                                    </ul>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form> -->
                    <button type="submit" class="button-29" data-dismiss="modal" id="userUpdate">Update</button>
                    <button type="button" class="button-29 UserPrivillegeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End  modal------------------------------------------------------------------->



</script>