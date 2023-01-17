var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.fuelVendorClose').click(function(){
        $('#FuelVendorModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->  
   
    $('#fuelVendor_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelVendor",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
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
        //alert(FuelVendorResult);
            if (FuelVendorResult != null) {
                
                fuelVendorlen = FuelVendorResult.fuelCard.length;

                $("#FuelVendorTable").html('');

                if (fuelVendorlen > 0) {
                   
                    var no=1;
                    for (var i = fuelVendorlen-1; i >= 0; i--) {  
                        var CompID =FuelVendorResult.companyID;
                        var fuelVendorId =FuelVendorResult.fuelCard[i]._id;
                        var fuelCardType =FuelVendorResult.fuelCard[i].fuelCardType;
                        var openingDate =new Date(FuelVendorResult.fuelCard[i].openingDate);
                        var openingBalance =FuelVendorResult.fuelCard[i].openingBalance;
                        var currentBalance =FuelVendorResult.fuelCard[i].currentBalance;
                        var deleteStatus =FuelVendorResult.fuelCard[i].deleteStatus;
                        if(FuelVendorResult.fuelCard[i].openingDate != null)
                        {
                            openingDate= ((openingDate.getMonth() > 8) ? (openingDate.getMonth() + 1) : ('0' + (openingDate.getMonth() + 1))) + '/' + ((openingDate.getDate() > 9) ? openingDate.getDate() : ('0' + openingDate.getDate())) + '/' + openingDate.getFullYear();
                        }
                        else
                        {
                            openingDate="----";
                        }
              //alert(fuelVendorId);
                        if(deleteStatus == "NO"){
                            //alert("ff");
                            var fuelVendorStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'>" + no + "</td>" +
                            "<td data-field='fuelCardType' >" + fuelCardType + "</td>" +
                            "<td data-field='openingDate' >" +openingDate  + "</td>" +
                            "<td data-field='openingBalance' >" + openingBalance + "</td>" +
                            "<td data-field='currentBalance' >" + currentBalance + "</td>" +
                            "<td style='text-align:center'>"+
                                "<a class='mt-2 button-29 fs-14 text-white edit_modal_fuel_vendor'  title='Edit1' data-fuelCard='"+fuelVendorId+"' data-compID='"+CompID+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                "<a class='mt-2 button-29 fs-14 text-white delete_modal_fuel_vendor'  title='delete' data-fuelCard='"+fuelVendorId+"' data-compID='"+CompID+"' ><i class='fe fe-trash'></i></a>&nbsp"+
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
            }else {
            var fuelVendorStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#FuelVendorTable").append(fuelVendorStr);
        }
    }

   

// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  

//====================================== start add fuel vendor ==================================
    $(".closeAddFuelVendor").click(function(){
        $("#AddFuelVendor").modal("hide");
    });
    $(".create_fuel_vendor_model").click(function(){
        $("#AddFuelVendor").modal("show");
        $("#AddFuelCard").modal("hide");
        $('#FuelCardModal').modal('hide');
        $('#UpdateFuelCard').modal('hide');
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
                console.log(data)                    
                swal.fire("Done!", "Fuel Vendor added successfully", "success");
                $('#AddFuelVendor').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getFuelVendor",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createFuelVendorRows(text);
                        FuelVendorResult = text;
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
                $('.updateFuel_Card_Type').val(text.fuelCardType);
                $('.fuel_id').val(text._id);
                $('.comp_id').val(text.companyID);
                $('#update_OpeningDate').val(text.openingDate);
                $('#update_Opening_Amount').val(text.openingBalance);
                $("#update_currentBalance").val(text.currentBalance);
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
        var openingBalance =$('#update_Opening_Amount').val();
        var currentBalance=$("#update_currentBalance").val();
        if(fuelCardType=='')
        {
            swal.fire( "'Enter Enter Fuel Card Type");
            $('#updateFuel_Card_Type').focus();
            return false;            
        } 
        if(openingDate=='')
        {
            swal.fire( "'Enter Opening Date");
            $('#update_OpeningDate').focus();
            return false;
        }
        if(openingBalance=='')
        {
            swal.fire( "'Enter Opening Amount");
            $('#update_Opening_Amount').focus();
            return false;
        }
        if(currentBalance=="")
        {
            swal.fire(" Enter Current Blance");
            $("#update_currentBalance").focus();
            return false;
        }
      
        var formData = new FormData();
        formData.append('_token',$("#_tokenAdd_fuel_vendor").val());
        formData.append('fuelCardType',fuelCardType);
        formData.append('compID',compID);
        formData.append('fuel_id',fuel_id);
        formData.append('currentBalance',currentBalance);
        formData.append('openingDate',openingDate);
        formData.append('openingBalance',openingBalance);  
        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateFuelVendor",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Fuel Vendor updated successfully", "success");
                $('#UpdateFuelVendor').modal('hide');
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
                restoreFuelVendorResult = text;
             }
        });
        $("#restore_fuel_vendor_list").modal("show");
    });
    $(".restorefuelVendorClose").click(function(){
        $("#restore_fuel_vendor_list").modal("hide");
    });
    function RestoreFuelVendorRows(restoreFuelVendorResult) {
        var fuelVendorlen = 0;
        //alert(restoreFuelVendorResult);
            if (restoreFuelVendorResult != null) {
                
                fuelVendorlen = restoreFuelVendorResult.fuelCard.length;

                $("#restoreFuelVendorTable").html('');

                if (fuelVendorlen > 0) {
                   
                    var no=1;
                    for (var i = fuelVendorlen-1; i >= 0; i--) {  
                        var CompID =restoreFuelVendorResult.companyID;
                        var fuelVendorId =restoreFuelVendorResult.fuelCard[i]._id;
                        var fuelCardType =restoreFuelVendorResult.fuelCard[i].fuelCardType;
                        var openingDate =restoreFuelVendorResult.fuelCard[i].openingDate;
                        var openingBalance =restoreFuelVendorResult.fuelCard[i].openingBalance;
                        var currentBalance =restoreFuelVendorResult.fuelCard[i].currentBalance;
                        var deleteStatus =restoreFuelVendorResult.fuelCard[i].deleteStatus;
              //alert(fuelVendorId);
                        if(deleteStatus == "YES"){
                            //alert("ff");
                            var fuelVendorStr = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' class='check_fuelCard_one' name='all_fuelCard_id[]' data-fuelCard=" + fuelVendorId+ " date-compID="+CompID+"  value="+fuelVendorId+"></td>" +
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
            $('.check_fuelCard_one:checkbox').each(function() 
            {
                this.checked = true;
                fuelVendorCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_fuelCard_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_fuelCard_one',function(){
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
    //======================= end restore fuel vendor ======================
});