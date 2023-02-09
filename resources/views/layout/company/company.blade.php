<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<div class="container">
    <div class="modal fade" data-backdrop="static" id="companyModal" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Company</h5>
                    <button type="button" class="close closoCompanyModal">×</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">

                        @if($insertUser== 1)
                            <a href="#" class="button-57_alt" id="addCompany"><i class="fa fa-plus" aria-hidden="true"></i><span>Add Company</span></a>
                        @endif 
                </div>
                
                <div class="modal-body" style="overflow-y: auto !important;">

                    <table id="editable-file-datatable1"
                        class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                        <thead class="thead_th">
                            <tr class="tr">
                                <th>#</th>
                                <th>No</th>
                                <th>Company Name</th>
                                <th>Shipping Address</th>
                                <th>Telephone No</th>
                                <th>Fax No</th>
                                <th>M.C. No</th>
                                <th>US DOT No</th>
                                <th>Mailing Address</th>
                                <th>Factoring Company</th>
                                <th>Bank</th>
                                <th>Company Logo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="companyTable">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!-- <form action="{{route('download-pdf')}}" method="post" target="__blank"> -->
                    @csrf
                    <button class="btn btn-primary" style="vertical-align:middle"><span>Export</span></button>
                    <button type="button" class="button-29 closoCompanyModal">Close</button>
                    </form>
                    <!-- <button class="btn btnclose" style="background-color:red;" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Company modal -->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addCompanyModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Company</h4>
                    <button type="button" class="close closoAddCompanyModal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form name="addCompanyForm" id="addCompanyForm" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="_token" id="csrf1"
                                                    value="{{Session::token()}}">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputCompanyName4">Company Name<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="inputCompanyName4"
                                                            id="inputCompanyName4" placeholder="Company Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputShippingAddress4">Shipping Address</label>
                                                        <input type="text" class="form-control"
                                                            name="inputShippingAddress4" id="inputShippingAddress4"
                                                            placeholder="Shipping Address">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputTelephoneNo4">Telephone No<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control telephone4"
                                                            name="inputTelephoneNo4" id="inputTelephoneNo4"
                                                            placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputFaxNo4">Fax No</label>
                                                        <input type="text" class="form-control" name="inputFaxNo4"
                                                            id="inputFaxNo4" placeholder="(999) 999-9999" data-mask="(999) 999-9999">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputMcNo4">M.C. No</label>
                                                        <input type="text" class="form-control" name="inputMcNo4"
                                                            id="inputMcNo4" placeholder="M.C. No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputUsDotNo4">US DOT No</label>
                                                        <input type="text" class="form-control" name="inputUsDotNo4"
                                                            id="inputUsDotNo4" placeholder="US DOT No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmailAddress4">Email Address<span
                                                                class="required"></span></label>
                                                        <input type="email" class="form-control"
                                                            name="inputEmailAddress4" id="inputEmailAddress4"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBFactoringCompany">Factoring Company <span
                                                                class="glyphicon glyphicon-plus-sign" style="color:blue !important ; cursor:pointer;"
                                                                id="plusFactoringCompany4"></span></label>
                                                        <div class="dropdown show">
                                                            
                                                            <select class="form-control customerBFactoringCompanySet" name="customerBFactoringCompany" id="customerBFactoringCompany1" >                                              <option>Select Here</option>
                                                            </select>
                                                            <!-- <input class="form-control customerBFactoringCompanySet"
                                                                list="customerBFactoringCompanySet"
                                                                name="customerBFactoringCompany"
                                                                id="customerBFactoringCompany1">
                                                            <datalist id="customerBFactoringCompanySet"
                                                                class="customerBFactoringCompanySet">
                                                                <option>Select Here</option>
                                                            </datalist> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputWebsite4">Website</label>
                                                        <input type="url" class="form-control" name="inputWebsite4"
                                                            id="inputWebsite4" placeholder="Website">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="file">Upload File</label>
                                                        <input type="file" class="form-control" name="file"id="file">
                                                    </div>
                                                </div>
                                                <br>
                                                <a type="submit" class="button-29" data-dismiss="modal" id="companyDataSubmit">Submit</a>
                                                <button type="button" class="button-29 closoAddCompanyModal">Close</button>
                                                <br>
                                            </form>
                                            <br>
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
    <!-- End Row -->
</div>
<!-- Modal footer -->

<!-- </div>
</div>
</div>
</div> -->

<!-- driver modal -->
<div class="container">
    <div class="modal fade" id="editCompanyModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company</h4>
                    <button type="button" class="close" id="closemodel">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form name="editCompanyForm" id="editCompanyForm" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <input type="hidden" name="_token" id="newcsrf2"
                                                    value="{{Session::token()}}">
                                                <input type="hidden" name="up_comId" id="up_comId1">
                                                <input type="hidden" name="up_comSubId" id="up_comSubId">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="up_companyName">Company Name<span
                                                                class="required"></span></label>
                                                        <input type="text" class="form-control" name="up_companyName"
                                                            id="up_companyName" placeholder="Company Name">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_shippingAddress">Shipping Address</label>
                                                        <input type="text" class="form-control"
                                                            name="up_shippingAddress" id="up_shippingAddress"
                                                            placeholder="Shipping Address">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_telephoneNo">Telephone No<span
                                                                class="required"></span></label>
                                                        <input type="tel" class="form-control telephone4"
                                                            name="up_telephoneNo" id="up_telephoneNo"
                                                            placeholder="Telephone No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_faxNo">Fax No</label>
                                                        <input type="text" class="form-control" name="up_faxNo"
                                                            id="up_faxNo" placeholder="Fax No">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="up_mcNo">M.C. No</label>
                                                        <input type="text" class="form-control" name="up_mcNo"
                                                            id="up_mcNo" placeholder="M.C. No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_usDotNo">US DOT No</label>
                                                        <input type="text" class="form-control" name="up_usDotNo"
                                                            id="up_usDotNo" placeholder="US DOT No">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="up_mailingAddress">Email Address<span
                                                                class="required"></span></label>
                                                        <input type="email" class="form-control"
                                                            name="up_mailingAddress" id="up_mailingAddress"
                                                            placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="customerBFactoringCompany">Factoring Company <span
                                                                class="glyphicon glyphicon-plus-sign"
                                                                id="plusFactoringCompany"></span></label>
                                                        <div class="dropdown show">
                                                            <input class="form-control customerBFactoringCompanySet"
                                                                list="customerBFactoringCompanySet"
                                                                name="customerBFactoringCompany"
                                                                id="customerBFactoringCompany2">
                                                            <datalist id="customerBFactoringCompanySet"
                                                                class="customerBFactoringCompanySet">
                                                                <option>Select Here</option>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="up_website">Website</label>
                                                        <input type="text" class="form-control" name="up_website"
                                                            id="up_website" placeholder="Website">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="filenew">Upload File</label>
                                                        <input type="file" class="form-control" name="filenew"
                                                            id="filenew">
                                                    </div>
                                                </div>
                                                <br>
                                                <a type="submit" class="btn btn-primary companyDataUpdate"
                                                    data-dismiss="modal">Submit</a>
                                                <br>
                                            </form>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closemodelfooter">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>