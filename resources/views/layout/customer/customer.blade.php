<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?>  
  <!-- Latest compiled and minified bootstrap-select CSS --> 
<!------------------------------------------------------------------- customer modal ------------------------------------------------------------------->
<div class="container">

    <div class="modal fade" data-backdrop="static" id="customerModal" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer</h5>
                    <button type="button" class="button-24 closeListCustomer" data-dismiss="modal">×</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    

                    <button href="#addCustomerModal" data-toggle="modal" data-target="#addCustomerModal" class="button-57_alt addCustomerButton" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Customer</span></button>
                    <button class="button-57_alt restoreCustomerData" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore Customer</span></button>

                    <!-- <button href="#addCustomerModal" data-toggle="modal" data-target="#addCustomerModal" class="button-57_alt addCustomerButton" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Customer</span></button>
                    <button class="button-57_alt restoreCustomerData" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore Customer</span></button> -->
                    @if($insertUser== 1)
                        <button href="#addCustomerModal" data-toggle="modal" data-target="#addCustomerModal" class="button-57_alt addCustomerButton" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add Customer</span></button>
                    @endif 
                    
                    @if($deleteUser== 1)    
                     <button class="button-57_alt restoreCustomerData" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore Customer</span></button>
                    @endif
	
               

                </div>
                
                <div class="modal-body" style="overflow-y: auto !important;">

                    <table id="customer_table_pagination" class="table editable-table table-nowrap table-bordered table-edit wp-100">
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
                    <button type="button" class="button-29 closeListCustomer" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------ over customer modal ------------------------------------------------------------------>
 <!------------------------------------------------------------------  add customer modal ------------------------------------------------------------------>
 <div class="container">
    <div class="modal fade" data-backdrop="static" id="addCustomerModal" role="dialog">
        <div class="modal-dialog custom_modal_small modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Customer</h5>
                    <button type="button" class="button-24" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    
                    <div class="container">
                        <ul class="nav nav-tabs">
                        
                            <!-- <li class="active add1button" style="width:200px; color:white;"><a data-toggle="tab" href="#addCustomerTab" >Add Customer</a></li> -->
                            <li  ><a onClick="show_add_customer()" class="button-29 add_customer_btn" data-toggle="tab" href="#addCustomerTab" >Add Customer</a></li>
                            <li  ><a data-toggle="tab" href="#addAdvanceCustomerTab" class="button-29 advanceTabCustomer" style="margin-left: 5px;">Add Advance</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="addCustomerTab" class="tab-pane fade in active">
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
                                            <input type="text" class="form-control" id="customerLocation"placeholder="Enter Location">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerZip">Zip  <span style="color:#ff0000">*</span></label>
                                            <input type="text" class="form-control" id="customerZip"placeholder="Enter Zip">
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
                                            <label for="customerBillingLocation">Location  </label>
                                            <input type="text" class="form-control" id="customerBillingLocation"placeholder="Enter Location">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingZip">Zip </label>
                                            <input type="text" class="form-control" id="customerBillingZip"placeholder="Enter Zip">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerPrimaryContact">Primary Contact </span></label>
                                            <input type="text" class="form-control" id="customerPrimaryContact" placeholder=" Enter Primary Contact" >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerTelephone">Telephone  </label>
                                            <input type="text" class="form-control" id="customerTelephone"placeholder="Enter Telephone">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerExt">Ext </label>
                                            <input type="text" class="form-control" id="customerExt"placeholder="Enter Ext">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerEmail">Email</label>
                                            <input type="text" class="form-control" id="customerEmail" placeholder=" Enter Email" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerFax">Fax  </label>
                                            <input type="text" class="form-control" id="customerFax"placeholder="Enter Fax">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingContact">Billing Contact </span></label>
                                            <input type="text" class="form-control" id="customerBillingContact" placeholder="Enter Billing Contact" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingEmail">Billing Email  </label>
                                            <input type="text" class="form-control" id="customerBillingEmail"placeholder="Enter Billing Email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="customerBillingTelephone">Billing Telephone</label>
                                            <input type="text" class="form-control" id="customerBillingTelephone"placeholder="Enter Billing Telephone">
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
                                            <!-- <input type="checkbox" class="form-control " id="" value="Same as Mailing Address"> -->
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
                                        <a data-toggle="tab" href="#addAdvanceCustomerTab" class="button-29 advanceTabCustomer" style="align:right;" >Next</a>
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --> 
                                    </div>
                            </div>
                            <div id="addAdvanceCustomerTab" class="tab-pane fade">
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <!-- <button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button> -->
                                        <!-- <a class="btn btn-outline-info">Info</a> -->
                                        <label for="customerCurrencySetting">Currency Setting</label><span class="button-29" id="plusCurrency" style="margin-left: 5px;"><i class="fa fa-plus"></i></span>
                                        <div class="dropdown show">

                                            <!-- <select name="currency" id="currency" class="customerCurrencySet11 btn-dropdown">
                                            <option value="">Select Currency</option>
                                            </select> -->
                                        
                                                <input class="form-control customerCurrencySet" list="customerCurrencySet" name="currency" id="currency_setting">
                                                <datalist id="customerCurrencySet" class="customerCurrencySet"><option>Select Here</option></datalist>    
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="customerPaymentTerms">Payment Terms</label><span class="button-29" id="plusPaymentTerms" style="margin-left: 5px;"><i class="fa fa-plus"></i></span> 
                                        <div class="dropdown show">
                                            <!-- <select name="PaymentTerms" id="PaymentTerms" class="customerPaymentTermSet btn-dropdown">
                                            <option value="">Select Payment Terms</option>
                                            </select> -->
                                                <input class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="PaymentTerms" id="update_PaymentTerms">
                                                <datalist id="customerPaymentTermSet" class="customerPaymentTermSet">
                                                    <option>Select Here</option>
                                                </datalist>

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="customerCreditLimit">Credit Limit $ </label>
                                        <input type="text" class="form-control" id="customerCreditLimit"placeholder="Enter Zip">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="customerSalesRepresentative">Sales Representative </span></label>
                                        <input type="text" class="form-control" id="customerSalesRepresentative" placeholder=" Enter Sales Representative" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="customerBFactoringCompany">Factoring Company</label><span class="button-29" id="plusFactoringCompany" style="margin-left: 5px;"><i class="fa fa-plus"></i></span>
                                        <div class="dropdown show">
                                            <input class="form-control customerBFactoringCompanySet" list="customerBFactoringCompanySet" name="customerBFactoringCompany" id="updatecustomerBFactoringCompany">
                                            <datalist id="customerBFactoringCompanySet" class="customerBFactoringCompanySet">
                                                <option>Select Here</option>
                                            </datalist>
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
                                        <input type="text" class="form-control" id="customerWebsiteURL" placeholder=" Enter Website URL" >
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
                                        <input type="text" class="form-control" id="customerInternalNotes"placeholder="Enter Internal Notes">
                                    </div>

                                    
                                    <div class="modal-footer w-100" style="align:right;">
                                        <button type="submit" class="button-29 customerDataSubmit">Save</button>
                                        <button type="button" class="button-29" data-dismiss="modal">Close</button>
                                    </div>
                                    

                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                </div>
            
                <!-- <div class="modal-footer">
                    <button class="btnclose" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
