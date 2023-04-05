var base_path = $("#url").val();

    // <!--=========================star=========================- -->  
    $('.closeTruckModal').click(function(){
         $('#truckModal').modal('hide');
        //$('#addTruckModal').modal('hide');
     });
    //  $('#truckModal').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // });
    $('.closeAddTruckModal').click(function(){
        $('#addTruckModal').modal('hide');
        //$('#truckModal').modal('show');
    });
    $('#addTtruckTypeModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $('.addtruckModal').click(function(){
        //$('#truckModal').modal('hide');
        $('#addTruckModal').modal('show');
    });
        // $('#addTruckModal').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // });


    //driver as owner operator modal
    $('#driverAddTruck').click(function(){
        $('#addTruckModal').modal('show');
    });
    $('#up_driverAddTruck').click(function(){
        $('#addTruckModal').modal('show');
    });
    // <!--=====================Get truck=========================== -->  
   
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
            success: function(text) {
                // console.log(text);
                // createGetTruckRows(text);
                // truckResult = text;
                var res = JSON.parse(text);
                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                    processTruckTable(res[0]);
                    $("#truck_pagination").html(paginateList(res[1], "admin", "paginatetruck", "processTruckTable"));
                    renameTableSeq("truckTable", "page_active");
                }
             }
        });
        $('#truckModal').modal('show');
    });
    // function createGetTruckRows(truckResult) 
    // {

    //     // Privilege
    //     var edit=$('#updateUser').val();
    //     var delet =$('#deleteUser').val();

    //     if(edit == 1){
    //        var editPrivilege=''; 
    //     }else{
    //         var editPrivilege='privilege';
    //     }
    //     if(delet == 1){
    //         var delPrivilege=''; 
    //      }else{
    //          var delPrivilege='privilege';
    //      }

    //     var trucklen1 = 0;
    //     if (truckResult != null) 
    //     {
    //         trucklen1 = truckResult.truck.truck.length;
    //         $("#truckTable").html('');
    //         if (trucklen1 > 0) 
    //         {
    //             var no=1;
    //             for (var i = trucklen1-1; i > 0; i--) 
    //             {  
    //                 var truckId =truckResult.truck.truck[i]._id;
    //                 var truckNumber =truckResult.truck.truck[i].truckNumber;
    //                 var truckTypeid =truckResult.truck.truck[i].truckType;
    //                 var custID=truckResult.truck.companyID;
    //                 var truckTypeLen = truckResult.truck_type.truck.length;
    //                 for (var j = 0; j < truckTypeLen; j++) 
    //                 { 
    //                     var truck_Type_id = truckResult.truck_type.truck[j]._id;
    //                     if(truckTypeid == truck_Type_id){
    //                     var truckType=truckResult.truck_type.truck[j].truckType;
    //                         break;
    //                     }
    //                 }

    //                 var licensePlate =truckResult.truck.truck[i].licensePlate;
    //                 var plateExpiry =truckResult.truck.truck[i].plateExpiry;
    //                 var inspectionExpiry =truckResult.truck.truck[i].inspectionExpiry;
    //                 var status =truckResult.truck.truck[i].status;
    //                 var ownership =truckResult.truck.truck[i].ownership;
    //                 var mileage =truckResult.truck.truck[i].mileage;
    //                 var axies =truckResult.truck.truck[i].axies;
    //                 var year =truckResult.truck.truck[i].year;
    //                 var fuelType =truckResult.truck.truck[i].fuelType;
    //                 var startDate =truckResult.truck.truck[i].startDate;
    //                 if(startDate !== false)
    //                 {
    //                     var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                     var date_startDate = new Date(startDate*1000);
    //                     var year_startDate = date_startDate.getFullYear();
    //                     var month_startDate = months_arr[date_startDate.getMonth()];
    //                     var day = date_startDate.getDate();
    //                     var startDate = month_startDate+'/'+day+'/'+year_startDate;
    //                 }
    //                 else
    //                 {
    //                     startDate="-----";
    //                 }
    //                 var deactivationDate =truckResult.truck.truck[i].deactivationDate;
    //                 if(deactivationDate!== "" && deactivationDate !==null && deactivationDate !==false)
    //                 {
    //                     var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                     var date_deactivationDate = new Date(deactivationDate*1000);
    //                     var year_deactivationDate = date_deactivationDate.getFullYear();
    //                     var month_deactivationDate = months_arr[date_deactivationDate.getMonth()];
    //                     var day = date_deactivationDate.getDate();
    //                     var deactivationDate = month_deactivationDate+'/'+day+'/'+year_deactivationDate;
    //                 }
    //                 else
    //                 {
    //                     deactivationDate="------";
    //                 }
    //                 var ifta =truckResult.truck.truck[i].ifta;
    //                 var registeredState =truckResult.truck.truck[i].registeredState;
    //                 var insurancePolicy =truckResult.truck.truck[i].insurancePolicy;
    //                 var grossWeight =truckResult.truck.truck[i].grossWeight;
    //                 var vin =truckResult.truck.truck[i].vin;
    //                 var dotexpiryDate =truckResult.truck.truck[i].dotexpiryDate;
    //                 if(dotexpiryDate !== "" && dotexpiryDate !==false)
    //                 {
    //                     var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                         var date_dotexpiryDate = new Date(dotexpiryDate*1000);
    //                         var year_dotexpiryDate = date_dotexpiryDate.getFullYear();
    //                         var month_dotexpiryDate = months_arr[date_dotexpiryDate.getMonth()];
    //                         var day = date_dotexpiryDate.getDate();
    //                         var dotexpiryDate = month_dotexpiryDate+'/'+day+'/'+year_dotexpiryDate;
    //                 }
    //                 else
    //                 {
    //                     dotexpiryDate="-------";
    //                 }
    //                 var transponder =truckResult.truck.truck[i].transponder;
    //                 var internalNotes =truckResult.truck.truck[i].internalNotes;
    //                 if(truckNumber !== "" && truckNumber !== null)
    //                 {
    //                     truckNumber=truckNumber;
    //                 }
    //                 else
    //                 {
    //                     truckNumber="------";
    //                 }
    //                 if(truckTypeid !== "" && truckTypeid !== null)
    //                 {
    //                     truckTypeid=truckTypeid;
    //                 }
    //                 else
    //                 {
    //                     truckTypeid="------";
    //                 }
    //                 if(licensePlate !== "" && licensePlate !== null)
    //                 {
    //                     licensePlate=licensePlate;
    //                 }
    //                 else
    //                 {
    //                     licensePlate="------";
    //                 }
    //                 if(plateExpiry !== "" && plateExpiry !== false)
    //                 {
    //                     var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    //                     var date_plateExpiry = new Date(plateExpiry*1000);
    //                     var year_plateExpiry = date_plateExpiry.getFullYear();
    //                     var month_plateExpiry = months_arr[date_plateExpiry.getMonth()];
    //                     var day = date_plateExpiry.getDate();
    //                     var plateExpiry = month_plateExpiry+'/'+day+'/'+year_plateExpiry;
    //                 }
    //                 else
    //                 {
    //                     plateExpiry="------";
    //                 }
    //                 if(inspectionExpiry !== "" && inspectionExpiry !== null)
    //                 {
    //                     inspectionExpiry=inspectionExpiry;
    //                 }
    //                 else
    //                 {
    //                     inspectionExpiry="------";
    //                 }
    //                 if(status !== "" && status !== null)
    //                 {
    //                     status=status;
    //                 }
    //                 else
    //                 {
    //                     status="------";
    //                 }
    //                 if(ownership !== "" && ownership !== null)
    //                 {
    //                     ownership=ownership;
    //                 }
    //                 else
    //                 {
    //                     ownership="------";
    //                 }
    //                 if(mileage !== "" && mileage !== null)
    //                 {
    //                     mileage=mileage;
    //                 }
    //                 else
    //                 {
    //                     mileage="------";
    //                 }
    //                 if(axies !== "" && axies !== null)
    //                 {
    //                     axies=axies;
    //                 }
    //                 else
    //                 {
    //                     axies="------";
    //                 }
    //                 if(year !== "" && year !== null)
    //                 {
    //                     year=year;
    //                 }
    //                 else
    //                 {
    //                     year="------";
    //                 }
    //                 if(fuelType !== "" && fuelType !== null)
    //                 {
    //                     fuelType=fuelType;
    //                 }
    //                 else
    //                 {
    //                     fuelType="------";
    //                 }
    //                 if(ifta !== "" && ifta !== null)
    //                 {
    //                     ifta=ifta;
    //                 }
    //                 else
    //                 {
    //                     ifta="------";
    //                 }
    //                 if(registeredState !== "" && registeredState !== null)
    //                 {
    //                     registeredState=registeredState;
    //                 }
    //                 else
    //                 {
    //                     registeredState="------";
    //                 }
    //                 if(insurancePolicy !== "" && insurancePolicy !== null)
    //                 {
    //                     insurancePolicy=insurancePolicy;
    //                 }
    //                 else
    //                 {
    //                     insurancePolicy="------";
    //                 }
    //                 if(grossWeight !== "" && grossWeight !== null)
    //                 {
    //                     grossWeight=grossWeight;
    //                 }
    //                 else
    //                 {
    //                     grossWeight="------";
    //                 }
    //                 if(vin !== "" && vin !== null)
    //                 {
    //                     vin=vin;
    //                 }
    //                 else
    //                 {
    //                     vin="------";
    //                 }
    //                 if(transponder !=="" && transponder!==null)
    //                 {
    //                     transponder=transponder;
    //                 }
    //                 else
    //                 {
    //                     transponder="------";
    //                 }
    //                 if(internalNotes !=="" && internalNotes !==null)
    //                 {
    //                     internalNotes=internalNotes;
    //                 }
    //                 else
    //                 {
    //                     internalNotes="-------";
    //                 }
                        
    //                 if(truckResult.truck.truck[i].deleteStatus == "NO" || truckResult.truck.truck[i].deleteStatus == "No")
    //                 {
    //                     var truckStr = "<tr class='tr' data-id=" + (i + 1) + ">" +
    //                     //  "<td id='id1'>" + id+ "&"+driverId + "</td>" +
    //                         "<td data-field='no'>" + no + "</td>" +
    //                         "<td data-field='truckNumber' >" + truckNumber + "</td>" +
    //                         "<td data-field='truckType' >" + truckType + "</td>" +
    //                         "<td data-field='licensePlate' >" + licensePlate + "</td>" +
    //                         "<td data-field='plateExpiry' >" + plateExpiry + "</td>" +
    //                         "<td data-field='inspectionExpiry' >" + inspectionExpiry + "</td>" +
    //                         "<td data-field='status' >" + status + "</td>" +
    //                         "<td data-field='ownership' >" + ownership + "</td>" +
    //                         "<td data-field='mileage' >" + mileage + "</td>" +
    //                         "<td data-field='axies' >" + axies + "</td>" +
    //                         "<td data-field='year' >" + year + "</td>" +
    //                         "<td data-field='fuelType' >" + fuelType + "</td>" +
    //                         "<td data-field='startDate' >" + startDate + "</td>" +
    //                         "<td data-field='deactivationDate' >" + deactivationDate + "</td>" +
    //                         "<td data-field='ifta' >" +ifta  + "</td>" +
    //                         "<td data-field='registeredState' >" + registeredState + "</td>" +
    //                         "<td data-field='insurancePolicy' >" + insurancePolicy + "</td>" +
    //                         "<td data-field='grossWeight' >" + grossWeight + "</td>" +
    //                         "<td data-field='vin' >" + vin + "</td>" +
    //                         "<td data-field='dotexpiryDate' >" +dotexpiryDate  + "</td>" +
    //                         "<td data-field='transponder' >" + transponder + "</td>" +
    //                         "<td data-field='internalNotes' >" + internalNotes + "</td>" +
    //                         "<td style='width: 100px'><a class='button-23 edit1 edit_truck_data "+editPrivilege+"'  title='Edit'  data-truckId='"+truckId+"' data-com_Id='"+custID+"' ><i class='fe fe-edit'></i></a><a class='delete1 delete_truck_data button-23 "+delPrivilege+"'  data-truckId='"+truckId+"' data-com_Id='"+custID+"' title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
                          

    //                     $("#truckTable").append(truckStr);
    //                     no++;
    //                 } 
    //             }
    //         } 
    //         else 
    //         {
    //             var truckStr = "<tr data-id=" + i + ">" +
    //                 "<td align='center' colspan='4'>No record found.</td>" +
    //                 "</tr>";        
    //             $("#truckTable").append(truckStr);
    //         }
    //     }
    //     else 
    //     {
    //         var tr_str1 = "<tr data-id=" + i + ">" +
    //             "<td align='center' colspan='4'>No record found.</td>" +
    //             "</tr>";

    //         $("#currencyTable").append(currencyStr);
    //     }
    //     // $("#CurrencyModal").modal("show");
    // }

    function processTruckTable(res) {
        $("#truckTable").empty();
        var masterID = res[0]["mainID"]._id;
        var data = res[0]["mainID"].truck;
        var truck = res[0]["truckType"];
        var row = ``;
    
        for (var i = 0; i < data.length; i++) {
            var id = data[i]._id;
            var truckNumber = data[i].truckNumber;
            var licensePlate = data[i].licensePlate;
            var status = data[i].status;
            var ownership = data[i].ownership;
            var mileage = data[i].mileage;
            var axies = data[i].axies;
            var year = data[i].year;
            var fuelType = data[i].fuelType;
            var ifta = data[i].ifta;
            var registeredState = data[i].registeredState;
            var insurancePolicy = data[i].insurancePolicy;
            var grossWeight = data[i].grossWeight;
            var vin = data[i].vin;
            var transponder = data[i].transponder;
            var internalNotes = data[i].internalNotes;
            var trucDoc = data[i].trucDoc;
            var deleteStatus = data[i].deleteStatus;
            if(truckNumber !="" && truckNumber !=null)
            {
                truckNumber=truckNumber;
            }
            else
            {
                truckNumber="--------";
            }
            if(licensePlate !="" && licensePlate !=null)
            {
                licensePlate=licensePlate;
            }
            else
            {
                licensePlate="--------";
            }
            if(status !="" && status !=null)
            {
                status=status;
            }
            else
            {
                status="--------";
            }
            if(ownership !="" && ownership !=null)
            {
                ownership=ownership;
            }
            else
            {
                ownership="--------";
            }
            if(mileage !="" && mileage !=null)
            {
                mileage=mileage;
            }
            else
            {
                mileage="--------";
            }
            if(axies !="" && axies !=null)
            {
                axies=axies;
            }
            else
            {
                axies="--------";
            }
            if(year !="" && year !=null)
            {
                year=year;
            }
            else
            {
                year="--------";
            }
            if(fuelType !="" && fuelType !=null)
            {
                fuelType=fuelType;
            }
            else
            {
                fuelType="--------";
            }
            if(ifta !="" && ifta !=null)
            {
                ifta=ifta;
            }
            else
            {
                ifta="--------";
            }
            if(registeredState !="" && registeredState !=null)
            {
                registeredState=registeredState;
            }
            else
            {
                registeredState="--------";
            }
            if(insurancePolicy !="" && insurancePolicy !=null)
            {
                insurancePolicy=insurancePolicy;
            }
            else
            {
                insurancePolicy="--------";
            }
            if(grossWeight !="" && grossWeight !=null)
            {
                grossWeight=grossWeight;
            }
            else
            {
                grossWeight="--------";
            }
            if(vin !="" && vin !=null)
            {
                vin=vin;
            }
            else
            {
                vin="--------";
            }
            if(transponder !="" && transponder !=null)
            {
                transponder=transponder;
            }
            else
            {
                transponder="--------";
            }
            if(internalNotes !="" && internalNotes !=null)
            {
                internalNotes=internalNotes;
            }
            else
            {
                 internalNotes="--------";
            }
            if (trucDoc != '') {
                var data1 = trucDoc;
            } else {
                var data1 = '';
            }
            if (data[i].truckType != '' && data[i].truckType != null) {
                var truckType = truck[data[i].truckType];
                var truckTypeid = data[i].truckType;
            } else {
                var truckType = "--------";
                var truckTypeid = '';
            }
            // console.log(data[i].plateExpiry);
            if (data[i].plateExpiry != '' || data[i].plateExpiry != false) {
                var plateExpiry = convertTimeZone(data[i].plateExpiry, "info");
            } else {
                var plateExpiry = '--------';
            }
            if (data[i].inspectionExpiry != '' || data[i].inspectionExpiry != false ) {
                var inspectionExpiry = convertTimeZone(data[i].inspectionExpiry, "info");
            } else {
                var inspectionExpiry = '--------';
            }
            if (data[i].startDate != '' || data[i].startDate != false) {
                var startDate = convertTimeZone(data[i].startDate, "info");
            } else {
                var startDate = '--------';
            }
            if (data[i].deactivationDate != '' || data[i].deactivationDate != false) {
                var deactivationDate = convertTimeZone(data[i].deactivationDate, "info");
            } else {
                var deactivationDate = '--------';
            }
            if (data[i].dotexpiryDate != '' || data[i].dotexpiryDate != false) {
                var dotexpiryDate = convertTimeZone(data[i].dotexpiryDate, "info");
            } else {
                var dotexpiryDate = '--------';
            }
            if(deleteStatus=="NO")
            {
                var tr = `<tr   class='tr'>
                <td data-id="${id}">${id}</td>
                <td>${truckNumber}</td>
                <td>${truckType}</td>
                <td>${licensePlate}</td>
                <td>${plateExpiry}</td>
                <td>${inspectionExpiry}</td>
                <td>${status}</td>
                <td>${ownership}</td>
                <td>${mileage}</td>
                <td>${axies}</td>
                <td>${year}</td>
                <td>${fuelType}</td>
                <td>${startDate}</td>
                <td>${deactivationDate}</td>
                <td>${ifta}</td>
                <td>${registeredState}</td>
                <td>${insurancePolicy} </td>
                <td>${grossWeight}</td>
                <td> ${vin}</td>
                <td>${dotexpiryDate}</td>
                <td>${transponder} </td>
                <td>${internalNotes}</td>
                <td style='width: 100px'><a class='button-23 edit_truck_data "+editPrivilege+"'  title='Edit'  data-truckId='${id}' data-com_Id='${masterID}' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 button-23 delete_truck_data' data-id='$userEmail' title='Delete' data-truckId='${id}' data-com_Id='${masterID}'><i class='fe fe-delete'></i></a></td>`
                tr += `</tr>`;
                row = tr + row;
            }
            
        }
        $("#truckTable").html(row);
    }
    function createTruckTypeList(truckTypeResponse) {           
        var TruckTypeLength = 0; 
        if (truckTypeResponse != null) {
            TruckTypeLength = truckTypeResponse.truck.length;
        }
    
        if (TruckTypeLength > 0) {
            $(".truckTypeSet").html('');
            var dataop="<option class='truckType' value='unselected' >----select-----</option>"
           
            for ( var i = TruckTypeLength-1; i >= 0; i--) {  
                var truckType =truckTypeResponse.truck[i].truckType;
                var truckTypeId =truckTypeResponse.truck[i]._id;
                dataop+="<option class='truckType' value='"+truckTypeId+"'> "+truckType+" </option>"           
                
    
            }
            $(".truck_Type_Set").append(dataop);
            
        }
        
    }
       

    // <!-- ===================== over Get truck ===================== --> 
   

    // <!-- ======================= Add truck  ========================--> 
    $('#addTruckModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $('#truckSavebutton').click(function(){
        var trucktype='';
        var truck_number = $('#truck_number').val();
        var trucktype = $('#truckType').val();
        // var trucktypeId=trucktype[0];
        var license_plate =$('#license_plate').val();
        var plate_expiry =$('#plate_expiry').val();
        var inspection =$('#inspection').val();
        var status =$('#status').val();
        if ($("#ownership").is(":checked")) 
        {
            var ownership = 'CompanyTruck';
        } 
        else if ($("#Own").is(":checked")) 
        {
            var ownership = 'OwnerOperator';
        }
        else
        {
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
        if( $('#ifta').is(':checked') )
        {
            var ifta = " IFTA Truck";
        } 
        else 
        {
            var ifta = "NOT IFTA Truck";
        }
        var internal_note =$('#internal_note').val(); 
        if(truck_number=='')
        {
            swal.fire( "'Enter truck number");
            $('#truck_number').focus();
            return false;            
        } 
        // alert(trucktype);
        if(trucktype=='unselected')
        {
            swal.fire( "'Select truck Type from dropdown menu");
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
        if(ownership=='')
        {
            swal.fire( "'Select ownership");
            return false;
        }
        if(vin=='')
        {
            swal.fire( "'Enter VIN");
            return false;
        }
        var formData = new FormData();

        $.each($("#files")[0].files, function(i, file) {            
            formData.append('file[]', file);
        });

        formData.append('_token',$("#_tokenTruck").val());
        formData.append('truck_number',truck_number.trim());
        formData.append('trucktype',trucktype);
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
                swal.fire("Done!", "Truck added successfully", "success");
                $('#addTruckModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/getTruck",
                    async: false,
                    success: function(text) {
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processTruckTable(res[0]);
                            $("#truck_pagination").html(paginateList(res[1], "admin", "paginatetruck", "processTruckTable"));
                            renameTableSeq("truckTable", "page_active");
                        }
                        // console.log(text);
                        // createGetTruckRows(text);
                        // truckResult = text;
                     }
                });
            }
        });
    });
    // ==============================over add truck ====================== 
    // ===================function  ====================================== 
    
  
  


    //=============-End=================================================== 

    //========================= start edit truck modal=====================

    $(".closeEditTruckModal").click(function(){
        $("#editTruckModal").modal("hide");
    });
    $('#editTruckModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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
                var plate_expiry=response.truck.plateExpiry;
                var inspectionExpiration= response.truck.inspectionExpiry;
                var activationDate= response.truck.deactivationDate;
                var startDate=response.truck.startDate;
                var dotexpiryDate= response.truck.dotexpiryDate;
                 var months_arr = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                 if(plate_expiry !== false)
                 {
                     var date_plate_expiry = new Date(plate_expiry*1000);
                    var year_plate_expiry = date_plate_expiry.getFullYear();
                    var month_plate_expiry = months_arr[date_plate_expiry.getMonth()];
                    var day_plate_expiry = date_plate_expiry.getDate();
                    if(day_plate_expiry <=9 )
                    {
                        var plate_expiry = year_plate_expiry+'-0'+day_plate_expiry+'-'+month_plate_expiry;
                    }
                    else
                    {
                        var plate_expiry = year_plate_expiry+'-'+month_plate_expiry+'-'+day_plate_expiry;
                    }
                 }
                if(startDate !==false)
                {
                     var date_startDate = new Date(startDate*1000);
                    var year_startDate = date_startDate.getFullYear();
                    var month_startDate = months_arr[date_startDate.getMonth()];
                    var day_startDate = date_startDate.getDate();
                    if(day_startDate <=9 )
                    {
                        var startDate = year_startDate+'-0'+day_startDate+'-'+month_startDate;
                    }
                    else
                    {
                        var startDate = year_startDate+'-'+month_startDate+'-'+day_startDate;
                    }
                }
                if(inspectionExpiration !== false)
                {
                    var date_inspectionExpiration = new Date(inspectionExpiration*1000);
                    var year_inspectionExpiration = date_inspectionExpiration.getFullYear();
                    var month_inspectionExpiration = months_arr[date_inspectionExpiration.getMonth()];
                    var day_inspectionExpiration = date_inspectionExpiration.getDate();
                    if(day_inspectionExpiration <=9 )
                    {
                        var inspectionExpiration = year_inspectionExpiration+'-0'+day_inspectionExpiration+'-'+month_inspectionExpiration;
                    }
                    else
                    {
                        var inspectionExpiration = year_inspectionExpiration+'-'+month_inspectionExpiration+'-'+day_inspectionExpiration;
                    }
                }
                if(activationDate !== false)
                {
                    var date_activationDate = new Date(activationDate*1000);
                    var year_activationDate = date_activationDate.getFullYear();
                    var month_activationDate = months_arr[date_activationDate.getMonth()];
                    var day_activationDate = date_activationDate.getDate();
                    if(day_activationDate <=9 )
                    {
                        var activationDate = year_activationDate+'-0'+day_activationDate+'-'+month_activationDate;
                    }
                    else
                    {
                        var activationDate = year_activationDate+'-'+month_activationDate+'-'+day_activationDate;
                    }
                }
                
                var date_dotexpiryDate = new Date(dotexpiryDate*1000);
                if( dotexpiryDate!==false)
                {
                    var date_dotexpiryDate = new Date(dotexpiryDate*1000);
                    var year_dotexpiryDate = date_dotexpiryDate.getFullYear();
                    var month_dotexpiryDate = months_arr[date_dotexpiryDate.getMonth()];
                    var day_dotexpiryDate = date_dotexpiryDate.getDate();
                    if(day_dotexpiryDate <=9 )
                    {
                        var dotexpiryDate = year_dotexpiryDate+'-0'+day_dotexpiryDate+'-'+month_dotexpiryDate;
                    }
                    else
                    {
                        var dotexpiryDate = year_dotexpiryDate+'-'+month_dotexpiryDate+'-'+day_dotexpiryDate;
                    }
                }
                

                $("#comp_id_truck_edit").val(response.companyID);
                $("#truck_id").val(response.truck._id);
                $("#edit_truck_number").val(response.truck.truckNumber);
                $("#editTruckType").val(response.truck.truckType);
                $("#edit_truck_license_plate").val(response.truck.licensePlate);
                $("#edit_truck_plate_expiry").val(plate_expiry);
                $("#edit_truck_inspection").val(inspectionExpiration);
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
                $("#edit_truck_start_date").val(startDate);
                $("#edit_truck_deactivation").val(activationDate);
                $("#edit_truck_RegisteredState").val(response.truck.registeredState);
                $("#edit_truck_Insurance_Policy").val(response.truck.insurancePolicy);
                $("#edit_truck_gross").val(response.truck.grossWeight);
                $("#edit_truck_vin").val(response.truck.vin);
                $("#edit_truck_dot").val(dotexpiryDate);
                $("#edit_truck_transponder").val(response.truck.transponder);
                if(response.truck.ifta =="IFTA Truck")
                {
                        $("#edit_truck_ifta").attr('checked',true);
                }
                else
                {
                        $("#edit_truck_ifta").attr('checked',false);
                }
                $("#edit_truck_internal_note").val(response.truck.internalNotes);
            }
        });        
        $("#editTruckModal").modal("show");
    });
    $(".truckUpdateButton").click(function(){
        var ownership="";
        var id=$("#truck_id").val();
        var companyID= $("#comp_id_truck_edit").val();
        var truckNumber= $("#edit_truck_number").val();
        var truckType= $("#editTruckType").val();
        var licensePlate= $("#edit_truck_license_plate").val();
        var plateExpiry= $("#edit_truck_plate_expiry").val();
        var inspectionExpiry= $("#edit_truck_inspection").val();
        var status= $("#edit_truck_status").val();
        var ownership=$('input[name=ownership]:radio:checked').val();
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
        if(truckType=='unselected')
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
                    success: function(text) {
                        // console.log(text);
                        // createGetTruckRows(text);
                        // truckResult = text;
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processTruckTable(res[0]);
                            $("#truck_pagination").html(paginateList(res[1], "admin", "paginatetruck", "processTruckTable"));
                            renameTableSeq("truckTable", "page_active");
                        }
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
                                // createGetTruckRows(text);
                                // truckResult = text;
                                var res = JSON.parse(text);
                                if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                                    processTruckTable(res[0]);
                                    $("#truck_pagination").html(paginateList(res[1], "admin", "paginatetruck", "processTruckTable"));
                                    renameTableSeq("truckTable", "page_active");
                                }
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
			// console.log(truckIds);
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
                        // createGetTruckRows(text);
                        // truckResult = text;
                        var res = JSON.parse(text);
                        if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                            processTruckTable(res[0]);
                            $("#truck_pagination").html(paginateList(res[1], "admin", "paginatetruck", "processTruckTable"));
                            renameTableSeq("truckTable", "page_active");
                        }
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