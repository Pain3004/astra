<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="TrailerModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Trailer</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                <a href="#addDriverModal" class="button-57" data-toggle="modal"
                                                data-target="#addDriverModal"><i class="fa fa-plus" aria-hidden="true"></i><span>Button 1</span></a>
                                            <a href="#setupDriverModal" class="button-57" data-toggle="modal"
                                                data-target="#setupDriverModal"><i class="fa fa-sliders" aria-hidden="true"></i></span><span>Button 2</span></a>
                                            <a href="#contractCategoryModal" class=" contract_categoryModal button-57_alt" data-toggle="modal"
                                                data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a>

                </div>
                <!-- Modal body -->
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                

                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th style="">Name</th>
                                                        <th>Email</th>
                                                        <th>Location</th>
                                                        <th>Social Security No</th>
                                                        <th>Date of Birth</th>
                                                        <th>Date of Hire</th>
                                                        <th>License No</th>
                                                        <th>LIS</th>
                                                        <th>License Exp.Date</th>
                                                        <th>Driver Balance</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="">

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
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>