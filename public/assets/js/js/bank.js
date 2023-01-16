var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.bankClose').click(function(){
        $('#bankModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#bank_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getBankData",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createBankRows(text);
                bankResult = text;
             }
        });
        $('#bankModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createBankRows(bankResult) {
        var banklen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (bankResult != null) {
                $("#bankTable").html('');
                banklen = bankResult.length;
                // alert(banklen);
                if (banklen > 0) {
                    for (var i = banklen-1; i >= 0; i--) { 
                        
                        bankAdminlen = bankResult[i].admin_bank.length;
                        var Id =bankResult[i]._id;
                        var com_Id =bankResult[i].companyID;
                        //alert(bankAdminlen);
                        if (bankAdminlen > 0) {
                            for (var j = bankAdminlen-1; j >= 0; j--) {
                                
                                

                                var admin_bank_Id =bankResult[i].admin_bank[j]._id;
                                var bankName =bankResult[i].admin_bank[j].bankName;
                                var bankAddresss =bankResult[i].admin_bank[j].bankAddresss;
                                var accountHolder =bankResult[i].admin_bank[j].accountHolder;
                                var accountNo =bankResult[i].admin_bank[j].accountNo;
                                var routingNo =bankResult[i].admin_bank[j].routingNo;
                                var openingBalDate =bankResult[i].admin_bank[j].openingBalDate;
                                var openingBalance =bankResult[i].admin_bank[j].openingBalance;
                               var openingBalance=parseFloat(openingBalance).toFixed(2);
                                var currentBalance =bankResult[i].admin_bank[j].currentBalance;
                                var currentBalance=parseFloat(currentBalance).toFixed(2);
                                var deleteStatus =bankResult[i].admin_bank[j].deleteStatus;

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var bankStr = "<tr data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='bankName' >" + bankName + "</td>" +
                                        "<td data-field='bankAddresss' >" + bankAddresss + "</td>" +
                                        "<td data-field='accountHolder' >" + accountHolder + "</td>" +
                                        "<td data-field='accountNo' >" + accountNo + "</td>" +
                                        "<td data-field='routingNo' >" + routingNo + "</td>" +
                                        "<td data-field='openingBalDate' >" + openingBalDate + "</td>" +
                                        "<td data-field='openingBalance' >$ " + openingBalance + "</td>" +
                                        
                                        "<td data-field='currentBalance' >$ " + currentBalance + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+Id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        "</td></tr>";
            
                                    $("#bankTable").append(bankStr);
                                    no++;
                                }
                            }
                        }
                    }
                }
            //     $("#iftaTollTable").html('');

            //     if (IftaTolllen > 0) {
                   
            //         var no=1;
            //         for (var i = IftaTolllen-1; i >= 0; i--) {  
                  
            //             var IftaTollId =IftaTollResult.tolls[i]._id;
            //             var transectionDate =IftaTollResult.tolls[i].tollDate;
            //             var transType =IftaTollResult.tolls[i].transType;
            //             var location =IftaTollResult.tolls[i].location;
            //             var transponder =IftaTollResult.tolls[i].transponder;
            //             var licensePlate =IftaTollResult.tolls[i].licensePlate;
            //             var amount =IftaTollResult.tolls[i].amount;
            //             var truckNo =IftaTollResult.tolls[i].truckNo;
            //             var invoiceNo =IftaTollResult.tolls[i].invoiceNumber;
                       
            //             var deleteStatus =IftaTollResult.tolls[i].deleteStatus;
            //   //alert(fuelCardId);
             

            //             if(deleteStatus == "NO"){
            //                 //alert("ff");
            //                 var IftaTollStr = "<tr data-id=" + (i + 1) + ">" +
            //                 "<td data-field=''><input type='checkbox' id='check_sigle_toll' class='check'></td>" +
            //                 "<td data-field='no'>" + no + "</td>" +
            //                 "<td data-field='transectionDate' >" + transectionDate + "</td>" +
            //                 "<td data-field='transType' >" + transType + "</td>" +
            //                 "<td data-field='location' >" + location + "</td>" +
            //                 "<td data-field='transponder' >" + transponder + "</td>" +
            //                 "<td data-field='licensePlate' >" + licensePlate + "</td>" +
            //                 "<td data-field='amount' ><i class='fa fa-usd'> " + amount + "</i></td>" +
            //                 "<td data-field='truckNo' >" + truckNo + "</td>" +
            //                 "<td data-field='invoiceNo' >" + invoiceNo + "</td>" +
                       
            //                 "<td style='text-align:center'>"+
            //                     "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+IftaTollId+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
            //                 "</td></tr>";

            //             $("#iftaTollTable").append(IftaTollStr);
            //             no++;
            //             }
            //         }
            //     } else {
            //         var IftaTollStr = "<tr data-id=" + i + ">" +
            //             "<td align='center' colspan='4'>No record found.</td>" +
            //             "</tr>";
        
            //         $("#iftaTollTable").append(IftaTollStr);
            //     }
            }else {
            var IftaTollStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#iftaTollTable").append(IftaTollStr);
        }
    }

   

    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
    // ==================== ====store bank data ==============================================
    $(".createBankModalStore").click(function(){
        $('#BankModalStoreData').modal("show");
    });
    $(".closeAddBankData").click(function(){
        $('#BankModalStoreData').modal("hide");
    });
    $(".bankDataSavebutton").click(function(){
        var bankName=$('.addbankName').val();
        var bankAddresss=$('.addbankAddresss').val();
        var accountHolder=$('.addaccountHolder').val();
        var accountNo=$('.addaccountNo').val();
        var routingNo=$('.addroutingNo').val();
        var openingBalDate=$('.addopeningBalDate').val();
        var openingBalance=$('.addopeningBalance').val();
        var currentcheqNo=$('.addcurrentcheqNo').val();
        if(bankName=="")
        {
            swal.fire( "'Enter bank Name");
            return false;
        }
        if(bankAddresss=="")
        {
            swal.fire( "'Enter bank Addresss");
            return false;
        }
        if(accountHolder=="")
        {
            swal.fire( "'Enter account Holder");
            return false;
        }
        if(accountNo=="")
        {
            swal.fire( "'Enteraccount No");
            return false;
        }
        if(routingNo=="")
        {
            swal.fire( "'Enter routing No");
            return false;
        }
        if(openingBalDate=="")
        {
            swal.fire( "'Enter opening Bal Date");
            return false;
        }
        
        if(openingBalance=="")
        {
            swal.fire( "'Enter opening Balance");
            return false;
        }
        var formData = new FormData();
        formData.append('_token',$("#_tokenAdd_add_bank_data").val());
        formData.append('bankName',bankName);
        formData.append('bankAddresss',bankAddresss);
        formData.append('accountHolder',accountHolder);
        formData.append('accountNo',accountNo);
        formData.append('routingNo',routingNo);
        formData.append('openingBalDate',openingBalDate);
        formData.append('openingBalance',openingBalance);
        formData.append('currentcheqNo',currentcheqNo);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/createBankData",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {                  
                swal.fire("Done!", "Bank Stored successfully", "success");
                $('#BankModalStoreData').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getBankData",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createBankRows(text);
                        bankResult = text;
                     }
                });
            }
        });
    });
    //====================================  end store bank data =============================
   
    //==================================== update bank details ==============================
    //[============================ end update bank details ================================
    
    //============================== delete bank details ==============================
    //================================== end details =================================

});