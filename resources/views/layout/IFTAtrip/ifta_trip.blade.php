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
                        <div class="form-group col-md-2">
                            <label>Year</label>
                            <select class="form-control yearIftaTripFilter"  style="width: 175px;">
                                <option>-- select Year --</option>
                                <?php $year = 2020;
                                $curryear = date("Y"); 
                                for ($i = 0; $i <= 15; $i++) { ?>
                                    <option value="<?php echo $year; ?>"
                                        <?php if($curryear == $year){ echo "selected";}?>>
                                        <?php echo $year++; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>quarter</label>
                            <select class="form-control quarterIftaTripFilter"  style="width: 175px;">
                                <?php $month = date("n");
                                $yearQuarter = ceil($month / 3);
                                for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($yearQuarter == $i){echo "selected";}?>>
                                        <?php 
                                            if($i == 1){echo $i." (1 Jan - 31 Mar)";}
                                            else if($i == 2){echo $i." (1 Apr - 30 Jun)";}
                                            else if($i == 3){echo $i." (1 Jul - 30 Sept)";}
                                            else {echo $i." (1 Oct - 31 Dec)";}
                                                
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button id="verifyIftaTripButton" class="button-29 verifyIftaTripButton" style="margin-top: 27px;"><i
                                    class="fas fa-paper-plane"></i>&nbsp;Submit
                            </button>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 editable-file-datatable">
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

                                        <tbody id="iftaTripTableVeri">
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
                        <div class="form-group col-md-2">
                            <label>Year</label>
                            <select class="form-control quarterIftaTripFilter" style="width: 175px;">
                                <?php $month = date("n");
                                $yearQuarter = ceil($month / 3);
                                for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<?php echo $i; ?>" <?php if($yearQuarter == $i){echo "selected";}?>>
                                        <?php 
                                            if($i == 1){echo $i." (1 Jan - 31 Mar)";}
                                            else if($i == 2){echo $i." (1 Apr - 30 Jun)";}
                                            else if($i == 3){echo $i." (1 Jul - 30 Sept)";}
                                            else {echo $i." (1 Oct - 31 Dec)";}
                                                
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label>quarter</label>
                            <select class="form-control quarterIftaTripFilter" style="width: 175px;">
                                <option value="1"> (1 Jan - 31 Mar)</option>
                                <option value="2"> (1 Apr - 30 Jun)</option>
                                <option value="3"> (1 Jul - 30 Sept)</option>
                                <option value="4"> (1 Oct - 31 Dec)</option>
                                <!-- </?php $month = date("n");
                                $yearQuarter = ceil($month / 3);
                                for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<.?php echo $i; ?>" <.?php if($yearQuarter == $i){echo "selected";}?>>
                                        <.?php 
                                            if($i == 1){echo $i." (1 Jan - 31 Mar)";}
                                            else if($i == 2){echo $i." (1 Apr - 30 Jun)";}
                                            else if($i == 3){echo $i." (1 Jul - 30 Sept)";}
                                            else {echo $i." (1 Oct - 31 Dec)";}
                                                
                                        ?>
                                    </option>
                                <.?php } ?> -->
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" class="check_data_type_very">
                            <button class="button-29 verifyIftaTripButton" style="margin-top: 27px;"><i
                                    class="fas fa-paper-plane"></i>&nbsp;Submit
                            </button>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="table-responsive export-table">
                                    <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 editable-file-datatable">
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
                                            <form>
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







                                        <div class="container mt-5">
                                            <h2>How to Add Google Map in Laravel? - ItSolutionStuff.com</h2>
                                            <div id="map"></div>
                                        </div>
                                    
                                        <script type="text/javascript">
                                            function initMap() {
                                            const myLatLng = { lat: 22.2734719, lng: 70.7512559 };
                                            const map = new google.maps.Map(document.getElementById("map"), {
                                                zoom: 5,
                                                center: myLatLng,
                                            });
                                    
                                            new google.maps.Marker({
                                                position: myLatLng,
                                                map,
                                                title: "Hello Rajkot!",
                                            });
                                            }
                                    
                                            window.initMap = initMap;
                                        </script>





                                        <div class="col-6"> 
                                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9582232.50611952!2d-15.018621277200884!3d54.101895793749215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1673255619485!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
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
