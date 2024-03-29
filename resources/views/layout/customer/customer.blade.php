<!-- Latest compiled and minified bootstrap-select CSS --> 
<!------------------------------------------------------------------- customer modal ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="customerModal" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer </h5>
                    <button type="button" class="button-24 close_customerModal" data-dismiss="modal">×</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    
                    <button href="#" data-toggle="modal"  class="button-57_alt button-58_alt addCustomerButton" >Add Customer</button>
                    <button class="button-57_alt button-58_alt restoreCustomerData" >Restore Customer</button>
                </div>
                
                <div class="modal-body" style="overflow-y: auto !important;">

                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100">
                        <thead class="thead_th">
                            <tr class="tr">
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Location</th>
                                <th>Zip</th>
                                <th>Primary Contacte</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="customerTable">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-57_alt button-58_alt exportCustomer" data-dismiss="modal">export</button>
                    <button type="button" class="button-57_alt button-58_alt close_customerModal" data-dismiss="modal">Close</button>
                    <nav aria-label="..." data-name="cus_pagination" class="float-right">
                        <div class="pagination" id="cus_pagination">

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------ over customer modal ------------------------------------------------------------------>



 <!--=======================  add customer modal ===============---->
 <div class="container">
    <div class="modal fade" data-backdrop="static" id="addCustomerModal" role="dialog">
        <div class="modal-dialog custom_modal_small modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Add Customer</h>
                    <!-- <button type="button" class="button-24 closeaddCustomerModal" data-dismiss="modal">×</button> -->
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <li><a class="button-57_alt button-58_alt add_customer_btn" data-toggle="tab" href="#addCustomerTab" >Add Customer</a></li>
                            <li  ><a data-toggle="tab" href="#addAdvanceCustomerTab" class="button-57_alt button-58_alt advanceTabCustomer" style="margin-left: 5px;">Add Advance</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="addCustomerTab" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab"  data-name="fillextdata">
                                <form>
                                    <input type="hidden" name="_token" id="_tokenCustomer" value="{{ csrf_token() }}" />
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerName">Customer Name  <span style="color:#ff0000">*</span></label>
                                            <input type="text" class="form-control" id="customerName1" placeholder=" Enter Customer Name" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerAddress">Address <span style="color:#ff0000">*</span> </label>
                                            <input type="text" class="form-control" id="customerAddress"placeholder="Enter Address">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerLocation">Location <span style="color:#ff0000">*</span>  </label>
                                            <input type="text" class="form-control location_view" data-location="customerLocation"  id="customerLocation" placeholder="Enter Location">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerZip">Zip  <span style="color:#ff0000">*</span></label>
                                            <input type="number" class="form-control" id="customerZip"placeholder="Enter Zip">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="customerBillingAddressChkbox">Billing Address : </label>
                                            <input type="checkbox" id="customerBillingAddressChkbox" value="off" name=""> Same as Mailing Address
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingAddress">Billing Address</label>
                                            <input type="text" class="form-control" id="customerBillingAddress" placeholder=" Enter Billing Address" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingLocation">Location </label>
                                            <input type="text" class="form-control location_view" data-location="customerBillingLocation" id="customerBillingLocation"placeholder="Enter Location">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingZip">Zip </label>
                                            <input type="number" class="form-control" id="customerBillingZip"placeholder="Enter Zip">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerPrimaryContact">Primary Contact </span></label>
                                            <input type="text" class="form-control" id="customerPrimaryContact" placeholder=" Enter Primary Contact" >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerTelephone">Telephone  </label>
                                            <input type="text"  class="form-control usa-phone" id="customerTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerExt">Ext </label>
                                            <input type="text" class="form-control" id="customerExt"placeholder="Enter Ext">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerEmail">Email</label>
                                            <input type="email" class="form-control email" id="customerEmail" placeholder=" Enter Email" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerFax">Fax  </label>
                                            <input type="text" class="form-control" id="customerFax" placeholder="(999) 999-9999" data-mask="(999) 999-9999" >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingContact">Billing Contact </span></label>
                                            <input type="text" class="form-control" id="customerBillingContact" placeholder="Enter Billing Contact" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingEmail">Billing Email  </label>
                                            <input type="email" class="form-control email" id="customerBillingEmail"placeholder="Enter Billing Email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingTelephone">Billing Telephone</label>
                                            <input type="text" class="form-control" id="customerBillingTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingExt">Ext</label>
                                            <input type="text" class="form-control" id="customerBillingExt"placeholder="Enter Ext">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="customerUrs">URS</span></label>
                                            <input type="text" class="form-control" id="customerUrs" placeholder=" Enter" >
                                        </div>
                                        <div class="form-group col-md-4 MC">
                                            <label for="customerMc">M.C.</label>
                                            <input type="text" class="form-control" id="customerMc"placeholder="Enter">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="customerBlacklisted">Blacklisted :</span></label>
                                            <input type="checkbox" id="customerBlacklisted" name="" value="off"> This Customer is Blacklisted
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="customerIsBroker">Is Broker :</span></label>
                                            <input type="checkbox" id="customerIsBroker" name="" value="off"> This is a Broker
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="customerDuplicate">Duplicate :</span></label>
                                            <input type="checkbox" id="customerDuplicateShipper" name="" value="off"> As a Shipper
                                            <input type="checkbox" id="customerDuplicateConsignee" name="" value="off"> As a Consignee
                                        </div>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <a data-toggle="tab" href="#addAdvanceCustomerTab" class="button-57_alt button-58_alt advanceTabCustomer" style="align:right;" >Next</a>
                                    </div>
                                </form>
                            </div>
                            <div id="addAdvanceCustomerTab" class="tab-pane fade">
                                <br>
                                <form>
                                    <div class="form-row">
                                        <!-- <div class="form-group col-md-3">
                                            <label for="customerCurrencySetting">Currency Setting</label>
                                            <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusCurrency" style='color:blue !important'></i>
                                            <div class="dropdown show">
                                                    <input class="form-control customerCurrencySet" list="customerCurrencySet" name="currency" id="currency_customer">
                                                    <datalist id="customerCurrencySet" class="customerCurrencySet"><option>Select Here</option></datalist>    
                                            </div>
                                        </div> -->
                                        <div class="form-group col-md-3">
                                            <label for="customerPaymentTerms">Payment Terms <span style="color: red">*</span></label>
                                            <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusPaymentTerms" data-name="plusPaymentTerms" style='color:blue !important'></i>
                                            <div class="dropdown show">
                                                
                                                    <input class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="PaymentTerms" id="CustomerPayment_Terms">
                                                    <datalist id="customerPaymentTerm" class="customerPaymentTermSet">
                                                        <option>Select Here</option>
                                                    </datalist>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerCreditLimit">Credit Limit $ </label>
                                            <input type="number" class="form-control" id="customerCreditLimit"placeholder="Enter Zip">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerSalesRepresentative">Sales Representative </span></label>
                                        <select class="form-control customerRepresentativeSalseTerm" id="customerSalesRepresentative"  >                                              <option>Select Here</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerBFactoringCompany">Factoring Company</label>
                                            <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusFactoringCompany" data-name="plusFactoringCompany" style='color:blue !important'></i>
                                            <div class="dropdown show">
                                                <select class="form-control customerBFactoringCompanySet" id="customerBFactoringCompanySet"  >                                              <option>Select Here</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerFederalID">Federal ID</label>
                                            <input type="text" class="form-control" id="customerFederalID" placeholder="Enter Federal ID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerWorkerComp">Worker's Comp # </label>
                                            <input type="text" class="form-control" id="customerWorkerComp" placeholder="Enter Worker's Comp">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerWebsiteURL">Website URL </span></label>
                                            <input type="text" class="form-control url" id="customerWebsiteURL" placeholder=" Enter Website URL" >
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerNumbersonInvoice">Numbers on Invoice</label><br>
                                            <input type="checkbox" id="customerNumbersonInvoice" name="" value="off"> Show tel. and fax number on Invoice
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerCustomerRate">Customer Rate </label><br>
                                            <input type="checkbox" id="customerCustomerRate" name="" value="off"> Show detailed Rate on Invoice
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="customerInternalNotes">Internal Notes</label>
                                            <textarea type="text" class="form-control" id="customerInternalNotes"placeholder="Enter Internal Notes"></textarea>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer w-100" style="align:right;">
                    <button type="submit" class="button-57_alt button-58_alt customerDataSubmit">Save</button>
                    <button type="button" class="button-57_alt button-58_alt closeaddCustomerModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!---================== over add customer modal ==================--->

