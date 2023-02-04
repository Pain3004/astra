var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.accManagClose').click(function(){
        $('#accManagModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get getAccountDeliverdValue  ------------------------------------------------------------------------- -->  
   
    $('#accMana_navbar,.Delivered_tab').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getAccountDeliverdValue",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createAccManaRows(text);
                subCreditCardResult = text;
              }
        });
        $('#accManagModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get getAccountDeliverdValue  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------Get getAccountInvoiceValue  ------------------------------------------------------------------------- -->  
   
$('.Invoiced_tab').click(function(){
    //alert();
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getAccountInvoiceValue",
        async: false,
        //dataType:JSON,
        success: function(text) {
            //alert();
            console.log(text);
            createAccManaInvoiceRows(text);
            //subCreditCardInvoiceResult = text;
          }
    });
    
});


// <!-- -------------------------------------------------------------------------over Get getAccountInvoiceValue  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------Get getAccount Completed Value  ------------------------------------------------------------------------- -->  
   
$('.Completed_tab').click(function(){
    //alert();
    $.ajax({
        type: "GET",
        url: base_path+"/admin/getAccountCompletedValue",
        async: false,
        success: function(text) {
            console.log(text);
            createAccManaCompletedRows(text);
          }
    });
    
});


// <!-- -------------------------------------------------------------------------over Get getAccount Completed Value  ------------------------------------------------------------------------- --> 


// <!-- -------------------------------------------------------------------------function  getAccount Deliverd------------------------------------------------------------------------- --> 
    function createAccManaRows(AccManaResult) {
        var AccManalen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (AccManaResult != null) {
                $("#AccManaDeliveredTable").html('');
                AccManalen = AccManaResult.AccountingManager.length;
                //CreditCardlen = subCreditCardResult.CreditCard.length;
//alert(CreditCardlen);
                if (AccManalen > 0) {
                    for (var i = AccManalen-1; i >= 0; i--) { 
                        
                        load_len = AccManaResult.AccountingManager[i].load.length;
                        //alert(sub_credit_len);
                        varAccMana_Id =AccManaResult.AccountingManager[i]._id;
                        var AccMana_com_Id =AccManaResult.AccountingManager[i].companyID;

                        //alert(bankAdminlen);
                        if (load_len> 0) {
                            for (var j = load_len-1; j >= 0; j--) {

                                var  AccMana_load_Id =AccManaResult.AccountingManager[i].load[j]._id;
                                var  customername =AccManaResult.AccountingManager[i].load[j].loaddata.customername;
                                var  shipper_pickup=AccManaResult.AccountingManager[i].load[j].shipper_pickup;
                                var  cnno=AccManaResult.AccountingManager[i].load[j].cnno;
                                var  rate=AccManaResult.AccountingManager[i].load[j].rate;
                                var  loadername=AccManaResult.AccountingManager[i].load[j].loaddata.loadername;
                                var  loadertotal=AccManaResult.AccountingManager[i].load[j].loaddata.loadertotal;
                                var  status=AccManaResult.AccountingManager[i].load[j].status;
                                var  load_notes=AccManaResult.AccountingManager[i].load[j].load_notes;
                               // var  =AccManaResult.AccountingManager[i].load[j].;
                                var deleteStatus=AccManaResult.AccountingManager[i].load[j].deleteStatus;

                                var data =JSON.stringify(AccManaResult.AccountingManager[i].load[j]);

                              
                                //if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var AccManaDeleStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='AccMana_load_Id' >" + AccMana_load_Id + "</td>" +
                                        "<td data-field='cnno' >" + cnno + "</td>" +
                                        "<td data-field='shipper_pickup' >" + shipper_pickup + "</td>" +
                                        "<td data-field='customername' >" + customername + "</td>" +
                                        "<td data-field='rate' >" + rate + "</td>" +
                                        "<td data-field='loadername' >" + loadername + "</td>" +
                                        "<td data-field='loadertotal' >" + loadertotal + "</td>" +
                                        "<td data-field='status' >"+"<select class='form-control change_status_account'>"+
                                        "<option value='Delivered' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Delivered'>Delivered</option><option value='Invoiced' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Delivered'>Invoiced</option><option value='Complate' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Delivered'>Complate</option>"+
                                    "</select></td>" +
                                        "<td data-field='load_notes' >" + load_notes + "</td>" +

                                        "<td style='text-align:center'>"+
                                        "<a class='mt-2 button-23 fs-14 text-white Edit_AccountManager_details_m'  title='Edit1' data-data_status_account='Delivered' data-AccountManagerID='"+AccMana_load_Id+"' data-compID='' ><i class='fe fe-edit'></i></a>"+

                                        "<a class='mt-2 button-23 fs-14 text-white delete_AccountManager_details'  title='delete' data-AccountManagerID='"+AccMana_load_Id+"' data-data_status_account='Delivered' data-compID='' ><i class='fe fe-trash'></i></a>"+
                                       
                                        // "<td style='text-align:center'>"+
                                        //     "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+AccMana_load_Id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        // "</td>"+
                                        "</td></tr>";
            
                                    $("#AccManaDeliveredTable").append(AccManaDeleStr);
                                    no++;
                                //}
                            }
                        }
                    }
                    
                }else {
                            var AccManaDeleStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#AccManaDeliveredTable").append(AccManaDeleStr);
                }
            
            }else {
            var AccManaDeleStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#AccManaDeliveredTable").append(AccManaDeleStr);
        }
    }
