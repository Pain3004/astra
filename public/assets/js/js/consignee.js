var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
 

$('.closeShipperModal').click(function(){
         $('#Shipper_and_ConsigneeModal').modal('hide');
    //     $('#addTruckModal').modal('hide');
     });

    // $('.closeAddTruckModal').click(function(){
    //     $('#addTruckModal').modal('hide');
    //     //$('#truckModal').modal('show');
    // });

    // $('.addtruckModal').click(function(){
    //     //$('#truckModal').modal('hide');
    //     $('#addTruckModal').modal('show');
    // });


//driver as owner operator modal
   
    // $('#up_driverAddTruck').click(function(){
    //     $('#addTruckModal').modal('show');
    // });
// <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->  
   
    $('.consignee_tab').click(function(){
        //alert();
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
    function createGetConsigneeRows(ConsigneeResult) {
        var consigneelen = 0;
            if (ConsigneeResult != null) {
                consigneelen = ConsigneeResult.consignee.length;

                $("#shipperTable").html('');

                if (consigneelen > 0) {
                    var no=1;
                    for (var i = consigneelen-1; i > 0; i--) {  
                        var _id =ConsigneeResult.consignee[i]._id;
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
                            "<td data-field='no'>" + no+"-"+ deleteStatus + "</td>" +
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
                                "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-truckId='"+_id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
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
});