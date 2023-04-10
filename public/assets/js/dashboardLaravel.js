var base_path = $("#url").val();
 //--------------Global Variable Start -----------------
var mainarr = { "current": [], "prev": [] };
var dispatchermain = { "current": [], "prev": [] };
var companymain = { "current": [], "prev": [] };
var drivermain = { "current": [], "prev": [] };
var carriermain = { "current": [], "prev": [] };
var equipmentmain = { "current": [], "prev": [] };
var salesmain = { "current": [], "prev": [] };
var cust_table = [];
var salcust_table = [];
var salcust_tablepre = [];
var sals_table = [];
var equip_table = [];
var dispatch_table = [];
var driver_table = [];
var truck_table = [];
var company_table = [];
var mapselectedstate = [];
var carrier_table = [];
var currentloadtotal = 0;
var prevloadtotal = 0;
var currentamounttotal = 0;
var prevamounttotal = 0;
var drivercurrentloadtotal = 0;
var driverprevloadtotal = 0;
var drivercurrentamounttotal = 0;
var driverprevamounttotal = 0;
var truckcurrmiles = 0;
var truckprevmiles = 0;
var dispatchcurrentamounttotal = 0;
var companyprevloadtotal = 0;
var carrierprevloadtotal = 0;
var companycurrloadtotal = 0;
var carriercurrloadtotal = 0;
var carriercurramounttotal = 0;
var companycurramounttotal = 0;
var companyprevamounttotal = 0;
var carrierprevamounttotal = 0;
var dispatchprevamounttotal = 0;
var bankreceipttotal = 0;
var bankoutstanding = 0;
var truckcurravg = 0;
var truckprevavg = 0;
var alldrivercurramounttotal = 0;
var alldriverprevamounttotal = 0;
var equipmentcurrloadtotal = 0;
var equipmentcurramounttotal = 0;
var equipmentprevloadtotal = 0;
var equipmentprevamounttotal = 0;
var carrierarra = [];
var res = '';
var loads = '';


var custdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var custdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var dipatchdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var dispatchdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var driverdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var driverdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};

var companydaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var companydayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};

var carrierdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var carrierdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};

var equipmentdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var equipmentdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};

var salesdaycurrmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};
var salesdayprevmonth = {
    "1": { "loads": 0, "amount": 0 },
    "2": { "loads": 0, "amount": 0 },
    "3": { "loads": 0, "amount": 0 },
    "4": { "loads": 0, "amount": 0 },
    "5": { "loads": 0, "amount": 0 },
    "6": { "loads": 0, "amount": 0 },
    "7": { "loads": 0, "amount": 0 },
    "8": { "loads": 0, "amount": 0 },
    "9": { "loads": 0, "amount": 0 },
    "10": { "loads": 0, "amount": 0 },
    "11": { "loads": 0, "amount": 0 },
    "12": { "loads": 0, "amount": 0 },
    "13": { "loads": 0, "amount": 0 },
    "14": { "loads": 0, "amount": 0 },
    "15": { "loads": 0, "amount": 0 },
    "16": { "loads": 0, "amount": 0 },
    "17": { "loads": 0, "amount": 0 },
    "18": { "loads": 0, "amount": 0 },
    "19": { "loads": 0, "amount": 0 },
    "20": { "loads": 0, "amount": 0 },
    "21": { "loads": 0, "amount": 0 },
    "22": { "loads": 0, "amount": 0 },
    "23": { "loads": 0, "amount": 0 },
    "24": { "loads": 0, "amount": 0 },
    "25": { "loads": 0, "amount": 0 },
    "26": { "loads": 0, "amount": 0 },
    "27": { "loads": 0, "amount": 0 },
    "28": { "loads": 0, "amount": 0 },
    "29": { "loads": 0, "amount": 0 },
    "30": { "loads": 0, "amount": 0 },
    "31": { "loads": 0, "amount": 0 }
};

var custdaytotal = { "current": custdaycurrmonth, "prev": custdayprevmonth };
var dispatchdaytotal = { "current": dipatchdaycurrmonth, "prev": dispatchdayprevmonth };
var driverdaytotal = { "current": driverdaycurrmonth, "prev": driverdayprevmonth };
var companydaytotal = { "current": companydaycurrmonth, "prev": companydayprevmonth };
var carrierdaytotal = { "current": carrierdaycurrmonth, "prev": carrierdayprevmonth };
var equipmentdaytotal = { "current": equipmentdaycurrmonth, "prev": equipmentdayprevmonth };
var salesdaytotal = { "current": salesdaycurrmonth, "prev": salesdayprevmonth };

//--------------Global Variable End -----------------

//------------- Main Array Function Start------------ 

$(document).ready(function arr() {
    prepairDashBoardData();
});

