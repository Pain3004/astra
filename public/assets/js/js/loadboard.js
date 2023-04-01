
$(document).ready(function() {

//   $('.shipperSet').click(function(){
//     alert(); 
//     // $.ajax({
//     //     type: "GET",
//     //     url: base_path+"/admin/getCustomerPaymentTerms",
//     //     async: false,
//     //     //dataType:JSON,
//     //     success: function(customerPaymentTermsResult) {
//     //         //console.log(customerCurrencyResult);
//     //         createcustomerPaymentTermsList(customerPaymentTermsResult);
//     //         customerPaymentTermsResponse = customerPaymentTermsResult;
//     //     }
//     // });
// });
  // dataTable = $("#example").DataTable({
  // });

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

$("#lb_owner,#lb_Company,#LB_Customer, #lb_Dispatcher, #lb_load, #lb_EquipmentType, #LB_Carrier, #LB_Driver, #LB_Truck, #LB_Trailer, #lb_owner_truck, #lb_owner_trailer").select2({
  placeholder: "Select Here",
  allowClear: true,
  dropdownParent: $('#addLoadBoardModal')
  });

$('#addLoadBoard, #add_dashboard').click(function(){
   $('#addLoadBoardModal').modal('show');
});
$('#add_dashboard').click(function(){
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

                      //---Bh----    
                        $('#loadStatus option:selected').eq(status).prop('selected', true);
                          
                        var Str = "<tr style='/* z-index: 5; */;position: relative;' class='tr' data-id=" + (i + 1) + ">" +
                        "<td class='td_new' data-field='no' data-toggle='tooltip' data-placement='top' title='"+info+"'><i class='mdi mdi-restore-clock' style='font-size:24px'></i><br>" + no + "</td>" +
                        "<td data-field='invoice' class='td_new modal-trigger invoice_btn' >"+invoice +" <br>"+chatIcon+" "+folderIcon+" "+truckIcon+" <div class='dropdown-n' tabindex='1'>"+
                        "<a class='dropbtn'></a><div class='dropdown-content'>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/pen.png' alt=''> Edit </a>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/duplicate.png' alt=''> Duplicate </a>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/note.png' alt=''> Internal Note</a>"+
                           " <a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/bol.png' alt=''> Create BOL </a>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/carrier-rate.png' alt=''> Create Carrier Rate Conf</a>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/customer-rate.png' alt=''> Create Customer Rate Conf</a>"+
                            "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/delete.png' alt=''> Delete</a></div></div></td>" +
                        "<td data-field='orderId' class='orderId td_new' title='" + orderId + "'>" + order_id + "</td>" +
                        "<td class='td_new' data-field='status' style='color:black;'>" +
                            
                       //---bh----   
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
// <!-- ------------------------------------------------------------------------- loadboard ------------------------------------------------------------------------- -->  
  $('.closeAddNewLoadBoard').click(function(){
    $('#addLoadBoardModal').modal('hide');
  });
  $('#addLoadBoard').click(function(){
    $('#totalAmount').val(0);
    $('#lb_owner_other').val(0);
    $('#addLoadBoardModal').modal('show');
  }); 
  $('#lb_owner, #LB_Driver,#select2-lb_EquipmentType-container, #select2-lb_load-container, #LBEquipmentTypePlus, #LBCustomerPlus, #LBLoadTypePlus').click(function(){
    $('#EquipmentTypeModal').modal('hide');
    $('#LoadModal').modal('hide');
    $('#driverModal').modal('hide');
  });
// <!-- -------------------------------------------------------------------------get company for add new loadboard ------------------------------------------------------------------------- -->  
// $('#select2-lb_Company-container').one('click', function(event){
//       $.ajax({
//         type: "GET",
//         url: base_path+"/admin/lbcompany",
//         async: false,
//         success: function(Result) { 
//             createcompanyList(Result);
//         }
//     });
//   });

//   function createcompanyList(Result) {           
//       var Length = 0;    
      
//       if (Result != null) {
//           Length = Result.company.length;
//       }

//       if (Length > 0) {
//           // var no=1;
//           // $(".companyListSet").html('');
//           for (var i = 0; i < Length; i++) { 
//               var companyLength =Result.company[i].company.length;
//               for (var j = 0; j < companyLength; j++) {  
//                 var company =Result.company[i].company[j].companyName;
//                 var id =Result.company[i].company[j]._id;
//                 var deleteStatus =Result.company[i].company[j].deleteStatus;
               
//                 if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
//                   // var List = "<option id='customerCurrency' data-id='"+id+"' >"+ id +"-"+ company +"</option>"   +
//                   var List = "<option id='customerCurrency' value='"+id+"' >"+ company +"</option>"   +

//                   $(".companyListSet").append(List);
                  
//                 }
//               }
//             }
//       }
      
//   }
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
// <!-- -------------------------------------------------------------------------get Active Type for add new loadboard ------------------------------------------------------------------------- -->  


  $("#LBLoadTypePlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addLoadTypeModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get Active Type  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Equipment Type for add new loadboard ------------------------------------------------------------------------- -->  
$('#select2-lb_EquipmentType-container').on('click', function(event){
    $('#EquipmentTypeModal').modal('hide');
  });

  $("#LBEquipmentTypePlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addEquipmentTypeModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get Equipment Type  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Carrier for add new loadboard ------------------------------------------------------------------------- -->  

$("#LBCarrierPlus").click(function(){
  $("#addLoadBoardModal").css("z-index","-1");
  $("#AddExternalCarrier").modal("show");
  
});
// <!-- -------------------------------------------------------------------------over get Carrier  ------------------------------------------------------------------------- -->

// <!-- -------------------------------------------------------------------------get driver for add new loadboard ------------------------------------------------------------------------- -->  
  // $('#select2-LB_Driver-container').one('click', function(event){
  //   $('#driverModal').modal('hide');
  // });
 

  // function createDriverList(Result) {           
  //     var Length = 0;    
      
  //     if (Result != null) {
  //         Length = Result.driver.length;
  //     }

  //     if (Length > 0) {
  //         // var no=1;
  //         $(".DriverListSet").html('');
  //         for (var i = 0; i < Length; i++) { 
  //             var DriverLength =Result.driver[i].driver.length;
  //             for (var j = 0; j < DriverLength; j++) {  
  //               var driverName =Result.driver[i].driver[j].driverName;
  //               var id =Result.driver[i].driver[j]._id;
  //               var deleteStatus =Result.driver[i].driver[j].deleteStatus;

  //               if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
  //                 var List = "<option id=''  value='"+id+"-"+ driverName +"'>" + driverName +  "<option>";                
  //                 $(".DriverListSet").append(List);
  //               }
  //             }
  //           }
  //     }
      
  // }

  $("#LBDriverPlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addDriverModal").modal("show");
    
  });
// <!-- -------------------------------------------------------------------------over get driver  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Trailer for add new loadboard ------------------------------------------------------------------------- -->  
  $('.TrailerListSet').focus(function(){
    $('#TrailerModal').modal('hide');
  });

  $("#LBTrailerPlus1").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addTrailerModal").modal("show");
  });
  $("#LBTrailerPlus2").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addTrailerModal").modal("show");
  });
