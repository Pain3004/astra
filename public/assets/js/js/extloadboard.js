$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: base_path+"/admin/getExtLoadboardData",
    async: false,
    //dataType:JSON,
    success: function(text) {
        createLoadBoardRows(text);
      }
  });
  function createLoadBoardRows(Result) {
    var len = 0;
    var no=1;
        if (Result != null) {
            $("#extLoadBoardTable").html('');
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
                          // "<a class='dropbtn'></a><div class='dropdown-content'>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/pen.png' alt=''> Edit </a>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/duplicate.png' alt=''> Duplicate </a>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/note.png' alt=''> Internal Note</a>"+
                          //    " <a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/bol.png' alt=''> Create BOL </a>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/carrier-rate.png' alt=''> Create Carrier Rate Conf</a>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/customer-rate.png' alt=''> Create Customer Rate Conf</a>"+
                          //     "<a href='javascript:void(0)'><img src='http://127.0.0.1:8000/assets/images/brand/delete.png' alt=''> Delete</a></div></div></td>" +
                          "<td data-field='orderId' class='orderId td_new' title='" + orderId + "'>" + order_id + "</td>" +
                          // "<td class='td_new' data-field='status' style='color:black;'>" +
                              
                         //---bh----   
                            // "<select class='form-control loadStatus' id='loadStatus' data-main_id='"+main_id+"' data-com_id='"+com_id+"' data-invoiceId='"+invoice+"' style='width: auto;text-align: center;border-radius:20px;background-color: radial-gradient(100% 100% at 100% 0, #00d1fc 0, #005880 100%);color:Black'>" +
                                "<td disabled value='" + status +"'  selected='' >" + status +"</td>" +
                                // "<option value='Open'>Open</option>" +
                                // "<option value='Dispatched'>Dispatched</option>" +
                                // "<option value='Arrived Shipper'>Arrived Shipper</option>" +
                                // "<option value='Loaded'>Loaded</option>" +
                                // "<option value='On Route'>On Route</option>" +
                                // "<option value='Arrived Consignee'>Arrived Consignee</option>" +
                                // "<option value='Delivered'>Delivered</option>" +
                                // "<option value='Break Down'>Break Down</option>" +
                              // "</select>" +
                            // "</td>" +
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
                            "<td class='td_new' data-field='carrierPay_driverPay'>" +
                            "<a class='editLoad button-23'  title='Edit'  >Enquiry Now</a>&nbsp"+
                            "</td>" +
                            "</tr>";

                        $("#extLoadBoardTable").append(Str);
                        no++;
                        }
                    }
                }
                // descending order
                  $("#extLoadBoardTable tr").sort(sort_td).appendTo("#extLoadBoardTable");
                  function sort_td(a, b) {
                    return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                  }
            }else {
              var Str = "<tr data-id=" + i + ">" +
                  "<td align='center' colspan='4'>No record found.</td>" +
                  "</tr>";
              $("#extLoadBoardTable").append(Str);
            }
  
        }else {
        var Str = "<tr data-id=" + i + ">" +
          "<td align='center' colspan='4'>No record found.</td>" +
          "</tr>";
        }
    }

});