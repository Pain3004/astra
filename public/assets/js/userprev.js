function changeTab(name) {
  
    for (i = 1; i <= 7; i++) {
        console.log(i);
        $("#tab-" + i).removeClass("active");
    }
    console.log(name);
    $("#" + name).addClass("active");
}

function managePriviladgeSelect(menu) {
    console.log(menu);
    let menuArr = ['dashboard_priviladge_main', 'custom_priviladge_main', 'admin_priviladge_main', 'ifta_priviladge_main', 'account_priviladge_main', 'report_priviladge_main' ,'settlements_priviladge_main'];
    for (let i = 0; i <= 6; i++) {
        if (menu.id == menuArr[i]) {
            $('#'+ menuArr[i]).addClass('selectedpriviladge');
            continue;
        }
        $('#'+ menuArr[i]).removeClass('selectedpriviladge');
    }
}

function changeTab1(name) {
  
    for (i = 1; i <= 7; i++) {
        $("#tab1-" + i).removeClass("active");
    }
    $("#" + name).addClass("active");
}


//Privilege
var edit=$('#updateUser').val();
var delet =$('#deleteUser').val();

if(edit == 1){
   var editPrivilege=''; 
}else{
    var editPrivilege='privilege';
}
if(delet == 1){
    var delPrivilege=''; 
 }else{
     var delPrivilege='privilege';
 }


var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.UserPrivillegeClose').click(function(){
        $('#UserPrivillegeModal').modal('hide');
    });

 

// <!-- -------------------------------------------------------------------------Get   ------------------------------------------------------------------------- -->  
   
    $('#UserPrivillege_navbar').click(function(){
        $('#UserPrivillegeModal').modal('show');
    });

        // <!-- -------------------------------------------------------------------------get PrivillegeUserList ------------------------------------------------------------------------- -->  
   // $('.list select').selectpicker();   
   $('#PrivillegeUser').focus(function(){
        //alert("w"); 
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getEditPrivilegeUser",
            async: false,
            //dataType:JSON,
            success: function(Result) {    
                createGetPrivilegeUserList(Result);
            }
        });
    });

    function createGetPrivilegeUserList(Response) {           
        var Length = 0;    
        
        if (Response != null) {
            Length = Response.length;
        }

        if (Length > 0) {
            // var no=1;
            $(".PrivillegeUserList").html('');
           
            for (var i = 0; i < Length; i++) {  
                var userFirstName =Response[i].userFirstName;
                var userLastName =Response[i].userLastName;
                var userEmail =Response[i].userEmail;
                var userId =Response[i].userEmail;
                var privillegeUserList = "<option id='userNamePriv'  Data-email='"+userEmail+"'  value='"+ userFirstName+" "+ userLastName +"'>"                   
                //var privillegeUserList="<option class='userNamePriv' value='"+userEmail+"'> "+ userFirstName+" "+ userLastName +" </option>"
                $(".PrivillegeUserList").append(privillegeUserList);

                //<option value="Edge">
                //no++;

            }
        }
        
    }
// <!-- -------------------------------------------------------------------------over get PrivillegeUserList ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------editPrivilege  ------------------------------------------------------------------------- -->  
    // $('#searchUser').click(function(){
    //     var rr= $('#PrivillegeUser option:selected').attr('Data-email');
    //     // var rr= $('#PrivillegeUser').val();
    //     var rrr= $('.userNamePriv').val();
    //     alert(rr);
    //     $.ajax({
    //         type: "GET",
    //         url: base_path+"/admin/editPrivilege",
    //         async: false,
    //         success: function (result) {
    //             console.log(result);
    //             // $("#privilege-data1").html(result);
    //         }
    //     });
    // });

    $("#PrivillegeUser").change(function(){
        var rr= $(this).val();
        var rrr= $('.userNamePriv').val();
        alert(rr);
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editPrivilege",
            async: false,
            success: function (result) {
                console.log(result);
                // $("#privilege-data1").html(result);
            }
        });
      });
// <!-- -------------------------------------------------------------------------over ------------------------------------------------------------------------- -->
// <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 

});