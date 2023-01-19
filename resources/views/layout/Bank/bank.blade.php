<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="bankModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Bank</h4>
                    <button type="button" class="button-24 bankClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <a href="#" class="button-57 createBankModalStore" data-toggle="modal"data-target="#"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                    <a href="#" class="button-57_alt restoreBankBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></a>
                    <!-- <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#contractCategoryModal" class="button-57_alt contract_categoryModal" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a> -->
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
                        <!-- <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div> -->
                    </div>

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                        <tr class="tr">

                                            <th >No</th>
                                            <th >Name of Bank</th>
                                            <th >Address / Branch</th>
                                            <th >Account Holder Name</th>
                                            <th >Bank Account</th>
                                            <th >Bank Routing</th>
                                            <th >Opening Bal Dt </th>
                                            <th > Opening Balance</th>
                                            <th > Current Balance</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="bankTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                           
                                            <th >No</th>
                                            <th >Name of Bank</th>
                                            <th >Address / Branch</th>
                                            <th >Account Holder Name</th>
                                            <th >Bank Account</th>
                                            <th >Bank Routing</th>
                                            <th >Opening Bal Dt </th>
                                            <th > Opening Balance</th>
                                            <th > Current Balance</th>
                                            <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="button-29 bankClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--================================= create bank modal ============================= -->
<div class="modal fade" id="BankModalStoreData"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add bank</h5>
                <button type="button" class="close closeAddBankData" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAdd_add_bank_data" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name of Bank:<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addbankName" placeholder="Name of Bank"  id="addbankName " name="bankName" required >
                        </div>
                        <label>Address / Branch<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addbankAddresss"  name="bankAddresss" required />
                        </div>
                        <label>Account Holder Name <span class="glyphicon glyphicon-plus-sign  CreateCompanyHolderName "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <!-- <input  class="form-control accountHolder" type="text"  name="accountHolder" required /> -->
                            <select class="form-control listCompanyNames addaccountHolder"  name="accountHolder" required ></select>
                        </div>
                        <label>Bank Account<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addaccountNo " type="number"  name="accountNo" required />
                        </div>
                        <label>Bank Routing:<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addroutingNo " type="number"  name="routingNo" required />
                        </div>
                        <label>Opening Bal Dt<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addopeningBalDate " type="date"  name="openingBalDate" required />
                        </div>
                        <label>Opening Balance :<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addopeningBalance " type="number"  name="openingBalance" required />
                        </div>
                        <label>Current Cheque no</label>
                        <div>
                            <input  class="form-control addcurrentcheqNo " type="number"  name="currentcheqNo"  />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeAddBankData" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 bankDataSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!--================================ end create bank modal =========================== -->
   <!--============================ add company modal =================== ===============-->
   <div class="modal fade" id="CompanyCreateModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Create Company</h5>
                <button type="button" class="close closeCompanyCreateModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group col-md-12">
                        <label>Company Name:<span style="color:#ff0000">*</span></label>
                        <div>
                            <!-- <input type= "hidden" class="form-control addbankCompany" placeholder="Name of Company" name="bankCompany" required > -->
                            <input type= "text" class="form-control addcompanyName" placeholder="Name of Company" name="companyName" required >
                        </div>
                        <label>Shipping Address</label>
                        <div>
                            <input type= "text" class="form-control addshippingAddress"  name="shippingAddress" placeholder="Shipping Address" />
                        </div>
                        <label>Telephone No<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addtelephoneNo " type="number"  name="telephoneNo" placeholder="(999) 999-9999" required />
                        </div>
                        <label>Fax No</label>
                        <div>
                            <input  class="form-control addBankfaxNo " type="text"  name="faxNo" Placeholder="Fax No" />
                        </div>
                        <label>M.C. No</label>
                        <div>
                            <input  class="form-control addBankmcNo " type="Text"  name="mcNo" placeholder="M.C. No" />
                        </div>
                        <label>US DOT No</label>
                        <div>
                            <input  class="form-control addBankusDotNo " type="Text"  name="usDotNo" placeholder="US DOT No" />
                        </div>
                        <label>Email Address<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addBankmailingAddress " type="email"  name="mailingAddress" required />
                        </div>
                        <label>Factoring Company<span class="glyphicon glyphicon-plus-sign  add_Company_Name_modal_form_btn "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <input  class="form-control create_factoringCompany" type="text"  name="factoringCompany"  />
                        </div>
                        <label>Website</label>
                        <div>
                            <input  class="form-control addBankwebsite " type="text"  name="website" placeholder="url//: Website" />
                        </div>
                        <label>Upload Files</label>
                        <div>
                            <input  class="form-control addBankComapanyFiles " type="file"  name="files[]"  />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeCompanyCreateModal" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 CompanyCreateModalSaveButton " >Save </button>
            </div>
        </div>
    </div>
