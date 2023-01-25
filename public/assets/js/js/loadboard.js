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

// var table = document.getElementById("myTable");
// var rows = table.rows;
// var data = [];
// for (var i = 1; i < rows.length; i++) {
//   data.push([]);
//   var cells = rows[i].cells;
//   for (var j = 0; j < cells.length; j++) {
//     data[i-1].push(cells[j].innerHTML);
//   }
// }

// data.sort(function(a, b) {
//   return a[1] > b[1];
// });

// for (var i = 1; i < rows.length; i++) {
//   table.deleteRow(1);
// }
// for (var i = 0; i < data.length; i++) {
//   var row = table.insertRow(-1);
//   for (var j = 0; j < data[i].length; j++) {
//     var cell = row.insertCell(-1);
//     cell.innerHTML = data[i][j];
//   }
// }


//-- -------------------------------------------------------------------------  Get  -- -------------------------------------------------------------------------
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
// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
  
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
                          var shipDate = new Date(Result1[i].load[j].shipper_pickup);
                          var delDate = new Date(Result1[i].load[j].consignee_pickup);
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
                          //convert date
                          var created_at = new Date(Result1[i].load[j].created_at);
                          if(created_at !="" && created_at != null){ created_at= ((created_at.getMonth() > 8) ? (created_at.getMonth() + 1) : ('0' + (created_at.getMonth() + 1))) + '/' + ((created_at.getDate() > 9) ? created_at.getDate() : ('0' + created_at.getDate())) + '/' + created_at.getFullYear(); }else{ created_at="-"; }
                          var created_user=Result1[i].load[j].created_user;
                          var edit_by=Result1[i].load[j].edit_by;
                          var dispatcher=parseInt(Result1[i].load[j].dispatcher);

                          if(orderId==""){orderId="-";}
                          if(shipDate !="" && shipDate != null){ shipDate= ((shipDate.getMonth() > 8) ? (shipDate.getMonth() + 1) : ('0' + (shipDate.getMonth() + 1))) + '/' + ((shipDate.getDate() > 9) ? shipDate.getDate() : ('0' + shipDate.getDate())) + '/' + shipDate.getFullYear(); }else{ shipDate="-"; }
                          if(delDate !="" && delDate != null){ delDate= ((delDate.getMonth() > 8) ? (delDate.getMonth() + 1) : ('0' + (delDate.getMonth() + 1))) + '/' + ((delDate.getDate() > 9) ? delDate.getDate() : ('0' + delDate.getDate())) + '/' + delDate.getFullYear(); }else{ delDate="-"; }
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
                          +'\n Shipper Name: '+Result1[i].load[j].loaddata.shippername
                          +'\n Consignee Name: '+Result1[i].load[j].loaddata.consigneename
                          +'\n Created by: '+created_user
                          +'\n Created on: '+created_at
                          +'\n Edited by: '+edit_by
                          +'\n Status edit: '+status_change_user
                          +'\n Dispatcher: '+dispatcher;//
                          
                          //set dropdown in invoice
                          var isQuickLoad=null;
                          var hasFile=null;
                          var load_notes=null;
                          if (isQuickLoad != null) {
                            $(".icontruck").css({
                              "display": "inline",
                            });
                          }
                          if (hasFile != null) {
                            $(".iconFile").css({
                              "display": "inline",
                            });
                          }
                          if (load_notes != null) {
                            $(".iconNote").css({
                              "display": "inline",
                            });
                          }
                          

                          $('#loadStatus option:selected').eq(status).prop('selected', true);
                          
                          var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                          "<td data-field='no' data-toggle='tooltip' data-placement='top' title='"+info+"'><i class='mdi mdi-restore-clock' style='font-size:24px'></i><br>" + no + "</td>" +
                          "<td data-field='invoice'><span class='mdi mdi-comment-processing extra5 iconNote' style='display:none;'></span>  <span class='mdi mdi-folder extra6 iconFile' style='display:none;'></span><span class='mdi mdi-truck-fast extra7 icontruck' style='display:none;'></span><br>"+
                           invoice +
                          "</td>" +
                          "<td data-field='orderId'>" + orderId + "</td>" +
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
                          "<td data-field='trailer'>" + trailer + "</td>" +
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

// descending order
  // $("#LoadBoardTable tr").sort(sort_td).appendTo("#LoadBoardTable");
  // function sort_td(a, b) {
  //   return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
  // }


// <!-- -------------------------------------------------------------------------over function   ------------------------------------------------------------------------- -->  
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

});