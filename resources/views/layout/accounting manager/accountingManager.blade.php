<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="accManagModal" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account</h5>
                    <button type="button" class="button-24" data-dismiss="modal">×</button>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div style="margin-top: 15px; margin-left: 15px;">
                            <nav class="nav d-sm-flex d-block">
                                <button class="button-57_alt2 Delivered_tab" data-bs-toggle="tab" href="#tab_Delivered"><i class="fas fa fa-truck" style='font-size:15px;' aria-hidden="true"></i><span><i class="fas fa fa-truck" style='color:white;' aria-hidden="true"></i><br>Delivered</span></button>
                                
                                <button class="button-57_alt2 Invoiced_tab" data-bs-toggle="tab" href="#tab_Invoiced"><i class="fa fa-usd" style='font-size:15px;' aria-hidden="true"></i><span><i class="fa fa-usd" style='color:white;' aria-hidden="true"></i><br>Invoiced</span></button>
                                
                                <button class="button-57_alt2 Completed_tab" data-bs-toggle="tab" href="#tab_Completed"><i class="fa fa-check" style='font-size:15px;' aria-hidden="true"></i><span><i class="fa fa-check" style='color:white;' aria-hidden="true"></i><br>Completed</span></button>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-md-3">
                    </div> -->
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3" style="">
                        <div style="margin-top: 15px; float:right;">
                            <button type="button" class="btn btn-outline-info btn-pill dropdown-toggle" data-bs-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-plus-title">
                                    Dropdown
                                    <b class="fa fa-angle-up" aria-hidden="true"></b>
                                </li>
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="margin-top: 15px;">
                            <input class="form-control" placeholder="Search for results..." type="search">
                        </div>
                    </div>
                </div>                    						
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                    <div class="panel panel-primary">
                        <div class="panel-body tabs-menu-body">
                            <div class="tab-content">
                                <div class="tab-pane active " id="tab_Delivered">
                                    <input type="hidden" name="_token" id="_tokenChangeAccountStatus" value="{{ csrf_token() }}"  >
                                    <caption>Delivered Table</caption>
                                    <table id="delivered_table_pagination" class="table">
                                        
                                        <thead class="thead_th">
                                            <tr class="tr">
                                                <th>ID</th>
                                                <th>Invoice</th>
                                                <th>Load</th>
                                                <th>Ship Date</th>
                                                <th>Customer</th>
                                                <th>Load Pay</th>
                                                <th>Driver/Carrier/Owner Operator</th>
                                                <th>Driver/Carrier/Owner Operator Pay</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="AccManaDeliveredTable">

                                        </tbody>
                                        <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th>ID</th>
                                                <th>Invoice</th>
                                                <th>Load</th>
                                                <th>Ship Date</th>
                                                <th>Customer</th>
                                                <th>Load Pay</th>
                                                <th>Driver/Carrier/Owner Operator</th>
                                                <th>Driver/Carrier/Owner Operator Pay</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_Invoiced">
                                    <caption>Invoiced Table</caption>
                                        <table id="editable-file-datatable1" class="table">
                                            <thead class="thead_th">
                                                <tr class="tr">
                                                    <th>ID</th>
                                                    <th>Invoice</th>
                                                    <th>Load</th>
                                                    <th>Ship Date</th>
                                                    <th>Customer</th>
                                                    <th>Load Pay</th>
                                                    <th>Driver/Carrier/Owner Operator</th>
                                                    <th>Driver/Carrier/Owner Operator Pay</th>
                                                    <th>INV Date</th>
                                                    <th>Rec Due Date</th>
                                                    <th>Invoice Received Date</th>
                                                    <th>Pay Due Date</th>
                                                    <th>Status</th>
                                                    <th>Notes</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AccManaInvoicedTable">

                                            </tbody>
                                            <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th>ID</th>
                                                <th>Invoice</th>
                                                <th>Load</th>
                                                <th>Ship Date</th>
                                                <th>Customer</th>
                                                <th>Load Pay</th>
                                                <th>Driver/Carrier/Owner Operator</th>
                                                <th>Driver/Carrier/Owner Operator Pay</th>
                                                <th>INV Date</th>
                                                <th>Rec Due Date</th>
                                                <th>Invoice Received Date</th>
                                                <th>Pay Due Date</th>
                                                <th>Status</th>
                                                <th>Notes</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        </table>
                                </div>
                                <div class="tab-pane" id="tab_Completed">
                                    <caption>Completed Table</caption>
                                        <table id="editable-file-datatable1" class="table">
                                            <thead class="thead_th">
                                                <tr class="tr">
                                                    <th>ID</th>
                                                    <th>Invoice</th>
                                                    <th>Load</th>
                                                    <th>Ship Date</th>
                                                    <th>Customer</th>
                                                    <th>Load Pay</th>
                                                    <th>Driver/Carrier/Owner Operator</th>
                                                    <th>Total</th>
                                                    <th>INV Date</th>
                                                    <th>Invoice Received Date</th>
                                                    <!-- <th>Receive Date</th>
                                                    <th>Pay Date</th> -->
                                                    <th>Notes</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="AccManaCompleteTable">

                                            </tbody>
                                            <tfoot class="thead_th">
                                            <tr class="tr">
                                                <th>ID</th>
                                                <th>Invoice</th>
                                                <th>Load</th>
                                                <th>Ship Date</th>
                                                <th>Customer</th>
                                                <th>Load Pay</th>
                                                <th>Driver/Carrier/Owner Operator</th>
                                                <th>Total</th>
                                                <th>INV Date</th>
                                                <th>Invoice Received Date</th>
                                                <!-- <th>Receive Date</th>
                                                <th>Pay Date</th> -->
                                                <th>Notes</th>
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
                    <form action="{{route('download-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                    <!-- <button class="btn btnclose" style="background-color:red;" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>