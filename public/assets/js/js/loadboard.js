
// $(document).ready(function(){
//   var counter = 2; // Starting form number
//   $('#add-tab').click(function(){
//     var tabTitle = "Form " + counter;
//     var tabContent = '<div class="tab-pane" id="tab-'+counter+'"><form>'+
//     '<div class="tab-content" id="myTabContent">'+
//         '<div class="tab-pane fade show active" id="home0" role="tabpanel"aria-labelledby="home-tab">'+
//             '<div class="row m-2">'+
//                 '<div class="form-group col-md-3">'+
//                     '<label>Name*</label>'+
//                     '<input   type="hidden" id="shipperId" name="shipperId">'+
//                     '<div class="form-group">'+
//                         '<select class="form-control select2-show-search form-select" id="lb_shipperName">'+
//                             '<option>Select Here </option>'+
//                         '</select>'+
//                     '</div>'+
//                 '</div>'+
//                 {/* <div class="form-group col-md-2">
//                     <label>Address*</label>
//                     <div>
//                         <input class="form-control" placeholder="Address *" type="text" id="shipperaddress0" name="shipperaddress">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2">
//                     <label>Location *</label>
//                     <div>
//                         <input class="form-control" placeholder="Enter a location" type="text" id="activeshipper0" name="activeshipper">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2">
//                     <label>Pickup Date</label>
//                     <div>
//                         <input class="form-control" type="date" id="shipperdate" name="shipperdate">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2">
//                     <label>Pickup Time</label>
//                     <div>
//                         <input class="form-control" type="time" id="shippertime" name="shippertime">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-1">
//                     <label>Type*</label>
//                     <div class="row">
//                         <div class="custom-control custom-radio custom-control-inline">
//                             <input type="radio" class="custom-control-input" id="tl0" name="tl0" value="TL" checked>
//                             <label class="custom-control-label" for="tl0">TL</label>
//                         </div>
//                         <div class="custom-control custom-radio custom-control-inline">
//                             <input type="radio" class="custom-control-input" id="ltl0" value="LTL" name="tl0">
//                             <label class="custom-control-label" for="ltl0">LTL</label>
//                         </div>
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2">
//                     <label>Commodity</label>
//                     <div>
//                         <input class="form-control" type="text" placeholder="Commodity" id="shippercommodity" name="shippercommodity">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-1 ">
//                     <label>Qty</label>
//                     <div>
//                         <input class="form-control" placeholder="Qty" id="shipperqty"  name="shipperqty" type="text">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2 ">
//                     <label>Weight</label>
//                     <div>
//                         <input class="form-control" type="text" placeholder="Weight"  id="shipperweight" name="shipperweight">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-2">
//                     <label>Pickup #</label>
//                     <div>
//                         <input class="form-control" placeholder="Pickup #" type="text" id="shipperpickup" name="shipperpickup">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-1">
//                     <label>Sr#</label>
//                     <div>
//                         <input class="form-control" placeholder="Sr#" type="number" id="shipseq0" name="shipseq" value="0">
//                     </div>
//                 </div>
//                 <div class="form-group col-md-4">
//                     <label>Pickup Notes</label>
//                     <div>
//                         <textarea rows="1" cols="30" class="form-control" type="textarea" id="shippernotes" name="shippernotes"></textarea>
//                     </div>
//                 </div> */}
//             '</div>'+
//         '</div>'+
//     '</div>'+
//     '</form></div>';

//     $('.nav-tabs').append('<li><a href="#tab-'+counter+'" data-toggle="tab">'+tabTitle+'</a></li>');
//     $('.tab-content').append(tabContent);
//     counter++;
//   });
// });

