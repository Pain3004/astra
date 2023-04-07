var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var base_path = $("#url").val();

$('.closeAddOwnerModal').click(function(){
    $('#addDriverOwnerModal').modal('hide');
});


(function() {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

   
  
  
// <!-- ------------------------------------------------------------------------- driver ------------------------------------------------------------------------- -->
$('.closeAddDriverModal').click(function(){
    $("#addLoadBoardModal").css("z-index","100000000000");
    $('#RecurrenceCategoryModal').modal('hide');
    $('#addDriverModal').modal('hide');
});
$(document).ready(function() {
    var driverResponse = '';

// <!-- -------------------------------------------------------------------------Get driver ajax ------------------------------------------------------------------------- -->    
$.ajax({
    type: "GET",
    url: base_path+"/admin/driver",
    async: false,
    success: function(text) {
        createDriverRows(text);
        driverResponse = text;
    }
});

    function createDriverRows(driverResponse) {
        var len1 = 0;
        
        $('#driverTable').empty(); 
        // if (driverResponse != null) {
        //     len1 = driverResponse.length;
        // }
// alert(len1);
        // if (len1 > 0) {
           var no=1;
                // for (var i = 0; i < len1; i++) {  
                var len2=driverResponse.driver.length; 
                    // if(len2 > 0){
                        for (var j = 0; j < len2; j++) {
                        var comid =driverResponse.companyID;
                        var driverId=driverResponse.driver[j]._id;
                        var name = driverResponse.driver[j].driverName;
                        var email = driverResponse.driver[j].driverEmail;
                        var location = driverResponse.driver[j].driverAddress;
                        var social_security_no = driverResponse.driver[j].driverSocial;
                        var date_of_birth = driverResponse.driver[j].dateOfbirth;
                        var date_of_hire = driverResponse.driver[j].dateOfhire;
                        var license_no = driverResponse.driver[j].driverLicenseNo;
                        var lis = driverResponse.driver[j].driverLicenseIssue;
                        var license_exp_date = driverResponse.driver[j].driverLicenseExp;
                        var driver_balance = driverResponse.driver[j].driverBalance;
                        var delete_status = driverResponse.driver[j].deleteStatus;
                        var ownerOperatorStatus =driverResponse.driver[j].ownerOperatorStatus;
                        var ownerOperatorDeleteStatus =driverResponse.driver[j].ownerOperatorDeleteStatus;

                        if(delete_status=="NO"){
                            
                            if(ownerOperatorStatus == 'YES'){
                                var actionBtnOwnerOperator= "<a class='editDriver button-23 edit'  title='Edit' data-id=" + comid+ "&"+email + "><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23' data-id=" + comid+ "&"+email + " title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='removeDriverOwner button-23 '  title='Remove Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" ><i class='fe fe-user-x'></i></a>"+
                                    "<a class='editDriverOwner button-23 '  title='Edit Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" ><i class='fe fe-edit'></i></a>&nbsp";
                                // $('.addDriverOwner').addClass('btn-danger');
                            }
                            else if(ownerOperatorStatus == 'NO' && ownerOperatorDeleteStatus == 'NO'){
                                var actionBtnOwnerOperator="<a class='editDriver button-23 edit'  title='Edit' data-id=" + comid+ "&"+email + "><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23' data-id=" + comid+ "&"+email + " title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='addDriverOwner button-23'  title='Add As Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" ><i class='fe fe-user-plus'></i></a>&nbsp";
                                // $('.addDriverOwner').addClass('btn-success');
                            }else if(ownerOperatorDeleteStatus == 'YES'){
                                var actionBtnOwnerOperator="<a class='editDriver button-23 edit'  title='Edit' data-id=" + comid+ "&"+email + "><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23' data-id=" + comid+ "&"+email + " title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='restoreDriverOwner button-23'  title='Restore As Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" ><i class='fe  fe-user-plus'></i></a>&nbsp";

                            }
                        var tr_str1 = "<tr data-id=" + (j + 1) + ">" +
                            "<td data-field='no'>" + no  + "</td>" +
                            "<td data-field='name' >" + name + "</td>" +
                            "<td data-field='email'>" + email + "</td>" +
                            "<td data-field='location'>" + location + "</td>" +
                            "<td data-field='social_security_no'>" + social_security_no + "</td>" +
                            "<td data-field='date_of_birth'>" + date_of_birth + "</td>" +
                            "<td data-field='date_of_hire'>" + date_of_hire + "</td>" +
                            "<td data-field='license_no'>" + license_no + "</td>" +
                            "<td data-field='lis'>" + lis + "</td>" +
                            "<td data-field='license_exp_date'>" + license_exp_date + "</td>" +
                            "<td data-field='driver_balance'>" + driver_balance + "</td>" +
                            "<td  style='display:flex'>"+actionBtnOwnerOperator +"</td></tr>";
                        $("#driverTable").append(tr_str1);
                        no++;
                        }
                    } 
                // }
            // }
        // } else {
        //     var tr_str1 = "<tr data-id=" + i + ">" +
        //         "<td align='center' colspan='4'>No record found.</td>" +
        //         "</tr>";

        //     $("#driverTable").append(tr_str1);
        // }
        drivermodal();
    }

    $('.editModalCloseButton').click(function(){
        $('#editDriverModal').modal('hide');
        // $('#driverModal').modal('show');  
    });
    
    $('#editDriverModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    
    $('.addDriverOwnerModalCloseButton').click(function(){
        $('#addDriverOwnerModal').modal('hide');
        // $('#driverModal').modal('show');
    });
    
    $('#addDriverOwnerModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    
    $('.editDriverOwnerModalCloseButton').click(function(){
        $('#editDriverOwnerModal').modal('hide');
        // $('#driverModal').modal('show');
    });
    
    $('#addDriverOwnerModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    
    $('.addDriverOwner').click(function(){
        var name =$(this).data('name');
        $('#owner-driver-name').val(atob(name));
    
        var driver_id =$(this).data('id');
        $('#driverid').val(driver_id);
    
        // console.log(atob(name));
        $('#addDriverOwnerModal').modal('show');  
    });
// $('.addDriverOwner').click(function(){
//     var name =$(this).data('name');
//     $('#owner-driver-name').val(atob(name));

//     var driver_id =$(this).data('id');
//     $('.driver-id').val(driver_id);

//     // console.log(atob(name));
//     $('#addDriverOwnerModal').modal('show');  
// });



// $('#driver_navbar').click(function(){
//     $.ajax({
//         type: "GET",
//         url: base_path+"/admin/driver",
//         async: false,
//         success: function(text) {
//             createDriverRows(text);
//             driverResponse = text;
//         }
//     });
//     $('#driverModal').modal('show');  
// });




// <!--------------------------------------------------------------------------- end of get driver  --------------------------------------------------------------------------->
//--------------------------------------------------------------remove (delete) driver owner modal------------------------------------------------------------------------    
$('body').on('click',function() {
    $(".restoreDriverOwner").on("click", function(){
            //alert();
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            var name=atob(name);
           
            swal.fire({
                title: "Restore?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, Restore it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
        
                if (e.value === true) {
                    $.ajax({ 
                    url: base_path+"/admin/restoreDriverOwnerOperator",
                    data: {id: id,name: name,_token: $(".laravel_csrf_tokn").val(),},
                    type: 'post',
                    success: function(resp){
                        if (resp.success === true) {
                            swal.fire("Done!", resp.message, "success");
                            $.ajax({
                                type: "GET",
                                url: base_path+"/admin/driver",
                                async: false,
                                success: function(text) {
                                    createDriverRows(text);
                                    driverResponse = text;
                                }
                            });
                        } else {
                            swal.fire("Error!", resp.message, "error");
                        }
                        },
                        error: function (resp) {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
            return false;
            });
        });
    });
    // ------------------------------------------------------------------over remove (delete) driver owner modal------------------------------------------------------------------------    
// ------------------------------------------------------------------remove (delete) driver owner modal------------------------------------------------------------------------    
$('body').on('click',function() {
    $(".removeDriverOwner").on("click", function(){
      
            var id = $(this).attr("data-id");
            var name = $(this).attr("data-name");
            var name=atob(name);
        
            swal.fire({
                title: "Delete?",
                text: "Please ensure and then confirm!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {
        
                if (e.value === true) {
                    $.ajax({ 
                    url: base_path+"/admin/deleteDriverOwnerOperator",
                    data: {id: id,name: name,_token: $(".laravel_csrf_tokn").val(),},
                    type: 'post',
                    success: function(resp){
                        if (resp.success === true) {
                            swal.fire("Done!", resp.message, "success");
                            $.ajax({
                                type: "GET",
                                url: base_path+"/admin/driver",
                                async: false,
                                success: function(text) {
                                    createDriverRows(text);
                                    driverResponse = text;
                                }
                            });
                        } else {
                            swal.fire("Error!", resp.message, "error");
                        }
                        },
                        error: function (resp) {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
            return false;
            });
        });
    });
    // ------------------------------------------------------------------over remove (delete) driver owner modal------------------------------------------------------------------------    
    

// <!-- ------------------------------------------------------------------------- Owner driver application data  ------------------------------------------------------------------------- -->

   
  
  var OwnerOperatorblock = '<div class="optionBox ">'+
      '<div class="block">'+
          '<div class="row row-sm" id="OwnerOperatorContainer">'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">Category</label>'+
                      '<input type="text" class="form-control" name="installmentCategory[]" list="fixpaycat" placeholder=" Search here..." autocomplete="off" />'+
                  '</div>'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">Installment Type</label>'+
                          '<select name="installmentType[]" class="form-control">'+
                              '<option value="">Select type</option>'+
                              '<option value="Weekly">Weekly</option>'+
                              '<option value="Monthly">Monthly</option>'+
                              '<option value="yearly">Yearly</option>'+
                              '<option value="Quarterly">Quarterly</option>'+
                          '</select>'+
                  '</div>'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">Amount</label>'+
                      '<input name="amount[]" type="text" class="form-control" />'+
                  '</div>'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">Installment</label>'+
                      '<input name="installment[]" type="text" class="form-control"  />'+
                  '</div>'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">start#</label>'+
                      '<input name="startNo[]" type="text" class="form-control"  />'+
                  '</div>'+
                  '<div class="col-sm-3">'+
                      '<label class="form-label" for="">start Date</label>'+
                      '<input name="startDate[]" type="date" class="form-control" />'+
                  '</div>'+
                  '<div class="col-sm-5">'+
                      '<label class="form-label" for="">Internal Note</label>'+
                      '<textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote[]"></textarea>'+
                  '</div>'+
                  '<div class="col-sm-1">'+
                      '<label class="form-label" for="">Delete</label>'+
                      
                  
                      '</button>'+
                  '</div>'+
                  '<!-- <input type="text" /> <span class="remove">Remove Option</span> -->'+
                  '<button type="button" class="btn btn-danger remove"><spanaria-hidden="true">&times;</span>'+
          '</div>'+
      '</div>'+
      '</div>'
  
  $('.add').click(function() {
      $(this).before(OwnerOperatorblock);
  });
  
  $(document).on('click','.remove',function() {
      $(this).parent('div').remove();
  });
  
  $('#submitOwnerOparator').click(function(){
  
      var ownerPercentage=$('#ownerPercentage').val();
      var ownerTruckNo=$('#ownerTruckNo').val();
      var driverId=$('#driverid').val();
     // alert(driverId);
      
  
      if(ownerPercentage == ''){
          // alert("Enter Percentage");
           swal.fire("Error!", "Enter Percentage", "error");
          // swal({title: 'Please Enter Date Of Birth',text: 'Redirecting...',timer: 1500,buttons: false,})
          
          $("#ownerPercentage").focus();
          return false;
      }
      if(ownerTruckNo == ''){
          // alert("Enter Truck No");
          swal.fire("Error!", "Enter Truck No", "error");
         // swal({title: 'Please Enter Date Of Birth',text: 'Redirecting...',timer: 1500,buttons: false,})
         $("#ownerTruckNo").focus();
         return false;
     }
  
      $.ajax({
          type: "POST",
          url: base_path+"/admin/addOwnerOparator",
          dataType: 'json',
          data: {
                  'data':$('#addOwnerForm').serialize(),
                  '_token': $(".laravel_csrf_tokn").val(),
                  'driverId':driverId,
              },  
          success: function(text) {
              swal.fire("Done!", 'Add As Owner Oparator', "success");
  
              $.ajax({
                  type: "GET",
                  url: base_path+"/admin/driver",
                  success: function(text) {
                      createDriverRows(text);
                      response = text;
                  }
              });	
  
              $('#addDriverOwnerModal').modal('hide');
              $('#driverModal').modal('show');
              
          }
      });
      
  });
  // <!-- ------------------------------------------------------------------------- end driver Owner data  ------------------------------------------------------------------------- -->
  // <!-- ------------------------------------------------------------------------- edit driver Owner  data  ------------------------------------------------------------------------- -->
  // $('body').on('click',function() {
  //     $('.editDriverOwner').click(function() {
  //         $('#editDriverOwnerModal').modal('show');
  //     });
  // });
  
  //$(document).ready(function(){
  
  
  $('body').on('click',function() {
      $('.editDriverOwner').click(function(){
        
          // alert();
          var id = $(this).attr("data-id");
          $.ajax({
              url: base_path+"/admin/editDriverOwner",
              type: "POST",
              datatype:"JSON",
              data: {'_token': $("#driver_csrf").val(),'id': id},
              success: function(dataResult) {
                  $('.up_optionBox').empty(); 
                  $('.optionBox').empty(); 
                  // console.log(dataResult);
                  $('#up_ownerid').val(dataResult[0]._id);
                  $('#up_driverid').val(dataResult[0].driverId);
                  $('#up_owner-driver-name').val(dataResult[1]);
                  $('#up_ownerPercentage').val(dataResult[0].percentage);
                  $('#up_ownerTruckNo').val(dataResult[0].truckNo);
              
                  $array=dataResult[0].installment;
                  //alert($array.length)
                  
                  $.each($array, function(index,value) {
                      // alert($array[index]['installmentCategory']);
  
                      var _id =$array[index]['_id'];
                      var installmentCategory =$array[index]['installmentCategory'];
                      var installmentType =$array[index]['installmentType'];
                      var amount =$array[index]['amount'];
                      var installment =$array[index]['installment'];
                      var startNo =$array[index]['startNo'];
                      var startDate =$array[index]['startDate'];
                      var internalNote =$array[index]['internalNote'];
                      
                      $(".up_optionBox").append('<div>'+
                                              '<div class="block">'+
                                                  '<div class="row row-sm" id="up_OwnerOperatorContainer">'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">Category</label>'+
                                                          '<input type="text" class="form-control" name="up_installmentCategory[]" list="fixpaycat" placeholder=" Search here..." autocomplete="off" value="'+installmentCategory +'"/>'+
                                                      '</div>'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">Installment Type</label>'+
                                                              '<select name="up_installmentType[]" class="form-control test_test ">'+
                                                                  '<option value="">Select type</option>'+
                                                                  '<option value="Weekly">Weekly</option>'+
                                                                  '<option value="Monthly">Monthly</option>'+
                                                                  '<option value="yearly">Yearly</option>'+
                                                                  '<option value="Quarterly">Quarterly</option>'+
                                                              '</select>'+
                                                      '</div>'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">Amount</label>'+
                                                          '<input name="up_amount[]" type="text" class="form-control" value="'+amount +'"  />'+
                                                      '</div>'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">Installment</label>'+
                                                          '<input name="up_installment[]" type="text" class="form-control" value="'+installment +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">start#</label>'+
                                                          '<input name="up_startNo[]" type="text" class="form-control" value="'+startNo +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-3">'+
                                                          '<label class="form-label" for="">start Date</label>'+
                                                          '<input name="up_startDate[]" type="date" class="form-control" value="'+startDate +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-5">'+
                                                          '<label class="form-label" for="">Internal Note</label>'+
                                                          '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_internalNote[]">'+internalNote +'</textarea>'+
                                                      '</div>'+
                                                      '<div class="col-sm-1">'+
                                                          '<label class="form-label" for="">Delete</label>'+
                                                          
                                                          '</button>'+
                                                      '</div>'+
                                                      '<!-- <input type="text" /> <span class="remove">Remove Option</span> -->'+
                                                      '<button type="button" class="btn btn-danger remove"><spanaria-hidden="true">&times;</span>'+
                                                  '</div>'+
                                              '</div>'+
                                          '</div>'
                      );
  
                      $(".test_test").val(installmentType);
                      
                  });
               
                  $('#editDriverOwnerModal').modal('show'); 
              },
              error: function(data){
                  console.log(data);
                  //alert("rr"); php
              }
          });
      });
  
      
  });
//   });
  
  $('#up_submitOwnerOparator').click(function(){
    // alert();
    var ownerId =$('#up_ownerid').val();
    var driverId=$('#up_driverid').val();

    // alert(ownerId);
    // alert(driverId);


    $.ajax({
        type: "POST",
        url: base_path+"/admin/updateOwnerOparator",
        dataType: 'json',
        data: {
                'data':$('#up_addOwnerForm').serialize(),
                '_token': $(".laravel_csrf_tokn").val(),
                'ownerId':ownerId,
                'driverId':driverId,
            },  
        success: function(text) {
            swal.fire("Done!", 'UpdateOwner Oparator', "success");
            $("#editDriverOwnerModal").modal('hide');
            $.ajax({
                type: "GET",
                url: base_path+"/admin/driver",
                success: function(text) {
                    createDriverRows(text);
                    driverResponse = text;
                }
            });
            
        }
    });
});
  
  
  // <!-- ------------------------------------------------------------------------- end editOwner driver  data  ------------------------------------------------------------------------- -->
// <!-- ------------------------------------------------------------------------- add driver  ------------------------------------------------------------------------- -->

      $('.driverDataSubmit').click(function(){   
            var companyID = 4;
            var name = $('#name').val();
            var username = $('#username').val();
            var address = $('#address').val();
            var telephone = $('#telephone').val();
            var altTelephone = $('#altTelephone').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var location = $('#location').val();
            var zip = $('#zip').val();
            var status = $('#status').val();
            var socialSecurityNo = $('#socialSecurityNo').val();
            var dateOfBirth = $('#dateOfBirth').val();
            var dateOfHire = $('#dateOfHire').val();
            var licenseNo = $('#licenseNo').val();
            var licenseIssueState = $('#licenseIssueState').val();
            var licenseExpDate = $('#licenseExpDate').val();
            var lastMedical = $('#lastMedical').val();
            var nextMedical = $('#nextMedical').val();
            var lastDrugTest = $('#lastDrugTest').val();
            var nextDrugTest = $('#nextDrugTest').val();
            var passportExpiry = $('#passportExpiry').val();
            var fastCardExpiry = $('#fastCardExpiry').val();
            var hazmatExpiry = $('#hazmatExpiry').val();
            var rate = $('#rate').val();
            var currency = $('#currency_add').val();
            console.log(currency);
            var recurrencePlus = $('#recurrencePlus').val();
            var recurrenceMin = $('#recurrenceMin').val();
            var terminationDate = $('#terminationDate').val();
            var driverBalance = $('#driverBalance').val();
            var internalNotes = $('#internalNotes').val();   
            var loadedMiles = $('#loadedmiles').val();   
            var emptyMiles = $('#emptymiles').val();   
            var pickRate = $('#pickrate').val();   
            var pickStart = $('#pickstart').val();   
            var dropRate = $('#droprate').val();   
            var dropStart = $('#dropstart').val();   
            var driverTarp = $('#driverTarp').val();   
            var percentage = $('#dPercentage').val();   
            var tr_length1 = $("#driverModal").find("tr").length;
            var tr_str4 = "<tr data-id=" + tr_length1 + ">" +
                            "<td data-field='tr_length1'>" + tr_length1 + "</td>" +
                            "<td data-field='name' >" + name + "</td>" +
                            "<td data-field='email'>" + email + "</td>" +
                            "<td data-field='location'>" + location + "</td>" +
                            "<td data-field='social_security_no'>" + socialSecurityNo + "</td>" +
                            "<td data-field='date_of_birth'>" + dateOfBirth + "</td>" +
                            "<td data-field='date_of_hire'>" + dateOfHire + "</td>" +
                            "<td data-field='license_no'>" + licenseNo + "</td>" +
                            "<td data-field='lis'>" + licenseIssueState + "</td>" +
                            "<td data-field='license_exp_date'>" + licenseExpDate + "</td>" +
                            "<td data-field='driver_balance'>" + driverBalance + "</td>" +
                            "<td style='display: inline-flex'>"+
                            "<i class='btn btn-primary fe fe-edit edit' data-id=" + companyID + "&"+ email + "></i>"+
                                // "<a class='editDriver mt-2 btn btn-primary fs-14 text-white edit' data-id=" + companyID + "&" + email + " title='Edit'><i class='fe fe-edit'></i></a>&nbsp"+
                                "<a class='deleteDriver mt-2 btn btn-danger fs-14 text-white  data-id=" + companyID + "&" + email + " title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                
                            "</td></tr>";    
        $.ajax({
            url: base_path+"/admin/addDriver",
            type: "POST",
            datatype:"JSON",
            data: {
                _token: $("#csrf").val(),
              companyID: companyID,
              name: name,
              username: username,
              address: address,
              telephone: telephone,
              altTelephone: altTelephone,
              email: email,
              password: password,
              location: location,
              zip: zip,
              status: status,
              socialSecurityNo: socialSecurityNo,
              dateOfBirth: dateOfBirth,
              dateOfHire: dateOfHire,
              licenseNo: licenseNo,
              licenseIssueState: licenseIssueState,
              licenseExpDate: licenseExpDate,
              lastMedical: lastMedical,
              nextMedical: nextMedical,
              lastDrugTest: lastDrugTest,
              nextDrugTest: nextDrugTest,
              passportExpiry: passportExpiry,
              fastCardExpiry: fastCardExpiry,
              hazmatExpiry: hazmatExpiry,
              rate: rate,
              currency: currency,
              recurrencePlus: recurrencePlus,
              recurrenceMin: recurrenceMin,
              terminationDate: terminationDate,
              driverBalance: driverBalance,
              internalNotes: internalNotes,
              driverLoadedMile: loadedMiles,
              driverEmptyMile: emptyMiles,
              pickupRate: pickRate,
              pickupAfter: pickStart,
              dropRate: dropRate,
              dropAfter: dropStart,
              tarp: driverTarp,
              percentage: percentage,
            },
            cache: false,
            success: function(resp){
                if(resp.success == true){
                    swal.fire("Done!", resp.message, "success");
                    // $("#driverTable").append(tr_str4);
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/driver",
                        async: false,
                        success: function(text) {
                            createDriverRows(text);
                            driverResponse = text;
                        }
                    });
                    $("#addDriverModal form").trigger("reset");
                } 
              },
              error: function(data){
                $.each( data.responseJSON.errors, function( key, value ) {
                    swal.fire("Error!", value[0], "error");
                });
                },
        });
        
    });
// <!-- ------------------------------------------------------------------------- end of add driver  ------------------------------------------------------------------------- -->

$('.setupDriverSubmit').click(function(){    
    var driverName = $('#drivername12').val();
    var sentVia = $('#sentvia').val();
    var driverEmail = $('#driveremail1').val();
    var driverNo = $('#textno').val();
$.ajax({
    url: base_path+"/admin/setupDriver",
    type: "POST",
    datatype:"JSON",
    data: {
        _token: $("#csrf").val(),
      driverName: driverName,
      sentVia: sentVia,
      driverEmail: driverEmail,
      driverNo: driverNo,
    },
    cache: false,
    success: function(resp){
        if(resp.success == true){
            swal.fire("Done!", resp.message, "success");
            $("#setupDriverModal form").trigger("reset");
        } 
      },
      error: function(data){
        $.each( data.responseJSON.errors, function( key, value ) {
            swal.fire("Error!", value[0], "error");
        });
        },
});

});

$(document).ready(function() {
    $(".contract_categoryModal").click(function(){
        var response = '';
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getContract",
            data: {
                companyID: 4,
            },
            async: false,
            success: function(text) {
                driverContract(text);
                response = text;
            }
        });
    });

});

function driverContract(driverResponse) {
    var len2 = 0;
    $('#accordion').empty(); 
    if (driverResponse != null) {
        len2 = driverResponse.length;
    }
        var no=1;
            var contract=driverResponse.contract;
            var len3=contract.length;
                if(len3 > 0){
                    
                    for (var j = 0; j < len3; j++) {
                    var comid =driverResponse.companyID;
                    var counter =driverResponse.counter;
                    var conttractid=driverResponse.contract[j]._id;
                    var heading=driverResponse.contract[j].heading;
                    var len4=driverResponse.contract[j].line.length; 
                    var str0 = '<div class="acc-card mb-4">'+
                                            '<div class="acc-header" id="heading'+no+'" role="tab">'+
                                                '<h5 class="mb-0">'+
                                                    '<a aria-controls="collapse'+no+'" aria-expanded="true" data-bs-toggle="collapse" href="#collapse'+no+'">'+heading+' <span class="float-end acc-angle"><i class="fe fe-chevron-right"></i></span></a>'+
                                                '</h5>'+
                                            '</div>'+
                                            '<div id="accordiondata'+no+'">'
                                            $("#accordion").append(str0);
                    if(len4 > 0){
                        for (var k = 0; k < len4; k++) {
                            var data=driverResponse.contract[j].line[k];                                                  
                    
                            var str2 =     '<div aria-labelledby="heading'+no+'" class="collapse" data-bs-parent="#accordion" id="collapse'+no+'" role="tabpanel">'+
                                                '<div class="acc-body">'+data+'</div>'+
                                            '</div>'+
                                        '</div>'
                                        '</div>';
                                        $("#accordiondata"+no).append(str2);
                                    }
                                }   
                                no++;
                } 
            }
            else {
               var str4 = '<div class="acc-card mb-4">No Contract</div>';
       
               $("#accordion").append(str4);
           }
    drivermodal();
}

// <!-- ------------------------------------------------------------------------- end of add driver  ------------------------------------------------------------------------- -->

$('.driverContractCategorySubmit').click(function(){            
    var companyID = 4;
    var k = new Array();
    var driverContractCategory = $('#contractCategory').val();
    var driverContractSubCategory = document.getElementsByName('driverContractSubCategory[]');
    for (var i = 0; i < driverContractSubCategory.length; i++) {
                var a = driverContractSubCategory[i];
                k[i] = a.value;
            }
$.ajax({
    url: base_path+"/admin/addDriverContractCategory",
    type: "POST",
    datatype:"JSON",
    data: {
        _token: $("#drivercsrf0").val(),
      companyID: companyID,
      driverContractCategory: driverContractCategory,
      driverContractSubCategory: k,
    },
    cache: false,
    success: function(resp){
        if(resp.success == true){
            swal.fire("Done!", resp.message, "success");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/getContract",
                data: {
                    companyID: 4,
                },
                async: false,
                success: function(text) {
                    driverContract(text);
                    response = text;
                }
            });
            $("#addContractCategory form").trigger("reset");
        } 
      },
      error: function(data){
        $.each( data.responseJSON.errors, function( key, value ) {
            swal.fire("Error!", value[0], "error");
        });
        },
});

});

$('.driverDataUpdate').click(function(){        
    var updateComId= $('#up_comId').val();
    var updateEmailDriver= $('#emaildriver').val();
    var updateDriverName= $('#up_name').val();
    var updateDriverUsername=$('#up_username').val();
    var updateDriverAddress=$('#up_address').val();
    var updateDriverTelephone=$('#up_telephone').val();
    var updateDriverAlt=$('#up_altTelephone').val();
    var updateDriverEmail=$('#up_email').val();
    var updateDriverPassword=$('#up_password').val();
    var updateDriverLocation=$('#up_location').val();
    var updateDriverZip=$('#up_zip').val();
    var updateDriverStatus=$('#up_status').val();
    var updateDriverSocial=$('#up_socialSecurityNo').val();
    var updateDateOfbirth=$('#up_dateOfBirth').val();
    var updateDateOfHire=$('#up_dateOfHire').val();
    var updateDriverLicenseNo=$('#up_licenseNo').val();
    var updateDriverLicenseIssue=$('#up_licenseIssueState').val();
    var updateDriverLicenseExp=$('#up_licenseExpDate').val();
    var updateDriverLastMedical=$('#up_lastMedical').val();
    var updateDriverNextMedical=$('#up_nextMedical').val();
    var updateDriverLastDrugTest=$('#up_lastDrugTest').val();
    var updateDriverNextDrugTest=$('#up_nextDrugTest').val();
    var updatePassportExpiry=$('#up_passportExpiry').val();
    var updateFastCardExpiry=$('#up_fastCardExpiry').val();
    var updateHazmatExpiry=$('#up_hazmatExpiry').val();
    var updateRate=$('#up_rate').val();
    var updateCurrency=$('#up_currency').val();
    var updateTerminationDate=$('#up_terminationDate').val();
    var updateDriverBalance=$('#up_driverBalance').val();
    var updateInternalNotes=$('#up_internalNotes').val();
    var updateloadedMiles = $('#loadedmilesedit').val();   
    var updateemptyMiles = $('#emptymilesedit').val();   
    var updatepickRate = $('#pickrateedit').val();   
    var updatepickStart = $('#pickstartedit').val();   
    var updatedropRate = $('#droprateedit').val();   
    var updatedropStart = $('#dropstartedit').val();   
    var updatedriverTarp = $('#driverTarpedit').val();   
    var updatepercentage = $('#dPercentageEdit').val();

    $.ajax({
        url:base_path+"/admin/updateDriver" ,
        type:'post',
        data:{
            _token:$("#driver_csrf").val(),
            updateComId:updateComId,
            updateEmailDriver:updateEmailDriver,
            updateDriverName: updateDriverName,
            updateDriverUsername: updateDriverUsername,
            updateDriverAddress: updateDriverAddress,
            updateDriverTelephone: updateDriverTelephone,
            updateDriverAlt: updateDriverAlt,
            updateDriverEmail: updateDriverEmail,
            updateDriverPassword: updateDriverPassword,
            updateDriverLocation: updateDriverLocation,
            updateDriverLocation: updateDriverLocation,
            updateDriverZip: updateDriverZip,
            updateDriverStatus: updateDriverStatus,
            updateDriverSocial: updateDriverSocial,
            updateDateOfbirth: updateDateOfbirth,
            updateDateOfHire: updateDateOfHire,
            updateDriverLicenseNo: updateDriverLicenseNo,
            updateDriverLicenseIssue: updateDriverLicenseIssue,
            updateDriverLicenseExp: updateDriverLicenseExp,
            updateDriverLastMedical: updateDriverLastMedical,
            updateDriverNextMedical: updateDriverNextMedical,
            updateDriverLastDrugTest: updateDriverLastDrugTest,
            updateDriverNextDrugTest: updateDriverNextDrugTest,
            updatePassportExpiry: updatePassportExpiry,
            updateFastCardExpiry: updateFastCardExpiry,
            updateHazmatExpiry: updateHazmatExpiry,
            updateRate: updateRate,
            updateCurrency: updateCurrency,
            updateTerminationDate: updateTerminationDate,
            updateDriverBalance: updateDriverBalance,
            updateInternalNotes: updateInternalNotes,
            driverLoadedMile: updateloadedMiles,
            driverEmptyMile: updateemptyMiles,
            pickupRate: updatepickRate,
            pickupAfter: updatepickStart,
            dropRate: updatedropRate,
            dropAfter: updatedropStart,
            tarp: updatedriverTarp,
            percentage: updatepercentage,
        } ,
        success: function(response){
            var responsenew = JSON.parse(response);
            if(responsenew.statusCode===200){
                swal.fire("Done!", responsenew.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/driver",
                    success: function(text) {
                        createDriverRows(text);
                        response = text;
                    }
                });			
            }
          },
          error: function(data){
            $.each( data.responseJSON.errors, function( key, value ) {
                swal.fire("Error!", value[0], "error"); 
            });
        }            
    });
});

});

function drivermodal()
{
    $(document).ready(function(){
        $('.edit').click(function(){
            var id = $(this).attr("data-id");
            var result = $(this).attr("data-id").split('&');
            var com_id=result[0];
            var email=result[1];
            $.ajax({
                url: base_path+"/admin/editDriver",
                type: "POST",
                datatype:"JSON",
                data: {_token: $("#driver_csrf").val(),com_id: com_id,email: email},
                cache: false,
                success: function(dataResult){
                    $('#up_comId').val(com_id);
                    $('#emaildriver').val(email);
                    $('#up_name').val(dataResult.driverName);
                    $('#up_username').val(dataResult.driverUsername);
                    $('#up_address').val(dataResult.driverAddress);
                    $('#up_telephone').val(dataResult.driverTelephone);
                    $('#up_altTelephone').val(dataResult.driverAlt);
                    $('#up_email').val(dataResult.driverEmail);
                    $('#up_location').val(dataResult.driverLocation);
                    $('#up_zip').val(dataResult.driverZip);
                    $('#up_status').val(dataResult.driverStatus);
                    $('#up_socialSecurityNo').val(dataResult.driverSocial);
                    $('#up_dateOfBirth').val(dataResult.dateOfbirth);
                    $('#up_dateOfHire').val(dataResult.dateOfHire);
                    $('#up_licenseNo').val(dataResult.driverLicenseNo);
                    $('#up_licenseIssueState').val(dataResult.driverLicenseIssue);
                    $('#up_licenseExpDate').val(dataResult.driverLicenseExp);
                    $('#up_lastMedical').val(dataResult.driverLastMedical);
                    $('#up_nextMedical').val(dataResult.driverNextMedical);
                    $('#up_lastDrugTest').val(dataResult.driverLastDrugTest);
                    $('#up_nextDrugTest').val(dataResult.driverNextDrugTest);
                    $('#up_passportExpiry').val(dataResult.passportExpiry);
                    $('#up_fastCardExpiry').val(dataResult.fastCardExpiry);
                    $('#up_hazmatExpiry').val(dataResult.hazmatExpiry);
                    $('#up_rate').val(dataResult.rate);
                    $('#up_currency').val(dataResult.currency);
                    $('#up_terminationDate').val(dataResult.terminationDate);
                    $('#up_driverBalance').val(dataResult.driverBalance);
                    $('#up_internalNotes').val(dataResult.internalNotes);
                    $('#dPercentageEdit').val(dataResult.percentage);
                    $('#loadedmilesedit').val(dataResult.driverLoadedMile);
                    $('#emptymilesedit').val(dataResult.driverEmptyMile);
                    $('#pickrateedit').val(dataResult.pickupRate);
                    $('#pickstartedit').val(dataResult.pickupAfter);
                    $('#droprateedit').val(dataResult.dropRate);
                    $('#dropstartedit').val(dataResult.dropAfter);
                    $('#driverTarpedit').val(dataResult.tarp);
                   
                    $('#editDriverModal').modal('show'); 
                }
            });
        });
    });
// ------------------------------------------------------------------delete driver-------------------------------------------------------------------------    
    $(".deleteDriver").on("click", function(){
        var rowToDelete = $(this).closest('tr');
        var id = $(this).attr("data-id");
        var result = $(this).attr("data-id").split('&');
        var com_id=result[0];
        var email=result[1];
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

        if (e.value === true) {
        $.ajax({ 
          url: base_path+"/admin/deleteDriver",
          data: {com_id: com_id,email: email},
          type: 'post',
          success: function(resp){
            if (resp.success === true) {
				swal.fire("Done!", resp.message, "success");
                rowToDelete.remove();
			} else {
				swal.fire("Error!", resp.message, "error");
			}
		},
		error: function (resp) {
			swal.fire("Error!", 'Something went wrong.', "error");
		}
        });
    } else {
        e.dismiss;
    }

}, function (dismiss) {
    return false;
})
    });
// ------------------------------------------------------------------over delete driver-------------------------------------------------------------------------    
// ------------------------------------------------------------------ driver owner modal------------------------------------------------------------------------    

    $('.addDriverOwner').click(function(){
        var name =$(this).data('name');
        $('#owner-driver-name').val(atob(name));
        // console.log(atob(name));

        var driver_id =$(this).data('id');
        $('.driver-id').val(driver_id);
        // console.log(driver_id);

        $('#addDriverOwnerModal').modal('show');  
    });
    


}
// ------------------------------------------------------------------ driver owner modal------------------------------------------------------------------------    
$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('#field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="form-group col-md-8"><input type="text" name="driverContractSubCategory[]" class="form-control driverContractSubCategory"/><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus" aria-hidden="true"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});


// <!-- ------------------------------------------------------------------------- end of driver ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------  view driver application data  ------------------------------------------------------------------------- -->


$(document).ready(function() {

        $.ajax({
            type: "GET",
            url: base_path+"/admin/viewDriverApplication",
            async: false,
            success: function(data) {
                createviewDriverApplicationRows(data);
                viewDriverApplicationResponse = data;
            }
        });

        function createviewDriverApplicationRows(viewDriverApplicationResponse) {i

            // console.log(viewDriverApplicationResponse);
            var len1 = 0;
            
            $('#viewDriverApplicationTable').empty(); 
            if (viewDriverApplicationResponse != null) {
                len1 = viewDriverApplicationResponse.application.length;
            }

            if (len1 > 0) {
                var no=1;
                    for (var i = 0; i < len1; i++) {  
                            var applicant_name=viewDriverApplicationResponse.application[i].applicant_info.applicant_name;
                            var applicationDate=viewDriverApplicationResponse.application[i].applicant_info.date_of_application;
                            var Email=viewDriverApplicationResponse.application[i].applicant_info.email;
                            var Contact=viewDriverApplicationResponse.application[i].applicant_info.telephone;
                            var id = viewDriverApplicationResponse.application[i]._id;

                            var tr_str1 = "<tr data-id=" + (i + 1) + ">" +
                                "<td data-field='no'>" + no + "</td>" +
                                "<td data-field='driverName' >" + applicant_name + "</td>" +
                                "<td data-field='applicationDate'>" + applicationDate + "</td>" +
                                "<td data-field='Email'>" + Email + "</td>" +
                                "<td data-field='Contact'>" + Contact + "</td>" +
                                "<td data-field='Status'> <select style='width: auto;'><option value='0'>Select Status</option><option value='accept'>Accept</option><option value='decline'>Decline</option></select> </td>" +
                                "<td style='display: inline-flex;'>"+
                                    "<a class='editViewDriverApp mt-2 btn btn-primary fs-14 text-white '  title='Edit'><i class='fe fe-edit edit'></i></a>&nbsp"+
                                    "<a class='deleteViewDriverApp mt-2 btn btn-danger fs-14 text-white delete-icn'  title='Delete' data-Id='"+id +"'><i class='fe fe-delete'></i></a> &nbsp"+
                                "</td></tr>";
                            $("#viewDriverApplicationTable").append(tr_str1);
                            no++;
                     
                    }
            } else {
                var tr_str1 = "<tr data-id=" + i + ">" +
                    "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";

                $("#viewDriverApplicationTable").append(tr_str1);
            }
            drivermodal();
        }
// <!-- ------------------------------------------------------------------------- end view driver application data  ------------------------------------------------------------------------- -->

    $('.editModalCloseButton').click(function(){
        $('#editDriverModal').modal('hide');
        $('#driverModal').modal('show');  
    });

    // ------------------------------------------------------------------delete driver-------------------------------------------------------------------------    
    $(".deleteViewDriverApp").on("click", function(){
            var rowToDelete = $(this).closest('tr');
            var id = $(this).attr("data-id");
          
            swal.fire({
                title: "Are You Sure?",
                text: "Once deleted, you will not be able to recover this Driver Application!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    $.ajax({ 
                    url: base_path+"/admin/deleteViewDriverApp",
                    data: {id: id,_token: $(".laravel_csrf_tokn").val()},
                    type: 'post',
                        success: function(resp){
                            if (resp.success === true) {
                                swal.fire("Done!", resp.message, "success");
                                rowToDelete.remove();
                            } else {
                                swal.fire("Error!", resp.message, "error");
                            }
                        },
                        error: function (resp) {
                            swal.fire("Error!", 'Something went wrong.', "error");
                        }
                    });
                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
    });
// ------------------------------------------------------------------over delete driver-------------------------------------------------------------------------    


});

// <!-- ------------------------------------------------------------------------- end view driver application data  ------------------------------------------------------------------------- -->


// <!-- -------------------------------------------------------------------------Get Company ajax ------------------------------------------------------------------------- -->    
    $.ajax({
        type: "GET",
        url: base_path+"/admin/company",
        async: false,
        success: function(text) {
            createCompanyRows(text);
            companyResponse = text;
        }
    });

    function createCompanyRows(companyResponse) {
        var len1 = 0;
        
        $('#companyTable').empty(); 
        if (companyResponse != null) {
            len1 = companyResponse.length;
        }
        
        if (len1 > 0) {
           var no=1;
           for (var i = 0; i < len1; i++) {  
               var len2=companyResponse[i].company.length; 

                    if(len2 > 0){
                        for (var j = 0; j < len2; j++) {
                        var comid =companyResponse[i].companyID;
                        var companyId=companyResponse[i].company[j]._id;
                        var companyName = companyResponse[i].company[j].companyName;
                        var shippingAddress = companyResponse[i].company[j].shippingAddress;
                        var telephoneNo = companyResponse[i].company[j].telephoneNo;
                        var faxNo = companyResponse[i].company[j].faxNo;
                        var mcNo = companyResponse[i].company[j].mcNo;
                        var usDotNo = companyResponse[i].company[j].usDotNo;
                        var mailingAddress = companyResponse[i].company[j].mailingAddress;
                        var factoringCompany = companyResponse[i].company[j].factoringCompany;
                        var bankCompany = companyResponse[i].company[j].bankCompany;
                        if (companyResponse[i].company[j].file != '') {
                            for (var k = 0; k < companyResponse[i].company[j].file.length; k++) {
                                var filepath = base_path+'/'+companyResponse[i].company[j].file[k].filepath;
                                var file_name = companyResponse[i].company[j].file[k].Originalname;
                            }
                        }
                        else {
                            var file_name = "Not Mentioned";
                            var filepath = 'javascript:void(0)';
                        }
                        // var filepath = companyResponse[i].company[j].file[0].Originalname;
                        var delete_status = companyResponse[i].company[j].deleteStatus;
                        
                        if(delete_status=="NO"){
                        var tr_str1 = "<tr data-id=" + (i + 1) + ">" +
                            "<td ><input value='"+companyId+"' id='type_radio_2' name='type_radio' type='radio' /></td>" +
                            "<td data-field="+no+">" + no + "</td>" +
                            "<td data-field='companyName' >" + companyName + "</td>" +
                            "<td data-field='shippingAddress'>" + shippingAddress + "</td>" +
                            "<td data-field='telephoneNo'>" + telephoneNo + "</td>" +
                            "<td data-field='faxNo'>" + faxNo + "</td>" +
                            "<td data-field='mcNo'>" + mcNo + "</td>" +
                            "<td data-field='usDotNo'>" + usDotNo + "</td>" +
                            "<td data-field='mailingAddress'>" + mailingAddress + "</td>" +
                            "<td data-field='factoringCompany'>" + factoringCompany + "</td>" +
                            "<td data-field='bankCompany'>" + bankCompany + "</td>" +
                            "<td data-field='filepath'><a href='"+ filepath +"' target='_blank'>"+ file_name +"</a></td>" +
                            "<td><a class='editCompany mt-2 btn btn-primary fs-14 text-white edit3'  title='Edit' data-id=" + comid+ "&"+mailingAddress + "><i class='fe fe-edit'></i></a>&nbsp<a class='deleteCompany mt-2 btn btn-danger fs-14 text-white delete-icn' data-id=" + comid+ "&"+mailingAddress + " title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
                        $("#companyTable").append(tr_str1);
                        no++;
                        }
                        
                    } 
                }
            }
        } else {
            var tr_str1 = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#companyTable").append(tr_str1);
        }
        companymodal();
    }

//     $('#companyDataSubmit').click(function(){            
//         // var companyID = 1;
//         // var companyName = $('#inputCompanyName4').val();
//         // var shippingAddress = $('#inputShippingAddress4').val();
//         // var telephoneNo = $('#inputTelephoneNo4').val();
//         // var faxNo = $('#inputFaxNo4').val();
//         // var mcNo = $('#inputMcNo4').val();
//         // var usDotNo = $('#inputUsDotNo4').val();
//         // var mailingAddress = $('#inputEmailAddress4').val();
//         // var factoringCompany = $('#customerBFactoringCompany1').val();
//         // var website = $('#inputWebsite4').val();
//         // var file = $('#file').val();  
        
//         var form = document.forms.namedItem("addCompanyForm");
//         var formData = new FormData(form); 
//     $.ajax({
//         url: base_path+"/admin/addCompany",
//         type: "POST",
//         datatype:"JSON",
//         contentType: false,
//         data: formData,
//         processData: false,
//         cache: false,
//         success: function(resp){
//             if(resp.success == true){
//                 swal.fire("Done!", resp.message, "success");
//                 $.ajax({
//                     type: "GET",
//                     url: base_path+"/admin/company",
//                     async: false,
//                     success: function(text) {
//                         createCompanyRows(text);
//                         companyResponse = text;
//                     }
//                 });
//                 $("#addCompanyModal form").trigger("reset");
//             } 
//           },
//           error: function(data){
//             $.each( data.responseJSON.errors, function( key, value ) {
//                 swal.fire("Error!", value[0], "error");
//             });
//             },
//     });
// });

$('.companyDataUpdate').click(function(){        
    // var companyID= $('#up_comId1').val();
    // // var companySubID= $('#up_comSubId').val();
    // var companyName= $('#up_companyName').val();
    // var shippingAddress= $('#up_shippingAddress').val();
    // var telephoneNo=$('#up_telephoneNo').val();
    // var faxNo=$('#up_faxNo').val();
    // var mcNo=$('#up_mcNo').val();
    // var usDotNo=$('#up_usDotNo').val();
    // var mailingAddress=$('#up_mailingAddress').val();
    // var factoringCompany=$('#customerBFactoringCompany2').val();    
    // var website=$('#up_website').val();  
    var form = document.forms.namedItem("editCompanyForm");
    var formData = new FormData(form);   
    $.ajax({
        url:base_path+"/admin/updateCompany" ,
        type:'post',
        datatype:"JSON",
        contentType: false,
        data: formData,
        processData: false,
        cache: false,
        success: function(response){
            var responsenew = JSON.parse(response);
            if(responsenew.statusCode===200){
                swal.fire("Done!", responsenew.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/company",
                    success: function(text) {
                        createCompanyRows(text);
                        response = text;
                    }
                });			
            }
          },
          error: function(data){
            $.each( data.responseJSON.errors, function( key, value ) {
                swal.fire("Error!", value[0], "error"); 
            });
        }            
    });
});

function companymodal()
{
    $(document).ready(function(){
        $('.edit3').click(function(){
            var id = $(this).attr("data-id");
            var result = $(this).attr("data-id").split('&');
            var com_id=result[0];
            var email=result[1];
            $.ajax({
                url: base_path+"/admin/editCompany",
                type: "GET",
                datatype:"JSON",
                data: {_token: $("#companycsrf").val(),com_id: com_id,email: email},
                cache: false,
                success: function(dataResult){
                    $('#up_comId1').val(com_id);
                    // $('#up_comSubId').val(companySubId);
                    $('#up_companyName').val(dataResult.companyName);
                    $('#up_shippingAddress').val(dataResult.shippingAddress);
                    $('#up_telephoneNo').val(dataResult.telephoneNo);
                    $('#up_faxNo').val(dataResult.faxNo);
                    $('#up_mcNo').val(dataResult.mcNo);
                    $('#up_usDotNo').val(dataResult.usDotNo);
                    $('#up_mailingAddress').val(dataResult.mailingAddress);
                    $('#customerBFactoringCompany2').val(dataResult.factoringCompany);
                    $('#up_website').val(dataResult.website);                   
                    $('#editCompanyModal').modal('show'); 
                }
            });
        });
    });
    
    $(".deleteCompany").on("click", function(){
        var rowToDelete = $(this).closest('tr');
        var id = $(this).attr("data-id");
        var result = $(this).attr("data-id").split('&');
        var com_id=result[0];
        var email=result[1];
        swal.fire({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

        if (e.value === true) {
        $.ajax({ 
          url: base_path+"/admin/deleteCompany",
          data: {com_id: com_id,email: email},
          type: 'post',
          success: function(resp){
            if (resp.success === true) {
				swal.fire("Done!", resp.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/company",
                    success: function(text) {
                        createCompanyRows(text);
                        response = text;
                    }
                });
			} else {
				swal.fire("Error!", resp.message, "error");
			}
		},
		error: function (resp) {
			swal.fire("Error!", 'Something went wrong.', "error");
		}
        });
    } else {
        e.dismiss;
    }

}, function (dismiss) {
    return false;
})
    });
}

// <!-- -------------------------------------------------------------------------get driver truck  ------------------------------------------------------------------------- -->  
   // $('.list select').selectpicker();   
   $('.truckSet').focus(function(){
    $('.truckSet').val('');
        //alert(); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/driver_getTruck",
            async: false,
            //dataType:JSON,
            success: function(data) {
                console.log(data)                    
                createDriverTruckList(data);
                truckResponse = data;
            }
        });
    });

//get truck type
function createDriverTruckList(truckResponse) {           
    var TruckLength = 0;    
    
    if (truckResponse != null) {
       TruckLength = truckResponse.truck.length;
    }

    if (TruckLength > 0) {
     
        $(".truckSet").html('');
        for (var i = 0; i < TruckLength; i++) {  
            var truckNumber =truckResponse.truck[i].truckNumber;
            var truckTypeId =truckResponse.truck[i]._id;
          
           var TruckList = "<option class='truckType' value='"+ truckTypeId+"-"+ truckNumber +"'>"                
           $(".truckSet").append(TruckList);
           

        }
        
    }
    
}

 
// <!-- -------------------------------------------------------------------------over get driver truck ------------------------------------------------------------------------- -->

// <!-- -------------------------------------------------------------------------getedit driver truck  ------------------------------------------------------------------------- -->  
   // $('.list select').selectpicker();   
   $('.up_truckSet').focus(function(){
    $('.up_truckSet').val('');
        //alert(); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/driver_getTruck",
            async: false,
            //dataType:JSON,
            success: function(data) {
                console.log(data)                    
                createDriverUpTruckList(data);
                truckResponse = data;
            }
        });
    });

