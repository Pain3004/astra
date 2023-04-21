var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#PaymentTermsModal2, #PaymentTermsModal, #editPaymentTermsModal, #RestorePaymentTermsModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.PaymentTermsClose').click(function(){
        $('#PaymentTermsModal2').modal('hide');
    });
    $('#AddPaymentTerms').click(function(){
        // $('#PaymentTermsModal2').modal('hide');
        $('#PaymentTermsModal').modal('show');
    });
    $('.PaymentTermsModalCloseButton').click(function(){
        $('#PaymentTermsModal').modal('hide');
    });
    $('.editPayTermsClose').click(function(){
        $('#editPaymentTermsModal').modal('hide');
    });
// <!-- -------------------------------------------------------------------------Get   ------------------------------------------------------------------------- -->  
   
    $('#PaymentTerms_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getPaymentTerms",                                     
            async: false,
            success: function(text) {
                createPaymentTermsRows(text);
              }
        });
        $('#PaymentTermsModal2').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
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
                                            "<a class='editPayTerms button-23 "+editPrivilege+"'  title='Edit1' data-Id='"+payment_id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deletePayTerms button-23 "+delPrivilege+"' title='Delete' data-Id='"+payment_id+"' data-comID='"+com_Id+"'><i class='fe fe-trash'></i></a>"+
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
// <!-- -------------------------------------------------------------------------over function  ------------------------------------------------------------------------- --> 
   //-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
    $("body").on('click','.editPayTerms', function(){
        var comID =$(this).attr("data-comID");
        var Id=$(this).attr("data-Id");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editPayTerms",
            async: false,
            data:{comID:comID, Id:Id},
            //dataType:JSON,
            success: function(text) {
                $('#up_PaymentTErms_name').val(text.paymentTerm);
                $('#up_PaymentTErms_Days').val(text.paymentDays);
                $('#PayTermsComid').val(text.companyID);
                $('#PayTermsid').val(text._id);
            }
        });

        $("#editPaymentTermsModal").modal("show");
    });

    $("#PayTermsUpdate").click(function(){
    alert();
        var name =$('#up_PaymentTErms_name').val();
        var days =$('#up_PaymentTErms_Days').val();
        var compID =$('#PayTermsComid').val();
        var id =$('#PayTermsid').val();

        if(name=='')
        {
            swal.fire( "'Enter name");
            $('#up_PaymentTErms_name').focus();
            return false;            
        } 
        if(location=='')
        {
            swal.fire( "'Enter location");
            $('#up_PaymentTErms_Days').focus();
            return false;
        }
        
        $.ajax({
            
            url: base_path+"/admin/updatePaymentTerm",
            type: "POST",
            datatype:"JSON",

            data:{
                _token: $("#tokeneditPaymentTErms").val(),
                name:name,
                days:days,
                compID:compID,
                id:id,
            },
            success: function(data) {
                swal.fire("Done!", "Payment Term updated successfully", "success");

                $('#editPaymentTermsModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getPaymentTerms",
                    async: false,
                    success: function(text) {
                        createPaymentTermsRows(text);
                    }
                });
                $('#PaymentTermsModal2').modal('show');
            }
        });
    });
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------

