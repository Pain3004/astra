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
              //alert(fuelCardId);
             

                        if(deleteStatus == "NO"){
                            //alert("ff");
                            var fuelReceStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field=''><input type='checkbox' id='checkall' class='checkall'></td>" +
                            "<td data-field='no'>" + no + "</td>" +
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
        //   $.ajax({
        //         type:"get",
        //         url:base_path+"/admin/createFuelReceipt",
        //         async: false,
        //         success:function(res)
        //         {
        //             $(".addFuelReceiptDriver_name").html('');
        //             $(".addFuelReceiptLocationName").html('');
        //             $(".addFuelReceiptLocationCity").html('');
        //             $(".addFuelReceiptLocationState").html('');
        //             $(".addFuelReceiptinvoiceNo").html('');
        //             res.forEach(function(data){
        //                 var resLengt=data.fuel_receipt.length;
        //                 for(var i=0; i<resLengt;i++)
        //                 {
        //                     var driverName=data.fuel_receipt[i].driverName;
        //                     var locationName=data.fuel_receipt[i].locationName;
        //                     var locationState=data.fuel_receipt[i].locationState;
        //                     var locationCity=data.fuel_receipt[i].locationCity;
        //                     var invoiceNo=data.fuel_receipt[i].invoiceNo;
        //                     var html="<option class='duplicate_entry' value='"+driverName+"'>"+driverName+"</opyion>";
        //                     var html_2="<option class='duplicate_entry_l' value='"+locationName+"'>"+locationName+"</opyion>";
        //                     var html_3="<option class='duplicate_entry_c' value='"+locationState+"'>"+locationState+"</opyion>";
        //                     var html_4="<option class='duplicate_entry_s' value='"+locationCity+"'>"+locationCity+"</opyion>";
        //                     var html_5="<option class='duplicate_entry_in' value='"+invoiceNo+"'>"+invoiceNo+"</opyion>";
        //                     $(".addFuelReceiptDriver_name").append(html);
        //                     $(".addFuelReceiptLocationName").append(html_2);
        //                     $(".addFuelReceiptLocationCity").append(html_3);
        //                     $(".addFuelReceiptLocationState").append(html_4);
        //                     $(".addFuelReceiptinvoiceNo").append(html_5);
        //                     var seen = {};
        //                     $('.duplicate_entry').each(function() {
        //                         var txt = $(this).text();
        //                         if (seen[txt])
        //                             $(this).remove();
        //                         else
        //                             seen[txt] = true;
        //                     });

        //                 }
        //             });
        //         }
        //   });
        $("#Create_FuelReceiptsModal").modal("show");
    });
    $(".addFuelReceiptDriver_name").on('change',function(){
        alert("SGDFHJKL");
        $.ajax({
            type:"get",
            url:base_path+"/admin/createFuelReceipt",
            async: false,
            success:function(res)
            {
                res.forEach(function(data){
                    var resLengt=data.fuel_receipt.length;
                    for(var i=0; i<resLengt;i++)
                    {
                        $(".add_fuelReceiptDriverNumber").val(data.fuel_receipt[i].driverNumber);
                        $(".addFuelReceiptCardNumber").val(data.fuel_receipt[i].cardNo);
                        $(".addFuelReceiptFuelVendor").val(data.fuel_receipt[i].category);
                    }
                });
            }
      });
    })
    $(".closeFuelReceiptsModal").click(function(){
        $("#Create_FuelReceiptsModal").modal("hide");
    });
    $(".saveFuelReceiptsModal").click(function(){
        var driverName = $('.addFuelReceiptDriver_name').val();
        var driverNo = $('.add_fuelReceiptDriverNumber').val();
        var cardNumber = $('.addFuelReceiptCardNumber').val();
        var fuelVendor = $('.addFuelReceiptFuelVendor').val();
        var fuelType = $('.addFuelReFuelType').val();
        var truckNumber = $('.addFuelReceiptTruckNumber').val();
        var date = $('.addFuelReceiptDate').val();
        var transactionTime = $('.addFuelReceiptTransactionTime').val();
        var locationName = $('.addFuelReceiptLocationName').val();
        var locationCity = $('.addFuelReceiptLocationState').val();
        var quantity = $('.addFuelReceiptQuantity').val();
        var amount = $('.addFuelReceiptAmount').val();
        var totalAmount = $('.addFuelReceipttotalAmount').val();
        var transactionDiscount = $('.addFuelReceipttransactionDiscount').val();
        var transactionFee = $('.addFuelReceipttransactionFee').val();
        var transactionGross = $('.addFuelReceipttransactionGross').val();
        var invoiceNo = $('.addFuelReceiptinvoiceNo').val();
        if(driverName=='')
        {
            swal.fire( "'select one");
            $('.addFuelReceiptDriver_name').focus();
            return false;            
        }
        var formData = new FormData();
        formData.append('_token',$("#_token_addFuelReceipts").val());        
        formData.append('driverName',driverName);       
        formData.append('driverNo',driverNo);       
        formData.append('cardNumber',cardNumber);       
        formData.append('fuelVendor',fuelVendor);       
        formData.append('fuelType',fuelType);       
        formData.append('truckNumber',truckNumber);       
        formData.append('date',date);       
        formData.append('transactionTime',transactionTime);       
        formData.append('locationName',locationName);       
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
        $("#update_FuelReceiptsModal").modal("show");
    });
    $('.closeUpdateFuelReceiptsModal').click(function(){
        $("#update_FuelReceiptsModal").modal("hide");
    });
    $('.UpdateFuelReceiptsModal').click(function(){
        alert("dgfdhgfhgfhgh");
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
});