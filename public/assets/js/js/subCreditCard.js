var base_path = $("#url").val();
$(document).ready(function() {

// <!-- -------------------------------------------------------------------------start ------------------------------------------------------------------------- -->  
    $('.subCreditCardClose').click(function(){
        $('#subCreditCardModal').modal('hide');
    });


// <!-- -------------------------------------------------------------------------Get fuelReceipt  ------------------------------------------------------------------------- -->  
   
    $('#subCreditCard_navbar').click(function(){
        //alert();
        $.ajax({
            type: "GET",
            url: base_path+"/admin/getsubCreditCard",
            async: false,
            //dataType:JSON,
            success: function(text) {
                //alert();
                console.log(text);
                createSubCreditCardRows(text);
                subCreditCardResult = text;
              }
        });
        $('#subCreditCardModal').modal('show');
    });


// <!-- -------------------------------------------------------------------------over Get fuelReceipt  ------------------------------------------------------------------------- --> 
// <!-- -------------------------------------------------------------------------function  ------------------------------------------------------------------------- --> 
    
// get truck
    function createSubCreditCardRows(subCreditCardResult) {
        var subCreditCardlen = 0;
        var no=1;
        //alert(FuelVendorResult);
            if (subCreditCardResult != null) {
                $("#subCreditCardTable").html('');
                subCreditCardlen = subCreditCardResult.SubCreditCard.length;
                CreditCardlen = subCreditCardResult.CreditCard.length;
//alert(CreditCardlen);
                if (subCreditCardlen > 0) {
                    for (var i = subCreditCardlen-1; i >= 0; i--) { 
                        
                        sub_credit_len = subCreditCardResult.SubCreditCard[i].sub_credit.length;
                        //alert(sub_credit_len);
                        var Id =subCreditCardResult.SubCreditCard[i]._id;
                        var sub_cred_com_Id =subCreditCardResult.SubCreditCard[i].companyID;

                        //alert(bankAdminlen);
                        if (sub_credit_len > 0) {
                            for (var j = sub_credit_len-1; j >= 0; j--) {

                                var sub_credit_Id =subCreditCardResult.SubCreditCard[i].sub_credit[j]._id;
                                var  displayName=subCreditCardResult.SubCreditCard[i].sub_credit[j].displayName;
                                var  mainCardId=subCreditCardResult.SubCreditCard[i].sub_credit[j].mainCard;
                                if(CreditCardlen > 0){
                                    for (var m = CreditCardlen-1; m >= 0; m--) {
                                        var cred_com_Id =subCreditCardResult.CreditCard[m].companyID;
                                        if(sub_cred_com_Id == cred_com_Id){
                                            admin_credit_len = subCreditCardResult.CreditCard[m].admin_credit.length;
                                            for (var n = admin_credit_len-1; n >= 0; n--) {
                                                var  creditCardId=subCreditCardResult.CreditCard[m].admin_credit[n]._id;
                                                if(creditCardId == mainCardId){
                                                    var  mainCard=subCreditCardResult.CreditCard[m].admin_credit[n].displayName;
                                                }
                                                
                                            }
                                           // mainCard=subCreditCardResult.CreditCard[m].displayName;
                                        }else{
                                            mainCard='not found';
                                        }
                                        //alert(cred_com_Id);
                                    }
                                }
                                var  cardHolderName=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardHolderName;
                                var  cardNo=subCreditCardResult.SubCreditCard[i].sub_credit[j].cardNo;
                                
                                // var openingBalance=parseFloat(openingBalance).toFixed(2);
                                var deleteStatus =subCreditCardResult.SubCreditCard[i].sub_credit[j].deleteStatus;

                                if(deleteStatus == "NO"){
                                        //alert("ff");
                                        var subCreditCardStr = "<tr data-id=" + (i + 1) + ">" +
                                        "<td data-field='no'>" + no + "</td>" +
                                        "<td data-field='displayName' >" + displayName + "</td>" +
                                        "<td data-field='mainCard' >" + mainCard + "</td>" +
                                        "<td data-field='cardHolderName' >" + cardHolderName + "</td>" +
                                        "<td data-field='cardNo' >" + cardNo + "</td>" +
                                       
                                       
                                        "<td style='text-align:center'>"+
                                            "<a class='mt-2 btn btn-primary fs-14 text-white editCurrency'  title='Edit1' data-Id='"+sub_credit_Id+"' data-truckType='' ><i class='fe fe-edit'></i></a>&nbsp"+
                                        "</td></tr>";
            
                                    $("#subCreditCardTable").append(subCreditCardStr);
                                    no++;
                                }
                            }
                        }
                    }
                    
                }else {
                            var subCreditCardStr = "<tr data-id=" + i + ">" +
                                "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                
                            $("#subCreditCardTable").append(subCreditCardStr);
                }
            
            }else {
            var subCreditCardStr = "<tr data-id=" + i + ">" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#subCreditCardTable").append(subCreditCardStr);
        }
    }

   

// <!-- -------------------------------------------------------------------------End------------------------------------------------------------------------- --> 

//========================================== start insert data ==================================
$(".StoreSubCreditBtn").click(function(){
    
})
//========================================= end insert data =====================================


});