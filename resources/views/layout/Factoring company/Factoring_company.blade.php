<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
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
                    @if($insertUser== 1)
                        <a href="#" class="button-57_alt" id="AddFactoringCompany"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Factoring Company</span></a>
                    @endif
                    @if($deleteUser== 1)    
                        <a href="#" class="button-57_alt restoreFactringComlData" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>
                    @endif 
                    <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>

                    <i class="mdi mdi-play-circle float-right tour-icon cus-tour" title="Take a Tour"></i>
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" data-name="fact_search" type="text"  id="fact_search" placeholder="search"style="margin-left: 5px;">
                    <!-- <select style="margin-left: 3px;" data-name="cus_select"class="form-control col-md-2 col-sm-4 col-lg-2 float-right" name="factoryCOmpany_search" id="factoryCOmpany_search" >
                        <option value="">---select---</option>
                        <option value="custName">Customer Name</option>
                        <option value="custLocation">Customer Location</option>
                        <option value="custZip">Customer Zip</option>
                        <option value="primaryContact">Primary Contact</option>
                        <option value="custEmail">Customer Email</option>
                    </select> -->
	
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <table id="factoring_table_pagination" class="table">
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

                <!-- Modal footer -->
                <div class="modal-footer">
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                        @endif
                    </form>
                    <button type="button" class="button-29 FactoringCompanyModalClose" >Close</button>
                    <span class="mandatory_admin">Note: XLSX files must contain atmost 1000 rows at a time.</span>
                    </nav> 
                    <!-- <nav aria-label="Page navigation">
                        <ul id="static-pagination" class="pagination">
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-------------------------------------------------------------------end Factoring Company modal ------------------------------------------------------------------->
<!------------------------------------------------------------------  add Factoring Company  modal ------------------------------------------------------------------>

