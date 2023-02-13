var base_path = $("#url").val();
$(document).ready(function() {

// -------------------------------------------------------------------------  start ------------------------------------------------------------------------- --  
    $('#TruckTrailerMakeModal, #addTruckTrailerMakeModal, #edittruckTrailer,#RestoreTruckTrailerModal').modal({
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

    $('.edittruckTrailerClose').click(function(){
        $('#edittruckTrailer').modal('hide');
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
                                        "<td data-field='no' style='display:none;'>" + created_time + "</td>" +
                                        // "<td data-field='no'>" + created_time + "</td>" +
                                        "<td data-field='fixPayType'>" + truckType + "</td>" +
                                        "<td data-field='Truck'>Truck</td>" +
                                        "<td style='text-align:center'>"+
                                            "<a class='editTruckTrailer button-23  "+editPrivilege+"' title='Edit' data-type='Truck' data-Id='"+id+"' data-comID='"+com_Id+"' ><i class='fe fe-edit'></i></a>&nbsp"+
                                            "<a class='deleteTruckTrailer button-23 "+delPrivilege+"' title='Delete' data-type='Truck' data-Id="+ id +" data-comID='"+com_Id+"' ><i class='fe fe-delete'></i></a>"+
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
                                        "<td data-field='no' style='display:none;'>" + created_time + "</td>" +
                                        // "<td data-field='no'>" + created_time_tr + "</td>" +
                                        "<td data-field='trailerType'>" + trailerType + "</td>" +
                                        "<td data-field='trailer'>Trailer</td>" +
                                        "<td style='text-align:center'>"+
                                            "<a class='editTruckTrailer button-23  "+editPrivilege+"' title='Edit1' data-type='Trailer' data-Id='"+id+"' data-comID='"+com_Id+"'><i class='fe fe-edit'></i></a>&nbsp"+
                                            "<a class='deleteTruckTrailer button-23 "+delPrivilege+"' title='Delete' data-type='Trailer' data-Id="+ id +" data-comID='"+com_Id+"'><i class='fe fe-delete'></i></a>"+
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
   //-- -------------------------------------------------------------------------  start edit  -- -------------------------------------------------------------------------
   $("body").on('click','.editTruckTrailer', function(){
    var comID =$(this).attr("data-comID");
    var Id=$(this).attr("data-Id");
    var Type=$(this).attr("data-type");
    $.ajax({
        type: "GET",
        url: base_path+"/admin/editTruckTrailer",
        async: false,
        data:{comID:comID, Id:Id,Type:Type},
        //dataType:JSON,
        success: function(text) {
            if(text.type=='Truck'){
                $('#up_truckTrailer_name').val(text.truckType);
                $('#up_truckTrailer_type').val('Truck');
            }
            if(text.type=='Trailer'){
                $('#up_truckTrailer_name').val(text.trailerType);
                $('#up_truckTrailer_type').val('Trailer');
            }
            $('#truckTrailerComid').val(text.companyID);
            $('#truckTrailerid').val(text._id);
        }
    });

    $("#edittruckTrailer").modal("show");
    });

$("#truckTrailerUpdate").click(function(){
    var name =$('#up_truckTrailer_name').val();
    var type =$('#up_truckTrailer_type').val();
    var compID =$('#truckTrailerComid').val();
    var id =$('#truckTrailerid').val();
    
    $.ajax({
        url: base_path+"/admin/updatetruckTrailer",
        type: "POST",
        datatype:"JSON",
        data:{
            _token: $("#tokenedittruckTrailer").val(),
            name:name,
            type:type,
            compID:compID,
            id:id,
        },
        success: function(data) {
            console.log(data)                    
            swal.fire("Done!", +type+" Truck & Trailer updated successfully", "success");

            $('#edittruckTrailer').modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getTruckTrailerMake",
                async: false,
                success: function(text) {
                    createTruckTrailerMakeRows(text);
                }
            });
            $('#TruckTrailerMakeModal').modal('show');
        }
    });
});
//-- -------------------------------------------------------------------------  end edit  -- -------------------------------------------------------------------------

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
                        _token: $("#tokenedittruckTrailer").val(), 
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
// ------------------------------------------------------------------------- start restore -------------------------------------------------------------------------
    $("#restoreTruckTrailer").click(function(){
        $.ajax({
                type: "GET",
                url: base_path+"/admin/getTruckTrailerMake",
                async: false,
                success: function(text) {
                    RestoreTruckTrailerRows(text);
                }
            });
        $("#RestoreTruckTrailerModal").modal("show");
    });
    $(".restoreTruckTrailerclose").click(function(){
        $("#RestoreTruckTrailerModal").modal("hide");
    });
    function RestoreTruckTrailerRows(Result) {
        console.log(Result);
        if (Result != null) {

            var len = Result.trailer_type.length;
            if (len > 0) {
                for (var j = 0; j < len; j++) {  
                    $("#RestoreTruckTrailerTable").html('');
                    var Trailerlen = Result.trailer_type[j].trailer.length;
                    if (Trailerlen > 0) {
                        var no=1;
                        var comId=Result.trailer_type[j].companyID;
                        for (var i = Trailerlen-1; i >= 0; i--) {  
                            var id =Result.trailer_type[j].trailer[i]._id;
                            var trailerType =Result.trailer_type[j].trailer[i].trailerType;
                            var deleteStatus=Result.trailer_type[j].trailer[i].deleteStatus;

                            if(deleteStatus == 'Yes'){
                                var trailerStr = "<tr data-id=" + (i + 1) + ">" +
                                    "<td data-field=''><input type='checkbox' class='check_TruckTrailer_one' name='allTTComIdCheck[]' style='height: 15px;' data-consigneeShipid=" + id+ " date-compID="+comId+" data-typeOf='Trailer' value="+id+"></td>" +
                                    "<td data-field='' >" + trailerType + "</td>" +
                                    "<td data-field='' >Trailer</td>" +
                                    "</tr>";

                                $("#RestoreTruckTrailerTable").append(trailerStr);
                                no++;
                            } 
                        }
                    } else {
                        var trailerStr = "<tr data-id=" + i + ">" +
                            "<td align='center' colspan='4'>No record found.</td>" +
                            "</tr>";
            
                        $("#RestoreTruckTrailerTable").append(trailerStr);
                    }
                }
            }

            var len2 = Result.Truck_type.length;
            if (len2 > 0) {
                for (var m = 0; m < len; m++) {  
                    var trucklen = Result.Truck_type[m].truck.length;
                    if (trucklen > 0) {
                        var no=1;
                        var comId=Result.Truck_type[m].companyID;

                        for (var n = trucklen-1; n >= 0; n--) {  
                            var id =Result.Truck_type[m].truck[n]._id;
                            var truckType =Result.Truck_type[m].truck[n].truckType;
                            var deleteStatus=Result.Truck_type[m].truck[n].deleteStatus;

                            if(deleteStatus == 'YES' || deleteStatus == 'Yes' || deleteStatus == 'yes'){
                                var truckStr = "<tr data-id=" + (n + 1) + ">" +
                                    //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                                "<td data-field=''><input type='checkbox' class='check_TruckTrailer_one' name='allTTComIdCheck[]' style='height: 15px;' data-consigneeShipid=" + id+ " date-compID="+comId+" data-typeOf='Truck' value="+id+"></td>" +
                                "<td data-field='' >" + truckType + "</td>" +
                                "<td data-field='' >Truck</td>" +
                                $("#RestoreTruckTrailerTable").append(truckStr);
                                no++;
                            } 
                        }
                        
                    } 
                    else 
                    {
                        var truckStr = "<tr data-id=" + n + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";

                        $("#RestoreTruckTrailerTable").append(truckStr);
                    }
                }
            }

        }
        else
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#RestoreTruckTrailerTable").append(trailerStr);
        }
    }
    $(document).on("change", ".TruckTrailer_all_ids", function() 
    {
        if(this.checked) {
            $('.check_TruckTrailer_one:checkbox').each(function() 
            {
                this.checked = true;
                truckTrailerRestore();
            });
        } 
        else 
        {
            $('.check_TruckTrailer_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_TruckTrailer_one',function(){
        truckTrailerRestore();
    });
    function truckTrailerRestore()
    {
        var truckTrailerds = [];
        var companyIds=[];
        var DataType=[];
			$.each($("input[name='allTTComIdCheck[]']:checked"), function(){
				truckTrailerds.push($(this).val());
                companyIds.push($(this).attr("date-compID"));
                DataType.push($(this).attr("data-typeOf"));
			});
            console.log(DataType);
			console.log(truckTrailerds);
			var truckTrailerIdAllCheckedIds =JSON.stringify(truckTrailerds);
			$('#checked_TruckTrailer_ids').val(truckTrailerIdAllCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_TruckTrailer_company_ids').val(companyCheckedIds);
            
			var DataTypeNames =JSON.stringify(DataType);
			$('#checked_TruckTrailer_type').val(DataTypeNames);


			if(truckTrailerds.length > 0)
			{
				$('#restore_TruckTrailerData').removeAttr('disabled');
			}
			else
			{
				$('#restore_TruckTrailerData').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_TruckTrailerData',function(){
        var all_ids=$('#checked_TruckTrailer_ids').val();
        var custID=$("#checked_TruckTrailer_company_ids").val();
        var dataType=$("#checked_TruckTrailer_type").val();
        $.ajax({
            type:"post",
            data:{_token:$("#tokenedittruckTrailer").val(),all_ids:all_ids,custID:custID,dataType:dataType},
            url: base_path+"/admin/restoreTruckTrailer",
            success: function(response) {   
                $('#RestoreTruckTrailerModal').modal('hide');            
                swal.fire("Done!", "Truck & Trailer Restored successfully", "success");
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
            }
        });
    

      
    });
// ------------------------------------------------------------------------- end restore -------------------------------------------------------------------------

// -- -------------------------------------------------------------------------End------------------------------------------------------------------------- -- 
});