function prepairDashBoardData(dashDaterange) 
{
    if(dashDaterange != undefined) 
    {
            //--------------Global Variable Start -----------------
            mainarr = { "current": [], "prev": [] };
            dispatchermain = { "current": [], "prev": [] };
            companymain = { "current": [], "prev": [] };
            drivermain = { "current": [], "prev": [] };
            carriermain = { "current": [], "prev": [] };
            equipmentmain = { "current": [], "prev": [] };
            salesmain = { "current": [], "prev": [] };
            cust_table = [];
            salcust_table = [];
            salcust_tablepre = [];
            sals_table = [];
            equip_table = [];
            dispatch_table = [];
            driver_table = [];
            truck_table = [];
            company_table = [];
            mapselectedstate = [];
            carrier_table = [];
            currentloadtotal = 0;
            prevloadtotal = 0;
            currentamounttotal = 0;
            prevamounttotal = 0;
            drivercurrentloadtotal = 0;
            driverprevloadtotal = 0;
            drivercurrentamounttotal = 0;
            driverprevamounttotal = 0;
            truckcurrmiles = 0;
            truckprevmiles = 0;
            dispatchcurrentamounttotal = 0;
            companyprevloadtotal = 0;
            carrierprevloadtotal = 0;
            companycurrloadtotal = 0;
            carriercurrloadtotal = 0;
            carriercurramounttotal = 0;
            companycurramounttotal = 0;
            companyprevamounttotal = 0;
            carrierprevamounttotal = 0;
            dispatchprevamounttotal = 0;
            bankreceipttotal = 0;
            bankoutstanding = 0;
            truckcurravg = 0;
            truckprevavg = 0;
            alldrivercurramounttotal = 0;
            alldriverprevamounttotal = 0;
            equipmentcurrloadtotal = 0;
            equipmentcurramounttotal = 0;
            equipmentprevloadtotal = 0;
            equipmentprevamounttotal = 0;
            carrierarra = [];
            res = '';
            loads = '';


            custdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            custdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            dipatchdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            dispatchdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            driverdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            driverdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };

            companydaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            companydayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };

            carrierdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            carrierdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };

            equipmentdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            equipmentdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };

            salesdaycurrmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };
            salesdayprevmonth = {
                "1": { "loads": 0, "amount": 0 },
                "2": { "loads": 0, "amount": 0 },
                "3": { "loads": 0, "amount": 0 },
                "4": { "loads": 0, "amount": 0 },
                "5": { "loads": 0, "amount": 0 },
                "6": { "loads": 0, "amount": 0 },
                "7": { "loads": 0, "amount": 0 },
                "8": { "loads": 0, "amount": 0 },
                "9": { "loads": 0, "amount": 0 },
                "10": { "loads": 0, "amount": 0 },
                "11": { "loads": 0, "amount": 0 },
                "12": { "loads": 0, "amount": 0 },
                "13": { "loads": 0, "amount": 0 },
                "14": { "loads": 0, "amount": 0 },
                "15": { "loads": 0, "amount": 0 },
                "16": { "loads": 0, "amount": 0 },
                "17": { "loads": 0, "amount": 0 },
                "18": { "loads": 0, "amount": 0 },
                "19": { "loads": 0, "amount": 0 },
                "20": { "loads": 0, "amount": 0 },
                "21": { "loads": 0, "amount": 0 },
                "22": { "loads": 0, "amount": 0 },
                "23": { "loads": 0, "amount": 0 },
                "24": { "loads": 0, "amount": 0 },
                "25": { "loads": 0, "amount": 0 },
                "26": { "loads": 0, "amount": 0 },
                "27": { "loads": 0, "amount": 0 },
                "28": { "loads": 0, "amount": 0 },
                "29": { "loads": 0, "amount": 0 },
                "30": { "loads": 0, "amount": 0 },
                "31": { "loads": 0, "amount": 0 }
            };

            custdaytotal = { "current": custdaycurrmonth, "prev": custdayprevmonth };
            dispatchdaytotal = { "current": dipatchdaycurrmonth, "prev": dispatchdayprevmonth };
            driverdaytotal = { "current": driverdaycurrmonth, "prev": driverdayprevmonth };
            companydaytotal = { "current": companydaycurrmonth, "prev": companydayprevmonth };
            carrierdaytotal = { "current": carrierdaycurrmonth, "prev": carrierdayprevmonth };
            equipmentdaytotal = { "current": equipmentdaycurrmonth, "prev": equipmentdayprevmonth };
            salesdaytotal = { "current": salesdaycurrmonth, "prev": salesdayprevmonth };
    } 
    //--------------Global Variable End -----------------

    var datewisefilter = dashDaterange == undefined ? "ship_date" : dashDaterange;
    //Hide Show Field
    var bartitle = "Customer";
    var linetitledata = "Revenue";
    $(".bartitle").html(bartitle);
    $(".linetitledata").html(linetitledata);
    $(".avg-label-2").html(linetitledata);
    $("#ranking_table").html("Customer Ranking");
    // $(".bar-hide").css("display", "inline-block");
    // $(".piedash").css("display", "none");
    // $(".donutdash").css("display", "none");
    // $(".truck_chart").css("display", "none");
    // $(".truck_pie").css("display", "none");
    // $(".profit_hide").css("display", "none");
    // $(".loss_hide").css("display", "none");
    // $(".salcurrpie-hide").css("display", "none");
    // $(".salprevpie-hide").css("display", "none");
    // $("#copmrev").css("display", "block");
    // $("#driveredp").css("display", "block");
    // $("#payrep").css("display", "block");
    // $("#recrep").css("display", "block");
    // $("#recvreport").css("display", "block");

    // company privilege and id
    // var data = {
    //     companyId: companyId,
    //     datewisefilter:datewisefilter,
    //     privilege: privilege,
    // };

    $.ajax({
        url: base_path+"/dashboard-customerdata",
        method: "get",
        data:{datewisefilter:datewisefilter},
        success: function (response) {
            res = JSON.parse(response);
            var week_first = res[0].estdrvpayfirstdate;
            var week_last = res[0].estdrvpaylastdate;
            estimated_driverpay_statement(week_first, week_last);
            getPayableAndRecevable();
            getProfitLoss();
            getTruckDataMap();
            loads = res[0].loads;
            
            var driverarr = res[0].alldriverarr;
            allcompany_data = res[0].allcompany;
            loads.map(function(l){
                l.created_at = convertTimeZone(l.created_at,"info");
            })
                console.log(JSON.stringify(loads));

            var firstcurr = res[0].firstcurr;
            var lastcurr = res[0].lastcurr;
            var firstprev = res[0].firstprev;
            var lastprev = res[0].lastprev;
            var filter_Type = res[0].filterType;
            var total_expence = res[0].totalexpence;
            var currcustindex = {};
            var prevcustindex = {};
            var currdipatchindex = {};
            var prevdispatchindex = {};
            var currdriverindex = {};
            var prevdriverindex = {};
            var currtruckindex = {};
            var prevtruckindex = {};
            var currcompanyindex = {};
            var prevcompanyindex = {};
            var currcarrierindex = {};
            var prevcarrierindex = {};
            var currequipmentindex = {};
            var prevequipmentindex = {};
            var j = 0;
            var k = 0;
            var p = 0;
            var c = 0;
            var q = 0;
            var x = 0;
            var y = 0;
            var l = 0;
            var m = 0;
            var f = 0;
            var n = 0;
            var e = 0;
            var r = 0;
            var h = 0;
            var loadlent = loads.length;

            //Process Data 
            for (var i = 0; i < loadlent; i++) 
            {
                var date = '';
                if (filter_Type == "shipper_pickup") 
                {
                    date = loads[i].shipper_pickup;
                }
                else if (filter_Type == "created_at") 
                {
                    date = loads[i].created_at;
                }
                else if (filter_Type == "consignee_pickup") 
                {
                    date = loads[i].consignee_pickup;
                }
                else if (filter_Type == "status_Invoiced_time") 
                {
                    date = loads[i].status_Invoiced_time;
                }

                
                var onlyDate = convertTimeZone(date, "info").substring(3, 5).toString(); //.replace(/\b0/g, '').substring(2, 3).toString();
                if (onlyDate == "01" || onlyDate == "02" || onlyDate == "03" || onlyDate == "04" || onlyDate == "05" || onlyDate == "06" || onlyDate == "07" || onlyDate == "08" || onlyDate == "09") {
                    onlyDate = onlyDate.replace(/\b0/g, '');
                }

                var carr_name = loads[i].carrier_parent + "-" + loads[i].carrier_name;
                var carr_loadername = loads[i].loaddata.loadername;
                var carr_index = "";

                var isDriver = false;
                var isCarrier = false;
                var isOwner = false;
                if (loads[i].typeofloader != "Carrier") 
                {
                    isDriver = true;
                } 
                else 
                {
                    isCarrier = true;
                }

                //----------Check Carrier Empty Start-------------
                if (typeof (carr_name) != "object") 
                {
                    if (carr_name != "") 
                    {
                        carr_index = carr_name.trim().toString();
                    } 
                    else 
                    {
                        carr_index = "NA";
                    }
                } 
                else 
                {
                    carr_index = "NA";
                }
                //----------Check Carrier Empty End-------------



                //----------Check Dispatcher Empty Start-------------
                var dispatch_name = loads[i].dispatcher;
                var dispatch_index = "";
                if (typeof (dispatch_name) != "object") 
                {
                    if (dispatch_name != "") 
                    {
                        dispatch_index = dispatch_name.trim().toString();
                    } 
                    else 
                    {
                        dispatch_index = "NA";
                    }
                } 
                else 
                {
                    dispatch_index = "NA";
                }
                //----------Check Dispatcher Empty End---------


                //--------- Check Company Empty Start---------
                var company_name = loads[i].company;
                var company_index = "";
                if (typeof (company_name) != "object") 
                {
                    if (company_name != "") 
                    {
                        company_index = company_name.trim().toString();
                    } 
                    else 
                    {
                        company_index = "NA";
                    }
                } 
                else 
                {
                    company_index = "NA";
                }
                //--------- Check Company Empty End---------


                //---------Check Equipment Empty Start---------

                var equipment_name = loads[i].equipment_type;
                var equipment_index = "";
                if (typeof (equipment_name) != "object") 
                {
                    if (equipment_name != "") 
                    {
                        equipment_index = equipment_name.trim().toString();
                    } 
                    else 
                    {
                        equipment_index = "NA";
                    }
                } 
                else
                {
                    equipment_index = "NA";
                }

                //---------Check Equipment Empty End---------

                //---------Check Driver & Truck Empty Start----------
                if (isDriver)
                {
                    //check driver or owner
                    if (loads[i].typeofloader == "Driver") 
                    {
                        // console.log(loads[i]._id);
                        var index = loads[i].driver_name;
                        var driver_name = driverarr[index] ? driverarr[index]['_id'] : '';
                    }
                    else 
                    {
                        // console.log(loads[i].owner_name+"-->"+loads[i]._id);
                        var index = loads[i].owner_name;
                        // console.log(index)
                        if(index != undefined && index != "" && index != null)
                        {
                            var driver_name = driverarr[index] ? driverarr[index]['_id'] : '';
                        }  
                        // console.log(driver_name +"--"+ loads[i]._id);
                    }
                    //driver data
                    var driver_index = "";
                    var drivername = loads[i].loaddata['loadername'];

                    //Check Driver Empty
                    if (typeof (driver_name) != "object") 
                    {
                        if (driver_name != "" && driver_name != undefined) {
                            driver_index = driver_name.toString();
                        } 
                        else 
                        {
                            driver_index = "NA";
                        }
                    } 
                    else 
                    {
                        driver_index = "NA";
                    }

                    //truck data
                    var truck_name = loads[i].loaddata['loadertruck'];
                    var truck_miles = loads[i].driver_miles_value;
                    var truck_index = "";
                    //Check Truck Empty
                    if (typeof (truck_name) != "object") 
                    {
                        if (truck_name != "" && truck_name != undefined) 
                        {
                            truck_index = truck_name.trim().toString();
                        } 
                        else 
                        {
                            truck_index = "NA";
                        }
                    } 
                    else 
                    {
                        truck_index = "NA";
                    }
                }
                //---------Check Driver & Truck Empty End--------------------


                //---------Check Current & Previous Month Start--------------
                var month_type = "current";
                var total_rate = loads[i].total_rate == "" ? 0 : parseFloat(loads[i].total_rate);
                var name = loads[i].loaddata['customername'];
                var loadertotal = loads[i].loaddata['loadertotal'] != "" ? parseFloat(loads[i].loaddata['loadertotal']) : 0;
                index = j;
                
                if (date >= firstprev && date <= lastprev) {
                    month_type = "prev";
                    index = k;
                }
                //---------Check Current & Previous Month End----------------

                //----------Check Customer Empty Start-------------
                var cust_name = loads[i].customer_parent + "-" + loads[i].customer;
                // console.log(cust_name+"---->"+ loads[i]._id);
                var cust_index = "";

                if (typeof (cust_name) != "object") {
                    if (cust_name != "") {
                        cust_index = cust_name.trim().toString();
                    } else {
                        cust_index = "NA";
                    }
                } else {
                    cust_index = "NA";
                }
                //----------Check Customer Empty Start-------------


                //---------Condition For Current Month Data Start------------
                if (month_type == "current") 
                {
                    //----------Customer Start--------------
                    if (!currcustindex.hasOwnProperty(cust_index)) 
                    {
                        var month = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_cust = {};

                        ind_cust[cust_index] = month;
                        mainarr[month_type].push(ind_cust);
                        currcustindex[cust_index] = j;
                        j++;
                        var index = 0;
                        index = currcustindex[cust_index];
                        cust_table[index] = { "name": name, "loads": 1, "total": total_rate, "Margin": parseFloat(total_rate - loadertotal), "id": cust_index };
                        mainarr[month_type][index][cust_index][onlyDate].loads += 1;
                        mainarr[month_type][index][cust_index][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].loads += 1;
                        currentloadtotal += 1;
                        currentamounttotal += parseFloat(isNaN(total_rate) == true ? 0 : total_rate);

                    } 
                    else 
                    {
                        var index = 0;
                        index = currcustindex[cust_index];
                        cust_table[index] = { "name": name, "loads": cust_table[index]['loads'] + 1, "total": parseFloat(cust_table[index]['total'] + total_rate), "Margin": parseFloat(cust_table[index]['Margin']) + parseFloat(total_rate - loadertotal), "id": cust_index };
                        mainarr[month_type][index][cust_index][onlyDate].loads += 1;
                        mainarr[month_type][index][cust_index][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].loads += 1;
                        currentloadtotal += 1;
                        currentamounttotal += parseFloat(isNaN(total_rate) == true ? 0 : total_rate);

                    }
                    //----------Customer End--------------

                    //----------Dispatcher Start--------------
                    if (!currdipatchindex.hasOwnProperty(dispatch_index)) 
                    {
                        var dispatchmonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_dispatch = {};

                        ind_dispatch[dispatch_index] = dispatchmonth;
                        dispatchermain[month_type].push(ind_dispatch);
                        currdipatchindex[dispatch_index] = p;
                        p++;
                        var dispatchindex = 0;
                        dispatchindex = currdipatchindex[dispatch_index];
                        dispatch_table[dispatchindex] = { "name": res[0].alldispatcher[dispatch_index], "loads": 1, "total": total_rate, "Margin": total_rate - loadertotal, "id": dispatch_index };
                        dispatchermain[month_type][dispatchindex][dispatch_index][onlyDate].loads += 1;
                        dispatchermain[month_type][dispatchindex][dispatch_index][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].loads += 1;
                        dispatchcurrentamounttotal += parseFloat(total_rate - loadertotal);

                    } 
                    else 
                    {
                        var dispatchindex = 0;
                        dispatchindex = currdipatchindex[dispatch_index];
                        dispatch_table[dispatchindex] = { "name": res[0].alldispatcher[dispatch_index], "loads": dispatch_table[dispatchindex]['loads'] + 1, "total": parseFloat(dispatch_table[dispatchindex]['total'] + (total_rate)), "Margin": parseFloat(dispatch_table[dispatchindex]['Margin']) + parseFloat(total_rate - loadertotal), "id": dispatch_index };
                        dispatchermain[month_type][dispatchindex][dispatch_index][onlyDate].loads += 1;
                        dispatchermain[month_type][dispatchindex][dispatch_index][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].loads += 1;
                        dispatchcurrentamounttotal += parseFloat(total_rate - loadertotal);
                    }
                    //----------Dispatcher End--------------

                    //---------Driver Start ------------------
                    if (isDriver) 
                    {

                        if (!currtruckindex.hasOwnProperty(truck_index)) 
                        {
                            currtruckindex[truck_index] = l;
                            l++;
                            var truckindex = 0;
                            truckindex = currtruckindex[truck_index];
                            truck_table[truckindex] = { "name": truck_index, "loads": 1, "total": total_rate, "id": truck_index, "miles": parseFloat(truck_miles) };
                            truckcurrmiles += isNaN(parseFloat(truck_miles)) == true ? 0 : parseFloat(truck_miles);

                            alldrivercurramounttotal += parseFloat(total_rate);
                        } 
                        else 
                        {
                            var truckindex = 0;
                            truckindex = currtruckindex[truck_index];
                            truck_table[truckindex] = { "name": truck_index, "loads": parseFloat(truck_table[truckindex]['loads'] + 1), "total": parseFloat(truck_table[truckindex]['total'] + (total_rate)), "id": truck_index, "miles": parseFloat(truck_table[truckindex]['miles'] + parseFloat(truck_miles)) };
                            truckcurrmiles += isNaN(parseFloat(truck_miles)) == true ? 0 : parseFloat(truck_miles);

                            alldrivercurramounttotal += parseFloat(total_rate);
                        }

                        if (!currdriverindex.hasOwnProperty(driver_index)) {

                            var drivermonth = {
                                "1": { "loads": 0, "amount": 0 },
                                "2": { "loads": 0, "amount": 0 },
                                "3": { "loads": 0, "amount": 0 },
                                "4": { "loads": 0, "amount": 0 },
                                "5": { "loads": 0, "amount": 0 },
                                "6": { "loads": 0, "amount": 0 },
                                "7": { "loads": 0, "amount": 0 },
                                "8": { "loads": 0, "amount": 0 },
                                "9": { "loads": 0, "amount": 0 },
                                "10": { "loads": 0, "amount": 0 },
                                "11": { "loads": 0, "amount": 0 },
                                "12": { "loads": 0, "amount": 0 },
                                "13": { "loads": 0, "amount": 0 },
                                "14": { "loads": 0, "amount": 0 },
                                "15": { "loads": 0, "amount": 0 },
                                "16": { "loads": 0, "amount": 0 },
                                "17": { "loads": 0, "amount": 0 },
                                "18": { "loads": 0, "amount": 0 },
                                "19": { "loads": 0, "amount": 0 },
                                "20": { "loads": 0, "amount": 0 },
                                "21": { "loads": 0, "amount": 0 },
                                "22": { "loads": 0, "amount": 0 },
                                "23": { "loads": 0, "amount": 0 },
                                "24": { "loads": 0, "amount": 0 },
                                "25": { "loads": 0, "amount": 0 },
                                "26": { "loads": 0, "amount": 0 },
                                "27": { "loads": 0, "amount": 0 },
                                "28": { "loads": 0, "amount": 0 },
                                "29": { "loads": 0, "amount": 0 },
                                "30": { "loads": 0, "amount": 0 },
                                "31": { "loads": 0, "amount": 0 }
                            };
                            var ind_driver = {};

                            ind_driver[driver_index] = drivermonth;
                            drivermain[month_type].push(ind_driver);
                            currdriverindex[driver_index] = x;
                            x++;
                            var driverindex = 0;
                            driverindex = currdriverindex[driver_index];
                            driver_table[driverindex] = { "name": drivername, "loads": 1, "total": total_rate, "miles": parseFloat(truck_miles), "Margin": loadertotal, "id": driver_index, "typeofloader": loads[i].typeofloader };
                            drivermain[month_type][driverindex][driver_index][onlyDate].loads += 1;
                            drivermain[month_type][driverindex][driver_index][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].loads += 1;
                            drivercurrentamounttotal += parseFloat(loadertotal);
                            drivercurrentloadtotal += 1;
                        } 
                        else 
                        {

                            var driverindex = 0;
                            driverindex = currdriverindex[driver_index];

                            driver_table[driverindex] = { "name": drivername, "loads": driver_table[driverindex]['loads'] + 1, "total": parseFloat(driver_table[driverindex]['total'] + (total_rate)), "miles": parseFloat(driver_table[driverindex]['miles'] + parseFloat(truck_miles)), "Margin": parseFloat(driver_table[driverindex]['Margin'] + loadertotal), "id": driver_index, "typeofloader": loads[i].typeofloader };
                            drivermain[month_type][driverindex][driver_index][onlyDate].loads += 1;
                            drivermain[month_type][driverindex][driver_index][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].loads += 1;
                            drivercurrentamounttotal += parseFloat(loadertotal);
                            drivercurrentloadtotal += 1;
                        }

                    }
                    //---------Driver End ------------------

                    //---------Company Start ---------------
                    if (!currcompanyindex.hasOwnProperty(company_index)) 
                    {
                        var companymonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_company = {};

                        ind_company[company_index] = companymonth;
                        companymain[month_type].push(ind_company);
                        currcompanyindex[company_index] = c;
                        c++;
                        var companyindex = 0;
                        companyindex = currcompanyindex[company_index];
                        company_table[companyindex] = { "name": res[0].allcompany[company_index], "loads": 1, "total": total_rate, "Margin": parseFloat(total_rate - loadertotal), "loadertotal": loadertotal, "id": company_index };
                        companymain[month_type][companyindex][company_index][onlyDate].loads += 1;
                        companymain[month_type][companyindex][company_index][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].loads += 1;
                        companycurrloadtotal += 1;
                        companycurramounttotal += parseFloat(isNaN(total_rate) == true ? 0 : total_rate);
                        console.log(companycurramounttotal);
                    } 
                    else 
                    {
                        var companyindex = 0;
                        companyindex = currcompanyindex[company_index];
                        company_table[companyindex] = { "name": res[0].allcompany[company_index], "loads": company_table[companyindex]['loads'] + 1, "total": parseFloat(company_table[companyindex]['total'] + (total_rate)), "Margin": parseFloat(company_table[companyindex]['Margin']) + parseFloat(total_rate - loadertotal), "loadertotal": company_table[companyindex]['loadertotal'] + loadertotal, "id": company_index };
                        companymain[month_type][companyindex][company_index][onlyDate].loads += 1;
                        companymain[month_type][companyindex][company_index][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].loads += 1;
                        companycurrloadtotal += 1;
                        companycurramounttotal += parseFloat(isNaN(total_rate) == true ? 0 : total_rate);
                    }
                    //--------------------Company End ---------------------

                    var equipment_miles = loads[i].driver_miles_value;
                    //-------------------Equipment Start-------------------

                    if (!currequipmentindex.hasOwnProperty(equipment_index)) 
                    {
                        var equipmentmonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_equipment = {};

                        ind_equipment[equipment_index] = equipmentmonth;
                        equipmentmain[month_type].push(ind_equipment);
                        currequipmentindex[equipment_index] = r;
                        r++;
                        var equipmentindex = 0;
                        equipmentindex = currequipmentindex[equipment_index];
                        equip_table[equipmentindex] = { "name": res[0].allequipment[equipment_index], "loads": 1, "total": total_rate, "Margin": parseFloat(total_rate - loadertotal), "miles": parseFloat(equipment_miles), "id": equipment_index };
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].loads += 1;
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].loads += 1;
                        equipmentcurrloadtotal += 1;
                        equipmentcurramounttotal += parseFloat(total_rate);
                    } 
                    else 
                    {
                        var equipmentindex = 0;
                        equipmentindex = currequipmentindex[equipment_index];
                        equip_table[equipmentindex] = { "name": res[0].allequipment[equipment_index], "loads": equip_table[equipmentindex]['loads'] + 1, "total": parseFloat(equip_table[equipmentindex]['total'] + (total_rate)), "Margin": parseFloat(equip_table[equipmentindex]['Margin']) + parseFloat(total_rate - loadertotal), "miles": parseFloat(equip_table[equipmentindex]['miles']) + parseFloat(equipment_miles), "id": equipment_index };
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].loads += 1;
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].loads += 1;
                        equipmentcurrloadtotal += 1;
                        equipmentcurramounttotal += parseFloat(total_rate);
                    }

                    //--------------------Equipment End-------------------//


                    //-------------------Carrier Start-------------------//

                    if (isCarrier) 
                    {
                        if (!currcarrierindex.hasOwnProperty(carr_index)) 
                        {
                            var carrirmonth = {
                                "1": { "loads": 0, "amount": 0 },
                                "2": { "loads": 0, "amount": 0 },
                                "3": { "loads": 0, "amount": 0 },
                                "4": { "loads": 0, "amount": 0 },
                                "5": { "loads": 0, "amount": 0 },
                                "6": { "loads": 0, "amount": 0 },
                                "7": { "loads": 0, "amount": 0 },
                                "8": { "loads": 0, "amount": 0 },
                                "9": { "loads": 0, "amount": 0 },
                                "10": { "loads": 0, "amount": 0 },
                                "11": { "loads": 0, "amount": 0 },
                                "12": { "loads": 0, "amount": 0 },
                                "13": { "loads": 0, "amount": 0 },
                                "14": { "loads": 0, "amount": 0 },
                                "15": { "loads": 0, "amount": 0 },
                                "16": { "loads": 0, "amount": 0 },
                                "17": { "loads": 0, "amount": 0 },
                                "18": { "loads": 0, "amount": 0 },
                                "19": { "loads": 0, "amount": 0 },
                                "20": { "loads": 0, "amount": 0 },
                                "21": { "loads": 0, "amount": 0 },
                                "22": { "loads": 0, "amount": 0 },
                                "23": { "loads": 0, "amount": 0 },
                                "24": { "loads": 0, "amount": 0 },
                                "25": { "loads": 0, "amount": 0 },
                                "26": { "loads": 0, "amount": 0 },
                                "27": { "loads": 0, "amount": 0 },
                                "28": { "loads": 0, "amount": 0 },
                                "29": { "loads": 0, "amount": 0 },
                                "30": { "loads": 0, "amount": 0 },
                                "31": { "loads": 0, "amount": 0 }
                            };
                            var ind_carrier = {};

                            ind_carrier[carr_index] = carrirmonth;
                            carriermain[month_type].push(ind_carrier);
                            currcarrierindex[carr_index] = n;
                            n++;
                            var carrierindex = 0;
                            carrierindex = currcarrierindex[carr_index];
                            carrier_table[carrierindex] = { "name": carr_loadername, "loads": 1, "total": total_rate, "Margin": parseFloat(total_rate - loadertotal), "loadertotal": loadertotal, "id": carr_index };
                            carriermain[month_type][carrierindex][carr_index][onlyDate].loads += 1;
                            carriermain[month_type][carrierindex][carr_index][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].loads += 1;
                            carriercurrloadtotal += 1;
                            carriercurramounttotal += parseFloat(total_rate);
                        } 
                        else 
                        {
                            var carrierindex = 0;
                            carrierindex = currcarrierindex[carr_index];
                            carrier_table[carrierindex] = { "name": carr_loadername, "loads": carrier_table[carrierindex]['loads'] + 1, "total": parseFloat(carrier_table[carrierindex]['total'] + (total_rate)), "Margin": parseFloat(carrier_table[carrierindex]['Margin']) + parseFloat(total_rate - loadertotal), "loadertotal": carrier_table[carrierindex]['loadertotal'] + loadertotal, "id": carr_index };
                            carriermain[month_type][carrierindex][carr_index][onlyDate].loads += 1;
                            carriermain[month_type][carrierindex][carr_index][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].loads += 1;
                            carriercurrloadtotal += 1;
                            carriercurramounttotal += parseFloat(total_rate);
                        }

                    }
                    //-------------------Carrier End---------------------------


                    //---------Condition For Current Month Data End------------

                    //---------Condition For Previous Month Data Start------------
                } 
                else 
                {
                    if (!prevcustindex.hasOwnProperty(cust_index)) 
                    {
                        var ind_cust = {};
                        var month = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };

                        ind_cust[cust_index] = month;
                        mainarr[month_type].push(ind_cust);
                        prevcustindex[cust_index] = k;
                        k++;
                        var index = 0;
                        index = prevcustindex[cust_index];
                        mainarr[month_type][index][cust_index][onlyDate].loads += 1;
                        mainarr[month_type][index][cust_index][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].loads += 1;
                        prevloadtotal += 1;
                        prevamounttotal += parseFloat(total_rate);

                    } 
                    else 
                    {
                        var index = 0;
                        index = prevcustindex[cust_index];
                        mainarr[month_type][index][cust_index][onlyDate].loads += 1;
                        mainarr[month_type][index][cust_index][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        custdaytotal[month_type][onlyDate].loads += 1;
                        prevloadtotal += 1;
                        prevamounttotal += parseFloat(total_rate);
                    }

                    if (!prevcompanyindex.hasOwnProperty(company_index)) 
                    {
                        var companymonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_company = {};

                        ind_company[company_index] = companymonth;
                        companymain[month_type].push(ind_company);
                        prevcompanyindex[company_index] = f;
                        f++;
                        var companyindex = 0;
                        companyindex = prevcompanyindex[company_index];
                        companymain[month_type][companyindex][company_index][onlyDate].loads += 1;
                        companymain[month_type][companyindex][company_index][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].loads += 1;
                        companyprevloadtotal += 1;
                        companyprevamounttotal += parseFloat(total_rate);
                    } 
                    else 
                    {
                        var companyindex = 0;
                        companyindex = prevcompanyindex[company_index];
                        companymain[month_type][companyindex][company_index][onlyDate].loads += 1;
                        companymain[month_type][companyindex][company_index][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        companydaytotal[month_type][onlyDate].loads += 1;
                        companyprevloadtotal += 1;
                        companyprevamounttotal += parseFloat(total_rate);
                    }

                    //-------------Prev Equipment Start-------------//

                    if (!prevequipmentindex.hasOwnProperty(equipment_index)) 
                    {
                        var equipmentmonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };
                        var ind_equipment = {};

                        ind_equipment[equipment_index] = equipmentmonth;
                        equipmentmain[month_type].push(ind_equipment);
                        prevequipmentindex[equipment_index] = h;
                        h++;
                        equipmentindex = prevequipmentindex[equipment_index];
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].loads += 1;
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].loads += 1;
                        equipmentprevloadtotal += 1;
                        equipmentprevamounttotal += parseFloat(total_rate);
                    } 
                    else 
                    {
                        var equipmentindex = 0;
                        equipmentindex = prevequipmentindex[equipment_index];
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].loads += 1;
                        equipmentmain[month_type][equipmentindex][equipment_index][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                        equipmentdaytotal[month_type][onlyDate].loads += 1;
                        equipmentprevloadtotal += 1;
                        equipmentprevamounttotal += parseFloat(total_rate);
                    }

                    //-------------Prev Equipment End-------------//

                    //-------------Prev Carrier Start-------------//
                    if (isCarrier) 
                    {
                        if (!prevcarrierindex.hasOwnProperty(carr_index)) 
                        {
                            var carrirmonth = {
                                "1": { "loads": 0, "amount": 0 },
                                "2": { "loads": 0, "amount": 0 },
                                "3": { "loads": 0, "amount": 0 },
                                "4": { "loads": 0, "amount": 0 },
                                "5": { "loads": 0, "amount": 0 },
                                "6": { "loads": 0, "amount": 0 },
                                "7": { "loads": 0, "amount": 0 },
                                "8": { "loads": 0, "amount": 0 },
                                "9": { "loads": 0, "amount": 0 },
                                "10": { "loads": 0, "amount": 0 },
                                "11": { "loads": 0, "amount": 0 },
                                "12": { "loads": 0, "amount": 0 },
                                "13": { "loads": 0, "amount": 0 },
                                "14": { "loads": 0, "amount": 0 },
                                "15": { "loads": 0, "amount": 0 },
                                "16": { "loads": 0, "amount": 0 },
                                "17": { "loads": 0, "amount": 0 },
                                "18": { "loads": 0, "amount": 0 },
                                "19": { "loads": 0, "amount": 0 },
                                "20": { "loads": 0, "amount": 0 },
                                "21": { "loads": 0, "amount": 0 },
                                "22": { "loads": 0, "amount": 0 },
                                "23": { "loads": 0, "amount": 0 },
                                "24": { "loads": 0, "amount": 0 },
                                "25": { "loads": 0, "amount": 0 },
                                "26": { "loads": 0, "amount": 0 },
                                "27": { "loads": 0, "amount": 0 },
                                "28": { "loads": 0, "amount": 0 },
                                "29": { "loads": 0, "amount": 0 },
                                "30": { "loads": 0, "amount": 0 },
                                "31": { "loads": 0, "amount": 0 }
                            };
                            var ind_carrier = {};

                            ind_carrier[carr_index] = carrirmonth;
                            carriermain[month_type].push(ind_carrier);
                            prevcarrierindex[carr_index] = e;
                            e++;
                            var carrierindex = 0;
                            carrierindex = prevcarrierindex[carr_index];
                            carriermain[month_type][carrierindex][carr_index][onlyDate].loads += 1;
                            carriermain[month_type][carrierindex][carr_index][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].loads += 1;
                            carrierprevloadtotal += 1;
                            carrierprevamounttotal += parseFloat(total_rate);
                        } 
                        else 
                        {
                            var carrierindex = 0;
                            carrierindex = prevcarrierindex[carr_index];
                            carriermain[month_type][carrierindex][carr_index][onlyDate].loads += 1;
                            carriermain[month_type][carrierindex][carr_index][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].amount += parseFloat(total_rate);
                            carrierdaytotal[month_type][onlyDate].loads += 1;
                            carrierprevloadtotal += 1;
                            carrierprevamounttotal += parseFloat(total_rate);
                        }
                    }
                    //-------------Prev Carrier End-------------//

                    if (!prevdispatchindex.hasOwnProperty(dispatch_index)) {
                        var ind_dispatch = {};
                        var dispatchmonth = {
                            "1": { "loads": 0, "amount": 0 },
                            "2": { "loads": 0, "amount": 0 },
                            "3": { "loads": 0, "amount": 0 },
                            "4": { "loads": 0, "amount": 0 },
                            "5": { "loads": 0, "amount": 0 },
                            "6": { "loads": 0, "amount": 0 },
                            "7": { "loads": 0, "amount": 0 },
                            "8": { "loads": 0, "amount": 0 },
                            "9": { "loads": 0, "amount": 0 },
                            "10": { "loads": 0, "amount": 0 },
                            "11": { "loads": 0, "amount": 0 },
                            "12": { "loads": 0, "amount": 0 },
                            "13": { "loads": 0, "amount": 0 },
                            "14": { "loads": 0, "amount": 0 },
                            "15": { "loads": 0, "amount": 0 },
                            "16": { "loads": 0, "amount": 0 },
                            "17": { "loads": 0, "amount": 0 },
                            "18": { "loads": 0, "amount": 0 },
                            "19": { "loads": 0, "amount": 0 },
                            "20": { "loads": 0, "amount": 0 },
                            "21": { "loads": 0, "amount": 0 },
                            "22": { "loads": 0, "amount": 0 },
                            "23": { "loads": 0, "amount": 0 },
                            "24": { "loads": 0, "amount": 0 },
                            "25": { "loads": 0, "amount": 0 },
                            "26": { "loads": 0, "amount": 0 },
                            "27": { "loads": 0, "amount": 0 },
                            "28": { "loads": 0, "amount": 0 },
                            "29": { "loads": 0, "amount": 0 },
                            "30": { "loads": 0, "amount": 0 },
                            "31": { "loads": 0, "amount": 0 }
                        };

                        ind_dispatch[dispatch_index] = dispatchmonth;
                        dispatchermain[month_type].push(ind_dispatch);
                        prevdispatchindex[dispatch_index] = q;
                        q++;
                        var index = 0;
                        index = prevdispatchindex[dispatch_index];
                        dispatchermain[month_type][index][dispatch_index][onlyDate].loads += 1;
                        dispatchermain[month_type][index][dispatch_index][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].loads += 1;
                        dispatchprevamounttotal += parseFloat(total_rate - loadertotal);

                    } 
                    else 
                    {
                        var index = 0;
                        index = prevdispatchindex[dispatch_index];
                        dispatchermain[month_type][index][dispatch_index][onlyDate].loads += 1;
                        dispatchermain[month_type][index][dispatch_index][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].amount += parseFloat(total_rate - loadertotal);
                        dispatchdaytotal[month_type][onlyDate].loads += 1;
                        dispatchprevamounttotal += parseFloat(total_rate - loadertotal);
                    }

                    if (isDriver) 
                    {

                        if (!prevtruckindex.hasOwnProperty(truck_index)) 
                        {
                            truckprevmiles += parseFloat(truck_miles);
                        } 
                        else 
                        {
                            truckprevmiles += parseFloat(truck_miles);
                        }

                        if (!prevdriverindex.hasOwnProperty(driver_index)) {
                            var drivermonth = {
                                "1": { "loads": 0, "amount": 0 },
                                "2": { "loads": 0, "amount": 0 },
                                "3": { "loads": 0, "amount": 0 },
                                "4": { "loads": 0, "amount": 0 },
                                "5": { "loads": 0, "amount": 0 },
                                "6": { "loads": 0, "amount": 0 },
                                "7": { "loads": 0, "amount": 0 },
                                "8": { "loads": 0, "amount": 0 },
                                "9": { "loads": 0, "amount": 0 },
                                "10": { "loads": 0, "amount": 0 },
                                "11": { "loads": 0, "amount": 0 },
                                "12": { "loads": 0, "amount": 0 },
                                "13": { "loads": 0, "amount": 0 },
                                "14": { "loads": 0, "amount": 0 },
                                "15": { "loads": 0, "amount": 0 },
                                "16": { "loads": 0, "amount": 0 },
                                "17": { "loads": 0, "amount": 0 },
                                "18": { "loads": 0, "amount": 0 },
                                "19": { "loads": 0, "amount": 0 },
                                "20": { "loads": 0, "amount": 0 },
                                "21": { "loads": 0, "amount": 0 },
                                "22": { "loads": 0, "amount": 0 },
                                "23": { "loads": 0, "amount": 0 },
                                "24": { "loads": 0, "amount": 0 },
                                "25": { "loads": 0, "amount": 0 },
                                "26": { "loads": 0, "amount": 0 },
                                "27": { "loads": 0, "amount": 0 },
                                "28": { "loads": 0, "amount": 0 },
                                "29": { "loads": 0, "amount": 0 },
                                "30": { "loads": 0, "amount": 0 },
                                "31": { "loads": 0, "amount": 0 }
                            };
                            var ind_driver = {};

                            ind_driver[driver_index] = drivermonth;
                            drivermain[month_type].push(ind_driver);
                            prevdriverindex[driver_index] = y;
                            y++;
                            var driverindex = 0;
                            driverindex = prevdriverindex[driver_index];
                            drivermain[month_type][driverindex][driver_index][onlyDate].loads += 1;
                            drivermain[month_type][driverindex][driver_index][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].loads += 1;
                            driverprevamounttotal += parseFloat(loadertotal);
                            driverprevloadtotal += 1;
                            alldriverprevamounttotal += parseFloat(total_rate);
                        } 
                        else 
                        {
                            var driverindex = 0;
                            driverindex = prevdriverindex[driver_index];
                            drivermain[month_type][driverindex][driver_index][onlyDate].loads += 1;
                            drivermain[month_type][driverindex][driver_index][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].amount += parseFloat(loadertotal);
                            driverdaytotal[month_type][onlyDate].loads += 1;
                            driverprevloadtotal += 1;
                            alldriverprevamounttotal += parseFloat(total_rate.toFixed(2));
                        }

                    }

                }
                //---------Condition For Previous Month Data End------------

            }

            //--------Sort All Ranking Table-------------
            cust_table.sort(SortFilterData("total"));
            dispatch_table.sort(SortFilterData("total"));
            driver_table.sort(SortFilterData("total"));
            truck_table.sort(SortFilterData("total"));
            company_table.sort(SortFilterData("total"));
            carrier_table.sort(SortFilterData("total"));
            equip_table.sort(SortFilterData("total"));

            //console.log(JSON.stringify(loads));
            //----------Ranking Table Start-------------
            var cus_table = Object.keys(cust_table).length;
            var dashtable = '';
            var companyamountdiff = 0;

            var a = 1;
            for (var h = 0; h < cus_table; h++) 
            {
                var cust_percentage = cust_table[h]['Margin'] * 100 / cust_table[h]['total'];
                dashtable += `<li id='bgshadow' class='noactive' onclick='indchart("${cust_table[h]['id']}","${bartitle}","${cust_table[h]['name']}")'>
                <table>
                        <tbody>
                           <tr>
                            <td rowspan="2">
                                <div class="graphic" >${a}</div>
                            </td>
                            <td style="width:170px; padding-left:10px;">
                                <span class="header">${cust_table[h]['name']}</span>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                <div class="tooltip1"><span class="header">$${numberWithCommas(cust_table[h]['total'].toFixed(2))}</span><span class="toolrevenue">Revenue</span></div>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="stat"><i class="mdi mdi-truck truckicon-loads"></i>&nbsp;${cust_table[h]['loads']}</span><span class="toolloads">Loads</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:170px; padding-left:10px;">
                                <div class="tooltip1"><span class="">$${numberWithCommas(cust_table[h]['Margin'].toFixed(2))}</span><span class="toolmargin">Margin</span></div>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="">${isNaN(cust_percentage) == true ? "0.00" : cust_percentage.toFixed(2)}%</span><span class="toolpercentage">Margin Percentage</span></div>
                            </td>
                        </tr>
                       </tbody>
                </table>
                </li>`;
                a++;
            }
            $("#dashtable").html(dashtable);

            //----------Ranking Table End-------------

            //----------Company Revenue Stat---------------
            var dashcomrev = '';
            // console.log(companycurramounttotal);
            if (companycurramounttotal == NaN && companyprevamounttotal == NaN) 
            {
                companycurramounttotal = 0;
                companyprevamounttotal = 0;
            }
            // console.log(companycurramounttotal);
            if (companycurramounttotal > companyprevamounttotal) 
            {
                var companyamountdiff = Math.abs(companycurramounttotal - companyprevamounttotal);

                dashcomrev += `<h3 class="mb-2 fw-semibold">$${abbreviateNumber(parseInt(companycurramounttotal))} <span class="text-danger fs-13 mb-0"">$${numberWithCommas(companycurramounttotal.toFixed(2))}</span> <span class="text-danger fs-13 mb-0"">$${abbreviateNumber(parseInt(companyamountdiff))}</span>$${numberWithCommas(companyamountdiff.toFixed(2))}</span></h3>
                        <p class="text-muted fs-13 mb-0">Company Revenue <span class="icn-box text-danger fw-semibold fs-13 me-1"> <i class="fa fa-long-arrow-up"></i>
                            </span></p>`;
            } 
            else 
            {
                companyamountdiff = Math.abs(companycurramounttotal - companyprevamounttotal);
                dashcomrev += `<h3 class="mb-2 fw-semibold">$${abbreviateNumber(parseInt(companycurramounttotal))} <span class="text-danger mb-0 fs-13 mb-0">$${numberWithCommas(companycurramounttotal.toFixed(2))}</span></h3>
                        <p class="text-muted fs-13 mb-0">Company Revenue <span class="icn-box text-danger fw-semibold fs-13 me-1">
                            <i class="fa fa-long-arrow-up"></i>
                            </span></p>`;
            }
            $("#copmrev").css("display", "none");
            $("#dashcomrev").html(dashcomrev);

            //----------Company Revenue End---------------


            var dashcomexpence = '';
            if (total_expence == null || isNaN(total_expence) || total_expence == undefined) 
            {
                total_expence = 0;
            }
            dashcomexpence += `<h3 class="mb-2 fw-semibold">$${abbreviateNumber(parseInt(total_expence))} <span class="text-danger mb-0 fs-13 mb-0">$${numberWithCommas(total_expence.toFixed(2))}</span>&nbsp;
                        </h3>
                        <p class="text-muted mb-0 mt-2 fs-12">
                        Company Expenses 
                        </p>`;
            // $("#payrep").css("display", "none");
            $("#dashcomexpence").html(dashcomexpence);

            //--------------Bar Graph Data Stat------------
            var currloads = [];
            var prevloads = [];
            var curramounts = [];
            var prevamounts = [];
            var cust_current_len = Object.keys(custdaytotal.current).length;
            for (var h = 1; h <= cust_current_len; h++) 
            {
                currloads.push(custdaytotal.current[h].loads);
                prevloads.push(custdaytotal.prev[h].loads);
                curramounts.push(custdaytotal.current[h].amount);
                prevamounts.push(custdaytotal.prev[h].amount);
            }
            //--------------Bar Graph Data End------------
            dashGraphBarLine(currloads, prevloads, curramounts, prevamounts);
            //----------------Calculate Truck Avg curr & prev month Start----------------
            var fuelqunttotal = res[0].fueltotal;
            var prevfuel = res[0].fuelprevtotal;
            //for current fuel total
            if (fuelqunttotal != null) {
                fuelqunttotal = parseFloat(res[0].fueltotal);
            } else {
                fuelqunttotal = 0;
            }
            //for prev fuel total
            if (prevfuel != null) {
                prevfuel = parseFloat(res[0].fuelprevtotal);
            } else {
                prevfuel = 0;
            }

            //final calculation 
            if (fuelqunttotal != 0 && truckcurrmiles != 0) 
            {
                var truckcurra = parseFloat(truckcurrmiles / fuelqunttotal);
                truckcurravg = truckcurra;
            }
            if (companyprevamounttotal != 0 && truckprevmiles != 0) 
            {
                var truckpreva = parseFloat(truckprevmiles / prevfuel);
                truckprevavg = truckpreva;
            }

            //----------------Calculate Truck Avg curr & prev month End-----------------

            //----------------curr & prev total amount and load-------------------------
            var curr_amount = abbreviateNumber(parseInt(currentamounttotal.toFixed(2)));
            var prev_amount = abbreviateNumber(parseInt(prevamounttotal.toFixed(2)));
            $("#current_loadd").html(currentloadtotal);
            $("#current_amountd").html("$" + curr_amount);
            $("#current_amountdtool").html("$" + numberWithCommas(currentamounttotal.toFixed(2)));
            $("#previous_loadd").html(prevloadtotal);
            $("#previous_amountd").html("$" + prev_amount);
            $("#previous_amountdtool").html("$" + numberWithCommas(prevamounttotal.toFixed(2)));
            // getdispatcherdata();
            $("#dashboardloader").css("display", "none");
        },
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        //console.log(jqXHR, textStatus, errorThrown);
        // swal.fire(request.responseText,'', 'error');
        swal.fire("something went wrong !");
    });
}
//------------- Main Array Function End------------------------------------------------


