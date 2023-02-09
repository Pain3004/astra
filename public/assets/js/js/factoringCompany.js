var base_path = $("#url").val();
$(document).ready(function() {
    //==================================== start view fatctoring =============================================================

    $('.FactoringCompanyModalClose').click(function(){
         $('#FacoringCompanyModal').modal('hide');
     });

    $('#AddFactoringCompany').click(function(){
        $('#addFactoringCompanyModal').modal('show');
    });

    $('#factoringCurrency').click(function(){
        $('#plusCurrencyModal').modal('show');
    });

    $('#factoringPaymentTerms').click(function(){
        $('#PaymentTermsModal').modal('show');
    });

    $('.addFactoringCompanyModalCloseButton').click(function(){
        $('#addFactoringCompanyModal').modal('hide');
    });

    // <!-- -------------------------------------------------------------------------Get factoringCompany  ------------------------------------------------------------------------- -->  
   
    $('#facCompany_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFactCompany",
            success: function(text) {
                console.log(text);
                createFactoringCompanyRows(text);
                factoringCompanyResult = text;
             }
        });
        $('#FacoringCompanyModal').modal('show');
    });


    // <!-- -------------------------------------------------------------------------over Get factoringCompany  ------------------------------------------------------------------------- --> 


    // <!-- -------------------------------------------------------------------------function  get------------------------------------------------------------------------- --> 
    
    function createFactoringCompanyRows(factoringCompanyResult) {
        var consigneelen = 0;
        if (factoringCompanyResult != null) {
            consigneelen = factoringCompanyResult.FactCompany.length;
            $("#factCompTable").html('');
            // const x = consigneelen.chunk(2, 4);
  
            
            if (consigneelen > 0) {
                var no=1; 
                
                for(var j = consigneelen-1; j >= 0; j--)
                {
                    var data= factoringCompanyResult.FactCompany[j];
                    $.each(data, function(i, v) { 
                            var id =factoringCompanyResult.FactCompany[j][i]._id;
                            var factoringCompanyname =factoringCompanyResult.FactCompany[j][i].factoringCompanyname;
                            // console.log(factoringCompanyname);
                            var address =factoringCompanyResult.FactCompany[j][i].address;
                            var location=factoringCompanyResult.FactCompany[j][i].location;
                            var zip=factoringCompanyResult.FactCompany[j][i].zip;
                            var primaryContact=factoringCompanyResult.FactCompany[j][i].primaryContact;
                            var telephone=factoringCompanyResult.FactCompany[j][i].telephone;
                            var extFactoring =factoringCompanyResult.FactCompany[j][i].extFactoring;
                            var fax =factoringCompanyResult.FactCompany[j][i].fax;
                            var tollFree=factoringCompanyResult.FactCompany[j][i].tollFree;
                            var ContactEmail=factoringCompanyResult.FactCompany[j][i].email;
                            var secondaryContact =factoringCompanyResult.FactCompany[j][i].secondaryContact;
                            var factoringtelephone =factoringCompanyResult.FactCompany[j][i].factoringtelephone;
                            var ext =factoringCompanyResult.FactCompany[j][i].ext;
                            var currencySetting =factoringCompanyResult.FactCompany[j][i].currencySetting;
                            var paymentTerms =factoringCompanyResult.FactCompany[j][i].paymentTerms;
                            var  taxID=factoringCompanyResult.FactCompany[j][i].taxID;
                            var internalNote =factoringCompanyResult.FactCompany[j][i].internalNote;
                            var deleteStatus =factoringCompanyResult.FactCompany[j][i].deleteStatus;
                        
                            if(deleteStatus == 'NO' ){
    
                                var factComStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='factoringCompanyname' >" + factoringCompanyname + "</td>" +
                                "<td data-field='address' >" + address + "</td>" +
                                "<td data-field='location' >" + location + "</td>" +
                                "<td data-field='zip' >" + zip + "</td>" +
                                "<td data-field='primaryContact' >" + primaryContact + "</td>" +
                                "<td data-field='telephone' >" + telephone + "</td>" +
                                "<td data-field='extFactoring' >" + extFactoring + "</td>" +
                                "<td data-field='fax' >" + fax + "</td>" +
                                "<td data-field='tollFree' >" + tollFree + "</td>" +
                                "<td data-field='ContactEmail' >" + ContactEmail + "</td>" +
                                "<td data-field='secondaryContact' >" + secondaryContact + "</td>" +
                                "<td data-field='factoringtelephone' >" + factoringtelephone + "</td>" +
                                "<td data-field='ext' >" + ext + "</td>" +
                                "<td data-field='currencySetting' >" + currencySetting + "</td>" +
                                "<td data-field='paymentTerms' >" + paymentTerms + "</td>" +
                                "<td data-field='taxID' >" + taxID + "</td>" +
                                "<td data-field='internalNote' >" + internalNote + "</td>" +
                                
                                "<td style='text-align:center'>"+
                                    "<a class='button-23 editFactringCompany'  title='Edit1' data-factId='"+id+"' ><i class='fe fe-edit'></i></a>"+
                                    "<a class='button-23 deleteFactringCompany'  title='Edit1' data-factId='"+id+"' ><i class='fe fe-trash'></i></a>"+
                                "</td></tr>";
    
                                $("#factCompTable").append(factComStr);
                                no++;
                            } 
                    });
                  
                }
            } 
        }
        else {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";

            $("#factCompTable").append(tr_str1);
        }
    }
    // <!-- -------------------------------------------------------------------------over function  ------------------------------------------------------------------------- --> 
    //  //<!-- ------------------------------------------------------------------------- add customer factoringCompany ------------------------------------------------------------------------- -->
    $(".addFactoringCompanyDataSubmit").click(function(){
        //alert();
        var factoringCompanyName=$('#addfactoringCompanyName').val();
        var factoringCompanyAddress=$('#addfactoringCompanyAddress').val();
        var factoringCompanyLocation=$('#addfactoringCompanyLocation').val();
        var factoringCompanyZip=$('#addfactoringCompanyZip').val();

        var factoringCompanyPrimaryContact=$('#addfactoringCompanyPrimaryContact').val();
        var factoringCompanyPrimaryContactTelephone=$('#addfactoringCompanyPrimaryContactTelephone').val();
        var factoringCompanyPrimaryContactExt=$('#addfactoringCompanyPrimaryContactExt').val();
        var factoringCompanyFax=$('#addfactoringCompanyFax').val();

        var factoringCompanySecondaryContact=$('#addfactoringCompanySecondaryContact').val();
        var factoringCompanySecondaryContactTelephone=$('#addfactoringCompanySecondaryContactTelephone').val();
        var factoringCompanySecondaryContactExt=$('#addfactoringCompanySecondaryContactExt').val();
        var factoringTollFree=$('#addfactoringTollFree').val();

        var factoringCompanyContactEmail=$('#addfactoringCompanyContactEmail').val();
        var factoringCompanycurrency=$('#addcurrency1').val();
        var factoringCompanyPaymentTerms=$('#addPaymentTerms1').val();
        var factoringCompanyTaxID=$('#addfactoringCompanyTaxID1').val();

        var factoringCompanyInternalNotes=$('#addfactoringCompanyInternalNotes').val();

        var formData = new FormData();
        formData.append('_token',$("#_tokenaddFactoringCompany").val());
        formData.append('factoringCompanyName',factoringCompanyName);
        formData.append('factoringCompanyAddress',factoringCompanyAddress);
        formData.append('factoringCompanyLocation',factoringCompanyLocation);
        formData.append('factoringCompanyZip',factoringCompanyZip);
        formData.append('factoringCompanyPrimaryContact',factoringCompanyPrimaryContact);
        formData.append('factoringCompanyPrimaryContactTelephone',factoringCompanyPrimaryContactTelephone);
        formData.append('factoringCompanyPrimaryContactExt',factoringCompanyPrimaryContactExt);
        formData.append('factoringCompanyFax',factoringCompanyFax);
        formData.append('factoringCompanySecondaryContact',factoringCompanySecondaryContact);
        formData.append('factoringCompanySecondaryContactTelephone',factoringCompanySecondaryContactTelephone);
        formData.append('factoringCompanySecondaryContactExt',factoringCompanySecondaryContactExt);
        formData.append('factoringTollFree',factoringTollFree);
        formData.append('factoringCompanyContactEmail',factoringCompanyContactEmail);
        formData.append('factoringCompanycurrency',factoringCompanycurrency);
        formData.append('factoringCompanyPaymentTerms',factoringCompanyPaymentTerms);
        formData.append('factoringCompanyTaxID',factoringCompanyTaxID);
        formData.append('factoringCompanyInternalNotes',factoringCompanyInternalNotes);
        //alert(currencyName);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/factoringCompany",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(res){
                swal.fire("Factoring Company added successfully.");
                $("#addFactoringCompanyModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFactCompany",
                    success: function(text) {
                        // console.log(text);
                        createFactoringCompanyRows(text);
                        factoringCompanyResult = text;
                        }
                });
              
            }
        });
    });
    // // <!-- -------------------------------------------------------------------------over add customer factoringCompany ------------------------------------------------------------------------- -->   
    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
    // $('#factoring_table_pagination').DataTable({
    //     "columnDefs": [
    //         {
    //             "targets": [ 12 ],
    //             "searchable": false,
    //             "sortable":false
    //         },
    //     ]

    // });


    //================== start edit ==============================================
    $(".closeUpdateFactoringCompanyModal").click(function(){
        $("#update_FactoringCompanyModal").modal("hide");
    })
    $("body").on('click','.editFactringCompany',function(){
        var id=$(this).attr("data-factId");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editFactCompany",
            async: false,
            data:{id:id},
            //dataType:JSON,
            success: function(text) {
                $('.factringCom_id_edit').val(text._id);
                $('.update_factoringCompanyname').val(text.factoringCompanyname);
                $('.update_Factring_address').val(text.address);
                $('.update_fact_location').val(text.location);
                $('.update_fact_primaryContact').val(text.primaryContact);
                $('.update_fac_telephone').val(text.telephone);
                $('.update_fac_ext').val(text.ext);
                $('.update_fac_fax').val(text.fax);
                $('.update_fact_zip').val(text.zip);
                $('.update_fac_tollFree').val(text.tollFree);
                $('.update_fac_email').val(text.email);
                $('.update_fac_secondaryContact').val(text.secondaryContact);
                $('.update_fac_factoringtelephone').val(text.factoringtelephone);
                $('.update_fac_extFactoring').val(text.extFactoring);
                $('.update_fac_currencySetting').val(text.currencySetting);
                $('.update_fac_paymentTerms').val(text.paymentTerms);
                $('.update_fac_taxID').val(text.taxID);
                $('.update_fac_internalNote').val(text.internalNote);
                
             }
        });

        $("#update_FactoringCompanyModal").modal("show");
    });
    $(".UpdateFactoringCompanyModal").click(function(){
        var id=$('.factringCom_id_edit').val();
        var factoringCompanyname= $('.update_factoringCompanyname').val();
        var address= $('.update_Factring_address').val();
        var location= $('.update_fact_location').val();
        var primaryContact= $('.update_fact_primaryContact').val();
        var telephone=$('.update_fac_telephone').val();
        var ext= $('.update_fac_ext').val();
        var zip=$(".update_fact_zip").val();
        var fax= $('.update_fac_fax').val();
        var tollFree= $('.update_fac_tollFree').val();
        var email= $('.update_fac_email').val();
        var secondaryContact= $('.update_fac_secondaryContact').val();
        var factoringtelephone=$('.update_fac_factoringtelephone').val();
        var extFactoring= $('.update_fac_extFactoring').val();
        var currencySetting= $('.update_fac_currencySetting').val();
        var paymentTerms= $('.update_fac_paymentTerms').val();
        var taxID=$('.update_fac_taxID').val();
        var internalNote=$('.update_fac_internalNote').val();
        if(factoringCompanyname=='')
        {
            swal.fire( "'Enter Enter Factring Company Name");
            return false;            
        } 
        if(address=='')
        {
            swal.fire( "'Enter Enter Factring address");
            return false;            
        } 
        if(location=='')
        {
            swal.fire( "'Enter Enter Factring location");
            return false;            
        } 
        if(zip=='')
        {
            swal.fire( "'Enter Enter Factring Company Zip");
            return false;            
        }  
        if(currencySetting=='')
        {
            swal.fire( "'Enter Enter currencySetting");
            return false;            
        }  
        if(paymentTerms=='')
        {
            swal.fire( "'Enter Enter paymentTerms");
            return false;            
        }  
        if(taxID=='')
        {
            swal.fire( "'Enter Enter taxID");
            return false;            
        } 
        var formData = new FormData();
        formData.append('_token',$("#_token_updateFactoringCompany").val());
        formData.append('factoringCompanyname',factoringCompanyname);
        formData.append('id',id);
        formData.append('address',address);
        formData.append('location',location);
        formData.append('primaryContact',primaryContact);
        formData.append('telephone',telephone);
        formData.append('ext',ext);
        formData.append('zip',zip);
        formData.append('fax',fax);
        formData.append('tollFree',tollFree);
        formData.append('email',email);
        formData.append('secondaryContact',secondaryContact);
        formData.append('factoringtelephone',factoringtelephone);
        formData.append('extFactoring',extFactoring);
        formData.append('currencySetting',currencySetting);
        formData.append('paymentTerms',paymentTerms);
        formData.append('taxID',taxID);
        formData.append('internalNote',internalNote);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateFactCompany",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Factring Company updated successfully", "success");
                $('#update_FactoringCompanyModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFactCompany",
                    success: function(text) {
                        createFactoringCompanyRows(text);
                        factoringCompanyResult = text;
                    }
                });
            }
        });
    });
    //============================== ebd update ==========================

    //===================== start delete data ============================
    $("body").on('click','.deleteFactringCompany',function(){
        var id=$(this).attr("data-factId");
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
                    url: base_path + "/admin/deleteFactCompany",
                    data: { _token: $("#_token_updateFactoringCompany").val(), id: id},
                    success: function (resp) {
                        swal.fire("Done!", " Factring Company deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path + "/admin/getFactCompany",
                            async: false,
                            success: function (text) {
                                console.log(text);
                                createFactoringCompanyRows(text);
                                factoringCompanyResult = text;
                            }
                        });
                        $('#FacoringCompanyModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            }
        });
    });
    //======================== end delete data ===========================

    //================ start  restore data ===============================
    $(".restoreFactringComlData").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFactCompany",
            success: function(text) {
                RestoreFactoringCompanyRows(text);
                factoringCompanyResult = text;
             }
        });
        $('#RestoreFacoringCompanyModal').modal('show');
    });
    $(".RestoreFactoringCompanyModalClose").click(function(){
        $('#RestoreFacoringCompanyModal').modal('hide');
    });
    function RestoreFactoringCompanyRows(factoringCompanyResult)
    {
        var consigneelen = 0;
        if (factoringCompanyResult != null) {
            consigneelen = factoringCompanyResult.FactCompany.length;
            $("#RestorefactCompTable").html('');
            // const x = consigneelen.chunk(2, 4);
  
            
            if (consigneelen > 0) {
                var no=1; 
                for(var j=0;j<consigneelen;j++)
                {
                    var data= factoringCompanyResult.FactCompany[j];
                    $.each(data, function(i, v) { 
                            var id =factoringCompanyResult.FactCompany[j][i]._id;
                            var factoringCompanyname =factoringCompanyResult.FactCompany[j][i].factoringCompanyname;
                            // console.log(factoringCompanyname);
                            var address =factoringCompanyResult.FactCompany[j][i].address;
                            var location=factoringCompanyResult.FactCompany[j][i].location;
                            var zip=factoringCompanyResult.FactCompany[j][i].zip;
                            var primaryContact=factoringCompanyResult.FactCompany[j][i].primaryContact;
                            var telephone=factoringCompanyResult.FactCompany[j][i].telephone;
                            var extFactoring =factoringCompanyResult.FactCompany[j][i].extFactoring;
                            var fax =factoringCompanyResult.FactCompany[j][i].fax;
                            var tollFree=factoringCompanyResult.FactCompany[j][i].tollFree;
                            var ContactEmail=factoringCompanyResult.FactCompany[j][i].email;
                            var secondaryContact =factoringCompanyResult.FactCompany[j][i].secondaryContact;
                            var factoringtelephone =factoringCompanyResult.FactCompany[j][i].factoringtelephone;
                            var ext =factoringCompanyResult.FactCompany[j][i].ext;
                            var currencySetting =factoringCompanyResult.FactCompany[j][i].currencySetting;
                            var paymentTerms =factoringCompanyResult.FactCompany[j][i].paymentTerms;
                            var  taxID=factoringCompanyResult.FactCompany[j][i].taxID;
                            var internalNote =factoringCompanyResult.FactCompany[j][i].internalNote;
                            var deleteStatus =factoringCompanyResult.FactCompany[j][i].deleteStatus;
                        
                            if(deleteStatus == 'YES' ){
    
                                var factComStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='factoringCompanyname' >" + factoringCompanyname + "</td>" +
                                "<td data-field='address' >" + address + "</td>" +
                                "<td data-field='location' >" + location + "</td>" +
                                "<td data-field='zip' >" + zip + "</td>" +
                                "<td data-field='primaryContact' >" + primaryContact + "</td>" +
                                "<td data-field='telephone' >" + telephone + "</td>" +
                                "<td data-field='extFactoring' >" + extFactoring + "</td>" +
                                "<td data-field='fax' >" + fax + "</td>" +
                                "<td data-field='tollFree' >" + tollFree + "</td>" +
                                "<td data-field='ContactEmail' >" + ContactEmail + "</td>" +
                                "<td data-field='secondaryContact' >" + secondaryContact + "</td>" +
                                "<td data-field='factoringtelephone' >" + factoringtelephone + "</td>" +
                                "<td data-field='ext' >" + ext + "</td>" +
                                "<td data-field='currencySetting' >" + currencySetting + "</td>" +
                                "<td data-field='paymentTerms' >" + paymentTerms + "</td>" +
                                "<td data-field='taxID' >" + taxID + "</td>" +
                                "<td data-field='internalNote' >" + internalNote + "</td>" +
                                
                                "<td style='text-align:center'>"+
                                    "<a class='button-23 editFactringCompany'  title='Edit1' data-factId='"+id+"' ><i class='fe fe-edit'></i></a>"+
                                    "<a class='button-23 deleteFactringCompany'  title='Edit1' data-factId='"+id+"' ><i class='fe fe-trash'></i></a>"+
                                "</td></tr>";
    
                                $("#RestorefactCompTable").append(factComStr);
                                no++;
                            } 
                    });
                  
                }
            } 
        }
        else {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";

            $("#RestorefactCompTable").append(tr_str1);
        }
    }

    $(document).on("change", ".checked_FactringIds", function () {
        if (this.checked) {
            $('.check_FactrCom_one:checkbox').each(function () {
                this.checked = true;
                FactringCOmCheckboxRestore();
            });
        }
        else {
            $('.check_FactrCom_one:checkbox').each(function () {
                this.checked = false;
            });
        }
    });
    $('body').on('click', '.check_FactrCom_one', function () {
        FactringCOmCheckboxRestore();
    });
    function FactringCOmCheckboxRestore() {
        var FactringIDs = [];
        var companyIds = []
        $.each($("input[name='checkedFactComp_ids[]']:checked"), function () {
            FactringIDs.push($(this).val());
            companyIds.push($(this).attr("date-cusId"));
        });
        console.log(FactringIDs);
        var fuelCardCheckedIds = JSON.stringify(FactringIDs);
        $('#checked_FactringCom_ids').val(fuelCardCheckedIds);

        var companyCheckedIds = JSON.stringify(companyIds);
        $('#checked_FactringC_company_ids').val(companyCheckedIds);


        if (FactringIDs.length > 0) {
            $('#restorefactring_com_btn').removeAttr('disabled');
        }
        else {
            $('#restorefactring_com_btn').attr('disabled', true);
        }
    }
    $('body').on('click', '.restorefactring_com_btn', function () {
        var all_ids = $('#checked_FactringCom_ids').val();
        var custID = $("#checked_FactringC_company_ids").val();
        $.ajax({
            type: "post",
            data: { _token: $("#_token_updateFactoringCompany").val(), all_ids: all_ids, custID: custID },
            url: base_path + "/admin/restoreFactCompany",
            success: function (response) {
                swal.fire("Done!", "Factring company Restored successfully", "success");
                $("#RestoreFacoringCompanyModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path + "/admin/getFactCompany",
                    async: false,
                    success: function (text) {
                        console.log(text);
                        createFactoringCompanyRows(text);
                        factoringCompanyResult = text;
                    }
                });
            }
        });
    });
    //============== end restore data ====================================

});