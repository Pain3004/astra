var base_path = $("#url").val();
$(document).ready(function () {
    //========================== start view data ==========================================
    $('.closeExternalCarrierModal').click(function () {
        $('#ExternalCarrierModal').modal('hide');
    });
    $('.ExternalCarrierModalBtn').click(function () {
        alert();
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
   /**
     * Define a function to navigate betweens form steps.
     * It accepts one parameter. That is - step number.
     */
    const navigateToFormStep = (stepNumber) => {
        /**
         * Hide all form steps.
         */
        document.querySelectorAll(".form-step").forEach((formStepElement) => {
            formStepElement.classList.add("d-none");
        });
        /**
         * Mark all form steps as unfinished.
         */
        document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
            formStepHeader.classList.add("form-stepper-unfinished");
            formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
        });
        /**
         * Show the current form step (as passed to the function).
         */
        document.querySelector("#step-" + stepNumber).classList.remove("d-none");
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
        /**
         * Mark the current form step as active.
         */
        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
        formStepCircle.classList.add("form-stepper-active");
        /**
         * Loop through each form step circles.
         * This loop will continue up to the current step number.
         * Example: If the current step is 3,
         * then the loop will perform operations for step 1 and 2.
         */
        for (let index = 0; index < stepNumber; index++) {
            /**
             * Select the form step circle (progress bar).
             */
            const formStepCircle = document.querySelector('li[step="' + index + '"]');
            /**
             * Check if the element exist. If yes, then proceed.
             */
            if (formStepCircle) {
                /**
                 * Mark the form step as completed.
                 */
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                formStepCircle.classList.add("form-stepper-completed");
            }
        }
    };
        /**
         * Select all form navigation buttons, and loop through them.
         */
    document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
        /**
         * Add a click event listener to the button.
         */
        formNavigationBtn.addEventListener("click", () => {
            /**
             * Get the value of the step.
             */
            const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
            /**
             * Call the function to navigate to the target form step.
             */
            navigateToFormStep(stepNumber);
        });
    });
    //=============== end form set =============================================================

    //===================== start store data===================================================
    $(".AddExternalCarrierBtn").click(function(){
        $(".update_store_external_carrier").val("1");
        $("#AddExternalCarrier").modal("show");
    });
    $(".closeAddExternalCarreirModal").click(function(){
        $("#AddExternalCarrier").modal("hide");
    });
    $('#carrierBlacklisted').click(function(){
        if($(this).prop("checked") == true){
            $("#carrierBlacklisted").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#carrierBlacklisted").val('off');
          
        }
    });
    $('#carrierCorporation').click(function(){
        if($(this).prop("checked") == true){
            $("#carrierCorporation").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#carrierCorporation").val('off');
          
        }
    });
    $('#customCheck9').click(function(){
        if($(this).prop("checked") == true){
            $("#insuranceCompany").val($("#liabilityCompany").val());
            $("#insurancePolicy").val($("#liabilityPolicy").val());
            $("#insuranceExpDate").val($("#liabilityExpDate").val());
            $("#insuranceTelephone").val($("#liabilityTelephone").val());
            $("#insuranceExt").val($("#liabilityEXT").val());
            $("#insuranceContactName").val($("#liabilityContact").val());
            $("#insuranceAmt").val($("#liabilityAmount").val());
            $("#insuranceNotes").val($("#liabilityNotes").val());
        }
        else if($(this).prop("checked") == false){
            $("#insuranceCompany").val('');
            $("#insurancePolicy").val('');
            $("#insuranceExpDate").val('');
            $("#insuranceTelephone").val('');
            $("#insuranceExt").val('');
            $("#insuranceContactName").val('');
            $("#insuranceAmt").val('');
            $("#insuranceNotes").val('');
        }
    });
     $('#customCheck10').click(function(){
        if($(this).prop("checked") == true){
            $("#cargoName").val($("#liabilityCompany").val());
            $("#cargoPolicy").val($("#liabilityPolicy").val());
            $("#cargoExpDate").val($("#liabilityExpDate").val());
            $("#cargoTelephone").val($("#liabilityTelephone").val());
            $("#cargoExt").val($("#liabilityEXT").val());
            $("#cargoContactName").val($("#liabilityContact").val());
            $("#cargoInsuranceAmount").val($("#liabilityAmount").val());
            $("#cargoNotes").val($("#liabilityNotes").val());
        }
        else if($(this).prop("checked") == false){
            $("#cargoName").val('');
            $("#cargoPolicy").val('');
            $("#cargoExpDate").val('');
            $("#cargoTelephone").val('');
            $("#cargoExt").val('');
            $("#cargoContactName").val('');
            $("#cargoInsuranceAmount").val('');
            $("#cargoNotes").val('');
        }
    });

    $("#AddExternalCarrierSaveBtn").click(function(){
        var id=$(".update_external_carrier_id").val();
        var comID=$(".update_external_carrier_Comid").val();
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
        var primaryName=$('#primaryName').val();
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
   
        if(name=='')
        {
            swal.fire( "'Enter carrier Name");
            $('#carrierName').focus();
            return false;
        } 
        if(address=='')
        {
            swal.fire( "'Enter carrier Address");
            return false;
        } 
        if(location=='')
        {
            swal.fire( "'Enter carrier location");
            $('#carrierLocation').focus();
            return false;
        } 
        if(zip=='')
        {
            swal.fire( "'Enter carrier Zip");
            $('#carrierZip').focus();
            return false;
        } 
        if(email=='')
        {
            swal.fire( "'Enter carrier Email");
            $('#carrierEmail').focus();
            return false;
        } 
        if(paymentTerms=='')
        {
            swal.fire( "'Enter carrier PaymentTerms");
            $('#carrierPaymentTerms').focus();
            return false;
        } 
        if(factoringCompany=='')
        {
            swal.fire( "'Enter carrier FactoringCompany");
            $('#carrierFactoringCompany').focus();
            return false;
        } 
        var formData = new FormData();
        formData.append('_token',$("#_token_UpdateExternalCarrier").val());
        formData.append('name',name);
        formData.append('id',id);
        formData.append('comID',comID);
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
        formData.append('primaryName',primaryName);
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
        formData.append('liabilityContact',liabilityContact);
        formData.append('autoInsLiabilityAmount',autoInsLiabilityAmount);
        formData.append('autoInsuranceNotes',autoInsuranceNotes);
        formData.append('insuranceLiabilityCompany',insuranceLiabilityCompany);
        formData.append('insurancePolicyNo',insurancePolicyNo);
        formData.append('insuranceExpDate',insuranceExpDate);
        formData.append('insuranceTelephone',insuranceTelephone);
        formData.append('insuranceExt',insuranceExt);
        formData.append('insuranceContactName',insuranceContactName);
        formData.append('insuranceLiabilityAmount',insuranceLiabilityAmount);
        formData.append('insuranceNotes',insuranceNotes);
        formData.append('cargoCompany',cargoCompany);
        formData.append('cargoPolicyNo',cargoPolicyNo);
        formData.append('cargoExpiryDate',cargoExpiryDate);
        formData.append('cargoTelephone',cargoTelephone);
        formData.append('cargoExt',cargoExt);
        formData.append('cargoContactName',cargoContactName);
        formData.append('cargoInsuranceAmt',cargoInsuranceAmt);
        formData.append('cargoNotes',cargoNotes);
        formData.append('WSIBNo',WSIBNo);
        formData.append('primaryTelephone',primaryTelephone);
        formData.append('primaryEmail',primaryEmail);
        formData.append('secondaryName',secondaryName);
        formData.append('secondaryTelephone',secondaryTelephone);
        formData.append('secondaryEmail',secondaryEmail);
        formData.append('primaryNotes',primaryNotes);
        formData.append('sizeOfFleet',sizeOfFleet);
        var dataType=$(".update_store_external_carrier").val();
        // alert(dataType);
        if(dataType==1)
        {
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
        }
        else
        {
            $.ajax({
                type: "POST",
                url: base_path+"/admin/updateExternalCarrier",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success: function(data) {
                    // console.log(data)                    
                    swal.fire("Done!", "External Carrier Update successfully", "success");
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
        }
    });

    //============================== end store data ===========================================


    // =========================== start update data ===========================================
    $(".closeUpdateExternalCarreirModal").click(function(){
        $("#AddExternalCarrier").modal("hide");
    })
    $('body').on('click','.edit_externalCarrier_form',function(){
        $(".update_store_external_carrier").val("2");
        var id= $(this).attr("data-externalCarriId");
        var comId=$(this).attr("data-com_Id");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editExternalCarrier",
            async: false,
            data:{id:id, comId:comId},
            success: function(text) {
                $('.update_external_carrier_id').val(text._id);
                $('.update_external_carrier_Comid').val(text.companyID);
                $('#carrierName').val(text.name);
                $('#carrierAddress').val(text.address);
                $('#carrierLocation').val(text.location);
                $('#carrierZip').val(text.zip);
                $('#carrierContactName').val(text.contactName);
                $('#carrierEmail').val(text.email);
                $('#carrierTelephone').val(text.telephone);
                $('#carrierExt').val(text.ext);
                $('#carrierTollFree').val(text.tollFree);
                $('#carrierPayTerms').val(text.payTerms);
                $('#carrierTaxID').val(text.taxID);
                $('#carrierMC').val(text.mc);
                $('#carrierFactoring').val(text.factoringCompany);
                $('#carrierNotes').val(text.carrierNotes);
                $('#carrierBlacklisted').val(text.blacklisted);
                $('#carrierCorporation').val(text.corporation);
                $('#liabilityCompany').val(text.autoInsuranceCompany);
                $('#liabilityPolicy').val(text.autoInsPolicyNo);
                $('#liabilityExpDate').val(text.autoInsExpiryDate);
                $('#liabilityTelephone').val(text.autoInsTelephone);
                $('#liabilityEXT').val(text.autoInsExt);
                $('#liabilityContact').val(text.liabilityContact);
                $('#liabilityAmount').val(text.autoInsLiabilityAmount);
                $('#liabilityNotes').val(text.autoInsuranceNotes);
                $('#insuranceCompany').val(text.insuranceLiabilityCompany);
                $('#insurancePolicy').val(text.insurancePolicyNo);
                $('#insuranceExpDate').val(text.insuranceExpDate);
                $('#insuranceTelephone').val(text.insuranceTelephone);
                $('#insuranceExt').val(text.insuranceExt);
                $('#insuranceContactName').val(text.insuranceContactName);
                $('#insuranceAmt').val(text.insuranceLiabilityAmount);
                $('#insuranceNotes').val(text.insuranceNotes);
                $('#cargoName').val(text.cargoCompany);
                $('#cargoPolicy').val(text.cargoPolicyNo);
                $('#cargoExpDate').val(text.cargoExpiryDate);
                $('#cargoTelephone').val(text.cargoTelephone);
                $('#cargoExt').val(text.cargoExt);
                $('#cargoContactName').val(text.cargoContactName);
                $('#cargoInsuranceAmount').val(text.cargoInsuranceAmt);
                $('#cargoNotes').val(text.cargoNotes);
                $('#wsib').val(text.WSIBNo);
                $('#primaryName').val(text.primaryName);
                $('#primaryTelephone').val(text.primaryTelephone);
                $('#primaryEmail').val(text.primaryEmail);
                $('#secondaryName').val(text.secondaryName);
                $('#secondaryTelephone').val(text.secondaryTelephone);
                $('#secondaryEmail').val(text.secondaryEmail);
                $('#primaryNotes').val(text.primaryNotes);
                $('#sizeOfFleet').val(text.sizeOfFleet);
             }
        });
        $("#AddExternalCarrier").modal("show");
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