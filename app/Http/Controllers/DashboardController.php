<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Company;
use Hash;
use MongoDB\BSON\ObjectId;
use App\Models\User;
use App\Models\Office;
use App\Models\Truckadd;
use App\Models\Truck_type;
use App\Models\TrailerAdminAdd;
use App\Models\Equipment_add;
use App\Models\FuelReceipt;
use App\Models\PaymentBank;
use  App\Models\CreditCard;
use App\Models\FuelCard;
use App\Models\Driver;
use DB;
class DashboardController extends Controller
{
    
   public function index()
   {
      $data=Company::all();
      return view('dashboard');
   }
   public function customerdata() 
   {
      //companyId
      $companyID = (int)Auth::user()->companyID;;
      $datewisefilter = "deliver_date";
      //-----------------------Get All Company Name Start-----------------------------------    
      $collectioncom =Company::raw();
      $companydata =$collectioncom->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$project' => ['company._id' => 1,'company.companyName'=> 1]]
      ]);
// dd($companydata);
      $company_Name = array();
      foreach ($companydata as $comdata) 
      {
          $com_arr = $comdata['company'];
         //  dd( $com_arr);
          foreach ($com_arr as $companyd) {
              $com_id = $companyd['_id'];
              $company_Name[$com_id] = $companyd['companyName'];
          }
      }
      // dd( $company_Name);
      //-----------------------Get All Company Name End-----------------------------------


      //-----------------------Get All Dispatcher Name Start------------------------------
      $collectionuser = User::raw();
      $dispatcherdata =$collectionuser->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$project' => ['_id' => 1,'userFirstName'=>1,'userLastName'=>1]]
      ]);
      $dispname = array();
      foreach ($dispatcherdata as $dispdata) {
          $disid = $dispdata['_id'];
          $dispname[$disid] = $dispdata['userFirstName']." ".$dispdata['userLastName'];
      }
      // dd($dispname);
   //-----------------------Get All Dispatcher Name End--------------------------------


   //-----------------------Get All Equipment Start------------------------------------ 
      $collectionequ = Equipment_add::raw();
      $equipmentdata = $collectionequ->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$project' => ['equipment._id' => 1,'equipment.equipmentType'=>1]]
      ]);

      $eqname = array();
      foreach ($equipmentdata as $eqdata) {
          $eqp_arr = $eqdata['equipment'];
          foreach ($eqp_arr as $eq) {
              $eq_id = $eq['_id'];
              $eqname[$eq_id] = $eq['equipmentType'];
          }
      }
      // dd($eqname);
   //-----------------------Get All Equipment End------------------------------------ 


   //-----------------------Date Calculaton Start------------------------------------
      $fdprevmonth = date("d-m-Y", strtotime("first day of previous month"));
      $ldprevmonth = date("d-m-Y", strtotime("last day of previous month"));
      $fdcurrmonth = date("01-m-Y");
      $ldcurrmonth = date("t-m-Y");
      $firstcurr = strtotime($fdcurrmonth);
      $lastcurr = strtotime($ldcurrmonth);
      $firstprev = strtotime($fdprevmonth);
      $lastprev = strtotime($ldprevmonth." 23:59:59");

      $curryear = date("Y");
      $currmonth = date("F");
   //-----------------------Date Calculaton End------------------------------------


   //-------------Query For Current Month Fuel Quantity Total Start----------------
      // $fueltotalqunt = $db->ifta_fuel_receipts;
      $fuelredata = FuelReceipt::raw()->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$unwind' => '$fuel_receipt'],
          ['$match' => ['fuel_receipt.transactionDate' => ['$gte' => $firstcurr,'$lte' => $lastcurr]]],
          ['$group' => ['_id' => null,'fueltotal' => ['$sum' => ['$toDouble' => '$fuel_receipt.quantity']]]]
      ],['allowDiskUse' => true]);
      $fueltotaldata = 0;
      foreach ($fuelredata as $frt) {
          $fueltotaldata = $frt['fueltotal'];
      }
      // dd($fueltotaldata);
   //-------------Query For Current Month Fuel Quantity Total End------------------


   //-------------Query For Previous Month Fuel Quantity Total Start---------------
      $fueltotalprev = FuelReceipt::raw();
      $fuelredataprev = $fueltotalprev->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$unwind' => '$fuel_receipt'],
          ['$match' => ['fuel_receipt.transactionDate' => ['$gte' => $firstprev,'$lte' => $lastprev]]],
          ['$group' => ['_id' => null,'fueltotal' => ['$sum' => ['$toDouble' => '$fuel_receipt.quantity']]]]
      ],['allowDiskUse' => true]);
      $fueltotaldataprev = 0;
      foreach ($fuelredataprev as $frtprev) {
          $fueltotaldataprev = $frtprev['fueltotal'];
      }
      // dd($fueltotaldataprev);
      //-------------Query For Previous Month Fuel Quantity Total End---------------


      $showbank_extotal =PaymentBank::raw()->aggregate([
          ['$match' => ['companyID' => $companyID,'year' => "$curryear"]],
          ['$group' => ['_id' => null,$currmonth => ['$push' => '$'.$currmonth]]],
          ['$project' => ['_id' => 0,$currmonth => ['$reduce' => ['input' => '$'.$currmonth,'initialValue' => [],'in' => ['$concatArrays' =>['$$this','$$value']]]]]],
          ['$unwind' => '$'.$currmonth],
          ['$match' => [$currmonth.'.paymenttype'=> 'Debit',$currmonth.'.transactionDate' => ['$ne' => '0'],
          $currmonth.'.payto' => ['$nin' => ["bankTocreditcard","bankTofuelcard","creditcardTofuelcard"]]]],
          ['$group' => ['_id' => '$'.$currmonth.'.debitcategory','totalexpence' => ['$sum' => ['$toDouble' => '$'.$currmonth.'.amount']]]]
      ],['allowDiskUse' => true]);

      $showcredit_extotal = CreditCard::raw()->aggregate([
          ['$match' => ['companyID' => $companyID,'year' => "$curryear"]],
          ['$group' => ['_id' => null,$currmonth => ['$push' => '$'.$currmonth]]],
          ['$project' => ['_id' => 0,$currmonth => ['$reduce' => ['input' => '$'.$currmonth,'initialValue' => [],'in' => ['$concatArrays' =>['$$this','$$value']]]]]],
          ['$unwind' => '$'.$currmonth],
          ['$match' => [$currmonth.'.paymenttype'=> 'Debit']],
          ['$group' => ['_id' => '$'.$currmonth.'.debitcategory','totalexpence' => ['$sum' => ['$toDouble' => '$'.$currmonth.'.amount']]]]
      ],['allowDiskUse' => true]);

      $showfuel_extotal = FuelCard::raw()->aggregate([
          ['$match' => ['companyID' => $companyID,'year' => "$curryear"]],
          ['$group' => ['_id' => null,$currmonth => ['$push' => '$'.$currmonth]]],
          ['$project' => ['_id' => 0,$currmonth => ['$reduce' => ['input' => '$'.$currmonth,'initialValue' => [],'in' => ['$concatArrays' =>['$$this','$$value']]]]]],
          ['$unwind' => '$'.$currmonth],
          ['$match' => [$currmonth.'.paymenttype' => 'Debit']],
          ['$group' => ['_id' => '$'.$currmonth.'.debitcategory','totalexpence' => ['$sum' => ['$toDouble' => '$'.$currmonth.'.amount']]]]
      ],['allowDiskUse' => true]);

      $bankex = 0;
      $creditex = 0;
      $fuelex = 0;
      $totalexpence = 0;

      foreach ($showbank_extotal as $tbank) {
          $bankex += $tbank['totalexpence'];
      }
      foreach ($showcredit_extotal as $tcredit) {
          $creditex += $tcredit['totalexpence'];
      }
      foreach ($showfuel_extotal as $tfuel) {
          $fuelex += $tfuel['totalexpence'];
      }
      // dd($fuelex);
      $totalexpence =  $bankex + $creditex + $fuelex;
      // dd($totalexpence);
      //process driver data
      $collection = Driver::raw();
      $driverdata = $collection->aggregate([
          ['$match' => ['companyID' => $companyID]],
          ['$project' => ['driver._id' => 1,'driver.driverName'=>1,'driver.ownerID'=>1,'driver.ownerOperatorStatus'=>1]]
      ]);

      $drname = array();
      foreach ($driverdata as $drdata) {
          $dr_arr = $drdata['driver'];
          foreach ($dr_arr as $drd) {
              $drid = $drd['_id'];
              // $index = $drd['ownerOperatorStatus'] == "YES" ? ($drd['ownerID'] * 10) + 1 : $drd['_id'] * 10 ;
              $drname[$drd['_id']] = $drd;
          }
      }
      // dd($drname);

      //------------estimated driver pay date calculate by week start------------------------------

      $collection = Company::raw();
      $company_status = $collection->aggregate([
          ['$match' => ['companyID' =>  $companyID]],
          ['$unwind' => '$company'],
          ['$match' => ['company.status' => "Yes"]],
          ['$project' => ['company.paytype' => 1,'company.paydate' => 1]]
      ],['allowDiskUse' => true]);    
      $pay_typedr = '';
      $pay_datedr = '';
      foreach ($company_status as $com) {
        $r = 0;
        $companyarr[$r] = $com['company'];
        $r++;
        foreach ($companyarr as $comdata) {
          if (array_key_exists('paytype',$comdata)) {
              $pay_typedr = $comdata['paytype'];
              $pay_datedr = $comdata['paydate'];
          }  
        }
      }

      $paytype = $pay_typedr;
      $paydate = $pay_datedr;

      if ($paytype == "Weekly") {
          $paydate = strtotime("last ".$paydate);
          $paydate = date('W', $paydate)==date('W') ? $paydate-7*86400 : $paydate;
          $lastweekday = strtotime(date("Y-m-d",$paydate)." +6 days");
          $week_sd = date("Y-m-d",$paydate);
          $week_ed = date("Y-m-d",$lastweekday);

          $week_first = date("m/d/Y",strtotime($week_sd." -7 days"));
          $week_last = date("m/d/Y",strtotime($week_ed." -7 days"));
      }else {
          $pd = date("d",$paydate); 
          $week_first = date("m/".$pd."/Y");
          $lastdateofmon = date("t");
          
          $week_first = date("m/d/Y",$paydate);
          $week_last = date("m/d/Y",strtotime($week_first."$lastdateofmon days"));
      }

      //------------estimated driver pay date calculate by week end--------------------------------    

      //get filter by name 
      if ($datewisefilter == "deliver_date") { 
          $dashmatchdate = 'consignee_pickup';
      } else if ($datewisefilter == "ship_date") {
          $dashmatchdate = 'shipper_pickup';
      } else if ($datewisefilter == "invoice_date") {
          $dashmatchdate = 'status_Invoiced_time';
      } else if ($datewisefilter == "creation_date") {
          $dashmatchdate = 'created_at';
      }

      //Active load status array
      $status = array("Open","Dispatched","Arrived Shipper","Loaded","On Route","Arrived Consignee","Break Down","Paid","Invoiced","Delivered","Completed");
      
      $arr_loasdata = array();
      $loadarr = array();
      for ($v = 0;  $v < sizeof($status); $v++) {
         // dd(DB::table($status[$v]));
      $collection = DB::table($status[$v]);
         // dd($collection);
         // dd(Company::raw());
         // $collection=Company::raw();
      //Query For All Dashboard Data (Current && Previous Month)
      $show = $collection->raw()->aggregate([
                      ['$match' => ['companyID' => $companyID]],
                      ['$project' => [
                      'load' => [
                          '$filter' => [
                              'input' => '$load',
                              'as' => 'load',
                              'cond' => [
                                  '$and' => [
                                          ['$gte' => ['$$load.'.$dashmatchdate,(int)$firstprev]],
                                          ['$lte' => ['$$load.'.$dashmatchdate,(int)$lastcurr]]
                                      ]
                                  ]
                              ]
                          ]
                      ]],
                      ['$group' => ['_id' => null, 'load' => ['$push' => '$load']]],
                      ['$project' => [
                          '_id' => 0,'load' => [
                              '$reduce' => [
                                  'input' => '$load','initialValue' => [],'in' => [
                                      '$concatArrays' =>[
                                          '$$this','$$value'
                                      ]
                                  ]
                              ]
                          ]
                      ]],
                      ['$project' => [
                          'load._id' => 1,'load.loaddata' => 1,'load.total_rate' => 1,
                          'load.status' => 1,'load.typeofloader' => 1,'load.dispatcher' => 1,
                          'load.created_at' => 1,'load.shipper_pickup' => 1,'load.customer'=>1,
                          'load.driver_name'=>1,'load.owner_name'=>1,'load.driver_miles_value' => 1,
                          'load.company' => 1,'load.carrier_name' => 1,'load.equipment_type' => 1,
                          'load.carrier_parent' => 1,'load.customer_parent' => 1,'load.consignee_pickup' =>1,
                          'load.status_Invoiced_time' => 1,'load.created_at' => 1
                      ]],
                      ['$unwind' => '$load']
          ]);

          foreach ($show as $anly) {
              $f = 0;
              $loaddataarr[$f] = $anly['load'];
              $f++;
              foreach ($loaddataarr as $loadval) {
                  if (sizeof($loadval) > 0) {
                      $loadarr[] = $loadval;
                  }
              }
              
          }
      }
      // dd($show);
      // dd($loadarr);
      //Dashboard Data Array
      $arr_loasdata[] = array("loads" => $loadarr, "firstcurr" => $firstcurr, "lastcurr" => $lastcurr, "firstprev" => $firstprev, "lastprev" => $lastprev,"totalexpence" => $totalexpence,"allcompany" => $company_Name,"alldispatcher" => $dispname,"allequipment" => $eqname,'fueltotal' => $fueltotaldata,'fuelprevtotal' => $fueltotaldataprev,"alldriverarr" => $drname,"estdrvpayfirstdate" => $week_first,"estdrvpaylastdate" => $week_last,"filterType" => $dashmatchdate);
      //return json object
      // return $arr_loasdata;
      // dd($arr_loasdata);
      // return response()->json(['arr_loasdata'=>$arr_loasdata], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
      echo json_encode($arr_loasdata);

}
}