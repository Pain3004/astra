<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?>
<!------------------------------------------------------------------- driver modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="driverModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Driver</h4>
                    <button type="button" class="button-24 closeDriverModal">&times;</button>
                </div>

                
                <div style="margin-top: 15px; margin-left: 15px;">


                    @if($insertUser== 1)
                        <a href="#addDriverModal" class="button-57" data-toggle="modal" data-target="#addDriverModal"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Driver</span></a>
                    @endif 
                    
                    @if($deleteUser== 1)  
                        <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore Customer</span></a>
                    @endif
                    <a href="#setupDriverModal" class="button-57" data-toggle="modal" data-target="#setupDriverModal"><i class="fa fa-sliders" aria-hidden="true"></i></span><span>Setup<br>Driver</span></a>
                    <a href="#contractCategoryModal" class="button-57_alt contract_categoryModal" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>View Driver Contract</span></a>

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="driver_table_pagination" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">

                                                <!-- <button href="#addDriverModal" data-toggle="modal" data-target="#addDriverrModal"  class="add1button" style="vertical-align:middle"><span>Add </span></button>
                                                        
                                                        <table id="editable-file-datatable" style="margin-bottom : -360rem" class="table editable-table table-nowrap table-bordered table-edit wp-100"> -->

                                                <!-- <table id="" class="table editable-table table-nowrap table-bordered table-edit wp-100"> -->
                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <!-- <th>counter</th> -->
                                                        <th>NO</th>
                                                        <th style="">Name</th>
                                                        <th>Email</th>
                                                        <th>Location</th>
                                                        <th>Social Security No</th>
                                                        <th>Date of Birth</th>
                                                        <th>Date of Hire</th>
                                                        <th>License No</th>
                                                        <th>LIS</th>
                                                        <th>License Exp.Date</th>
                                                        <th>Driver Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="driverTable">

                                                </tbody>
                                            </table>
                                        </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                        @endif
                    </form>
                    <button type="button" class="button-29 closeDriverModal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-------------------------------------------------------------------over driver modal------------------------------------------------------------------->

<!------------------------------------------------------------------  add driver modal ------------------------------------------------------------------>

