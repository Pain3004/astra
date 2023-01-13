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
        $("#payment_recipt_table").html();
        var no=1;
        var PaymentBankLength=PaymentReceiptRegResult.PaymentBank
        PaymentBankLength.forEach(function(paymentbank)  {
            if(typeof(paymentbank.August) != "undefined" && paymentbank.August !== null)
            {
                var augustlength=paymentbank.August.length;
            } 
            else
            {
                var augustlength=0;
            }   
            // var augustlength=paymentbank.August;
            for(var i=0;i<augustlength;i++)
            {
                var categoryDeLeng=PaymentReceiptRegResult.BankDebitCategory.bank_debit.length;
                var categoryDe=PaymentReceiptRegResult.BankDebitCategory.bank_debit;
                var companyLength=PaymentReceiptRegResult.Company.company.length;
                var companyL=PaymentReceiptRegResult.Company.company;
                for(var j=0; j<categoryDeLeng;j++)
                {
                    // alert(categoryDe[j]._id);
                    // cateAr.push(categoryDe[j]._id);
                    if(paymentbank.August[i].debitcategory==categoryDe[j]._id)
                    {
                      var category= categoryDe[j].bankName; 
                    }
                    else
                    {
                        var category= '-----'; 
                    }
                    // for(var v=0;v<companyLength;v++)
                    // {
                    //     if(paymentbank.August[i].companyselect==companyL[v]._id)
                    //     {
                    //       var paymentFrom= companyL[v].companyName; 
                    //     }
                    //     else
                    //     {
                    //         var paymentFrom= '-----'; 
                    //     }
                    // cateName.push(categoryDe[j].name);
               
                        // var paymentFrom=paymentbank.August[i].companyselect;
                        var payTo=paymentbank.August[i].payto;
                        var amount=paymentbank.August[i].amount;
                        // var category=paymentbank.August[i].debitcategory;
                        var Cheque=paymentbank.August[i].cheque;
                        var ACH=paymentbank.August[i].ach;
                        var checkdat=paymentbank.August[i].checkdate;
                        var transactionDat=paymentbank.August[i].transactionDate;
                        var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        var date = new Date(checkdat*1000);
                        var year = date.getFullYear();
                        var month = months_arr[date.getMonth()];
                        var day = date.getDate();
                        var checkdate = month+'/'+day+'/'+year;

                        var date = new Date(transactionDat*1000);
                        var year = date.getFullYear();
                        var month = months_arr[date.getMonth()];
                        var day = date.getDate();
                        var transactionDate = month+'/'+day+'/'+year;
                        var memo=paymentbank.August[i].memo;
                        
                        var html =
                                "<tr data-id=" + (i + 1) + ">"
                                    +"<td>"+no+"</td>"+
                                    "<td>"+ paymentFrom +"</td>"+
                                    "<td>"+payTo+"</td>"+
                                    "<td>"+amount+"</td>"+
                                    "<td>"+category+"</td>"+
                                    "<td>"+Cheque+"</td>"+
                                    "<td>"+ACH+"</td>"+
                                    "<td>"+checkdate+"</td>"+
                                    "<td>"+transactionDate+"</td>"+
                                    "<td>"+memo+"</td>"+
                                    "<td>"+no+"</td>"+
                                "</tr>"
                                $("#payment_recipt_table").append(html);
                                no++;
                    // }
                }
            }
            
        });
        // var datalength=PaymentReceiptRegResult.length;
        // var no=1;
        // alert(datalength);
        // for(var i=0;i<datalength;i++)
        // {
        //     var paymentFrom=PaymentReceiptRegResult[i].data.paymenttype;
        //     var payto=PaymentReceiptRegResult[i].data.payto;
        //     var amount=PaymentReceiptRegResult[i].data.amount;
        //     var debitcategory=PaymentReceiptRegResult[i].data.debitcategory;
        //     var cheque=PaymentReceiptRegResult[i].data.cheque;
        //     var ach=PaymentReceiptRegResult[i].data.ach;
        //     var checkdate=PaymentReceiptRegResult[i].data.checkdate;
        //     var transactionDate=PaymentReceiptRegResult[i].data.transactionDate;
        //     var memo=PaymentReceiptRegResult[i].data.memo;
        //     // alert(paymentFrom);
        //     var html =
        //                 "<tr data-id=" + (i + 1) + ">"
        //                     +"<td>"+no+"</td>"+
        //                     "<td>"+ paymentFrom +"</td>"+
        //                     "<td>"+payto+"</td>"+
        //                     "<td>"+amount+"</td>"+
        //                     "<td>"+debitcategory+"</td>"+
        //                     "<td>"+cheque+"</td>"+
        //                     "<td>"+ach+"</td>"+
        //                     "<td>"+checkdate+"</td>"+
        //                     "<td>"+transactionDate+"</td>"+
        //                     "<td>"+memo+"</td>"+
        //                     "<td>"+no+"</td>"+
        //                 "</tr>"
        //                 $("#payment_recipt_table").append(html);
        //                 no++;
        // }

    }
    //-======================================== end list view ==========================

});