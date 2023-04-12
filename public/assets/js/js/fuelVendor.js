var base_path = $("#url").val();
$(document).ready(function() {
// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.fuelVendorClose').click(function(){
        removePagi();
        $('#FuelVendorModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->  
   
    $('#fuelVendor_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelVendor",
            async: false,
            success: function(text) {
                createFuelVendorRows(text);
                FuelVendorResult = text;
             }
        });
        $('#FuelVendorModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get truck  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createFuelVendorRows(FuelVendorResult) {
        var fuelVendorlen = 0;
            if (FuelVendorResult != null) 
            { 
                fuelVendorlen = FuelVendorResult.arrData1.fuelCard.length;

                $("#FuelVendorTable").html('');
                var lentData=[];
                if (fuelVendorlen > 0) {
                   
                    var no=1;
                    for (var j = fuelVendorlen-1; j >= 0; j--) {  
                        var CompID =FuelVendorResult.arrData1.companyID;
                        // var data=FuelVendorResult.arrData1.fuelCard;
                            var fuelVendorId =FuelVendorResult.arrData1.fuelCard[j]._id;
                            var fuelCardType =FuelVendorResult.arrData1.fuelCard[j].fuelCardType;
                            if(FuelVendorResult.arrData1.fuelCard[j].openingDate != null || FuelVendorResult.arrData1.fuelCard[j].openingDate != false)
                            {
                                var openingBale=FuelVendorResult.arrData1.fuelCard[j].openingDate;
                                var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                var date = new Date(openingBale*1000);
                                var year = date.getFullYear();
                                var month = months_arr[date.getMonth()];
                                var day = date.getDate();
                                var openingDate = month+'/'+day+'/'+year;
                            }
                            else
                            {
                                openingDate="----";
                            }
                            var openingBalance =FuelVendorResult.arrData1.fuelCard[j].openingBalance;
                            var currentBalance =FuelVendorResult.arrData1.fuelCard[j].currentBalance;
                            var deleteStatus =FuelVendorResult.arrData1.fuelCard[j].deleteStatus;
                            if(openingBalance !="" || openingBalance != null)
                            {
                                openingBalance=openingBalance;
                            }
                            else
                            {
                                openingBalance="-----";
                            }
                            if(currentBalance != "" || currentBalance != null)
                            {
                                currentBalance=currentBalance;
                            }
                            else
                            {
                                currentBalance="-----";
                            }
                            if(fuelVendorId !=""| fuelVendorId !=null)
                            {
                                fuelVendorId=fuelVendorId;
                            }
                            else
                            {
                                fuelVendorId="-----";
                            }
                            if(deleteStatus == "NO"){
                                // lentData.push(i);
                                var fuelVendorStr = "<tr class='tr' data-id=" + (j + 1) + ">" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='fuelCardType' >" + fuelCardType + "</td>" +
                                "<td data-field='openingDate' >" +openingDate  + "</td>" +
                                "<td data-field='openingBalance' >" + openingBalance + "</td>" +
                                "<td data-field='currentBalance' >" + currentBalance + "</td>" +
                                "<td style='text-align:center'>"+
                                    "<a class=' button-23  edit_modal_fuel_vendor'  title='Edit1' data-fuelCard='"+fuelVendorId+"' data-compID='"+CompID+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='button-23 delete_modal_fuel_vendor'  title='delete' data-fuelCard='"+fuelVendorId+"' data-compID='"+CompID+"' ><i class='fe fe-delete'></i></a>&nbsp"+
                                "</td></tr>";

                                $("#FuelVendorTable").append(fuelVendorStr);
                                no++;
                            }
                    }
                } else {
                    var fuelVendorStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#FuelVendorTable").append(fuelVendorStr);
                }
                var items=lentData.length;
                Paginator(items);
            }else {
            var fuelVendorStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#FuelVendorTable").append(fuelVendorStr);
        }
    }

   

    // <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
    // pagination ==============================================
    function removePagi()
    {
        $('#nav').remove();
        var startItem=0;
        var endItem=10;
        $('#FuelVendorDataTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300); 
    }
    function Paginator(items) 
    {

        $('#FuelVendorDataTable').after ('<div id="nav"></div>');  
        var rowsShown = 10;  
        var rowsTotal = items;  
        var numPages = rowsTotal/rowsShown;
        numPages= ~~numPages;
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1; 
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#FuelVendorDataTable tbody tr').hide();  
        $('#FuelVendorDataTable tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
        $('#nav a').removeClass('active');  
       $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#FuelVendorDataTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);   
        }); 
    }


    function RestoreremovePagi()
    {
        $('#nav').remove();
        var startItem=0;
        var endItem=10;
        $('#RestoreFuelVendorDataTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300); 
    }
    function restorePaginator(items) 
    {

        $('#RestoreFuelVendorDataTable').after ('<div id="nav"></div>');  
        var rowsShown = 10;  
        var rowsTotal = items;  
        var numPages = rowsTotal/rowsShown;
        numPages= ~~numPages;
        for (i = 0;i < numPages;i++) {  
            var pageNum = i + 1; 
            $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
        }  
        $('#RestoreFuelVendorDataTable tbody tr').hide();  
        $('#RestoreFuelVendorDataTable tbody tr').slice (0, rowsShown).show();  
        $('#nav a:first').addClass('active');  
        $('#nav a').bind('click', function() {  
        $('#nav a').removeClass('active');  
       $(this).addClass('active');  
            var currPage = $(this).attr('rel');  
            var startItem = currPage * rowsShown;  
            var endItem = startItem + rowsShown;  
            $('#RestoreFuelVendorDataTable tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
            css('display','table-row').animate({opacity:1}, 300);   
        }); 
    }
    // end ==================================================

//====================================== start add fuel vendor ==================================
    $(".closeAddFuelVendor").click(function(){
        $("#AddFuelVendor").modal("hide");
    });
    $(".create_fuel_vendor_model").click(function(){
        $("#AddFuelVendor").modal("show");
    });
    $('#AddFuelVendor').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".FuelVendorSavebutton").click(function(){
        // alert("DGfdgfg");
        var fuelCardType =$('.addFuel_Card_Type').val();
        // alert(fuelCardType);
        var openingDate =$('#Add_OpeningDate').val();
        var openingBalance =$('#add_Opening_Amount').val();
        var currentBalance=$("#add_currentBalance").val();
        if(fuelCardType=='')
        {
            swal.fire( "'Enter Enter Fuel Card Type");
            $('#addFuel_Card_Type').focus();
            return false;
            
        } 
        if(openingDate=='')
        {
            swal.fire( "'Enter Opening Date");
            $('#Add_OpeningDate').focus();
            return false;
        }
        if(openingBalance=='')
        {
            swal.fire( "'Enter Opening Amount");
            $('#add_Opening_Amount').focus();
            return false;
        }
        if(currentBalance=="")
        {
            swal.fire(" Enter Current Blance");
            $("#add_currentBalance").focus();
            return false;
        }
      
        var formData = new FormData();
        formData.append('_token',$("#_tokenAdd_fuel_vendor").val());
        formData.append('fuelCardType',fuelCardType);
        formData.append('currentBalance',currentBalance);
        formData.append('openingDate',openingDate);
        formData.append('openingBalance',openingBalance);  
        $.ajax({
            type: "POST",
            url: base_path+"/admin/createFuelVendor",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                // console.log(data)                    
                swal.fire("Done!", "Fuel Vendor added successfully", "success");
                $('#AddFuelVendor').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelVendor",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        createFuelVendorRows(text);
                        var fuelVendorlen = 0;
                        if (text != null) 
                        { 
                            fuelVendorlen = text.arrData1.fuelCard.length;
                            var lentData=[];
                            if (fuelVendorlen > 0) {
                                for (var j = fuelVendorlen-1; j >= 0; j--) { 
                                    var fuelVendorId =text.arrData1.fuelCard[j]._id;
                                    var fuelCardType =text.arrData1.fuelCard[j].fuelCardType;
                                    var html = "<option value='" + fuelVendorId + "'> " + fuelCardType + "</option>";
                                    $(".card_vendor_type").append(html);
                                }
                            }
                        }
                        // $('.card_vendor_type ').select2('refresh')
                     }
                });
            }
        });
    });
