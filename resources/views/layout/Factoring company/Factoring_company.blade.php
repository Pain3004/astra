<!------------------------------------------------------------------- Facoring Company modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="FacoringCompanyModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Factoring Company</h4>
                    <button type="button" class="button-24 FactoringCompanyModalClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <a href="#" class="button-57_alt" id="AddFactoringCompany"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Factoring Company</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <!-- <a href="#contractCategoryModal" class=" contract_categoryModal button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a> -->
                    <!-- <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
                        <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div>
                    </div> -->

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">

                                        <div class="table-responsive export-table">
                                            <table id="factoring_table_pagination" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th>Factoring Company Name</th>
                                                        <th>Address</th>
                                                        <th>Location</th>
                                                        <th>Postal/Zip</th>
                                                        <th>Primary Contact</th>
                                                        <th>Telephone</th>
                                                        <th>Ext</th>
                                                        <th>Fax</th>
                                                        <th>Toll Free</th>
                                                        <th>Contact Email</th>
                                                        <th>Secondary Contact</th>
                                                        <th>Telephone</th>
                                                        <th>Ext</th>
                                                        <th>Currency Setting</th>
                                                        <th>Payment Terms</th>
                                                        <th>Tax ID</th>
                                                        <th>Internal Notes</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="factCompTable">

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
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29 FactoringCompanyModalClose" >Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-------------------------------------------------------------------end Facoring Company modal ------------------------------------------------------------------->
<!------------------------------------------------------------------  add Factoring Company  modal ------------------------------------------------------------------>

<div class="container resizeModal">

    <div class="modal fade"  id="addFactoringCompanyModal"style="z-index:1000000000;">
        <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ">Add Factoring Company</h5>
                    <button type="button" class="button-24 addFactoringCompanyModalCloseButton">&times;</button>
                </div>

                <div class="modal-body">
                    <from>
                        <input type="hidden" name="_token" id="_tokenaddFactoringCompany" value="{{ csrf_token() }}" />
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyName">Factoring Company Name <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyName" placeholder=" Enter Factoring Company Name" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyAddress">Address <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyAddress" placeholder=" Enter Address " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyLocation ">Location <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyLocation" placeholder=" Enter Location " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyZip">Postal / Zip   <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyZip" placeholder=" Enter Zip " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContact">Primary Contact</label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContact" placeholder=" Enter Primary Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContactTelephone">Telephone</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyFax">Fax</label>
                                <input type="text" class="form-control" id="addfactoringCompanyFax" placeholder=" Enter Fax " >
                            </div>
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContact">Secondary  Contact</label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContact" placeholder=" Enter Secondary  Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactTelephone">Telephone </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringTollFree">Toll Free   </label>
                                <input type="text" class="form-control" id="addfactoringTollFree" placeholder=" Enter Toll Free " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyContactEmail">Contact Email</label>
                                <input type="text" class="form-control" id="addfactoringCompanyContactEmail" placeholder=" Enter Contact Email" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addcustomerCurrencySetting">Currency Setting <span class="glyphicon glyphicon-plus-sign" id="factoringCurrency" ></span> </label>
                                <div class="dropdown show">
                                    <input class="form-control customerCurrencySet " list="customerCurrencySet" name="currency" id="addcurrency1">
                                    <datalist id="customerCurrencySet" class="customerCurrencySet"></datalist>    
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                    <label for="addcustomerPaymentTerms">Payment Terms <span class="glyphicon glyphicon-plus-sign" id="factoringPaymentTerms" ></span> </label>
                                    <div class="dropdown show">
                                      
                                        <input class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="PaymentTerms" id="addPaymentTerms1">
                                    <datalist id="customerPaymentTermSet" class="customerPaymentTermSet"></datalist>    
                                    </div>
                                </div>
                            <div class="form-group col-md-2">
                                <label for="addfactoringCompanyTaxID">Tax ID  <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyTaxID1" placeholder=" Enter Tax ID " >
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <label for="addfactoringCompanyInternalNotes">Internal Notes</label>
                                <textarea  rows="2" cols="50" class="form-control" id="addfactoringCompanyInternalNotes"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            
                <!-- Modal footer -->
                <div class="modal-footer" >
                    <button type="submit" class="button-29 addFactoringCompanyDataSubmit">Save</button>
                    <button type="button" class="button-29 factoringCompanyModalCloseButton">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
</div>
 
<!------------------------------------------------------------------ over add Factoring Company  modal ------------------------------------------------------------------>

