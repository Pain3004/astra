var base_path = $("#url").val();
$(document).ready(function () {
    //========================== start view data ==========================================
    $('.closeExternalCarrierModal').click(function () {
        $('#ExternalCarrierModal').modal('hide');
    });
    $('.ExternalCarrierModalBtn').click(function () {
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getExternalCarrier",
            async: false,
            success: function (text) {
                console.log(text);
                createExternalCarrier(text);
                ExternalCarrierResult = text;
            }
        });
        $('#ExternalCarrierModal').modal('show');
    });
    function createExternalCarrier(ExternalCarrierResult) {
        var extCariLeng = 0;
        if (ExternalCarrierResult != null) {
            $("#external_carrierTable").html('');
            var data=ExternalCarrierResult.length;
            for(var g=0;g<data;g++)
            {
                extCariLeng = ExternalCarrierResult[g].carrier.length;
                if(extCariLeng != null)
                {
                    var no=1;
                    for(var i=extCariLeng-1;i >= 0; i--)
                    {
                        var id=ExternalCarrierResult[g].carrier[i]._id;
                        var com_Id=ExternalCarrierResult[g].companyID;
                        var name =ExternalCarrierResult[g].carrier[i].name;
                        var address =ExternalCarrierResult[g].carrier[i].address;
                        var location =ExternalCarrierResult[g].carrier[i].location;
                        var zip =ExternalCarrierResult[g].carrier[i].zip;
                        var contactName =ExternalCarrierResult[g].carrier[i].contactName;
                        var email =ExternalCarrierResult[g].carrier[i].email;
                        var taxID =ExternalCarrierResult[g].carrier[i].taxID;
                        var telephone =ExternalCarrierResult[g].carrier[i].telephone;
                        var mc =ExternalCarrierResult[g].carrier[i].mc;
                        var dot =ExternalCarrierResult[g].carrier[i].dot;
                        var deleteStatus =ExternalCarrierResult[g].carrier[i].deleteStatus;
                        if (deleteStatus == "NO") 
                        {
                            var ExternalCarHtml = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td >" + name + "</td>" +
                                "<td>" + address + "</td>" +
                                "<td>" + location + "</td>" +
                                "<td>" + zip + "</td>" +
                                "<td>" + contactName + "</td>" +
                                "<td>" + email + "</td>" +
                                "<td>" + taxID + "</td>" +
                                "<td>" + telephone + "</td>" +
                                "<td>" + mc + "</td>" +
                                "<td>" + dot + "</td>" +

                                "<td><a class='mt-2 button-29 edit_externalCarrier_form fs-14 text-white '  title='Edit1' data-externalCarriId='" + id + "' data-com_Id='" + com_Id + "' ><i class='fe fe-edit'></i></a>&nbsp" +

                                "<a class='mt-2 button-29 fs-14 text-white delete_externalCarrier_form'  title='Edit1' data-externalCarriId='" + id + "' data-com_Id='" + com_Id + "'  ><i class='fe fe-trash'></i></a>&nbsp" +
                                "</td></tr>";

                            $("#external_carrierTable").append(ExternalCarHtml);
                            no++;
                        }
                    }
                }
                else
                {
                    var ExternalCarHtml = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                    $("#external_carrierTable").append(ExternalCarHtml);
                }                  
            }
        }
        else
        {
            var ExternalCarHtml = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#external_carrierTable").append(ExternalCarHtml);
        }

           
    }
    //============ end view external carrier ==================================================
    //=================================== form set -============================================
    function toggleCarrier(val) {

        var name = document.getElementById('carrierName').value;
        var address = document.getElementById('carrierAddress').value;
        var location = document.getElementById('carrierLocation').value;
        var zip = document.getElementById('carrierZip').value;
        var email = document.getElementById('carrierEmail').value;
        var telephone = document.getElementById('carrierTelephone').value;
        var carrierTollFree = document.getElementById('carrierTollFree').value;
        var carrierFax = document.getElementById('carrierFax').value;
        var carrierPayTerms = document.getElementById('carrierPayTerms').value;
        var taxID = document.getElementById('carrierTaxID').value;
        var mc = document.getElementById('carrierMC').value;
        var dot = document.getElementById('carrierDOT').value;
        var carrierFactoring1 = document.getElementById('carrierFactoring').value;
    
        if (val == 'first') {
            if (val_carrName(name)) {
                if (val_carrAddress(address)) {
                    if (val_carrLocation(location)) {
                        if (val_carrZip(zip)) {
                            if (val_carrEmail(email)) {
                                if (val_carrTelephone(telephone)) {
                                    if (val_carrTollFree(carrierTollFree)) {
                                        if (val_carrFax(carrierFax)) {
                                            // if (val_carrPayTerms(carrierPayTerms)) {
                                            if (datalistCheck(carrierPayTerms, 'browsers', 'carrierPayTerms', 'Payment Terms')) {
                                                if (val_carrTaxID(taxID)) {
                                                    if (val_carrMC(mc)) {
                                                        if (val_carrDOT(dot)) {
                                                            if (emptydatalistCheck(carrierFactoring1, 'Add_Carrier', 'carrierFactoring', 'Factoring Company')) {
                                                                // if (val_carrFactoring(carrierFactoring)) {
                                                                $("#carrier").toggleClass("show");
                                                                $("#carrier").toggleClass("active");
                                                                $("#insurance").toggleClass("show");
                                                                $("#insurance").toggleClass("active");
                                                                $("#home-tab").toggleClass("active");
                                                                $("#insurance-tab").toggleClass("active");
                                                                // $("#accounting").toggleClass("show");
                                                                // $("#accounting").toggleClass("active");
                                                                // $("#equipment").toggleClass("show");
                                                                // $("#equipment").toggleClass("active");
    
    
                                                                if ($("#home-tab").attr("aria-selected") === 'true') {
                                                                    $("#home-tab").attr("aria-selected", "false");
                                                                } else {
                                                                    $("#home-tab").attr("aria-selected", "true");
                                                                }
    
                                                                if ($("#insurance-tab").attr("aria-selected") === 'true') {
                                                                    $("#insurance-tab").attr("aria-selected", "false");
                                                                } else {
                                                                    $("#insurance-tab").attr("aria-selected", "true");
                                                                }
    
                                                                $("#home-title").toggleClass("show");
                                                                $("#insurance-title").toggleClass("show");
                                                                // }
                                                            }
                                                        }
                                                    }
                                                }
                                                // }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else if (val == 'second') {
            var liabilityTelephone = document.getElementById('liabilityTelephone').value;
            var insuranceTelephone = document.getElementById('insuranceTelephone').value;
            var cargoTelephone = document.getElementById('cargoTelephone').value;
    
            if (val_carrTelephoneAll(liabilityTelephone)) {
                if (val_carrTelephoneAll(insuranceTelephone)) {
                    if (val_carrTelephoneAll(cargoTelephone)) {
                        $("#accounting").toggleClass("show");
                        $("#accounting").toggleClass("active");
                        $("#insurance").toggleClass("show");
                        $("#insurance").toggleClass("active");
                        $("#accounting-tab").toggleClass("active");
                        $("#insurance-tab").toggleClass("active");
                        if ($("#accounting-tab").attr("aria-selected") === 'true') {
                            $("#accounting-tab").attr("aria-selected", "false");
                        } else {
                            $("#accounting-tab").attr("aria-selected", "true");
                        }
    
                        if ($("#insurance-tab").attr("aria-selected") === 'true') {
                            $("#insurance-tab").attr("aria-selected", "false");
                        } else {
                            $("#insurance-tab").attr("aria-selected", "true");
                        }
    
                        $("#accounting-title").toggleClass("show");
                        $("#insurance-title").toggleClass("show");
                    }
                }
            }
        } else if (val == 'third') {
            var primaryTelephone = document.getElementById('primaryTelephone').value;
            var primaryEmail = document.getElementById('primaryEmail').value;
            var secondaryTelephone = document.getElementById('secondaryTelephone').value;
            var secondaryEmail = document.getElementById('secondaryEmail').value;
    
            if (val_carrTelephoneAll(primaryTelephone)) {
                if (val_carrEmailAll(primaryEmail)) {
                    if (val_carrTelephoneAll(secondaryTelephone)) {
                        if (val_carrEmailAll(secondaryEmail)) {
                            // val_carrEmailAll
                            $("#accounting").toggleClass("show");
                            $("#accounting").toggleClass("active");
                            $("#equipment").toggleClass("show");
                            $("#equipment").toggleClass("active");
                            $("#accounting-tab").toggleClass("active");
                            $("#equipment-tab").toggleClass("active");
                            if ($("#accounting-tab").attr("aria-selected") === 'true') {
                                $("#accounting-tab").attr("aria-selected", "false");
                            } else {
                                $("#accounting-tab").attr("aria-selected", "true");
                            }
    
                            if ($("#equipment-tab").attr("aria-selected") === 'true') {
                                $("#equipment-tab").attr("aria-selected", "false");
                            } else {
                                $("#equipment-tab").attr("aria-selected", "true");
                            }
    
                            $("#accounting-title").toggleClass("show");
                            $("#equipment-title").toggleClass("show");
                        }
                    }
                }
            }
        } else if (val == 'fourth') {
            $("#accounting").toggleClass("show");
            $("#accounting").toggleClass("active");
            $("#equipment").toggleClass("show");
            $("#equipment").toggleClass("active");
            $("#accounting-tab").toggleClass("active");
            $("#equipment-tab").toggleClass("active");
            if ($("#accounting-tab").attr("aria-selected") === 'true') {
                $("#accounting-tab").attr("aria-selected", "false");
            } else {
                $("#accounting-tab").attr("aria-selected", "true");
            }
    
            if ($("#equipment-tab").attr("aria-selected") === 'true') {
                $("#equipment-tab").attr("aria-selected", "false");
            } else {
                $("#equipment-tab").attr("aria-selected", "true");
            }
    
            $("#accounting-title").toggleClass("show");
            $("#equipment-title").toggleClass("show");
        }
    }
    
    function togglePrev(val) {
        if (val == 'third') {
            $("#accounting").toggleClass("show");
            $("#accounting").toggleClass("active");
            $("#insurance").toggleClass("show");
            $("#insurance").toggleClass("active");
            $("#accounting-tab").toggleClass("active");
            $("#insurance-tab").toggleClass("active");
            if ($("#accounting-tab").attr("aria-selected") === 'true') {
                $("#accounting-tab").attr("aria-selected", "false");
            } else {
                $("#accounting-tab").attr("aria-selected", "true");
            }
    
            if ($("#insurance-tab").attr("aria-selected") === 'true') {
                $("#insurance-tab").attr("aria-selected", "false");
            } else {
                $("#insurance-tab").attr("aria-selected", "true");
            }
    
            $("#accounting-title").toggleClass("show");
            $("#insurance-title").toggleClass("show");
        } else if (val == 'second') {
            $("#carrier").toggleClass("show");
            $("#carrier").toggleClass("active");
            $("#insurance").toggleClass("show");
            $("#insurance").toggleClass("active");
            $("#home-tab").toggleClass("active");
            $("#insurance-tab").toggleClass("active");
    
            if ($("#home-tab").attr("aria-selected") === 'true') {
                $("#home-tab").attr("aria-selected", "false");
            } else {
                $("#home-tab").attr("aria-selected", "true");
            }
    
            if ($("#insurance-tab").attr("aria-selected") === 'true') {
                $("#insurance-tab").attr("aria-selected", "false");
            } else {
                $("#insurance-tab").attr("aria-selected", "true");
            }
    
            $("#home-title").toggleClass("show");
            $("#insurance-title").toggleClass("show");
        }
    }
    
    function toggleAll(val) {
        if ($("#carrier").hasClass("show")) {
            $("#carrier").toggleClass("show");
        }
        if ($("#carrier").hasClass("active")) {
            $("#carrier").toggleClass("active");
        }
        if ($("#insurance").hasClass("show")) {
            $("#insurance").toggleClass("show");
        }
        if ($("#insurance").hasClass("active")) {
            $("#insurance").toggleClass("active");
        }
        if ($("#accounting").hasClass("show")) {
            $("#accounting").toggleClass("show");
        }
        if ($("#accounting").hasClass("active")) {
            $("#accounting").toggleClass("active");
        }
        if ($("#equipment").hasClass("show")) {
            $("#equipment").toggleClass("show");
        }
        if ($("#equipment").hasClass("active")) {
            $("#equipment").toggleClass("active");
        }
        if ($("#home-tab").hasClass("active")) {
            $("#home-tab").toggleClass("active");
        }
        if ($("#insurance-tab").hasClass("active")) {
            $("#insurance-tab").toggleClass("active");
        }
        if ($("#accounting-tab").hasClass("active")) {
            $("#accounting-tab").toggleClass("active");
        }
        if ($("#equipment-tab").hasClass("active")) {
            $("#equipment-tab").toggleClass("active");
        }
        if ($("#home-title").hasClass("show")) {
            $("#home-title").toggleClass("show");
        }
        if ($("#insurance-title").hasClass("show")) {
            $("#insurance-title").toggleClass("show");
        }
        if ($("#accounting-title").hasClass("show")) {
            $("#accounting-title").toggleClass("show");
        }
        if ($("#equipment-title").hasClass("show")) {
            $("#equipment-title").toggleClass("show");
        }
    
        if ($("#home-tab").attr("aria-selected") === 'true') {
            $("#home-tab").attr("aria-selected", "false");
        } else {
            $("#home-tab").attr("aria-selected", "true");
        }
    
        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }
    
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }
    
        if ($("#equipment-tab").attr("aria-selected") === 'true') {
            $("#equipment-tab").attr("aria-selected", "false");
        } else {
            $("#equipment-tab").attr("aria-selected", "true");
        }
    
        if (val == 'first') {
            $("#carrier").toggleClass("show");
            $("#carrier").toggleClass("active");
            $("#home-tab").toggleClass("active");
            $("#home-title").toggleClass("show");
        } else if (val == 'second') {
            $("#insurance").toggleClass("show");
            $("#insurance").toggleClass("active");
            $("#insurance-tab").toggleClass("active");
            $("#insurance-title").toggleClass("show");
        } else if (val == 'third') {
            $("#accounting").toggleClass("show");
            $("#accounting").toggleClass("active");
            $("#accounting-tab").toggleClass("active");
            $("#accounting-title").toggleClass("show");
        } else if (val == 'fourth') {
            $("#equipment").toggleClass("show");
            $("#equipment").toggleClass("active");
            $("#equipment-tab").toggleClass("active");
            $("#equipment-title").toggleClass("show");
        }
    
    }
    //=============== end form set =============================================================

    //===================== start store data===================================================
    $(".AddExternalCarrierBtn").click(function(){
        $("#AddExternalCarrier").modal("show");
    });
    $(".closeAddExternalCarreirModal").click(function(){
        $("#AddExternalCarrier").modal("hide");
    });
    $("#AddExternalCarrierSaveBtn").click(function(){
        var name =$('#carrierName').val();
        var address =$('#carrierAddress').val();
        var location =$('#carrierLocation').val();
        var zip =$('#carrierZip').val();
        var contactName =$('#carrierContactName').val();
        var email =$('#carrierEmail').val();
        var telephone =$('#carrierTelephone').val();
        var ext =$('#carrierExt').val();
        var tollfree =$('#carrierTollFree').val();
        var fax =$('#carrierFax').val();
        var paymentTerms =$('#carrierPayTerms').val();
        var taxID =$('#carrierTaxID').val();
        var mc =$('#carrierMC').val();
        var dot =$('#carrierDOT').val();
        var factoringParent =$('#carrierFactoring').val();
        var factoringCompany =$('#carrierFactoring').val();
        var carrierNotes =$('#carrierNotes').val();
        var blacklisted
        =$('#carrierBlacklisted').val();
        var corporation =$('#carrierCorporation').val();
        var autoInsuranceCompany =$('#liabilityCompany').val();
        var autoInsPolicyNo =$('#liabilityPolicy').val();
        var autoInsExpiryDate =$('#liabilityExpDate').val();
        var autoInsTelephone =$('#liabilityTelephone').val();
        var autoInsExt =$('#liabilityEXT').val();
        var liabilityContact =$('#liabilityContact').val();
        var autoInsLiabilityAmount =$('#liabilityAmount').val();
        var autoInsuranceNotes =$('#liabilityNotes').val();        
        var insuranceLiabilityCompany =$('#insuranceCompany').val();
        var insurancePolicyNo =$('#insurancePolicy').val();
        var insuranceExpDate =$('#insuranceExpDate').val();
        var insuranceTelephone =$('#insuranceTelephone').val();
        var insuranceExt =$('#insuranceExt').val();
        var insuranceContactName =$('#insuranceContactName').val();
        var insuranceLiabilityAmount =$('#insuranceAmt').val();
        var insuranceNotes =$('#insuranceNotes').val();
        var cargoCompany =$('#cargoName').val();
        var cargoPolicyNo =$('#cargoPolicy').val();
        var cargoExpiryDate =$('#cargoExpDate').val();
        var cargoTelephone =$('#cargoTelephone').val();
        var cargoExt =$('#cargoExt').val();
        var cargoContactName =$('#cargoContactName').val();
        var cargoInsuranceAmt =$('#cargoInsuranceAmount').val();
        var cargoNotes =$('#cargoNotes').val();
        var WSIBNo =$('#wsib').val();
        var primaryTelephone =$('#primaryTelephone').val();
        var primaryEmail =$('#primaryEmail').val();
        var secondaryName =$('#secondaryName').val();
        var secondaryTelephone =$('#secondaryTelephone').val();
        var secondaryEmail =$('#secondaryEmail').val();
        var primaryNotes =$('#primaryNotes').val();
        var sizeOfFleet =$('#sizeOfFleet').val();
   
        if(fuelCardType=='')
        {
            swal.fire( "'Enter Enter Fuel Card Type");
            $('#addFuel_Card_Type').focus();
            return false;
            
        } 
        var formData = new FormData();
        formData.append('_token',$("#_token_AddExternalCarrier").val());
        formData.append('name',name);
        formData.append('address',address);
        formData.append('location',location);
        formData.append('zip',zip);
        formData.append('contactName',contactName);
        formData.append('email',email);
        formData.append('telephone',telephone);
        formData.append('ext',ext);
        formData.append('tollfree',tollfree);
        formData.append('fax',fax);
        formData.append('paymentTerms',paymentTerms);
        formData.append('taxID',taxID);
        formData.append('mc',mc);
        formData.append('dot',dot);
        formData.append('factoringParent',factoringParent);
        formData.append('factoringCompany',factoringCompany);
        formData.append('carrierNotes',carrierNotes);
        formData.append('blacklisted',blacklisted);
        formData.append('corporation',corporation);
        formData.append('autoInsuranceCompany',autoInsuranceCompany);
        formData.append('autoInsPolicyNo',autoInsPolicyNo);
        formData.append('autoInsExpiryDate',autoInsExpiryDate);
        formData.append('autoInsTelephone',autoInsTelephone);
        formData.append('autoInsExt',autoInsExt);
        formData.append('insuranceContactName',insuranceContactName);
        formData.append('name',name);
        formData.append('name',name);
        formData.append('name',name);
        formData.append('name',name);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/storeExternalCarrier",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                // console.log(data)                    
                swal.fire("Done!", "External Carrier added successfully", "success");
                $('#AddExternalCarrier').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getExternalCarrier",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        createExternalCarrier(text);
                        ExternalCarrierResult = text;
                    }
                });
            }
        });
    });

    //============================== end store data ===========================================


    // =========================== start update data ===========================================
    $(".closeUpdateExternalCarreirModal").click(function(){
        $("#UpdateExternalCarrier").modal("hide");
    })
    $('body').on('click','.edit_externalCarrier_form',function(){
        var id= $(this).attr("data-externalCarriId");
        var comId=$(this).attr("data-com_Id");
        $("#UpdateExternalCarrier").modal("show");
    });
    //==================================== end update data =====================================

    //=============================== start delete data =======================================
    $('body').on('click','.delete_externalCarrier_form',function(){
        var id= $(this).attr("data-externalCarriId");
        var comId=$(this).attr("data-com_Id");
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
                    type: 'POST',
                    url: base_path+"/admin/deleteExternalCarrier",
                    data: { _token: $("#_token_UpdateExternalCarrier").val(), id: id,comId:comId},
                    success: function(resp){
                        swal.fire("Done!", "Erternal Carrier Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path + "/admin/getExternalCarrier",
                            async: false,
                            success: function (text) {
                                console.log(text);
                                createExternalCarrier(text);
                                ExternalCarrierResult = text;
                            }
                        });
                        $('#ExternalCarrierModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //============================ end delete data ============================================

    //=============================== start restore data ======================================
    $(".restoreExternalCarrierBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getExternalCarrier",
            async: false,
            success: function (text) {
                console.log(text);
                RestoreExternalCarrier(text);
                ExternalCarrierResult = text;
            }
        });
        $('#RestoreExternalCarrierModal').modal('show');

    });
    $(".closeRestoreExternalCarrierModal").click(function(){
        $('#RestoreExternalCarrierModal').modal('hide');
    });
    function RestoreExternalCarrier(ExternalCarrierResult)
    {
        var extCariLeng = 0;
        if (ExternalCarrierResult != null) {
            $("#Restoreexternal_carrierTable").html('');
            var data=ExternalCarrierResult.length;
            for(var g=0;g<data;g++)
            {
                extCariLeng = ExternalCarrierResult[g].carrier.length;
                if(extCariLeng != null)
                {
                    var no=1;
                    for(var i=extCariLeng-1;i >= 0; i--)
                    {
                        var id=ExternalCarrierResult[g].carrier[i]._id;
                        var com_Id=ExternalCarrierResult[g].companyID;
                        var name =ExternalCarrierResult[g].carrier[i].name;
                        var address =ExternalCarrierResult[g].carrier[i].address;
                        var location =ExternalCarrierResult[g].carrier[i].location;
                        var zip =ExternalCarrierResult[g].carrier[i].zip;
                        var contactName =ExternalCarrierResult[g].carrier[i].contactName;
                        var email =ExternalCarrierResult[g].carrier[i].email;
                        var taxID =ExternalCarrierResult[g].carrier[i].taxID;
                        var telephone =ExternalCarrierResult[g].carrier[i].telephone;
                        var mc =ExternalCarrierResult[g].carrier[i].mc;
                        var dot =ExternalCarrierResult[g].carrier[i].dot;
                        var deleteStatus =ExternalCarrierResult[g].carrier[i].deleteStatus;
                        if (deleteStatus == "YES") 
                        {
                            var ExternalCarHtml = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' name='checkExternalCarOne[]' class='checkedIdsOneCarries' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                                "<td >" + name + "</td>" +
                                "<td>" + address + "</td>" +
                                "<td>" + location + "</td>" +
                                "<td>" + zip + "</td>" +
                                "<td>" + contactName + "</td>" +
                                "<td>" + email + "</td>" +
                                "<td>" + taxID + "</td>" +
                                "<td>" + telephone + "</td>" +
                                "<td>" + mc + "</td>" +
                                "<td>" + dot + "</td></tr>";

                            $("#Restoreexternal_carrierTable").append(ExternalCarHtml);
                            no++;
                        }
                    }
                }
                else
                {
                    var ExternalCarHtml = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                    $("#Restoreexternal_carrierTable").append(ExternalCarHtml);
                }                  
            }
        }
        else
        {
            var ExternalCarHtml = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#Restoreexternal_carrierTable").append(ExternalCarHtml);
        }
    }
    $(document).on("change", ".externalCarrier_all_ids", function() 
    {
        if(this.checked) {
            $('.checkedIdsOneCarries:checkbox').each(function() 
            {
                this.checked = true;
                ExternalCarrierCheckboxRestore();
            });
        } 
        else 
        {
            $('.checkedIdsOneCarries:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.checkedIdsOneCarries',function(){
        ExternalCarrierCheckboxRestore();
    });
    function ExternalCarrierCheckboxRestore()
    {
        var ExternalCarriesIds = [];
        var companyIds=[]
			$.each($("input[name='checkExternalCarOne[]']:checked"), function(){
				ExternalCarriesIds.push($(this).val());
                companyIds.push($(this).attr("data-comId"));
			});
			// console.log(ExternalCarriesIds);
			var ExtCariIds =JSON.stringify(ExternalCarriesIds);
			$('#checked_externalCarrier').val(ExtCariIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_externalCarrier_company_ids').val(companyCheckedIds);


			if(ExternalCarriesIds.length > 0)
			{
				$('#restore_externalCarrierData').removeAttr('disabled');
			}
			else
			{
				$('#restore_externalCarrierData').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_externalCarrierData',function(){
        var all_ids=$('#checked_externalCarrier').val();
        var custID=$("#checked_externalCarrier_company_ids").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenEditTruck").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoreExternalCarrier",
            success: function(response) {               
                swal.fire("Done!", "External Carrier Restored successfully", "success");
                $("#RestoreExternalCarrierModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getExternalCarrier",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        createExternalCarrier(text);
                        ExternalCarrierResult = text;
                    }
                });
            }
        });
    });
    //==============================end restore fuel card =====================================
});