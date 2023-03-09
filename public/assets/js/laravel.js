
// <?php 
// 	$userdata=Auth::user();
// 	$dashboardArray=$userdata->dashboard;
	
//  ?>

// var userdata = Auth.user();
// var dashboardArray = userdata.user_type;
    

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var base_path = $("#url").val();

$('#addUser').click(function(){
    $('#addUserModal').modal('show');
});

$('#addCompany').click(function(){
    $('#addCompanyModal').modal('show');
});

$('.closeDriverModal').click(function(){
    $('#driverModal').modal('hide');
});
$('.closeAddDriverModal').click(function(){
    $("#addLoadBoardModal").css("z-index","100000000000");
    $('#RecurrenceCategoryModal').modal('hide');
    $('#addDriverModal').modal('hide');
});

$('.userModalClose').click(function(){
    $('#userModal').modal('hide');
});

$('.addUserModalClose').click(function(){
    $('#addUserModal').modal('hide');
});

$('.closeAddOwnerModal').click(function(){
    $('#addDriverOwnerModal').modal('hide');
});

$('.closoAddCompanyModal').click(function(){
    $('#addCompanyModal').modal('hide');
});

$('.closoCompanyModal').click(function(){
    $('#companyModal').modal('hide');
});

$(document).ready(function() {
 
    $('#User_navbar').click(function(){
        var response = '';
        $.ajax({
            type: "GET",
            url: base_path+"/admin/user",
            async: false,
            success: function(text) {
                createRows(text);
                response = text;
            }
        });
        $('#userModal').modal('show')
    });
});



function createRows(response) {

    // var edit=$('#updateUser').val();
    // var delet =$('#deleteUser').val();

    // if(edit == 1){
    //    var editPrivilege=''; 
    // }else{
    //     var editPrivilege='privilege';
    // }
    // if(delet == 1){
    //     var delPrivilege=''; 
    //  }else{
    //      var delPrivilege='privilege';
    //  }

    var len = 0;
    $('#table1').empty(); 
    if (response != null) {
        len = response.length;
    }

    if (len > 0) {
        // for (var i = 0; i < len; i++) {
        for (var i = len-1; i >= 0; i--) {
            var id = response[i].id;
            var email = response[i].userEmail;
            var username = response[i].userName;
            var firstname = response[i].userFirstName;
            var lastname = response[i].userLastName;
            var address = response[i].userAddress;
            var location = response[i].userLocation;
            var zip = response[i].userZip;
            var telephone = response[i].userTelephone;
            var ext = response[i].userExt;
            var tollfree = response[i].TollFree;
            var fax = response[i].userFax;
            var tr_str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                "<td data-field='id'>" + (i + 1) + "</td>" +
                "<td data-field='email' id="+email+">" + email + "</td>" +
                "<td data-field='username'>" + username + "</td>" +
                "<td data-field='fistname'>" + firstname + "</td>" +
                "<td data-field='lastname'>" + lastname + "</td>" +
                "<td data-field='address'>" + address + "</td>" +
                "<td data-field='location'>" + location + "</td>" +
                "<td data-field='zip'>" + zip + "</td>" +
                "<td data-field='telephone'>" + telephone + "</td>" +
                "<td data-field='ext'>" + ext + "</td>" +
                "<td data-field='tollfree'>" + tollfree + "</td>" +
                "<td data-field='fax'>" + fax + "</td>" +
                "<td style='width: 100px'>"+
                    " <a class='button-23 edit1 "+editPrivilege+"' id='editmodel' title='Edit' ><i class='fe fe-edit'></i>"+
                    "</a> <a class='delete1 button-23 "+delPrivilege+"' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a>"+
                "</td></tr>";
            $("#table1").append(tr_str);
        }
    } else {
        var tr_str = "<tr data-id=" + i + ">" +
            "<td align='center' colspan='14'>No record found.</td>" +
            "</tr>";

        $("#table1").append(tr_str);
    }
    usermodal();
}

(function() {
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
})();

