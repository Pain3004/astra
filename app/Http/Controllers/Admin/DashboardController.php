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
use App\Models\Invoiced;
use App\Models\Open;
use App\Models\Dispatched;
use App\Models\ArrivedShipper;
use App\Models\Loaded;
use App\Models\OnRoute;
use App\Models\ArrivedConsignee;
use App\Models\Delivered;
use App\Models\BreakDown;
use App\Models\Paid;
use DB;
class DashboardController extends Controller
{
    
   public function index(Request $request)
   {
      $data=Company::all();
      return view('dashboard');
   }
   public function customerdata(Request $request) 
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
            foreach ($com_arr as $companyd) 
            {
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
        foreach ($dispatcherdata as $dispdata) 
        {
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
        foreach ($equipmentdata as $eqdata) 
        {
            $eqp_arr = $eqdata['equipment'];
            foreach ($eqp_arr as $eq) 
            {
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
        foreach ($fuelredata as $frt) 
        {
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
        foreach ($fuelredataprev as $frtprev) 
        {
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

        foreach ($showbank_extotal as $tbank) 
        {
            $bankex += $tbank['totalexpence'];
        }
        foreach ($showcredit_extotal as $tcredit) 
        {
            $creditex += $tcredit['totalexpence'];
        }
        foreach ($showfuel_extotal as $tfuel) 
        {
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
        foreach ($driverdata as $drdata) 
        {
            $dr_arr = $drdata['driver'];
            foreach ($dr_arr as $drd) 
            {
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
        foreach ($company_status as $com) 
        {
            $r = 0;
            $companyarr[$r] = $com['company'];
            $r++;
            foreach ($companyarr as $comdata) 
            {
                if (array_key_exists('paytype',$comdata)) 
                {
                    $pay_typedr = $comdata['paytype'];
                    $pay_datedr = $comdata['paydate'];
                }  
            }
        }

        $paytype = $pay_typedr;
        $paydate = $pay_datedr;

        if ($paytype == "Weekly") 
        {
            $paydate = strtotime("last ".$paydate);
            $paydate = date('W', $paydate)==date('W') ? $paydate-7*86400 : $paydate;
            $lastweekday = strtotime(date("Y-m-d",$paydate)." +6 days");
            $week_sd = date("Y-m-d",$paydate);
            $week_ed = date("Y-m-d",$lastweekday);

            $week_first = date("m/d/Y",strtotime($week_sd." -7 days"));
            $week_last = date("m/d/Y",strtotime($week_ed." -7 days"));
        }
        else 
        {
            $pd = date("d",$paydate); 
            $week_first = date("m/".$pd."/Y");
            $lastdateofmon = date("t");
            
            $week_first = date("m/d/Y",$paydate);
            $week_last = date("m/d/Y",strtotime($week_first."$lastdateofmon days"));
        }

        //------------estimated driver pay date calculate by week end--------------------------------    

        //get filter by name 
        if ($datewisefilter == "deliver_date") 
        { 
            $dashmatchdate = 'consignee_pickup';
        } 
        else if ($datewisefilter == "ship_date") 
        {
            $dashmatchdate = 'shipper_pickup';
        } 
        else if ($datewisefilter == "invoice_date") 
        {
            $dashmatchdate = 'status_Invoiced_time';
        } 
        else if ($datewisefilter == "creation_date") 
        {
            $dashmatchdate = 'created_at';
        }

        //Active load status array
        $status = array("Open","Dispatched","Arrived Shipper","Loaded","On Route","Arrived Consignee","Break Down","Paid","Invoiced","Delivered","Completed");
      
        $arr_loasdata = array();
        $loadarr = array();
        for ($v = 0;  $v < sizeof($status); $v++) 
        {
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

            foreach ($show as $anly) 
            {
              $f = 0;
              $loaddataarr[$f] = $anly['load'];
              $f++;
                foreach ($loaddataarr as $loadval) 
                {
                    if (sizeof($loadval) > 0) 
                    {
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
    public function dashpayable(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $status = array("Invoiced");
        $now = time();
        $carrier_total = 0;
        // for ($x = 0;  $x < sizeof($status); $x++) 
        // {
        //     $collection = $status[$x];
        $payable = Invoiced::raw()->aggregate([
            ['$match'=>['companyID'=>$companyID]],
            ['$unwind'=>'$load'],
            ['$match' => ['load.typeofloader'=>"Carrier",'load.status' => "Invoiced"]]
        ]);
    
        foreach ($payable as $pl) 
        {
            $l = 0;
            $load_data[$l] = $pl['load'];
            $l++;
            foreach ($load_data as $ld) 
            {
                //Diff Between Two Date
                if (array_key_exists("paiddate", $ld)) 
                {
                    if (empty($ld['paiddate'])) 
                    {
                        if (array_key_exists("invoice_received_date",$ld)) {
                            if (!empty($ld['invoice_received_date'])) 
                            {
                                $invoice_received_date = $ld['invoice_received_date'];
                            
                                $date_diff = $now - $invoice_received_date;
                                $total_days = round($date_diff / (60 * 60 * 24));

                                if ($total_days == 30) 
                                {
                                    $carrier_total += $ld['carrier_total'];
                                }
                            }    
                        }
                    }    
                }
                else
                {
                    if (array_key_exists("invoice_received_date", $ld)) 
                    {
                        if (!empty($ld['invoice_received_date'])) 
                        {    
                            $invoice_received_date = $ld['invoice_received_date'];
                            $date_diff = $now - $invoice_received_date;
                            $total_days = round($date_diff / (60 * 60 * 24));
                            if ($total_days == 30) 
                            {
                                $carrier_total += $ld['carrier_total'];
                            }

                        }
                    }
                }        
            }
        }
        // }
    
        $dashamounttotal = array();
        $total_rate = 0;
            // for ($x = 0;  $x < sizeof($status); $x++) {
            //     $collection = $status[$x];
        $status_load = Invoiced::raw()->aggregate([
                        ['$match'=>['companyID'=>$companyID]]
                    ]);
    
        foreach ($status_load as $ag) 
        {
            $load = $ag['load'];
            foreach ($load as $agd) 
            {
                if(array_key_exists("receivedate", $agd))
                {
                    if (empty($agd['receivedate'])) 
                    { 
                        $status_Invoiced_time = $agd['status_Invoiced_time'];
                        $datediff = $now - $status_Invoiced_time;
                        $totaldays = round($datediff / (60 * 60 * 24));
                        if ($totaldays == 30) 
                        {
                            $total_rate += $agd['total_rate'];
                        }
                    }    
                }
                else 
                {
                    //Diff Between Two Date and claculate total rate 
                    $status_Invoiced_time = $agd['status_Invoiced_time'];
                    $datediff = $now - $status_Invoiced_time;
                    $totaldays = round($datediff / (60 * 60 * 24));

                    if ($totaldays == 30) 
                    {
                        $total_rate += $agd['total_rate'];
                    }
                }      
            }
        }
            // }  
    
        $dashamounttotal[] = array("payable" => $carrier_total,"receivable" => $total_rate);
        echo json_encode($dashamounttotal);
    }
    public function driverpayStatement(Request $request)
    {
        //-----------------------------------Get Filter Value------------------------------------------
        $driver_name_report = $request->driver_name_report;
        $filterby = $request->filterby;
        $daterangefrom = strtotime($request->daterangefrom." 00:00:00");
        $daterangeto = strtotime($request->daterangeto." 23:59:59");
        $print_date_load = date('m/d/Y',$daterangefrom)." TO ".date('m/d/Y',$daterangeto);
        $compID = (int)Auth::user()->companyID;

        //---------------------------------Admin Truck Data-------------------------------------------
        $truckType = array();
        $truck = Truckadd::raw()->find(['companyID' =>$compID]);
        foreach ($truck as $truckArr) 
        {
            $load_truck = $truckArr['truck'];
            $truckType = array();
            foreach ($load_truck as $sf) 
            {
                $truckid = $sf['_id'];
                // $truckType[$truckid] = $sf['truckNumber'];
            }
        }
        //---------------------------------Admin Trailer Data-----------------------------------------
        $trailerType = array();
        $trailer = TrailerAdminAdd::raw()->find(['companyID' => $compID]);
        foreach ($trailer as $trailerArr) 
        {
            $load_trailer = $trailerArr['trailer'];
            $trailerType = array();
            foreach ($load_trailer as $sf) 
            {
                $trailerid = $sf['_id'];
                // $trailerType[$trailerid] = $sf['trailerNumber'];
            }
        }
        //---------------------------------Condition For All/Individual Driver--------------------------
        if ($driver_name_report == "All" || $driver_name_report == "all") 
        {
            $driver_idstatus_match = ['$match'=>['driver'.'.driverStatus'=> "Active"]];
        } 
        else 
        {
            $driver_idstatus_match = ['$match'=>['driver'.'._id'=> (int)$driver_name_report]];
        }

        //--------------------------------------------Driver Data-----------------------------------------
        $collection = Driver::raw();
        $drivername = $collection->aggregate([
                    ['$match'=>['companyID'=> $compID]],
                    ['$unwind'=>'$'.'driver'],
                    $driver_idstatus_match
                    ]);
        $driver = array();
        $driverpayobj = array();
        $driver_allrecurrobj = array();
        $driverlist = array();
        
        $totalamountsub = 0; 
        $totalamountadd = 0;
        $isownoptr_oo = "";
        $driver_name_show = "";
        foreach($drivername as $row1)
        {
            $z = 0; 
            $driver[$z] = $row1['driver'];
            $z++;
            $recurrenceaddList = array();
            $recurrencesubList = array();
            $owneroprecurr = array();
            foreach($driver as $row2)
            {
                $drrecurrid = (int)$row2['_id'];
                $driverEmailcr = $row2['driverEmail'];
                
                $isownoptr = $row2['ownerOperatorStatus'] == "YES"? "YES" : "NO";
                $isownoptr_oo = $row2['ownerOperatorStatus'] == "YES"? "YES" : "NO";
                $loaderstatus = $row2['ownerOperatorStatus'] == "YES"? "Owner Operator" : "Driver";
                $load_owner_name = $row2['ownerOperatorStatus'] == "YES"? "load.owner_name" : "load.driver_name";
                $load_owner_id = $row2['ownerOperatorStatus'] == "YES"? $row2['ownerID'] : $row2['_id'];
                $drivertarp = "";
                $driver_name = $row2['driverName'];
                $driver_name_show = $row2['driverName'];
                if(isset($row2['recurrenceAdd']))
                {
                    $recurrenceadd = $row2['recurrenceAdd'];
                }
                else
                {
                    $recurrenceadd="";
                }
               if(isset($row2['recurrenceSubtract']))
               {
                    $recurrencesub = $row2['recurrenceSubtract'];
               }
                else
                {
                    $recurrencesub="";
                }
                $driverBal = $row2['driverBalance'];

                if ($row2['rate'] == "mile" || $row2['rate'] == "hour") 
                {
                    $drivertarp = $row2['tarp'];
                }
                
                if ($row2['ownerOperatorStatus'] == "YES") 
                {
                    $owneroprecurr[] = $this->oodriverinstallment($isownoptr,$daterangefrom,$daterangeto,$drrecurrid);
                }
                else 
                {
                    $owneroprecurr = [[]];
                }

                foreach($recurrenceadd as $add)
                {
                    $recurr_id = $add['_id'];
                    $recurr_category = $add['installmentCategoryStore'];
                    $install_type = $add['installmentTypeStore'];
                    $install_amt = $add['amountStore'];
                    $curr_install = $add['currentoStore'];
                    $total_install = $add['installmentStore'];
                    $start_install = $add['startNoStore'];
                    $startDate = $add['startDateStore'];
                    $currentDate = $add['currentDateStore'];
                    $internalNote = $add['internalNoteStore'];
                    $totalamountadd += (int)$install_amt;
                    $skipped = array();
                    if(array_key_exists("skiprecurrence", $add))
                    {
                        $skipped = $add['skiprecurrence'];
                    }
                    $recurr_type = "add";  
                    $recurrenceaddList[] =  $this->driverinstallment($recurr_id, $recurr_category, $install_type, $install_amt, $total_install, $start_install, $startDate, $internalNote, $recurr_type, $daterangeto, $daterangefrom, $skipped);
                }  

                foreach($recurrencesub as $sub)
                {
                    $recurrence_id = $sub['_id'];
                    $recurrsubCategory = $sub['installmentCategoryStore'];
                    $installmentsubType = $sub['installmentTypeStore'];
                    $amountsub = $sub['amountStore'];
                    $installmentsub = $sub['installmentStore'];
                    $startNosub = $sub['startNoStore'];
                    $currentNo = $sub['currentNoStore'];
                    $startDatesub = $sub['startDateStore'];
                    $currentDate= $sub['currentDateStore'];
                    $internalNotesub = $sub['internalNoteStore'];
                    $totalamountsub += (int)$amountsub;
                    $skipped = array();
                    if(array_key_exists("skiprecurrence", $sub))
                    {
                        $skipped = $sub['skiprecurrence'];
                    }
                    $recurrence_addsub = "sub";

                    $recurrencesubList[] =  $this->driverinstallment($recurrence_id, $recurrsubCategory, $installmentsubType, $amountsub, $installmentsub, $startNosub, $startDatesub, $internalNotesub, $recurrence_addsub, $daterangeto, $daterangefrom, $skipped);
                    
                }

                $driverlist[] = $row2['_id'];

                $driverpayobj[$row2['_id']] = array("isownoptr" => $isownoptr, "loaderstatus" => $loaderstatus, "load_owner_name" => $load_owner_name, "load_owner_id" => $load_owner_id, "tarp" => $drivertarp, "name" => $driver_name, "recurrenceadd" => $recurrenceaddList,"recurrencesub" => $recurrencesubList,"oorecurr" => $owneroprecurr, "driverEmailcr" => $driverEmailcr,"drrecurrid" => $drrecurrid,"drrecurr_id" => $drrecurrid,"driverEmail_cr" => $driverEmailcr,"driver_balance" => $driverBal);
                $driver_allrecurrobj[] = array("allrecurrenceadd" => $recurrenceaddList,"allrecurrencesub" => $recurrencesubList);
            }
        }
        //-----------------------------------------Get Load Details----------------------------------------
        $statementobj = array();
        $alldriverobj = array();
        for($i = 0; $i < sizeof($driverlist); $i++)
        {
            $individualobj = array();
            $totalpayobj = array();
            $load_owner_name = $driverpayobj[$driverlist[$i]]['load_owner_name'];
            $load_owner_id = $driverpayobj[$driverlist[$i]]['load_owner_id'];
            $loaderstatus = $driverpayobj[$driverlist[$i]]['loaderstatus'];
            $drivername = $driverpayobj[$driverlist[$i]]['name'];
            $driver_balance = $driverpayobj[$driverlist[$i]]['driver_balance'];
            $isownoptr = $driverpayobj[$driverlist[$i]]['isownoptr'];
            $driverrecurrenceadd = $driverpayobj[$driverlist[$i]]['recurrenceadd'];
            $driverrecurrencesub = $driverpayobj[$driverlist[$i]]['recurrencesub'];
            $oorecurrencesub = $driverpayobj[$driverlist[$i]]['oorecurr'];

            $drrecurr_id = $driverpayobj[$driverlist[$i]]['drrecurr_id'];
            $driverEmail_cr = $driverpayobj[$driverlist[$i]]['driverEmail_cr'];

            if ($filterby == "deliver_date") 
            { 
                $filterbydate = ['$match'=>[$load_owner_name => "$load_owner_id",'load.typeofloader'=> $loaderstatus,
                'load.consignee_pickup'=>['$gte' => (int)$daterangefrom, '$lte' => (int)$daterangeto]]];
    
            } 
            else if ($filterby == "ship_date") 
            {
                $filterbydate = ['$match'=>[$load_owner_name => "$load_owner_id",'load.typeofloader'=> $loaderstatus,
                'load.shipper_pickup'=>['$gte' => (int)$daterangefrom, '$lte' => (int)$daterangeto]]];
    
            } 
            else if ($filterby == "invoice_date") 
            {
                $filterbydate = ['$match'=>[$load_owner_name => "$load_owner_id",'load.typeofloader'=> $loaderstatus,
                'load.status_Invoiced_time'=>['$gte' => (int)$daterangefrom, '$lte' => (int)$daterangeto]]];
            } 
            $invoicelist = array();
            $status = array(Open::raw(), Dispatched::raw(), ArrivedShipper::raw(), Loaded::raw(), OnRoute::raw(), ArrivedConsignee::raw(),Delivered::raw(), 
                BreakDown::raw(), Paid::raw(), Invoiced::raw());
            $j = 0;
            $total_load_tarp = 0;
            $total_other_chgs = 0;
            $total_empty_miles = 0;
            $total_loaded_miles = 0;
            $total_driver_miles = 0;
            $total_net_pay = 0;
            $total_gross_pay = 0;
            $driver_load = 0;
            for ($x = 0;  $x < sizeof($status); $x++) 
            {
                $collection = $status[$x];
                dd($collection);
                $status_load = $db->$collection->aggregate([
                        ['$match'=>['companyID'=> (int)$_SESSION['companyId']]],
                        ['$unwind'=>'$load'],
                        $filterbydate
                        ]);
                        
                        foreach ($status_load as $dps) {
                            $k = 0;
                            $load[$k] = $dps['load'];
                            $k++;
                            $company_load = array();
                            
                            foreach ($load as $dps1) {
                               

                                
                                if (array_key_exists('paiddate', $dps1)) {
                                    if (empty($dps1['paiddate'])) { 
                                           $driver_load++; 
                                           $invoice = $dps1['_id'];
                                           $company = $dps1['company'];
                                           $invoicelist[] = $dps1['_id'];
                                           $pick_date = $dps1['shipper_pickup'];
                                           $load_tarp = $dps1['tarp'] != "" ?  (float)$dps1['tarp'] : 0;
                                           $total_load_tarp += $dps1['tarp'] != "" ?  number_format($dps1['tarp'],2) : 0;
                                           $empty_miles =  (float)$dps1['empty_miles_value'];
                                           $driver_miles = (float)$dps1['driver_miles_value'];
                                           $loaded_miles = (float)$dps1['loaded_miles_value'];
                                           $total_driver_miles += $driver_miles;
                                           $total_empty_miles += $empty_miles;
                                           $total_loaded_miles += $loaded_miles;
                                           if(array_key_exists($dps1["truck"], $truckType)){
                                              $drivertruck = $truckType[$dps1['truck']];
                                            }
                                            else{
                                                $drivertruck = "";
                                            }
                                            if(array_key_exists($dps1["trailer"], $trailerType)){
                                                $drivertrailer = $trailerType[$dps1["trailer"]];
                                            }
                                            else{
                                                $drivertrailer = "";
                                            }
                                           
                                           $shipper = $dps1['shipper'];
                                           $consignee = $dps1['consignee'];
                                           $drivernmae = $isownoptr == "YES"? $dps1['owner_name'] != "" ? $dps1['owner_name'] : ""  : $dps1['driver_name'] != "" ? $dps1['driver_name'] : "";
                                           $other_chgs = $isownoptr == "YES"? $dps1['owner_other'] != "" ? (float)$dps1['owner_other'] : 0  : $dps1['driver_other'] != "" ? (float)$dps1['driver_other'] : 0;
                                           $total_other_chgs += $isownoptr == "YES"? (int)$dps1['owner_other'] != "" ? (int)$dps1['owner_other'] : 0  : (int)$dps1['driver_other'] != "" ? (int)$dps1['driver_other'] : 0;

                                           $net_pay = $isownoptr == "YES"? (float)$dps1['owner_total'] : (float)$dps1['driver_total'];

                                           $total_net_pay += $net_pay;
                                           $gross_pay =  $net_pay - $load_tarp - $other_chgs;
                                           $total_gross_pay +=  $net_pay - $load_tarp - $other_chgs;

                                           $shipper_location = "";
                                           $consignee_location = "";
                                            foreach ($shipper as $shipper_dps) {
                                                $shipper_location .= $shipper_dps['shipper_location']."/ ";
                                            }
                                            foreach ($consignee as $consignee_dps) {
                                                $consignee_location .= $consignee_dps['consignee_location']."/ ";
                                            }

                                            $individualobj[$j] = array("invoice" => $invoice,"pick_date" =>$pick_date, "load_tarp" => number_format($load_tarp,2), "empty_miles" => $empty_miles, "loaded_miles" => $loaded_miles, "driver_miles" => $driver_miles , "truck" => $drivertruck, "trailer" => $drivertrailer, "other_charges" => number_format($other_chgs,2), "gross_pay" => number_format($gross_pay,2), "net_pay" => number_format($net_pay,2), "shipper" => $shipper_location, "consignee" => $consignee_location,"name" => $drivername,'companydata' => $company,'companydataid' => $compID);
                                            $j++;

                                       }
                                }else {

                                       $driver_load++; 
                                       $invoice = $dps1['_id'];
                                       $company = $dps1['company'];
                                       $invoicelist[] = $dps1['_id'];
                                       $pick_date = $dps1['shipper_pickup'];
                                       $load_tarp = $dps1['tarp'] != "" ?  (float)$dps1['tarp'] : 0;
                                       $total_load_tarp += $dps1['tarp'] != "" ?  number_format($dps1['tarp'],2) : 0;
                                       $empty_miles =  (float)$dps1['empty_miles_value'];
                                       $driver_miles = (float)$dps1['driver_miles_value'];
                                       $loaded_miles = (float)$dps1['loaded_miles_value'];
                                       $total_driver_miles += $driver_miles;
                                       $total_empty_miles += $empty_miles;
                                       $total_loaded_miles += $loaded_miles;
                                       //
                                       if(array_key_exists($dps1["truck"], $truckType)){
                                          $drivertruck = $truckType[$dps1['truck']];
                                        }
                                        else{
                                            if(array_key_exists($dps1["owner_truck"], $truckType)){
                                              $drivertruck = $truckType[$dps1['owner_truck']];
                                            }
                                            else{
                                                $drivertruck = "";
                                            }
                                        }
                                        

                                        if(array_key_exists($dps1["trailer"], $trailerType)){
                                            $drivertrailer = $trailerType[$dps1["trailer"]];
                                        }
                                        else{
                                            if(array_key_exists($dps1["owner_trailer"], $trailerType)){
                                                $drivertrailer = $trailerType[$dps1["owner_trailer"]];
                                            }
                                            else{
                                                $drivertrailer = "";
                                            }
                                        }
                                       
                                       $shipper = $dps1['shipper'];
                                       $consignee = $dps1['consignee'];
                                       $drivernmae = $isownoptr == "YES"? $dps1['owner_name'] != "" ? $dps1['owner_name'] : ""  : $dps1['driver_name'] != "" ? $dps1['driver_name'] : "";
                                       $other_chgs = $isownoptr == "YES"? $dps1['owner_other'] != "" ? (float)$dps1['owner_other'] : 0  : $dps1['driver_other'] != "" ? (float)$dps1['driver_other'] : 0;
                                       $total_other_chgs += $isownoptr == "YES"? (int)$dps1['owner_other'] != "" ? (int)$dps1['owner_other'] : 0  : (int)$dps1['driver_other'] != "" ? (int)$dps1['driver_other'] : 0;

                                       $net_pay = $isownoptr == "YES"? (float)$dps1['owner_total'] : (float)$dps1['driver_total'];

                                       $total_net_pay += $net_pay;
                                       $gross_pay =  $net_pay - $load_tarp - $other_chgs;
                                       $total_gross_pay +=  $net_pay - $load_tarp - $other_chgs;

                                       $shipper_location = "";
                                       $consignee_location = "";
                                        foreach ($shipper as $shipper_dps) {
                                            $shipper_location .= $shipper_dps['shipper_location']."/ ";
                                        }
                                        foreach ($consignee as $consignee_dps) {
                                            $consignee_location .= $consignee_dps['consignee_location']."/ ";
                                        }

                                        $individualobj[$j] = array("invoice" => $invoice,"pick_date" =>$pick_date, "load_tarp" => number_format($load_tarp,2), "empty_miles" => $empty_miles, "loaded_miles" => $loaded_miles, "driver_miles" => $driver_miles , "truck" => $drivertruck, "trailer" => $drivertrailer, "other_charges" => number_format($other_chgs,2), "gross_pay" => number_format($gross_pay,2), "net_pay" => number_format($net_pay,2), "shipper" => $shipper_location, "consignee" => $consignee_location,"name" => $drivername,'companydata' => $company,'companydataid' => $compID);
                                        $j++;

                                }
                            }

                        }        
            }




        //-------------------------------------------Sort By Date------------------------------------------    
        if (!function_exists('pickdate_compare')) {
            function pickdate_compare($element1, $element2) { 
                $datetime1 = $element1['pick_date']; 
                $datetime2 = $element2['pick_date']; 
                return $datetime1 - $datetime2; 
            } 
            usort($individualobj, 'pickdate_compare');
        }    
            $totalpayobj[] = array("total_tarp" => number_format($total_load_tarp,2), "total_other_chgs" => number_format($total_other_chgs,2),"total_empty_miles" => number_format($total_empty_miles,2), "total_loaded_miles" => number_format($total_loaded_miles,2),"total_driver_miles" => number_format($total_driver_miles,2),"total_net_pay" => number_format($total_net_pay,2),"total_gross_pay" => number_format($total_gross_pay,2),"updrivername" => $load_owner_id);

        $collection = "advancepayment";
        $individualadvance = array();
        $u = 0;
        $Amount_advancepay_less = 0;
        $Amount_advancepay_gretter = 0;



        //-------------------------------------------Get Advance Payment Details----------------------------------
        for ($s = 0; $s < sizeof($invoicelist); $s++) {
        $advance_payment_driverpay = $db->$collection->aggregate([
                    ['$match'=>['companyID'=> (int)$_SESSION['companyId']]],
                    ['$unwind'=>'$'.'advancepayment'],
                    ['$match'=>['advancepayment'.'.InvoiceNo'=>"$invoicelist[$s]"]]
                    ]);
                    
            $advancepayment = array();
        
            foreach ($advance_payment_driverpay as $row1) {
                $l = 0;
                $advancepayment[$l] = $row1['advancepayment'];
                $l++;
                foreach ($advancepayment as $rowdp) {
                    $amount_dp = $rowdp['amount'];
                }
                
                foreach ($amount_dp as $row2) {
                    $advance_obj[] = $row2;
                    if (!array_key_exists('TotalAmount',$row2)) {
                        if ((int)$row2['Amount'] < 0) {
                            $Amount_advancepay_gretter += abs($row2['Amount']);
                            $Amount_advancepay = abs($row2['Amount']);
                            $Amount_adv = $row2['Amount'];
                        }else {
                            $Amount_advancepay_less +=  (float)$row2['Amount'];
                            $Amount_advancepay = "$(".number_format(abs($row2['Amount']),2).")";
                            $Amount_adv = $row2['Amount'];
                        }
                    }else{
                        if ((int)$row2['TotalAmount'] < 0) {
                            $Amount_advancepay_gretter += abs($row2['TotalAmount']);
                            $Amount_advancepay = abs($row2['TotalAmount']);
                            $Amount_adv = $row2['TotalAmount'];
                        }else {
                            $Amount_advancepay_less +=  (float)$row2['TotalAmount'];
                            $Amount_advancepay = "$(".number_format(abs($row2['TotalAmount']),2).")";
                            $Amount_adv = $row2['TotalAmount'];
                        }
                    }
                    
                        $Description = $row2['Description'];
                        $individualadvance[$u] = array("description" => $Description, "amount" => $Amount_advancepay,"ogvamount" => $Amount_adv);
                        $u++;
                }
            }
        }

            $driver_advance = (float)$Amount_advancepay_less - (float)$Amount_advancepay_gretter;

            $driverrecurrence = $totalamountadd - $totalamountsub;

            $alldrpay = $total_net_pay - $driver_advance; //+ $driverrecurrence;

            $total_advance = $total_net_pay - $Amount_advancepay_less;
            $totalamount_advance = $total_advance + $Amount_advancepay_gretter;
            $alloorecurrencesub = $oorecurrencesub;
            $alldriverobj[] = array("drivername" => $drivername,"driverload" => $driver_load,"driveradvance" => $driver_advance,"recurrenceadd" => $driverrecurrenceadd, "recurrencesub" => $driverrecurrencesub,"ownerrecurr" => array_shift($alloorecurrencesub),"totalearning" => $alldrpay,"netern" => $total_net_pay,"driverIdEmail" => $driverEmail_cr,"drrecurr_id" => $drrecurr_id,"driverBalance" => $driver_balance);

            $statementobj[$i] = array("statement" => $individualobj,"totalstatement" => $totalpayobj,"advance" => $individualadvance,"finaltotal" => $totalamount_advance,"alldrivertable" => $alldriverobj,"recurrenceadd" => $driverrecurrenceadd, "recurrencesub" => $driverrecurrencesub,"ownerrecurr" => array_shift($oorecurrencesub),"fromtodate" => $print_date_load,"showdriver" => $drivername,"driverBalance" => $driver_balance,"drrecurr_id" => $drrecurr_id);
            
        }

        echo json_encode($statementobj);
        
    }

}