<!-----=================- Payment Terms modal =================------>

<div class="container" >
  <!-- The Modal -->
  <div class="modal fade" id="PaymentTermsModal" data-backdrop="static" style="z-index:10000000000;"> >
    <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title">Create Payment Terms</h5>
          <button type="button" class="button-24 PaymentTermsModalCloseButton">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <from>
                <input type="hidden" name="_token" id="_tokenCustomerPaymentTerms" value="{{ csrf_token() }}" />
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="PaymentTermsName">Payment Terms  <span style="color:#ff0000">*</span></label>
                        <input type="text" class="form-control" id="PaymentTermsName" placeholder=" Enter Payment Terms" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="NetDays">Net Days <span style="color:#ff0000">*</span></label>
                        <!-- <input type="text" class="form-control" id="NetDays" placeholder=" Enter Net Days" > -->
                         <input class="form-control" list="NetDays" name="NetDay" id="NetDay" >
                        <datalist id="NetDays" >
                            @for ($i = 0; $i <= 180; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </datalist>    
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" >
            <button type="submit" class="button-57_alt button-58_alt PaymentTermsDataSubmit">Save</button>
            <button type="button" class="button-57_alt button-58_alt PaymentTermsModalCloseButton" data-dismiss="modal" id="closePaymentTermsModal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!--------============ over Payment Terms modal ============-------->

<!---======================= Currency modal =======================--->
<div class="container" >
  <!-- The Modal -->
  <div class="modal fade" id="plusCurrencyModal" data-backdrop="static" style="z-index:10000000000;"> >
    <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title">Create Currency</h5>
          <button type="button" class="button-24 plusCurrencyModalCloseButton">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <from>
                <input type="hidden" name="_token" id="_tokenCustomerCurrency" value="{{ csrf_token() }}" />
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="CurrencyrName">Currency Name  <span style="color:#ff0000">*</span></label>
                        <input type="text" class="form-control" id="CurrencyrName" placeholder=" Enter Currency Name" >
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" >
            <button type="submit" class="button-57_alt button-58_alt CurrencyrDataSubmit">Save</button>
            <button type="button" class="button-57_alt button-58_alt plusCurrencyModalCloseButton" data-dismiss="modal" id="closeplusCurrencyModal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!----==================== over Currency modal ====================---->

<!--==================  add Factoring Company  modal ==================-->
<div class="container resizeModal">
    <div class="modal fade"  id="factoringCompanyModal" style="z-index:1000000000;">
        <div class="modal-dialog custom_modal_small modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Factoring Company</h5>
                    <button type="button" class="button-24 factoringCompanyModalCloseButton">&times;</button>
                </div>

                <div class="modal-body" style="overflow-y: auto !important;">
                    <from>
                        <input type="hidden" name="_token" id="_tokenCustomerFactoringCompany" value="{{ csrf_token() }}" />
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyName">Factoring Company Name <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="factoringCompanyName" placeholder=" Enter Factoring Company Name" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyAddress">Address <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="factoringCompanyAddress" placeholder=" Enter Address " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyLocation ">Location <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control location_view" data-location="factoringCompanyLocation" id="factoringCompanyLocation" placeholder=" Enter Location "  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyZip">Postal / Zip   <span style="color:#ff0000">*</span></label>
                                <input type="number" class="form-control" id="factoringCompanyZip" placeholder=" Enter Zip " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContact">Primary Contact</label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContact" placeholder=" Enter Primary Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContactTelephone">Telephone</span></label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContactTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyFax">Fax</label>
                                <input type="text" class="form-control" id="factoringCompanyFax" placeholder="(999) 999-9999" data-mask="(999) 999-9999" >
                            </div>
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContact">Secondary  Contact</label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContact" placeholder=" Enter Secondary  Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContactTelephone">Telephone </label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContactTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringTollFree">Toll Free   </label>
                                <input type="text" class="form-control" id="factoringTollFree" placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyContactEmail">Contact Email</label>
                                <input type="text" class="form-control" id="factoringCompanyContactEmail" placeholder=" Enter Contact Email" >
                            </div>
                            <!-- <div class="form-group col-md-3">
                                <label for="customerCurrencySetting">Currency Setting <span class="glyphicon glyphicon-plus-sign" id="plusCurrency2" ></span> </label>
                                <div class="dropdown show">
                                    <input class="form-control customerCurrencySet " list="customerCurrencySet" name="currency" id="currency1">
                                    <datalist id="customerCurrencySet" class="customerCurrencySet"></datalist>    
                                </div>
                            </div> -->
                            <div class="form-group col-md-3">
                                    <label for="customerPaymentTerms">Payment Terms <span style="color: red">*</span></label>
                                            <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusPaymentTerms" data-name="plusPaymentTerms" style='color:blue !important'></i>
                                    <div class="dropdown show">
                                      
                                        <input class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="PaymentTerms" id="PaymentTerms1">
                                    <datalist id="customerPaymentTermSet" class="customerPaymentTermSet"></datalist>    
                                    </div>
                                </div>
                            <div class="form-group col-md-2">
                                <label for="factoringCompanyTaxID">Tax ID  <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="factoringCompanyTaxID1" placeholder=" Enter Tax ID " >
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <label for="factoringCompanyInternalNotes">Internal Notes</label>
                                <textarea  rows="2" cols="50" class="form-control" id="factoringCompanyInternalNotes"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            
                <!-- Modal footer -->
                <div class="modal-footer" >
                    <button type="submit" class="button-57_alt button-58_alt factoringCompanyDataSubmit">Save</button>
                    <button type="button" class="button-57_alt button-58_alt factoringCompanyModalCloseButton">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
</div>
 
<!------------------------------------------------------------------ over add Factoring Company  modal ------------------------------------------------------------------>
<!-- ========================= start edit customer model =============================== -->


<div class="container">
    <div class="modal fade" data-backdrop="static" id="updateCustomerModal" role="dialog">
        <div class="modal-dialog custom_modal_medium" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Customer</h4>
                    <button type="button" class="closeUpdateCustomerModel" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                    <button type="button"style="vertical-align:middle" class=" next_update_customer button-57_alt button-58_alt col-lg-2" >Update Customer</button> &nbsp; &nbsp; 
                    <button type="button"style="vertical-align:middle" class=" Previous_update_customer button-57_alt button-58_alt col-lg-2" >Update Advance</button>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                           
                                            <div class="update_customer_first_tap">
                                                <form>
                                                @csrf
                                                    <input type="hidden" name="_token" id="_tokenUpdateCustomer" value="{{ csrf_token() }}" />
                                                    <input type="hidden" name="cu_id" id="updateCustomer_id" />
                                                    <input type="hidden" name="master_id" id="update_masterId" />
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="customerName">Customer Name  <span style="color:#ff0000">*</span></label>
                                                            <input type="text" class="form-control" id="updateCustomerName" placeholder=" Enter Customer Name"  name="custName">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerAddress">Address <span style="color:#ff0000">*</span> </label>
                                                            <input type="text" class="form-control" id="updateCustomerAddress"placeholder="Enter Address" name="custAddress">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerLocation">Location <span style="color:#ff0000">*</span>  </label>
                                                            <input type="text" class="form-control location_view" data-location="updateCustomerLocation"id="updateCustomerLocation"placeholder="Enter Location" name="custLocation">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerZip">Zip  <span style="color:#ff0000">*</span></label>
                                                            <input type="number" class="form-control" id="updateCustomerZip"placeholder="Enter Zip" name="custZip">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="customerBillingAddressChkbox">Billing Address : </label>
                                                            <input type="checkbox" id="updateCustomerBillingAddressChkbox" value="off" name="billingAddressCheckbox"> Same as Mailing Address
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingAddress">Billing Address</label>
                                                            <input type="text" class="form-control" id="updateCustomerBillingAddress" placeholder=" Enter Billing Address" name="billingAddress">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingLocation">Location  </label>
                                                            <input type="text" class="form-control location_view" data-location="updateCustomerBillingLocation" id="updateCustomerBillingLocation"placeholder="Enter Location" name="billingLocation">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingZip">Zip </label>
                                                            <input type="number" class="form-control" id="updateCustomerBillingZip"placeholder="Enter Zip" name="billingZip">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerPrimaryContact">Primary Contact </span></label>
                                                            <input type="text" class="form-control" id="updateCustomerPrimaryContact" placeholder=" Enter Primary Contact"  name="primaryContact">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="customerTelephone">Telephone  </label>
                                                            <input type="text" class="form-control" id="updateCustomerTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999"name="custTelephone">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerExt">Ext </label>
                                                            <input type="text" class="form-control" id="updateCustomerExt"placeholder="Enter Ext" name="custExt">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerEmail">Email</label>
                                                            <input type="text" class="form-control email" id="updateCustomerEmail" placeholder=" Enter Email"  name="custEmail">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerFax">Fax  </label>
                                                            <input type="text" class="form-control" id="updateCustomerFax"placeholder="Enter Fax" name="custFax">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingContact">Billing Contact </span></label>
                                                            <input type="text" class="form-control" id="updateCustomerBillingContact" placeholder="Enter Billing Contact" name="billingContact">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingEmail">Billing Email  </label>
                                                            <input type="text" class="form-control email" id="updateCustomerBillingEmail"placeholder="Enter Billing Email" name="billingEmail">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingTelephone">Billing Telephone</label>
                                                            <input type="text" class="form-control" id="updateCustomerBillingTelephone" name="billingTelephone" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="customerBillingExt">Ext</label>
                                                            <input type="text" class="form-control" id="updateCustomerBillingExt"placeholder="Enter Ext" name="billingExt">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label for="customerUrs">URS</span></label>
                                                            <input type="text" class="form-control" id="updateCustomerUrs" placeholder=" Enter" name="URS" >
                                                        </div>
                                                        <div class="form-group col-md-4 updateCustomerMc">
                                                            <label for="customerMc">M.C.</label>
                                                            <input type="text" class="form-control" id="updateCustomerMc"placeholder="Enter" name="MC">
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="customerBlacklisted">Blacklisted :</span></label>
                                                            <input type="checkbox" id="updateCustomerBlacklisted" name="blacklisted" value="off"> This Customer is Blacklisted
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="customerIsBroker">Is Broker :</span></label>
                                                            <input type="checkbox" id="updateCustomerIsBroker" value="off" name="isBroker"> This is a Broker
                                                        </div>
                                                    </div>

                                                    <!-- <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="customerDuplicate">Duplicate :</span></label>
                                                            <input type="checkbox" id="updateCustomerDuplicateShipper" name="" value="off"> As a Shipper
                                                            <input type="checkbox" id="updateCstomerDuplicateConsignee" name="" value="off"> As a Consignee
                                                        </div>
                                                    </div> -->
                                                </form>
                                                <button type="button"style="vertical-align:middle" class=" Previous_update_customer button-57_alt button-58_alt" >Next</button>
                                            </div>
                                            <div class="update_advance_first_tap">
                                                <div class="form-row">
                                                    <!-- <div class="form-group col-md-3">
                                                  
                                                        <label for="customerCurrencySetting">Currency Setting
                                                        </label>
                                                        <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusCurrency" style='color:blue !important'></i>
                                                        <div class="dropdown show">
                                                            <input class="form-control customerCurrencySet" list="customerCurrencySet" name="currency" id="updatecurrency">
                                                            <datalist id="customerCurrencySet" class="customerCurrencySet"><option>Select Here</option></datalist> 
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group col-md-3">
                                                        <label for="customerPaymentTerms">Payment Terms
                                                        
                                                        <span style="color: red">*</span></label>
                                                        <i title="Add Currency" class="mdi mdi-plus-circle plus" id="plusPaymentTerms" data-name="plusPaymentTerms" style='color:blue !important'></i>
                                                        <div class="dropdown show">
                                                            <!-- <select class="form-control customerPaymentTermSet Update_customer_terms" name="PaymentTerms"> 
                                                                <option>Select Here</option>
                                                            </select> -->
                                                            <input class="form-control  customerPaymentTermSet Update_customer_terms" list="customerPaymentTermSet" name="PaymentTerms" >
                                                            <datalist id="customerPaymentTermSet" class="customerPaymentTermSet">
                                                                <option>Select Here</option>
                                                            </datalist>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerCreditLimit">Credit Limit $ </label>
                                                        <input type="number" class="form-control" id="updateCustomerCreditLimit"placeholder="Enter Zip" name="creditLimit">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerSalesRepresentative">Sales Representative </span></label>
                                                        <!-- <input type="text" class="form-control" id="updateCustomerSalesRepresentative" placeholder=" Enter Sales Representative" name="salesRep" > -->

                                                        <select class="form-control customerRepresentativeSalseTerm" id="updateCustomerSalesRepresentative"  >                                                <option>Select Here</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBFactoringCompany">Factoring Company
                                                        <!-- <span class="glyphicon glyphicon-plus-sign addFactoringCompanyCutomer " id="addFactoringCompanyCutomer" data-toggle="modal"  style="cursor:pointer;"></span> -->
                                                        </label>
                                                        <div class="dropdown show">
                                                            <select class="form-control customerBFactoringCompanySet update_factroring_name" name="customerBFactoringCompany" id="customer_BFactoringCompany">
                                                                <option>Select Here</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerFederalID">Federal ID</label>
                                                        <input type="text" class="form-control" id="updateCustomerFederalID" placeholder="Enter Federal ID" name="federalID">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerWorkerComp">Worker's Comp # </label>
                                                        <input type="text" class="form-control" id="updateCustomerWorkerComp" placeholder="Enter Worker's Comp" name="workerComp">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerWebsiteURL">Website URL </span></label>
                                                        <input type="text" class="form-control" id="updateCustomerWebsiteURL" placeholder=" Enter Website URL" name="websiteURL">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="customerNumbersonInvoice">Numbers on Invoice</label><br>
                                                        <input type="checkbox" id="updateCustomerNumbersonInvoice" name="numberOninvoice" value="off"> Show tel. and fax number on Invoice
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerCustomerRate">Customer Rate </label><br>
                                                        <input type="checkbox" id="updateCustomerCustomerRate" name="customerRate" value="off"> Show detailed Rate on Invoice
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="customerInternalNotes">Internal Notes</label>
                                                        <textarea type="text" class="form-control" id="updateCustomerInternalNotes"placeholder="Enter Internal Notes" name="internalNotes"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"style="vertical-align:middle" class=" next_update_customer button-57_alt button-58_alt" >Previous</button>
                                                    <button type="button" style="vertical-align:middle" class="button-57_alt button-58_alt" id="updateCustomerData" >update</button>
                                                    <button type="button"style="vertical-align:middle" class=" closeUpdateCustomerModel button-57_alt button-58_alt" >Close</button>
                                                </div>
                                            </div>
                                        </form>
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
<!-- ========================= end edit customer model =============================== -->


<!--========================== resote customer start model ========================== -->
<div class="modal fade" data-backdrop="static" id="restoreCustomerData" role="dialog">
        <div class="modal-dialog custom_modal_medium modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Restore Customer</h5>
                    <button type="button" class="button-24 closeRestoreCustomer" data-dismiss="modal">×</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <!-- <form class="" >
                        @csrf -->
                        <input type="hidden" name="checked_id" id="checked_customer_ids" value="">
                        <input type="hidden" name="company_id" id="checked_company_ids" value="">
                        <button id="restore_customer_data"  class="button-57_alt restore_customer_data" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore Customer</span></button>
                    <!-- </form>  -->
                    <!-- <button   class="button-57_alt " ><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore Customer</span></button> -->
                </div>                
                <div class="modal-body" style="overflow-y: auto !important;">
                    <table  class="table editable-table table-nowrap table-bordered table-edit wp-100">
                        <thead class="thead_th">
                            <tr class="th">
                                <th><input type="checkbox" name="all_ids[]" class="all_ids_cust"></th>
                                <th>Customer Name</th>
                                <th>Location</th>
                                <th>Zip</th>
                                <th>Primary Contacte</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody id="restoreCustomerTable">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-57_alt button-58_alt closeRestoreCustomer" data-dismiss="modal">Close</button>
                    <nav aria-label="..." data-name="Restorecus_pagination" class="float-right">
                        <div class="pagination" id="Restorecus_pagination">

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>