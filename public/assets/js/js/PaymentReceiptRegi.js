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
        var datalength=PaymentReceiptRegResult.length;
        var no=1;
        // alert(datalength);
        for(var i=0;i<datalength;i++)
        {
            var paymentFrom=PaymentReceiptRegResult[i].data.paymenttype;
            var payto=PaymentReceiptRegResult[i].data.payto;
            var amount=PaymentReceiptRegResult[i].data.amount;
            var debitcategory=PaymentReceiptRegResult[i].data.debitcategory;
            var cheque=PaymentReceiptRegResult[i].data.cheque;
            var ach=PaymentReceiptRegResult[i].data.ach;
            var checkdate=PaymentReceiptRegResult[i].data.checkdate;
            var transactionDate=PaymentReceiptRegResult[i].data.transactionDate;
            var memo=PaymentReceiptRegResult[i].data.memo;
            // alert(paymentFrom);
            var html =
                        "<tr data-id=" + (i + 1) + ">"
                            +"<td>"+no+"</td>"+
                            "<td>"+ paymentFrom +"</td>"+
                            "<td>"+payto+"</td>"+
                            "<td>"+amount+"</td>"+
                            "<td>"+debitcategory+"</td>"+
                            "<td>"+cheque+"</td>"+
                            "<td>"+ach+"</td>"+
                            "<td>"+checkdate+"</td>"+
                            "<td>"+transactionDate+"</td>"+
                            "<td>"+memo+"</td>"+
                            "<td>"+no+"</td>"+
                        "</tr>"
                        $("#payment_recipt_table").append(html);
                        no++;
        }

    }
    //-======================================== end list view ==========================

});