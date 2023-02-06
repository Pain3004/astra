var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.closeTruckModal').click(function(){
         $('#truckModal').modal('hide');
    //     $('#addTruckModal').modal('hide');
     });
     $('#truckModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('.closeAddTruckModal').click(function(){
        $('#addTruckModal').modal('hide');
        //$('#truckModal').modal('show');
    });

    $('.addtruckModal').click(function(){
        //$('#truckModal').modal('hide');
        $('#addTruckModal').modal('show');
    });

    $('#addTruckModal').modal({
        backdrop: 'static',
        keyboard: false
    })


//driver as owner operator modal
    $('#driverAddTruck').click(function(){
        $('#addTruckModal').modal('show');
    });
    $('#up_driverAddTruck').click(function(){
        $('#addTruckModal').modal('show');
    });
// <!-- -------------------------------------------------------------------------Get truck  ------------------------------------------------------------------------- -->  
   
    $('#truck_navbar').click(function(){
        $('.truckTypeSet').val('');
        $.ajax({
            type: "GET",
            url: base_path+"/admin/truck_getTrucktype",
            async: false,
            success: function(data) {                  
                createTruckTypeList(data);
                truckTypeResponse = data;
            }
        });


        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruck",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createGetTruckRows(text);
                truckResult = text;
             }
        });
        $('#truckModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get truck  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------get truck type ------------------------------------------------------------------------- -->  
   // $('.list select').selectpicker();   
//    $('.truckTypeSet').focus(function(){
    // $('.truckTypeSet').val('');
    //     //alert(); 
    //     $.ajax({
    //         type: "GET",
    //         url: base_path+"/admin/truck_getTrucktype",
    //         async: false,
    //         //dataType:JSON,
    //         success: function(data) {
    //             //console.log(data)                    
    //             createTruckTypeList(data);
    //             truckTypeResponse = data;
    //         }
    //     });
    // });


 
// <!-- -------------------------------------------------------------------------over get truck type ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------Add truck  ------------------------------------------------------------------------- --> 
    $('#truckSavebutton').click(function(){
    //asign veriable
        var trucktype='';
        var truck_number = $('#truck_number').val();
        var trucktype = $('#truckType').val().split('-');
        var trucktypeId=trucktype[0];
        var license_plate =$('#license_plate').val();
        var plate_expiry =$('#plate_expiry').val();
        var inspection =$('#inspection').val();
        var status =$('#status').val();
        if ($("#ownership").is(":checked")) {
            var ownership = 'CompanyTruck';
        } else if ($("#Own").is(":checked")) {
            var ownership = 'OwnerOperator';
        }else{
            var ownership ='';
        }
        var mileage =$('#mileage').val();
        var axies =$('#axies').val();
        var year =$('#year').val();
        var fuel_type =$('#fuel_type').val();
        var start_date =$('#start_date').val();
        var deactivation =$('#deactivation').val();
        var RegisteredState =$('#RegisteredState').val();
        var Insurance_Policy =$('#Insurance_Policy').val();
        var gross =$('#gross').val();
        var vin =$('#vin').val();
        var dot =$('#dot').val();
        var transponder =$('#transponder').val();
        if( $('#ifta').is(':checked') ){
            var ifta = " IFTA Truck";
        } else {
            var ifta = "NOT IFTA Truck";
        }
        var internal_note =$('#internal_note').val();
    //validation  
        if(truck_number==''){
            swal.fire( "'Enter truck number");
            $('#truck_number').focus();
            return false;
            
        } 
        if(trucktype==''){
            swal.fire( "'Select truck number from dropdown menu");
            return false;
        }
        if(license_plate==''){
            swal.fire( "'Enter license plate");
            return false;
        }
        if(plate_expiry==''){
            swal.fire( "'Enter plate expiry");
            return false;
        }  
        if(ownership==''){
            swal.fire( "'Select ownership");
            return false;
        }
        if(vin==''){
            swal.fire( "'Enter VIN");
            return false;
        }

    //upload files
        var formData = new FormData();

        $.each($("#files")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });

        formData.append('_token',$("#_tokenTruck").val());
        formData.append('truck_number',truck_number.trim());
        formData.append('trucktypeId',trucktypeId);
        formData.append('license_plate',license_plate);        
        formData.append('plate_expiry',plate_expiry);
        formData.append('inspection',inspection);
        formData.append('status',status);
        formData.append('ownership',ownership);
        formData.append('mileage',mileage);
        formData.append('axies',axies); 
        formData.append('year',year);      
        formData.append('fuel_type',fuel_type);      
        formData.append('start_date',start_date); 
        formData.append('deactivation',deactivation); 
        formData.append('start_date',start_date); 
        formData.append('RegisteredState',RegisteredState); 
        formData.append('Insurance_Policy',Insurance_Policy); 
        formData.append('gross',gross);                               
        formData.append('vin',vin);
        formData.append('dot',dot);                       
        formData.append('transponder',transponder);                       
        formData.append('ifta',ifta);                       
        formData.append('internal_note',internal_note);        

        $.ajax({
            type: "POST",
            url: base_path+"/admin/addTruck",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                //console.log(data)                    
                swal.fire("Done!", "Truck added successfully", "success");
                $('#addTruckModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTruck",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createGetTruckRows(text);
                        truckResult = text;
                     }
                });
            }
        });



    });