//get truck type
function createDriverUpTruckList(truckResponse) {           
    var TruckLength = 0;    
    
    if (truckResponse != null) {
       TruckLength = truckResponse.truck.length;
    }

    if (TruckLength > 0) {
     
        $(".up_truckSet").html('');
        for (var i = 0; i < TruckLength; i++) {  
            var truckNumber =truckResponse.truck[i].truckNumber;
            var truckTypeId =truckResponse.truck[i]._id;
          
           var TruckList = "<option class='truckType' value='"+ truckTypeId+"-"+ truckNumber +"'>"                
           $(".up_truckSet").append(TruckList);
           

        }
        
    }
    
}

 
// <!-- -------------------------------------------------------------------------over get driver truck ------------------------------------------------------------------------- -->


// function getNextSequence($id){
//     $newid = $id + 1;
//     return $newid;
// }

// function updateUserCompany($id) {
//     $(".updateCompany").on("click", function(){
//         var rowToDelete = $(this).closest('tr');
//         var id = $(this).attr("data-id");
//         var result = $(this).attr("data-id").split('&');
//         var com_id=result[0];
//         var email=result[1];
//         swal.fire({
//             title: "Delete?",
//             text: "Please ensure and then confirm!",
//             type: "warning",
//             showCancelButton: !0,
//             confirmButtonText: "Yes, delete it!",
//             cancelButtonText: "No, cancel!",
//             reverseButtons: !0
//         }).then(function (e) {

