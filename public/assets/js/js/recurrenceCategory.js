var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#RecurrenceCategoryModal, #addRecurrenceCategoryModal, #editRecurrenceCategoryModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.RecurrenceCategoryClose').click(function(){
        $('#RecurrenceCategoryModal').modal('hide');
    });

    $('#addRecurrenceCategory').click(function(){
        $('#addRecurrenceCategoryModal').modal('show');
    });

    $('.addRecurrenceCategoryClose').click(function(){
        $('#addRecurrenceCategoryModal').modal('hide');
    });

    $('.editRecurrenceCategoryClose').click(function(){
        $('#editRecurrenceCategoryModal').modal('hide');
    });
// -------------------------------------------------------------------------    Get   ------------------------------------------------------------------------- --  
    $('#RecurrenceCategory_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getRecurrenceCategory",
            async: false,
            success: function(text) {
                // console.log(text);
                createRecurrenceCategoryRows(text);
              }
        });
        $('#RecurrenceCategoryModal').modal('show');
    });
// - -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
// -- -------------------------------------------------------------------------  function get  -------------------------------------------------------------------------- 
    function createRecurrenceCategoryRows(Result) {
        var len1 = 0;
        var no=1;
            if (Result != null) {
                $("#RecurrenceCategoryTable").html('');
                len1 = Result.RecurrenceCategory.length;
                if (len1 > 0) {
                    for (var i = len1-1; i >= 0; i--) { 
                        
                        len2 = Result.RecurrenceCategory[i].fixPay.length;
                        var main_Id =Result.RecurrenceCategory[i].fixPay._id;
                        var com_Id =Result.RecurrenceCategory[i].companyID;

                        if (len2 > 0) {
                            for (var j = len2-1; j >= 0; j--) {

                                var  id=Result.RecurrenceCategory[i].fixPay[j]._id;
                                var  fixPayType=Result.RecurrenceCategory[i].fixPay[j].fixPayType;
                               
                                var deleteStatus =Result.RecurrenceCategory[i].fixPay[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        // "<td data-field='no' style='display:none'>" + no + "</td>" +
                                        "<td data-field='fixPayType'>" + fixPayType + "</td>" +
                                       
                                        "<td style='width: 100px'>"+
                                        "<a class='editRecurrenceCategory button-23 "+editPrivilege+" '  title='Edit' data-Id='"+id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        "<a class='deleteRecurrenceCategory button-23 "+delPrivilege+"' title='Delete' data-Id='"+id+"' data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
                                    "</td></tr>";
            
                                    $("#RecurrenceCategoryTable").append(Str);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                    var Str = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#RecurrenceCategoryTable").append(Str);
                }
            
            }else {
            var Str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#RecurrenceCategoryTable").append(Str);
        }
    }
 // -- -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
 // -- -------------------------------------------------------------------------    add    ------------------------------------------------------------------------- -- 
    $("#saveRecurrenceCategory").click(function(){
        var fixPayType_name=$('#fixPayType_name').val();
        
        if(fixPayType_name=='')
        {
            swal.fire({ title: 'Enter Name', text: 'Redirecting...', timer: 2000, })               
            //swal.fire( "Enter Name");
            $('#fixPayType_name').focus();
            return false;
        } 

        $.ajax({
            url: base_path+"/admin/addRecurrenceCategory",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenRecurrenceCategory").val(),
                fixPayType_name: fixPayType_name,
            },
            cache: false,
            success: function(Result){
                console.log(Result);
                if(Result){
                    swal.fire( "Recurrence Category added successfully.");
                    // alert("Equipment Type added successfully.");
                    $("#addRecurrenceCategoryModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getRecurrenceCategory",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createRecurrenceCategoryRows(text);
                          }
                    });
                    $('#RecurrenceCategoryModal').modal('show');
                }else{
                    swal.fire("Recurrence Category not added successfully.");
                }
            }
        });
    });
// - -------------------------------------------------------------------------over add    ------------------------------------------------------------------------- -- 
   //-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
   $("body").on('click','.editRecurrenceCategory', function(){
    var comID =$(this).attr("data-comID");
    var Id=$(this).attr("data-Id");
    $.ajax({
        type: "GET",
        url: base_path+"/admin/editRecurrenceCategory",
        async: false,
        data:{comID:comID, Id:Id},
        //dataType:JSON,
        success: function(text) {
            $('#up_RecurrenceCategory_name').val(text.fixPayType);
            $('#RecurrenceCategoryComid').val(text.companyID);
            $('#RecurrenceCategoryId').val(text._id);
        }
    });

    $("#editRecurrenceCategoryModal").modal("show");
});

$("#RecurrenceCategoryUpdate").click(function()
{
    var name =$('#up_RecurrenceCategory_name').val();
    var compID =$('#RecurrenceCategoryComid').val();
    var id =$('#RecurrenceCategoryId').val();
    
    $.ajax({
        url: base_path+"/admin/updateRecurrenceCategory",
        type: "POST",
        datatype:"JSON",
        data:{
            _token: $("#tokeneditRecurrenceCategory").val(),
            name:name,
            compID:compID,
            id:id,
        },
        success: function(data) {
            console.log(data)     
            swal.fire({ title: 'Recurrence Category updated successfully', text: 'Redirecting...', icon: 'success', timer: 2000, buttons: false, })               
            // swal.fire("Recurrence Category updated successfully");

            $('#editRecurrenceCategoryModal').modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getRecurrenceCategory",
                async: false,
                success: function(text) {
                    console.log(text);
                    createRecurrenceCategoryRows(text);
                  }
            });
            $('#RecurrenceCategoryModal').modal('show');
        }
    });
});
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------