// <!-- -------------------------------------------------------------------------over get Trailer  ------------------------------------------------------------------------- -->
//-----------------------get owner truck and per-----------------select2-lb_owner-container
  // $('#lb_owner').change(function() {
  //   var id=$('#lb_owner').val();
  //   $.ajax({
  //     type: "get",
  //     url: base_path+"/admin/owner",
  //     // data: {id:id},
  //     success: function(Result) {
  //       console.log(Result); 
  //       setOwnerPerTruck(Result);
  //     }
  //   });
  // });

  // function setOwnerPerTruck(Result) {
  //   var id=$('#lb_owner').val();            
  //     var Length = 0;    
      
  //     if (Result != null) {
  //         Length = Result.Owner.length;
  //     }

  //     if (Length > 0) {
  //         // var no=1;
  //         for (var i = 0; i < Length; i++) { 
  //             var Length1 =Result.Owner[i].ownerOperator.length;
  //             console.log(Length1);
  //             for (var j = 0; j < Length1; j++) {  
  //               var percentage =Result.Owner[i].ownerOperator[j].percentage;
  //               var truckNo =Result.Owner[i].ownerOperator[j].truckNo;
  //               var driverId =Result.Owner[i].ownerOperator[j].driverId;
  //               if(driverId == id){
  //                 $('#lb_owner_percentage').val(percentage+"%");
                  
  //                 $("#lb_owner_truck option").each(function()
  //                 {
  //                      var no= $(this).val() ;
  //                      if(truckNo == no){
  //                       $('#lb_owner_truck').select2('val',truckNo);
  //                     }
  //                 });
  
  //                 break;
  //               }
                
  //             }
  //           }
  //     }
      
  // }
