<!-- ==================================start  aging report ============================== -->
<div class="container">
    <div class="modal fade" data-backdrop="static" id="ViewAgingReport">
        <div class="modal-dialog modal-dialog-scrollable custom_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aging Report</h4>
                    <button type="button" class="button-24 closeViewAgingReport" >&times;</button>
                </div>
                <div class="modal-body custom-modal-body" style="padding: 0rem;">
                    <a class="button-29 reportagi" data-toggle="tab" href="#report" role="tab">
                        Report
                    </a>
                    <a class="button-29 currentagi" data-toggle="tab" href="#current" role="tab">
                        Current
                    </a>                        
                    <div class="tab-content pt-2">
                        <div class="tab-pane active" id="report" role="tabpanel">
                            <div style="margin-top: 15px; margin-left: 15px;">
                                <div class="form-group col-md-3" data-name="aging_cname_rec">
                                    <label>Company Name</label>
                                    <select class="form-control" id="agingcompany" name="agingcompany">
                                        <option>-----select Company-------</option>
                                    </select>
                                    <label>As Of</label>
                                    <div>
                                        <input class="form-control" value="<?php echo date("Y-m-d");?>" placeholder="AS OF"
                                            type="date" id="agingasof">
                                    </div>
                                </div>  
                            </div>
                            <div class="modal-body" style="overflow-y: auto !important;">
                                <div class="row">
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="table-responsive export-table">
                                                <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                                    <thead class="thead_th">
                                                        <tr class="tr">
                                                            <th >Average Days</th>
                                                            <th >Customer</th>
                                                            <th >Estimated (7 Days)</th>
                                                            <th >1-30</th>
                                                            <th >31-60</th>
                                                            <th>61-90</th>
                                                            <th>91 & over</th>
                                                            <th>Total</th>
                                                            <th>Uncleared Amount</th>
                                                            <th>Difference</th>
                                                        </tr>
                                                    </thead>
            
                                                    <tbody id="ViewAgingReportTable">
            
                                                    </tbody>
                                                    <tfoot class="thead_th">
                                                        <tr class="tr">
                                                        <th >Average Days</th>
                                                            <th >Customer</th>
                                                            <th >Estimated (7 Days)</th>
                                                            <th >1-30</th>
                                                            <th >31-60</th>
                                                            <th>61-90</th>
                                                            <th>91 & over</th>
                                                            <th>Total</th>
                                                            <th>Uncleared Amount</th>
                                                            <th>Difference</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="current" role="tabpanel">
                            <div style="margin-top: 15px; margin-left: 15px;">
                                <a href="#" class="button-29">current</a>
                            </div>
                            <div class="modal-body" style="overflow-y: auto !important;">
                                <div class="row">
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="table-responsive export-table">
                                                <table  class="table editable-table table-nowrap table-bordered table-edit wp-100 customtable">
                                                    <thead class="thead_th">
                                                        <tr class="tr">
                                                            <th >Invoice Received Date</th>
                                                            <th >Invoice No</th>
                                                            <th >Total Rate</th>
                                                            <th >Carrier Name</th>
                                                        </tr>
                                                    </thead>
            
                                                    <tbody id="ViewAgingReportTable">
            
                                                    </tbody>
                                                    <tfoot class="thead_th">
                                                        <tr class="tr">
                                                            <th >Invoice Received Date</th>
                                                            <th >Invoice No</th>
                                                            <th >Total Rate</th>
                                                            <th >Carrier Name</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="mandatory" style="position: absolute;left: 11px">Note: 
                    <span  class='badge badge-pill badge-success' style='font-size:12px !important'>A</span> 1-20 Days | |
                    <span class='badge badge-pill badge-info' style='font-size:12px !important'>B</span> 21-30 Days | |
                    <span class='badge badge-pill badge-warning' style='font-size:12px !important'>C</span> 31-40 Days | |
                    <span class='badge badge-pill badge-light' style='font-size:12px !important'>D</span> 41-60 Days | |
                    <span class='badge badge-pill badge-danger' style='font-size:12px !important'>E</span> Above 60
                    Days</span>
                    <button type="button" class="button-29 closeViewAgingReport">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================================= end Aging Report ========================================= -->



