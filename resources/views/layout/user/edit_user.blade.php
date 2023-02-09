<!-- EditUser modal -->

<div class="container">
  <!-- <h2>Large Modal</h2> -->
  <!-- Button to Open the Modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open modal
        </button> -->
  <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="userEditModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="button-24 userEditModalCloseButton" >&times;</button>
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
                                                    <form method="post">
                                                        @csrf
                                                        <input type="hidden" name="_token" id="newcsrf"
                                                            value="{{Session::token()}}">
                                                        <input type="hidden" name="email4" id="email4">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label for="editFirstName4">First Name<span
                                                                        class="required"></span></label>
                                                                <input type="text" class="form-control" name="editFirstName4"
                                                                    id="editFirstName4" placeholder="First Name">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="editLastName4">Last Name<span
                                                                        class="required"></span></label>
                                                                <input type="email" class="form-control" name="editLastName4"
                                                                    id="editLastName4" placeholder="Last Name">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="editUsername4">Username<span
                                                                        class="required"></span></label>
                                                                <input type="text" class="form-control" name="editUsername4"
                                                                    id="editUsername4" placeholder="Username">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="editEmail4">Email<span
                                                                        class="required"></span></label>
                                                                <input type="email" class="form-control" name="editEmail4"
                                                                    id="editEmail4" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <label for="editPassword4">Password<span
                                                                        class="required"></span></label>
                                                                <input type="password" class="form-control" name="editPassword4"
                                                                    id="editPassword4" placeholder="Password">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="editAddress">Address<span
                                                                        class="required"></span></label>
                                                                <input type="text" class="form-control" name="editAddress"
                                                                    id="editAddress" placeholder="1234 Main St">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="editLocation">Location</label>
                                                                <input type="text" class="form-control location_view" data-location="editLocation" name="editLocation"
                                                                    id="editLocation" placeholder="Apartment, studio, or floor">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="editZip">Zip</label>
                                                                <input type="number" class="form-control" name="editZip"
                                                                    id="editZip">
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="editCompanyName">Company Name</label>
                                                                <span class="glyphicon glyphicon-plus-sign add_Company_Name_modal_form_btn "  data-toggle="modal"  style="cursor:pointer; color:blue !important;" ></span>
                                                                <select  class="form-control set_company_name" name="company_name" id="editCompanyName">
                                                                    <option>Select Here</option>
                                                                </select>
                                                                <!-- <select id="editCompanyName" name="editCompanyName"
                                                                    class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option value="1">1</option>
                                                                </select> -->
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="editOffice">Office</label>
                                                                <span class="glyphicon glyphicon-plus-sign add_office_model_form_btn"  style="color:blue !important" data-toggle="modal"  style="cursor:pointer;"></span>
                                                                <select  class="form-control  office_name_set" name="officeName" id="editOffice">
                                                                    <option>Select Here</option>
                                                                </select>
                                                                <!-- <select id="editOffice" name="editOffice" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option value="1">1</option>
                                                                </select> -->
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="editTelephone">Telephone</label>
                                                                <input type="text" class="form-control telephone4"
                                                                    name="editTelephone" id="editTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="editExt">Ext</label>
                                                                <input type="text" class="form-control" name="editExt"
                                                                    id="editExt">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="editTollFree">Toll Free</label>
                                                                <input type="text" class="form-control" name="editTollFree"
                                                                    id="editTollFree" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="editFax">Fax</label>
                                                                <input type="text" class="form-control" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  name="editFax" id="editFax">
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
                    <button type="submit" class="button-29" data-dismiss="modal" id="useredit">Submit</button>
                    <button type="button" class="button-29 userEditModalCloseButton" data-dismiss="modal">Close</button>
                    <!-- <button class="btn btnclose" style="background-color:red;" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>