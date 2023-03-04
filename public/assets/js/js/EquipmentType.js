var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#EquipmentTypeModal, #addEquipmentTypeModal, #editEquipmentType').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.EquipmentTypeClose').click(function(){
        $('#EquipmentTypeModal').modal('hide');
    });
    $('.addEquipmentTypeClose').click(function(){
        $("#addLoadBoardModal").css("z-index","100000000000");
        $('#addEquipmentTypeModal').modal('hide');
    });
    $('#addEquipmentType').click(function(){
        $('#addEquipmentTypeModal').modal('show');
    });
    $('.editEquipmentTypeClose').click(function(){
        $('#editEquipmentType').modal('hide');
    });
    // $('.editPayTermsClose').click(function(){
    //     $('#editPaymentTermsModal').modal('hide');
    // });
    
// <!-- -------------------------------------------------------------------------Get  EquipmentType ------------------------------------------------------------------------- -->  
   
    $('#EquipmentType_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getEquipmentType",
            async: false,
            success: function(text) {
                console.log(text);
                createEquipmentTypeRows(text);
              }
        });
        $('#EquipmentTypeModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get  EquipmentType ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function getr EquipmentType ------------------------------------------------------------------------- --> 
    function createEquipmentTypeRows(Result) {
        var len1 = 0;
        var no=1;
            if (Result != null) {
                $("#EquipmentTypeTable").html('');
                len1 = Result.EquipmentType.length;
                if (len1 > 0) {
                    for (var i = len1-1; i >= 0; i--) { 
                        
                        len2 = Result.EquipmentType[i].equipment.length;
                        var main_Id =Result.EquipmentType[i].equipment._id;
                        var com_Id =Result.EquipmentType[i].companyID;

                        if (len2 > 0) {
                            for (var j = len2-1; j >= 0; j--) {

                                var  id=Result.EquipmentType[i].equipment[j]._id;
                                var  equipmentType=Result.EquipmentType[i].equipment[j].equipmentType;
                                var deleteStatus =Result.EquipmentType[i].equipment[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No" || deleteStatus == "no"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='no' style='display:none;'>" + no + "</td>" +

                                        "<td data-field='equipmentType'>" + j + "-" + equipmentType + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='editEquipmentType button-23  "+editPrivilege+"'  title='Edit' data-Id='"+id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deleteEquipmentType button-23 "+delPrivilege+"' data-Id  ="+ id +" data-comID='"+com_Id+"' title='Delete'><i class='fe fe-delete'></i></a>"+
                                            "</td></tr>";
            
                                    $("#EquipmentTypeTable").append(Str);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                    var Str = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#EquipmentTypeTable").append(Str);
                }
            
            }else {
            var Str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#EquipmentTypeTable").append(Str);
        }
    }
 // <!-- -------------------------------------------------------------------------over Get Equipment Type  ------------------------------------------------------------------------- -->  
 // <!-- -------------------------------------------------------------------------add Equipment Type   ------------------------------------------------------------------------- -->  
    $("#saveEquipmentType").click(function(){
        var EquipmentType_name=$('#EquipmentType_name').val();
        if(EquipmentType_name=='')
        {
            swal.fire( "Enter Equipment Type");
            //swal.fire({title: 'Please Enter Name',text: 'Redirecting...',timer: 1500,buttons: false,});
            $('#EquipmentType_name').focus();
            return false;
            
        } 
    //alert(currencyName);
        $.ajax({
            url: base_path+"/admin/addEquipmentType",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenEquipmentType").val(),
                EquipmentType_name: EquipmentType_name,
            },
            cache: false,
            success: function(Result){
                console.log(Result);
                if(Result){
                    swal.fire({title: 'Equipment Type added successfully',text: 'Redirecting...',timer: 3000,buttons: false,})
                    $("#addLoadBoardModal").css("z-index","100000000000");
                    $("#addEquipmentTypeModal").modal("hide");
                    $("#addEquipmentTypeModal form").trigger("reset");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getEquipmentType",
                        async: false,
                        success: function(text) {
                            // console.log(text);
                            createEquipmentTypeRows(text);
                          }
                    });
                    $('#EquipmentTypeModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getEquipmentType",
                        async: false,
                        success: function(Result) { 
                          createEquipmentTypeList(Result);
                        }
                    });
                }else{
                    swal.fire("Equipment Type not added successfully.");
                }
            }
        });
    });
    function createEquipmentTypeList(Result) {           
        var Length = 0;    
        
        if (Result != null) {
            Length = Result.EquipmentType.length;
        }
  
        if (Length > 0) {
            for (var i = Length-1; i >=0 ; i--) { 
                var EquipmentTypeLength =Result.EquipmentType[i].equipment.length;
                for (var j = EquipmentTypeLength-1; j >=0; j--) {  
                  var equipmentType =Result.EquipmentType[i].equipment[j].equipmentType;
                  var id =Result.EquipmentType[i].equipment[j]._id;
                  var deleteStatus =Result.EquipmentType[i].equipment[j].deleteStatus;
  
                  if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                    var List = "<option id=''  value='"+id+"-"+ equipmentType +"'>" + equipmentType +"</option>"                  
                    $(".EquipmentTypeListSet").append(List);
                  }
                }
              }
        }
    }