//         if (e.value === true) {
//         $.ajax({ 
//           url: base_path+"/admin/deleteCompany",
//           data: {com_id: com_id,email: email},
//           type: 'post',
//           success: function(resp){
//             if (resp.success === true) {
// 				swal.fire("Done!", resp.message, "success");
//                 $.ajax({
//                     type: "GET",
//                     url: base_path+"/admin/company",
//                     success: function(text) {
//                         createCompanyRows(text);
//                         response = text;
//                     }
//                 });
// 			} else {
// 				swal.fire("Error!", resp.message, "error");
// 			}
// 		},
// 		error: function (resp) {
// 			swal.fire("Error!", 'Something went wrong.', "error");
// 		}
//         });
//     } else {
//         e.dismiss;
//     }

// }, function (dismiss) {
//     return false;
// })
//     });
// }




// <!-- ------------------------------------------------------------------------- Add Recurrence ------------------------------------------------------------------------- -->



$(function() {
    $("#btnAdd2").bind("click", function() {
        var div = $("<tr />");
        div.html(GetDynamicRecurrence(""));
        $("#TextBoxContainer2").append(div);
    });
    $("body").on("click", ".remove", function() {
        $(this).closest("tr").remove();
    });

});

function removeRowRecurrence(index) {
    if (index == 0) {
        return;
    }

    document.getElementById("recurrence_add" + index).remove();
    installmentCategory.splice(index, 1);
    installmentType.splice(index, 1);
    amount.splice(index, 1);
    installment.splice(index, 1);
    startNo.splice(index, 1);
    startDate.splice(index, 1);
    internalNote.splice(index, 1);
}