// <!-- -------------------------------------------------------------------------End getAccount Deliverd------------------------------------------------------------------------ -->  
// <!-- -------------------------------------------------------------------------function getAccount Invoice ------------------------------------------------------------------------- --> 
    function createAccManaInvoiceRows(AccManaInvoiceResult) {
        var AccManaInvoicelen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (AccManaInvoiceResult != null) {
                $("#AccManaInvoicedTable").html('');
                AccManaInvoicelen = AccManaInvoiceResult.AccountingManagerInvoice.length;
                //CreditCardlen = subCreditCardResult.CreditCard.length;
    //alert(CreditCardlen);
                if (AccManaInvoicelen > 0) {
                    for (var i = AccManaInvoicelen-1; i >= 0; i--) { 
                        
                        load_len = AccManaInvoiceResult.AccountingManagerInvoice[i].load.length;
                        //alert(sub_credit_len);
                        varAccManaInvoice_Id =AccManaInvoiceResult.AccountingManagerInvoice[i]._id;
                        var AccManaInvoice_com_Id =AccManaInvoiceResult.AccountingManagerInvoice[i].companyID;

                        //alert(bankAdminlen);
                        if (load_len> 0) {
                            for (var j = load_len-1; j >= 0; j--) {

                                var  AccMana_load_Id =AccManaInvoiceResult.AccountingManagerInvoice[i].load[j]._id;
                                var  customername =AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].loaddata.customername;
                                var  shipper_pickup=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].shipper_pickup;
                                var  cnno=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].cnno;
                                var  rate=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].rate;
                                var  loadername=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].loaddata.loadername;
                                var  loadertotal=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].loaddata.loadertotal;

                                var  invoicetime=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].status_Invoiced_time;
                                var  invoiceReceiptDate=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].invoice_received_date;
                                var duedate = shipper_pickup; //+ 1 month
                                var payduedate = invoiceReceiptDate; //+ 1 month

                                var  status=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].status;
                                var  load_notes=AccManaInvoiceResult.AccountingManagerInvoice[i].load[j].load_notes;
                                var data=JSON.stringify(AccManaInvoiceResult.AccountingManagerInvoice[i].load[j]);

                                //if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var AccManaInviceStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='AccMana_load_Id' >" + AccMana_load_Id + "</td>" +
                                        "<td data-field='cnno' >" + cnno + "</td>" +
                                        "<td data-field='shipper_pickup' >" + shipper_pickup + "</td>" +
                                        "<td data-field='customername' >" + customername + "</td>" +
                                        "<td data-field='rate' >" + rate + "</td>" +
                                        "<td data-field='loadername' >" + loadername + "</td>" +
                                        "<td data-field='loadertotal' >" + loadertotal + "</td>" +
                                        "<td data-field='invoicetime' >" + invoicetime + "</td>" +
                                        "<td data-field='duedate' >" + duedate + "</td>" +
                                        "<td data-field='invoiceReceiptDate' >" + invoiceReceiptDate + "</td>" +
                                        "<td data-field='payduedate' >" + payduedate + "</td>" +
                                        "<td data-field='status' >" 
                                                +"<select class='form-control change_status_account'>"+
                                                "<option value='Invoiced' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Invoiced'>Invoiced</option><option value='Delivered' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Invoiced'>Delivered</option><option value='Complate' data-id_data='"+AccMana_load_Id+"' data-allData='"+data+"' data-sendFrom='Invoiced'>Complate</option>"+
                                            "</select>"
                                         + "</td>"  +
                                        "<td data-field='load_notes' >" + load_notes + "</td>" +

                                        "<td style='text-align:center'>"+
                                        "<a class='mt-2 button-23 fs-14 text-white Edit_AccountManager_details_m'  title='Edit1' data-AccountManagerID='"+AccMana_load_Id+"' data-data_status_account='Invoiced'  data-compID='' ><i class='fe fe-edit'></i></a>"+

                                        "<a class='mt-2 button-23 fs-14 text-white delete_AccountManager_details'  title='delete' data-AccountManagerID='"+AccMana_load_Id+"' data-data_status_account='Invoiced'  data-compID='' ><i class='fe fe-trash'></i></a></td>"+
                                    
                                        // "<td style='text-align:center'>"+
                                        //     "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+AccMana_load_Id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        // "</td>"+"
                                        "</tr>";
            
                                    $("#AccManaInvoicedTable").append(AccManaInviceStr);
                                    no++;
                                //}
                            }
                        }
                    }
                    
                }else {
                            var AccManaInviceStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#AccManaInvoicedTable").append(AccManaInviceStr);
                }
            
            }else {
            var AccManaInviceStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#AccManaInvoicedTable").append(AccManaInviceStr);
        }
    }
