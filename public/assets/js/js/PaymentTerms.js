var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#PaymentTermsModal2, #PaymentTermsModal, #editPaymentTermsModal').modal({
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
                // console.log(text);
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
    // $('#branchOfficeModal').modal('hide');
    var name =$('#up_PaymentTErms_name').val();
    var days =$('#up_PaymentTErms_Days').val();
    var compID =$('#PayTermsComid').val();
    var id =$('#PayTermsid').val();
//    var tokan=$('#tokeneditbranchOffice').val();

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
            console.log(data)                    
            swal.fire("Done!", "Payment Term updated successfully", "success");

            $('#editPaymentTermsModal').modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getPaymentTerms",
                async: false,
                success: function(text) {
                    console.log(text);
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
                            console.log(text);
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
// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});