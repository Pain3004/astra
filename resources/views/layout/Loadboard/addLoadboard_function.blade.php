<script>
    //-------function start-------
var letters = /^[0-9a-zA-Z '&,.-]+$/;

function renameConsignee() {
  var consignee = document.getElementsByClassName("consignee");
  for (
    var i = 0;
    i < document.getElementById("consignee").getElementsByTagName("li").length;
    i++
  ) {
    consignee[i].innerHTML = "Consignee " + (i + 1);
  }
}

function makeConsigneeActive() {
  for (var i = 0; i < count; i++) {
    var component = document.getElementById("consig-tab" + i);
    var component1 = document.getElementById("consig" + i);
    if (component && component1) {
      component.classList.remove("active");
      component1.classList.remove("show");
      component1.classList.remove("active");
      component.setAttribute("aria-selected", false);
    }
  }
  var newcomponent = document.getElementById("consig-tab" + i);
  var newcomponent1 = document.getElementById("consig" + i);
  newcomponent.classList.add("active");
  newcomponent1.classList.add("show");
  newcomponent1.classList.add("active");
  newcomponent.setAttribute("aria-selected", true);
}

function removeConsignee(mainid, contentid) {
  var element1 = document.getElementById(mainid);
  var element2 = document.getElementById(contentid);
  var ids = mainid.split("^");
  var tabID = ids[1];
  var newcomponent;
  var newcomponent1;
  if (mainid == "consig-title^0") {
    swal.fire({
      title: "First Consignee Cannot be removed!!",
      type: "warning",
      type: "info",
      html: "",
      showCancelButton: true,
      confirmButtonText: "Yes, Continue!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger ml-2",
      buttonsStyling: false,
    });
    return;
  }

  for (var i = tabID - 1; i >= 0; i--) {
    if (document.getElementById("consig-title^" + i)) {
      newcomponent = document.getElementById("consig-tab" + i);
      newcomponent1 = document.getElementById("consig" + i);
      break;
    }
  }

  if (
    document.getElementById("consignee").getElementsByTagName("li").length > 1
  ) {
    for (var i = 0; i <= count; i++) {
      if (
        document.getElementById("consig-tab" + i) &&
        document.getElementById("consig" + i)
      ) {
        document.getElementById("consig-tab" + i).classList.remove("active");
        document.getElementById("consig" + i).classList.remove("show");
        document.getElementById("consig" + i).classList.remove("active");
        document
          .getElementById("consig-tab" + i)
          .setAttribute("aria-selected", false);
      }
    }

    document.getElementById("consignee").removeChild(element1);
    document.getElementById("consigneeContent").removeChild(element2);

    newcomponent.classList.add("active");
    newcomponent.setAttribute("aria-selected", true);
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    renameConsignee();
  } else {
    swal.fire({
      title: "First Consignee Cannot be removed!!",
      type: "warning",
      type: "info",
      html: "",
      showCancelButton: true,
      confirmButtonText: "Yes, Continue!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger ml-2",
      buttonsStyling: false,
    });
  }
}


// $('.LBshipper').click(function(){
//   //  alert(); 
// });


// <!-- -------------------------------------------------------------------------AccessorialModal ------------------------------------------------------------------------- -->
function getOtherCharges(){
  
  var tagSelect = [];
  var tot =parseFloat(0);


  $('input[name^="other_charges"]').each(function(oneTag){
      var oneValue = $(this).val();
      // alert(oneValue);
      tot=parseFloat(tot)+parseFloat(oneValue);
      $('#MainOtherCharges').val(tot);
      getTotal();
      $("#AccessorialModal").modal('hide');
  });
}
// // <!-- -------------------------------------------------------------------------end of AccessorialModal ------------------------------------------------------------------------- -->

//-----------------------total-----------------
function getTotal() {
  
    var rateAmount = document.getElementById('rateAmount').value;
    // alert(rateAmount);
    var noOfUnits = document.getElementById('units').value;
    var fsc = document.getElementById('fsc').value;
    var totalAmount = document.getElementById('totalAmount');
    var ratePercentage = document.getElementById('fsc_percentage');
    var otherCharges = document.getElementById('MainOtherCharges').value;

    if (rateAmount != "" && noOfUnits == "" && fsc == "" && otherCharges == "") {
        totalAmount.value = parseFloat(rateAmount).toFixed(2);
       //$('#totalAmount').val(totalAmountvalue);
    }

    if (noOfUnits != "" && fsc == "") {
        if (rateAmount != "") {
            totalAmount.value = parseFloat(rateAmount * noOfUnits).toFixed(2);
            //$('#totalAmount').val(totalAmountvalue);
        } else {
            swal.fire({
                title: 'Warning!',
                text: "Rate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });

        }
    }
    if (fsc != "" && otherCharges == "") {
      if ($("#fsc_percentage").is(":checked")) { 
        // if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100));
                totalAmount.value = total.toFixed(2);
                //$('#totalAmount').val(totalAmountvalue);
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
          // alert();
            if (rateAmount != "") {
                if (typeof (rateAmount) == 'number') {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseInt(rateAmount * noOfUnits) + parseInt(fsc);
                    totalAmount.value = total.toFixed(2);
                    //$('#totalAmount').val(totalAmountvalue);
                } else {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseFloat(rateAmount * noOfUnits) + parseFloat(fsc);
                    totalAmount.value = total.toFixed(2);
                    //$('#totalAmount').val(totalAmountvalue);
                }
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }

    if (otherCharges != "") {
        if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 + parseFloat(otherCharges) : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100) + parseFloat(otherCharges));
                totalAmount.value = total.toFixed(2);
                //$('#totalAmount').val(totalAmountvalue);
            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + getFSC(fsc) + parseFloat(otherCharges) : parseInt(rateAmount * noOfUnits) + getFSC(fsc) + parseFloat(otherCharges);
                totalAmount.value = total.toFixed(2);
                ////$('#totalAmount').val(totalAmountvalue);

            } else {
                swal.fire({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }
}
function getFSC(fsc) {
  if (fsc == "") {
    return 0;
  } else {
    return parseFloat(fsc);
  }
}
//-----------------------end total-----------------


//-----------------------calculateMiles-----------------
function addStartLocation() {
  startLocation = document.getElementById("add_start_location").value;
  $("#startLocation").attr("modal-value", startLocation);
  $("#addstartlocation").modal("hide");
}

function addEndLocation() {
  endLocation = document.getElementById("add_end_location").value;
  $("#endLocation").attr("modal-value", endLocation);
  $("#endlocationmodal").modal("hide");
}

function addStartfield() {
  document.getElementById("add_start_location").value = startLocation;
}

function addEndfield() {
  document.getElementById("add_end_location").value = endLocation;
}

function calculateMiles() {
  
    $(".loader1").css("display", "inline-block");
    document.getElementById("drivermiles").value = 0;
    document.getElementById("loadedmiles").value = 0;
    document.getElementById("emptymiles").value = 0;
    var shipLoc = document.getElementsByName("shipperLocation[]");
    var consigLoc = document.getElementsByName("activeconsignee[]");
    var shipseq = document.getElementsByName("shipseq[]");
    var consigseq = document.getElementsByName("consigseq[]");
    var locations = [];
    var startFlag = 0;
    var endflag = 0;
    
    
    if (startLocation != "") {
      locations.push({ seq: "0", location: startLocation });
      startFlag = 1;
    }
    for (var i = 0; i < shipLoc.length; i++) {
      if (shipLoc[i].value == "") {
        swal.fire({
          title:
            "<h5>One of the shipper's location is empty. Please fill it to continue</h5>",
          type: "warning",
          type: "info",
          html: "",
          showCancelButton: true,
          confirmButtonText: "Yes, Continue!",
          cancelButtonText: "No, cancel!",
          confirmButtonClass: "btn btn-success",
          cancelButtonClass: "btn btn-danger ml-2",
          buttonsStyling: false,
        });
        $(".loader1").css("display", "none");
        return;
      }
      locations.push({ seq: shipseq[i].value, location: shipLoc[i].value });
    }
    for (var i = 0; i < consigLoc.length; i++) {
      if (consigLoc[i].value == "") {
        swal.fire({
          title:
            "<h5>One of the consignees's location is empty. Please fill it to continue</h5>",
          type: "warning",
          type: "info",
          html: "",
          showCancelButton: true,
          confirmButtonText: "Yes, Continue!",
          cancelButtonText: "No, cancel!",
          confirmButtonClass: "btn btn-success",
          cancelButtonClass: "btn btn-danger ml-2",
          buttonsStyling: false,
        });
        $(".loader1").css("display", "none");
        return;
      }
      locations.push({ seq: consigseq[i].value, location: consigLoc[i].value });
    }

    if (endLocation != "") {
      locations.push({ seq: "300", location: endLocation });
      endflag = 1;
    }
  // alert(locations.length);
    if (locations.length <= 1) {
      swal.fire({
        title: "<h5>There should be atleast one shipper and one consignee</h5>",
        type: "warning",
        type: "info",
        html: "",
        showCancelButton: true,
        confirmButtonText: "Yes, Continue!",
        cancelButtonText: "No, cancel!",
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger ml-2",
        buttonsStyling: false,
      });
      return;
    }
    
    locations.sort(compare);
    var waypts = [];
    for (var i = 0; i < locations.length; i++) {
      
      waypts.push({ location: locations[i].location, stopover: true });
    }
    
    calcRoute(waypts, startFlag, endflag);
}

function compare(a, b) {
  const seqA = a.seq;
  const seqB = b.seq;

  let comparison = 0;
  if (seqA > seqB) {
    comparison = 1;
  } else if (seqA < seqB) {
    comparison = -1;
  }
  return comparison;
}

function calcRoute(waypts, startFlag, endflag) {
  EmptyHour = 0;
  loadedHour = 0;
  var request = {
    origin: waypts[0].location,
    destination: waypts[waypts.length - 1].location,
    waypoints: waypts,
    optimizeWaypoints: true,
    travelMode: google.maps.DirectionsTravelMode.DRIVING,
    unitSystem: google.maps.DirectionsUnitSystem.METRIC,


  };  
  
  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
  
  directionsService.route(request, function (response, status) {
    
    if (status == google.maps.DirectionsStatus.OK) {
      var distance = 0;
      var time_taken = 0;
      var empty_km = 0;
      
      for (var i = 0; i < response.routes[0].legs.length; i++) {
        
        if (startFlag == 0 && endflag == 0) {
          
          distance += response.routes[0].legs[i].distance.value;
          loadedHour += response.routes[0].legs[i].duration.value;
          time_taken += response.routes[0].legs[i].duration.value;
          
        } else if (startFlag == 1 && endflag == 0) {
          
          if (i == 1) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
          }
        } else if (startFlag == 0 && endflag == 1) {
          
          if (i == response.routes[0].legs.length - 2) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
          }
        } else if (startFlag == 1 && endflag == 1) {
         
          if (i == 1) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
            
          
          } else if (i == response.routes[0].legs.length - 2) {
            empty_km += response.routes[0].legs[i].distance.value;
            EmptyHour += response.routes[0].legs[i].duration.value;
            
          } else {
            distance += response.routes[0].legs[i].distance.value;
            loadedHour += response.routes[0].legs[i].duration.value;
            time_taken += response.routes[0].legs[i].duration.value;
            
          }
        }
      }

      // console.log("distance:"+distance);
      //     console.log("loadedHour:"+loadedHour);
      //     console.log("time_taken:"+time_taken);
      //alert("loaded hour = "+loadedHour + "Empty hour = "+EmptyHour);
      var calc_distance = distance;

      function roundNumber(numbr, decimalPlaces) {
        var placeSetter = Math.pow(10, decimalPlaces);
        numbr = Math.round(numbr * placeSetter) / placeSetter;
        return numbr;
      }

      var mi = calc_distance / 1.609;
      mi = mi / 1000;
      mi = roundNumber(mi, 2);

      var empty_mi = empty_km / 1.609;
      empty_mi = empty_mi / 1000;
      empty_mi = roundNumber(empty_mi, 2);

      //alert("Total miles  = "+mi + "Empty miles = "+empty_mi);
      $("#drivermiles").val((empty_mi + mi).toFixed(2));
      $("#loadedmiles").val(Math.abs(mi).toFixed(2));
      $("#emptymiles").val(empty_mi);


     
    
    // if ($('input:radio[name="country"]').is(':checked'))
    // {
      if ($('#Driver').prop('checked', true))
      {
        alert();
        getDriverTotal();
      }
    // }




      // var type = document.getElementsByName("country");
      
      // alert(type);
      // var checked = getTypeOfLoader(type);
      // console.log(type);
      // if (checked == "Driver") {
      //   getDriverTotal();
      // }
      $(".loader1").css("display", "none");
    } else {
      $(".loader1").css("display", "none");
      alert("Unable to find route!!!");
    }
  });
}

function getTypeOfLoader(type) {
  for (let i = 0; i < type.length; i++) {
    if (type[i].checked) {
      var loaderType = type[i].getAttribute("id");
      switch (loaderType) {
        case "carrier":
          return "carrier";
        case "driver":
          return "driver";
        case "owner":
          return "owner";
      }
    }
  }
}

var placeArray = "";
$.getJSON(("./place.json", function (json) {
  placeArray = json; // this will show the info it in firebug console
}));

var placetimeout = "";
function getLocation(fieldID) {


  // console.log(fieldID);
  clearTimeout(placetimeout);
  var location = document.getElementById(fieldID);
  // console.log(location.value);
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
        list += `<li class="ui-menu-item" style="padding: 5px; border-bottom: 1px solid;" >
                                <div id="ui-id-2" tabindex="-1" class="ui-menu-item-wrapper" onclick="putValue('${val.city.toUpperCase()}', '${fieldID}', '${st}')">${val.city.toUpperCase()}</div>
                         </li>`;

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
  //var location = new google.maps.places.Autocomplete(document.getElementById(fieldID), options);
}
//-----------------------end calculateMiles-----------------
// //-----------------------other Carrier modal-----------------
// <!-- -------------------------------------------------------------------------Accessorial carrier Modal ------------------------------------------------------------------------- -->
function getcarrierOtherCharges(){
  
  // var tagSelect = [];
  var tot1 =parseFloat(0);
  var tot2 =parseFloat(0);
  var tot =parseFloat(0);


  $('input[name^="Advance_car"]').each(function(oneTag){
      var oneValue1 = $(this).val();
      tot1=parseFloat(tot1)+parseFloat(oneValue1);
  });
  $('input[name^="Charges_car[]"]').each(function(oneTag){
      var oneValue = $(this).val();
      tot2=parseFloat(tot2)+parseFloat(oneValue);
  });
  tot=parseFloat(tot1)+parseFloat(tot2)
  $('#Advcarrier').val(tot);
  getCarrierTotal();
  $("#AccessorialModal_carrier").modal('hide');
}

function getCarrierTotal() {
  var flatrate = document.getElementById("LB_FlatRate").value;
  // console.log(flatrate);
  var advancecharges = document.getElementById("Advcarrier").value;
  var total_charges = document.getElementById("LB_CarrierTotal");
  if (flatrate != "" && advancecharges == "") {
    total_charges.value = parseFloat(flatrate).toFixed(2);
  }
  if (advancecharges != "") {
    if (flatrate == "") {
      swal.fire({
        title: "Warning!",
        text: "Flatrate cannot be empty",
        type: "warning",
        showCancelButton: true,
        cancelButtonClass: "btn btn-danger ml-2",
      });
    } else {
      total_charges.value = parseFloat(
        parseFloat(flatrate) + parseFloat(advancecharges)
      ).toFixed(2);
    }
  }
}
// //-----------------------other Carrier modal-----------------
// <!-- -------------------------------------------------------------------------Accessorial driver Modal ------------------------------------------------------------------------- -->
function getdriverOtherCharges(){
  var tot =parseFloat(0);
  $('input[name^="Amount_dri"]').each(function(oneTag){
      var oneValue = $(this).val();
      tot=parseFloat(tot)+parseFloat(oneValue);
      $('#lb_driver_Other').val(tot);
  });
  $("#AccessorialModal_driver").modal('hide');
  getDriverTotal();

}
function getDriverTotal() {
  // console.log("driver");
 
    // getDriver(document.getElementById('LB_Driver').value);
    // getDriver(document.getElementById('select2-LB_Driver-container').value);
    var driver_other_charges = document.getElementById('lb_driver_Other');
    var driver_total = document.getElementById('LB_loadertotal');
    var loadedMiles = document.getElementById('loadedmiles');
    var emptyMiles = document.getElementById('emptymiles');
    var totalMiles = document.getElementById('drivermiles');
    var shipLoc = document.getElementsByName('shipperLocation[]');
    var consigLoc = document.getElementsByName('activeconsignee[]');
    var driverTotal = 0;
    var loadedTotal = 0;
    var pickTotal = 0;
    var dropTotal = 0;
    var emptyTotal = 0;
    var hourlyTotal = 0;
    // var flat = document.getElementById('driverflat');
    var driverflat = document.getElementById("lb_Flat");
    if (driver_other_charges.value != "") {
        driverTotal += parseFloat(driver_other_charges.value);
    } else {
        driver_other_charges.value = 0;
    }
    var driver_tarp = document.getElementById('lb_Tarp');
    var tarp_select = document.getElementById('driverTarpSelect');

    if (tarp_select.value == "Yes") {
        if (driver_tarp.value == 0) {
            driver_tarp.value = tarp;
        } else {
            tarp = driver_tarp.value;

        }
        console.log(tarp+"tarp");

        //driverTotal += parseFloat(parseFloat(driver_other_charges.value) + parseFloat(tarp)).toFixed(2);
        driverTotal += parseFloat(driver_other_charges.value) + parseFloat(tarp);

    } else if (tarp_select.value == "No") {
        if (driver_tarp.value != "") {
            driver_tarp.value = "";
            //driverTotal += parseFloat(driver_other_charges.value).toFixed(2);
            driverTotal += parseFloat(driver_other_charges.value);
        }
    } else {
        swal({
            title: 'Tarp is not added for selected driver.',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
    }

    if (driverRate == "mile") {
        if (loadedMiles.value != "") {
            loadedTotal = parseFloat(parseFloat(loadedMiles.value) * parseFloat(document.getElementById('lb_LoadedMiles').value));

        }
        if (emptyMiles.value != "") {
            emptyTotal = parseFloat(parseFloat(emptyMiles.value) * parseFloat(document.getElementById('lb_EmptyMiles').value));

        }
        console.log(loadedTotal+"+"+emptyTotal)
        driverTotal += eval(loadedTotal + emptyTotal);
    } else if (driverRate == "hour") {
        if (loadedMiles.value != "") {
            loadedTotal = parseFloat(parseFloat(loadedHour / 3600) * parseFloat(document.getElementById('lb_LoadedMiles').value));
        }
        if (emptyMiles.value != "") {
            emptyTotal = parseFloat(parseFloat(EmptyHour / 3600) * parseFloat(document.getElementById('lb_EmptyMiles').value));
        }
        driverTotal += eval(loadedTotal + emptyTotal);
    }
    if (loadedMiles.value != 0) {
        if (shipLoc.length >= 0) {
            if (pickrate > 0) {
                pickTotal += parseFloat(pickrate * (shipLoc.length - pickafter)).toFixed(2);
            }

        }
        if (consigLoc.length >= 0) {
            if (droprate > 0) {
                dropTotal += parseFloat(pickrate * (consigLoc.length - dropafter)).toFixed(2);

            }

        }

    }
    if (driverRate != 'percentage') {
        if (driverflat.value == "") {
            driverTotal += parseFloat(pickTotal) + parseFloat(dropTotal);
            driver_total.value = parseInt(driverTotal).toFixed(2);
        } else {
            driver_total.value = parseFloat(driverflat.value).toFixed(2);
        }


    }
}

function changeDriverTotal() {
  var driverflat = document.getElementById("lb_Flat");
  var driver_other_charges = document.getElementById("lb_driver_Other");
  var driver_total = document.getElementById("LB_loadertotal");

  if (driver_other_charges.value != "") {
    driver_total.value = parseFloat(
      parseFloat(driverflat.value) + parseFloat(driver_other_charges.value)
    ).toFixed(2);
  } else {
    driver_total.value = parseFloat(driverflat.value).toFixed(2);
  }
  if (driverflat.value == "") {
    driver_total.value = 0;
  }
}

function getownerOtherCharges() {
  // var oth_chg = document.getElementById("lb_owner_other");
  // var owner_other_total = 0;

  var tot =parseFloat(0);
  $('input[name^="Amount_own"]').each(function(oneTag){
      var oneValue = $(this).val();
      tot=parseFloat(tot)+parseFloat(oneValue);
      $('#lb_owner_other').val(tot);
  });
  $("#AccessorialModal_owneroperator").modal('hide');

  getOwnerTotal();
}

function getOwnerTotal() {
  var owner_other_charges = document.getElementById("lb_owner_other");
  var owner_percentage = document.getElementById("lb_owner_percentage");
  var owner_total = document.getElementById("lb_owner_total");
  if (owner_percentage.value != "") {
    if (owner_other_charges.value != 0) {
      var rateamount = parseFloat(document.getElementById("totalAmount").value);
      var peramount = parseFloat((rateamount * parseFloat(owner_percentage.value)) / 100);
      owner_total.value = peramount + parseFloat(owner_other_charges.value);
    }
  } else {
    swal.fire({
      title: "Are you sure? You Want to Continue!",
      type: "warning",
      type: "info",
      html: "<b> Pay Percentage cannot be Empty. </b>",
      showCancelButton: true,
      confirmButtonText: "Yes, Continue!",
      cancelButtonText: "No, cancel!",
      confirmButtonClass: "btn btn-success",
      cancelButtonClass: "btn btn-danger ml-2",
      buttonsStyling: false,
    });
  }
}


// //-----------------------other driver modal-----------------
// //-----------------------searchShipper-----------------
// Searching function for all 
var timeout = null;

function doSearch(dom, funname, val) {
  console.log(dom, funname, val);
    var active_id = val;
    var func = funname;
    var dom = dom;
    // var value = $('#search').val();
    if (timeout) {
        clearTimeout(timeout);
    }
    timeout = setTimeout(function () {
        if (func == 'searchActiveShipper') {
            searchActiveShipper(dom, active_id);
        }else if (func == 'searchActiveConsignee') {
            searchActiveConsignee(dom, active_id);
        } 
    }, 600); 
}

//-----shipper---------
function searchActiveShipper(value, id) {
  console.log(value, id);
  var newid = "shipperlist";
  var newlist = "shipper";
  if (id != 0) {
    newid = "shipperlist" + id;
    newlist = "shipper" + id;
  }
  searchShipper(value, newlist);
}
function searchShipper(value, id) {
  console.log(value, id);
  var formData = new FormData();
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('data',value);
    if (!value.includes(")")) {
        if (value.match(letters) || value == '') {
            $.ajax({
                url: base_path+"/admin/shipperList",
                type: "POST",
                datatype:"JSON",
                contentType: false,
                processData: false,
                data:formData,
                cache: false,
                success: function (response) {
                    var result = JSON.parse(response);
                    console.log(result);
                    if (result.length == 0) {
                        document.getElementById(id).innerHTML = "<option value='No results Found ...'></option>";
                    } else {
                        var options = "";
                        for (var i = 0; i < result.length; i++) {
                            options += `<option data-value = "${result[i].id}" data-id = "${result[i].parent}" value="${result[i].value}">${result[i].value}</option>`;
                        }
                        // $(".shipperSet").append(options);
                        document.getElementById(id).innerHTML = options;
                    }
                }
            });
        } else {
            swal('Please input alphanumeric characters only');
        }
    }
}

//---------consignee------------
function searchActiveConsignee(value, id) {
  var newid = "consigneelist";
  var newlist = "consigneee";
  if (id != 0) {
    newid = "consigneelist" + id;
    newlist = "consigneee" + id;
  }
  searchConsignee(value, newlist);
}

function searchConsignee(value, id) {
    console.log(value, id);
    var formData = new FormData();
    formData.append('_token',$("#tokenLoadboard").val());
    formData.append('data',value);
    if (!value.includes(")")) {
        if (value.match(letters) || value == '') {
            
            $.ajax({
                url: base_path+"/admin/consigneeList",
                type: "POST",
                datatype:"JSON",
                contentType: false,
                processData: false,
                data:formData,
                cache: false,
                success: function (response) {
                    
                    var result = JSON.parse(response);
                    console.log(result);
                    if (result.length == 0) {
                        document.getElementById(id).innerHTML = "<option value='No results Found ...'></option>";
                    } else {
                        var options = "";
                        for (var i = 0; i < result.length; i++) {
                            options += `<option data-value = "${result[i].id}" data-id = "${result[i].parent}" value="${result[i].value}">${result[i].location}</option>`;
                            //options += `<option data-value = "${result[i].id}" data-id = "${result[i].parent}" value="">${result[i].value}</option>`;
                        }
                        document.getElementById(id).innerHTML = options;
                    }
                }
            });
        } else {
            swal('Please input alphanumeric characters only');
        }
    }
}
</script>