$(document).ready(function() {
  dataTable = $("#example").DataTable({
  });

  $('.filter-checkbox').on('change', function(e){
    var searchTerms = []
    $.each($('.filter-checkbox'), function(i,elem){
      if($(elem).prop('checked')){
        searchTerms.push("^" + $(this).val() + "$")
      }
    })
    dataTable.column(2).search(searchTerms.join('|'), true, false, true).draw();
  });

  $('.status-dropdown').on('change', function(e){
    var status = $(this).val();
    $('.status-dropdown').val(status)
    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
    dataTable.column(7).search(status).draw();
  })
//-- -------------------------------------------------------------------------    -- -------------------------------------------------------------------------

$("#lb_shipperName, #lb_Company,#LB_Customer, #lb_Dispatcher, #lb_load, #lb_EquipmentType, #LB_Carrier").select2({
  placeholder: "Select Here",
  allowClear: true,
  dropdownParent: $('#addLoadBoardModal')
  });
 
$('#addLoadBoard').click(function(){
  $.ajax({
    type: "GET",
    url: base_path+"/admin/Shipper",
    async: false,
    success: function(Result) { 
      createshipperList(Result);
    }
});


  $('#addLoadBoardModal').modal('show');
});
//-- -------------------------------------------------------------------------  Get loaboard data -- -------------------------------------------------------------------------
$('.closeAddNewLoadBoard').click(function(){
  $('#addLoadBoardModal').modal('hide');

});
// $('.shipperName').click(function(){
//   $('#page-loader').style('dispaly','inline-flex');
// });
$.ajax({
      type: "GET",
      url: base_path+"/admin/getLoadboardData",
      async: false,
      //dataType:JSON,
      success: function(text) {
          createLoadBoardRows(text);
        }
  });
// <!-- function   --> 
  
// get
  function createLoadBoardRows(Result) {
  var len = 0;
  var no=1;
      if (Result != null) {
          $("#LoadBoardTable").html('');
      //open
          var Result1=Result.data;
          var Result2=Result.user;
          var len1 = Result1.length;
          var len2 = Result2.length;
          //alert(len1);
          if (len1 > 0) {
              for (var i = len1-1; i >= 0; i--) { 
                  var sub_len = Result1[i].load.length;
                //alert(sub_len);
                  if (sub_len > 0) {
                    
                      for (var j = sub_len-1; j >= 0; j--) { 
                        
                          var com_id =Result1[i].companyID;
                          var main_id =Result1[i]._id;
                          var invoice =Result1[i].load[j]._id;
                          var orderId =Result1[i].load[j].cnno;
                          var status =Result1[i].load[j].status;
                          var shipDate1 = new Date(Result1[i].load[j].shipper_pickup);
                          var delDate1 = new Date(Result1[i].load[j].consignee_pickup);
                          var customer =Result1[i].load[j].loaddata.customername;
                          var carrier_driver_ownerOperator =Result1[i].load[j].loaddata.loadername;
                          var origin =Result1[i].load[j].shipper[0].shipper_location;
                          var destibation =Result1[i].load[j].consignee[0].consignee_location;
                          var truck =Result1[i].load[j].loaddata.loadertruck;
                          var trailer =Result1[i].load[j].loaddata.loadertrailer;
                          var loadPay =Result1[i].load[j].total_rate;
                          var carrierPay_driverPay=Result1[i].load[j].carrier_total;
                          var isBroker=Result1[i].load[j].isBroker;
                          var typeofloader=Result1[i].load[j].typeofloader;
                          var shippername =Result1[i].load[j].loaddata.shippername;
                          var consigneename =Result1[i].load[j].loaddata.consigneename;
                          var created_user=Result1[i].load[j].created_user;
                          var company=Result1[i].load[j].company;
                        //convert date
                          var created_at1 = Result1[i].load[j].created_at;
                          var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                          var date = new Date(created_at1*1000);
                          var year = date.getFullYear();
                          var month = months_arr[date.getMonth()];
                          var day = date.getDate();
                          var created_at = month+'/'+day+'/'+year;
                          
                          var shipDate1 = Result1[i].load[j].created_at;
                          var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                          var date = new Date(shipDate1*1000);
                          var year = date.getFullYear();
                          var month = months_arr[date.getMonth()];
                          var day = date.getDate();
                          var shipDate = month+'/'+day+'/'+year;

                          var delDate1 = Result1[i].load[j].created_at;
                          var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                          var date = new Date(delDate1*1000);
                          var year = date.getFullYear();
                          var month = months_arr[date.getMonth()];
                          var day = date.getDate();
                          var delDate = month+'/'+day+'/'+year;
///
                          var edit_by=Result1[i].load[j].edit_by;
                          var dispatcher=parseInt(Result1[i].load[j].dispatcher);

                          if(orderId==""){orderId="-";}
                          if(customer==""){customer="-";}
                          if(carrier_driver_ownerOperator==""){carrier_driver_ownerOperator="-"}
                          if(origin==""){origin="-"}
                          if(destibation==""){destibation="-"}
                          if(truck==""){truck="-"}
                          if(trailer==""){trailer="-"}
                          if(loadPay=="" || loadPay==null){loadPay="0.00" }else{ loadPay=parseFloat(loadPay).toFixed(2);}
                          if(carrierPay_driverPay=="" || carrierPay_driverPay==null){carrierPay_driverPay="0.00" }else{ carrierPay_driverPay=parseFloat(carrierPay_driverPay).toFixed(2); }

                          //set broker
                          if (isBroker == "on") {
                            var customer =customer+"<h6 class='extra4'>Broker</h6>`";
                          }

                          //set Carrier/Driver/Owner Operator
                          if (typeofloader == "Carrier") {
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra1'>Carrier</h6>";
                          }else if (typeofloader == "Driver") {
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra2'>Driver</h6>";
                          }else if (typeofloader == "Owner Operator") {
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra3'>Owner Operator</h6>";
                          }
                          
                         //set tooltip
                          if( len2>0){
                            for(var m=0; m<=len2-7; m++){
                              var userId=Result2[m]._id;
                              if(userId == created_user || userId == edit_by || userId == dispatcher || userId == status_change_user){
                                if(userId == created_user){
                                  var userFirstName=Result2[m].userFirstName;
                                  var userLastName=Result2[m].userLastName;
                                  created_user=userFirstName+' '+ userLastName;
                                }
                                if(userId == edit_by){
                                  var userFirstName=Result2[m].userFirstName;
                                  var userLastName=Result2[m].userLastName;
                                  edit_by=userFirstName+' '+ userLastName;
                                }
                                
                                if(userId == dispatcher){
                                  var userFirstName=Result2[m].userFirstName;
                                  var userLastName=Result2[m].userLastName;
                                  dispatcher=userFirstName+' '+ userLastName;
                                }
                                
                                if(userId == status_change_user){
                                  var userFirstName=Result2[m].userFirstName;
                                  var userLastName=Result2[m].userLastName;
                                  status_change_user=userFirstName+' '+ userLastName;
                                }
                                
                              }
                            }
                          }

                        
                          //  status change
                          if(status == 'Open'){
                            var status_change_user=Result1[i].load[j].status_change_user.Open;
                          }else if(status == 'Dispatched'){
                            var status_change_user=Result1[i].load[j].status_change_user.Dispatched;
                          }else if(status == 'Arrived Shipper'){
                            var status_change_user=Result1[i].load[j].status_change_user.ArrivedShipper;
                          }else if(status == 'Loaded'){
                            var status_change_user=Result1[i].load[j].status_change_user.Loaded;
                          }else if(status == 'On Route'){
                            var status_change_user=Result1[i].load[j].status_change_user.OnRoute;
                          }else if(status == 'Arrived Consignee'){
                            var status_change_user=Result1[i].load[j].status_change_user.ArrivedConsignee;
                          }else if(status == 'Delivered'){
                            var status_change_user=Result1[i].load[j].status_change_user.Delivered;
                          }else if(status == 'Break Down'){
                            var status_change_user=Result1[i].load[j].status_change_user.BreakDown;
                          }

                          var info='\n Tarp: '+Result1[i].load[j].isBroker 
                          +'\n Empty Miles: '+Result1[i].load[j].empty_miles_value
                          +'\n Loaded Miles: '+Result1[i].load[j].loaded_miles_value
                          +'\n Shipper Name: '+shippername
                          +'\n Consignee Name: '+consigneename
                          +'\n Created by: '+created_user
                          +'\n Created on: '+created_at
                          +'\n Edited by: '+edit_by
                          +'\n Status edit: '+status_change_user
                          +'\n Dispatcher: '+dispatcher;//
                          
                        //set dropdown in invoice
                          //truck icon
                          var isCompany = company != "" ? false : true;
                          var isShipper = shippername != "" ? false : true;
                          var isConsignee = consigneename != "" ? false : true;

                          if (isCompany == true || isShipper == true || isConsignee == true) { isQuickLoad = true; }
                          else{ var isQuickLoad=false;}

                          if (isQuickLoad == true) { var truckIcon="<span class='mdi mdi-truck-fast extra7'></span>";
                          }else{ var truckIcon=''; }

                          //folder icon        
                          var load_notes=false;
                          var File=Result1[i].load[j].file;
                          var fileLen=File.length;
                         
                          if (File) {
                              hasFile = File.length > 0 ? true : false;
                          }else{
                            var hasFile = false;
                          }

                          if (hasFile == true) { var folderIcon="<span class='mdi mdi-folder extra6' ></span>";
                          }else{ var folderIcon=''; }

                        //chat icon        
                        var notes=false;
                        var load_notes=Result1[i].load[j].load_notes;
                        if (load_notes) { var notes = load_notes != "" ? true : false; }
                        if (notes == true) { var chatIcon="<span class='mdi mdi-comment-processing extra5'></span> "; }else{ var chatIcon=''; }
                        //---------------------------------- 
                        //show first 5 charecter of orderId
                        var order_id = orderId;
                        // if(isset(order_id)){
                          if( order_id.length >= 5 ) {
                            order_id = order_id.substr(0,5);
                            order_id = order_id+"..."
                          }
                        // }
                        //----------------------------------
                        //show first 3 trailer of orderId
                        var _trailer = trailer;
                        if( _trailer.length >= 3 ) {
                          _trailer = _trailer.substr(0,3)+"...";
                          // _trailer = _trailer+"..."
                        }
                        //----------------------------------

                          $('#loadStatus option:selected').eq(status).prop('selected', true);
                          
                          var Str = "<tr style='z-index: 5;position: relative;' class='tr' data-id=" + (i + 1) + ">" +
                          "<td class='td_new' data-field='no' data-toggle='tooltip' data-placement='top' title='"+info+"'><i class='mdi mdi-restore-clock' style='font-size:24px'></i><br>" + no + "</td>" +
                          "<td data-field='invoice' class='td_new modal-trigger invoice_btn' >"+invoice +" <br>"+chatIcon+" "+folderIcon+" "+truckIcon+" <div class='rrrrr' style='position: absolute;z-index: 22222;height: 64px; display:none;'><ul><li><a href='#'>Menu 1</a></li><li><a href='#'>Menu 2</a></li><li><a href='#'>Menu 3</a></li></ul></div></td>" +
                          "<td data-field='orderId' class='orderId td_new' title='" + orderId + "'>" + order_id + "</td>" +
                          "<td class='td_new' data-field='status' style='color:black;'>" + 
                            "<select class='form-control loadStatus' id='loadStatus' data-main_id='"+main_id+"' data-com_id='"+com_id+"' data-invoiceId='"+invoice+"' style='width: auto;text-align: center;border-radius:20px;background-color: radial-gradient(100% 100% at 100% 0, #00d1fc 0, #005880 100%);color:Black'>" +
                              "<option value='" + status +"'  selected='' >" + status +"</option>" +
                              "<option value='Open'>Open</option>" +
                              "<option value='Dispatched'>Dispatched</option>" +
                              "<option value='Arrived Shipper'>Arrived Shipper</option>" +
                              "<option value='Loaded'>Loaded</option>" +
                              "<option value='On Route'>On Route</option>" +
                              "<option value='Arrived Consignee'>Arrived Consignee</option>" +
                              "<option value='Delivered'>Delivered</option>" +
                              "<option value='Break Down'>Break Down</option>" +
                            "</select>" +
                          "</td>" +
                          "<td class='td_new' data-field='shipDate'>" + shipDate + "</td>" +
                          "<td class='td_new' data-field='delDate'>" + delDate + "</td>" +
                          "<td data-field='customer' class='LBcustomer td_new' >" + customer +"</td>" +
                          "<td class='td_new' data-field='carrier_driver_ownerOperator'>" + carrier_driver_ownerOperator + "</td>" +
                          "<td class='td_new' data-field='origin'>" + origin + "</td>" +
                          "<td class='td_new' data-field='destibation'>" + destibation + "</td>" +
                          "<td class='td_new' data-field='truck'>" + truck + "</td>" +
                          "<td class='td_new' data-field='trailer' title='" + trailer + "'>" + _trailer + "</td>" +
                          "<td class='td_new' data-field='loadPay'>$" + loadPay + "</td>" +
                          "<td class='td_new' data-field='carrierPay_driverPay'>$" + carrierPay_driverPay + "</td>" +
                          "</tr>";
                      $("#LoadBoardTable").append(Str);
                      no++;
                      }
                  }
              }
              // descending order
                $("#LoadBoardTable tr").sort(sort_td).appendTo("#LoadBoardTable");
                function sort_td(a, b) {
                  return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                }
          }else {
            var Str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
            $("#LoadBoardTable").append(Str);
          }

      }else {
      var Str = "<tr data-id=" + i + ">" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";
      }
  }
// <!-- over function    -->  
// <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 

// <!-- -------------------------------------------------------------------------change status   ------------------------------------------------------------------------- -->  
  $('.loadStatus').click(function() {
  var oldSelectedValue = this.value;
  $('body').on('change','.loadStatus', function (e) {
    var valueSelected = this.value;
    var main_id = $(this).attr('data-main_id');
    var com_id = $(this).attr('data-com_id');
    var id = $(this).attr('data-invoiceId');
    swal.fire({
      title: "Change Status?",
      text: "Are you sure you want to change the status?",
      type: "warning",
      showCancelButton: !0,
      confirmButtonText: "Yes, Change it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: !0
    }).then(function (e) { 
      $.ajax({
        type: "post",
        url: base_path+"/admin/changeStatus",
        async: false,
        data:{
          _token: $("#tokenLoadboard").val(),
          com_id:com_id, 
          id:id, 
          oldSelectedValue:oldSelectedValue,
          valueSelected:valueSelected
        },
        success: function(text) {
          swal.fire("updated");
          $.ajax({
            type: "GET",
            url: base_path+"/admin/getLoadboardData",
            async: false,
            success: function(text) {
                createLoadBoardRows(text);
              }
        });
        }
      });
    });
   });
  }); 
// <!-- -------------------------------------------------------------------------over change status   ------------------------------------------------------------------------- -->  
// <!-- -------------------------------------------------------------------------get company for add new loadboard ------------------------------------------------------------------------- -->  
  $('.closeAddNewLoadBoard').click(function(){
    $('#addLoadBoardModal').modal('hide');
  });
  $('#addLoadBoard').click(function(){
 
    $('#addLoadBoardModal').modal('show');
  }); 
 
  $('#select2-lb_Company-container').one('click', function(event){
      $.ajax({
        type: "GET",
        url: base_path+"/admin/lbcompany",
        async: false,
        success: function(Result) { 
            createcompanyList(Result);
        }
    });
  });

  function createcompanyList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.company.length;
      }

      if (Length > 0) {
          // var no=1;
          // $(".companyListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var companyLength =Result.company[i].company.length;
              for (var j = 0; j < companyLength; j++) {  
                var company =Result.company[i].company[j].companyName;
                var id =Result.company[i].company[j]._id;
                var deleteStatus =Result.company[i].company[j].deleteStatus;
               
                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  // var List = "<option id='customerCurrency' data-id='"+id+"' >"+ id +"-"+ company +"</option>"   +
                  var List = "<option id='customerCurrency' value='"+id+"' >"+ company +"</option>"   +

                  $(".companyListSet").append(List);
                  
                }
              }
            }
      }
      
  }
