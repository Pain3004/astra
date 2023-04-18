<style>
    .table td {
        padding: 0.1rem;
    }
    </style>

<!---=========================== External Carrier modal =================================-->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="ExternalCarrierModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">External Carrier</h4>
                    <button type="button" class="button-24 closeExternalCarrierModal" data-dismiss="modal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <button class="button-57_alt AddExternalCarrierBtn" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add </span></button>
                    <button class="button-57_alt restoreExternalCarrierBtn" ><i class="fa fa-repeat " aria-hidden="true"></i><span>Restore </span></button>
                </div>
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th">
                  <tr class="tr">
                                                <th><p style=" margin-top:18px;">No</th>
                                                <th><p style="width:170px; margin-top:18px;">Name</th>
                                                <th><p style="width:130px; margin-top:18px;">Address</th>
                                                <th><p style="width:100px; margin-top:18px;">Location</th>
                                                <th><p style="width:100px; margin-top:18px;">Zip</th>
                                                <th><p style="width:100px; margin-top:18px;">Contact Name </p></th>
                                                <th><p style="width:100px; margin-top:18px;">Email</th>
                                                <th><p style="width:100px; margin-top:18px;">Tax ID</th>
                                                <th><p style="width:100px; margin-top:18px;">Telephone</th>
                                                <th><p style="width:100px; margin-top:18px;">M.C.</th>
                                                <th><p style="width:100px; margin-top:18px;">D.O.T.</th>
                                                <th><p style=" margin-top:18px;">Action</th>
                                            </tr>
                  </thead>
                  <tbody id="external_carrierTable" class="load-box"></tbody>
                </table>
              </div>
                <!-- <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row1">
                        <div class="row1 row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th><p style="">No</th>
                                                <th><p style="width:170px">Name</th>
                                                <th><p style="width:130px">Address</th>
                                                <th><p style="width:100px">Location</th>
                                                <th><p style="width:100px">Zip</th>
                                                <th><p style="width:100px">Contact Name </p></th>
                                                <th><p style="width:100px">Email</th>
                                                <th><p style="width:100px">Tax ID</th>
                                                <th><p style="width:100px">Telephone</th>
                                                <th><p style="width:100px">M.C.</th>
                                                <th><p style="width:100px">D.O.T.</th>
                                                <th><p style="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="external_carrierTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-footer">               
                    <button type="button" class="button-29 closeExternalCarrierModal" data-dismiss="modal">Close</button>
                    <nav aria-label="..." data-name="carrier_pagination" class="float-right">
                        <div class="pagination" id="carrier_pagination">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=========================== end external carrier view ============================= -->

<!--========================= start store external carrier  ============================= -->


