var base_path = $("#url").val();
$(document).ready(function() {

    // <!-- ------------------------------------------------------------------------- start ------------------------------------------------------------------------- -->  
    $('.fuelCardClose').click(function(){
        $('#FuelCardModal').modal('hide');
    });


    //===================================== et truck ===========================================
   
    $('#fuelCard_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelCard",
            async: false,
            //dataType:JSON,
            success: function(text) {
                var text = JSON.parse(text);
                if (text[0] != undefined && text[1] != 0) {
                    processIftaCardTable(text[0]);
                    // renameTableSeq("IftacardBody");
                }
                // createFuelCardRows(text);
                // FuelCardResult = text;
             }
        });
        $('#FuelCardModal').modal('show');
    });


    //==================================== over Get truck ==================================== 
    //===================== function ==========================================================
    // function createFuelCardRows(FuelCardResult) {
    //     var fuelCardlen = 0;
    //     if (FuelCardResult != null) 
    //     {            
    //         fuelCardlen = FuelCardResult.FuelCard.ifta_card.length;
    //         $("#FuelCardTable").html('');
    //         if (fuelCardlen > 0) 
    //         {                
    //             var no=1;
    //             for (var i = fuelCardlen-1; i >= 0; i--) 
    //             {  
    //                 var custID = FuelCardResult.FuelCard.companyID;
    //                 var fuelCardId =FuelCardResult.FuelCard.ifta_card[i]._id;
    //                 var cardHolderNameID =FuelCardResult.FuelCard.ifta_card[i].cardHolderName;

    //                 var driverLen = FuelCardResult.driver.driver.length;
    //                 for (var k = 0; k < driverLen; k++) 
    //                 { 
    //                     var driver_id = FuelCardResult.driver.driver[k]._id;
    //                     if(cardHolderNameID == driver_id)
    //                     {
    //                         var cardHolderName=FuelCardResult.driver.driver[k].driverName;
    //                         break;
    //                     }
    //                     else
    //                     {
    //                         cardHolderName=''; 
    //                     }
    //                 }
    //                 var iftaCardNo =FuelCardResult.FuelCard.ifta_card[i].iftaCardNo;
    //                 var cardTypeId =FuelCardResult.FuelCard.ifta_card[i].cardType;

    //                 var iftaCardLen = FuelCardResult.FuelVendor.fuelCard.length;
    //                 for (var j = 0; j < iftaCardLen; j++) 
    //                 { 
    //                     var iftaCard_id = FuelCardResult.FuelVendor.fuelCard[j]._id;
    //                     if(cardTypeId == iftaCard_id)
    //                     {
    //                        var cardType=FuelCardResult.FuelVendor.fuelCard[j].fuelCardType;
    //                         break;
    //                     }
    //                 }
    //                 var deleteStatus =FuelCardResult.FuelCard.ifta_card[i].deleteStatus;

    //                 if(deleteStatus == "NO")
    //                 {
    //                     var fuelCardStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
    //                     "<td data-field='no'>" + no + "</td>" +
    //                     "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
    //                     "<td data-field='iftaCardNo' >" +iftaCardNo  + "</td>" +
    //                     "<td data-field='cardType' >" + cardType + "</td>" +
    //                     "<td style='text-align:center'>"+
    //                         "<a class='button-23  edit_fuel_card_form'  title='Edit1'  data-fuelCard='" + fuelCardId + "' data-com_Id='" + custID + "'  ><i class='fe fe-edit'></i></a>&nbsp"+
    //                         "</a> <a class=' button-23  delete_fuel_card_form'  data-fuelCard='" + fuelCardId + "' data-com_Id='" + custID + "'  title='Delete'><i class='fe fe-delete'></i></a>"+
    //                     "</td></tr>";

    //                     $("#FuelCardTable").append(fuelCardStr);
    //                     no++;
    //                 }
    //             }
    //         } 
    //         else 
    //         {
    //             var fuelVendorStr = "<tr data-id=" + i + ">" +
    //                 "<td align='center' colspan='4'>No record found.</td>" +
    //                 "</tr>";
    
    //             $("#FuelCardTable").append(fuelCardStr);
    //         }
    //     }
    //     else 
    //     {
    //         var fuelVendorStr = "<tr data-id=" + i + ">" +
    //         "<td align='center' colspan='4'>No record found.</td>" +
    //         "</tr>";

    //         $("#FuelCardTable").append(fuelCardStr);
    //     }
    // }

    function processIftaCardTable(res) {
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].ifta_card;
        var fuelCardType = res[0]["fuelCardType"];
        var driverName = res[0]["driverName"];
        $("#IftacardBody").html(processIftaCardRows(data, masterID,fuelCardType,driverName));
    }
    function processIftaCardRows(data,masterID,fuelCardType,driverName) {
        var row = ``;
        // var userType = document.getElementById("user_type").value;
        for (var i = 0; i < data.length; i++) {
            var id = data[i]._id;
            var iftaCardNo = data[i].iftaCardNo;
            if (data[i].cardHolderName != "" && data[i].cardHolderName != null) {
                var cardHolderName = driverName[data[i].cardHolderName];
            } else {
                var cardHolderName = "Not Mention";
            }
            if (data[i].cardType != "" && data[i].cardType != null) {
                var cardType = fuelCardType[data[i].cardType];
            }
            var cardId = data[i].cardType;
            var cardHolderId = data[i].cardHolderName;
            var counter = data[i].counter;
            var created_by = data[i].insertedUserId;
            var created_time = convertTimeZone(data[i].insertedTime);
            var edit_by = data[i].edit_by;
            var edit_time = convertTimeZone(data[i].edit_time);
            var delete_status = data[i].deleteStatus;
            var deleteUser = data[i].deleteUser;
            var deleteTime = convertTimeZone(data[i].deleteTime);
    
            if(delete_status == "NO"){
                var pencilid2 = "iftaCardNoPencil" + id;     
            }else{
                var pencilid2 = "";
            }
            var delEn = delete_status == 'YES' ? 'disabled_load' : '';
            var disable =  delete_status == 'YES' ? 'disabled' : '';
    
           
            var updateCardCat = "updateCardCat";
            var column2 = "iftaCardNo";
            var column1 = "cardHolderName";
            var column3 = "cardType";
            var type = "text";
            var title2 = "IFTA Card No.";
            var fueldriverlist1 = "fueldriverlist" + i;
            var cardtypelist1 = "cardtypelist" + i;
            var title_model = "fuelcard";
            var mainID = id + ")" + masterID;
            var tr = `<tr>
                           <th data-id="${id}"></th>
                           <td ${delEn}'>
                           ` + cardHolderName + `
                            </td>
                            <td>${iftaCardNo}</td>
                        <td> ` + cardType + ` </td>`;
            tr += `<td class="${delEn}">`;
            // if (privdata.deleteUser == '1') {
                if (delete_status == "NO") {
                    tr += `<a href='#' onclick='deleteCardCat("` + mainID + `")'><i class='mdi mdi-delete-sweep-outline delete-icone'></i></a>`;
                } else {
                    if(userType != "admin"){
                        tr += `<a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline delete-icone-disable'></i><a>`;
                    }else{
                        tr += `<a onclick='restoreEntry("`+ mainID +`","ifta_card_category","ifta_card");'><i class="mdi mdi-delete-restore delete-recover"></i></a>`; 
                    }
                }
            // }
            if(delete_status == "YES") {   
                tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                        <span class="tooltiptext">
                        Deleted By : ${deleteUser}<br>Deleted Time : ${deleteTime}</span>
                        </div>`;
            }else{
                if (edit_by != undefined && edit_time != undefined) {
                    tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                        <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}<br>Edit By : ${edit_by}<br>Edited Time : ${edit_time}</span>
                        </div>`;
                }else{
                    tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                    <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}</span>
                    </div>`;
                }
            }
            tr += '</td>';
            tr += '</tr>';
            row = tr + row;
        }
        $("#FuelCardTable").html(tr);
        return row;
    }

    // ==================================End=================================================

   //================================ start create fuel card ========================
   $(".create_fuel_card_type_new").click(function(){
        $("#AddFuelVendor").css("z-index","10000000000");
        $("#AddFuelVendor").modal("show");
    });
    $(".closeAddFuelCard").click(function () {
        $("#AddFuelCard").modal("hide");
    }); 
    $('#AddFuelCard').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $.ajax({
        type: "GET",
        url: base_path + "/admin/getFuelVendor",
        async: false,
        success: function (text) {

            var fuelVendorlen = 0;
            if (text != null) {
                fuelVendorlen = text.FuelVendor.length;
                $(".card_vendor_type").html();
                var html = "<option value='unselected' selected>---select-----</option>"
                if (fuelVendorlen > 0) {
                    for (var i = fuelVendorlen - 1; i >= 0; i--) {
                        var fuelVendorId = text.FuelVendor[i]._id;
                        var FuelVendorType = text.FuelVendor[i].FuelVendorType;
                            html+="<option value='" + fuelVendorId + "'> " + FuelVendorType + "</option>"
                    }
                    console.log(html);
                }
                $(".card_vendor_type").append(html);
            }
        }
    });
    // })


    // select 2 function =========================
  
    $("#single").select2({
        placeholder: "Select a programming language",
        allowClear: true,
        dropdownParent: $('#AddFuelCard')
    });
    $(".card_vendor_type").select2({
        placeholder: "Select a programming language",
        allowClear: true,
        dropdownParent: $('#AddFuelCard')
    });
   
    $.ajax({
        type: "GET",
        url: base_path + "/admin/driver",
        async: false,
        success: function (text) {
            var len2 = text.driver.length;
            $('.cardHolderName').html();
            var html = "<option value='unselected' selected>----select-----</option>";
            for (var j = 0; j < len2; j++) {
                var driverId = text.driver[j]._id;
                var name = text.driver[j].driverName;
                 html+= "<option value='" + driverId + "'  data_driver_name_for_recepits='"+name+"'>" + name + " </option>";
               
            }
            $(".cardHolderName").append(html);
        }
    });
    $(".AddFuelCardFormModal").click(function () {
    
        $("#AddFuelCard").modal("show");
    });
    $("body").on('change', ".fuel_drive_change", function () {
        var val = $(this).val();
        $(".addFuelCard_employe").val(val);
        $(".updateFuelCard_employe").val(val);
    });

    $(".FuelCardSavebutton").click(function () {
        var cardHolderName = $('.addFuel_Card_holder_name').val();
        var employeeNo = $('.addFuelCard_employe').val();
        var iftaCardNo = $('.add_IFTA_Card_Number').val();
        var cardType = $(".add_Fuel_Card_Type").val();
        // alert(cardType);
        if (cardHolderName == 'unselected') {
            swal.fire("'Select holder name");
            $('.addFuel_Card_holder_name').focus();
            return false;

        }
        if (iftaCardNo == '') {
            swal.fire("'Enter ifta Card No");
            $('.add_IFTA_Card_Number').focus();
            return false;
        }
        if (cardType == "unselected" ) {
            swal.fire("'select card type");
            $('.add_Fuel_Card_Type').focus();
            return false;
        }

        var formData = new FormData();
        formData.append('_token', $("#_token_addFuelCards").val());
        formData.append('cardHolderName', cardHolderName);
        formData.append('employeeNo', employeeNo);
        formData.append('iftaCardNo', iftaCardNo);
        formData.append('cardType', cardType);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/createFuelCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                console.log(data)
                swal.fire("Done!", "Fuel card added successfully", "success");
                $('#AddFuelCard').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getFuelCard",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        // createFuelCardRows(text);
                        // FuelCardResult = text;
                    }
                });
            }
        });
    });

    //================================= end create fuel card =======================

    //========================= start update fuel card =======================
    $('body').on('click', '.edit_fuel_card_form', function () {
        var id = $(this).attr("data-fuelcard");
        var comId = $(this).attr("data-com_id");
        $.ajax({
            type: "GET",
            url: base_path + "/admin/editFuelCard",
            data: { id: id, comId: comId },
            async: false,
            success: function (res) {
                $('.fuel_card_company_id').val(res.companyID);
                $('.fuel_card_id_edit').val(res.ifta_card._id);
                $('.updateFuel_Card_holder_name').val(res.ifta_card.cardHolderName);
                $('.updateFuelCard_employe').val(res.ifta_card.employeeNo);
                $('.update_IFTA_Card_Number').val(res.ifta_card.iftaCardNo);
                $('.update_Fuel_Card_Type').val(res.ifta_card.cardType);
            }
        });
        $("#UpdateFuelCard").modal("show");
    });
    $(".closeUpdateFuelCard").click(function(){
        $("#UpdateFuelCard").modal("hide");
    });
    $('#UpdateFuelCard').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".FuelCardUpdatebutton").click(function(){
        var id = $('.fuel_card_id_edit').val();
        var comId = $('.fuel_card_company_id').val();
        var cardHolderName = $('.updateFuel_Card_holder_name').val();
        var employeeNo = $('.updateFuelCard_employe').val();
        var iftaCardNo = $('.update_IFTA_Card_Number').val();
        var cardType = $(".update_Fuel_Card_Type").val();
        if (cardHolderName == 'unselected') {
            swal.fire("'Select holder name");
            $('.updateFuel_Card_holder_name').focus();
            return false;

        }
        if (iftaCardNo == '') {
            swal.fire("'Enter ifta Card No");
            $('.update_IFTA_Card_Number').focus();
            return false;
        }
        if (cardType == 'unselected') {
            swal.fire("'select card type");
            $('.update_Fuel_Card_Type').focus();
            return false;
        }

        var formData = new FormData();
        formData.append('_token', $("#_tokenEdit_fuel_card").val());
        formData.append('id', id);
        formData.append('comId', comId);
        formData.append('cardHolderName', cardHolderName);
        formData.append('employeeNo', employeeNo);
        formData.append('iftaCardNo', iftaCardNo);
        formData.append('cardType', cardType);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/updateFuelCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                console.log(data)
                swal.fire("Done!", "Fuel card Updated successfully", "success");
                $('#UpdateFuelCard').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getFuelCard",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        // createFuelCardRows(text);
                        // FuelCardResult = text;
                    }
                });
            }
        });
    });
    //===============================end update fuel card =================

    // =======================start delete fuel card =========================================
    $('body').on('click', '.delete_fuel_card_form', function () {
        var id = $(this).attr("data-fuelcard");
        var comId = $(this).attr("data-com_id");
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({

                    type: 'post',
                    url: base_path + "/admin/deleteFuelCard",
                    data: { _token: $("#_tokenEdit_fuel_card").val(), id: id, comId: comId },
                    success: function (resp) {
                        swal.fire("Done!", " Fuel Card deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path + "/admin/getFuelCard",
                            async: false,
                            success: function (text) {
                                console.log(text);
                                // createFuelCardRows(text);
                                // FuelCardResult = text;
                            }
                        });
                        $('#FuelCardModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            }
        });
    });
    //======================================== end delete fuel card =================

    //======================== start restore fuel card ==================================
    $(".restoreFuelCardData").click(function () {
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getFuelCard",
            async: false,
            success: function (text) {
                console.log(text);
                RestoreFuelCardRows(text);
                restoreFuelCardResult = text;
            }
        });
        $("#restore_fuel_card_modal").modal("show");
    });
    $(".restorefuelCardClose").click(function () {
        $("#restore_fuel_card_modal").modal("hide");
    });
    function RestoreFuelCardRows(restoreFuelCardResult) {
        var fuelCardlen = 0;
        //alert(FuelVendorResult);
        if (restoreFuelCardResult != null) {

            fuelCardlen = restoreFuelCardResult.FuelCard.ifta_card.length;

            $("#RestoreFuelCardTable").html('');

            if (fuelCardlen > 0) {

                var no = 1;
                for (var i = fuelCardlen - 1; i >= 0; i--) {
                    var custID = restoreFuelCardResult.FuelCard.companyID;
                    var fuelCardId = restoreFuelCardResult.FuelCard.ifta_card[i]._id;
                    var cardHolderNameID = restoreFuelCardResult.FuelCard.ifta_card[i].cardHolderName;

                    var driverLen = restoreFuelCardResult.driver.driver.length;
                    for (var k = 0; k < driverLen; k++) {
                        var driver_id = restoreFuelCardResult.driver.driver[k]._id;
                        if (cardHolderNameID == driver_id) {
                            cardHolderName = restoreFuelCardResult.driver.driver[k].driverName;
                            break;
                        } else {
                            cardHolderName = '';
                        }
                    }



                    var iftaCardNo = restoreFuelCardResult.FuelCard.ifta_card[i].iftaCardNo;
                    var cardTypeId = restoreFuelCardResult.FuelCard.ifta_card[i].cardType;

                    var iftaCardLen = restoreFuelCardResult.FuelVendor.fuelCard.length;
                    for (var j = 0; j < iftaCardLen; j++) {
                        var iftaCard_id = restoreFuelCardResult.FuelVendor.fuelCard[j]._id;
                        if (cardTypeId == iftaCard_id) {
                            cardType = restoreFuelCardResult.FuelVendor.fuelCard[j].fuelCardType;
                            break;
                        }
                    }



                    var deleteStatus = restoreFuelCardResult.FuelCard.ifta_card[i].deleteStatus;
                    //alert(fuelCardId);
                    if (deleteStatus == "YES") {
                        //alert("ff");
                        var fuelCardStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' class='check_fuelCard_one' name='checkedCard_ids[]' data-id=" + fuelCardId + " date-cusId=" + custID + "  value=" + fuelCardId + "></td>" +
                            "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                            "<td data-field='iftaCardNo' >" + iftaCardNo + "</td>" +
                            "<td data-field='cardType' >" + cardType + "</td>" +
                            "<</tr>";

                        $("#RestoreFuelCardTable").append(fuelCardStr);
                        no++;
                    }
                }
            } else {
                var fuelVendorStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";

                $("#RestoreFuelCardTable").append(fuelCardStr);
            }
        } else {
            var fuelVendorStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#RestoreFuelCardTable").append(fuelCardStr);
        }
    }
    $(document).on("change", ".fuel_card_all_ids", function () {
        if (this.checked) {
            $('.check_fuelCard_one:checkbox').each(function () {
                this.checked = true;
                fuelCardCheckboxRestore();
            });
        }
        else {
            $('.check_fuelCard_one:checkbox').each(function () {
                this.checked = false;
            });
        }
    });
    $('body').on('click', '.check_fuelCard_one', function () {
        fuelCardCheckboxRestore();
    });
    function fuelCardCheckboxRestore() {
        var fuelCardIds = [];
        var companyIds = []
        $.each($("input[name='checkedCard_ids[]']:checked"), function () {
            fuelCardIds.push($(this).val());
            companyIds.push($(this).attr("date-cusId"));
        });
        console.log(fuelCardIds);
        var fuelCardCheckedIds = JSON.stringify(fuelCardIds);
        $('#checked_fuelCard').val(fuelCardCheckedIds);

        var companyCheckedIds = JSON.stringify(companyIds);
        $('#checked_fuelCard_company_ids').val(companyCheckedIds);


        if (fuelCardIds.length > 0) {
            $('#restore_Fuel_CardData').removeAttr('disabled');
        }
        else {
            $('#restore_Fuel_CardData').attr('disabled', true);
        }
    }
    $('body').on('click', '.restore_Fuel_CardData', function () {
        var all_ids = $('#checked_fuelCard').val();
        var custID = $("#checked_fuelCard_company_ids").val();
        $.ajax({
            type: "post",
            data: { _token: $("#_tokenEdit_fuel_card").val(), all_ids: all_ids, custID: custID },
            url: base_path + "/admin/restoreFuelCard",
            success: function (response) {
                swal.fire("Done!", "Fuel Card Restored successfully", "success");
                $("#restore_fuel_card_modal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getFuelCard",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        // createFuelCardRows(text);
                        // FuelCardResult = text;
                    }
                });
            }
        });
    });
    //==============================end restore fuel card =======================


});