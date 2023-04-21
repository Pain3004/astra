var base_path = $("#url").val();
// $(document).ready(function() {

    // <!-- ========================--start ========================-- -->  
    $('.closeShipperModal').click(function(){
         $('#Shipper_and_ConsigneeModal').modal('hide');
     });
  
    // <!-- ----====================Get truck ====================----- -->     
    $('.shipperConsignee_navbar').click(function(){
        $(".editAddressType").val("shipper");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getShipper",
            async: false,
            success: function(text) {
                var res = JSON.parse(text);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processShipperTable(res[0]);
                    $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                    renameTableSeq("shipperTable", "page_active");
                }
               
             }
        });
        $('#Shipper_and_ConsigneeModal').modal('show');
        $('#View_ConsigneeModal').modal('hide');
    });

    

    function processShipperTable(res) {
        $("#shipperTable").empty();
        var row = ``;
        for (var j = res.length - 1; j >= 0; j--) 
        {
            var masterID = res[j]["arrData1"]._id;
            var data = res[j]["arrData1"].shipper;
            for (var i = 0; i < data.length; i++) 
            {
    
                var id = data[i]._id;
                var counter = data[i].counter;
                var shipperName = data[i].shipperName;
                var shipperAddress = data[i].shipperAddress;
                var shipperLocation = data[i].shipperLocation;
                var shipperPostal = data[i].shipperPostal;
                var shipperContact = data[i].shipperContact;
                var shipperEmail = data[i].shipperEmail;
                var shipperTelephone = data[i].shipperTelephone;
                var shipperExt = data[i].shipperExt;
                var shipperTollFree = data[i].shipperTollFree;
                var shipperFax = data[i].shipperFax;
                var shipperShippingHours = data[i].shipperShippingHours;
                var shipperAppointments = data[i].shipperAppointments;
                var shipperIntersaction = data[i].shipperIntersaction;
                var shipperStatus = data[i].shipperStatus;
                var shippingNotes = data[i].shippingNotes;
                var internalNotes = data[i].internalNotes;
                var deleteStatus = data[i].deleteStatus;
                
                if(shipperName !="" && shipperName !=null)
                {
                    shipperName=shipperName;
                }
                else
                {
                    shipperName="------";
                }
                if(shipperAddress !="" && shipperAddress !=null)
                {
                    shipperAddress=shipperAddress;
                }
                else
                {
                    shipperAddress="------";
                }
                if(shipperLocation !="" && shipperLocation !=null)
                {
                    shipperLocation=shipperLocation;
                }
                else
                {
                    shipperLocation="------";
                }
                if(shipperPostal !="" && shipperPostal !=null)
                {
                    shipperPostal=shipperPostal;
                }
                else
                {
                    shipperPostal="------";
                }
                if(shipperContact !="" && shipperContact !=null)
                {
                    shipperContact=shipperContact;
                }
                else
                {
                    shipperContact="------";
                }
                if(shipperEmail !="" && shipperEmail !=null)
                {
                    shipperEmail=shipperEmail;
                }
                else
                {
                    shipperEmail="------";
                }
                if(shipperTelephone !="" && shipperTelephone !=null)
                {
                    shipperTelephone=shipperTelephone;
                }
                else
                {
                    shipperTelephone="------";
                }
                if(shipperExt !="" && shipperExt !=null)
                {
                    shipperExt=shipperExt;
                }
                else
                {
                    shipperExt="------";
                }
                if(shipperTollFree !="" && shipperTollFree !=null)
                {
                    shipperTollFree=shipperTollFree;
                }
                else
                {
                    shipperTollFree="------";
                }
                if(shipperFax !="" && shipperFax !=null)
                {
                    shipperFax=shipperFax;
                }
                else
                {
                    shipperFax="------";
                }
                if(shipperShippingHours !="" && shipperShippingHours !=null)
                {
                    shipperShippingHours=shipperShippingHours;
                }
                else
                {
                    shipperShippingHours="------";
                }
                if(shipperAppointments !="" && shipperAppointments !=null)
                {
                    shipperAppointments=shipperAppointments;
                }
                else
                {
                    shipperAppointments="------";
                }
                if(shipperIntersaction !="" && shipperIntersaction !=null)
                {
                    shipperIntersaction=shipperIntersaction;
                }
                else
                {
                    shipperIntersaction="------";
                }
                if(shipperStatus !="" && shipperStatus !=null)
                {
                    shipperStatus=shipperStatus;
                }
                else
                {
                    shipperStatus="------";
                }
                if(shippingNotes !="" && shippingNotes !=null)
                {
                    shippingNotes=shippingNotes;
                }
                else
                {
                    shippingNotes="------";
                }
                if(internalNotes !="" && internalNotes !=null)
                {
                    internalNotes=internalNotes;
                }
                else
                {
                    internalNotes="------";
                }
                if(deleteStatus=="NO")
                {
                    var tr = `<tr>
                        <td style="position: -webkit-sticky;
                        position: sticky !important;
                        background-color:#444A5F !important;
                        color:white;
                        left: 0;
                        z-index: 2;">${id}</td>
                        <td style="position: -webkit-sticky;
                        position: sticky !important;
                        background-color:#444A5F !important;
                        color:white;
                        
                        z-index: 2; left: 64px !important;">${shipperName}</td>
                        <td>Shipper</td>
                        <td>${shipperAddress}</td>
                        <td> ${shipperLocation}</td>
                        <td> ${shipperPostal} </td>
                        <td>${shipperContact}  </td>
                        <td>${shipperEmail} </td>
                        <td>${shipperTelephone}</td>
                        <td>${shipperExt} </td>
                        <td>${shipperTollFree}</td>
                        <td>${shipperFax} </td>
                        <td>${shipperShippingHours}</td>
                        <td>${shipperAppointments}</td>
                        <td>${shipperIntersaction}</td>
                        <td>${shipperStatus} </td>
                        <td>${shippingNotes}</td>                       
                        <td>${internalNotes}</td>`;
                    tr += `<td style="display:flex; flex-direction:row;">
                    <a class='button-23 editShipperAndCongneeBtn'  title='Edit1' data-shipAndConsig='${id}' data-masterId='${masterID}'><i class='fe fe-edit'></i></a>
                    <a class='button-23 deleteShipperAndCongneeBtn'  data-shipAndConsig='${id}'  data-masterId='${masterID}'><i class='fe fe-trash'></i></a> 
                            </td>`;
                    tr += `</tr>`;
                    row = tr + row;
                    $("#shipperTable").html(row);
                }
                
            }
        }
       
    }
    // <!--========================-over function ========================- --> 
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
        $("#AddShipper_and_ConsigneeModal").css("z-index","10000000000");
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
                            var res = JSON.parse(text);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) 
                            {
                                processShipperTable(res[0]);
                                $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                                renameTableSeq("shipperTable", "page_active");
                            }
                            $('#Shipper_and_ConsigneeModal').modal('show');
                            $('#View_ConsigneeModal').modal('hide');
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
                        url: base_path+"/admin/getConsignee",
                        async: false,
                        success: function(text) {
                            var res = JSON.parse(text);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                processConsignee(res[0]);
                                $("#consignee_pagination").html(paginateList(res[1], "admin", "paginateconsignee", "processConsignee"));
                                renameTableSeq("consigneeTable", "page_active");

                            }
                            $('#Shipper_and_ConsigneeModal').modal('hide');
                            $('#View_ConsigneeModal').modal('show');
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
        var comID=$(this).attr("data-masterId");
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
                            var res = JSON.parse(text);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                processShipperTable(res[0]);
                                $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                                renameTableSeq("shipperTable", "page_active");
                            }
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
                        url: base_path+"/admin/getConsignee",
                        async: false,
                        success: function(text) {
                            var res = JSON.parse(text);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                var res = JSON.parse(text);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processConsignee(res[0]);
                                    $("#consignee_pagination").html(paginateList(res[1], "admin", "paginateconsignee", "processConsignee"));
                                    renameTableSeq("consigneeTableData", "page_active");
                    
                                }
                            }
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
        var id=$(this).attr("data-ConsigneeId");
        var comID=$(this).attr("data-masterId");
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
        $("#UpdateShipper_and_ConsigneeModal").css("z-index","10000000000");
        $("#UpdateShipper_and_ConsigneeModal").modal("show");
    });

    //=================== end update shipper =================================================

    //============================== start delete ==========================================
    $('body').on('click','.deleteShipperAndCongneeBtn', function(){
        var id=$(this).attr("data-shipAndConsig");
        var comID=$(this).attr("data-masterId");
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
                                var res = JSON.parse(text);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processShipperTable(res[0]);
                                    $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                                    renameTableSeq("shipperTable", "page_active");
                                }
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
                    var res = JSON.parse(text);
                    if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                        processRestoreShipperTable(res[0]);
                        $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                        renameTableSeq("shipperTable", "page_active");
                    }
                }
            });
        $("#RestoreShipper_and_ConsigneeModal").modal("show");
    });
    $(".closeRestoreShipperModal").click(function(){
        $("#RestoreShipper_and_ConsigneeModal").modal("hide");
    });
    function processRestoreShipperTable(res) {
        $(".RestoreshipperTable").html();
        var row = ``;
        for (var j = res.length - 1; j >= 0; j--) 
        {
            var masterID = res[j]["arrData1"]._id;
            var data = res[j]["arrData1"].shipper;
            for (var i = 0; i < data.length; i++) 
            {
    
                var id = data[i]._id;
                var counter = data[i].counter;
                var shipperName = data[i].shipperName;
                var shipperAddress = data[i].shipperAddress;
                var shipperLocation = data[i].shipperLocation;
                var shipperPostal = data[i].shipperPostal;
                var shipperContact = data[i].shipperContact;
                var shipperEmail = data[i].shipperEmail;
                var shipperTelephone = data[i].shipperTelephone;
                var shipperExt = data[i].shipperExt;
                var shipperTollFree = data[i].shipperTollFree;
                var shipperFax = data[i].shipperFax;
                var shipperShippingHours = data[i].shipperShippingHours;
                var shipperAppointments = data[i].shipperAppointments;
                var shipperIntersaction = data[i].shipperIntersaction;
                var shipperStatus = data[i].shipperStatus;
                var shippingNotes = data[i].shippingNotes;
                var internalNotes = data[i].internalNotes;
                var deleteStatus = data[i].deleteStatus;
                
                if(shipperName !="" && shipperName !=null)
                {
                    shipperName=shipperName;
                }
                else
                {
                    shipperName="------";
                }
                if(shipperAddress !="" && shipperAddress !=null)
                {
                    shipperAddress=shipperAddress;
                }
                else
                {
                    shipperAddress="------";
                }
                if(shipperLocation !="" && shipperLocation !=null)
                {
                    shipperLocation=shipperLocation;
                }
                else
                {
                    shipperLocation="------";
                }
                if(shipperPostal !="" && shipperPostal !=null)
                {
                    shipperPostal=shipperPostal;
                }
                else
                {
                    shipperPostal="------";
                }
                if(shipperContact !="" && shipperContact !=null)
                {
                    shipperContact=shipperContact;
                }
                else
                {
                    shipperContact="------";
                }
                if(shipperEmail !="" && shipperEmail !=null)
                {
                    shipperEmail=shipperEmail;
                }
                else
                {
                    shipperEmail="------";
                }
                if(shipperTelephone !="" && shipperTelephone !=null)
                {
                    shipperTelephone=shipperTelephone;
                }
                else
                {
                    shipperTelephone="------";
                }
                if(shipperExt !="" && shipperExt !=null)
                {
                    shipperExt=shipperExt;
                }
                else
                {
                    shipperExt="------";
                }
                if(shipperTollFree !="" && shipperTollFree !=null)
                {
                    shipperTollFree=shipperTollFree;
                }
                else
                {
                    shipperTollFree="------";
                }
                if(shipperFax !="" && shipperFax !=null)
                {
                    shipperFax=shipperFax;
                }
                else
                {
                    shipperFax="------";
                }
                if(shipperShippingHours !="" && shipperShippingHours !=null)
                {
                    shipperShippingHours=shipperShippingHours;
                }
                else
                {
                    shipperShippingHours="------";
                }
                if(shipperAppointments !="" && shipperAppointments !=null)
                {
                    shipperAppointments=shipperAppointments;
                }
                else
                {
                    shipperAppointments="------";
                }
                if(shipperIntersaction !="" && shipperIntersaction !=null)
                {
                    shipperIntersaction=shipperIntersaction;
                }
                else
                {
                    shipperIntersaction="------";
                }
                if(shipperStatus !="" && shipperStatus !=null)
                {
                    shipperStatus=shipperStatus;
                }
                else
                {
                    shipperStatus="------";
                }
                if(shippingNotes !="" && shippingNotes !=null)
                {
                    shippingNotes=shippingNotes;
                }
                else
                {
                    shippingNotes="------";
                }
                if(internalNotes !="" && internalNotes !=null)
                {
                    internalNotes=internalNotes;
                }
                else
                {
                    internalNotes="------";
                }
                if(deleteStatus=="YES")
                {
                    var tr = `<tr>
                        <td style="position: -webkit-sticky;
                        position: sticky !important;
                        background-color:#444A5F !important;
                        color:white;
                        
                        z-index: 2; left: 0px !important;"><input type='checkbox'  class='check_ShipperAndConsignee_one' name='allShipConIdCheck[]' data-consigneeShipid=" ${id}" date-compID="${masterID}" data-typeOf='shipper' value="${id}"></td>
                        <td style="position: -webkit-sticky;
                        position: sticky !important;
                        background-color:#444A5F !important;
                        color:white;
                        
                        z-index: 2; left: 63px !important;">${shipperName}</td>
                        <td>Shipper</td>
                        <td>${shipperAddress}</td>
                        <td> ${shipperLocation}</td>
                        <td> ${shipperPostal} </td>
                        <td>${shipperContact}  </td>
                        <td>${shipperEmail} </td>
                        <td>${shipperTelephone}</td>
                        <td>${shipperExt} </td>
                        <td>${shipperTollFree}</td>
                        <td>${shipperFax} </td>
                        <td>${shipperShippingHours}</td>
                        <td>${shipperAppointments}</td>
                        <td>${shipperIntersaction}</td>
                        <td>${shipperStatus} </td>
                        <td>${shippingNotes}</td>                       
                        <td>${internalNotes}</td>`;
                    tr += `</tr>`;
                    row = tr + row;
                    $(".RestoreshipperTable").append(row);
                    console.log(row);
                }
                
            }
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
                ShipperAndConsigneeCheckboxRestore();
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
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processShipperTable(res[0]);
                            processRestoreShipperTable(res[0]);
                            $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                            renameTableSeq("shipperTable", "page_active");
                        }
                    }
                });
            }
        });
    

      
    });
    //========================== end restore ============================================
// });