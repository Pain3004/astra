$(document).ready(function(){
   
    // $('#useredit').on('click', function() {
    //           var id = $('#id').val();
    //           var firstname = $('#editFirstName4').val();
    //           var lastname = $('#editLastName4').val();
    //           var username = $('#editUsername4').val();
    //           var email = $('#editEmail4').val();
    //           var password = $('#editPassword4').val();
    //           var userEmail = $('#email4').val();
    //           var address = $('#editAddress').val();
    //           var location = $('#editLocation').val();
    //           var zip = $('#editZip').val();
    //           var companyname = 1;
    //           var office = 1;
    //           var telephone = $('#editTelephone').val();
    //           var ext = $('#editExt').val();
    //           var tollfree = $('#editTollFree').val();
    //           var fax = $('#editFax').val();
    //           var tr_str3 = "<tr data-id=" + id + ">" +
    //                         "<td data-field='id'>" + id + "</td>" +
    //                         "<td data-field='email' id="+email+">" + email + "</td>" +
    //                         "<td data-field='username'>" + username + "</td>" +
    //                         "<td data-field='fistname'>" + firstname + "</td>" +
    //                         "<td data-field='lastname'>" + lastname + "</td>" +
    //                         "<td data-field='address'>" + address + "</td>" +
    //                         "<td data-field='location'>" + location + "</td>" +
    //                         "<td data-field='zip'>" + zip + "</td>" +
    //                         "<td data-field='telephone'>" + telephone + "</td>" +
    //                         "<td data-field='ext'>" + ext + "</td>" +
    //                         "<td data-field='tollfree'>" + tollfree + "</td>" +
    //                         "<td data-field='fax'>" + fax + "</td>" +
    //                         "<td style='width: 100px'><a class='btn btn-primary fs-14 text-white edit-icn edit1' id='editmodel' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 mt-2 btn btn-danger fs-14 text-white delete-icn' data-id="+ email +" title='Delete'><i class='fe fe-delete'></i></a></td></tr>";
    //               $.ajax({
    //                   url: base_path+"/admin/edit-user",
    //                   type: "POST",
    //                   data: {
    //                       _token: $("#newcsrf").val(),
    //                     email: userEmail,
    //                     userName: username,
    //                     userFirstName: firstname,
    //                     userLastName: lastname,
    //                     userEmail: email,
    //                     userPassword: password,
    //                     userAddress: address,
    //                     userLocation: location,
    //                     userZip: zip,
    //                     userTelephone: telephone,
    //                     companyName: companyname,
    //                     office: office,
    //                     userExt: ext,
    //                     TollFree: tollfree,
    //                     userFax: fax,
    //                   },
    //                   cache: false,
    //                   success: function(response){
    //                       var responsenew = JSON.parse(response);
    //                     if(responsenew.statusCode===200){
    //                         swal.fire("Done!", responsenew.message, "success");
    //                         $.ajax({
    //                             type: "GET",
    //                             url: base_path+"/admin/user",
    //                             success: function(text) {
    //                                 createRows(text);
    //                                 response = text;
    //                             }
    //                         });		
    //                     }
    //                   },
    //                   error: function(data){
    //                     $.each( data.responseJSON.errors, function( key, value ) {
    //                         swal.fire("Error!", value[0], "error"); 
    //                     });
    //                     },
    //               });
    //       }); 

});

// $(document).ready(function(){
//     $(".userEditModalCloseButton").on("click",function(){
//         $('#userEditModal').modal("hide");
//     });
//     $('#userEditModal').modal({
//         backdrop: 'static',
//         keyboard: false
//     })
// });




