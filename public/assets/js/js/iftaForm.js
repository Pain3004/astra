var additional_counter = 0;
var rowindex = 0;
var geoIPCity = "Alert Airport";
var geoIPStateCode = "NU";
var geoIPStateName = "NU";
var geoIPCountryCode = "IN";
var originDefault = "";
var destination1Default = "";
var waypointArr = [];
var main_driver_data = "";
var appID = 'gTUTKgVPzg0Tjb43r3nB';
var appCode = 'WDCAVk_2VvP23K0dJZCIQFs2OXIkOyQ0VV3ijti1ueo';
var routingBaseURL = 'https://route.api.here.com/routing/7.2/calculateroute.json?app_id=' + appID + '&app_code=' + appCode;
var mapContainer = document.getElementById('map');
var platform;
var defaultLayers;
var map;
var behavior;
var ui;
var bubble;
var dt;
var directionDisplay;
var directionsService;
var route_map;
var dir_response = null;
var states;
var cover_data = [];
var pb;
var state_lines = [];
var border_snoop;
var loadId = "";
var load_collection = "";
var companyId = $('#companyid').val();
var privilege = $('#privilege').val();

var fuelArr = (function () {
    var fuel = '';
    return function (obj) {
        if (obj == undefined) {
            return fuel;
        } else {
            fuel = obj
        }
    }
})();

// driver-pay-e-settlement-object
var getDriverEsettlement = (function () {
    var driverEsettlementArr = {};
    return (id, value) => {
        if (id == undefined && value == undefined) {
            return driverEsettlementArr;
        } else if (id == "clear") {
            driverEsettlementArr = {};
        } else {
            driverEsettlementArr[id] == undefined ? (driverEsettlementArr[id] = value) : delete driverEsettlementArr[id];//stripProperty(driverEsettlementArr,id); //delete person.chetan;
            return driverEsettlementArr;
        }
    };
})();

$(document).on("click", "#maincheck", function (event) {
    getDriverEsettlement('clear');
    if ($('#maincheck').is(':checked')) {
        $('.del_check').prop('checked', true)
        $('.del_check').each(function (i, item) {
            if (i > 0) {
                getDriverEsettlement($(item).data('value'), { 'id': $(item).data('id'), 'email': $(item).data('email') });
            }
        })
    } else {
        $('.del_check').prop('checked', false);
    }
});

// function stripProperty(o, v) {
//     return  (delete o[Object.keys(o).splice(Object.values(o).indexOf(v), 1)])?o:0;
// }

//-----------------Fuel Receipts Add START---------------------------------
//update Ifta Toll table

var fuelpath = "ifta_fuel_receipts/";
var fuelpath1 = $('#companyid').val();
var fueldata = fuelpath1.toString();
var fuel_test = fuelpath + fueldata;

database.ref(fuel_test).on('child_changed', function (res) {
    var obj = JSON.parse(JSON.stringify(res.val()));
    //  console.log(obj);
    if (obj.type != 'DeleteFuel') {
        makeDecision(obj, "Fuel_Receipt", "fuelBody", "page_active");
    } else {
        updateFuelTable();
    }
});

//.................PROCESS FUEL RECEIPT TABLE....................//

function updateFuelTable() {
    var fuelBody = document.getElementById("fuelBody");
    var paginate = document.getElementById("paginate");
    var data = {
        companyId: companyId,
        privilege: privilege,
    };
    $.ajax({
        url: "./Master.php",
        data: {
            main: "ifta",
            sub: "fuelreceipttable",
            data: data
        },
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = JSON.parse(response);
            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                processFuelReceiptTable(res[0]);
                $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                renameTableSeq2("fuelBody", "page_active");
            }
            var totalreceipts = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
            $("#total_receipts").html(totalreceipts);
            $(".loading").css("display", "none");
        }
    });
}

function processFuelReceiptTable(res) {
    $("#fuelBody").empty();
    var tabEntry = "";
    var privdata = JSON.parse(privilege);
    for (var j = res.length - 1; j >= 0; j--) {
        var masterID = res[j]["arrData1"]._id;
        var data = res[j]["arrData1"].fuel_receipt;
        processEntry = processFuelReceiptRows(data, privdata, masterID);
        tabEntry = processEntry + tabEntry;
    }
    $("#fuelBody").html(tabEntry);
}

// new code by hardik
var duplicateIDarray = [];
var fuelcardIDarray = [];
var transactionDatearray = [];
var amountarray = [];

