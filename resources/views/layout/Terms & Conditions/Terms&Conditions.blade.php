<!------------------------------------------------------------------- Terms and Conditions modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" data-backdrop="static" id="TermsConditionsModal" role="dialog">
        <div class="modal-dialog custom_modal modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <button type="button" class="button-24 TermsConditionsCloseModal" >×</button>
                </div>
                <div class="modal-body" style="overflow-y: auto !important;margin-left: -16px;">

                <form id='TermConditionsForm'>
                    <div class="row">
                        <div class="col-md-6" data-name="all_instruction">
                            <div class="form-group col-md-12">
                                <label>Invoicing info instruction</label>
                                <div>
                                    <textarea rows="2" cols="30" id="invoiceInstruction" class="form-control" type="textarea"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Invoicing info advance</label>
                                <div>
                                    <textarea rows="2" cols="30" id="invoiceAdvance" class="form-control" type="textarea"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <table class="special">
                                    <thead>
                                        <tr>
                                            <td>Special Instructions</td>
                                            <td>Delete</td>
                                        </tr>
                                    </thead>
                                    <tbody id="TextBoxContainer1">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="12 " class="tableFooter" style="text-align:left">
                                                <button id="btnAddadv32" type="button" class="button-29" data-toggle="tooltip" data-name="add_instruction"><i class="mdi mdi-gamepad-down"></i>
                                                    ADD
                                                </button>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-xl-12" data-name="img_instruction">

                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                            </li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="zoom d-block img-fluid mx-auto" src="{{URL::to('/')}}/assets/images/T&C/2.png" alt="First slide" style="">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block img-fluid mx-auto" src="{{URL::to('/')}}/assets/images/T&C/1.png" alt="Second slide">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div>
                </form>  
                </div>
                <div class="modal-footer">
                    <button class="button-29" style="vertical-align:middle" id="submitTermsConditions">Save</button>
                    <button type="button" class="button-29 TermsConditionsCloseModal" >Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------------------------------------------End Equipment Type modal------------------------------------------------------------------->