$('#select-all').click(function(event) {
    if (this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});

$(document).ready(function() {
   
    $('#usersave').on('click', function() {
        var firstname = $('#inputFirstName4').val();
        var lastname = $('#inputLastName4').val();
        var username = $('#inputUsername4').val();
        var email = $('#inputEmail4').val();
        var password = $('#inputPassword4').val();
        var address = $('#inputAddress').val();
        var location = $('#inputLocation').val();
        var zip = $('#inputZip').val();

        var companyname = $('#inputCompanyName').val();
        var office = $('#inputOffice').val();

        var telephone = $('#inputTelephone').val();
        var ext = $('#inputExt').val();
        var tollfree = $('#inputTollFree').val();
        var fax = $('#inputFax').val();
        var insertUser = $('.insertUser').is(":checked");
        var inser_user = insertUser ? 1 : 0;
        var updateUser = $('.updateUser').is(":checked");
        var update_user = updateUser ? 1 : 0;
        var deleteUser = $('.deleteUser').is(":checked");
        var delete_user = deleteUser ? 1 : 0;
        var importUser = $('.importUser').is(":checked");
        var import_user = importUser ? 1 : 0;
        var exportUsers = $('.exportUsers').is(":checked");
        var export_user = exportUsers ? 1 : 0;
        var checkbox1 = $('#checkbox-1').is(":checked");
        var value1 = checkbox1 ? 1 : 0;
        var checkbox2 = $('#checkbox-2').is(":checked");
        var value2 = checkbox2 ? 1 : 0;
        var checkbox3 = $('#checkbox-3').is(":checked");
        var value3 = checkbox3 ? 1 : 0;
        var checkbox4 = $('#checkbox-4').is(":checked");
        var value4 = checkbox4 ? 1 : 0;
        var checkbox5 = $('#checkbox-5').is(":checked");
        var value5 = checkbox5 ? 1 : 0;
        var checkbox6 = $('#checkbox-6').is(":checked");
        var value6 = checkbox6 ? 1 : 0;
        var checkbox7 = $('#checkbox-7').is(":checked");
        var value7 = checkbox7 ? 1 : 0;
        var checkbox8 = $('#checkbox-8').is(":checked");
        var value8 = checkbox8 ? 1 : 0;
        var checkbox9 = $('#checkbox-9').is(":checked");
        var value9 = checkbox9 ? 1 : 0;
        var checkbox2_1 = $('#checkboxl2_1').is(":checked");
        var value10 = checkbox2_1 ? 1 : 0;
        var checkbox2_2 = $('#checkboxl2_2').is(":checked");
        var value11 = checkbox2_2 ? 1 : 0;
        var checkbox2_3 = $('#checkboxl2_3').is(":checked");
        var value12 = checkbox2_3 ? 1 : 0;
        var checkbox2_4 = $('#checkboxl2_4').is(":checked");
        var value13 = checkbox2_4 ? 1 : 0;
        var checkbox2_5 = $('#checkboxl2_5').is(":checked");
        var value14 = checkbox2_5 ? 1 : 0;
        var checkbox2_6 = $('#checkboxl2_6').is(":checked");
        var value15 = checkbox2_6 ? 1 : 0;
        var checkbox2_7 = $('#checkboxl2_7').is(":checked");
        var value16 = checkbox2_7 ? 1 : 0;
        var checkbox2_8 = $('#checkboxl2_8').is(":checked");
        var value17 = checkbox2_8 ? 1 : 0;
        var checkbox2_9 = $('#checkboxl2_9').is(":checked");
        var value18 = checkbox2_9 ? 1 : 0;
        var checkbox2_10 = $('#checkboxl2_10').is(":checked");
        var value19 = checkbox2_10 ? 1 : 0;
        var checkbox2_11 = $('#checkboxl2_11').is(":checked");
        var value20 = checkbox2_11 ? 1 : 0;
        var checkbox2_12 = $('#checkboxl2_12').is(":checked");
        var value21 = checkbox2_12 ? 1 : 0;
        var checkbox2_13 = $('#checkboxl2_13').is(":checked");
        var value22 = checkbox2_13 ? 1 : 0;
        var checkbox2_14 = $('#checkboxl2_14').is(":checked");
        var value23 = checkbox2_14 ? 1 : 0;
        var checkbox2_15 = $('#checkboxl2_15').is(":checked");
        var value24 = checkbox2_15 ? 1 : 0;
        var checkbox3_1 = $('#checkboxl3_1').is(":checked");
        var customer = checkbox3_1 ? 1 : 0;
        var checkbox3_2 = $('#checkboxl3_2').is(":checked");
        var value26 = checkbox3_2 ? 1 : 0;
        var checkbox3_3 = $('#checkboxl3_3').is(":checked");
        var value27 = checkbox3_3 ? 1 : 0;
        var checkbox3_4 = $('#checkboxl3_4').is(":checked");
        var value28 = checkbox3_4 ? 1 : 0;
        var checkbox3_5 = $('#checkboxl3_5').is(":checked");
        var value29 = checkbox3_5 ? 1 : 0;
        var checkbox3_6 = $('#checkboxl3_6').is(":checked");
        var value30 = checkbox3_6 ? 1 : 0;
        var checkbox3_7 = $('#checkboxl3_7').is(":checked");
        var value31 = checkbox3_7 ? 1 : 0;
        var admin = $('#checkboxl3_8').is(":checked");
        var admin_val = admin ? 1 : 0;
        var checkbox3_9 = $('#checkboxl3_9').is(":checked");
        var value33 = checkbox3_9 ? 1 : 0;
        var checkbox3_10 = $('#checkboxl3_10').is(":checked");
        var value34 = checkbox3_10 ? 1 : 0;
        var checkbox3_11 = $('#checkboxl3_11').is(":checked");
        var value35 = checkbox3_11 ? 1 : 0;
        var checkbox3_12 = $('#checkboxl3_12').is(":checked");
        var value36 = checkbox3_12 ? 1 : 0;
        var checkbox3_13 = $('#checkboxl3_13').is(":checked");
        var value37 = checkbox3_13 ? 1 : 0;
        var checkbox4_1 = $('#checkboxl4_1').is(":checked");
        var value38 = checkbox4_1 ? 1 : 0;
        var checkbox4_2 = $('#checkboxl4_2').is(":checked");
        var value39 = checkbox4_2 ? 1 : 0;
        var checkbox4_3 = $('#checkboxl4_3').is(":checked");
        var value40 = checkbox4_3 ? 1 : 0;
        var checkbox4_4 = $('#checkboxl4_4').is(":checked");
        var toll = checkbox4_4 ? 1 : 0;
        var checkboxl4_5 = $('#checkboxl4_5').is(":checked");
        var IFTA_trip = checkboxl4_5 ? 1 : 0;
        
        var checkbox5_1 = $('#checkboxl5_1').is(":checked");
        var value41 = checkbox5_1 ? 1 : 0;
        var checkbox5_2 = $('#checkboxl5_2').is(":checked");
        var value42 = checkbox5_2 ? 1 : 0;
        var checkbox5_3 = $('#checkboxl5_3').is(":checked");
        var value43 = checkbox5_3 ? 1 : 0;
        var checkbox5_4 = $('#checkboxl5_4').is(":checked");
        var value44 = checkbox5_4 ? 1 : 0;
        var checkbox5_5 = $('#checkboxl5_5').is(":checked");
        var bank = checkbox5_5 ? 1 : 0;
        var checkbox5_6 = $('#checkboxl5_6').is(":checked");
        var account = checkbox5_6 ? 1 : 0;
  
        var checkbox6_1 = $('#checkboxl6_1').is(":checked");
        var value45 = checkbox6_1 ? 1 : 0;
        var checkbox6_2 = $('#checkboxl6_2').is(":checked");
        var value46 = checkbox6_2 ? 1 : 0;
        var checkbox6_3 = $('#checkboxl6_3').is(":checked");
        var value47 = checkbox6_3 ? 1 : 0;
        var checkbox6_4 = $('#checkboxl6_4').is(":checked");
        var value48 = checkbox6_4 ? 1 : 0;
        var checkbox6_5 = $('#checkboxl6_5').is(":checked");
        var value49 = checkbox6_5 ? 1 : 0;
        var checkbox6_6 = $('#checkboxl6_6').is(":checked");
        var value50 = checkbox6_6 ? 1 : 0;
        var checkbox6_7 = $('#checkboxl6_7').is(":checked");
        var value51 = checkbox6_7 ? 1 : 0;
        var checkbox6_8 = $('#checkboxl6_8').is(":checked");
        var value52 = checkbox6_8 ? 1 : 0;
        var checkbox6_9 = $('#checkboxl6_9').is(":checked");
        var value53 = checkbox6_9 ? 1 : 0;
        var checkbox6_10 = $('#checkboxl6_10').is(":checked");
        var value54 = checkbox6_10 ? 1 : 0;
        var checkbox6_11 = $('#checkboxl6_11').is(":checked");
        var value55 = checkbox6_11 ? 1 : 0;
        var checkbox6_12 = $('#checkboxl6_12').is(":checked");
        var value56 = checkbox6_12 ? 1 : 0;

        var checkbox7_1 = $('#checkboxl7_1').is(":checked");
        var value57 = checkbox7_1 ? 1 : 0;
        var checkbox7_2 = $('#checkboxl7_2').is(":checked");
        var value58 = checkbox7_2 ? 1 : 0;
        var checkbox7_3 = $('#checkboxl7_3').is(":checked");
        var value59 = checkbox7_3 ? 1 : 0;
        var checkbox7_4 = $('#checkboxl7_4').is(":checked");
        var value60 = checkbox7_4 ? 1 : 0;
       


        var tr_length = $("#userModal").find("tr").length;
        var tr_str2 = "<tr data-id=" + tr_length + ">" +
        "<td data-field='id'>" + tr_length + "</td>" +
        "<td data-field='email' id="+email+">" + email + "</td>" +
        "<td data-field='username'>" + username + "</td>" +
        "<td data-field='fistname'>" + firstname + "</td>" +
        "<td data-field='lastname'>" + lastname + "</td>" +
        "<td data-field='address'>" + address + "</td>" +
        "<td data-field='location'>" + location + "</td>" +
        "<td data-field='zip'>" + zip + "</td>" +
        "<td data-field='telephone'>" + telephone + "</td>" +
        "<td data-field='ext'>" + ext + "</td>" +
        "<td data-field='tollfree'>" + tollfree + "</td>" +
        "<td data-field='fax'>" + fax + "</td>" +
        "<td style='width: 100px'><a class='button-23 edit1' id='editmodal' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 button-23' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
            $.ajax({
                url: base_path+"/admin/add-user",
                type: "POST",
                data: {
                  _token: $("#csrf").val(),
                  userName: username,
                  userPass: password,
                  userFirstName: firstname,
                  userLastName: lastname,
                  userEmail: email,
                  userAddress: address,
                  userLocation: location,
                  userZip: zip,
                  userTelephone: telephone,
                  companyName: companyname,
                  office: office,
                  userExt: ext,
                  TollFree: tollfree,
                  userFax: fax,
                  new_active_load: value1,
                  profit_loss: value2,
                  dispatcher: value3,
                  driver: value4,
                  company: value5,
                  truck: value6,
                  carrier: value7,
                  equipment: value8,
                  sales_representative: value9,
                  addCompany: value10,
                  office: value11,
                  truckType: value12,
                  termCondition: value13,
                  equipmentType: value14,
                  statusType: value15,
                  loadType: value16,
                  userPrivillege: value17,
                //   fuelCardType: value17,
                  setting: value18,
                  currencySetting: value19,
                  addNote: value20,
                  paymentTerms: value21,
                  reccuranceCategory: value22,
                  salesIncentive: value23,
                  documentType: value24,
                  customer: customer,
                  addShipper: value26,
                  addConsignee: value27,
                  external_carrier: value28,
                  driver_owner_operator: value29,
                  user: value30,
                  truck: value31,
                  admin: admin_val,
                  factoringCompany: value33,
                  trailer: value34,
                //   creditCard: value35,
                //   subCreditCard: value36,
                  iftaCard: value37,
                  fuel_vendor: value38,
                  ifta: value39,
                  Fuel_reciepts_cash_advance: value40,
                  tolls:toll,
                  IFTA_trips:IFTA_trip,
                  accountManager: value41,
                  paymentRegistration: value42,
                  subCreditCard: value43,
                  creditCard: value44,
                  bank:bank,
                  Finance:account,
                  driverReport: value45,
                  bankStateReport: value46,
                  creditStateReport: value47,
                  fuelcardReport: value48,
                  fuelReport: value49,
                  report: value50,
                  aggingReport: value51,
                  payableReport: value52,
                  receivableReport: value53,
                  Report1099: value54,
                  Expense_report: value55,
                  Revenue_report: value56,
                  settlements:value57,
                  driverPaySettlements:value58,
                  customerSettlement:value59,
                  carrierSettlement:value60,
                  inser_user:inser_user,
                  update_user:update_user,
                  delete_user:delete_user,
                  import_user:import_user,
                  export_user:export_user,
                },
                cache: false,
                success: function(resp){
                  if(resp.success === true){
                    $("#addUserModal").modal("hide");
                      swal.fire("Done!", resp.message, "success");
                      $.ajax({
                          type: "GET",
                          url: base_path+"/admin/user",
                          async: false,
                          success: function(text) {
                              createRows(text);
                              response = text;
                          }
                      });
                      $("#addUserModal form").trigger("reset");
                  } else {
                      swal.fire("Error!", resp.error, "error");
                  }
                },
                error: function(data){
                  $.each( data.responseJSON.errors, function( key, value ) {
                      swal.fire("Error!", value[0], "error");
                  });
                  },
            });
    });


    // ===================== end user create =============================
    //===================== start office create ==========================
        $(".add_office_model_form_btn").click(function(){
            $("#add_office_modal_form").modal("show");
        });
        $(".close_office_modal_form").click(function(){
            $("#add_office_modal_form").modal("hide");
        });
        $(".save_office_modal_data").click(function(){
            var add_officeName = $('.add_officeName').val();        
            var add_officeLocation = $('#add_officeLocation').val();
            if(add_officeName=='')
            {
                swal.fire( "'Enter Office Name");
                $('#add_officeName').focus();
                return false;            
            }
            if(add_officeLocation=='')
            {
                swal.fire( "'Enter Office Address");
                $('#add_officeLocation').focus();
                return false;            
            }
            var formData = new FormData();
            formData.append('_token',$("#_tokenAdd_office_modal").val());        
            formData.append('officeName',add_officeName);
            formData.append('officeLocation', add_officeLocation);
            $.ajax({
                type: "POST",
                url: base_path+"/admin/add_office_address",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    swal.fire("Done!", "Office added successfully", "success");
                    $('#add_office_modal_form').modal('hide');
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/get_office_address",
                        async: false,
                        success: function(data) {                 
                            createOfficeAddressList(data);
                            officeAddressData = data;
                        }
                    });
                }
            })
        });
        $.ajax({
            type: "GET",
            url: base_path+"/admin/get_office_address",
            async: false,
            //dataType:JSON,
            success: function(data) {                   
                createOfficeAddressList(data);
                officeAddressData = data;
            }
        });

        function createOfficeAddressList(officeAddressData)
        {
            var officeTypelength = 0; 
            if (officeAddressData != null) 
            {
                officeTypelength = officeAddressData.office.length;
            }
            if (officeTypelength > 0) 
            {
                // var no=1;
                //$(".customerCurrencySet").html('');
                $(".office_name_set").html('');
                for (var i=0; i<officeTypelength; i++) 
                {  
                    var officeName =officeAddressData.office[i].officeName;
                    var officeId =officeAddressData.office[i]._id;
                    if(officeAddressData.office[i].deleteStatus == "NO")
                    {
                        var TrailerTypeList = "<option  value='"+ officeId +"'>"+ officeName +" </option>"   
                    }             
                    $(".office_name_set").append(TrailerTypeList);
                    //<option value="Edge">
                        //no++;
                }            
            }     
        }
        //===================== end office create ==============================

        // =========== start create add_Company_Name_modal_form ====================
        $(".add_Company_Name_modal_form_btn").click(function(){
            $("#addCompanyModal").modal("show");
        });
        $(".close_Company_Name_modal_form").click(function(){
            $("#addCompanyModal").modal("hide");
        });
        // $(".save_Company_Name_modal_data").click(function(){
        //     alert("dgfgf");
        // });

        $.ajax({
            type: "GET",
            url: base_path+"/admin/get_company_details",
            async: false,
            //dataType:JSON,
            success: function(data) {                   
                createCompanyListData(data);
                companyDetails = data;
            }
        });

        function createCompanyListData(companyDetails)
        {
            var companyDetailLength = 0; 
            if (companyDetails != null) 
            {
                companyDetailLength = companyDetails.company.length;
            }
            if (companyDetailLength > 0) 
            {
                // var no=1;
                //$(".customerCurrencySet").html('');
                $(".set_company_name").html('');

                // var companyDetailsList = "<option  value=''>Select here.... </option>"  
                // $(".set_company_name").append(companyDetailsList);
                for (var i=0; i<companyDetailLength; i++) 
                {  
                    var companyName =companyDetails.company[i].companyName;
                    var companyId =companyDetails.company[i]._id;
                    if(companyDetails.company[i].deleteStatus == "NO")
                    {
                        var companyDetailsList = "<option  value='"+ companyId +"'>"+ companyName +" </option>"   
                    }             
                    $(".set_company_name").append(companyDetailsList);
                    //<option value="Edge">
                        //no++;
                }            
            }     
        }
    // //================= end create add_Company_Name_modal_form=================
    
    
    
});

