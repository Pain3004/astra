var base_path = $("#url").val();
// $(document).ready(function() {
    
    $('.plusCurrencyModalCloseButton').click(function(){
        $("#plusCurrencyModal").modal("hide");
    });
    $('.close_customerModal').click(function(){
        $("#customerModal").modal("hide");
    });
    // $(".selectpicker").selectpicker('val', "test").selectpicker('refresh');
    // <!-- -------------------------------------------------------------------------Get customer ------------------------------------------------------------------------- -->  
    $('#customer_navbar').click(function(){
        //alert(); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/user",
            async: false,
            success: function(response) {
                // console.log(response);
                customerSalesRepresentative(response);
                result = response;
            }
        });
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
        var customerResponse = '';
        $.ajax({
            type: "GET",
            url: base_path+"/admin/customer",
            async: false,
            //dataType:JSON,
            success: function(customerResult) {
                var res = JSON.parse(customerResult);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processCustomer(res[0]);
                    $("#cus_pagination").html(paginateList(res[1], "admin", "paginatecustomer", "processCustomer"));
                    renameTableSeq("customerTable", "page_active");
                }
                // var totalcustomer = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
                // $("#total_customer").html(totalcustomer);
            }
        });
        $("#customerModal").modal("show");
    }); 
    function processCustomer(res) 
    {

        $("#customerTable").empty();
        // var privdata = JSON.parse(privilege);
        var row = ``;
        for (var j = res.length - 1; j >= 0; j--) 
        {
            var masterID = res[j]["arrData1"]._id;
            // console.log(masterID);
            var data = res[j]["arrData1"].customer;
            for (var i = 0; i < data.length; i++) 
            {
    
                var id = data[i]._id;
                var counter = data[i].counter;
                var custName = data[i].custName;
                var custLocation = data[i].custLocation;
                var custZip = data[i].custZip;
                var primaryContact = data[i].primaryContact;
                var custTelephone = data[i].custTelephone;
                var custEmail = data[i].custEmail;
                var deleteStatus = data[i].deleteStatus;
                var delEn = deleteStatus == 'YES' ? 'disabled_load' : '';
                var edit_by = data[i].edit_by;
                if(custName !="" || custName !=null)
                {
                    custName=custName;
                }
                else
                {
                    custName="------";
                }
                if(custLocation != "" || custLocation != null)
                {
                    custLocation=custLocation;
                }
                else
                {
                    custLocation="------";
                }
                if(custZip != "" || custZip != null)
                {
                    custZip=custZip;
                }
                else
                {
                    custZip="------";
                }
                if(primaryContact != "" && primaryContact != null)
                {
                    primaryContact=primaryContact;
                }
                else
                {
                    primaryContact="------";
                }
                if(custTelephone != "" && custTelephone != null)
                {
                    custTelephone=custTelephone;
                }
                else
                {
                    custTelephone="------";
                }
                if(custEmail != "" && custEmail != null)
                {
                    custEmail=custEmail;
                }
                else
                {
                    custEmail="------";
                }
                if (data[i].currencySetting != "") 
                {
                    var currency_id = data[i].currencySetting;
                } 
                else 
                {
                    var currency_id = '-----';
                }
                if (data[i].paymentTerms != "------") 
                {
                    var paymentid = data[i].paymentTerms;
                } 
                else 
                {
                    var paymentid = '--------';
                }
                if (data[i].factoringCompany != "") 
                {
                    var factoringid = data[i].factoringCompany
                } 
                else 
                {
                    var factoringid = '------';
                }
                if(deleteStatus=="NO")
                {
                    var tr = `<tr>
                    <td class='center-alignment ${delEn}'>${delEn}</td>    
                     <td>${custName}</td>    
                     <td>${custLocation}</td> 
                     <td>${custZip}</td>    
                     <td>${primaryContact}</td>    
                     <td> ${custTelephone}</td>
                     <td> ${custEmail}</td>`;
                    tr += '<td>';
                    tr += `<a class=' button-23  customerEdit' data-id='` + id + `' data-MasterId=" `+ masterID+ `"  title='Delete'><i class='fe fe-edit'></i></a>
                    
                    <a class=' button-23  customerDelete'  data-id='` + id + `' data-MasterId=" `+ masterID+ `"  data-email="+custEmail +" title='Delete'><i class='fe fe-delete'></i></a>`;
                    tr += '</td>';
                    tr += '</tr>';
                }
                row = tr + row;
                $("#customerTable").html(row); 
            }
             

          
        }
        
      
    }
    // <!-- -------------------------------------------------------------------------Get customer over ------------------------------------------------------------------------- -->  

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
    // $(function () {
    //     $('.usa-phone').mask("(999) 999-9999");
    // });
    $('#addCustomerModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $('#updateCustomerModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".addCustomerButton").click(function(){
        // $("#addCustomerModal").val(null).trigger("change");
        $("#addCustomerModal").modal("show");
    });
    $(".closeaddCustomerModal").click(function(){
        $('#addAdvanceCustomerTab').removeClass('active show'); 
        $('#addCustomerTab').addClass('active show');           
        $("#addCustomerModal").modal("hide");
    });
    $(".customerDataSubmit").click(function(){

           
            var customerName= $('#customerName1').val();
            var customerAddress= $('#customerAddress').val();
            var customerLocation= $('#customerLocation').val();
            var customerZip= $('#customerZip').val();

            var customerBillingAddressChkbox= $('#customerBillingAddressChkbox').val();


            var customerBillingAddress= $('#customerBillingAddress').val();
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

            // var customerCurrency= $('#currency_customer').val();
            var customerPaymentTerm= $('#CustomerPayment_Terms').val();
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
                 swal.fire("Please Enter Name");
                $('#customerName1').focus();
                return false;
            }
            if(customerAddress == ''){
                 swal.fire("Please Enter Name");
                $('#customerAddress').focus();
                return false;
            }
            if(customerLocation == ''){
                 swal.fire("Please Enter Name");
                $('#customerLocation').focus();
                return false;
            }
            if(customerZip == ''){
                 swal.fire("Please Enter Name");
                $('#customerZip').focus();
                return false;
            }
            if(customerPaymentTerm=='')
            {
                swal.fire("Please Payment terms");
                return false;
            }
            if(customerEmail !== "")
            {
                if(IsEmail() == false)
                {
                    swal.fire("Please enter valid email address");
                    return false;
                } 
            }
            if(customerBillingEmail !== "")
            {
                if(IsEmail() == false)
                {
                    swal.fire("Please enter valid email address");
                    return false;
                } 
            }
            // if(customerWebsiteURL !== "")
            // {
            //     if(isUrlValid()== false)
            //     {
            //         swal.fire("Please enter valid url");
            //         return false;
            //     }
            // }
            var formData = new FormData();
            formData.append('_token',$("#_tokenCustomer").val());
             formData.append(' customerName', customerName);
             formData.append(' customerAddress', customerAddress);
             formData.append(' customerLocation', customerLocation);
             formData.append(' customerZip', customerZip);
             formData.append(' customerBillingAddressChkbox', customerBillingAddressChkbox);
             formData.append('customerBillingAddress',customerBillingAddress);
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

            //  formData.append(' customerCurrency', customerCurrency);
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
                    $('#addAdvanceCustomerTab').removeClass('active show'); 
                    $('#addCustomerTab').addClass('active show');                  
                    swal.fire("Done!", "Customer added successfully", "success");
                    $("#addCustomerModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/customer",
                        async: false,
                        //dataType:JSON,
                        success: function(customerResult) {
                            var res = JSON.parse(customerResult);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                processCustomer(res[0]);
                                $("#cus_pagination").html(paginateList(res[1], "admin", "paginatecustomer", "processCustomer"));
                                renameTableSeq("customerTable", "page_active");
                            }
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
                var customerCurrencyList="<option value=''>----select----</option>"
                for (var i = 0; i < customerCurrencyLength; i++) {  
                    var currency =customerCurrencyResponse.currency[i].currencyType;

                    customerCurrencyList+= "<option id='customerCurrency'  value='"+ currency +"'>"                   
                 
                }
                $(".customerCurrencySet").append(customerCurrencyList);
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

    $('#plusCurrencyModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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

        if (customerPaymentTermsLength > 0)
        {
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
    $('#PaymentTermsModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $("#plusPaymentTerms").click(function(){
        $("#PaymentTermsModal").modal("show");
    });
    $("#plusPaymentTerms2").click(function(){
        $("#PaymentTermsModal").modal("show");
    });

    $("#closePaymentTermsModal").click(function(){
        //$('#PaymentTermsModal2').modal('show');
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
                // console.log(dataCustomerPaymentTermsNameResult);
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
    $('#PaymentTermsModal2').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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
                                            "<a class='button-23  editPayTerms'  title='Edit1' data-Id='"+payment_id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deletePayTerms button-23' title='Delete' data-Id='"+payment_id+"' data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
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
  
    // $('.customerBFactoringCompanySet').focus(function(){
    //     //alert(); 
    //     $.ajax({
    //         type: "GET",
    //         url: base_path+"/admin/getCustomerBFactoringCompany",
    //         async: false,
    //         //dataType:JSON,
    //         success: function(customerBFactoringCompanyResult) {
    //             //console.log(customerCurrencyResult);
    //             createCustomerBFactoringCompanyList(customerBFactoringCompanyResult);
    //             customerBFactoringCompanyResponse = customerBFactoringCompanyResult;
    //         }
    //     });
    // });

    function createCustomerBFactoringCompanyList(customerBFactoringCompanyResponse) {  
        var customerBFactoringCompanyLength = 0;  
        if (customerBFactoringCompanyResponse != null) {
           var customerBFactoringCompanyLength = customerBFactoringCompanyResponse.factoring.length;         
        }

        if (customerBFactoringCompanyLength > 0) {
            $(".customerBFactoringCompanySet").html('');
           var customerFactoringCompanyname="<option selected>----select-----</option>"
            for ( var i = customerBFactoringCompanyLength-1; i>= 0; i--) {  
                var factoringCompanyname =customerBFactoringCompanyResponse.factoring[i].factoringCompanyname;
                var factoringCompanyId =customerBFactoringCompanyResponse.factoring[i]._id;
                customerFactoringCompanyname+= "<option  value='"+ factoringCompanyId +"'>"+ factoringCompanyname +"</option>"
            
            }
            $(".customerBFactoringCompanySet").append(customerFactoringCompanyname);
        }
        
    }
    // <!-- -------------------------------------------------------------------------over get customer  Factoring Company ------------------------------------------------------------------------- -->   
    //<!-- ------------------------------------------------------------------------- add customer factoringCompany ------------------------------------------------------------------------- -->
    $("#plusFactoringCompany").click(function(){
        $("#factoringCompanyModal").modal("show");
    });
    $('#factoringCompanyModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".factoringCompanyModalCloseButton").click(function(){
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
        if(factoringCompanyName=='')
        {
            alert( "Enter factoring Company Name");
            return false;
        }
        if(factoringCompanyAddress=='')
        {
            alert( "Enter factoring Company Address");
            return false;
        }
        if(factoringCompanyLocation=='')
        {
            alert( "Enter factoring Company Location");
            return false;
        }
        if(factoringCompanyZip=='')
        {
            alert( "Enter factoring Company Zip");
            return false;
        }
        if(factoringCompanycurrency=='')
        {
            alert( "Select Currency");
            return false;
        }
        if(factoringCompanyPaymentTerms=='')
        {
            alert( "Select PaymentTerms");
            return false;
        }
        var formData = new FormData();
        formData.append('_token',$("#_tokenCustomerFactoringCompany").val());
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
        $.ajax({
            type: "POST",
            url: base_path+"/admin/factoringCompany",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(dataCustomerfactoringCompanyResult){
                // console.log(dataCustomerfactoringCompanyResult);
                if(dataCustomerfactoringCompanyResult){
                    swal.fire("Factoring Company added successfully.");
                    $("#factoringCompanyModal").modal("hide");
                }else{
                    swal.fire("Factoring Company not added successfully.");
                }
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
                });;
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
        // $('#addAdvanceCustomerTab').removeClass('active show'); 
        // $('#addCustomerTab').addClass('active show'); 
        $("#updateCustomerModal").modal("hide");
    })
    $('body').on('click','.customerEdit',function(){   
        $(".update_customer_first_tap").show();
        $(".update_advance_first_tap").hide();
        // createcustomerPaymentTermsList()
        var id=$(this).attr("data-id");
        var email=$(this).attr("data-email");
        var masterId=$(this).attr("data-MasterId");
        // alert(id);
        $.ajax({
            type:'get',
            url:base_path+"/admin/edit_customer",
            data:{id:id,email:email,masterId:masterId},
            // dataType:JSON,
            async: false,
            success:function(response){
            $("#update_masterId").val(response._id);
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
                // $("#updateCustomerDuplicateShipper").change(function(){
                //     if ($(this).is(':checked'))
                //     {
                //         $("#updateCustomerDuplicateShipper").val("on");
                //     }
                //     else
                //     {
                //         $("#updateCustomerDuplicateShipper").val("off");
                //     }
                // });
                
                // $("#updateCstomerDuplicateConsignee").change(function(){
                //     if ($(this).is(':checked'))
                //     {
                //         $("#updateCstomerDuplicateConsignee").val("on");
                //     }
                //     else
                //     {
                //         $("#updateCstomerDuplicateConsignee").val("off");
                //     }
                // });
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
            // if(response.customer.DuplicateShipper=="on")
            // {
            //         $("#updateCustomerDuplicateShipper").attr('checked',true);
            // }
            // else
            // {
            //         $("#updateCustomerDuplicateShipper").attr('checked',false);
            // }
            // if(response.customer.DuplicateConsignee=="on")
            // {
            //         $("#updateCstomerDuplicateConsignee").attr('checked',true);
            // }
            // else
            // {
            //         $("#updateCstomerDuplicateConsignee").attr('checked',false);
            // }
            $("#updateCustomerIsBroker").val(response.customer.isBroker);
            // $("#updateCustomerDuplicateShipper").val(response.customer.numberOninvoice);
            // $("#updateCstomerDuplicateConsignee").val(response.customer.customerRate);
            // $("#updatecurrency").val(response.customer.currencySetting);
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
        var masterId= $("#update_masterId").val();
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
        // var DuplicateShipper = $("#updateCustomerDuplicateShipper").val();
        // var DuplicateConsignee = $("#updateCstomerDuplicateConsignee").val();
        // var currencySetting = $("#updatecurrency").val();
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
        formData.append('masterId',masterId);
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
        // formData.append('DuplicateShipper',DuplicateShipper); 
        // formData.append('DuplicateConsignee',DuplicateConsignee); 
        // formData.append('currencySetting',currencySetting); 
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
                            var res = JSON.parse(customerResult);
                            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                processCustomer(res[0]);
                                $("#cus_pagination").html(paginateList(res[1], "admin", "paginatecustomer", "processCustomer"));
                                renameTableSeq("customerTable", "page_active");
                            }
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
        var masterId=$(this).attr("data-MasterId");
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
                    data:{_token:$("#_tokenUpdateCustomer").val(),id:id,email:email,masterId:masterId},
                    success:function(response)
                    {
                        swal.fire("Done!", "Customer deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/customer",
                            async: false,
                            // dataType:JSON,
                            success: function(customerResult) {
                                var res = JSON.parse(customerResult);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processCustomer(res[0]);
                                    $("#cus_pagination").html(paginateList(res[1], "admin", "paginatecustomer", "processCustomer"));
                                    renameTableSeq("customerTable", "page_active");
                                }
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
                var res = JSON.parse(customerResult);
                // if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    RestoreprocessCustomer(res[0]);
                    renameTableSeq("customerTable", "page_active");
                    $("#Restorecus_pagination").html(paginateList(res[1], "admin", "repaginatecustomer", "restoreProcessCustomer"));
                // }
            }
        });
        $("#restoreCustomerData").modal("show");
    }); 
    function RestoreprocessCustomer(res) 
    {

        $("#restoreCustomerTable").empty();
        // var privdata = JSON.parse(privilege);
        var row = ``;
        for (var j = res.length - 1; j >= 0; j--) 
        {
            var masterID = res[j]["arrData1"]._id;
            // console.log(masterID);
            var data = res[j]["arrData1"].customer;
            for (var i = 0; i < data.length; i++) 
            {
    
                var id = data[i]._id;
                var counter = data[i].counter;
                var custName = data[i].custName;
                var custLocation = data[i].custLocation;
                var custZip = data[i].custZip;
                var primaryContact = data[i].primaryContact;
                var custTelephone = data[i].custTelephone;
                var custEmail = data[i].custEmail;
                var deleteStatus = data[i].deleteStatus;
                var delEn = deleteStatus == 'NO' ? 'disabled_load' : '';
                var edit_by = data[i].edit_by;
                if(custName !="" || custName !=null)
                {
                    custName=custName;
                }
                else
                {
                    custName="------";
                }
                if(custLocation != "" || custLocation != null)
                {
                    custLocation=custLocation;
                }
                else
                {
                    custLocation="------";
                }
                if(custZip != "" || custZip != null)
                {
                    custZip=custZip;
                }
                else
                {
                    custZip="------";
                }
                if(primaryContact != "" && primaryContact != null)
                {
                    primaryContact=primaryContact;
                }
                else
                {
                    primaryContact="------";
                }
                if(custTelephone != "" && custTelephone != null)
                {
                    custTelephone=custTelephone;
                }
                else
                {
                    custTelephone="------";
                }
                if(custEmail != "" && custEmail != null)
                {
                    custEmail=custEmail;
                }
                else
                {
                    custEmail="------";
                }
                if (data[i].currencySetting != "") 
                {
                    var currency_id = data[i].currencySetting;
                } 
                else 
                {
                    var currency_id = '-----';
                }
                if (data[i].paymentTerms != "------") 
                {
                    var paymentid = data[i].paymentTerms;
                } 
                else 
                {
                    var paymentid = '--------';
                }
                if (data[i].factoringCompany != "") 
                {
                    var factoringid = data[i].factoringCompany
                } 
                else 
                {
                    var factoringid = '------';
                }
                if(deleteStatus=="YES")
                {
                    var tr = `<tr>
                    <td><input type='checkbox' class='check_cust_one' name='all_cst_id[]' data-id='` + id + `' date-cusId=" `+ masterID+ `"  value='`+ id +`'></td>    
                     <td>${custName}</td>    
                     <td>${custLocation}</td> 
                     <td>${custZip}</td>    
                     <td>${primaryContact}</td>    
                     <td> ${custTelephone}</td>
                     <td> ${custEmail}</td>`;
                    tr += '</tr>';
                }
                row = tr + row;
                $("#restoreCustomerTable").html(row); 
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
        // var masterId=$(this).attr("data-MasterId");
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


    // email validation===================================
   
    function IsEmail() {
        var email= $(".email").val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //  url validation =======================================
    function isUrlValid() {
        if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($(".url").val()))
        {
           return true;
        } 
        else 
        {
           return false;
        }
    }


    // salse representative =============================================
    // $('.customerRepresentativeSalseTerm').click(function(){
        
    // });

    function customerSalesRepresentative(result) {
        // console.log(result);
        var customerCurrencyLength = 0;
        if (result != null) {
            customerCurrencyLength = result.length;
        }

        if (customerCurrencyLength > 0) {
            $(".customerRepresentativeSalseTerm").html('');
            var customerPaymentTerm="<option selected>----select----</option>"
            for (var i = 0; i < customerCurrencyLength; i++) {  
                var username =result[i].userFirstName;
                customerPaymentTerm+= "<option  value='"+ username +"'>"+ username +"</option>"
              
            }
            $(".customerRepresentativeSalseTerm").append(customerPaymentTerm);
        }
        
    }

    // end =============================================================

    // start location view in all ===============================
   $(".location_view").keyup(function(){
        var fieldID=$(this).attr('data-location');  
        // alert(fieldID)
        var placeArray = "";
        $.getJSON("./place.json", function (json) {
        placeArray = json; // this will show the info it in firebug console
        });
       var placetimeout='';;
        clearTimeout(placetimeout);
        var location = document.getElementById(fieldID);
        var st = fieldID + "-list";
        if (location.value == "") {
          document.getElementById(st).style.display = "none";
        }
        placetimeout = setTimeout(function () {
          var regex = new RegExp(location.value, "i");
          var list = `<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front col-md-10" unselectable="on" style="left:16px;top: 61.625px; height:auto; box-shadow: 2px 2px 2px 3px rgb(0 0 0 / 6%); max-height: 200px;overflow: auto;z-index: 9999;">`;
          var count = 1;
      
          $.each(placeArray, function (key, val) {
            if (val.city.search(regex) != -1) {
              list += '<li class="ui-menu-item" style="padding: 5px; border-bottom: 1px solid;"><div id="ui-id-2" tabindex="-1" class="ui-menu-item-wrapper putValue" data-value='+val.city.toUpperCase()+' data-fieldID='+fieldID+' data-id='+st+'>'+val.city.toUpperCase()+'</div> </li>';
      
              count++;
            }
          });
          list += `</ul>`;
          if (document.getElementById(st) == undefined) {
            var div = document.createElement("div");
            div.setAttribute("id", st);
            location.parentNode.insertBefore(div, location.nextSibling);
          } else {
            document.getElementById(st).style.display = "block";
          }
          document.getElementById(st).innerHTML = list;
        }, 800);
    });
    $('body').on('click','.putValue',function(){
        var value=$(this).attr("data-value");        
        var fieldID=$(this).attr("data-fieldID");
        var id=$(this).attr("data-id");
        // var date='customerLocation';
        // console.log(date);
        console.log(value + " , " + fieldID + " , " + id);
        document.getElementById(fieldID).value=value;
        // $("#customerLocation").val(value);
        document.getElementById(id).style.display = "none";
    });

      //================== export data ===================================
      $(".exportCustomer").click(function(){
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenEditTruck").val()},
            url: base_path+"/admin/exportCustomer",
            success: function(data) {   
                var rows = JSON.parse(data);
            JSONToCSVConvertor(rows, "Customer Report", true);
            }
        });
    });
    //===================== end export ===================================
// });
