<!-- driver pay info modal -->
<div class="container">



    <div class="modal fade" data-backdrop="static" id="driverPayInfoModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small2">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Driver Pay Info</h4>
                    <button type="button" class="button-24 closeDriverPayInfo">&times;</button>
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
                                            <form method="post">
                                                @csrf
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Loaded Miles <span class="required"></span></label>
                                                        <div>
                                                            <input class="form-control" id="loadedmiles" placeholder="Loaded Mi" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Empty Miles <span class="required"></span></label>
                                                        <div>
                                                            <input class="form-control" id="emptymiles" placeholder="Empty Mi" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Picks</label>
                                                        <div>
                                                            <input class="form-control" id="pickrate" placeholder="Rate/Pick" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start After</label>
                                                        <div>
                                                            <input class="form-control" id="pickstart" placeholder="Start After" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Drops</label>
                                                        <div>
                                                            <input class="form-control" id="droprate" placeholder="Rate/Drop" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start After</label>
                                                        <div>
                                                            <input class="form-control" id="dropstart" placeholder="Start After" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Tarp</label>
                                                        <div>
                                                            <input class="form-control" id="driverTarp"  placeholder="Tarp" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                
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
                    <button type="submit" class="button-29" data-dismiss="modal" id="saveDriverPayInfo">Submit</button>
                    <button type="button" class="button-29 closeDriverPayInfo">Close</button>
                </div>

            </div>
        </div>
    </div>


</div>

<!-- driver pay info edit modal -->
<div class="container">



    <div class="modal fade" data-backdrop="static" id="driverPayInfoEditModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small_4 ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Driver Pay Info</h4>
                    <button type="button" class="button-24 closeDrivereditPayInfo">&times;</button>
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
                                            <form method="post">
                                                @csrf
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Loaded Miles <span class="required"></span></label>
                                                        <div>
                                                            <input class="form-control" id="loadedmilesedit"  placeholder="Loaded Mi" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Empty Miles <span class="required"></span></label>
                                                        <div>
                                                            <input class="form-control" id="emptymilesedit" placeholder="Empty Mi" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Picks</label>
                                                        <div>
                                                            <input class="form-control" id="pickrateedit" placeholder="Rate/Pick" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start After</label>
                                                        <div>
                                                            <input class="form-control" id="pickstartedit" placeholder="Start After" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Drops</label>
                                                        <div>
                                                            <input class="form-control" id="droprateedit"  placeholder="Rate/Drop" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Start After</label>
                                                        <div>
                                                            <input class="form-control" id="dropstartedit"  placeholder="Start After" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label>Rate/Tarp</label>
                                                        <div>
                                                            <input class="form-control" id="driverTarpedit" placeholder="Tarp" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                
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
                    <button type="submit" class="button-29" data-dismiss="modal" id="useredit">Submit</button>
                    <button type="button" class="button-29 closeDrivereditPayInfo">Close</button>
                </div>

            </div>
        </div>
    </div>


</div>