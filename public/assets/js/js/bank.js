var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.bankClose').click(function(){
        $('#bankModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get   ------------------------------------------------------------------------- -->  
   
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


// <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 
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

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var bankStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='bankName' >" + bankName + "</td>" +
                                        "<td data-field='bankAddresss' >" + bankAddresss + "</td>" +
                                        "<td data-field='accountHolder' >" + accountHolder + "</td>" +
                                        "<td data-field='accountNo' >" + accountNo + "</td>" +
                                        "<td data-field='routingNo' >" + routingNo + "</td>" +
                                        "<td data-field='openingBalDate' >" + openingBalDate + "</td>" +
                                        "<td data-field='openingBalance' >$ " + openingBalance + "</td>" +
                                        
                                        "<td data-field='currentBalance' >$ " + currentBalance + "</td>" +
                                       
                                        "<td style='width: 100px'>"+
                                            " <a class='button-23 Edit_bank_details_m  "+editPrivilege+"' data-bankID='"+admin_bank_Id+"' data-compID='"+CompID+"' title='Edit' ><i class='fe fe-edit'></i>"+
                                            "</a> <a class='delete1 button-23 delete_bank_details "+delPrivilege+"' data-bankID='"+admin_bank_Id+"' data-compID='"+CompID+"' title='Delete'><i class='fe fe-delete'></i></a>"+
                                        "</td></tr>";
            
                                    $("#bankTable").append(bankStr);
                                    no++;
                                }
                            }
                        }
                    }
                }
            
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
                $('.bankCompID').val(text.companyID);
                $('.BankDetailsAdminId').val(text._id);
                $('.updatebankName').val(text.bankName);
                $('.updatebankAddresss').val(text.bankAddresss);
                $('.updateaccountHolder').val(text.accountHolder);
                $('.updateaccountNo').val(text.accountNo);
                $('.updateroutingNo').val(text.routingNo);
                $('.updateopeningBalDate').val(text.openingBalDate);
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
//================================== end details =================================
});