<div class="container">
    <div class="modal fade" data-backdrop="static" id="AddExternalCarrier">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add External Carrier </h4>
                    <button type="button" class="button-24 closeAddExternalCarreirModal" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <form >
                            <input type="hidden" class="update_store_external_carrier">
                        <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                            <!-- Step 1 -->
                            <li class="form-stepper-active text-center form-stepper-list step_1" step="1">
                                <a class="mx-2">
                                    <span class="form-stepper-circle">
                                        <span>1</span>
                                    </span>
                                    <div class="label">Add External Carrier</div>
                                </a>
                            </li>
                            <!-- Step 2 -->
                            <li class="form-stepper-unfinished text-center form-stepper-list step_2" step="2">
                                <a class="mx-2">
                                    <span class="form-stepper-circle text-muted">
                                        <span>2</span>
                                    </span>
                                    <div class="label text-muted">Add Insurance</div>
                                </a>
                            </li>
                            <!-- Step 3 -->
                            <li class="form-stepper-unfinished text-center form-stepper-list step_3" step="3">
                                <a class="mx-2">
                                    <span class="form-stepper-circle text-muted">
                                        <span>3</span>
                                    </span>
                                    <div class="label text-muted">Add Accounting</div>
                                </a>
                            </li>
                            <li class="form-stepper-unfinished text-center form-stepper-list step_4" step="4">
                                <a class="mx-2">
                                    <span class="form-stepper-circle text-muted">
                                        <span>4</span>
                                    </span>
                                    <div class="label text-muted">Add Equipment</div>
                                </a>
                            </li>
                        </ul>
                        <!-- Step 1 Content -->
                        <section id="step-1" class="form-step">
                            <h2 class="font-normal">Add External Carrier</h2>
                            <!-- Step 1 input fields -->
                            <div class="mt-3">
                            <div class="form-row">
                                <input type="hidden" name="_token" id="_token_UpdateExternalCarrier" value="{{ csrf_token() }}" />
                                <input type="hidden" class="update_external_carrier_id">
                                <input type="hidden" class="update_external_carrier_Comid">
                                    <div class="form-group col-md-3">
                                        <label for="inputFirstName4"> Name<span
                                                class="required"></span></label>
                                        <input type="text" class="form-control" name="carrierName"
                                            id="carrierName" placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress">Address<span
                                                class="required"></span></label>
                                        <input type="text" class="form-control" name="carrierAddress"
                                            id="carrierAddress" placeholder="Address">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputLocation">Location<span
                                                class="required"></span></label>
                                        <input type="text" class="form-control location_view" name="carrierLocation " data-location="carrierLocation" 
                                            id="carrierLocation" placeholder="Location">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputZip">Zip<span
                                                class="required"></span></label>
                                        <input type="number" class="form-control" name="carrierZip"
                                            id="carrierZip" placeholder="Zip">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputContactName">Contact Name<span>
                                            </span></label>
                                        <input type="text" class="form-control"
                                            name="carrierContactName" id="carrierContactName"
                                            placeholder="Contact Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail">Email<span
                                                class="required"></span></label>
                                        <input type="email" class="form-control" name="carrierEmail"
                                            id="carrierEmail" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputTelephone">Telephone</label>
                                        <input type="text" class="form-control" name="carrierTelephone"
                                            id="carrierTelephone"
                                            placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputExt">Ext</label>
                                        <input type="text" class="form-control" name="carrierExt"
                                            id="carrierExt"  placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputTollFree">TollFree</label>
                                        <input type="text" class="form-control" name="carrierTollFree"
                                            id="carrierTollFree"
                                            placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputFax">Fax<span>
                                            </span></label>
                                        <input type="text" class="form-control"
                                            name="carrierFax" id="carrierFax"
                                            placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputPaymentTerms">Payment Terms<span
                                                class="required"></span></label>
                                                <i title="Add payment" class="mdi mdi-plus-circle plus " id="plusPaymentTerms3" data-name="plusPaymentTerms" style='color:blue !important'></i>
                                        <input type="text" class="form-control customerPaymentTermSet" list="customerPaymentTermSet" name="carrierPayTerms" id="carrierPayTerms" placeholder="PaymentTerms">
                                        <datalist  class="customerPaymentTermSet">  <option>Select Here</option> </datalist>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputTaxID">Tax ID</label>
                                        <input type="text" class="form-control" name="carrierTaxID"
                                            id="carrierTaxID"
                                            placeholder="Tax ID">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputMC">M.C.#</label>
                                        <input type="text" class="form-control" name="carrierMC"
                                            id="carrierMC"
                                            placeholder="M.C.#">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputDOT">D.O.T.<span>
                                            </span></label>
                                        <input type="text" class="form-control"
                                            name="carrierDOT" id="carrierDOT"
                                            placeholder="D.O.T.">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputFactoringCompany">Factoring Company<span
                                                class="required"></span></label>
                                                <i title="Add factoring" class="mdi mdi-plus-circle plus" id="plusFactoringCompany3" data-name="plusFactoringCompany" style='color:blue !important'></i>
                                        <!-- <input type="text" class="form-control customerBFactoringCompanySet" list="customerBFactoringCompanySet"  name="carrierFactoring" id="carrierFactoring" placeholder="Factoring Company">
                                        <datalist  class="customerBFactoringCompanySet">
                                            <option>Select Here</option>
                                        </datalist> -->

                                        <select class="form-control customerBFactoringCompanySet"  >                                              <option>Select Here</option>
                                            </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputInternalNotes">Internal Notes</label>
                                        <textarea  class="form-control" name="carrierNotes"
                                            id="carrierNotes"
                                            placeholder="Internal Notes"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <p style="font-weight: bold;">Blacklisted</p>
                                        <input type="checkBox" name="carrierBlacklisted" id="carrierBlacklisted">
                                        <lable for="inputBlacklist">This Carrier is Blacklisted</lable>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <p style="font-weight: bold;">Corporation</p>
                                        <input type="checkBox" name="carrierCorporation" id="carrierCorporation">
                                        <lable for="inputCorporation">This Carrier is a corporation</lable>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="2">Next</button>
                            </div>
                        </section>
                        <!-- Step 2 Content, default hidden on page load. -->
                        <section id="step-2" class="form-step d-none">
                            <h2 class="font-normal">Social Profiles</h2>
                            <!-- Step 2 input fields -->
                            <div class="mt-3">
                                <div class="card-header">
                                    General liabity Insurer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Liablity Company</label>
                                            <div>
                                                <input class="form-control" placeholder="Enter Liablity Company"
                                                    type="text" id="liabilityCompany" name="liabilityCompany">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control" placeholder="Enter Policy #" type="text"
                                                    id="liabilityPolicy" name="liabilityPolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control" type="date" id="liabilityExpDate"
                                                    name="liabilityExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone </label>
                                            <div>
                                                <input class="form-control" placeholder="(999) 999-9999"
                                                    data-mask="(999) 999-9999" type="text" id="liabilityTelephone"
                                                    name="liabilityTelephone">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Enter Ext" type="text"
                                                    id="liabilityEXT" name="liabilityEXT">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control" placeholder="Enter Contact Name" type="text"
                                                    id="liabilityContact" name="liabilityContact">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Liability ($)</label>
                                            <div>
                                                <input class="form-control" placeholder="Enter Liability ($)"
                                                    type="text" id="liabilityAmount" name="liabilityAmount">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                <textarea rows="1" cols="30" class="form-control" type="textarea"
                                                    id="liabilityNotes" name="liabilityNotes"
                                                    placeholder="Enter Internal Notes"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            Auto Mobile Insurer
                                            <div class="form-group col-md-3">
                                                <label></label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9"
                                                        data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                        >
                                                    <label class="custom-control-label" for="customCheck9">Same
                                                        as Liability Company</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Auto Insurance Company</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Auto Insurance Company"
                                                            type="text" id="insuranceCompany" name="insuranceCompany">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Policy #</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Policy #" type="text"
                                                            id="insurancePolicy" name="insurancePolicy">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Exp. Date</label>
                                                    <div>
                                                        <input class="form-control" type="date" id="insuranceExpDate"
                                                            name="insuranceExpDate">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Telephone</label>
                                                    <div>
                                                        <input class="form-control" placeholder="(999) 999-9999"
                                                            data-mask="(999) 999-9999" type="text" id="insuranceTelephone"
                                                            name="insuranceTelephone">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>Ext</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Ext" type="text"
                                                            id="insuranceExt" name="insuranceExt">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Contact Name</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Contact Name" type="text"
                                                            id="insuranceContactName" name="insuranceContactName">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Liability ($)</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Liability ($)"
                                                            type="text" id="insuranceAmt" name="insuranceAmt">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Internal Notes</label>
                                                    <div>
                                                        <textarea rows="1" cols="30" class="form-control" type="textarea"
                                                            id="insuranceNotes" name="insuranceNotes"
                                                            placeholder="Enter Internal Notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header">
                                            Cargo Insurer
                                            <div class="form-group col-md-3">
                                                <label></label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck10"
                                                        data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                        >
                                                    <label class="custom-control-label" for="customCheck10">Same
                                                        as Liability Company</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Cargo Company</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Cargo Company"
                                                            type="text" id="cargoName" name="cargoName">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Policy #</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Policy #" type="text"
                                                            id="cargoPolicy" name="cargoPolicy">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Exp. Date</label>
                                                    <div>
                                                        <input class="form-control" type="date" id="cargoExpDate"
                                                            name="cargoExpDate">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Telephone </label>
                                                    <div>
                                                        <input class="form-control" placeholder="(999) 999-9999"
                                                            data-mask="(999) 999-9999" type="text" id="cargoTelephone"
                                                            name="cargoTelephone">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>Ext</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Ext" type="text"
                                                            id="cargoExt" name="cargoExt">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Contact Name</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Contact Name" type="text"
                                                            id="cargoContactName" name="cargoContactName">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Cargo Insurance ($)</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter Cargo Insurance ($)"
                                                            type="text" id="cargoInsuranceAmount" name="cargoInsuranceAmount">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Internal Notes</label>
                                                    <div>
                                                        <textarea rows="1" cols="30" class="form-control" type="textarea"
                                                            id="cargoNotes" name="cargoNotes"
                                                            placeholder="Enter Internal Notes"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>WSIB # </label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter WSIB # " type="text"
                                                            id="wsib" name="wsib">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="1">Prev</button>
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="3">Next</button>
                            </div>
                        </section>
                        <!-- Step 3 Content, default hidden on page load. -->
                        <section id="step-3" class="form-step d-none">
                            <!-- <h2 class="font-normal">Personal Details</h2> -->
                            <!-- Step 3 input fields -->
                            <div class="mt-3">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Primary Name</label>
                                        <div>
                                            <input class="form-control" placeholder="Enter Primary Name" type="text"
                                                id="primaryName" name="primaryName">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Primary Telephone</label>
                                        <div>
                                            <input class="form-control" data-mask="(999) 999-9999" placeholder="(999) 999-9999"
                                                type="text" id="primaryTelephone" name="primaryTelephone">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>
                                            Primary Email</label>
                                        <div>
                                            <input class="form-control" type="email" placeholder="Enter Primary Email"
                                                id="primaryEmail" name="primaryEmail">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Secondary Name </label>
                                        <div>
                                            <input class="form-control" placeholder="Enter Secondary Name " type="text"
                                                id="secondaryName" name="secondaryName">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Secondary Telephone</label>
                                        <div>
                                            <input class="form-control" data-mask="(999) 999-9999" placeholder="(999) 999-9999"
                                                type="text" id="secondaryTelephone" name="secondaryTelephone">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>
                                            Secondary Email</label>
                                        <div>
                                            <input class="form-control" type="email" placeholder=" Enter Secondary Email"
                                                id="secondaryEmail" name="secondaryEmail">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Add Notes</label>
                                        <div>
                                            <textarea rows="3" cols="30" class="form-control" type="textarea" id="primaryNotes"
                                                name="primaryNotes" placeholder="Enter Internal Notes"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="2">Prev</button>
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="4">Next</button>
                            </div>
                        </section>
                        <!-- Step 4 Content, default hidden on page load. -->
                        <section id="step-4" class="form-step d-none">
                            <!-- <h2 class="font-normal">Step 4</h2> -->
                            <!-- Step 4 input fields -->
                            <div class="mt-3">
                                <center>
                                    <div class="form-group col-md-6">
                                        <label>Size Of Fleet :</label>
                                        <div>
                                            <input class="form-control" type="text" placeholder="Size Of Fleet :"
                                                id="sizeOfFleet" name="sizeOfFleet">
                                        </div>
                                    </div>
                                </center>
                                <div class="row" id="equipAdd">
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div><div class="col-6">
                                        <label>Quantity</label> 
                                        <div>   
                                            <input class="form-control externalvalue" type="text" name="quantity[]" value="" placeholder="Quantity">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <label>Equipment Type</label> 
                                        <div>   
                                            <input  class="form-control"  type="text" name="equipment[]" placeholder="Equipment Type">
                                        </div>  
                                    </div>
                                <hr>
                            </div>
                            <div class="mt-3">
                                <button class="button-29 btn-navigate-form-step" type="button" step_number="3">Prev</button>
                            </div>
                        </section>
                    </form>                
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="button-29" data-dismiss="modal" id="AddExternalCarrierSaveBtn">Submit</button>
                    <button type="button" class="button-29 closeAddExternalCarreirModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================== end store external carrier ================================== -->