// <!-- -------------------------------------------------------------------------over add truck  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createGetTruckRows(truckResult) {
        var trucklen1 = 0;
            if (truckResult != null) {
                trucklen1 = truckResult.truck.truck.length;

                $("#truckTable").html('');

                if (trucklen1 > 0) {
                    var no=1;
                    for (var i = trucklen1-1; i > 0; i--) {  
                        var truckId =truckResult.truck.truck[i]._id;
                        var truckNumber =truckResult.truck.truck[i].truckNumber;
                        var truckTypeid =truckResult.truck.truck[i].truckType;
                        var custID=truckResult.truck.companyID;
                        var truckTypeLen = truckResult.truck_type.truck.length;
                        for (var j = 0; j < truckTypeLen; j++) { 
                            var truck_Type_id = truckResult.truck_type.truck[j]._id;
                            if(truckTypeid == truck_Type_id){
                                truckType=truckResult.truck_type.truck[j].truckType;
                                break;
                            }
                        }

                        var licensePlate =truckResult.truck.truck[i].licensePlate;
                        var plateExpiry =truckResult.truck.truck[i].plateExpiry;
                        var inspectionExpiry =truckResult.truck.truck[i].inspectionExpiry;
                        var status =truckResult.truck.truck[i].status;
                        var ownership =truckResult.truck.truck[i].ownership;
                        var mileage =truckResult.truck.truck[i].mileage;
                        var axies =truckResult.truck.truck[i].axies;
                        var year =truckResult.truck.truck[i].year;
                        var fuelType =truckResult.truck.truck[i].fuelType;
                        var startDate =truckResult.truck.truck[i].startDate;
                        if(startDate== false){
                            startDate='';
                        }
                        var deactivationDate =truckResult.truck.truck[i].deactivationDate;
                        if(deactivationDate== false){
                            deactivationDate='';
                        }
                        var ifta =truckResult.truck.truck[i].ifta;
                        var registeredState =truckResult.truck.truck[i].registeredState;
                        var insurancePolicy =truckResult.truck.truck[i].insurancePolicy;
                        var grossWeight =truckResult.truck.truck[i].grossWeight;
                        var vin =truckResult.truck.truck[i].vin;
                        var dotexpiryDate =truckResult.truck.truck[i].dotexpiryDate;
                        if(dotexpiryDate== false){
                            dotexpiryDate='';
                        }
                        var transponder =truckResult.truck.truck[i].transponder;
                        var internalNotes =truckResult.truck.truck[i].internalNotes;
                        
                        if(truckResult.truck.truck[i].deleteStatus == "NO" || truckResult.truck.truck[i].deleteStatus == "No")
                        {
                            var truckStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
                            //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='truckNumber' >" + truckNumber + "</td>" +
                                "<td data-field='truckType' >" + truckType + "</td>" +
                                "<td data-field='licensePlate' >" + licensePlate + "</td>" +
                                "<td data-field='plateExpiry' >" + plateExpiry + "</td>" +
                                "<td data-field='inspectionExpiry' >" + inspectionExpiry + "</td>" +
                                "<td data-field='status' >" + status + "</td>" +
                                "<td data-field='ownership' >" + ownership + "</td>" +
                                "<td data-field='mileage' >" + mileage + "</td>" +
                                "<td data-field='axies' >" + axies + "</td>" +
                                "<td data-field='year' >" + year + "</td>" +
                                "<td data-field='fuelType' >" + fuelType + "</td>" +
                                "<td data-field='startDate' >" + startDate + "</td>" +
                                "<td data-field='deactivationDate' >" + deactivationDate + "</td>" +
                                "<td data-field='ifta' >" +ifta  + "</td>" +
                                "<td data-field='registeredState' >" + registeredState + "</td>" +
                                "<td data-field='insurancePolicy' >" + insurancePolicy + "</td>" +
                                "<td data-field='grossWeight' >" + grossWeight + "</td>" +
                                "<td data-field='vin' >" + vin + "</td>" +
                                "<td data-field='dotexpiryDate' >" +dotexpiryDate  + "</td>" +
                                "<td data-field='transponder' >" + transponder + "</td>" +
                                "<td data-field='internalNotes' >" + internalNotes + "</td>" +
                                "<td style='text-align:center'>"+
                                "<a class='mt-2 button-29 fs-14 text-white edit_truck_data'  title='Edit1' data-truckId='"+truckId+"' data-com_Id='"+custID+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                "<a class='mt-2 button-29 fs-14 text-white delete_truck_data'  title='Edit1' data-truckId='"+truckId+"' data-com_Id='"+custID+"' data-truckType='' ><i class='fe fe-trash'></i></a>&nbsp"+
                            "</td></tr>";

                            $("#truckTable").append(truckStr);
                            no++;
                        } 
                    }
                } else {
                    var truckStr = "<tr data-id=" + i + ">" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
        
                    $("#truckTable").append(truckStr);
                }
            }else {
            var tr_str1 = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#currencyTable").append(currencyStr);
        }
        // $("#CurrencyModal").modal("show");
    }

