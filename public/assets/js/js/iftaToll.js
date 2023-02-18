var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.iftaTollClose').click(function(){
        removePagi();
        $('#iftaTollModal').modal('hide');
    });
// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('body').on('click','.iftaToll_navbar',function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getInvoicedNumber",
            async: false,
            success: function (text) {
                $("#fuel_recepit_invoice_no_list").html();
                var len2 = text.length;
                $('#fuel_recepit_invoice_no_list').html();
                var html = "";
                for (var j = 0; j < len2; j++) {
                    var data = text[j];
                    $.each(data, function(i, v) { 
                        var driverId = text[j][i]._id;
                         html+= "<option value='" + driverId + "'>" + driverId + " </option>";                        
                    });
                    
                }
                $("#fuel_recepit_invoice_no_list").append(html);
            }
        });
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getIftaToll",
            async: false,
            success: function(text) {
                // console.log(text);
                createIftaTollRows(text);
                IftaTollResult = text;
             }
        });

        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruck",
            async: false,
            success: function(truckResult) {
                if (truckResult != null) 
                {
                    trucklen1 = truckResult.truck.truck.length;
                    $("#truck_nummberIftaToll").html('');
                    if (trucklen1 > 0) 
                    {
                        var no=1;
                        var html=""
                        for (var i = trucklen1-1; i > 0; i--) 
                        {  
                            var truckNumber =truckResult.truck.truck[i].truckNumber;
                            html+="<option value="+truckNumber+">"+truckNumber+"</option>"
                        }
                        $("#truck_nummberIftaToll").append(html);
                    }
                }
             }
        });
        $('#iftaTollModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    function createIftaTollRows(IftaTollResult) {
        var IftaTolllen = 0;
            if (IftaTollResult != null) 
            {
                IftaTolllen = IftaTollResult.iftaToll.length;
                $("#iftaTollTable").html('');
                if (IftaTolllen > 0) 
                {
                   
                    var no=1;
                    var lentData=[];
                    for (var j = IftaTolllen-1; j >= 0; j--) 
                    {  
                        var data= IftaTollResult.iftaToll[j];
                        $.each(data, function(i, v) { 
                            var comId =IftaTollResult.companyId;
                            var IftaTollId =IftaTollResult.iftaToll[j][i]._id;
                            var transType =IftaTollResult.iftaToll[j][i].transType;
                            var location =IftaTollResult.iftaToll[j][i].location;
                            var transponder =IftaTollResult.iftaToll[j][i].transponder;
                            var licensePlate =IftaTollResult.iftaToll[j][i].licensePlate;
                            var amount =IftaTollResult.iftaToll[j][i].amount;
                            var truckNo =IftaTollResult.iftaToll[j][i].truckNo;
                            var invoiceNo =IftaTollResult.iftaToll[j][i].invoiceNumber;
                        
                            var deleteStatus =IftaTollResult.iftaToll[j][i].deleteStatus;
                            if(transType !="" || transType !=null)
                            {
                                transType=transType;
                            }
                            else
                            {
                                transType="-----";
                            }
                            if(location !="" || location !=null)
                            {
                                location=location;
                            }
                            else
                            {
                                location="-----";
                            }
                            if(transponder !="" || transponder !=null)
                            {
                                transponder=transponder;
                            }
                            else
                            {
                                transponder="-----";
                            }
                            if(licensePlate !="" || licensePlate !=null)
                            {
                                licensePlate=licensePlate;
                            }
                            else
                            {
                                licensePlate="-----";
                            }
                            if(amount !="" || amount !=null)
                            {
                                amount=amount;
                            }
                            else
                            {
                                amount="-----";
                            }
                            if(truckNo !="" || truckNo !=null)
                            {
                                truckNo=truckNo;
                            }
                            else
                            {
                                truckNo="-----";
                            }
                            if(invoiceNo !="" || invoiceNo !=null)
                            {
                                invoiceNo=invoiceNo;
                            }
                            else
                            {
                                invoiceNo="-----";
                            }
                            if(IftaTollResult.iftaToll[j][i].tollDate != null)
                            {
                                var tollDate=IftaTollResult.iftaToll[j][i].tollDate;
                                var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                var date = new Date(tollDate*1000);
                                var year = date.getFullYear();
                                var month = months_arr[date.getMonth()];
                                var day = date.getDate();
                                var transectionDate = month+'/'+day+'/'+year;
                            }
                            else
                            {
                                transectionDate="----";
                            }

                            if(deleteStatus == "NO")
                            {
                                lentData.push(i);
                                var IftaTollStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                "<td data-field=''><input type='checkbox' class='delete_check_iftaToll_one' name='delete_checkediftaToll_ids[]' data-id=" + IftaTollId + " date-cusId=" + comId + "  value=" + IftaTollId + "></td>" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='transectionDate' >" + transectionDate + "</td>" +
                                "<td data-field='transType' >" + transType + "</td>" +
                                "<td data-field='location' >" + location + "</td>" +
                                "<td data-field='transponder' >" + transponder + "</td>" +
                                "<td data-field='licensePlate' >" + licensePlate + "</td>" +
                                "<td data-field='amount' ><i class='fa fa-usd'> " + amount + "</i></td>" +
                                "<td data-field='truckNo' >" + truckNo + "</td>" +
                                "<td data-field='invoiceNo' >" + invoiceNo + "</td>" +
                        
                                "<td style='text-align:center'>"+
                                    "<td style='width: 100px'>"+
                                    " <a class='button-23 edit_modal_iftaToll ' id='editmodel' title='Edit' data-tollId='"+IftaTollId+"' data-compID='"+comId+"' ><i class='fe fe-edit'></i>"+
                                    "</a> <a class='delete1 button-23 delete_modal_iftaToll '  title='Delete' data-tollId='"+IftaTollId+"' data-compID='"+comId+"' ><i class='fe fe-delete'></i></a>"+
                                "</td></tr>";  
                            
                            

                                $("#iftaTollTable").append(IftaTollStr);
                                no++;
                            }
                        });
                    }
                } else {
                    var IftaTollStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#iftaTollTable").append(IftaTollStr);
                }
                var items=lentData.length;
                    Paginator(items);
            }else {
            var IftaTollStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#iftaTollTable").append(IftaTollStr);
        }
    }

   

    //end view ======================================================
    // pagination ===============================================
    function removePagi()
    {
        $('#nav').remove();
        var startItem=0;
        var endItem=10;
        $('#IftaTollDetaillsTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300); 
    }
    function Paginator(items) 
    {

        $('#IftaTollDetaillsTable').after ('<div id="nav"></div>');  
        var rowsShown = 10;  
        var rowsTotal = items;  
        var numPages = rowsTotal/rowsShown;
        numPages= ~~numPages;
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1; 
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#IftaTollDetaillsTable tbody tr').hide();  
        $('#IftaTollDetaillsTable tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
        $('#nav a').removeClass('active');  
       $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#IftaTollDetaillsTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);   
        }); 
    } 
    function RestoreremovePagi()
    {
        $('#nav').remove();
        var startItem=0;
        var endItem=10;
        $('#RestoreIftaTollDetaillsTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300); 
    }
    function RestorePaginator(items) 
    {

        $('#RestoreIftaTollDetaillsTable').after ('<div id="nav"></div>');  
        var rowsShown = 10;  
        var rowsTotal = items;  
        var numPages = rowsTotal/rowsShown;
        numPages= ~~numPages;
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1; 
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#RestoreIftaTollDetaillsTable tbody tr').hide();  
        $('#RestoreIftaTollDetaillsTable tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
        $('#nav a').removeClass('active');  
       $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#RestoreIftaTollDetaillsTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);   
        }); 
    } 
    //================================= start ifta toll create =============================
    $(".createIftaTollModalBtn").click(function(){
        $("#createIftaTollFormModal").modal("show");
    });
    $('#createIftaTollFormModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".closeIftaToll").click(function(){
        $("#createIftaTollFormModal").modal("hide");
    });
    $(".saveIftaToll").click(function(){
        var invoiceNo =$('.createIftaTollNo').val();
        var tollDate =$('.createIftaTollDate').val();
        var transactionTime =$('.createIftaTollTime').val();
        var transType=$(".createIftaTollTransactionType").val();
        var location=$(".createIftaTollLocationName").val();
        var truckno=$(".createIftaTollTruckNumber").val();
        var transponder=$(".createIftaTollTransponder").val();
        var licensePlate=$(".createIftaTollLicensePlate").val();
        var amount=$(".createIftaTollAmount").val();
        if(tollDate=='')
        {
            swal.fire( "'Enter Toll Date");
            $('.createIftaTollDate').focus();
            return false;
            
        } 
        if(transType=='')
        {
            swal.fire( "'Enter Transaction Type");
            $('.createIftaTollTransactionType').focus();
            return false;
        }
        if(location=='')
        {
            swal.fire( "'EnterLocation");
            $('.createIftaTollLocationName').focus();
            return false;
        }
        if(licensePlate=="")
        {
            swal.fire(" Enter license Plate");
            $(".createIftaTollLicensePlate").focus();
            return false;
        }
        if(amount=="")
        {
            swal.fire(" Enter Amount");
            $(".createIftaTollAmount").focus();
            return false;
        }
      
        var formData = new FormData();
        formData.append('_token',$("#_token_createIftaToll").val());
        formData.append('invoiceNo',invoiceNo);
        formData.append('tollDate',tollDate);
        formData.append('transactionTime',transactionTime);
        formData.append('transType',transType); 
        formData.append('location',location); 
        formData.append('truckno',truckno); 
        formData.append('transponder',transponder); 
        formData.append('licensePlate',licensePlate); 
        formData.append('amount',amount);  
        $.ajax({
            type: "POST",
            url: base_path+"/admin/createIftaToll",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Ifta Toll added successfully", "success");
                $('#createIftaTollFormModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getIftaToll",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createIftaTollRows(text);
                        IftaTollResult = text;
                     }
                });
            }
        });
    });
    //========================================= end ifta toll create ====================


    //========================= start ifta toll edit & update =======================
    $('body').on('click',".edit_modal_iftaToll",function(){
        var id = $(this).attr("data-tollId");
        var comId = $(this).attr("data-compID");
        $.ajax({
            type: "GET",
            url: base_path + "/admin/editIftaToll",
            data: { id: id, comId: comId },
            async: false,
            success: function (res) {
                var tollDate=res.tolls.tollDate;
                var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                var date = new Date(tollDate*1000);
                var year = date.getFullYear();
                var month = months_arr[date.getMonth()];
                var day = date.getDate();
                if(day <=9 )
                {
                    var tollDate = year+'-0'+day+'-'+month;
                }
                else
                {
                    var tollDate = year+'-'+month+'-'+day;
                }
                $(".updateIftaComId").val(res.companyID);
                $(".updateiftaTollId").val(res.tolls._id);
                $('.updateIftaTollNo').val(res.tolls.invoiceNumber);
                $('.updateIftaTollDate').val(tollDate);
                if(typeof(res.tolls.transactionTime) != "undefined" && res.tolls.transactionTime !== null){
                    $('.updateIftaTollTime').val(res.tolls.transactionTime);
                }                
                $(".updateIftaTollTransactionType").val(res.tolls.transType);
                $(".updateIftaTollLocationName").val(res.tolls.location);
                $(".updateIftaTollTruckNumber").val(res.tolls.truckNo);
                $(".updateIftaTollTransponder").val(res.tolls.transponder);
                $(".updateIftaTollLicensePlate").val(res.tolls.licensePlate);
                $(".updateIftaTollAmount").val(res.tolls.amount);
            }
        });
        $("#updateIftaTollFormModal").modal("show");
    });
    $('#updateIftaTollFormModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".closeUpdateIftaToll").click(function(){
        $("#updateIftaTollFormModal").modal("hide");
    });
    $(".updateIftaToll").click(function(){
        var id =$('.updateiftaTollId').val();
        var comId =$('.updateIftaComId').val();
        var invoiceNo =$('.updateIftaTollNo').val();
        var tollDate =$('.updateIftaTollDate').val();
        var transactionTime =$('.updateIftaTollTime').val();
        var transType=$(".updateIftaTollTransactionType").val();
        var location=$(".updateIftaTollLocationName").val();
        var truckno=$(".updateIftaTollTruckNumber").val();
        var transponder=$(".updateIftaTollTransponder").val();
        var licensePlate=$(".updateIftaTollLicensePlate").val();
        var amount=$(".updateIftaTollAmount").val();
        if(tollDate=='')
        {
            swal.fire( "'Enter Toll Date");
            $('.updateIftaTollDate').focus();
            return false;
            
        } 
        if(transType=='')
        {
            swal.fire( "'Enter Transaction Type");
            $('.updateIftaTollTransactionType').focus();
            return false;
        }
        if(location=='')
        {
            swal.fire( "'EnterLocation");
            $('.updateIftaTollLocationName').focus();
            return false;
        }
        if(licensePlate=="")
        {
            swal.fire(" Enter license Plate");
            $(".updateIftaTollLicensePlate").focus();
            return false;
        }
        if(amount=="")
        {
            swal.fire(" Enter Amount");
            $(".updateIftaTollAmount").focus();
            return false;
        }
      
        var formData = new FormData();
        formData.append('_token',$("#_token_updateIftaToll").val());
        formData.append('id',id);
        formData.append('comId',comId);
        formData.append('invoiceNo',invoiceNo);
        formData.append('tollDate',tollDate);
        formData.append('transactionTime',transactionTime);
        formData.append('transType',transType); 
        formData.append('location',location); 
        formData.append('truckno',truckno); 
        formData.append('transponder',transponder); 
        formData.append('licensePlate',licensePlate); 
        formData.append('amount',amount);  
        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateIftaToll",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Ifta Toll Updated successfully", "success");
                $('#updateIftaTollFormModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getIftaToll",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createIftaTollRows(text);
                        IftaTollResult = text;
                     }
                });
            }
        });
    });
    //========================== end ifta toll edit & update ========================

    //================================ start ifta toll delete =======================
    $('body').on('click',".delete_modal_iftaToll",function(){
        var id = $(this).attr("data-tollId");
        var comId = $(this).attr("data-compID");
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'post',
                    url: base_path + "/admin/deleteIftaToll",
                    data: { _token: $("#_token_updateIftaToll").val(), id: id, comId: comId },
                    success: function (resp) {
                        swal.fire("Done!", " Ifta Tolls deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getIftaToll",
                            async: false,
                            //dataType:JSON,
                            success: function(text) {
                                //alert();
                                console.log(text);
                                createIftaTollRows(text);
                                IftaTollResult = text;
                             }
                        });
                        $('#iftaTollModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            }
        });
    });
    //=============================== end ifta toll delete ==============================

    //============================ start ifta toll restore ============================
    $(".restoreIftaTollData").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getIftaToll",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
               restoreIftaTollRows(text);
                restoreIftaTollResult = text;
             }
        });
        $("#restoreiftaTollModal").modal("show");
    });
    $(".closeIftaTollRestore").click(function(){
        $("#restoreiftaTollModal").modal("hide");
    });
    function restoreIftaTollRows(restoreIftaTollResult)
    {
        var fuelReceiptlen = 0;
            if (restoreIftaTollResult != null) 
            {
                var lentData=[];
                IftaTolllen = restoreIftaTollResult.iftaToll.length;
                $("#restoreIftaTollTable").html('');
                if (IftaTolllen > 0) {                   
                    var no=1;
                    for (var j = IftaTolllen-1; j >= 0; j--) {  
                        var comId =restoreIftaTollResult.companyId;
                        var data=restoreIftaTollResult.iftaToll[j];
                        $.each(data, function(i, v) { 
                            var IftaTollId =restoreIftaTollResult.iftaToll[j][i]._id;
                            var transectionDate =restoreIftaTollResult.iftaToll[j][i].tollDate;
                            var transType =restoreIftaTollResult.iftaToll[j][i].transType;
                            var location =restoreIftaTollResult.iftaToll[j][i].location;
                            var transponder =restoreIftaTollResult.iftaToll[j][i].transponder;
                            var licensePlate =restoreIftaTollResult.iftaToll[j][i].licensePlate;
                            var amount =restoreIftaTollResult.iftaToll[j][i].amount;
                            var truckNo =restoreIftaTollResult.iftaToll[j][i].truckNo;
                            var invoiceNo =restoreIftaTollResult.iftaToll[j][i].invoiceNumber;
                            var deleteStatus =restoreIftaTollResult.iftaToll[j][i].deleteStatus;
                            if(deleteStatus == "YES"){
                                lentData.push(i);
                                var IftaTollStr = "<tr data-id=" + (i + 1) + ">" +
                            
                                "<td data-field='no'><input type='checkbox' class='check_iftaToll_one' name='checkediftaToll_ids[]' data-id=" + IftaTollId + " date-cusId=" + comId + "  value=" + IftaTollId + "></td>" +
                                "<td data-field='transectionDate' >" + transectionDate + "</td>" +
                                "<td data-field='transType' >" + transType + "</td>" +
                                "<td data-field='location' >" + location + "</td>" +
                                "<td data-field='transponder' >" + transponder + "</td>" +
                                "<td data-field='licensePlate' >" + licensePlate + "</td>" +
                                "<td data-field='amount' ><i class='fa fa-usd'> " + amount + "</i></td>" +
                                "<td data-field='truckNo' >" + truckNo + "</td>" +
                                "<td data-field='invoiceNo' >" + invoiceNo + "</td></tr>";

                            $("#restoreIftaTollTable").append(IftaTollStr);
                            }
                        });
                    }
                } 
                else 
                {
                    var IftaTollStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#restoreIftaTollTable").append(IftaTollStr);
                }
                var items=lentData.length;
                RestorePaginator(items);
            }else {
            var IftaTollStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#restoreIftaTollTable").append(IftaTollStr);
        }
    }

    $(document).on("change", ".all_checked_ids", function () {
        if (this.checked) {
            $('.check_iftaToll_one:checkbox').each(function () {
                this.checked = true;
                IftaTollCheckboxRestore();
            });
        }
        else {
            $('.check_iftaToll_one:checkbox').each(function () {
                this.checked = false;
            });
        }
    });
    $('body').on('click', '.check_iftaToll_one', function () {
        IftaTollCheckboxRestore();
    });
    function IftaTollCheckboxRestore() {
        var IftaTollsdIds = [];
        var companyIds = []
        $.each($("input[name='checkediftaToll_ids[]']:checked"), function () {
            IftaTollsdIds.push($(this).val());
            companyIds.push($(this).attr("date-cusId"));
        });
        console.log(IftaTollsdIds);
        var IftaTollsCheckedIds = JSON.stringify(IftaTollsdIds);
        $('#checked_ifta_toll_ids').val(IftaTollsCheckedIds);

        var companyCheckedIds = JSON.stringify(companyIds);
        $('#checked_iftaToll_company_ids').val(companyCheckedIds);


        if (IftaTollsdIds.length > 0) {
            $('#restoreIftaTollData_btn').removeAttr('disabled');
        }
        else {
            $('#restoreIftaTollData_btn').attr('disabled', true);
        }
    }
    $('body').on('click', '.restoreIftaTollData_btn', function () {
        var all_ids = $('#checked_ifta_toll_ids').val();
        var custID = $("#checked_iftaToll_company_ids").val();
        $.ajax({
            type: "post",
            data: { _token: $("#_token_updateIftaToll").val(), all_ids: all_ids, custID: custID },
            url: base_path + "/admin/restoreIftaToll",
            success: function (response) {
                swal.fire("Done!", "Ifta Tolls Restored successfully", "success");
                $("#restoreiftaTollModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getIftaToll",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createIftaTollRows(text);
                        IftaTollResult = text;
                     }
                });
            }
        });
    });
    //============================ end ifta toll restore ============================

    
    //================================ start multi delete toll ==============================
    $(document).on("change", ".delete_all_checked_ids", function () {
        if (this.checked) {
            $('.delete_check_iftaToll_one:checkbox').each(function () {
                this.checked = true;
                IftaTollCheckboxDelete();
            });
        }
        else {
            $('.delete_check_iftaToll_one:checkbox').each(function () {
                this.checked = false;
            });
        }
    });
    $('body').on('click', '.delete_check_iftaToll_one', function () {
        IftaTollCheckboxDelete();
    });
    function IftaTollCheckboxDelete() {
        var IftaTollsdIds = [];
        var companyIds = []
        $.each($("input[name='delete_checkediftaToll_ids[]']:checked"), function () {
            IftaTollsdIds.push($(this).val());
            companyIds.push($(this).attr("date-cusId"));
        });
        console.log(IftaTollsdIds);
        var IftaTollsCheckedIds = JSON.stringify(IftaTollsdIds);
        $('#delete_checked_ifta_toll_ids').val(IftaTollsCheckedIds);

        var companyCheckedIds = JSON.stringify(companyIds);
        $('#delete_checked_iftaToll_company_ids').val(companyCheckedIds);


        if (IftaTollsdIds.length > 0) {
            $('#delete_IftaTollData_btn').removeAttr('disabled');
        }
        else {
            $('#delete_IftaTollData_btn').attr('disabled', true);
        }
    }
    $('body').on('click', '.delete_IftaTollData_btn', function () {
        var all_ids = $('#delete_checked_ifta_toll_ids').val();
        var custID = $("#delete_checked_iftaToll_company_ids").val();
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: "post",
                    data: { _token: $("#_token_updateIftaToll").val(), all_ids: all_ids, custID: custID },
                    url: base_path + "/admin/deleteMultiIftaToll",
                    success: function (response) {
                        swal.fire("Done!", "Ifta Tolls Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getIftaToll",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createIftaTollRows(text);
                                IftaTollResult = text;
                            }
                        });
                    }
                });
            }
        });
    });
    //================================= end multi delete toll ====================
});