<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addDriverModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Driver</h4>
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
                                        <div class="table-responsive export-table">
                                            <form>
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="name"
                                                            placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="username">Username<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="username"
                                                            placeholder="username">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="address">Address <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="address"
                                                            placeholder="address">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="telephone">Telephone <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control telephone4"
                                                            id="telephone" placeholder="Telephone">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="altTelephone">Alt - Tel #</label>
                                                        <input type="text" class="form-control telephone4"
                                                            id="altTelephone" placeholder="Telephone">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="email" class="form-control" id="email"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="password">Password<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="password" class="form-control" id="password"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="location">Location <span
                                                                style="color:#ff0000">*</span> </label>
                                                        <input type="text" class="form-control" id="location"
                                                            placeholder="Location">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="zip">Zip <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="zip"
                                                            placeholder="Zip">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" id="status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                            <option value="Not Available">Not Available</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="socialSecurityNo">Social Security No </label>
                                                        <input type="text" class="form-control" id="socialSecurityNo"
                                                            placeholder="Social Security No">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="dateOfBirth">Date of Birth </label>
                                                        <input type="date" class="form-control" id="dateOfBirth"
                                                            placeholder="Date of Birth">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="dateOfHire">Date of Hire</label>
                                                        <input type="date" class="form-control" id="dateOfHire"
                                                            placeholder="Date of Hire">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="licenseNo">License No.<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="licenseNo"
                                                            placeholder="License No">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="licenseIssueState">License Issue State <span
                                                                style="color:#ff0000">*</span> </label>
                                                        <input list="statelist" class="form-control"
                                                            placeholder="--Select--" id="licenseIssueState"
                                                            name="driverLicenseIssue" autocomplete="off">
                                                        <datalist id="statelist">
                                                            <option value="AL">
                                                            <option value="AK">
                                                            <option value="AR">
                                                            <option value="CA">
                                                            <option value="CO">
                                                            <option value="CT">
                                                            <option value="DE">
                                                            <option value="FL">
                                                            <option value="GA">
                                                            <option value="HI">
                                                            <option value="ID">
                                                            <option value="IL">
                                                            <option value="IN">
                                                            <option value="IA">
                                                            <option value="KS">
                                                            <option value="KY">
                                                            <option value="LA">
                                                            <option value="ME">
                                                            <option value="MD">
                                                            <option value="MA">
                                                            <option value="MI">
                                                            <option value="MN">
                                                            <option value="MS">
                                                            <option value="MO">
                                                            <option value="MT">
                                                            <option value="NE">
                                                            <option value="NV">
                                                            <option value="NH">
                                                            <option value="NJ">
                                                            <option value="NM">
                                                            <option value="NY">
                                                            <option value="NC">
                                                            <option value="ND">
                                                            <option value="OH">
                                                            <option value="OK">
                                                            <option value="OR">
                                                            <option value="PA">
                                                            <option value="RI">
                                                            <option value="SC">
                                                            <option value="SD">
                                                            <option value="TN">
                                                            <option value="TX">
                                                            <option value="UT">
                                                            <option value="VT">
                                                            <option value="VA">
                                                            <option value="WA">
                                                            <option value="WV">
                                                            <option value="WI">
                                                            <option value="WY">
                                                        </datalist>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="licenseExpDate">License Exp. Date <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="date" class="form-control" id="licenseExpDate"
                                                            placeholder="License Exp. Date">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="lastMedical">Last Medical</label>
                                                        <input type="date" class="form-control" id="lastMedical"
                                                            placeholder="Last Medical">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="nextMedical">Next Medical</label>
                                                        <input type="date" class="form-control" id="nextMedical"
                                                            placeholder="Next Medical">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="lastDrugTest">Last Drug Test </label>
                                                        <input type="date" class="form-control" id="lastDrugTest"
                                                            placeholder="Last Drug Test">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="nextDrugTest">Next Drug Test </label>
                                                        <input type="date" class="form-control" id="nextDrugTest"
                                                            placeholder="Next Drug Test">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="passportExpiry">Passport Expiry</label>
                                                        <input type="date" class="form-control" id="passportExpiry"
                                                            placeholder="Passport Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="fastCardExpiry">Fast Card Expiry</label>
                                                        <input type="date" class="form-control" id="fastCardExpiry"
                                                            placeholder="Fast Card Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="hazmatExpiry">Hazmat Expiry </label>
                                                        <input type="date" class="form-control" id="hazmatExpiry"
                                                            placeholder="Hazmat Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_rate">Rate <span style="color:#ff0000">*</span>
                                                        </label>
                                                        <select class="form-control" onchange="changeRate(this.value)"
                                                            id="rate">
                                                            <option value="0" selected disabled>Select</option>
                                                            <option value="mile">Per Mile</option>
                                                            <option value="percentage">Percentage</option>
                                                            <option value="hour">Hourly</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3 ml-6" id="dMile"
                                                        style="display: none">
                                                        <label>Driver Pay Info</label><br>
                                                        <a href="#driverPayInfoModal" class="button-29"
                                                            data-toggle="modal" data-target="#driverPayInfoModal">Open
                                                            Pay Info</a>

                                                    </div>
                                                    <div class="form-group col-md-2" id="dPercentage"
                                                        style="display: none">
                                                        <label>Percentage( % )</label>
                                                        <input type="text" class="form-control" id="dPercentage"
                                                            placeholder="Percentage">
                                                    </div>
                                                    <div class="form-group col-md-2 col-md-3 ml-6" id="dHourly"
                                                        style="display: none">
                                                        <label>Driver Pay Info</label><br>
                                                        <a href="#driverPayInfoModal" class="button-29"
                                                            data-toggle="modal" data-target="#driverPayInfoModal">Open
                                                            Pay Info</a>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="currency">Currency <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="currency"
                                                            placeholder="
                                                            ">
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Recurrence +</label>
                                                        <div>
                                                            <a href="#addRecurrence" class="button-29" data-toggle="modal" data-target="#addRecurrence">Open recurrence +</a>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Recurrence -</label>
                                                        <div>
                                                            <a href="#substractRecurrence" class="button-29" data-toggle="modal" data-target="#substractRecurrence">Open recurrence -</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="terminationDate">Termination Date </label>
                                                        <input type="date" class="form-control" id="terminationDate"
                                                            placeholder="Termination Date">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="driverBalance ">Driver Balance </label>
                                                        <input type="text" class="form-control" id="driverBalance"
                                                            placeholder="Driver Balance ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="internalNotes">Internal Notes </label>
                                                    <input type="text" class="form-control" id="internalNotes"
                                                        placeholder="Notes">
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
                    <button type="submit" class="button-29 driverDataSubmit">Submit</button>
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------ over add modal ------------------------------------------------------------------>
<!------------------------------------------------------------------  edit driver modal ------------------------------------------------------------------>