// <!-- -------------------------------------------------------------------------over get company  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get customer for add new loadboard ------------------------------------------------------------------------- -->  
  $('#select2-LB_Customer-container').one('click', function(event){
    // alert();
    // console.log("helo"); 
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getLBCustomerData",
        async: false,
        success: function(Result) { 
          // console.log(Result);                    
          createcustomerList(Result);
        }
    });
  });
  function createcustomerList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.customer.length;
      }

      if (Length > 0) {
          // var no=1;
          // $(".customerListSet").html('');
          for (var i = Length-1; i >= 0; i--) { 
            // for (var i = 0; i < Length; i++) { 
              var customerLength =Result.customer[i].customer.length;
              // for (var j = 0; j < customerLength; j++) {
              for (var j = customerLength-1; j >= 0; j--) {   
                var customer =Result.customer[i].customer[j].custName;
                var id =Result.customer[i].customer[j]._id;
                var deleteStatus =Result.customer[i].customer[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='customerCurrency'  value='"+id+"-"+ customer +"'>" + customer +"<option>";                  
                  $(".customerListSet").append(List);
                }
              }
            }
      }
      
  }

  $("#LBCustomerPlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addCustomerModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get customer  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Dispatcher for add new loadboard ------------------------------------------------------------------------- -->  
  $('#select2-lb_Dispatcher-container').one('click', function(event){
    $.ajax({
        type: "GET",
        url: base_path+"/admin/user",
        async: false,
        success: function(Result) { 
          // console.log(Result);                    
          createDispatcherList(Result);
        }
    });
  });
  function createDispatcherList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.length;
      }

      if (Length > 0) {
            for (var i = Length-1; i >=0; i--) { 
              // var DispatcherLength =Result[i].Dispatcher.length;
              // for (var j = 0; j < DispatcherLength; j++) {  
                var id =Result[i]._id;
                var userFirstName =Result[i].userFirstName;
                var userLastName =Result[i].userLastName;
                // var deleteStatus =Result[i].Dispatcher[j].deleteStatus;

                // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='Dispatcher'  value='"+id+"-"+ userFirstName +" "+ userLastName +"'>"+ userFirstName +" "+ userLastName +" <option>";                 
                  $(".DispatcherListSet").append(List);
                // }
              // }
            }
      }
      
  }