function GetDynamicRecurrence(value) {
    return '<td width="150">' +
        '<input class="form-control" value = "' + value +
        '" name="installmentCategory" onkeyup="searchFixpay(this.value,' + "'fixpaycat'" +
        ')" list="fixpaycat" autocomplete="off"/></td>' +
        '<td width="150">' +
        '<input class="form-control" value = "' + value +
        '" name="installmentType" list="instatype1" autocomplete="off"/></td>' +
        '<td width="100">' +
        '<input name="amount" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100">' +
        '<input name="installment" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100"><input name="startNo" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="10"><input name="startDate" type="date" value = "' + value + '" class="form-control" /></td>' +
        '<td width="250"><textarea rows="1" cols="30" value = "' + value +
        '" class="form-control" type="textarea" name="internalNote"></textarea></td>' +
        '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>';
}

// <!-- ------------------------------------------------------------------------- End of Add Recurrence ------------------------------------------------------------------------- -->



// <!-- ------------------------------------------------------------------------- Minus Recurrence ------------------------------------------------------------------------- -->


$(function() {
    $("#btnAdd3").bind("click", function() {
        var div = $("<tr />");
        div.html(GetDynamicRecurrencesubstract(""));
        $("#TextBoxContainer3").append(div);
    });
    $("body").on("click", ".remove", function() {
        $(this).closest("tr").remove();
    });

});

