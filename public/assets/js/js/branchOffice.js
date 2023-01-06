var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#branchOfficeModal, #addBranchOfficeModal, #editBranchOfficeModal').modal({
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
// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#branchOffive_navbar').click(function(){
        //alert();
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
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
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
                                        "<td data-field='officeName' >" + officeName + "</td>" +
                                        "<td data-field='officeLocation' >" + officeLocation + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23 "+editPrivilege+" editBranchOffice'  title='Edit1' data-Id='"+Office_Id+"' data-comID='"+Office_com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
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
// <!-- -------------------------------------------------------------------------add Equipment Type   ------------------------------------------------------------------------- -->  
   
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


// <!-- -------------------------------------------------------------------------over add Equipment Type   ------------------------------------------------------------------------- -->    
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
            _token: $("#_tokenEditCurrency").val(),
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
// -========================== end update  fuel vendor============================
// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});