<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editDriverModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Driver</h4>
                    <button type="button" class="button-24 editModalCloseButton" data-dismiss="modal">&times;</button>
                    <!-- <button type="button" class="close editModalCloseButton" data-dismiss="modal">&times;</button> -->
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                                @csrf
                                                <!-- <input type="hidden" id="up_comId" name="" > -->

                                                <input type="hidden" name="_token" id="drivercsrf"
                                                    value="{{Session::token()}}">
                                                <input type="hidden" id="up_comId">
                                                <input type="hidden" name="emaildriver" id="emaildriver">
                                                <!-- <input type="hidden" name="email4" id="email4"> -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="up_name">Name <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_name"
                                                            placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="up_username">Username<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_username"
                                                            placeholder="username">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="up_address">Address <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_address"
                                                            placeholder="address">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_telephone">Telephone <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control telephone4"
                                                            id="up_telephone" placeholder="Telephone">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_altTelephone">Alt - Tel #</label>
                                                        <input type="text" class="form-control telephone4"
                                                            id="up_altTelephone" placeholder="Telephone">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="up_email">Email<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="email" class="form-control" id="up_email"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="up_password">Password</label>
                                                        <input type="password" class="form-control" id="up_password"
                                                            placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="up_location">Location <span
                                                                style="color:#ff0000">*</span> </label>
                                                        <input type="text" class="form-control" id="up_location"
                                                            placeholder="Location">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="up_zip">Zip <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_zip"
                                                            placeholder="Zip">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="up_status">Status</label>
                                                        <select class="form-control" id="up_status">
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                            <option value="Not Available">Not Available</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="up_socialSecurityNo">Social Security No </label>
                                                        <input type="text" class="form-control" id="up_socialSecurityNo"
                                                            placeholder="Social Security No">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="up_dateOfBirth">Date of Birth </label>
                                                        <input type="date" class="form-control" id="up_dateOfBirth"
                                                            placeholder="Date of Birth">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="up_dateOfHire">Date of Hire</label>
                                                        <input type="date" class="form-control" id="up_dateOfHire"
                                                            placeholder="Date of Hire">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="up_licenseNo">License No.<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_licenseNo"
                                                            placeholder="License No">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="up_licenseIssueState">License Issue State <span
                                                                style="color:#ff0000">*</span> </label>
                                                        <input list="statelist" class="form-control"
                                                            placeholder="--Select--" id="up_licenseIssueState"
                                                            name="driverLicenseIssue" autocomplete="off">
                                                        <datalist id="statelist">
                                                            <option value="AL">
                                                            <option value="AK">
                                                            <option value="AR">
                                                            <option value="CA">
                                                            <option value="CO">
                                                            <option value="CT">
                                                            <option value="DE">
                                                            <option value="FL">
                                                            <option value="GA">
                                                            <option value="HI">
                                                            <option value="ID">
                                                            <option value="IL">
                                                            <option value="IN">
                                                            <option value="IA">
                                                            <option value="KS">
                                                            <option value="KY">
                                                            <option value="LA">
                                                            <option value="ME">
                                                            <option value="MD">
                                                            <option value="MA">
                                                            <option value="MI">
                                                            <option value="MN">
                                                            <option value="MS">
                                                            <option value="MO">
                                                            <option value="MT">
                                                            <option value="NE">
                                                            <option value="NV">
                                                            <option value="NH">
                                                            <option value="NJ">
                                                            <option value="NM">
                                                            <option value="NY">
                                                            <option value="NC">
                                                            <option value="ND">
                                                            <option value="OH">
                                                            <option value="OK">
                                                            <option value="OR">
                                                            <option value="PA">
                                                            <option value="RI">
                                                            <option value="SC">
                                                            <option value="SD">
                                                            <option value="TN">
                                                            <option value="TX">
                                                            <option value="UT">
                                                            <option value="VT">
                                                            <option value="VA">
                                                            <option value="WA">
                                                            <option value="WV">
                                                            <option value="WI">
                                                            <option value="WY">
                                                        </datalist>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="up_licenseExpDate">License Exp. Date <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="date" class="form-control" id="up_licenseExpDate"
                                                            placeholder="License Exp. Date">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="up_lastMedical">Last Medical</label>
                                                        <input type="date" class="form-control" id="up_lastMedical"
                                                            placeholder="Last Medical">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_nextMedical">Next Medical</label>
                                                        <input type="date" class="form-control" id="up_nextMedical"
                                                            placeholder="Next Medical">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_lastDrugTest">Last Drug Test </label>
                                                        <input type="date" class="form-control" id="up_lastDrugTest"
                                                            placeholder="Last Drug Test">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_nextDrugTest">Next Drug Test </label>
                                                        <input type="date" class="form-control" id="up_nextDrugTest"
                                                            placeholder="Next Drug Test">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="up_passportExpiry">Passport Expiry</label>
                                                        <input type="date" class="form-control" id="up_passportExpiry"
                                                            placeholder="Passport Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_fastCardExpiry">Fast Card Expiry</label>
                                                        <input type="date" class="form-control" id="up_fastCardExpiry"
                                                            placeholder="Fast Card Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_hazmatExpiry">Hazmat Expiry </label>
                                                        <input type="date" class="form-control" id="up_hazmatExpiry"
                                                            placeholder="Hazmat Expiry">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_rate">Rate <span style="color:#ff0000">*</span>
                                                        </label>
                                                        <select class="form-control"
                                                            onchange="changeRateEdit(this.value)" id="up_rate">
                                                            <option value="0" selected disabled>Select</option>
                                                            <option value="mile">Per Mile</option>
                                                            <option value="percentage">Percentage</option>
                                                            <option value="hour">Hourly</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3 ml-6" id="dMileEdit"
                                                        style="display: none">
                                                        <label>Driver Pay Info</label>
                                                        <a href="#driverPayInfoEditModal" class="button-29"
                                                            data-toggle="modal"
                                                            data-target="#driverPayInfoEditModal">Open
                                                            Pay Info</a>

                                                    </div>
                                                    <div class="form-group col-md-2" id="dPercentageEdit"
                                                        style="display: none">
                                                        <label>Percentage( % )</label>
                                                        <input type="text" class="form-control" id="dPercentageEdit"
                                                            placeholder="Percentage">
                                                    </div>
                                                    <div class="form-group col-md-3 ml-6" id="dHourlyEdit"
                                                        style="display: none">
                                                        <label>Driver Pay Info</label>
                                                        <a href="#driverPayInfoEditModal" class="button-29"
                                                            data-toggle="modal"
                                                            data-target="#driverPayInfoEditModal">Open
                                                            Pay Info</a>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="up_currency">Currency <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_currency"
                                                            placeholder="Currency">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="up_recurrencePlus">Recurrence+</label>
                                                        <input type="text" class="form-control" id="up_recurrencePlus"
                                                            placeholder="Recurrence">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="up_recurrenceMin">Recurrence -</label>
                                                        <input type="text" class="form-control" id="up_recurrenceMin"
                                                            placeholder="Recurrence-">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_terminationDate">Termination Date </label>
                                                        <input type="date" class="form-control" id="up_terminationDate"
                                                            placeholder="Termination Date">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_driverBalance ">Driver Balance </label>
                                                        <input type="text" class="form-control" id="up_driverBalance"
                                                            placeholder="Driver Balance ">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="up_internalNotes">Internal Notes </label>
                                                    <input type="text" class="form-control" id="up_internalNotes"
                                                        placeholder="Notes">
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
                    <button type="submit" class="button-29 driverDataUpdate">Update</button>
                    <button type="button" class="button-29 editModalCloseButton" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------ over edit driver modal ------------------------------------------------------------------>


