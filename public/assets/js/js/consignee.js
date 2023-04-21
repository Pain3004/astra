var base_path = $("#url").val();
$('.closeShipperModal').click(function(){
        $('#Shipper_and_ConsigneeModal').modal('hide');
        $("#View_ConsigneeModal").modal("hide");
});
   
$('.consignee_viewList').click(function(){
    $(".editAddressType").val("consignee");
    
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getConsignee",
        async: false,
        //dataType:JSON,
        success: function(text) {
            var res = JSON.parse(text);
            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                processConsignee(res[0]);
                $("#consignee_pagination").html(paginateList(res[1], "admin", "paginateconsignee", "processConsignee"));
                renameTableSeq("consigneeTableData", "page_active");

            }
            $('#Shipper_and_ConsigneeModal').modal('hide');
            $('#View_ConsigneeModal').modal('show');
      
        }
    });
});
function processConsignee(res) {
    $("#consigneeTableData").empty();
    
    var row = ``;
    for (var j = res.length - 1; j >= 0; j--) {
        var masterID = res[j]["arrData1"]._id;
        var data = res[j]["arrData1"].consignee;
        for (var i = 0; i < data.length; i++) {
            var id = data[i]._id;
            var counter = data[i].counter;
            var consigneeName = data[i].consigneeName;
            var consigneeAddress = data[i].consigneeAddress;
            var consigneeLocation = data[i].consigneeLocation;
            var consigneePostal = data[i].consigneePostal;
            var consigneeContact = data[i].consigneeContact;
            var consigneeEmail = data[i].consigneeEmail;
            var consigneeTelephone = data[i].consigneeTelephone;
            var consigneeExt = data[i].consigneeExt;
            var consigneeTollFree = data[i].consigneeTollFree;
            var consigneeFax = data[i].consigneeFax;
            var consigneeReceiving = data[i].consigneeReceiving;
            var consigneeAppointments = data[i].consigneeAppointments;
            var consigneeIntersaction = data[i].consigneeIntersaction;
            var consigneeStatus = data[i].consigneeStatus;
            var consigneeNotes = data[i].consigneeRecivingNote;
            var internalNotes = data[i].consigneeInternalNote;
            var deleteStatus = data[i].deleteStatus;
            if(consigneeName != "" && consigneeName !=null)
            {
                consigneeName=consigneeName;
            }
            else
            {
                consigneeName="--------";
            }
            if(consigneeAddress != "" && consigneeAddress !=null)
            {
                consigneeAddress=consigneeAddress;
            }
            else
            {
                consigneeAddress="--------";
            }
            if(consigneeLocation != "" && consigneeLocation !=null)
            {
                consigneeLocation=consigneeLocation;
            }
            else
            {
                consigneeLocation="--------";
            }
            if(consigneePostal != "" && consigneePostal !=null)
            {
                consigneePostal=consigneePostal;
            }
            else
            {
                consigneePostal="--------";
            }
            if(consigneeContact != "" && consigneeContact !=null)
            {
                consigneeContact=consigneeContact;
            }
            else
            {
                consigneeContact="--------";
            }
            if(consigneeEmail != "" && consigneeEmail !=null)
            {
                consigneeEmail=consigneeEmail;
            }
            else
            {
                consigneeEmail="--------";
            }
            if(consigneeTelephone != "" && consigneeTelephone !=null)
            {
                consigneeTelephone=consigneeTelephone;
            }
            else
            {
                consigneeTelephone="--------";
            }
            if(consigneeExt != "" && consigneeExt !=null)
            {
                consigneeExt=consigneeExt;
            }
            else
            {
                consigneeExt="--------";
            }
            if(consigneeTollFree != "" && consigneeTollFree !=null)
            {
                consigneeTollFree=consigneeTollFree;
            }
            else
            {
                consigneeTollFree="--------";
            }
            if(consigneeFax != "" && consigneeFax !=null)
            {
                consigneeFax=consigneeFax;
            }
            else
            {
                consigneeFax="--------";
            }
            if(consigneeReceiving != "" && consigneeReceiving !=null)
            {
                consigneeReceiving=consigneeReceiving;
            }
            else
            {
                consigneeReceiving="--------";
            }
            if(consigneeAppointments != "" && consigneeAppointments !=null)
            {
                consigneeAppointments=consigneeAppointments;
            }
            else
            {
                consigneeAppointments="--------";
            }
            if(consigneeIntersaction != "" && consigneeIntersaction !=null)
            {
                consigneeIntersaction=consigneeIntersaction;
            }
            else
            {
                consigneeIntersaction="--------";
            }
            if(consigneeStatus != "" && consigneeStatus !=null)
            {
                consigneeStatus=consigneeStatus;
            }
            else
            {
                consigneeStatus="--------";
            }
            if(consigneeNotes != "" && consigneeNotes !=null)
            {
                consigneeNotes=consigneeNotes;
            }
            else
            {
                consigneeNotes="--------";
            }
            if(internalNotes != "" && internalNotes !=null)
            {
                internalNotes=internalNotes;
            }
            else
            {
                internalNotes="--------";
            }
            if(deleteStatus=="NO")
            {
                var tr = `<tr>
                <td class="center-alignment " style="position: -webkit-sticky;
                position: sticky !important;
                background-color:#444A5F  !important;
                color:white;
                left: 0;
                z-index: 2;">${id}</td>
                <td style="position: -webkit-sticky;
                position: sticky !important;
                background-color: #444A5F !important;
                color:white;
                left: 63px !important;
                z-index: 2;">${consigneeName}</td>
                <td>Consignee</td>
                <td>${consigneeAddress}</td>
                <td>${consigneeLocation}</td>
                <td>${consigneePostal}</td>
                <td>${consigneeContact} </td>
                <td>${consigneeEmail}</td>
                <td>${consigneeTelephone}</td>
                <td>${consigneeExt}</td>
                <td>${consigneeTollFree}</td>
                <td>${consigneeFax} </td>
                <td>${consigneeReceiving}</td>
                <td>${consigneeAppointments}</td>
                <td>${consigneeIntersaction}</td>
                <td>${consigneeStatus}</td>
                <td>${consigneeNotes}</td>
                <td>${internalNotes}</td>`;
                tr += `<td style="display:flex; flex-direction:row;">
                <a class='button-23 editConsigShipperAndCongneeBtn'  title='Edit1' data-ConsigneeId='${id}' data-masterId='${masterID}'><i class='fe fe-edit'></i></a>
                <a class='button-23 deleteConsiShipperAndCongneeBtn'  data-ConsigneeId='${id}'  data-masterId='${masterID}'><i class='fe fe-trash'></i></a> 
                        </td></tr>`;
                row = tr + row;
                $("#consigneeTableData").html(row);
            }
           
        }
    }
   
}
//================ end view consignee =====================================

