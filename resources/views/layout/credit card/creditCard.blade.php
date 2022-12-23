<!------------------------------------------------------------------- Trailer modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="creditCardModal">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Credit Card</h4>
                    <button type="button" class="button-24 creditCardClose" >&times;</button>
                </div>

                <div style="margin-top: 15px; margin-left: 15px;">
                    <a href="#" class="button-57" data-toggle="modal"data-target="#addDriverModal"><i class="fa fa-plus" aria-hidden="true"></i><span>Add</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i></span><span>Export CSV</span></a>
                    <a class="button-57" data-toggle="modal"><i class="fa fa-upload" aria-hidden="true"></i></span><span>Upload File</span></a>
                    <a href="#" class="button-57_alt" data-toggle="modal" data-target="#contractCategoryModal"><i class="fa fa-id-card" aria-hidden="true"></i></span><span>Button 3</span></a>
                    <div class="searchbar" style="float: right; margin-right: 15px;">
                        <input type="text" placeholder="search" />
                        <!-- <div class="symbol">
                            
                            <svg class="lens">
                            <use xlink:href="#lens" />
                            </svg>
                        </div> -->
                    </div>

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
                                                <th >No</th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="creditCardTable">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th >No</th>
                                                <th >Name of Bank</th>
                                                <th >Name to Display</th>
                                                <th >Card Type</th>
                                                <th >Card Holder Name</th>
                                                <th >Card#</th>
                                                <th >Opening Bal Date</th>
                                                <th >Card Limit</th>
                                                <th >Opening Balance</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="button-29 creditCardClose">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>