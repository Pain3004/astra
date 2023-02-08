<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addRecurrence">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small2" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Recurrence</h4>
                    <button type="button" class="button-24" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <!-- Row -->
                    <div class="container">
                        <table class=" table-responsive other-table" id="otherTable">
                            <thead>
                                <tr>
                                    <td>Fix Pay Category <span style="color:#ff0000">*</span> <i title="Add Reccurence" class="mdi mdi-plus-circle plus" id="plusReccurence" style="color:blue !important"></i></td>
                                    <td>Installment Type <span style="color:#ff0000">*</span></td>
                                    <td>Amount <span style="color:#ff0000">*</span></td>
                                    <td>Installment <span style="color:#ff0000">*</span></td>
                                    <td>start# <span style="color:#ff0000">*</span></td>
                                    <td>start Date <span style="color:#ff0000">*</span></td>
                                    <td>Internal Note <span style="color:#ff0000">*</span></td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody id="TextBoxContainer2">
                                <td width="150">

                                    <input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="PlusRecurrence" id="PlusRecurrence">
                                    <datalist id="driverPlusRecurrence" class="driverPlusRecurrence"></datalist>

                                </td>
                                <td width="150">
                                    <input class="form-control" name="installmentType" list="instatype1" autocomplete="off" />
                                </td>
                                <td width="100">
                                    <input name="amount" type="text" class="form-control" />
                                </td>
                                <td width="100">
                                    <input name="installment" type="text" class="form-control" />
                                </td>
                                <td width="100">
                                    <input name="startNo" type="text" class="form-control" />
                                </td>
                                <td width="10">
                                    <input name="startDate" type="date" class="form-control" />
                                </td>
                                <td width="250">
                                    <textarea rows="1" cols="20" class="form-control" type="textarea"
                                        name="internalNote"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                            <tfoot>
                                <tr>
                                    <th colspan="12" class="tableFooter" style="text-align:left;">
                                        <button id="btnAdd2" type="button" class="button-29" data-toggle="tooltip"
                                            data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD
                                        </button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- End Row -->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 65%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                    <button type="button" class="button-29"><i class="mdi mdi-shield-lock-outline"></i> Save </button>
                    <button type="button" class="button-29" data-dismiss="modal">Close</button>
                </div>

                <datalist id="fixpaycat">

                </datalist>
                <datalist id="instatype1">
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly"></option>
                    <option value="yearly"></option>
                    <option value="Quarterly"></option>
                </datalist>

            </div>
        </div>
    </div>
</div>