var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#LoadModal, #addLoadTypeModal').modal({
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
        $('#addLoadTypeModal').modal('hide');
    });
// -------------------------------------------------------------------------    Get   ------------------------------------------------------------------------- --  
    $('#Load_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getLoaType",
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
                        var com_Id =Result.Load_type[i].loadType.companyID;

                        if (len2 > 0) {
                            for (var j = len2-1; j >= 0; j--) {

                                var  id=Result.Load_type[i].loadType[j]._id;
                                var  loadName=Result.Load_type[i].loadType[j].loadName;
                                var  loadType=Result.Load_type[i].loadType[j].loadType;
                                var deleteStatus =Result.Load_type[i].loadType[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='loadName'>" + loadName + "</td>" +
                                        "<td data-field='loadType'>" + loadType + "</td>" +
                                        "<td style='width: 100px'>"+
                                            " <a class='button-23  "+editPrivilege+"' id='editmodel' title='Edit' ><i class='fe fe-edit'></i>"+
                                            "</a> <a class='delete1 button-23 "+delPrivilege+"' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a>"+
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
                    swal.fire( "Added successfully.");
                    // alert("Equipment Type added successfully.");
                    $("#addLoadTypeModal").modal("hide");
                    $("#addLoadTypeModal form").trigger('reset');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getLoaType",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createLoad_typeRows(text);
                          }
                    });
                    $('#LoadModal').modal('show');
                }else{
                    swal.fire(" Not Added successfully.");
                }
            }
        });
    });


// - -------------------------------------------------------------------------over add    ------------------------------------------------------------------------- -- 


// -- -------------------------------------------------------------------------End------------------------------------------------------------------------- -- 
});