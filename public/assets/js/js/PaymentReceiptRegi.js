var base_path = $("#url").val();
$(document).ready(function(){
    //========================== view payment & receipt Registrion =======================
    $("#paymentReceiptRegistration").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getPaymentReceipt",
            async: false,
            success: function(text) {
                createPaymentReceiptReg(text);
                PaymentReceiptRegResult = text;
             }
        });
        $("#paymentReRegistrionPopModal").modal("show");
    });
    $(".paymentReceiptRegisClose").click(function(){
        $("#paymentReRegistrionPopModal").modal("hide");
    });
    function createPaymentReceiptReg(PaymentReceiptRegResult)
    {
        // $("#payment_recipt_table").html();
        // var no=1;
        // var PaymentBankLength=PaymentReceiptRegResult.PaymentBank
        // PaymentBankLength.forEach(function(paymentbank)  {
        //     if(typeof(paymentbank.August) != "undefined" && paymentbank.August !== null)
        //     {
        //         var augustlength=paymentbank.August.length;
        //     } 
        //     else
        //     {
        //         var augustlength=0;
        //     }   
        //     for(var i=0;i<augustlength;i++)
        //     {
        //         var categoryDeLeng=PaymentReceiptRegResult.BankDebitCategory.bank_debit.length;
        //          var categoryDe=PaymentReceiptRegResult.BankDebitCategory.bank_debit;
        //         category_id=[];
        //         var l=0;
        //         for(var j=0; j<categoryDeLeng;j++)
        //         {
        //             category_id.push(categoryDe[j]._id);
        //         }
        //         var paymentId=[];
        //         var companyLength=PaymentReceiptRegResult.Company.company.length;
        //         var companyL=PaymentReceiptRegResult.Company.company;        
        //         var paymentFromID=paymentbank.August[i].companyselect;
        //         for(var j=0; j<companyLength;j++)
        //         {
        //             paymentId.push(companyL[j]._id);
        //         }   
        //         if($.inArray(paymentFromID,paymentId))
        //         {
        //             paymentId.forEach(function(data)  {
        //                 if(data==paymentFromID)
        //                 {
        //                     l=paymentFromID;
        //                 }
        //             });
        //             var paymentFrom=PaymentReceiptRegResult.Company.company[l].companyName;
        //         }
        //         else
        //         {
        //             var paymentFrom="-----";
        //         }    
        //         var  categoryDe=paymentbank.August[i].debitcategory;
        //         var payTo=paymentbank.August[i].payto;
        //         var amount=paymentbank.August[i].amount;
        //         var v=0;
        //         if($.inArray(categoryDe,category_id))
        //         {
        //             category_id.forEach(function(data)  {
        //                 if(data==categoryDe)
        //                 {
        //                     v=categoryDe;
        //                 }
        //             });
        //             var category=PaymentReceiptRegResult.BankDebitCategory.bank_debit[v].bankName;
        //         }
        //         else
        //         {
        //             var category="-----";
        //         } var payId=paymentbank.August[i]._id;
        //         var Cheque=paymentbank.August[i].cheque;
        //         var ACH=paymentbank.August[i].ach;
        //         var checkdat=paymentbank.August[i].checkdate;
        //         var transactionDat=paymentbank.August[i].transactionDate;
        //         var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
        //         var date = new Date(checkdat*1000);
        //         var year = date.getFullYear();
        //         var month = months_arr[date.getMonth()];
        //         var day = date.getDate();
        //         var checkdate = month+'/'+day+'/'+year;
        //         var date = new Date(transactionDat*1000);
        //         var year = date.getFullYear();
        //         var month = months_arr[date.getMonth()];
        //         var day = date.getDate();
        //         var transactionDate = month+'/'+day+'/'+year;
        //         var memo=paymentbank.August[i].memo;
        //         var html =
        //                 "<tr data-id=" + (i + 1) + ">"
        //                     +"<td>"+no+"</td>"+
        //                     "<td>"+ paymentFrom +"</td>"+
        //                     "<td>"+payTo+"</td>"+
        //                     "<td>"+amount+"</td>"+
        //                     "<td>"+category+"</td>"+
        //                     "<td>"+Cheque+"</td>"+
        //                     "<td>"+ACH+"</td>"+
        //                     "<td>"+checkdate+"</td>"+
        //                     "<td>"+transactionDate+"</td>"+
        //                     "<td>"+memo+"</td>"+
        //                     "<td>"+
        //                     "<a class='mt-2 button-29 fs-14 text-white '  title='Edit1' data-paymentId='"+payId+"' data-compID='' ><i class='fe fe-edit'></i></a>&nbsp"+

        //                     "<a class='mt-2 button-29 fs-14 text-white '  title='Edit1' data-paymentId='"+payId+"' data-compID='' ><i class='fe fe-trash'></i></a>&nbsp"+

        //                     "<a class='mt-2 button-29 fs-14 text-white '  title='Edit1' data-paymentId='"+payId+"' data-compID='' ><i class='fe fe-upload'></i></a>&nbsp"+
        //                     "</td>"+
        //                 "</tr>"
        //                 $("#payment_recipt_table").append(html);
        //                 no++;
        //     }
            
        // });
    }
    //-======================================== end list view ==========================

    //======================= start payment registrion store ==============================
    $(".createPaymentReceiptModalBtn").click(function(){
        $(".bank_1FillDetails").hide();
        $(".BankTransfer4FillDetails").hide();
        $(".creditCard2FillData").hide();
        $(".fuelCardFillDetails").hide();
        $(".otherDetailsFill").hide();
        $("#addPaymentRegistrionModal").modal("show");
    });
    $(".paymentFromOnChange").on('change',function( ){
        var valu=$(this).val();
        if(valu==1)
        {
            $(".bank_1FillDetails").show();
            // $(".otherDetailsFill").show();
        }
    })
    $(".closeAddPaymentRegistrion").click(function(){
        $("#addPaymentRegistrionModal").modal("hide");
    });
    $(".saveAddPaymentRegistrion").click(function(){
        $.ajax({
            type: "POST",
            url: base_path+"/admin/payment",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            // data:formData,
            success: function(data) {
                // console.log(data)                    
                swal.fire("Done!", "success", "success");
            }
        });
    })
    //======================= end payment registrion store ==============================

});