// //-----------------Function for get payable & Recevable Data start---------------------
function getPayableAndRecevable() 
{
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-dashpayable",
        async: false,
        success: function (response) {
            var payrevamount = JSON.parse(response);
            var todayspayable = '';
            var todaysreceivable = '';

            //Get Today Payable & Recevable data
            todayspayable += `<h3 class="mb-2 fw-semibold">&#36;${abbreviateNumber(parseInt(payrevamount[0].payable))} <span class="text-muted mb-0 mt-2 fs-12">$${numberWithCommas((payrevamount[0].payable).toFixed(2))}</span></h3>
                        <p class="text-muted mb-0 mt-2 fs-12">
                        Today's Payable
                        </p>`;

            todaysreceivable += `<h3 class="mb-2 fw-semibold">&#36;${abbreviateNumber(parseInt(payrevamount[0].receivable))} <span class="text-muted mb-0 mt-2 fs-12">$${numberWithCommas((payrevamount[0].receivable).toFixed(2))}</span></h3>
                        <p class="text-muted mb-0 mt-2 fs-12">
                        Today's Receivable
                        </p>`;

            $("#dashpayable").html(todayspayable);
            $("#dashrecevable").html(todaysreceivable);
            // $("#recvreport").css("display", "none");
            // $("#recrep").css("display", "none");
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        //console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //-----------------Function for get payable & Recevable Data End---------------------
var dispatchinarr = "";
var salesrarr = "";
function getdispatcherdata() 
{
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-getDispatcherInsdata",
        async: false,
        success: function (data) {
            var incentdata = JSON.parse(data);
            dispatchinarr = incentdata[0].dispatcharr;
            salesrarr = incentdata[0].salesrarr;
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        // console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //-----------------Function for get truck Data Start---------------------------------
function getTruckDataMap() 
{
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-truckmap",
        async: false,
        success: function (response) {
            mapselectedstate = JSON.parse(response);
            // console.log(mapselectedstate['individualstate']);
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
       // console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //-----------------Function for get truck Data End---------------------------------


// //-----------------Function for get Profit Loss Data Satrt-------------------------
var pandingAmounArr = [];
function getProfitLoss() {
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-profitloss",
        async: false,
        success: function (response) {
            var resp = JSON.parse(response);
            var allload = [];
            var totalrecevableamount = resp[0].loaddata;

            var fueltotal = 0;


            //-----------------------------------------
            pandingAmounArr = resp[0].pendingpaymentobj;

            var pendingcustomer_amount_tool = numberWithCommas(resp[0].pendingcustomeramount);
            var pendingcustomeramount = abbreviateNumber(resp[0].pendingcustomeramount);

            $('#panddingamt').html('$' + pendingcustomeramount);
            $('#penddingtool').html('$' + pendingcustomer_amount_tool);

            //-----------------------------------------

            //----------Total Rate---------------------
            var total_amount = totalrecevableamount;

            //-----------Total Payable-----------------
            var total_payamount = resp[0].payable;

            //--------------------fuel list table Start------------------------
            var fuelarrsize = resp[0].fueldata[0] == undefined ? 0 : resp[0].fueldata[0].fuelCard.length;
            var fueltab = '';
            var k = 1;
            for (var t = 0; t < fuelarrsize; t++) {
                fueltotal += parseFloat(resp[0].fueldata[0].fuelCard[t].currentBalance.toFixed(2));
                fueltab += `<li id='bgshadow' class='noactive'>
                    <table>
                        <tr>
                            <td>
                                <div class="graphic">${k}</div>
                            </td>
                            <td style="width:170px; padding-left:10px;" >
                                <span class="header">${resp[0].fueldata[0].fuelCard[t].fuelCardType}</span>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <span class="stat">$${resp[0].fueldata[0].fuelCard[t].currentBalance.toFixed(2)}</span>
                            </td>
                        </tr>
                    </table>
                </li>`;
                k++;
            }          
            //===fuel list table End-=========================

             //=====bank name & amount start ======================
            var banksize = resp[0].bankdata[0] == undefined ? 0 : resp[0].bankdata[0].admin_bank.length;
            var bankname = [];
            var bankamount = [];
            for (var d = 0; d < banksize; d++) 
            {

                var com_name = resp[0].bankdata[0].admin_bank[d].bankName + '-' + allcompany_data[resp[0].bankdata[0].admin_bank[d].accountHolder];
                bankname.push([com_name, parseFloat(resp[0].bankdata[0].admin_bank[d].currentBalance.toFixed(2))]);
                bankamount.push(parseFloat(resp[0].bankdata[0].admin_bank[d].currentBalance.toFixed(2)));
            }
            // =============bank name & amount end ==================


            //============credit name & amount satrt============-------
            var creditsize = resp[0].creditdata[0] == undefined ? 0 : resp[0].creditdata[0].admin_credit.length;
            var credit_name = [];
            var credit_amount = [];
            for (var f = 0; f < creditsize; f++) {
                credit_name.push([resp[0].creditdata[0].admin_credit[f].displayName, Math.sign(resp[0].creditdata[0].admin_credit[f].currentBalance) == -1 ? 0 : parseFloat(resp[0].creditdata[0].admin_credit[f].currentBalance.toFixed(2))]);
                credit_amount.push(parseFloat(resp[0].creditdata[0].admin_credit[f].currentBalance.toFixed(2)));
            }
            //============credit name & amount end============-------

            //bank amount
            var banktotalamount = parseFloat(resp[0].bankdata[0] == undefined ? 0 : resp[0].bankdata[0].bankcurrentbalance.toFixed(2));

            //bank amount + load total rate company Rev
            var totalcompanybal = banktotalamount + total_amount;

            //company payable amount credit | fuel | total pay
            var creditedamount = parseFloat(resp[0].creditdata[0] == undefined ? 0 : resp[0].creditdata[0].creditcurrentbalance.toFixed(2)) + fueltotal + total_payamount;

            //total company profit
            var companyprofit = totalcompanybal - creditedamount;

            //Calculate Percentage start
            var revtotal = banktotalamount + total_amount;
            var bankpercentage = banktotalamount * 100 / revtotal;
            var loadpercentage = total_amount * 100 / revtotal;

            var payabletotal = creditedamount;
            var creditpercentage = parseFloat(resp[0].creditdata[0] == undefined ? 0 : resp[0].creditdata[0].creditcurrentbalance.toFixed(2)) * 100 / payabletotal;
            var fuelpercentage = fueltotal * 100 / payabletotal;
            //Calculate Percentage end

            //radial graph data
            var radialBardata = [isNaN(loadpercentage.toFixed(2)) == true ? 0 : loadpercentage.toFixed(2), isNaN(bankpercentage.toFixed(2)) == true ? 0 : bankpercentage.toFixed(2), isNaN(creditpercentage.toFixed(2)) == true ? 0 : creditpercentage.toFixed(2), isNaN(fuelpercentage.toFixed(2)) == true ? 0 : fuelpercentage.toFixed(2)];


            var bankbalance = numberWithCommas(totalcompanybal.toFixed(2));
            var amounypayable = numberWithCommas(creditedamount.toFixed(2));
            var compprofit = numberWithCommas(companyprofit.toFixed(2));
            var agingpayable = numberWithCommas(total_payamount.toFixed(2));

            //profit loss table data
            var Total_Load_Amount = numberWithCommas(total_amount.toFixed(2));
            var Total_Bank_Balance = numberWithCommas(banktotalamount.toFixed(2));
            var Total_Credit_Balance = numberWithCommas(parseFloat(resp[0].creditdata[0] == undefined ? 0 : resp[0].creditdata[0].creditcurrentbalance.toFixed(2)));
            var Total_Fuel_Balance = numberWithCommas(fueltotal.toFixed(2));
            var totalcurrbal_dash = numberWithCommas(totalcompanybal.toFixed(2));
            var totalpaybal_dash = numberWithCommas(creditedamount.toFixed(2));


            $("#total_bbalance").html('$' + bankbalance);
            $("#total_payable").html('$' + amounypayable);
            $("#total_profit").html('$' + compprofit);

            $("#Total_Load_Amount").html('$' + Total_Load_Amount);
            $("#Total_Bank_Balance").html('$' + Total_Bank_Balance);
            $("#Total_Credit_Balance").html('$' + Total_Credit_Balance);
            $("#Total_Agpayable").html('$' + agingpayable);
            $("#Total_Fuel_Balance").html('$' + Total_Fuel_Balance);
            $("#totalcurrbal_dash").html('$' + totalcurrbal_dash);
            $("#totalpaybal_dash").html('$' + totalpaybal_dash);

            if (parseFloat(compprofit) < 0) {
                $("#prolosstitle").html('Loss');
                $("#pro_lossdata").html(`<span style="font-weight: bold;color:#dc3545 !important; margin-left:-25px">$${"(" + numberWithCommas(Math.abs(companyprofit).toFixed(2)) + ")"}</span>`);
            } else {
                $("#prolosstitle").html('Profit');
                $("#pro_lossdata").html(`<span style="font-weight: bold;color:#28a745 !important; margin-left:-25px">$${compprofit}</span>`);
            }


            var ravamount = abbreviateNumber(parseInt(totalcompanybal));
            var payable_amount = abbreviateNumber(parseInt(creditedamount));

            var radialbarrav = ["$" + ravamount + " | " + "$" + payable_amount];

            //============profitloss radialBar graph Start==============-
            var options = {
                chart: {
                    height: 400,
                    type: 'radialBar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        opacity: 0.2,
                        blur: 9,
                        left: 10,
                        top: 20
                    },
                },
                plotOptions: {
                    radialBar: {
                        track: {
                            background: 'transparent',
                        },
                        dataLabels: {
                            name: {
                                fontSize: '50px',
                                fontColor: 'black',
                                fontFamily: 'Open Sans, sans-serif',
                            },
                            value: {
                                fontSize: '50px',
                                fontFamily: 'Open Sans, sans-serif',
                            },
                            total: {
                                show: true,
                                label: ['Revenue | Payable'],
                                formatter: function (w) {
                                    return radialbarrav;
                                }
                            }
                        }
                    },
                },
                series: radialBardata,
                labels: ['Load Total', 'Bank Balance', 'Credit Card Total', 'Fuel Card Total'],
                colors: ['#007bff', '#28a745', '#dc3545', '#1782b8'],
            }

            var chart = new ApexCharts(
                document.querySelector("#profit_lossdonut"),
                options
            );
            chart.render();
            //=========profitloss radialBar graph End ================

            //color array
            var colorArray = ["#2460A7FF", "#FAA094FF", "#9ED9CCFF", "#008C76FF", "#A13941FF", "#85B3D1FF",
                "#EF6079FF", "#669DB3FF", "#D9B48FFF", "#ABD1C9FF", "#A59C94FF", "#DBB04AFF", "#97B3D0FF",
                "#95DBE5FF", "#078282FF", "#339E66FF", "#D7A9E3FF", "#8BBEE8FF", "#A8D5BAFF", '#FC766AFF',
                '#B0B8B4FF', '#184A45FF', '#9FC131FF', '#755139FF', '#2BAE66FF', '#2C5F2D', '#D7C49EFF', '#343148FF'];


            //===========bank pie Start=============================
            

            Highcharts.chart('bank_pie', {
                chart: {
                    type: 'pie',
                    backgroundColor: daytheme,
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: ''
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            color: daycolor,
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Bank Balance',
                    data: bankname
                }]
            });

            //============bank pie end================================

            //=============credit pie start============================
            

            Highcharts.chart('credit_pie', {
                chart: {
                    type: 'pie',
                    backgroundColor: daytheme,
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: ''
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            color: daycolor,
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Credit Card Balance',
                    data: credit_name
                }]
            });
            //==================credit pie end============================


            //fuel table start

            $("#fueltable").html(fueltab);
            //fuel table end

        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        // console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //=================Function for get Profit Loss Data End=================


// //===Function for get Carrier Data Start============
// var driverarra = '';

function getdriverdata() 
{
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-driverdata",
        async: false,
        success: function (response) {
            driverarra = JSON.parse(response);
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        //console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //-----------------Function for get Carrier Data End---------------------------

// //-----------------Function for get salesrep Data start------------------------
function getsalesrapdata() 
{
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-salesData",
        async: false,
        success: function (response) {
            var salesdata = JSON.parse(response);
            var salloads = res[0].loads;

            var saldispatcher = res[0].alldispatcher;
            var salfirstcurr = res[0].firstcurr;
            var sallastcurr = res[0].lastcurr;
            var salfirstprev = res[0].firstprev;
            var sallastprev = res[0].lastprev;
            var filter_Type = res[0].filterType;
            var b = 0;
            var v = 0;
            var rr = 0;
            var salcurrindex = {};
            var salprevindex = {};
            var salcurrcustindex = {};
            var salprevcustindex = {};

            var saldata = {};
            var newArray = {};
            var newArrayprev = {};
            for (var w = 0; w < salloads.length; w++) 
            {
                var saldate = '';
                if (filter_Type == "shipper_pickup") 
                {
                    saldate = salloads[w].shipper_pickup;
                }
                else if (filter_Type == "created_at") 
                {
                    saldate = salloads[w].created_at;
                }
                else if (filter_Type == "consignee_pickup") 
                {
                    saldate = salloads[w].consignee_pickup;
                }
                else if (filter_Type == "status_Invoiced_time") 
                {
                    saldate = salloads[w].status_Invoiced_time;
                }

                var salonlyDate = convertTimeZone(saldate, "info").substring(3, 5).toString(); //.replace(/\b0/g, '').substring(2, 3).toString();
                if (salonlyDate == "01" || salonlyDate == "02" || salonlyDate == "03" || salonlyDate == "04" || salonlyDate == "05" || salonlyDate == "06" || salonlyDate == "07" || salonlyDate == "08" || salonlyDate == "09") 
                {
                    salonlyDate = salonlyDate.replace(/\b0/g, '');
                }
                var salcust_name = salloads[w].customer_parent + "-" + salloads[w].customer;
                var salcust_index = "";

                //----------Check Customer Empty Start-----------------------
                if (typeof (salcust_name) != "object") 
                {
                    if (salcust_name != "") 
                    {
                        salcust_index = salcust_name.trim().toString();
                    } 
                    else 
                    {
                        salcust_index = "Other";
                    }
                } 
                else 
                {
                    salcust_index = "Other";
                }
                //----------Check Customer Empty Start-----------------------

                if (salesdata[salloads[w].customer_parent + "-" + salloads[w].customer] === undefined) 
                {
                    continue;
                } 
                else 
                {
                    var salrep_name = salesdata[salloads[w].customer_parent + "-" + salloads[w].customer].salesRep;
                }

                var salrep_index = "";

                //----------Check Customer Empty Start-----------------------
                if (typeof (salrep_name) != "object") 
                {
                    if (salrep_name != "") 
                    {
                        salrep_index = salrep_name.trim().toString();
                    } 
                    else 
                    {
                        salrep_index = "Other";
                    }
                } 
                else 
                {
                    salrep_index = "Other";
                }
                //----------Check Customer Empty Start-----------------------

                if (salrep_index == "undefined") 
                {
                    salrep_index = "Other";
                }

                //---------Check Current & Previous Month Start--------------
                var salmonth_type = "current";
                var saltotal_rate = parseFloat(isNaN(salloads[w].total_rate) == true ? 0 : salloads[w].total_rate);
                var salname = salloads[w].loaddata['customername'];
                var salloadertotal = salloads[w].loaddata['loadertotal'] != "" ? parseFloat(salloads[w].loaddata['loadertotal']) : 0;
                salindex = b;
                if (saldate <= sallastprev && saldate >= salfirstprev) 
                {
                    salmonth_type = "prev";
                    salindex = v;
                }
                //---------Check Current & Previous Month End----------------

                if (salmonth_type == "current") 
                {

                    if (!salcurrcustindex.hasOwnProperty(salcust_index)) 
                    {
                        salcurrcustindex[salcust_index] = b;
                        b++;
                        var salindex = 0;
                        var saleincent = 0;
                        salindex = salcurrcustindex[salcust_index];
                        var salesindexdata = salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other";
                        var salestype = salesrarr[salesindexdata] == undefined ? "" : salesrarr[salesindexdata].saleratetype;

                        if (salestype == "FLAT") {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper);
                        }
                        if (salestype == "PERCENTAGE") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper) / 100;
                        }

                        salcust_table[salindex] = { "name": salname, "loads": 1, "Margin": parseFloat(saltotal_rate - salloadertotal), "incentive": saleincent, "total": saltotal_rate, "id": salcust_index, 'salesr': salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other" };


                    } 
                    else 
                    {
                        var salindex = 0;
                        salindex = salcurrcustindex[salcust_index];
                        var saleincent = 0;
                        var salesindexdata = salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other";
                        var salestype = salesrarr[salesindexdata] == undefined ? "" : salesrarr[salesindexdata].saleratetype;

                        if (salestype == "FLAT") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper);
                        }
                        if (salestype == "PERCENTAGE") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper) / 100;
                        }

                        salcust_table[salindex] = { "name": salname, "loads": salcust_table[salindex]['loads'] + 1, "Margin": salcust_table[salindex]['Margin'] + parseFloat(saltotal_rate - salloadertotal), "incentive": salcust_table[salindex]['incentive'] + saleincent, "total": parseFloat(salcust_table[salindex]['total'] + saltotal_rate), "id": salcust_index, 'salesr': salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other" };

                    }


                } 
                else 
                {

                    if (!salprevcustindex.hasOwnProperty(salcust_index)) 
                    {
                        salprevcustindex[salcust_index] = v;
                        v++;
                        var salindex = 0;
                        salindex = salprevcustindex[salcust_index];

                        var saleincent = 0;
                        var salesindexdata = salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other";
                        var salestype = salesrarr[salesindexdata] == undefined ? "" : salesrarr[salesindexdata].saleratetype;

                        if (salestype == "FLAT") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper);
                        }
                        if (salestype == "PERCENTAGE") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper) / 100;
                        }

                        salcust_tablepre[salindex] = { "name": salname, "incentive": saleincent, "total": saltotal_rate, "id": salcust_index, 'salesr': salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other" };


                    } 
                    else 
                    {

                        var salindex = 0;
                        salindex = salprevcustindex[salcust_index];

                        var saleincent = 0;
                        var salesindexdata = salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other";
                        var salestype = salesrarr[salesindexdata] == undefined ? "" : salesrarr[salesindexdata].saleratetype;

                        if (salestype == "FLAT") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper);
                        }
                        if (salestype == "PERCENTAGE") 
                        {
                            var saleincent = parseFloat(saltotal_rate - salloadertotal) * parseFloat(salesrarr[salesindexdata].salesflatper) / 100;
                        }

                        salcust_tablepre[salindex] = { "name": salname, "incentive": salcust_tablepre[salindex]['incentive'] + saleincent, "total": parseFloat(salcust_tablepre[salindex]['total'] + saltotal_rate), "id": salcust_index, 'salesr': salesdata[salcust_index].salesRep != "" ? salesdata[salcust_index].salesRep : "Other" };

                    }
                }
            }

            var saltable = [];
            var holder = {};
            var d = 0;
            for (var g = 0; g < salcust_table.length; g++) 
            {
                var sal_name = salcust_table[g].salesr;
                var sal_incentive = isNaN(salcust_table[g].incentive) == true ? 0 : salcust_table[g].incentive;
                var sal_rev = isNaN(salcust_table[g].total) == true ? 0 : salcust_table[g].total;
                var sal_total_loads = salcust_table[g].loads;
                var sal_margin = isNaN(salcust_table[g].Margin) == true ? 0 : salcust_table[g].Margin;
                var sal_index = "";

                //----------Check Customer Empty Start-----------------------
                if (typeof (sal_name) != "object") 
                {
                    if (sal_name != "") 
                    {
                        sal_index = sal_name.trim().toString();
                    } 
                    else 
                    {
                        sal_index = "Other";
                    }
                } 
                else 
                {
                    sal_index = "Other";
                }
                //----------Check Customer Empty Start-----------------------

                if (!holder.hasOwnProperty(sal_index)) 
                {
                    holder[sal_index] = d;
                    d++;
                    var salind = 0;
                    salind = holder[sal_index];
                    if (saldispatcher[sal_index] == undefined) 
                    {
                        salrename = "Other";
                    } 
                    else 
                    {
                        salrename = saldispatcher[sal_index];
                    }
                    saltable[salind] = { "salname": salrename, "insantive": sal_incentive, "salmargin": sal_margin, "salrev": sal_rev, "loads": sal_total_loads, "sald": sal_index };


                } 
                else 
                {

                    var salind = 0;
                    salind = holder[sal_index];
                    if (saldispatcher[sal_index] == undefined) 
                    {
                        salrename = "Other";
                    }
                    else 
                    {
                        salrename = saldispatcher[sal_index];
                    }
                    saltable[salind] = { "salname": salrename, "insantive": parseFloat(saltable[salind]['insantive'] + sal_incentive), "salmargin": parseFloat(saltable[salind]['salmargin'] + sal_margin), "salrev": parseFloat(saltable[salind]['salrev'] + sal_rev), "loads": parseFloat(saltable[salind]['loads'] + sal_total_loads), "sald": sal_index };
                }
            }
            saltable.sort(sortByProperty("insantive"));
            //for curr
            for (var f of salcust_table) 
            {
                if (newArray[f.salesr]) 
                {
                    newArray[f.salesr].push(f)
                } 
                else 
                {
                    newArray[f.salesr] = [f]
                }
            }

            //for prev
            for (var x of salcust_tablepre) 
            {
                if (newArrayprev[x.salesr]) 
                {
                    newArrayprev[x.salesr].push(x)
                } 
                else 
                {
                    newArrayprev[x.salesr] = [x]
                }
            }

            // var salrepn = saltable[1] == undefined ? saltable[0] == undefined ? "NA" : saltable[0]['sald'] : saltable[1]['sald'];

            var salrepn = saltable[0] == undefined ? "NA" : saltable[0]['sald'];

            barchartSales(newArray, newArrayprev, salrepn);


            var salre_table = Object.keys(saltable).length;
            var saldashtable = '';

            $("#sales_name").html(saltable[0] == undefined ? "NA" : saltable[0]['salname']);
            $("#sales_name_prv").html(saltable[0] == undefined ? "NA" : saltable[0]['salname']);

            var y = 1;
            for (var z = 0; z < salre_table; z++) 
            {
                var sal_percentage = saltable[z]['salmargin'] * 100 / saltable[z]['salrev'];
                saldashtable += `<li id='bgshadow'  class='noactive' onclick='barchartSales(${JSON.stringify(newArray).replace(/'/g, "&apos;")},${JSON.stringify(newArrayprev).replace(/'/g, "&apos;")},"${saltable[z]['sald']}","${saltable[z]['salname']}")'>
                <table>
                        <tbody>
                           <tr>
                            <td rowspan="2">
                                <div class="graphic" >${y}</div>
                            </td>
                            <td style="width:170px; padding-left:10px;">
                                <span class="header">${saltable[z]['salname']}</span>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                <div class="tooltip1"><span class="header">${numberWithCommas(saltable[z]['insantive'].toFixed(2))}</span><span class="toolInsantive">Commison</span></div>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="stat"><i class="mdi mdi-truck truckicon-loads"></i>&nbsp;${saltable[z]['loads']}</span><span class="toolloads">Loads</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:170px; padding-left:10px;">
                                <div class="tooltip1"><span class="">$${numberWithCommas(saltable[z]['salrev'].toFixed(2))}</span><span class="toolrevenue">Revenue</span></div>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                <div class="tooltip1"><span class="">$${numberWithCommas(saltable[z]['salmargin'].toFixed(2))}</span><span class="toolmargin">Margin</span></div>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="">${sal_percentage.toFixed(2)}%</span><span class="toolpercentage">Percentage</span></div>
                            </td>
                        </tr>
                       </tbody>
				</table>
                    
                </li>`;
                y++;
            }
            $("#dashtable").html(saldashtable);
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
      //  console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}
