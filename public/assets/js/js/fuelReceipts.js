var base_path = $("#url").val();
// $(document).ready(function() {

    // <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.fuelReceiptClose').click(function(){
        // removePagi();
        $('#fuelReceiptModal').modal('hide');
    });


    // <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#fuelReceipt_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruck",
            async: false,
            success: function(truckResult) {
                if (truckResult != null) 
                {
                    trucklen1 = truckResult.truck.truck.length;
                    $("#truck_nummberFuelReceipt").html('');
                    if (trucklen1 > 0) 
                    {
                        var no=1;
                        var html=""
                        for (var i = trucklen1-1; i > 0; i--) 
                        {  
                            var truckNumber =truckResult.truck.truck[i].truckNumber;
                            html+="<option value="+truckNumber+">"+truckNumber+"</option>"
                        }
                        $("#truck_nummberFuelReceipt").append(html);
                    }
                }
             }
        });
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getInvoicedNumber",
            async: false,
            success: function (text) {
                $(".fuel_recepit_invoice_no_list").html();
                var len2 = text.length;
                $('.fuel_recepit_invoice_no_list').html();
                var html = "<option value='unselected'>----Select----</option>";
                for (var j = 0; j < len2; j++) 
                {
                    var data = text[j];
                    $.each(data, function(i, v) { 
                        var driverId = text[j][i]._id;
                         html+= "<option value='" + driverId + "'>" + driverId + " </option>";                        
                    });
                   
                }
                 $(".fuel_recepit_invoice_no_list").append(html);
            }
        });
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelReceipt",
            async: false,
            success: function(response) {
                // console.log(response);
                // createFuelReceiptRows(response);
                // FuelReceiptResult = response;
                var res = JSON.parse(response);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processFuelReceiptTable(res[0]);
                    $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                    renameTableSeq2("FuelReceTable", "page_active");
                }
                var totalreceipts = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
                $("#total_receipts").html(totalreceipts);
                // $(".loading").css("display", "none");
             }
        });
        $('#fuelReceiptModal').modal('show');
    });


    // <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
    // <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    

    function processFuelReceiptTable(res) 
    {
        var tabEntry = "";
        
        for (var j = res.length - 1; j >= 0; j--) {
            var masterID = res[j]["arrData1"]._id;
            var data = res[j]["arrData1"].fuel_receipt;
            var companyID = res[j]["arrData1"].companyID;
            processEntry = processFuelReceiptRows(data, masterID,companyID);
            tabEntry = processEntry + tabEntry;
        }
    }
    function processFuelReceiptRows(data, masterID,companyID) 
    {
        
        var row = ``;
        var no=1;
        for (var i = 0; i < data.length; i++) 
        {
            if (data[i].masterID != undefined) 
            {
                var masterID = data[i].masterID;
            }
            var ids = masterID + "-" + data[i]._id;
            var id = data[i]._id;
            var counter = data[i].counter;
            var driverName = data[i].driverName;
            var cardNo = data[i].cardNo;
            var truckNumber = data[i].truckNumber;
            var transactionDate = data[i].transactionDate;
            if(driverName !="" || driverName !=null)
            {
                driverName=driverName;
            }
            else
            {
                driverName="-------";
            }
            if(cardNo !="" || cardNo !=null)
            {
                cardNo=cardNo;
            }
            else
            {
                cardNo="-------";
            }
            if(truckNumber !="" || truckNumber !=null)
            {
                truckNumber=truckNumber;
            }
            else
            {
                truckNumber="-------";
            }
            if(transactionDate !=false)
            {
                var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                var date = new Date(transactionDate*1000);
                var year = date.getFullYear();
                var month = months_arr[date.getMonth()];
                var day = date.getDate();
                var transactionDate = month+'/'+day+'/'+year;
            }
            else
            {
                transactionDate="-------";
            }
            var driverNumber = data[i].driverNumber;
            var transactionTime = data[i].transactionTime;
            var locationName = data[i].locationName;
            var locationCity = data[i].locationCity;
            var locationState = data[i].locationState;
            var category = data[i].category;
            var amount = numberWithCommas(parseFloat(data[i].amount) == -1 ? "(" + Math.abs(data[i].amount.toFixed(2)) + ")" : parseFloat(data[i].amount).toFixed(2));
            var quantity = data[i].quantity;
            var totalAmount = numberWithCommas(parseFloat(data[i].totalAmount) == -1 ? "(" + Math.abs(data[i].totalAmount.toFixed(2)) + ")" : parseFloat(data[i].totalAmount).toFixed(2));
            var transactionDiscount = numberWithCommas(parseFloat(data[i].transactionDiscount).toFixed(2));
            var transactionFee = numberWithCommas(parseFloat(data[i].transactionFee).toFixed(2));
            var transactionGross = numberWithCommas(parseFloat(data[i].transactionGross).toFixed(2));
            var invoiceNo = data[i].invoiceNo;
            
            if(driverNumber !="" || driverNumber !=null)
            {
                driverNumber=driverNumber;
            }
            else
            {
                driverNumber="-------";
            }
            if(transactionTime !="" || transactionTime !=null)
            {
                transactionTime=transactionTime;
            }
            else
            {
                transactionTime="-------";
            }
            if(locationName !="" || locationName !=null)
            {
                locationName=locationName;
            }
            else
            {
                locationName="-------";
            }
            if(locationCity !="" || locationCity !=null)
            {
                locationCity=locationCity;
            }
            else
            {
                locationCity="-------";
            }
            if(locationState !="" || locationState !=null)
            {
                locationState=locationState;
            }
            else
            {
                locationState="-------";
            }
            if(category !="" || category !=null)
            {
                category=category;
            }
            else
            {
                category="-------";
            }
            if(amount !="" || amount !=null)
            {
                amount=amount;
            }
            else
            {
                amount="-------";
            }
            if(quantity !="" || quantity !=null)
            {
                quantity=quantity;
            }
            else
            {
                quantity="-------";
            }
            if(totalAmount !="" || totalAmount !=null)
            {
                totalAmount=totalAmount;
            }
            else
            {
                totalAmount="-------";
            }
            if(transactionDiscount !="" || transactionDiscount !=null)
            {
                transactionDiscount=transactionDiscount;
            }
            else
            {
                transactionDiscount="-------";
            }
            if(transactionFee !="" || transactionFee !=null)
            {
                transactionFee=transactionFee;
            }
            else
            {
                transactionFee="-------";
            }
            if(transactionGross !="" || transactionGross !=null)
            {
                transactionGross=transactionGross;
            }
            else
            {
                transactionGross="-------";
            }
            if(invoiceNo !="" || invoiceNo !=null)
            {
                invoiceNo=invoiceNo;
            }
            else
            {
                invoiceNo="-------";
            }
            var created_by = data[i].insertedUser;
            var created_time = data[i].insertedTime;
            var edit_by = data[i].edit_by;
            var edit_time = data[i].edit_time;
            var delete_status = data[i].deleteStatus;
            var deleteUser = data[i].deleteUser;
            var deleteTime =data[i].deleteTime;
            if (data[i].fuelType != undefined) {
                var fuelType = data[i].fuelType;
            } else {
                var fuelType = "";
            }
    
            var duplicateIDarraysingle = data[i].duplicateID;
            var transactiondatesingle = data[i].transactionDate;
            var fuelcardidsingle = data[i].fuelId;
    
            var delEn = delete_status == 'YES' ? 'disabled_load' : '';
            var disable = delete_status == 'YES' ? 'disabled' : '';
            if (delete_status == "NO") 
            {
                var tr = `<tr>`;
    
                tr += `<td ><input type='checkbox' class='check_fuelRecept_one_delete' name='all_fuel_recepit_ids_delete[]' data-id='${id}' date-cusId='${companyID}'  value'${id}'></th>`;
        
                tr += `<td class="center-alignment ${delEn}"></td>
                           <td class='center-alignment ${delEn}'>${driverName}</td>
        
                           <td class='center-alignment ${delEn}'>
                              ${transactionDate}</td>
        
                           <td class='center-alignment ${delEn}'>
                               ${cardNo}
                           </td>
                           
                           <td class='center-alignment ${delEn}'>
                               ${truckNumber}
                           </td>
                           
                           <td class='center-alignment ${delEn}' >
                               ${driverNumber}
                           </td>
                           
                           <td class='center-alignment ${delEn}'>
                               ${transactionTime}
                           </td>
                           
                           <td class='custom-text ${delEn}' >${locationName} </td>
                           
                           <td class='custom-text ${delEn}' >${locationCity} </td>
                           
                           <td> ${locationState} </td>
                           
                           <td class='custom-text ${delEn}' >  ${category}
                           </td>
        
                           <td> ${fuelType} </td>
                           
                           <td class='custom-text ${delEn}' >  $${amount}
                           </td>
                           
                           <td> ${quantity} </td>
                           
                            <td> $${totalAmount}  </td>
                           <td> $${transactionDiscount}  </td>
                           
                            <td>   $${transactionFee}  </td>
                           
                           <td> $${transactionGross} </td>
                           
                           <td> ${invoiceNo} </td>`;
                tr += `<td class="${delEn}">  <a class='button-23   edit_fuel_receipts_form'  title='Edit1'  data-fuelReId='${id}' data-com_Id='${companyID}'  ><i class='fe fe-edit'></i></a> <a class='delete1 button-23  delete_fuel_receipts_form'  data-fuelReId='${id}' data-com_Id='${companyID}'  title='Delete'><i class='fe fe-delete'></i></a>`;
                tr += `</td>`;
                tr += `</tr>`;
                row = tr + row;
                no++;
             
            }
           
            // return row;
            
        }
        $("#FuelReceTable").html(row);
    }



    //================ pagination  ========================================
    function callPagination(arr1, main, sub, func, status) 
    {
        var res = arr1.split("^");
        var arr = res[0];
        var page_no = res[1];
        var data = {
            page_no: page_no,
            arr: arr,
            status : status
        }
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelReceipt",
            async: false,
            data: data,
            success: function(response) {
                $(".loading").css("display", "none");
                var res = JSON.parse(response);
               if (func == "processFuelReceiptTable") 
               {
                    processFuelReceiptTable(res[0]);
                    renameTableSeq2("FuelReceTable", "page_active");
                }
                        
            }
        });
        
    }
    //======= end pagination ==============================================

    // ================End================================================ 

    $(".fuelReceiptCloselist").click(function(){
        $('#fuelReceiptModal').modal('hide');
    });
    //========================================  create fuel receipts ===========================
    $(".create_fuel_receipt_modal_form_btn").click(function(){
        $("#Create_FuelReceiptsModal").modal("show");
    });
    $('#Create_FuelReceiptsModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    // $(".cardHolderName").on('change',function(){
    //     var val = $(this).val();
    //         var name=$('option:selected', this).attr('data_driver_name_for_recepits');
    //         // alert(name);
    //         $(".driver_name_fuelReceipt").val(name);
    //         $(".driver_name_fuelReceipt_edit").val(name);
    //         $(".add_fuelReceiptDriverNumber").val(val);
    //         $(".update_fuelReceiptDriverNumber").val(val);
        
    //     $.ajax({
    //         type: "GET",
    //         url: base_path + "/admin/getFuelCard",
    //         async: false,
    //         success: function (text) {
    //             // driverId=$('.cardHolderName').val();
    //             var ifta_card=text.FuelCard.ifta_card.length;
    //             var ifta_card_nu=text.FuelCard.ifta_card;
    //             $(".total_cards_fuel_re").html();
    //             var html="<option value='unselected'>----select----</option>"
    //             for(var i=0;i<ifta_card;i++)
    //             {
    //                 if(val==ifta_Card_no==ifta_card_nu[i].cardHolderName)
    //                 {
    //                     var ifta_Card_no=ifta_card_nu[i].iftaCardNo;
    //                     var vendor_type=ifta_card_nu[i].cardType;
    //                     // alert(vendor_type);
    //                     html+="<option data_att_vendor_id='"+vendor_type+"' value='"+ifta_Card_no+"'> "+ifta_Card_no+"</option>"
                        
                      
    //                 }
    //             }
    //             $(".total_cards_fuel_re").append(html);
    //         }
    //     });
    // });

    // $(".total_cards_fuel_re").on("change",function(){
    //     var data = $('option:selected', this).attr('data_att_vendor_id');   
    //     // alert(data);
    //     $.ajax({
    //         type: "GET",
    //         url: base_path + "/admin/getFuelCard",
    //         async: false,
    //         success: function (text) {
    //             var cardNumLeng=text.FuelVendor.fuelCard.length;
    //             var cardType=text.FuelVendor.fuelCard;
    //             // alert(cardNumLeng);
    //             // alert(cardType);
    //             for(var i=0;i<cardNumLeng;i++)
    //             {
    //                 var ifta_Card_no=cardType[i]._id;
    //                 // alert(ifta_Card_no +" "+ data)
    //                 if(data==ifta_Card_no)
    //                 {
    //                     var card_t=cardType[i].fuelCardType;
    //                     // alert(card_t);
    //                     $(".seleted_fuel_vend_type").val(card_t);
    //                 }
                    
    //             }
    //         }
    //     });
    // });
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
            swal.fire( "'select driver name");
            $('.addFuelReceiptDriver_name').focus();
            return false;            
        }
        if(paymentType=='unselected' || paymentType=="")
        {
            swal.fire( "'select payment type");
        }
        if(cardNumber=="unselected" ||cardNumber =="")
        {
            swal.fire( "'select card number");
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
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processFuelReceiptTable(res[0]);
                            $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                            renameTableSeq2("FuelReceTable", "page_active");
                        }
                        var totalreceipts = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
                    }
                });
            }
        })
    });
    //======================================= end create fuel receipts ========================

    //============================ update fuel receipts data ===================

    function processIftaCardTable(res) 
    {
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].ifta_card;
        var companyID=res[0]["mainID"].companyID;
        var fuelCardType = res[0]["fuelCardType"];
        var driverName = res[0]["driverName"];
        processIftaCardRows(data, masterID,fuelCardType,driverName,companyID);
    }
    function processIftaCardRows(data,masterID,fuelCardType,driverName,companyID) 
    {
        $(".total_cards_fuel_re").html();
        var row = ``;
        var no=data.length;
        for (var i = 0; i < data.length; i++) 
        {
            var id = data[i]._id;
            var iftaCardNo = data[i].iftaCardNo;
            
            if(deleteStatus =="NO")
            {
                                    if(res.fuel_receipt.driverName==ifta_Card_no==ifta_card_nu[i].cardHolderName)
                                    {
                                        var ifta_Card_no=ifta_card_nu[i].iftaCardNo;
                                        var vendor_type=ifta_card_nu[i].cardType;
                                        // alert(vendor_type);
                                        html+="<option data_att_vendor_id='"+vendor_type+"' value='"+ifta_Card_no+"'> "+ifta_Card_no+"</option>";
                                $(".total_cards_fuel_re").append(html);
                                    }
            }
           
           
        }
        $(".total_cards_fuel_re").append(html);
        $("#FuelCardTable").html(row);
    }



    $('body').on('click','.edit_fuel_receipts_form', function(){
        var id=$(this).attr('data-fuelReId');
        var companyID=$(this).attr('data-com_Id');
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editFuelReceipt",
            data:{id:id,companyID:companyID},
            async: false,
            success: function(res) {
                var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                var transactionDate=res.fuel_receipt.transactionDate;
                var date_transactionDate = new Date(transactionDate*1000);
                var year_transactionDate = date_transactionDate.getFullYear();
                var month_transactionDate = months_arr[date_transactionDate.getMonth()];
                var day_transactionDate = date_transactionDate.getDate();
                if(transactionDate !== false)
                {
                    if(day_transactionDate <=9 )
                    {
                        var transactionDate = year_transactionDate+'-0'+day_transactionDate+'-'+month_transactionDate;
                    }
                    else
                    {
                        var transactionDate = year_transactionDate+'-'+month_transactionDate+'-'+day_transactionDate;
                    }
                }
                    if(res.fuel_receipt.driverName !="")
                    {
                        $.ajax({
                            type: "GET",
                            url: base_path + "/admin/getFuelCard",
                            async: false,
                            success: function (text) {
                                var text = JSON.parse(text);
                                if (text[0] != undefined && text[1] != 0) 
                                {
                                    processIftaCardTable(text[0]);
                                }
                                // var ifta_card=text.FuelCard.ifta_card.length;
                                // var ifta_card_nu=text.FuelCard.ifta_card;
                                // $(".total_cards_fuel_re").html();
                                // var html="<option value='unselected'>----select----</option>"
                                // for(var i=0;i<ifta_card;i++)
                                // {
                                //     if(res.fuel_receipt.driverName==ifta_Card_no==ifta_card_nu[i].cardHolderName)
                                //     {
                                //         var ifta_Card_no=ifta_card_nu[i].iftaCardNo;
                                //         var vendor_type=ifta_card_nu[i].cardType;
                                //         // alert(vendor_type);
                                //         html+="<option data_att_vendor_id='"+vendor_type+"' value='"+ifta_Card_no+"'> "+ifta_Card_no+"</option>"
                                        
                                      
                                //     }
                                // }
                                // $(".total_cards_fuel_re").append(html);
                            }
                        }); 
                    }
               
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
                    $('.updateFuelReceiptDate').val(transactionDate);
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
    $('#update_FuelReceiptsModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processFuelReceiptTable(res[0]);
                            $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                            renameTableSeq2("FuelReceTable", "page_active");
                        }
                        // console.log(text);
                        // createFuelReceiptRows(text);
                        // FuelReceiptResult = text;
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
                                var res = JSON.parse(text);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processFuelReceiptTable(res[0]);
                                    $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                                    renameTableSeq2("FuelReceTable", "page_active");
                                }
                                // console.log(text);
                                // createFuelReceiptRows(text);
                                // FuelReceiptResult = text;
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
                var res = JSON.parse(text);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) 
                {
                    RestoreprocessFuelReceiptTable(res[0]);
                    $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                    renameTableSeq2("FuelReceTable", "page_active");
                }
            }
        });
        $("#restore_fuelReceiptModal").modal("show");
    });
    function RestoreprocessFuelReceiptTable(res) 
    {
        var tabEntry = "";
        
        for (var j = res.length - 1; j >= 0; j--) {
            var masterID = res[j]["arrData1"]._id;
            var data = res[j]["arrData1"].fuel_receipt;
            var companyID = res[j]["arrData1"].companyID;
            processEntry = RestoreprocessFuelReceiptRows(data, masterID,companyID);
            tabEntry = processEntry + tabEntry;
        }
    }
    function RestoreprocessFuelReceiptRows(data, masterID,companyID) 
    {
        
        var row = ``;
        var no=1;
        for (var i = 0; i < data.length; i++) 
        {
            if (data[i].masterID != undefined) 
            {
                var masterID = data[i].masterID;
            }
            var ids = masterID + "-" + data[i]._id;
            var id = data[i]._id;
            var counter = data[i].counter;
            var driverName = data[i].driverName;
            var cardNo = data[i].cardNo;
            var truckNumber = data[i].truckNumber;
            var transactionDate = data[i].transactionDate;
            var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
            var date = new Date(transactionDate*1000);
            var year = date.getFullYear();
            var month = months_arr[date.getMonth()];
            var day = date.getDate();
            var transactionDate = month+'/'+day+'/'+year;
            var driverNumber = data[i].driverNumber;
            var transactionTime = data[i].transactionTime;
            var locationName = data[i].locationName;
            var locationCity = data[i].locationCity;
            var locationState = data[i].locationState;
            var category = data[i].category;
            var amount = numberWithCommas(parseFloat(data[i].amount) == -1 ? "(" + Math.abs(data[i].amount.toFixed(2)) + ")" : parseFloat(data[i].amount).toFixed(2));
            var quantity = data[i].quantity;
            var totalAmount = numberWithCommas(parseFloat(data[i].totalAmount) == -1 ? "(" + Math.abs(data[i].totalAmount.toFixed(2)) + ")" : parseFloat(data[i].totalAmount).toFixed(2));
            var transactionDiscount = numberWithCommas(parseFloat(data[i].transactionDiscount).toFixed(2));
            var transactionFee = numberWithCommas(parseFloat(data[i].transactionFee).toFixed(2));
            var transactionGross = numberWithCommas(parseFloat(data[i].transactionGross).toFixed(2));
            var invoiceNo = data[i].invoiceNo;
            var delete_status = data[i].deleteStatus;
            if (data[i].fuelType != undefined) {
                var fuelType = data[i].fuelType;
            } else {
                var fuelType = "";
            }
    
            var delEn = delete_status == 'YES' ? 'disabled_load' : '';
            if (delete_status == "YES") 
            {
                var tr = `<tr>`;
    
                tr += `<td ><input type='checkbox' class='check_fuelRecept_one' name='all_fuel_recepit_ids[]' data-id='${id}' date-cusId='${companyID}'  value'${id}'></th>`;
        
                tr += `<td class="center-alignment ${delEn}"></td>
                           <td class='center-alignment ${delEn}'>${driverName}</td>
        
                           <td class='center-alignment ${delEn}'>
                              ${transactionDate}</td>
        
                           <td class='center-alignment ${delEn}'>
                               ${cardNo}
                           </td>
                           
                           <td class='center-alignment ${delEn}'>
                               ${truckNumber}
                           </td>
                           
                           <td class='center-alignment ${delEn}' >
                               ${driverNumber}
                           </td>
                           
                           <td class='center-alignment ${delEn}'>
                               ${transactionTime}
                           </td>
                           
                           <td class='custom-text ${delEn}' >${locationName} </td>
                           
                           <td class='custom-text ${delEn}' >${locationCity} </td>
                           
                           <td> ${locationState} </td>
                           
                           <td class='custom-text ${delEn}' >  ${category}
                           </td>
        
                           <td> ${fuelType} </td>
                           
                           <td class='custom-text ${delEn}' >  $${amount}
                           </td>
                           
                           <td> ${quantity} </td>
                           
                            <td> $${totalAmount}  </td>
                           <td> $${transactionDiscount}  </td>
                           
                            <td>   $${transactionFee}  </td>
                           
                           <td> $${transactionGross} </td>
                           
                           <td> ${invoiceNo} </td>`;
                tr += `</tr>`;
                row = tr + row;
                no++;
             
            }
            
        }
        $("#restoreFuelReceTable").html(row);
    }
    // function restoreFuelReceiptRows(restoreFuelReceiptResult)
    // {
    //     var fuelReceiptlen = 0;
    //             if (FuelReceiptResult != null) {
    //                 var lentData=[];
    //                 fuelReceiptlen = FuelReceiptResult.FuelReceipt.length;
    //                 $("#FuelReceTable").html('');
    //                 if (fuelReceiptlen > 0) 
    //                 {                   
    //                     var no=1;
    //                     for (var j = fuelReceiptlen-1; j >= 0; j--) 
    //                     {
    //                         var data= FuelReceiptResult.FuelReceipt[j];
    //                         $.each(data, function(i, v) { 
    //                             var custID=FuelReceiptResult.companyId;
    //                             var fuelReceiptId =FuelReceiptResult.FuelReceipt[j][i]._id;
    //                             var driverName =FuelReceiptResult.FuelReceipt[j][i].driverName;
    //                             var cardNo =FuelReceiptResult.FuelReceipt[j][i].cardNo;
    //                             var truckNumber =FuelReceiptResult.FuelReceipt[j][i].truckNumber;
    //                             var driverNumber =FuelReceiptResult.FuelReceipt[j][i].driverNumber;
    //                             var transactionTime =FuelReceiptResult.FuelReceipt[j][i].transactionTime;
    //                             var locationName =FuelReceiptResult.FuelReceipt[j][i].locationName;
    //                             var locationCity =FuelReceiptResult.FuelReceipt[j][i].locationCity;
    //                             var locationState =FuelReceiptResult.FuelReceipt[j][i].locationState;
    //                             var fuelVendor =FuelReceiptResult.FuelReceipt[j][i].category;
    //                             var  fuelType=FuelReceiptResult.FuelReceipt[j][i].fuelType;
    //                             var amount =FuelReceiptResult.FuelReceipt[j][i].amount;
    //                             var quantity =FuelReceiptResult.FuelReceipt[j][i].quantity;
    //                             var totalAmount =FuelReceiptResult.FuelReceipt[j][i].totalAmount;
    //                             var transactionDiscount =FuelReceiptResult.FuelReceipt[j][i].transactionDiscount;
    //                             var transactionFee =FuelReceiptResult.FuelReceipt[j][i].transactionFee;
    //                             var transactionGross =FuelReceiptResult.FuelReceipt[j][i].transactionGross;
    //                             var invoiceNo =FuelReceiptResult.FuelReceipt[j][i].invoiceNo;
    //                             var deleteStatus =FuelReceiptResult.FuelReceipt[j][i].deleteStatus;
    //                             if(typeof(FuelReceiptResult.FuelReceipt[j][i].paymentType) != "undefined" && FuelReceiptResult.FuelReceipt[j][i].paymentType !== null)
    //                             {
    //                                 var paymentType=FuelReceiptResult.FuelReceipt[j][i].paymentType;
    //                             } 
    //                             else
    //                             {
    //                                 paymentType="----";
    //                             }
    //                             var transactDate=FuelReceiptResult.FuelReceipt[j][i].transactionDate
                    
    //                         if(transactDate != null || transactDate != false)
    //                         {
    //                             // transactDate=FuelReceiptResult.FuelReceipt[j][i].transactionDate
    //                             var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                             var date = new Date(transactDate*1000);
    //                             var year = date.getFullYear();
    //                             var month = months_arr[date.getMonth()];
    //                             var day = date.getDate();
    //                             var transactionDate = month+'/'+day+'/'+year;
    //                         }
    //                         else
    //                         {
    //                             transactionDate="----";
    //                         }
    //                         if(driverName !="" || driverName != null)
    //                         {
    //                             driverName=driverName;
    //                         }
    //                         else
    //                         {
    //                             driverName="-----";
    //                         }
    //                         if(truckNumber !="" || truckNumber != null)
    //                         {
    //                             truckNumber=truckNumber;
    //                         }
    //                         else
    //                         {
    //                             truckNumber="-----";
    //                         }
    //                         if(cardNo !="" || cardNo != null)
    //                         {
    //                             cardNo=cardNo;
    //                         }
    //                         else
    //                         {
    //                             cardNo="-----";
    //                         }
    //                         if(truckNumber !="" || truckNumber != null)
    //                         {
    //                             truckNumber=truckNumber;
    //                         }
    //                         else
    //                         {
    //                             truckNumber="-----";
    //                         }
    //                         if(driverNumber !="" || driverNumber != null)
    //                         {
    //                             driverNumber=driverNumber;
    //                         }
    //                         else
    //                         {
    //                             driverNumber="-----";
    //                         }
    //                         if(transactionTime !="" || transactionTime != null)
    //                         {
    //                             transactionTime=transactionTime;
    //                         }
    //                         else
    //                         {
    //                             transactionTime="-----";
    //                         }
    //                         if(locationName !="" || locationName != null)
    //                         {
    //                             locationName=locationName;
    //                         }
    //                         else
    //                         {
    //                             locationName="-----";
    //                         }
    //                         if(locationCity !="" || locationCity != null)
    //                         {
    //                             locationCity=locationCity;
    //                         }
    //                         else
    //                         {
    //                             locationCity="-----";
    //                         }
    //                         if(locationState !="" || locationState != null)
    //                         {
    //                             locationState=locationState;
    //                         }
    //                         else
    //                         {
    //                             locationState="-----";
    //                         }
    //                         if(fuelVendor !="" || fuelVendor != null)
    //                         {
    //                             fuelVendor=fuelVendor;
    //                         }
    //                         else
    //                         {
    //                             fuelVendor="-----";
    //                         }
    //                         if(fuelType !="" || fuelType != null)
    //                         {
    //                             fuelType=fuelType;
    //                         }
    //                         else
    //                         {
    //                             fuelType="-----";
    //                         }
    //                         if(amount !="" || amount != null)
    //                         {
    //                             amount=amount;
    //                         }
    //                         else
    //                         {
    //                             amount="-----";
    //                         }
    //                         if(quantity !="" || quantity != null)
    //                         {
    //                             quantity=quantity;
    //                         }
    //                         else
    //                         {
    //                             quantity="-----";
    //                         }
    //                         if(totalAmount !="" || totalAmount != null)
    //                         {
    //                             totalAmount=totalAmount;
    //                         }
    //                         else
    //                         {
    //                             totalAmount="-----";
    //                         }
    //                         if(transactionDiscount !="" || transactionDiscount != null)
    //                         {
    //                             transactionDiscount=transactionDiscount;
    //                         }
    //                         else
    //                         {
    //                             transactionDiscount="-----";
    //                         }
    //                         if(transactionFee !="" || transactionFee != null)
    //                         {
    //                             transactionFee=transactionFee;
    //                         }
    //                         else
    //                         {
    //                             transactionFee="-----";
    //                         }
    //                         if(transactionGross !="" || transactionGross != null)
    //                         {
    //                             transactionGross=transactionGross;
    //                         }
    //                         else
    //                         {
    //                             transactionGross="-----";
    //                         }
    //                         if(invoiceNo !="" || invoiceNo != null)
    //                         {
    //                             invoiceNo=invoiceNo;
    //                         }
    //                         else
    //                         {
    //                             invoiceNo="-----";
    //                         }

    //                         if(deleteStatus == "YES"){
    //                             //alert("ff");
    //                             lentData.push(i);
    //                             var fuelReceStr = "<tr data-id=" + (i + 1) + ">" +
    //                             "<td data-field='no'><input type='checkbox' class='check_fuelRecept_one' name='all_fuel_recepit_ids[]' data-id=" + fuelReceiptId+ " date-cusId="+custID+"  value="+fuelReceiptId+"></td>" +
    //                             "<td data-field='driverName' >" + driverName + "</td>" +
    //                             "<td data-field='transactionDate' >" + transactionDate + "</td>" +
    //                             "<td data-field='cardNo' >" + cardNo + "</td>" +
    //                             "<td data-field='truckNumber' >" + truckNumber + "</td>" +
    //                             "<td data-field='driverNumber' >" + driverNumber + "</td>" +
    //                             "<td data-field='transactionTime' >" + transactionTime + "</td>" +
    //                             "<td data-field='locationName' >" + locationName + "</td>" +
    //                             "<td data-field='locationCity' >" + locationCity + "</td>" +
    //                             "<td data-field='locationState' >" + locationState + "</td>" +
    //                             "<td data-field='fuelVendor' >" + fuelVendor + "</td>" +
    //                             "<td data-field='fuelType' >" + fuelType + "</td>" +
    //                             "<td data-field='amount' >" + amount + "</td>" +
    //                             "<td data-field='quantity' >" + quantity + "</td>" +
    //                             "<td data-field='totalAmount' >" + totalAmount + "</td>" +
    //                             "<td data-field='transactionDiscount' >" + transactionDiscount + "</td>" +
    //                             "<td data-field='transactionFee' >" + transactionFee + "</td>" +
    //                             "<td data-field='transactionGross' >" + transactionGross + "</td>" +
    //                             "<td data-field='invoiceNo' >" + invoiceNo + "</td>" +
    //                         "</tr>";

    //                         $("#restoreFuelReceTable").append(fuelReceStr);
    //                     }
    //                 })
    //                 }
    //             } else {
    //                 var fuelReceStr = "<tr data-id=" + i + ">" +
    //                     "<td align='center' colspan='4'>No record found.</td>" +
    //                     "</tr>";
        
    //                 $("#restoreFuelReceTable").append(fuelReceStr);
    //             }
    //             var items=lentData.length;
    //             RestorePaginator(items);
    //         }else {
    //         var fuelReceStr = "<tr data-id=" + i + ">" +
    //             "<td align='center' colspan='4'>No record found.</td>" +
    //             "</tr>";

    //         $("#restoreFuelReceTable").append(fuelReceStr);
    //     }
    // }
    // function RestoreremovePagi()
    // {
    //     $('#nav').remove();
    //     var startItem=0;
    //     var endItem=10;
    //     $('#RestorefuelReceiptPagiTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
    //     css('display','table-row').animate({opacity:1}, 300); 
    // }
    // function RestorePaginator(items) 
    // {

    //     $('#RestorefuelReceiptPagiTable').after ('<div id="nav"></div>');  
    //     var rowsShown = 10;  
    //     var rowsTotal = items;  
    //     var numPages = rowsTotal/rowsShown;
    //     numPages= ~~numPages;
    //     for (i = 0;i < numPages;i++) {  
    //         var pageNum = i + 1; 
    //         $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
    //     }  
    //     $('#RestorefuelReceiptPagiTable tbody tr').hide();  
    //     $('#RestorefuelReceiptPagiTable tbody tr').slice (0, rowsShown).show();  
    //     $('#nav a:first').addClass('active');  
    //     $('#nav a').bind('click', function() {  
    //     $('#nav a').removeClass('active');  
    //    $(this).addClass('active');  
    //         var currPage = $(this).attr('rel');  
    //         var startItem = currPage * rowsShown;  
    //         var endItem = startItem + rowsShown;  
    //         $('#RestorefuelReceiptPagiTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
    //         css('display','table-row').animate({opacity:1}, 300);   
    //     }); 
    // }

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
                fuelRecepitCheckboxRestore();
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
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processFuelReceiptTable(res[0]);
                            $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                            renameTableSeq2("FuelReceTable", "page_active");
                        }
                        //alert();
                        // console.log(text);
                        // createFuelReceiptRows(text);
                        // FuelReceiptResult = text;
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
                fuelRecepitCheckboxDelete();
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
				fuelRecepitIds.push($(this).attr('data-id'));
                companyIds.push($(this).attr("date-cusId"));
			});
			console.log(fuelRecepitIds);
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
        console.log(all_ids);
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
                                var res = JSON.parse(text);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processFuelReceiptTable(res[0]);
                                    $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                                    renameTableSeq2("FuelReceTable", "page_active");
                                }
                            }
                        });
                    }
                });           
            }
        });
    });
    //================================= end multipal delete ========================

    //=============== export =============================================
    $("#exportFuelReceiptsDetails").click(function(){
        $.ajax({
            type:"post",
            data:{_token:$("#_token_updateFuelReceipts").val()},
            url: base_path+"/admin/export_FuelReceipts",
            success: function(data) {   
                var rows = JSON.parse(data);
            JSONToCSVConvertor(rows, "FuelReceipts Report", true);
            }
        });
    });
    //== end export data =================================================
// });