// <!-- -------------------------------------------------------------------------End getAccount Invoice------------------------------------------------------------------------- -->  
// <!-- -------------------------------------------------------------------------function getAccount Completed ------------------------------------------------------------------------- --> 
function createAccManaCompletedRows(AccManaCompleteResult) {
    var AccManaCompletelen = 0;
    var no=1;
        if (AccManaCompleteResult != null) {
            $("#AccManaCompleteTable").html('');
            AccManaCompletelen = AccManaCompleteResult.AccountingManagerComplete.length;
            if (AccManaCompletelen > 0) {
                for (var i = AccManaCompletelen-1; i >= 0; i--) { 
                    
                    load_len = AccManaCompleteResult.AccountingManagerComplete[i].load.length;
                    varAccManaComplete_Id =AccManaCompleteResult.AccountingManagerComplete[i]._id;
                    var AccManaComplete_com_Id =AccManaCompleteResult.AccountingManagerComplete[i].companyID;

                    if (load_len> 0) {
                        for (var j = load_len-1; j >= 0; j--) {

                            var  Invoice =AccManaCompleteResult.AccountingManagerComplete[i].load[j]._id;
                            var  Load=AccManaCompleteResult.AccountingManagerComplete[i].load[j].cnno;
                            var  ShipDate=AccManaCompleteResult.AccountingManagerComplete[i].load[j].shipper_pickup;
                            var  Customer =AccManaCompleteResult.AccountingManagerComplete[i].load[j].loaddata.customername;
                            var  LoadPay=AccManaCompleteResult.AccountingManagerComplete[i].load[j].rate;
                            var  Driver_Carrier_Owner_Operator=AccManaCompleteResult.AccountingManagerComplete[i].load[j].loaddata.loadername;
                            var  total=AccManaCompleteResult.AccountingManagerComplete[i].load[j].loaddata.loadertotal;
                            var  InvDate=AccManaCompleteResult.AccountingManagerComplete[i].load[j].status_Invoiced_time;
                            var  invoiceReceiptDate=AccManaCompleteResult.AccountingManagerComplete[i].load[j].invoice_received_date;
                            // var  ReceiptDate=AccManaCompleteResult.AccountingManagerComplete[i].load[j].;
                            // var  PayDate=AccManaCompleteResult.AccountingManagerComplete[i].load[j].;
                            var  load_notes=AccManaCompleteResult.AccountingManagerComplete[i].load[j].load_notes;
                    
                                    var AccManaCompleteStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                    "<td data-field='no'>" + no + "</td>" +
                                    "<td data-field='Invoice' >" + Invoice + "</td>" +
                                    "<td data-field='Load' >" + Load + "</td>" +
                                    "<td data-field='ShipDate' >" + ShipDate + "</td>" +
                                    "<td data-field='Customer' >" + Customer + "</td>" +
                                    "<td data-field='LoadPay' >" + LoadPay + "</td>" +
                                    "<td data-field='loadername' >" + Driver_Carrier_Owner_Operator + "</td>" +
                                    "<td data-field='total' >" + total + "</td>" +
                                    "<td data-field='invoiceReceiptDate' >" + InvDate + "</td>" +
                                    "<td data-field='invoiceReceiptDate' >" + invoiceReceiptDate + "</td>" +
                                    // "<td data-field='ReceiptDate' >" + ReceiptDate + "</td>" +
                                    // "<td data-field='PayDate' >" + PayDate + "</td>" +
                                    "<td data-field='load_notes' >" + load_notes + "</td>" +

                                    "<td style='text-align:center'>"+
                                    "<a class='mt-2 button-23 fs-14 text-white Edit_AccountManager_details_m'  title='Edit1' data-data_status_account='Complate'  data-AccountManagerID='"+Invoice+"' data-compID='' ><i class='fe fe-edit'></i></a>"+

                                    "<a class='mt-2 button-23 fs-14 text-white delete_AccountManager_details'  title='delete'  data-data_status_account='Complate' data-AccountManagerID='"+Invoice+"' data-compID='' ><i class='fe fe-trash'></i></a> </td>"+
                            
                                
                                    // "<td style='text-align:center'>"+
                                    //     "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+AccMana_load_Id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                    // "</td>"+"
                                    "</tr>";
        
                                $("#AccManaCompleteTable").append(AccManaCompleteStr);
                                no++;
                            //}
                        }
                    }
                }
                
            }else {
                        var AccManaCompleteStr = "<tr data-id=" + i + ">" +
                            "<td align='center' colspan='4'>No record found.</td>" +
                            "</tr>";
            
                        $("#AccManaCompleteTable").append(AccManaCompleteStr);
            }
        
        }else {
        var AccManaCompleteStr = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";

        $("#AccManaCompleteTable").append(AccManaCompleteStr);
    }
}
// <!-- -------------------------------------------------------------------------End getAccount Completed------------------------------------------------------------------------- -->  

