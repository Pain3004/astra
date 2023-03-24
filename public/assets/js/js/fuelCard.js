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
                }
             }
        });
        $('#FuelCardModal').modal('show');
    });


    //==================================== over Get truck ==================================== 
    //===================== function ==========================================================
   
    $(".cardHolderChangeCardtYPE").on('change',function(){
        var val = $(this).val();
            var name=$('option:selected', this).attr('data_driver_name_for_recepits');
            // alert(name);
            $(".driver_name_fuelReceipt").val(name);
            $(".driver_name_fuelReceipt_edit").val(name);
            $(".add_fuelReceiptDriverNumber").val(val);
            $(".update_fuelReceiptDriverNumber").val(val);
        
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getFuelCard",
            async: false,
            success: function (text) {
                var text = JSON.parse(text);
                if (text[0] != undefined && text[1] != 0) {
                    processIftaCardTable(text[0]);
                }
            }
        });
    });
  
    function processIftaCardTable(res) 
    {
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].ifta_card;
        var companyID=res[0]["mainID"].companyID;
        var fuelCardType = res[0]["fuelCardType"];
        var driverName = res[0]["driverName"];
        $("#IftacardBody").html(processIftaCardRows(data, masterID,fuelCardType,driverName,companyID));
    }
    function processIftaCardRows(data,masterID,fuelCardType,driverName,companyID) 
    {
        $(".total_cards_fuel_re").html();
        var row = ``;
        var no=data.length;
        // console.log(data.length);
        for (var i = 0; i < data.length; i++) 
        {
            var id = data[i]._id;
            var iftaCardNo = data[i].iftaCardNo;
            if (data[i].cardHolderName != "" && data[i].cardHolderName != null) 
            {
                var cardHolderName = driverName[data[i].cardHolderName];
            } 
            else 
            {
                var cardHolderName = "Not Mention";
            }
            if(data[i].cardType != "" && data[i].cardType != null)
            {
                var cardType = fuelCardType[data[i].cardType];
            }
            var deleteStatus = data[i].deleteStatus;
            // console.log(deleteStatus);
            if(deleteStatus =="NO")
            {
                // console.log("NO="+deleteStatus);
                var tr = `<tr>
                <td>`+no+`</td>
                <td> ` + cardHolderName + `</td>
                <td>`+iftaCardNo+`</td>
                <td> ` + cardType + ` </td>`+
                `<td style='text-align:center'>`+  
                    `<a class='button-23  edit_fuel_card_form'  title='Edit1'  data-fuelCard=' ` + id + `' data-com_Id='`+companyID+`'  ><i class='fe fe-edit'></i></a>&nbsp`+
                    `</a> <a class=' button-23  delete_fuel_card_form'  data-fuelCard='` + id + `' data-com_Id='`+companyID+`'  title='Delete'><i class='fe fe-delete'></i></a></td>`;
                tr += '</tr>';
                var html="<option data_att_vendor_id='"+cardType+"' value='"+iftaCardNo+"'> "+iftaCardNo+"</option>";

                no--;
                row = tr + row;
            }
           
           
        }
        $(".total_cards_fuel_re").append(html);
        $("#FuelCardTable").html(row);
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
                fuelVendorlen = text.arrData1.fuelCard.length;
                $(".card_vendor_type").html();
                var html = "<option value='unselected' selected>---select-----</option>"
                if (fuelVendorlen > 0) {
                    for (var j = fuelVendorlen-1; j >= 0; j--) {  
                            var fuelVendorId =text.arrData1.fuelCard[j]._id;
                            var fuelCardType =text.arrData1.fuelCard[j].fuelCardType;
                            html+="<option value='" + fuelVendorId + "'> " + fuelCardType + "</option>"
                    }
                    // console.log(html);
                }
                $(".card_vendor_type").append(html);
            }
        }
    });
    // })


    // select 2 function =========================
  
    $(".single_selectFuelCard").select2({
        placeholder: "Select a programming language",
        allowClear: true,
        dropdownParent: $('#AddFuelCard')
    });
    $(".updateSingleFuelCard").select2({
        placeholder: "Select a programming language",
        allowClear: true,
        dropdownParent: $('#UpdateFuelCard')
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
                        var text = JSON.parse(text);
                        if (text[0] != undefined && text[1] != 0) {
                            processIftaCardTable(text[0]);
                        }
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
                        var text = JSON.parse(text);
                        if (text[0] != undefined && text[1] != 0) {
                            processIftaCardTable(text[0]);
                        }
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
                                var text = JSON.parse(text);
                                if (text[0] != undefined && text[1] != 0) {
                                    processIftaCardTable(text[0]);
                                }
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
                var text = JSON.parse(text);
                if (text[0] != undefined && text[1] != 0) {
                    reprocessIftaCardTable(text[0]);
                }
            }
        });
        $("#restore_fuel_card_modal").modal("show");
    });
    $(".restorefuelCardClose").click(function () {
        $("#restore_fuel_card_modal").modal("hide");
    });
    function reprocessIftaCardTable(res) 
    {
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].ifta_card;
        var companyID=res[0]["mainID"].companyID;
        var fuelCardType = res[0]["fuelCardType"];
        var driverName = res[0]["driverName"];
        RestoreprocessIftaCardTable(data, masterID,fuelCardType,driverName,companyID);
    }
    function RestoreprocessIftaCardTable(data,masterID,fuelCardType,driverName,companyID) 
    {
        var row = ``;
        var no=data.length;
        // console.log(data.length);
        for (var i = 0; i < data.length; i++) 
        {
            var id = data[i]._id;
            var iftaCardNo = data[i].iftaCardNo;
            var deleteStatus = data[i].deleteStatus;
            if (data[i].cardHolderName != "" && data[i].cardHolderName != null) 
            {
                var cardHolderName = driverName[data[i].cardHolderName];
            } 
            else 
            {
                var cardHolderName = "Not Mention";
            }
            if(data[i].cardType != "" && data[i].cardType != null)
            {
                var cardType = fuelCardType[data[i].cardType];
            }
            if(deleteStatus=="YES")
            {
                var tr = `<tr>
                            <td><input type='checkbox' class='check_fuelCard_one' name='checkedCard_ids[]' data-id='` + id + `' date-cusId=` + companyID + `  value=` + id + `></td>
                            <td> ` + cardHolderName + `</td>
                            <td>`+iftaCardNo+`</td>
                            <td> ` + cardType + ` </td>`;
                tr += '</tr>';
            
                no--;
                row = tr + row;
            }
            
           
        }
        $("#RestoreFuelCardTable").html(row);
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
                fuelCardCheckboxRestore();
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
                        var text = JSON.parse(text);
                        if (text[0] != undefined && text[1] != 0) {
                            processIftaCardTable(text[0]);
                        }
                    }
                });
            }
        });
    });
    //==============================end restore fuel card =======================


});