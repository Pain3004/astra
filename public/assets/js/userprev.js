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
function up_managePriviladgeSelect(menu) {
    console.log(menu);
    let menuArr = ['up_dashboard_priviladge_main', 'up_custom_priviladge_main', 'up_admin_priviladge_main', 'up_ifta_priviladge_main', 'up_account_priviladge_main', 'up_report_priviladge_main' ,'up_settlements_priviladge_main'];
    for (let i = 0; i <= 6; i++) {
        if (menu.id == menuArr[i]) {
            $('#'+ menuArr[i]).addClass('selectedpriviladge');
            continue;
        }
        $('#'+ menuArr[i]).removeClass('selectedpriviladge');
    }
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
            url: base_path+"/admin/getEditPrivilegeUserList",
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
                // var privillegeUserList = "<option id='userNamePriv'  Data-email='"+userEmail+"'  value='"+ userFirstName+" "+ userLastName +"'></option>"                   
                var privillegeUserList="<option class='userNamePriv' value='"+userEmail+"'> "+ userFirstName+" "+ userLastName +" </option>"
                $(".PrivillegeUserList").append(privillegeUserList);

                //<option value="Edge">
                //no++;

            }
        }
        
    }
    // <!-- -------------------------------------------------------------------------over get PrivillegeUserList ------------------------------------------------------------------------- -->
    // <!-- -------------------------------------------------------------------------editPrivilege  ------------------------------------------------------------------------- -->  

    $("#PrivillegeUser").change(function(){
       var emailId= $(this).val();

       
       // var rr= $(this).attr('DataEmail');
        var rrr= $('.userNamePriv').val();
        //alert(emailId);
        $.ajax({
            type: "GET",
            url: base_path+"/admin/editPrivilegeUser",
            data:{emailId:emailId},
            async: false,
            success: function (result) {
                console.log(result);
                
                if(result.user_type != "admin"){
                    var insertUser = result.privilege['insertUser'];
                    var updateUser = result.privilege['updateUser'];
                    var deleteUser = result.privilege['deleteUser'];
                    var importUser = result.privilege['importUser'];
                    var exportUser = result.privilege['exportUser'];


                    if( insertUser =='1'|| insertUser ==1){$('#insert_user').prop('checked',true);}else{ $('#insert_user').prop('checked',false);}
                    if( updateUser =='1' || updateUser ==1){$('#update_user').prop('checked',true);}else{ $('#update_user').prop('checked',false);}
                    if( deleteUser =='1' || deleteUser ==1){$('#delete_user').prop('checked',true);}else{ $('#delete_user').prop('checked',false);}
                    if( importUser =='1' || importUser ==1){$('#import_user').prop('checked',true);}else{ $('#import_user').prop('checked',false);}
                    if( exportUser =='1' || exportUser ==1){$('#export_user').prop('checked',true);}else{ $('#export_user').prop('checked',false);}

                    var db_profit_loss = result.dashboard['profit_loss'];
                    var db_dispatcher = result.dashboard['dispatcher'];
                    var db_driver = result.dashboard['driver'];
                    var db_company = result.dashboard['company'];
                    var db_truck = result.dashboard['truck'];
                    var db_carrier = result.dashboard['carrier'];
                    var db_equipment = result.dashboard['equipment'];
                    var db_sales_representative = result.dashboard['sales_representative'];
                    var db_new_active_load = result.dashboard['new_active_load'];

                    if( (db_new_active_load =='1'  &&  db_profit_loss =='1'  &&  db_dispatcher =='1'  &&  db_driver =='1'  &&  db_company =='1'  && db_truck =='1'  &&  db_carrier =='1'  && db_equipment =='1'  && db_sales_representative=='1') || (db_new_active_load ==1  &&  db_profit_loss ==1  &&  db_dispatcher ==1  &&  db_driver ==1  &&  db_company ==1  && db_truck ==1  &&  db_carrier ==1  && db_equipment ==1  && db_sales_representative==1 )  ){
                        $('#up_select-all_l').prop('checked',true);
                        
                    }else{ 
                        $('#up_select-all_lSelect All_l1').prop('checked',false);
                        
                    }
                    if( db_new_active_load =='1' || db_new_active_load ==1){$('#upcheckbox-1').prop('checked',true);}else{ $('#upcheckbox-1').prop('checked',false);}
                    if( db_profit_loss =='1' || db_profit_loss ==1){$('#upcheckbox-2').prop('checked',true);}else{ $('#upcheckbox-2').prop('checked',false);}
                    if( db_dispatcher =='1' || db_dispatcher ==1){$('#upcheckbox-3').prop('checked',true);}else{ $('#upcheckbox-3').prop('checked',false);}
                    if( db_driver =='1' || db_driver ==1){$('#upcheckbox-4').prop('checked',true);}else{ $('#upcheckbox-4').prop('checked',false);}
                    if( db_company =='1' || db_company ==1){$('#upcheckbox-5').prop('checked',true);}else{ $('#upcheckbox-5').prop('checked',false);}
                    if( db_truck =='1' || db_truck ==1){$('#upcheckbox-6').prop('checked',true);}else{ $('#upcheckbox-6').prop('checked',false);}
                    if( db_carrier =='1' || db_carrier ==1){$('#upcheckbox-7').prop('checked',true);}else{ $('#upcheckbox-7').prop('checked',false);}
                    if( db_equipment =='1' || db_equipment ==1){$('#upcheckbox-8').prop('checked',true);}else{ $('#upcheckbox-8').prop('checked',false);}
                    if( db_sales_representative =='1' || db_sales_representative ==1){$('#upcheckbox-9').prop('checked',true);}else{ $('#upcheckbox-9').prop('checked',false);}
                    

                    var company = result.master['addCompany'];
                    var BranchOffice = result.master['office'];
                    var CurrencySetting = result.master['currencySetting'];
                    var PaymentTerms = result.master['paymentTerms'];
                    var AddTermsConditions = result.master['termCondition'];

                    var AddTermsConditions2 = result.master['fuelCardType'];
                    var Status = result.master['statusType'];

                    var LoadType = result.master['loadType'];
                    var EquipmentType = result.master['equipmentType'];
                    var ReccuranceCategory = result.master['reccuranceCategory'];
                    var ReccuranceCategory2 = result.master['fixPayCategory'];
                    var TruckTrailermake = result.master['truckType'];
                    var TruckTrailermake2 = result.master['trucktrailerType'];

                    
                    if( (company =='1' && BranchOffice =='1'  && CurrencySetting =='1'  && PaymentTerms =='1'  && (AddTermsConditions =='1' || AddTermsConditions2 =='1')  && Status =='1'  && LoadType =='1'  && EquipmentType =='1'  && (ReccuranceCategory =='1' || ReccuranceCategory2 =='1')  && (TruckTrailermake =='1' || TruckTrailermake2 =='1' ) || (company ==1 && BranchOffice ==1  && CurrencySetting ==1  && PaymentTerms ==1  && (AddTermsConditions ==1 || AddTermsConditions2 ==1)  && Status ==1  && LoadType ==1  && EquipmentType ==1  && (ReccuranceCategory ==1 || ReccuranceCategory2 ==1)  && (TruckTrailermake ==1 || TruckTrailermake2 ==1) ) ) ){
                        $('#up_select-all_l2').prop('checked',true);
                        alert("db");
                    }else{ 
                        alert("db2");
                        $('#up_select-all_l2').prop('checked',false);
                    }
                    if(company =='1' || company ==1){$('#upcheckboxl2_1').prop('checked',true);}
                    if(BranchOffice =='1' || BranchOffice ==1){$('#upcheckboxl2_2').prop('checked',true);}else{ $('#upcheckboxl2_2').prop('checked',false);}
                    if(CurrencySetting =='1' || CurrencySetting ==1){$('#upcheckboxl2_10').prop('checked',true);}else{ $('#upcheckboxl2_10').prop('checked',false);}
                    if(PaymentTerms =='1' || PaymentTerms ==1){$('#upcheckboxl2_12').prop('checked',true);}else{ $('#upcheckboxl2_12').prop('checked',false);}
                    if(AddTermsConditions =='1' || AddTermsConditions2 =='1' || AddTermsConditions ==1 || AddTermsConditions2 ==1){$('#upcheckboxl2_4').prop('checked',true);}else{ $('#upcheckboxl2_4').prop('checked',false);}
                    if(Status =='1' || Status ==1){$('#upcheckboxl2_6').prop('checked',true);}else{ $('#upcheckboxl2_6').prop('checked',false);}
                    if(LoadType =='1' || LoadType ==1){$('#upcheckboxl2_7').prop('checked',true);}else{ $('#upcheckboxl2_7').prop('checked',false);}
                    if(EquipmentType =='1' || EquipmentType ==1){$('#upcheckboxl2_5').prop('checked',true);}else{ $('#upcheckboxl2_5').prop('checked',false);}
                    if(ReccuranceCategory =='1' || ReccuranceCategory2 =='1' || ReccuranceCategory ==1 || ReccuranceCategory2 ==1){$('#upcheckboxl2_13').prop('checked',true);}else{ $('#upcheckboxl2_13').prop('checked',false);}
                    if(TruckTrailermake =='1' || TruckTrailermake2 =='1' || TruckTrailermake ==1 || TruckTrailermake2 ==1){$('#upcheckboxl2_3').prop('checked',true);}else{ $('#upcheckboxl2_3').prop('checked',false);}

                    
                    var upPri_Admin = result.admin['admin'];
                    var upPri_Customer = result.admin['addCustomer'];
                    var upPri_Customer2 = result.admin['customer'];
                    var upPri_Shipper = result.admin['addShipper'];
                    var upPri_Consignee = result.admin['addConsignee'];
                    var upPri_ShipperConsignee = result.admin['shipper_Consignee'];
                    var upPri_ExternalCarrier = result.admin['addExternalCarrier'];
                    var upPri_ExternalCarrier2 = result.admin['external_carrier'];
                    var upPri_DriverOwnerOperator = result.admin['addDriver'];
                    var upPri_DriverOwnerOperator2 = result.admin['driver_owner_operator'];
                    var upPri_User = result.admin['users'];
                    var upPri_User2 = result.admin['user'];
                    var upPri_Truck = result.admin['addTruck'];
                    var upPri_Truck2 = result.admin['truck'];
                    var upPri_Trailer = result.admin['addTrailer'];
                    var upPri_Trailer2 = result.admin['trailer'];
                    var upPri_FactoringCompany = result.admin['factoringCompany'];
                    var upPri_FactoringCompany2 = result.admin['factoring_Company'];
                    
                    if( (upPri_Admin =='1' &&  (upPri_Customer=='1' || upPri_Customer2 =='1')  &&  (upPri_ShipperConsignee =='1' ||  upPri_Shipper=='1' ||  upPri_Consignee=='1')  && (upPri_ExternalCarrier=='1' || upPri_ExternalCarrier2 =='1')   &&  (upPri_DriverOwnerOperator =='1' ||  upPri_DriverOwnerOperator2 =='1')  &&   (upPri_User=='1' ||  upPri_User2=='1')  &&  (upPri_Truck=='1' || upPri_Truck2 =='1')  &&   (upPri_Trailer =='1' ||  upPri_Trailer2 =='1')  && (upPri_FactoringCompany =='1' ||  upPri_FactoringCompany2 =='1')) || (upPri_Admin ==1 &&  (upPri_Customer==1 || upPri_Customer2 ==1)  &&  (upPri_ShipperConsignee ==1 ||  upPri_Shipper==1 ||  upPri_Consignee==1)  && (upPri_ExternalCarrier==1 || upPri_ExternalCarrier2 ==1)   &&  (upPri_DriverOwnerOperator ==1 ||  upPri_DriverOwnerOperator2 ==1)  &&   (upPri_User==1 ||  upPri_User2==1)  &&  (upPri_Truck==1 || upPri_Truck2 ==1)  &&   (upPri_Trailer ==1 ||  upPri_Trailer2 ==1)  && (upPri_FactoringCompany ==1 ||  upPri_FactoringCompany2 ==1)) ){
                        $('#up_select-all_l3').prop('checked',true);
                    }else{ $('#up_select-all_l3').prop('checked',false);}
                    if( upPri_Admin =='1' || upPri_Admin ==1){$('#upcheckboxl3_8').prop('checked',true);}
                    if( upPri_Customer=='1' || upPri_Customer2 =='1' || upPri_Customer ==1 || upPri_Customer2 ==1){$('#upcheckboxl3_1').prop('checked',true);}else{ $('#upcheckboxl3_1').prop('checked',false);}
                    if( upPri_ShipperConsignee =='1' ||  upPri_Shipper=='1' ||  upPri_Consignee=='1' || upPri_ShipperConsignee ==1 || upPri_Shipper ==1 || upPri_Consignee ==1){$('#upcheckboxl3_2').prop('checked',true);}else{ $('#upcheckboxl3_2').prop('checked',false);}
                    if( upPri_ExternalCarrier=='1' || upPri_ExternalCarrier2 =='1' || upPri_ExternalCarrier ==1 || upPri_ExternalCarrier2 ==1){$('#upcheckboxl3_4').prop('checked',true);}else{ $('#upcheckboxl3_4').prop('checked',false);}
                    if( upPri_DriverOwnerOperator =='1' ||  upPri_DriverOwnerOperator2 =='1' || upPri_DriverOwnerOperator ==1 || upPri_DriverOwnerOperator2 ==1){$('#upcheckboxl3_5').prop('checked',true);}else{ $('#upcheckboxl3_5').prop('checked',false);}
                    if( upPri_User=='1' ||  upPri_User2=='1' || upPri_User ==1 || upPri_User2 ==1){$('#upcheckboxl3_6').prop('checked',true);}else{ $('#upcheckboxl3_6').prop('checked',false);}
                    if( upPri_Truck=='1' || upPri_Truck2 =='1' || upPri_Truck ==1 || upPri_Truck2 ==1){$('#upcheckboxl3_7').prop('checked',true);}else{ $('#upcheckboxl3_7').prop('checked',false);}
                    if( upPri_Trailer =='1' ||  upPri_Trailer2 =='1' || upPri_Trailer ==1 || upPri_Trailer2 ==1){$('#upcheckboxl3_10').prop('checked',true);}else{ $('#upcheckboxl3_10').prop('checked',false);}
                    if( upPri_FactoringCompany =='1' ||  upPri_FactoringCompany2 =='1' || upPri_FactoringCompany ==1 || upPri_FactoringCompany2 ==1){$('#upcheckboxl3_9').prop('checked',true);}else{ $('#upcheckboxl3_9').prop('checked',false);}

                    var  ifta= result.ifta['ifta'];
                    var  fuel_vendor= result.ifta['fuel_vendor'];
                    var  fuel_vendor2= result.master['fuelCardType'];
                    var  iftaCard= result.ifta['iftaCard'];
                    var  fuelReceipt= result.ifta['fuelReceipt'];
                    var  fuelReceipt2= result.ifta['Fuel_reciepts_cash_advance'];
                    var  addToll = result.ifta['addToll'];
                    var  addToll2 = result.ifta['tolls'];
                    var  verifyTrip= result.ifta['verifyTrip'];
                    var  verifyTrip2= result.ifta['IFTA_trips'];

                    if((ifta =='1' && (fuel_vendor =='1' || fuel_vendor2 =='1') && (iftaCard =='1' )  && (fuelReceipt =='1' || fuelReceipt2 =='1')  && (addToll =='1' || addToll2 =='1')  && (verifyTrip =='1' || verifyTrip2 =='1')) || 
                    (ifta ==1 && (fuel_vendor ==1 || fuel_vendor2 ==1) && (iftaCard ==1 )  && (fuelReceipt ==1 || fuelReceipt2 ==1)  && (addToll ==1 || addToll2 ==1)  && (verifyTrip ==1 || verifyTrip2 ==1))){
                        {$('#up_select-all_l4').prop('checked',true);}  
                    }else{
                        $('#up_select-all_l4').prop('checked',false);
                    }
                    if( ifta =='1' || ifta ==1){$('#upcheckboxl4_2').prop('checked',true);}else{ $('#upcheckboxl4_2').prop('checked',false);}
                    if( fuel_vendor =='1' || fuel_vendor2 =='1' || fuel_vendor ==1 || fuel_vendor2 ==1){$('#upcheckboxl4_1').prop('checked',true);}else{ $('#upcheckboxl4_1').prop('checked',false);}
                    if( iftaCard =='1' || iftaCard ==1){$('#upcheckboxl3_13').prop('checked',true);}else{ $('#upcheckboxl3_13').prop('checked',false);}
                    if( fuelReceipt =='1' || fuelReceipt2 =='1' || fuelReceipt ==1 || fuelReceipt2 ==1){$('#upcheckboxl4_3').prop('checked',true);}else{ $('#upcheckboxl4_3').prop('checked',false);}
                    if( addToll =='1' || addToll2 =='1' || addToll ==1 || addToll2 ==1){$('#upcheckboxl4_4').prop('checked',true);}else{ $('#upcheckboxl4_4').prop('checked',false);}
                    if( verifyTrip =='1' || verifyTrip2 =='1' || verifyTrip ==1 || verifyTrip2 ==1){$('#upcheckboxl4_5').prop('checked',true);}else{ $('#upcheckboxl4_5').prop('checked',false);}

                    var account = result.account['account'];
                    var bank = result.account['bank'];
                    var bank2 = result.admin['addBank'];
                    var creditCard = result.account['credit_card'];
                    var creditCard2 = result.admin['creditCard'];
                    var sub_credit_card = result.account['sub_credit_card'];
                    var sub_credit_card2 = result.admin['subCreditCard'];
                    var accountManager = result.account['accountManager'];
                    var paymentRegistration = result.account['paymentRegistration'];
                    
                    if( (account =='1'  &&  (bank =='1' || bank2 =='1')  && (creditCard =='1' || creditCard2 =='1')   &&  (sub_credit_card =='1' || sub_credit_card2 =='1')  &&  accountManager =='1'  &&  paymentRegistration =='1') || 
                    (account ==1  &&  (bank ==1 || bank2 ==1)  && (creditCard ==1 || creditCard2 ==1)   &&  (sub_credit_card ==1 || sub_credit_card2 ==1)  &&  accountManager ==1  &&  paymentRegistration ==1)){
                        $('#up_select-all_l5').prop('checked',true);
                    }else{ 
                        $('#up_select-all_l5').prop('checked',false);
                    }
                    if( account =='1' || account ==1){$('#upcheckboxl5_6').prop('checked',true);}else{ $('#upcheckboxl5_6').prop('checked',false);}
                    if( bank =='1' || bank2 =='1' || bank ==1 || bank2 ==1 ){$('#upcheckboxl5_5').prop('checked',true);}else{ $('#upcheckboxl5_5').prop('checked',false);}
                    if( creditCard =='1' || creditCard2 =='1' || creditCard ==1 || creditCard2 ==1){$('#upcheckboxl5_4').prop('checked',true);}else{ $('#upcheckboxl5_4').prop('checked',false);}
                    if( sub_credit_card =='1' || sub_credit_card2 =='1'|| sub_credit_card == 1 || sub_credit_card2==1){$('#upcheckboxl5_3').prop('checked',true);}else{ $('#upcheckboxl5_3').prop('checked',false);}
                    if( accountManager =='1' || accountManager ==1 ){$('#upcheckboxl5_1').prop('checked',true);}else{ $('#upcheckboxl5_1').prop('checked',false);}
                    if( paymentRegistration =='1' ||  paymentRegistration==1){$('#upcheckboxl5_2').prop('checked',true);}else{ $('#upcheckboxl5_2').prop('checked',false);}

                    var report = result.reports['report'];
                    var aggingReport = result.reports['aggingReport'];
                    var Revenuereport2 = result.reports['receivableReport'];
                    var Revenuereport = result.reports['Revenue_report'];
                    var Expensereport = result.reports['Expense_report'];
                    var Expensereport2 = result.reports['payableReport'];
                    var Report1099 = result.reports['Report1099'];

                    if( (report=='1'   && aggingReport =='1'   &&  (Revenuereport2 =='1' || Revenuereport =='1')  &&  ( Expensereport =='1' || Expensereport2 =='1')  && Report1099 =='1' ) || (report==1   && aggingReport ==1   &&  (Revenuereport2 ==1 || Revenuereport ==1)  &&  ( Expensereport ==1 || Expensereport2 ==1)  && Report1099 ==1 ) ){
                        $('#up_select-all_l6').prop('checked',true);
                    }else{ 
                        $('#up_select-all_l6').prop('checked',false);
                    }
                    if(  report=='1'  || report ==1){$('#upcheckboxl6_6').prop('checked',true);}else{ $('#upcheckboxl6_6').prop('checked',false);}
                    if(  aggingReport =='1' || aggingReport ==1 ){$('#upcheckboxl6_7').prop('checked',true);}else{ $('#upcheckboxl6_7').prop('checked',false);}
                    if(  Revenuereport2 =='1' || Revenuereport =='1' || Revenuereport2 ==1 || Revenuereport ==1){$('#upcheckboxl6_12').prop('checked',true);}else{ $('#upcheckboxl6_12').prop('checked',false);}
                    if(  Expensereport =='1' || Expensereport2 =='1' || Expensereport ==1 || Expensereport2 ==1){$('#upcheckboxl6_11').prop('checked',true);}else{ $('#upcheckboxl6_11').prop('checked',false);}
                    if(  Report1099 =='1' || Report1099 ==1 ){$('#upcheckboxl6_10').prop('checked',true);}else{ $('#upcheckboxl6_10').prop('checked',false);}

                    // if(result.settlements){
                    //     alert();
                    //     var settlements = result.settlements['settlements'];
                    //     var driverPaySettlements = result.settlements['driverPaySettlements'];
                    //     var driverPaySettlements2 = result.reports['driverReport'];
                    //     var customerSettlement = result.settlements['customerSettlement'];
                    //     var CarrierSettlement = result.settlements['CarrierSettlement'];
                    // }else{
                    //     alert("l");
                    //     var settlements = 1;
                    //     var driverPaySettlements = 1;
                    //     var driverPaySettlements2 = 1;
                    //     var customerSettlement = 0;
                    //     var CarrierSettlement = 0;
                    // }
                    
                    if(result.settlements){
                        var settlements = result.settlements['settlements'];
                        var driverPaySettlements = result.settlements['driverPaySettlements'];
                        var driverPaySettlements2 = result.reports['driverReport'];
                        var customerSettlement = result.settlements['customerSettlement'];
                        var CarrierSettlement = result.settlements['CarrierSettlement'];
                    }else{
                        var settlements = 0;
                        var driverPaySettlements = 0;
                        var driverPaySettlements2 = 0;
                        var customerSettlement = 0;
                        var CarrierSettlement = 0;
                    }
                    

                    
                    if((settlements =='1'  &&  (driverPaySettlements =='1' || driverPaySettlements2 =='1')  &&  customerSettlement =='1'  && CarrierSettlement =='1') || (settlements ==1  &&  (driverPaySettlements ==1 || driverPaySettlements2 ==1)  &&  customerSettlement ==1  && CarrierSettlement ==1) ){
                        $('#up_select-all_l7').prop('checked',true);
                    }else{ 
                        $('#up_select-all_l7').prop('checked',false);
                    }
                    if( settlements =='1' || settlements ==1 ){$('#upcheckboxl7_1').prop('checked',true);}else{ $('#upcheckboxl7_1').prop('checked',false);}
                    if( driverPaySettlements =='1' || driverPaySettlements2 =='1' || driverPaySettlements ==1 || driverPaySettlements2 ==1 ){$('#upcheckboxl7_2').prop('checked',true);}else{ $('#upcheckboxl7_2').prop('checked',false);}
                    if( customerSettlement =='1' || customerSettlement ==1 ){$('#upcheckboxl7_3').prop('checked',true);}else{ $('#upcheckboxl7_3').prop('checked',false);}
                    if( CarrierSettlement =='1' || CarrierSettlement ==1 ){$('#upcheckboxl7_4').prop('checked',true);}else{ $('#upcheckboxl7_4').prop('checked',false);}

                }else{
                    swal.fire("Selected user is Admin, you cannot change.");
                    $('#PrivillegeUser').focus();
                }
            }
        });
      });
     
    // <!-- -------------------------------------------------------------------------over ------------------------------------------------------------------------- -->
    // <!-- -------------------------------------------------------------------------over Get   ------------------------------------------------------------------------- --> 
    // <!-- -------------------------------------------------------------------------update ------------------------------------------------------------------------- -->
   
    
    $('#userUpdatePrivi').click(function(){
        
        var emailId= $('#PrivillegeUser').val();
        if(emailId == ""){
            swal.fire("You must select User from search list.");
            $('#PrivillegeUser').focus();
        }
        //CURD
        var insert_user = $('#insert_user').is(":checked");
        var insert_user = insert_user ? 1 : 0;
        var update_user = $('#update_user').is(":checked");
        var update_user = update_user ? 1 : 0;
        var delete_user = $('#delete_user').is(":checked");
        var delete_user = delete_user ? 1 : 0;
        var import_user = $('#import_user').is(":checked");
        var import_user = import_user ? 1 : 0;
        var export_user = $('#export_user').is(":checked");
        var export_user = export_user ? 1 : 0;

        //checkbox1
        var checkbox1 = $('#upcheckbox-1').is(":checked");
        var db_Load = checkbox1 ? 1 : 0;
        var checkbox2 = $('#upcheckbox-2').is(":checked");
        var db_ProfitLoss = checkbox2 ? 1 : 0;
        var checkbox3 = $('#upcheckbox-3').is(":checked");
        var db_Dispatcher = checkbox3 ? 1 : 0;
        var checkbox4 = $('#upcheckbox-4').is(":checked");
        var db_Driver = checkbox4 ? 1 : 0;
        var checkbox5 = $('#upcheckbox-5').is(":checked");
        var db_Company = checkbox5 ? 1 : 0;
        var checkbox6 = $('#upcheckbox-6').is(":checked");
        var db_Truck = checkbox6 ? 1 : 0;
        var checkbox7 = $('#upcheckbox-7').is(":checked");
        var db_Carrier = checkbox7 ? 1 : 0;
        var checkbox8 = $('#upcheckbox-8').is(":checked");
        var db_Equipment = checkbox8 ? 1 : 0;
        var checkbox9 = $('#upcheckbox-9').is(":checked");
        var db_SalesRepresentative = checkbox9 ? 1 : 0;
       
        //checkbox2
        var checkbox2_1 = $('#upcheckboxl2_1').is(":checked");
        var Company = checkbox2_1 ? 1 : 0;
        var checkbox2_2 = $('#upcheckboxl2_2').is(":checked");
        var BranchOffice = checkbox2_2 ? 1 : 0;
        var checkbox2_3 = $('#upcheckboxl2_10').is(":checked");
        var CurrencySetting = checkbox2_3 ? 1 : 0;
        var checkbox2_5 = $('#upcheckboxl2_12').is(":checked");
        var PaymentTerms = checkbox2_5 ? 1 : 0;
        var checkbox2_6 = $('#upcheckboxl2_4').is(":checked");
        var AddTermsConditions = checkbox2_6 ? 1 : 0;
        var checkbox2_7 = $('#upcheckboxl2_6').is(":checked");
        var Status = checkbox2_7 ? 1 : 0;
        var checkbox2_8 = $('#upcheckboxl2_7').is(":checked");
        var LoadType = checkbox2_8 ? 1 : 0;
        var checkbox2_9 = $('#upcheckboxl2_5').is(":checked");
        var EquipmentType = checkbox2_9 ? 1 : 0;
        var checkbox2_10 = $('#upcheckboxl2_13').is(":checked");
        var ReccuranceCategory = checkbox2_10 ? 1 : 0;
        var checkbox2_10 = $('#upcheckboxl2_3').is(":checked");
        var TruckTrailermake = checkbox2_10 ? 1 : 0;

        //checkbox3
        var checkbox3_1 = $('#upcheckboxl3_8').is(":checked");
        var Admin= checkbox3_1 ? 1 : 0;
        var checkbox3_2 = $('#upcheckboxl3_1').is(":checked");
        var Customer= checkbox3_2 ? 1 : 0;
        var checkbox3_3 = $('#upcheckboxl3_2').is(":checked");
        var ShipperConsignee= checkbox3_3 ? 1 : 0;
        var checkbox3_4 = $('#upcheckboxl3_4').is(":checked");
        var ExternalCarrier= checkbox3_4 ? 1 : 0;
        var checkbox3_5 = $('#upcheckboxl3_4').is(":checked");
        var DriverOwnerOperator= checkbox3_5 ? 1 : 0;
        var checkbox3_6 = $('#upcheckboxl3_6').is(":checked");
        var User = checkbox3_6 ? 1 : 0;
        var checkbox3_7 = $('#upcheckboxl3_7').is(":checked");
        var Truck = checkbox3_7 ? 1 : 0;
        var checkbox3_8 = $('#upcheckboxl3_10').is(":checked");
        var Trailer = checkbox3_8 ? 1 : 0;
        var checkbox3_9 = $('#upcheckboxl3_9').is(":checked");
        var FactoringCompany = checkbox3_9 ? 1 : 0;

        //checkbox4
        var checkbox4_1 = $('#upcheckboxl4_2').is(":checked");
        var Ifta= checkbox4_1 ? 1 : 0;
        var checkbox4_2 = $('#upcheckboxl4_1').is(":checked");
        var FuelVendor= checkbox4_2 ? 1 : 0;
        var checkbox4_3 = $('#upcheckboxl3_13').is(":checked");
        var FuelCard= checkbox4_3 ? 1 : 0;
        var checkbox4_4 = $('#upcheckboxl4_3').is(":checked");
        var FuelRecieptsCashAdvance= checkbox4_4 ? 1 : 0;
        var checkbox4_5 = $('#upcheckboxl4_4').is(":checked");
        var Tolls = checkbox4_5 ? 1 : 0;
        var checkbox4_6 = $('#upcheckboxl4_5').is(":checked");
        var IFTATrips= checkbox4_6 ? 1 : 0;

        //checkbox5
        var checkbox5_1 = $('#upcheckboxl5_6').is(":checked");
        var Account= checkbox5_1 ? 1 : 0;
        var checkbox5_2 = $('#upcheckboxl5_5').is(":checked");
        var Bank= checkbox5_2 ? 1 : 0;
        var checkbox5_3 = $('#upcheckboxl5_4').is(":checked");
        var CreditCard= checkbox5_3 ? 1 : 0;
        var checkbox5_4 = $('#upcheckboxl5_3').is(":checked");
        var SubCreditCard= checkbox5_4 ? 1 : 0;
        var checkbox5_5 = $('#upcheckboxl5_1').is(":checked");
        var AccountingManager = checkbox5_5 ? 1 : 0;
        var checkbox5_6 = $('#upcheckboxl5_2').is(":checked");
        var PaymentReceiptRegistration= checkbox5_6 ? 1 : 0;

        //checkbox6
        var checkbox6_1 = $('#upcheckboxl6_6').is(":checked");
        var Reports= checkbox6_1 ? 1 : 0;
        var checkbox6_2 = $('#upcheckboxl6_7').is(":checked");
        var AgingReport= checkbox6_2 ? 1 : 0;
        var checkbox6_3 = $('#upcheckboxl6_12').is(":checked");
        var RevenueReport= checkbox6_3 ? 1 : 0;
        var checkbox6_4 = $('#upcheckboxl6_11').is(":checked");
        var ExpenseReport= checkbox6_4 ? 1 : 0;
        var checkbox6_5 = $('#upcheckboxl6_10').is(":checked");
        var Report1099 = checkbox6_5 ? 1 : 0;
        
        //checkbox7
        var checkbox7_1 = $('#upcheckboxl7_1').is(":checked");
        var Settlements= checkbox7_1 ? 1 : 0;
        var checkbox7_2 = $('#upcheckboxl7_2').is(":checked");
        var DriverPaySettlements= checkbox7_2 ? 1 : 0;
        var checkbox7_3 = $('#upcheckboxl7_3').is(":checked");
        var CustomerSettlement= checkbox7_3 ? 1 : 0;
        var checkbox7_4 = $('#upcheckboxl7_4').is(":checked");
        var CarrierSettlement= checkbox7_4 ? 1 : 0;
       

        $.ajax({
            url:base_path+"/admin/updateUSerPrivi" ,
            type:'post',
            data:{
                _token:$("#tokenEditUserPrivi").val(),
                emailId:emailId,
                //CURD
                insert_user:insert_user,
                update_user:update_user,
                delete_user:delete_user,
                import_user:import_user,
                export_user:export_user,
                //checkbox1
                db_Load:db_Load,
                db_ProfitLoss:db_ProfitLoss,
                db_Dispatcher:db_Dispatcher,
                db_Driver:db_Driver,
                db_Company:db_Company,
                db_Truck:db_Truck,
                db_Carrier:db_Carrier,
                db_Equipment:db_Equipment,
                db_SalesRepresentative:db_SalesRepresentative,
                //checkbox2
                Company:Company,
                BranchOffice:BranchOffice,
                CurrencySetting:CurrencySetting,
                // Driver:Driver,
                PaymentTerms:PaymentTerms,
                AddTermsConditions:AddTermsConditions,
                Status:Status,
                LoadType:LoadType,
                EquipmentType:EquipmentType,
                ReccuranceCategory:ReccuranceCategory,
                TruckTrailermake:TruckTrailermake,
                 //checkbox3
                Admin:Admin,
                Customer:Customer,
                ShipperConsignee:ShipperConsignee,
                ExternalCarrier:ExternalCarrier,
                DriverOwnerOperator:DriverOwnerOperator,
                User:User,
                Truck:Truck,
                Trailer:Trailer,
                FactoringCompany:FactoringCompany,
                //checkbox4
                Ifta:Ifta,
                FuelVendor:FuelVendor,
                FuelCard:FuelCard,
                FuelRecieptsCashAdvance:FuelRecieptsCashAdvance,
                Tolls:Tolls,
                IFTATrips:IFTATrips,
                //checkbox5
                Account:Account,
                Bank:Bank,
                CreditCard:CreditCard,
                SubCreditCard:SubCreditCard,
                AccountingManager:AccountingManager,
                PaymentReceiptRegistration:PaymentReceiptRegistration,
                //checkbox6
                Reports:Reports,
                AgingReport:AgingReport,
                RevenueReport:RevenueReport,
                ExpenseReport:ExpenseReport,
                Report1099:Report1099,
                //checkbox7
                Settlements:Settlements,
                DriverPaySettlements:DriverPaySettlements,
                CustomerSettlement:CustomerSettlement,
                CarrierSettlement:CarrierSettlement,
                
            } ,
            success: function(response){
                var responsenew = JSON.parse(response);
                swal.fire("Privileges Updated Succesful"); 
                // if(responsenew.statusCode===200){
                //     swal.fire("Done!", responsenew.message, "success");
                //     $.ajax({
                //         type: "GET",
                //         url: base_path+"/admin/driver",
                //         success: function(text) {
                //             createDriverRows(text);
                //             response = text;
                //         }
                //     });			
                // }
              },
              error: function(data){
                $.each( data.responseJSON.errors, function( key, value ) {
                    swal.fire("Error!", value[0], "error"); 
                });
            }            
        });
    });
    // <!-- -------------------------------------------------------------------------update ------------------------------------------------------------------------- -->

});