// //-----------------Function for get salesrep Data End----------------------


// //------------------Function for Company Data--------------------
function companydashdata() {
    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-companydataData",
        async: false,
        success: function (response) {
            var comdata = JSON.parse(response);

            var piearr = [["Driver", comdata[0]['companyamountpie'][0].driver],
            ["Carrier", comdata[0]['companyamountpie'][0].carrier],
            ["Factoring", comdata[0]['companyamountpie'][0].factoringcompany],
            ["Expense", comdata[0]['companyamountpie'][0].Expense],
            ["Maintenance", comdata[0]['companyamountpie'][0].Maintenance],
            ["Insurance", comdata[0]['companyamountpie'][0].Insurance],
            ["Other", comdata[0]['companyamountpie'][0].Other],
            ["Loan", comdata[0]['companyamountpie'][0].loan],
            ["Credit Card", comdata[0]['companyamountpie'][0].creditcard],
            ["Fuel Card", comdata[0]['companyamountpie'][0].fuelcard]
            ]
            bankreceipttotal = Math.round(comdata[0]['totalcreditamount'], 2);
            var bankoutstanding = parseFloat(currentamounttotal) - parseFloat(bankreceipttotal);


            Highcharts.chart('donutdashcompany', {
                chart: {
                    type: 'pie',
                    backgroundColor: daytheme,
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                series: [{
                    name: 'Cashflow',
                    color: daycolor,
                    data: [
                        ['Receipt', bankreceipttotal],
                        ['Outstanding', bankoutstanding]
                    ]
                }]
            });

            //-------------Company Donut Chart End-------------


            Highcharts.chart('piedashcompany', {
                chart: {
                    type: 'pie',
                    backgroundColor: daytheme,
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: ''
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            color: daycolor,
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Expense',
                    data: piearr
                }]
            });
            //-------------Company Pie Chart End-------------

        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        //console.log(jqXHR, textStatus, errorThrown);
        swal(request.responseText,'', 'error');
    });
}