<!------------------------------------------------------------------ Setup driver modal ------------------------------------------------------------------>
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="setupDriverModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Set Up Driver</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name <span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="drivername12"
                                                            placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="sentvia">Sent via<span
                                                                style="color:#ff0000">*</span></label>
                                                        <select onchange="showdata(this.value)" class="form-control"
                                                            id="sentvia">
                                                            <option value="0" selected disabled>Select one</option>
                                                            <option value="email">Email</option>
                                                            <option value="text" disabled>Text</option>
                                                            <option value="whatsapp" disabled>Whatsapp (Coming Soon)
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6" id="emaildata"
                                                        style="display: none">
                                                        <label>Email <span style="color:#ff0000">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Email *"
                                                                type="email" name="driveremail1" id="driveremail1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="phonedata"
                                                        style="display: none">
                                                        <label>Telephone No.<span style="color:#ff0000">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Telephone No. *"
                                                                type="text" name="textno" id="textno">
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
                    <button type="submit" class="button-29 setupDriverSubmit">Submit</button>
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------- driver Application modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="viewDriverApplicationModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Driver Applications</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive export-table">


                                            <table id="editable-file-datatable"
                                                class="table editable-table table-nowrap table-bordered table-edit wp-100">

                                                <thead>
                                                    <tr>
                                                        <!-- <th>counter</th> -->
                                                        <th>NO</th>
                                                        <th>Driver Name</th>
                                                        <th>Application Date</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="viewDriverApplicationTable">

                                                </tbody>
                                            </table>
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
                    <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="btn btn-primary" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" class="laravel_csrf_tokn" value="{{ csrf_token() }}" />
