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
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th>NO</th>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="external_carrierTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">               
                    <button type="button" class="button-29 closeExternalCarrierModal" data-dismiss="modal">Close</button>
                    <nav aria-label="..." data-name="carrier_pagination" class="float-right">
                        <div class="pagination" id="paginate">
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
    <div class="modal fade" data-backdrop="static" id="AddExternalCarrier" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add External Carrier</h4>
                    <button type="button" class="closeAddExternalCarreirModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="payment-container" style="z-index: 1600"></div>
                    <div class="factoring-container" style="z-index: 1600"></div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item1 show" id="home-title" data-name="addextrec">
                            <a class="nav-link1 active" id="home-tab" data-toggle="tab" href="#carrier" role="tab"
                                aria-controls="home" aria-selected="true">Add External
                                Carrier</a>
                        </li>
                        <li class="nav-item1" id="insurance-title" data-name="addIncrec">
                            <a class="nav-link1" id="insurance-tab" data-toggle="tab" href="#insurance" role="tab"
                                aria-controls="profile" aria-selected="false">Add Insurance</a>
                        </li>
                        <li class="nav-item1" id="accounting-title" data-name="addaccorec">
                            <a class="nav-link1" id="accounting-tab" data-toggle="tab" href="#accounting" role="tab"
                                aria-controls="contact" aria-selected="false">Add Accounting</a>
                        </li>
                        <li class="nav-item1" id="equipment-title" data-name="addequerec">
                            <a class="nav-link1" id="equipment-tab" data-toggle="tab" href="#equipment" role="tab"
                                aria-controls="contact" aria-selected="false">Add Equipment</a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_AddExternalCarrier" value="{{ csrf_token() }}" />
                                            <div class="tab-pane fade show active" id="carrier" role="tabpanel" aria-labelledby="home-tab"  data-name="fillextdata"> <br>
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Name <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter Name" id="carrierName"
                                                                name="carrierName" type="text">
                                                            <input type="hidden" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Address <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter Address" id="carrierAddress"
                                                                name="carrierAddress" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Location <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" type="text" id="carrierLocation"
                                                                name="carrierLocation">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Zip <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter Zip Code" type="text" id="carrierZip"
                                                                name="carrierZip">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Contact Name</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter Contact Name" type="text"
                                                                id="carrierContactName" name="carrierContactName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Email <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" type="email" value="" id="carrierEmail"
                                                                placeholder="Enter Email" name="carrierEmail">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Telephone <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" data-mask="(999) 999-9999" type="text"
                                                                id="carrierTelephone" name="carrierTelephone" placeholder="(999) 999-9999">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label>Ext</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter Ext" type="text" id="carrierExt"
                                                                name="carrierExt">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Toll Free</label>
                                                        <div>
                                                            <input class="form-control" data-mask="(999) 999-9999" placeholder="(999) 999-9999"
                                                                type="text" id="carrierTollFree" name="carrierTollFree">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Fax</label>
                                                        <div>
                                                            <input class="form-control" data-mask="(999) 999-9999" placeholder="(999) 999-9999"
                                                                type="text" id="carrierFax" name="carrierFax">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Payment Terms </label>
                                                        
                                                        <!-- <i class="mdi mdi-plus-circle plus" title="Add Payment Terms"
                                                            id="Add_Payment_Terms"></i> -->
                                                        
                                                       <input type="number" class="form-control" id="carrierPayTerms" name="carrierPayTerms">


                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Tax ID <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" data-mask="99-9999999" placeholder="99-9999999"
                                                                type="text" id="carrierTaxID" name="carrierTaxID">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>M.C. #<span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter M.C. #" type="text" id="carrierMC"
                                                                name="carrierMC">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>D.O.T. <span style="color: red">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter D.O.T" type="text" id="carrierDOT"
                                                                name="carrierDOT">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Factoring Company </label>
                                                       
                                                        <!-- <i class="mdi mdi-plus-circle plus" title="Add Factoring Company" id="AddFactoring"></i> -->
                                                        
                                                        <input list="Add_Carrier" class="form-control" placeholder="--Search Here--"
                                                            id="carrierFactoring"  name="carrierFactoring" type="number">
                                                        <!-- <datalist id="Add_Carrier">
                                                        </datalist> -->
                                                        <input class="form-control" type="hidden" value="" id="factoring-parent">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label>Internal Notes</label>
                                                        <div>
                                                            <textarea rows="1" cols="30" class="form-control" type="textarea" id="carrierNotes"
                                                                name="carrierNotes" placeholder="Enter Internal Notes"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3" data-name="carrierblack">
                                                        <label>Blacklisted</label>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="carrierBlacklisted"
                                                                name="carrierBlacklisted" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="carrierBlacklisted">This
                                                                Carrier is Blacklisted</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3" data-name="carrierCor">
                                                        <label>Corporation</label>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="carrierCorporation"
                                                                name="carrierCorporation" data-parsley-multiple="groups"
                                                                data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="carrierCorporation">This
                                                                carrier is a corporation</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button onclick="toggleCarrier('first')" class="btn btn-success float-right">Next <i
                                                        class="mdi mdi-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="profile-tab"
                                                data-name="addIncData">
                                                <br>
                                                <div class="col-xl-12" data-name="addIncData1" id="tab1">
                                                    <div class="card m-b-30">
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
                                                                    <label>Telephone *</label>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12" data-name="addIncData2" id="tab2">
                                                    <div class="card m-b-30">
                                                        <div class="card-header">
                                                            Auto Mobile Insurer
                                                            <div class="form-group col-md-3">
                                                                <label></label>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck9"
                                                                        data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                        onclick="setMobileInsurer(this.value)">
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
                                                                    <label>Telephone *</label>
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
                                                    </div>
                                                </div>
                                                <div class="col-xl-12" data-name="addIncData3" id="tab3">
                                                    <div class="card m-b-30">
                                                        <div class="card-header">
                                                            Cargo Insurer
                                                            <div class="form-group col-md-3">
                                                                <label></label>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck10"
                                                                        data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                                        onclick="setCargoInsurer()">
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
                                                                    <label>Telephone *</label>
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
                                                <hr>

                                                <button onclick="toggleCarrier('second')" style="margin-right: 3px"
                                                    class="btn btn-success float-right">Next <i class="mdi mdi-arrow-right"></i>
                                                </button>
                                                <button onclick="togglePrev('second')" style="margin-right: 3px"
                                                    class="float-right btn btn-secondary"><i class="mdi mdi-arrow-left"></i>
                                                    Previous
                                                </button>
                                            </div>
                                            <div class="tab-pane fade" id="accounting" role="tabpanel" aria-labelledby="contact-tab"
                                                data-name="addaccodata">
                                                <br>
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
                                                <hr>
                                                <button onclick="toggleCarrier('third')" style="margin-right: 3px"
                                                    class="btn btn-success float-right">Next <i class="mdi mdi-arrow-right"></i>
                                                </button>
                                                <button onclick="togglePrev('third')" style="margin-right: 3px"
                                                    class="float-right btn btn-secondary"><i class="mdi mdi-arrow-left"></i>
                                                    Previous
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="equipment" role="tabpanel" aria-labelledby="Equipment-tab"
                                                data-name="addequidata">
                                                <br>
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
                                                </div>

                                                <hr>
                                               
                                                <button onclick="toggleCarrier('fourth')" style="margin-right: 3px" data-name="prevCarrierM"
                                                    class="float-right btn btn-secondary">
                                                    <i class="mdi mdi-arrow-left"></i> Previous
                                                </button>
                                            </div>
                                     
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29" id="AddExternalCarrierSaveBtn" >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeAddExternalCarreirModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--======================== end store external carrier ================================== -->