function recurrence_substract(index) {
    if (index == 0) {
        return;
    }
    document.getElementById("recurrencesubstract_add" + index).remove();
    installment_Category.splice(index, 1);
    installment_Type.splice(index, 1);
    amount_recurrence.splice(index, 1);
    installment_sub.splice(index, 1);
    start_No.splice(index, 1);
    start_Date.splice(index, 1);
    internal_Note.splice(index, 1);
}

function GetDynamicRecurrencesubstract(value) {
    return '<td width="150">' +
        '<input class="form-control" value = "' + value +
        '" name="installment_Category" onkeyup="searchFixpay(this.value,' + "'fixpay_cat'" +
        ')" list="fixpay_cat" autocomplete="off"/></td>' +
        '<td width="150">' +
        '<input class="form-control" value = "' + value + '" name="installment_Type" list="instatype"/></td>' +
        '<td width="100">' +
        '<input name="amount_recurrence" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100">' +
        '<input name="installment_sub" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100"><input name="start_No" type="text" value = "' + value + '" class="form-control" /></td>' +
        '<td width="10"><input name="start_Date" type="date" value = "' + value + '" class="form-control" /></td>' +
        '<td width="250"><textarea rows="1" cols="30" value = "' + value +
        '" class="form-control" type="textarea" name="internal_Note"></textarea></td>' +
        '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
}