//----------------------Function for get category wise Data Start------------------
function dashchart(val) {
    _empty();

    //Empty All Graph,Table,Title
    $("#uniqueVisits").empty();
    $("#lineRevenueGraph").empty();
    $("#dashtable").empty();
    $("#current_loadd").empty();
    $("#previous_loadd").empty();
    $("#current_amountd").empty();
    $("#previous_amountd").empty();
    $("#current_amountdtool").empty();
    $("#previous_amountdtool").empty();
    $(".bartitle").empty();
    $(".linetitledata").empty();
    $(".avg-label-2").empty();
    $("#ranking_table").empty();

    //condition for customer
    if (val == "customer_analytics") {
        var bartitle = "Customer";
        var ranking_title = "Customer Ranking";
        var linetitledata = "Revenue";
        var avglabel2 = "Revenue";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "inline-block");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#current_loadd").html(currentloadtotal);
        $("#previous_loadd").html(prevloadtotal);
        $("#current_amountd").html("$" + abbreviateNumber(parseInt(currentamounttotal.toFixed(2))));
        $("#previous_amountd").html("$" + abbreviateNumber(parseInt(prevamounttotal.toFixed(2))));
        $("#current_amountdtool").html("$" + numberWithCommas(currentamounttotal.toFixed(2)));
        $("#previous_amountdtool").html("$" + numberWithCommas(prevamounttotal.toFixed(2)));
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        var tbobject = cust_table;
        var currchartobj = custdaytotal.current;
        var prevchartobj = custdaytotal.prev;


    }
    //condition for driver 
    else if (val == "driver_analytics") {

        var bartitle = "Driver";
        var avglabel2 = "Driver Pay";
        var linetitledata = "Pay";
        var ranking_title = "Driver Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "inline-block");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#current_loadd").html(drivercurrentloadtotal);
        $("#previous_loadd").html(driverprevloadtotal);
        $("#current_amountd").html("$" + abbreviateNumber(parseInt(drivercurrentamounttotal.toFixed(2))));
        $("#previous_amountd").html("$" + abbreviateNumber(parseInt(driverprevamounttotal.toFixed(2))));
        $("#current_amountdtool").html("$" + numberWithCommas(drivercurrentamounttotal.toFixed(2)));
        $("#previous_amountdtool").html("$" + numberWithCommas(driverprevamounttotal.toFixed(2)));
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        var tbobject = driver_table;
        var currchartobj = driverdaytotal.current;
        var prevchartobj = driverdaytotal.prev;

    }
    //condition for truck 
    else if (val == "truck_analytics") {

        var bartitle = "Truck";
        var ranking_title = "Truck Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".bar-hide").css("display", "none");
        $(".linedash").css("display", "none");
        $(".piedash").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $(".truck_pie").css("display", "flex");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        $("#current_amountd").html(drivercurrentamounttotal.toFixed(2));
        $("#previous_amountd").html(driverprevamounttotal.toFixed(2));

        $("#pietitle").html("Truck");
        $("#ranking_table").html(ranking_title);

        var tbobject = truck_table;
        var currchartobj = {};
        var prevchartobj = {};

        truckGraphData();

    }
    //condition for dispatcher 
    else if (val == "dispatcher_analytics") {

        var bartitle = "Dispatcher";
        var linetitledata = "Incentive";
        var avglabel2 = "Incentive";
        var ranking_title = "Dispatcher Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "inline-block");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#current_loadd").html(currentloadtotal);
        $("#previous_loadd").html(prevloadtotal);
        $("#current_amountd").html("$" + abbreviateNumber(parseInt(dispatchcurrentamounttotal.toFixed(2))));
        $("#previous_amountd").html("$" + abbreviateNumber(parseInt(dispatchprevamounttotal.toFixed(2))));
        $("#current_amountdtool").html("$" + numberWithCommas(dispatchcurrentamounttotal.toFixed(2)));
        $("#previous_amountdtool").html("$" + numberWithCommas(dispatchprevamounttotal.toFixed(2)));

        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        var tbobject = dispatch_table;
        var currchartobj = dispatchdaytotal.current;
        var prevchartobj = dispatchdaytotal.prev;

    }
    //condition for company 
    else if (val == "company_analytics") {

        var bartitle = "Company";
        var ranking_title = "Company Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "none");
        $(".piedash").css("display", "inline-block");
        $(".donutdash").css("display", "inline-block");
        $(".truck_chart").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#lineRevenueGraph").empty();
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        $(".bartitle").html(bartitle);
        $("#ranking_table").html(ranking_title);

        var tbobject = company_table;
        var currchartobj = companydaytotal.current;
        var prevchartobj = companydaytotal.prev;

    }
    //condition for profit loss 
    else if (val == "profit_loss") {
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "none");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".bar-hide").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $("#lineRevenueGraph").empty();
        $(".truck_pie").css("display", "none");
        $("#leaderboard").css("display", "none");
        $(".profit_hide").css("display", "flex");
        $(".loss_hide").css("display", "flex");

        var tbobject = {};
        var currchartobj = {};
        var prevchartobj = {};

    }
    //condition for carrier 
    else if (val == "carrier_analytics") {
        var bartitle = "Carrier";
        var linetitledata = "Pay";
        var avglabel2 = "Carrier Pay";
        var ranking_title = "Carrier Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "inline-block");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#current_loadd").html(currentloadtotal);
        $("#previous_loadd").html(prevloadtotal);
        $("#current_amountd").html("$" + abbreviateNumber(parseInt(carriercurramounttotal.toFixed(2))));
        $("#previous_amountd").html("$" + abbreviateNumber(parseInt(carrierprevamounttotal.toFixed(2))));
        $("#current_amountdtool").html("$" + numberWithCommas(carriercurramounttotal.toFixed(2)));
        $("#previous_amountdtool").html("$" + numberWithCommas(carrierprevamounttotal.toFixed(2)));
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");

        var tbobject = carrier_table;
        var currchartobj = carrierdaytotal.current;
        var prevchartobj = carrierdaytotal.prev;

    }
    //condition for equipment
    else if (val == "equipment_analytics") {

        var bartitle = "Equipment";
        var linetitledata = "Revenue";
        var avglabel2 = "Equipment Revenue";
        var ranking_title = "Equipment Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "inline-block");
        $(".piedash").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".salcurrpie-hide").css("display", "none");
        $(".salprevpie-hide").css("display", "none");
        $(".bar-hide").css("display", "inline-block");
        $("#leaderboard").css("display", "inline-block");
        $("#current_loadd").html(currentloadtotal);
        $("#previous_loadd").html(prevloadtotal);
        $("#current_amountd").html("$" + abbreviateNumber(parseInt(equipmentcurramounttotal.toFixed(2))));
        $("#previous_amountd").html("$" + abbreviateNumber(parseInt(equipmentprevamounttotal.toFixed(2))));
        $("#current_amountdtool").html("$" + numberWithCommas(equipmentcurramounttotal.toFixed(2)));
        $("#previous_amountdtool").html("$" + numberWithCommas(equipmentprevamounttotal.toFixed(2)));
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");

        var tbobject = equip_table;
        var currchartobj = equipmentdaytotal.current;
        var prevchartobj = equipmentdaytotal.prev;

    }
    //condition for salesrep
    else if (val == "salesrep_analytics") {
        var bartitle = "Sales Representative";
        var ranking_title = "Sales Representative Ranking";
        $("#cust_name").empty();
        $("#linec_name").empty();
        $(".linedash").css("display", "none");
        $(".piedash").css("display", "none");
        $(".bar-hide").css("display", "none");
        $(".donutdash").css("display", "none");
        $(".truck_chart").css("display", "none");
        $(".truck_pie").css("display", "none");
        $(".profit_hide").css("display", "none");
        $(".loss_hide").css("display", "none");
        $("#leaderboard").css("display", "inline-block");
        $(".salcurrpie-hide").css("display", "inline-block");
        $(".salprevpie-hide").css("display", "inline-block");


        var tbobject = {};
        var currchartobj = {};
        var prevchartobj = {};

    }


    var table_obj = Object.keys(tbobject).length;
    var dashtable = '';
    var q = 1;
    var disincentive = '';
    var dashmargin = 0;
    var catname = "";
    var dashrevenue = 0;
    var dashloads = 0;
    var tool_tip1 = "";
    var tool_tip2 = "";
    var tool_tip3 = "";
    var presign = "";
    var dollersign = "";
    for (var s = 0; s < table_obj; s++) {
        if (tbobject[s]['name'] != undefined) {
            var tbobj = tbobject[s]['name'];
        } else {
            var tbobj = 'Other';
        }
        if (bartitle == "Dispatcher") {
            tool_tip1 = "Commison";
            tool_tip2 = "Margin";
            tool_tip3 = "Margin Percentage";
            presign = "%";
            dollersign = "$";

            var incentive = 0;
            var dispatcherrate_type = dispatchinarr[tbobject[s]['id']] == undefined ? "" : dispatchinarr[tbobject[s]['id']].dispatcherratetype.trim(" ");
            if (dispatcherrate_type == "FLAT") {
                var incentive = tbobject[s]['Margin'] * parseFloat(dispatchinarr[tbobject[s]['id']].dispatcherflatper.trim(" "));
            }
            if (dispatcherrate_type == "PERCENTAGE") {
                var incentive = (tbobject[s]['Margin'] * parseFloat(dispatchinarr[tbobject[s]['id']].dispatcherflatper.trim(" "))) / 100;
            }


            disincentive = numberWithCommas(incentive.toFixed(2));
            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            dashmargin = "$" + numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashpercentage = isNaN(tbobject[s]['Margin'] * 100 / tbobject[s]['total']) == true ? 0 : tbobject[s]['Margin'] * 100 / tbobject[s]['total'];

        } else if (bartitle == "Driver") {
            tool_tip1 = "Driver Pay";
            tool_tip2 = "Miles";
            tool_tip3 = "Average";
            presign = "";
            dollersign = "$";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = "$" + numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashmargin = numberWithCommas(tbobject[s]['miles'].toFixed(2));
            dashpercentage = tbobject[s]['total'] / tbobject[s]['miles'];

        } else if (bartitle == "Customer") {
            tool_tip1 = "Margin";
            tool_tip2 = " ";
            tool_tip3 = "Margin Percentage";
            presign = "%";
            dollersign = "";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashmargin = "";
            dashpercentage = isNaN(tbobject[s]['Margin'] * 100 / tbobject[s]['total']) == true ? 0 : tbobject[s]['Margin'] * 100 / tbobject[s]['total'];

        } else if (bartitle == "Company") {
            tool_tip1 = "Margin";
            tool_tip2 = "Carrier/Driver/Owner Pay";
            tool_tip3 = "Percentage";
            presign = "%";
            dollersign = "$";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = "$" + numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashmargin = "$" + numberWithCommas(tbobject[s]['loadertotal'].toFixed(2));
            dashpercentage = isNaN(tbobject[s]['Margin'] * 100 / tbobject[s]['total']) == true ? 0 : tbobject[s]['Margin'] * 100 / tbobject[s]['total'];

        } else if (bartitle == "Truck") {
            tool_tip1 = "";
            tool_tip2 = "Miles";
            tool_tip3 = "Average";
            presign = "";
            dollersign = "";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = "";
            dashmargin = numberWithCommas(tbobject[s]['miles'].toFixed(2));
            dashpercentage = tbobject[s]['total'] / tbobject[s]['miles'];

        } else if (bartitle == "Carrier") {
            tool_tip1 = "Margin";
            tool_tip2 = "Carrier Pay";
            tool_tip3 = "Percentage";
            presign = "%";
            dollersign = "$";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = "$" + numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashmargin = "$" + numberWithCommas(tbobject[s]['loadertotal'].toFixed(2));
            dashpercentage = tbobject[s]['Margin'] * 100 / tbobject[s]['total'];

        } else if (bartitle == "Equipment") {
            tool_tip1 = "Margin";
            tool_tip2 = "Miles";
            tool_tip3 = "Average";
            presign = "";
            dollersign = "$";

            catname = tbobj;
            dashrevenue = numberWithCommas(tbobject[s]['total'].toFixed(2));
            dashloads = tbobject[s]['loads'];
            disincentive = "$" + numberWithCommas(tbobject[s]['Margin'].toFixed(2));
            dashmargin = numberWithCommas(tbobject[s]['miles'].toFixed(2));
            dashpercentage = tbobject[s]['total'] / tbobject[s]['miles'];
        }

        dashtable += `<li id='bgshadow'  class='noactive' onclick='indchart("${tbobject[s]['id']}","${bartitle}","${tbobject[s]['name']}")'>
        <table>
                        <tbody>
                           <tr>
                            <td rowspan="2">
                                <div class="graphic" >${q}</div>
                            </td>
                            <td style="width:170px; padding-left:10px;">
                                <span class="header">${catname}</span>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                <div class="tooltip1"><span class="header">$${dashrevenue}</span><span class="toolrevenue">Revenue</span></div>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="stat"><i class="mdi mdi-truck truckicon-loads"></i>&nbsp;${dashloads}</span><span class="toolloads">Loads</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:170px; padding-left:10px;">
                                <div class="tooltip1"><span class="">${disincentive}</span><span class="toolmargin">${tool_tip1}</span></div>
                            </td>
                            <td style="width:100px; padding-left:10px;">
                                <div class="tooltip1"><span class="">${dashmargin}</span><span class="toolmargin">${tool_tip2}</span></div>
                            </td>
                            <td style="width:60px; padding-left:10px;">
                                <div class="tooltip1"><span class="">${dashpercentage.toFixed(2) + presign}</span><span class="toolpercentage">${tool_tip3}</span></div>
                            </td>
                        </tr>
                       </tbody>
				</table>
                </li>`;
        q++;
    }
    $("#dashtable").html(dashtable);
    //

    //--------------------Bar Graph Data Stat---------------------
    var curloads = [];
    var preloads = [];
    var curramount = [];
    var prevamount = [];
    var cust_current_len = Object.keys(currchartobj).length;

    for (var h = 1; h <= cust_current_len; h++) {
        //
        curloads.push(currchartobj[h].loads);
        preloads.push(prevchartobj[h].loads);

        curramount.push(currchartobj[h].amount);
        prevamount.push(prevchartobj[h].amount);

        //

    }
    //----------Bar Graph Data End------------------------

    dashGraphBarLine(curloads, preloads, curramount, prevamount);

    $(".bartitle").html(bartitle);
    $(".linetitledata").html(linetitledata);
    $(".avg-label-2").html(avglabel2);
    $("#ranking_table").html(ranking_title);

}

