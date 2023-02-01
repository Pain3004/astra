var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#RecurrenceCategoryModal, #addRecurrenceCategoryModal').modal({
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
// -------------------------------------------------------------------------    Get   ------------------------------------------------------------------------- --  
    $('#RecurrenceCategory_navbar').click(function(){
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
                                        "<td data-field='no' style='display:none'>" + no + "</td>" +
                                        "<td data-field='fixPayType'>" + fixPayType + "</td>" +
                                       
                                        "<td style='width: 100px'>"+
                                        "<a class='button-23 "+editPrivilege+" editRecurrenceCategory'  title='Edit1' data-Id='"+id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        "</a><a class='deleteRecurrenceCategory button-23 "+delPrivilege+"' title='Delete' data-Id='"+id+"' data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
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
            swal.fire( "Enter Name");
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
                    _token: $("#_tokenbranchOffice").val(), 
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


// -- -------------------------------------------------------------------------End------------------------------------------------------------------------- -- 
});