// <!-- ------------------------------------------------------------------------- End of Minus Recurrence ------------------------------------------------------------------------- -->


$('.editCompanyModalCloseButton').click(function(){
    $('#editCompanyModal').modal('hide');
    // $('#driverModal').modal('show');  
});

/* Initialization of datatable */
$(document).ready(function() {
    $('#editCompanyModal').modal({
        backdrop: 'static',
        keyboard: false
    })
});









    $('.editDriverOwnerClose').click(function(){
       // alert();
        $('#editDriverOwnerModal').modal('hide');
        //return
    });

    function inc_percentage() {
    document.getElementById("ownerPercentage").stepUp(1);
    }

    function dec_percentage() {
      document.getElementById("ownerPercentage").stepUp(-1);
    }

    function up_inc_percentage() {
    document.getElementById("up_ownerPercentage").stepUp(1);
    }

    function up_dec_percentage() {
        document.getElementById("up_ownerPercentage").stepUp(-1);
    }


    // added by bhagwati 
   // email validation===================================
   
   function IsEmail() {
    var email= $(".email").val();
    var testEmail =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    // if (!filter_var(email, FILTER_VALIDATE_EMAIL)) {
    //     // invalid emailaddress
    //     return false;
    // }
    if (testEmail.test(email))
    {
        return true;
    }
    else
    {
        return true;
    }
}
//  url validation =======================================
function isUrlValid() {
    if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($(".url").val()))
    {
       return true;
    } 
    else 
    {
       return false;
    }
}
// start location view in all ===============================
$(".location_view").keyup(function(){
    var fieldID=$(this).attr('data-location');  
    // alert(fieldID)
    var placeArray = "";
    $.getJSON("./place.json", function (json) {
    placeArray = json; // this will show the info it in firebug console
    });
   var placetimeout='';;
    clearTimeout(placetimeout);
    var location = document.getElementById(fieldID);
    var st = fieldID + "-list";
    if (location.value == "") {
      document.getElementById(st).style.display = "none";
    }
    placetimeout = setTimeout(function () {
      var regex = new RegExp(location.value, "i");
      var list = `<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front col-md-10" unselectable="on" style="left:16px;top: 61.625px; height:auto; box-shadow: 2px 2px 2px 3px rgb(0 0 0 / 6%); max-height: 200px;overflow: auto;z-index: 9999;">`;
      var count = 1;
  
      $.each(placeArray, function (key, val) {
        if (val.city.search(regex) != -1) {
          list += '<li class="ui-menu-item" style="padding: 5px; border-bottom: 1px solid;"><div id="ui-id-2" tabindex="-1" class="ui-menu-item-wrapper putValue" data-value='+val.city.toUpperCase()+' data-fieldID='+fieldID+' data-id='+st+'>'+val.city.toUpperCase()+'</div> </li>';
  
          count++;
        }
      });
      list += `</ul>`;
      if (document.getElementById(st) == undefined) {
        var div = document.createElement("div");
        div.setAttribute("id", st);
        location.parentNode.insertBefore(div, location.nextSibling);
      } else {
        document.getElementById(st).style.display = "block";
      }
      document.getElementById(st).innerHTML = list;
    }, 800);
});
$('body').on('click','.putValue',function(){
    var value=$(this).attr("data-value");        
    var fieldID=$(this).attr("data-fieldID");
    var id=$(this).attr("data-id");
    // var date='customerLocation';
    // console.log(date);
    // console.log(value + " , " + fieldID + " , " + id);
    document.getElementById(fieldID).value=value;
    // $("#customerLocation").val(value);
    document.getElementById(id).style.display = "none";
});