</div>
 
<!------------------------------------------------------------------ over add customer modal ------------------------------------------------------------------>
<!------------------------------------------------------------------- Payment Terms modal ------------------------------------------------------------------->

<div class="container" >
  <!-- The Modal -->
  <div class="modal fade" id="PaymentTermsModal" data-backdrop="static" style="z-index:10000000000;"> >
    <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable">
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
            <button type="submit" class="button-29 PaymentTermsDataSubmit">Save</button>
            <button type="button" class="button-29 PaymentTermsModalCloseButton" data-dismiss="modal" id="closePaymentTermsModal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!------------------------------------------------------------------ over Payment Terms modal ------------------------------------------------------------------>
<!------------------------------------------------------------------- Currency modal ------------------------------------------------------------------->
<div class="container">

    <div class="modal fade" data-backdrop="static" id="plusCurrencyModal" style="z-index:10000000000;">
        <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Currency</h5>
                    <button type="button" class="button-24 plusCurrencyModalCloseButton" data-dismiss="modal">×</button>
                </div>
                
                <div class="modal-body" style="overflow-y: auto !important;">

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
                <div class="modal-footer">
                    <button type="submit" class="button-29 CurrencyrDataSubmit">Save</button>
                    <button type="button" class="button-29 plusCurrencyModalCloseButton" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------ over Currency modal ------------------------------------------------------------------>

<!------------------------------------------------------------------  add Factoring Company  modal ------------------------------------------------------------------>