function _empty() {
    
    $("#dashtable").empty();
    $("#donutdashcompany").empty();
    $("#piedashcompany").empty();
    $("#truck_donut").empty();
    $("#mapdiv").empty();
    $("#salprevpie").empty();
    $("#salcurrpie").empty();
    $("#truck_Earning").empty();
    $("#truck_Average").empty();
}

//----------------------Function for get individual Data Start------------------
function indchart(val, category, fname) {
    //graph title
    $("#cust_name").html(fname);
    $("#linec_name").html(fname);

    //empty graph
    $("#uniqueVisits").empty();
    $("#lineRevenueGraph").empty();


    if (category == "Customer") {

        var arrname = mainarr;

    } else if (category == "Dispatcher") {

        var arrname = dispatchermain;

    } else if (category == "Driver") {

        var arrname = drivermain;

    } else if (category == "Company") {

        var arrname = companymain;

    } else if (category == "Carrier") {

        var arrname = carriermain;

    } else if (category == "Equipment") {

        var arrname = equipmentmain;

    }

    var indcurrcustload = [];
    var indcurrcusamount = [];

    var indprecustload = [];
    var indprecusamount = [];
    
    var currmainarrsize = Object.keys(arrname.current).length;
    for (var t = 0; t < currmainarrsize; t++) {
        if (arrname.current[t] != undefined) {
            if (arrname.current[t][val] != undefined) {
                var currsubarrsize = Object.keys(arrname.current[t][val]).length;
                for (var p = 1; p <= currsubarrsize; p++) {
                    let clbamount = parseFloat(arrname.current[t][val][p].amount);
                    indcurrcustload.push(arrname.current[t][val][p].loads);
                    indcurrcusamount.push(clbamount);
                }
            }
        }
    }


    var prevmainarrsize = Object.keys(arrname.prev).length;
    for (var b = 0; b < prevmainarrsize; b++) {
        if (arrname.prev[b] != undefined) {
            if (arrname.prev[b][val] != undefined) {
                var presubarrsize = Object.keys(arrname.prev[b][val]).length;
                for (var e = 1; e <= presubarrsize; e++) {
                    let plbamount = parseFloat(arrname.prev[b][val][e].amount);
                    indprecustload.push(arrname.prev[b][val][e].loads);
                    indprecusamount.push(plbamount);
                }
            }
        }

    }
    
    dashGraphBarLine(indcurrcustload, indprecustload, indcurrcusamount, indprecusamount);

}
//----------------------Function for get individual Data End--------------------------------


