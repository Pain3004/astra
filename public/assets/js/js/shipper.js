var base_path = $("#url").val();
$(document).ready(function() {

    // <!-- ========================--start ========================-- -->  
    $('.closeShipperModal').click(function(){
         $('#Shipper_and_ConsigneeModal').modal('hide');
     });
  
    // <!-- ----====================Get truck ====================----- -->     
    $('#shipperConsignee_navbar').click(function(){
        $(".editAddressType").val("shipper");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getShipper",
            async: false,
            success: function(text) {

                // var res = JSON.parse(result);
                // if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                //     processShipperTable(res[0]);
                //     $("#paginate").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                //     renameTableSeq("shipperBody", "page_active");
                // }
                // var totalshipper = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
                // $("#total_shipper").html(totalshipper);
                // $(".loading").css("display", "none");



                // console.log(text);
                createGetShipperRows(text);
                shipperResult = text;
             }
        });
        $('#Shipper_and_ConsigneeModal').modal('show');
    });

    // $('.shipper_tab').click(function(){
    //     $(".editAddressType").val("shipper");
    //     $.ajax({
    //         type: "GET",
    //         url: base_path+"/admin/getShipper",
    //         async: false,
    //         //dataType:JSON,
    //         success: function(text) {
    //             //alert();
    //             console.log(text);
    //             createGetShipperRows(text);
    //             shipperResult = text;
    //          }
    //     });
    // });
    
    // <!--======================over Get truck======================- --> 
    // <!--=======================--function =======================-- --> 
        
    // get truck
    function createGetShipperRows(shipperResult) 
    {
        var shipperlen = 0;
        var no=1;
        if (shipperResult != null) {
            shipperlen = shipperResult.shipper.shipper.length;
            $("#shipperTable").html('');
            if (shipperlen > 0) {
                for (var i = shipperlen-1; i > 0; i--) {  
                    var comID=shipperResult.shipper.companyID;
                    var id =shipperResult.shipper.shipper[i]._id;
                    var shipperName =shipperResult.shipper.shipper[i].shipperName;
                    var shipperAddress =shipperResult.shipper.shipper[i].shipperAddress;
                    var shipperLocation =shipperResult.shipper.shipper[i].shipperLocation;
                    var  shipperPostal=shipperResult.shipper.shipper[i].shipperPostal;
                    var  shipperContact=shipperResult.shipper.shipper[i].shipperContact;
                    var  shipperEmail=shipperResult.shipper.shipper[i].shipperEmail;
                    var  shipperTelephone=shipperResult.shipper.shipper[i].shipperTelephone;
                    var  shipperExt=shipperResult.shipper.shipper[i].shipperExt;
                    var  shipperTollFree=shipperResult.shipper.shipper[i].shipperTollFree;
                    var  shipperFax=shipperResult.shipper.shipper[i].shipperFax;
                    var  shipperShippingHours=shipperResult.shipper.shipper[i].shipperShippingHours;
                    var  shipperAppointments=shipperResult.shipper.shipper[i].shipperAppointments;
                    var  shipperIntersaction=shipperResult.shipper.shipper[i].shipperIntersaction;
                    var  shipperStatus=shipperResult.shipper.shipper[i].shipperStatus;
                    var  shippingNotes=shipperResult.shipper.shipper[i].shippingNotes;
                    var  internalNotes=shipperResult.shipper.shipper[i].internalNotes;
                    var  deleteStatus=shipperResult.shipper.shipper[i].deleteStatus;
                    var  insertedTime1=shipperResult.shipper.shipper[i].insertedTime;
                    if(shipperName !="" && shipperName !=null)
                    {
                        shipperName=shipperName; 
                    }
                    else
                    {
                        shipperName="----";
                    }
                    if(shipperAddress !="" && shipperAddress !=null)
                    {
                        shipperAddress=shipperAddress; 
                    }
                    else
                    {
                        shipperAddress="----";
                    }
                    if(shipperLocation !="" &&shipperLocation  !=null)
                    {
                        shipperLocation=shipperLocation; 
                    }
                    else
                    {
                        shipperLocation="----";
                    }
                    if(shipperPostal !="" && shipperPostal !=null)
                    {
                        shipperPostal=shipperPostal; 
                    }
                    else
                    {
                        shipperPostal="----";
                    }
                    if(shipperContact !="" &&  shipperContact!=null)
                    {
                        shipperContact=shipperContact; 
                    }
                    else
                    {
                        shipperContact="----";
                    }
                    if(shipperTelephone !="" && shipperTelephone !=null)
                    {
                        shipperTelephone=shipperTelephone; 
                    }
                    else
                    {
                        shipperTelephone="----";
                    }
                    if(shipperExt !="" &&  shipperExt!=null)
                    {
                        shipperExt=shipperExt; 
                    }
                    else
                    {
                        shipperExt="----";
                    }
                    if(shipperTollFree !="" &&  shipperTollFree!=null)
                    {
                        shipperTollFree=shipperTollFree; 
                    }
                    else
                    {
                        shipperTollFree="----";
                    }
                    if(shipperFax !="" && shipperFax !=null)
                    {
                        shipperFax=shipperFax; 
                    }
                    else
                    {
                        shipperFax="----";
                    }
                    if(shipperShippingHours !="" && shipperShippingHours !=null)
                    {
                        shipperShippingHours=shipperShippingHours; 
                    }
                    else
                    {
                        shipperShippingHours="----";
                    }
                    if(shipperAppointments !="" &&  shipperAppointments!=null &&  shipperAppointments!="null")
                    {
                        shipperAppointments=shipperAppointments; 
                    }
                    else
                    {
                        shipperAppointments="----";
                    }
                    if(shipperIntersaction !="" && shipperIntersaction !=null)
                    {
                        shipperIntersaction=shipperIntersaction; 
                    }
                    else
                    {
                        shipperIntersaction="----";
                    }
                    if(shipperStatus !="" &&  shipperStatus!=null &&  shipperStatus!="null")
                    {
                        shipperStatus=shipperStatus; 
                    }
                    else
                    {
                        shipperStatus="----";
                    }
                    if(shippingNotes !="" &&  shippingNotes!=null)
                    {
                        shippingNotes=shippingNotes; 
                    }
                    else
                    {
                        shippingNotes="----";
                    }
                    if(internalNotes !="" &&internalNotes  !=null)
                    {
                        internalNotes=internalNotes; 
                    }
                    else
                    {
                        internalNotes="----";
                    }
                    if(shipperEmail !="" && shipperEmail !=null && shipperEmail!="null")
                    {
                        shipperEmail=shipperEmail;
                    }
                    else
                    {
                        shipperEmail="---------";
                    }

                    if(insertedTime1){
                        insertedTime1 =shipperResult.shipper.shipper[i].insertedTime;
                    }else{
                        insertedTime1='';
                    }
                    var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                    var date_tr = new Date(insertedTime1*1000);
                    var year_tr = date_tr.getFullYear();
                    var month_tr = months_arr_tr[date_tr.getMonth()];
                    var day_tr = date_tr.getDate();
                    var insertedTime = month_tr+'/'+day_tr+'/'+year_tr;

                    if(deleteStatus == 'NO'){


                    var shipperStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                        "<td data-field='no'>" + no+ "</td>" +
                        // "<td data-field='no'>" + insertedTime1 + "-" + insertedTime + "</td>" +
                        "<td data-field='shipperName' >" + shipperName + "</td>" +
                        "<td data-field='shipperName' >Shipper</td>" +
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
                            "<a class='button-23 editShipperAndCongneeBtn'  title='Edit1' data-shipAndConsig='"+id+"' data-comID='"+comID+"'><i class='fe fe-edit'></i></a>&nbsp"+

                            "<a class='button-23 deleteShipperAndCongneeBtn'  title='Edit1' data-shipAndConsig='"+id+"' data-comID='"+comID+"'><i class='fe fe-trash'></i></a>&nbsp"+
                        "</td></tr>";

                    $("#shipperTable").append(shipperStr);
                    no++;
                    } 
                    $("#shipperTable tr").sort(sort_td).appendTo("#shipperTable");
                        function sort_td(a, b) {
                        return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                    }
                }
            } else {
                var shipperStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
    
                $("#shipperTable").append(shipperStr);
            }



            var consigneelen = shipperResult.consignee.consignee.length;
            if (consigneelen > 0) {
                var no=1;
                for (var i = consigneelen-1; i > 0; i--) {  
                    var comID =shipperResult.consignee.companyID;
                    var id =shipperResult.consignee.consignee[i]._id;
                    var consigneeName =shipperResult.consignee.consignee[i].consigneeName;
                    var consigneeAddress =shipperResult.consignee.consignee[i].consigneeAddress;
                    var consigneeLocation =shipperResult.consignee.consignee[i].consigneeLocation;
                    var  consigneePostal=shipperResult.consignee.consignee[i].consigneePostal;
                    var  consigneeContact=shipperResult.consignee.consignee[i].consigneeContact;
                    var  consigneeEmail=shipperResult.consignee.consignee[i].consigneeEmail;
                    var  consigneeTelephone=shipperResult.consignee.consignee[i].consigneeTelephone;
                    var  consigneeExt=shipperResult.consignee.consignee[i].consigneeExt;
                    var  consigneeTollFree=shipperResult.consignee.consignee[i].consigneeTollFree;
                    var  consigneeFax=shipperResult.consignee.consignee[i].consigneeFax;
                    var  consigneeReceiving=shipperResult.consignee.consignee[i].consigneeReceiving;
                    var  consigneeAppointments=shipperResult.consignee.consignee[i].consigneeAppointments;
                    var  consigneeIntersaction=shipperResult.consignee.consignee[i].consigneeIntersaction;
                    var  consigneeStatus=shipperResult.consignee.consignee[i].consigneeStatus;
                    var  consigneeRecivingNote=shipperResult.consignee.consignee[i].consigneeRecivingNote;
                    var  consigneeInternalNote=shipperResult.consignee.consignee[i].consigneeInternalNote;
                    var  deleteStatus=shipperResult.consignee.consignee[i].deleteStatus;
                    var  insertedTime1=shipperResult.consignee.consignee[i].insertedTime;
                    if(consigneeName !="" && consigneeName !=null)
                    {
                        consigneeName=consigneeName; 
                    }
                    else
                    {
                        consigneeName="----";
                    }
                    if(consigneeAddress !="" && consigneeAddress  !=null)
                    {
                        consigneeAddress=consigneeAddress; 
                    }
                    else
                    {
                        consigneeAddress="----";
                    }
                    if(consigneeLocation !="" && consigneeLocation !=null)
                    {
                        consigneeLocation=consigneeLocation; 
                    }
                    else
                    {
                        consigneeLocation="----";
                    }
                    if(consigneePostal !="" && consigneePostal  !=null)
                    {
                        consigneePostal=consigneePostal; 
                    }
                    else
                    {
                        consigneePostal="----";
                    }
                    if(consigneeContact !="" && consigneeContact !=null)
                    {
                        consigneeContact=consigneeContact; 
                    }
                    else
                    {
                        consigneeContact="----";
                    }
                    if(consigneeEmail !="" && consigneeEmail  !=null)
                    {
                        consigneeEmail=consigneeEmail;
                    }
                    else
                    {
                        consigneeEmail="----";
                    }
                    if(consigneeTelephone !="" &&  consigneeTelephone!=null)
                    {
                        consigneeTelephone=consigneeTelephone; 
                    }
                    else
                    {
                        consigneeTelephone="----";
                    }
                    if(consigneeExt !="" && consigneeExt !=null)
                    {
                        consigneeExt=consigneeExt; 
                    }
                    else
                    {
                        consigneeExt="----";
                    }
                    if(consigneeTollFree !="" && consigneeTollFree !=null)
                    {
                        consigneeTollFree=consigneeTollFree; 
                    }
                    else
                    {
                        consigneeTollFree="----";
                    }
                    if(consigneeFax !="" &&consigneeFax  !=null)
                    {
                        consigneeFax=consigneeFax; 
                    }
                    else
                    {
                        consigneeFax="----";
                    }
                    if(consigneeReceiving !="" && consigneeReceiving !=null)
                    {
                        consigneeReceiving=consigneeReceiving; 
                    }
                    else
                    {
                        consigneeShippingHours="----";
                    }
                    if(consigneeAppointments !="" &&  consigneeAppointments!=null)
                    {
                        consigneeAppointments=consigneeAppointments; 
                    }
                    else
                    {
                        consigneeAppointments="----";
                    }
                    if(consigneeIntersaction !="" && consigneeIntersaction !=null)
                    {
                        consigneeIntersaction=consigneeIntersaction; 
                    }
                    else
                    {
                        consigneeIntersaction="----";
                    }
                    if(consigneeStatus !="" && consigneeStatus !=null)
                    {
                        consigneeStatus=consigneeStatus; 
                    }
                    else
                    {
                        consigneeStatus="----";
                    }
                    if(consigneeRecivingNote !="" && consigneeRecivingNote !=null)
                    {
                        consigneeRecivingNote=consigneeRecivingNote; 
                    }
                    else
                    {
                        consigneeRecivingNote="----";
                    }
                    if(consigneeInternalNote !="" && consigneeInternalNote !=null)
                    {
                        consigneeInternalNote=consigneeInternalNote; 
                    }
                    else
                    {
                        consigneeInternalNote="----";
                    }

                    if(insertedTime1){
                        insertedTime1 =shipperResult.consignee.consignee[i].insertedTime;
                    }else{
                        insertedTime1='--';
                    }
                    var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                    var date_tr = new Date(insertedTime1*1000);
                    var year_tr = date_tr.getFullYear();
                    var month_tr = months_arr_tr[date_tr.getMonth()];
                    var day_tr = date_tr.getDate();
                    var insertedTime = month_tr+'/'+day_tr+'/'+year_tr;
                    
                    if(deleteStatus == 'NO'){
                        var consigneeStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                            //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                        "<td data-field='no'>" + no + "</td>" +
                        // "<td data-field='no'>" + insertedTime1 + "-" + insertedTime + "</td>" +
                        "<td data-field='consigneeName' >" + consigneeName + "</td>" +
                        "<td data-field='consigneeName' >Consignee</td>" +
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
                            "<a class='editConsigShipperAndCongneeBtn button-23'  title='Edit1' data-consigneeAndConsig='"+id+"' data-comID='"+comID+"'><i class='fe fe-edit'></i></a>&nbsp"+

                            "<a class='button-23 deleteConsiShipperAndCongneeBtn'  title='Edit1' data-consigneeAndConsig='"+id+"' data-comID='"+comID+"'><i class='fe fe-trash'></i></a>&nbsp"+
                        "</td></tr>";
                        $("#shipperTable").append(consigneeStr);
                        no++;
                    } 
                    $("#shipperTable tr").sort(sort_td).appendTo("#shipperTable");
                        function sort_td(a, b) {
                        return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                    }
                }
            } 
            else 
            {
                var consigneeStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

                $("#shipperTable").append(consigneeStr);
            }


        }
        else
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#shipperTable").append(shipperStr);
        }
    }
    // <!--========================-over function ========================- --> 


    // <!--========================== End==========================-->  

    //===============================start store shpper =======================================
    $(".infoasConsignee").hide();$(".infoasShipper").show();
    $(".shipperConsiType").on('change',function(){
        if ($('.shipperConsiType').val()=="shipper")
        {
           $(".infoasConsignee").hide();$(".infoasShipper").show();
        }
        else
        {
            $(".infoasConsignee").show();$(".infoasShipper").hide();
        }
    });
    $('#AddShipper_and_ConsigneeModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".createShipperModalBtn").click(function(){
       
        $("#AddShipper_and_ConsigneeModal").modal("show");
    });
    $(".closeCreateShipperAndConsigneeModal").click(function(){
        $("#AddShipper_and_ConsigneeModal").modal("hide");
    });
    $(".SaveCreateShipperAndConsigneeModal").click(function(){
        var addressType=$(".addshipperConsiType").val();
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
            var testEmail =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
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
            if(shipperEmail !== "")
            {
                if(testEmail.test(shipperEmail)== false)
                {
                    swal.fire( "Enter valid Email Address");
                    return false;
                }
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
            var testEmail =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
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
                swal.fire( "Enter Consignee Name");
                return false;
                
            } 
            if(shipperAddress=='')
            {
                swal.fire( "Enter Consignee Address");
                return false;
            }
            if(shipperLocation=='')
            {
                swal.fire( "Enter Consignee location");
                return false;
            }
            if(shipperPostal=='')
            {
                swal.fire( "Enter Consignee zip");
                return false;
            }
            if(shipperEmail !=="")
            {
                if(testEmail.test(shipperEmail) == false)
                {
                    swal.fire( "Enter valid Email Address");
                    return false;
                }
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
    $('#UpdateShipper_and_ConsigneeModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".closeUpdateCreateShipperAndConsigneeModal").click(function(){
        $("#UpdateShipper_and_ConsigneeModal").modal("hide");
    })
    $('body').on('click','.editShipperAndCongneeBtn', function(){
        $(".shipper_type_ed").show();
        $(".consignee_type_ed").hide();
        $(".shipperYaConsignee").val("shipper");
        var id=$(this).attr("data-shipAndConsig");
        var comID=$(this).attr("data-comID");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/editShipper",
                async: false,
                data:{id:id,comID:comID},
                success: function(text) {
                    $('.ship_con_id').val(text._id);
                    $(".shippAndConCompID").val(text.companyID);
                    $('.updateshipperName').val(text.shipperName);
                    $('.updateshipperAddress').val(text.shipperAddress);
                    $('.updateshipperLocation').val(text.shipperLocation);
                    $('.updateshipperPostal').val(text.shipperPostal);
                    $('.updateshipperContact').val(text.shipperContact);
                    $('.updateshipperEmail').val(text.shipperEmail);
                    $('.updateshipperExt').val(text.shipperExt);
                    $('.updateshipperTollFree').val(text.shipperTollFree);
                    $('.updateshipperTelephone').val(text.shipperTelephone);
                    $('.updateshipperFax').val(text.shipperFax);
                    $('.updateshipperShippingHours').val(text.shipperShippingHours);
                    $('.updateshipperAppointments').val(text.shipperAppointments);
                    $('.updateshipperIntersaction').val(text.shipperIntersaction);
                    $('.updateshipperstatus').val(text.shipperStatus);
                    $('.updateshippingNotes').val(text.shippingNotes);
                    $('.updateinternal_note').val(text.internalNotes);
                 }
            });

          $("#UpdateShipper_and_ConsigneeModal").modal("show");
    });

    $(".UpdateCreateShipperAndConsigneeModal").click(function(){
        var data=$(".shipperYaConsignee").val();
        if(data=="shipper")
        {
             var id=$(".ship_con_id").val();
             var comID=$(".shippAndConCompID").val();
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
            var testEmail =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
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
            if(shipperEmail !=="")
            {
                if(testEmail.test(shipperEmail) == false)
                {
                    swal.fire( "Enter valid Email Address");
                    return false;
                }
            }
            var formData=new FormData();
            formData.append('_token',$("#_token_AddShipperAndConsignee").val());
            formData.append("id",id);
            formData.append("comID",comID);
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
        }
        else
        {
           
            
            var comID=$(".shippAndConCompID").val();
            var id=$('.ship_con_id').val();
            var consigneeName=$(".updateshipperName").val();
            var consigneeAddress=$(".updateshipperAddress").val();
            var consigneeLocation=$(".updateshipperLocation").val();
            var consigneePostal=$(".updateshipperPostal").val();
            var consigneeContact=$(".updateshipperContact").val();
            var consigneeEmail=$(".updateshipperEmail").val();
            var consigneeTelephone=$(".updateshipperTelephone").val();
            var consigneeExt=$(".updateshipperExt").val();
            var consigneeTollFree=$(".updateshipperTollFree").val();
            var consigneeFax=$(".updateshipperFax").val();
            var consigneeShippingHours=$(".updateshipperShippingHours").val();
            var consigneeAppointments=$(".updateshipperAppointments").val();
            var consigneeIntersaction=$(".updateshipperIntersaction").val();
            var consigneestatus=$(".updateshipperstatus").val();
            var shippingNotes=$(".updateshippingNotes").val();
            var internal_note=$(".updateinternal_note").val();
            var testEmail =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
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
            if(consigneeEmail !=="")
            {
                if(testEmail.test(consigneeEmail) == false)
                {
                    swal.fire( "Enter valid Email Address");
                    return false;
                }
            }
            var formData=new FormData();
            formData.append('_token',$("#_token_AddShipperAndConsignee").val());
            formData.append("id",id);
            formData.append('comID',comID);
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
        }
           
    });




    $("body").on('click','.editConsigShipperAndCongneeBtn',function(){
        $(".shipper_type_ed").hide();
        $(".consignee_type_ed").show();
        $(".shipperYaConsignee").val("consignee");
        var id=$(this).attr("data-consigneeAndConsig");
        var comID=$(this).attr("data-comID");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editConsignee",
            async: false,
            data:{id:id,comID:comID},
            success: function(text) {
                $('.ship_con_id').val(text._id);
                $(".shippAndConCompID").val(text.companyID);
                $('.updateshipperName').val(text.consigneeName);
                $('.updateshipperAddress').val(text.consigneeAddress);
                $('.updateshipperLocation').val(text.consigneeLocation);
                $('.updateshipperPostal').val(text.consigneePostal);
                $('.updateshipperContact').val(text.consigneeContact);
                $('.updateshipperEmail').val(text.consigneeEmail);
                $('.updateshipperExt').val(text.consigneeExt);
                $('.updateshipperTollFree').val(text.consigneeTollFree);
                $('.updateshipperTelephone').val(text.consigneeTelephone);
                $('.updateshipperFax').val(text.consigneeFax);
                $('.updateshipperShippingHours').val(text.consigneeReceiving);
                $('.updateshipperAppointments').val(text.consigneeAppointments);
                $('.updateshipperIntersaction').val(text.consigneeIntersaction);
                $('.updateshipperstatus').val(text.consigneeStatus);
                $('.updateshippingNotes').val(text.consigneeRecivingNote);
                $('.updateinternal_note').val(text.consigneeInternalNote);
            }
        });
        $("#UpdateShipper_and_ConsigneeModal").modal("show");
    });

    //=================== end update shipper =================================================

    //============================== start delete ==========================================
    $('body').on('click','.deleteShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-shipAndConsig");
        var comID=$(this).attr("data-comID");
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
                    data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id,comID:comID},
                    success: function(resp){
                        swal.fire("Done!", "Shipper Deleted successfully", "success");
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



    $('body').on('click','.deleteConsiShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-consigneeAndConsig");
        var comID=$(this).attr("data-comID");
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
                    data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id,comID:comID},
                    success: function(resp){
                        swal.fire("Done!", "Consignee Deleted successfully", "success");
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

    // =========================== start restore -=======================================
    $(".restoreshipperAndConsigneeBtn").click(function(){
        $.ajax({
                type: "GET",
                url: base_path+"/admin/getShipper",
                async: false,
                success: function(text) {
                    console.log(text);
                    RestorecreateGetShipperRows(text);
                    shipperResult = text;
                }
            });
        $("#RestoreShipper_and_ConsigneeModal").modal("show");
    });
    $(".closeRestoreShipperModal").click(function(){
        $("#RestoreShipper_and_ConsigneeModal").modal("hide");
    });
    function RestorecreateGetShipperRows(shipperResult) {
        var shipperlen = 0;
        if (shipperResult != null) {
            shipperlen = shipperResult.shipper.shipper.length;
            $("#RestoreshipperTable").html('');

            if (shipperlen > 0) {
                var no=1;
                for (var i = shipperlen-1; i > 0; i--) {  
                    var comId=shipperResult.shipper.companyID;
                    var id =shipperResult.shipper.shipper[i]._id;
                    var shipperName =shipperResult.shipper.shipper[i].shipperName;
                    var shipperAddress =shipperResult.shipper.shipper[i].shipperAddress;
                    var shipperLocation =shipperResult.shipper.shipper[i].shipperLocation;
                    var  shipperPostal=shipperResult.shipper.shipper[i].shipperPostal;
                    var  shipperContact=shipperResult.shipper.shipper[i].shipperContact;
                    var  shipperEmail=shipperResult.shipper.shipper[i].shipperEmail;
                    var  shipperTelephone=shipperResult.shipper.shipper[i].shipperTelephone;
                    var  shipperExt=shipperResult.shipper.shipper[i].shipperExt;
                    var  shipperTollFree=shipperResult.shipper.shipper[i].shipperTollFree;
                    var  shipperFax=shipperResult.shipper.shipper[i].shipperFax;
                    var  shipperShippingHours=shipperResult.shipper.shipper[i].shipperShippingHours;
                    var  shipperAppointments=shipperResult.shipper.shipper[i].shipperAppointments;
                    var  shipperIntersaction=shipperResult.shipper.shipper[i].shipperIntersaction;
                    var  shipperStatus=shipperResult.shipper.shipper[i].shipperStatus;
                    var  shippingNotes=shipperResult.shipper.shipper[i].shippingNotes;
                    var  internalNotes=shipperResult.shipper.shipper[i].internalNotes;
                    var  deleteStatus=shipperResult.shipper.shipper[i].deleteStatus;

                    if(deleteStatus == 'YES'){


                    var shipperStr = "<tr data-id=" + (i + 1) + ">" +
                        "<td data-field='no'><input type='checkbox' class='check_ShipperAndConsignee_one' name='allShipConIdCheck[]' data-consigneeShipid=" + id+ " date-compID="+comId+" data-typeOf='shipper' value="+id+"></td>" +
                        "<td data-field='shipperName' >" + shipperName + "</td>" +
                        "<td data-field='shipperName' >Shipper</td>" +
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
                        "</tr>";

                    $("#RestoreshipperTable").append(shipperStr);
                    no++;
                    } 
                }
            } else {
                var shipperStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
    
                $("#RestoreshipperTable").append(shipperStr);
            }



            consigneelen = shipperResult.consignee.consignee.length;
            if (consigneelen > 0) {
                var no=1;
                for (var i = consigneelen-1; i > 0; i--) {  
                    var comId=shipperResult.consignee.companyID;
                    var id =shipperResult.consignee.consignee[i]._id;
                    var consigneeName =shipperResult.consignee.consignee[i].consigneeName;
                    var consigneeAddress =shipperResult.consignee.consignee[i].consigneeAddress;
                    var consigneeLocation =shipperResult.consignee.consignee[i].consigneeLocation;
                    var  consigneePostal=shipperResult.consignee.consignee[i].consigneePostal;
                    var  consigneeContact=shipperResult.consignee.consignee[i].consigneeContact;
                    var  consigneeEmail=shipperResult.consignee.consignee[i].consigneeEmail;
                    var  consigneeTelephone=shipperResult.consignee.consignee[i].consigneeTelephone;
                    var  consigneeExt=shipperResult.consignee.consignee[i].consigneeExt;
                    var  consigneeTollFree=shipperResult.consignee.consignee[i].consigneeTollFree;
                    var  consigneeFax=shipperResult.consignee.consignee[i].consigneeFax;
                    var  consigneeReceiving=shipperResult.consignee.consignee[i].consigneeReceiving;
                    var  consigneeAppointments=shipperResult.consignee.consignee[i].consigneeAppointments;
                    var  consigneeIntersaction=shipperResult.consignee.consignee[i].consigneeIntersaction;
                    var  consigneeStatus=shipperResult.consignee.consignee[i].consigneeStatus;
                    var  consigneeRecivingNote=shipperResult.consignee.consignee[i].consigneeRecivingNote;
                    var  consigneeInternalNote=shipperResult.consignee.consignee[i].consigneeInternalNote;
                    var  deleteStatus=shipperResult.consignee.consignee[i].deleteStatus;

                    if(deleteStatus == 'YES'){
                        var consigneeStr = "<tr data-id=" + (i + 1) + ">" +
                            //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                        "<td data-field='no'><input type='checkbox' class='check_ShipperAndConsignee_one' name='allShipConIdCheck[]' data-consigneeShipid=" + id+ " date-compID="+comId+" data-typeOf='consignee' value="+id+"></td>" +
                        "<td data-field='consigneeName' >" + consigneeName + "</td>" +
                        "<td data-field='consigneeName' >Consignee</td>" +
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
                        "<td data-field='consigneeInternalNote' >" + consigneeInternalNote + "</td></tr>";
                        $("#RestoreshipperTable").append(consigneeStr);
                        no++;
                    } 
                }
            } 
            else 
            {
                var consigneeStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

                $("#RestoreshipperTable").append(consigneeStr);
            }


        }
        else
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#RestoreshipperTable").append(shipperStr);
        }
    }
    $(document).on("change", ".shipperAndConsigneeChecked", function() 
    {
        if(this.checked) {
            $('.check_ShipperAndConsignee_one:checkbox').each(function() 
            {
                this.checked = true;
                ShipperAndConsigneeCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_ShipperAndConsignee_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_ShipperAndConsignee_one',function(){
        ShipperAndConsigneeCheckboxRestore();
    });
    function ShipperAndConsigneeCheckboxRestore()
    {
        var shipperAndConsiIds = [];
        var companyIds=[];
        var DataType=[];
			$.each($("input[name='allShipConIdCheck[]']:checked"), function(){
				shipperAndConsiIds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
                DataType.push($(this).attr("data-typeOf"));
			});
            console.log(DataType);
			console.log(shipperAndConsiIds);
			var shipperConsidAllCheckedIds =JSON.stringify(shipperAndConsiIds);
			$('#checked_RestoreShipperModal_ids').val(shipperConsidAllCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_RestoreShipperModal_company_ids').val(companyCheckedIds);
            
			var DataTypeNames =JSON.stringify(DataType);
			$('#checked_RestoreShipperModal_type').val(DataTypeNames);


			if(shipperAndConsiIds.length > 0)
			{
				$('#restore_RestoreShipperModal_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_RestoreShipperModal_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_RestoreShipperModal_data',function(){
        var all_ids=$('#checked_RestoreShipperModal_ids').val();
        var custID=$("#checked_RestoreShipperModal_company_ids").val();
        var dataType=$("#checked_RestoreShipperModal_type").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenUpdateSub_creditCard").val(),all_ids:all_ids,custID:custID,dataType:dataType},
            url: base_path+"/admin/restoreShipper",
            success: function(response) {               
                swal.fire("Done!", "Shipper & Consignee Restored successfully", "success");
                $("#RestoreShipper_and_ConsigneeModal").modal("hide");
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
    

      
    });
    //========================== end restore ============================================
});