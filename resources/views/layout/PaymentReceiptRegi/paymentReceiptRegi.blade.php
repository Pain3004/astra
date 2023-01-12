<!--====================== payment receipt registrion list start ================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="paymentReRegistrionPopModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment Registration</h4>
                    <button type="button" class="button-24 paymentReceiptRegisClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <button class="button-57_alt createPaymentReceiptModalBtn" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add </span></button>


                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
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
                                                <th >#</th>
                                                <th >Payment From</th>
                                                <th >Payment To</th>
                                                <th >Amount</th>
                                                <th >Category</th>
                                                <th >Cheque</th>
                                                <th >ACH</th>
                                                <th >Check Date</th>
                                                <th >Transaction Date</th>
                                                <th >Memo</th>
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="payment_recipt_table">

                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 paymentReceiptRegisClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

