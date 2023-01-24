<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="creditCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Credit Card</h4>
                    <button type="button" class="button-24 creditCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <a href="#" class="button-57 createCreaditCardBtn" data-toggle="modal"data-target="#"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                    <a href="#" class="button-57_alt restoreCreditCartBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></a>
                    <!-- <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#" class="button-57_alt contract_categoryModal" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a>
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" /> -->
                        <!-- <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div> -->
                    <!-- </div> -->

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable editable-file-datatable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th >No</th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="creditCardTable">

                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th >No</th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
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
                    <button type="button" class="button-29 creditCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- =========================  end list ================================================ -->

<!--================================= start create creditCard ========================= -->
<div class="modal fade" id="AddCreditCardModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Credit Card</h5>
                <button type="button" class="close closeAddCreditCardModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAdd_creditCard" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name of Bank<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addCreditCardName" placeholder="Name of Bank "  name="Name" required >
                        </div>
                        <label>Name To Display<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addCreditCarddisplayName"  placeholder="Name To Display" name="displayName" required />
                        </div>
                        <label>Card Type<span style="color:#ff0000">*</span></label>
                        <div>
                            <select  class="form-control addCreditCardcardType " type="text" name="cardType" >
                                <option>---select card type---</option>
                                <option value="master">master</option>
                                <option value="visa">visa</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <label>Card Holder Name<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addCreditCardcardHolderName " type="text"  name="cardHolderName" required />
                        </div>
                        <label>Card #</label>
                        <div>
                            <input  class="form-control addCreditCardcardNo " type="text"  name="cardNo" required />
                        </div>
                        <label>Opening Bal Dt<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addCreditCardopeningBalanceDt " type="date"  name="openingBalanceDt" required />
                        </div>
                        <label>Card Limit<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addCreditCardcardLimit " type="text"  name="cardLimit" required />
                        </div>
                        <label>Opening Balance<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addCreditCardopeningBalance " type="text"  name="openingBalance" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeAddCreditCardModal" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 AddCreditCardModalSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!--========================== end create creditcard =================================== -->

<!--================================= start update creditCard ========================= -->
<div class="modal fade" id="UpdateCreditCardModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Update Credit Card</h5>
                <button type="button" class="close closeUpdateCreditCardModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenUpdate_creditCard" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name of Bank<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control updateCreditCardName" placeholder="Name of Bank "  name="Name" required >
                        </div>
                        <label>Name To Display<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type="hidden" class="comIdCreditcardUpdate" name="companyID">
                            <input type="hidden" class="CreditCardIdUpdate" name="id">
                            <input type= "text" class="form-control updateCreditCarddisplayName"  placeholder="Name To Display" name="displayName" required />
                        </div>
                        <label>Card Type<span style="color:#ff0000">*</span></label>
                        <div>
                            <select  class="form-control updateCreditCardcardType " type="text" name="cardType" >
                                <option>---select card type---</option>
                                <option value="master">master</option>
                                <option value="visa">visa</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <label>Card Holder Name<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateCreditCardcardHolderName " type="text"  name="cardHolderName" required />
                        </div>
                        <label>Card #</label>
                        <div>
                            <input  class="form-control updateCreditCardcardNo " type="text"  name="cardNo" required />
                        </div>
                        <label>Opening Bal Dt<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateCreditCardopeningBalanceDt " type="date"  name="openingBalanceDt" required />
                        </div>
                        <label>Card Limit<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateCreditCardcardLimit " type="text"  name="cardLimit" required />
                        </div>
                        <label>Opening Balance<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateCreditCardopeningBalance " type="text"  name="openingBalance" required />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeUpdateCreditCardModal" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 UpdateCreditCardModalSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!--========================== end update creditcard =================================== -->

<!--================================= start restore creditCard ========================= -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restorecreditCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Credit Card</h4>
                    <button type="button" class="button-24 restorecreditCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_creditCard_ids" value="">
                    <input type="hidden" name="company_id" id="checked_creditCard_company_ids" value="">
                    <button id="restore_creditCard_data"  class="button-57_alt restore_creditCard_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore Credit Card</span></button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                <div class="table-responsive export-table">
                                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable ">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th ><input type="checkbox" name="all_ids[]" class="creditCard_all_ids"></th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
                                            </tr>
                                        </thead>

                                        <tbody id="restorecreditCardTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th >No</th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restorecreditCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--========================== end restore creditcard =================================== -->