function unique(list) {
    var result = [];
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
}

// dashboard function 
function abbreviateNumber(value) {
  let newValue = value;
  const suffixes = ["", "K", "M", "B", "T"];
  let suffixNum = 0;
  while (newValue >= 1000) {
    newValue /= 1000;
    suffixNum++;
  }

  newValue = newValue.toPrecision(3);

  newValue += suffixes[suffixNum];
  return newValue;
}
function numberWithCommas(x) 
{
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    // return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

// excel =======================================================
function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) 
{
    if (!Array.isArray(JSONData)) 
    {
        swal.fire('There are no entries to export');
        // $(".Eshipper").css("display", "none");
        return false;
    }

    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

    var CSV = '';
    //This condition will generate the Label/Header
    if (ShowLabel) 
    {
        var row = "";
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) 
        {
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }
        row = row.slice(0, -1);
        //append Label row with line break
        CSV += row + '\r\n';
    }
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) 
    {
        var row = "";
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) 
        {
            row += '"' + arrData[i][index] + '",';
        }
        row.slice(0, row.length - 1);
        //add a line break after each row
        CSV += row + '\r\n';
    }

    if (CSV == '') 
    {
        alert("Invalid data");
        return;
    }
    //this will remove the blank-spaces from the title and replace it with an underscore
    ReportTitle.replace(/ /g, "_");
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    

    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;

    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = ReportTitle + ".csv";

    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    $(".Eshipper").css("display", "none");
}

