var base_path = $("#url").val();
$(document).ready(function() {
    // ============== strart list data trailer =================
   
    $("#trailer_nav").on('click',function(){
        $('.trailerTypeSet').val('');
            $.ajax({
            type: "GET",
            url: base_path+"/admin/trailer_getTrailertype",
            async: false,
            //dataType:JSON,
            success: function(data) {
                createTrailerTypeList(data);
                trailerTypeResponse = data;
            }
        });
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTrailer",
            // async: false,
            //dataType:JSON,
            success: function(response) {
                var res = JSON.parse(response);
            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                processTrailerTable(res[0]);
                $("#trailer_pagination").html(paginateList(res[1], "admin", "paginatetrailer", "processTrailerTable"));
                renameTableSeq("trailer_tbl", "page_active");
            }
                // creategetTrailerRows(response);
                // TrailerResult = response;
             }
        });
        $('#TrailerModal').modal('show');
    });
    // function creategetTrailerRows(TrailerResult) 
    // {
    //     var Trailer1 = 0;
    //     if (TrailerResult != null) 
    //     {
    //         Trailer1 = TrailerResult.trailer_type.trailer.length;
    //         $("#trailer_tbl").html('');
    //         if (Trailer1 > 0) 
    //         {
    //             var no=1;
    //             for (var i = Trailer1-1; i >=0; i--) {  
    //                 var  trailerId =TrailerResult.trailer_type.trailer[i]._id;
    //                 var trailerNumber =TrailerResult.trailer_type.trailer[i].trailerNumber;
    //                 var trailerTypeid =TrailerResult.trailer_type.trailer[i].trailerType;
    //                 var trailerTypeLen = TrailerResult.trailer_type.trailer.length;
    //                 for (var j = 0; j < trailerTypeLen; j++) { 
    //                     var trailer_Type_id = TrailerResult.trailer_type.trailer[j]._id;
    //                     if(trailerTypeid == trailer_Type_id)
    //                     {
    //                       var  trailerType=TrailerResult.trailer.trailer[j].trailerType;
    //                         console.log(trailerType);
    //                         break;
    //                     }
    //                     else
    //                     {
    //                        var  trailerType="----";
    //                     }
    //                 }

    //                 var licensePlate =TrailerResult.trailer_type.trailer[i].licenseType;
                  
    //                 var registeredState=TrailerResult.trailer_type.trailer[i].registeredState;
    //                 var status =TrailerResult.trailer_type.trailer[i].status;
    //                 var model =TrailerResult.trailer_type.trailer[i].model;
                    
    //                 var axies =TrailerResult.trailer_type.trailer[i].axies;
    //                 var vin =TrailerResult.trailer_type.trailer[i].vin;
                    
    //                 var year =TrailerResult.trailer_type.trailer[i].year;
    //                 var internalNotes =TrailerResult.trailer_type.trailer[i].internalNotes;
    //                 // var startDate =new Date(TrailerResult.trailer_type.trailer[i].startDate);
    //                 if(licensePlate !="" && licensePlate !=null)
    //                 {
    //                     licensePlate=licensePlate;
    //                 }
    //                 else
    //                 {
    //                     licensePlate="----"
    //                 }
    //                 if(model !="" && model != null)
    //                 {
    //                     model=model;
    //                 }
    //                 else
    //                 {
    //                     model="----";
    //                 }
    //                 if(status != "" && status != null)
    //                 {
    //                     status=status;
    //                 }
    //                 else
    //                 {
    //                     status="----";
    //                 }                       
    //                 if(year !="" && year != null)
    //                 {
    //                     year=year;
    //                 }
    //                 else
    //                 {
    //                     year="----";
    //                 }
    //                 if(axies !="" && axies != null)
    //                 {
    //                     axies=axies;
    //                 }
    //                 else
    //                 {
    //                     axies="----";
    //                 }
    //                 if(registeredState !="" && registeredState != null)
    //                 {
    //                     registeredState=registeredState;
    //                 }
    //                 else
    //                 {
    //                     registeredState="----";
    //                 }
    //                 if(internalNotes !="" && internalNotes != null)
    //                 {
    //                     internalNotes=internalNotes;
    //                 }
    //                 else
    //                 {
    //                     internalNotes="----";
    //                 }
    //                 if(TrailerResult.trailer_type.trailer[i].deleteStatus == "NO")
    //                 {
    //                     var dot =TrailerResult.trailer_type.trailer[i].dot;
                        
    //                     var inspectionExpiry = TrailerResult.trailer_type.trailer[i].inspectionExpiration;
    //                     var activationDate = TrailerResult.trailer_type.trailer[i].activationDate;
    //                     var platExpiry=TrailerResult.trailer_type.trailer[i].plateExpiry;
    //                     if(platExpiry !== false && platExpiry !="")
    //                     {
    //                         var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                         var date_platExpiry = new Date(platExpiry*1000);
    //                         var year_platExpiry = date_platExpiry.getFullYear();
    //                         var month_platExpiry = months_arr[date_platExpiry.getMonth()];
    //                         var day = date_platExpiry.getDate();
    //                         var plateExpiry = month_platExpiry+'/'+day+'/'+year_platExpiry;
    //                     }
    //                     else
    //                     {
    //                         platExpiry="-----";
    //                     }
    //                     if(inspectionExpiry !='' && inspectionExpiry != false)
    //                     {
                            
    //                         var date_inspectionExpiry = new Date(inspectionExpiry*1000);
    //                         var year_inspectionExpiry = date_inspectionExpiry.getFullYear();
    //                         var month_inspectionExpiry = months_arr[date_inspectionExpiry.getMonth()];
    //                         var day = date_inspectionExpiry.getDate();
    //                         var inspectionExpiry = month_inspectionExpiry+'/'+day+'/'+year_inspectionExpiry;
    //                     }
    //                     else
    //                     {
    //                         inspectionExpiry="-----";
    //                     }
    //                     if(activationDate !="" && activationDate !=false)
    //                     {

    //                         var date_activationDate = new Date(activationDate*1000);
    //                         var year_activationDate = date_activationDate.getFullYear();
    //                         var month_activationDate = months_arr[date_activationDate.getMonth()];
    //                         var day = date_activationDate.getDate();
    //                         var activationDate = month_activationDate+'/'+day+'/'+year_activationDate;
    //                     }
    //                     else
    //                     {
    //                         activationDate="-----";
    //                     }
    //                     if(dot !="" && dot !=false)
    //                     {
    //                         var date_dot = new Date(dot*1000);
    //                         var year_dot = date_dot.getFullYear();
    //                         var month_dot = months_arr[date_dot.getMonth()];
    //                         var day = date_dot.getDate();
    //                         var dot = month_dot+'/'+day+'/'+year_dot;
    //                     }
    //                     else
    //                     {
    //                         dot="-----";
    //                     }


                    
    //                     var trailerStr = "<tr data-id=" + (i + 1) + ">" +
    //                     //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
    //                     "<td data-field='no'>" + no + "</td>" +
    //                     "<td data-field='trailerNumber' >" + trailerNumber + "</td>" +
    //                     "<td data-field='trailerType' >" + trailerType + "</td>" +
    //                     "<td data-field='licensePlate' >" + licensePlate + "</td>" +
    //                     "<td data-field='plateExpiry' >" + plateExpiry + "</td>" +
    //                     "<td data-field='inspectionExpiry' >" + inspectionExpiry + "</td>" +
    //                     "<td data-field='status' >" + status + "</td>" +
    //                     "<td data-field='model' >" + model + "</td>" +
    //                     "<td data-field='mileage' >" + year + "</td>" +
    //                     "<td data-field='axies' >" + axies + "</td>" +
    //                     "<td data-field='registeredState' >" + registeredState + "</td>" +
    //                     "<td data-field='vin' >" + vin + "</td>" +
    //                     "<td data-field='dot' >" + dot + "</td>" +
    //                     "<td data-field='activationDate' >" + activationDate + "</td>" +
    //                     "<td data-field='internalNotes' >" +internalNotes  + "</td>" +
    //                     "<td style='width: 100px'><a class='button-23 edit1 edit_trailerModel'  title='Edit'   data-trailerId='"+trailerId+"' data-trailerType=''><i class='fe fe-edit'></i></a><a class='delete1 delete_trailer button-23'   data-trailerId='"+trailerId+"' data-trailerType='' title='Delete'><i class='fe fe-delete'></i></a></td></tr>";


    //                     $("#trailer_tbl").append(trailerStr);
    //                     no++;
    //                 }
                    
    //             }
    //         } 
    //         else 
    //         {
    //             var trailerStr = "<tr data-id=" + i + ">" +
    //                 "<td align='center' colspan='4'>No record found.</td>" +
    //                 "</tr>";
    
    //             $("#trailer_tbl").append(trailerStr);
    //         }
    //     }
    //     else 
    //     {
    //         var tr_str1 = "<tr data-id=" + i + ">" +
    //         "<td align='center' colspan='4'>No record found.</td>" +
    //         "</tr>";
    //         // $("#currencyTable").append(currencyStr);
    //     }
    //     // $("#CurrencyModal").modal("show");
    // }


    function processTrailerTable(res) {
        $("#trailer_tbl").empty();
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].trailer;
        var trailer = res[0]["trailerType"];
        var row = ``;
    
        for (var i = 0; i < data.length; i++) {
            var id = data[i]._id;
            var counter = data[i].counter;
            var trailerNumber = data[i].trailerNumber;
            var licenseType = data[i].licenseType;
            var status = data[i].status;
            var model = data[i].model;
            var year = data[i].year;
            var axies = data[i].axies;
            var registeredState = data[i].registeredState;
            var vin = data[i].vin;
            var internalNotes = data[i].internalNotes;
            var trailerDoc = data[i].trailerDoc;
            var deleteStatus = data[i].deleteStatus;
            if(trailerNumber !="" && trailerNumber !=null)
            {
                trailerNumber=trailerNumber;
            }
            else
            {
                trailerNumber="------";
            }
            if(licenseType !="" && licenseType !=null)
            {
                licenseType=licenseType;
            }
            else
            {
                licenseType="------";
            }
            if(status !="" && status !=null)
            {
                status=status;
            }
            else
            {
                status="------";
            }
            if(model !="" && model !=null)
            {
                model=model;
            }
            else
            {
                model="------";
            }
            if(year !="" && year !=null)
            {
                year=year;
            }
            else
            {
                year="------";
            }
            if(axies !="" && axies !=null)
            {
                axies=axies;
            }
            else
            {
                axies="------";
            }
            if(registeredState !="" && registeredState !=null)
            {
                registeredState=registeredState;
            }
            else
            {
                registeredState="------";
            }
            if(vin !="" && vin !=null)
            {
                vin=vin;
            }
            else
            {
                vin="------";
            }
            if(internalNotes !="" && internalNotes !=null)
            {
                internalNotes=internalNotes;
            }
            else
            {
                internalNotes="------";
            }
           
            if (trailerDoc != '') {
                var data1 = trailerDoc;
            } else {
                var data1 = '';
            }
            if (data[i].trailerType != '' && data[i].trailerType != null) {
                var trailerType = trailer[data[i].trailerType];
                var trailerTypeid = data[i].trailerType;
            } else {
                var trailerType = "--------";
                var trailerTypeid = '';
            }
    
            if (data[i].plateExpiry != '' || data[i].plateExpiry != false) {
                var plateExpiry = convertTimeZone(data[i].plateExpiry, "info");
            } else {
                var plateExpiry = '--------';
            }
    
            if (data[i].activationDate != '' || data[i].activationDate != false) {
                var activationDate = convertTimeZone(data[i].activationDate, "info");
            } else {
                var activationDate = '--------';
            }
            if (data[i].dot != '' || data[i].dot != false) {
                var dot = convertTimeZone(data[i].dot, "info");
            } else {
                var dot = '--------';
            }
    
            if (data[i].inspectionExpiration != ''|| data[i].inspectionExpiration != false) {
                var inspectionExpiration = convertTimeZone(data[i].inspectionExpiration, "info");
            } else {
                var inspectionExpiration = '--------';
            }
        }
        else 
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            // $("#currencyTable").append(currencyStr);
        }
        // $("#CurrencyModal").modal("show");
    }
    // ==================== end list trailer model ===============


    
    $('.coseTrilershow').click(function(){
        $('#TrailerModal').modal('hide');
    });
    
    $('.closeAddTrailerModal').click(function(){
       $('#addTrailerModal').modal('hide');
    });
    
    $('.addTrailerModal').click(function(){
       $('#addTrailerModal').modal('show');
    });
    $('.addTrailerType').click(function(){
       $('#addTrailerTypeModal').modal('show');
    });
    $('.closeTrailerType').click(function(){
       $('#addTrailerTypeModal').modal('hide');
    });    
    $('#addTrailerTypeModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });  
    $('#addTrailerModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    


    // ======================= start save trailer model ======================
  
    $('.saveTrailerType').click(function(){
        var trailer_type_name = $('#addtrailer_type').val();
        if(trailer_type_name=='')
        {
            swal.fire( "'Enter trailer type name");
            $('#addtrailer_type').focus();
            return false;            
        }
        var formData = new FormData();
        formData.append('_token',$("#_token_Trailer_Type").val());        
        formData.append('trailerType',trailer_type_name);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/trailer_addTrailertype",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success:function(response){
                swal.fire("Done!", "Trailer Type added successfully", "success");
                $('#addTrailerTypeModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/trailer_getTrailertype",
                    async: false,
                    //dataType:JSON,
                    success: function(data) {
                        createTrailerTypeList(data);
                        trailerTypeResponse = data;
                    }
                });
            }
        })
    });
    
    $('#TrailerSavebutton').click(function(){
        var trailertype='';
        var trailer_number = $('#trailerNumber').val();
        var trailertype = $('.trailerType_Set_id').val();
        var license_plate =$('#trailer_license_plate').val();
        var plate_expiry =$('#trailer_plate_expiry').val();
        // alert(plate_expiry);
        var inspection =$('#trailerinspection').val();
        var status =$('#trailer_status').val();
        var model =$('#model').val();
        var year =$('#traileryear').val();
        var axies =$('#traileraxies').val();
        var RegisteredState =$('#trailerRegisteredState').val();
        var vin =$('#trailervin').val();
        var activation =$('#activation').val();
        var dot =$('#trailer_dot').val();
        var internal_note =$('#trailerinternal_note').val(); 
        if(trailer_number=='')
        {
            swal.fire( "'Enter trailer number");
            $('#trailer_number').focus();
            return false;
            
        } 
        // alert(trailertype);
        if(trailertype=='unselected')
        {
            swal.fire( "'Select trailer type from dropdown menu");
            return false;
        }
        if(license_plate=='')
        {
            swal.fire( "'Enter license plate");
            return false;
        }
        if(plate_expiry=='')
        {
            swal.fire( "'Enter plate expiry");
            return false;
        }
        if(vin=='')
        {
            swal.fire( "'Enter VIN");
            return false;
        }
        var formData = new FormData();
        $.each($("#trailer_files")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });
        formData.append('_token',$("#_tokenTrailer").val());
        formData.append('trailer_number',trailer_number.trim());
        formData.append('trailerType',trailertype);
        formData.append('license_plate',license_plate);        
        formData.append('plate_expiry',plate_expiry);
        formData.append('inspection',inspection);
        formData.append('status',status);
        formData.append('model',model);
        formData.append('year',year);
        formData.append('axies',axies);  
        formData.append('RegisteredState',RegisteredState);                                  
        formData.append('vin',vin);  
        formData.append('activation',activation); 
        formData.append('dot',dot);                  
        formData.append('internal_note',internal_note);              

        $.ajax({
            type: "POST",
            url: base_path+"/admin/addTrailer",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                console.log(data)                    
                swal.fire("Done!", "Trailer added successfully", "success");
                $('#addTrailerModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTrailer",
                    success: function(response) {
                        creategetTrailerRows(response);
                        TrailerResult = response;
                        }
                });
            }
        });
    });

    //   == end save trailer model    =



    //===================== start save trailer type model ====================
  
    function createTrailerTypeList(trailerTypeResponse) 
    {           
        var trailerTypelength = 0; 
        if (trailerTypeResponse != null) 
        {
            trailerTypelength = trailerTypeResponse.trailer.length;
        }
        if (trailerTypelength > 0) 
        {
            // var no=1;
            //$(".customerCurrencySet").html('');
            $(".trailerTypeSet").html('');
             var TrailerTypeList="<option  value='unselected' >----select-----</option>"
             
            for (var i = trailerTypelength-1; i >= 0; i--) 
            {  
                var trailerType =trailerTypeResponse.trailer[i].trailerType;
                var trailerTypeId =trailerTypeResponse.trailer[i]._id;
                if(trailerTypeResponse.trailer[i].deleteStatus == "NO")
                {
                    TrailerTypeList+= "<option  value='"+ trailerTypeId +"'>"+ trailerType +" </option>"   
                }  
            }    
            $(".trailerTypeSet").append(TrailerTypeList);        
        }     
    }
    //   ===end save trailer type    ====

    //============== start edit trailer model ==================
    $('body').on('click','.edit_trailerModel',function(e){
        e.preventDefault();
       var id=$(this).attr("data-trailerId");
       $("#editTrailerModal").modal({
        // remote: url,
        refresh: true
    });
    //    alert(id);
        $.ajax({
            type:'get',
            url:base_path+"/admin/edit_trailer",
            data:{'id':id},
            async: false,
            success:function(response)
            {
                $("#edit_trailer_id").val(response._id);
                $("#edite_trailer_number").val(response.trailerNumber); 
              
                var imgLength=response.trailerDoc.length;
                $(".trailer_img").html();
                // console.log(imgLength);
                if(imgLength>=1)
                {
                    for(var i=0; i<imgLength; i++)
                    {
                        // alert(i);
                        var img_length= response.trailerDoc[i].length;
                        var trailerDoc=response.trailerDoc[i];
                        console.log(trailerDoc);
                        // alert(img_length);
                        for(var v=0; v<img_length; v++)
                        {
                            var trailer_img ="<img src='/"+trailerDoc[v].targetfilepath+"'width='100px'>";
                            // alert(trailer_img);
                        $(".trailer_img").append(trailer_img);
                        }
                    }
                }
            
             
                var plate_expiry=response.plateExpiry;
                var inspectionExpiration= response.inspectionExpiration;
                var activationDate= response.activationDate;
                var dot= response.dot;
                var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                var date_plate_expiry = new Date(plate_expiry*1000);
                var year_plate_expiry = date_plate_expiry.getFullYear();
                var month_plate_expiry = months_arr[date_plate_expiry.getMonth()];
                var day_plate_expiry = date_plate_expiry.getDate();
                if(plate_expiry !== false)
                {
                    if(day_plate_expiry <=9 )
                    {
                        var plate_expiry = year_plate_expiry+'-0'+day_plate_expiry+'-'+month_plate_expiry;
                    }
                    else
                    {
                        var plate_expiry = year_plate_expiry+'-'+month_plate_expiry+'-'+day_plate_expiry;
                    }
                }
              
    
                var date_inspectionExpiration = new Date(inspectionExpiration*1000);
                var year_inspectionExpiration = date_inspectionExpiration.getFullYear();
                var month_inspectionExpiration = months_arr[date_inspectionExpiration.getMonth()];
                var day_inspectionExpiration = date_inspectionExpiration.getDate();
                if(inspectionExpiration !== false)
                {
                    if(day_inspectionExpiration <=9 )
                    {
                        var inspectionExpiration = year_inspectionExpiration+'-0'+day_inspectionExpiration+'-'+month_inspectionExpiration;
                    }
                    else
                    {
                        var inspectionExpiration = year_inspectionExpiration+'-'+month_inspectionExpiration+'-'+day_inspectionExpiration;
                    }
                }
              
    
                var date_activationDate = new Date(activationDate*1000);
                var year_activationDate = date_activationDate.getFullYear();
                var month_activationDate = months_arr[date_activationDate.getMonth()];
                var day_activationDate = date_activationDate.getDate();
                if(activationDate !== false)
                {
                    if(day_activationDate <=9 )
                    {
                        var activationDate = year_activationDate+'-0'+day_activationDate+'-'+month_activationDate;
                    }
                    else
                    {
                        var activationDate = year_activationDate+'-'+month_activationDate+'-'+day_activationDate;
                    }
                }
                
    
                var date_dot = new Date(dot*1000);
                var year_dot = date_dot.getFullYear();
                var month_dot = months_arr[date_dot.getMonth()];
                var day_dot = date_dot.getDate();
                if(dot !== false)
                {
                    if(day_dot <=9 )
                    {
                        var dot = year_dot+'-0'+day_dot+'-'+month_dot;
                    }
                    else
                    {
                        var dot = year_dot+'-'+month_dot+'-'+day_dot;
                    }
                }
               $("#edit_Trailer_Type").val(response.trailerType); 
               $("#edit_Trailerlicense_plate").val(response.licenseType); 
               $("#edit_Trailerplate_expiry").val(plate_expiry); 
               $("#edit_Trailer_inspection").val(inspectionExpiration); 
               $("#edit_Trailer_status").val(response.status); 
               $("#edit_Trailer_Model").val(response.model); 
               $("#edit_Traileryear").val(response.year); 
               $("#Edit_trailerAxies").val(response.axies); 
               $("#editTrailer_Registered_State").val(response.registeredState); 
               $("#edit_Trailer_vin").val(response.vin); 
               $("#edit_trailer_Activation").val(activationDate); 
               $("#editTrailerdot").val(dot); 
               $("#editTrailerinternal_note").val(response.internalNotes); 
            //    $("#edit_trailer_files").val(response.trailerNumber); 
            }
        });
        // $("#editTrailerModal .modal-body").load(e.target, function() { 
            $("#editTrailerModal").modal('show');
        // });
     });
     $('#editTrailerModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
     $(".closeEditTrailerModal").click(function(){
        $(".trailer_img").html("<div></div>");
        $("#editTrailerModal").modal('hide');
     });

     $("#TrailerEditbutton").click(function(){
        var trailertype='';
        var trailer_number = $('#editetrailer_number').val();
        var id = $('#edittrailer_id').val();
        var trailertype = $('#editTrailerType').val();
        var trailertypeId=trailertype[0];
        var license_plate =$('#editTrailerlicense_plate').val();
        var plate_expiry =$('#editTrailerplate_expiry').val();
        var inspection =$('#editTrailerinspection').val();
        var status =$('#editTrailer_status').val();
        var model =$('#editTrailerModel').val();
        var year =$('#editTraileryear').val();
        var axies =$('#trailer_axies').val();
        var RegisteredState =$('#editTrailerRegisteredState').val();
        var vin =$('#editTrailervin').val();
        var activation =$('#edit_trailerActivation').val();
        var dot =$('#edit_trailer_dot').val();
        var internal_note =$('#edit_trailerinternal_note').val(); 
        // alert(axies);
        if(trailer_number=='')
        {
            swal.fire( "'Enter trailer number");
            $('#editetrailer_number').focus();
            return false;
            
        } 
        if(trailertype=='')
        {
            swal.fire( "'Select trailer number from dropdown menu");
            return false;
        }
        if(license_plate=='')
        {
            swal.fire( "'Enter license plate");
            return false;
        }
        if(plate_expiry=='')
        {
            swal.fire( "'Enter plate expiry");
            return false;
        }
        if(vin=='')
        {
            swal.fire( "'Enter VIN");
            return false;
        }
        var formData = new FormData();
        // $.each($("#edit_trailerfiles")[0].trailerfiles, function(i, file) { 
        //     // alert(file);           
        //     formData.append('trailerfiles[]', file);
        // });
        $.each($("#edit_trailerfiles")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });
        formData.append('_token',$("#_tokenEditTrailer").val());
        formData.append('id',id);
        formData.append('trailer_number',trailer_number.trim());
        formData.append('trailertypeId',trailertypeId);
        formData.append('license_plate',license_plate);        
        formData.append('plate_expiry',plate_expiry);
        formData.append('inspection',inspection);
        formData.append('status',status);
        formData.append('model',model);
        formData.append('year',year);
        formData.append('axies',axies);  
        formData.append('RegisteredState',RegisteredState);                                  
        formData.append('vin',vin);  
        formData.append('activation',activation); 
        formData.append('dot',dot);                  
        formData.append('internal_note',internal_note);              

        $.ajax({
            type: "POST",
            url: base_path+"/admin/updateTrailer",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success: function(data) {
                // alert("success !");
                console.log(data)                    
                swal.fire("Done!", "Trailer updated successfully", "success");
                $(".trailer_img").html("<div></div>");
                $('#editTrailerModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTrailer",
                    success: function(response) {
                        creategetTrailerRows(response);
                        TrailerResult = response;
                        }
                });
            }
        });
     });
    //  = end edit trailer model   ==  



    //   ==== start delete trailer   
  
    $('body').on('click','.delete_trailer',function(){
        var id=$(this).attr("data-trailerId");
        // var formData = new FormData();
        // ,
        // formData.append('_token',$("#_tokenDeleteTrailer").val());
        // alert(id);
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: base_path+"/admin/deleteTrailer",
                    data: { _token: $("#_tokenTrailer").val(), id: id},
                    success: function(resp){
                        swal.fire("Done!", "Trailer Deleted successfully", "success");
                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getTrailer",
                            success: function(response) {
                                creategetTrailerRows(response);
                                TrailerResult = response;
                                }
                        });
                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
            else 
            {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    });

        // end delete =================================================

    // start restore ===============================================
    $(".restore_trailerBtn").click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTrailer",
            async: false,
            //dataType:JSON,
            success: function(data) {  
                console.log(data)  ;               
                RestoreTrailerTypeList(data);
                TrailerResult = data;
            }
        });
        $("#RestoreTrailerModal").modal("show");
    });
    $(".coseRestoreTrilershow").click(function(){
        $("#RestoreTrailerModal").modal("hide");
    });
    function RestoreTrailerTypeList(TrailerResult) {
        var subCreditCardlen = 0;
        var Trailer1 = 0;
        if (TrailerResult != null) 
        {
            // console.log(TrailerResult);
            Trailer1 = TrailerResult.trailer_type.trailer.length;
            // alert(Trailer1);

            $("#Restoretrailer_tbl").html('');
            // console.log(Trailer1);
            if (Trailer1 > 0) 
            {
                var no=1;
                for (var i = Trailer1-1; i >=0; i--) {  
                    // alert(i);
                    var  trailerId =TrailerResult.trailer_type.trailer[i]._id;
                    var trailerNumber =TrailerResult.trailer_type.trailer[i].trailerNumber;
                    var trailerTypeid =TrailerResult.trailer_type.trailer[i].trailerType;
                        // console.log(trailerTypeid);
                    var trailerTypeLen = TrailerResult.trailer_type.trailer.length;
                    // console.log(trailerTypeLen);
                    for (var j = 0; j < trailerTypeLen; j++) { 
                        var trailer_Type_id = TrailerResult.trailer_type.trailer[j]._id;
                        // console.log(trailerTypeid);
                        if(trailerTypeid == trailer_Type_id)
                        {
                            trailerType=TrailerResult.trailer.trailer[j].trailerType;
                            // trailerType="";
                            break;
                        }
                        else
                        {
                            trailerType="----";
                        }
                    }

                    var licensePlate =TrailerResult.trailer_type.trailer[i].licenseType;
                  
                    var registeredState=TrailerResult.trailer_type.trailer[i].registeredState;
                    var status =TrailerResult.trailer_type.trailer[i].status;
                    var model =TrailerResult.trailer_type.trailer[i].model;
                    
                    var axies =TrailerResult.trailer_type.trailer[i].axies;
                    var vin =TrailerResult.trailer_type.trailer[i].vin;
                    
                    var year =TrailerResult.trailer_type.trailer[i].year;
                    var internalNotes =TrailerResult.trailer_type.trailer[i].internalNotes;
                    // var startDate =new Date(TrailerResult.trailer_type.trailer[i].startDate);
                    if(licensePlate !="" && licensePlate !=null)
                    {
                        licensePlate=licensePlate;
                    }
                    else
                    {
                        licensePlate="----"
                    }
                    if(model !="" && model != null)
                    {
                        model=model;
                    }
                    else
                    {
                        model="----";
                    }
                    if(status != "" && status != null)
                    {
                        status=status;
                    }
                    else
                    {
                        status="----";
                    }                       
                    if(year !="" && year != null)
                    {
                        year=year;
                    }
                    else
                    {
                        year="----";
                    }
                    if(axies !="" && axies != null)
                    {
                        axies=axies;
                    }
                    else
                    {
                        axies="----";
                    }
                    if(registeredState !="" && registeredState != null)
                    {
                        registeredState=registeredState;
                    }
                    else
                    {
                        registeredState="----";
                    }
                    if(internalNotes !="" && internalNotes != null)
                    {
                        internalNotes=internalNotes;
                    }
                    else
                    {
                        internalNotes="----";
                    }
                    if(TrailerResult.trailer_type.trailer[i].deleteStatus == "YES")
                    {
                        var dot =TrailerResult.trailer_type.trailer[i].dot;
                        
                        var inspectionExpiry = TrailerResult.trailer_type.trailer[i].inspectionExpiration;
                        var activationDate = TrailerResult.trailer_type.trailer[i].activationDate;
                        var platExpiry=TrailerResult.trailer_type.trailer[i].plateExpiry;
                        if(platExpiry != false)
                        {
                            var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            var date_platExpiry = new Date(platExpiry*1000);
                            var year_platExpiry = date_platExpiry.getFullYear();
                            var month_platExpiry = months_arr[date_platExpiry.getMonth()];
                            var day = date_platExpiry.getDate();
                            var plateExpiry = month_platExpiry+'/'+day+'/'+year_platExpiry;
                        }
                        else
                        {
                            platExpiry="-----";
                        }
                        if(inspectionExpiry !='' && inspectionExpiry != false)
                        {
                            
                            var date_inspectionExpiry = new Date(inspectionExpiry*1000);
                            var year_inspectionExpiry = date_inspectionExpiry.getFullYear();
                            var month_inspectionExpiry = months_arr[date_inspectionExpiry.getMonth()];
                            var day = date_inspectionExpiry.getDate();
                            var inspectionExpiry = month_inspectionExpiry+'/'+day+'/'+year_inspectionExpiry;
                        }
                        else
                        {
                            inspectionExpiry="-----";
                        }
                        if(activationDate !="" && activationDate !=false)
                        {

                            var date_activationDate = new Date(activationDate*1000);
                            var year_activationDate = date_activationDate.getFullYear();
                            var month_activationDate = months_arr[date_activationDate.getMonth()];
                            var day = date_activationDate.getDate();
                            var activationDate = month_activationDate+'/'+day+'/'+year_activationDate;
                        }
                        else
                        {
                            activationDate="-----";
                        }
                        if(dot !="" && dot !=false)
                        {
                            var date_dot = new Date(dot*1000);
                            var year_dot = date_dot.getFullYear();
                            var month_dot = months_arr[date_dot.getMonth()];
                            var day = date_dot.getDate();
                            var dot = month_dot+'/'+day+'/'+year_dot;
                        }
                        else
                        {
                            dot="-----";
                        }


                    
                        var trailerStr = "<tr data-id=" + (i + 1) + ">" +
                        //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                        "<td data-field='no'><input type='checkbox' class='check_Trailer_one' name='all_Trailer_id[]' data-trailer=" + trailerId+ "  value="+trailerId+"></td>" +
                        "<td data-field='trailerNumber' >" + trailerNumber + "</td>" +
                        "<td data-field='trailerType' >" + trailerType + "</td>" +
                        "<td data-field='licensePlate' >" + licensePlate + "</td>" +
                        "<td data-field='plateExpiry' >" + plateExpiry + "</td>" +
                        "<td data-field='inspectionExpiry' >" + inspectionExpiry + "</td>" +
                        "<td data-field='status' >" + status + "</td>" +
                        "<td data-field='model' >" + model + "</td>" +
                        "<td data-field='mileage' >" + year + "</td>" +
                        "<td data-field='axies' >" + axies + "</td>" +
                        "<td data-field='registeredState' >" + registeredState + "</td>" +
                        "<td data-field='vin' >" + vin + "</td>" +
                        "<td data-field='dot' >" + dot + "</td>" +
                        "<td data-field='activationDate' >" + activationDate + "</td>" +
                        "<td data-field='internalNotes' >" +internalNotes  + "</td></tr>";

                        $("#Restoretrailer_tbl").append(trailerStr);
                        no++;
                    }
                    
                }
            } 
            else 
            {
                var trailerStr = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
    
                $("#Restoretrailer_tbl").append(trailerStr);
            }
        }
        else 
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            // $("#currencyTable").append(currencyStr);
        }
        // $
    }
    $(document).on("change", ".Trailer_all_ids", function() 
    {
        if(this.checked) {
            $('.check_Trailer_one:checkbox').each(function() 
            {
                this.checked = true;
                TrailerCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_Trailer_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_Trailer_one',function(){
        TrailerCheckboxRestore();
    });
    function TrailerCheckboxRestore()
    {
        var creditCardIds = [];
			$.each($("input[name='all_Trailer_id[]']:checked"), function(){
				creditCardIds.push($(this).val());
			});
			var SubCreditCardAllCheckedIds =JSON.stringify(creditCardIds);
			$('#checked_trailer__ids').val(SubCreditCardAllCheckedIds);
          

			if(creditCardIds.length > 0)
			{
				$('#restore_trailer_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_trailer_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_trailer_data',function(){
        var all_ids=$('#checked_trailer__ids').val();
        $.ajax({
            type:"post",
            data:{_token:$("#_token_Trailer").val(),all_ids:all_ids},
            url: base_path+"/admin/restoreTrailer",
            success: function(response) {               
                swal.fire("Done!", "Trailer Restored successfully", "success");
                $("#RestoreTrailerModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTrailer",
                    success: function(response) {
                        creategetTrailerRows(response);
                        TrailerResult = response;
                        }
                });
            }
        });
    });
    // end restore =================================================
});

   