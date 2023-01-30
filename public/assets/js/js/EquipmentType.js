var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('#EquipmentTypeModal, #addEquipmentTypeModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.EquipmentTypeClose').click(function(){
        $('#EquipmentTypeModal').modal('hide');
    });
    $('.addEquipmentTypeClose').click(function(){
        $('#addEquipmentTypeModal').modal('hide');
    });
    $('#addEquipmentType').click(function(){
        $('#addEquipmentTypeModal').modal('show');
    });

    
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

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='equipmentType'>" + equipmentType + "</td>" +
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23  "+editPrivilege+"'  title='Edit1' data-Id='"+id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
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
                    swal.fire( "Equipment Type added successfully.");
                    // alert("Equipment Type added successfully.");
                    $("#addEquipmentTypeModal").modal("hide");
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
                }else{
                    swal.fire("Equipment Type not added successfully.");
                }
            }
        });
    });


// <!-- -------------------------------------------------------------------------over add Equipment Type   ------------------------------------------------------------------------- --> 
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
                    _token: $("#_tokenbranchOffice").val(), 
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


// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  
});