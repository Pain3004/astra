var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.bankClose').click(function(){
        $('#bankModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#bank_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getCompanyHolder",
            async: false,
            success: function(text) {
                console.log(text);
                ShowCompanyName(text);
                comapnyRes = text;
             }
        });


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
                                
                                var openingBale=bankResult[i].admin_bank[j].openingBalDate;
                                var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                var date = new Date(openingBale*1000);
                                var year = date.getFullYear();
                                var month = months_arr[date.getMonth()];
                                var day = date.getDate();
                                var openingBalDate = month+'/'+day+'/'+year;

                                var CompID=bankResult[i].companyID;
                                var admin_bank_Id =bankResult[i].admin_bank[j]._id;
                                var bankName =bankResult[i].admin_bank[j].bankName;
                                var bankAddresss =bankResult[i].admin_bank[j].bankAddresss;
                                var accountHolder =bankResult[i].admin_bank[j].accountHolder;
                                var accountNo =bankResult[i].admin_bank[j].accountNo;
                                var routingNo =bankResult[i].admin_bank[j].routingNo;
                                // var openingBalDate =bankResult[i].admin_bank[j].openingBalDate;
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
                                        "<a class='mt-2 button-29 fs-14 text-white Edit_bank_details_m'  title='Edit1' data-bankID='"+admin_bank_Id+"' data-compID='"+CompID+"' ><i class='fe fe-edit'></i></a>&nbsp"+

                                        "<a class='mt-2 button-29 fs-14 text-white delete_bank_details'  title='delete' data-bankID='"+admin_bank_Id+"' data-compID='"+CompID+"' ><i class='fe fe-trash'></i></a>&nbsp"+

                                        // "<a class='mt-2 button-29 fs-14 text-white upload_bank_details'  title='delete' data-bankID='"+admin_bank_Id+"' data-compID='"+CompID+"' ><i class='fe fe-upload'></i></a>&nbsp"+
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
            swal.fire( "'Enter account No");
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

    //======================================create company modal and show======================
    function ShowCompanyName(comapnyRes)
    {
        var companyLength=comapnyRes.company.length;
        var companyL=comapnyRes.company;  
        $(".listCompanyNames").html(); 
        for(var j=0; j<companyLength;j++)
        {
            var id=companyL[j]._id;
            var name=companyL[j].companyName;
            var html="<option value='"+id+"'>"+name+"</option>";
            // $(".addbankCompany").val(id);
            $(".listCompanyNames").append(html);
        }   
    }
    $(".CreateCompanyHolderName").click(function(){
        $("#CompanyCreateModal").modal("show");
    });
    $(".closeCompanyCreateModal").click(function(){
        $("#CompanyCreateModal").modal("hide");
    });
    $(".CompanyCreateModalSaveButton").click(function(){
        var companyName=$('.addcompanyName').val();
        var shippingAddress=$('.addshippingAddress').val();
        var telephoneNo=$('.addtelephoneNo').val();
        var faxNo=$('.addBankfaxNo').val();
        var mcNo=$('.addBankmcNo').val();
        var usDotNo=$('.addBankusDotNo').val();
        var mailingAddress=$('.addBankmailingAddress').val();
        var factoringCompany=$('.create_factoringCompany').val();
        var website=$('.addBankwebsite').val();
        if(companyName=="")
        {
            swal.fire( "'Enter company Name");
            return false;
        }
        if(telephoneNo=="")
        {
            swal.fire( "'Enter telephone No");
            return false;
        }
        if(mailingAddress=="")
        {
            swal.fire( "'Enter mailing Address");
            return false;
        }
      
        var formData = new FormData();
        $.each($(".addBankComapanyFiles")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });
        formData.append('_token',$("#_tokenAdd_add_bank_data").val());
        formData.append('companyName',companyName);
        formData.append('shippingAddress',shippingAddress);
        formData.append('telephoneNo',telephoneNo);
        formData.append('faxNo',faxNo);
        formData.append('mcNo',mcNo);
        formData.append('usDotNo',usDotNo);
        formData.append('mailingAddress',mailingAddress);
        formData.append('factoringCompany',factoringCompany);
        formData.append('website',website);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/CreateCompany",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {                  
                swal.fire("Done!", "Bank Holder Stored successfully", "success");
                $('#CompanyCreateModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getCompanyHolder",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        ShowCompanyName(text);
                        comapnyRes = text;
                     }
                });
            }
        });
    });
    //================================ end company modal name -================================
   
    //==================================== update bank details ==============================
    $(".closeUpdateBankData").click(function(){
        $("#UpdateBankModalStoreData").modal("hide");
     });
     $("body").on('click','.Edit_bank_details_m', function(){
        var bankId=$(this).attr("data-bankID");
        var compID=$(this).attr("data-compID");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editBankData",
            async: false,
            data:{bankId:bankId, compID:compID},
            success: function(text) {
                var openingBale=text.openingBalDate;
                var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                var date = new Date(openingBale*1000);
                var year = date.getFullYear();
                var month = months_arr[date.getMonth()];
                var day = date.getDate();
                if(day <=9 )
                {
                    var openingBalDate = year+'-0'+day+'-'+month;
                }
                else
                {
                    var openingBalDate = year+'-'+month+'-'+day;
                }
                // moment(openingBalDate).format('DD-MM-YYYY')
                // var date = new Date(openingBalDate);
                // alert(date)
                // alert(openingBalDate);
                    $('.bankCompID').val(text.companyID);
                    $('.BankDetailsAdminId').val(text._id);
                    $('.updatebankName').val(text.bankName);
                    $('.updatebankAddresss').val(text.bankAddresss);
                    $('.updateaccountHolder').val(text.accountHolder);
                    $('.updateaccountNo').val(text.accountNo);
                    $('.updateroutingNo').val(text.routingNo);
                    $('.updateopeningBalDate').val(openingBalDate);
                    $('.updateopeningBalance').val(text.openingBalance);
                    $('.updatecurrentcheqNo').val(text.currentcheqNo);
             }
        });

        $("#UpdateBankModalStoreData").modal("show");
     });
     $(".bankDataUpdatebutton").click(function(){        
       var compID= $('.bankCompID').val();
        var id=$('.BankDetailsAdminId').val();
        var bankName=$('.updatebankName').val();
        var bankAddresss=$('.updatebankAddresss').val();
        var accountHolder=$('.updateaccountHolder').val();
        var accountNo=$('.updateaccountNo').val();
        var routingNo=$('.updateroutingNo').val();
        var openingBalDate=$('.updateopeningBalDate').val();
        var openingBalance=$('.updateopeningBalance').val();
        var currentcheqNo=$('.updatecurrentcheqNo').val();
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
            swal.fire( "'Enter account No");
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
        formData.append('_token',$("#_tokenAdd_update_bank_data").val());
        formData.append('id',id);
        formData.append('compID',compID);
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
            url: base_path+"/admin/updateBankData",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {                  
                swal.fire("Done!", "Bank Updated successfully", "success");
                $('#UpdateBankModalStoreData').modal('hide');
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
    //[============================ end update bank details ================================
    
    //============================== delete bank details ==============================
    $('body').on('click','.delete_bank_details',function(){
        var id=$(this).attr("data-bankID");
        var compID=$(this).attr("data-compID");
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
                    type: 'post',
                    url: base_path+"/admin/deleteBankData",
                    data: { _token: $("#_tokenAdd_update_bank_data").val(), id: id,compID:compID},
                    success: function(resp){
                        swal.fire("Done!", "Bank Deleted successfully", "success");
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
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
            else 
            {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    });
    //================================== end details delete =================================

    //===============================start restore bank ================================
    $(".restoreBankBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getCompanyHolder",
            async: false,
            success: function(text) {
                console.log(text);
                RestoreCompanyName(text);
                comapnyRes = text;
             }
        });
        $("#restorebankModal").modal("show");
    });
    $(".restorebankClose").click(function(){
        $("#restorebankModal").modal("hide");
    });
    function RestoreCompanyName(creditCardResult) {
        var banklen = 0;
        if (bankResult != null) 
        {
            $("#restorebankTable").html('');
            banklen = bankResult.length;
            if (banklen > 0) 
            {
                for (var i = banklen-1; i >= 0; i--) 
                { 
                    bankAdminlen = bankResult[i].admin_bank.length;
                    var Id =bankResult[i]._id;
                    var com_Id =bankResult[i].companyID;
                    //alert(bankAdminlen);
                    if (bankAdminlen > 0) 
                    {
                        for (var j = bankAdminlen-1; j >= 0; j--) 
                        {    
                            var CompID=bankResult[i].companyID;
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

                            if(deleteStatus == "YES")
                            {
                                var bankStr = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' class='check_BankDetails_one' name='all_BankDetails_id[]' data-BankDetails=" + admin_bank_Id+ " date-compID="+CompID+"  value="+admin_bank_Id+"></td>" +
                                "<td data-field='bankName' >" + bankName + "</td>" +
                                "<td data-field='bankAddresss' >" + bankAddresss + "</td>" +
                                "<td data-field='accountHolder' >" + accountHolder + "</td>" +
                                "<td data-field='accountNo' >" + accountNo + "</td>" +
                                "<td data-field='routingNo' >" + routingNo + "</td>" +
                                "<td data-field='openingBalDate' >" + openingBalDate + "</td>" +
                                "<td data-field='openingBalance' >$ " + openingBalance + "</td>"+
                                "<td data-field='openingBalance' >$ " + currentBalance + "</td></tr>" 
                                $("#restorebankTable").append(bankStr);
                            }
                        }
                    }
                }
                
            }
            else 
            {
                var bankStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
            
                    $("#restorebankTable").append(bankStr);
            }
        
        }
        else 
        {
            var bankStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#restorebankTable").append(bankStr);
        }
    }
    $(document).on("change", ".bankDetails_all_ids", function() 
    {
        if(this.checked) {
            $('.check_BankDetails_one:checkbox').each(function() 
            {
                this.checked = true;
                BankDetailsCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_BankDetails_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_BankDetails_one',function(){
        BankDetailsCheckboxRestore();
    });
    function BankDetailsCheckboxRestore()
    {
        var BankDetailsIds = [];
        var companyIds=[]
			$.each($("input[name='all_BankDetails_id[]']:checked"), function(){
				BankDetailsIds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
			});
			console.log(BankDetailsIds);
			var CreditCardAllCheckedIds =JSON.stringify(BankDetailsIds);
			$('#checked_BankDetails_ids').val(CreditCardAllCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_BankDetails_company_ids').val(companyCheckedIds);


			if(BankDetailsIds.length > 0)
			{
				$('#restore_BankDetails_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_BankDetails_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_BankDetails_data',function(){
        var all_ids=$('#checked_BankDetails_ids').val();
        var custID=$("#checked_BankDetails_company_ids").val();
        // alert(all_ids + " " + custID);
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenAdd_update_bank_data").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoreBankData",
            success: function(response) 
            {               
                swal.fire("Done!", "Restored Bank successfully", "success");
                $("#restorebankModal").modal("hide");
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
    //-=========================  end restore bank =====================================

});