<div class="container resizeModal">

    <div class="modal fade"  id="addFactoringCompanyModal"style="z-index:1000000000;">
        <div class="modal-dialog custom_modal_small2 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Factoring Company</h5>
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
                                <input type="text" class="form-control location_view" data-location="addfactoringCompanyLocation"   id="addfactoringCompanyLocation" placeholder=" Enter Location " >
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
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactTelephone" placeholder=" Enter Telephone "  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyPrimaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanyPrimaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyFax">Fax</label>
                                <input type="text" class="form-control" id="addfactoringCompanyFax"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContact">Secondary  Contact</label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContact" placeholder=" Enter Secondary  Contact" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactTelephone">Telephone </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactTelephone"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanySecondaryContactExt ">Ext </label>
                                <input type="text" class="form-control" id="addfactoringCompanySecondaryContactExt" placeholder=" Enter Ext " >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addfactoringTollFree">Toll Free   </label>
                                <input type="text" class="form-control" id="addfactoringTollFree"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="addfactoringCompanyContactEmail">Contact Email</label>
                                <input type="text" class="form-control" id="addfactoringCompanyContactEmail" placeholder=" Enter Contact Email" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="addcustomerCurrencySetting">Currency Setting <span class="glyphicon glyphicon-plus-sign" id="factoringCurrency"  style="cursor:pointer;color:blue !important"></span> </label>
                                <div class="dropdown show">
                                    <input class="form-control customerCurrencySet " list="customerCurrencySet" name="currency" id="addcurrency1">
                                    <datalist id="customerCurrencySet" class="customerCurrencySet"></datalist>    
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                    <label for="addcustomerPaymentTerms">Payment Terms <span class="glyphicon glyphicon-plus-sign" id="factoringPaymentTerms" style="cursor:pointer;color:blue !important" ></span> </label>
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
<div class="container">
    <div class="modal fade" data-backdrop="static" id="update_FactoringCompanyModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Factoring Company </h4>
                    <button type="button" class="closeUpdateFactoringCompanyModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_updateFactoringCompany" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="fuel_recepit_id" class="factringCom_id_edit" >
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Factoring Company<span style="color:#ff0000">*</span>
                                                    </label>
                                                    <div>
                                                        <input type="text" class="form-control update_factoringCompanyname" name="factoringCompanyname"> 
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Address <span style="color:#ff0000">*</span>
                                                    </label>
                                                    <div>
                                                        <input type="text" class="form-control update_Factring_address" name="address"> 
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Location<span style="color:#ff0000">*</span>
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control update_fact_location location_view" data-location="fact_location_add_data" id="fact_location_add_data" type="text" 
                                                            name="location"  />
                                                        </div>
                                                </div>
                                                 <div class="form-group col-md-2">
                                                    <label>Postal / Zip<span style="color:#ff0000">*</span>
                                                    </label>
                                                        <div class="dropdown show">
                                                            <input class="form-control update_fact_zip " type="text" 
                                                            name="zip"  />
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Primary Contact</label>
                                                    <div >
                                                        <input class="form-control update_fact_primaryContact " type="text" 
                                                            name="primaryContact"  />   
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <label>Telephone </label>
                                                    <div>
                                                        <input class="form-control update_fac_telephone" type="text" name="telephone"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"   />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>EXT</label>
                                                    <div>
                                                        <input class="form-control update_fac_ext" type="text" name="ext">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>FAX
                                                        </label>
                                                    <input type="text" class="form-control update_fac_fax"  name="fax"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  required>
                                                </div>
                                            </div>
                                            <!-- row 3 -->
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label >Toll Free</label>
                                                    <input class="form-control update_fac_tollFree"  type="text"  name="tollFree"  placeholder="(999) 999-9999" data-mask="(999) 999-9999"  required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Contact Email</label>
                                                    <input class="form-control update_fac_email"  type="text"  name="email">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label> Secondary Contact </label>
                                                    <input type="text" class="form-control update_fac_secondaryContact" name="secondaryContact"  > 
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label >Factring Telephone</label>
                                                    <input class="form-control update_fac_factoringtelephone" name="factoringtelephone" type="text"  placeholder="(999) 999-9999" data-mask="(999) 999-9999" >
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Factring Ext  </label>
                                                    <input class="form-control update_fac_extFactoring " name="extFactoring" type="text"> 
                                                </div>
                                               
                                                <div class="form-group col-md-2">
                                                    <label >Currency Setting <span style="color:#ff0000">*</span> 
                                                    <!-- <span class="glyphicon glyphicon-plus-sign" id="factoringCurrency"  style="cursor:pointer;color:blue !important"></span> -->
                                                </label>
                                                    <input class="form-control update_fac_currencySetting customerCurrencySet " list="customerCurrencySet" name="currencySetting " type="text" required>

                                                    <datalist class="customerCurrencySet"></datalist> 
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label >Payment Terms <span style="color:#ff0000">*</span>
                                                    <!-- <span class="glyphicon glyphicon-plus-sign"   style="cursor:pointer;color:blue !important"></span> -->
                                                </label>
                                                    <input class="form-control update_fac_paymentTerms customerPaymentTermSet" list="customerPaymentTermSet"  name="paymentTerms " type="text" required>
                                                    <datalist id="customerPaymentTermSet" class="customerPaymentTermSet"></datalist> 
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label >TAX ID <span style="color:#ff0000">*</span></label>
                                                    <input class="form-control update_fac_taxID " name="taxID " type="text" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label >Internal Notes </label>
                                                    <div>
                                                        <textarea rows="2" cols="30" class="form-control update_fac_internalNote " name="internalNote "   type="textarea"  placeholder="Internal Note" ></textarea>
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
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29 UpdateFactoringCompanyModal"  >Update</button>
                    <button type="button"style="vertical-align:middle" class=" closeUpdateFactoringCompanyModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
 
<!--========================= end update ============================== -->

<!--======================= start restore ============================= -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="RestoreFacoringCompanyModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Restore Factoring Company</h4>
                    <button type="button" class="button-24 RestoreFactoringCompanyModalClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                        <input type="hidden" name="checked_id" id="checked_FactringCom_ids" value="">
                        <input type="hidden" name="company_id" id="checked_FactringC_company_ids" value="">
                        <button id="restorefactring_com_btn"  class="button-57_alt restorefactring_com_btn" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore fuel vendor</span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="factoring_table_pagination" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable" id="restore_factoringCompanyTable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th><input type="checkbox" name="all_factIds[]" class="checked_FactringIds"></th>
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
                                            </tr>
                                        </thead>
                                        <tbody id="RestorefactCompTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 RestoreFactoringCompanyModalClose" >Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--============================ end restore =========================== -->