function processFuelReceiptRows(data, privdata, masterID) {
    var userType = document.getElementById("user_type").value;
    var row = ``;
    for (var i = 0; i < data.length; i++) {
        if (data[i].masterID != undefined) {
            var masterID = data[i].masterID;
        }
        var ids = masterID + "-" + data[i]._id;
        var id = data[i]._id;
        var counter = data[i].counter;
        var driverName = data[i].driverName;
        var cardNo = data[i].cardNo;
        var truckNumber = data[i].truckNumber;
        var transactionDate = convertTimeZone(data[i].transactionDate, "info");
        var driverNumber = data[i].driverNumber;
        var transactionTime = data[i].transactionTime;
        var locationName = data[i].locationName;
        var locationCity = data[i].locationCity;
        var locationState = data[i].locationState;
        var category = data[i].category;
        var amount = numberWithCommas(parseFloat(data[i].amount) == -1 ? "(" + Math.abs(data[i].amount.toFixed(2)) + ")" : parseFloat(data[i].amount).toFixed(2));
        var quantity = data[i].quantity;
        var totalAmount = numberWithCommas(parseFloat(data[i].totalAmount) == -1 ? "(" + Math.abs(data[i].totalAmount.toFixed(2)) + ")" : parseFloat(data[i].totalAmount).toFixed(2));
        var transactionDiscount = numberWithCommas(parseFloat(data[i].transactionDiscount).toFixed(2));
        var transactionFee = numberWithCommas(parseFloat(data[i].transactionFee).toFixed(2));
        var transactionGross = numberWithCommas(parseFloat(data[i].transactionGross).toFixed(2));
        var invoiceNo = data[i].invoiceNo;
        var created_by = data[i].insertedUser;
        var created_time = convertTimeZone(data[i].insertedTime, "info");
        var edit_by = data[i].edit_by;
        var edit_time = convertTimeZone(data[i].edit_time, "info");
        var delete_status = data[i].deleteStatus;
        var deleteUser = data[i].deleteUser;
        var deleteTime = convertTimeZone(data[i].deleteTime, "info");
        if (data[i].fuelType != undefined) {
            var fuelType = data[i].fuelType;
        } else {
            var fuelType = "";
        }

        var duplicateIDarraysingle = data[i].duplicateID;
        var transactiondatesingle = data[i].transactionDate;
        var fuelcardidsingle = data[i].fuelId;

        var delEn = delete_status == 'YES' ? 'disabled_load' : '';
        var disable = delete_status == 'YES' ? 'disabled' : '';
        if (delete_status == "NO") {
            var pencilid1 = "transactionDatePencil" + ids;
            var pencilid2 = "cardNoPencil" + ids;
            var pencilid3 = "truckNumberPencil" + ids;
            var pencilid4 = "driverNumberPencil" + ids;
            var pencilid5 = "transactionTimePencil" + ids;
            var pencilid6 = "locationNamePencil" + ids;
            var pencilid7 = "locationCityPencil" + ids;
            var pencilid8 = "locationStatePencil" + ids;
            var pencilid9 = "categoryPencil" + ids;
            var pencilid10 = "amountPencil" + ids;
            var pencilid11 = "quantityPencil" + ids;
            var pencilid12 = "totalAmountPencil" + ids;
            var pencilid13 = "transactionDiscountPencil" + ids;
            var pencilid14 = "transactionFeePencil" + ids;
            var pencilid15 = "transactionGrossPencil" + ids;
            var pencilid16 = "invoiceNoPencil" + ids;
            var pencilid17 = "fuelTypePencil" + ids;
        } else {
            var pencilid1 = "";
            var pencilid2 = "";
            var pencilid3 = "";
            var pencilid4 = "";
            var pencilid5 = "";
            var pencilid6 = "";
            var pencilid7 = "";
            var pencilid8 = "";
            var pencilid9 = "";
            var pencilid10 = "";
            var pencilid11 = "";
            var pencilid12 = "";
            var pencilid13 = "";
            var pencilid14 = "";
            var pencilid15 = "";
            var pencilid16 = "";
            var pencilid17 = "";
        }

        var updateFuel = "updateFuel";
        var type = "text";
        var date = "date";
        var location = "location";
        var transactionDateColumn = "transactionDate";
        var cardNoColumn = "cardNo";
        var truckNumberColumn = "truckNumber";
        var driverNumberColumn = "driverNumber";
        var transactionTimeColumn = "transactionTime";
        var locationNameColumn = "locationName";
        var locationCityColumn = "locationCity";
        var locationStateColumn = "locationState";
        var categoryColumn = "category";
        var amountColumn = "amount";
        var quantityColumn = "quantity";
        var totalAmountColumn = "totalAmount";
        var transactionDiscountColumn = "transactionDiscount";
        var transactionFeeColumn = "transactionFee";
        var transactionGrossColumn = "transactionGross";
        var invoiceNoColumn = "invoiceNo";
        var fuelTypeColumn = "fuelType";

        var title1 = "Transaction Date";
        var title2 = "Card Number";
        var title3 = "Truck Number";
        var title4 = "Driver Number";
        var title5 = "Transaction Time";
        var title6 = "location Name";
        var title7 = "location City";
        var title8 = "location State";
        var title9 = "Category";
        var title10 = "Amount";
        var title11 = "Quantity";
        var title12 = "Total Amount";
        var title13 = "Transaction Discount";
        var title14 = "Transaction Fee";
        var title15 = "Transaction Gross";
        var title16 = "Invoice No";
        var title17 = "Fuel Type";
        var mainID = id + ")" + masterID;
        var tr = `<tr>`;

        tr += `<th data-id="${ids}"><input type= 'checkbox' name='delete_check' class='delete_check' id='delcheck_'+i value="` + mainID + `" data-duplicate="${duplicateIDarraysingle}" data-tdate="${transactiondatesingle}" data-fuelid="${fuelcardidsingle}" onclick='checkcheckbox();' ${disable}></th>`;

        tr += `<th class="center-alignment ${delEn}"></th>
                   <td class='center-alignment ${delEn}'><div class="tooltip1">
                   <div class='custom-wrap-text' style="width:100px">${driverName}</div>
                   <span class="tooltiptext2">${driverName}</span>
               </div></td>

                   <td class='center-alignment ${delEn}'>
                      ${transactionDate}</td>

                   <td class='center-alignment ${delEn}' id='cardNo` + ids + `'
                       onmouseover='showPencil_s("` + pencilid2 + `")'
                       onmouseout='hidePencil_s("` + pencilid2 + `")'
                       >
                       <i id='cardNoPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${cardNo}','${updateFuel}','${type}','${mainID}','${cardNoColumn}','${title2}','${pencilid2}')"
                       ></i>
                       ${cardNo}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='truckNumber` + ids + `'
                       onmouseover='showPencil_s("` + pencilid3 + `")'
                       onmouseout='hidePencil_s("` + pencilid3 + `")'
                       >
                       <i id='truckNumberPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${truckNumber}','${updateFuel}','${location}','${mainID}','${truckNumberColumn}','${title3}','${pencilid3}')"
                       ></i>
                       ${truckNumber}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='driverNumber` + ids + `'
                       onmouseover='showPencil_s("` + pencilid4 + `")'
                       onmouseout='hidePencil_s("` + pencilid4 + `")'
                       >
                       <i id='driverNumberPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${driverNumber}','${updateFuel}','${type}','${mainID}','${driverNumberColumn}','${title4}','${pencilid4}')"
                       ></i>
                       ${driverNumber}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='transactionTime` + ids + `'
                       onmouseover='showPencil_s("` + pencilid5 + `")'
                       onmouseout='hidePencil_s("` + pencilid5 + `")'
                       >
                       <i id='transactionTimePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transactionTime}','${updateFuel}','${type}','${mainID}','${transactionTimeColumn}','${title5}','${pencilid5}')"
                       ></i>
                       ${transactionTime}
                   </td>
                   
                   <td class='custom-text ${delEn}' id='locationName` + ids + `'
                       onmouseover='showPencil_s("` + pencilid6 + `")'
                       onmouseout='hidePencil_s("` + pencilid6 + `")'
                       >
                       <i id='locationNamePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${locationName}','${updateFuel}','${location}','${mainID}','${locationNameColumn}','${title6}','${pencilid6}')"
                       ></i>
                       <div class="tooltip1">
                       <div style="width:80px">${locationName}</div>
                       <span class="tooltiptext2">${locationName}</span>
                   </div>
                   </td>
                   
                   <td class='custom-text ${delEn}' id='locationCity` + ids + `'
                       onmouseover='showPencil_s("` + pencilid7 + `")'
                       onmouseout='hidePencil_s("` + pencilid7 + `")'
                       >
                       <i id='locationCityPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${locationCity}','${updateFuel}','${type}','${mainID}','${locationCityColumn}','${title7}','${pencilid7}')"
                       ></i>
                       ${locationCity}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='locationState` + ids + `'
                       onmouseover='showPencil_s("` + pencilid8 + `")'
                       onmouseout='hidePencil_s("` + pencilid8 + `")'
                       >
                       <i id='locationStatePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${locationState}','${updateFuel}','${type}','${mainID}','${locationStateColumn}','${title8}','${pencilid8}')"
                       ></i>
                       ${locationState}
                   </td>
                   
                   <td class='custom-text ${delEn}' >
                       ${category}
                   </td>

                   <td class='custom-text ${delEn}' id='fuelType` + ids + `'
                   onmouseover='showPencil_s("` + pencilid17 + `")'
                   onmouseout='hidePencil_s("` + pencilid17 + `")'
                   >
                   <i id='fuelTypePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                       onclick="updateTableColumn('${fuelType}','${updateFuel}','${type}','${mainID}','${fuelTypeColumn}','${title17}','${pencilid17}')"
                    ></i>
                   ${fuelType}
                    </td>
                   
                   <td class='custom-text ${delEn}' >
                       $${amount}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='quantity` + ids + `'
                       onmouseover='showPencil_s("` + pencilid11 + `")'
                       onmouseout='hidePencil_s("` + pencilid11 + `")'
                       >
                       <i id='quantityPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${quantity}','${updateFuel}','${type}','${mainID}','${quantityColumn}','${title11}','${pencilid11}')"
                       ></i>
                       ${quantity}
                   </td>
                   
                      <td class='custom-text ${delEn}' id='totalAmount` + ids + `'
                       onmouseover='showPencil_s("` + pencilid12 + `")'
                       onmouseout='hidePencil_s("` + pencilid12 + `")'
                       >
                       <i id='totalAmountPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${totalAmount}','${updateFuel}','${type}','${mainID}','${totalAmountColumn}','${title12}','${pencilid12}')"
                       ></i>
                       $${totalAmount}
                   </td>
                   <td class='custom-text ${delEn}' id='transactionDiscount` + ids + `'
                       onmouseover='showPencil_s("` + pencilid13 + `")'
                       onmouseout='hidePencil_s("` + pencilid13 + `")'
                       >
                       <i id='transactionDiscountPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transactionDiscount}','${updateFuel}','${type}','${mainID}','${transactionDiscountColumn}','${title13}','${pencilid13}')"
                       ></i>
                       $${transactionDiscount}
                   </td>
                   
                     <td class='custom-text ${delEn}' id='transactionFee` + ids + `'
                       onmouseover='showPencil_s("` + pencilid14 + `")'
                       onmouseout='hidePencil_s("` + pencilid14 + `")'
                       >
                       <i id='transactionFeePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transactionFee}','${updateFuel}','${type}','${mainID}','${transactionFeeColumn}','${title14}','${pencilid14}')"
                       ></i>
                       $${transactionFee}
                   </td>
                   
                   <td class='custom-text ${delEn}' id='transactionGross` + ids + `'
                       onmouseover='showPencil_s("` + pencilid15 + `")'
                       onmouseout='hidePencil_s("` + pencilid15 + `")'
                       >
                       <i id='transactionGrossPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transactionGross}','${updateFuel}','${type}','${mainID}','${transactionGrossColumn}','${title15}','${pencilid15}')"
                       ></i>
                       $${transactionGross}
                   </td>
                   
                   <td class='center-alignment ${delEn}' id='invoiceNo` + ids + `'
                       onmouseover='showPencil_s("` + pencilid16 + `")'
                       onmouseout='hidePencil_s("` + pencilid16 + `")'
                       >
                       <i id='invoiceNoPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${invoiceNo}','${updateFuel}','${type}','${mainID}','${invoiceNoColumn}','${title16}','${pencilid16}')"
                       ></i>
                       ${invoiceNo}
                   </td>`;
        tr += `<td class="${delEn}">`;
        if (delete_status == "YES") {
            tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                            <span class="tooltiptext">
                            Deleted By : ${deleteUser}<br>Deleted Time : ${deleteTime}</span>
                            </div>`;
        } else {
            if (edit_by != undefined && edit_time != undefined) {
                tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                            <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}<br>Edit By : ${edit_by}<br>Edited Time : ${edit_time}</span>
                            </div>`;
            } else {
                tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                        <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}</span>
                        </div>`;
            }
        }
        tr += `</td>`;
        tr += `</tr>`;
        row = tr + row;
    }
    return row;
}

//.............search fuel receipt......................//
var fuel_receipt_fields = "";
function searchbyiftafuel(searchdata) {
    fuel_receipt_fields = searchdata.value;
}
function searchText_Fuel(x) {
    var n = x.value;
    var data = {
        getoption: n,
        fuel_receipt_fields: fuel_receipt_fields,
        companyId: companyId,
        privilege: privilege,
    }
    if (val_fuel_receipt_fields(fuel_receipt_fields)) {
        $(".loading").css("display", "inline-block");
        $.ajax({
            type: 'POST',
            url: './Master.php',
            data: {
                main: "ifta",
                sub: "searchfuelreceipt",
                data: data,
            },
            success: function (response) {
                $(".loading").css("display", "none");
                var res = JSON.parse(response);
                $('#paginate').empty();
                if (res[0] != '' && res.length == 1) {
                    processFuelReceiptTable(res[0]);
                    renameTableSeq2("fuelBody");
                } else if (res[0] != '') {
                    processFuelReceiptTable(res[0]);
                    $("#paginate").html(paginateList(res[1], "ifta", "paginatefuelreceipt", "processFuelReceiptTable"));
                    renameTableSeq2("fuelBody");
                }
                else {
                    var tr = "<tr><td colspan='21' style='color : red;font-weight: bold'><marquee direction='right' scrollamount='10'>NO RESULT FOUND..!!</marquee></td></tr>";
                    $("#fuelBody").html(tr);
                }
            }
        });
    }
}
//.................Add Fuel................
function Add_FuelReceipts() {
    // var companyId = document.getElementById('companyId').value;
    // var fuelBalance = document.getElementById('basefuelcardDirect').value;
    // var fuelcardid = idarrayIFTA[0][category];
    // var driverid = idarrayIFTA[1][driverName];

    var cardNo = document.getElementById('cardNo').value;
    var amount = document.getElementById('amount').value;
    var category = document.getElementById('category').value;
    var driverName1 = document.getElementById('driverName').value;
    var driverName2 = driverName1.split("-");
    var driverName = driverName2[0];
    var driverNumber = document.getElementById('driverNumber').value;
    var fuelType = document.getElementById('fueltype').value;
    var fuelvalue =  document.getElementById("driverName").value;
    var fuelTypeId = $('#receipt_driverlist [value="' + fuelvalue + '"]').data('fid');
    var transactionTime = document.getElementById('transactionTime').value;
    var truckNumber = document.getElementById('truckNumber').value;
    var transactionGross = document.getElementById('transactionGross').value;
    var transactionFee = document.getElementById('transactionFee').value;
    var transactionDiscount = document.getElementById('transactionDiscount').value;
    var transactionDate = changeDateFormat(document.getElementById('transactionDate').value);
    var totalAmount = document.getElementById('totalAmount').value;
    var quantity = document.getElementById('quantity').value;
    var locationState = document.getElementById('locationState').value;
    var locationName = document.getElementById('locationName').value;
    var locationCity = document.getElementById('locationCity').value;
    var invoiceNo = document.getElementById('fuelInvoiceNo').value;
    let r = Math.random().toString(36).substring(7);
    if (val_unitNumber(truckNumber)) {
        if (val_fuelDate(transactionDate)) {
            if (val_transacTime(transactionTime)) {
                if (val_merchantName(locationName)) {
                    if (val_statePurch(locationState)) {
                        if (val_dGallons(quantity)) {
                            if (val_dGrossCost(amount)) {
                                $(".loader1").css("display", "inline-block");
                                var data = [{
                                    Amount: amount,
                                    CardNumber: cardNo,
                                    FuelVendor: category,
                                    DriverName: driverName,
                                    Drivernumber: driverNumber,
                                    FuelType:fuelType,
                                    Invoice:invoiceNo,
                                    LocationCity:locationCity,
                                    LocationName:locationName,
                                    LocationState:locationState,
                                    Quantity:quantity,
                                    TotalAmount:totalAmount,
                                    TransactionDate:transactionDate,
                                    TransactionDiscount:transactionDiscount,
                                    TransactionFee:transactionFee,
                                    TransactionGross:transactionGross,
                                    TransactionTime:transactionTime,
                                    TruckNumber:truckNumber
                                }];
                                console.log("transactionDate:>", transactionDate);
                                ProcessExcelFuelReceipt(data);
                                let tempFuelArr = fuelArr();
                                uploadaccountfuelexcel(tempFuelArr);
                                $("#fuelreceiptbutton").attr("disabled", true);
                                swal('Inserted', 'Data Inserted Successfully.', 'success');
                                $('#add_fuel_receipts').parent().empty();
                                $(".loader1").css("display", "inline-block");
                            }
                        }
                    }
                }
            }
        }
    }
}

function getDriverCardDetails(value) {
    var cardid = $('#receipt_driverlist [value="' + value + '"]').data('value');
    for (var i = 0; i < driverCardList.length; i++) {
        if (driverCardList[i].id == cardid) {
            document.getElementById('driverNumber').value = driverCardList[i].id
            document.getElementById('cardNo').value = driverCardList[i].cardno;
            document.getElementById('category').value = driverCardList[i].cardtype;
            break;
        }
    }
}

//.................update Fuel............................
function updateFuel(column, id, value, type) {
    var ids = id.split(')');
    $(".loader1").css("display", "inline-block");
    var editObj = { 0: { "id": ids[1] + "-" + ids[0], "column": column, "value": value, "type": type }, "type": 'Edit', "string": randomString() };
    var data = {
        column: column,
        id: ids[0],
        masterID: ids[1],
        value: value,
        companyId: companyId,
        privilege: privilege,
    }
    $.ajax({
        url: './Master.php',
        type: 'POST',
        data: {
            main: "ifta",
            sub: "editfuelreceipt",
            data: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('ifta_fuel_receipts').child(companyid).set({
                data: editObj,
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $("#updateTable").parent().empty();
            $("#search").val("");
            $(".loader1").css("display", "inline-block");
        }
    });
}

// Delete Fuel
function checkall() {
    var cid = document.getElementById('checkall');
    if (cid.checked) {
        $('.delete_check').prop('checked', true);
        $(".delete_record").show();
    } else {
        $('.delete_check').prop('checked', false);
        $(".delete_record").hide();
    }
}
// Checkbox checked
function checkcheckbox() {

    var no = 0;
    var length = $('.delete_check').length;
    // Total checked checkboxes
    var totalchecked = 0;
    $('.delete_check').each(function () {
        if ($(this).is(':checked')) {
            totalchecked += 1;
            no++;
        }
    });
    if (no > 0) {
        $(".delete_record").show();
    } else {
        $(".delete_record").hide();
    }
    // Checked unchecked checkbox
    if (totalchecked == length) {
        $("#checkall").prop('checked', true);
    } else {
        $('#checkall').prop('checked', false);
    }
}
function delete_fuel() {
    var deleteids_arr = [];
    $("input:checkbox[class=delete_check]:checked").each(function () {
        deleteids_arr.push($(this).val());
        duplicateIDarray.push($(this).data('duplicate'));
        transactionDatearray.push($(this).data('tdate'));
        fuelcardIDarray.push($(this).data('fuelid'));
    });
    var deleteObj = { "type": 'DeleteFuel', "string": randomString() };
    if (deleteids_arr.length > 0) {
        var data = {
            deleteids_arr: deleteids_arr,
            duplicateIDarray: duplicateIDarray,
            transactionDatearray: transactionDatearray,
            fuelcardIDarray: fuelcardIDarray
        }
        var confirmdelete = confirm("Do you really want to Delete records?");
        if (confirmdelete == true) {
            $.ajax({
                url: './Master.php',
                type: 'POST',
                data: {
                    main: "ifta",
                    sub: "deletefuelreceipt",
                    data: data,
                },
                success: function (response) {
                    duplicateIDarray = [];
                    transactionDatearray = [];
                    fuelcardIDarray = [];
                    database.ref('ifta_fuel_receipts').child(companyid).set({
                        data: deleteObj,
                    });
                    swal('Delete', 'Data Deleted Successfully.', 'success');
                    $('#checkall').prop('checked', false);
                    $(".delete_record").hide();
                }
            });
        }
    }
}
// Export Fuel
function export_FuelReceipt() {
    $.ajax({
        url: './Master.php',
        data: {
            main: "ifta",
            sub: "exportfuelreceipt",
        },
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);
            JSONToCSVConvertor(rows, "IftaFuel Report", false);

        }
    });
}

//Import Fuel
function import_FuelReceipt() {
    var i = -1;
    var fileUpload = document.getElementById('file');
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx)$/;
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (FileReader) != "undefined") {
            var reader = new FileReader();
            if (reader.readAsBinaryString) {
                reader.onload = function (e) {
                    var workbook = XLSX.read(e.target.result, {
                        type: 'binary'
                    });
                    var firstSheet = workbook.SheetNames[0];
                    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
                    //if (excelRows[0].hasOwnProperty("Name")) {
                    if (excelRows.length > 100) {
                        swal("File must contain atmost 100 rows at a time.")
                    } else {
                        ProcessExcelFuelReceipt(excelRows);
                        // fuel receipt for bank code by hardik
                        let tempFuelArr = fuelArr();
                        uploadaccountfuelexcel(tempFuelArr);
                    }
                    //} else {
                    //swal("Oops header entries didn't match the format. Download the given XLSX file.")
                    //}
                };
                reader.readAsBinaryString(fileUpload.files[0]);
            } else {

                reader.onload = function (e) {
                    var data = "";
                    var bytes = new Uint8Array(e.target.result);
                    for (var i = 0; i < bytes.byteLength; i++) {
                        data += String.fromCharCode(bytes[i]);
                    }
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });
                    var firstSheet = workbook.SheetNames[0];
                    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
                    //if (excelRows[0].hasOwnProperty("Name")) {
                    if (excelRows.length > 100) {
                        swal("File must contain atmost 100 rows at a time.")
                    } else {
                        ProcessExcelFuelReceipt(excelRows);
                        // fuel receipt for bank code by hardik
                        let tempFuelArr = fuelArr();
                        uploadaccountfuelexcel(tempFuelArr);
                    }
                    // } else {
                    //swal("Oops header entries didn't match the format. Download the given XLSX file.")
                    // }
                };
                reader.readAsArrayBuffer(fileUpload.files[0]);
            }
        } else {
            swal("This browser does not support HTML5.");
        }
    } else {
        swal('warning', 'You must select atleast one .XLSX file', 'warning');
    }
}

// name to id function
var idarrayIFTA = "";
function getfuelcardidIFTA() {
    $.ajax({
        url: './Master.php',
        type: 'post',
        data: {
            'main': 'account',
            'sub': 'getnametoid'
        },
        async: false,
        success: function (response) {
            idarrayIFTA = JSON.parse(response);
        }
    });
}

function ProcessExcelFuelReceipt(data) {
    var infectedRows = [];
    let tempHeader = ["TransactionDate", "CardNumber", "TruckNumber", "Drivernumber", "DriverName", "TransactionTime", "LocationName", "LocationCity", "LocationState", "FuelVendor", "FuelType", "Amount", "Quantity", "TotalAmount", "TransactionDiscount", "TransactionFee", "TransactionGross", "Invoice"];
    infectedRows.push(tempHeader);
    $(".loading").css("display", "inline-block");
    var x = document.getElementById("fuelBody");
    var maxLength = 6500;
    var w = x.rows[0];
    if (w == undefined) {
        var index = -1;
    } else {
        // var index = x.rows[0].cells[0].getAttribute("data-id");
        var index = getLastId("ifta_fuel_receipts", "fuel_receipt");
    }
    index++;

    // get name to id
    getfuelcardidIFTA();
    let modifiedData = data.map(
        (fuel_receipt, i) => {
            let r = Math.random().toString(36).substring(7);
            console.log("fuel_receipt['TransactionDate']:>", fuel_receipt['TransactionDate']);
            // if (validatedate(fuel_receipt['TransactionDate'])) {
                if (idarrayIFTA[0].hasOwnProperty(fuel_receipt['CardNumber'])) {
                // if (idarrayIFTA[0].hasOwnProperty(fuel_receipt['FuelVendor'])) {
                //     if (idarrayIFTA[1].hasOwnProperty(fuel_receipt['DriverName'])) {
                        return {
                            "_id": i + index,
                            "driverName": fuel_receipt['DriverName'] == null ? 'Not Mentioned' : fuel_receipt['DriverName'],
                            "driverNumber": fuel_receipt['Drivernumber'] == null ? 'Not Mentioned' : fuel_receipt['Drivernumber'],
                            "cardNo": fuel_receipt['CardNumber'] == null ? 'Not Mentioned' : fuel_receipt['CardNumber'],
                            "category": fuel_receipt['FuelVendor'] == null ? 'Not Mentioned' : fuel_receipt['FuelVendor'],
                            "fuelId": idarrayIFTA[0][fuel_receipt['CardNumber']].fuelCardId,
                            "fuelType": fuel_receipt['FuelType'] == null ? 'Not Mentioneed' : fuel_receipt['FuelType'],
                            "truckNumber": fuel_receipt['TruckNumber'] == null ? 'Not Mentioned' : fuel_receipt['TruckNumber'],
                            "transactionDate": fuel_receipt['TransactionDate'] == null ? '' : fuel_receipt['TransactionDate'],
                            "transactionTime": fuel_receipt['TransactionTime'] == null ? 'Not Mentioned' : fuel_receipt['TransactionTime'],
                            "locationName": fuel_receipt['LocationName'] == null ? 'Not Mentioned' : fuel_receipt['LocationName'],
                            "locationCity": fuel_receipt['LocationCity'] == null ? 'Not Mentioned' : fuel_receipt['LocationCity'],
                            "locationState": fuel_receipt['LocationState'] == null ? 'Not Mentioned' : fuel_receipt['LocationState'],
                            "quantity": fuel_receipt['Quantity'] == null ? 0 : fuel_receipt['Quantity'],
                            "amount": fuel_receipt['Amount'] == null ? 0 : fuel_receipt['Amount'],
                            "totalAmount": fuel_receipt['TotalAmount'] == null ? 0 : fuel_receipt['TotalAmount'],
                            "transactionDiscount": fuel_receipt['TransactionDiscount'] == null ? 0 : fuel_receipt['TransactionDiscount'],
                            "transactionFee": fuel_receipt['TransactionFee'] == null ? 'Not Mentioned' : fuel_receipt['TransactionFee'],
                            "transactionGross": fuel_receipt['TransactionGross'] == null ? 0 : fuel_receipt['TransactionGross'],
                            "invoiceNo": fuel_receipt['Invoice'] == null ? 'Not Mentioned' : fuel_receipt['Invoice'],
                            "counter": 0,
                            "insertedUser": username,
                            "insertedTime": Math.trunc(new Date().getTime() / 1000),
                            "deleteStatus": "NO",
                            'deleteUser': "",
                            'deleteTime': "",
                            'duplicateID': r,
                            'fuelcardmain': idarrayIFTA[0][fuel_receipt['FuelVendor']]
                        }
                    } else {
                        console.log("else CardNumber");
                        infectedRows.push(fuel_receipt);
                        return {};
                    }
                // } else {
                //     infectedRows.push(fuel_receipt);
                //     return {};
                // }
            // } else {
            //     console.log("else transaction");
            //     infectedRows.push(fuel_receipt);
            //     return {};
            // }
        }
    );

    console.log("modifiedData:>", modifiedData);
    let modifiedArray = modifiedData.filter(item => JSON.stringify(item) !== '{}');
    var arrLen = modifiedArray.length;
    console.log("modifiedArray:>", modifiedArray);
    var data = {
        exceldata: modifiedArray,
        length: arrLen,
        maxLength: maxLength,
        companyId: companyId,
        privilege: privilege,
    }
    fuelArr(modifiedArray);
    if (modifiedArray != '') {
        console.log("if");
        return $.ajax({
            url: './Master.php',
            method: 'post',
            data: {
                main: "ifta",
                sub: "importfuelreceipt",
                data: data,
            },
            success: function (response) {
                console.log("response:>", response);
                var companyid = $('#companyid').val();
                var arrcust = JSON.parse(response);
                var arrcustsize = arrcust.length;
                if (arrcustsize == 2) {
                    var carr1 = arrcust[0];
                    var carr2 = arrcust[1];
                    var maincarr = [...carr1, ...carr2];
                } else {
                    var carr1 = arrcust[0];
                    var maincarr = [...carr1];
                }
                var tableArray = { 0: maincarr };
                tableArray.type = "Excel";
                tableArray.string = randomString();
                database.ref('ifta_fuel_receipts').child(companyid).set({
                    data: tableArray,
                });
                $(".loading").css("display", "none");
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                document.getElementById('file').value = null;

                // export infected entries
                if (infectedRows.length > 1) {
                    JSONToCSVConvertor(infectedRows, "FuelReceiptErrorRows", false);
                }
                return modifiedArray;
            }
        });
    } else {
        console.log("else")
    }
};
function changeDateFormat(inputText) {
    let d = new Date(inputText);
    let month = d.getMonth() == 12 ? 1 : d.getMonth() +1;
    let year = d.getMonth() == 12 ? d.getFullYear() + 1 : d.getFullYear();
    return `${month}/${d.getDate()}/${year}`;
  }

// date format validation
function validatedate(inputText) {
    let d = new Date(inputText);
    let tempDate = inputText.split('/');
    tempDate[2] = d.getFullYear();
    inputText = tempDate[0] + "/" + tempDate[1] + "/" + tempDate[2];
    var dateformat = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;

    // Match the date format through regular expression
    if (inputText.match(dateformat)) {
        //Test which seperator is used '/' or '-'
        var opera1 = inputText.split('/');
        var opera2 = inputText.split('-');
        lopera1 = opera1.length;
        lopera2 = opera2.length;
        // Extract the string into month, date and year
        if (lopera1 > 1) {
            var pdate = inputText.split('/');
        }
        else if (lopera2 > 1) {
            var pdate = inputText.split('-');
        }
        var mm = parseInt(pdate[0]);
        var dd = parseInt(pdate[1]);
        var yy = parseInt(pdate[2]);

        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        if (mm == 1 || mm > 2) {
            if (dd > ListofDays[mm - 1]) {
                // alert('1.Invalid date format!');
                return false;
            }
        }
        if (mm == 2) {
            var lyear = false;
            if ((!(yy % 4) && yy % 100) || !(yy % 400)) {
                lyear = true;
            }
            if ((lyear == false) && (dd >= 29)) {
                // alert('2.Invalid date format!');
                return false;
            }
            if ((lyear == true) && (dd > 29)) {
                // alert('3.Invalid date format!');
                return false;
            }
        } else {
            return true;
        }
    } else {
        // alert("4.Invalid date format!");
        return false;
    }
}
//-----------------Fuel Receipts Add ENDS---------------------------------

//-----------------Add Toll START-----------------------------------------

//update Ifta Toll table

var tollpath = "ifta_toll/";
var tollpath1 = $('#companyid').val();
var tolldata = tollpath1.toString();
var toll_test = tollpath + tolldata;


database.ref(toll_test).on('child_changed', function (res) {
    var obj = JSON.parse(JSON.stringify(res.val()));
    // console.log(obj);
    if (obj.type != 'DeleteToll') {
        makeDecision(obj, "Add_Toll", "tollBody", "page_active");
    } else {
        updateTollTable();
    }
});

//...............process toll table............//
function updateTollTable() {
    var tollBody = document.getElementById("tollBody");
    var paginate = document.getElementById("paginate");
    var data = {
        companyId: companyId,
        privilege: privilege,
    };
    $.ajax({
        url: "./Master.php",
        data: {
            main: "ifta",
            sub: "tolltable",
            data: data
        },
        method: "POST",
        dataType: 'html',
        success: function (response) {
            var res = JSON.parse(response);
            if (res[0] != undefined && res[1] != undefined && res[2] != 0) {
                processTollTable(res[0]);
                $("#paginate").html(paginateList(res[1], "ifta", "paginatetoll", "processTollTable"));
                renameTableSeq2("tollBody", "page_active");
            }
            var totaltoll = "<i class='mdi mdi-chart-areaspline statistics-icon' style='font-size:24px'></i>Total Records : " + res[2];
            $("#total_toll").html(totaltoll);
            $(".loading").css("display", "none");
        },
    });
}

function processTollTable(res) {
    $("#tollBody").empty();
    var tabEntry = "";
    var privdata = JSON.parse(privilege);
    for (var j = res.length - 1; j >= 0; j--) {
        var masterID = res[j]["arrData1"]._id;
        var data = res[j]["arrData1"].tolls;
        processEntry = processTollRows(data, privdata, masterID);
        tabEntry = processEntry + tabEntry;
    }
    $("#tollBody").html(tabEntry);
}
function processTollRows(data, privdata, masterID) {
    var userType = document.getElementById("user_type").value;
    var row = ``;
    for (var i = 0; i < data.length; i++) {
        if (data[i].masterID != undefined) {
            var masterID = data[i].masterID;
        }
        var ids = masterID + "-" + data[i]._id;
        var id = data[i]._id;
        var counter = data[i].counter;
        var invoiceNumber = data[i].invoiceNumber;
        var tollDate = convertTimeZone(data[i].tollDate, "info_toll");
        var transType = data[i].transType;
        var locations = data[i].location;
        var transponder = data[i].transponder;
        var amount = numberWithCommas(parseFloat(data[i].amount) == -1 ? "(" + Math.abs(data[i].amount.toFixed(2)) + ")" : parseFloat(data[i].amount).toFixed(2));
        var licensePlate = data[i].licensePlate;
        var truckNo = data[i].truckNo;
        var created_by = data[i].insertedUser;
        var created_time = convertTimeZone(data[i].insertedTime, "info");
        var edit_by = data[i].edit_by;
        var edit_time = convertTimeZone(data[i].edit_time, "info");
        var delete_status = data[i].deleteStatus;
        var deleteUser = data[i].deleteUser;
        var deleteTime = convertTimeZone(data[i].deleteTime, "info");

        if (delete_status == "NO") {
            var pencilid1 = "tollDatePencil" + ids;
            var pencilid2 = "transTypePencil" + ids;
            var pencilid3 = "locationPencil" + ids;
            var pencilid4 = "transponderPencil" + ids;
            var pencilid5 = "amountPencil" + ids;
            var pencilid6 = "licensePlatePencil" + ids;
            var pencilid7 = "truckNoPencil" + ids;
            var pencilid8 = "invoiceNumberPencil" + ids;
        } else {
            var pencilid1 = "";
            var pencilid2 = "";
            var pencilid3 = "";
            var pencilid4 = "";
            var pencilid5 = "";
            var pencilid6 = "";
            var pencilid7 = "";
            var pencilid8 = "";
        }
        var disable = delete_status == 'YES' ? 'disabled' : '';
        var delEn = delete_status == 'YES' ? 'disabled_load' : '';
        var updateTolls = "updateTolls";
        var type = "text";
        var date = "date";
        var location = "location";
        var tollDateColumn = "tollDate";
        var transTypeColumn = "transType";
        var locationColumn = "location";
        var transponderColumn = "transponder";
        var amountColumn = "amount";
        var licensePlateColumn = "licensePlate";
        var truckNoColumn = "truckNo";
        var invoiceNumberColumn = "invoiceNumber";
        var title1 = "Toll Date";
        var title2 = "Transaction Type";
        var title3 = "Locations";
        var title4 = "Transponder";
        var title5 = "Amount";
        var title6 = "License Plate";
        var title7 = "Truck No";
        var title8 = "invoice Number";
        var mainID = id + ")" + masterID;

        var tr = `<tr>`;
        tr += `<th data-id="${ids}"><input type= 'checkbox' name='delete_check' class='delete_check' id='delcheck_'+i value="` + mainID + `"  onclick='checkcheckbox();' ${disable}></th>`;
        tr += `<th class="center-alignment"></th>
                   <td class="${delEn}">
                      ${tollDate}</td>

                   <td class='custom-text ${delEn}' id='transType` + ids + `'
                       onmouseover='showPencil_s("` + pencilid2 + `")'
                       onmouseout='hidePencil_s("` + pencilid2 + `")'
                       >
                       <i id='transTypePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transType}','${updateTolls}','${type}','${mainID}','${transTypeColumn}','${title2}','${pencilid2}')"
                       ></i>
                       ${transType}
                   </td>
                   <td class='custom-text ${delEn}' id='location` + ids + `'
                       onmouseover='showPencil_s("` + pencilid3 + `")'
                       onmouseout='hidePencil_s("` + pencilid3 + `")'
                       >
                       <i id='locationPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${locations}','${updateTolls}','${location}','${mainID}','${locationColumn}','${title3}','${pencilid3}')"
                       ></i>
                       ${locations}
                   </td>
                   <td class='custom-text ${delEn}' id='transponder` + ids + `'
                       onmouseover='showPencil_s("` + pencilid4 + `")'
                       onmouseout='hidePencil_s("` + pencilid4 + `")'
                       >
                       <i id='transponderPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${transponder}','${updateTolls}','${type}','${mainID}','${transponderColumn}','${title4}','${pencilid4}')"
                       ></i>
                       ${transponder}
                   </td>
                   <td class='custom-text ${delEn}' id='licensePlate` + ids + `'
                       onmouseover='showPencil_s("` + pencilid6 + `")'
                       onmouseout='hidePencil_s("` + pencilid6 + `")'
                       >
                       <i id='licensePlatePencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${licensePlate}','${updateTolls}','${type}','${mainID}','${licensePlateColumn}','${title6}','${pencilid6}')"
                       ></i>
                       ${licensePlate}
                   </td>
                   <td class='custom-text ${delEn}' id='amount` + ids + `'
                       onmouseover='showPencil_s("` + pencilid5 + `")'
                       onmouseout='hidePencil_s("` + pencilid5 + `")'
                       >
                       <i id='amountPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${amount}','${updateTolls}','${type}','${mainID}','${amountColumn}','${title5}','${pencilid5}')"
                       ></i>
                       $${amount}
                   </td>
                   <td class='custom-text ${delEn}' id='truckNo` + ids + `'
                       onmouseover='showPencil_s("` + pencilid7 + `")'
                       onmouseout='hidePencil_s("` + pencilid7 + `")'
                       >
                       <i id='truckNoPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${truckNo}','${updateTolls}','${type}','${mainID}','${truckNoColumn}','${title7}','${pencilid7}')"
                       ></i>
                       ${truckNo}
                   </td>
                   <td class='center-alignment ${delEn}' id='invoiceNumber` + ids + `'
                       onmouseover='showPencil_s("` + pencilid8 + `")'
                       onmouseout='hidePencil_s("` + pencilid8 + `")'
                       >
                       <i id='invoiceNumberPencil` + ids + `' class='mdi mdi-lead-pencil edit-pencil'
                           onclick="updateTableColumn('${invoiceNumber}','${updateTolls}','${type}','${mainID}','${invoiceNumberColumn}','${title8}','${pencilid8}')"
                       ></i>
                       ${invoiceNumber}
                   </td>`;
        tr += `<td class="${delEn}">`;
        if (delete_status == "YES") {
            tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                            <span class="tooltiptext">
                            Deleted By : ${deleteUser}<br>Deleted Time : ${deleteTime}</span>
                            </div>`;
        } else {
            if (edit_by != undefined && edit_time != undefined) {
                tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                            <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}<br>Edit By : ${edit_by}<br>Edited Time : ${edit_time}</span>
                            </div>`;
            } else {
                tr += `<div class="tooltip1"><i class='mdi mdi-information information'></i>
                        <span class="tooltiptext">Created By : ${created_by}<br>Created Time : ${created_time}</span>
                        </div>`;
            }
        }
        tr += '</td>';
        tr += '</tr>';
        row = tr + row;
    }
    return row;
}

//..................Add Toll.............................//
function Add_TollData() {
    var companyId = document.getElementById('companyId').value;
    var invoiceNumber = document.getElementById('tollInvoiceNumber').value;
    var tollDate = document.getElementById('tollDate').value;
    var tollTime = document.getElementById('tollTime').value;
    var transType = document.getElementById('transType').value;
    var location = document.getElementById('tollLocation').value;
    var transponder = document.getElementById('transponder').value;
    var amount = document.getElementById('tollAmount').value;
    var licensePlate = document.getElementById('licensePlate').value;
    var truckName = document.getElementById('tollTruckNumber').value;

    if (val_tollDate(tollDate)) {
        if (val_transType(transType)) {
            if (val_location(location)) {
                if (val_truckName(truckName)) {
                    if (val_licensePlate(licensePlate)) {
                        if (val_amount(amount)) {
                            var data = {
                                companyId: companyId,
                                invoiceNumber: invoiceNumber,
                                tollDate: tollDate,
                                tollTime: tollTime,
                                transType: transType,
                                location: location,
                                transponder: transponder,
                                amount: amount,
                                licensePlate: licensePlate,
                                truckNo: truckName,
                                companyId: companyId,
                                privilege: privilege,
                            }
                            $(".loader1").css("display", "inline-block");
                            $("#tollbutton").attr("disabled", true);
                            $.ajax({
                                url: './Master.php',
                                type: 'POST',
                                data: {
                                    main: "ifta",
                                    sub: "addtoll",
                                    data: data,
                                },
                                dataType: "text",
                                success: function (response) {
                                    var res = JSON.parse(response);
                                    var resObj = { 0: res };
                                    resObj.type = "Add";
                                    var companyid = $('#companyid').val();
                                    database.ref('ifta_toll').child(companyid).set({
                                        data: resObj,
                                    });
                                    swal('Inserted', 'Data Inserted Successfully.', 'success');
                                    $('#toll').parent().empty();
                                    $(".loader1").css("display", "inline-block");
                                },
                            });
                        }
                    }
                }
            }
        }
    }
}

//.............search toll............
var toll_fields = "";
function searchbytoll(searchdata) {
    toll_fields = searchdata.value;
}
function searchText_Toll(x) {
    $(".loading").css("display", "inline-block");
    var n = x.value;
    var data = {
        getoption: n,
        toll_fields: toll_fields,
        companyId: companyId,
        privilege: privilege,
    }
    if (val_toll_fields(toll_fields)) {
        $.ajax({
            type: 'POST',
            url: './Master.php',
            data: {
                main: "ifta",
                sub: "searchtoll",
                data: data,
            },
            success: function (response) {
                $(".loading").css("display", "none");
                var res = JSON.parse(response);
                $('#paginate').empty();
                if (res[0] != '' && res.length == 1) {
                    processTollTable(res[0]);
                    renameTableSeq2("tollBody");
                } else if (res[0] != '') {
                    processTollTable(res[0]);
                    renameTableSeq2("tollBody");
                    $("#paginate").html(paginateList(res[1], "ifta", "paginatetoll", "processTollTable"));
                }
                else {
                    var tr = "<tr><td colspan='11' style='color : red;font-weight: bold'><marquee direction='right' scrollamount='10'>NO RESULT FOUND..!!</marquee></td></tr>";
                    $("#tollBody").html(tr);
                }
            }
        });
    }
}
//...................update Toll....................//
function updateTolls(column, id, value, type) {
    var companyId = document.getElementById('companyId').value;
    var ids = id.split(')');
    var editObj = { 0: { "id": ids[1] + "-" + ids[0], "column": column, "value": value, "type": type }, "type": 'Edit', "string": randomString() };
    var data = {
        companyId: companyId,
        column: column,
        id: ids[0],
        masterID: ids[1],
        value: value,
        companyId: companyId,
        privilege: privilege,
    }
    $.ajax({
        url: './Master.php',
        type: 'POST',
        data: {
            main: "ifta",
            sub: "edittoll",
            data: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('ifta_toll').child(companyid).set({
                data: editObj,
            });
            swal("Success", data, "success");
            $("#updateTable").parent().empty();
            $('#search').val("");
        }
    });
}
//...................Delete Toll.............................
function delete_toll() {
    var deleteids_arr = [];
    $("input:checkbox[class=delete_check]:checked").each(function () {
        deleteids_arr.push($(this).val());
    });
    var deleteObj = { "type": 'DeleteToll', "string": randomString() };
    if (deleteids_arr.length > 0) {
        var data = {
            deleteids_arr: deleteids_arr,
        }
        var confirmdelete = confirm("Do you really want to Delete records?");
        if (confirmdelete == true) {
            $.ajax({
                url: './Master.php',
                type: 'POST',
                data: {
                    main: "ifta",
                    sub: "deletetoll",
                    data: data,
                },
                success: function (response) {
                    var companyid = $('#companyid').val();
                    database.ref('ifta_toll').child(companyid).set({
                        data: deleteObj,
                    });
                    swal('Delete', 'Data Deleted Successfully.', 'success');
                    $('#checkall').prop('checked', false);
                    $(".delete_record").hide();
                }
            });
        }
    }
}

// Export Toll
function exportTolls() {
    $.ajax({
        url: './Master.php',
        data: {
            main: "ifta",
            sub: "exporttoll",
        },
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);
            JSONToCSVConvertor(rows, "Toll Report", false);
        }
    });
}

// Import Toll
function importTolls() {
    var i = -1;
    var fileUpload = document.getElementById('file');
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx)$/;
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (FileReader) != "undefined") {
            var reader = new FileReader();
            if (reader.readAsBinaryString) {
                reader.onload = function (e) {
                    var workbook = XLSX.read(e.target.result, {
                        type: 'binary'
                    });
                    var firstSheet = workbook.SheetNames[0];
                    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
                    //if (excelRows[0].hasOwnProperty("Name")) {
                    if (excelRows.length > 1001) {
                        swal("File must contain atmost 1000 rows at a time.")
                    } else {
                        ProcessExcelToll(excelRows);
                    }
                    //} else {
                    //swal("Oops header entries didn't match the format. Download the given XLSX file.")
                    //}
                };
                reader.readAsBinaryString(fileUpload.files[0]);
            } else {
                reader.onload = function (e) {
                    var data = "";
                    var bytes = new Uint8Array(e.target.result);
                    for (var i = 0; i < bytes.byteLength; i++) {
                        data += String.fromCharCode(bytes[i]);
                    }
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });
                    var firstSheet = workbook.SheetNames[0];
                    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
                    //if (excelRows[0].hasOwnProperty("Name")) {
                    if (excelRows.length > 1001) {
                        swal("File must contain atmost 1000 rows at a time.")
                    } else {
                        ProcessExcelToll(excelRows);
                    }
                    // } else {
                    //swal("Oops header entries didn't match the format. Download the given XLSX file.")
                    // }

                };
                reader.readAsArrayBuffer(fileUpload.files[0]);
            }
        } else {
            swal("This browser does not support HTML5.");
        }
    } else {
        swal('warning', 'You must select atleast one .XLSX file', 'warning');
    }
}

function ProcessExcelToll(data) {
    $(".loading").css("display", "inline-block");
    var maxLength = 6500;
    var x = document.getElementById("tollBody");
    var w = x.rows[0];
    if (w == undefined) {
        var index = -1;
    } else {
        var index = getLastId("ifta_toll", "tolls");
    }
    index++;
    let modifiedData = data.map(
        (tolls, i) => {
            return {
                "_id": i + index,
                "tollDate": tolls['TransactionDate'] == null ? 'Not Mentioned' : tolls['TransactionDate'],
                "transType": tolls['TransactionType'] == null ? 'Not Mentioned' : tolls['TransactionType'],
                "location": tolls['Location'] == null ? 'Not Mentioned' : tolls['Location'],
                "transponder": tolls['Transponder'] == null ? 'Not Mentioned' : tolls['Transponder'],
                "licensePlate": tolls['LicensePlate'] == null ? 'Not Mentioned' : tolls['LicensePlate'],
                "amount": tolls['Amount'] == null ? 'Not Mentioned' : tolls['Amount'],
                "truckNo": tolls['TruckNo'] == null ? '' : tolls['TruckNo'],
                "invoiceNumber": tolls['Invoice'] == null ? '' : tolls['Invoice'],
                "counter": 0,
                "insertedUser": username,
                "insertedTime": Math.trunc(new Date().getTime() / 1000),
                "deleteStatus": "NO",
                'deleteUser': "",
                'deleteTime': "",
            }
        }
    );
    var arrLen = modifiedData.length;
    var data = {
        exceldata: modifiedData,
        length: arrLen,
        maxLength: maxLength,
        companyId: companyId,
        privilege: privilege,
    }
    $.ajax({
        url: './Master.php',
        method: "POST",
        data: {
            main: "ifta",
            sub: "importtoll",
            data: data,
        },
        success: function (response) {
            var companyid = $('#companyid').val();
            var arrcust = JSON.parse(response);
            var arrcustsize = arrcust.length;
            if (arrcustsize == 2) {
                var carr1 = arrcust[0];
                var carr2 = arrcust[1];
                var maincarr = [...carr1, ...carr2];
            } else {
                var carr1 = arrcust[0];
                var maincarr = [...carr1];
            }
            var tableArray = { 0: maincarr };
            tableArray.type = "Excel";
            tableArray.string = randomString();
            database.ref('ifta_toll').child(companyid).set({
                data: tableArray,
            });
            $(".loading").css("display", "none");
            swal('Inserted', 'Data Inserted Successfully.', 'success');
            document.getElementById('file').value = null;
        },
    });
};


function getTruckDetails(value) {
    var name = $('#tollTruckList [value="' + value + '"]').data('value');
    var companyId = document.getElementById('companyId').value;
    var data = {
        getoption: name,
        companyId: companyId
    }
    $.ajax({
        type: 'POST',
        url: "./Master.php",
        data: {
            main: "ifta",
            sub: "gettruckdetails",
            data: data,
        },
        success: function (response) {
            var res = response.split('^');
            $('#transponder').val(res[0]);
            $('#licensePlate').val(res[1]);
        }
    });
}

//-----------------Add Toll ENDS------------------------------------------

//----------------- IftaVerify START ----------------------------------
/*function addNew_Loc() {

}*/
var varifytrip = "verify_trip/";
var varifytrip1 = $('#companyid').val();
var varifytripdata = varifytrip1.toString();
var varifytrip_test = varifytrip + varifytripdata;

database.ref(varifytrip_test).on('child_changed', function (data) {
    verifyIftaTrip();
    iftaVerified();
});
//----------------- IftaVerify ENDS ----------------------------------
function verifyIftaTrip() {

    var year = document.getElementById('year').value;
    var quarter = document.getElementById('quarter').value;
    var data = {
        year: year,
        quarter: quarter,
    }
    $.ajax({
        url: './Master.php',
        method: 'POST',
        data: {
            main: 'ifta',
            sub: 'verifyifta',
            data: data,
        },
        type: 'html',
        success: function (data) {
            // console.log(data);
            $('#verifyLoad').html(data);

        }
    });
}

function iftaVerified() {

    var year = document.getElementById('year').value;
    var quarter = document.getElementById('quarter').value;
    var data = {
        year: year,
        quarter: quarter
    }
    $.ajax({
        url: './Master.php',
        method: 'POST',
        data: {
            main: 'ifta',
            sub: 'verifiedifta',
            data: data,
        },
        type: 'html',
        success: function (data) {
            $('#verifiedLoad').html(data);

        }
    });
}


//save ifta
function saveifta() {
    if (confirm("Are you sure? Trip once verified cannot be undone later.")) {
        let data = document.getElementById("iftaloaddata").getAttribute("loadData").split("^");
        let loadId = data[0];
        let load_collection = data[1];
        let year = document.getElementById("year").value;
        let quarter = document.getElementById("quarter").value;
        let truck = document.getElementById("iftatruckno" + rowindex).innerText;
        let mileagestates = [];
        let tcountry = document.getElementsByName("tcountry");
        let ttotal = document.getElementsByName('ttotal');
        let ttoll = document.getElementsByName('ttoll');
        let tnontoll = document.getElementsByName('tnontoll');
        let tduration = document.getElementsByName('tduration');
        let points = document.getElementsByName('point');
        var companyId = document.getElementById('companyid').value;
        var waypoints = [];
        for (let i = 0; i < points.length; i++) {
            if (points[i].value != "") {
                waypoints.push(points[i].value);
            }
        }
        for (let i = 0; i < tcountry.length; i++) {
            mileagestates.push({
                state: tcountry[i].innerHTML,
                mi: ttotal[i].innerHTML,
                toll: ttoll[i].innerHTML,
                nontoll: tnontoll[i].innerHTML,
                time: tduration[i].getAttribute("duration-sec"),
            })
        }
        var data1 = {
            id: loadId,
            collection: load_collection,
            year: year,
            quarter: quarter,
            mileagestates: mileagestates,
            truck: truck,
            waypoints: waypoints,
        }
        $.ajax({
            url: './Master.php',
            method: 'POST',
            data: {
                main: 'ifta',
                sub: 'saveifta',
                data: data1,
            },
            type: 'html',
            success: function (data) {
                database.ref('verify_trip').child(companyId).set({
                    data: randomString(),
                });
                swal(data);
                $('#verify-trip-modal').modal('hide');
                $('.verify-trip-container').empty();
            }
        });
    }
}


// edit ifta

function editIfta(index, id, collection) {
    $(".loading").css("display", "inline-block");
    rowindex = index;
    loadId = id;
    load_collection = collection;
    $.ajax({
        type: 'POST',
        success: function (data) {
            $(".modal-dialog").removeClass("opacity-animate3");
            $('.verify-trip-container').load('ifta/verify_trip_modal.php', function (response, status, xhr) {
                if (status == "success") {
                    $(".loading").css("display", "none");
                    $('#verify-trip-modal').modal({ show: true });
                    initMap1(index, id, collection);
                    document.getElementById('verify-ifta-title').innerHTML = "Verify Ifta/ INV# " + id + " / Status : " + collection;
                }
            });
        }
    });
}

var map1;
function initMap1(index, id, collection) {
    var directionsService = new google.maps.DirectionsService;
    var directionsRenderer = new google.maps.DirectionsRenderer({
        polylineOptions: {
            strokeColor: "blue"
        }
    });
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: { lat: 37.09024, lng: -95.712891 }
    });
    directionsRenderer.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsRenderer, index, id, collection);

}

function addfield(fieldid) {
    additional_counter++;
    var currTr = document.getElementById(fieldid);
    var newTR = document.createElement('tr');
    var rowid = "'" + "addfield" + additional_counter + "'";
    newTR.id = "addfield" + additional_counter;
    var newTR1 = document.createElement('tr');
    var labelid = "'" + "addlabel" + additional_counter + "'";
    newTR1.id = "addlabel" + additional_counter;
    newTR1.innerHTML = '<td></td>' +
        '<td>Additional Point</td>' +
        '<td></td>';
    newTR.innerHTML = '<td>' +
        '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="removeField(' + rowid + "," + labelid + ');"><i class="fa fa-times"></i> </button>' +
        '</td>' +
        '<td width="150"><input id="addpoint' + additional_counter + '"  name = "point" type="text" onkeydown="getLocation(this.id)" value="" class="form-control"/></td>' +
        '<td>' +
        '<button type="button" class="btn btn-success" data-toggle="tooltip" title="Disabled"  data-placement="top" title="Add new location" disabled><i class="fa fa-plus"></i></button>' +
        '</td>';
    currTr.parentNode.insertBefore(newTR1, currTr.nextSibling);
    newTR1.parentNode.insertBefore(newTR, newTR1.nextSibling);

    //document.getElementById(fieldid).append(innerText);
}

function removeField(fieldid, labelid) {
    document.getElementById(fieldid).remove();
    document.getElementById(labelid).remove();
}

function calculateAndDisplayRoute(directionsService, directionsRenderer, index, id, collection) {
    var waypts = [];
    var tab = "";
    var innerText = "";

    if (document.getElementById('iftatab1').classList.contains('active')) {
        var start = document.getElementById("startu" + index).innerText;
        if (start != "") {
            waypts.push({
                location: start,
                stopover: true
            })
        }
        var shipper = document.getElementById("shipperu" + index).innerText;
        var consignee = document.getElementById("consigneeu" + index).innerText;
        var shipperlist = shipper.split('/');
        var consigneelist = consignee.split('/');
        var end = document.getElementById("endu" + index).innerText;
        tab = 1;
        innerText = '<tr>' +
            '<td></td>' +
            '<td>Start Location</td>' +
            '<td></td>' +
            '</tr>' +
            '<tr id="startlocation">' +
            '<td>' +
            '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Disabled" disabled><i class="fa fa-times"></i> </button>' +
            '</td>' +
            '<td width="150"><input id="startroute" name = "point" type="text" onkeydown="getLocation(this.id)" value="' + start + '" class="form-control"/></td>' +
            '<td>' +
            '<button type="button" class="btn btn-success" data-toggle="tooltip" onclick="addfield(' + "'startlocation'" + ')" data-placement="top" title="Add new location"><i class="fa fa-plus"></i></button>' +
            '</td>' +
            '</tr>';

        for (var i = 0; i < shipperlist.length - 1; i++) {
            if (shipperlist[i] != "") {
                waypts.push({
                    location: shipperlist[i],
                    stopover: true
                })
            }
            let id = "shipperpoints" + i;
            let shipID = "'" + "shipperpoints" + i + "'";
            let labelID = "'" + "shipperlabel" + i + "'";
            let id1 = "'shipperpoints" + i + "'";
            innerText += '<tr id= ' + labelID + '>' +
                '<td></td>' +
                '<td>Shipper ' + (i + 1) + '</td>' +
                '<td></td>' +
                '</tr>' +
                '<tr id=' + id + '>' +
                '<td>' +
                '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="removeField(' + shipID + "," + labelID + ')" title="Remove this location"><i class="fa fa-times"></i> </button>' +
                '</td>' +
                '<td width="150"><input id="shipperroute' + i + '" name = "point"  type="text" onkeydown="getLocation(this.id)" value="' + shipperlist[i] + '" class="form-control"/></td>' +
                '<td>' +
                '<button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" onclick="addfield(' + id1 + ')" title="Add new location"><i class="fa fa-plus"></i></button>' +
                '</td>' +
                '</tr>';

        }

        for (var i = 0; i < consigneelist.length - 1; i++) {
            if (consigneelist[i] != "") {
                waypts.push({
                    location: consigneelist[i],
                    stopover: true
                })
            }
            let id = "consigneepoints" + i;
            let consigID = "'" + "consigneepoints" + i + "'";
            let labelID = "'" + "consigneelabel" + i + "'";
            let id1 = "'consigneepoints" + i + "'";
            innerText += '<tr id= ' + labelID + '>' +
                '<td></td>' +
                '<td>Consignee ' + (i + 1) + '</td>' +
                '<td></td>' +
                '</tr>' +
                '<tr id="' + id + '">' +
                '<td>' +
                '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" onclick="removeField(' + consigID + "," + labelID + ');" title="Remove this location"><i class="fa fa-times"></i> </button>' +
                '</td>' +
                '<td width="150"><input id="consigneeroute' + i + '" name = "point"  onkeydown="getLocation(this.id)" type="text" value="' + consigneelist[i] + '" class="form-control"/></td>' +
                '<td>' +
                '<button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" onclick="addfield(' + id1 + ');" title="Add new location"><i class="fa fa-plus"></i></button>' +
                '</td>' +
                '</tr>';

        }


        innerText += '<tr>' +
            '<td></td>' +
            '<td>End Location</td>' +
            '<td></td>' +
            '</tr>' +
            '<tr id="endlocation">' +
            '<td>' +
            '<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Disabled" disabled><i class="fa fa-times"></i> </button>' +
            '</td>' +
            '<td width="150"><input id="endroute" name = "point"  onkeydown="getLocation(this.id)" type="text" value="' + end + '" class="form-control"/></td>' +
            '<td>' +
            '<button type="button" class="btn btn-success" data-toggle="tooltip" onclick="addfield(' + "'endlocation'" + ')" data-placement="top" title="Disabled" disabled><i class="fa fa-plus"></i></button>' +
            '</td>' +
            '</tr>';

        if (end != "") {
            waypts.push({
                location: end,
                stopover: true
            })
        }
    }
    if (document.getElementById('iftatab2').classList.contains('active')) {

        tab = 2;
        var routepoints = JSON.parse(document.getElementById("waypoints").value);

        for (var i = 0; i < routepoints.length; i++) {
            if (routepoints[i] != "") {
                waypts.push({
                    location: routepoints[i],
                    stopover: true
                })
            }
            let id = "routepoints" + i;

            let labelID = "'" + "Route point" + i + "'";

            innerText += '<tr id= ' + labelID + '>' +

                '<td>Route Point ' + (i + 1) + '</td>' +

                '</tr>' +
                '<tr id=' + id + '>' +
                '<td width="150"><input id="route' + i + '" name = "point"  type="text" onkeydown="getLocation(this.id)" value="' + routepoints[i] + '" class="form-control"/></td>' +
                '</tr>';

        }
    }
    document.getElementById('route-points-table').innerHTML = innerText;
    document.getElementById("iftaloaddata").setAttribute("loadData", id + "^" + collection);
    calcRoute1(waypts, directionsRenderer, index, id, collection, tab);

}

//---get addresses

function get_addresses() {
    $("#by_state").html("");
    var waypts = [];

    var directionsRenderer = new google.maps.DirectionsRenderer({
        polylineOptions: {
            strokeColor: "blue"
        }
    });
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: { lat: 37.09024, lng: -95.712891 }
    });
    directionsRenderer.setMap(map);
    var points = document.getElementsByName('point');
    for (var i = 0; i < points.length; i++) {
        if (points[i].value != "") {
            waypts.push({
                location: points[i].value,
                stopover: true
            })
        }
    }

    $(".from_cell").html("");
    $(".to_cell").html("");
    $(".t_distance").html("");
    $(".t_cell").html("");
    calcRoute1(waypts, directionsRenderer);
}


function showResult(result, i) {
    var latitude = result.geometry.location.lat();
    var longitude = result.geometry.location.lng();

    waypointArr[i] = latitude + ',' + longitude;
    //waypointArr.push({key : latitude + ',' + longitude});

}

function getWaypoint2(address, i) {
    geocoder = new google.maps.Geocoder();
    if (geocoder) {
        geocoder.geocode({
            'address': address
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                showResult(results[0], i);
            }
        });
    }
}
//---get route
function calcRoute1(waypts, directionsRenderer, index, id, collection, tab) {
    if (tab == 2) {
        document.getElementById('ifta-save').style.display = "none";
        document.getElementById('calculate-miles').disabled = true;
    }
    $(".loader1").css("display", "inline-block");
    document.getElementById('ifta-save').disabled = true;
    document.getElementById('calculate-miles').disabled = true;
    waypointArr = [];
    var start = waypts[0].location;
    var end = waypts[waypts.length - 1].location;

    geocoder = new google.maps.Geocoder();
    for (var i = 0; i < waypts.length; i++) {
        getWaypoint2(waypts[i].location, i);

    }
    waypts.shift();
    waypts.pop();

    var request = {
        origin: start,
        destination: end,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING,
        unitSystem: google.maps.DirectionsUnitSystem.METRIC
    };

    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            var waypoints = "";
            directionsRenderer.setDirections(response);
            setTimeout(function () {
                for (var i = 0; i < waypointArr.length; i++) {
                    var key = i.toString();
                    if (i == 0) {
                        waypoints += 'waypoint' + (i) + '=' + waypointArr[i];
                    } else {
                        waypoints += '&waypoint' + (i) + '=' + waypointArr[i];
                    }
                }

                // console.log("https://route.ls.hereapi.com/routing/7.2/calculateroute.json?"+waypoints+"&mode=fastest%3Btruck%3Btraffic%3Aenabled&routeattributes=sm,sc%2Csc&apiKey=WDCAVk_2VvP23K0dJZCIQFs2OXIkOyQ0VV3ijti1ueo");
                $.ajax({
                    url: "https://route.ls.hereapi.com/routing/7.2/calculateroute.json?" + waypoints + "&mode=fastest%3Btruck&routeattributes=none%2Csm%2Csc&apiKey=WDCAVk_2VvP23K0dJZCIQFs2OXIkOyQ0VV3ijti1ueo",
                    type: 'GET',
                    dataType: 'json',
                    crossDomain: true,
                    success: function (data) {
                        waypoints = "";
                        //console.log(data);
                        var summary = data.response.route[0].summary;
                        var summaryByCountry = data.response.route[0].summaryByCountry;
                        var miles = convertMeters(summary.distance, 1);
                        var legs = data.response.route[0].leg;


                        var tollDistance = 0;
                        var nonTollDistance = 0;
                        $("#by_state").html("");
                        for (var i = 0; i < summaryByCountry.length; i++) {

                            var html = '<tr>';
                            html += '<td name="tcountry">' + summaryByCountry[i].country + '</td>';
                            html += '<td name="ttotal">' + convertMeters(summaryByCountry[i].distance) + '</td>';

                            if (summaryByCountry[i].tollRoadDistance) {
                                html += '<td name="ttoll">' + convertMeters(summaryByCountry[i].tollRoadDistance) + '</td>';
                                tollDistance += parseFloat(summaryByCountry[i].tollRoadDistance);
                                html += '<td name="tnontoll">' + convertMeters(summaryByCountry[i].distance - summaryByCountry[i].tollRoadDistance) + '</td>';
                                nonTollDistance += parseInt(summaryByCountry[i].distance) - parseInt(summaryByCountry[i].tollRoadDistance);
                            } else {
                                html += '<td name="ttoll">0</td>';
                                html += '<td name="tnontoll">' + convertMeters(summaryByCountry[i].distance) + '</td>';
                                nonTollDistance += summaryByCountry[i].distance;

                            }

                            html += '<td name="tduration" duration-sec=' + summaryByCountry[i].travelTime + '>' + convertSecondsToHours(summaryByCountry[i].travelTime) + '</td>';
                            html += '</tr>';

                            $("#by_state").html($("#by_state").html() + html);

                            $(".loader1").css("display", "none");


                            document.getElementById('ifta-save').disabled = false;
                            document.getElementById('calculate-miles').disabled = false;
                        }

                        $(".from_cell").html(convertMeters(tollDistance));
                        $(".to_cell").html(convertMeters(nonTollDistance));
                        $(".t_distance").html(convertMeters(summary.distance, 1));
                        $(".t_cell").html(convertSecondsToHours(summary.travelTime));

                    },
                });
            }, 3000);
        } else {
            swal("Some Error Occurred !", '', 'info');
        }
    });
}

var all_driver = '';
function driverpay_statement() {
    getDriverEsettlement('clear');
    var value = document.getElementById("driver_name_report").value;

    if (!value.match(/all/i)) {
        var driver_name_report = $('#driver_name [value="' + value + '"]').data('value');
    } else {
        var driver_name_report = 'All';
    }

    var filterby = document.getElementById("filterby").value;
    var daterangefrom = document.getElementById("daterangefrom").value;
    var daterangeto = document.getElementById("daterangeto").value;

    if (val_driver_name(value)) {
        if (val_filterby(filterby)) {
            if (val_daterangefrom(daterangefrom)) {
                if (val_daterangeto(daterangeto)) {
                    $(".loading").css("display", "inline-block");
                    var data = {
                        driver_name_report: driver_name_report,
                        filterby: filterby,
                        daterangefrom: daterangefrom,
                        daterangeto: daterangeto
                    }

                    $.ajax({
                        url: './Master.php',
                        type: 'POST',
                        data: {
                            main: "ifta",
                            sub: "driverpaystatement",
                            data: data,
                        },
                        success: function (data) {
                            // console.log(data);
                            // $(".loading").css("display", "none");
                            // return;
                            var arr = JSON.parse(data);
                             
                            var countarr = Object.keys(arr).length;
                            for (var p = 0; p < countarr; p++) {

                                if (countarr == 1) {

                                    var statementlen = arr[p].statement.length;
                                    var driver_table = '';
                                    var alldriver_table = '';
                                    for (var i = 0; i <= statementlen - 1; i++) {

                                        var picdate = convertTimeZone(arr[p].statement[i].pick_date, "info");
                                        driver_table += `<tr><td class='center-alignment'>${arr[p].statement[i].invoice}</td>
                                                          <td class='center-alignment'>${picdate}</td>
                                                          <td style='word-wrap: break-word;'>${arr[p].statement[i].shipper}</td>
                                                          <td style='word-wrap: break-word;'>${arr[p].statement[i].consignee}</td>
                                                          <td>$${arr[p].statement[i].load_tarp}</td>
                                                          <td>$${arr[p].statement[i].other_charges}</td>
                                                          <td>${arr[p].statement[i].empty_miles}</td>
                                                          <td>${arr[p].statement[i].loaded_miles}</td>
                                                          <td>${arr[p].statement[i].truck}</td>
                                                          <td>${arr[p].statement[i].trailer}</td>
                                                          <td>$${arr[p].statement[i].gross_pay}</td>
                                                          <td>$${arr[p].statement[i].net_pay}</td></tr>`;

                                    }

                                    driver_table += `<tr><th style = 'background: #0047B1; color:#fff'>Total</th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_tarp}</th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_other_chgs}</th>
                                    <th style = 'background: #0047B1; color:#fff'>${arr[p].totalstatement[0].total_empty_miles}</th>
                                    <th style = 'background: #0047B1; color:#fff'>${arr[p].totalstatement[0].total_loaded_miles}</th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_gross_pay}</th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_net_pay}</th>
                                </tr>`;

                                    var driver_id = arr[p].totalstatement[0].updrivername;

                                    var totalamountadd = 0;
                                    var recurrenceaddlen = arr[p].recurrenceadd.length;
                                    for (var d = 0; d <= recurrenceaddlen - 1; d++) {
                                        var recurrencesubarr = arr[p].recurrenceadd[d].length;
                                        for (var j = 0; j <= recurrencesubarr - 1; j++) {
                                            var recurrstartdate = dateFormat(arr[p].recurrenceadd[d][j].date);

                                            if (arr[p].recurrenceadd[d][j].skipped == "no") {
                                                totalamountadd += parseFloat(arr[p].recurrenceadd[d][j].amount);
                                                var skipbuttonadd = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].recurrenceadd[d][j].id},${arr[p].recurrenceadd[d][j].no},${recurrstartdate},"${arr[p].recurrenceadd[d][j].recurrtype}",${driver_id});'>SKIP</button>`;
                                            } else if (arr[p].recurrenceadd[d][j].skipped == "yes") {
                                                var skipbuttonadd = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                        <td>${arr[p].recurrenceadd[d][j].date}</td>
                                        <td colspan = "2">${arr[p].recurrenceadd[d][j].category}</td><br>
                                        <td colspan = "2">${arr[p].recurrenceadd[d][j].note}</td><br>
                                        <td>$${arr[p].recurrenceadd[d][j].amount.toFixed(2)}</td><br>
                                        <td colspan = "2">INSTALLMENT# ${arr[p].recurrenceadd[d][j].skipped == "yes" ? parseInt(arr[p].recurrenceadd[d][j].no) + 1 : arr[p].recurrenceadd[d][j].no}</td><br>
                                        <td>${skipbuttonadd}</td>
                                        <td></td></tr>`;
                                        }
                                    }

                                    var totalamountsub = 0;
                                    var recurrencesublen = arr[p].recurrencesub.length;
                                    for (var m = 0; m <= recurrencesublen - 1; m++) {
                                        var recurrencesubarrmin = arr[p].recurrencesub[m].length;
                                        for (var b = 0; b <= recurrencesubarrmin - 1; b++) {
                                            var recurrsubstartdate = dateFormat(arr[p].recurrencesub[m][b].date);

                                            if (arr[p].recurrencesub[m][b].skipped == "no") {
                                                totalamountsub += parseFloat(arr[p].recurrencesub[m][b].amount);
                                                var drty = "driver";
                                                var skipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].recurrencesub[m][b].id},${arr[p].recurrencesub[m][b].no},${recurrsubstartdate},"${arr[p].recurrencesub[m][b].recurrtype}",${driver_id},"${drty}");'>SKIP</button></td>`;
                                            } else if (arr[p].recurrencesub[m][b].skipped == "yes") {
                                                var skipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                        <td>${arr[p].recurrencesub[m][b].date}</td>
                                        <td colspan = "2">${arr[p].recurrencesub[m][b].category}</td><br>
                                        <td colspan = "2">${arr[p].recurrencesub[m][b].note}</td>
                                        <td>$(${arr[p].recurrencesub[m][b].amount.toFixed(2)})</td>
                                        <td colspan = "2">INSTALLMENT# ${arr[p].recurrencesub[m][b].skipped == "yes" ? parseInt(arr[p].recurrencesub[m][b].no) + 1 : arr[p].recurrencesub[m][b].no}</td>
                                        <td>${skipbutton}</td>
                                        <td></td></tr>`;
                                        }
                                    }


                                    var oototalamountsub = 0;
                                    var oorecurrlen = arr[p].ownerrecurr.length;

                                    driver_table += `<tr></tr>`;
                                    for (var op = 0; op < oorecurrlen; op++) {
                                        var oorecurrsublen = arr[p].ownerrecurr[op].length;
                                        for (var opd = 0; opd < oorecurrsublen; opd++) {

                                            var oorecurrsubstartdate = dateFormat(arr[p].ownerrecurr[op][opd].date);

                                            if (arr[p].ownerrecurr[op][opd].skipped == "no") {
                                                oototalamountsub += parseFloat(arr[p].ownerrecurr[op][opd].amount);
                                                var drty = "owner";
                                                var ooskipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].ownerrecurr[op][opd].id},${arr[p].ownerrecurr[op][opd].no},${oorecurrsubstartdate},"${arr[p].ownerrecurr[op][opd].recurrtype}",${driver_id},"${drty}");'>SKIP</button></td>`;
                                            } else if (arr[p].ownerrecurr[op][opd].skipped == "yes") {
                                                var ooskipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                                            <td>${arr[p].ownerrecurr[op][opd].date}</td>
                                                            <td colspan = "2">${arr[p].ownerrecurr[op][opd].category}</td><br>
                                                            <td colspan = "2">${arr[p].ownerrecurr[op][opd].note}</td>
                                                            <td>$(${arr[p].ownerrecurr[op][opd].amount.toFixed(2)})</td>
                                                            <td colspan = "2">INSTALLMENT# ${arr[p].ownerrecurr[op][opd].skipped == "yes" ? parseInt(arr[p].ownerrecurr[op][opd].no) + 1 : arr[p].ownerrecurr[op][opd].no}</td>
                                                            <td>${ooskipbutton}</td>
                                                            <td></td></tr>`;


                                        }
                                    }

                                    var advancelen = arr[p].advance.length;
                                    for (var e = 0; e < advancelen; e++) {
                                        driver_table += `<tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                           
                                                            <td colspan = "3">${arr[p].advance[e].description}</td>
                                                            <td colspan = "3">${arr[p].advance[e].amount}</td>
                                                             <td></td>
                                                            <td></td>
                                                    </tr>`;
                                    }

                                    var netamount = parseFloat(arr[p].finaltotal + totalamountadd);

                                    var final_amount = parseFloat((netamount) - (totalamountsub) - (oototalamountsub));

                                    var totalpaydriver = final_amount + arr[p].driverBalance

                                    var finalamut = Math.abs(totalpaydriver.toFixed(2));
                                    if (totalpaydriver < 0) {
                                        finalamount = '($' + numberWithCommas(finalamut.toFixed(2)) + ')';
                                    } else {
                                        finalamount = "$" + numberWithCommas(totalpaydriver.toFixed(2));
                                    }

                                    driver_table += `<tr>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff' colspan = "3">Total Earning</th>
                                                <th style = 'background: #0047B1; color:#fff'colspan = "3">${finalamount}</th>
                                                <th style = 'background: #0047B1; color:#fff'></th>        
                                                <th style = 'background: #0047B1; color:#fff'></th></tr>`;
                                }

                            }


                            if (countarr >= 1) {

                                var lastindex = countarr - 1;
                                var alldrivertab = arr[lastindex].alldrivertable.length;
                                var driverloadtotal = 0;
                                var driveradvancetotal = 0;
                                var final_drtotal = 0;
                                var recurrsub = 0;
                                var oorecurrsub = 0;
                                var recurradd = 0;
                                var totalalldrvear = 0;
                                var driverindarr = [];
                                var totalnetdrvpaybal = 0;
                                var totalnetdrp = 0;
                                
                                for (var b = 0, l = 1; b < alldrivertab; b++, l++) {
                                    driverloadtotal += arr[lastindex].alldrivertable[b].driverload;
                                    driveradvancetotal += arr[lastindex].alldrivertable[b].driveradvance;
                                    final_drtotal += parseFloat(arr[lastindex].alldrivertable[b].totalearning);
                                    var shrecurrsub = 0;
                                    var ooshrecurrsub = 0;
                                    var shrecurradd = 0;

                                    for (var ew = 0; ew < arr[lastindex].alldrivertable[b].recurrencesub.length; ew++) {
                                        if (arr[lastindex].alldrivertable[b].recurrencesub[ew].length > 0) {
                                            recurrsub += parseFloat(arr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                                            shrecurrsub += parseFloat(arr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                                        }
                                    }

                                    for (var oew = 0; oew < arr[lastindex].alldrivertable[b].ownerrecurr.length; oew++) {
                                        if (arr[lastindex].alldrivertable[b].ownerrecurr[oew].length > 0) {
                                            oorecurrsub += parseFloat(arr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                                            ooshrecurrsub += parseFloat(arr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                                        }
                                    }

                                    for (var yw = 0; yw < arr[lastindex].alldrivertable[b].recurrenceadd.length; yw++) {
                                        if (arr[lastindex].alldrivertable[b].recurrenceadd[yw].length > 0) {
                                            recurradd += parseFloat(arr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                                            shrecurradd += parseFloat(arr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                                        }
                                    }

                                    var recurrdata = (shrecurradd) - (shrecurrsub) - (ooshrecurrsub);
                                    var finalrecurrdata = Math.sign(recurrdata) == -1 ? "(" + Math.abs(recurrdata).toFixed(2) + ")" : recurrdata.toFixed(2);
                                    var alldradv = Math.sign(arr[lastindex].alldrivertable[b].driveradvance) == -1 ? Math.abs(arr[lastindex].alldrivertable[b].driveradvance).toFixed(2) : Math.sign(arr[lastindex].alldrivertable[b].driveradvance) == 0 ? 0.00 : "(" + Math.abs(arr[lastindex].alldrivertable[b].driveradvance).toFixed(2) + ")";

                                    var calfinalrecurrdata = Math.sign(recurrdata) == -1 ? arr[lastindex].alldrivertable[b].totalearning - Math.abs(recurrdata) : parseFloat(arr[lastindex].alldrivertable[b].totalearning + recurrdata);

                                    totalalldrvear += parseFloat(arr[lastindex].alldrivertable[b].netern);
                                    driverindarr.push([arr[b]]);
                                    // console.log(arr[lastindex].alldrivertable[b]);
                                    // getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, {'id' : arr[lastindex].alldrivertable[b].drrecurr_id, 'email' : arr[lastindex].alldrivertable[b].driverIdEmail});
                                    if (arr[lastindex].alldrivertable[b].driverTelephonecr != '') { //$('#edispatchphone').val().replace(/[^0-9]/g, '').toString()
                                        getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, { 'id': arr[lastindex].alldrivertable[b].drrecurr_id, 'email': '' });
                                        var emailCheck = `<input type="checkbox" data-value="${arr[lastindex].alldrivertable[b].drivername}" data-id="${arr[lastindex].alldrivertable[b].drrecurr_id}" data-email="${''}" name="del_check" class="del_check" id="deletecheck_${l}" value="" onclick="getDriverEsettlement('${arr[lastindex].alldrivertable[b].drivername}', {'id' : ${arr[lastindex].alldrivertable[b].drrecurr_id}, 'email' : '${''}'})" checked>`;
                                    } else {
                                        var emailCheck = `<input type="checkbox" disabled>`;
                                    }
                                    var nerdrvpaybal = arr[lastindex].alldrivertable[b].driverBalance;
                                    totalnetdrvpaybal += parseFloat(arr[lastindex].alldrivertable[b].driverBalance);

                                    var netdrp = (nerdrvpaybal) + (calfinalrecurrdata);
                                    totalnetdrp += (nerdrvpaybal) + (calfinalrecurrdata);
                                    // getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, arr[lastindex].alldrivertable[b].driverIdEmail);
                                    alldriver_table += `<tr>    
                                                                <th>${emailCheck}</th>
                                                                <th class="text-center">${l}</th>
                                                                <td>${arr[lastindex].alldrivertable[b].drivername}</td>
                                                                <td class='center-alignment'>${arr[lastindex].alldrivertable[b].driverload}</td>
                                                                <td>$${numberWithCommas(arr[lastindex].alldrivertable[b].netern.toFixed(2))}</td>
                                                                <td class = '${arr[lastindex].alldrivertable[b].driveradvance > 0 ? "text-danger" : ""}'>$${numberWithCommas(alldradv)}</td>
                                                                <td class = '${Math.sign(recurrdata) == -1 ? "text-danger" : ""}'>$${numberWithCommas(finalrecurrdata)}</td>
                                                                <td class='${Math.sign(arr[lastindex].alldrivertable[b].driverBalance) == -1 ? "text-danger" : ""}'>$${numberWithCommas(Math.sign(arr[lastindex].alldrivertable[b].driverBalance) == -1 ? "(" + Math.abs(arr[lastindex].alldrivertable[b].driverBalance).toFixed(2) + ")" : arr[lastindex].alldrivertable[b].driverBalance.toFixed(2))}</td>
                                                               
                                                                <td class='${Math.sign(netdrp) == -1 ? "text-danger" : ""}'>$${numberWithCommas(Math.sign(netdrp) == -1 ? "(" + Math.abs(netdrp).toFixed(2) + ")" : netdrp.toFixed(2))}</td>
                                                                
                                                                <td><form action='Master.php' method='post' target='_blank'>
                                                                <input type='hidden' name='data' value='${JSON.stringify(driverindarr[b])}' />
                                                                <input type='hidden' name='main' value='ifta' />
                                                                <input type='hidden' name='sub' value='driverpaypdf' />
                                            
                                                                <button type='submit' class='btn btn-primary waves-effect waves-light' name='Print'
                                                                    value='' > <i class="fa fa-print"></i> Print</button>
                                                            </form></td>
                                                            </tr>`;

                                }
                                // <td class = 'custom-text'>$${numberWithCommas(Math.sign(calfinalrecurrdata) == -1 ? "(" + Math.abs(calfinalrecurrdata).toFixed(2) + ")" : calfinalrecurrdata.toFixed(2))}</td>
                                // <th>$${numberWithCommas(Math.sign(finalestdrv) == -1 ? "(" + Math.abs(finalestdrv) + ")" : finalestdrv)}</th>
                                var totalrecurramount = (recurradd) - (recurrsub) - (oorecurrsub);
                                var finalestdrv = Math.sign(totalrecurramount) == -1 ? parseFloat(final_drtotal - Math.abs(totalrecurramount)).toFixed(2) : parseFloat(final_drtotal + totalrecurramount).toFixed(2);

                                var alldriver_table_foot = `<tr>
                                                                <th>Select</th> 
                                                                <th>#</th>
                                                                <th>Total</th>
                                                                <th>${driverloadtotal}</th>
                                                                <th>$${numberWithCommas(totalalldrvear.toFixed(2))}</th>
                                                                <th>$${"(" + numberWithCommas(driveradvancetotal.toFixed(2)) + ")"}</th>
                                                                <th>$${Math.sign(totalrecurramount) == -1 ? "(" + Math.abs(totalrecurramount.toFixed(2)) + ")" : numberWithCommas(totalrecurramount.toFixed(2))}</th>
                                                                <th>$${Math.sign(totalnetdrvpaybal) == -1 ? "(" + Math.abs(totalnetdrvpaybal.toFixed(2)) + ")" : numberWithCommas(totalnetdrvpaybal.toFixed(2))}</th>
                                                                
                                                                <th>$${numberWithCommas(Math.sign(totalnetdrp) == -1 ? "(" + Math.abs(totalnetdrp.toFixed(2)) + ")" : totalnetdrp.toFixed(2))}</th>
                                                                <th>Action</th>
                                                            </tr>`;
                            }

                            $('#all_driver').html(alldriver_table);
                            $('#all_driver_foot').html(alldriver_table_foot);
                            $('#driver_pay_statement_data').html(driver_table);
                            $(".loading").css("display", "none");
                            document.getElementById('driverobj').value = JSON.stringify(arr);

                        }
                    });
                }
            }
        }
    }
}

//------------------------------------------Driver Pay History----------------------------------------------


var all_driver = '';
function driverpay_statement_History() {
    
    var valueh = document.getElementById("driver_name_reportHistory").value;

    if (!valueh.match(/all/i)) {
        var driver_name_reporth = $('#driver_name_report_History [value="' + valueh + '"]').data('value');
    } else {
        var driver_name_reporth = 'All';
    }
    
    var filterbyh = document.getElementById("filterbyh").value;
    var daterangefromh = document.getElementById("daterangefromh").value;
    var daterangetoh = document.getElementById("daterangetoh").value;

    if (val_driver_name(valueh)) {
        if (val_filterby(filterbyh)) {
            if (val_daterangefrom(daterangefromh)) {
                if (val_daterangeto(daterangetoh)) {
                    $(".loading").css("display", "inline-block");
                    var datah = {
                        driver_name_report: driver_name_reporth,
                        filterby: filterbyh,
                        daterangefrom: daterangefromh,
                        daterangeto: daterangetoh
                    }
// console.log(datah);
                    $.ajax({
                        url: './Master.php',
                        type: 'POST',
                        data: {
                            main: "ifta",
                            sub: "driverpaystatementHistory",
                            data: datah,
                        },
                        success: function (datah) {
                            // console.log(data);
                            // $(".loading").css("display", "none");
                            // return;
                            var arr = JSON.parse(datah);
                            // console.log(arr);
                            
                            var countarr = Object.keys(arr).length;
                            for (var p = 0; p < countarr; p++) {

                                if (countarr == 1) {

                                    var statementlen = arr[p].statement.length;
                                    var driver_table = '';
                                    var alldriver_table = '';
                                    for (var i = 0; i <= statementlen - 1; i++) {

                                        var picdate = convertTimeZone(arr[p].statement[i].pick_date, "info");
                                        driver_table += `<tr><td class='center-alignment'>${arr[p].statement[i].invoice}</td>
                                                          <td class='center-alignment'>${picdate}</td>
                                                          <td style='word-wrap: break-word;'>${arr[p].statement[i].shipper}</td>
                                                          <td style='word-wrap: break-word;'>${arr[p].statement[i].consignee}</td>
                                                          <td>$${arr[p].statement[i].load_tarp}</td>
                                                          <td>$${arr[p].statement[i].other_charges}</td>
                                                          <td>${arr[p].statement[i].empty_miles}</td>
                                                          <td>${arr[p].statement[i].loaded_miles}</td>
                                                          <td>${arr[p].statement[i].truck}</td>
                                                          <td>${arr[p].statement[i].trailer}</td>
                                                          <td>$${arr[p].statement[i].gross_pay}</td>
                                                          <td>$${arr[p].statement[i].net_pay}</td></tr>`;

                                    }

                                    driver_table += `<tr><th style = 'background: #0047B1; color:#fff'>Total</th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_tarp}</th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_other_chgs}</th>
                                    <th style = 'background: #0047B1; color:#fff'>${arr[p].totalstatement[0].total_empty_miles}</th>
                                    <th style = 'background: #0047B1; color:#fff'>${arr[p].totalstatement[0].total_loaded_miles}</th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'></th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_gross_pay}</th>
                                    <th style = 'background: #0047B1; color:#fff'>$${arr[p].totalstatement[0].total_net_pay}</th>
                                </tr>`;

                                    var driver_id = arr[p].totalstatement[0].updrivername;

                                    var totalamountadd = 0;
                                    var recurrenceaddlen = arr[p].recurrenceadd.length;
                                    for (var d = 0; d <= recurrenceaddlen - 1; d++) {
                                        var recurrencesubarr = arr[p].recurrenceadd[d].length;
                                        for (var j = 0; j <= recurrencesubarr - 1; j++) {
                                            var recurrstartdate = dateFormat(arr[p].recurrenceadd[d][j].date);

                                            if (arr[p].recurrenceadd[d][j].skipped == "no") {
                                                totalamountadd += parseFloat(arr[p].recurrenceadd[d][j].amount);
                                                var skipbuttonadd = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].recurrenceadd[d][j].id},${arr[p].recurrenceadd[d][j].no},${recurrstartdate},"${arr[p].recurrenceadd[d][j].recurrtype}",${driver_id});'>SKIP</button>`;
                                            } else if (arr[p].recurrenceadd[d][j].skipped == "yes") {
                                                var skipbuttonadd = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                        <td>${arr[p].recurrenceadd[d][j].date}</td>
                                        <td colspan = "2">${arr[p].recurrenceadd[d][j].category}</td><br>
                                        <td colspan = "2">${arr[p].recurrenceadd[d][j].note}</td><br>
                                        <td>$${arr[p].recurrenceadd[d][j].amount.toFixed(2)}</td><br>
                                        <td colspan = "2">INSTALLMENT# ${arr[p].recurrenceadd[d][j].no}</td><br>
                                        <td>${skipbuttonadd}</td>
                                        <td></td></tr>`;
                                        }
                                    }

                                    var totalamountsub = 0;
                                    var recurrencesublen = arr[p].recurrencesub.length;
                                    for (var m = 0; m <= recurrencesublen - 1; m++) {
                                        var recurrencesubarrmin = arr[p].recurrencesub[m].length;
                                        for (var b = 0; b <= recurrencesubarrmin - 1; b++) {
                                            var recurrsubstartdate = dateFormat(arr[p].recurrencesub[m][b].date);

                                            if (arr[p].recurrencesub[m][b].skipped == "no") {
                                                totalamountsub += parseFloat(arr[p].recurrencesub[m][b].amount);
                                                var drty = "driver";
                                                var skipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].recurrencesub[m][b].id},${arr[p].recurrencesub[m][b].no},${recurrsubstartdate},"${arr[p].recurrencesub[m][b].recurrtype}",${driver_id},"${drty}");'>SKIP</button></td>`;
                                            } else if (arr[p].recurrencesub[m][b].skipped == "yes") {
                                                var skipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                        <td>${arr[p].recurrencesub[m][b].date}</td>
                                        <td colspan = "2">${arr[p].recurrencesub[m][b].category}</td><br>
                                        <td colspan = "2">${arr[p].recurrencesub[m][b].note}</td>
                                        <td>$(${arr[p].recurrencesub[m][b].amount.toFixed(2)})</td>
                                        <td colspan = "2">INSTALLMENT# ${arr[p].recurrencesub[m][b].no}</td>
                                        <td>${skipbutton}</td>
                                        <td></td></tr>`;
                                        }
                                    }


                                    var oototalamountsub = 0;
                                    var oorecurrlen = arr[p].ownerrecurr.length;

                                    driver_table += `<tr></tr>`;
                                    for (var op = 0; op < oorecurrlen; op++) {
                                        var oorecurrsublen = arr[p].ownerrecurr[op].length;
                                        for (var opd = 0; opd < oorecurrsublen; opd++) {

                                            var oorecurrsubstartdate = dateFormat(arr[p].ownerrecurr[op][opd].date);

                                            if (arr[p].ownerrecurr[op][opd].skipped == "no") {
                                                oototalamountsub += parseFloat(arr[p].ownerrecurr[op][opd].amount);
                                                var drty = "owner";
                                                var ooskipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' onclick = 'skipinstallment(${arr[p].ownerrecurr[op][opd].id},${arr[p].ownerrecurr[op][opd].no},${oorecurrsubstartdate},"${arr[p].ownerrecurr[op][opd].recurrtype}",${driver_id},"${drty}");'>SKIP</button></td>`;
                                            } else if (arr[p].ownerrecurr[op][opd].skipped == "yes") {
                                                var ooskipbutton = `<button  style='margin-right:21px;'class='float-right btn btn-primary' disabled>SKIPPED</button>`;
                                            }

                                            driver_table += `<tr><td></td><td></td>
                                                            <td>${arr[p].ownerrecurr[op][opd].date}</td>
                                                            <td colspan = "2">${arr[p].ownerrecurr[op][opd].category}</td><br>
                                                            <td colspan = "2">${arr[p].ownerrecurr[op][opd].note}</td>
                                                            <td>$(${arr[p].ownerrecurr[op][opd].amount.toFixed(2)})</td>
                                                            <td colspan = "2">INSTALLMENT# ${arr[p].ownerrecurr[op][opd].no}</td>
                                                            <td></td>
                                                            <td></td></tr>`;


                                        }
                                    }

                                    var advancelen = arr[p].advance.length;
                                    for (var e = 0; e < advancelen; e++) {
                                        driver_table += `<tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                           
                                                            <td colspan = "3">${arr[p].advance[e].description}</td>
                                                            <td colspan = "3">${arr[p].advance[e].amount}</td>
                                                             <td></td>
                                                            <td></td>
                                                    </tr>`;
                                    }

                                    var netamount = parseFloat(arr[p].finaltotal + totalamountadd);

                                    var final_amount = parseFloat((netamount) - (totalamountsub) - (oototalamountsub));

                                    var totalpaydriver = final_amount + arr[p].driverBalance

                                    var finalamut = Math.abs(totalpaydriver.toFixed(2));
                                    if (totalpaydriver < 0) {
                                        finalamount = '($' + numberWithCommas(finalamut.toFixed(2)) + ')';
                                    } else {
                                        finalamount = "$" + numberWithCommas(totalpaydriver.toFixed(2));
                                    }

                                    driver_table += `<tr>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff'></th>
                                                <th style = 'background: #0047B1; color:#fff' colspan = "3">Total Earning</th>
                                                <th style = 'background: #0047B1; color:#fff'colspan = "3">${finalamount}</th>
                                                <th style = 'background: #0047B1; color:#fff'></th>        
                                                <th style = 'background: #0047B1; color:#fff'></th></tr>`;
                                }

                            }


                            if (countarr >= 1) {

                                var lastindex = countarr - 1;
                                var alldrivertab = arr[lastindex].alldrivertable.length;
                                var driverloadtotal = 0;
                                var driveradvancetotal = 0;
                                var final_drtotal = 0;
                                var recurrsub = 0;
                                var oorecurrsub = 0;
                                var recurradd = 0;
                                var totalalldrvear = 0;
                                var driverindarr = [];
                                var totalnetdrvpaybal = 0;
                                var totalnetdrp = 0;
                                
                                for (var b = 0, l = 1; b < alldrivertab; b++, l++) {
                                    driverloadtotal += arr[lastindex].alldrivertable[b].driverload;
                                    driveradvancetotal += arr[lastindex].alldrivertable[b].driveradvance;
                                    final_drtotal += parseFloat(arr[lastindex].alldrivertable[b].totalearning);
                                    var shrecurrsub = 0;
                                    var ooshrecurrsub = 0;
                                    var shrecurradd = 0;

                                    for (var ew = 0; ew < arr[lastindex].alldrivertable[b].recurrencesub.length; ew++) {
                                        if (arr[lastindex].alldrivertable[b].recurrencesub[ew].length > 0) {
                                            recurrsub += parseFloat(arr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                                            shrecurrsub += parseFloat(arr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                                        }
                                    }

                                    for (var oew = 0; oew < arr[lastindex].alldrivertable[b].ownerrecurr.length; oew++) {
                                        if (arr[lastindex].alldrivertable[b].ownerrecurr[oew].length > 0) {
                                            oorecurrsub += parseFloat(arr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                                            ooshrecurrsub += parseFloat(arr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                                        }
                                    }

                                    for (var yw = 0; yw < arr[lastindex].alldrivertable[b].recurrenceadd.length; yw++) {
                                        if (arr[lastindex].alldrivertable[b].recurrenceadd[yw].length > 0) {
                                            recurradd += parseFloat(arr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                                            shrecurradd += parseFloat(arr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                                        }
                                    }

                                    var recurrdata = (shrecurradd) - (shrecurrsub) - (ooshrecurrsub);
                                    var finalrecurrdata = Math.sign(recurrdata) == -1 ? "(" + Math.abs(recurrdata).toFixed(2) + ")" : recurrdata.toFixed(2);
                                    var alldradv = Math.sign(arr[lastindex].alldrivertable[b].driveradvance) == -1 ? Math.abs(arr[lastindex].alldrivertable[b].driveradvance).toFixed(2) : Math.sign(arr[lastindex].alldrivertable[b].driveradvance) == 0 ? 0.00 : "(" + Math.abs(arr[lastindex].alldrivertable[b].driveradvance).toFixed(2) + ")";

                                    var calfinalrecurrdata = Math.sign(recurrdata) == -1 ? arr[lastindex].alldrivertable[b].totalearning - Math.abs(recurrdata) : parseFloat(arr[lastindex].alldrivertable[b].totalearning + recurrdata);

                                    totalalldrvear += parseFloat(arr[lastindex].alldrivertable[b].netern);
                                    driverindarr.push([arr[b]]);
                                    // console.log(arr[lastindex].alldrivertable[b]);
                                    // getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, {'id' : arr[lastindex].alldrivertable[b].drrecurr_id, 'email' : arr[lastindex].alldrivertable[b].driverIdEmail});
                                    if (arr[lastindex].alldrivertable[b].driverTelephonecr != '') { //$('#edispatchphone').val().replace(/[^0-9]/g, '').toString()
                                        getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, { 'id': arr[lastindex].alldrivertable[b].drrecurr_id, 'email': '' });
                                        var emailCheck = `<input type="checkbox" data-value="${arr[lastindex].alldrivertable[b].drivername}" data-id="${arr[lastindex].alldrivertable[b].drrecurr_id}" data-email="${''}" name="del_check" class="del_check" id="deletecheck_${l}" value="" onclick="getDriverEsettlement('${arr[lastindex].alldrivertable[b].drivername}', {'id' : ${arr[lastindex].alldrivertable[b].drrecurr_id}, 'email' : '${''}'})" checked>`;
                                    } else {
                                        var emailCheck = `<input type="checkbox" disabled>`;
                                    }
                                    var nerdrvpaybal = arr[lastindex].alldrivertable[b].driverBalance;
                                    totalnetdrvpaybal += parseFloat(arr[lastindex].alldrivertable[b].driverBalance);

                                    var netdrp = (nerdrvpaybal) + (calfinalrecurrdata);
                                    totalnetdrp += (nerdrvpaybal) + (calfinalrecurrdata);
                                    // getDriverEsettlement(arr[lastindex].alldrivertable[b].drivername, arr[lastindex].alldrivertable[b].driverIdEmail);
                                    alldriver_table += `<tr>    
                                                                <th>${emailCheck}</th>
                                                                <th class="text-center">${l}</th>
                                                                <td>${arr[lastindex].alldrivertable[b].drivername}</td>
                                                                <td class='center-alignment'>${arr[lastindex].alldrivertable[b].driverload}</td>
                                                                <td>$${numberWithCommas(arr[lastindex].alldrivertable[b].netern.toFixed(2))}</td>
                                                                <td class = 'custom-text'>$${numberWithCommas(alldradv)}</td>
                                                                <td>$${numberWithCommas(finalrecurrdata)}</td>
                                                                <td>$${numberWithCommas(Math.sign(arr[lastindex].alldrivertable[b].driverBalance) == -1 ? "(" + Math.abs(arr[lastindex].alldrivertable[b].driverBalance).toFixed(2) + ")" : arr[lastindex].alldrivertable[b].driverBalance.toFixed(2))}</td>
                                                               
                                                                <td>$${numberWithCommas(Math.sign(netdrp) == -1 ? "(" + Math.abs(netdrp).toFixed(2) + ")" : netdrp.toFixed(2))}</td>
                                                                
                                                                <td><form action='Master.php' method='post' target='_blank'>
                                                                <input type='hidden' name='data' value='${JSON.stringify(driverindarr[b])}' />
                                                                <input type='hidden' name='main' value='ifta' />
                                                                <input type='hidden' name='sub' value='driverpaypdf' />
                                            
                                                                <button type='submit' class='btn btn-primary waves-effect waves-light' name='Print'
                                                                    value='' > <i class="fa fa-print"></i> Print</button>
                                                            </form></td>
                                                            </tr>`;

                                }
                                // <td class = 'custom-text'>$${numberWithCommas(Math.sign(calfinalrecurrdata) == -1 ? "(" + Math.abs(calfinalrecurrdata).toFixed(2) + ")" : calfinalrecurrdata.toFixed(2))}</td>
                                // <th>$${numberWithCommas(Math.sign(finalestdrv) == -1 ? "(" + Math.abs(finalestdrv) + ")" : finalestdrv)}</th>
                                var totalrecurramount = (recurradd) - (recurrsub) - (oorecurrsub);
                                var finalestdrv = Math.sign(totalrecurramount) == -1 ? parseFloat(final_drtotal - Math.abs(totalrecurramount)).toFixed(2) : parseFloat(final_drtotal + totalrecurramount).toFixed(2);

                                var alldriver_table_foot = `<tr>
                                                                <th>Select</th> 
                                                                <th>#</th>
                                                                <th>Total</th>
                                                                <th>${driverloadtotal}</th>
                                                                <th>$${numberWithCommas(totalalldrvear.toFixed(2))}</th>
                                                                <th>$${"(" + numberWithCommas(driveradvancetotal.toFixed(2)) + ")"}</th>
                                                                <th>$${Math.sign(totalrecurramount) == -1 ? "(" + Math.abs(totalrecurramount.toFixed(2)) + ")" : numberWithCommas(totalrecurramount.toFixed(2))}</th>
                                                                <th>$${Math.sign(totalnetdrvpaybal) == -1 ? "(" + Math.abs(totalnetdrvpaybal.toFixed(2)) + ")" : numberWithCommas(totalnetdrvpaybal.toFixed(2))}</th>
                                                                
                                                                <th>$${numberWithCommas(Math.sign(totalnetdrp) == -1 ? "(" + Math.abs(totalnetdrp.toFixed(2)) + ")" : totalnetdrp.toFixed(2))}</th>
                                                                <th>Action</th>
                                                            </tr>`;
                            }

                            $('#all_driverHistory').html(alldriver_table);
                            $('#all_driver_footHistory').html(alldriver_table_foot);
                            $('#driver_pay_statement_Historydata').html(driver_table);
                            $(".loading").css("display", "none");
                            document.getElementById('driverobjHistory').value = JSON.stringify(arr);
                        }
                    });
                }
            }
        }
    }
}