//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
    $('body').on('click', '.deleteRecurrenceCategory', function(){
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
                    url: base_path+"/admin/deleteRecurrenceCategory",
                    data: { 
                        _token: $("#tokeneditRecurrenceCategory").val(), 
                        id: id,
                        comId:comId
                    },
                    success: function(resp){
                        swal.fire("Done!", "Recurrence Category Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getRecurrenceCategory",
                            async: false,
                            success: function(text) {
                                console.log(text);
                                createRecurrenceCategoryRows(text);
                            }
                        });
                        $('#RecurrenceCategoryModal').modal('show');
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
    $('.restoreRecurrenceCategoryclose').click(function(){
        $('#RestoreRecurrenceCategoryModal').modal('hide');
    });

    $("#restoreRecurrenceCategory").click(function(){
        $.ajax({
            type: "GET",
            url: base_path + "/admin/getRecurrenceCategory",
            async: false,
            success: function (RestoreResult) {
                //console.log(text);
               RestoreRecurrenceCategory(RestoreResult);
                // RestoreResult = text;
            }
        });
        $('#RestoreRecurrenceCategoryModal').modal('show');
    });
   
    function RestoreRecurrenceCategory(RestoreResult)
    {
        var R_Len = 0;
        if (RestoreResult != null) {
            $("#RestoreRecurrenceCategoryTable").html('');
            var data=RestoreResult.RecurrenceCategory.length;
            // RecurrenceCategorylen = RecurrenceCategoryResult.RecurrenceCategory.length;
            console.log(data);
            for(var i=0; i<data; i++)
            {
                R_Len = RestoreResult.RecurrenceCategory[i].fixPay.length;
                console.log(R_Len);
                if(R_Len != null)
                {
                    var no=1;
                    for(var j=R_Len-1; j>=0; j--)
                    {
                        var com_Id=RestoreResult.RecurrenceCategory[i].companyID;
                        var id=RestoreResult.RecurrenceCategory[i].fixPay[j]._id;
                        var name =RestoreResult.RecurrenceCategory[i].fixPay[j].fixPayType;
                        var deleteStatus =RestoreResult.RecurrenceCategory[i].fixPay[j].deleteStatus;

                        if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                        {
                            var R_str = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'><input type='checkbox' name='checkRecurrenceCategoryOne[]' class='checkedIdsOneBranch' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                                "<td >" + name + "</td>" +
                            $("#RestoreRecurrenceCategoryTable").append(R_str);
                            no++;
                        }
                    }
                }
                else
                {
                    var R_str = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                    $("#RestoreRecurrenceCategoryTable").append(R_str);
                }                  
            }
        }
        else
        {
            var R_str = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#RestoreRecurrenceCategoryTable").append(R_str);
        }
    }
    $(document).on("change", ".RecurrenceCategory_all_ids", function() 
    {
        if(this.checked) {
            $('.checkedIdsOneBranch:checkbox').each(function() 
            {
                this.checked = true;
                recurrenceCategoryCheckboxRestore();
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
        recurrenceCategoryCheckboxRestore();
    });
    function recurrenceCategoryCheckboxRestore()
    {
        var recurrenceCategory = [];
        var companyIds=[]
            $.each($("input[name='checkRecurrenceCategoryOne[]']:checked"), function(){
                recurrenceCategory.push($(this).val());
                companyIds.push($(this).attr("data-comId"));
            });
            // console.log(recurrenceCategory);
            var braOffIds =JSON.stringify(recurrenceCategory);
            $('#checked_RecurrenceCategory').val(braOffIds);
           
            var companyCheckedIds =JSON.stringify(companyIds);
            $('#checked_RecurrenceCategory_company_ids').val(companyCheckedIds);

            if(recurrenceCategory.length > 0)
            {
                $('#restore_RecurrenceCategoryData').removeAttr('disabled');
            }
            else
            {
                $('#restore_RecurrenceCategoryData').attr('disabled',true);
            }
    }
    $('body').on('click','.restore_RecurrenceCategoryData',function(){
       
        var all_ids=$('#checked_RecurrenceCategory').val();
        //alert(all_ids);
        var custID=$("#checked_RecurrenceCategory_company_ids").val();
        $.ajax({
            type:"post",
            data:{
                _token:$("#tokeneditRecurrenceCategory").val(),
                all_ids:all_ids,
                custID:custID
            },
            url: base_path+"/admin/restoreRecurrenceCategory",
            success: function(response) {               
                swal.fire("Branch Office Restored successfully");
                $("#RestoreRecurrenceCategoryModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getRecurrenceCategory",
                    async: false,
                    success: function(text) {
                        createRecurrenceCategoryRows(text);
                    }
                });
                // $('#recurrenceCategoryModal').modal('show');
            }
        });
    });
// ---------------------------------------------end restore  ---------------------------------------------
// ---------------------------------------------plus Recurrence   ---------------------------------------------
$('#addDriverRecurrence').click(function(){
    $('#addRecurrence').modal('show');
});
$('#plusReccurence').click(function(){
    $('#addRecurrenceCategoryModal').modal('show');
});
$('.closeDriverAddRecurrence').click(function(){
    $('#addRecurrence').modal('hide');
});

$('.driverPlusRecurrence').focus(function(){
    //alert(); 
     $.ajax({
         type: "GET",
         url: base_path+"/admin/getRecurrenceCategory",
         async: false,
         //dataType:JSON,
         success: function(Result) {                    
             createPlusRecurrence(Result);
             
         }
     });
});
function createPlusRecurrence(Result) { 
            
    var Length = 0;    
    
    if (Result != null) {
        Len = Result.RecurrenceCategory.length;
        console.log(Len) ;
    }
    if (Len > 0) {
        for (var j = 0; j < Len; j++) {  
        Length = Result.RecurrenceCategory[j].fixPay.length;
         
            if (Length > 0) {
                $(".driverPlusRecurrence").html('');
                // $(".currencyList").html('');
                for (var i = 0; i < Length; i++) {  
                    var fixPayType =Result.RecurrenceCategory[j].fixPay[i].fixPayType;
                    // console.log(fixPayType);
                    var fixPayTypeList = "<option id='PlusRecurrence'  value='"+ fixPayType +"'>"                   
                $(".driverPlusRecurrence").append(fixPayTypeList);
                }
            }
        }
    }
}

$('#saveDriverAddRecurrence').click(function(){
    var data=$('#adddriverRecurrenceForm').serialize()
    $('#addRecurrence').modal('hide');
});
// ---------------------------------------------end plus Recurrence  ---------------------------------------------
// ---------------------------------------------edit plus Recurrence   ---------------------------------------------
$('#up_addDriverRecurrence').click(function(){
    $('#editAddRecurrence').modal('show');
});

$('.closeEditDriverAddRecurrence').click(function(){
    $('#editAddRecurrence').modal('hide');
});
$('#saveEditDriverAddRecurrence').click(function(){
    $('#editAddRecurrence').modal('hide');
    $('#editDriverModal').modal('show');
});

// ---------------------------------------------end edit plus Recurrence  ---------------------------------------------

// ---------------------------------------------subtract Recurrence   ---------------------------------------------
$('#substractRecurrenceModal').click(function(){
    $('#substractRecurrence').modal('show');
});
$('#plusReccurencesubtract').click(function(){
    $('#addRecurrenceCategoryModal').modal('show');
});
$('.closeDriverSubRecurrence').click(function(){
    $('#substractRecurrence').modal('hide');
});

$('#saveDriverSubRecurrence').click(function(){
    var data1=$('#subdriverRecurrenceForm').serialize()
    $('#substractRecurrence').modal('hide');
});
// ---------------------------------------------end subtract Recurrence  ---------------------------------------------
// ---------------------------------------------edit subtract Recurrence   ---------------------------------------------
$('#up_substractRecurrenceModal').click(function(){
    $('#editSubstractRecurrence').modal('show');
});

$('.closeeditDriverSubRecurrence').click(function(){
    $('#editSubstractRecurrence').modal('hide');
});

$('#saveEditDriverSubRecurrence').click(function(){
    $('#editSubstractRecurrence').modal('hide');
    $('#editDriverModal').modal('show');
});
// ---------------------------------------------end edit subtract Recurrence  ---------------------------------------------

// ---------------------------------------------PayInfo   ---------------------------------------------
$('#driverPayInfo').click(function(){
    $('#driverPayInfoModal').modal('show');
});

$('.closeDriverPayInfo').click(function(){
    $('#driverPayInfoModal').modal('hide');
});

$('#saveDriverPayInfo').click(function(){
    var loadedmiles = $('#loadedmiles').val();
    if(loadedmiles == ''){
        swal.fire({title: 'Please loaded miles ',text: 'Redirecting...',timer: 3000,buttons: false,})
        $("#loadedmiles").focus();
        return false;
    }
    var emptymiles = $('#emptymiles').val();
    if(emptymiles == ''){
        swal.fire({title: 'Please empty miles ',text: 'Redirecting...',timer: 3000,buttons: false,})
        $("#emptymiles").focus();
        return false;
    }

    $('#driverPayInfoModal').modal('hide');
});
// ---------------------------------------------end PayInfo  ---------------------------------------------
// ---------------------------------------------edit PayInfo   ---------------------------------------------
$('#driverPayInfoEdit').click(function(){
    $('#driverPayInfoEditModal').modal('show');
});

$('.closeDrivereditPayInfo').click(function(){
    $('#driverPayInfoEditModal').modal('hide');
});
// ---------------------------------------------end edit PayInfo  ---------------------------------------------

// -- -------------------------------------------------------------------------End------------------------------------------------------------------------- -- 
});