<!-- SVG -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="cloud">
    <path d="M31.714,25.543c3.335-2.17,4.27-6.612,2.084-9.922c-1.247-1.884-3.31-3.077-5.575-3.223h-0.021
	C27.148,6.68,21.624,2.89,15.862,3.931c-3.308,0.597-6.134,2.715-7.618,5.708c-4.763,0.2-8.46,4.194-8.257,8.919
	c0.202,4.726,4.227,8.392,8.991,8.192h4.873h13.934C27.784,26.751,30.252,26.54,31.714,25.543z" />
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="lens">
    <path d="M15.656,13.692l-3.257-3.229c2.087-3.079,1.261-7.252-1.845-9.321c-3.106-2.068-7.315-1.25-9.402,1.83
	s-1.261,7.252,1.845,9.32c1.123,0.748,2.446,1.146,3.799,1.142c1.273-0.016,2.515-0.39,3.583-1.076l3.257,3.229
	c0.531,0.541,1.404,0.553,1.95,0.025c0.009-0.008,0.018-0.017,0.026-0.025C16.112,15.059,16.131,14.242,15.656,13.692z M2.845,6.631
	c0.023-2.188,1.832-3.942,4.039-3.918c2.206,0.024,3.976,1.816,3.951,4.004c-0.023,2.171-1.805,3.918-3.995,3.918
	C4.622,10.623,2.833,8.831,2.845,6.631L2.845,6.631z" />
  </symbol>
</svg>  


<!--=========================== start update ========================== -->
<!-- <div class="container resizeModal">

    <div class="modal fade"  id="UpdateFactoringCompanyModal"style="z-index:1000000000;">
        <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ">Edit Factoring Company</h5>
                    <button type="button" class="button-24 addFactoringCompanyModalCloseButton">&times;</button>
                </div>

                <div class="modal-body">
                    <from>
                        <input type="hidden" name="_token" id="_tokenaddFactoringCompany" value="{{ csrf_token() }}" />
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyName">Factoring Company Name <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyName" placeholder=" Enter Factoring Company Name" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyAddress">Address <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyAddress" placeholder=" Enter Address " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyLocation ">Location <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyLocation" placeholder=" Enter Location " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyZip">Postal / Zip   <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyZip" placeholder=" Enter Zip " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContact">Primary Contact</label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContact" placeholder=" Enter Primary Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContactTelephone">Telephone</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyFax">Fax</label>
                                <input type="text" class="form-control" id="addfactoringCompanyFax" placeholder=" Enter Fax " >
                            </div>
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContact">Secondary  Contact</label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContact" placeholder=" Enter Secondary  Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactTelephone">Telephone </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactTelephone" placeholder=" Enter Telephone " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringTollFree">Toll Free   </label>
                                <input type="text" class="form-control" id="addfactoringTollFree" placeholder=" Enter Toll Free " >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyContactEmail">Contact Email</label>
                                <input type="text" class="form-control" id="addfactoringCompanyContactEmail" placeholder=" Enter Contact Email" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addcustomerCurrencySetting">Currency Setting <span class="glyphicon glyphicon-plus-sign" id="factoringCurrency" ></span> </label>
                                <div class="dropdown show">
                                    <input class="form-control customerCurrencySet " list="customerCurrencySet" name="currency" id="addcurrency1">
                                    <datalist id="customerCurrencySet" class="customerCurrencySet"></datalist>    
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                    <label for="addcustomerPaymentTerms">Payment Terms <span class="glyphicon glyphicon-plus-sign" id="factoringPaymentTerms" ></span> </label>
                                    <div class="dropdown show">
                                      
                                        <input class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="PaymentTerms" id="addPaymentTerms1">
                                    <datalist id="customerPaymentTermSet" class="customerPaymentTermSet"></datalist>    
                                    </div>
                                </div>
                            <div class="form-group col-md-2">
                                <label for="addfactoringCompanyTaxID">Tax ID  <span style="color:#ff0000">*</span></label>
                                <input type="text" class="form-control" id="addfactoringCompanyTaxID1" placeholder=" Enter Tax ID " >
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <label for="addfactoringCompanyInternalNotes">Internal Notes</label>
                                <textarea  rows="2" cols="50" class="form-control" id="addfactoringCompanyInternalNotes"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            
                <div class="modal-footer" >
                    <button type="submit" class="button-29 updateFactoringCompanyDataSubmit">update</button>
                    <button type="button" class="button-29 updatefactoringCompanyModalCloseButton">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
</div> -->
 
<!--========================= end update ============================== -->

<!--======================= start restore ============================= -->
<!--============================ end restore =========================== -->