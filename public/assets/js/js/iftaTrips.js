var base_path = $("#url").val();
$(document).ready( function () {
    $('.editable-file-datatable').DataTable();
} );
$(document).ready(function() {
    $('.closeIftaTrip').click(function(){
        $('#IftaTripModalList').modal('hide');
        $("#NotVerifyIftaTripModalList").modal("hide");
    });
   
    $('#iftaTrip_navbar').click(function(){
        // alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getIftaTrip",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                // console.log(text);
                createIftaTripRows(text);
                notVerifyTrip(text);
                IftaTripResult = text;
             }
        });
        $('#IftaTripModalList').modal('show');
    });
    function createIftaTripRows(IftaTripResult)
    {
        $("#iftaTripTableVeri").html('');
        if (IftaTripResult !== null) 
        { 
            
            IftaTriplen = IftaTripResult.Shipper.load.length;
            if (IftaTriplen > 0) 
            {                   
                var no=1;
                for (var i = IftaTriplen-1; i >= 0; i--) 
                {  
                    var shipDate=IftaTripResult.Shipper.load[i].receivedate;
                    var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                    var date = new Date(shipDate*1000);
                    var year = date.getFullYear();
                    var month = months_arr[date.getMonth()];
                    var day = date.getDate();
                    var convdataTime = month+'/'+day+'/'+year;
                    var comId =IftaTripResult.companyID;
                    var IftaTripId =IftaTripResult.Shipper.load[i]._id;  
                    var varifyCondi=IftaTripResult.Shipper.load[i].isIftaVerified;
                    var truck=IftaTripResult.Shipper.load[i].loaddata['loadertruck'];
                    // var shipDate=IftaTripResult.Shipper.load[i].receivedate;
                    var startLocation=IftaTripResult.Shipper.load[i].start_location;
                    var end_location=IftaTripResult.Shipper.load[i].end_location;
                    var consignee_location=IftaTripResult.Shipper.load[i].consignee;
                    var empty_miles=IftaTripResult.Shipper.load[i].empty_miles_value;
                    var total_miles=parseInt(IftaTripResult.Shipper.load[i].loaded_miles_value)+parseInt(IftaTripResult.Shipper.load[i].empty_miles_value);
                    var shipper_location=IftaTripResult.Shipper.load[i].shipper;
                    var consigLeng=IftaTripResult.Shipper.load[i].consignee.length;
                    for(var j=0; j<consigLeng;j++)
                    {
                        var consigneeLocation=consignee_location[j].consignee_location;
                    }   
                    varshippingLeng=IftaTripResult.Shipper.load[i].shipper.length;
                    for(var j=0; j<varshippingLeng;j++)
                    {
                        var shipperLocation=shipper_location[j].shipper_location;
                    }          
                    var deleteStatus =IftaTripResult.Shipper.load[i].deleteStatus;
                    if(varifyCondi == "no")
                    {
                        if(shipDate !="")
                        {
                            if(typeof(IftaTripResult.Shipper.load[i].receivedate) != "undefined" && IftaTripResult.Shipper.load[i].receivedate !== null)
                            {
                                if(shipDate>=IftaTripResult.startdate && shipDate<=IftaTripResult.enddate)
                                {
                                    var Iftaloadtr = "<tr data-id=" + (i + 1) + ">" +
                                    "<td data-field='no'>" + no + "</td>" +
                                    "<td>"+IftaTripId+" </td>"+
                                    "<td>"+truck+"</td>"+
                                    "<td>"+startLocation+" </td>"+
                                    "<td>"+shipperLocation+" </td>"+
                                    "<td>"+consigneeLocation+" </td>"+
                                    "<td>"+end_location+" </td>"+
                                    "<td>"+convdataTime+" </td>"+
                                    "<td>"+empty_miles+" </td>"+
                                    "<td >" + total_miles + "</td>" +
                                
                                    "<td style='text-align:center'>"+
                                        

                                        "<a class='mt-2 button-29 fs-14 text-white edit_modal_iftaTrip'  title='Edit1' data-tripId='"+IftaTripId+"' data-compID='"+comId+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        

                                    "</td></tr>";

                                    $("#iftaTripTableVeri").append(Iftaloadtr);
                                    no++;
                                }
                            }
                        }
                    }
                }
            } 
            else 
            {
                    var Iftaloadtr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#iftaTripTableVeri").append(Iftaloadtr);
            }
            

           
        }
        else 
        {
            var Iftaloadtr = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#iftaTripTableVeri").append(Iftaloadtr);
        }
    }
    //============================ end list verify trip ====================
    //========================== start not verify trip ===============================
    $("#NotVerifyIftaTripModalList").modal("hide");
    $(".VerifyTrip").click(function(){
        $("#NotVerifyIftaTripModalList").modal("hide");
        $('#IftaTripModalList').modal('show');
    });
    $(".notVerifyTrip").click(function(){
        $("#NotVerifyIftaTripModalList").modal("show");
        $('#IftaTripModalList').modal('hide');           
    });
    // $("#editable-file-datatable").DataTable();
    function notVerifyTrip(IftaTripResult)
    {
        $("#notVerifyIftaTripTable").html('');
        if (IftaTripResult == 'null') 
        {  
            
            IftaTriplen = IftaTripResult.Shipper.load.length;
            if (IftaTriplen > 0) 
            { 
                // load_notes                  
                var no=1;
                for (var i = IftaTriplen-1; i >= 0; i--) 
                {  
                   
                    if(typeof(IftaTripResult.Shipper.load[i].receivedate) != "undefined" && IftaTripResult.Shipper.load[i].receivedate !== null)
                    {
                        var shipDate=IftaTripResult.Shipper.load[i].receivedate;
                        var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        var date = new Date(shipDate*1000);
                        var year = date.getFullYear();
                        var month = months_arr[date.getMonth()];
                        var day = date.getDate();
                        var convdataTime = month+'/'+day+'/'+year;
                    }
                    else
                    {
                        var convdataTime="----";
                    }
                    var comId =IftaTripResult.companyID;
                    var IftaTripId =IftaTripResult.Shipper.load[i]._id;  
                    var varifyCondi=IftaTripResult.Shipper.load[i].isIftaVerified;
                    var truck=IftaTripResult.Shipper.load[i].loaddata['loadertruck'];
                    // var shipDate=IftaTripResult.Shipper.load[i].receivedate;
                    var startLocation=IftaTripResult.Shipper.load[i].start_location;
                    var end_location=IftaTripResult.Shipper.load[i].end_location;
                    var consignee_location=IftaTripResult.Shipper.load[i].consignee;
                    var empty_miles=IftaTripResult.Shipper.load[i].empty_miles_value;
                    var total_miles=parseInt(IftaTripResult.Shipper.load[i].loaded_miles_value)+parseInt(IftaTripResult.Shipper.load[i].empty_miles_value);
                    var shipper_location=IftaTripResult.Shipper.load[i].shipper;
                    var consigLeng=IftaTripResult.Shipper.load[i].consignee.length;
                    for(var j=0; j<consigLeng;j++)
                    {
                        var consigneeLocation=consignee_location[j].consignee_location;
                    }   
                    varshippingLeng=IftaTripResult.Shipper.load[i].shipper.length;
                    for(var j=0; j<varshippingLeng;j++)
                    {
                        var shipperLocation=shipper_location[j].shipper_location;
                    }          
                    var deleteStatus =IftaTripResult.Shipper.load[i].deleteStatus;
                    if(varifyCondi == "no")
                    {
                        if(shipDate !="")
                        {
                            if(typeof(IftaTripResult.Shipper.load[i].receivedate) != "undefined" && IftaTripResult.Shipper.load[i].receivedate !== null)
                            {
                                if(shipDate>=IftaTripResult.startdate && shipDate<=IftaTripResult.enddate)
                                {
                                    var Iftaloadtr = "<tr data-id=" + (i + 1) + ">" +
                                    "<td data-field='no'>" + no + "</td>" +
                                    "<td>"+IftaTripId+" </td>"+
                                    "<td>"+truck+"</td>"+
                                    "<td>"+startLocation+" </td>"+
                                    "<td>"+shipperLocation+" </td>"+
                                    "<td>"+consigneeLocation+" </td>"+
                                    "<td>"+end_location+" </td>"+
                                    "<td>"+convdataTime+" </td>"+
                                    "<td>"+empty_miles+" </td>"+
                                    "<td >" + total_miles + "</td>" +
                                
                                    "<td style='text-align:center'>"+
                                        

                                        "<a class='mt-2 button-29 fs-14 text-white edit_modal_iftaTrip'  title='Edit1' data-tripId='"+IftaTripId+"' data-compID='"+comId+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        

                                    "</td></tr>";

                                    $("#notVerifyIftaTripTable").append(Iftaloadtr);
                                    no++;
                                }
                            }
                        }
                    }
                }
            } 
            else 
            {
                    var Iftaloadtr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#notVerifyIftaTripTable").append(Iftaloadtr);
            }

            
        }
        else 
        {
            var Iftaloadtr = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#notVerifyIftaTripTable").append(Iftaloadtr);
        }
    }
    // ====================== end not notVerifyTrip ===================================

    // =======================================update ifta trip ========================
    $('body').on('click','.edit_modal_iftaTrip',function(){
        var iftaTripId=$(this).attr("data-tripId");
        var comId=$(this).attr('data-compID');
        $.ajax({
            type:"get",
            data:{iftaTripId:iftaTripId,comId:comId},
            url:base_path+"/admin/editIftaTrip",
            success:function(response)
            {
                alert(response);
            }
        })

        $("#update_iftaVerifyedTripModal").modal("show");
    });
    $(".close_iftaVerifyedTripModal").click(function(){
        $("#update_iftaVerifyedTripModal").modal("hide");
    });
    $(".update_ifta_trip").click(function(){
        alert("dfdfdfd");
    });
    //=============================== end update ifta trip ==================================

    //=================================== filter ifta trip start ===============================
    $("#verifyIftaTripButton").click(function(){
        var year = $('.yearIftaTripFilter').val();
        var quarter = $('.quarterIftaTripFilter').val();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getIftaTrip",
            data:{year:year,quarter:quarter},
            async: false,
            //dataType:JSON,
            success: function(text) {
                createIftaTripRows(text);
                notVerifyTrip(text);
                IftaTripResult = text;
             }
        });
        $('#IftaTripModalList').modal('show');
    });
    //================================ end filter ifta trip -==================================
});




