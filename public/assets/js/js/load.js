var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#LoadModal, #addLoadTypeModal, #editLoadModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.LoadClose').click(function(){
        $('#LoadModal').modal('hide');
    });

    $('#addloadType').click(function(){
        $('#addLoadTypeModal').modal('show');
    });

    $('.addLoadTypeClose').click(function(){
        $("#addLoadBoardModal").css("z-index","100000000000");
        $('#addLoadTypeModal').modal('hide');
    });

    $('.editLoadClose').click(function(){
        $('#editLoadModal').modal('hide');
    });
// -------------------------------------------------------------------------    Get   ------------------------------------------------------------------------- --  
    $('#Load_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getLoadType",
            async: false,
            success: function(text) {
                console.log(text);
                createLoad_typeRows(text);
              }
        });
        $('#LoadModal').modal('show');
    });
// - -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
// -- -------------------------------------------------------------------------  function get  -------------------------------------------------------------------------- 
    function createLoad_typeRows(Result) {
        var len1 = 0;
        var no=1;
            if (Result != null) {
                $("#Load_typeTable").html('');
                len1 = Result.Load_type.length;
                if (len1 > 0) {
                    for (var i = len1-1; i >= 0; i--) { 
                        
                        len2 = Result.Load_type[i].loadType.length;
                        var main_Id =Result.Load_type[i].loadType._id;
                        var com_Id =Result.Load_type[i].companyID;

                        if (len2 > 0) {
                            for (var j = len2-1; j >= 0; j--) {

                                var  id=Result.Load_type[i].loadType[j]._id;
                                var  loadName=Result.Load_type[i].loadType[j].loadName;
                                var  loadType=Result.Load_type[i].loadType[j].loadType;
                                var deleteStatus =Result.Load_type[i].loadType[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='no' style='display:none'>" + no + "</td>" +
                                        "<td data-field='loadName'>" + loadName + "</td>" +
                                        "<td data-field='loadType'>" + loadType + "</td>" +
                                        "<td style='width: 100px'>"+
                                            "<a class='editLoad button-23 "+editPrivilege+" '  title='Edit' data-Id='"+id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "<a class='deleteLoad button-23 "+delPrivilege+"' title='Delete' data-Id='"+id+"' data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
                                        "</td></tr>";
            
                                    $("#Load_typeTable").append(Str);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                    var Str = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#Load_typeTable").append(Str);
                }
            
            }else {
            var Str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#Load_typeTable").append(Str);
        }
    }
 // -- -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
 // -- -------------------------------------------------------------------------    add    ------------------------------------------------------------------------- -- 
    $("#saveLoadType").click(function(){
        var loadName=$('#loadType_name').val();
        var loadType=$('#loadUnit').val();
      
        if(loadName=='')
        {
            swal.fire( "Enter Name");
            $('#loadType_name').focus();
            return false;
        } 
        if(loadType=='')
        {
            swal.fire( "Enter Name");
            $('#loadType').focus();
            return false;
        }

        $.ajax({
            url: base_path+"/admin/addLoadType",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenLoadType").val(),
                loadName: loadName,
                loadType: loadType,
            },
            cache: false,
            success: function(Result){
                console.log(Result);
                if(Result){
                    swal.fire({title: 'Added successfully',text: 'Redirecting...',timer: 3000,buttons: false,})
                    $("#addLoadBoardModal").css("z-index","100000000000");
                    $("#addLoadTypeModal").modal("hide");
                    $("#addLoadTypeModal form").trigger('reset');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getLoadType",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createLoad_typeRows(text);
                          }
                    });
                    $('#LoadModal').modal('show');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getLoadType",
                        async: false,
                        success: function(Result) { 
                          // console.log(Result);                    
                          createLoadTypeList(Result);
                        }
                    });
                }else{
                    swal.fire(" Not Added successfully.");
                }
            }
        });
    });
    function createLoadTypeList(Result) {           
        var Length = 0;    
        
        if (Result != null) {
            Length = Result.Load_type.length;
        }
  
        if (Length > 0) {
            // var no=1;
            $(".LoadTypeListSet").html('');
            // for (var i = 0; i < Length; i++) { 
              for (var i = Length-1; i >=0; i--) { 
                var LoadTypeLength =Result.Load_type[i].loadType.length;
                // for (var j = 0; j < LoadTypeLength; j++) {  
                for (var j = LoadTypeLength-1; j >=0; j--) {
                  var loadName =Result.Load_type[i].loadType[j].loadName;
                  var id =Result.Load_type[i].loadType[j]._id;
                  var deleteStatus =Result.Load_type[i].loadType[j].deleteStatus;
  
                  if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                    var List = "<option id=''  value='"+id+"-"+ loadName +"'>"+loadName+ " <option>";                   
                    $(".LoadTypeListSet").append(List);
                  }
                }
              }
        }
        
    }
// - -------------------------------------------------------------------------over add    ------------------------------------------------------------------------- -- 
   //-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
   $("body").on('click','.editLoad', function(){
    var comID =$(this).attr("data-comID");
    var Id=$(this).attr("data-Id");
    $.ajax({
        type: "GET",
        url: base_path+"/admin/editLoad",
        async: false,
        data:{comID:comID, Id:Id},
        //dataType:JSON,
        success: function(text) {
            $('#up_Load_name').val(text.loadName);
            $('#up_Load_unit').val(text.loadType);
            $('#LoadComid').val(text.companyID);
            $('#LoadId').val(text._id);
        }
    });

    $("#editLoadModal").modal("show");
});