// delete =======================================================
$('body').on('click','.deleteConsiShipperAndCongneeBtn', function(){
    var id=$(this).attr("data-ConsigneeId");
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
                url: base_path+"/admin/deleteConsignee",
                data: { _token: $("#_token_AddShipperAndConsignee").val(), id: id,comID:comID},
                success: function(resp){
                    swal.fire("Done!", "Consignee Deleted successfully", "success");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getConsignee",
                        async: false,
                        success: function(text) {
                            var res = JSON.parse(text);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                processConsignee(res[0]);
                                $("#consignee_pagination").html(paginateList(res[1], "admin", "paginateconsignee", "processConsignee"));
                                renameTableSeq("consigneeTableData", "page_active");

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
//============================= end delete =============================
//==================== restore consigne ==================================
// =========================== start restore -=======================================
$(".restoreConsigneeBtn").click(function(){
    $.ajax({
            type: "GET",
            url: base_path+"/admin/getConsignee",
            async: false,
            success: function(text) {
                var res = JSON.parse(text);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processRestoreConsignee(res[0]);
                    // $("#shipper_pagination").html(paginateList(res[1], "admin", "paginateshipper", "processShipperTable"));
                    // renameTableSeq("shipperTable", "page_active");
                }
            }
        });
    $("#RestoreConsigneeModal").modal("show");
});
$(".closeRestoreConsigneeModal").click(function(){
    $("#RestoreConsigneeModal").modal("hide");
});
function processRestoreConsignee(res) {
    $("#RestoreConsigneeTable").empty();
    
    var row = ``;
    for (var j = res.length - 1; j >= 0; j--) {
        var masterID = res[j]["arrData1"]._id;
        var data = res[j]["arrData1"].consignee;
        for (var i = 0; i < data.length; i++) {
            var id = data[i]._id;
            var counter = data[i].counter;
            var consigneeName = data[i].consigneeName;
            var consigneeAddress = data[i].consigneeAddress;
            var consigneeLocation = data[i].consigneeLocation;
            var consigneePostal = data[i].consigneePostal;
            var consigneeContact = data[i].consigneeContact;
            var consigneeEmail = data[i].consigneeEmail;
            var consigneeTelephone = data[i].consigneeTelephone;
            var consigneeExt = data[i].consigneeExt;
            var consigneeTollFree = data[i].consigneeTollFree;
            var consigneeFax = data[i].consigneeFax;
            var consigneeReceiving = data[i].consigneeReceiving;
            var consigneeAppointments = data[i].consigneeAppointments;
            var consigneeIntersaction = data[i].consigneeIntersaction;
            var consigneeStatus = data[i].consigneeStatus;
            var consigneeNotes = data[i].consigneeRecivingNote;
            var internalNotes = data[i].consigneeInternalNote;
            var deleteStatus = data[i].deleteStatus;
            if(consigneeName != "" && consigneeName !=null)
            {
                consigneeName=consigneeName;
            }
            else
            {
                consigneeName="--------";
            }
            if(consigneeAddress != "" && consigneeAddress !=null)
            {
                consigneeAddress=consigneeAddress;
            }
            else
            {
                consigneeAddress="--------";
            }
            if(consigneeLocation != "" && consigneeLocation !=null)
            {
                consigneeLocation=consigneeLocation;
            }
            else
            {
                consigneeLocation="--------";
            }
            if(consigneePostal != "" && consigneePostal !=null)
            {
                consigneePostal=consigneePostal;
            }
            else
            {
                consigneePostal="--------";
            }
            if(consigneeContact != "" && consigneeContact !=null)
            {
                consigneeContact=consigneeContact;
            }
            else
            {
                consigneeContact="--------";
            }
            if(consigneeEmail != "" && consigneeEmail !=null)
            {
                consigneeEmail=consigneeEmail;
            }
            else
            {
                consigneeEmail="--------";
            }
            if(consigneeTelephone != "" && consigneeTelephone !=null)
            {
                consigneeTelephone=consigneeTelephone;
            }
            else
            {
                consigneeTelephone="--------";
            }
            if(consigneeExt != "" && consigneeExt !=null)
            {
                consigneeExt=consigneeExt;
            }
            else
            {
                consigneeExt="--------";
            }
            if(consigneeTollFree != "" && consigneeTollFree !=null)
            {
                consigneeTollFree=consigneeTollFree;
            }
            else
            {
                consigneeTollFree="--------";
            }
            if(consigneeFax != "" && consigneeFax !=null)
            {
                consigneeFax=consigneeFax;
            }
            else
            {
                consigneeFax="--------";
            }
            if(consigneeReceiving != "" && consigneeReceiving !=null)
            {
                consigneeReceiving=consigneeReceiving;
            }
            else
            {
                consigneeReceiving="--------";
            }
            if(consigneeAppointments != "" && consigneeAppointments !=null)
            {
                consigneeAppointments=consigneeAppointments;
            }
            else
            {
                consigneeAppointments="--------";
            }
            if(consigneeIntersaction != "" && consigneeIntersaction !=null)
            {
                consigneeIntersaction=consigneeIntersaction;
            }
            else
            {
                consigneeIntersaction="--------";
            }
            if(consigneeStatus != "" && consigneeStatus !=null)
            {
                consigneeStatus=consigneeStatus;
            }
            else
            {
                consigneeStatus="--------";
            }
            if(consigneeNotes != "" && consigneeNotes !=null)
            {
                consigneeNotes=consigneeNotes;
            }
            else
            {
                consigneeNotes="--------";
            }
            if(internalNotes != "" && internalNotes !=null)
            {
                internalNotes=internalNotes;
            }
            else
            {
                internalNotes="--------";
            }
            if(deleteStatus=="YES")
            {
                var tr = `<tr>
                <td style="position: -webkit-sticky;
                position: sticky !important;
                background-color: #444A5F !important;
                color:white;
                left: 0px !important;
                z-index: 2;"><input type='checkbox' class='checkConsignee_one' name='allConIdCheck[]' data-consigneeShipid=" ${id}" date-compID="${masterID}"  value="${id}"></td>
                <td style="position: -webkit-sticky;
                position: sticky !important;
                background-color: #444A5F !important;
                color:white;
                left: 65px !important;
                z-index: 2;">${consigneeName}</td>
                <td>Consignee</td>
                <td>${consigneeAddress}</td>
                <td>${consigneeLocation}</td>
                <td>${consigneePostal}</td>
                <td>${consigneeContact} </td>
                <td>${consigneeEmail}</td>
                <td>${consigneeTelephone}</td>
                <td>${consigneeExt}</td>
                <td>${consigneeTollFree}</td>
                <td>${consigneeFax} </td>
                <td>${consigneeReceiving}</td>
                <td>${consigneeAppointments}</td>
                <td>${consigneeIntersaction}</td>
                <td>${consigneeStatus}</td>
                <td>${consigneeNotes}</td>
                <td>${internalNotes}</td>
                </tr>`;
                row = tr + row;
                $("#RestoreConsigneeTable").html(row);
            }
           
        }
    }
    
}
$(document).on("change", ".ConsigneeChecked", function() 
{
    if(this.checked) {
        $('.checkConsignee_one:checkbox').each(function() 
        {
            this.checked = true;
            ConsigneeCheckboxRestore();
        });
    } 
    else 
    {
        $('.checkConsignee_one:checkbox').each(function() {
            this.checked = false;
            ConsigneeCheckboxRestore();
        });
    }
});
$('body').on('click','.checkConsignee_one',function(){
    ConsigneeCheckboxRestore();
});
function ConsigneeCheckboxRestore()
{
    var ConsiIds = [];
    var companyIds=[];
        $.each($("input[name='allConIdCheck[]']:checked"), function(){
            ConsiIds.push($(this).val());
            companyIds.push($(this).attr("date-compID"));
        });
        console.log(ConsiIds);
        var ConsidAllCheckedIds =JSON.stringify(ConsiIds);
        $('#checked_RestoreConsigneeModal_ids').val(ConsidAllCheckedIds);
       
        var companyCheckedIds =JSON.stringify(companyIds);
        $('#checked_RestoreConsigneeModal_company_ids').val(companyCheckedIds);
        


        if(ConsiIds.length > 0)
        {
            $('#restore_RestoreConsigneeModal_data').removeAttr('disabled');
        }
        else
        {
            $('#restore_RestoreConsigneeModal_data').attr('disabled',true);
        }
}
$('body').on('click','.restore_RestoreConsigneeModal_data',function(){
    var all_ids=$('#checked_RestoreConsigneeModal_ids').val();
    var custID=$("#checked_RestoreConsigneeModal_company_ids").val();
    $.ajax({
        type:"post",
        data:{_token:$("#_tokenUpdateSub_creditCard").val(),all_ids:all_ids,custID:custID},
        url: base_path+"/admin/restoreConsignee",
        success: function(response) {               
            swal.fire("Done!", " Consignee Restored successfully", "success");
            $("#RestoreConsigneeModal").modal("hide");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getConsignee",
                async: false,
                success: function(text) {
                    var res = JSON.parse(text);
                    if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                        processConsignee(res[0]);
                        // processRestoreConsignee(res[0]);
                    }
                }
            });
        }
    });


  
});
//===================== end restore ================================
   
    