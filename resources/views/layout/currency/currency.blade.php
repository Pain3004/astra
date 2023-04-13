<!------------------------------------------------------------------- Currency Setting modal ------------------------------------------------------------------->
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="CurrencyModal">
        <div class="modal-dialog modal-sl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Currency Setting</h4>
                    <button type="button" class="closeCurrency">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                    <a href="#" class="btn btn-primary" id="addCurrencyModal">Add</a>
                                        <div class="table-responsive export-table">
                                            
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>counter</th> -->
                                                        <th>NO</th>
                                                        <th > Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="currencyTable">

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

                <!-- Modal footer -->
                <div class="modal-footer">
                <form action="{{route('driver-pdf')}}" method="post" target="__blank">
                        @csrf
                        <button class="btn btn-primary" style="vertical-align:middle"><span>Export</span></button>
                    </form>
                    <button type="button" class="closeCurrency btn btn-secondary"  data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" class="laravel_csrf_tokn" value="{{ csrf_token() }}"/>
<!-------------------------------------------------------------------over Currency Setting modal------------------------------------------------------------------->
<!------------------------------------------------------------------- Currency Edit modal ------------------------------------------------------------------->
<div class="container">
  <!-- The Modal -->
  <div class="modal" id="plusCurrencyModal" style="z-index:1000000000;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title">Create Currency</h5>
          <button type="button" class="close" data-dismiss="modal" id="closeCurrencyModal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <from>
                <input type="hidden" name="_token" id="_tokenCustomerCurrency" value="{{ csrf_token() }}" />
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="CurrencyrName">Currency Name  <span style="color:#ff0000">*</span></label>
                        <input type="text" class="form-control CurrencyrName"  placeholder=" Enter Currency Name" >
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" >
            <a type="submit" class="btn btn-primary CurrencyrDataSubmit">Save</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeCurrencyModal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!------------------------------------------------------------------ over Currency modal ------------------------------------------------------------------>
<!------------------------------------------------------------------- Currency modal ------------------------------------------------------------------->

<div class="container">
  <!-- The Modal -->
  <div class="modal" id="editCurrencyModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        <h5 class="modal-title">Edit Currency</h5>
          <button type="button" class="close" data-dismiss="modal" id="closeCurrencyModal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <from>
                <input type="hidden" name="_token" id="_tokenEditCurrency" value="{{ csrf_token() }}" />
                <input type="hidden" id="EditCurrencyId" />
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="editCurrencyrName">Currency Name  <span style="color:#ff0000">*</span></label>
                        <input type="text" class="form-control" id="editCurrencyrName" placeholder=" Enter Currency Name" >
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" >
            <a type="submit" class="btn btn-primary CurrencyrDataUpdate">Update</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!------------------------------------------------------------------- over Currency Edit modal ------------------------------------------------------------------->