// <!-- -------------------------------------------------------------------------over add Equipment Type   ------------------------------------------------------------------------- --> 
   //-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
   $("body").on('click','.editEquipmentType', function(){
    var comID =$(this).attr("data-comID");
    var Id=$(this).attr("data-Id");
    $.ajax({
        type: "GET",
        url: base_path+"/admin/editEquipmentType",
        async: false,
        data:{comID:comID, Id:Id},
        //dataType:JSON,
        success: function(text) {
            $('#up_EquipmentType_name').val(text.equipmentType);
            $('#EquipmentTypeComid').val(text.companyID);
            $('#EquipmentTypeid').val(text._id);
        }
    });

    $("#editEquipmentType").modal("show");
});

$("#EquipmentTypeUpdate").click(function(){
// alert();
    // $('#branchOfficeModal').modal('hide');
    var name =$('#up_EquipmentType_name').val();
    var compID =$('#EquipmentTypeComid').val();
    var id =$('#EquipmentTypeid').val();

    if(name=='')
    {
        swal.fire( "'Enter name");
        $('#up_EquipmentType_name').focus();
        return false;            
    } 
    
    $.ajax({
        url: base_path+"/admin/updateEquipmentType",
        type: "POST",
        datatype:"JSON",
        data:{
            _token: $("#tokeneditEquipmentType").val(),
            name:name,
            compID:compID,
            id:id,
        },
        success: function(data) {
            console.log(data)                    
            swal.fire("Done!","Equipment Type updated successfully", "success");

            $('#editEquipmentType').modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getEquipmentType",
                async: false,
                success: function(text) {
                    console.log(text);
                    createEquipmentTypeRows(text);
                  }
            });
            $('#EquipmentTypeModal').modal('show');
        }
    });
});
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------

//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
$('body').on('click', '.deleteEquipmentType', function(){
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
                url: base_path+"/admin/deleteEquipmentType",
                data: { 
                    _token: $("#tokeneditEquipmentType").val(), 
                    id: id,
                    comId:comId
                },
                success: function(resp){
                    swal.fire("Done!", "Equipment Type Deleted successfully", "success");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getEquipmentType",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createEquipmentTypeRows(text);
                          }
                    });
                    $('#EquipmentTypeModal').modal('show');
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
$('.restoreEquipmentTypeclose').click(function(){
    $('#RestoreEquipmentTypeModal').modal('hide');
});

$("#restoreEquipmentType").click(function(){
    $.ajax({
        type: "GET",
        url: base_path + "/admin/getEquipmentType",
        async: false,
        success: function (RestoreResult) {
           RestoreEquipmentType(RestoreResult);
        }
    });
    $('#RestoreEquipmentTypeModal').modal('show');
});

function RestoreEquipmentType(RestoreResult)
{
    var R_Len = 0;
    if (RestoreResult != null) {
        $("#RestoreEquipmentTypeTable").html('');
        var data=RestoreResult.EquipmentType.length;
        // EquipmentTypelen = EquipmentTypeResult.Office.length;
        console.log(data);
        for(var i=0; i<data; i++)
        {
            R_Len = RestoreResult.EquipmentType[i].equipment.length;
            console.log(R_Len);
            if(R_Len != null)
            {
                var no=1;
                for(var j=R_Len-1; j>=0; j--)
                {
                    var com_Id=RestoreResult.EquipmentType[i].companyID;
                    var id=RestoreResult.EquipmentType[i].equipment[j]._id;
                    var name =RestoreResult.EquipmentType[i].equipment[j].equipmentType;
                    var deleteStatus =RestoreResult.EquipmentType[i].equipment[j].deleteStatus;
                    if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                    {
                        // alert(j);
                        // alert(deleteStatus);
                        var R_str = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' name='checkEquipmentTypeOne[]' class='checkedIdsOneBranch' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                            "<td style='display:none;'></td>" +
                            "<td >" + j + "-" + name + "</td>" +
                        $("#RestoreEquipmentTypeTable").append(R_str);
                        // alert(R_str);   
                        no++;
                    }
                }
            }
            else
            {
                var R_str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
                $("#RestoreEquipmentTypeTable").append(R_str);
            }                  
        }
    }
    else
    {
        var R_str = "<tr data-id=" + i + ">" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";
        $("#RestoreEquipmentTypeTable").append(R_str);
    }
}
$(document).on("change", ".EquipmentType_all_ids", function() 
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
        $.each($("input[name='checkEquipmentTypeOne[]']:checked"), function(){
            branchOfficeds.push($(this).val());
            companyIds.push($(this).attr("data-comId"));
        });
        // console.log(branchOfficeds);
        var braOffIds =JSON.stringify(branchOfficeds);
        $('#checked_EquipmentType').val(braOffIds);
       
        var companyCheckedIds =JSON.stringify(companyIds);
        $('#checked_EquipmentType_company_ids').val(companyCheckedIds);

        if(branchOfficeds.length > 0)
        {
            $('#restore_EquipmentTypeData').removeAttr('disabled');
        }
        else
        {
            $('#restore_EquipmentTypeData').attr('disabled',true);
        }
}
$('body').on('click','.restore_EquipmentTypeData',function(){
   
    var all_ids=$('#checked_EquipmentType').val();
    //alert(all_ids);
    var custID=$("#checked_EquipmentType_company_ids").val();
    $.ajax({
        type:"post",
        data:{
            _token:$("#tokeneditbranchOffice").val(),
            all_ids:all_ids,
            custID:custID
        },
        url: base_path+"/admin/restoreEquipmentType",
        success: function(response) {               
            swal.fire("Branch Office Restored successfully");
            $("#RestoreEquipmentTypeModal").modal("hide");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getEquipmentType",
                async: false,
                success: function(text) {
                    createEquipmentTypeRows(text);
                }
            });
            // $('#branchOfficeModal').modal('show');
        }
    });
});
// ---------------------------------------------end restore  ---------------------------------------------

// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});