//======================================  end add fuel vendor ==================================
    
    //======================  start edit fuel vendor ==========================
     $(".closeFuelVendorUpdatebutton").click(function(){
        $("#UpdateFuelVendor").modal("hide");
     });
     $('#UpdateFuelVendor').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
     $("body").on('click','.edit_modal_fuel_vendor', function(){
        var fuelCard=$(this).attr("data-fuelCard");
        var compID=$(this).attr("data-compID");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editFuelVendor",
            async: false,
            data:{fuelCard:fuelCard, compID:compID},
            //dataType:JSON,
            success: function(text) {
                // alert(text.companyID);
                var openiDate=text.openingDate;
                var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                var date = new Date(openiDate*1000);
                var year = date.getFullYear();
                var month = months_arr[date.getMonth()];
                var day = date.getDate();
                if(day <=9 )
                {
                    var openingDate = year+'-0'+day+'-'+month;
                }
                else
                {
                    var openingDate = year+'-'+month+'-'+day;
                }

                $('.updateFuel_Card_Type').val(text.fuelCardType);
                $('.fuel_id').val(text._id);
                $('.comp_id').val(text.companyID);
                $('#update_OpeningDate').val(openingDate);
                // $('#update_Opening_Amount').val(text.openingBalance);
                // $("#update_currentBalance").val(text.currentBalance);
             }
        });

        $("#UpdateFuelVendor").modal("show");
     });
     $(".FuelVendorUpdatebutton").click(function(){
        var fuelCardType =$('.updateFuel_Card_Type').val();
        var compID =$('.comp_id').val();
        var fuel_id =$('.fuel_id').val();
        // alert(fuelCardType);
        var openingDate =$('#update_OpeningDate').val();
        // var openingBalance =$('#update_Opening_Amount').val();
        // var currentBalance=$("#update_currentBalance").val();
        if(fuelCardType=='')
        {
            swal.fire( "'Enter Fuel Card Type");
            $('#updateFuel_Card_Type').focus();
            return false;            
        } 
        if(openingDate=='')
        {
            swal.fire( "'Enter Opening Date");
            $('#update_OpeningDate').focus();
            return false;
        }
        // if(openingBalance=='')
        // {
        //     swal.fire( "'Enter Opening Amount");
        //     $('#update_Opening_Amount').focus();
        //     return false;
        // }
        // if(currentBalance=="")
        // {
        //     swal.fire(" Enter Current Blance");
        //     $("#update_currentBalance").focus();
        //     return false;
        // }
      
        var formData = new FormData();
        formData.append('_token',$("#_tokenAdd_fuel_vendor").val());
        formData.append('fuelCardType',fuelCardType);
        formData.append('compID',compID);
        formData.append('fuel_id',fuel_id);
        // formData.append('currentBalance',currentBalance);
        formData.append('openingDate',openingDate);
        // formData.append('openingBalance',openingBalance);  
        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateFuelVendor",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                // console.log(data)                    
                swal.fire("Done!", "Fuel Vendor updated successfully", "success");
                $('#UpdateFuelVendor').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelVendor",
                    async: false,
                    success: function(text) {
                        // console.log(text);
                        createFuelVendorRows(text);
                        FuelVendorResult = text;
                     }
                });
            }
        });
     });
    // -========================== end update  fuel vendor============================

     // ============================ start delete fuel vendor =======================
    $('body').on('click','.delete_modal_fuel_vendor',function(){
        var id=$(this).attr("data-fuelCard");
        var compID=$(this).attr("data-compID");
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: base_path+"/admin/deleteFuelVendor",
                    data: { _token: $("#_tokenAdd_fuel_vendor").val(), id: id,compID:compID},
                    success: function(resp){
                        swal.fire("Done!", "Fuel Vendor Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getFuelVendor",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createFuelVendorRows(text);
                                FuelVendorResult = text;
                             }
                        });
                        $('#FuelVendorModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //==========================  end delete fuel vendor ======================

    //====================== start restore fuel vendor ======================
    
    $(".restore_fuel_vendor").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelVendor",
            async: false,
            success: function(text) {
                console.log(text);
                RestoreFuelVendorRows(text);
                FuelVendorResult = text;
             }
        });
        $("#restore_fuel_vendor_list").modal("show");
    });
    $(".restorefuelVendorClose").click(function(){
        $("#restore_fuel_vendor_list").modal("hide");
    });
    function RestoreFuelVendorRows(FuelVendorResult) {
        var fuelVendorlen = 0;
        if (FuelVendorResult != null) 
        { 
            fuelVendorlen = FuelVendorResult.arrData1.fuelCard.length;

            $("#restoreFuelVendorTable").html('');
            var lentData=[];
            if (fuelVendorlen > 0) 
            {               
                var no=1;
                for (var j = fuelVendorlen-1; j >= 0; j--) {  
                    var CompID =FuelVendorResult.arrData1.companyID;
                    // var data=FuelVendorResult.arrData1.fuelCard;
                        var fuelVendorId =FuelVendorResult.arrData1.fuelCard[j]._id;
                        var fuelCardType =FuelVendorResult.arrData1.fuelCard[j].fuelCardType;
                        if(FuelVendorResult.arrData1.fuelCard[j].openingDate != null || FuelVendorResult.arrData1.fuelCard[j].openingDate != false)
                        {
                            var openingBale=FuelVendorResult.arrData1.fuelCard[j].openingDate;
                            var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            var date = new Date(openingBale*1000);
                            var year = date.getFullYear();
                            var month = months_arr[date.getMonth()];
                            var day = date.getDate();
                            var openingDate = month+'/'+day+'/'+year;
                        }
                        else
                        {
                            openingDate="----";
                        }
                        var openingBalance =FuelVendorResult.arrData1.fuelCard[j].openingBalance;
                        var currentBalance =FuelVendorResult.arrData1.fuelCard[j].currentBalance;
                        var deleteStatus =FuelVendorResult.arrData1.fuelCard[j].deleteStatus;
                        if(openingBalance !="" || openingBalance != null)
                        {
                            openingBalance=openingBalance;
                        }
                        else
                        {
                            openingBalance="-----";
                        }
                        if(currentBalance != "" || currentBalance != null)
                        {
                            currentBalance=currentBalance;
                        }
                        else
                        {
                            currentBalance="-----";
                        }
                        if(fuelVendorId !=""| fuelVendorId !=null)
                        {
                            fuelVendorId=fuelVendorId;
                        }
                        else
                        {
                            fuelVendorId="-----";
                        }
                        if(deleteStatus == "YES"){
                                var fuelVendorStr = "<tr data-id=" + (j + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' class='check_fuelCardVendor_one' name='all_fuelCard_id[]' data-fuelCard=" + fuelVendorId+ " date-compID="+CompID+"  value="+fuelVendorId+"></td>" +
                                "<td data-field='fuelCardType' >" + fuelCardType + "</td>" +
                                "<td data-field='openingDate' >" +openingDate  + "</td>" +
                                "<td data-field='openingBalance' >" + openingBalance + "</td>" +
                                "<td data-field='currentBalance' >" + currentBalance + "</td></tr>";

                                $("#restoreFuelVendorTable").append(fuelVendorStr);
                                no++;
                            }
                    }
                } else {
                    var fuelVendorStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#restoreFuelVendorTable").append(fuelVendorStr);
                }
                // var items=lentData.length;
                // restorePaginator(items);
            }else {
            var fuelVendorStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#restoreFuelVendorTable").append(fuelVendorStr);
        }
    }
    $(document).on("change", ".fuel_all_ids", function() 
    {
        if(this.checked) {
            $('.check_fuelCardVendor_one:checkbox').each(function() 
            {
                this.checked = true;
                fuelVendorCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_fuelCardVendor_one:checkbox').each(function() {
                this.checked = false;
                fuelVendorCheckboxRestore();
            });
        }
    });
    $('body').on('click','.check_fuelCardVendor_one',function(){
        fuelVendorCheckboxRestore();
    });
    function fuelVendorCheckboxRestore()
    {
        var fuleVendorIds = [];
        var companyIds=[]
			$.each($("input[name='all_fuelCard_id[]']:checked"), function(){
				fuleVendorIds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
			});
			console.log(fuleVendorIds);
			var TruckCheckedIds =JSON.stringify(fuleVendorIds);
			$('#checked_fuelVendor_ids').val(TruckCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
            // console.log(companyCheckedIds);
			$('#checked_fuel_vendor_company_ids').val(companyCheckedIds);


			if(fuleVendorIds.length > 0)
			{
				$('#restore_fuelVendor_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_fuelVendor_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_fuelVendor_data',function(){
        var all_ids=$('#checked_fuelVendor_ids').val();
        var custID=$("#checked_fuel_vendor_company_ids").val();
        // console.log('all_ids'+all_ids + " , company id=" +custID );
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenEditTruck").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restoreFuelVendor",
            success: function(response) {               
                swal.fire("Done!", "Fuel Vendor Restored successfully", "success");
                $("#restore_fuel_vendor_list").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelVendor",
                    async: false,
                    success: function(text) {
                        console.log(text);
                        createFuelVendorRows(text);
                        FuelVendorResult = text;
                     }
                });
            }
        });
    });
    //======================= end restore fuel vendor ===================
      //================== export data ===================================
      $("#exportFuelVendorDetails").click(function(){
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenEditTruck").val()},
            url: base_path+"/admin/export_fuelVendor",
            success: function(data) {   
                var rows = JSON.parse(data);
            JSONToCSVConvertor(rows, "Fuel Card Report", true);
            }
        });
    });
    //===================== end export ===================================
});