// <!-- -------------------------------------------------------------------------over get Dispatcher  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Active Type for add new loadboard ------------------------------------------------------------------------- -->  
$('#select2-lb_load-container').one('click', function(event){
    $('#LoadModal').modal('hide');
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getLoadType",
        async: false,
        success: function(Result) { 
          // console.log(Result);                    
          createLoadTypeList(Result);
        }
    });
  });
  function createLoadTypeList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.Load_type.length;
      }

      if (Length > 0) {
          // var no=1;
          $(".LoadTypeListSet").html('');
          // for (var i = 0; i < Length; i++) { 
            for (var i = Length-1; i >=0; i--) { 
              var LoadTypeLength =Result.Load_type[i].loadType.length;
              // for (var j = 0; j < LoadTypeLength; j++) {  
              for (var j = LoadTypeLength-1; j >=0; j--) {
                var loadName =Result.Load_type[i].loadType[j].loadName;
                var id =Result.Load_type[i].loadType[j]._id;
                var deleteStatus =Result.Load_type[i].loadType[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id=''  value='"+id+"-"+ loadName +"'>"+loadName+ " <option>";                   
                  $(".LoadTypeListSet").append(List);
                }
              }
            }
      }
      
  }

  $("#LBLoadTypePlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addLoadTypeModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get Active Type  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Equipment Type for add new loadboard ------------------------------------------------------------------------- -->  
$('#select2-lb_EquipmentType-container').one('click', function(event){
    $('#EquipmentTypeModal').modal('hide');
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getEquipmentType",
        async: false,
        success: function(Result) { 
          createEquipmentTypeList(Result);
        }
    });
  });
  function createEquipmentTypeList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.EquipmentType.length;
      }

      if (Length > 0) {
          for (var i = Length-1; i >=0 ; i--) { 
              var EquipmentTypeLength =Result.EquipmentType[i].equipment.length;
              for (var j = EquipmentTypeLength-1; j >=0; j--) {  
                var equipmentType =Result.EquipmentType[i].equipment[j].equipmentType;
                var id =Result.EquipmentType[i].equipment[j]._id;
                var deleteStatus =Result.EquipmentType[i].equipment[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id=''  value='"+id+"-"+ equipmentType +"'>" + equipmentType +"</option>"                  
                  $(".EquipmentTypeListSet").append(List);
                }
              }
            }
      }
  }

  $("#LBEquipmentTypePlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addEquipmentTypeModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get Equipment Type  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Carrier for add new loadboard ------------------------------------------------------------------------- -->  
//$('#select2-LB_Carrier-container').one('click', function(event){
  // $('#LoadModal').modal('hide');
  // $.ajax({
  //     type: "GET",
  //     url: base_path+"/admin/getCarrier",
  //     async: false,
  //     success: function(Result) { 
  //       console.log(Result);                    
  //       createCarrierList(Result);
  //     }
  // });
//});
// function createCarrierList(Result) {           
//     var Length = 0;    
    
//     if (Result != null) {
//         Length = Result.carrier.length;
//         // Length = Result.length;
//         console.log(Length);
//     }

//     if (Length > 0) {
//         // var no=1;
//       //  $(".CarrierListSet").html('');
//           for (var i = Length-1; i >=0; i--) { 
//             var Length =Result.carrier[i].carrier.length;
//             for (var j = Length-1; j >=0; j--) {
//               var Name =Result.carrier[i].carrier[j].name;
//               var id =Result.carrier[i].carrier[j]._id;
//               var deleteStatus =Result.carrier[i].carrier[j].deleteStatus;
//               console.log(id);
//               if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
//                 var List = "<option id=''  value='"+id+"-"+ Name +"'>"+Name+ " <option>";                   
//                 $(".CarrierListSet").append(List);
//               }
//             }
//           }
//     }
    
// }

$("#LBCarrierPlus").click(function(){
  $("#addLoadBoardModal").css("z-index","-1");
  $("#AddExternalCarrier").modal("show");
  
});
// <!-- -------------------------------------------------------------------------over get Carrier  ------------------------------------------------------------------------- -->

// <!-- -------------------------------------------------------------------------get driver for add new loadboard ------------------------------------------------------------------------- -->  
  $('.DriverListSet').focus(function(){
    $('#driverModal').modal('hide');
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getDriver",
        async: false,
        success: function(Result) { 
          createDriverList(Result);
        }
    });
  });
 

  function createDriverList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.driver.length;
      }

      if (Length > 0) {
          // var no=1;
          $(".DriverListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var DriverLength =Result.driver[i].driver.length;
              for (var j = 0; j < DriverLength; j++) {  
                var driverName =Result.driver[i].driver[j].driverName;
                var id =Result.driver[i].driver[j]._id;
                var deleteStatus =Result.driver[i].driver[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='' data-id='"+id+"' value='"+id+"-"+ driverName +"'>"                   
                  $(".DriverListSet").append(List);
                }
              }
            }
      }
      
  }

  $("#LBDriverPlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addDriverModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get driver  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Trailer for add new loadboard ------------------------------------------------------------------------- -->  
  $('.TrailerListSet').focus(function(){
    $('#TrailerModal').modal('hide');
    $.ajax({
        type: "GET",
        url: base_path+"/admin/Trailer",
        async: false,
        success: function(Result) { 
          createTrailerList(Result);
        }
    });
  });
  function createTrailerList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.trailer.length;
      }

      if (Length > 0) {
          // var no=1;
          $(".TrailerListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var TrailerLength =Result.trailer[i].trailer.length;
              for (var j = 0; j < TrailerLength; j++) {  
                var trailerNumber =Result.trailer[i].trailer[j].trailerNumber;
                var id =Result.trailer[i].trailer[j]._id;
                var deleteStatus =Result.trailer[i].trailer[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='' data-id='"+id+"' value='"+id+"-"+ trailerNumber +"'>"                   
                  $(".TrailerListSet").append(List);
                }
              }
            }
      }
      
  }

  $("#LBTrailerPlus1").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addTrailerModal").modal("show");
  });
  $("#LBTrailerPlus2").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addTrailerModal").modal("show");
  });