//----------------------------------------------------------------------------------------------------------




function skipinstallment(recurrid, recurrno, recurrdate, recurrtype, driverrecurrid, drootype) {
    if (confirm("Are you sure? Skip This Recurrence.")) {
        var data = {
            recurrid: recurrid,
            recurrno: recurrno,
            recurrdate: recurrdate,
            recurrtype: recurrtype,
            driverrecurrid: driverrecurrid,
            drootype: drootype,
            companyId: companyId
        }
        $(".loading").css("display", "inline-block");
        $.ajax({
            url: './Master.php',
            method: 'POST',
            data: {
                main: 'admin',
                sub: 'skiprecurrence',
                data: data,
            },
            type: 'html',
            success: function (data) {
                driverpay_statement();
                $(".loading").css("display", "none");
                swal("Recurrence skip successfully");

            }
        });
    }
}

function restorecheckbox() {
    var no = 0;
    var length = $('.restore_check').length;
    var totalchecked = 0;
    $('.restore_check').each(function () {
        if ($(this).is(':checked')) {
            totalchecked += 1;
            no++;
        }
    });
    if (no > 0) {
        $(".restore_record").show();
    } else {
        $(".restore_record").hide();
    }
    // // Checked unchecked checkbox
    if (totalchecked == length) {
        $("#checkall").prop('checked', true);
    } else {
        $('#checkall').prop('checked', false);
    }
}

