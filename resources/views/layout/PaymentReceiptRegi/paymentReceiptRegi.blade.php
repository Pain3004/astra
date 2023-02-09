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

<!--=============================== end payment list ======================================== -->

<!--=============================== start store payment =================================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="addPaymentRegistrionModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Payment </h4>
                    <button type="button" class="closeAddPaymentRegistrion" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form  enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_token" id="_token_AddRegistrionPayment" value="{{ csrf_token() }}" />
                                            <div class="form-row">
                                                <!-- <div class="form-group col-md-2">
                                                    <label>Payment From<span class="mandatory">*</span></label>
                                                    <select class="form-control paymentFromOnChange" name="status">
                                                        <option value="1">Bank </option>
                                                        <option value="2">Credit Card</option>
                                                        <option value="3">Fuel Card</option>
                                                        <option value="4">Bank Transfer</option>
                                                    </select>
                                                </div> -->
                                                <!-- bank details ===== -->
                                                <!-- <div class="bank_1FillDetails">
                                                    <div class="from-group col-md-2">
                                                        <label>Company<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>    
                                                    <div class="from-group col-md-2">
                                                        <label>Bank Name<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Pay To <span class="mandatory">*</span></label>
                                                        <select class="form-control" id='purpose'>
                                                            <option value="0" selected="true">--select--</option>
                                                            <option value="1">Driver</option>
                                                            <option value="2">Carrier</option>
                                                            <option value="3">Factoring</option>
                                                            <option value="4">Expense</option>
                                                            <option value="5">Maintenance</option>
                                                            <option value="6">Insurance</option>
                                                            <option value="7">Credit Card</option>
                                                            <option value="8">Fuel Card</option>
                                                            <option value="9">Other</option>
                                                            <option value="10">Loan</option>
                                                        </select>
                                                    </div>
                                                </div> -->




                                                
                                                <!--============= credit card ============ -->
                                                <!-- <div class="creditCard2FillData"> 
                                                    <div class="form-group col-md-2 ">
                                                        <label>Select card <span class="mandatory">*</span></label>
                                                        <select class="form-control" id="select_card">
                                                            <option value="0" selected="true" disabled="disabled">--select--</option>
                                                            <option value="1">Main Card</option>
                                                            <option value="2">Sub Card</option>
                                                        </select>
                                                    </div> 
                                                    <div class="from-group col-md-4">
                                                        <label>Main Card<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div> 
                                                    <div class="from-group col-md-4">
                                                        <label>Sub Carde<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                    <div class="form-group col-md-2 ">
                                                        <label>Pay To <span class="mandatory">*</span></label>
                                                        <select class="form-control" id='purpose'>
                                                            <option value="0" selected="true">--select--</option>
                                                            <option value="4">Expense</option>
                                                            <option value="5">Maintenance</option>
                                                            <option value="6">Insurance</option>
                                                            <option value="7">Credit Card</option>
                                                            <option value="8">Fuel Card</option>
                                                            <option value="9">Other</option>\
                                                        </select>
                                                    </div>
                                                </div> -->


                                                <!--============= fuel card ================= -->
                                                <!-- <div class="fuelCardFillDetails">
                                                    <div class="from-group col-md-4">
                                                        <label>Fuel List<span class="mandatory">*</span></label>
                                                        <select class="form-control cardHolderName "  name="accountHolder" required ></select>
                                                    </div>  
                                                    <div class="form-group col-md-2 ">
                                                        <label>Pay To <span class="mandatory">*</span></label>
                                                        <select class="form-control" id='purpose'>
                                                            <option value="0" selected="true">--select--</option> 
                                                            <option value="1">Driver</option>
                                                            <option value="2">Carrier</option>
                                                            <option value="4">Expense</option>
                                                            <option value="5">Maintenance</option>
                                                            <option value="9">Other</option>
                                                        </select>
                                                    </div> 
                                                </div> -->

                                                <!--====== Bank Transfer ============== -->
                                                <!-- <div class="BankTransfer4FillDetails">
                                                    <div class="from-group col-md-4">
                                                        <label>Company<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Bank Name<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>To Company Name<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>To Bank Name<span class="mandatory">*</span></label>
                                                        <select class="form-control listCompanyNames "  name="accountHolder" required ></select>
                                                    </div>
                                                </div> -->

                                                <!-- <div class="otherDetailsFill">
                                                    <div class="from-group col-md-4">
                                                        <label>Bill No#</label>
                                                        <input type="text" placehpolder ="Bill No#" class="form-control"  name="accountHolder"  >
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Category<span class="mandatory">*</span></label>
                                                        <input type="text" placehpolder ="Category" class="form-control"  name="accountHolder" required >
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Amount<span class="mandatory">*</span></label>
                                                        <input type="text" placehpolder ="Amount*" class="form-control"  name="accountHolder" required >
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Transaction Date<span class="mandatory">*</span></label>
                                                        <input type="date" class="form-control"  name="accountHolder" required >
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Bill No#<span class="mandatory">*</span></label>
                                                        <input type="text" placehpolder ="Bill No#" class="form-control"  name="accountHolder" required >
                                                    </div>
                                                    <div class="form-group col-md-2 loan">
                                                        <label>Payee <span class="mandatory">*</span></label>
                                                        <div>
                                                            <input class="form-control" placeholder="Payee" type="text" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 loan" >
                                                        <label>PO BOX# </label>
                                                        <div>
                                                            <input class="form-control" placeholder="PO BOX#" type="text" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 ">
                                                        <label>Select card <span class="mandatory">*</span></label>
                                                        <select class="form-control" id="select_card">
                                                            <option value="0" selected="true" disabled="disabled">--select--</option>
                                                            <option value="1">Main Card</option>
                                                            <option value="2">Sub Card</option>
                                                        </select>
                                                    </div>
                                                    <div class="from-group col-md-4">
                                                        <label>Driver Name<span class="mandatory">*</span></label>
                                                        <select class="form-control cardHolderName "  name="accountHolder" required ></select>
                                                    </div>  
                                                    <div class="from-group col-md-4">
                                                        <label>Carrier Name<span class="mandatory">*</span></label>
                                                        <select class="form-control cardHolderName "  name="accountHolder" required ></select>
                                                    </div>  
                                                    <div class="from-group col-md-4">
                                                        <label>Factoring Name<span class="mandatory">*</span></label>
                                                        <select class="form-control cardHolderName "  name="accountHolder" required ></select>
                                                    </div> 
                                                    <div class="from-group col-md-4">
                                                        <label>Invoice</label>
                                                        <select class="form-control fuel_recepit_invoice_no_list "  name="accountHolder" required ></select>
                                                    </div> 
                                                    <div class="from-group col-md-4">
                                                        <label>Advance<span class="mandatory">*</span></label>
                                                        <input type="number" placeholder="0" class="form-control"  name="accountHolder" required >
                                                    </div> 
                                                    <div class="from-group col-md-4">
                                                        <label>Final Amount<span class="mandatory">*</span></label>
                                                        <input type="number" placeholder="0.00" class="form-control"  name="accountHolder" required >
                                                    </div>
                                                    <div class="form-group col-md-4 driver">
                                                        <label>Check/ACH Date <span class="mandatory">*</span></label>
                                                        <div>
                                                            <input class="form-control"  name="checkdate" placeholder="Check Date *"type="date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2 otherCashBank" >
                                                        <label>Transaction Date <span class="mandatory">*</span></label>
                                                        <input class="form-control" type="date" >
                                                    </div>
                                                    <div class="form-group col-md-4 driver">
                                                        <label>Cheque #</label>
                                                        <div>
                                                            <input class="form-control" name="cheque" value="0"
                                                                placeholder="Cheque #*" type="text">
                                                            <input type="hidden" class="adminbankdocid">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 driver">
                                                        <label>ACH #</label>
                                                        <div>
                                                            <input class="form-control" name="ach"   placeholder="ACH #*" type="text">
                                                        </div>
                                                    </div> 
                                                </div>
                                             
                                                <div class="form-group col-md-4">
                                                    <label>Memo</label>
                                                    <div>
                                                        <textarea rows="2" cols="30" class="form-control" type="textarea"  placeholder="Memo *" name="internal_note" required></textarea>
                                                        <input type="hidden" id="companyId" value="<?php echo Auth::user()->userName ?>">
                                                        <input type="hidden" id="company-user-name" value="<?php echo Auth::user()->userName; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Upload Files</label>
                                                    <div >
                                                        <input type="file" class="form-control"  name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf" >
                                                        
                                                    </div>
                                                </div>          -->










                    <div class="card card-default">
                        <div class="card-header">
                           Laravel 8- Razorpay Payment Gateway Integration
                        </div>
                        <div class="card-body text-center">
                           <form >
                              @csrf
                              <script src="https://checkout.razorpay.com/v1/checkout.js"
                                 data-key="{{ env('MIX_PUSHER_APP_KEY') }}"
                                 data-amount="10001" 
                                 data-currency="INR"
                                 data-buttontext="Pay 100 INR"
                                 data-name="realprogrammer.in"
                                 data-description="Rozerpay"
                                 data-image="https://realprogrammer.in/wp-content/uploads/2020/10/logo.jpg"
                                 data-prefill.name="name"
                                 data-prefill.email="email"
                                 data-theme.color="#F37254"></script>
                           </form>
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
                    <button type="button" style="vertical-align:middle" class="button-29 saveAddPaymentRegistrion"  >Save</button>
                    <button type="button"style="vertical-align:middle" class=" closeAddPaymentRegistrion button-29" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--====================================== end store payment =============================== -->

