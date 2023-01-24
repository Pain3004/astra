var base_path = $("#url").val();
$(document).ready(function() {

    // <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
 

    $('.closeShipperModal').click(function(){
         $('#Shipper_and_ConsigneeModal').modal('hide');
    });

    // <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->  
   
    $('.consignee_tab').click(function(){
        $(".editAddressType").val("consignee");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getConsignee",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createGetConsigneeRows(text);
                ConsigneeResult = text;
             }
        });
    });


    // <!-- -------------------------------------------------------------------------over Get truck  ------------------------------------------------------------------------- --> 
    // <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
    // get truck
    function createGetConsigneeRows(ConsigneeResult) 
    {
        var consigneelen = 0;
            if (ConsigneeResult != null) {
                consigneelen = ConsigneeResult.consignee.length;

                $("#shipperTable").html('');

                if (consigneelen > 0) {
                    var no=1;
                    for (var i = consigneelen-1; i > 0; i--) {  
                        var id =ConsigneeResult.consignee[i]._id;
                        var consigneeName =ConsigneeResult.consignee[i].consigneeName;
                        var consigneeAddress =ConsigneeResult.consignee[i].consigneeAddress;
                        var consigneeLocation =ConsigneeResult.consignee[i].consigneeLocation;
                        var  consigneePostal=ConsigneeResult.consignee[i].consigneePostal;
                        var  consigneeContact=ConsigneeResult.consignee[i].consigneeContact;
                        var  consigneeEmail=ConsigneeResult.consignee[i].consigneeEmail;
                        var  consigneeTelephone=ConsigneeResult.consignee[i].consigneeTelephone;
                        var  consigneeExt=ConsigneeResult.consignee[i].consigneeExt;
                        var  consigneeTollFree=ConsigneeResult.consignee[i].consigneeTollFree;
                        var  consigneeFax=ConsigneeResult.consignee[i].consigneeFax;
                        var  consigneeReceiving=ConsigneeResult.consignee[i].consigneeReceiving;
                        var  consigneeAppointments=ConsigneeResult.consignee[i].consigneeAppointments;
                        var  consigneeIntersaction=ConsigneeResult.consignee[i].consigneeIntersaction;
                        var  consigneeStatus=ConsigneeResult.consignee[i].consigneeStatus;
                        var  consigneeRecivingNote=ConsigneeResult.consignee[i].consigneeRecivingNote;
                        var  consigneeInternalNote=ConsigneeResult.consignee[i].consigneeInternalNote;
                        var  deleteStatus=ConsigneeResult.consignee[i].deleteStatus;

                        if(deleteStatus == 'NO'){


                        var consigneeStr = "<tr data-id=" + (i + 1) + ">" +
                        //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                            "<td data-field='no'>" + no + "</td>" +
                            "<td data-field='consigneeName' >" + consigneeName + "</td>" +
                            "<td data-field='consigneeAddress' >" +consigneeAddress  + "</td>" +
                            "<td data-field='consigneeLocation' >" +consigneeLocation  + "</td>" +
                            "<td data-field='consigneePostal' >" + consigneePostal + "</td>" +
                            "<td data-field='consigneeContact' >" + consigneeContact + "</td>" +
                            "<td data-field='consigneeEmail' >" + consigneeEmail + "</td>" +
                            "<td data-field='consigneeTelephone' >" + consigneeTelephone + "</td>" +
                            "<td data-field='consigneeExt' >" + consigneeExt + "</td>" +
                            "<td data-field='consigneeTollFree' >" + consigneeTollFree + "</td>" +
                            "<td data-field='consigneeFax' >" + consigneeFax + "</td>" +
                            "<td data-field='consigneeReceiving' >" + consigneeReceiving + "</td>" +
                            "<td data-field='consigneeAppointments' >" + consigneeAppointments + "</td>" +
                            "<td data-field='consigneeIntersaction' >" + consigneeIntersaction + "</td>" +
                            "<td data-field='consigneeStatus' >" + consigneeStatus + "</td>" +
                            "<td data-field='consigneeRecivingNote' >" + consigneeRecivingNote + "</td>" +
                            "<td data-field='consigneeInternalNote' >" + consigneeInternalNote + "</td>" +
                            
                            "<td style='text-align:center'>"+
                                "<a class='editConsigShipperAndCongneeBtn button-29'  title='Edit1' data-consigneeAndConsig='"+id+"' ><i class='fe fe-edit'></i></a>&nbsp"+

                                "<a class='button-29 deleteConsiShipperAndCongneeBtn'  title='Edit1' data-consigneeAndConsig='"+id+"'><i class='fe fe-trush'></i></a>&nbsp"+
                            "</td></tr>";

                        $("#consigneeTable").append(consigneeStr);
                        no++;
                        } 
                    }
                } else {
                    var consigneeStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#consigneeTable").append(consigneeStr);
                }
            }else {
            var tr_str1 = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#consigneeTable").append(consigneeStr);
        }
    }
    // <!-- -------------------------------------------------------------------------over function  ------------------------------------------------------------------------- --> 


    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  

    //======================== start update ==========================================
    $(".closeUpdateConsigneeCreateShipperAndConsigneeModal").click(function(){
        $("#UpdateConsiShipper_and_ConsigneeModal").modal("hide");
    });
    $("body").on('click','.editConsigShipperAndCongneeBtn',function(){
        var id=$(this).attr("data-consigneeAndConsig");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editConsignee",
            async: false,
            data:{id:id},
            success: function(text) {
                $('.updateConsignId').val(text._id);
                $('.updateconsigneeName').val(text.consigneeName);
                $('.updateconsigneeAddress').val(text.consigneeAddress);
                $('.updateconsigneeLocation').val(text.consigneeLocation);
                $('.updateconsigneePostal').val(text.consigneePostal);
                $('.updateconsigneeContact').val(text.consigneeContact);
                $('.updateconsigneeEmail').val(text.consigneeEmail);
                $('.updateconsigneeExt').val(text.consigneeExt);
                $('.updateconsigneeTollFree').val(text.consigneeTollFree);
                $('.updateconsigneeFax').val(text.consigneeFax);
                $('.updateconsigneeShippingHours').val(text.consigneeShippingHours);
                $('.updateconsigneeAppointments').val(text.consigneeAppointments);
                $('.updateconsigneeIntersaction').val(text.consigneeIntersaction);
                $('.updateconsigneestatus').val(text.consigneestatus);
                $('.updateconsigneeNotes').val(text.ConsigneeNotes);
                $('.updateConsigneInterNot').val(text.internal_note);
             }
        });
        $("#UpdateConsiShipper_and_ConsigneeModal").modal("show");
    });

    $(".UpdateConsigneeCreateShipperAndConsigneeModal").click(function(){
        // alert("Dfdf");
        var id=$('.updateConsignId').val();
         var consigneeName=$(".updateconsigneeName").val();
            var consigneeAddress=$(".updateconsigneeAddress").val();
            var consigneeLocation=$(".updateconsigneeLocation").val();
            var consigneePostal=$(".updateconsigneePostal").val();
            var consigneeContact=$(".updateconsigneeContact").val();
            var consigneeEmail=$(".updateconsigneeEmail").val();
            var consigneeTelephone=$(".updateconsigneeTelephone").val();
            var consigneeExt=$(".updateconsigneeExt").val();
            var consigneeTollFree=$(".updateconsigneeTollFree").val();
            var consigneeFax=$(".updateconsigneeFax").val();
            var consigneeShippingHours=$(".updateconsigneeShippingHours").val();
            var consigneeAppointments=$(".updateconsigneeAppointments").val();
            var consigneeIntersaction=$(".updateconsigneeIntersaction").val();
            var consigneestatus=$(".updateconsigneestatus").val();
            var shippingNotes=$(".updateshippingNotes").val();
            var internal_note=$(".updateinternal_note").val();
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
            formData.append("id",id);
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
            $.ajax({
                type:'post',
                url:base_path+"/admin/updateConsignee",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Data updated successfully", "success");
                    $('#UpdateConsiShipper_and_ConsigneeModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getConsignee",
                        async: false,
                        //dataType:JSON,
                        success: function(text) {
                            //alert();
                            console.log(text);
                            createGetConsigneeRows(text);
                            ConsigneeResult = text;
                         }
                    });
                }
            });
    });
    //============================== end update =============================================


    //-========================start delete =============================================
    $('body').on('click','.deleteConsiShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-consigneeAndConsig");
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
                    url: base_path+"/admin/deleteConsignee",
                    data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id},
                    success: function(resp){
                        swal.fire("Done!", "Fuel Vendorconsignee Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getConsignee",
                            async: false,
                            //dataType:JSON,
                            success: function(text) {
                                //alert();
                                console.log(text);
                                createGetConsigneeRows(text);
                                ConsigneeResult = text;
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

    //================================== end delete=====================================
});