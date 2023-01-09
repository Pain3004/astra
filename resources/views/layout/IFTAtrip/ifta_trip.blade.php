<!--=============================== start verify trip list =========================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="IftaTripModalList">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verify Trip</h4>
                    <button type="button" class="button-24 closeIftaTrip" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">                    
                    <button class="button-29 VerifyTrip" >Verify Trip</button>
                    <button class="button-29 notVerifyTrip" >Not Verify Trip</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                        <thead class="thead_th">
                                            <tr  class="tr">
                                                <th >#</th>
                                                <th>Invoice</th>
                                                <th>Truck</th>
                                                <th>Start Location</th>
                                                <th>Shipper Location</th>
                                                <th>Consignee Location</th>
                                                <th>End Location</th>
                                                <th>Ship Date</th>
                                                <th>Empty Miles</th>
                                                <th>Total Miles </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="iftaTripTable">
                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th >#</th>
                                                <th>Invoice</th>
                                                <th>Truck</th>
                                                <th>Start Location</th>
                                                <th>Shipper Location</th>
                                                <th>Consignee Location</th>
                                                <th>End Location</th>
                                                <th>Ship Date</th>
                                                <th>Empty Miles</th>
                                                <th>Total Miles </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeIftaTrip">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=============================== start verify trip list =========================== -->


<!--================================== not verify trip ========================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="NotVerifyIftaTripModalList">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Not Verify Trip</h4>
                    <button type="button" class="button-24 closeIftaTrip" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                <button class="button-29 VerifyTrip" > Verify Trip</button>
                 <button class="button-29 notVerifyTrip" >Not Verify Trip</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                        <thead class="thead_th">
                                            <tr  class="tr">
                                                <th >#</th>
                                                <th>Invoice</th>
                                                <th>Truck</th>
                                                <th>Start Location</th>
                                                <th>Shipper Location</th>
                                                <th>Consignee Location</th>
                                                <th>End Location</th>
                                                <th>Ship Date</th>
                                                <th>Empty Miles</th>
                                                <th>Total Miles </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="notVerifyIftaTripTable">
                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th >#</th>
                                                <th>Invoice</th>
                                                <th>Truck</th>
                                                <th>Start Location</th>
                                                <th>Shipper Location</th>
                                                <th>Consignee Location</th>
                                                <th>End Location</th>
                                                <th>Ship Date</th>
                                                <th>Empty Miles</th>
                                                <th>Total Miles </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-29 closeIftaTrip">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== end not verify trip ============================ -->
<!-- edit verifyed trip  -->
<!--========================== start edit  ifta toll create ====================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="update_iftaVerifyedTripModal" role="dialog">
        <div class="modal-dialog custom_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Verify Ifta/ Invoice #<span class="invoice_number_verify"></span>Status:Invoiced</h4>
                    <button type="button" class="close_iftaVerifyedTripModal" >&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row row-sm">
                            <!-- <div class="col-lg-12"> -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-6">
                                            <form id="" >
                                                @csrf                                          
                                                <div class="form-row">
                                                    <h4> Route Points</h4>
                                                    <div class="form-group col-md-12">
                                                        <label >Start Location</label>
                                                        <div>
                                                            <button class="btn btn-danger">-</button><input type="text" name="start_location"><button class="btn btn-primary">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label >Shipper  Location</label>
                                                        <div>
                                                            <button class="btn btn-danger">-</button><input type="text" name="Shipper_location"><button class="btn btn-primary">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label >Consignee  Location</label>
                                                        <div>
                                                            <button class="btn btn-danger">-</button><input type="text" name="Consignee_location"><button class="btn btn-primary">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label >End Location</label>
                                                        <div>
                                                            <button class="btn btn-danger">-</button><input type="text" name="end_location"><button class="btn btn-primary">+</button>
                                                        </div>
                                                    </div>
                                                   
                                                </div> 
                                            </form>
                                        </div>
                                        <div class="col-6"> 
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9582232.50611952!2d-15.018621277200884!3d54.101895793749215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1673255619485!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                        <div clas="col-6"> 
                                                <h3>Summery </h3>
                                        </div>
                                        <div class="col-6"> 
                                            <h3>Miles/State </h3>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="vertical-align:middle" class="button-29 update_ifta_trip "  >Update</button>
                    <button type="button"style="vertical-align:middle" class="  button-29 close_iftaVerifyedTripModal" >Close</button>
                </div>          
            </div>
        </div>
    </div>
</div>
<!--============================== end edit verifyed trip  ============================= -->