// search function =============================================================

// date formate =============================================================
function convertTimeZoneToDate(date) 
{
    return moment((date + 86400) * 1000).format("MM/DD/YYYY");
}
function convertTimeZone(date) 
{
    var months_arr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    var date = new Date(date*1000);
    var year = date.getFullYear();
    var month = months_arr[date.getMonth()];
    var day = date.getDate();
    return month+'/'+day+'/'+year;
  
}
  //===== end date formate ========================================
// =====================  pagination ==============================
function paginateList(arrList, main, sub, func, status = '') 
{
    var paginate = `<select class='form-control' id='page_active'
    onchange='callPagination(this.value,"${main}","${sub}","${func}", "${status}")'>`;
    var pageno = 1;
    for (var j = 0; j < arrList[0].length; j++) 
    {
        for (var i = 0; i < arrList[0][j].length; i++) 
        {
            paginate += `<option value='${JSON.stringify(arrList[0][j][i]) + "^" + pageno}'>${pageno++}</option>`;
        }
    }
    paginate += `</select>`;
    return paginate;
}
function renameTableSeq2(tableid, paginateid) 
{
    if (paginateid != null && paginateid != undefined) 
    {
        var pagearr = $('#' + paginateid).val();
        if (pagearr != null && pagearr != undefined) 
        {
            arr1 = pagearr.split("^");
            var pageno = arr1[1] - 1;
            var table = document.getElementById(tableid);
            if (table != null && table != undefined) 
            {
                for (var i = 0, j = (pageno * 100) + 1; i < table.rows.length; i++, j++) 
                {
                    table.rows[i].cells[1].innerHTML = j;
                }
            }
        }
        else
        {
            var table = document.getElementById(tableid);
            if (table != null && table != undefined) 
            {
                for (var i = 0, j = 1; i < table.rows.length; i++, j++) 
                {
                    table.rows[i].cells[1].innerHTML = j;
                }
            }
        }
    } 
    else 
    {
        var table = document.getElementById(tableid);
        if (table != null && table != undefined) 
        {
            for (var i = 0, j = 1; i < table.rows.length; i++, j++) 
            {
                table.rows[i].cells[1].innerHTML = j;
            }
        }
    }
}
function renameTableSeq(tableid, paginateid) 
{
    if (paginateid != null && paginateid != undefined) 
    {
        var pagearr = $('#' + paginateid).val();
        if (pagearr != null && pagearr != undefined) 
        {
            arr1 = pagearr.split("^");
            var pageno = arr1[1] - 1;
            var table = document.getElementById(tableid);
            if (table != null && table != undefined) 
            {
                for (var i = 0, j = (pageno * 100) + 1; i < table.rows.length; i++, j++) 
                {
                    table.rows[i].cells[0].innerHTML = j;
                }
            }
        }
        else
        {
            var table = document.getElementById(tableid);
            if (table != null && table != undefined) 
            {
                for (var i = 0, j = 1; i < table.rows.length; i++, j++) 
                {
                    table.rows[i].cells[0].innerHTML = j;
                }
            }
        }
    } 
    else 
    {
        var table = document.getElementById(tableid);
        if (table != null && table != undefined) 
        {
            for (var i = 0, j = 1; i < table.rows.length; i++, j++) 
            {
                table.rows[i].cells[0].innerHTML = j;
            }
        }
    }
}
function callPagination(arr1, main, sub, func, status) 
{
    var res = arr1.split("^");
    var arr = res[0];
    var page_no = res[1];
    var data = {
        page_no: page_no,
        arr: arr,
        status : status
    }
    // console.log(func);
    if (func == "processFuelReceiptTable") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFuelReceipt",
            async: false,
            data: data,
            success: function(response) {
                $(".loading").css("display", "none");
                var res = JSON.parse(response);
            if (func == "processFuelReceiptTable") 
            {
                    processFuelReceiptTable(res[0]);
                    renameTableSeq2("FuelReceTable", "page_active");
                }
                        
            }
        });
    }
    else if (func == "processCustomer") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/customer",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processCustomer(res[0]);
                renameTableSeq("customerTable", "page_active");
                        
            }
        });
    }
   else if (func == "restoreProcessCustomer") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/customer",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                RestoreprocessCustomer(res[0]);
                renameTableSeq("customerTable", "page_active");
                        
            }
        });
    }
   else if (func == "processShipperTable") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getShipper",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processShipperTable(res[0]);
                renameTableSeq("shipperTable", "page_active");
                        
            }
        });
    }
    else if (func == "processConsignee") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getConsignee",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processConsignee(res[0]);
                renameTableSeq("consigneeTableData", "page_active");
                        
            }
        });
    }
    
    if (func == "processCarrierTable") 
    {
        // $.ajax({
        //     type: "GET",
        //     url: base_path + "/admin/getExternalCarrier",
        //     async: false,
        //     success: function (text) {
        //         var res = JSON.parse(text);
        //         processCarrierTable(res[0]);
        //         renameTableSeq("external_carrierTable", "page_active");
                        
        //     }
        // });
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getExternalCarrier",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processCarrierTable(res[0]);
                renameTableSeq("external_carrierTable", "page_active");
                        
            }
        });
    }
    if (func == "processTruckTable") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTruck",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processTruckTable(res[0]);
                renameTableSeq("truckTable", "page_active");
                        
            }
        });
    }
    if (func == "processTrailerTable") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getTrailer",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processTruckTable(res[0]);
                renameTableSeq("trailer_tbl", "page_active");
                        
            }
        });
    }
    if (func == "processFactoringTable") 
    {
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getFactCompany",
            async: false,
            data: data,
            success: function(response) {
                var res = JSON.parse(response);
                processFactoringTable(res[0]);
                renameTableSeq("factCompTable", "page_active");
                        
            }
        });
    }
    
}

//=============== end pagination====================================


    
// close button
$('.closeDriverModal').click(function(){
    // console.log("close");
    $('#driver_modal_view').modal('hide');
});