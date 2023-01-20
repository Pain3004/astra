var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.subCreditCardClose').click(function(){
        $('#subCreditCardModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#subCreditCard_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getcreditCard",
            async: false,
            //dataType:JSON,
            success: function(text) {
                $(".creditCardTypeAll").html();
                if (text != null) {
                    $(".creditCardTypeAll").html();
                    creditCardlen = text.length;
                    if (creditCardlen > 0) {
                        for (var i = creditCardlen-1; i >= 0; i--) { 
                            admin_credit_len = text[i].admin_credit.length;
                            if (admin_credit_len > 0) {
                                for (var j = admin_credit_len-1; j >= 0; j--) {
                                    var admin_bank_Id =text[i].admin_credit[j]._id;
                                    var  Name=text[i].admin_credit[j].displayName;
                                    var deleteStatus =text[i].admin_credit[j].deleteStatus;
    
                                    if(deleteStatus == "NO")
                                    {
                                        var html="<option value='"+admin_bank_Id+"'>"+Name+"</option>";
                                        $(".creditCardTypeAll").append(html);
                                    }
                                }
                            }
                        }
                    }
                }    
            }
        });

        $.ajax({
            type: "GET",
            url: base_path+"/admin/getsubCreditCard",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createSubCreditCardRows(text);
                subCreditCardResult = text;
              }
        });
        $('#subCreditCardModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createSubCreditCardRows(subCreditCardResult) {
        var subCreditCardlen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (subCreditCardResult != null) {
                $("#subCreditCardTable").html('');
                subCreditCardlen = subCreditCardResult.SubCreditCard.length;
                CreditCardlen = subCreditCardResult.CreditCard.length;
                if (subCreditCardlen > 0) {
                    for (var i = subCreditCardlen-1; i >= 0; i--) { 
                        
                        sub_credit_len = subCreditCardResult.SubCreditCard[i].sub_credit.length;
                        //alert(sub_credit_len);
                        var Id =subCreditCardResult.SubCreditCard[i]._id;
                        var sub_cred_com_Id =subCreditCardResult.SubCreditCard[i].companyID;

                        //alert(bankAdminlen);
                        if (sub_credit_len > 0) {
                            for (var j = sub_credit_len-1; j >= 0; j--) {
                                var comId=subCreditCardResult.SubCreditCard[i].companyID;
                                var sub_credit_Id =subCreditCardResult.SubCreditCard[i].sub_credit[j]._id;
                                var  displayName=subCreditCardResult.SubCreditCard[i].sub_credit[j].displayName;
                                var  mainCardId=subCreditCardResult.SubCreditCard[i].sub_credit[j].mainCard;
                                if(CreditCardlen > 0){
                                    for (var m = CreditCardlen-1; m >= 0; m--) {
                                        var cred_com_Id =subCreditCardResult.CreditCard[m].companyID;
                                        if(sub_cred_com_Id == cred_com_Id){
                                            admin_credit_len = subCreditCardResult.CreditCard[m].admin_credit.length;
                                            for (var n = admin_credit_len-1; n >= 0; n--) {
                                                var  creditCardId=subCreditCardResult.CreditCard[m].admin_credit[n]._id;
                                                if(creditCardId == mainCardId){
                                                    var  mainCard=subCreditCardResult.CreditCard[m].admin_credit[n].displayName;
                                                }
                                                
                                            }
                                           // mainCard=subCreditCardResult.CreditCard[m].displayName;
                                        }else{
                                            mainCard='not found';
                                        }
                                        //alert(cred_com_Id);
                                    }
                                }
                                var  cardHolderName=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardHolderName;
                                var  cardNo=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardNo;
                                
                                // var openingBalance=parseFloat(openingBalance).toFixed(2);
                                var deleteStatus =subCreditCardResult.SubCreditCard[i].sub_credit[j].deleteStatus;

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var subCreditCardStr = "<tr data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='displayName' >" + displayName + "</td>" +
                                        "<td data-field='mainCard' >" + mainCard + "</td>" +
                                        "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                                        "<td data-field='cardNo' >" + cardNo + "</td>" +
                                       
                                       
                                        "<td style='text-align:center'>"+
                                        "<a class='mt-2 button-29 fs-14 text-white edit_modalSubCreditCard'  title='Edit1' data-SubcreditCardId='"+sub_credit_Id+"' data-compID='"+comId+"' ><i class='fe fe-edit'></i></a>&nbsp"+

                                        "<a class='mt-2 button-29 fs-14 text-white delete_modalSubCreditCard'  title='delete' data-SubcreditCardId='"+sub_credit_Id+"' data-compID='"+comId+"' ><i class='fe fe-trash'></i></a>&nbsp"+
                                        "</td></tr>";
            
                                    $("#subCreditCardTable").append(subCreditCardStr);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                            var subCreditCardStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#subCreditCardTable").append(subCreditCardStr);
                }
            
            }else {
            var subCreditCardStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#subCreditCardTable").append(subCreditCardStr);
        }
    }

   

// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- --> 

    //========================================== start insert data ==================================
    $(".StoreSubCreditBtn").click(function(){
        $("#AddSubCreditCardModal").modal("show");
    });
    $(".closeAddSubCreditCardModal").click(function(){
        $("#AddSubCreditCardModal").modal("hide");
    });
    $(".AddSubCreditCardModalSavebutton").click(function(){
        var displayName=$(".addSubCreditCarddisplayName").val();
        var mainCard=$(".addSubCreditCardmainCard").val();
        var cardHolderName=$(".addSubCreditCardcardHolderName").val();
        var cardNo=$(".addSubCreditCardcardNo").val();
        if(displayName=="")
        {
            swal.fire('Enter Bank display Name');
            return false;
        }
        if(mainCard=="")
        {
            swal.fire('Enter card Type');
            return false;
        }
        if(cardHolderName=="")
        {
            swal.fire('Enter carHolder Name');
            return false;
        }
        var formData=new FormData();
        formData.append('_token', $("#_tokenAddSub_creditCard").val());
        formData.append('displayName',displayName);
        formData.append('mainCard',mainCard);
        formData.append('cardHolderName',cardHolderName);
        formData.append('cardNo',cardNo);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/storesubCreditCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                swal.fire("Done!", "Sub Credit Card  added successfully", "success");
                $('#AddSubCreditCardModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getsubCreditCard",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createSubCreditCardRows(text);
                        subCreditCardResult = text;
                    }
                });
            }
        });
    })
    //==================================== end insert data =====================================


    //===================================== start update data===================================
    $("body").on('click','.edit_modalSubCreditCard',function(){
        var  id=$(this).attr("data-SubcreditCardId");
        var comId=$(this).attr('data-compID');
        $.ajax({
            type:'get',
            url:base_path+"/admin/editsubCreditCard",
            data:{id:id,comId:comId},
            success:function(res){
                $('.comIdSubCreditcardUpdate').val(res.companyID);
                $('.SubCreditCardIdUpdate').val(res._id);
                $(".updateSubCreditCarddisplayName").val(res.displayName);
                $(".updateSubCreditCardmainCard").val(res.mainCard);
                $(".updateSubCreditCardcardHolderName").val(res.cardHolderName);
                $(".updateSubCreditCardcardNo").val(res.cardNo);
            }

        })
        $("#UpdateSubCreditCardModal").modal("show");
    });
    $(".closeUpdateSubCreditCardModal").click(function(){
        $("#UpdateSubCreditCardModal").modal("hide");
    });
    $(".UpdateSubCreditCardModalSavebutton").click(function(){
        var comId=$('.comIdSubCreditcardUpdate').val();
        var id=$('.SubCreditCardIdUpdate').val();
        var displayName=$(".updateSubCreditCarddisplayName").val();
        var mainCard=$(".updateSubCreditCardmainCard").val();
        var cardHolderName=$(".updateSubCreditCardcardHolderName").val();
        var cardNo=$(".updateSubCreditCardcardNo").val();
        
        if(displayName=="")
        {
            swal.fire('Enter  display Name');
            return false;
        }
        if(mainCard=="")
        {
            swal.fire('Enter card Type');
            return false;
        }
        if(cardHolderName=="")
        {
            swal.fire('Enter carHolder Name');
            return false;
        }
        
        var formData=new FormData();
        formData.append('_token', $("#_tokenUpdateSub_creditCard").val());
        formData.append('comId',comId);
        formData.append('id',id);
        formData.append('displayName',displayName);
        formData.append('mainCard',mainCard);
        formData.append('cardHolderName',cardHolderName);
        formData.append('cardNo',cardNo);
        $.ajax({
            type: "POST",
            url: base_path + "/admin/updatesubCreditCard",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                swal.fire("Done!", "Sub Credit Card  Updated successfully", "success");
                $('#UpdateSubCreditCardModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getsubCreditCard",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createSubCreditCardRows(text);
                        subCreditCardResult = text;
                    }
                });
            }
        });
    });
    //========================================== end update data ===============================


    // ==================================== start delete data ==================================
    $('body').on('click', '.delete_modalSubCreditCard', function(){
        var  id=$(this).attr("data-SubcreditCardId");
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
                    url: base_path+"/admin/deletesubCreditCard",
                    data: { _token: $("#_tokenUpdateSub_creditCard").val(), id: id,comId:comId},
                    success: function(resp){
                        swal.fire("Done!", " Sub Credit Card Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getsubCreditCard",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createSubCreditCardRows(text);
                                subCreditCardResult = text;
                              }
                        });
                        $('#subCreditCardModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //===================================  end delete data ====================================
    //=================================== start restore card ================================
    $(".restoreSubCreditCartBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getsubCreditCard",
            async: false,
            success: function(text) {
                console.log(text);
                RestoreSubCreditCardRows(text);
                subCreditCardResult = text;
              }
        });
        $("#restoreSubcreditCardModal").modal("show");
    });
    $(".restoreSubcreditCardClose").click(function(){
        $("#restoreSubcreditCardModal").modal("hide");
    });
    function RestoreSubCreditCardRows(subCreditCardResult) {
        var subCreditCardlen = 0;
        if (subCreditCardResult != null) 
        {
            $("#RestoresubCreditCardTable").html('');
            subCreditCardlen = subCreditCardResult.SubCreditCard.length;
            CreditCardlen = subCreditCardResult.CreditCard.length;
            if (subCreditCardlen > 0) 
            {
                for (var i = subCreditCardlen-1; i >= 0; i--) 
                {    
                    sub_credit_len = subCreditCardResult.SubCreditCard[i].sub_credit.length;
                    var Id =subCreditCardResult.SubCreditCard[i]._id;
                    var sub_cred_com_Id =subCreditCardResult.SubCreditCard[i].companyID;
                    if (sub_credit_len > 0) 
                    {
                        for (var j = sub_credit_len-1; j >= 0; j--) 
                        {
                            var comId=subCreditCardResult.SubCreditCard[i].companyID;
                            var sub_credit_Id =subCreditCardResult.SubCreditCard[i].sub_credit[j]._id;
                            var  displayName=subCreditCardResult.SubCreditCard[i].sub_credit[j].displayName;
                            var  mainCardId=subCreditCardResult.SubCreditCard[i].sub_credit[j].mainCard;
                            if(CreditCardlen > 0)
                            {
                                for (var m = CreditCardlen-1; m >= 0; m--) 
                                {
                                    var cred_com_Id =subCreditCardResult.CreditCard[m].companyID;
                                    if(sub_cred_com_Id == cred_com_Id)
                                    {
                                        admin_credit_len = subCreditCardResult.CreditCard[m].admin_credit.length;
                                        for (var n = admin_credit_len-1; n >= 0; n--) 
                                        {
                                            var  creditCardId=subCreditCardResult.CreditCard[m].admin_credit[n]._id;
                                            if(creditCardId == mainCardId)
                                            {
                                                var  mainCard=subCreditCardResult.CreditCard[m].admin_credit[n].displayName;
                                            }
                                            
                                        }
                                    }
                                    else
                                    {
                                        mainCard='not found';
                                    }
                                }
                            }
                            var  cardHolderName=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardHolderName;
                            var  cardNo=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardNo;
                            var deleteStatus =subCreditCardResult.SubCreditCard[i].sub_credit[j].deleteStatus;

                            if(deleteStatus == "YES")
                            {
                             

                                var subCreditCardStr = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' class='check_SubCreditCard_one' name='all_SubCard_id[]' data-SubCard=" + sub_credit_Id+ " date-compID="+comId+"  value="+sub_credit_Id+"></td>" +
                                "<td data-field='displayName' >" + displayName + "</td>" +
                                "<td data-field='mainCard' >" + mainCard + "</td>" +
                                "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                                "<td data-field='cardNo' >" + cardNo + "</td></td></tr>";
    
                                $("#RestoresubCreditCardTable").append(subCreditCardStr);
                            }
                        }
                    }
                }
                
            }
            else 
            {
                var subCreditCardStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                $("#RestoresubCreditCardTable").append(subCreditCardStr);
            }
        
        }
        else 
        {
            var subCreditCardStr = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#RestoresubCreditCardTable").append(subCreditCardStr);
        }
    }
    $(document).on("change", ".SubcreditCard_all_ids", function() 
    {
        if(this.checked) {
            $('.check_SubCreditCard_one:checkbox').each(function() 
            {
                this.checked = true;
                SubCreditCardCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_SubCreditCard_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_SubCreditCard_one',function(){
        SubCreditCardCheckboxRestore();
    });
    function SubCreditCardCheckboxRestore()
    {
        var creditCardIds = [];
        var companyIds=[]
			$.each($("input[name='all_SubCard_id[]']:checked"), function(){
				creditCardIds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
			});
			console.log(creditCardIds);
			var SubCreditCardAllCheckedIds =JSON.stringify(creditCardIds);
			$('#checked_SubcreditCard_ids').val(SubCreditCardAllCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_SubcreditCard_company_ids').val(companyCheckedIds);


			if(creditCardIds.length > 0)
			{
				$('#restore_SubcreditCard_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_SubcreditCard_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_SubcreditCard_data',function(){
        var all_ids=$('#checked_SubcreditCard_ids').val();
        var custID=$("#checked_SubcreditCard_company_ids").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenUpdateSub_creditCard").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoresubCreditCard",
            success: function(response) {               
                swal.fire("Done!", "Credit Card Restored successfully", "success");
                $("#restoreSubcreditCardModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getsubCreditCard",
                    async: false,
                    success: function(text) {
                        createSubCreditCardRows(text);
                        subCreditCardResult = text;
                      }
                });
            }
        });
    });
    //================================= end restore card ====================================
});