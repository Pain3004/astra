var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.creditCardClose').click(function(){
        $('#creditCardModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#creditCard_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getcreditCard",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                //console.log(text);
                createCreditCardRows(text);
                creditCardResult = text;
              }
        });
        $('#creditCardModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createCreditCardRows(creditCardResult) {
        var creditCardlen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (creditCardResult != null) {
                $("#creditCardTable").html('');
                creditCardlen = creditCardResult.length;
                    // alert(creditCardlen);
                if (creditCardlen > 0) {
                    for (var i = creditCardlen-1; i >= 0; i--) { 
                        
                        admin_credit_len = creditCardResult[i].admin_credit.length;
                        var Id =creditCardResult[i]._id;
                        var com_Id =creditCardResult[i].companyID;
                        //alert(bankAdminlen);
                        if (admin_credit_len > 0) {
                            for (var j = admin_credit_len-1; j >= 0; j--) {
                                var comId=creditCardResult[i].companyID;
                                var admin_bank_Id =creditCardResult[i].admin_credit[j]._id;
                                var  Name=creditCardResult[i].admin_credit[j].Name;
                                var  displayName=creditCardResult[i].admin_credit[j].displayName;
                                var  cardType=creditCardResult[i].admin_credit[j].cardType;
                                var  cardHolderName=creditCardResult[i].admin_credit[j].cardHolderName;
                                var  cardNo=creditCardResult[i].admin_credit[j].cardNo;
                                var  openingBalanceDt=creditCardResult[i].admin_credit[j].openingBalanceDt;
                                var  cardLimit=creditCardResult[i].admin_credit[j].cardLimit;
                                var  openingBalance=creditCardResult[i].admin_credit[j].openingBalance;
                                // var openingBalance=parseFloat(openingBalance).toFixed(2);
                                var deleteStatus =creditCardResult[i].admin_credit[j].deleteStatus;

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var creditCardStr = "<tr data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='Name' >" + Name + "</td>" +
                                        "<td data-field='displayName' >" + displayName + "</td>" +
                                        "<td data-field='cardType' >" + cardType + "</td>" +
                                        "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                                        "<td data-field='cardNo' >" + cardNo + "</td>" +
                                        "<td data-field='openingBalanceDt' >" + openingBalanceDt + "</td>" +
                                        "<td data-field='cardLimit' >" + cardLimit + "</td>" +
                                        "<td data-field='openingBalance' >" + openingBalance + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                        "<a class='mt-2 button-29 fs-14 text-white edit_modalCreditCard'  title='Edit1' data-creditCardId='"+admin_bank_Id+"' data-compID='"+comId+"' ><i class='fe fe-edit'></i></a>&nbsp"+

                                        "<a class='mt-2 button-29 fs-14 text-white delete_modalCreditCard'  title='delete' data-creditCardId='"+admin_bank_Id+"' data-compID='"+comId+"' ><i class='fe fe-trash'></i></a>&nbsp"+
                                        "</td></tr>";
            
                                    $("#creditCardTable").append(creditCardStr);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                            var creditCardStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#creditCardTable").append(creditCardStr);
                }
            
            }else {
            var creditCardStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#creditCardTable").append(creditCardStr);
        }
    }

   

    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
    $(".createCreaditCardBtn").click(function(){
        $("#AddCreditCardModal").modal("show");
    });
    $(".closeAddCreditCardModal").click(function(){
        $("#AddCreditCardModal").modal("hide");
    });
    $(".AddCreditCardModalSavebutton").click(function(){
        var Name=$(".addCreditCardName").val();
        var displayName=$(".addCreditCarddisplayName").val();
        var cardType=$(".addCreditCardcardType").val();
        var cardHolderName=$(".addCreditCardcardHolderName").val();
        var cardNo=$(".addCreditCardcardNo").val();
        var openingBalanceDt=$(".addCreditCardopeningBalanceDt").val();
        var cardLimit=$(".addCreditCardcardLimit").val();
        var openingBalance=$(".addCreditCardopeningBalance").val();
        if(Name=="")
        {
            swal.fire('Enter Bank Name');
            return false;
        }
        if(displayName=="")
        {
            swal.fire('Enter Bank display Name');
            return false;
        }
        if(cardType=="")
        {
            swal.fire('Enter card Type');
            return false;
        }
        if(cardHolderName=="")
        {
            swal.fire('Enter carHolder Name');
            return false;
        }
        if(openingBalanceDt=="")
        {
            swal.fire('Enter  opening Balance Date');
            return false;
        }
        if(cardLimit=="")
        {
            swal.fire('Enter  card Limit');
            return false;
        }
        if(openingBalance=="")
        {
            swal.fire('Enter  opening Balance');
            return false;
        }
        var formData=new FormData();
        formData.append('_token', $("#_tokenAdd_creditCard").val());
        formData.append('Name',Name);
        formData.append('displayName',displayName);
        formData.append('cardType',cardType);
        formData.append('cardHolderName',cardHolderName);
        formData.append('cardNo',cardNo);
        formData.append('openingBalanceDt',openingBalanceDt);
        formData.append('cardLimit',cardLimit);
        formData.append('openingBalance',openingBalance);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/storecreditCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                // console.log(data)
                swal.fire("Done!", "Fuel Credit Card  added successfully", "success");
                $('#AddCreditCardModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getcreditCard",
                    async: false,
                    success: function(text) {
                        createCreditCardRows(text);
                        creditCardResult = text;
                      }
                });
            }
        });
    });
    //============================================ end store data =============================

    //====================================== update credit card start =========================
    $("body").on('click','.edit_modalCreditCard',function(){
       var  id=$(this).attr("data-creditCardId");
       var comId=$(this).attr('data-compID');
       $.ajax({
            type:'get',
            url:base_path+"/admin/editcreditCard",
            data:{id:id,comId:comId},
            success:function(res){
                $('.comIdCreditcardUpdate').val(res.companyID);
                $('.CreditCardIdUpdate').val(res._id);
                $(".updateCreditCardName").val(res.Name);
                $(".updateCreditCarddisplayName").val(res.displayName);
                $(".updateCreditCardcardType").val(res.cardType);
                $(".updateCreditCardcardHolderName").val(res.cardHolderName);
                $(".updateCreditCardcardNo").val(res.cardNo);
                $(".updateCreditCardopeningBalanceDt").val(res.openingBalanceDt);
                $(".updateCreditCardcardLimit").val(res.cardLimit);
                $(".updateCreditCardopeningBalance").val(res.openingBalance);
            }

       })
        $("#UpdateCreditCardModal").modal("show");
    });
    $(".closeUpdateCreditCardModal").click(function(){
        $("#UpdateCreditCardModal").modal("hide");
    });
    $(".UpdateCreditCardModalSavebutton").click(function(){
        var comId=$('.comIdCreditcardUpdate').val();
        var id=$('.CreditCardIdUpdate').val();
        var Name=$(".updateCreditCardName").val();
        var displayName=$(".updateCreditCarddisplayName").val();
        var cardType=$(".updateCreditCardcardType").val();
        var cardHolderName=$(".updateCreditCardcardHolderName").val();
        var cardNo=$(".updateCreditCardcardNo").val();
        var openingBalanceDt=$(".updateCreditCardopeningBalanceDt").val();
        var cardLimit=$(".updateCreditCardcardLimit").val();
        var openingBalance=$(".updateCreditCardopeningBalance").val();
        if(Name=="")
        {
            swal.fire('Enter Bank Name');
            return false;
        }
        if(displayName=="")
        {
            swal.fire('Enter Bank display Name');
            return false;
        }
        if(cardType=="")
        {
            swal.fire('Enter card Type');
            return false;
        }
        if(cardHolderName=="")
        {
            swal.fire('Enter carHolder Name');
            return false;
        }
        if(openingBalanceDt=="")
        {
            swal.fire('Enter  opening Balance Date');
            return false;
        }
        if(cardLimit=="")
        {
            swal.fire('Enter  card Limit');
            return false;
        }
        if(openingBalance=="")
        {
            swal.fire('Enter  opening Balance');
            return false;
        }
        var formData=new FormData();
        formData.append('_token', $("#_tokenUpdate_creditCard").val());
        formData.append('comId',comId);
        formData.append('id',id);
        formData.append('Name',Name);
        formData.append('displayName',displayName);
        formData.append('cardType',cardType);
        formData.append('cardHolderName',cardHolderName);
        formData.append('cardNo',cardNo);
        formData.append('openingBalanceDt',openingBalanceDt);
        formData.append('cardLimit',cardLimit);
        formData.append('openingBalance',openingBalance);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/updatecreditCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                // console.log(data)
                swal.fire("Done!", "Fuel Credit Card  Updated successfully", "success");
                $('#UpdateCreditCardModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getcreditCard",
                    async: false,
                    success: function(text) {
                        createCreditCardRows(text);
                        creditCardResult = text;
                      }
                });
            }
        });
    });
    //======================================== end update credit card =========================

    //============================== start delete card =======================================
    $('body').on('click', '.delete_modalCreditCard', function(){
        var  id=$(this).attr("data-creditCardId");
        var comId=$(this).attr('data-compID');
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
                    url: base_path+"/admin/deletecreditCard",
                    data: { _token: $("#_tokenUpdate_creditCard").val(), id: id,comId:comId},
                    success: function(resp){
                        swal.fire("Done!", "Credit Card Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getcreditCard",
                            async: false,
                            success: function(text) {
                                createCreditCardRows(text);
                                creditCardResult = text;
                              }
                        });
                        $('#creditCardModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //================================= end delete card =====================================

    //=================================== start restore card ================================
    $(".restoreCreditCartBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getcreditCard",
            async: false,
            success: function(text) {
                RestoreCreditCardRows(text);
                creditCardResult = text;
              }
        });
        $("#restorecreditCardModal").modal("show");
    });
    $(".restorecreditCardClose").click(function(){
        $("#restorecreditCardModal").modal("hide");
    });
    function RestoreCreditCardRows(creditCardResult) {
        var creditCardlen = 0;
        var no=1;
        if (creditCardResult != null) {
            $("#restorecreditCardTable").html('');
            creditCardlen = creditCardResult.length;
            if(creditCardlen > 0) 
            {
                for (var i = creditCardlen-1; i >= 0; i--) {                         
                    admin_credit_len = creditCardResult[i].admin_credit.length;
                    var Id =creditCardResult[i]._id;
                    var com_Id =creditCardResult[i].companyID;
                    if (admin_credit_len > 0) 
                    {
                        for (var j = admin_credit_len-1; j >= 0; j--) 
                        {
                            var comId=creditCardResult[i].companyID;
                            var admin_bank_Id =creditCardResult[i].admin_credit[j]._id;
                            var  Name=creditCardResult[i].admin_credit[j].Name;
                            var  displayName=creditCardResult[i].admin_credit[j].displayName;
                            var  cardType=creditCardResult[i].admin_credit[j].cardType;
                            var  cardHolderName=creditCardResult[i].admin_credit[j].cardHolderName;
                            var  cardNo=creditCardResult[i].admin_credit[j].cardNo;
                            var  openingBalanceDt=creditCardResult[i].admin_credit[j].openingBalanceDt;
                            var  cardLimit=creditCardResult[i].admin_credit[j].cardLimit;
                            var  openingBalance=creditCardResult[i].admin_credit[j].openingBalance;
                            var deleteStatus =creditCardResult[i].admin_credit[j].deleteStatus;
                            if(deleteStatus == "YES")
                            {

                                var creditCardStr = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' class='check_CreditCard_one' name='all_fuelCard_id[]' data-fuelCard=" + admin_bank_Id+ " date-compID="+comId+"  value="+admin_bank_Id+"></td>" +
                                "<td data-field='Name' >" + Name + "</td>" +
                                "<td data-field='displayName' >" + displayName + "</td>" +
                                "<td data-field='cardType' >" + cardType + "</td>" +
                                "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                                "<td data-field='cardNo' >" + cardNo + "</td>" +
                                "<td data-field='openingBalanceDt' >" + openingBalanceDt + "</td>" +
                                "<td data-field='cardLimit' >" + cardLimit + "</td>" +
                                "<td data-field='openingBalance' >" + openingBalance + "</td></tr>";

                                $("#restorecreditCardTable").append(creditCardStr);
                            }
                        }
                    }
                }
                
            }
            else 
            {
                var creditCardStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
            
                    $("#restorecreditCardTable").append(creditCardStr);
            }
        
        }
        else 
        {
            var creditCardStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#restorecreditCardTable").append(creditCardStr);
        }
    }
    $(document).on("change", ".creditCard_all_ids", function() 
    {
        if(this.checked) {
            $('.check_CreditCard_one:checkbox').each(function() 
            {
                this.checked = true;
                CreditCardCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_CreditCard_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_CreditCard_one',function(){
        CreditCardCheckboxRestore();
    });
    function CreditCardCheckboxRestore()
    {
        var creditCardIds = [];
        var companyIds=[]
			$.each($("input[name='all_fuelCard_id[]']:checked"), function(){
				creditCardIds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
			});
			console.log(creditCardIds);
			var CreditCardAllCheckedIds =JSON.stringify(creditCardIds);
			$('#checked_creditCard_ids').val(CreditCardAllCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_creditCard_company_ids').val(companyCheckedIds);


			if(creditCardIds.length > 0)
			{
				$('#restore_creditCard_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_creditCard_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_creditCard_data',function(){
        var all_ids=$('#checked_creditCard_ids').val();
        var custID=$("#checked_creditCard_company_ids").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenUpdate_creditCard").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restorecreditCard",
            success: function(response) {               
                swal.fire("Done!", "Credit Card Restored successfully", "success");
                $("#restorecreditCardModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getcreditCard",
                    async: false,
                    success: function(text) {
                        createCreditCardRows(text);
                        creditCardResult = text;
                      }
                });
            }
        });
    });
    //================================= end restore card ====================================
});