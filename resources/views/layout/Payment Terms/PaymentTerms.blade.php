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
    <div class="modal fade" data-backdrop="static" id="PaymentTermsModal2" >
        <div class="modal-dialog custom_modal_small_4 modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Payment Terms</h4>
                    <button type="button" class="button-24 PaymentTermsClose" data-dismiss="modal">&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a href="#" class="button-57_alt" id="AddPaymentTerms"><i class="fa fa-plus" aria-hidden="true"></i><span>Add PaymentTerms</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">

                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th>Name</th>
                                                        <th>Location</th>
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
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{route('download-pdf')}}" method="post" target="__blank">
                    @csrf
                    @if($exportUser == 1)
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    @endif
                </form>
                    <button type="button" class="button-29 branchOfficeClose" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-------------------------------------------------------------------over driver modal------------------------------------------------------------------->
<!------------------------------------------------------------------- Payment Terms modal ------------------------------------------------------------------->

<!-- <div class="container" >
  <div class="modal fade" id="PaymentTermsModal" data-backdrop="static" style="z-index:10000000000;"> >
    <div class="modal-dialog custom_modal_small_5 modal-dialog-scrollable">
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
                        <select class="form-control" id="NetDays" >
                            @for ($i = 0; $i <= 180; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>    
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
<!------------------------------------------------------------------ over Payment Terms modal ------------------------------------------------------------------>