<div class="container resizeModal">

    <div class="modal fade"  id="factoringCompanyModal" style="z-index:1000000000;">
        <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Factoring Company</h5>
                    <button type="button" class="button-24 factoringCompanyModalCloseButton">&times;</button>
                </div>

                <div class="modal-body">
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
                                <input type="text" class="form-control" id="factoringCompanyLocation" placeholder=" Enter Location " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyZip">Postal / Zip   <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="factoringCompanyZip" placeholder=" Enter Zip " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContact">Primary Contact</label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContact" placeholder=" Enter Primary Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContactTelephone">Telephone</span></label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyPrimaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="factoringCompanyPrimaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyFax">Fax</label>
                                <input type="text" class="form-control" id="factoringCompanyFax" placeholder=" Enter Fax " >
                            </div>
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContact">Secondary  Contact</label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContact" placeholder=" Enter Secondary  Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContactTelephone">Telephone </label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringCompanySecondaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="factoringCompanySecondaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="factoringTollFree">Toll Free   </label>
                                <input type="text" class="form-control" id="factoringTollFree" placeholder=" Enter Toll Free " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="factoringCompanyContactEmail">Contact Email</label>
                                <input type="text" class="form-control" id="factoringCompanyContactEmail" placeholder=" Enter Contact Email" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="customerCurrencySetting">Currency Setting <span class="glyphicon glyphicon-plus-sign" id="plusCurrency2" ></span> </label>
                                <div class="dropdown show">
                                    <input class="form-control customerCurrencySet " list="customerCurrencySet" name="currency" id="currency1">
                                    <datalist id="customerCurrencySet" class="customerCurrencySet"></datalist>    
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                    <label for="customerPaymentTerms">Payment Terms <span class="glyphicon glyphicon-plus-sign" id="plusPaymentTerms" ></span> </label>
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
                    <button type="submit" class="button-29 factoringCompanyDataSubmit">Save</button>
                    <button type="button" class="button-29 factoringCompanyModalCloseButton">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
</div>
 
<!------------------------------------------------------------------ over add Factoring Company  modal ------------------------------------------------------------------>













<!--    ==== start edit customer model     === -->


