<!------------------------------------------------------------------- Status modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="StatusModal" role="dialog">
        <div class="modal-dialog custom_modal_small_4 modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Status</h5>
                    <button type="button" class="button-24 StatusClose" >×</button>
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <table id="Status_table_pagination" class="table">
                                                <thead class="thead_th">
                                                    <tr class="tr tr-sect">
                                                        <th>NO</th>
                                                        <th>Status Name</th>
                                                        <th>Status Color</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="statusBody">
                                                    <tr class="tr add-sect">
                                                        <th>1</th>
                                                        <td>Open</td>
                                                        <td>
                                                            <div class="Open"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>2</th>
                                                        <td>Dispatched</td>
                                                        <td>
                                                            <div class="Dispatched"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>3</th>
                                                        <td>Arrived Shipper</td>
                                                        <td>
                                                            <div class="Arrived_Shipper"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>4</th>
                                                        <td>Loaded</td>
                                                        <td>
                                                            <div class="Loaded"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect"> 
                                                        <th>5</th>
                                                        <td>On Route</td>
                                                        <td>
                                                            <div class="On_Route"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>6</th>
                                                        <td>Arrived Consignee</td>
                                                        <td>
                                                            <div class="Arrived_Consignee"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>7</th>
                                                        <td>Delivered</td>
                                                        <td>
                                                            <div class="Delivered"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>8</th>
                                                        <td>Break Down</td>
                                                        <td>
                                                            <div class="Break_Down"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>9</th>
                                                        <td>Invoiced</td>
                                                        <td>
                                                            <div class="Invoiced"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="tr add-sect">
                                                        <th>10</th>
                                                        <td>Completed</td>
                                                        <td>
                                                            <div class="Completed"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Status Name</th>
                                                        <th>Status Color</th>
                                                    </tr>
                                                </tfoot>
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
                        <button class="button-29" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="button-29 StatusClose" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Status modal------------------------------------------------------------------->


<!-- <script>

$(document).ready(function() {
    $('#Status_table_pagination').DataTable({

        info: false,

        "columnDefs": [
            {
                "targets": [ 2 ],
                "searchable": false,
                "sortable":false
            },
        ]

    });
});

</script> -->