</div>
   <!--====================== end add company modal ======================================== -->

<!--================================ update bank details ============================= -->
<div class="modal fade" id="UpdateBankModalStoreData"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Update bank</h5>
                <button type="button" class="close closeUpdateBankData" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAdd_update_bank_data" value="{{ csrf_token() }}" />
                    <input type="hidden" class="bankCompID" >
                    <input type="hidden" class="BankDetailsAdminId" >

                    <div class="form-group col-md-12">
                        <label>Name of Bank:<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updatebankName" placeholder="Name of Bank"  id="updatebankName " name="bankName" required >
                        </div>
                        <label>Address / Branch<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updatebankAddresss"  name="bankAddresss" required />
                        </div>
                        <label>Account Holder Name<span style="color:#ff0000">*</span>  <span class="glyphicon glyphicon-plus-sign  CreateCompanyHolderName "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <!-- <input  class="form-control accountHolder" type="text"  name="accountHolder" required /> -->
                            <select class="form-control listCompanyNames updateaccountHolder"  name="accountHolder" required ></select>
                        </div>
                        <label>Bank Account<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateaccountNo " type="number"  name="accountNo" required />
                        </div>
                        <label>Bank Routing:<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateroutingNo " type="number"  name="routingNo" required />
                        </div>
                        <label>Opening Bal Dt<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateopeningBalDate " type="date"  name="openingBalDate" required />
                        </div>
                        <label>Opening Balance :<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateopeningBalance " type="number"  name="openingBalance" required />
                        </div>
                        <label>Current Cheque no</label>
                        <div>
                            <input  class="form-control updatecurrentcheqNo " type="number"  name="currentcheqNo"  />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeUpdateBankData" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 bankDataUpdatebutton " >Update </button>
            </div>
        </div>
    </div>
</div>
<!--================================= end update details ============================ -->


 <!--=========================== start restore ============================================ -->
 <div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restorebankModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Bank</h4>
                    <button type="button" class="button-24 restorebankClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                <input type="hidden" name="checked_id" id="checked_BankDetails_ids" value="">
                    <input type="hidden" name="company_id" id="checked_BankDetails_company_ids" value="">
                    <button id="restore_BankDetails_data"  class="button-57_alt restore_BankDetails_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore Credit Card</span></button>
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
                        <!-- <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div> -->
                    </div>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                        <tr class="tr">

                                            <th ><input type="checkbox" name="all_ids[]" class="bankDetails_all_ids"></th>
                                            <th >Name of Bank</th>
                                            <th >Address / Branch</th>
                                            <th >Account Holder Name</th>
                                            <th >Bank Account</th>
                                            <th >Bank Routing</th>
                                            <th >Opening Bal Dt </th>
                                            <th > Opening Balance</th>
                                            <th > Current Balance</th>
                                        </tr>
                                        </thead>

                                        <tbody id="restorebankTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                           
                                            <th >No</th>
                                            <th >Name of Bank</th>
                                            <th >Address / Branch</th>
                                            <th >Account Holder Name</th>
                                            <th >Bank Account</th>
                                            <th >Bank Routing</th>
                                            <th >Opening Bal Dt </th>
                                            <th > Opening Balance</th>
                                            <th > Current Balance</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restorebankClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--================================= end restore ======================================== -->