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

                                "<a class='button-29 deleteConsiShipperAndCongneeBtn'  title='Edit1' data-consigneeAndConsig='"+id+"'><i class='fe fe-trash'></i></a>&nbsp"+
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
    
  
    //============================== end update =============================================


    //-========================start delete =============================================
    // $('body').on('click','.deleteConsiShipperAndCongneeBtn', function(){
    //     var id=$(this).attr("data-consigneeAndConsig");
    //     swal.fire({
    //         title: "Delete?",
    //         text: "Please ensure and then confirm!",
    //         type: "warning",
    //         showCancelButton: !0,
    //         confirmButtonText: "Yes, delete it!",
    //         cancelButtonText: "No, cancel!",
    //         reverseButtons: !0
    //     }).then(function (e) {
    //         if (e.value === true) 
    //         {
    //             $.ajax({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 type: 'post',
    //                 url: base_path+"/admin/deleteConsignee",
    //                 data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id},
    //                 success: function(resp){
    //                     swal.fire("Done!", "Fuel Vendorconsignee Deleted successfully", "success");
    //                     $.ajax({
    //                         type: "GET",
    //                         url: base_path+"/admin/getConsignee",
    //                         async: false,
    //                         //dataType:JSON,
    //                         success: function(text) {
    //                             //alert();
    //                             console.log(text);
    //                             createGetConsigneeRows(text);
    //                             ConsigneeResult = text;
    //                          }
    //                     });
    //                     $('#Shipper_and_ConsigneeModal').modal('show');

    //                 },
    //                 error: function (resp) {
    //                     swal.fire("Error!", 'Something went wrong.', "error");
    //                 }
    //             });
    //         } 
    //     });
    // });

    //================================== end delete=====================================
});