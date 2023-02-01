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
            consigneelen = factoringCompanyResult.factoring.length;
            $("#factComTable").html('');

            if (consigneelen > 0) {
                var no=1; 
                for (var i = consigneelen-1; i >= 0; i--) {  
                    var _id =factoringCompanyResult.factoring[i]._id;
                    var factoringCompanyname =factoringCompanyResult.factoring[i].factoringCompanyname;
                    var address =factoringCompanyResult.factoring[i].address;
                    var location=factoringCompanyResult.factoring[i].location;
                    var zip=factoringCompanyResult.factoring[i].zip;
                    var primaryContact=factoringCompanyResult.factoring[i].primaryContact;
                    var telephone=factoringCompanyResult.factoring[i].telephone;
                    var extFactoring =factoringCompanyResult.factoring[i].extFactoring;
                    var fax =factoringCompanyResult.factoring[i].fax;
                    var tollFree=factoringCompanyResult.factoring[i].tollFree;
                    var ContactEmail=factoringCompanyResult.factoring[i].email;
                    var secondaryContact =factoringCompanyResult.factoring[i].secondaryContact;
                    var factoringtelephone =factoringCompanyResult.factoring[i].factoringtelephone;
                    var ext =factoringCompanyResult.factoring[i].ext;
                    var currencySetting =factoringCompanyResult.factoring[i].currencySetting;
                    var paymentTerms =factoringCompanyResult.factoring[i].paymentTerms;
                    var  taxID=factoringCompanyResult.factoring[i].taxID;
                    var internalNote =factoringCompanyResult.factoring[i].internalNote;
                    var deleteStatus =factoringCompanyResult.factoring[i].deleteStatus;
                
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
                            "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-truckId='"+_id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                        "</td></tr>";

                        $("#factCompTable").append(factComStr);
                        no++;
                    } 

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


});