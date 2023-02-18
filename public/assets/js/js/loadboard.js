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
    console.log(status)
    //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
    dataTable.column(7).search(status).draw();
  })
//-- -------------------------------------------------------------------------    -- -------------------------------------------------------------------------
// $('.nav-item-custom').click(function(){
  
//   if ($('.shipper, .list-anchors').hasClass('active')) {
//     console.log('aa');
//     $('.nav-item-custom').css('color','blue');
//     }
//     else {
//       $('.nav-item-custom').css('color','white');
    
//     }
// });

//-- -------------------------------------------------------------------------  Get loaboard data -- -------------------------------------------------------------------------
  $.ajax({
      type: "GET",
      url: base_path+"/admin/getLoadboardData",
      async: false,
      //dataType:JSON,
      success: function(text) {
         //console.log(text);
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
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra1'>Carrier</h6>`";
                          }else if (typeofloader == "Driver") {
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra2'>Driver</h6>`";
                          }else if (typeofloader == "Owner Operator") {
                            var carrier_driver_ownerOperator =carrier_driver_ownerOperator+"<h6 class='extra3'>Owner Operator</h6>`";
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

                          // var status_change_user1=Result1[i].load[j].status_change_user;
                          // console.log(status_change_user1);
                          // var status_change_user=0;
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
                        if( order_id.length >= 5 ) {
                          order_id = order_id.substr(0,5);
                          order_id = order_id+"..."
                        }
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
                          "<td data-field='no' data-toggle='tooltip' data-placement='top' title='"+info+"'><i class='mdi mdi-restore-clock' style='font-size:24px'></i><br>" + no + "</td>" +
                          "<td data-field='invoice' class='modal-trigger invoice_btn' >"+invoice +" <br>"+chatIcon+" "+folderIcon+" "+truckIcon+" <div class='rrrrr' style='position: absolute;z-index: 22222;height: 64px; display:none;'><ul><li><a href='#'>Menu 1</a></li><li><a href='#'>Menu 2</a></li><li><a href='#'>Menu 3</a></li></ul></div></td>" +
                          "<td data-field='orderId' class='orderId' title='" + orderId + "'>" + order_id + "</td>" +
                          "<td data-field='status' style='color:black;'>" + 
                            "<select class='form-control loadStatus' id='loadStatus' data-com_id='"+com_id+"' data-invoiceId='"+invoice+"' style='width: auto;text-align: center;border-radius:20px;background-color: radial-gradient(100% 100% at 100% 0, #00d1fc 0, #005880 100%);color:Black'>" +
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
                          "<td data-field='shipDate'>" + shipDate + "</td>" +
                          "<td data-field='delDate'>" + delDate + "</td>" +
                          "<td data-field='customer' class='LBcustomer' >" + customer +"</td>" +
                          "<td data-field='carrier_driver_ownerOperator'>" + carrier_driver_ownerOperator + "</td>" +
                          "<td data-field='origin'>" + origin + "</td>" +
                          "<td data-field='destibation'>" + destibation + "</td>" +
                          "<td data-field='truck'>" + truck + "</td>" +
                          "<td data-field='trailer' title='" + trailer + "'>" + _trailer + "</td>" +
                          "<td data-field='loadPay'>$" + loadPay + "</td>" +
                          "<td data-field='carrierPay_driverPay'>$" + carrierPay_driverPay + "</td>" +
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
     $('.companyListSet').focus(function(){
      $.ajax({
        type: "GET",
        url: base_path+"/admin/lbcompany",
        async: false,
        success: function(Result) { 
          console.log(Result);                    
            createcompanyList(Result);
        }
    });
  });

  function createcompanyList(Result) {           
      var Length = 0;    
      
      if (Result != null) {
          Length = Result.company.length;
          console.log(Length);
      }

      if (Length > 0) {
          // var no=1;
          $(".companyListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var companyLength =Result.company[i].company.length;
              for (var j = 0; j < companyLength; j++) {  
                var company =Result.company[i].company[j].companyName;
                var id =Result.company[i].company[j]._id;
                var deleteStatus =Result.company[i].company[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='customerCurrency' data-id='"+id+"' value='"+ company +"'>"                   
                  $(".companyListSet").append(List);
                }
              }
            }
      }
      
  }
// <!-- -------------------------------------------------------------------------over get company  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get customer for add new loadboard ------------------------------------------------------------------------- -->  
  $('.customerListSet').focus(function(){
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
          console.log(Length);
      }

      if (Length > 0) {
          // var no=1;
          $(".customerListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var customerLength =Result.customer[i].customer.length;
              for (var j = 0; j < customerLength; j++) {  
                var customer =Result.customer[i].customer[j].custName;
                var id =Result.customer[i].customer[j]._id;
                var deleteStatus =Result.customer[i].customer[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='customerCurrency' data-id='"+id+"' value='"+ customer +"'>"                   
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
  $('.DispatcherListSet').focus(function(){
    console.log("helo"); 
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
          console.log(Length);
      }

      if (Length > 0) {
          $(".DispatcherListSet").html('');
          for (var i = 0; i < Length; i++) { 
              // var DispatcherLength =Result[i].Dispatcher.length;
              // for (var j = 0; j < DispatcherLength; j++) {  
                var id =Result[i]._id;
                var userFirstName =Result[i].userFirstName;
                var userLastName =Result[i].userLastName;
                // var deleteStatus =Result[i].Dispatcher[j].deleteStatus;

                // if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='Dispatcher' data-value='"+id+"' value='"+ userFirstName +" "+ userLastName +"'>"                   
                  $(".DispatcherListSet").append(List);
                // }
              // }
            }
      }
      
  }
// <!-- -------------------------------------------------------------------------over get Dispatcher  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------get Active Type for add new loadboard ------------------------------------------------------------------------- -->  
  $('.LoadTypeListSet').focus(function(){
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
          console.log(Length);
      }

      if (Length > 0) {
          // var no=1;
          $(".LoadTypeListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var LoadTypeLength =Result.Load_type[i].loadType.length;
              for (var j = 0; j < LoadTypeLength; j++) {  
                var loadName =Result.Load_type[i].loadType[j].loadName;
                var id =Result.Load_type[i].loadType[j]._id;
                var deleteStatus =Result.Load_type[i].loadType[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='' data-id='"+id+"' value='"+ loadName +"'>"                   
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
  $('.EquipmentTypeListSet').focus(function(){
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
          console.log(Length);
      }

      if (Length > 0) {
          // var no=1;
          $(".EquipmentTypeListSet").html('');
          for (var i = 0; i < Length; i++) { 
              var EquipmentTypeLength =Result.EquipmentType[i].equipment.length;
              for (var j = 0; j < EquipmentTypeLength; j++) {  
                var equipmentType =Result.EquipmentType[i].equipment[j].equipmentType;
                var id =Result.EquipmentType[i].equipment[j]._id;
                var deleteStatus =Result.EquipmentType[i].equipment[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id='' data-id='"+id+"' value='"+ equipmentType +"'>"                   
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
          console.log(Length);
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
                  var List = "<option id='' data-id='"+id+"' value='"+ driverName +"'>"                   
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
                  var List = "<option id='' data-id='"+id+"' value='"+ trailerNumber +"'>"                   
                  $(".TrailerListSet").append(List);
                }
              }
            }
      }
      
  }

  $("#LBTrailerPlus").click(function(){
    $("#addLoadBoardModal").css("z-index","-1");
    $("#addTrailerModal").modal("show");
  });
// <!-- -------------------------------------------------------------------------over get driver  ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------submit add new loadboard ------------------------------------------------------------------------- -->  
  $("#addLBSubmit").click(function(){
    var company=$('#lbCompany').val();


    var customerName=$('#LB_Customer').val();
    var loadername=$('#LB_Driver').val();
    var loadertruck=$('#LB_Truck').val();
    var loadertrailer=$('#LB_Trailer').val();
    // var loadershipper=$('#').val();
    // var loaderconsignee=$('#').val();
    var loadertotal=$('#LB_loadertotal').val();
   
    // var =$('#').val();
    // var =$('#').val();
    // var =$('#').val();
    // var =$('#').val();
    // var =$('#').val();
    // var =$('#').val();
    // var =$('#').val();


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
            
              // company: company,
              // customer: customer,
              // dispatcher: dispatcher,
              // cnno: cnno,
              // status: status,
              // active_type: loadtype,
              // rate: rate,
              // noofunits: noofunits,
              // fsc: fsc,
              // fsc_percentage: fsccheck,
              // other_charges: otherCharges,
              //     other_description: otherDescription,
              //     other_charges_total: otherchargestotal,
              // setTotalRate: totalamount,
              // equipment_type: equiptype,
              // typeofLoader: typeofloader,
              // carrier_name: carriername,
              // flat_rate: carrierflat,
              // isIfta: isIfta,
              // advance_charges: carrierother,
              //     carrier_other_description: carrierotherDescription,
              //     carrier_other_advance: carrierotherAdvances,
              //     carrier_other_charges: carrierotherCharges,
              // carrier_total: carrierTotal,
              // currency: currency,
              // driver_name: drivername,
              // truck: truck,
              // trailer: trailer,
              // loaded_mile: loadedmile,
              // empty_mile: emptymile,
              // driver_other: driverother,
              //     driver_other_description: driverotherDescription,
              //     driver_other_charges: driverotherCharges,
              // tarp: tarp,
              // flat: flat,
              // driver_total: drivertotal,
              // owner_name: owner,
              // owner_percentage: ownerpay,
              // owner_truck: ownertruck,
              // owner_trailer: ownertrailer,
              // owner_other: ownerother,
              //     owner_other_description: ownerotherDescription,
              //     owner_other_charges: ownerotherCharges,
              // owner_total: ownertotal,
              // startlocation: startLocation,
              // endlocation: endLocation,
              // // shippertab: shippertab....,
              //     shipper_name: shippername,
              //     shipper_address: shipperaddress,
              //     shipper_location: shipperlocation,
              //     shipper_pickup: shipperpickup,
              //     shipper_picktime: shipperpicktime,
              //     shipper_load_type: shipperloadtype,
              //     shipper_commodity: shippercommodity,
              //     shipper_qty: shipperqty,
              //     shipper_weight: shipperweight,
              //     shipper_pickup_number: shipperpickupnumber,
              //     shipper_seq: shipperseq,
              //     shipper_notes: shippernotes,
              //     shipper_parent: shipperparent,
              // // consigneetab: consigneetab...,
              //     consignee_name: consigneename,
              //     consignee_address: consigneeaddress,
              //     consignee_location: consigneelocation,
              //     consignee_pickup: consigneepickup,
              //     consignee_picktime: consigneepicktime,
              //     consignee_load_type: consigneeloadtype,
              //     consignee_commodity: consigneecommodity,
              //     consignee_qty: consigneeqty,
              //     consignee_weight: consigneeweight,
              //     consignee_delivery_number: consigneedropnumber,
              //     consignee_seq: consigneeseq,
              //     consignee_notes: consigneenotes,
              //     consignee_parent: consigneeparent,
              // tarp_select: tarpselect,
              // loaded_miles_value: loadedMilesValue,
              // empty_miles_value: emptymilesvalue,
              // driver_miles_value: drivermilesvalue,

              // load_notes: loadnotes,
              //     carrier_email: carrieremail,
              //     email2: email2,
              //     email3: email3,

              //     customer_email: customeremail,
              //     emailcustomer2: emailcustomer2,
              //     emailcustomer3: emailcustomer3,
              // brokerdriver: brokerdriver,
              // brokerdrivercontact: brokerdrivercontact,
              // broker_truck: brokertruck,
              // broker_trailer: brokertrailer,
              // is_unit_on: is_unit_on,
              // carrier_parent: carrier_parent,
              // customer_parent: customer_parent,
              // driver_parent: driver_parent,
              // owner_parent: owner_parent,
              // edit: edit,
              // loadid: loadid,
              // createdate: createDate,
              // companyId: companyid,
              // privilege: privilege,
              // isbroker: isbroker,
              // loadParent: loadParent,
              // custdays: custdays,
              // cardays: cardays,
        },
        cache: false,
        success: function(Result){
            // console.log(Result);
            // if(Result){
            //     swal.fire({title: 'Added successfully',text: 'Redirecting...',timer: 3000,buttons: false,})
            //     $("#addLoadBoardModal").css("z-index","100000000000");
            //     $("#addLoadTypeModal").modal("hide");
            //     $("#addLoadTypeModal form").trigger('reset');
            //     $.ajax({
            //         type: "GET",
            //         url: base_path+"/admin/getLoadType",
            //         async: false,
            //         success: function(text) {
            //             console.log(text);
            //             createLoad_typeRows(text);
            //           }
            //     });
            //     $('#LoadModal').modal('show');
            // }else{
            //     swal.fire(" Not Added successfully.");
            // }
        }
    });

  });
// <!-- -------------------------------------------------------------------------submit add new loadboard ------------------------------------------------------------------------- -->  

});