<!------------------------------------------------------------------- Contract Category modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="contractCategoryModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Contract Category</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal Header -->
                <!-- <div class="modal-header">
                    <h4 class="modal-title">Driver Contract</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> -->

                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row-->
							<div class="row ">
								<div class="col-md-12">
									<div class="card">
                                        <div class="card-body">
                                            <a href="#addContractCategory" class="button-29" style="width:200px;" data-toggle="modal" data-target="#addContractCategory">Add Contract Category</a>
										</div>
										<div class="card-body">
                                                
                                                <div aria-multiselectable="true" class="accordion" style="width:60%;" id="accordion" role="tablist">
                                                    
                                                </div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Row-->

						</div>

                <!-- Modal footer -->
                <div class="modal-footer">
                <!-- <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="btn btn-primary" style="vertical-align:middle"><span>Export</span></button>
                    </form> -->
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!------------------------------------------------------------------ Add driver Contract Category modal ------------------------------------------------------------------>
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="addContractCategory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Driver Contract Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <form>
                                                @csrf
                                                <div class="form-row">
                                                    <input type="hidden" name="_token" id="drivercsrf0"
                                                    value="{{Session::token()}}">
                                                    <div class="form-group col-md-6">
                                                        <label for="contractCategory">Contract Category<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="contractCategory"
                                                            placeholder="Contract Category">
                                                    </div>
                                                </div>
                                                <div class="form-row" id="field_wrapper">
                                                    <div class="form-group col-md-8">
                                                    <label for="driverContractSubCategory">Contract Sub Category<span
                                                                style="color:#ff0000">*</span></label>
                                                        <input type="text" name="driverContractSubCategory[]" class="form-control driverContractSubCategory" placeholder="Contract Sub Category"/>
                                                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus" aria-hidden="true"></i></a>
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

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a type="submit" class="btn btn-primary driverContractCategorySubmit">Submit</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>