//get truck type
        function createTruckTypeList(truckTypeResponse) {           
            var TruckTypeLength = 0;    
                // alert(truckTypeResponse.truck.length);
            if (truckTypeResponse != null) {
               TruckTypeLength = truckTypeResponse.truck.length;
            }
       
            if (TruckTypeLength > 0) {
               // var no=1;
                //$(".customerCurrencySet").html('');
                $(".truckTypeSet").html('');
                for (var i = 0; i < TruckTypeLength; i++) {  
                    var truckType =truckTypeResponse.truck[i].truckType;
                    var truckTypeId =truckTypeResponse.truck[i]._id;
                    //var customerCurrency = "<option id='customerCurrency' value='"+ currency +"'>"+ currency +"</option>"
                    //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";                  
       
                  // var TruckTypeList = "<option class='truckType' t_type_id="+truckTypeId +" data-value='"+ truckTypeId +"'>"+ truckType +"<option "
                //   if(truckTypeResponse.truck[i].deleteStatus == "NO")
                //     {
                    // var Truck_Type_List = "<option class='truckType' value='"+truckTypeId+">"+truckType+" </option>" ;    
                    // }
                    var dataop="<option class='truckType' value='"+truckTypeId+"'> "+truckType+" </option>"  
                    // alert(TruckTypeList);           
                   $(".truck_Type_Set").append(dataop);
                   //<option value="Edge">
                    //no++;
       
                }
                
            }
            
        }
        
  


// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- -->  

      //================================ start edit truck modal ========================

      $(".closeEditTruckModal").click(function(){
        $("#editTruckModal").modal("hide");
    });
    $('body').on('click','.edit_truck_data',function(){
        createTruckTypeList(truckTypeResponse)
        var id=$(this).attr('data-truckid');
        var companyID=$(this).attr('data-com_Id');
        $.ajax({
            type:'get',
            data:{id:id,companyID:companyID},
            async: false,
            url:base_path+"/admin/edit_truck",
            success:function(response){
                $("#comp_id_truck_edit").val(response.companyID);
                $("#truck_id").val(response.truck._id);
                // alert(response.truck.truckNumber);
                $("#edit_truck_number").val(response.truck.truckNumber);
                $("#editTruckType").val(response.truck.truckType);
                $("#edit_truck_license_plate").val(response.truck.licensePlate);
                $("#edit_truck_plate_expiry").val(response.truck.plateExpiry);
                $("#edit_truck_inspection").val(response.truck.inspectionExpiry);
                $("#edit_truck_status").val(response.truck.status);




                if(response.truck.ownership =="CompanyTruck")
                {
                    $("#edit_truck_ownership").prop('checked', true);
                    $("#edit_truck_Own").prop('checked', false);
                }
                else
                {
                    $("#edit_truck_ownership").prop('checked', false);
                    $("#edit_truck_Own").prop('checked', true);
                }
                $("#edit_truck_mileage").val(response.truck.mileage);
                $("#edit_truck_axies").val(response.truck.axies);
                $("#edit_truck_year").val(response.truck.year);
                $("#edit_truck_fuel_type").val(response.truck.fuelType);
                $("#edit_truck_start_date").val(response.truck.startDate);
                $("#edit_truck_deactivation").val(response.truck.deactivationDate);
                $("#edit_truck_RegisteredState").val(response.truck.registeredState);
                $("#edit_truck_Insurance_Policy").val(response.truck.insurancePolicy);
                $("#edit_truck_gross").val(response.truck.grossWeight);
                $("#edit_truck_vin").val(response.truck.vin);
                $("#edit_truck_dot").val(response.truck.dotexpiryDate);
                $("#edit_truck_transponder").val(response.truck.transponder);
                if(response.truck.ifta =="IFTA Truck")
                {
                        $("#edit_truck_ifta").attr('checked',true);
                }
                else
                {
                        $("#edit_truck_ifta").attr('checked',false);
                }
                // $("#edit_truck_ifta").val(response.truck.ifta);
                $("#edit_truck_internal_note").val(response.truck.internalNotes);
            }
        });        
        $("#editTruckModal").modal("show");
    });
    $(".truckUpdateButton").click(function(){
        var ownership="";
        var id=$("#truck_id").val();
        var companyID= $("#comp_id_truck_edit").val();
        // alert(companyID);
        var truckNumber= $("#edit_truck_number").val();
        var truckType= $("#editTruckType").val();
        var licensePlate= $("#edit_truck_license_plate").val();
        var plateExpiry= $("#edit_truck_plate_expiry").val();
        var inspectionExpiry= $("#edit_truck_inspection").val();
        var status= $("#edit_truck_status").val();
        ownership=$('input[name=ownership]:radio:checked').val();
      
        // alert(ownership);
        var mileage= $("#edit_truck_mileage").val();
        var axies= $("#edit_truck_axies").val();
        var year= $("#edit_truck_year").val();
        var fuelType= $("#edit_truck_fuel_type").val();
        var startDate= $("#edit_truck_start_date").val();
        var deactivationDate= $("#edit_truck_deactivation").val();
        var registeredState= $("#edit_truck_RegisteredState").val();
        var insurancePolicy= $("#edit_truck_Insurance_Policy").val();
        var grossWeight= $("#edit_truck_gross").val();
        var vin= $("#edit_truck_vin").val();
        var dotexpiryDate= $("#edit_truck_dot").val();
        var transponder= $("#edit_truck_transponder").val();
        $("#edit_truck_ifta").change(function(){
            if ($(this).is(':checked'))
            {
                $("#edit_truck_ifta").val("IFTA Truck");
            }
            else
            {
                $("#edit_truck_ifta").val("NOT IFTA Truck");
            }
        });
        var ifta= $("#edit_truck_ifta").val();
        var internalNotes= $("#edit_truck_internal_note").val();
        if(truckNumber=='')
        {
            swal.fire( "'Enter truck number");
            $('#edit_truck_number').focus();
            return false;
        } 
        if(truckType=='')
        {
            swal.fire( "'Enter truck type");
            $('#editTruckType').focus();
            return false;
        } 
        if(licensePlate=='')
        {
            swal.fire( "'Enter license Plate");
            $('#edit_truck_license_plate').focus();
            return false;
        } 
        if(plateExpiry=='')
        {
            swal.fire( "'Enter plate Expiry");
            $('#edit_truck_plate_expiry').focus();
            return false;
        } 
        if(ownership=='' )
        {
            swal.fire( "'Select one ownership ");
            $('input[name="ownership"]').focus();
            return false;
        }  
        if(vin=='')
        {
            swal.fire( "'Enter VIN ");
            $('#edit_truck_vin').focus();
            return false;
        } 
        var formData = new FormData();
        $.each($("#edit_truck_files")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });
        formData.append('_token',$("#_tokenEditTruck").val());
        formData.append('id',id);
        formData.append('companyID',companyID);
        formData.append('truckNumber',truckNumber);
        formData.append('truckType',truckType);
        formData.append('licensePlate',licensePlate);
        formData.append('plateExpiry',plateExpiry);
        formData.append('inspectionExpiry',inspectionExpiry);
        formData.append('status',status);
        formData.append('ownership',ownership);
        formData.append('mileage',mileage);
        formData.append('axies',axies);
        formData.append('year',year);
        formData.append('fuelType',fuelType);
        formData.append('startDate',startDate);
        formData.append('deactivationDate',deactivationDate);
        formData.append('registeredState',registeredState);
        formData.append('insurancePolicy',insurancePolicy);
        formData.append('grossWeight',grossWeight);
        formData.append('vin',vin);
        formData.append('dotexpiryDate',dotexpiryDate);
        formData.append('transponder',transponder);
        formData.append('ifta',ifta);
        formData.append('internalNotes',internalNotes);
        $.ajax({
            type:'post',
            data:formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            url:base_path+"/admin/update_truck",
            success:function()
            {
                swal.fire("Done!", "Truck updated successfully", "success");
                $('#editTruckModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTruck",
                    async: false,
                    //dataType:JSON,
                    success: function(text) {
                        //alert();
                        console.log(text);
                        createGetTruckRows(text);
                        truckResult = text;
                     }
                });
            }
        })
    });

    //===================================== end update truck =================================

    //=============================  start delete truck ===================================
    $('body').on('click','.delete_truck_data',function(){
        var id=$(this).attr('data-truckid');
        var companyID=$(this).attr('data-com_Id');
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
                    url: base_path+"/admin/delete_truck",
                    data: { _token: $("#_tokenEditTruck").val(), id: id,companyID:companyID},
                    success: function(resp){
                        swal.fire("Done!", "Truck Deleted successfully", "success");
                       

                        $.ajax({
                            type: "GET",
                            url: base_path+"/admin/getTruck",
                            async: false,
                            success: function(text) {
                                createGetTruckRows(text);
                                truckResult = text;
                             }
                        });
                        $('#truckModal').modal('show');

                    },
                    error: function (resp) {
                        swal.fire("Error!", 'Something went wrong.', "error");
                    }
                });
            } 
        });
    });
    //================================= end delete truck===================================

    //================================ restore truck start ================================
    $(".closeRestoreTruck").click(function(){
        $("#restoretruckModal").modal("hide");
    });
    $('.restore_truckData').click(function(){
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruck",
            async: false,
            success: function(res) {
                // alert("sussss");
                RestorecustomerRows(res);
                restoreTruckData = res;
            }
        });
        $("#restoretruckModal").modal("show");
    }); 
    function RestorecustomerRows(restoreTruckData)
    {
        var trucklen1 = 0;
        if (restoreTruckData != null) {
            trucklen1 = restoreTruckData.truck.truck.length;
            $("#restoretruckTable").html('');
            if (trucklen1 > 0) 
            {
                var no=1;
                for (var i = trucklen1-1; i > 0; i--) 
                {  
                    var truckId =restoreTruckData.truck.truck[i]._id;
                    var truckNumber =restoreTruckData.truck.truck[i].truckNumber;
                    var truckTypeid =restoreTruckData.truck.truck[i].truckType;
                    var truckTypeLen = restoreTruckData.truck_type.truck.length;
                    for (var j = 0; j < truckTypeLen; j++) 
                    { 
                        var truck_Type_id = restoreTruckData.truck_type.truck[j]._id;
                        if(truckTypeid == truck_Type_id)
                        {
                            truckType=restoreTruckData.truck_type.truck[j].truckType;
                            break;
                        }
                    }
                    var custID=restoreTruckData.truck.companyID;
                    var licensePlate =restoreTruckData.truck.truck[i].licensePlate;
                    var plateExpiry =restoreTruckData.truck.truck[i].plateExpiry;
                    var inspectionExpiry =restoreTruckData.truck.truck[i].inspectionExpiry;
                    var status =restoreTruckData.truck.truck[i].status;
                    var ownership =restoreTruckData.truck.truck[i].ownership;
                    var mileage =restoreTruckData.truck.truck[i].mileage;
                    var axies =restoreTruckData.truck.truck[i].axies;
                    var year =restoreTruckData.truck.truck[i].year;
                    var fuelType =restoreTruckData.truck.truck[i].fuelType;
                    var startDate =restoreTruckData.truck.truck[i].startDate;
                    if(startDate== false)
                    {
                        startDate='';
                    }
                    var deactivationDate =restoreTruckData.truck.truck[i].deactivationDate;
                    if(deactivationDate== false)
                    {
                        deactivationDate='';
                    }
                    var ifta =restoreTruckData.truck.truck[i].ifta;
                    var registeredState =restoreTruckData.truck.truck[i].registeredState;
                    var insurancePolicy =restoreTruckData.truck.truck[i].insurancePolicy;
                    var grossWeight =restoreTruckData.truck.truck[i].grossWeight;
                    var vin =restoreTruckData.truck.truck[i].vin;
                    var dotexpiryDate =restoreTruckData.truck.truck[i].dotexpiryDate;
                    if(dotexpiryDate== false)
                    {
                        dotexpiryDate='';
                    }
                    var transponder =restoreTruckData.truck.truck[i].transponder;
                    var internalNotes =restoreTruckData.truck.truck[i].internalNotes;
                    
                    if(restoreTruckData.truck.truck[i].deleteStatus == "YES")
                    {
                        var truckStr = "<tr data-id=" + (i + 1) + ">" +
                        //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
                        "<td data-field='no'><input type='checkbox' class='check_truck_one' name='all_truck_id[]' data-id=" + truckId+ " date-cusId="+custID+"  value="+truckId+"></td>" +
                        "<td data-field='truckNumber' >" + truckNumber + "</td>" +
                        "<td data-field='truckType' >" + truckType + "</td>" +
                        "<td data-field='licensePlate' >" + licensePlate + "</td>" +
                        "<td data-field='plateExpiry' >" + plateExpiry + "</td>" +
                        "<td data-field='inspectionExpiry' >" + inspectionExpiry + "</td>" +
                        "<td data-field='status' >" + status + "</td>" +
                        "<td data-field='ownership' >" + ownership + "</td>" +
                        "<td data-field='mileage' >" + mileage + "</td>" +
                        "<td data-field='axies' >" + axies + "</td>" +
                        "<td data-field='year' >" + year + "</td>" +
                        "<td data-field='fuelType' >" + fuelType + "</td>" +
                        "<td data-field='startDate' >" + startDate + "</td>" +
                        "<td data-field='deactivationDate' >" + deactivationDate + "</td>" +
                        "<td data-field='ifta' >" +ifta  + "</td>" +
                        "<td data-field='registeredState' >" + registeredState + "</td>" +
                        "<td data-field='insurancePolicy' >" + insurancePolicy + "</td>" +
                        "<td data-field='grossWeight' >" + grossWeight + "</td>" +
                        "<td data-field='vin' >" + vin + "</td>" +
                        "<td data-field='dotexpiryDate' >" +dotexpiryDate  + "</td>" +
                        "<td data-field='transponder' >" + transponder + "</td>" +
                        "<td data-field='internalNotes' >" + internalNotes + "</td>" +
                        "</td></tr>";
                        $("#restoretruckTable").append(truckStr);
                        no++;
                    }                    
                }
            } 
            else 
            {
                var truckStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";    
                $("#truckTable").append(truckStr);
            }
        }
        else 
        {
            var tr_str1 = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='4'>No record found.</td>" +
            "</tr>";
            $("#currencyTable").append(currencyStr);
        }
    }

    $(document).on("change", ".all_truck_checkbox", function() 
    {
        if(this.checked) {
            $('.check_truck_one:checkbox').each(function() 
            {
                this.checked = true;
                truckCheckboxRestore();
            });
        } 
        else 
        {
            $('.check_truck_one:checkbox').each(function() {
                this.checked = false;
            });
        }
    });
    $('body').on('click','.check_truck_one',function(){
        truckCheckboxRestore();
    });
    function truckCheckboxRestore()
    {
        var truckIds = [];
        var companyIds=[]
			$.each($("input[name='all_truck_id[]']:checked"), function(){
				truckIds.push($(this).val());
                companyIds.push($(this).attr("date-cusId"));
			});
			console.log(truckIds);
			var TruckCheckedIds =JSON.stringify(truckIds);
			$('#checked_truck_ids').val(TruckCheckedIds);
           
			var companyCheckedIds =JSON.stringify(companyIds);
			$('#checked_truck_company_ids').val(companyCheckedIds);


			if(truckIds.length > 0)
			{
				$('#restore_truck_data').removeAttr('disabled');
			}
			else
			{
				$('#restore_truck_data').attr('disabled',true);
			}
    }
    $('body').on('click','.restore_truck_data',function(){
        var all_ids=$('#checked_truck_ids').val();
        var custID=$("#checked_truck_company_ids").val();
        $.ajax({
            type:"post",
            data:{_token:$("#_tokenEditTruck").val(),all_ids:all_ids,custID:custID},
            url: base_path+"/admin/restore_truck",
            success: function(response) {               
                swal.fire("Done!", "Truck Restored successfully", "success");
                $("#restoretruckModal").modal("hide");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTruck",
                    async: false,
                    success: function(text) {
                        // console.log(text);
                        createGetTruckRows(text);
                        truckResult = text;
                     }
                });
            }
        });
    });
    //================================ restore truck end ==================================
     
    //================================ start create truck type =============================
    $(".create_truck_type").click(function(){
        $("#addTtruckTypeModal").modal("show");
    });
    $(".closeTruckType").click(function(){
        $("#addTtruckTypeModal").modal("hide");
    });
    $(".savetruckType").click(function(){
        var truck_type_name = $('#addtruck_type').val();
        if(truck_type_name=='')
        {
            swal.fire( "'Enter truck type name");
            $('#addtruck_type').focus();
            return false;            
        }
        var formData = new FormData();
        formData.append('_token',$("#_tokenTruckType").val());        
        formData.append('truckType',truck_type_name);
        $.ajax({
            type: "POST",
            url: base_path+"/admin/create_truckType",
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            data:formData,
            success:function(response){
                swal.fire("Done!", "Truck Type added successfully", "success");
                $('#addTtruckTypeModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/truck_getTrucktype",
                    async: false,
                    //dataType:JSON,
                    success: function(data) {
                        //console.log(data)                    
                        createTruckTypeList(data);
                        truckTypeResponse = data;
                    }
                });
            }
        })
    })
    //================================ end create truck type ===============================
});