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
   
    $('#shipperConsignee_navbar').click(function(){
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
        $('#Shipper_and_ConsigneeModal').modal('show');
    });

    $('.shipper_tab').click(function(){
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
    function createGetShipperRows(shipperResult) {
        var shipperlen = 0;
            if (shipperResult != null) {
                
                //shipperlen = shipperResult.shipper.length;
                shipperlen = shipperResult.shipper.length;
                $("#shipperTable").html('');

                if (shipperlen > 0) {
                    var no=1;
                    for (var i = shipperlen-1; i > 0; i--) {  
                        var _id =shipperResult.shipper[i]._id;
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
                        //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                            "<td data-field='no'>" + no+"-"+ deleteStatus + "</td>" +
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
                                "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-truckId='"+_id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                            "</td></tr>";

                        $("#shipperTable").append(shipperStr);
                        no++;
                        } 
                        // {{shipperResult>links()}}
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
});