//-----------------------Bar Chart Function For Sales Representative Start -----------------
function barchartSales(salescurrarr, salesprevarr, salrepind, salesname) {

    $("#salcurrpie").empty();
    $("#salprevpie").empty();
    $("#sales_name").html(salesname);
    $("#sales_name_prv").html(salesname);

    if (isEmpty(salescurrarr)) {
        var salescurrarrsize = 0;
    } else {
        var salescurrarrsize = Object.keys(salescurrarr[salrepind]).length;
    }
    var indcurrsalname = [];
    var indcurrsalamount = [];

    for (var d = 0; d < salescurrarrsize; d++) {
        indcurrsalname.push([salescurrarr[salrepind][d].name, parseFloat(salescurrarr[salrepind][d].incentive)]);
        indcurrsalamount.push(salescurrarr[salrepind][d].incentive);
    }


    if (isEmpty(salesprevarr)) {
        var salesprevarrsize = 0;
    } else {
        var salesprevarrsize = salesprevarr[salrepind] == undefined ? 0 : Object.keys(salesprevarr[salrepind]).length;
    }


    var indprevsalname = [];
    var indprevsalamount = [];

    for (var q = 0; q < salesprevarrsize; q++) {
        indprevsalname.push([salesprevarr[salrepind][q].name, parseFloat(salesprevarr[salrepind][q].incentive)]);
        indprevsalamount.push(salesprevarr[salrepind][q].incentive);
    }

    salesRepGraphData(indcurrsalname, indcurrsalamount, indprevsalname, indprevsalamount);
    indcurrsalname = [];
    indcurrsalamount = [];
    indprevsalname = [];
    indprevsalamount = [];
}
//-----------------------Bar Chart Function For Sales Representative End -----------------
function isEmpty(obj) {
    for (var key in obj) {
        if (obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

function salesRepGraphData(indcurrsalname, indcurrsalamount, indprevsalname, indprevsalamount) {

    //-------------------Sales Rep Current Month Pie Chart Start-------------------

    Highcharts.chart('salcurrpie', {
        chart: {
            type: 'pie',
            backgroundColor: daytheme,
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    color: daycolor,
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Incentive',
            data: indcurrsalname
        }]
    });
    //-----------------------------Sales Rep Current Month Pie Chart End----------------------

    //----------------------------Sales Rep Prev Month Pie Chart Start------------------------

    Highcharts.chart('salprevpie', {
        chart: {
            type: 'pie',
            backgroundColor: daytheme,
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    color: daycolor,
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Incentive',
            data: indprevsalname
        }]
    });
    //-------------------------Sales Rep Prev Month Pie Chart End-----------------------------

}

//---------------------------Truck Graph Data-----------------------------------------------
function truckGraphData() {

    //------------------Truck Map Start--------------------
    
  var H = Highcharts,
  map = H.maps['countries/us/us-all'],
  chart;

// Add series with state capital bubbles
Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/us-capitals.json', function () {
  var data = [];
  var dataarr = [mapselectedstate['individualstate']];
  var miletotal = [mapselectedstate['individual_state_milesum']];
  var dsds = [  
    {"abbrev":"AL","capital":"Alabama","lat":32.380120,"lon":-86.300629,"Miles":205764},
    {"abbrev":"AK","capital":"Alaska","lat":58.299740,"lon":-134.406794,"Miles":31275},
    {"abbrev":"AZ","capital":"Arizona","lat":33.448260,"lon":-112.075774,"Miles":1445632},
    {"abbrev":"AR","capital":"Arkansas","lat":34.748655,"lon":-92.274494,"Miles":193524},
    {"abbrev":"CA","capital":"California","lat":38.579065,"lon":-121.491014,"Miles":466488},
    {"abbrev":"CO","capital":"Colorado","lat":39.740010,"lon":-104.992259,"Miles":600158},
    {"abbrev":"CT","capital":"Connecticut","lat":41.763325,"lon":-72.674069,"Miles":124775},
    {"abbrev":"DE","capital":"Delaware","lat":39.158035,"lon":-75.524734,"Miles":36047},
    {"abbrev":"FL","capital":"Florida","lat":30.439775,"lon":-84.280649,"Miles":181376},
    {"abbrev":"GA","capital":"Georgia","lat":33.748315,"lon":-84.391109,"Miles":420003},
    {"abbrev":"HI","capital":"Hawaii","lat":21.304770,"lon":-157.857614,"Miles":337256},
    {"abbrev":"ID","capital":"Idaho","lat":43.606980,"lon":-116.193409,"Miles":205671},
    {"abbrev":"IL","capital":"Illinois","lat":39.801055,"lon":-89.643604,"Miles":116250},
    {"abbrev":"IN","capital":"Indiana","lat":39.766910,"lon":-86.149964,"Miles":820445},
    {"abbrev":"IA","capital":"Iowa","lat":41.589790,"lon":-93.615659,"Miles":203433},
    {"abbrev":"KS","capital":"Kansas","lat":39.049285,"lon":-95.671184,"Miles":127473},
    {"abbrev":"KY","capital":"Kentucky","lat":38.195070,"lon":-84.878694,"Miles":25527},
    {"abbrev":"LA","capital":"Louisiana","lat":30.443345,"lon":-91.186994,"Miles":229493},
    {"abbrev":"ME","capital":"Maine","lat":44.318036,"lon":-69.776218,"Miles":19136},
    {"abbrev":"MD","capital":"Maryland","lat":38.976700,"lon":-76.489934,"Miles":38394},
    {"abbrev":"MA","capital":"Massachusetts","lat":42.358635,"lon":-71.056699,"Miles":617594},
    {"abbrev":"MI","capital":"Michigan","lat":42.731940,"lon":-84.552249,"Miles":114297},
    {"abbrev":"MN","capital":"Minnesota","lat":44.943829,"lon":-93.093326,"Miles":285068},
    {"abbrev":"MS","capital":"Mississippi","lat":32.298690,"lon":-90.180489,"Miles":173514},
    {"abbrev":"MO","capital":"Missouri","lat":38.577515,"lon":-92.177839,"Miles":43079},
    {"abbrev":"MT","capital":"Montana","lat":46.589760,"lon":-112.021202,"Miles":28190},
    {"abbrev":"NE","capital":"Nebraska","lat":40.813620,"lon":-96.707739,"Miles":258379},
    {"abbrev":"NV","capital":"Nevada","lat":39.164885,"lon":-119.766999,"Miles":55274},
    {"abbrev":"NH","capital":"New Hampshire","lat":43.207250,"lon":-71.536604,"Miles":42695},
    {"abbrev":"NJ","capital":"New Jersey","lat":40.217875,"lon":-74.759404,"Miles":84913},
    {"abbrev":"NM","capital":"New Mexico","lat":35.691543,"lon":-105.937406,"Miles":67947},
    {"abbrev":"NY","capital":"New York","lat":42.651445,"lon":-73.755254,"Miles":97856},
    {"abbrev":"NC","capital":"North Carolina","lat":35.785510,"lon":-78.642669,"Miles":403892},
    {"abbrev":"ND","capital":"North Dakota","lat":46.805372,"lon":-100.779334,"Miles":61272},
    {"abbrev":"OH","capital":"Ohio","lat":39.961960,"lon":-83.002984,"Miles":787033},
    {"abbrev":"OK","capital":"Oklahoma","lat":35.472015,"lon":-97.520354,"Miles":579999},
    {"abbrev":"OR","capital":"Oregon","lat":44.933260,"lon":-123.043814,"Miles":154637},
    {"abbrev":"PA","capital":"Pennsylvania","lat":40.259865,"lon":-76.882230,"Miles":49528},
    {"abbrev":"RI","capital":"Rhode Island","lat":41.823875,"lon":-71.411994,"Miles":178042},
    {"abbrev":"SC","capital":"South Carolina","lat":33.998550,"lon":-81.045249,"Miles":129272},
    {"abbrev":"SD","capital":"South Dakota","lat":44.368924,"lon":-100.350158,"Miles":13646},
    {"abbrev":"TN","capital":"Tennessee","lat":36.167783,"lon":-86.778365,"Miles":601222},
    {"abbrev":"TX","capital":"Texas","lat":30.267605,"lon":-97.742984,"Miles":790390},
    {"abbrev":"UT","capital":"Utah","lat":40.759505,"lon":-111.888229,"Miles":186440},
    {"abbrev":"VT","capital":"Vermont","lat":44.260299,"lon":-72.576264,"Miles":7855},
    {"abbrev":"VA","capital":"Virginia","lat":37.540700,"lon":-77.433654,"Miles":204214},
    {"abbrev":"WA","capital":"Washington","lat":47.039231,"lon":-122.891366,"Miles":46478},
    {"abbrev":"WV","capital":"West Virginia","lat":38.350195,"lon":-81.638989,"Miles":51400},
    {"abbrev":"WI","capital":"Wisconsin","lat":43.072950,"lon":-89.386694,"Miles":233209},
    {"abbrev":"WY","capital":"Wyoming","lat":41.134815,"lon":-104.821544,"Miles":59466}
];
        var arrmapsize = dsds.length;
        for (var q = 0; q < arrmapsize; q++) {
            dsds[q]['truck'] = dataarr[0][dsds[q]['capital']].replace(/,/g,'<sub>mi</sub><br>');
            dsds[q]['Mile'] = miletotal[0][dsds[q]['capital']]+"<sub>mi</sub>";
        }
        
  dsds.forEach(function (p) {
    p.z = p.Miles;
    data.push(p);
  });
	
  chart = Highcharts.mapChart('mapdiv', {
    title: {
      text: ' '
    },
    chart : {
                backgroundColor: daytheme,
    },
    
    tooltip: {
	
      pointFormat: '{point.capital}, {point.parentState}<br>' +
        'Miles: {point.Mile}<br>'+
		'Trucks, <br>{point.truck}'
    },

    xAxis: {
      crosshair: {
        zIndex: 5,
        dashStyle: 'dot',
        snap: false,
        color: 'gray'
      }
    },

    yAxis: {
      crosshair: {
        zIndex: 5,
        dashStyle: 'dot',
        snap: false,
        color: 'gray'
      }
    },

    series: [{
      name: 'Basemap',
      mapData: map,
      borderColor: '#000000',
      nullColor: 'rgba(200, 200, 200, 0.2)',
      showInLegend: false
    }, {
      name: 'Separators',
      type: 'mapline',
      data: H.geojson(map, 'mapline'),
      color: '#101010',
      enableMouseTracking: false,
      showInLegend: false
    }, {
      type: 'mapbubble',
      dataLabels: {
        enabled: true,
        format: '{point.capital}'
      },
      name: 'States',
      data: data,
      maxSize: '12%',
      color: H.getOptions().colors[0]
    }]
  });
});