//-----------------------end owner truck and per-----------------

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
// $("#lb1_shipperName").change(function(){
//   // alert();
//   //var id=$("#LB_Shipper").val();
//   var Shipper=$('#lb_shipperName').val().split('-');
  
//   $("#shipperId").val(Shipper[0]);
//   $("#shipperaddress").val(Shipper[1]);
//   $("#activeshipper").val(Shipper[2]);
  
// });
// function createshipperList(Result) {           
//     var Length = 0;    
//     if (Result != null) {
//         Length = Result.shipper.length;
//     }

//     if (Length > 0) {
//         // var no=1;
//         $(".ShipperListSet").html('');
//         for (var i = 0; i < Length; i++) { 
//             var shipperLength =Result.shipper[i].shipper.length;
//             for (var j = 0; j < shipperLength; j++) {  
//               var id =Result.shipper[i].shipper[j]._id;
//               var shipperName =Result.shipper[i].shipper[j].shipperName;
//               var shipperAddress =Result.shipper[i].shipper[j].shipperAddress;
//               var shipperLocation =Result.shipper[i].shipper[j].shipperLocation;
//               // var shipperNumber =Result.shipper[i].shipper[j].shipperNumber;
//               var deleteStatus =Result.shipper[i].shipper[j].deleteStatus;

//               // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
//                 var List = "<option class='LB_Shipper' value='"+id+"-"+shipperAddress+"-"+shipperLocation+"'>"+shipperName+"</option>"                   
//                 $("#lb_shipperName").append(List);
//                 // $(".lb1_shipperName").append(List);
//               // }
//             }
//           }
//     }
    
// }
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
// <!-- -------------------------------------------------------------------------Accessorial ------------------------------------------------------------------------- -->
$(".closeAccCarrier").click(function(){
  $("#AccessorialModal_carrier").modal("hide");
});
$(".closeAccdriver").click(function(){
  $("#AccessorialModal_driver").modal("hide");
});
$(".closeAccowneroperator").click(function(){
  $("#AccessorialModal_owneroperator").modal("hide");
});
$(".closeAcc").click(function(){
  $("#AccessorialModal").modal("hide");
});
// <!-- -------------------------------------------------------------------------end Accessorial ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------add email ------------------------------------------------------------------------- -->
$("#carrierratecon").click(function(){
  $("#carrierrateconModal").modal("show");
});
$("#customerratecon").click(function(){
  $("#customerrateconModal").modal("show");
});
$(".closeEmailModal1").click(function(){
  $("#carrierrateconModal").modal("hide");
});
$(".closeEmailModal2").click(function(){
  $("#customerrateconModal").modal("hide");
});
// <!-- -------------------------------------------------------------------------end add email ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------add location ------------------------------------------------------------------------- -->
$("#startLocation").click(function(){
  $("#addstartlocation").modal("show");
});
$("#endLocation").click(function(){
  $("#endlocationmodal").modal("show");
});
$(".closestartlocation").click(function(){
  $("#addstartlocation").modal("hide");
});
$(".closeEndlocationmodal").click(function(){
  $("#endlocationmodal").modal("hide");
});
// <!-- -------------------------------------------------------------------------end location ------------------------------------------------------------------------- -->