// <!-- -------------------------------------------------------------------------over get Trailer  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Truck for add new loadboard ------------------------------------------------------------------------- -->  
  $('.TruckListSet').focus(function(){
    $.ajax({
        type: "GET",
        url: base_path+"/admin/Truck",
        async: false,
        success: function(Result) { 
          createTruckList(Result);
        }
    });
  });

  function createTruckList(Result) {           
    var Length = 0;    
    
    if (Result != null) {
        Length = Result.truck.length;
    }

    if (Length > 0) {
        // var no=1;
        $(".TruckListSet").html('');
        for (var i = 0; i < Length; i++) { 
            var truckLength =Result.truck[i].truck.length;
            for (var j = 0; j < truckLength; j++) {  
              var truckNumber =Result.truck[i].truck[j].truckNumber;
              var id =Result.truck[i].truck[j]._id;
              var deleteStatus =Result.truck[i].truck[j].deleteStatus;

              if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                var List = "<option id='' data-id='"+id+"' value='"+id+"-"+ truckNumber +"'>"                   
                $(".TruckListSet").append(List);
              }
            }
          }
    }
    
  }


// <!-- -------------------------------------------------------------------------over get Truck  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get shipper for add new loadboard ------------------------------------------------------------------------- -->  
// $('.ShipperListSet').focus(function(){
//   $.ajax({
//       type: "GET",
//       url: base_path+"/admin/Shipper",
//       async: false,
//       success: function(Result) { 
//         createshipperList(Result);
//       }
//   });
// });
$("#lb1_shipperName").change(function(){
  // alert();
  //var id=$("#LB_Shipper").val();
  var Shipper=$('#lb_shipperName').val().split('-');
  
  $("#shipperId").val(Shipper[0]);
  $("#shipperaddress").val(Shipper[1]);
  $("#activeshipper").val(Shipper[2]);
  
});
function createshipperList(Result) {           
    var Length = 0;    
    if (Result != null) {
        Length = Result.shipper.length;
    }

    if (Length > 0) {
        // var no=1;
        $(".ShipperListSet").html('');
        for (var i = 0; i < Length; i++) { 
            var shipperLength =Result.shipper[i].shipper.length;
            for (var j = 0; j < shipperLength; j++) {  
              var id =Result.shipper[i].shipper[j]._id;
              var shipperName =Result.shipper[i].shipper[j].shipperName;
              var shipperAddress =Result.shipper[i].shipper[j].shipperAddress;
              var shipperLocation =Result.shipper[i].shipper[j].shipperLocation;
              // var shipperNumber =Result.shipper[i].shipper[j].shipperNumber;
              var deleteStatus =Result.shipper[i].shipper[j].deleteStatus;

              // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                var List = "<option class='LB_Shipper' value='"+id+"-"+shipperAddress+"-"+shipperLocation+"'>"+shipperName+"</option>"                   
                $("#lb_shipperName").append(List);
                // $(".lb1_shipperName").append(List);
              // }
            }
          }
    }
    
}
$("#lb_shipperName").change(function(){
  //var id=$("#LB_Shipper").val();
  var Shipper=$('#lb_shipperName').val().split('-');
 
  $("#shipperId").val(Shipper[0]);
  $("#shipperaddress").val(Shipper[1]);
  $("#activeshipper").val(Shipper[2]);
  
});