<!---=============== start restore external carrier ======================================= -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestoreExternalCarrierModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore External Carrier</h4>
                    <button type="button" class="button-24 closeRestoreExternalCarrierModal" data-dismiss="modal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_externalCarrier" value="">
                    <input type="hidden" name="company_id" id="checked_externalCarrier_company_ids" value="">
                    <button id="restore_externalCarrierData"  class="button-57_alt restore_externalCarrierData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>
                </div>
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th" style="height:40px;">
                  <tr class="tr">
                  <tr class="tr">
                                                <th scope="col" col width="40"><input type="checkbox" name="all_ids[]" class="externalCarrier_all_ids"></th>
                                                <th style="">Name</th>
                                                <th>Address</th>
                                                <th>Location</th>
                                                <th>Zip</th>
                                                <th>Contact Name </th>
                                                <th>Email</th>
                                                <th>Tax ID</th>
                                                <th>Telephone</th>
                                                <th>M.C.</th>
                                                <th>D.O.T.</th>
                                            </tr>
                  </thead>
                  <tbody id="Restoreexternal_carrierTable" class="load-box"></tbody>
                </table>
              </div>
                
                <div class="modal-footer">
                    <button type="button" class="button-29 closeRestoreExternalCarrierModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--======================= end restore external carrier ==================================== -->

<!-----=================- Payment Terms modal =================------>

<!-- <div class="container" >
 
  <div class="modal fade" id="PaymentexterTermsModal" data-backdrop="static" style="z-index:10000000000;"> >
    <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
      <div class="modal-content">
      
        
        <div class="modal-header">
        <h5 class="modal-title">Create Payment Terms</h5>
          <button type="button" class="button-24 PaymentTermsModalCloseButton">&times;</button>
        </div>
        
        
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
        <div class="modal-footer" >
            <button type="submit" class="button-29 PaymentTermsDataSubmit">Save</button>
            <button type="button" class="button-29 PaymentTermsModalCloseButton" data-dismiss="modal" id="closePaymentTermsModal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div> -->
<!--------============ over Payment Terms modal ============-------->