<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="subCreditCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sub Credit Card</h4>
                    <button type="button" class="button-24 subCreditCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <a href="#" class="button-57 StoreSubCreditBtn" data-toggle="modal"data-target="#"><i class="fa fa-plus " aria-hidden="true"></i><span>Add</span></a>
                    <a href="#" class="button-57_alt restoreSubCreditCartBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></a>
                    <!-- <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#" class=" contract_categoryModal button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a> -->
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <!-- <input type="text" placeholder="search" /> -->
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
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th >No</th>
                                                <th >Name to Display</th>
                                                <th >Main Card</th>
                                                <th >Card Holder Name</th>
                                                <th >Card #</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="subCreditCardTable">

                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th >No</th>
                                                <th >Name to Display</th>
                                                <th >Main Card</th>
                                                <th >Card Holder Name</th>
                                                <th >Card #</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 subCreditCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================================= end list ========================================= -->

<!--================================= start create sub  creditCard ========================= -->
<div class="modal fade" id="AddSubCreditCardModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Credit Card</h5>
                <button type="button" class="close closeAddSubCreditCardModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenAddSub_creditCard" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name To Display<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type= "text" class="form-control addSubCreditCarddisplayName"  placeholder="Name To Display" name="displayName" required />
                        </div>
                        <label>Main Card<span style="color:#ff0000">*</span> <span class="glyphicon glyphicon-plus-sign createCreaditCardBtn "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <select  class="form-control addSubCreditCardmainCard  creditCardTypeAll" type="text"  name="mainCard" id="addSubCreditCardmainCard" >
                                <option>---select card type---</option>
                            </select>
                        </div>
                        <label>Card Holder Name<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control addSubCreditCardcardHolderName " type="text"  name="cardHolderName" required />
                        </div>
                        <label>Card No #</label>
                        <div>
                            <input  class="form-control addSubCreditCardcardNo " type="number"  name="cardNo" required />
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeAddSubCreditCardModal" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 AddSubCreditCardModalSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!--========================== end create sub creditcard =================================== -->


<!--============================ start update sub credit card ============================= -->
<div class="modal fade" id="UpdateSubCreditCardModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Update Credit Card</h5>
                <button type="button" class="close closeUpdateSubCreditCardModal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="_token" id="_tokenUpdateSub_creditCard" value="{{ csrf_token() }}" />
                    <div class="form-group col-md-12">
                        <label>Name To Display<span style="color:#ff0000">*</span></label>
                        <div>
                            <input type="hidden" class="comIdSubCreditcardUpdate">
                            <input type="hidden" class="SubCreditCardIdUpdate">
                            <input type= "text" class="form-control updateSubCreditCarddisplayName"  placeholder="Name To Display" name="displayName" required />
                        </div>
                        <label>Main Card<span style="color:#ff0000">*</span> <span class="glyphicon glyphicon-plus-sign createCreaditCardBtn "  data-toggle="modal"  style="cursor:pointer;"></span></label>
                        <div>
                            <select  class="form-control updateSubCreditCardmainCard  creditCardTypeAll" type="text"  name="mainCard" id="updateSubCreditCardmainCard">
                                <option>---select card type---</option>
                            </select>
                        </div>
                        <label>Card Holder Name<span style="color:#ff0000">*</span></label>
                        <div>
                            <input  class="form-control updateSubCreditCardcardHolderName " type="text"  name="cardHolderName" required />
                        </div>
                        <label>Card No #</label>
                        <div>
                            <input  class="form-control updateSubCreditCardcardNo " type="number"  name="cardNo" required />
                        </div>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-29 closeUpdateSubCreditCardModal" data-dismiss="modal">Close</button>
                <button type="button" class="button-29 UpdateSubCreditCardModalSavebutton " >Save </button>
            </div>
        </div>
    </div>
</div>
<!--============================= end update  sub credit card =========================== -->

<!--================================== start restore ======================================= -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="restoreSubcreditCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Sub Credit Card</h4>
                    <button type="button" class="button-24 restoreSubcreditCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                <input type="hidden" name="checked_id" id="checked_SubcreditCard_ids" value="">
                    <input type="hidden" name="company_id" id="checked_SubcreditCard_company_ids" value="">
                    <button id="restore_SubcreditCard_data"  class="button-57_alt restore_SubcreditCard_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore</span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th ><input type="checkbox" name="all_ids[]" class="SubcreditCard_all_ids"></th>
                                                <th >Name to Display</th>
                                                <th >Main Card</th>
                                                <th >Card Holder Name</th>
                                                <th >Card #</th>
                                            </tr>
                                        </thead>

                                        <tbody id="RestoresubCreditCardTable">

                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th >No</th>
                                                <th >Name to Display</th>
                                                <th >Main Card</th>
                                                <th >Card Holder Name</th>
                                                <th >Card #</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restoreSubcreditCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== end restore ============================================= -->
