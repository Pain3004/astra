<!-- 
 driver modal -->
<div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="driverModal">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">

            
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Driver</h4>
                <button type="button" class="close" data-dismiss="modal" id="modalClose">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="table-responsive table-scroll">
                 <table class="table dataTable no-footer" style="border-spacing: 3px;border-collapse: unset !important;"> 
                  <thead class="thead_th" style="height:40px;">
                  <tr class="tr">
                  <th>NO</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Location</th>
                                                    <th>Social Security No</th>
                                                    <th>Date of Birth</th>
                                                    <th>Date of Hire</th>
                                                    <th>License No</th>
                                                    <th>LIS</th>
                                                    <th>License Exp.Date</th>
                                                    <th>Driver Balance</th>
                                                    <td >Male</td>
                                                    <td>Male</td> 
                                                    <th>Action</th>
                            </tr>
                  </thead>
                  <tbody id="driverTable" class="load-box"></tbody>
                </table>
              </div>
                <!-- <div class="modal-body">
                
                    <div class="row">
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive export-table">
                                            <table id="editable-file-datatable" class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                                <thead>
                                                    <tr>
                                                    <th>NO</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Location</th>
                                                    <th>Social Security No</th>
                                                    <th>Date of Birth</th>
                                                    <th>Date of Hire</th>
                                                    <th>License No</th>
                                                    <th>LIS</th>
                                                    <th>License Exp.Date</th>
                                                    <th>Driver Balance</th>
                                                    <td >Male</td>
                                                    <td>Male</td> 
                                                    <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="driverTable">
                                                    @php 
                                                    $_no=1;
                                                    @endphp

                                                @foreach($driverData as $single_driverdata)


                                                    @foreach($single_driverdata->driver as $inner_single)                                                                                                    

                                                    @php
                                                        if(!$inner_single){
                                                            continue;
                                                        }                                                        
                                                    @endphp

                                                    

                                                        <tr>
                                                            <td data-field="no">{{$_no++}}</td>
                                                            <td data-field="name">{{$inner_single['driverName']}}</td>
                                                            <td data-field="email">{{$inner_single['driverEmail']}}</td>
                                                            <td data-field="location">{{$inner_single['driverAddress']}}</td>
                                                            <td data-field="Social Security No">{{$inner_single['driverName']}}</td>
                                                            <td data-field="Date of Birth">{{$inner_single['driverName']}}</td>
                                                            <td data-field="License No">{{$inner_single['driverName']}}</td>
                                                            <td data-field="age">{{$inner_single['driverName']}}</td>
                                                            <td data-field="LIS">{{$inner_single['driverName']}}</td>
                                                            <td data-field="License Exp.Date">{{$inner_single['driverName']}}</td>
                                                            <td data-field="Driver Balance">{{$inner_single['driverName']}}</td>
                                                            <td data-field="gender">{{$inner_single['driverName']}}</td>
                                                            <td data-field="gender">{{$inner_single['driverName']}}</td>
                                                            <td style="width: 100px">
                                                                <a class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        @endforeach

                                                @endforeach


                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> -->
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>
                </div>
                
            </div>
            </div>
        </div>
        
    </div>
           
    