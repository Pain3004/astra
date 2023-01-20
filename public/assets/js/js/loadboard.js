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


// $('#LoadBoard_navbar').click(function(){
// alert();
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
  // $('#branchOfficeModal').modal('show');
// });

// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
  
// get
  function createLoadBoardRows(Result) {
  var len = 0;
  var no=1;
      if (Result != null) {
          $("#LoadBoardTable").html('');
      //open
          var len1 = Result.length;
          //alert(len1);
          if (len1 > 0) {
              for (var i = len1-1; i >= 0; i--) { 
                  var sub_len = Result[i].load.length;
                //alert(sub_len);
                  if (sub_len > 0) {
                    
                      for (var j = sub_len-1; j >= 0; j--) { 
                          var _id =Result[i].load[j]._id;
                          
                          var invoice =Result[i].load[j]._id;
                          var orderId =Result[i].load[j].cnno;
                          var status =Result[i].load[j].status;
                          var shipDate = new Date(Result[i].load[j].shipper_pickup);
                          var delDate = new Date(Result[i].load[j].consignee_pickup);
                          var customer =Result[i].load[j].loaddata.customername;
                          var carrier_driver_ownerOperator =Result[i].load[j].loaddata.loadername;
                          var origin =Result[i].load[j].shipper[0].shipper_location;
                          var destibation =Result[i].load[j].consignee[0].consignee_location;
                          var truck =Result[i].load[j].loaddata.loadertruck;
                          var trailer =Result[i].load[j].loaddata.loadertrailer;
                          var loadPay =Result[i].load[j].total_rate;
                          var carrierPay_driverPay=Result[i].load[j].carrier_total;

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
                          $('#loadStatus option:selected').eq(status).prop('selected', true);
                          
                                  var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                  "<td data-field='no'>" + no + "</td>" +
                                  "<td data-field='invoice' class='invoiceLB'>" + invoice + "</td>" +
                                  "<td data-field='orderId'>" + orderId + "</td>" +
                                  "<td data-field='status' style='color:black;'>" + 
                                
                                      "<select class='form-control' id='loadStatus'  style='width: auto;text-align: center;border-radius:20px;background-color: radial-gradient(100% 100% at 100% 0, #00d1fc 0, #005880 100%);color:Black'>" +
                                    //  "<option value='" + status +"'  selected='' >" + status +"</option>" +
                                      "<option value='Open'  > Open</option>" +
                                      "<option value='Dispatched'> Dispatched</option>" +
                                      "<option value='Arrived Shipper'> Arrived Shipper</option>" +
                                      "<option value='Loaded'> Loaded</option>" +
                                      "<option value='On Route'> On Route</option>" +
                                      "<option value='Arrived Consignee'> Arrived Consignee</option>" +
                                      "<option value='Delivered'> Delivered</option>" +
                                      "<option value='Break Down'> Break Down</option>" +
                                  "</select>" +
                                  "</td>" +
                                  "<td data-field='shipDate'>" + shipDate + "</td>" +
                                  "<td data-field='delDate'>" + delDate + "</td>" +
                                  "<td data-field='customer'>" + customer + "</td>" +
                                  "<td data-field='carrier_driver_ownerOperator'>" + carrier_driver_ownerOperator + "</td>" +
                                  "<td data-field='origin'>" + origin + "</td>" +
                                  "<td data-field='destibation'>" + destibation + "</td>" +
                                  "<td data-field='truck'>" + truck + "</td>" +
                                  "<td data-field='trailer'>" + trailer + "</td>" +
                                  "<td data-field='loadPay'>$" + loadPay + "</td>" +
                                  "<td data-field='carrierPay_driverPay'>$" + carrierPay_driverPay + "</td>" +
                                
                                  // "<td style='text-align:center'>"+
                                  //     "<a class='button-23 "+editPrivilege+" editBranchOffice'  title='Edit1' data-Id='"+Office_Id+"' data-comID='"+Office_com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                  // "</td>"+
                                  "</tr>";
      
                              $("#LoadBoardTable").append(Str);
                              no++;
                          

                      }
                      console.log($('._id').val());
                  }
                  
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

  var max = 0;


  var aa=$('.invoiceLB').val();
  console.log(aa);
// <!-- -------------------------------------------------------------------------over function   ------------------------------------------------------------------------- -->  

});