$(document).ready(function(){
    $(".telephone4").keypress(function (e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
      }
      var curchr = this.value.length;
      var curval = $(this).val();
      if (curchr == 3 && curval.indexOf("(") <= -1) {
        $(this).val("(" + curval + ")" + " ");
      } else if (curchr == 4 && curval.indexOf("(") > -1) {
        $(this).val(curval + ")-");
      } else if (curchr == 5 && curval.indexOf(")") > -1) {
        $(this).val(curval + "-");
      } else if (curchr == 9) {
        $(this).val(curval + "-");
        $(this).attr('maxlength', '14');
      }
    });
  });

  function usermodal()
{
    $(document).ready(function(){
        $('.edit1').click(function(){
            $('#userEditModal').modal('show'); 
            var tr = (this).closest('tr');
            $('#id').val(tr.cells[0].innerText);
            $('#editFirstName4').val(tr.cells[3].innerText);
            $('#editLastName4').val(tr.cells[4].innerText);
            $('#editUsername4').val(tr.cells[2].innerText);
            $('#editEmail4').val(tr.cells[1].innerText);
            $('#email4').val(tr.cells[1].innerText);
            $('#editAddress').val(tr.cells[5].innerText);
            $('#editLocation').val(tr.cells[6].innerText);
            $('#editZip').val(tr.cells[7].innerText);
            $('#editTelephone').val(tr.cells[8].innerText);
            $('#editExt').val(tr.cells[9].innerText);
            $('#editTollFree').val(tr.cells[10].innerText);
            $('#editFax').val(tr.cells[11].innerText);
        });
    });
    $(".delete1").on("click", function(){
		var rowToDelete = $(this).closest('tr');
		var email = $(this).attr("data-id");
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
			type: 'POST',
		  url: base_path+"/admin/delete-user",
		  data: {userEmail: email},
		  success: function (resp) {
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
}
  
// <!-- ------------------------------------------------------------------------- driver ------------------------------------------------------------------------- -->

$(document).ready(function() {
    

// <!-- -------------------------------------------------------------------------Get driver ajax ------------------------------------------------------------------------- -->    
    $('#Driver_navbar').click(function(){ 
        var driverResponse = '';
        $.ajax({
            type: "GET",
            url: base_path+"/admin/driver",
            async: false,
            success: function(text) {
                createDriverRows(text);
                driverResponse = text;
            }
        });
        $("#driverModal").modal("show");
    });
    function createDriverRows(driverResponse) {
        var len1 = 0;
        
        $('#driverTable').empty(); 
        // if (driverResponse != null) {
        //     len1 = driverResponse.length;
        // }
        // if (len1 > 0) {
           var no=1;
                // for (var i = 0; i < len1; i++) {  
                var len2=driverResponse.driver.length; 
                    // if(len2 > 0){
                    // for (var j = 0; j < len2; j++) {
                    for (var j = len2-1; j > 0; j--) {
                        var comid =driverResponse.companyID;
                        var driverId=driverResponse.driver[j]._id;
                        var name = driverResponse.driver[j].driverName;
                        var email = driverResponse.driver[j].driverEmail;
                        var location = driverResponse.driver[j].driverAddress;
                        var social_security_no = driverResponse.driver[j].driverSocial;
                        if(social_security_no == null){social_security_no="-";}
                        var date_of_birth = driverResponse.driver[j].dateOfbirth;
                        if(date_of_birth == null || date_of_birth == false){date_of_birth="-";}
                            var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            var date_tr = new Date(date_of_birth*1000);
                            var year_tr = date_tr.getFullYear();
                            var month_tr = months_arr_tr[date_tr.getMonth()];
                            var day_tr = date_tr.getDate();
                            var date_of_birth = month_tr+'/'+day_tr+'/'+year_tr;
                            var date_of_hire = driverResponse.driver[j].dateOfHire;
                        if(date_of_hire == null ){date_of_hire="-";}
                            var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            var date_tr = new Date(date_of_hire*1000);
                            var year_tr = date_tr.getFullYear();
                            var month_tr = months_arr_tr[date_tr.getMonth()];
                            var day_tr = date_tr.getDate();
                            var date_of_hire = month_tr+'/'+day_tr+'/'+year_tr;
                        var license_no = driverResponse.driver[j].driverLicenseNo;
                        var lis = driverResponse.driver[j].driverLicenseIssue;
                        var license_exp_date = driverResponse.driver[j].driverLicenseExp;
                            var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                            var date_tr = new Date(license_exp_date*1000);
                            var year_tr = date_tr.getFullYear();
                            var month_tr = months_arr_tr[date_tr.getMonth()];
                            var day_tr = date_tr.getDate();
                            var license_exp_date = month_tr+'/'+day_tr+'/'+year_tr;
                        var driver_balance = driverResponse.driver[j].driverBalance;
                        if(driver_balance == null){driver_balance="-";}
                        var delete_status = driverResponse.driver[j].deleteStatus;
                        var ownerOperatorStatus =driverResponse.driver[j].ownerOperatorStatus;
                        var ownerOperatorDeleteStatus =driverResponse.driver[j].ownerOperatorDeleteStatus;

                        if(delete_status=="NO" || delete_status=="No" || delete_status=="no"){
                            
                            if(ownerOperatorStatus == 'YES' || ownerOperatorStatus == 'Yes' || ownerOperatorStatus == 'yes'){
                                var actionBtnOwnerOperator= "<a class='editDriver button-23 edit "+editPrivilege+"'  title='Edit' data-id=" + comid+ "&"+email + "&"+driverId + "><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23 "+delPrivilege+"' data-id=" + comid+ "&"+email + "&"+driverId + " title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='removeDriverOwner button-23 '  title='Remove Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" style='color:red'><i class='fe fe-user-x'></i></a>"+
                                    "<a class='editDriverOwner button-23 '  title='Edit Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" style='color:green'><i class='fe fe-edit'></i></a>&nbsp";
                                // $('.addDriverOwner').addClass('btn-danger');
                            }
                            else if(ownerOperatorStatus == 'NO' && ownerOperatorDeleteStatus == 'NO'){
                                var actionBtnOwnerOperator="<a class='editDriver button-23 edit "+editPrivilege+"'  title='Edit' data-id=" + comid+ "&"+email + "&"+driverId +"><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23  "+delPrivilege+"' data-id=" + comid+ "&"+email + "&"+driverId +" title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='addDriverOwner button-23'  title='Add As Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" style='color:green'><i class='fe fe-user-plus'></i></a>&nbsp";
                                // $('.addDriverOwner').addClass('btn-success');
                            }else if(ownerOperatorDeleteStatus == 'YES' || ownerOperatorDeleteStatus == 'Yes' || ownerOperatorDeleteStatus == 'yes'){
                                var actionBtnOwnerOperator="<a class='editDriver button-23 edit "+editPrivilege+"'  title='Edit' data-id=" + comid+ "&"+email +"&"+driverId + "><i class='fe fe-edit'></i></a>&nbsp"+
                                    "<a class='deleteDriver button-23 "+delPrivilege+"' data-id=" + comid+ "&"+email + "&"+driverId +" title='Delete'><i class='fe fe-delete'></i></a>&nbsp"+
                                    "<a class='restoreDriverOwner button-23'  title='Restore As Owner Operator' data-id="+ driverId+" data-name="+ btoa(name)+" style='color:orange'><i class='fe  fe-user-plus'></i></a>&nbsp";

                            }
                        var tr_str1 = "<tr class='tr' data-id=" + (j + 1) + ">" +
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
        $("#addDriverOwnerModal form").trigger("reset");
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
    
        $('#addDriverOwnerModal').modal('show');  
    });

//------------------------------ start restore  ---------------------------------------------
$('.restoreDriverclose').click(function(){
    $('#RestoreDriverModal').modal('hide');
});

$("#restoreDriver").click(function(){
    $.ajax({
        type: "GET",
        url: base_path + "/admin/getDriver",
        async: false,
        success: function (RestoreResult) {
            // console.log(RestoreResult);
           RestoreDriver(RestoreResult);
        }
    });
    $('#RestoreDriverModal').modal('show');
});

function RestoreDriver(RestoreResult)
{
    
    var R_Len = 0;
    if (RestoreResult) {
        //console.log(RestoreResult);
        $("#RestoreDriverTable").html('');
        var data=RestoreResult.driver.length;
        // Driverlen = DriverResult.driver.length;
        console.log(data);
        for(var i=0; i<data; i++)
        {
            R_Len = RestoreResult.driver[i].driver.length;
            console.log(R_Len);
            if(R_Len != null)
            {
                var no=1;
                for(var j=R_Len-1; j>=0; j--)
                {
                    var com_Id=RestoreResult.driver[i].companyID;
                    var id=RestoreResult.driver[i].driver[j]._id;
                    var name =RestoreResult.driver[i].driver[j].driverName;
                    var driverEmail =RestoreResult.driver[i].driver[j].driverEmail;
                    var driverLocation =RestoreResult.driver[i].driver[j].driverLocation;
                    var driverSocial =RestoreResult.driver[i].driver[j].driverSocial;
                        if(driverSocial == null){driverSocial="-";}
                    var dateOfbirth =RestoreResult.driver[i].driver[j].dateOfbirth;
                        if(dateOfbirth == null || dateOfbirth == false){dateOfbirth="-";}
                        var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        var date_tr = new Date(dateOfbirth*1000);
                        var year_tr = date_tr.getFullYear();
                        var month_tr = months_arr_tr[date_tr.getMonth()];
                        var day_tr = date_tr.getDate();
                        var dateOfbirth = month_tr+'/'+day_tr+'/'+year_tr;
                    var dateOfHire =RestoreResult.driver[i].driver[j].dateOfHire;
                    if(dateOfHire == null ){dateOfHire="-";}
                        var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        var date_tr = new Date(dateOfHire*1000);
                        var year_tr = date_tr.getFullYear();
                        var month_tr = months_arr_tr[date_tr.getMonth()];
                        var day_tr = date_tr.getDate();
                        var dateOfHire = month_tr+'/'+day_tr+'/'+year_tr;
                    var driverLicenseNo =RestoreResult.driver[i].driver[j].driverLicenseNo;
                    var driverLicenseIssue =RestoreResult.driver[i].driver[j].driverLicenseIssue;
                    var driverLicenseExp =RestoreResult.driver[i].driver[j].driverLicenseExp;
                        var months_arr_tr = ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        var date_tr = new Date(driverLicenseExp*1000);
                        var year_tr = date_tr.getFullYear();
                        var month_tr = months_arr_tr[date_tr.getMonth()];
                        var day_tr = date_tr.getDate();
                        var driverLicenseExp = month_tr+'/'+day_tr+'/'+year_tr;
                    var driverBalance =RestoreResult.driver[i].driver[j].driverBalance;
                        if(driverBalance == null){driverBalance="-";}
                    var deleteStatus =RestoreResult.driver[i].driver[j].deleteStatus;

                    if (deleteStatus == "Yes" || deleteStatus == "YES" || deleteStatus == "yes") 
                    {
                        var R_str = "<tr class='tr' data-id=" + (i + 1) + ">" +
                            "<td data-field='no'><input type='checkbox' name='checkDriverOne[]' class='checkedIdsOneBranch' style='height: 15px;' value='"+id+"' data-comId='"+com_Id+"' data-cariierId='"+id+"'></td>" +
                            "<td >" + name + "</td>" +
                            "<td>" + driverEmail + "</td>" +
                            "<td >" + driverLocation + "</td>" +
                            "<td >" + driverSocial + "</td>" +
                            "<td>" + dateOfbirth + "</td>" +
                            "<td >" + dateOfHire + "</td>" +
                            "<td>" + driverLicenseNo + "</td>" +
                            "<td >" + driverLicenseIssue + "</td>" +
                            "<td>" + driverLicenseExp + "</td>" +
                            "<td>" + driverBalance + "</td>" +
                        $("#RestoreDriverTable").append(R_str);
                        no++;
                    }
                }
            }
            else
            {
                var R_str = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";
                $("#RestoreDriverTable").append(R_str);
            }                  
        }
    }
    else
    {
        var R_str = "<tr data-id=" + i + ">" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";
        $("#RestoreDriverTable").append(R_str);
    }
}
$(document).on("change", ".Driver_all_ids", function() 
{
    if(this.checked) {
        $('.checkedIdsOneBranch:checkbox').each(function() 
        {
            this.checked = true;
            DriverCheckboxRestore();
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
    DriverCheckboxRestore();
});
function DriverCheckboxRestore()
{
    var Driver = [];
    var companyIds=[]
        $.each($("input[name='checkDriverOne[]']:checked"), function(){
            Driver.push($(this).val());
            companyIds.push($(this).attr("data-comId"));
        });
        // console.log(Driver);
        var braOffIds =JSON.stringify(Driver);
        $('#checked_Driver').val(braOffIds);
       
        var companyCheckedIds =JSON.stringify(companyIds);
        $('#checked_Driver_company_ids').val(companyCheckedIds);

        if(Driver.length > 0)
        {
            $('#restore_DriverData').removeAttr('disabled');
        }
        else
        {
            $('#restore_DriverData').attr('disabled',true);
        }
}
$('body').on('click','.restore_DriverData',function(){
   
    var all_ids=$('#checked_Driver').val();
    //alert(all_ids);
    var custID=$("#checked_Driver_company_ids").val();
    $.ajax({
        type:"post",
        data:{
            _token:$("#drivercsrf").val(),
            all_ids:all_ids,
            custID:custID
        },
        url: base_path+"/admin/restoreDriver",
        success: function(response) {               
            swal.fire("Driver Restored successfully");
            $("#RestoreDriverModal").modal("hide");
            $.ajax({
                type: "GET",
                url: base_path+"/admin/driver",
                async: false,
                success: function(text) {
                    createDriverRows(text);
                    driverResponse = text;
                }
            });
            $("#driverModal").modal("show");
        }
    });
});
// ---------------------------------------------end restore  ---------------------------------------------




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
                  '<div class="col-sm-2">'+
                      '<label class="form-label" for="">Category</label>'+
                      '<input type="text" class="form-control" name="installmentCategory[]" list="fixpaycat" placeholder=" Enter Category" autocomplete="off" />'+
                  '</div>'+
                  '<div class="col-sm-2">'+
                      '<label class="form-label" for="">Installment Type</label>'+
                          '<select name="installmentType[]" class="form-control">'+
                              '<option value="">Select type</option>'+
                              '<option value="Weekly">Weekly</option>'+
                              '<option value="Monthly">Monthly</option>'+
                              '<option value="yearly">Yearly</option>'+
                              '<option value="Quarterly">Quarterly</option>'+
                          '</select>'+
                  '</div>'+
                  '<div class="col-sm-1">'+
                      '<label class="form-label" for="">Amount</label>'+
                      '<input name="amount[]" type="text" class="form-control" />'+
                  '</div>'+
                  '<div class="col-sm-1">'+
                      '<label class="form-label" for="">Installment</label>'+
                      '<input name="installment[]" type="text" class="form-control"  />'+
                  '</div>'+
                  '<div class="col-sm-1">'+
                      '<label class="form-label" for="">start#</label>'+
                      '<input name="startNo[]" type="text" class="form-control"  />'+
                  '</div>'+
                  '<div class="col-sm-2">'+
                      '<label class="form-label" for="">start Date</label>'+
                      '<input name="startDate[]" type="date" class="form-control" />'+
                  '</div>'+
                  '<div class="col-sm-2">'+
                      '<label class="form-label" for="">Internal Note</label>'+
                      '<textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote[]"></textarea>'+
                  '</div>'+
                  
                //   '<label class="form-label" for=""></label>'+
                    '<button type="button" class="btn btn-danger remove" style="width: auto;height:fit-content;margin-top: auto;"><spanaria-hidden="true">&times;</span>'+
                  
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
      //var driverId=$('#driverid').val();
      var driverId=$('.addDriverOwner').attr('data-id');
  
      if(ownerPercentage == ''){
           //swal.fire("Error!", "Enter Percentage", "error");
          swal.fire({title: 'Please Enter Percentage',text: 'Redirecting...',timer: 3000,buttons: false,})
          $("#ownerPercentage").focus();
          return false;
      }
      if(ownerTruckNo == ''){
         swal.fire({title: 'Please Select owner Truck No',text: 'Redirecting...',timer: 3000,buttons: false,})
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
              data: {'_token': $("#drivercsrf").val(),'id': id},
              success: function(dataResult) {
                  $('.up_optionBox').empty(); 
                  $('.optionBox').empty(); 
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
                                                      '<div class="col-sm-2">'+
                                                          '<label class="form-label" for="">Category</label>'+
                                                          '<input type="text" class="form-control" name="up_installmentCategory[]" list="fixpaycat" placeholder=" Search here..." autocomplete="off" value="'+installmentCategory +'"/>'+
                                                      '</div>'+
                                                      '<div class="col-sm-2">'+
                                                          '<label class="form-label" for="">Installment Type</label>'+
                                                              '<select name="up_installmentType[]" class="form-control test_test ">'+
                                                                  '<option value="">Select type</option>'+
                                                                  '<option value="Weekly">Weekly</option>'+
                                                                  '<option value="Monthly">Monthly</option>'+
                                                                  '<option value="yearly">Yearly</option>'+
                                                                  '<option value="Quarterly">Quarterly</option>'+
                                                              '</select>'+
                                                      '</div>'+
                                                      '<div class="col-sm-1">'+
                                                          '<label class="form-label" for="">Amount</label>'+
                                                          '<input name="up_amount[]" type="text" class="form-control" value="'+amount +'"  />'+
                                                      '</div>'+
                                                      '<div class="col-sm-1">'+
                                                          '<label class="form-label" for="">Installment</label>'+
                                                          '<input name="up_installment[]" type="text" class="form-control" value="'+installment +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-1">'+
                                                          '<label class="form-label" for="">start#</label>'+
                                                          '<input name="up_startNo[]" type="text" class="form-control" value="'+startNo +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-2">'+
                                                          '<label class="form-label" for="">start Date</label>'+
                                                          '<input name="up_startDate[]" type="date" class="form-control" value="'+startDate +'" />'+
                                                      '</div>'+
                                                      '<div class="col-sm-2">'+
                                                          '<label class="form-label" for="">Internal Note</label>'+
                                                          '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_internalNote[]">'+internalNote +'</textarea>'+
                                                      '</div>'+
                                                    //   '<div class="col-sm-1">'+
                                                    //     //   '<label class="form-label" for="">Delete</label>'+
                                                          
                                                    //       '</button>'+
                                                    //   '</div>'+
                                                      '<!-- <input type="text" /> <span class="remove">Remove Option</span> -->'+
                                                      '<button type="button" class="btn btn-danger remove" style="width: auto;height:fit-content;margin-top: auto;"><spanaria-hidden="true">&times;</span>'+
                                                  '</div>'+
                                              '</div>'+
                                          '</div>'
                      );
  
                      $(".test_test").val(installmentType);
                      
                  });
               
                  $('#editDriverOwnerModal').modal('show'); 
              },
              error: function(data){
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
$('#addDriver').click(function(){
    $('#addDriverModal').modal('show');
});

      $('.driverDataSubmit').click(function(){ 
        
            var companyID = 1;
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
            var currency = $('#currency').val();
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
              data:$('#adddriverRecurrenceForm').serialize(),
              data1:$('#subdriverRecurrenceForm').serialize(),
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
                    swal.fire({title: 'Added successfully',text: 'Redirecting...',timer: 3000,buttons: false,})
                    // swal.fire("Done!", resp.message, "success");
                    $("#addLoadBoardModal").css("z-index","100000000000");
                    $("#addDriverModal").modal('hide');
                    $("#addDriverModal form").trigger("reset");
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/driver",
                        async: false,
                        success: function(text) {
                            createDriverRows(text);
                            driverResponse = text;
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: base_path+"/admin/getDriver",
                        async: false,
                        success: function(Result) { 
                        createDriverList(Result);
                        }
                    });
                    $("#driverModal").modal('show');
                   
                } 
              },
              error: function(data){
                $.each( data.responseJSON.errors, function( key, value ) {
                    swal.fire("Error!", value[0], "error");
                });
                },
        });
        
    });
    function createDriverList(Result) {           
      var Length = 0;    
      alert();
      
      if (Result != null) {
          Length = Result.driver.length;
      }

      if (Length > 0) {
          // var no=1;
          $("#LB_Driver").html('');
          for (var i = Length-1; i >=0; i--) { 
              var DriverLength =Result.driver[i].driver.length;
              for (var j = DriverLength-1; j >=0; j--) {  
                var driverName =Result.driver[i].driver[j].driverName;
                var id =Result.driver[i].driver[j]._id;
                var deleteStatus =Result.driver[i].driver[j].deleteStatus;

                if(deleteStatus=='NO' || deleteStatus=='No' || deleteStatus=='no'){
                  var List = "<option id=''  value='"+id+"-"+ driverName +"'>" + driverName +  "<option>";                
                  $("#LB_Driver").append(List);
                }
              }
            }
      }
      
    }
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
    var addRecurrence =$('#up_adddriverRecurrenceForm').serialize();
    var subRecurrence =$('#up_subdriverRecurrenceForm').serialize();

    $.ajax({
        url:base_path+"/admin/updateDriver" ,
        type:'post',
        data:{
            _token:$("#drivercsrf").val(),
            data:addRecurrence,
            data1:subRecurrence,
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
                $('#editDriverModal').modal('hide');
                swal.fire("Done!", responsenew.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/driver",
                    success: function(text) {
                        createDriverRows(text);
                        response = text;
                    }
                });	
                $('#driverModal').modal('show');		
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
            var driver_id=result[2];
            $.ajax({
                url: base_path+"/admin/editDriver",
                type: "POST",
                datatype:"JSON",
                data: {_token: $("#drivercsrf").val(),driver_id: driver_id,com_id: com_id,email: email},
                cache: false,
                success: function(dataResult){
                    // var aa = dataResult.recurrenceAdd;
                   
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

                    var date = new Date(dataResult.dateOfbirth*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var dateOfbirth = year+'-0'+day+'-'+month;} 
                    else{ var dateOfbirth = year+'-'+month+'-'+day; }
                    $('#up_dateOfBirth').val(dateOfbirth);

                    var date = new Date(dataResult.dateOfHire*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var dateOfHire = year+'-0'+day+'-'+month;} 
                    else{ var dateOfHire = year+'-'+month+'-'+day; }
                    $('#up_dateOfHire').val(dateOfHire);
                    $('#up_licenseNo').val(dataResult.driverLicenseNo);
                    $('#up_licenseIssueState').val(dataResult.driverLicenseIssue);

                    var date = new Date(dataResult.driverLicenseExp*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var driverLicenseExp = year+'-0'+day+'-'+month;} 
                    else{ var driverLicenseExp = year+'-'+month+'-'+day; }
                    $('#up_licenseExpDate').val(driverLicenseExp);

                    var date = new Date(dataResult.driverLastMedical*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var driverLastMedical = year+'-0'+day+'-'+month;} 
                    else{ var driverLastMedical = year+'-'+month+'-'+day; }
                    $('#up_lastMedical').val(driverLastMedical);

                    var date = new Date(dataResult.driverNextMedical*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var driverNextMedical = year+'-0'+day+'-'+month;} 
                    else{ var driverNextMedical = year+'-'+month+'-'+day; }
                    $('#up_nextMedical').val(driverNextMedical);

                    var date = new Date(dataResult.driverLastDrugTest*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var driverLastDrugTest = year+'-0'+day+'-'+month;} 
                    else{ var driverLastDrugTest = year+'-'+month+'-'+day; }
                    $('#up_lastDrugTest').val(driverLastDrugTest);

                    var date = new Date(dataResult.driverNextDrugTest*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var driverNextDrugTest = year+'-0'+day+'-'+month;} 
                    else{ var driverNextDrugTest = year+'-'+month+'-'+day; }
                    $('#up_nextDrugTest').val(driverNextDrugTest);

                    var date = new Date(dataResult.passportExpiry*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var passportExpiry = year+'-0'+day+'-'+month;} 
                    else{ var passportExpiry = year+'-'+month+'-'+day; }
                    $('#up_passportExpiry').val(passportExpiry);

                    var date = new Date(dataResult.fastCardExpiry*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var fastCardExpiry = year+'-0'+day+'-'+month;} 
                    else{ var fastCardExpiry = year+'-'+month+'-'+day; }
                    $('#up_fastCardExpiry').val(fastCardExpiry);

                    var date = new Date(dataResult.hazmatExpiry*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var hazmatExpiry = year+'-0'+day+'-'+month;} 
                    else{ var hazmatExpiry = year+'-'+month+'-'+day; }
                    $('#up_hazmatExpiry').val(hazmatExpiry);
                    $('#up_rate').val(dataResult.rate);
                    $('#up_currency').val(dataResult.currency);

                    var date = new Date(dataResult.terminationDate*1000);
                    var year = date.getFullYear();
                    var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                    var day = date.getDate();
                    if(day <=9 ){ var terminationDate = year+'-0'+day+'-'+month;} 
                    else{ var terminationDate = year+'-'+month+'-'+day; }
                    $('#up_terminationDate').val(terminationDate);
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
                    
                    $array=dataResult.recurrenceAdd;
                    if($array){
                        $("#up_TextBoxContainer2").empty();
                        $.each($array, function(index,value) {
                            
                            var _id =$array[index]['_id'];
                            var installmentCategory =$array[index]['installmentCategoryStore'];
                            var installmentTypeStore =$array[index]['installmentTypeStore'];
                            var amount =$array[index]['amountStore'];
                            var installment =$array[index]['installmentStore'];
                            var startNo =$array[index]['startNoStore'];
                            var up_rec_internalNote =$array[index]['internalNoteStore'];
                            var startDate =$array[index]['startDateStore'];
                            var date = new Date(startDate*1000);
                            var year = date.getFullYear();
                            var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                            var day = date.getDate();
                            if(day <=9 ){ var startDate = year+'-0'+day+'-'+month;} 
                            else{ var startDate = year+'-'+month+'-'+day; } 

                           

                            //$("#up_TextBoxContainer2").empty();
                            $("#up_TextBoxContainer2").append('<tr>'+
                                        '<td width="150">'+
                                            '<input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="up_rec_PlusRecurrence[]" id="rec_PlusRecurrence" placeholder="Search here..." autocomplete="off" value="'+installmentCategory +'">'+
                                            '<datalist id="driverPlusRecurrence" class="driverPlusRecurrence"> </datalist>'+
                                            '</td>'+
                                        '<td width="150">'+
                                            '<input class="form-control" name="up_rec_installmentType[]" list="instatype1" autocomplete="off" value="'+installmentTypeStore +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_amount[]" type="number" class="form-control" value="'+amount +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_installment[]" type="number" class="form-control" value="'+installment +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_startNo[]" type="number" class="form-control" value="'+startNo +'"/>'+
                                        '</td>'+
                                        '<td width="10">'+
                                            '<input name="up_rec_startDate[]" type="date" class="form-control" value="'+startDate +'"/>'+
                                        '</td>'+
                                        '<td width="250">'+
                                            // '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_rec_internalNote[]" value="'+up_rec_internalNote +'"></textarea>'+
                                            '<input name="up_rec_internalNote[]" type="text" class="form-control"  title="'+up_rec_internalNote+'" value="'+up_rec_internalNote +'"/>'+
                                        '</td>'+
                                        '<td>'+
                                            '<button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span> </button>'+
                                        '</td>'+
                                        '<tr>'
                            );
                        });
                    }else{
                        $("#up_TextBoxContainer2").empty();
                        $("#up_TextBoxContainer2").append('<tr>'+
                            '<td width="150">'+
                                '<input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" placeholder="Search here..." name="up_rec_PlusRecurrence[]" id="rec_PlusRecurrence" autocomplete="off" >'+
                                '<datalist id="driverPlusRecurrence" class="driverPlusRecurrence"> </datalist>'+
                                '</td>'+
                            '<td width="150">'+
                                '<input class="form-control" name="up_rec_installmentType[]" list="instatype1" autocomplete="off" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_amount[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_installment[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_startNo[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="10">'+
                                '<input name="up_rec_startDate[]" type="date" class="form-control"/>'+
                            '</td>'+
                            '<td width="250">'+
                                '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_rec_internalNote[]" ></textarea>'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span> </button>'+
                            '</td>'+
                            '<tr>'
                        );
                    }

                    $array2=dataResult.recurrenceSubtract;
                    if($array2){
                        $("#up_TextBoxContainer3").empty();
                        $.each($array2, function(index,value) {
                            
                            var _id =$array2[index]['_id'];
                            var installmentCategory =$array2[index]['installmentCategoryStore'];
                            var installmentTypeStore =$array2[index]['installmentTypeStore'];
                            var amount =$array2[index]['amountStore'];
                            var installment =$array2[index]['installmentStore'];
                            var startNo =$array2[index]['startNoStore'];
                            var up_rec_internalNote =$array2[index]['internalNoteStore'];
                            var startDate =$array2[index]['startDateStore'];
                            var date = new Date(startDate*1000);
                            var year = date.getFullYear();
                            var month = ['01','02','03','04','05','06','07','08','09','10','11','12'][date.getMonth()];
                            var day = date.getDate();
                            if(day <=9 ){ var startDate = year+'-0'+day+'-'+month;} 
                            else{ var startDate = year+'-'+month+'-'+day; } 
                           
                            //$("#up_TextBoxContainer2").empty();
                            $("#up_TextBoxContainer3").append('<tr>'+
                                        '<td width="150">'+
                                            '<input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="up_rec_PlusRecurrence_sub[]" id="rec_PlusRecurrence" placeholder="Search here..." autocomplete="off" value="'+installmentCategory +'">'+
                                            '<datalist id="driverPlusRecurrence" class="driverPlusRecurrence"> </datalist>'+
                                            '</td>'+
                                        '<td width="150">'+
                                            '<input class="form-control" name="up_rec_installmentType_sub[]" list="instatype1" autocomplete="off" value="'+installmentTypeStore +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_amount_sub[]" type="number" class="form-control" value="'+amount +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_installment_sub[]" type="number" class="form-control" value="'+installment +'"/>'+
                                        '</td>'+
                                        '<td width="100">'+
                                            '<input name="up_rec_startNo_sub[]" type="number" class="form-control" value="'+startNo +'"/>'+
                                        '</td>'+
                                        '<td width="10">'+
                                            '<input name="up_rec_startDate_sub[]" type="date" class="form-control" value="'+startDate +'"/>'+
                                        '</td>'+
                                        '<td width="250">'+
                                            // '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_rec_internalNote[]" value="'+up_rec_internalNote +'"></textarea>'+
                                            '<input name="up_rec_internalNote_sub[]" type="text" class="form-control"  title="'+up_rec_internalNote+'" value="'+up_rec_internalNote +'"/>'+
                                        '</td>'+
                                        '<td>'+
                                            '<button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span> </button>'+
                                        '</td>'+
                                        '<tr>'
                            );
                        });
                    }else{
                        $("#up_TextBoxContainer3").empty();
                        $("#up_TextBoxContainer3").append('<tr>'+
                            '<td width="150">'+
                                '<input class="form-control driverPlusRecurrence" list="driverPlusRecurrence" name="up_rec_PlusRecurrence_sub[]" id="rec_PlusRecurrence" autocomplete="off" placeholder="Search here..." >'+
                                '<datalist id="driverPlusRecurrence" class="driverPlusRecurrence"> </datalist>'+
                                '</td>'+
                            '<td width="150">'+
                                '<input class="form-control" name="up_rec_installmentType_sub[]" list="instatype1" autocomplete="off" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_amount_sub[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_installment_sub[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="100">'+
                                '<input name="up_rec_startNo_sub[]" type="number" class="form-control" />'+
                            '</td>'+
                            '<td width="10">'+
                                '<input name="up_rec_startDate_sub[]" type="date" class="form-control"/>'+
                            '</td>'+
                            '<td width="250">'+
                                '<textarea rows="1" cols="20" class="form-control" type="textarea" name="up_rec_internalNote_sub[]" ></textarea>'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span> </button>'+
                            '</td>'+
                            '<tr>'
                        );
                    }
                    $('#editDriverModal').modal('show'); 
                }
            });
        });
    });

// ---------------------------------------------plus Recurrence   ---------------------------------------------
$('body').on('click','.driverPlusRecurrence',function(){
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
        }
        if (Len > 0) {
            for (var j = 0; j < Len; j++) {  
            Length = Result.RecurrenceCategory[j].fixPay.length;
             
                if (Length > 0) {
                    $(".driverPlusRecurrence").html('');
                    // $(".currencyList").html('');
                    for (var i = 0; i < Length; i++) {  
                        var fixPayType =Result.RecurrenceCategory[j].fixPay[i].fixPayType;
                        var fixPayTypeList = "<option id='PlusRecurrence'  value='"+ fixPayType +"'>"                   
                    $(".driverPlusRecurrence").append(fixPayTypeList);
                    }
                }
            }
        }
    }
// ---------------------------------------------end plus Recurrence  ---------------------------------------------
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
$('#Company_navbar').click(function(){  
    $.ajax({
        type: "GET",
        url: base_path+"/admin/company",
        async: false,
        success: function(text) {
            createCompanyRows(text);
            companyResponse = text;
        }
    });
    $('#companyModal').modal("show");
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
                                var filepath = companyResponse[i].company[j].file[k].filepath;
                                var file_name = companyResponse[i].company[j].file[k].Originalname;

                                var com_logo_img ="<img src='/"+filepath+"'width='100px'>";

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
                            "<td data-field='filepath'><a href='"+ filepath +"' target='_blank'>"+ com_logo_img +"</a></td>" +
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

    $('#companyDataSubmit').click(function(){            
        // var companyID = 1;
        // var companyName = $('#inputCompanyName4').val();
        // var shippingAddress = $('#inputShippingAddress4').val();
        // var telephoneNo = $('#inputTelephoneNo4').val();
        // var faxNo = $('#inputFaxNo4').val();
        // var mcNo = $('#inputMcNo4').val();
        // var usDotNo = $('#inputUsDotNo4').val();
        // var mailingAddress = $('#inputEmailAddress4').val();
        // var factoringCompany = $('#customerBFactoringCompany1').val();
        // var website = $('#inputWebsite4').val();
        // var file = $('#file').val();  
        
        var form = document.forms.namedItem("addCompanyForm");
        var formData = new FormData(form); 
    $.ajax({
        url: base_path+"/admin/addCompany",
        type: "POST",
        datatype:"JSON",
        contentType: false,
        data: formData,
        processData: false,
        cache: false,
        success: function(resp){
            if(resp.success == true){
                swal.fire("Done!", resp.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/company",
                    async: false,
                    success: function(text) {
                        createCompanyRows(text);
                        companyResponse = text;
                    }
                });
                $("#addCompanyModal form").trigger("reset");
            } 
          },
          error: function(data){
            $.each( data.responseJSON.errors, function( key, value ) {
                swal.fire("Error!", value[0], "error");
            });
            },
    });
});

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
                // console.log(data)                    
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
                // console.log(data)                    
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
    rec_PlusRecurrence.splice(index, 1);
    rec_installmentType.splice(index, 1);
    rec_amount.splice(index, 1);
    rec_installment.splice(index, 1);
    rec_startNo.splice(index, 1);
    rec_startDate.splice(index, 1);
    rec_internalNote.splice(index, 1);
}

function GetDynamicRecurrence(value) {
    return '<td width="150">' +
        '<input class="form-control driverPlusRecurrence" value = "' + value +
        '" name="rec_PlusRecurrence[]" ' +
        ')" list="driverPlusRecurrence" autocomplete="off"/></td>' +
        '<td width="150">' +
        '<input class="form-control rec_installmentType" value = "' + value +
        '" name="rec_installmentType[]" list="instatype1" autocomplete="off"/></td>' +
        '<td width="100">' +
        '<input name="rec_amount[]" type="number" value = "' + value + '" class="form-control rec_amount" /></td>' +
        '<td width="100">' +
        '<input name="rec_installment[]" type="number" value = "' + value + '" class="form-control rec_installment" /></td>' +
        '<td width="100"><input name="rec_startNo[]" type="number" value = "' + value + '" class="form-control rec_startNo" /></td>' +
        '<td width="10"><input name="rec_startDate[]" type="date" value = "' + value + '" class="form-control rec_startDate" /></td>' +
        '<td width="250"><textarea rows="1" cols="30" value = "' + value +
        '" class="form-control rec_internalNote" type="textarea" name="rec_internalNote[]"></textarea></td>' +
        '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>';
}
// <!-- ------------------------------------------------------------------------- End of Add Recurrence ------------------------------------------------------------------------- -->
// <!-- ------------------------------------------------------------------------- update Add Recurrence ------------------------------------------------------------------------- -->
$(function() {
    $("#up_btnAdd2").bind("click", function() {
        var div = $("<tr />");
        div.html(up_GetDynamicRecurrence(""));
        $("#up_TextBoxContainer2").append(div);
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
    up_rec_PlusRecurrence.splice(index, 1);
    up_rec_installmentType.splice(index, 1);
    up_rec_amount.splice(index, 1);
    up_rec_installment.splice(index, 1);
    up_rec_startNo.splice(index, 1);
    up_rec_startDate.splice(index, 1);
    up_rec_internalNote.splice(index, 1);
}

function up_GetDynamicRecurrence(value) {
    return '<td width="150">' +
        '<input class="form-control driverPlusRecurrence" value = "' + value +
        '" name="up_rec_PlusRecurrence[]" placeholder="Search here..."' +
        ')" list="driverPlusRecurrence" autocomplete="off"/></td>' +
        '<td width="150">' +
        '<input class="form-control" value = "' + value +
        '" name="up_rec_installmentType[]" list="instatype1" autocomplete="off"/></td>' +
        '<td width="100">' +
        '<input name="up_rec_amount[]" type="number" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100">' +
        '<input name="up_rec_installment[]" type="number" value = "' + value + '" class="form-control" /></td>' +
        '<td width="100"><input name="up_rec_startNo[]" type="number" value = "' + value + '" class="form-control" /></td>' +
        '<td width="10"><input name="up_rec_startDate[]" type="date" value = "' + value + '" class="form-control" /></td>' +
        '<td width="250"><textarea rows="1" cols="30" value = "' + value +
        '" class="form-control" type="textarea" name="up_rec_internalNote[]"></textarea></td>' +
        '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>';
}
// <!-- ------------------------------------------------------------------------- End update of Add Recurrence ------------------------------------------------------------------------- -->

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
    rec_PlusRecurrence.splice(index, 1);
    rec_installmentType.splice(index, 1);
    rec_amount.splice(index, 1);
    rec_installment.splice(index, 1);
    rec_startNo.splice(index, 1);
    rec_startDate.splice(index, 1);
    rec_internalNote.splice(index, 1);
}

function GetDynamicRecurrencesubstract(value) {
    return '<td width="150">' +
    '<input class="form-control driverPlusRecurrence" value = "' + value +
    '" name="rec_PlusRecurrence_sub[]" ' +
    ')" list="driverPlusRecurrence" autocomplete="off"/></td>' +
    '<td width="150">' +
    '<input class="form-control" value = "' + value +
    '" name="rec_installmentType_sub[]" list="instatype1" autocomplete="off"/></td>' +
    '<td width="100">' +
    '<input name="rec_amount_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="100">' +
    '<input name="rec_installment_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="100"><input name="rec_startNo_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="10"><input name="rec_startDate_sub[]" type="date" value = "' + value + '" class="form-control" /></td>' +
    '<td width="250"><textarea rows="1" cols="30" value = "' + value +
    '" class="form-control" type="textarea" name="rec_internalNote_sub[]"></textarea></td>' +
    '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>';
}
// <!-- ------------------------------------------------------------------------- End of Minus Recurrence ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------update Minus Recurrence ------------------------------------------------------------------------- -->
$(function() {
    $("#up_btnAdd3").bind("click", function() {
        var div = $("<tr />");
        div.html(up_GetDynamicRecurrencesubstract(""));
        $("#up_TextBoxContainer3").append(div);
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
    up_rec_PlusRecurrence.splice(index, 1);
    up_rec_installmentType.splice(index, 1);
    up_rec_amount.splice(index, 1);
    up_rec_installment.splice(index, 1);
    up_rec_startNo.splice(index, 1);
    up_rec_startDate.splice(index, 1);
    up_rec_internalNote.splice(index, 1);
}

function up_GetDynamicRecurrencesubstract(value) {
    return '<td width="150">' +
    '<input class="form-control driverPlusRecurrence" value = "' + value +
    '" name="up_rec_PlusRecurrence_sub[]" placeholder="Search here..." ' +
    ')" list="driverPlusRecurrence" autocomplete="off"/></td>' +
    '<td width="150">' +
    '<input class="form-control" value = "' + value +
    '" name="up_rec_installmentType_sub[]" list="instatype1" autocomplete="off"/></td>' +
    '<td width="100">' +
    '<input name="up_rec_amount_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="100">' +
    '<input name="up_rec_installment_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="100"><input name="up_rec_startNo_sub[]" type="number" value = "' + value + '" class="form-control" /></td>' +
    '<td width="10"><input name="up_rec_startDate_sub[]" type="date" value = "' + value + '" class="form-control" /></td>' +
    '<td width="250"><textarea rows="1" cols="30" value = "' + value +
    '" class="form-control" type="textarea" name="up_rec_internalNote_sub[]"></textarea></td>' +
    '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>';
}
// <!-- ------------------------------------------------------------------------- End of update Minus Recurrence ------------------------------------------------------------------------- -->

//get truck
    // $('.fuel_truck_report').focus(function(){
    //     //alert(); 
    //     $.ajax({
    //         type: "GET",
    //         url: base_path+"/admin/fuel_truck_report",
    //         async: false,
    //         //dataType:JSON,
    //         success: function(fuel_truck_reportResult) {                    
    //             createfuel_truck_reportList(fuel_truck_reportResult);
    //             fuel_truck_reportResponse = fuel_truck_reportResult;
    //         }
    //     });
    // });

    // function createfuel_truck_reportList(fuel_truck_reportResponse) {           
    //     var fuel_truck_reportLength = 0;    
        
    //     if (fuel_truck_reportResponse != null) {
    //         fuel_truck_reportLength = fuel_truck_reportResponse.currency.length;
    //     }

    //     if (fuel_truck_reportLength > 0) {
    //        // var no=1;
    //         $(".fuel_truck_report").html('');
    //         $(".currencyList").html('');
    //         for (var i = 0; i < fuel_truck_reportLength; i++) {  
    //             var currency =fuel_truck_reportResponse.currency[i].currencyType;
    //             //var fuel_truck_report = "<option id='fuel_truck_report' value='"+ currency +"'>"+ currency +"</option>"
    //             //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";                  

    //            var fuel_truck_reportList = "<option id='fuel_truck_report'  value='"+ currency +"'>"                   
    //            $(".fuel_truck_report").append(fuel_truck_reportList);
    //            //<option value="Edge">
    //             //no++;

    //         }
    //     }
        
    // }
// over truck

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



$(document).ready(function(){

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
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    // return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    }
   
    // excel =======================================================by bhagvati
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