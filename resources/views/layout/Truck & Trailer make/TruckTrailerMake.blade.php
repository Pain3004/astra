<?php 
	$userdata=Auth::user();
	$insertUser=$userdata->privilege['insertUser'];
    // $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
 ?> 
<!------------------------------------------------------------------- view   modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="TruckTrailerMakeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_6 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Truck & Trailer Make</h5>
                    <button type="button" class="button-24 TruckTrailerMakeClose" >×</button>

                    </button>
                </div>
                <div style="margin-top: 15px; margin-left: 15px;">
                @if($insertUser== 1)
                    <a  class="button-57_alt" id="addTruckTrailerMake"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                @endif 
                
                @if($deleteUser== 1)    
                    <a href="#" class="button-57_alt" ><i class="fa fa-repeat" aria-hidden="true"></i></span><span>Restore </span></a>

                @endif
                    
                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <table id="EquipmentType_table_pagination" class="table">
                                                <thead class="thead_th">
                                                    <tr class="tr">
                                                        <th>NO</th>
                                                        <th style="display:none;">CD</th>
                                                        <!-- <th >CD</th> -->
                                                        <th>Name</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="TruckTrailerMakeTable">
                        
                                                </tbody>
                                            </table>
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
                        @if($exportUser == 1)
                            <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                        @endif
                    </form>
                    <button type="button" class="button-29 EquipmentTypeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End   modal------------------------------------------------------------------->


<!------------------------------------------------------------------- Add   modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addTruckTrailerMakeModal" role="dialog">
        <div class="modal-dialog custom_modal_small_5 " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Truck & Trailer Make</h5>
                    <button type="button" class="button-24 addTruckTrailerMakeClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: 22px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class=" export-table">
                                            <form>
                                            <input type="hidden" name="_token" id="_tokenTruckTrailerMake" value="{{ csrf_token() }}" />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="tt_name" placeholder=" Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name">Type <span style="color:#ff0000">*</span></label>
                                                            <select class="form-control select2" id="type" tabindex="-1" aria-hidden="true">
                                                                <option>Truck</option>
                                                                <option>Trailer</option>
                                                            </select>
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
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29" id="saveTruckTrailerMake" >Save</button>
                    <button type="button" class="button-29 addTruckTrailerMakeClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End Add  Type modal------------------------------------------------------------------->
<!------------------------------------------------------------------- edit modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="edittruckTrailer" role="dialog">
        <div class="modal-dialog custom_modal_small_5" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pay Terms</h5>
                    <button type="button" class="button-24 edittruckTrailerClose" >×</button>

                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: 22px;">

                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="export-table">
                                            <form>
                                                <input type="hidden" name="_token" id="tokenedittruckTrailer" value="{{ csrf_token() }}" />
                                                <input type="hidden" name="" id="truckTrailerid"  />
                                                <input type="hidden" name="" id="truckTrailerComid"  />
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="up_truckTrailer_name">Name <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control required" id="up_truckTrailer_name" >
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="up_truckTrailer_type">Type <span style="color:#ff0000">*</span></label>
                                                        <input type="text" class="form-control" id="up_truckTrailer_type" disabled>

                                                        <!-- <select  class="form-control  " type="text" id="up_truckTrailer_type" name="cardType" >
                                                            <option>Truck</option>
                                                            <option>Trailer</option>
                                                        </select> -->
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
                    <button type="button" class="button-29" id="truckTrailerUpdate" >update</button>
                    <button type="button" class="button-29 edittruckTrailerClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------End edit  modal------------------------------------------------------------------->


<!-------------------------------------------------------------------End    modal------------------------------------------------------------------->