//============= start update status of deleverd ==========================
$('body').on('change',".change_status_account", function(){
    var status=$(this).val();
    var id=$(this).find(':selected').attr("data-id_data");;
    var data=$(this).find(':selected').attr("data-allData");
    // alert(id);
    var sendFrom= $(this).find(':selected').attr("data-sendFrom");
    swal.fire({
        title: "Status?",
        text: "Are you sure Change Status !",
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
                url: base_path+"/admin/accountChangeStatus",
                data: { _token: $("#_tokenChangeAccountStatus").val(), status: status,id:id,data:data,sendFrom:sendFrom},
                success: function(resp){
                    swal.fire("Done!", "Changed Status In  Successfully", "success");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getAccountDeliverdValue",
                        async: false,
                        //dataType:JSON,
                        success: function(text) {
                            //alert();
                            console.log(text);
                            createAccManaRows(text);
                            subCreditCardResult = text;
                          }
                    });

                },
                error: function (resp) {
                    swal.fire("Error!", 'Something went wrong.', "error");
                }
            });
        } 
    });
    // alert(status);
});
//===================== end update status ================================

///================ start delete deliveried ==============================
$("body").on('click', '.delete_AccountManager_details',function(){
var id= $(this).attr("data-AccountManagerID");
var status= $(this).attr("data-data_status_account");
swal.fire({
    title: "Status?",
    text: "Are you sure Change Status !",
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
            url: base_path+"/admin/DeleteaccountManger",
            data: { _token: $("#_tokenChangeAccountStatus").val(), status: status,id:id},
            success: function(resp){
                swal.fire("Done!", "Deleted Deliverid successfully", "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getAccountDeliverdValue",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createAccManaRows(text);
                        subCreditCardResult = text;
                      }
                });

            },
            error: function (resp) {
                swal.fire("Error!", 'Something went wrong.', "error");
            }
        });
    } 
});
// alert(id);
})
//================= end delete deliveried ================================

});