<div class="container">
    <div class="modal fade" data-backdrop="static" id="updateCustomerModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Customer</h4>
                    <button type="button" class="closeUpdateCustomerModel" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                    <button type="button"style="vertical-align:middle" class=" next_update_customer button-29 col-lg-2" >Update Customer</button> &nbsp; &nbsp; 
                    <button type="button"style="vertical-align:middle" class=" Previous_update_customer button-29 col-lg-2" >Update Advance</button>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="editTrailerForm" >
                                            @csrf
                                            <div class="update_customer_first_tap">
                                                <input type="hidden" name="_token" id="_tokenUpdateCustomer" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="cu_id" id="updateCustomer_id" />
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
                                                        <input type="text" class="form-control" id="updateCustomerLocation"placeholder="Enter Location" name="custLocation">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerZip">Zip  <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="updateCustomerZip"placeholder="Enter Zip" name="custZip">
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
                                                        <input type="text" class="form-control" id="updateCustomerBillingLocation"placeholder="Enter Location" name="billingLocation">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBillingZip">Zip </label>
                                                        <input type="text" class="form-control" id="updateCustomerBillingZip"placeholder="Enter Zip" name="billingZip">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerPrimaryContact">Primary Contact </span></label>
                                                        <input type="text" class="form-control" id="updateCustomerPrimaryContact" placeholder=" Enter Primary Contact"  name="primaryContact">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="customerTelephone">Telephone  </label>
                                                        <input type="text" class="form-control" id="updateCustomerTelephone"placeholder="Enter Telephone" name="custTelephone">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerExt">Ext </label>
                                                        <input type="text" class="form-control" id="updateCustomerExt"placeholder="Enter Ext" name="custExt">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerEmail">Email</label>
                                                        <input type="text" class="form-control" id="updateCustomerEmail" placeholder=" Enter Email"  name="custEmail">
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
                                                        <input type="text" class="form-control" id="updateCustomerBillingEmail"placeholder="Enter Billing Email" name="billingEmail">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBillingTelephone">Billing Telephone</label>
                                                        <input type="text" class="form-control" id="updateCustomerBillingTelephone"placeholder="Enter Billing Telephone" name="billingTelephone">
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

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="customerDuplicate">Duplicate :</span></label>
                                                        <input type="checkbox" id="updateCustomerDuplicateShipper" name="" value="off"> As a Shipper
                                                        <input type="checkbox" id="updateCstomerDuplicateConsignee" name="" value="off"> As a Consignee
                                                    </div>
                                                </div>
                                                <button type="button"style="vertical-align:middle" class=" Previous_update_customer button-29" >Next</button>
                                            </div>
                                            <div class="update_advance_first_tap">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                  
                                                        <label for="customerCurrencySetting">Currency Setting
                                                        </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control customerCurrencySet" list="customerCurrencySet" name="currency" id="updatecurrency">
                                                            <datalist id="customerCurrencySet" class="customerCurrencySet"><option>Select Here</option></datalist> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerPaymentTerms">Payment Terms
                                                        <!-- <span class="glyphicon glyphicon-plus-sign addUpPaymentTermsCustomer " id="addPaymentTermsCustomer" data-toggle="modal"  style="cursor:pointer;"></span> -->
                                                        </label>
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
                                                        <input type="text" class="form-control" id="updateCustomerCreditLimit"placeholder="Enter Zip" name="creditLimit">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerSalesRepresentative">Sales Representative </span></label>
                                                        <input type="text" class="form-control" id="updateCustomerSalesRepresentative" placeholder=" Enter Sales Representative" name="salesRep" >
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBFactoringCompany">Factoring Company
                                                        <!-- <span class="glyphicon glyphicon-plus-sign addFactoringCompanyCutomer " id="addFactoringCompanyCutomer" data-toggle="modal"  style="cursor:pointer;"></span> -->
                                                        </label>
                                                        <div class="dropdown show">
                                                            <!-- <select class="form-control customerBFactoringCompanySet update_factroring_name" name="customerBFactoringCompany" id="customerBFactoringCompany">
                                                                <option>Select Here</option>
                                                            </select> -->
                                                            <input class="form-control customerBFactoringCompanySet update_factroring_name" list="customerBFactoringCompanySet" name="customerBFactoringCompany" id="customerBFactoringCompany">
                                                            <datalist class="customerBFactoringCompanySet">
                                                                <option>Select Here</option>
                                                            </datalist>
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
                                                        <input type="text" class="form-control" id="updateCustomerInternalNotes"placeholder="Enter Internal Notes" name="internalNotes">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"style="vertical-align:middle" class=" next_update_customer button-29" >Previous</button>
                                                    <button type="button" style="vertical-align:middle" class="button-29" id="updateCustomerData" >update</button>
                                                    <button type="button"style="vertical-align:middle" class=" closeUpdateCustomerModel button-29" >Close</button>
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




<!--    == end update customer   ===== -->

<!--    ======create currency model   ====== -->
<div class="modal fade" id="addCreateCurrencyCustomer"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Create Currency</h5>
        <button type="button" class="close closeaddCreateCurrencyCustomer" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addTrailerTypeForm">
            @csrf
            <input type="hidden" name="_token" id="_tokenTrailerType" value="{{ csrf_token() }}" />
            <div class="form-group col-md-12">
                <label>Name<span style="color:#ff0000">*</span></label>
                <div>
                    <input class="form-control" placeholder="Currency type" type="text" id="save_Currency_Type" name="currencyType" required />
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-29 closeaddCreateCurrencyCustomer" data-dismiss="modal">Close</button>
        <button type="button" class="button-29 saveaddCreateCurrencycustomer " >Save </button>
      </div>
    </div>
  </div>
</div>
<!--   == end currency   = -->

 <!--   ===crete payment terms     === -->
 <div class="modal fade" id="addPaymentTermsCustom"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Create Payment Terms</h5>
        <button type="button" class="close closeadPaymentTermsCustomer" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addTrailerTypeForm">
            @csrf
            <input type="hidden" name="_token" id="_token_Payment_Terms" value="{{ csrf_token() }}" />
            <div class="form-group col-md-12">
                <label>Name<span style="color:#ff0000">*</span></label>
                <div>
                    <input class="form-control" placeholder="Enter Name" type="text" id="trailer_type_name" name="trailer_type_name" required />
                </div>
            </div>
            <div class="form-group col-md-12">
                <label>Net Days<span style="color:#ff0000">*</span></label>
                <div>
                    <select name="" class="form-control">
                        <option>select one</option>
                        <?php 
                        $j=180;
                        for($i=1; $j>=$i; $i++){
                        ?>
                        <option value="{{$i}}">{{$i}}</option>
                        <?php }?>
                    </select>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="button-29 closeadPaymentTermsCustomer" data-dismiss="modal">Close</button>
        <button type="button" class="button-29 savePaymentTermsCustomer " >Save </button>
      </div>
    </div>
  </div>
