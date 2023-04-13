var base_path = $("#url").val();
// ==========================start view ===================================

    $('.FactoringCompanyModalClose').click(function(){
        
         $('#FacoringCompanyModal').modal('hide');
     });
     $("#FacoringCompanyModal").on("shown.bs.modal",function(){
        $(this).hide().show(); 
     });
    $('#AddFactoringCompany').click(function(){
        $('#addFactoringCompanyModal').modal('show');
    });
    $(".factoringCompanyModalCloseButton").click(function(){
        $('#addFactoringCompanyModal').modal('hide');
    });
    $('#addFactoringCompanyModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    
    $('#plusCurrencyModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $('#PaymentTermsModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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
   
    $('#facCompany_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFactCompany",
            success: function(text) {
                var res = JSON.parse(text);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processFactoringTable(res[0]);
                    $("#factoring_pagination").html(paginateList(res[1], "admin", "paginatefactoring", "processFactoringTable"));
                    renameTableSeq("factCompTable", "page_active");
                }
                // createFactoringCompanyRows(text);
                // factoringCompanyResult = text;
               
             }
        });
        // $('#nav').empty();
        $('#FacoringCompanyModal').modal('show');
   
        
    });
    function processFactoringTable(res) {
        $("#factCompTable").empty();
        var row = ``;
        var currency = res[0]["currencyType"];
        var payment = res[0]["paymentTerm"];
        for (var j = res.length - 1; j >= 0; j--) {
            var masterID = res[j]["mainID"]._id;
            var data = res[j]["mainID"].factoring;
    
        for (var i = 0; i < data.length; i++) {
    
            var id = data[i]._id;
            var factoringCompanyname = data[i].factoringCompanyname;
            var address = data[i].address;
            var locations = data[i].location;
            var zip = data[i].zip;
            var primaryContact = data[i].primaryContact;
            var telephones = data[i].telephone;
            var extFactoring = data[i].extFactoring;
            var fax = data[i].fax;
            var tollFree = data[i].tollFree;
            var email = data[i].email;
            var secondaryContact = data[i].secondaryContact;
            var factoringtelephone = data[i].factoringtelephone;
            var ext = data[i].ext;
            var internalNote = data[i].internalNote;
            var taxID = data[i].taxID;
            var deleteStatus = data[i].deleteStatus;
            if(factoringCompanyname !="" && factoringCompanyname !=null)
            {
                factoringCompanyname=factoringCompanyname;
            }
            else
            {
                factoringCompanyname="------";
            }
            if(taxID !="" && taxID !=null)
            {
                taxID=taxID;
            }
            else
            {
                taxID="------";
            }
            if(address !="" && address !=null)
            {
                address=address;
            }
            else
            {
                address="------";
            }
            if(locations !="" && locations !=null)
            {
                locations=locations;
            }
            else
            {
                locations="------";
            }
            if(zip !="" && zip !=null)
            {
                zip=zip;
            }
            else
            {
                zip="------";
            }
            if(primaryContact !="" && primaryContact !=null)
            {
                primaryContact=primaryContact;
            }
            else
            {
                primaryContact="------";
            }
            if(telephones !="" && telephones !=null)
            {
                telephones=telephones;
            }
            else
            {
                telephones="------";
            }
            if(extFactoring !="" && extFactoring !=null)
            {
                extFactoring=extFactoring;
            }
            else
            {
                extFactoring="------";
            }
            if(fax !="" && fax !=null)
            {
                fax=fax;
            }
            else
            {
                fax="------";
            }
            if(tollFree !="" && tollFree !=null)
            {
                tollFree=tollFree;
            }
            else
            {
                tollFree="------";
            }
            if(email !="" && email !=null)
            {
                email=email;
            }
            else
            {
                email="------";
            }
            if(secondaryContact !="" && secondaryContact !=null)
            {
                secondaryContact=secondaryContact;
            }
            else
            {
                secondaryContact="------";
            }
            if(factoringtelephone !="" && factoringtelephone !=null)
            {
                factoringtelephone=factoringtelephone;
            }
            else
            {
                factoringtelephone="------";
            }
            if(ext !="" && ext !=null)
            {
                ext=ext;
            }
            else
            {
                ext="------";
            }
            if(internalNote !="" && internalNote !=null)
            {
                internalNote=internalNote;
            }
            else
            {
                internalNote="------";
            }
            if (data[i].paymentTerms != '' && data[i].paymentTerms != null) {
                var paymentTerms = payment[data[i].paymentTerms];
                var paymentTermsid = data[i].paymentTerms;
            } else {
                var paymentTerms = '------';
                var paymentTermsid = '';
            }
            if (data[i].currencySetting && data[i].currencySetting != null) {
                var currencySetting = currency[data[i].currencySetting];
                var currencySettingid = data[i].currencySetting;
            } else {
                var currencySetting = '------';
                var currencySettingid = '';
            }
           if(deleteStatus =="NO")
           {
                var tr = `<tr>
                <td data-id="${id}"></td>
                <td>${factoringCompanyname} </td>
                <td>${address}</td>
                <td>${locations}</td>
                <td>${zip} </td>
                <td>${primaryContact}</td>
                <td>${telephones}</td>
                <td>${extFactoring}</td>
                <td>${fax}</td>
                <td>${tollFree} </td>
                <td >${email}</td>
                <td>${secondaryContact}</td>
                <td>${factoringtelephone}</td>
                <td> ${ext} </td>
                <td> ${currencySetting} </td>
                <td>${paymentTerms} </td>
                <td>${taxID}</td>
                <td>${internalNote}</td>
                <td>
                <a class='button-23 editFactringCompany'  title='Edit1' data-factId='${id}' data-masterId='${masterID}'><i class='fe fe-edit'></i></a>
                <a class='button-23 deleteFactringCompany'  title='Delete' data-factId='${id}' data-masterId='${masterID}'><i class='fe fe-delete'></i></a>

                </td>`;
                tr += `</tr>`;
                row = tr + row;
           }
            
            }
        }
        $("#factCompTable").html(row);
    }
    // function createFactoringCompanyRows(factoringCompanyResult) 
    // {    
    //     var consigneelen = 0;
    //     if (factoringCompanyResult != null) 
    //     {
    //         $("#paginate").html();
    //         // var items=0;'
    //         var lentData=[];
    //         consigneelen = factoringCompanyResult.FactCompany.length;
    //         if (consigneelen > 0)
    //         {
    //             var no=1; 
    //             for (var j=0;j<consigneelen;j++) 
    //             {  
    //                 var page=j;
    //                 var data= factoringCompanyResult.FactCompany[j];
    //                 $.each(data, function(i, v) { 
    //                     var id =factoringCompanyResult.FactCompany[j][i]._id;
    //                     var factoringCompanyname =factoringCompanyResult.FactCompany[j][i].factoringCompanyname;
    //                     // console.log(factoringCompanyname);
    //                     var address =factoringCompanyResult.FactCompany[j][i].address;
    //                     var location=factoringCompanyResult.FactCompany[j][i].location;
    //                     var zip=factoringCompanyResult.FactCompany[j][i].zip;
    //                     var primaryContact=factoringCompanyResult.FactCompany[j][i].primaryContact;
    //                     var telephone=factoringCompanyResult.FactCompany[j][i].telephone;
    //                     var extFactoring =factoringCompanyResult.FactCompany[j][i].extFactoring;
    //                     var fax =factoringCompanyResult.FactCompany[j][i].fax;
    //                     var tollFree=factoringCompanyResult.FactCompany[j][i].tollFree;
    //                     var ContactEmail=factoringCompanyResult.FactCompany[j][i].email;
    //                     var secondaryContact =factoringCompanyResult.FactCompany[j][i].secondaryContact;
    //                     var factoringtelephone =factoringCompanyResult.FactCompany[j][i].factoringtelephone;
    //                     var ext =factoringCompanyResult.FactCompany[j][i].ext;
    //                     var currencySetting =factoringCompanyResult.FactCompany[j][i].currencySetting;
    //                     var paymentTerms =factoringCompanyResult.FactCompany[j][i].paymentTerms;
    //                     var  taxID=factoringCompanyResult.FactCompany[j][i].taxID;
    //                     var internalNote =factoringCompanyResult.FactCompany[j][i].internalNote;
    //                     var deleteStatus =factoringCompanyResult.FactCompany[j][i].deleteStatus;
    //                     if(factoringCompanyname !="" && factoringCompanyname!= null)
    //                     {
    //                         factoringCompanyname=factoringCompanyname;
    //                     }
    //                     else
    //                     {
    //                         factoringCompanyname="-----";
    //                     }
    //                     if(address !="" && address!= null)
    //                     {
    //                         address=address;
    //                     }
    //                     else
    //                     {
    //                         address="-----";
    //                     }
    //                     if(location !="" && location!= null)
    //                     {
    //                         location=location;
    //                     }
    //                     else
    //                     {
    //                         location="-----";
    //                     }
    //                     if(zip !="" && zip!= null)
    //                     {
    //                         zip=zip;
    //                     }
    //                     else
    //                     {
    //                         zip="-----";
    //                     }
    //                     if(primaryContact !="" && primaryContact!= null)
    //                     {
    //                         primaryContact=primaryContact;
    //                     }
    //                     else
    //                     {
    //                         primaryContact="-----";
    //                     }
    //                     if(telephone !="" && telephone!= null)
    //                     {
    //                         telephone=telephone;
    //                     }
    //                     else
    //                     {
    //                         telephone="-----";
    //                     }
    //                     if(extFactoring !="" && extFactoring!= null)
    //                     {
    //                         extFactoring=extFactoring;
    //                     }
    //                     else
    //                     {
    //                         extFactoring="-----";
    //                     }
    //                     if(fax !="" && fax!= null)
    //                     {
    //                         fax=fax;
    //                     }
    //                     else
    //                     {
    //                         fax="-----";
    //                     }
    //                     if(tollFree !="" && tollFree!= null)
    //                     {
    //                         tollFree=tollFree;
    //                     }
    //                     else
    //                     {
    //                         tollFree="-----";
    //                     }
    //                     if(ContactEmail !="" && ContactEmail!= null)
    //                     {
    //                         ContactEmail=ContactEmail;
    //                     }
    //                     else
    //                     {
    //                         ContactEmail="-----";
    //                     }
    //                     if(secondaryContact !="" && secondaryContact!= null)
    //                     {
    //                         secondaryContact=secondaryContact;
    //                     }
    //                     else
    //                     {
    //                         secondaryContact="-----";
    //                     }
    //                     if(factoringtelephone !="" && factoringtelephone!= null)
    //                     {
    //                         factoringtelephone=factoringtelephone;
    //                     }
    //                     else
    //                     {
    //                         factoringtelephone="-----";
    //                     }
    //                     if(ext !="" && ext!= null)
    //                     {
    //                         ext=ext;
    //                     }
    //                     else
    //                     {
    //                         ext="-----";
    //                     }
    //                     if(currencySetting !="" && currencySetting!= null)
    //                     {
    //                         currencySetting=currencySetting;
    //                     }
    //                     else
    //                     {
    //                         currencySetting="-----";
    //                     }
    //                     if(paymentTerms !="" && paymentTerms!= null)
    //                     {
    //                         paymentTerms=paymentTerms;
    //                     }
    //                     else
    //                     {
    //                         paymentTerms="-----";
    //                     }
    //                     if(taxID !="" && taxID!= null)
    //                     {
    //                         taxID=taxID;
    //                     }
    //                     else
    //                     {
    //                         taxID="-----";
    //                     }
    //                     if(internalNote !="" && internalNote!= null)
    //                     {
    //                         internalNote=internalNote;
    //                     }
    //                     else
    //                     {
    //                         internalNote="-----";
    //                     }
    //                     if(deleteStatus == 'NO' )
    //                     {
                           
    //                         lentData.push(i);
    //                         var factComStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
    //                         //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
    //                             "<td data-field='no'>" + no + "</td>" +
    //                             "<td data-field='factoringCompanyname' >" + factoringCompanyname + "</td>" +
    //                             "<td data-field='address' >" + address + "</td>" +
    //                             "<td data-field='location' >" + location + "</td>" +
    //                             "<td data-field='zip' >" + zip + "</td>" +
    //                             "<td data-field='primaryContact' >" + primaryContact + "</td>" +
    //                             "<td data-field='telephone' >" + telephone + "</td>" +
    //                             "<td data-field='extFactoring' >" + extFactoring + "</td>" +
    //                             "<td data-field='fax' >" + fax + "</td>" +
    //                             "<td data-field='tollFree' >" + tollFree + "</td>" +
    //                             "<td data-field='ContactEmail' >" + ContactEmail + "</td>" +
    //                             "<td data-field='secondaryContact' >" + secondaryContact + "</td>" +
    //                             "<td data-field='factoringtelephone' >" + factoringtelephone + "</td>" +
    //                             "<td data-field='ext' >" + ext + "</td>" +
    //                             "<td data-field='currencySetting' >" + currencySetting + "</td>" +
    //                             "<td data-field='paymentTerms' >" + paymentTerms + "</td>" +
    //                             "<td data-field='taxID' >" + taxID + "</td>" +
    //                             "<td data-field='internalNote' >" + internalNote + "</td>" +
                                
    //                             "<td style='text-align:center'>"+
    //                                 "<a class='button-23 editFactringCompany'  title='Edit1' data-factId='"+id+"'><i class='fe fe-edit'></i></a>&nbsp"+
    //                                 "<a class='button-23 deleteFactringCompany'  title='Delete' data-factId='"+id+"'><i class='fe fe-delete'></i></a>&nbsp"
    //                             "</td></tr>";

    //                         $("#factCompTable").append(factComStr);
    //                         no++;
                           
    //                     } 
                       
    //                 });
                    
    //             }
    //             var items=lentData.length;
    //             Paginator(items);
    //         } 
    //         else 
    //         {
    //             var factComStr = "<tr data-id=" + i + ">" +
    //                 "<td align='center' colspan='4'>No record found.</td>" +
    //                 "</tr>";

    //             $("#factCompTable").append(factComStr);
    //         }
    //     }
         
    // }


    // $("#fact_search").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#factoring_table_pagination td").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    //   });

    
   
    

    //====================== end view =====================================

    //============== start add ===========================================
    $(".addFactoringCompanyDataSubmit").click(function(){
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
        if(factoringCompanyName == "")
        {
            alert( "'Enter Factoring Company Name");
            return false;
        }
        if(factoringCompanyAddress == "")
        {
            alert( "'Enter Factoring Address");
            return false;
        }
        if(factoringCompanyLocation == "")
        {
            alert( "'Enter Factoring Location");
            return false;
        }
        if(factoringCompanyZip == "")
        {
            alert( "'Enter Factoring Zip");
            return false;
        }
        if(factoringCompanycurrency == "")
        {
            alert( "'Enter Factoring Currency");
            return false;
        }
        if(factoringCompanyPaymentTerms == "")
        {
            alert( "'Enter Factoring Payment Terms");
            return false;
        }
        if(factoringCompanyTaxID == "")
        {
            alert( "'Enter Factoring Tax Id");
            return false;
        }
        $.ajax({
            url: base_path+"/admin/factoringCompany",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenaddFactoringCompany").val(),
                factoringCompanyName: factoringCompanyName,
                factoringCompanyAddress: factoringCompanyAddress,
                factoringCompanyLocation: factoringCompanyLocation,
                factoringCompanyZip: factoringCompanyZip,

                factoringCompanyPrimaryContact: factoringCompanyPrimaryContact,
                factoringCompanyPrimaryContactTelephone: factoringCompanyPrimaryContactTelephone,
                factoringCompanyPrimaryContactExt: factoringCompanyPrimaryContactExt,
                factoringCompanyFax: factoringCompanyFax,

                factoringCompanySecondaryContact: factoringCompanySecondaryContact,
                factoringCompanySecondaryContactTelephone: factoringCompanySecondaryContactTelephone,
                factoringCompanySecondaryContactExt: factoringCompanySecondaryContactExt,
                factoringTollFree: factoringTollFree,

                factoringCompanyContactEmail: factoringCompanyContactEmail,
                factoringCompanycurrency: factoringCompanycurrency,
                factoringCompanyPaymentTerms: factoringCompanyPaymentTerms,
                factoringCompanyTaxID: factoringCompanyTaxID,

                factoringCompanyInternalNotes: factoringCompanyInternalNotes,
            },
            cache: false,
            success: function(dataCustomerfactoringCompanyResult){
                console.log(dataCustomerfactoringCompanyResult);
                if(dataCustomerfactoringCompanyResult){
                    swal.fire("Factoring Company added successfully.");
                    $("#addFactoringCompanyModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getFactCompany",
                        success: function(text) {
                            createFactoringCompanyRows(text);
                            factoringCompanyResult = text;
                         }
                    });
                    $('#FacoringCompanyModal').modal('show');
                }else{
                    alert("Factoring Company not added successfully.");
                }
            }
        });
    });
    //============ end store data =======================================

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
            alert( "'Enter Enter Factring Company Name");
            return false;            
        } 
        if(address=='')
        {
            alert( "'Enter Enter Factring address");
            return false;            
        } 
        if(location=='')
        {
            alert( "'Enter Enter Factring location");
            return false;            
        } 
        if(zip=='')
        {
            alert( "'Enter Enter Factring Company Zip");
            return false;            
        }  
        if(currencySetting=='')
        {
            alert( "'Enter Enter currencySetting");
            return false;            
        }  
        if(paymentTerms=='')
        {
            alert( "'Enter Enter paymentTerms");
            return false;            
        }  
        if(taxID=='')
        {
            alert( "'Enter Enter taxID");
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
                                // console.log(text);
                                createFactoringCompanyRows(text);
                                factoringCompanyResult = text;
                            }
                        });
                        $('#FacoringCompanyModal').modal('show');

                    },
                    error: function (resp) {
                        alert("Error!", 'Something went wrong.', "error");
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
        restore
        $('#RestoreFacoringCompanyModal').modal('hide');
    });
    function RestoreFactoringCompanyRows(factoringCompanyResult)
    {
        var consigneelen = 0;
        if (factoringCompanyResult != null) {
            $("#RestorefactCompTable").html('');
            var lentData=[];
            consigneelen = factoringCompanyResult.FactCompany.length;
            if (consigneelen > 0)
            {
                var no=1; 
                for (var j=0;j<consigneelen;j++) 
                {  
                    var page=j;
                    var data= factoringCompanyResult.FactCompany[j];
                    $.each(data, function(i, v) { 
                      
                        var custID=factoringCompanyResult.companyId;
                        var id =factoringCompanyResult.FactCompany[j][i]._id;
                        var factoringCompanyname =factoringCompanyResult.FactCompany[j][i].factoringCompanyname;
                       
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
                        if(factoringCompanyname !="" && factoringCompanyname!= null)
                        {
                            factoringCompanyname=factoringCompanyname;
                        }
                        else
                        {
                            factoringCompanyname="-----";
                        }
                        if(address !="" && address!= null)
                        {
                            address=address;
                        }
                        else
                        {
                            address="-----";
                        }
                        if(location !="" && location!= null)
                        {
                            location=location;
                        }
                        else
                        {
                            location="-----";
                        }
                        if(zip !="" && zip!= null)
                        {
                            zip=zip;
                        }
                        else
                        {
                            zip="-----";
                        }
                        if(primaryContact !="" && primaryContact!= null)
                        {
                            primaryContact=primaryContact;
                        }
                        else
                        {
                            primaryContact="-----";
                        }
                        if(telephone !="" && telephone!= null)
                        {
                            telephone=telephone;
                        }
                        else
                        {
                            telephone="-----";
                        }
                        if(extFactoring !="" && extFactoring!= null)
                        {
                            extFactoring=extFactoring;
                        }
                        else
                        {
                            extFactoring="-----";
                        }
                        if(fax !="" && fax!= null)
                        {
                            fax=fax;
                        }
                        else
                        {
                            fax="-----";
                        }
                        if(tollFree !="" && tollFree!= null)
                        {
                            tollFree=tollFree;
                        }
                        else
                        {
                            tollFree="-----";
                        }
                        if(ContactEmail !="" && ContactEmail!= null)
                        {
                            ContactEmail=ContactEmail;
                        }
                        else
                        {
                            ContactEmail="-----";
                        }
                        if(secondaryContact !="" && secondaryContact!= null)
                        {
                            secondaryContact=secondaryContact;
                        }
                        else
                        {
                            secondaryContact="-----";
                        }
                        if(factoringtelephone !="" && factoringtelephone!= null)
                        {
                            factoringtelephone=factoringtelephone;
                        }
                        else
                        {
                            factoringtelephone="-----";
                        }
                        if(ext !="" && ext!= null)
                        {
                            ext=ext;
                        }
                        else
                        {
                            ext="-----";
                        }
                        if(currencySetting !="" && currencySetting!= null)
                        {
                            currencySetting=currencySetting;
                        }
                        else
                        {
                            currencySetting="-----";
                        }
                        if(paymentTerms !="" && paymentTerms!= null)
                        {
                            paymentTerms=paymentTerms;
                        }
                        else
                        {
                            paymentTerms="-----";
                        }
                        if(taxID !="" && taxID!= null)
                        {
                            taxID=taxID;
                        }
                        else
                        {
                            taxID="-----";
                        }
                        if(internalNote !="" && internalNote!= null)
                        {
                            internalNote=internalNote;
                        }
                        else
                        {
                            internalNote="-----";
                        }
                
                        if(deleteStatus == 'YES' )
                        {

                            // console.log(factoringCompanyname);
                            lentData.push(i);
                            // console.log(lentData);
                            var factComStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                            //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                            "<td data-field='no'><input type='checkbox' class='check_FactrCom_one' name='checkedFactComp_ids[]' data-id=" + id + " date-cusId=" + custID + "  value=" + id + "></td>" +
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
                            "<td data-field='internalNote' >" + internalNote + "</td></tr>";

                            $("#RestorefactCompTable").append(factComStr);
                            no++;
                        } 
                    });
                }
                var items=lentData.length;
                RestorePaginator(items);
            }
        }
        else {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";

            $("#RestorefactCompTable").append(tr_str1);
        }
    }
    function RestorePaginator(items) 
    {

        $('#restore_factoringCompanyTable').after ('<div id="nav"></div>');  
        var rowsShown = 10;  
        var rowsTotal = items;  
        var numPages = rowsTotal/rowsShown;
        numPages= ~~numPages;
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1;  
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#restore_factoringCompanyTable tbody tr').hide();  
        $('#restore_factoringCompanyTable tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
        $('#nav a').removeClass('active');  
       $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#restore_factoringCompanyTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);   
        }); 
    } 
    function restoreremovePagi()
    {
        $('#nav').remove();
        var startItem=0;
        var endItem=10;
        $('#restore_factoringCompanyTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300); 
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
                        // console.log(text);
                        createFactoringCompanyRows(text);
                        factoringCompanyResult = text;
                    }
                });
            }
        });
    });
    //============== end restore data ====================================
