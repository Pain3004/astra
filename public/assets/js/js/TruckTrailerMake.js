var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#TruckTrailerMakeModal, #addTruckTrailerMakeModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.TruckTrailerMakeClose').click(function(){
        $('#TruckTrailerMakeModal').modal('hide');
    });

    $('#addTruckTrailerMake').click(function(){
        $('#addTruckTrailerMakeModal').modal('show');
    });

    $('.addTruckTrailerMakeClose').click(function(){
        $('#addTruckTrailerMakeModal').modal('hide');
    });
// -------------------------------------------------------------------------    Get   ------------------------------------------------------------------------- --  
    $('#TruckTrailerMake_navbar').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruckTrailerMake",
            async: false,
            success: function(text) {
                console.log(text);
                createTruckTrailerMakeRows(text);
              }
        });
        $('#TruckTrailerMakeModal').modal('show');
    });
// - -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
// -- -------------------------------------------------------------------------  function get  -------------------------------------------------------------------------- 
    function createTruckTrailerMakeRows(Result) {
        var len1 = 0;
        var no=1;
            if (Result != null) {
                $("#TruckTrailerMakeTable").html('');
                len1 = Result.Truck_type.length;
                len2 = Result.trailer_type.length;
////truck                
                if (len1 > 0) {
                    for (var i = len1-1; i >= 0; i--) { 
                        
                        len3 = Result.Truck_type[i].truck.length;
                        len4 = Result.trailer_type[i].trailer.length;
                        // var main_Id =Result.RecurrenceCategory[i].fixPay._id;
                        // var com_Id =Result.RecurrenceCategory[i].fixPay.companyID;

                        if (len3 > 0) {
                            for (var j = len3-1; j >= 0; j--) {

                                var  com_Id=Result.Truck_type[i].companyID;
                                var  id=Result.Truck_type[i].truck[j]._id;
                                var  truckType=Result.Truck_type[i].truck[j].truckType;


                                


                                var  created_time1=Result.Truck_type[i].truck[j].created_time;
                                

                                if(created_time1){
                                    created_time1 =Result.Truck_type[i].truck[j].created_time;
                                }else{
                                    created_time1='';
                                }
                                var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                var date = new Date(created_time1*1000);
                                var year = date.getFullYear();
                                var month = months_arr[date.getMonth()];
                                var day = date.getDate();
                                var created_time = month+'/'+day+'/'+year;

                                var deleteStatus =Result.Truck_type[i].truck[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        // "<td data-field='no' style='display:none;'>" + created_time + "</td>" +
                                        "<td data-field='no'>" + created_time + "</td>" +
                                        "<td data-field='fixPayType'>" + truckType + "</td>" +
                                        "<td data-field='Truck'>Truck</td>" +
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23  "+editPrivilege+"'  title='Edit1' data-Id='"+id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deleteTruckTrailer button-23 "+delPrivilege+"' data-type='Truck' data-Id="+ id +" data-comID='"+com_Id+"' title='Delete'><i class='fe fe-delete'></i></a>"+
                                    "</td></tr>";
            
                                    $("#TruckTrailerMakeTable").append(Str);
                                    no++;
                                }
                                $("#TruckTrailerMakeTable tr").sort(sort_td).appendTo("#TruckTrailerMakeTable");
                                function sort_td(a, b) {
                                    return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                                }
                            }
                        }
                    }
                    
                }else {
                    var Str = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#TruckTrailerMakeTable").append(Str);
                }
////trailer
                if (len2 > 0) {
                    for (var i = len2-1; i >= 0; i--) { 
                        len4 = Result.trailer_type[i].trailer.length;
                        // var main_Id =Result.RecurrenceCategory[i].fixPay._id;
                        // var com_Id =Result.RecurrenceCategory[i].fixPay.companyID;

                        if (len3 > 0) {
                            for (var j = len4-1; j >= 0; j--) {

                                var  com_Id=Result.trailer_type[i].companyID;
                                var  id=Result.trailer_type[i].trailer[j]._id;
                                var  trailerType=Result.trailer_type[i].trailer[j].trailerType;
                                var  created_time_tr1=Result.trailer_type[i].trailer[j].created_time;
                                if(created_time_tr1){
                                    created_time_tr1 =Result.trailer_type[i].trailer[j].created_time;
                                }else{
                                    created_time_tr1='';
                                }

                                var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                                var date_tr = new Date(created_time_tr1*1000);
                                var year_tr = date_tr.getFullYear();
                                var month_tr = months_arr_tr[date_tr.getMonth()];
                                var day_tr = date_tr.getDate();
                                var created_time_tr = month_tr+'/'+day_tr+'/'+year_tr;

                                var deleteStatus =Result.trailer_type[i].trailer[j].deleteStatus;

                                if(deleteStatus == "NO" || deleteStatus == "No"){
                                        var Str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        // "<td data-field='no' style='display:none;'>" + created_time + "</td>" +
                                        "<td data-field='no'>" + created_time_tr + "</td>" +
                                        "<td data-field='trailerType'>" + trailerType + "</td>" +
                                        "<td data-field='trailer'>Trailer</td>" +
                                        "<td style='text-align:center'>"+
                                            "<a class='button-23  "+editPrivilege+"'  title='Edit1' data-Id='"+id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "</a> <a class='deleteTruckTrailer button-23 "+delPrivilege+"' data-type='Trailer' data-Id="+ id +" data-comID='"+com_Id+"' title='Delete'><i class='fe fe-delete'></i></a>"+
                                        "</td></tr>";
            
                                    $("#TruckTrailerMakeTable").append(Str);
                                    no++;
                                }
                                $("#TruckTrailerMakeTable tr").sort(sort_td).appendTo("#TruckTrailerMakeTable");
                                function sort_td(a, b) {
                                return ($(a).find("td:eq(1)").text()) < ($(b).find("td:eq(1)").text()) ? 1 : -1;
                                }
                            }
                        }
                    }
                    
                }else {
                    var Str = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#TruckTrailerMakeTable").append(Str);
                }
            
            }else {
            var Str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

                $("#TruckTrailerMakeTable").append(Str);
            }
    }
 // -- -------------------------------------------------------------------------   over Get   ------------------------------------------------------------------------- --
 // -- -------------------------------------------------------------------------    add    ------------------------------------------------------------------------- -- 
    $("#saveTruckTrailerMake").click(function(){
        var tt_name=$('#tt_name').val();
        var type=$('#type').val();

       
        // if(fixPayType_name=='')
        // {
        //     swal.fire( "Enter Name");
        //     $('#fixPayType_name').focus();
        //     return false;
        // } 

        $.ajax({
            url: base_path+"/admin/addTruckTrailer",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#_tokenTruckTrailerMake").val(),
                tt_name: tt_name,
                type: type,
            },
            cache: false,
            success: function(Result){
                console.log(Result);
                if(Result){
                    swal.fire( "Added successfully.");
                    // alert("Equipment Type added successfully.");
                    $("#addTruckTrailerMakeModal").modal("hide");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getTruckTrailerMake",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createTruckTrailerMakeRows(text);
                          }
                    });
                    $('#TruckTrailerMakeModal').modal('show');
                }else{
                    swal.fire(" Not Added successfully.");
                }
            }
        });
    });
// - -------------------------------------------------------------------------over add    ------------------------------------------------------------------------- -- 
//-- -------------------------------------------------------------------------  start delete  -- -------------------------------------------------------------------------
$('body').on('click', '.deleteTruckTrailer', function(){
    var id=$(this).attr("data-Id");
    var comId=$(this).attr('data-comID');
    var type=$(this).attr("data-type");

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
                url: base_path+"/admin/deleteTruckTrailer",
                data: { 
                    _token: $("#_tokenbranchOffice").val(), 
                    id: id,
                    comId:comId,
                    type:type
                },
                success: function(resp){
                    swal.fire("Done!", "Truck & Trailer Deleted successfully", "success");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getTruckTrailerMake",
                        async: false,
                        success: function(text) {
                            console.log(text);
                            createTruckTrailerMakeRows(text);
                          }
                    });
                    $('#TruckTrailerMakeModal').modal('show');
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