function convertMeters(meters, decimals, dontShowLabel) {
    var val = (meters * 0.00062137).toFixed(decimals);
    return val;
}

function convertSecondsToHours(seconds) {
    var minutes = seconds / 60;
    var roundedHours = (minutes / 60).toFixed(2);
    var hours = roundedHours.substr(0, roundedHours.indexOf('.'));
    var leftoverMinutes = roundedHours.substr(roundedHours.indexOf('.') + 1);
    leftoverMinutes = leftoverMinutes * 60 / 100;
    return hours + ' H ' + leftoverMinutes + ' M';
}

function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }
    }
}

function sendEsettlement() {

    let emailLen = Object.values(getDriverEsettlement()).length;
    let emailObj = getDriverEsettlement();
    var drv_filterby = $('#filterby').val();
    var drv_daterangefrom = $('#daterangefrom').val();
    var drv_daterangeto = $('#daterangeto').val();
    var data = {
        drvfilterby: drv_filterby,
        drvdaterangefrom: drv_daterangefrom,
        drvdaterangeto: drv_daterangeto,
        emailLen: emailLen,
        emailObj: emailObj
    }
    $(".loading").css("display", "inline-block");
    $.ajax({
        url: './Master.php',
        method: "POST",
        data: {
            main: "ifta",
            sub: "sendEsettlement",
            data: data,
        },
        success: function (response) {
            $(".loading").css("display", "none");
            var res = JSON.parse(response);
            if(res.error.length > 0){
                alertify.error("Error occured while sending E-pay stub!");
            }else{
                alertify.success("E-pay stub sent successfully");
            } 
        },
    });

}

// function selectEDriverPay() {
//     $('#maincheck').prop('checked') == true ?  $('.del_check').prop('checked', true) :  $('.del_check').prop('checked', false);
// }