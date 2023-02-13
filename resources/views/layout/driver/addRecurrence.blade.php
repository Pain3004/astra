<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="addRecurrence">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small2" >
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Recurrence</h4>
                    <button type="button" class="button-24 closeDriverAddRecurrence">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id='adddriverRecurrenceForm'> 
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
                                        <input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="rec_PlusRecurrence[]" id="rec_PlusRecurrence" autocomplete="off" required>
                                    </td>
                                    <td width="150">
                                        <input class="form-control" name="rec_installmentType[]" list="instatype1" autocomplete="off" required/>
                                    </td>
                                    <td width="100">
                                        <input name="rec_amount[]" type="text" class="form-control" required/>
                                    </td>
                                    <td width="100">
                                        <input name="rec_installment[]" type="text" class="form-control" required/>
                                    </td>
                                    <td width="100">
                                        <input name="rec_startNo[]" type="text" class="form-control" required/>
                                    </td>
                                    <td width="10">
                                        <input name="rec_startDate[]" type="date" class="form-control" required/>
                                    </td>
                                    <td width="250">
                                        <textarea rows="1" cols="20" class="form-control" type="textarea" name="rec_internalNote[]" required></textarea>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span> </button>
                                    </td>
                                <tfoot>
                                    <tr>
                                        <th colspan="12" class="tableFooter" style="text-align:left;">
                                            <button id="btnAdd2" type="button" class="button-29" data-toggle="tooltip" data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD </button>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- End Row -->
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 65%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                    <button type="button" class="button-29" id="saveDriverAddRecurrence"><i class="mdi mdi-shield-lock-outline"></i> Save </button>
                    <button type="button" class="button-29 closeDriverAddRecurrence">Close</button>
                </div>

                <!-- <datalist id="fixpaycat">

                </datalist> -->
                <datalist id="driverPlusRecurrence" class="driverPlusRecurrence">

                </datalist>
                <datalist id="instatype1">
                    <option value="Weekly"></option>
                    <option value="Monthly"></option>
                    <option value="yearly"></option>
                    <option value="Quarterly"></option>
                </datalist>

            </div>
        </div>
    </div>
</div>