</div>
 <!--  ====== end payment terms model    = -->

 <!--   === add  Factoring Company     s-->
 <div class="container">
    <div class="modal fade" data-backdrop="static" id="addFactoringModelCustomer" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Factoring Company</h4>
                    <button type="button" class="closeaddFactoringModelCustomer" >&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form >
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_Add_Factoring" value="{{ csrf_token() }}" />
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Factoring Company Name<span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control v" placeholder="Factoring Company Name" type="text" id="" name="factoringCompanyname" required />
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-2">
                                                    <label>Address <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control addFacAddress" placeholder="Address" type="text"  name="address" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Loction <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control addFaclocation" placeholder="Enter Location" type="text" id="" name="location" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Postal / Zip<span style="color:#ff0000">*</span> </label>
                                                    <div>
                                                        <input class="form-control addFacZip" placeholder="Postal / Zip" type="text" id="" name="zip" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Primary Contact </label>
                                                    <div>
                                                        <input class="form-control addFacPrimaryContact" placeholder="Primary Contact" type="text" id="" name="primaryContact">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Telephone </label>
                                                    <div>
                                                        <input class="form-control addFacTelephone" placeholder="(___) ___ - ____" type="text" id="" name="telephone">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Ext Factoring </label>
                                                    <div>
                                                        <input class="form-control addFacExtFactoring" placeholder="Ext" type="text" id="" name="extFactoring">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Fax </label>
                                                    <div>
                                                        <input class="form-control addFacFax" placeholder="(___) ___ - ____" type="text" id="" name="fax">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Toll Free </label>
                                                    <div>
                                                        <input class="form-control addFacTollFree" placeholder="(___) ___ - ____" type="text" id="" name="tollFree">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Contact Email </label>
                                                    <div>
                                                        <input class="form-control addFacEmail" placeholder="Contact Email" type="email" id="" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Secondary Contact </label>
                                                    <div>
                                                        <input class="form-control addFacSecondaryContact" placeholder="Secondary Contact " type="text" id="" name="secondaryContact">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Factoring Telephone </label>
                                                    <div>
                                                        <input class="form-control addFacFactoringtelephone" placeholder="(___) ___ - ____" type="text" id="" name="factoringtelephone">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Ext </label>
                                                    <div>
                                                        <input class="form-control addFacExt" placeholder="Ext" type="text" id="" name="ext">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Currency Setting <span style="color:#ff0000">*</span>&nbsp; 
                                                    <span class="glyphicon glyphicon-plus-sign addcurrencySetting "  data-toggle="modal"  style="cursor:pointer;"></span>
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control customerCurrencySet" list="currencySetting_option" name="currencyType" id="customerCurrencySet">
                                                            <datalist id="currencySetting_option" class="currencySetting_option">
                                                                <option>Select Here</option>
                                                              
                                                            </datalist>
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Payment Terms <span style="color:#ff0000">*</span>&nbsp; 
                                                    <span class="glyphicon glyphicon-plus-sign addpaymentTerms " id="addpaymentTerms" data-toggle="modal"  style="cursor:pointer;"></span>
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control addPaymentTermsCustom" list="addPaymentTermsCustom" name="paymentTerms" id="payment_Terms">
                                                            <datalist id="addPaymentTermsCustom" class="addPaymentTermsCustom">
                                                                <option>Select Here</option>
                                                              
                                                            </datalist>
                                                        </div>
                                                </div>
                                            <div class="form-row">
                                                
                                            <div class="form-group col-md-4 ">
                                                    <label>taxID </label>
                                                    <div>
                                                        <input class="form-control addFactaxID" placeholder="__-_______" type="text" id="" name="taxID">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Internal Notes</label>
                                                    <div>
                                                        <textarea rows="2" cols="30" class="form-control addFacInternalNote" type="textarea" id="" placeholder="Internal Note" name="internalNote"></textarea>
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
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29 saveFactoringModelCustomer" >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeaddFactoringModelCustomer button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
 <!--   === end add  Factoring Company     s-->



  <!--   ===== resote customer start model    ===== -->
   <div class="modal fade" data-backdrop="static" id="restoreCustomerData" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
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
                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                        <thead>
                            <tr>
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
                        <tbody class="restoreCustomerTable">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeRestoreCustomer" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