//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
    $('body').on('click', '.deletePayTerms', function(){
        var  id=$(this).attr("data-Id");
        var comId=$(this).attr('data-comID');

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
                    url: base_path+"/admin/deletePayTerms",
                    data: { 
                        _token: $("#tokeneditPaymentTErms").val(), 
                        id: id,
                        comId:comId
                    },
                    success: function(resp){
                        swal.fire("Done!", "Payment Terms Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getPaymentTerms",
                            async: false,
                            success: function(text) {
                                createPaymentTermsRows(text);
                            }
                        });
                        $('#PaymentTermsModal2').modal('show');
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
//-- -------------------------------------------------------------------------  end delete  -- -------------------------------------------------------------------------
//------------------------------ start restore  ---------------------------------------------
$('.restorePaymentTermsclose').click(function(){
    $('#RestorePaymentTermsModal').modal('hide');
});

$("#restorePaymentTerms").click(function(){
    $.ajax({
        type: "GET",
        url: base_path + "/admin/getPaymentTerms",
        async: false,
        success: function (RestoreResult) {
           RestoreExternalCarrier(RestoreResult);
        }
    });
    $('#RestorePaymentTermsModal').modal('show');
});

function RestoreExternalCarrier(RestoreResult)
{
    var R_Len = 0;
    if (RestoreResult != null) {
        $("#RestorePaymentTermsTable").html('');
        var data=RestoreResult.PaymentTterms.length;
        // PaymentTermslen = PaymentTermsResult.PaymentTterms.length;
        for(var i=0; i<data; i++)
        {
            R_Len = RestoreResult.PaymentTterms[i].payment.length;
            if(R_Len != null)
            {
                var no=1;
                for(var j=R_Len-1; j>=0; j--)
                {
                    var com_Id=RestoreResult.PaymentTterms[i].companyID;
                    var id=RestoreResult.PaymentTterms[i].payment[j]._id;
                    var name =RestoreResult.PaymentTterms[i].payment[j].paymentTerm;
                    var days =RestoreResult.PaymentTterms[i].payment[j].paymentDays;
                    var deleteStatus =RestoreResult.PaymentTterms[i].payment[j].deleteStatus;

                    if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                    {
                        var R_str = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' name='checkPaymentTermsOne[]' class='checkedIdsOnePaymentTerms' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-id='"+id+"'></td>" +
                            "<td >" + name + "</td>" +
                            "<td>" + days + "</td>" +
                        $("#RestorePaymentTermsTable").append(R_str);
                        no++;
                    }
                }
            }
            else
            {
                var R_str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
                $("#RestorePaymentTermsTable").append(R_str);
            }                  
        }
    }
    else
    {
        var R_str = "<tr data-id=" + i + ">" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";
        $("#RestorePaymentTermsTable").append(R_str);
    }
}
$(document).on("change", ".PaymentTerms_all_ids", function() 
{
    if(this.checked) {
        $('.checkedIdsOnePaymentTerms:checkbox').each(function() 
        {
            this.checked = true;
            PaymentTermsCheckboxRestore();
        });
    } 
    else 
    {
        $('.checkedIdsOnePaymentTerms:checkbox').each(function() {
            this.checked = false;
        });
    }
});
$('body').on('click','.checkedIdsOnePaymentTerms',function(){
    PaymentTermsCheckboxRestore();
});
function PaymentTermsCheckboxRestore()
{
    var PaymentTermsds = [];
    var companyIds=[]
        $.each($("input[name='checkPaymentTermsOne[]']:checked"), function(){
            PaymentTermsds.push($(this).val());
            companyIds.push($(this).attr("data-comId"));
        });
        var braOffIds =JSON.stringify(PaymentTermsds);
        $('#checked_PaymentTerms').val(braOffIds);
       
        var companyCheckedIds =JSON.stringify(companyIds);
        $('#checked_PaymentTerms_company_ids').val(companyCheckedIds);

        if(PaymentTermsds.length > 0)
        {
            $('#restore_PaymentTermsData').removeAttr('disabled');
        }
        else
        {
            $('#restore_PaymentTermsData').attr('disabled',true);
        }
}
$('body').on('click','.restore_PaymentTermsData',function(){
   
    var all_ids=$('#checked_PaymentTerms').val();
    //alert(all_ids);
    var custID=$("#checked_PaymentTerms_company_ids").val();
    $.ajax({
        type:"post",
        data:{
            _token:$("#tokeneditPaymentTErms").val(),
            all_ids:all_ids,
            custID:custID
        },
        url: base_path+"/admin/restorePaymentTerms",
        success: function(response) {               
            swal.fire("Payment Terms Restored successfully");
            $("#RestorePaymentTermsModal").modal("hide");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getPaymentTerms",
                async: false,
                success: function(text) {
                    createPaymentTermsRows(text);
                }
            });
            // $('#PaymentTermsModal').modal('show');
        }
    });
});
// ---------------------------------------------end restore  ---------------------------------------------
// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});