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
                    <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#contractCategoryModal" class="button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a>
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
                        <label>Account Holder Name<span style="color:#ff0000">*</span>  <span class="glyphicon glyphicon-plus-sign  add_Company_Name_modal_form_btn "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <input  class="form-control accountHolder" type="text"  name="accountHolder" required />
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

<!--================================ update bank details ============================= -->
<div class="modal fade" id="AddBankModalStoreData"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="form-group col-md-12">
                        <label>Name of Bank:<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updatebankName" placeholder="Name of Bank"  id="updatebankName " name="bankName" required >
                        </div>
                        <label>Address / Branch<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updatebankAddresss"  name="bankAddresss" required />
                        </div>
                        <label>Account Holder Name<span style="color:#ff0000">*</span>  <span class="glyphicon glyphicon-plus-sign  update_Company_Name_modal_form_btn "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <input  class="form-control accountHolder" type="text"  name="accountHolder" required />
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