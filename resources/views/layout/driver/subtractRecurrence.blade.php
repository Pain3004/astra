<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="substractRecurrence">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small2">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Substract Recurrence</h4>
                    <button type="button" class="button-24 closeDriverSubRecurrence">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id='subdriverRecurrenceForm'> 
                        <div class="container">
                            <table class=" table-responsive other-table" id="otherTable">
                                <thead>
                                    <tr>
                                        <td>Category<span style="color:#ff0000">*</span> <i title="Add Reccurence" class="mdi mdi-plus-circle plus" id="plusReccurencesubtract" style="color:blue !important"></i></td>
                                        <td>Installment Type <span style="color:#ff0000">*</span></td>
                                        <td>Amount <span style="color:#ff0000">*</span></td>
                                        <td>Installment <span style="color:#ff0000">*</span></td>
                                        <td>start# <span style="color:#ff0000">*</span></td>
                                        <td>start Date <span style="color:#ff0000">*</span></td>
                                        <td>Internal Note <span style="color:#ff0000">*</span></td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody id="TextBoxContainer3">
                                    <td width="150">
                                        <!-- <input class="form-control driverPlusRecurrence_sub" list="driverPlusRecurrence_sub" name="rec_PlusRecurrence_sub[]" id="rec_PlusRecurrence_sub" autocomplete="off"> -->
                                        <input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="rec_PlusRecurrence_sub[]" id="rec_PlusRecurrence_sub" autocomplete="off">

                                    </td>
                                    <td width="150">
                                        <input class="form-control" name="rec_installmentType_sub[]" list="instatype1" autocomplete="off" />
                                    </td>
                                    <td width="100">
                                        <input name="rec_amount_sub[]" type="number" class="form-control" />
                                    </td>
                                    <td width="100">
                                        <input name="rec_installment_sub[]" type="number" class="form-control" />
                                    </td>
                                    <td width="100">
                                        <input name="rec_startNo_sub[]" type="number" class="form-control" />
                                    </td>
                                    <td width="10">
                                        <input name="rec_startDate_sub[]" type="date" class="form-control" />
                                    </td>
                                    <td width="250">
                                        <textarea rows="1" cols="20" class="form-control" type="textarea" name="rec_internalNote_sub[]"></textarea>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                        </button>
                                    </td>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="12" class="tableFooter" style="text-align:left;">
                                            <button id="btnAdd3" type="button" class="button-29" data-toggle="tooltip" data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD
                                            </button>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 65%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                    <button type="button" class="button-29" id="saveDriverSubRecurrence"><i class="mdi mdi-shield-lock-outline"></i> Save </button>
                    <button type="button" class="button-29 closeDriverSubRecurrence">Close</button>
                </div>

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

<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="editSubstractRecurrence">
        <div class="modal-dialog modal-dialog-scrollable custom_modal_small2">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Substract Recurrence</h4>
                    <button type="button" class="button-24 closeeditDriverSubRecurrence">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id='up_subdriverRecurrenceForm'> 
                        <div class="container">
                            <table class=" table-responsive other-table" id="otherTable">
                                <thead>
                                    <tr>
                                        <td>Category<span style="color:#ff0000">*</span> <i title="Add Reccurence" class="mdi mdi-plus-circle plus" id="plusReccurencesubtract" style="color:blue !important"></i></td>
                                        <td>Installment Type <span style="color:#ff0000">*</span></td>
                                        <td>Amount <span style="color:#ff0000">*</span></td>
                                        <td>Installment <span style="color:#ff0000">*</span></td>
                                        <td>start# <span style="color:#ff0000">*</span></td>
                                        <td>start Date <span style="color:#ff0000">*</span></td>
                                        <td>Internal Note <span style="color:#ff0000">*</span></td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                                <tbody id="up_TextBoxContainer3">
                               
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="12" class="tableFooter" style="text-align:left;">
                                            <button id="up_btnAdd3" type="button" class="button-29" data-toggle="tooltip" data-original-title="Add more controls"><i class="mdi mdi-gamepad-down"></i> ADD
                                            </button>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 65%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                    <button type="button" class="button-29" id="saveEditDriverSubRecurrence"><i class="mdi mdi-shield-lock-outline"></i> Save </button>
                    <button type="button" class="button-29 closeEditDriverSubRecurrence">Close</button>
                </div>

                <!-- <datalist id="driverPlusRecurrence" class="driverPlusRecurrence">

                </datalist>
                <datalist id="instatype1">
                    <option value="Weekly"></option>
                    <option value="Monthly"></option>
                    <option value="yearly"></option>
                    <option value="Quarterly"></option>
                </datalist> -->

            </div>
        </div>
    </div>
</div>