<!-------------------------------------------------------------------over driver Application modal------------------------------------------------------------------->
<!------------------------------------------------------------------ Add  driver Owner modal ------------------------------------------------------------------>
<div id="addDriverOwnerModal" data-backdrop="static" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable custom_modal_small" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add as Owner operator</h4>
                <button type="button" class="button-24 addDriverOwnerModalCloseButton" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id='addOwnerForm'>                            
                    <div class="form-group">
                        <div class="row row-sm">
                            <div class="col-sm-4">
                                <label class="form-label" for="owner-driver-name">Driver</label>
                                <input type="text" class="form-control" list="drivernamelist" autocomplete="off" id="owner-driver-name" disabled/>
                                <input type="hidden" id="driverid" value=""  />
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="ssnMask-cvv">Pay Percentage<span class="mandatory">* </span>( % )</label></label>
                                <div class="input-group">
                                    <div class="input-group-text bg-primary-transparent text-primary">
                                        <i class="fe fe-minus text-20" onclick="dec_percentage()" ></i>
                                    </div>
                                        <input type="number" class="form-control" id="ownerPercentage" name="percentage" placeholder="Percentage" >
                                    <div class="input-group-text bg-primary-transparent text-primary">
                                        <i class="fe fe-plus text-20" onclick="inc_percentage()" ></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="ssnMask-cvv">Select Truck</label>
                                <input list="fuel_truck_report" class="form-control" placeholder="search here..." id="ownerTruckNo" name="truckNo" autocomplete="off">
                                    <datalist id="fuel_truck_report">
                                    </datalist>
                            </div>
                        </div>
                        <br>

                        <br>
                        <div class="">
                            <!-- <div class="block">
                                                <div class="row row-sm">
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Category</label>
                                                            <input type="text" class="form-control" name="installmentCategory1[]" list="fixpaycat" placeholder=" Search here..." autocomplete="off" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Installment Type</label>
                                                                <select name="installmentType[]" class="form-control">
                                                                    <option value="">Select type</option>
                                                                    <option value="Weekly">Weekly</option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="yearly">Yearly</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Amount</label>
                                                            <input name="amount[]" type="text" class="form-control" id="amount"/>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Installment</label>
                                                            <input name="installment[]" type="text" class="form-control" id="installment" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">start#</label>
                                                            <input name="startNo[]" type="text" class="form-control" id="startNo" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="e">start Date</label>
                                                            <input name="startDate[]" type="date" class="form-control" id="startDate"/>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <label class="form-label" for="">Internal Note</label>
                                                            <textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote[]"></textarea>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <label class="form-label" for="">Delete</label>
                                                            
                                                        
                                                            </button>
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove"><spanaria-hidden="true">&times;</span>
                                                </div>
                                            </div> -->
                            <div class="block">
                                <button id="btnAdd1" type="button" class="button-23 add" data-toggle="tooltip" data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- modal-body -->

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="button-29" id="submitOwnerOparator">Submit</button>
                <button type="button" class="button-29 addDriverOwnerModalCloseButton" data-dismiss="modal">Close</button>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<!-------------------------------------------------------------------over driver Application modal------------------------------------------------------------------->
