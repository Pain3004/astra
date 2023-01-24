var base_path = $("#url").val();
$(document).ready(function() {

    // <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
 

    $('.closeShipperModal').click(function(){
         $('#Shipper_and_ConsigneeModal').modal('hide');
     });
  
    // <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->     
    $('#shipperConsignee_navbar').click(function(){
        $(".editAddressType").val("shipper");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getShipper",
            async: false,
            success: function(text) {
                console.log(text);
                createGetShipperRows(text);
                shipperResult = text;
             }
        });
        $('#Shipper_and_ConsigneeModal').modal('show');
    });

    $('.shipper_tab').click(function(){
        $(".editAddressType").val("shipper");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getShipper",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createGetShipperRows(text);
                shipperResult = text;
             }
        });
    });
    
    // <!-- -------------------------------------------------------------------------over Get truck  ------------------------------------------------------------------------- --> 
    // <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
        
    // get truck
    function createGetShipperRows(shipperResult) 
    {
        var shipperlen = 0;
            if (shipperResult != null) {
                shipperlen = shipperResult.shipper.length;
                $("#shipperTable").html('');

                if (shipperlen > 0) {
                    var no=1;
                    for (var i = shipperlen-1; i > 0; i--) {  
                        var id =shipperResult.shipper[i]._id;
                        var shipperName =shipperResult.shipper[i].shipperName;
                        var shipperAddress =shipperResult.shipper[i].shipperAddress;
                        var shipperLocation =shipperResult.shipper[i].shipperLocation;
                        var  shipperPostal=shipperResult.shipper[i].shipperPostal;
                        var  shipperContact=shipperResult.shipper[i].shipperContact;
                        var  shipperEmail=shipperResult.shipper[i].shipperEmail;
                        var  shipperTelephone=shipperResult.shipper[i].shipperTelephone;
                        var  shipperExt=shipperResult.shipper[i].shipperExt;
                        var  shipperTollFree=shipperResult.shipper[i].shipperTollFree;
                        var  shipperFax=shipperResult.shipper[i].shipperFax;
                        var  shipperShippingHours=shipperResult.shipper[i].shipperShippingHours;
                        var  shipperAppointments=shipperResult.shipper[i].shipperAppointments;
                        var  shipperIntersaction=shipperResult.shipper[i].shipperIntersaction;
                        var  shipperStatus=shipperResult.shipper[i].shipperStatus;
                        var  shippingNotes=shipperResult.shipper[i].shippingNotes;
                        var  internalNotes=shipperResult.shipper[i].internalNotes;
                        var  deleteStatus=shipperResult.shipper[i].deleteStatus;

                        if(deleteStatus == 'NO'){


                        var shipperStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'>" + no+ "</td>" +
                            "<td data-field='shipperName' >" + shipperName + "</td>" +
                            "<td data-field='shipperAddress' >" +shipperAddress  + "</td>" +
                            "<td data-field='shipperLocation' >" +shipperLocation  + "</td>" +
                            "<td data-field='shipperPostal' >" + shipperPostal + "</td>" +
                            "<td data-field='shipperContact' >" + shipperContact + "</td>" +
                            "<td data-field='shipperEmail' >" + shipperEmail + "</td>" +
                            "<td data-field='shipperTelephone' >" + shipperTelephone + "</td>" +
                            "<td data-field='shipperExt' >" + shipperExt + "</td>" +
                            "<td data-field='shipperTollFree' >" + shipperTollFree + "</td>" +
                            "<td data-field='shipperFax' >" + shipperFax + "</td>" +
                            "<td data-field='shipperShippingHours' >" + shipperShippingHours + "</td>" +
                            "<td data-field='shipperAppointments' >" + shipperAppointments + "</td>" +
                            "<td data-field='shipperIntersaction' >" + shipperIntersaction + "</td>" +
                            "<td data-field='shipperStatus' >" + shipperStatus + "</td>" +
                            "<td data-field='shippingNotes' >" + shippingNotes + "</td>" +
                            "<td data-field='internalNotes' >" + internalNotes + "</td>" +
                            
                            "<td style='text-align:center'>"+
                                "<a class='button-29 editShipperAndCongneeBtn'  title='Edit1' data-shipAndConsig='"+id+"'><i class='fe fe-edit'></i></a>&nbsp"+

                                "<a class='button-29 deleteShipperAndCongneeBtn'  title='Edit1' data-shipAndConsig='"+id+"'><i class='fe fe-trush'></i></a>&nbsp"+
                            "</td></tr>";

                        $("#shipperTable").append(shipperStr);
                        no++;
                        } 
                    }
                } else {
                    var shipperStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#shipperTable").append(shipperStr);
                }
            }else {
            var tr_str1 = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#shipperTable").append(shipperStr);
        }
    }
    // <!-- -------------------------------------------------------------------------over function  ------------------------------------------------------------------------- --> 


    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  

    //===============================start store shpper =======================================
    $(".createShipperModalBtn").click(function(){
        $("#AddShipper_and_ConsigneeModal").modal("show");
    });
    $(".closeCreateShipperAndConsigneeModal").click(function(){
        $("#AddShipper_and_ConsigneeModal").modal("hide");
    });
    $(".getValueShipper").click(function(){
        $(".addressType").val("shipper");
    })
    $(".getValueConsignee").click(function(){
        $(".addressType").val("consignee");
    })
    $(".SaveCreateShipperAndConsigneeModal").click(function(){
        var addressType=$(".addressType").val();
        if(addressType=="shipper")
        {
            var shipperName=$(".addshipperName").val();
            var shipperAddress=$(".addshipperAddress").val();
            var shipperLocation=$(".addshipperLocation").val();
            var shipperPostal=$(".addshipperPostal").val();
            var shipperContact=$(".addshipperContact").val();
            var shipperEmail=$(".addshipperEmail").val();
            var shipperTelephone=$(".addshipperTelephone").val();
            var shipperExt=$(".addshipperExt").val();
            var shipperTollFree=$(".addshipperTollFree").val();
            var shipperFax=$(".addshipperFax").val();
            var shipperShippingHours=$(".addshipperShippingHours").val();
            var shipperAppointments=$(".addshipperAppointments").val();
            var shipperIntersaction=$(".addshipperIntersaction").val();
            var shipperASconsignee=$(".addshipperASconsignee").val();
            var shipperstatus=$(".addshipperstatus").val();
            var shippingNotes=$(".addshippingNotes").val();
            var internal_note=$(".addinternal_note").val();
            $(".addshipperASconsignee").change(function(){
                if ($(this).is(':checked'))
                {
                    shipperASconsignee= $(".addshipperASconsignee").val("1");
                }
                else
                {
                shipperASconsignee= $(".addshipperASconsignee").val("0");
                }
            });
            if(shipperName=='')
            {
                swal.fire( "Enter Shipper Name");
                return false;
                
            } 
            if(shipperAddress=='')
            {
                swal.fire( "Enter Shipper Address");
                return false;
            }
            if(shipperLocation=='')
            {
                swal.fire( "Enter Shipper location");
                return false;
            }
            if(shipperPostal=='')
            {
                swal.fire( "Enter Shipper zip");
                return false;
            }
            var formData=new FormData();
            formData.append('_token',$("#_token_AddShipperAndConsignee").val());
            formData.append("addressType",addressType);
            formData.append('shipperName',shipperName);
            formData.append('shipperAddress',shipperAddress);
            formData.append('shipperLocation',shipperLocation);
            formData.append('shipperPostal',shipperPostal);
            formData.append('shipperContact',shipperContact);
            formData.append('shipperEmail',shipperEmail);
            formData.append('shipperTelephone',shipperTelephone);
            formData.append('shipperExt',shipperExt);
            formData.append('shipperTollFree',shipperTollFree);
            formData.append('shipperFax',shipperFax);
            formData.append('shipperShippingHours',shipperShippingHours);
            formData.append('shipperAppointments',shipperAppointments);
            formData.append('shipperIntersaction',shipperIntersaction);
            formData.append('shipperstatus',shipperstatus);
            formData.append('shippingNotes',shippingNotes);
            formData.append('internal_note',internal_note);
            formData.append('shipperASconsignee',shipperASconsignee);
            $.ajax({
                type:'post',
                url:base_path+"/admin/storeShipper",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Data Stored successfully", "success");
                    $('#AddShipper_and_ConsigneeModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getShipper",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createGetShipperRows(text);
                            shipperResult = text;
                        }
                    });
                }
            });
        }
        // alert(addressType);
        else
        {
            var consigneeName=$(".addconsigneeName").val();
            var consigneeAddress=$(".addconsigneeAddress").val();
            var consigneeLocation=$(".addconsigneeLocation").val();
            var consigneePostal=$(".addconsigneePostal").val();
            var consigneeContact=$(".addconsigneeContact").val();
            var consigneeEmail=$(".addconsigneeEmail").val();
            var consigneeTelephone=$(".addconsigneeTelephone").val();
            var consigneeExt=$(".addconsigneeExt").val();
            var consigneeTollFree=$(".addconsigneeTollFree").val();
            var consigneeFax=$(".addconsigneeFax").val();
            var consigneeShippingHours=$(".addconsigneeShippingHours").val();
            var consigneeAppointments=$(".addconsigneeAppointments").val();
            var consigneeIntersaction=$(".addconsigneeIntersaction").val();
            var consigneeASconsignee=$(".addconsigneeASconsignee").val();
            var consigneestatus=$(".addconsigneestatus").val();
            var shippingNotes=$(".addshippingNotes").val();
            var internal_note=$(".addinternal_note").val();
            $(".addconsigneeASconsignee").change(function(){
                if ($(this).is(':checked'))
                {
                    consigneeASconsignee= $(".addconsigneeASconsignee").val("1");
                }
                else
                {
                consigneeASconsignee= $(".addconsigneeASconsignee").val("0");
                }
            });
            if(consigneeName=='')
            {
                swal.fire( "Enter Consignee Name");
                return false;
                
            } 
            if(consigneeAddress=='')
            {
                swal.fire( "Enter Consignee Address");
                return false;
            }
            if(consigneeLocation=='')
            {
                swal.fire( "Enter Consignee location");
                return false;
            }
            if(consigneePostal=='')
            {
                swal.fire( "Enter Consignee zip");
                return false;
            }
            var formData=new FormData();
            formData.append('_token',$("#_token_AddShipperAndConsignee").val());
            formData.append("addressType",addressType);
            formData.append('consigneeName',consigneeName);
            formData.append('consigneeAddress',consigneeAddress);
            formData.append('consigneeLocation',consigneeLocation);
            formData.append('consigneePostal',consigneePostal);
            formData.append('consigneeContact',consigneeContact);
            formData.append('consigneeEmail',consigneeEmail);
            formData.append('consigneeTelephone',consigneeTelephone);
            formData.append('consigneeExt',consigneeExt);
            formData.append('consigneeTollFree',consigneeTollFree);
            formData.append('consigneeFax',consigneeFax);
            formData.append('consigneeShippingHours',consigneeShippingHours);
            formData.append('consigneeAppointments',consigneeAppointments);
            formData.append('consigneeIntersaction',consigneeIntersaction);
            formData.append('consigneestatus',consigneestatus);
            formData.append('shippingNotes',shippingNotes);
            formData.append('internal_note',internal_note);
            formData.append('consigneeASconsignee',consigneeASconsignee);
            $.ajax({
                type:'post',
                url:base_path+"/admin/storeConsignee",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Data Stored successfully", "success");
                    $('#AddShipper_and_ConsigneeModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getShipper",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createGetShipperRows(text);
                            shipperResult = text;
                        }
                    });
                }
            });
        }
    });
        
    //================================ end store shipper ======================================
    

    //================================start update shipper=====================================
 
    $(".closeUpdateCreateShipperAndConsigneeModal").click(function(){
        $("#UpdateShipper_and_ConsigneeModal").modal("hide");
    })
    $('body').on('click','.editShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-shipAndConsig");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/editShipper",
                async: false,
                data:{id:id},
                success: function(text) {
                    $('.ship_con_id').val(text._id);
                    $('.updateshipperName').val(text.shipperName);
                    $('.updateshipperAddress').val(text.shipperAddress);
                    $('.updateshipperLocation').val(text.shipperLocation);
                    $('.updateshipperPostal').val(text.shipperPostal);
                    $('.updateshipperContact').val(text.shipperContact);
                    $('.updateshipperEmail').val(text.shipperEmail);
                    $('.updateshipperExt').val(text.shipperExt);
                    $('.updateshipperTollFree').val(text.shipperTollFree);
                    $('.updateshipperFax').val(text.shipperFax);
                    $('.updateshipperShippingHours').val(text.shipperShippingHours);
                    $('.updateshipperAppointments').val(text.shipperAppointments);
                    $('.updateshipperIntersaction').val(text.shipperIntersaction);
                    $('.updateshipperstatus').val(text.shipperstatus);
                    $('.updateshippingNotes').val(text.shippingNotes);
                    $('.updateinternal_note').val(text.internal_note);
                 }
            });

          $("#UpdateShipper_and_ConsigneeModal").modal("show");
    });

    $(".UpdateCreateShipperAndConsigneeModal").click(function(){
            var id=$(".ship_con_id").val();
            var shipperName=$(".updateshipperName").val();
            var shipperAddress=$(".updateshipperAddress").val();
            var shipperLocation=$(".updateshipperLocation").val();
            var shipperPostal=$(".updateshipperPostal").val();
            var shipperContact=$(".updateshipperContact").val();
            var shipperEmail=$(".updateshipperEmail").val();
            var shipperTelephone=$(".updateshipperTelephone").val();
            var shipperExt=$(".updateshipperExt").val();
            var shipperTollFree=$(".updateshipperTollFree").val();
            var shipperFax=$(".updateshipperFax").val();
            var shipperShippingHours=$(".updateshipperShippingHours").val();
            var shipperAppointments=$(".updateshipperAppointments").val();
            var shipperIntersaction=$(".updateshipperIntersaction").val();
            var shipperstatus=$(".updateshipperstatus").val();
            var shippingNotes=$(".updateshippingNotes").val();
            var internal_note=$(".updateinternal_note").val();
            if(shipperName=='')
            {
                swal.fire( "Enter Shipper Name");
                return false;
                
            } 
            if(shipperAddress=='')
            {
                swal.fire( "Enter Shipper Address");
                return false;
            }
            if(shipperLocation=='')
            {
                swal.fire( "Enter Shipper location");
                return false;
            }
            if(shipperPostal=='')
            {
                swal.fire( "Enter Shipper zip");
                return false;
            }
            var formData=new FormData();
            formData.append('_token',$("#_token_AddShipperAndConsignee").val());
            formData.append("id",id);
            formData.append('shipperName',shipperName);
            formData.append('shipperAddress',shipperAddress);
            formData.append('shipperLocation',shipperLocation);
            formData.append('shipperPostal',shipperPostal);
            formData.append('shipperContact',shipperContact);
            formData.append('shipperEmail',shipperEmail);
            formData.append('shipperTelephone',shipperTelephone);
            formData.append('shipperExt',shipperExt);
            formData.append('shipperTollFree',shipperTollFree);
            formData.append('shipperFax',shipperFax);
            formData.append('shipperShippingHours',shipperShippingHours);
            formData.append('shipperAppointments',shipperAppointments);
            formData.append('shipperIntersaction',shipperIntersaction);
            formData.append('shipperstatus',shipperstatus);
            formData.append('shippingNotes',shippingNotes);
            formData.append('internal_note',internal_note);
            $.ajax({
                type:'post',
                url:base_path+"/admin/updateShipper",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Data Updated successfully", "success");
                    $('#UpdateShipper_and_ConsigneeModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getShipper",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createGetShipperRows(text);
                            shipperResult = text;
                        }
                    });
                }
            });
    })
    //=================== end update shipper =================================================

    //============================== start delete ==========================================
    $('body').on('click','.deleteShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-shipAndConsig");
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) 
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: base_path+"/admin/deleteShipper",
                    data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id},
                    success: function(resp){
                        swal.fire("Done!", "sipper Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getShipper",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createGetShipperRows(text);
                                shipperResult = text;
                            }
                        });
                        $('#Shipper_and_ConsigneeModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });

    });
    //=============================== end delete ===========================================
});