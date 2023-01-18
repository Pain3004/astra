var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.fuelReceiptClose').click(function(){
        $('#fuelReceiptModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#fuelReceipt_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelReceipt",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createFuelReceiptRows(text);
                FuelReceiptResult = text;
             }
        });
        $('#fuelReceiptModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createFuelReceiptRows(FuelReceiptResult) {
        var fuelReceiptlen = 0;
        //alert(FuelVendorResult);
            if (FuelReceiptResult != null) {
                
                fuelReceiptlen = FuelReceiptResult.fuel_receipt.length;

                $("#FuelReceTable").html('');

                if (fuelReceiptlen > 0) {
                   
                    var no=1;
                    for (var i = fuelReceiptlen-1; i >= 0; i--) {  
                        var custID=FuelReceiptResult.companyID;
                        if(typeof(FuelReceiptResult.fuel_receipt[i].paymentType) != "undefined" && FuelReceiptResult.fuel_receipt[i].paymentType !== null)
                        {
                            var paymentType=FuelReceiptResult.fuel_receipt[i].paymentType;
                        } 
                        else
                        {
                            paymentType="----";
                        }     
                        // var paymentType=FuelReceiptResult.fuel_receipt[i].driverName;
                        var fuelReceiptId =FuelReceiptResult.fuel_receipt[i]._id;
                        var driverName =FuelReceiptResult.fuel_receipt[i].driverName;
                        var transactionDate =new Date(FuelReceiptResult.fuel_receipt[i].transactionDate);
                        var cardNo =FuelReceiptResult.fuel_receipt[i].cardNo;
                        var truckNumber =FuelReceiptResult.fuel_receipt[i].truckNumber;
                        var driverNumber =FuelReceiptResult.fuel_receipt[i].driverNumber;
                        var transactionTime =FuelReceiptResult.fuel_receipt[i].transactionTime;
                        var locationName =FuelReceiptResult.fuel_receipt[i].locationName;
                        var locationCity =FuelReceiptResult.fuel_receipt[i].locationCity;
                        var locationState =FuelReceiptResult.fuel_receipt[i].locationState;
                        var fuelVendor =FuelReceiptResult.fuel_receipt[i].category;
                        var  fuelType=FuelReceiptResult.fuel_receipt[i].fuelType;
                        var amount =FuelReceiptResult.fuel_receipt[i].amount;
                        var quantity =FuelReceiptResult.fuel_receipt[i].quantity;
                        var totalAmount =FuelReceiptResult.fuel_receipt[i].totalAmount;
                        var transactionDiscount =FuelReceiptResult.fuel_receipt[i].transactionDiscount;
                        var transactionFee =FuelReceiptResult.fuel_receipt[i].transactionFee;
                        var transactionGross =FuelReceiptResult.fuel_receipt[i].transactionGross;
                        var invoiceNo =FuelReceiptResult.fuel_receipt[i].invoiceNo;
                        var deleteStatus =FuelReceiptResult.fuel_receipt[i].deleteStatus;
                        //alert(fuelCardId);
                        if(FuelReceiptResult.fuel_receipt[i].transactionDate != null)
                        {
                            transactionDate= ((transactionDate.getMonth() > 8) ? (transactionDate.getMonth() + 1) : ('0' + (transactionDate.getMonth() + 1))) + '/' + ((transactionDate.getDate() > 9) ? transactionDate.getDate() : ('0' + transactionDate.getDate())) + '/' + transactionDate.getFullYear();
                        }
                        else
                        {
                            transactionDate="----";
                        }

                        if(deleteStatus == "NO"){
                            //alert("ff");
                            var fuelReceStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field=''><input type='checkbox' class='check_fuelRecept_one_delete' name='all_fuel_recepit_ids_delete[]' data-id=" + fuelReceiptId+ " date-cusId="+custID+"  value="+fuelReceiptId+"></td>" +
                            "<td data-field='no'>" + no + "</td>" +
                            "<td data-field='driverName' >" + driverName + "</td>" +
                            "<td data-field='transactionDate' >" + transactionDate + "</td>" +
                            "<td data-field='cardNo' >" + paymentType + "</td>" +
                            "<td data-field='cardNo' >" + cardNo + "</td>" +
                            "<td data-field='truckNumber' >" + truckNumber + "</td>" +
                            "<td data-field='driverNumber' >" + driverNumber + "</td>" +
                            "<td data-field='transactionTime' >" + transactionTime + "</td>" +
                            "<td data-field='locationName' >" + locationName + "</td>" +
                            "<td data-field='locationCity' >" + locationCity + "</td>" +
                            "<td data-field='locationState' >" + locationState + "</td>" +
                            "<td data-field='fuelVendor' >" + fuelVendor + "</td>" +
                            "<td data-field='fuelType' >" + fuelType + "</td>" +
                            "<td data-field='amount' >" + amount + "</td>" +
                            "<td data-field='quantity' >" + quantity + "</td>" +
                            "<td data-field='totalAmount' >" + totalAmount + "</td>" +
                            "<td data-field='transactionDiscount' >" + transactionDiscount + "</td>" +
                            "<td data-field='transactionFee' >" + transactionFee + "</td>" +
                            "<td data-field='transactionGross' >" + transactionGross + "</td>" +
                            "<td data-field='invoiceNo' >" + invoiceNo + "</td>" +
                       
                            "<td style='text-align:center'>"+
                                "<a class='mt-2 button-29 edit_fuel_receipts_form fs-14 text-white '  title='Edit1' data-fuelReId='"+fuelReceiptId+"' data-com_Id='"+custID+"' ><i class='fe fe-edit'></i></a>&nbsp"+

                                "<a class='mt-2 button-29 fs-14 text-white delete_fuel_receipts_form'  title='Edit1' data-fuelReId='"+fuelReceiptId+"' data-com_Id='"+custID+"'  ><i class='fe fe-trash'></i></a>&nbsp"+
                            "</td></tr>";

                        $("#FuelReceTable").append(fuelReceStr);
                        no++;
                        }
                    }
                } else {
                    var fuelReceStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#FuelReceTable").append(fuelReceStr);
                }
            }else {
            var fuelReceStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#FuelReceTable").append(fuelReceStr);
        }
    }

   

    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- --> 
    
    $(".fuelReceiptCloselist").click(function(){
        $('#fuelReceiptModal').modal('hide');
    });
    //========================================  create fuel receipts ===========================
    $(".create_fuel_receipt_modal_form_btn").click(function(){
        $("#Create_FuelReceiptsModal").modal("show");
    });
    $(".cardHolderName").on('change',function(){
        var val = $(this).val();
        var name=$('option:selected', this).attr('data_driver_name_for_recepits');
        // alert(name);
        $(".driver_name_fuelReceipt").val(name);
        $(".driver_name_fuelReceipt_edit").val(name);
        $(".add_fuelReceiptDriverNumber").val(val);
        $(".update_fuelReceiptDriverNumber").val(val);

        $.ajax({
            type: "GET",
            url: base_path + "/admin/getFuelCard",
            async: false,
            success: function (text) {
                // driverId=$('.cardHolderName').val();
                var ifta_card=text.FuelCard.ifta_card.length;
                var ifta_card_nu=text.FuelCard.ifta_card;
                $(".total_cards_fuel_re").html();
                for(var i=0;i<ifta_card;i++)
                {
                    if(val==ifta_Card_no==ifta_card_nu[i].cardHolderName)
                    {
                        var ifta_Card_no=ifta_card_nu[i].iftaCardNo;
                        var vendor_type=ifta_card_nu[i].cardType;
                        // alert(vendor_type);
                        var html="<option data_att_vendor_id='"+vendor_type+"' value='"+ifta_Card_no+"'> "+ifta_Card_no+"</option>"
                        
                        $(".total_cards_fuel_re").append(html);
                    }
                }
            }
        });


    });
    $(".fetchInvoicenumberbyNamv").click(function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getInvoicedNumber",
            async: false,
            success: function (text) {
                $(".fuel_recepit_invoice_no_list").html();
                var len2 = text.load.length;
                $('.fuel_recepit_invoice_no_list').html();
                var html = "";
                for (var j = 0; j < len2; j++) {
                    var driverId = text.load[j]._id;
                    var html = "<option value='" + driverId + "'>" + driverId + " </option>";
                    $(".fuel_recepit_invoice_no_list").append(html);
                }
            }
        });
    });
    

    $(".total_cards_fuel_re").on("change",function(){
        var data = $('option:selected', this).attr('data_att_vendor_id');   
        // alert(data);
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getFuelCard",
            async: false,
            success: function (text) {
                var cardNumLeng=text.FuelVendor.fuelCard.length;
                var cardType=text.FuelVendor.fuelCard;
                // alert(cardNumLeng);
                // alert(cardType);
                for(var i=0;i<cardNumLeng;i++)
                {
                    var ifta_Card_no=cardType[i]._id;
                    // alert(ifta_Card_no +" "+ data)
                    if(data==ifta_Card_no)
                    {
                        var card_t=cardType[i].fuelCardType;
                        // alert(card_t);
                        $(".seleted_fuel_vend_type").val(card_t);
                    }
                    
                }
            }
        });
    })
    // ============== payment type logic==============================================
    $(".paymentType").on("change",function(){
        var paymentType=$(this).val();
        if(paymentType=="Receipt")
        {
            $(".driver_nu_cashAd").show();
        }
        else
        {
            $(".driver_nu_cashAd").hide();
        }
    });



    $(".closeFuelReceiptsModal").click(function(){
        $("#Create_FuelReceiptsModal").modal("hide");
    });
    $(".saveFuelReceiptsModal").click(function(){
        var driverName=$('.driver_name_fuelReceipt').val();

        // var driverName = $('.addFuelReceiptDriver_name').attr('data_driver_name_for_recepits');
        // alert(data);
        // alert(driverName); 
        var driverNo = $('.add_fuelReceiptDriverNumber').val();
        var cardNumber = $('.addFuelReceiptCardNumber').val();
        var fuelVendor = $('.addFuelReceiptFuelVendor').val();
        var fuelType = $('.addFuelReFuelType').val();
        var truckNumber = $('.addFuelReceiptTruckNumber').val();
        var paymentType = $('.apayment_type_fuel_re').val();
        var date = $('.addFuelReceiptDate').val();
        var transactionTime = $('.addFuelReceiptTransactionTime').val();
        var locationName = $('.addFuelReceiptLocationName').val();
        var locationCity = $('.addFuelReceiptLocationCity').val();
        var locationState = $('.addFuelReceiptLocationState').val();
        var quantity = $('.addFuelReceiptQuantity').val();
        var amount = $('.addFuelReceiptAmount').val();
        var totalAmount = $('.addFuelReceipttotalAmount').val();
        var transactionDiscount = $('.addFuelReceipttransactionDiscount').val();
        var transactionFee = $('.addFuelReceipttransactionFee').val();
        var transactionGross = $('.addFuelReceipttransactionGross').val();
        var invoiceNo = $('.addFuelReceiptinvoiceNo').val();
        if(paymentType=="")
        {
            swal.fire( "'select PaymentType");
            $('.apayment_type_fuel_re').focus();
            return false;    
        }
        if(driverName=='')
        {
            swal.fire( "'select driver");
            $('.addFuelReceiptDriver_name').focus();
            return false;            
        }
        if(truckNumber=='')
        {
            swal.fire( "'Enter Truck Number");
            $('.addFuelReceiptTruckNumber').focus();
            return false;            
        }
        if(date=='')
        {
            swal.fire( "'Enter Date");
            $('.addFuelReceiptDate').focus();
            return false;            
        }
        if(transactionTime=='')
        {
            swal.fire( "'Enter Transaction Time");
            $('.addFuelReceiptTransactionTime').focus();
            return false;            
        }
        if(locationName=='')
        {
            swal.fire( "'Enter Location Name");
            $('.addFuelReceiptLocationName').focus();
            return false;            
        }
        if(locationState=='')
        {
            swal.fire( "'Enter Location State");
            $('.addFuelReceiptLocationState').focus();
            return false;            
        }
        if(quantity=='')
        {
            swal.fire( "'Enter Quantity");
            $('.addFuelReceiptQuantity').focus();
            return false;            
        }
        if(amount=='')
        {
            swal.fire( "'Enter Amount");
            $('.addFuelReceiptAmount').focus();
            return false;            
        }
        var formData = new FormData();
        formData.append('_token',$("#_token_addFuelReceipts").val());        
        formData.append('driverName',driverName);  
        formData.append('paymentType',paymentType);     
        formData.append('driverNo',driverNo);       
        formData.append('cardNumber',cardNumber);       
        formData.append('fuelVendor',fuelVendor);       
        formData.append('fuelType',fuelType);       
        formData.append('truckNumber',truckNumber);       
        formData.append('date',date);       
        formData.append('transactionTime',transactionTime);       
        formData.append('locationName',locationName);       
        formData.append('locationState',locationState);       
        formData.append('locationCity',locationCity);       
        formData.append('quantity',quantity);       
        formData.append('amount',amount);       
        formData.append('totalAmount',totalAmount);       
        formData.append('transactionDiscount',transactionDiscount);       
        formData.append('transactionFee',transactionFee);       
        formData.append('transactionGross',transactionGross);       
        formData.append('invoiceNo',invoiceNo); 
        $.ajax({
            type: "POST",
            url: base_path+"/admin/saveFuelReceipt",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success:function(response){
                swal.fire("Done!", "Fuel recepit added successfully", "success");
                $('#Create_FuelReceiptsModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelReceipt",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createFuelReceiptRows(text);
                        FuelReceiptResult = text;
                     }
                });
            }
        })
    });
    //======================================= end create fuel receipts ========================

    //============================ update fuel receipts data ===================
    $('body').on('click','.edit_fuel_receipts_form', function(){
        var id=$(this).attr('data-fuelReId');
        var companyID=$(this).attr('data-com_Id');
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editFuelReceipt",
            data:{id:id,companyID:companyID},
            async: false,
            success: function(res) {
                    $('.comp_id_furl_re_edit').val(res.companyID);
                    $('.fuel_recepit_id_edit').val(res.fuel_receipt._id);
                    $('.driver_name_fuelReceipt_edit').val(res.fuel_receipt.driverName);
                    $('.updateFuelReceipt_Driver_name').val(res.fuel_receipt.driverNumber);
                    if(typeof(res.fuel_receipt.paymentType) != "undefined" && res.fuel_receipt.paymentType !== null)
                    {
                         $('.updateapayment_type_fuel_re').val(res.fuel_receipt.paymentType);
                    }                   
                    $('.update_fuelReceiptDriverNumber').val(res.fuel_receipt.driverNumber);
                    $('.updateFuelReceiptCardNumber').val(res.fuel_receipt.cardNo);
                    $('.updateFuelReceiptFuelVendor').val(res.fuel_receipt.category);
                    $('.updateFuelReFuelType').val(res.fuel_receipt.fuelType);
                    $('.updateFuelReceiptTruckNumber').val(res.fuel_receipt.truckNumber);
                    $('.updateFuelReceiptDate').val(res.fuel_receipt.transactionDate);
                    $('.updateFuelReceiptTransactionTime').val(res.fuel_receipt.transactionTime);
                    $('.updateFuelReceiptLocationName').val(res.fuel_receipt.locationName);
                    $('.updateFuelReceiptLocationCity').val(res.fuel_receipt.locationCity);
                    $('.updateFuelReceiptLocationState').val(res.fuel_receipt.locationState);
                    $('.updateFuelReceiptQuantity').val(res.fuel_receipt.quantity);
                    $('.updateFuelReceiptAmount').val(res.fuel_receipt.amount);
                    $('.updateFuelReceipttotalAmount').val(res.fuel_receipt.totalAmount);
                    $('.updateFuelReceipttransactionDiscount').val(res.fuel_receipt.transactionDiscount);
                    $('.updateFuelReceipttransactionFee').val(res.fuel_receipt.transactionFee);
                    $('.updateFuelReceipttransactionGross').val(res.fuel_receipt.transactionGross);
                    $('.UpdateFuelReceiptinvoiceNo').val(res.fuel_receipt.invoiceNo);
             }
        });
        $("#update_FuelReceiptsModal").modal("show");
    });
    $('.closeUpdateFuelReceiptsModal').click(function(){
        $("#update_FuelReceiptsModal").modal("hide");
    });
    $('.UpdateFuelReceiptsModal').click(function(){
        var id=$(".fuel_recepit_id_edit").val();
        var comId=$(".comp_id_furl_re_edit").val();
        var driverName = $(".driver_name_fuelReceipt_edit").val();
        var paymentType=$('.updateapayment_type_fuel_re').val();
        var driverNo = $('.update_fuelReceiptDriverNumber').val();
        var cardNumber = $('.updateFuelReceiptCardNumber').val();
        var fuelVendor = $('.updateFuelReceiptFuelVendor').val();
        var fuelType = $('.updateFuelReFuelType').val();
        var truckNumber = $('.updateFuelReceiptTruckNumber').val();
        var date = $('.updateFuelReceiptDate').val();
        var transactionTime = $('.updateFuelReceiptTransactionTime').val();
        var locationName = $('.updateFuelReceiptLocationName').val();
        var locationCity = $('.updateFuelReceiptLocationCity').val();
        var locationState = $('.updateFuelReceiptLocationState').val();
        var quantity = $('.updateFuelReceiptQuantity').val();
        var amount = $('.updateFuelReceiptAmount').val();
        var totalAmount = $('.updateFuelReceipttotalAmount').val();
        var transactionDiscount = $('.updateFuelReceipttransactionDiscount').val();
        var transactionFee = $('.updateFuelReceipttransactionFee').val();
        var transactionGross = $('.updateFuelReceipttransactionGross').val();
        var invoiceNo = $('#UpdateFuelReceiptinvoiceNo').val();
        // alert(invoiceNo);
        // alert(r);
        if(paymentType=="")
        {
            swal.fire( "'select PaymentType");
            $('.updateapayment_type_fuel_re').focus();
            return false;    
        }
        if(driverName=='')
        {
            swal.fire( "'select one");
            $('.updateFuelReceiptDriver_name').focus();
            return false;            
        }
        if(truckNumber=='')
        {
            swal.fire( "'Enter Truck Number");
            $('.updateFuelReceiptTruckNumber').focus();
            return false;            
        }
        if(date=='')
        {
            swal.fire( "'Enter Date");
            $('.updateFuelReceiptDate').focus();
            return false;            
        }
        if(transactionTime=='')
        {
            swal.fire( "'Enter Transaction Time");
            $('.updateFuelReceiptTransactionTime').focus();
            return false;            
        }
        if(locationName=='')
        {
            swal.fire( "'Enter Location Name");
            $('.updateFuelReceiptLocationName').focus();
            return false;            
        }
        if(locationState=='')
        {
            swal.fire( "'Enter Location State");
            $('.updateFuelReceiptLocationState').focus();
            return false;            
        }
        if(quantity=='')
        {
            swal.fire( "'Enter Quantity");
            $('.updateFuelReceiptQuantity').focus();
            return false;            
        }
        if(amount=='')
        {
            swal.fire( "'Enter Amount");
            $('.updateFuelReceiptAmount').focus();
            return false;            
        }
        var formData = new FormData();
        formData.append('_token',$("#_token_updateFuelReceipts").val());         
        formData.append('id',id);          
        formData.append('comId',comId);         
        formData.append('driverName',driverName); 
        formData.append('paymentType',paymentType);       
        formData.append('driverNo',driverNo);       
        formData.append('cardNumber',cardNumber);       
        formData.append('fuelVendor',fuelVendor);       
        formData.append('fuelType',fuelType);       
        formData.append('truckNumber',truckNumber);       
        formData.append('date',date);       
        formData.append('transactionTime',transactionTime);       
        formData.append('locationName',locationName);       
        formData.append('locationState',locationState);       
        formData.append('locationCity',locationCity);       
        formData.append('quantity',quantity);       
        formData.append('amount',amount);       
        formData.append('totalAmount',totalAmount);       
        formData.append('transactionDiscount',transactionDiscount);       
        formData.append('transactionFee',transactionFee);       
        formData.append('transactionGross',transactionGross);       
        formData.append('invoiceNo',invoiceNo); 
        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateFuelReceipt",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success:function(response){
                swal.fire("Done!", "Fuel recepit updated successfully", "success");
                $('#update_FuelReceiptsModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelReceipt",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createFuelReceiptRows(text);
                        FuelReceiptResult = text;
                     }
                });
            }
        })
    });
    //==================== end update fuel receipts data ======================


    //====================== delete fuel receipts ==========================
    $('body').on('click','.delete_fuel_receipts_form', function(){
        var id=$(this).attr('data-fuelReId');
        var companyID=$(this).attr('data-com_Id');
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
                    url: base_path+"/admin/deleteFuelReceipt",
                    data: { _token: $("#_token_updateFuelReceipts").val(), id: id,companyID:companyID},
                    success: function(resp){
                        swal.fire("Done!", " Fuel Receipt deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getFuelReceipt",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createFuelReceiptRows(text);
                                FuelReceiptResult = text;
                             }
                        });
                        $('#fuelReceiptModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //======================== end delete fuel receipts =======================


    //======================== start restore fuel recepit data ==================
    $(".restorefuelReceiptClose").click(function(){
        $("#restore_fuelReceiptModal").modal("hide");
    });
    $(".restoreFuelReceiptData").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelReceipt",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                restoreFuelReceiptRows(text);
                restoreFuelReceiptResult = text;
             }
        });
        $("#restore_fuelReceiptModal").modal("show");
    });
    function restoreFuelReceiptRows(restoreFuelReceiptResult)
    {
        var fuelReceiptlen = 0;
            if (FuelReceiptResult != null) 
            {
                fuelReceiptlen = FuelReceiptResult.fuel_receipt.length;
                $("#restoreFuelReceTable").html('');
                if (fuelReceiptlen > 0) { 
                    for (var i = fuelReceiptlen-1; i >= 0; i--) {  
                        var custID=FuelReceiptResult.companyID;
                        var fuelReceiptId =FuelReceiptResult.fuel_receipt[i]._id;
                        var driverName =FuelReceiptResult.fuel_receipt[i].driverName;
                        var transactionDate =FuelReceiptResult.fuel_receipt[i].transactionDate;
                        var cardNo =FuelReceiptResult.fuel_receipt[i].cardNo;
                        var truckNumber =FuelReceiptResult.fuel_receipt[i].truckNumber;
                        var driverNumber =FuelReceiptResult.fuel_receipt[i].driverNumber;
                        var transactionTime =FuelReceiptResult.fuel_receipt[i].transactionTime;
                        var locationName =FuelReceiptResult.fuel_receipt[i].locationName;
                        var locationCity =FuelReceiptResult.fuel_receipt[i].locationCity;
                        var locationState =FuelReceiptResult.fuel_receipt[i].locationState;
                        var fuelVendor =FuelReceiptResult.fuel_receipt[i].category;
                        var  fuelType=FuelReceiptResult.fuel_receipt[i].fuelType;
                        var amount =FuelReceiptResult.fuel_receipt[i].amount;
                        var quantity =FuelReceiptResult.fuel_receipt[i].quantity;
                        var totalAmount =FuelReceiptResult.fuel_receipt[i].totalAmount;
                        var transactionDiscount =FuelReceiptResult.fuel_receipt[i].transactionDiscount;
                        var transactionFee =FuelReceiptResult.fuel_receipt[i].transactionFee;
                        var transactionGross =FuelReceiptResult.fuel_receipt[i].transactionGross;
                        var invoiceNo =FuelReceiptResult.fuel_receipt[i].invoiceNo;
                        var deleteStatus =FuelReceiptResult.fuel_receipt[i].deleteStatus;

                        if(deleteStatus == "YES"){
                            //alert("ff");
                            var fuelReceStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' class='check_fuelRecept_one' name='all_fuel_recepit_ids[]' data-id=" + fuelReceiptId+ " date-cusId="+custID+"  value="+fuelReceiptId+"></td>" +
                            "<td data-field='driverName' >" + driverName + "</td>" +
                            "<td data-field='transactionDate' >" + transactionDate + "</td>" +
                            "<td data-field='cardNo' >" + cardNo + "</td>" +
                            "<td data-field='truckNumber' >" + truckNumber + "</td>" +
                            "<td data-field='driverNumber' >" + driverNumber + "</td>" +
                            "<td data-field='transactionTime' >" + transactionTime + "</td>" +
                            "<td data-field='locationName' >" + locationName + "</td>" +
                            "<td data-field='locationCity' >" + locationCity + "</td>" +
                            "<td data-field='locationState' >" + locationState + "</td>" +
                            "<td data-field='fuelVendor' >" + fuelVendor + "</td>" +
                            "<td data-field='fuelType' >" + fuelType + "</td>" +
                            "<td data-field='amount' >" + amount + "</td>" +
                            "<td data-field='quantity' >" + quantity + "</td>" +
                            "<td data-field='totalAmount' >" + totalAmount + "</td>" +
                            "<td data-field='transactionDiscount' >" + transactionDiscount + "</td>" +
                            "<td data-field='transactionFee' >" + transactionFee + "</td>" +
                            "<td data-field='transactionGross' >" + transactionGross + "</td>" +
                            "<td data-field='invoiceNo' >" + invoiceNo + "</td>" +
                          "</tr>";

                        $("#restoreFuelReceTable").append(fuelReceStr);
                        }
                    }
                } else {
                    var fuelReceStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#restoreFuelReceTable").append(fuelReceStr);
                }
            }else {
            var fuelReceStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#restoreFuelReceTable").append(fuelReceStr);
        }
    }
    $(document).on("change", ".fuel_recepit_ids", function() 
    {
        if(this.checked) {
            $('.check_fuelRecept_one:checkbox').each(function() 
            {
                this.checked = true;
                fuelRecepitCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_fuelRecept_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_fuelRecept_one',function(){
        fuelRecepitCheckboxRestore();
    });
    function fuelRecepitCheckboxRestore()
    {
        var fuelRecepitIds = [];
        var companyIds=[]
			$.each($("input[name='all_fuel_recepit_ids[]']:checked"), function(){
				fuelRecepitIds.push($(this).val());
                companyIds.push($(this).attr("date-cusId"));
			});
			console.log(fuelRecepitIds);
			var fuelRecepitCheckedIds =JSON.stringify(fuelRecepitIds);
			$('#checked_fuelRecepit').val(fuelRecepitCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_fuelRecepit_company_ids').val(companyCheckedIds);


			if(fuelRecepitIds.length > 0)
			{
				$('#restore_Fuel_ReceiptData').removeAttr('disabled');
			}
			else
			{
				$('#restore_Fuel_ReceiptData').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_Fuel_ReceiptData',function(){
        var all_ids=$('#checked_fuelRecepit').val();
        var custID=$("#checked_fuelRecepit_company_ids").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_token_updateFuelReceipts").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoreFuelReceipt",
            success: function(response) {               
                swal.fire("Done!", "Fuel Recepit Restored successfully", "success");
                $("#restore_fuelReceiptModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelReceipt",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createFuelReceiptRows(text);
                        FuelReceiptResult = text;
                     }
                });
            }
        });
    });
    // ===========================end restore fuel recepit data ====================

    //=============================== start multipal delete ========================
    $(document).on("change", ".fuel_recepit_ids_delete", function() 
    {
        if(this.checked) {
            $('.check_fuelRecept_one_delete:checkbox').each(function() 
            {
                this.checked = true;
                fuelRecepitCheckboxDelete();
            });
        } 
        else 
        {
            $('.check_fuelRecept_one_delete:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_fuelRecept_one_delete',function(){
        fuelRecepitCheckboxDelete();
    });
    function fuelRecepitCheckboxDelete()
    {
        var fuelRecepitIds = [];
        var companyIds=[]
			$.each($("input[name='all_fuel_recepit_ids_delete[]']:checked"), function(){
				fuelRecepitIds.push($(this).val());
                companyIds.push($(this).attr("date-cusId"));
			});
			// console.log(fuelRecepitIds);
			var fuelRecepitCheckedIds =JSON.stringify(fuelRecepitIds);
			$('#checked_fuelRecepit_delete').val(fuelRecepitCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_fuelRecepit_company_ids_delete').val(companyCheckedIds);


			if(fuelRecepitIds.length > 0)
			{
				$('#delete_Fuel_ReceiptData').removeAttr('disabled');
			}
			else
			{
				$('#delete_Fuel_ReceiptData').attr('disabled',true);
			}
    }
    $('body').on('click','.delete_Fuel_ReceiptData',function(){
        var all_ids=$('#checked_fuelRecepit_delete').val();
        var custID=$("#checked_fuelRecepit_company_ids_delete").val();
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
                    type:"post",
                    data:{_token:$("#_token_updateFuelReceipts").val(),all_ids:all_ids,custID:custID},
                    url: base_path+"/admin/deleteMulFuelReceipt",
                    success: function(response) {               
                        swal.fire("Done!", "Fuel Recepit Deleted successfully", "success");
                        $("#restore_fuelReceiptModal").modal("hide");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getFuelReceipt",
                            async: false,
                            //dataType:JSON,
                            success: function(text) {
                                //alert();
                                console.log(text);
                                createFuelReceiptRows(text);
                                FuelReceiptResult = text;
                            }
                        });
                    }
                });           
            }
        });
    });
    //================================= end multipal delete ========================
});