<!------------------------------------------------------------------ Edit  driver Owner modal ------------------------------------------------------------------>
<div id="editDriverOwnerModal" data-backdrop="static" class="modal fade">
                <div class="modal-dialog modal-dialog-scrollable custom_modal_small" role="document">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Owner operator</h4>
                            <button type="button" class="button-24 editDriverOwnerModalCloseButton" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form id='up_addOwnerForm'>                            
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-sm-4">
                                            <label class="form-label" for="owner-driver-name">Select Driver</label>
                                            <input type="text" class="form-control" list="drivernamelist" autocomplete="off" id="up_owner-driver-name" disabled/>
                                            <input type="hidden" id="driverNamesid" value="" />
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="ssnMask-cvv">Pay Percentage<span style="color:#ff0000">*</span>( % )</label></label>
                                            <div class="input-group">
                                                <div class="input-group-text bg-primary-transparent text-primary">
                                                    <i class="fe fe-minus text-20" onclick="dec_percentage()" ></i>
                                                </div>
                                                    <input type="number" class="form-control" id="up_ownerPercentage" name="percentage" placeholder="Percentage" >
                                                <div class="input-group-text bg-primary-transparent text-primary">
                                                    <i class="fe fe-plus text-20" onclick="inc_percentage()" ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label" for="ssnMask-cvv">Select Truck<span style="color:#ff0000">*</span></label>
                                            <input list="fuel_truck_report" class="form-control" placeholder="search here..." id="up_ownerTruckNo" name="truckNo" autocomplete="off">
                                                <datalist id="fuel_truck_report">
                                                </datalist>
                                        </div>
                                    </div>
                                    <br>

                                    <br>
                                        <div>
                                            <!-- <div class="block">
                                                <div class="row row-sm">
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Category</label>
                                                            <input type="text" class="form-control" name="installmentCategory1[]" list="fixpaycat" placeholder=" Search here..." autocomplete="off" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Installment Type</label>
                                                                <select name="installmentType[]" class="form-control">
                                                                    <option value="">Select type</option>
                                                                    <option value="Weekly">Weekly</option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="yearly">Yearly</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Amount</label>
                                                            <input name="amount[]" type="text" class="form-control" id="amount"/>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">Installment</label>
                                                            <input name="installment[]" type="text" class="form-control" id="installment" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="">start#</label>
                                                            <input name="startNo[]" type="text" class="form-control" id="startNo" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label class="form-label" for="e">start Date</label>
                                                            <input name="startDate[]" type="date" class="form-control" id="startDate"/>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <label class="form-label" for="">Internal Note</label>
                                                            <textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote[]"></textarea>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <label class="form-label" for="">Delete</label>
                                                            
                                                        
                                                            </button>
                                                        </div>
                                                        <button type="button" class="btn btn-danger remove"><spanaria-hidden="true">&times;</span>
                                                </div>
                                            </div> -->
                                            <div>
                                                <p> test </p>
                                            </div>
                                            <div class="block">
                                                <button id="up_btnAdd1" type="button" class="button-23 add" data-toggle="tooltip" data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD </button>
                                            </div>
                                        </div>
                                </div>  
                            </form>
                        </div><!-- modal-body -->

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="button-29" id="up_submitOwnerOparator">Submit</button>
                            <button type="button" class="button-29 editDriverOwnerModalCloseButton" data-dismiss="modal">Close</button>
                        </div>

                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- modal -->
<!-------------------------------------------------------------------over driver Application modal------------------------------------------------------------------->