// <!-- -------------------------------------------------------------------------submit add new loadboard ------------------------------------------------------------------------- -->  
$("#select2-lb_Company-container, #select2-lb_Dispatcher-container, #lbCN_No").click(function(){
  $("#select2-lb_Company-container").css("border", "1px solid #ced4da");
  $("#select2-lb_Dispatcher-container").css("border", "1px solid #ced4da");
  $("#lbCN_No").css("border", "1px solid #ced4da");
});
$("#select2-lb_load-container").click(function(){
  document.getElementById('units').disabled = false;
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
    if(company == 'Select Here' || company == '' ){
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

    var dispatcher=$('#lb_Dispatcher').val();
    if(dispatcher == '' ){
      swal.fire({title: 'Please Slelect dispatcher',text: 'Redirecting...',timer: 4000,buttons: false,})
      $("#select2-lb_Dispatcher-container").css("border", "2px solid red");
      $("#lb_Company").focus();
      return false;
     }
   
    var cnno=$('#lbCN_No').val();
    if(cnno == '' ){
      swal.fire({title: 'Enter cnno',text: 'Redirecting...',timer: 4000,buttons: false,})
      $("#lbCN_No").css("border", "2px solid red");
      $("#lbCN_No").focus();
      return false;
     }
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
    var lbcarrier=$('#LB_Carrier').val().split('-');
    var carrier_name=lbcarrier[0];
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
    var lb_owner=$('#lb_owner').val().split('-');
    var owner_name=lb_owner[0];
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
    var carrier_parent=$('#carrier-parent').val();
    var customer_parent=$('#customer-parent').val();
    var driver_parent=$('#driver-parent').val();
    var owner_parent=$('#owner-parent').val();
    var isBroker=$('#isbroker').val();
    var isIftaVerified='';
    var receipt_status='';
    var custDays=$('#custdays').val();
    var carDays=$('#cardays').val();
    //carrier_email
    var CarrierEmail=$('#emailcarrier1').val();
    var email2=$('#emailcarrier2').val();
    var email3=$('#emailcarrier3').val();
    //customer_email
    var CustomerEmail=$('#emailcustomer1').val();
    var emailcustomer2=$('#emailcustomer2').val();
    var emailcustomer3=$('#emailcustomer3').val();


    var formData = new FormData();
    $.each($("#carrierfiles")[0].files, function(i, file) {            
      formData.append('carrierfiles[]',file);
    });
   
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('customername',customerName);
    formData.append('loadername',loadername);
    formData.append('loadertruck',loadertruck);
   
    formData.append('loadertrailer',loadertrailer);
       //formData.append('shippername', loadershipper);
    //formData.append('consigneename', loaderconsignee);
    formData.append('loadertotal',loadertotal);
     formData.append('company',company);
     formData.append('customer',customer);
     formData.append('dispatcher',dispatcher);
     formData.append('cnno',cnno);
      formData.append('status',status);
     formData.append('active_type',loadtype);
     formData.append('rate',rate);
     formData.append('noofunits',noofunits);
     formData.append('fsc',fsc);
     formData.append('fsc_percentage',fsc_percentage);
     formData.append('other_charges',other_charges);
     formData.append('data_other_charges',$('#AccessorialModalForm').serialize() );
     formData.append('setTotalRate',totalAmount);
     formData.append('equipment_type',equiptype);
     formData.append('typeofloader',typeofloader);
     formData.append('carrier_name',carrier_name);
     formData.append('flat_rate',flat_rate);
     formData.append('isIfta',isIfta);
     formData.append('advance_charges',advance_charges);
     formData.append('data_carrier_other_modal',$('#carrierOtherModalForm').serialize() );
     formData.append('carrier_total',carrier_total);
     formData.append('currency',currency);
     formData.append('driver_name',drivername);
     formData.append('truck',truck);
     formData.append('trailer',trailer);
     formData.append('loaded_mile',loadedmile);
     formData.append('empty_mile',emptymile);
     formData.append('driver_other',driver_other);
     formData.append('data_driver_other_modal',$('#driver_other_modal').serialize() );
     formData.append('tarp',tarp);
     formData.append('flat',flat);
     formData.append('driver_total',loadertotal);
     //owner
     formData.append('owner_name',owner_name);
     formData.append('owner_percentage',owner_percentage);
     formData.append('owner_truck',owner_truck );
     formData.append('owner_trailer', owner_trailer);
     formData.append('owner_other',owner_other);
     formData.append('data_owneroperator_other_modal',$('#owneroperator_other_modal').serialize() );
     formData.append('owner_total',owner_total);
     formData.append('startlocation',start_location);
     formData.append('endlocation',end_location);
     formData.append('data_shipper',$('#shipperForm').serialize());
     formData.append('data_consignee',$('#consigneeForm').serialize());
     formData.append('tarp_select',tarp_select);
     formData.append('loaded_miles_value',loaded_miles_value);
     formData.append('empty_miles_value',empty_miles_value);
     formData.append('driver_miles_value',driver_miles_value);
     //formData.append('file',);
     formData.append('load_notes',load_notes);
     //formData.append('data_CarrierEmail',$('#CarrierEmail').serialize() );
     formData.append('CarrierEmail',CarrierEmail);
     formData.append('email2',email2);
     formData.append('email3',email3);
     //formData.append('data_customerEmail',$('#customerEmail').serialize() );
     formData.append('CustomerEmail',CustomerEmail);
     formData.append('emailcustomer2',emailcustomer2);
     formData.append('emailcustomer3',emailcustomer3);
     formData.append('brokerdriver',broker_driver);
     formData.append('brokerdrivercontact',broker_driver_contact);
     formData.append('broker_truck',broker_truck);
     formData.append('broker_trailer',broker_trailer);
     formData.append('is_unit_on',is_unit_on);
     formData.append('carrier_parent',carrier_parent);
     formData.append('customer_parent',customer_parent);
     formData.append('driver_parent',driver_parent);
     
     formData.append('owner_parent',owner_parent);
     // edit: edit,
     // loadid: loadid,
     // createdate: createDate,
     // companyId: companyid,
     // privilege: privilege,
     formData.append('isbroker',isbroker);
     //formData.append('loadParent',loadParent );
     formData.append('isIftaVerified',isIftaVerified);
     formData.append('receipt_status',receipt_status);
     formData.append('custdays',custDays);
     formData.append('cardays',carDays);

    //  console.log(formData);
    //  return;
    $.ajax({
        url: base_path+"/admin/addLoadBoard",
        type: "POST",
        datatype:"JSON",
        contentType: false,
        processData: false,
        data:formData,
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
// <!-- ---------------------------------get carrier------------------------------------
  $('#LB_Carrier').change(function() {
    var LB_Carrier =$('#LB_Carrier').val().split('-');
    var formData = new FormData();
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('carrierId',LB_Carrier[0]);
    formData.append('mainId',LB_Carrier[1]);
      $.ajax({
        url: base_path+"/admin/carrierVerify",
        type: "POST",
        datatype:"JSON",
        contentType: false,
        processData: false,
        data:formData,
        cache: false,
        success: function (data) {
          var response = JSON.parse(data);
          console.log("response ActiveCarrier:> ", response, response['email']);
          if (response["blackListed"] === true) {
            swal.fire({
              title: "Warning!",
              type: "warning",
              html: "<b style='font-weight:bold;line-height:1.5'>This carrier is blackListed.</b><br><p>In order to continue with this carrier contact admin.</p>",
              cancelButtonText: "Ok",
              cancelButtonClass: "btn btn-danger ml-2",
              buttonsStyling: false,
            });
            $("#browserscarrier").html("");
            $("#carrierlist").val("");
            return;
          } else {
            if (response[0] != "") {
              swal.fire({
                title: "Are you sure? You Want to Continue!",
                type: "warning",
                html: response["instruction"],
                showCancelButton: true,
                confirmButtonText: "Yes, Continue!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger ml-2",
                buttonsStyling: false,
              });
            }
          }
        
          if (response['email'] != "") {
            carrieremail = response["email"];
            $("#carrierratecon").attr('modal-value', JSON.stringify([{"CarrierEmail": response["email"],"email2":"","email3":""}]))
          }
  
          if (response[2] != "") {
            carrier_parent = response["parent"];
          }
          document.getElementById("carrier-parent").value = carrier_parent;
          document.getElementById("cardays").value = response["paydays"];
        },
    });
  });
  // <!-- ---------------------------------get driver------------------------------------
  $('#LB_Driver').change(function() {
    var LB_Driver=$('#LB_Driver').val().split('-');
    var formData = new FormData();
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('driverId',LB_Driver[0]);
    formData.append('mainId',LB_Driver[2]);
    // alert($('#LB_Driver').val());
      $.ajax({
        url: base_path+"/admin/driverVerify",
        type: "POST",
        datatype:"JSON",
        contentType: false,
        processData: false,
        data:formData,
        cache: false,
        success: function (data) {
          // console.log(data);
          var response = data.split("^");
          var driver_total = document.getElementById("LB_loadertotal");
          document.getElementById("lb_LoadedMiles").value = response[1];
          document.getElementById("lb_EmptyMiles").value = response[2];
          document.getElementById("lb_Tarp").value = parseInt( response[3]).toFixed(2);
          pickrate = response[4];
          pickafter = response[5];
          droprate = response[6];
          dropafter = response[7];
          driverRate = response[8];
          percentage = response[10];
          console.log(driverRate);
          if (driverRate == "percentage") {
            var totalRate = document.getElementById("totalAmount").value;
            console.log(totalRate);
            console.log(percentage);
            var percen = parseFloat((totalRate * percentage) / 100).toFixed(2);
            console.log(percen);
            driver_total.value = parseFloat(percen).toFixed(2);
            // driver_total.value = parseInt(percen);
          }else{
            driver_total.value = 0.00;
          }
          tarp = response[3];
          if (response[0] != "") {
            swal.fire({
              title: "Are you sure? You Want to Continue!",
              type: "warning",
              type: "info",
              html: response[0],
              showCancelButton: true,
              confirmButtonText: "Yes, Continue!",
              cancelButtonText: "No, cancel!",
              confirmButtonClass: "btn btn-success",
              cancelButtonClass: "btn btn-danger ml-2",
              buttonsStyling: false,
            });
          }
  
          if (response[9] != "") {
            driver_parent = response[9];
          }
        },
    });
  });
  // <!-- ---------------------------------get owner------------------------------------
    $('#lb_owner').change(function() {
      
      var lb_owner=$('#lb_owner').val().split('-');
      alert(lb_owner);
      var formData = new FormData();
      formData.append('_token',$("#tokenLoadboard").val());
      formData.append('Id',lb_owner[0]);
      formData.append('mainId',lb_owner[1]);
      // alert($('#LB_Driver').val());
        $.ajax({
          url: base_path+"/admin/ownerVerify",
          type: "POST",
          datatype:"JSON",
          contentType: false,
          processData: false,
          data:formData,
          cache: false,
          success: function (data) {
            // console.log(data);
            var values = data.split("^");
            var ownertrucklist = values[1].split(")");
            // console.log(values[0]);
            // console.log(values[1]);
            // console.log(values[2]);
            // console.log(ownertrucklist);

          // $('#lb_owner_truck').select2().val(ownertrucklist[0]).trigger('change');

            document.getElementById("lb_owner_percentage").value = values[0];
            owner_parent = ownertrucklist[2] + ")" + ownertrucklist[3];
            var otherCharges =$("#lb_owner_other").val();
            if (otherCharges.value == 0) {
              document.getElementById("lb_owner_total").value = parseFloat((parseFloat(document.getElementById("totalAmount").value) * parseFloat(values[0])) /100).toFixed(2);
            } else {
               var tot1= parseFloat((parseFloat(document.getElementById("totalAmount").value) * parseFloat(values[0])) / 100 );
               var tot2=parseFloat(tot1)+parseFloat(otherCharges);
               document.getElementById("lb_owner_total").value=tot2.toFixed(2);
            }
    
            if (values[2] != "") {
              swal.fire({
                title: "Are you sure? You Want to Continue!",
                type: "warning",
                type: "info",
                html: values[3],
                showCancelButton: true,
                confirmButtonText: "Yes, Continue!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger ml-2",
                buttonsStyling: false,
              });
            }
            $('#lb_owner_truck').select2().val(ownertrucklist[0]).trigger('change');
          },
          
      });
    });

    $('#lb_owner_truck, #LB_Truck').change(function() {
      var lb_owner_truck=$('#lb_owner_truck').val();
      var formData = new FormData();
      formData.append('_token',$("#tokenLoadboard").val());
      formData.append('Id',lb_owner_truck);
      // formData.append('mainId',lb_owner_truck[1]);
      $.ajax({
        url: base_path+"/admin/ownerTruckVerify",
        type: "POST",
        datatype:"JSON",
        contentType: false,
        processData: false,
        data:formData,
        cache: false,
          success: function (data) {
              var res = JSON.parse(data);
              console.log(res);
              if (res['instruction'] != "") {
                  swal.fire({
                      title: 'Are you sure? You Want to Continue!',
                      type: 'warning',
                      type: 'info',
                      html: res['instruction'],
                      showCancelButton: true,
                      confirmButtonText: 'Yes, Continue!',
                      cancelButtonText: 'No, cancel!',
                      confirmButtonClass: 'btn btn-success',
                      cancelButtonClass: 'btn btn-danger ml-2',
                      buttonsStyling: false
                  });
              }
  
              isIfta = res['ifta'];
          }
      });
  
    });
  // <!-- --------------------------------getTrailer------------------------------------
  $('#lb_owner_trailer, #LB_Trailer').change(function() {
    var clickedId = this.id;
    console.log(clickedId + " was clicked!");

    var lb_trailer=$(this).val();
    // alert(lb_trailer);
    var formData = new FormData();
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('Id',lb_trailer);
     
    $.ajax({
      url: base_path+"/admin/ownerTrailerVerify",
      type: "POST",
      datatype:"JSON",
      contentType: false,
      processData: false,
      data:formData,
      cache: false,
      success: function (data) {
        if (data != "") {
          swal.fire({
            title: "Are you sure? You Want to Continue!",
            type: "warning",
            type: "info",
            html: data,
            showCancelButton: true,
            confirmButtonText: "Yes, Continue!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success",
            cancelButtonClass: "btn btn-danger ml-2",
            buttonsStyling: false,
          });
        }
      },
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