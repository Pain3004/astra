var base_path = $("#url").val();
$(document).ready(function() {
    // =======  start view users ==========================================
    $(".userModalClose").click(function(){
        $("#userModal").modal("hide");
    });
   
    $("#userModalNav").click(function(){
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
        $("#userModal").modal("show");
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
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getCustomerBFactoringCompany",
            async: false,
            //dataType:JSON,
            success: function(customerBFactoringCompanyResult) {
                //console.log(customerCurrencyResult);
                createCustomerBFactoringCompanyList(customerBFactoringCompanyResult);
                customerBFactoringCompanyResponse = customerBFactoringCompanyResult;
            }
        });
    });
    function createRows(response) {
        var len = 0;
        $('#table1').empty(); 
        if (response != null) {
            len = response.length;
        }
    
        if (len > 0) {
            
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
                    "<td style='width: 100px'><a class='button-23 edit1' id='editmodel' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 button-23' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
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
   
    //=========== end view user ===========================================


    // privilligies validation ===========================================
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
    function usermodal()
    {
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
                if (e.value === true) 
                {
                    $.ajax({ 
                        type: 'POST',
                        url: base_path+"/admin/delete-user",
                        data: {userEmail: email},
                        success: function (resp) 
                        {
                            if (resp.success === true) 
                            {
                                swal.fire("Done!", resp.message, "success");
                                rowToDelete.remove();
                            } else 
                            {
                                swal.fire("Error!", resp.message, "error");
                            }
                        },
                        error: function (resp) 
                        {
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
    }
    (function() {
        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
    })();
    
    // end privilligies =================================================

    // start store user ==================================================
    $('#addUserModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $("#addUser").click(function(){
        $("#addUserModal").modal("show");
    });
    $(".addUserModalClose").click(function(){
        $("#addUserModal").modal("hide");
    });
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
        if(firstname =="")
        {
            swal.fire( "Enter First  Name");
                $('#inputFirstName4').focus();
                return false;
        }
        if(lastname =="")
        {
            swal.fire( "Enter Last  Name");
                $('#inputLastName4').focus();
                return false;
        }
        if(username =="")
        {
            swal.fire( "Enter User  Name");
                $('#inputUsername4').focus();
                return false;
        }
        if(email =="")
        {
            swal.fire( "Enter Email");
            $('#inputEmail4').focus();
            return false;
        }
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if(testEmail.test(email)==false)
        {
            swal.fire( "Enter Valid Email");
            $('#inputEmail4').focus();
            return false;
        }
        if(password =="")
        {
            swal.fire( "Enter Password ");
                $('#inputPassword4').focus();
                return false;
        }
        if(address =="")
        {
            swal.fire( "Enter Address");
                $('#inputAddress').focus();
                return false;
        }       
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
                trailerType: value13,
                equipmentType: value14,
                statusType: value15,
                loadType: value16,
                fuelCardType: value17,
                fixPayCategory: value18,
                currencySetting: value19,
                addNote: value20,
                paymentTerms: value21,
                dispactherIncentive: value22,
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
                creditCard: value35,
                subCreditCard: value36,
                iftaCard: value37,
                fuel_vendor: value38,
                ifta: value39,
                Fuel_reciepts_cash_advance: value40,
                tolls:toll,
                IFTA_trips:IFTA_trip,
                accountManager: value41,
                paymentRegistration: value42,
                advancePayment: value43,
                manageReceipt: value44,
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
                inser_user:inser_user,
                update_user:update_user,
                delete_user:delete_user,
                import_user:import_user,
                export_user:export_user,
            },
            cache: false,
            success: function(resp){
                $("#addUserModal").modal("hide");
                if(resp.success === true){
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
    // end store users ==================================================


    // start office add ================================================
    $(".add_office_model_form_btn").click(function(){    
        $("#add_office_modal_form").modal("show");
    });
    $('#add_office_modal_form').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
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
    function createOfficeAddressList(officeAddressData)
    {
        var officeTypelength = 0; 
        if (officeAddressData != null) 
        {
            officeTypelength = officeAddressData.office.length;
        }
        if (officeTypelength > 0) 
        {
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
            }            
        }     
    }
    // end office add =================================================

    // start add company ==============================================
    $("#plusFactoringCompany4").click(function(){
        $("#factoringCompanyModal").modal("show");
    })
    $('#addCompanyModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    $(".add_Company_Name_modal_form_btn").click(function(){
        
        $("#addCompanyModal").modal("show");
    });
    $(".closoAddCompanyModal").click(function(){
        $("#addCompanyModal").modal("hide");
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
            $(".set_company_name").html('');
            for (var i=0; i<companyDetailLength; i++) 
            {  
                var companyName =companyDetails.company[i].companyName;
                var companyId =companyDetails.company[i]._id;
                if(companyDetails.company[i].deleteStatus == "NO")
                {
                    if(companyName !==null)
                    {
                        var companyDetailsList = "<option  value='"+ companyId +"'>"+ companyName +" </option>";
                    }   
                }             
                $(".set_company_name").append(companyDetailsList);
            }            
        }     
    }
    function createCustomerBFactoringCompanyList(customerBFactoringCompanyResponse) {  
        var customerBFactoringCompanyLength = 0;  
        if (customerBFactoringCompanyResponse != null) {
           var customerBFactoringCompanyLength = customerBFactoringCompanyResponse.factoring.length;         
        }

        if (customerBFactoringCompanyLength > 0) {
            $(".customerBFactoringCompanySet").html('');
           
            for ( var i = customerBFactoringCompanyLength-1; i>= 0; i--) {  
                var factoringCompanyname =customerBFactoringCompanyResponse.factoring[i].factoringCompanyname;
                var factoringCompanyId =customerBFactoringCompanyResponse.factoring[i]._id;
                var customerFactoringCompanyname = "<option  value='"+ factoringCompanyId +"'>"+ factoringCompanyname +"</option>"
                //"<a class='dropdown-item custCurrency' value='"+ currency +"'>"+ no +" )"+ currency +"</a>";

                $(".customerBFactoringCompanySet").append(customerFactoringCompanyname);
                // $(".customerCurrencySet").html(customerCurrency);
            
            

            }
        }
        
    }
    $('#companyDataSubmit').click(function(){            
        // var companyID = 1;
        var companyName = $('#inputCompanyName4').val();
        // var shippingAddress = $('#inputShippingAddress4').val();
        var telephoneNo = $('#inputTelephoneNo4').val();
        // var faxNo = $('#inputFaxNo4').val();
        // var mcNo = $('#inputMcNo4').val();
        // var usDotNo = $('#inputUsDotNo4').val();
        var mailingAddress = $('#inputEmailAddress4').val();
        // var factoringCompany = $('#customerBFactoringCompany1').val();
        // var website = $('#inputWebsite4').val();
        // var file = $('#file').val(); 
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i; 
        if(companyName == "")
        {
              swal.fire( "Enter Company Name");
            return false;           
        }
        if(telephoneNo == "")
        {
              swal.fire( "Enter  telephone No");
            return false;           
        }
        if(mailingAddress == "")
        {
              swal.fire( "Enter Email address");
            return false;           
        }
        if(testEmail.test(mailingAddress)== false)
        {
            alert( "Enter valid Email address");
            return false;   
        }
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
                        url: base_path+"/admin/get_company_details",
                        async: false,
                        //dataType:JSON,
                        success: function(data) {                   
                            createCompanyListData(data);
                            companyDetails = data;
                        }
                    });
                    $("#addCompanyModal").modal("hide");
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
    // end add company ================================================



    // start edit user =================================================
    $(".userEditModalCloseButton").on("click",function(){
        $('#userEditModal').modal("hide");
    });
    $('#userEditModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    $('#useredit').on('click', function() {
        var id = $('#id').val();
        var firstname = $('#editFirstName4').val();
        var lastname = $('#editLastName4').val();
        var username = $('#editUsername4').val();
        var email = $('#editEmail4').val();
        var password = $('#editPassword4').val();
        var userEmail = $('#email4').val();
        var address = $('#editAddress').val();
        var location = $('#editLocation').val();
        var zip = $('#editZip').val();
        var companyname = 1;
        var office = 1;
        var telephone = $('#editTelephone').val();
        var ext = $('#editExt').val();
        var tollfree = $('#editTollFree').val();
        var fax = $('#editFax').val();
        var tr_str3 = "<tr data-id=" + id + ">" +
                      "<td data-field='id'>" + id + "</td>" +
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
                      "<td style='width: 100px'><a class='btn btn-primary fs-14 text-white edit-icn edit1' id='editmodel' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 mt-2 btn btn-danger fs-14 text-white delete-icn' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
        if(firstname =="")
        {
            swal.fire( "Enter First  Name");
                $('#editFirstName4').focus();
                return false;
        }
        if(lastname =="")
        {
            swal.fire( "Enter Last  Name");
                $('#editLastName4').focus();
                return false;
        }
        if(username =="")
        {
            swal.fire( "Enter User  Name");
                $('#editUsername4').focus();
                return false;
        }
        if(email =="")
        {
            swal.fire( "Enter Email");
            $('#editEmail4').focus();
            return false;
        }
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if(testEmail.test(email)==false)
        {
            swal.fire( "Enter Valid Email");
            $('#editEmail4').focus();
            return false;
        }
        if(password =="")
        {
            swal.fire( "Enter Password ");
                $('#editPassword4').focus();
                return false;
        }
        if(address =="")
        {
            swal.fire( "Enter Address");
                $('#editAddress').focus();
                return false;
        } 
        $.ajax({
            url: base_path+"/admin/edit-user",
            type: "POST",
            data: {
                _token: $("#newcsrf").val(),
            email: userEmail,
            userName: username,
            userFirstName: firstname,
            userLastName: lastname,
            userEmail: email,
            userPassword: password,
            userAddress: address,
            userLocation: location,
            userZip: zip,
            userTelephone: telephone,
            companyName: companyname,
            office: office,
            userExt: ext,
            TollFree: tollfree,
            userFax: fax,
            },
            cache: false,
            success: function(response){
                var responsenew = JSON.parse(response);
            if(responsenew.statusCode===200){
                $("#userEditModal").modal("hide");
                swal.fire("Done!", responsenew.message, "success");
                $.ajax({
                    type: "GET",
                    url: base_path+"/admin/user",
                    success: function(text) {
                        createRows(text);
                        response = text;
                    }
                });		
            }
            },
            error: function(data){
            $.each( data.responseJSON.errors, function( key, value ) {
                swal.fire("Error!", value[0], "error"); 
            });
            },
        });
    }); 

    // end eidt user ====================================================
});