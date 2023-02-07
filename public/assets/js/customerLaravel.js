var base_path = $("#url").val();
$(document).ready(function() {
    
    $('.plusCurrencyModalCloseButton').click(function(){
        $("#plusCurrencyModal").modal("hide");
    });
    $('.closeCustomer').click(function(){
        $("#customerModal").modal("hide");
    });

    // <!-- -------------------------------------------------------------------------Get customer ------------------------------------------------------------------------- -->  
    $('#customer_navbar').click(function(){
        //alert('customer');
        var customerResponse = '';
        $.ajax({
            type: "GET",
            url: base_path+"/admin/customer",
            async: false,
            //dataType:JSON,
            success: function(customerResult) {
                //console.log(customerResult);
                createcustomerRows(customerResult);
                customerResponse = customerResult;
            }
        });
        $("#customerModal").modal("show");
    }); 


    function createcustomerRows(customerResponse) {

    // var edit=$('#updateUser').val();
    // var delet =$('#deleteUser').val();
    // // alert(edit);
    // // alert(delet);

    // if(edit == 1){
    //    var editPrivilege=''; 
    // }else{
    //     var editPrivilege='privilege';
    // }
    // if(delet == 1){
    //     var delPrivilege=''; 
    //  }else{
    //      var delPrivilege='privilege';
    //  }

        // console.log(customerResponse);
        var custlen1 = 0;
        
        $('#customerTable').empty(); // Empty <tbody>
        // if (customerResponse != null) {
        //     custlen1 = customerResponse.length;
        //     //len1 = sizeof($driverResponse);
        // }

        //if (custlen1 > 0) {
           var no=1;
                //for (var i = 0; i < custlen1; i++) {  
                var custlen2=customerResponse.customer.length; 
                    //if(custlen2 > 0){
                        for (var j = custlen2-1; j >= 0; j--) {
                        // var counter = driverResponse[i].counter;
                        // var no = driverResponse[i]._id;
                        var companyID =customerResponse.companyID;
                        //var driverId=customerResponse[i].customer[j]._id;
                        var customerId=customerResponse.customer[j]._id;
                        var custName = customerResponse.customer[j].custName;
                        var custLocation = customerResponse.customer[j].custLocation;
                        var custZip = customerResponse.customer[j].custZip;
                        var custPrimaryContact = customerResponse.customer[j].primaryContact;
                        var custTelephone = customerResponse.customer[j].custTelephone;
                        var custEmail = customerResponse.customer[j].custEmail;
                        var delete_status = customerResponse.customer[j].deleteStatus;
                        if(delete_status=="NO"){
                            var customerStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                            //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='customerName' >" + custName + "</td>" +
                                "<td data-field='customerLocation'>" + custLocation + "</td>" +
                                "<td data-field='customerZip'>" + custZip + "</td>" +
                                "<td data-field='customerPrimaryContacte'>" + custPrimaryContact + "</td>" +
                                "<td data-field='customerTelephone'>" + custTelephone + "</td>" +
                                "<td data-field='customerEmail'>" + custEmail + "</td>" +

                                // "<td style='width: 100px'><a class='btn btn-primary fs-14 text-white edit-icn' title='Edit' id='edit'><i class='fe fe-edit' ></i></a></td></tr>"
                                // "<td style='width: 100px'><i class='btn btn-primary fe fe-edit customerEdit' data-id=" + custComid+ "&"+custEmail + "> </i><a class=' btn btn-danger fs-14 text-white customerDelete-icn' data-id=" + custComid+ "&"+custEmail + " title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
                                // "<td style='width: 100px'><i class='button-29 fe fe-edit customerEdit' data-id=" + customerId+ " date-cusId="+companyID+" data-email="+custEmail +"> </i>&nbsp; &nbsp; <a class=' button-29 fs-14 text-white customerDelete' data-id=" + customerId+ " date-cusId="+companyID+"  data-email="+custEmail +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
                               // "<td style='width: 100px'><i class='button-29 fe fe-edit customerEdit "+editPrivilege+"' data-id=" + customerId+ " date-cusId="+companyID+" data-email="+custEmail +"> </i>&nbsp; &nbsp; <a class='"+delPrivilege+" button-29 fs-14 text-white customerDelete' data-id=" + customerId+ " date-cusId="+companyID+"  data-email="+custEmail +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
                                
                                "<td style='width: 100px'>"+
                                " <a class='button-23 customerEdit "+editPrivilege+"' data-id=" + customerId+ " date-cusId="+companyID+" data-email="+custEmail +" title='Edit' ><i class='fe fe-edit'></i>"+
                                "</a> <a class='customerDelete button-23 "+delPrivilege+"'  data-id=" + customerId+ "   date-cusId="+companyID+"  data-email="+custEmail +" title='Delete'><i class='fe fe-delete'></i></a>"+
                                "</td></tr>";

                                
                               
                                $("#customerTable").append(customerStr);
                            no++;
                        }
                    //} 
                //}
            }
        // } else {
        //     var customerStr = "<tr data-id=" + i + ">" +
        //         "<td align='center' colspan='4'>No record found.</td>" +
        //         "</tr>";

        //     $("#customerTable").append(customerStr);
        // }

    }
    // <!-- -------------------------------------------------------------------------Get customer over ------------------------------------------------------------------------- -->  
    // function customerValidation(customerResponse) {
    //     var customerName= $('#customerName1').val();
    //     var customerAddress= $('#customerAddress').val();
    //     var customerLocation= $('#customerLocation').val();
    //     var customerZip= $('#customerZip').val();

    //     if(customerName == ''){
    //         alert("Please Enter Name");
    //         $('#customerName').focus();
    //         return false;
    //     }
    //     if(customerAddress == ''){
    //         alert("Please Enter Name");
    //         $('#customerAddress').focus();
    //         return false;
    //     }
    //     if(customerLocation == ''){
    //         alert("Please Enter Name");
    //         $('#customerLocation').focus();
    //         return false;
    //     }
    //     if(customerZip == ''){
    //         alert("Please Enter Name");
    //         $('#customerZip').focus();
    //         return false;
    //     }
    // }

    $('.advanceTabCustomer').click(function(){
       
        var customerName= $('#customerName1').val();
        var customerAddress= $('#customerAddress').val();
        var customerLocation= $('#customerLocation').val();
        var customerZip= $('#customerZip').val();

        if(customerName == ''){
            swal.fire("", "Please Enter Name", "",);
            $('#customerName1').focus();
            return false;
        }
        if(customerAddress == ''){
            swal.fire("", "Please Enter Address", "");
            $('#customerAddress').focus();
            return false;
        }
        if(customerLocation == ''){
            swal.fire("", "Please Enter Location", "");
            $('#customerLocation').focus();
            return false;
        }
        if(customerZip == ''){
            swal.fire("", "Please Enter Zip", "");
            $('#customerZip').focus();
            return false;
        }
    });

    // <!-- -------------------------------------------------------------------------add customer  ------------------------------------------------------------------------- -->  
   
    // $(".addCustomerButton").click(function(){
    //     $("#addCustomerTab").show();
    // });
       
        // $('#customerDataSubmit').click(customerValidation);
        $(".addCustomerButton").click(function(){
            $("#addCustomerModal").modal("show");
        });
        $(".closeaddCustomerModal").click(function(){
            $("#addCustomerModal").modal("hide");
        });
        $(".customerDataSubmit").click(function(){

            // if($("#customerBillingAddressChkbox-1").prop('checked') == true){
            //     alert("checked");
            // }else{
            //     alert("not");
            // }
            var customerName= $('#customerName1').val();
            var customerAddress= $('#customerAddress').val();
            var customerLocation= $('#customerLocation').val();
            var customerZip= $('#customerZip').val();

            var customerBillingAddressChkbox= $('#customerBillingAddressChkbox').val();


        //  var customerBillingAddress= $('#customerBillingAddress').val();
            var customerBillingLocation= $('#customerBillingLocation').val();
            var customerBillingZip= $('#customerBillingZip').val();
            var customerPrimaryContact= $('#customerPrimaryContact').val();
            var customerTelephone= $('#customerTelephone').val();
            var customerExt= $('#customerExt').val();
            var customerEmail= $('#customerEmail').val();
            var customerFax= $('#customerFax').val();
            var customerBillingContact= $('#customerBillingContact').val();
            var customerBillingEmail= $('#customerBillingEmail').val();
            var customerBillingTelephone= $('#customerBillingTelephone').val();
            var customerBillingExt= $('#customerBillingExt').val();
            var customerUrs= $('#customerUrs').val();
            var customerMc= $('#customerMc').val();

            var customerBlacklisted= $('#customerBlacklisted').val();
            var customerIsBroker= $('#customerIsBroker').val();
            var customerDuplicateShipper= $('#customerDuplicateShipper').val();
            var customerDuplicateConsignee= $('#customerDuplicateConsignee').val();

            var customerCurrency= $('#customerCurrency').val();
            var customerPaymentTerm= $('#customerPaymentTerm').val();
            var customerCreditLimit= $('#customerCreditLimit').val();
            var customerSalesRepresentative= $('#customerSalesRepresentative').val();
            var customerFactoringCompanyname= $('#customerFactoringCompanyname').val();
            var customerFederalID= $('#customerFederalID').val();
            var customerWorkerComp= $('#customerWorkerComp').val();
            var customerWebsiteURL= $('#customerWebsiteURL').val();
            var customerNumbersonInvoice= $('#customerNumbersonInvoice').val();
            var customerCustomerRate= $('#customerCustomerRate').val();
            var customerInternalNotes= $('#customerInternalNotes').val();
          
            if(customerName == ''){
                alert("Please Enter Name");
                $('#customerName1').focus();
                return false;
            }
            if(customerAddress == ''){
                alert("Please Enter Name");
                $('#customerAddress').focus();
                return false;
            }
            if(customerLocation == ''){
                alert("Please Enter Name");
                $('#customerLocation').focus();
                return false;
            }
            if(customerZip == ''){
                alert("Please Enter Name");
                $('#customerZip').focus();
                return false;
            }

            var formData = new FormData();
            formData.append('_token',$("#_tokenCustomer").val());
             formData.append(' customerName', customerName);
             formData.append(' customerAddress', customerAddress);
             formData.append(' customerLocation', customerLocation);
             formData.append(' customerZip', customerZip);
             formData.append(' customerBillingAddressChkbox', customerBillingAddressChkbox);
             formData.append(' customerBillingLocation', customerBillingLocation);
             formData.append(' customerBillingLocation', customerBillingLocation);
             formData.append(' customerBillingZip', customerBillingZip);
             formData.append(' customerPrimaryContact', customerPrimaryContact);
             formData.append(' customerTelephone', customerTelephone);
             formData.append(' customerExt', customerExt);
             formData.append(' customerEmail', customerEmail);
             formData.append(' customerFax', customerFax);
             formData.append(' customerBillingContact', customerBillingContact);
             formData.append(' customerBillingEmail', customerBillingEmail);
             formData.append(' customerBillingTelephone', customerBillingTelephone);
             formData.append(' customerBillingExt', customerBillingExt);
             formData.append(' customerUrs', customerUrs);
             formData.append(' customerMc', customerMc);
             formData.append(' customerBlacklisted', customerBlacklisted);
             formData.append(' customerIsBroker', customerIsBroker);
             formData.append(' customerDuplicateShipper', customerDuplicateShipper);
             formData.append(' customerDuplicateConsignee', customerDuplicateConsignee);

             formData.append(' customerCurrency', customerCurrency);
             formData.append(' customerPaymentTerm', customerPaymentTerm);
             formData.append(' customerCreditLimit', customerCreditLimit);
             formData.append(' customerSalesRepresentative', customerSalesRepresentative);
             formData.append(' customerFactoringCompanyname', customerFactoringCompanyname);
             formData.append(' customerFederalID', customerFederalID);
             formData.append(' customerWorkerComp', customerWorkerComp);
             formData.append(' customerWebsiteURL', customerWebsiteURL);
             formData.append(' customerNumbersonInvoice', customerNumbersonInvoice); 
             formData.append(' customerCustomerRate', customerCustomerRate);
             formData.append(' customerInternalNotes', customerInternalNotes);
             $.ajax({
                type: "POST",
                url: base_path+"/admin/addCustomer",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success: function(dataCustomerResult) {                   
                    swal.fire("Done!", "Customer added successfully", "success");
                    $("#addCustomerModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/customer",
                        async: false,
                        //dataType:JSON,
                        success: function(customerResult) {
                            //console.log(customerResult);
                            createcustomerRows(customerResult);
                            customerResponse = customerResult;
                        }
                    });
                }
            });
        });
    // <!-- -------------------------------------------------------------------------get customer currency ------------------------------------------------------------------------- -->  
   // $('.list select').selectpicker();   
    $('.customerCurrencySet').focus(function(){
           //alert(); 
            $.ajax({
                type: "GET",
                url: base_path+"/admin/customerCurrency",
                async: false,
                //dataType:JSON,
                success: function(customerCurrencyResult) {                    
                    createcustomerCurrencyList(customerCurrencyResult);
                    customerCurrencyResponse = customerCurrencyResult;
                }
            });
    });

        function createcustomerCurrencyList(customerCurrencyResponse) {           
            var customerCurrencyLength = 0;    
            
            if (customerCurrencyResponse != null) {
                customerCurrencyLength = customerCurrencyResponse.currency.length;
            }
    
            if (customerCurrencyLength > 0) {
               // var no=1;
                $(".customerCurrencySet").html('');
                $(".currencyList").html('');
                for (var i = 0; i < customerCurrencyLength; i++) {  
                    var currency =customerCurrencyResponse.currency[i].currencyType;
                    //var customerCurrency = "<option id='customerCurrency' value='"+ currency +"'>"+ currency +"</option>"
                    //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";                  

                   var customerCurrencyList = "<option id='customerCurrency'  value='"+ currency +"'>"                   
                   $(".customerCurrencySet").append(customerCurrencyList);
                   //<option value="Edge">
                    //no++;
    
                }
            }
            
        }
    //     // <!-- -------------------------------------------------------------------------over get customer currency ------------------------------------------------------------------------- -->
    // <!-- ------------------------------------------------------------------------- add customer currency ------------------------------------------------------------------------- -->
    $("#plusCurrency").click(function(){
        $("#plusCurrencyModal").modal("show");
    });
    $("#plusCurrency2").click(function(){
        // alert('modal');
        $("#plusCurrencyModal").modal("show");
    });

        

    $("#closeCurrencyModal").click(function(){
        $("#plusCurrencyModal").modal("hide");
    });

        // $(".CurrencyrDataSubmit").click(function(){
        //     var currencyName=$('#CurrencyrName').val();
        //    //alert(currencyName);
        //     $.ajax({
        //         url: base_path+"/admin/addCurrency",
        //         type: "POST",
        //         datatype:"JSON",
        //         data: {
        //             _token: $("#_tokenCustomerCurrency").val(),
        //             currencyName: currencyName,
        //         },
        //         cache: false,
        //         success: function(dataCustomerCurrencyResult){
        //             console.log(dataCustomerCurrencyResult);
        //             if(dataCustomerCurrencyResult){
        //                 swal.fire("Done!", "Currency added successfully", "success");
        //                 // alert("Currency added successfully.");
        //                 $("#plusCurrencyModal").modal("hide");
        //                 $.ajax({
        //                     type: "GET",
        //                     url: base_path+"/admin/getCurrency",
        //                     success: function(text) {
        //                         createGetCurrencyRows(text);
        //                         currencyResult = text;
        //                     }
        //                 });	
        //             }else{
        //                 swal.fire("Try Again!", "Currency not added successfully", "error");
        //                 // alert("Currency not added successfully.");
        //             }
        //         }
        //     });
        // });
        //});

    // <!-- -------------------------------------------------------------------------over add customer currency ------------------------------------------------------------------------- -->
    
        // <!-- -------------------------------------------------------------------------get customer payment terms ------------------------------------------------------------------------- -->  
  
    $('.customerPaymentTermSet').focus(function(){
        //alert(); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getCustomerPaymentTerms",
            async: false,
            //dataType:JSON,
            success: function(customerPaymentTermsResult) {
                //console.log(customerCurrencyResult);
                createcustomerPaymentTermsList(customerPaymentTermsResult);
                customerPaymentTermsResponse = customerPaymentTermsResult;
            }
        });
    });

    function createcustomerPaymentTermsList(customerPaymentTermsResponse) {
        // $('.customerCurrencySet').empty();
        //console.log(customerCurrencyResponse);
        var customerCurrencyLength = 0;

        //$('.customerCurrencySet').empty(); // Empty 
        if (customerPaymentTermsResponse != null) {
            customerPaymentTermsLength = customerPaymentTermsResponse.payment.length;
            //alert(customerPaymentTermsLength);
        }

        if (customerPaymentTermsLength > 0) {
            var no=1;
            $(".customerPaymentTermSet").html('');
            for (var i = 0; i < customerPaymentTermsLength; i++) {  
                var paymentTerm =customerPaymentTermsResponse.payment[i].paymentTerm;
                var customerPaymentTerm = "<option id='customerPaymentTerm' value='"+ paymentTerm +"'>"+ paymentTerm +"</option>"
                //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";

                $(".customerPaymentTermSet").append(customerPaymentTerm);
                // $(".customerCurrencySet").html(customerCurrency);
            
                no++;

            }
        }
        
    }
    // <!-- -------------------------------------------------------------------------over get customer  payment terms ------------------------------------------------------------------------- -->  

    
    //<!-- ------------------------------------------------------------------------- add customer PaymentTerms ------------------------------------------------------------------------- -->
    $("#plusPaymentTerms").click(function(){
        $("#PaymentTermsModal").modal("show");
    });
    $("#plusPaymentTerms2").click(function(){
        $("#PaymentTermsModal").modal("show");
    });

    $("#closePaymentTermsModal").click(function(){
        $('#PaymentTermsModal2').modal('show');
        $("#PaymentTermsModal").modal("hide");
    });

    $(".PaymentTermsDataSubmit").click(function(){
        var PaymentTermsName=$('#PaymentTermsName').val();
        var NetDay=$('#NetDay').val();

        if(PaymentTermsName == ''){
            swal.fire("Enter Payment Terms");
            $('#PaymentTermsName').focus();
            return false
        }
        if(NetDay == 0){
            swal.fire("Enter Payment Terms");
            $('#NetDay').focus();
            return false
        }
    //    alert(NetDay);
        $.ajax({
            url: base_path+"/admin/PaymentTerms",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenCustomerPaymentTerms").val(),
                PaymentTermsName: PaymentTermsName,
                NetDay: NetDay,
            },
            cache: false,
            success: function(dataCustomerPaymentTermsNameResult){
                console.log(dataCustomerPaymentTermsNameResult);
                if(dataCustomerPaymentTermsNameResult){
                    swal.fire("Payment Terms added successfully.");
                    $("#PaymentTermsModal").modal("hide");
                }else{
                    swal.fire("Payment Terms not added successfully.");
                }
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getPaymentTerms",
                    async: false,
                    success: function(text) {
                        // console.log(text);
                        createPaymentTermsRows(text);
                        }
                });
                $('#PaymentTermsModal2').modal('show');
            }
        });
    });
        //});
    function createPaymentTermsRows(Result) {
        var len1 = 0;
        var no=1;
            if (Result != null) {
                $("#PaymentTermsTable").html('');
                len1 = Result.PaymentTterms.length;
                if (len1 > 0) {
                    for (var i = len1-1; i >= 0; i--) { 
                        
                        len2 = Result.PaymentTterms[i].payment.length;
                        var Id =Result.PaymentTterms[i]._id;
                        var com_Id =Result.PaymentTterms[i].companyID;

                        if (len2 > 0) {
                            for (var j = len2-1; j >= 0; j--) {

                                var payment_id =Result.PaymentTterms[i].payment[j]._id;
                                var paymentTerm =Result.PaymentTterms[i].payment[j].paymentTerm;
                                var paymentDays =Result.PaymentTterms[i].payment[j].paymentDays;
                                if(!paymentDays){
                                    var paymentDays ='';
                                }
                                var deleteStatus =Result.PaymentTterms[i].payment[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var PaymentTermsStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='no' style='display:none;'>" + no + "</td>" +
                                        "<td data-field='paymentTerm'>" + paymentTerm + "</td>" +
                                        "<td data-field='paymentDays'>" + paymentDays + "</td>" +
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23 "+editPrivilege+" editPayTerms'  title='Edit1' data-Id='"+payment_id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deletePayTerms button-23 "+delPrivilege+"' title='Delete' data-Id='"+payment_id+"' data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
                                        "</td></tr>";
            
                                    $("#PaymentTermsTable").append(PaymentTermsStr);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                            var PaymentTermsStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#PaymentTermsTable").append(PaymentTermsStr);
                }
            
            }else {
            var PaymentTermsStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#PaymentTermsTable").append(PaymentTermsStr);
        }
    }
    // <!-- -------------------------------------------------------------------------over add PaymentTerms ------------------------------------------------------------------------- -->
    // <!-- -------------------------------------------------------------------------get customer Factoring Company ------------------------------------------------------------------------- -->  
  
    $('.customerBFactoringCompanySet').focus(function(){
        //alert(); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getCustomerBFactoringCompany",
            async: false,
            //dataType:JSON,
            success: function(customerBFactoringCompanyResult) {
                //console.log(customerCurrencyResult);
                createCustomerBFactoringCompanyList(customerBFactoringCompanyResult);
                customerBFactoringCompanyResponse = customerBFactoringCompanyResult;
            }
        });
    });

    function createCustomerBFactoringCompanyList(customerBFactoringCompanyResponse) {    
        if (customerBFactoringCompanyResponse != null) {
            customerBFactoringCompanyLength = customerBFactoringCompanyResponse.factoring.length;         
        }

        if (customerBFactoringCompanyLength > 0) {
            $(".customerBFactoringCompanySet").html('');
            for (var i = 0; i < customerBFactoringCompanyLength; i++) {  
                var factoringCompanyname =customerBFactoringCompanyResponse.factoring[i].factoringCompanyname;
                var factoringCompanyId =customerBFactoringCompanyResponse.factoring[i]._id;
                var customerFactoringCompanyname = "<option id='customerFactoringCompanyname' value='"+ factoringCompanyId +"'>"+ factoringCompanyname +"</option>"
                //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";

                $(".customerBFactoringCompanySet").append(customerFactoringCompanyname);
                // $(".customerCurrencySet").html(customerCurrency);
            
            

            }
        }
        
    }
    // <!-- -------------------------------------------------------------------------over get customer  Factoring Company ------------------------------------------------------------------------- -->   
    //<!-- ------------------------------------------------------------------------- add customer factoringCompany ------------------------------------------------------------------------- -->
    $("#plusFactoringCompany").click(function(){
        $("#factoringCompanyModal").modal("show");
    });

    $("#closefactoringCompanyModal").click(function(){
        $("#factoringCompanyModal").modal("hide");
    });

    $(".factoringCompanyDataSubmit").click(function(){
        //alert();
        var factoringCompanyName=$('#factoringCompanyName').val();
        var factoringCompanyAddress=$('#factoringCompanyAddress').val();
        var factoringCompanyLocation=$('#factoringCompanyLocation').val();
        var factoringCompanyZip=$('#factoringCompanyZip').val();

        var factoringCompanyPrimaryContact=$('#factoringCompanyPrimaryContact').val();
        var factoringCompanyPrimaryContactTelephone=$('#factoringCompanyPrimaryContactTelephone').val();
        var factoringCompanyPrimaryContactExt=$('#factoringCompanyPrimaryContactExt').val();
        var factoringCompanyFax=$('#factoringCompanyFax').val();

        var factoringCompanySecondaryContact=$('#factoringCompanySecondaryContact').val();
        var factoringCompanySecondaryContactTelephone=$('#factoringCompanySecondaryContactTelephone').val();
        var factoringCompanySecondaryContactExt=$('#factoringCompanySecondaryContactExt').val();
        var factoringTollFree=$('#factoringTollFree').val();

        var factoringCompanyContactEmail=$('#factoringCompanyContactEmail').val();
        var factoringCompanycurrency=$('#currency1').val();
        var factoringCompanyPaymentTerms=$('#PaymentTerms1').val();
        var factoringCompanyTaxID=$('#factoringCompanyTaxID1').val();

        var factoringCompanyInternalNotes=$('#factoringCompanyInternalNotes').val();

    //alert(currencyName);
        $.ajax({
            url: base_path+"/admin/factoringCompany",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenCustomerFactoringCompany").val(),
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
                    $("#factoringCompanyModal").modal("hide");
                }else{
                    swal.fire("Factoring Company not added successfully.");
                }
            }
        });
    });

    // <!-- -------------------------------------------------------------------------over add customer factoringCompany ------------------------------------------------------------------------- -->   

    // <!-- -------------------------------------------------------------------------add customer over ------------------------------------------------------------------------- -->  
    //show_add_customer
    $("body").on('click','.addCustomerButton',function(){
        $("body .add_customer_btn").click();
    });

    $('#customerBillingAddressChkbox').click(function(){
        if($(this).prop("checked") == true){
            $("#customerBillingAddress").val($("#customerAddress").val());
            $("#customerBillingLocation").val($("#customerLocation").val());
            $("#customerBillingZip").val($("#customerZip").val());
        }
        else if($(this).prop("checked") == false){
            $("#customerBillingAddress").val('');
            $("#customerBillingLocation").val('');
            $("#customerBillingZip").val('');
        }
    });
    $('#updateCustomerBillingAddressChkbox').click(function(){
        if($(this).prop("checked") == true){
            $("#updateCustomerBillingAddress").val($("#updateCustomerAddress").val());
            $("#updateCustomerBillingLocation").val($("#updateCustomerLocation").val());
            $("#updateCustomerBillingZip").val($("#updateCustomerZip").val());
        }
        else if($(this).prop("checked") == false){
            $("#updateCustomerBillingAddress").val('');
            $("#updateCustomerBillingLocation").val('');
            $("#updateCustomerBillingZip").val('');
        }
    });
    $('#customerBlacklisted').click(function(){
        if($(this).prop("checked") == true){
            $("#customerBlacklisted").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#customerBlacklisted").val('off');
          
        }
    });
    $(".MC").hide();
    $('#customerIsBroker').click(function(){
        if($(this).prop("checked") == true){
            $("#customerIsBroker").val('on');
            $(".MC").show();
           
        }
        else if($(this).prop("checked") == false){
            $("#customerIsBroker").val('off');
            $(".MC").hide();
          
        }
    });
    $('#customerDuplicateShipper').click(function(){
        if($(this).prop("checked") == true){
            $("#customerDuplicateShipper").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#customerDuplicateShipper").val('off');
          
        }
    });
    $('#customerDuplicateConsignee').click(function(){
        if($(this).prop("checked") == true){
            $("#customerDuplicateConsignee").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#customerDuplicateConsignee").val('off');
          
        }
    });
    $('#customerNumbersonInvoice').click(function(){
        if($(this).prop("checked") == true){
            $("#customerNumbersonInvoice").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#customerNumbersonInvoice").val('off');
          
        }
    });
    $('#customerCustomerRate').click(function(){
        if($(this).prop("checked") == true){
            $("#customerCustomerRate").val('on');
           
        }
        else if($(this).prop("checked") == false){
            $("#customerCustomerRate").val('off');
          
        }
    });
    // <!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->  


    // =============== start update customer show model ====================

    $(".closeUpdateCustomerModel").click(function(){
        $("#updateCustomerModal").modal("hide");
    })
    $('body').on('click','.customerEdit',function(){   
        $(".update_customer_first_tap").show();
        $(".update_advance_first_tap").hide();
        // createcustomerPaymentTermsList()
        var id=$(this).attr("data-id");
        var email=$(this).attr("data-email");
        var custID=$(this).attr("date-cusId");
        // alert(id);
        $.ajax({
            type:'get',
            url:base_path+"/admin/edit_customer",
            data:{id:id,email:email,custID:custID},
            // dataType:JSON,
            async: false,
            success:function(response){
                $("#updateCustomer_id").val(response.customer._id);
            $("#updateCustomerName").val(response.customer.custName);
            $("#updateCustomerAddress").val(response.customer.custAddress);
            $("#updateCustomerLocation").val(response.customer.custLocation);
            $("#updateCustomerZip").val(response.customer.custZip);
            //    $("#updateCustomerBillingAddressChkbox").val(response.customer.billingAddress);
            $("#updateCustomerBillingAddress").val(response.customer.billingAddress);
            $("#updateCustomerBillingLocation").val(response.customer.billingLocation);
            $("#updateCustomerBillingZip").val(response.customer.billingZip);
            $("#updateCustomerPrimaryContact").val(response.customer.primaryContact);
            $("#updateCustomerTelephone").val(response.customer.custTelephone);
            $("#updateCustomerExt").val(response.customer.custExt);
            $("#updateCustomerEmail").val(response.customer.custEmail);
            $("#updateCustomerFax").val(response.customer.custFax);
            $("#updateCustomerBillingContact").val(response.customer.billingContact);
            $("#updateCustomerBillingEmail").val(response.customer.billingEmail);
            $("#updateCustomerBillingTelephone").val(response.customer.billingTelephone);
            $("#updateCustomerBillingExt").val(response.customer.billingExt);
            $("#updateCustomerUrs").val(response.customer.URS);
            $("#updateCustomerMc").val(response.customer.MC);
            //    alert(response.customer.blacklisted);
                $(".updateCustomerMc").hide();
                $("#updateCustomerIsBroker").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerIsBroker").val("on");
                        $(".updateCustomerMc").show();
                    }
                    else
                    {
                        $("#updateCustomerIsBroker").val("off");
                        $(".updateCustomerMc").hide();
                    }
                });
                $("#updateCustomerDuplicateShipper").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerDuplicateShipper").val("on");
                    }
                    else
                    {
                        $("#updateCustomerDuplicateShipper").val("off");
                    }
                });
                
                $("#updateCstomerDuplicateConsignee").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCstomerDuplicateConsignee").val("on");
                    }
                    else
                    {
                        $("#updateCstomerDuplicateConsignee").val("off");
                    }
                });
                $("#updateCustomerBlacklisted").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerBlacklisted").val("on");
                    }
                    else
                    {
                        $("#updateCustomerBlacklisted").val("off");
                    }
                });
                
                $("#updateCustomerBillingAddressChkbox").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerBillingAddressChkbox").val("on");
                    }
                    else
                    {
                        $("#updateCustomerBillingAddressChkbox").val("off");
                    }
                });
                $("#updateCustomerNumbersonInvoice").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerNumbersonInvoice").val("on");
                    }
                    else
                    {
                        $("#updateCustomerNumbersonInvoice").val("off");
                    }
                });
                $("#updateCustomerCustomerRate").change(function(){
                    if ($(this).is(':checked'))
                    {
                        $("#updateCustomerCustomerRate").val("on");
                    }
                    else
                    {
                        $("#updateCustomerCustomerRate").val("off");
                    }
                });
                // if($("#updateCustomerIsBroker").is(':checked'))
                // {
                //     $(".updateCustomerMc").show();
                // }
                // else
                // {
                //     $(".updateCustomerMc").hide();
                // }
            if(response.customer.blacklisted=="on")
            {
                    $("#updateCustomerBlacklisted").attr('checked',true);
            }
            else
            {
                    $("#updateCustomerBlacklisted").attr('checked',false);
            }
            if(response.customer.isBroker=="on")
            {
                    $("#updateCustomerIsBroker").attr('checked',true);
            }
            else
            {
                    $("#updateCustomerIsBroker").attr('checked',false);
            }
            if(response.customer.numberOninvoice=="on")
            {
                    $("#updateCustomerNumbersonInvoice").attr('checked',true);
            }
            else
            {
                    $("#updateCustomerNumbersonInvoice").attr('checked',false);
            }
            if(response.customer.customerRate=="on")
            {
                    $("#updateCustomerCustomerRate").attr('checked',true);
            }
            else
            {
                    $("#updateCustomerCustomerRate").attr('checked',false);
            }
            if(response.customer.DuplicateShipper=="on")
            {
                    $("#updateCustomerDuplicateShipper").attr('checked',true);
            }
            else
            {
                    $("#updateCustomerDuplicateShipper").attr('checked',false);
            }
            if(response.customer.DuplicateConsignee=="on")
            {
                    $("#updateCstomerDuplicateConsignee").attr('checked',true);
            }
            else
            {
                    $("#updateCstomerDuplicateConsignee").attr('checked',false);
            }
            $("#updateCustomerIsBroker").val(response.customer.isBroker);
            $("#updateCustomerDuplicateShipper").val(response.customer.numberOninvoice);
            $("#updateCstomerDuplicateConsignee").val(response.customer.customerRate);
            $("#updatecurrency").val(response.customer.currencySetting);
            $(".Update_customer_terms").val(response.customer.paymentTerms);
            $("#updateCustomerCreditLimit").val(response.customer.creditLimit);
            $("#updateCustomerSalesRepresentative").val(response.customer.salesRep);
            $(".update_factroring_name").val(response.customer.factoringCompany);
            $("#updateCustomerFederalID").val(response.customer.federalID);
            $("#updateCustomerWorkerComp").val(response.customer.workerComp);
            $("#updateCustomerWebsiteURL").val(response.customer.websiteURL);
            $("#updateCustomerNumbersonInvoice").val(response.customer.numberOninvoice);
            $("#updateCustomerCustomerRate").val(response.customer.customerRate);
            $("#updateCustomerInternalNotes").val(response.customer.internalNotes);
            
            }
        });
        $("#updateCustomerModal").modal("show");
    });

    $(".next_update_customer").click(function(){
        $(".update_customer_first_tap").show();
        $(".update_advance_first_tap").hide();
    });
    $(".Previous_update_customer").click(function(){
        $(".update_customer_first_tap").hide();
        $(".update_advance_first_tap").show();
    });
    $("#updateCustomerData").click(function(){
        // alert("Dgfhhhfghfghfgh");
        var id=$("#updateCustomer_id").val();
        var custName=$("#updateCustomerName").val();
        // alert(custName);
        var custAddress = $("#updateCustomerAddress").val();
        var custLocation = $("#updateCustomerLocation").val();
        var custZip = $("#updateCustomerZip").val();
        var BillingAddressChkbox = $("#updateCustomerBillingAddressChkbox").val();
        var billingAddress = $("#updateCustomerBillingAddress").val();
        var billingLocation = $("#updateCustomerBillingLocation").val();
        var billingZip = $("#updateCustomerBillingZip").val();
        var primaryContact = $("#updateCustomerPrimaryContact").val();
        var custTelephone = $("#updateCustomerTelephone").val();
        var custExt = $("#updateCustomerExt").val();
        var custEmail = $("#updateCustomerEmail").val();
        var custFax = $("#updateCustomerFax").val();
        var billingContact = $("#updateCustomerBillingContact").val();
        var billingEmail = $("#updateCustomerBillingEmail").val();
        var billingTelephone = $("#updateCustomerBillingTelephone").val();
        var billingExt = $("#updateCustomerBillingExt").val();
        var URS = $("#updateCustomerUrs").val();
        var MC = $("#updateCustomerMc").val();
        var blacklisted = $("#updateCustomerBlacklisted").val();
        var isBroker = $("#updateCustomerIsBroker").val();
        var DuplicateShipper = $("#updateCustomerDuplicateShipper").val();
        var DuplicateConsignee = $("#updateCstomerDuplicateConsignee").val();
        var currencySetting = $("#updatecurrency").val();
        var paymentTerms = $(".Update_customer_terms").val();
        var creditLimit = $("#updateCustomerCreditLimit").val();
        var salesRep = $("#updateCustomerSalesRepresentative").val();
        var factoringCompany = $(".update_factroring_name").val();
        var federalID = $("#updateCustomerFederalID").val();
        var workerComp = $("#updateCustomerWorkerComp").val();
        var websiteURL = $("#updateCustomerWebsiteURL").val();
        var numberOninvoice = $("#updateCustomerNumbersonInvoice").val();
        var customerRate = $("#updateCustomerCustomerRate").val();
        var internalNotes = $("#updateCustomerInternalNotes").val();
        // alert(paymentTerms);
        // alert(factoringCompany);
        // alert(currencySetting);
        // console.log("MC = "+MC + "DuplicateShipper = " + DuplicateShipper+ "DuplicateConsignee = " +DuplicateConsignee + "paymentTerms ="+paymentTerms + "numberOninvoice =" +numberOninvoice + "customerRate =  " + customerRate + "factoringCompany = " + factoringCompany);
        if(custName=='')
        {
            swal.fire( "Enter Customer Name");
            $('#updateCustomerName').focus();
            return false;
            
        } 
        if(custAddress=='')
        {
            swal.fire( "Enter Customer Address");
            return false;
        }
        if(custLocation=='')
        {
            swal.fire( "'Enter Location");
            return false;
        }
        if(custZip=='')
        {
            swal.fire( "'Enter Zip");
            return false;
        }
        var formData = new FormData();
        formData.append('_token',$("#_tokenUpdateCustomer").val());
        formData.append('id',id);
        formData.append('custName',custName);
        formData.append('custAddress',custAddress);
        formData.append('custLocation',custLocation);
        formData.append('custZip',custZip);        
        formData.append('BillingAddressChkbox',BillingAddressChkbox); 
        formData.append('billingAddress',billingAddress);    
        formData.append('billingLocation',billingLocation); 
        formData.append('billingZip',billingZip); 
        formData.append('primaryContact',primaryContact); 
        formData.append('custTelephone',custTelephone); 
        formData.append('custExt',custExt); 
        formData.append('custEmail',custEmail); 
        formData.append('custFax',custFax); 
        formData.append('billingContact',billingContact); 
        formData.append('billingEmail',billingEmail); 
        formData.append('billingTelephone',billingTelephone); 
        formData.append('billingExt',billingExt); 
        formData.append('URS',URS); 
        formData.append('MC',MC); 
        formData.append('blacklisted',blacklisted); 
        formData.append('isBroker',isBroker); 
        formData.append('DuplicateShipper',DuplicateShipper); 
        formData.append('DuplicateConsignee',DuplicateConsignee); 
        formData.append('currencySetting',currencySetting); 
        formData.append('paymentTerms',paymentTerms); 
        formData.append('creditLimit',creditLimit); 
        formData.append('salesRep',salesRep); 
        formData.append('factoringCompany',factoringCompany); 
        formData.append('federalID',federalID); 
        formData.append('workerComp',workerComp); 
        formData.append('websiteURL',websiteURL);  
        formData.append('customerRate',customerRate);  
        formData.append('numberOninvoice',numberOninvoice); 
        formData.append('internalNotes',internalNotes);
        // alert("DSgfhgjhkjjhgfd");
        $.ajax({
                type:'post',
                url:base_path+"/admin/update_customer",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Customer updated successfully", "success");
                    $('#updateCustomerModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/customer",
                        async: false,
                        //dataType:JSON,
                        success: function(customerResult) {
                            //console.log(customerResult);
                            createcustomerRows(customerResult);
                            customerResponse = customerResult;
                        }
                    });
                }
        });
    })
    // ====================== end update customer ==================================

    //===========================create currency =========================
    $(".closeaddCreateCurrencyCustomer").click(function(){
        $("#addCreateCurrencyCustomer").modal("hide");
    });
    $(".addCurrencySetting").click(function(){
        $("#addCreateCurrencyCustomer").modal("show");
    });
    $(".saveaddCreateCurrencycustomer").click(function(){
        alert("add currency");
    })
    //================================== end currency ============================

    // ================ add payment terms ===========
    $(".closeadPaymentTermsCustomer").click(function(){
        $("#addPaymentTermsCustom").modal("hide");
    });
    $(".addUpPaymentTermsCustomer").click(function(){
        $("#addPaymentTermsCustom").modal("show");
    });
    $(".savePaymentTermsCustomer").click(function(){
        alert("add payment terms");
    });
    // /============= end payment terms =======================

    //============= addFactoringCompanyCutomer===========================
    $(".closeaddFactoringModelCustomer").click(function(){
        $("#addFactoringModelCustomer").modal("hide");
    });
    $(".addFactoringCompanyCutomer").click(function(){
        $("#addFactoringModelCustomer").modal("show");
    });
    $(".saveFactoringModelCustomer").click(function(){
        alert("add addFactoringModelCustomer");
    });

    //=================== delete customer ==========
    $('body').on('click','.customerDelete',function(){
        var id=$(this).attr("data-id");
        var email=$(this).attr("data-email");
        var custID=$(this).attr("date-cusId");
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
                    type:"post",
                    url:base_path+"/admin/delete_customer",
                    data:{_token:$("#_tokenUpdateCustomer").val(),id:id,email:email,custID:custID},
                    success:function(response)
                    {
                        swal.fire("Done!", "Customer deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/customer",
                            async: false,
                            // dataType:JSON,
                            success: function(customerResult) {
                                // alert(customerResult);
                                createcustomerRows(customerResult);
                                customerResponse = customerResult;
                            }
                        });
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                })
            }
        })
        
    
    })
    // ======================================================== end delete customer =================================

    //============================ restore  customer =================  
    $(".closeRestoreCustomer").click(function(){
        $("#restoreCustomerData").modal("hide");
    });
    $('.restoreCustomerData').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/customer",
            // async: false,
            // dataType:JSON,
            success: function(customerResult) {
                // alert("sussss");
                RestorecustomerRows(customerResult);
                RecustomerResponse = customerResult;
            }
        });
        $("#restoreCustomerData").modal("show");
    }); 
    function RestorecustomerRows(RecustomerResponse) {
        var custlen1 = 0;
        $(".restoreCustomerTable").html('');
        var no=1;
        var custlen2=RecustomerResponse.customer.length; 
        for (var j = 0; j < custlen2; j++) 
        {
            var companyID =RecustomerResponse.companyID;
            var customerId=RecustomerResponse.customer[j]._id;
            var custName = RecustomerResponse.customer[j].custName;
            var custLocation = RecustomerResponse.customer[j].custLocation;
            var custZip = RecustomerResponse.customer[j].custZip;
            var custPrimaryContact = RecustomerResponse.customer[j].primaryContact;
            var custTelephone = RecustomerResponse.customer[j].custTelephone;
            var custEmail = RecustomerResponse.customer[j].custEmail;
            var delete_status = RecustomerResponse.customer[j].deleteStatus;
            if(delete_status=="YES"){
                var customerStr = "<tr data-id=" + (i + 1) + ">" +
                "<td data-field='no'><input type='checkbox' class='check_cust_one' name='all_cst_id[]' data-id=" + customerId+ " date-cusId="+companyID+"  value="+customerId+"> </td>" +
                "<td data-field='customerName' >" + custName + "</td>" +
                "<td data-field='customerLocation'>" + custLocation + "</td>" +
                "<td data-field='customerZip'>" + custZip + "</td>" +
                "<td data-field='customerPrimaryContacte'>" + custPrimaryContact + "</td>" +
                "<td data-field='customerTelephone'>" + custTelephone + "</td>" +
                "<td data-field='customerEmail'>" + custEmail + "</td>" +
                "</tr>";

                // ===================== action  btn ========================

                // "<td style='width: 100px'><a class=' button-29 fs-14 text-white CustomerRestore restore_customer_data' data-id=" + customerId+ " date-cusId="+companyID+"  data-email="+custEmail +"><i class='fa fa-repeat' aria-hidden='true'></i></a></td>"


                    $(".restoreCustomerTable").append(customerStr);
                    no++;
            }
        }
    }

    $(document).on("change", ".all_ids_cust", function() 
    {
        if(this.checked) {
            $('.check_cust_one:checkbox').each(function() 
            {
                this.checked = true;
                customerCheckbox();
                // customerCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_cust_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_cust_one',function(){
        customerCheckbox();
        // customerCheckboxRestore();
    });
    function customerCheckbox()
    {
        var custIds = [];
        var companyIds=[]
            $.each($("input[name='all_cst_id[]']:checked"), function(){
                custIds.push($(this).val());
            });
            console.log(custIds);
            var CustomerCheckedIds =JSON.stringify(custIds);
            $('#checked_customer_ids').val(CustomerCheckedIds);
            $.each($("input[name='all_cst_id[]']:checked"), function(){
                companyIds.push($(this).attr("date-cusId"));
            });
            // console.log(companyIds);
            var customerCheckedAllIds =JSON.stringify(companyIds);
            $('#checked_company_ids').val(customerCheckedAllIds);


            if(custIds.length > 0)
            {
                $('#restore_customer_data').removeAttr('disabled');
            }
            else
            {
                $('#restore_customer_data').attr('disabled',true);
            }
    }
    $('body').on('click','.restore_customer_data',function(){
        var all_ids=$('#checked_customer_ids').val();
        var custID=$("#checked_company_ids").val();
        // alert(custID);
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenUpdateCustomer").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoreCustomer",
            // async: false,
            // dataType:JSON,
            success: function(response) {               
                swal.fire("Done!", "Customer Restored successfully", "success");
                $("#restoreCustomerData").modal("hide");
                // RestorecustomerRows(response);
                // RecustomerResponse = response;
                    $.ajax({
                        type: "get",
                        url: base_path+"/admin/customer",
                        async: false,
                        // dataType:JSON,
                        success: function(customerResult) {
                            //console.log(customerResult);
                            createcustomerRows(customerResult);
                            customerResponse = customerResult;
                        }
                    });
            }
        });
    });
    //============================ end restore  customer =================
});