$("#consigneelist").change(function(){
  //var id=$("#LB_Shipper").val();
  var Shipper=$('#consigneelist').val().split('-');
 
  //$("#shipperId").val(Shipper[0]);
  $("#consigneeaddress").val(Shipper[1]);
  $("#activeconsignee").val(Shipper[2]);
  
});
  
// <!-- -------------------------------------------------------------------------over shipper Truck  ------------------------------------------------------------------------- -->

// <!-- -------------------------------------------------------------------------submit add new loadboard ------------------------------------------------------------------------- -->  
$("#select2-lb_Company-container").click(function(){
  $("#select2-lb_Company-container").css("border", "2px solid #ced4da");
});
$("#addLBSubmit").click(function(){

    var noofunits='';
    var drivername='';
    var truck='';
    var trailer='';
    var loadedmile='';
    var emptymile='';
    var tarp='';
    var flat='';
    var owner='';
    var ownerpay='';
    var ownertruck='';
    var ownertrailer='';
    var totalAmount='';
    var cnno='';

    var company=$('#lb_Company').val();
    if(company == 'Select Here'){
      //swal.fire("Error!", "Enter Percentage", "error");
     swal.fire({title: 'Please Slelect company',text: 'Redirecting...',timer: 4000,buttons: false,})
     $("#select2-lb_Company-container").css("border", "2px solid red");
     $("#lb_Company").focus();
     return false;
    }
    var LB_Customer=$('#LB_Customer').val().split('-');
    var customerName=LB_Customer[1];
    var LB_Driver=$('#LB_Driver').val().split('-');
    var loadername=LB_Driver[1];
    var LB_Truck=$('#LB_Truck').val().split('-');
    var loadertruck=LB_Truck[1];
    var LB_Trailer=$('#LB_Trailer').val().split('-');
    var loadertrailer=LB_Trailer[1];
    // var loadershipper=$('#').val();
    // var loaderconsignee=$('#').val();
    var loadertotal=$('#LB_loadertotal').val();
    
    var customer=LB_Customer[0];

    var lb_Dispatcher=$('#lb_Dispatcher').val().split('-');
    var dispatcher=lb_Dispatcher[0];
    var cnno=$('#lbCN_No').val();
    var status=$('#lb_status').val();

    var lb_load=$('#lb_load').val().split('-');
    var loadtype=lb_load[0];

    var rate=$('#rateAmount').val();
    var noofunits=$('#units').val();
    var fsc=$('#fsc').val();
    if ($("#fsc_percentage").is(":checked")) { 
      var fsc_percentage='on'; 
    }else{ 
      var  fsc_percentage='off'; 
    }
    var other_charges=$('#MainOtherCharges').val();

    var lb_EquipmentType=$('#lb_EquipmentType').val().split('-');
    var equiptype=lb_EquipmentType[0];
   
    if ($("#Driver").is(":checked")){
        var typeofloader = 'Driver';
    } else if($("#OwnerOperator").is(":checked")){
      var typeofloader = 'Owner Operator';
    }else{
      var typeofloader = ' ';
    } 
    //carrier
    var carrier_name=$('#LB_Carrier').val();
    var flat_rate=$('#LB_FlatRate').val();
    var isIfta='0';
    var advance_charges=$('#Add_AdvanceCharges').val();
    var carrier_total=$('#LB_CarrierTotal').val();
    var currency=$('#LB_CarrierCurrency').val();
    //driver
    var drivername=LB_Driver[0];
    var truck=LB_Truck[0];
    var trailer=LB_Trailer[0];
    var loadedmile=$('#lb_LoadedMiles').val();
    var emptymile=$('#lb_EmptyMiles').val();
    var driver_other=$('#lb_driver_Other').val();
    var tarp=$('#lb_Tarp').val();
    var flat=$('#lb_Flat').val();
    //owner
    var owner_name=$('#lb_owner').val();
    var owner_percentage=$('#lb_owner_percentage').val();
    var owner_truck=$('#lb_owner_truck').val();
    var owner_trailer=$('#lb_owner_trailer').val();
    var owner_other=$('#lb_owner_other').val();
    var owner_total=$('#lb_owner_total').val();
    // var start_location=$('#start_location').val();
    // var end_location=$('#end_location').val();
    var start_location='';
    var end_location='';
    //miles
    var tarp_select=$('#driverTarpSelect').val();
    var loaded_miles_value=$('#loadedmiles').val();
    var empty_miles_value=$('#emptymiles').val();
    var driver_miles_value=$('#drivermiles').val();
    var load_notes=$('#loadnotes').val();
    //broker
    var broker_driver='';
    var broker_driver_contact='';
    var broker_truck='';
    var broker_trailer='';
    var is_unit_on='';
    var carrier_parent='';
    var customer_parent='';
    var driver_parent='';
    var owner_parent='';
    var isBroker='';
    var isIftaVerified='';
    var receipt_status='';
    var custDays='';
    var carDays='';
    //carrier_email
    var CarrierEmail='';
    var email2='';
    var email3='';
    //customer_email
    var CustomerEmail='';
    var emailcustomer2='';
    var emailcustomer3='';
    $.ajax({
        url: base_path+"/admin/addLoadBoard",
        type: "POST",
        datatype:"JSON",
        data: {
            _token: $("#tokenLoadboard").val(),
            customername: customerName,
            loadername: loadername,
            loadertruck: loadertruck,
            loadertrailer: loadertrailer,
          // shippername: loadershipper,
          // consigneename: loaderconsignee,
            loadertotal: loadertotal,
            company: company,
            customer: customer,
            dispatcher: dispatcher,
            cnno: cnno,
            status: status,
            active_type: loadtype,
            rate: rate,
            noofunits: noofunits,
            fsc: fsc,
            fsc_percentage: fsc_percentage,
            other_charges: other_charges,
            // data_other_charges:$('#other_chargesForm').serialize(),
            setTotalRate: totalAmount,
            equipment_type: equiptype,
            typeofLoader: typeofloader,
            carrier_name: carrier_name,
            flat_rate: flat_rate,
            isIfta: isIfta,
            advance_charges: advance_charges,
            // data_carrier_other_modal:$('#carrierOtherModalForm').serialize(),
            carrier_total: carrier_total,
            currency: currency,
            driver_name: drivername,
            truck: truck,
            trailer: trailer,
            loaded_mile: loadedmile,
            empty_mile: emptymile,
            driver_other: driver_other,
            // data_driver_other_modal:$('#driver_other_modal').serialize(),
            tarp: tarp,
            flat: flat,
            driver_total: loadertotal,
            //owner
            owner_name: owner_name,
            owner_percentage: owner_percentage,
            owner_truck: owner_truck,
            owner_trailer: owner_trailer,
            owner_other: owner_other,
            // data_driver_other_modal:$('#driver_other_modal').serialize(),
            owner_total: owner_total,
            startlocation: start_location,
            endlocation: end_location,
            data_shipper:$('#shipperForm').serialize(),
            data_consignee:$('#consigneeForm').serialize(),

            tarp_select: tarp_select,
            loaded_miles_value: loaded_miles_value,
            empty_miles_value: empty_miles_value,
            driver_miles_value: driver_miles_value,
            // data_file:$('#file').serialize(),
            load_notes: load_notes,
            
            // data_CarrierEmail:$('#CarrierEmail').serialize(),
            CarrierEmail: CarrierEmail,
            email2: email2,
            email3: email3,
            // data_customerEmail:$('#customerEmail').serialize(),
            CustomerEmail: CustomerEmail,
            emailcustomer2: emailcustomer2,
            emailcustomer3: emailcustomer3,
            brokerdriver: broker_driver,
            brokerdrivercontact: broker_driver_contact,
            broker_truck: broker_truck,
            broker_trailer: broker_trailer,
            is_unit_on: is_unit_on,
            carrier_parent: carrier_parent,
            customer_parent: customer_parent,
            driver_parent: driver_parent,
            owner_parent: owner_parent,
            // edit: edit,
            // loadid: loadid,
            // createdate: createDate,
            // companyId: companyid,
            // privilege: privilege,
            isbroker: isBroker,
            // loadParent: loadParent,
            isIftaVerified:isIftaVerified,
            receipt_status:receipt_status,
            custdays: custDays,
            cardays: carDays,
        },
        cache: false,
        success: function(Result){
            if(Result){
                swal.fire({title: 'Added successfully',text: 'Redirecting...',timer: 3000,buttons: false,})
                // $("#addLoadBoardModal").css("z-index","100000000000");
                $("#addLoadBoardModal").modal("hide");
                $("#addLoadBoardModal form").trigger('reset');
                  $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getLoadboardData",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        createLoadBoardRows(text);
                      }
                  });
                // $('#LoadModal').modal('show');
            }else{
                swal.fire(" Not Added successfully.");
            }
        }
    });

  });
