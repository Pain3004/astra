<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!-------------------------------------------------------------------  modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="PaymentTermsModal2">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Payment Terms</h4>
                    <button type="button" class="button-24 PaymentTermsClose" data-dismiss="modal">&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a href="#" class="buttom-29" style="position: relative;
    overflow: hidden;
    border: transparent;
    color: #fff;
    display: inline-block;
    border-radius: 3px;
    font-size: 12px;
    text-align: center;
    line-height: 15px;
    padding: 10px 0px 10px;
    text-decoration: none;
    cursor: pointer;
    background: #1b71bc;
    /* background: linear-gradient(272deg, #00b5fd 0%, #0047b1 100%); */
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    font-weight: 600;
    width: 115px;" id="AddPaymentTerms"><span>Add PaymentTerms</span></a>
                @endif 
                @if($deleteUser== 1)    
                    <a href="#" class="buttom-29" style="position: relative;
    overflow: hidden;
    border: transparent;
    color: #fff;
    display: inline-block;
    border-radius: 3px;
    font-size: 12px;
    text-align: center;
    line-height: 15px;
    padding: 10px 0px 10px;
    text-decoration: none;
    cursor: pointer;
    background: #1b71bc;
    /* background: linear-gradient(272deg, #00b5fd 0%, #0047b1 100%); */
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    font-weight: 600;
    width: 115px;" id="restorePaymentTerms"></span><span>Restore </span></a>
                @endif

                </div>
                <!-- Modal body -->
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th" style="height:40px;">
                  <tr class="tr">
                                                        <th>NO</th>
                                                        <th style="display:none;">NO</th>
                                                        <th>Name</th>
                                                        <th>Net Days</th>
                                                        <th>Action</th>
                                                    </tr>
                  </thead>
                  <tbody id="PaymentTermsTable" class="load-box"></tbody>
                </table>
              </div>
                <!-- <div class="modal-body" style="overflow-y: auto !important;">

                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">

                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th style="display:none;">NO</th>
                                                        <th>Name</th>
                                                        <th>Net Days</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="PaymentTermsTable">

                                                </tbody>
                                            </table>
                                        </div>
                               
                            </div>
                        </div>
                    </div>
                    
                </div> -->

                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form>
                    <button type="button" class="button-29 PaymentTermsClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-------------------------------------------------------------------over  modal------------------------------------------------------------------->
<!------------------------------------------------------------------- edit modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editPaymentTermsModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pay Terms</h5>
                    <button type="button" class="button-24 editPayTermsClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                            <input type="hidden" name="_token" id="tokeneditPaymentTErms" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="" id="PayTermsid"  />
                                            <input type="hidden" name="" id="PayTermsComid"  />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_PaymentTErms_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Net Days <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_PaymentTErms_Days" placeholder=" Location">
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
                </div>
                <div class="modal-footer">
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <!-- <button class="button-29" style="vertical-align:middle"><span>Export</span></button> -->
                    </form>
                    <button type="button" class="button-29" id="PayTermsUpdate" >update</button>
                    <button type="button" class="button-29 editPayTermsClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End edit  modal------------------------------------------------------------------->

<!------------------------------------------------------------------ end ------------------------------------------------------------------>
<!------------------------------------------------------------------- start restore ------------------------------------------------------------------->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="RestorePaymentTermsModal">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Restore Payment Terms</h4>
                    <button type="button" class="button-24 restorePaymentTermsclose" data-dismiss="modal">&times;</button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                    <input type="hidden" name="checked_id" id="checked_PaymentTerms" value="">
                    <input type="hidden" name="company_id" id="checked_PaymentTerms_company_ids" value="">
                    <button id="restore_PaymentTermsData"  class="button-57_alt restore_PaymentTermsData" disabled><i class="fa fa-repeat" aria-hidden="true"></i><span>Restore </span></button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th scope="col"><input type="checkbox" name="all_ids[]" class="PaymentTerms_all_ids" style="height: 15px;"></th>
                                                <th>Name</th>
                                                <th>Net Days</th>
                                            </tr>
                                        </thead>
                                        <tbody id="RestorePaymentTermsTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 restorePaymentTermsclose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------- End restore ------------------------------------------------------------------->