// Display custom label with lat/lon next to crosshairs
document.getElementById('mapdiv').addEventListener('mousemove', function (e) {
  var position;
  if (chart) {
    if (!chart.lab) {
      chart.lab = chart.renderer.text('', 0, 0)
        .attr({
          zIndex: 5
        })
        .css({
          color: '#505050'
        })
        .add();
    }

    e = chart.pointer.normalize(e);
    position = chart.fromPointToLatLon({
      x: chart.xAxis[0].toValue(e.chartX),
      y: chart.yAxis[0].toValue(e.chartY)
    });

    chart.lab.attr({
      x: e.chartX + 5,
      y: e.chartY - 22,
      text: ''
    });
  }
});

document.getElementById('mapdiv').addEventListener('mouseout', function () {
  if (chart && chart.lab) {
    chart.lab.destroy();
    chart.lab = null;
  }
});

    //-------------------Truck Map End---------------------

    //-----------------Truck Miles Start-------------------
    var options = {
        chart: {
            width: 400,
            type: 'donut',
        },
        labels: ['Current Month Miles', 'Previous Month Miles'],
        series: [Number(parseFloat(truckcurrmiles.toFixed(2))), Number(parseFloat(truckprevmiles.toFixed(2)))],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'bottom',
            horizontalAlign: 'left'
        },
        stroke: {
            width: 0,
        },
        colors: ['#6CC2AD', '#0047b1'],
    }
    var chart = new ApexCharts(
        document.querySelector("#truck_donut"),
        options
    );
    chart.render();
    //--------------------Truck Miles End-----------------

    //-------------------Truck Average Start--------------
    var options = {
        chart: {
            width: 400,
            type: 'donut',
        },
        labels: ['Current Month Average', 'Previous Month Average'],
        series: [Number(truckcurravg.toFixed(2)), Number(truckprevavg.toFixed(2))],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'bottom',
            horizontalAlign: 'left'
        },
        stroke: {
            width: 0,
        },
        colors: ['#6C83D1', '#A4BAFF'],
    }
    var chart = new ApexCharts(
        document.querySelector("#truck_Average"),
        options
    );
    chart.render();
    //-------------------Truck Average End-------------------------
    var allpretotal = Number(alldriverprevamounttotal.toFixed(2));
    //-------------------Truck Earning Star------------------------
    var options = {
        chart: {
            width: 400,
            type: 'donut',
        },
        labels: ['Current Month Earning', 'Previous Month Earning'],
        series: [alldrivercurramounttotal, allpretotal],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'bottom',
            horizontalAlign: 'left'
        },
        stroke: {
            width: 0,
        },
        colors: ['#6C83D1', '#44A7AB'],
    }
    var chart = new ApexCharts(
        document.querySelector("#truck_Earning"),
        options
    );
    chart.render();
    //--------------------Truck Earning End-------------------------

}


//-----------------function for estimated driver pay start----------
var all_driver = '';

function estimated_driverpay_statement(weekfirts, weeklast) {

    var driver_name_report = 'All';
    var filterby = 'deliver_date';
    var daterangefrom = weekfirts;
    var daterangeto = weeklast;

    $.ajax({
        type: "GET",
        url: base_path+"/dashboard-driverpayStatement",
        async: false,
        data:{driver_name_report:driver_name_report,filterby:filterby,daterangefrom:daterangefrom,daterangeto:daterangeto},
        success: function (data) {
            var estarr = JSON.parse(data);

            var estcountarr = Object.keys(estarr).length;

            if (estcountarr >= 1) {
                var lastindex = estcountarr - 1;
                var alldrivertab = estarr[lastindex].alldrivertable.length;

                var driverloadtotal = 0;
                var driveradvancetotal = 0;
                var final_drtotal = 0;
                var recurrsub = 0;
                var recurradd = 0;
                var oorecurrsub = 0;
                var totalnetdrp = 0;
                for (var b = 0; b < alldrivertab; b++) {
                    driverloadtotal += estarr[lastindex].alldrivertable[b].driverload;
                    driveradvancetotal += estarr[lastindex].alldrivertable[b].driveradvance;
                    final_drtotal += parseFloat(estarr[lastindex].alldrivertable[b].totalearning);
                    var shrecurrsub = 0;
                    var ooshrecurrsub = 0;
                    var shrecurradd = 0;

                    for (var ew = 0; ew < estarr[lastindex].alldrivertable[b].recurrencesub.length; ew++) {
                        if (estarr[lastindex].alldrivertable[b].recurrencesub[ew].length > 0) {
                            recurrsub += parseFloat(estarr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                            shrecurrsub += parseFloat(estarr[lastindex].alldrivertable[b].recurrencesub[ew][0].amount);
                        }
                    }

                    for (var oew = 0; oew < estarr[lastindex].alldrivertable[b].ownerrecurr.length; oew++) {
                        if (estarr[lastindex].alldrivertable[b].ownerrecurr[oew].length > 0) {
                            oorecurrsub += parseFloat(estarr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                            ooshrecurrsub += parseFloat(estarr[lastindex].alldrivertable[b].ownerrecurr[oew][0].amount);
                        }
                    }

                    for (var yw = 0; yw < estarr[lastindex].alldrivertable[b].recurrenceadd.length; yw++) {
                        if (estarr[lastindex].alldrivertable[b].recurrenceadd[yw].length > 0) {
                            recurradd += parseFloat(estarr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                            shrecurradd += parseFloat(estarr[lastindex].alldrivertable[b].recurrenceadd[yw][0].amount);
                        }
                    }
                    var recurrdata = (shrecurradd) - (shrecurrsub) - (ooshrecurrsub);
                    var calfinalrecurrdata = Math.sign(recurrdata) == -1 ? estarr[lastindex].alldrivertable[b].totalearning - Math.abs(recurrdata) : parseFloat(estarr[lastindex].alldrivertable[b].totalearning + recurrdata);

                    var nerdrvpaybal = estarr[lastindex].alldrivertable[b].driverBalance;
                    totalnetdrp += (nerdrvpaybal) + (calfinalrecurrdata);
                }
                // console.log(typeof (parseInt(totalnetdrp)));
                var totalrecurramount = (recurradd) - (recurrsub) - (oorecurrsub);
                var finalestdrv = Math.sign(totalrecurramount) == -1 ? parseFloat(final_drtotal - Math.abs(totalrecurramount)) : parseFloat(final_drtotal + totalrecurramount);
                var findatadrv = Math.sign(parseFloat(totalnetdrp)) == -1 ? "(" + Math.abs(abbreviateNumber(parseFloat(parseInt(totalnetdrp).toFixed(2)))) + ")" : abbreviateNumber(parseFloat(parseInt(totalnetdrp).toFixed(2)));

                $("#toolestdrvpay").html("$" + numberWithCommas(Math.sign(parseFloat(totalnetdrp)) == -1 ? "(" + Math.abs(parseInt(totalnetdrp).toFixed(2)) + ")" : parseFloat(parseInt(totalnetdrp).toFixed(2))));
                $("#estdrvpay").html("$" + findatadrv);
                

            }

            if (estcountarr < 1) {
                $("#toolestdrvpay").html("$0.00");
                $("#estdrvpay").html("$0.00");
            }

            $("#estdp").html("Estimated Driver Pay");
            // $("#driveredp").css("display", "none");
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        // Request failed. Show error message to user. 
        // errorThrown has error message.
        //console.log(jqXHR, textStatus, errorThrown);
        swal.fire("Something want wrong");
    });
}
//-----------------function for estimated driver pay End----------


function dashGraphBarLine(curloads, preloads, curramount, prevamount) {

    


//-------------------Bar Graph Start------------------
    const chart = new Highcharts.Chart({
    chart: {
        renderTo: 'bar-chart',
        backgroundColor: daytheme,
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 0,
            beta: 0,
            depth: 100,
            viewDistance: 25
        }
    },
    title: {
        text: ''
    },
    
    plotOptions: {
        column: {
            depth: 25
        }
    },
    tooltip : {
        valueSuffix: ' Loads',
    },
    series: [{
        name: 'Current Month ', data: curloads
    },{
        name: 'Previous Month', data: preloads
    }],
    xAxis: {
            title: {
                text: 'Number Of Days'
            },
            categories: [1,2,3],
            tickInterval: 1,
        },
    yAxis: {
            title: {
                text: 'Number Of Loads'
            },
            tickInterval: 1
        },
        colors: ['#5C1AC3', '#FFBB44']
});

function showValues() {
    // document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
    // document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
    // document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
}

// Activate the sliders
// document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
//     chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
//     showValues();
//     chart.redraw(false);
// }));

// showValues();
//------------------------Bar Graph END------------------------




//----------------------Line Graph Start------------------------
    // Highcharts.chart('line-chart', {
    // chart: {
    //     type: 'spline',
    //     backgroundColor: daytheme,
    // },
    // title: {
    //     text: ''
    // },
    
    // xAxis: {
    //     title: {
    //             text: 'Number Of Days'
    //         },
    //         categories: [1,2,3],
    //         tickInterval: 1
    // },
    // yAxis: {
    //     title: {
    //         text: 'Load Pay'
    //     },
    // },
    // tooltip: {
    //     valueDecimals:2,
    //     valuePrefix: '$',
    //     crosshairs: true,
    //     shared: true
    // },
    // plotOptions: {
    //     spline: {
    //         marker: {
    //             radius: 4,
    //             lineColor: '#666666',
    //             lineWidth: 1
    //         }
    //     }
    // },
    // series: [{
    //     name: 'Current Month',
    //         data: curramount
    // },{
    //         name: 'Previous Month',
    //         data: prevamount
    //     }],
    //     colors: ['#00B5FD', '#C0D64A'],
// });
        
//----------------------Line Graph End-----------------------------------------
$(".highcharts-credits").empty();

}


//---------------------------Pandding Table Start----------------------------------
function panddingAmount() {
            
            var panddingarsize = pandingAmounArr.length;
            var panddingTable = '';
            var pdt = 1;
            var totalPanddingAmount = 0;
            for (var fd = 0; fd < panddingarsize; fd++) {

                panddingTable += `<tr>
                    <td class = "first-row">${pdt}</td>
                    <td>${pandingAmounArr[fd].InvoiceNo}</td>
                    <td>${pandingAmounArr[fd].customer}</td>
                    <td>${convertTimeZone(pandingAmounArr[fd].invoicetime,'date')}</td>
                    <td>$${numberWithCommas(parseFloat(pandingAmounArr[fd].rate).toFixed(2))}</td>
                    <td>${pandingAmounArr[fd].note}</td>
                </tr>`;
                totalPanddingAmount += parseFloat(pandingAmounArr[fd].rate);

                pdt++;

            }

            $('#penddingAmountdata').html(panddingTable);
            $('#penddingAmountTotal').html('$' + numberWithCommas(parseFloat(totalPanddingAmount).toFixed(2)));
}
//---------------------------Pandding Table End----------------------------------


//----------------------function for date wise dashboard data---------------------

function dateWiseDashData(dashvaluedatewise) {
    prepairDashBoardData(dashvaluedatewise);
}