<!--============================ start update external carrier ============================ -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="UpdateExternalCarrier" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit External Carrier</h4>
                    <button type="button" class="closeUpdateExternalCarreirModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_UpdateExternalCarrier" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="id" >
                                            <!-- <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>Trailer Number<span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control" placeholder="trailer Number" type="text" id="edite_trailer_number" name="trailer_number" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="trailertype">Trailer Type <span style="color:#ff0000">*</span>&nbsp; 
                                                </label>
                                                        <div class="dropdown show">
                                                        <select  class="form-control trailerTypeSet trailerType_Set_id" name="trailerType" id="edit_Trailer_Type" >
                                                                <option>Select Here</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>License Plate <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control" placeholder="License Plate" type="text" id="edit_Trailerlicense_plate"
                                                            name="license_plate" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Plate Expiry <span style="color:#ff0000">*</span></label>
                                                    <div>
                                                        <input class="form-control" type="date" id="edit_Trailerplate_expiry" name="plate_expiry" required />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <label>Inspection Expiration</label>
                                                    <div>
                                                        <input class="form-control" type="date" id="edit_Trailer_inspection" name="inspection">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>
                                                        Status</label>
                                                    <select class="form-control" id="edit_Trailer_status" name="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Not Available">Not Available</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29" id="UpdateExternalCarrierBtn" >update</button>
                    <button type="button"style="vertical-align:middle" class=" closeUpdateExternalCarreirModal button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--============================ end update external carrier ============================= -->

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
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
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
                                        <tbody id="Restoreexternal_carrierTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeRestoreExternalCarrierModal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--======================= end restore external carrier ==================================== -->