// <!-- -------------------------------------------------------------------------submit add new loadboard ------------------------------------------------------------------------- -->  


  $('.OwnerOperatorlist').hide();
  $('.Carrierlist').hide();
  
  $('.Driverlist').hide();
  
  $('input:radio[name="country"]').change(
    function() {
    
    if ($(this).is(':checked') && $(this).val() == 'Driver')
    {
      $('.Carrierlist').hide();
      $('.Driverlist').show();
      $('.OwnerOperatorlist').hide();
    }
    
    else if ($(this).is(':checked') && $(this).val() == 'OwnerOperator')
    {
      $('.Carrierlist').hide();
      $('.Driverlist').hide();
      $('.OwnerOperatorlist').show();
    }
    
    else if ($(this).is(':checked') && $(this).val() == 'Carrier')
    {
      $('.Carrierlist').show();
      $('.Driverlist').hide();
      $('.OwnerOperatorlist').hide();
    }
    
    else {
      $('.Carrierlist').hide();
      $('.Driverlist').hide();
      $('.OwnerOperatorlist').hide();
    }
    
    }
  );
  
  
  
  
});




$('#addOthChgModal').click(function(){
  $('#AccessorialModal').modal('show');
});


$('#Adv_carrier, #Advcarrier').click(function(){
  $('#AccessorialModal_carrier').modal('show');
});


$('#Other_driver').click(function(){
  $('#AccessorialModal_driver').modal('show');
});

$('#Other_OwnerOperator').click(function(){
  $('#AccessorialModal_owneroperator').modal('show');
});