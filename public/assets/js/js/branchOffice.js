var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#branchOfficeModal, #addBranchOfficeModal, #editBranchOfficeModal, #RestoreBranchOfficeModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.branchOfficeClose').click(function(){
        $('#branchOfficeModal').modal('hide');
    });

    $('#addBranchOffice').click(function(){
        $('#addBranchOfficeModal').modal('show');
    });

    $('.addBranchOfficeClose').click(function(){
        $('#addBranchOfficeModal').modal('hide');
    });
    
    $('.editBranchOfficeClose').click(function(){
        $('#editBranchOfficeModal').modal('hide');
    });

    $('.restoreBranchOfficeclose').click(function(){
        $('#RestoreBranchOfficeModal').modal('hide');
    });
// <!-- -------------------------------------------------------------------------Get   ------------------------------------------------------------------------- -->  
   
    $('#branchOffive_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getBranchOffice",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                // console.log(text);
                createBranchOfficeRows(text);
              }
        });
        $('#branchOfficeModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
// get
    function createBranchOfficeRows(BranchOfficeResult) {
        var BranchOfficelen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (BranchOfficeResult != null) {
                $("#officeTable").html('');
                BranchOfficelen = BranchOfficeResult.Office.length;
//alert(CreditCardlen);
                if (BranchOfficelen > 0) {
                    for (var i = BranchOfficelen-1; i >= 0; i--) { 
                        
                        office_len = BranchOfficeResult.Office[i].office.length;
                        //alert(sub_credit_len);
                        var Id =BranchOfficeResult.Office[i]._id;
                        var Office_com_Id =BranchOfficeResult.Office[i].companyID;

                        //alert(bankAdminlen);
                        if (office_len > 0) {
                            for (var j = office_len-1; j >= 0; j--) {

                                var Office_Id =BranchOfficeResult.Office[i].office[j]._id;
                                var officeName =BranchOfficeResult.Office[i].office[j].officeName;
                                var officeLocation =BranchOfficeResult.Office[i].office[j].officeLocation;
                                var deleteStatus =BranchOfficeResult.Office[i].office[j].deleteStatus;

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var branchOfficeStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='no' style='display:none'>" + no + "</td>" +
                                        "<td data-field='officeName' >" + j + "-" + officeName + "</td>" +
                                        "<td data-field='officeLocation' >" + officeLocation + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23 "+editPrivilege+" editBranchOffice'  title='Edit1' data-Id='"+Office_Id+"' data-comID='"+Office_com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deleteBranchOffice button-23 "+delPrivilege+"' title='Delete' data-Id='"+Office_Id+"' data-comID='"+Office_com_Id+"'><i class='fe fe-delete'></i></a>"+
                                            "</td></tr>";
            
                                    $("#officeTable").append(branchOfficeStr);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                            var branchOfficeStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#officeTable").append(branchOfficeStr);
                }
            
            }else {
            var branchOfficeStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#officeTable").append(branchOfficeStr);
        }
        $('#branchOfficeModal').modal('show');
    }
// <!-- -------------------------------------------------------------------------over function   ------------------------------------------------------------------------- -->  
// <!-- -------------------------------------------------------------------------add     ------------------------------------------------------------------------- -->  
    $("#saveBranchOffice").click(function(){
        var name=$('#BranchOffice_name').val();
        if(name=='')
        {
            swal.fire( "Enter name");
            $('#BranchOffice_name').focus();
            return false;
        } 

        var Location=$('#BranchOffice_Location').val();
        if(Location=='')
        {
            swal.fire( "Enter Location");
            $('#BranchOffice_Location').focus();
            return false;
        } 
    //alert(currencyName);
        $.ajax({
            url: base_path+"/admin/addBranchOffice",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenbranchOffice").val(),
                name: name,
                Location: Location,
            },
            cache: false,
            success: function(Result){
                console.log(Result);
                if(Result){
                    swal.fire( "Branch Office added successfully.");
                    // alert("Equipment Type added successfully.");
                    $("#addBranchOfficeModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getBranchOffice",
                        async: false,
                        //dataType:JSON,
                        success: function(text) {
                            //alert();
                            console.log(text);
                            createBranchOfficeRows(text);
                        }
                    });
                    // $('#branchOfficeModal').modal('show');
                }else{
                    swal.fire("Branch Office not added successfully.");
                }
            }
        });
    });
// <!-- -------------------------------------------------------------------------over add ------------------------------------------------------------------------- -->    
//-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
    $("body").on('click','.editBranchOffice', function(){
        var compID =$(this).attr("data-comID");
        var officeID=$(this).attr("data-Id");
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editBranchOffice",
            async: false,
            data:{officeID:officeID, compID:compID},
            //dataType:JSON,
            success: function(text) {
                $('#up_BranchOffice_name').val(text.officeName);
                $('#up_BranchOffice_Location').val(text.officeLocation);
                $('#officeComid').val(text.companyID);
                $('#officeid').val(text._id);
            }
        });

        $("#editBranchOfficeModal").modal("show");
    });

    $("#branchOfficeUpdatebutton").click(function(){

        // $('#branchOfficeModal').modal('hide');
        var name =$('#up_BranchOffice_name').val();
        var location =$('#up_BranchOffice_Location').val();
        var compID =$('#officeComid').val();
        var officeid =$('#officeid').val();
    //    var tokan=$('#tokeneditbranchOffice').val();
    
        if(name=='')
        {
            swal.fire( "'Enter name");
            $('#up_BranchOffice_name').focus();
            return false;            
        } 
        if(location=='')
        {
            swal.fire( "'Enter location");
            $('#up_BranchOffice_Location').focus();
            return false;
        }
        
        $.ajax({
            
            url: base_path+"/admin/updateBranchOffice",
            type: "POST",
            datatype:"JSON",
    
            data:{
                _token: $("#_tokenbranchOffice").val(),
                name:name,
                location:location,
                compID:compID,
                officeid:officeid,
            },
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Branch Office updated successfully", "success");

                $('#editBranchOfficeModal').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getBranchOffice",
                        async: false,
                        //dataType:JSON,
                        success: function(text) {
                            //alert();
                            console.log(text);
                            createBranchOfficeRows(text);
                        }
                    });
                    // $('#branchOfficeModal').modal('show');
            }
        });
    });
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------
//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
    $('body').on('click', '.deleteBranchOffice', function(){
        var  id=$(this).attr("data-Id");
        var comId=$(this).attr('data-comID');

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
                    url: base_path+"/admin/deleteBranchOffice",
                    data: { 
                        _token: $("#_tokenbranchOffice").val(), 
                        id: id,
                        comId:comId
                    },
                    success: function(resp){
                        swal.fire("Done!", "Branch Office Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getBranchOffice",
                            async: false,
                            //dataType:JSON,
                            success: function(text) {
                                //alert();
                                console.log(text);
                                createBranchOfficeRows(text);
                            }
                        });
                        $('#branchOfficeModal').modal('show');
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
//-- -------------------------------------------------------------------------  end delete  -- -------------------------------------------------------------------------
//------------------------------ start restore  ---------------------------------------------
    $("#restoreBranchOffice").click(function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getBranchOffice",
            async: false,
            success: function (RestoreResult) {
                //console.log(text);
               RestoreBranchOffice(RestoreResult);
                // RestoreResult = text;
            }
        });
        $('#RestoreBranchOfficeModal').modal('show');
    });
   
    function RestoreBranchOffice(RestoreResult)
    {
        var R_Len = 0;
        if (RestoreResult != null) {
            $("#RestoreBranchOfficeTable").html('');
            var data=RestoreResult.Office.length;
            // BranchOfficelen = BranchOfficeResult.Office.length;
            console.log(data);
            for(var i=0; i<data; i++)
            {
                R_Len = RestoreResult.Office[i].office.length;
                console.log(R_Len);
                if(R_Len != null)
                {
                    var no=1;
                    for(var j=R_Len-1; j>=0; j--)
                    {
                        var com_Id=RestoreResult.Office[i].companyID;
                        var id=RestoreResult.Office[i].office[j]._id;
                        var name =RestoreResult.Office[i].office[j].officeName;
                        var location =RestoreResult.Office[i].office[j].officeLocation;
                        var deleteStatus =RestoreResult.Office[i].office[j].deleteStatus;

                        if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                        {
                            var R_str = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' name='checkBranchOfficeOne[]' class='checkedIdsOneBranch' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                                "<td >" + name + "</td>" +
                                "<td>" + location + "</td>" +
                            $("#RestoreBranchOfficeTable").append(R_str);
                            no++;
                        }
                    }
                }
                else
                {
                    var R_str = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                    $("#RestoreBranchOfficeTable").append(R_str);
                }                  
            }
        }
        else
        {
            var R_str = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#RestoreBranchOfficeTable").append(R_str);
        }
    }
    $(document).on("change", ".BranchOffice_all_ids", function() 
    {
        if(this.checked) {
            $('.checkedIdsOneBranch:checkbox').each(function() 
            {
                this.checked = true;
                branchOfficeCheckboxRestore();
            });
        } 
        else 
        {
            $('.checkedIdsOneBranch:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.checkedIdsOneBranch',function(){
        branchOfficeCheckboxRestore();
    });
    function branchOfficeCheckboxRestore()
    {
        var branchOfficeds = [];
        var companyIds=[]
            $.each($("input[name='checkBranchOfficeOne[]']:checked"), function(){
                branchOfficeds.push($(this).val());
                companyIds.push($(this).attr("data-comId"));
            });
            // console.log(branchOfficeds);
            var braOffIds =JSON.stringify(branchOfficeds);
            $('#checked_BranchOffice').val(braOffIds);
           
            var companyCheckedIds =JSON.stringify(companyIds);
            $('#checked_BranchOffice_company_ids').val(companyCheckedIds);

            if(branchOfficeds.length > 0)
            {
                $('#restore_BranchOfficeData').removeAttr('disabled');
            }
            else
            {
                $('#restore_BranchOfficeData').attr('disabled',true);
            }
    }
    $('body').on('click','.restore_BranchOfficeData',function(){
       
        var all_ids=$('#checked_BranchOffice').val();
        alert(all_ids);
        var custID=$("#checked_BranchOffice_company_ids").val();
        $.ajax({
            type:"post",
            data:{
                _token:$("#tokeneditbranchOffice").val(),
                all_ids:all_ids,
                custID:custID
            },
            url: base_path+"/admin/restoreBranchOffice",
            success: function(response) {               
                swal.fire("Branch Office Restored successfully");
                $("#RestoreBranchOfficeModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getBranchOffice",
                    async: false,
                    success: function(text) {
                        createBranchOfficeRows(text);
                    }
                });
                // $('#branchOfficeModal').modal('show');
            }
        });
    });
    // ---------------------------------------------end restore  ---------------------------------------------

// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});