$("#loadUpdate").click(function(){
    // $('#LoadModal').modal('hide');
    var name =$('#up_Load_name').val();
    var unit =$('#up_Load_unit').val();
    var compID =$('#LoadComid').val();
    var id =$('#LoadId').val();
//    var tokan=$('#tokeneditLoad').val();
    $.ajax({
        
        url: base_path+"/admin/updateLoad",
        type: "POST",
        datatype:"JSON",
        data:{
            _token: $("#tokeneditLoad").val(),
            name:name,
            unit:unit,
            compID:compID,
            id:id,
        },
        success: function(data) {
            console.log(data)                    
            swal.fire("Done!", "Load updated successfully", "success");

            $('#editLoadModal').modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getLoadType",
                async: false,
                success: function(text) {
                    console.log(text);
                    createLoad_typeRows(text);
                  }
            });
            $('#LoadModal').modal('show');
        }
    });
});
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------
//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
$('body').on('click', '.deleteLoad', function(){
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
                url: base_path+"/admin/deleteLoad",
                data: { 
                    _token: $("#tokeneditLoad").val(), 
                    id: id,
                    comId:comId
                },
                success: function(resp){
                    swal.fire("Done!", "load Type Deleted successfully", "success");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getLoadType",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createLoad_typeRows(text);
                          }
                    });
                    $('#LoadModal').modal('show');
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
$('.restoreLoadclose').click(function(){
    $('#RestoreLoadModal').modal('hide');
});

$("#restoreLoad").click(function(){
    $.ajax({
        type: "GET",
        url: base_path + "/admin/getLoadType",
        async: false,
        success: function (RestoreResult) {
            //console.log(text);
           RestoreLoad(RestoreResult);
            // RestoreResult = text;
        }
    });
    $('#RestoreLoadModal').modal('show');
});

function RestoreLoad(RestoreResult)
{
    var R_Len = 0;
    if (RestoreResult != null) {
        $("#RestoreLoadTable").html('');
        var data=RestoreResult.Load_type.length;
        // Loadlen = LoadResult.Load_type.length;
        console.log(data);
        for(var i=0; i<data; i++)
        {
            R_Len = RestoreResult.Load_type[i].loadType.length;
            console.log(R_Len);
            if(R_Len != null)
            {
                var no=1;
                for(var j=R_Len-1; j>=0; j--)
                {
                    var com_Id=RestoreResult.Load_type[i].companyID;
                    var id=RestoreResult.Load_type[i].loadType[j]._id;
                    var name =RestoreResult.Load_type[i].loadType[j].loadName;
                    var unit =RestoreResult.Load_type[i].loadType[j].loadType;
                    var deleteStatus =RestoreResult.Load_type[i].loadType[j].deleteStatus;

                    if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                    {
                        var R_str = "<tr data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' name='checkLoadOne[]' class='checkedIdsOneBranch' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                            "<td >" + name + "</td>" +
                            "<td>" + unit + "</td>" +
                        $("#RestoreLoadTable").append(R_str);
                        no++;
                    }
                }
            }
            else
            {
                var R_str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
                $("#RestoreLoadTable").append(R_str);
            }                  
        }
    }
    else
    {
        var R_str = "<tr data-id=" + i + ">" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";
        $("#RestoreLoadTable").append(R_str);
    }
}
$(document).on("change", ".Load_all_ids", function() 
{
    if(this.checked) {
        $('.checkedIdsOneBranch:checkbox').each(function() 
        {
            this.checked = true;
            LoadCheckboxRestore();
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
    LoadCheckboxRestore();
});
function LoadCheckboxRestore()
{
    var Load = [];
    var companyIds=[]
        $.each($("input[name='checkLoadOne[]']:checked"), function(){
            Load.push($(this).val());
            companyIds.push($(this).attr("data-comId"));
        });
        // console.log(Load);
        var braOffIds =JSON.stringify(Load);
        $('#checked_Load').val(braOffIds);
       
        var companyCheckedIds =JSON.stringify(companyIds);
        $('#checked_Load_company_ids').val(companyCheckedIds);

        if(Load.length > 0)
        {
            $('#restore_LoadData').removeAttr('disabled');
        }
        else
        {
            $('#restore_LoadData').attr('disabled',true);
        }
}
$('body').on('click','.restore_LoadData',function(){
   
    var all_ids=$('#checked_Load').val();
    //alert(all_ids);
    var custID=$("#checked_Load_company_ids").val();
    $.ajax({
        type:"post",
        data:{
            _token:$("#tokeneditLoad").val(),
            all_ids:all_ids,
            custID:custID
        },
        url: base_path+"/admin/restoreLoad",
        success: function(response) {               
            swal.fire("Load Restored successfully");
            $("#RestoreLoadModal").modal("hide");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getLoadType",
                async: false,
                success: function(text) {
                    createLoad_typeRows(text);
                }
            });
            // $('#LoadModal').modal('show');
        }
    });
});
// ---------------------------------------------end restore  ---------------------------------------------

// -- -------------------------------------------------------------------------End------------------------------------------------------------------------- -- 
});