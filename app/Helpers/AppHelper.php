<?php
namespace App\Helpers;
use Auth;
use App\Models\FuelCard;
use App\Models\IftaCardCategory;
use App\Models\FuelVendor;
use App\Models\Owner_operator_driver;
use App\Models\Driver;
class AppHelper
{
    public function getMasterDocumentSequence($key,$collection,$val)
    {
        $cursor = $collection->aggregate([
            ['$match' => ['companyID' => (int)$key]],
            ['$sort' => ['_id' => -1]],
            ['$limit'=>1],
            ['$unwind' => '$'.$val],
            ['$sort' => [$val.'._id'=> -1]],
            ['$limit'=>1],
            ['$project' => [$val.'._id'=>1]],
        ]); 

        $lastID = 0;    
        foreach($cursor as $c1)
        {
            $xs = 0;
            $crr[$xs] = $c1[$val];
            $xs++;
            foreach($crr as $l1)
            {
                $lastID = $l1['_id'];
            }
        }

        $lastID += 1;
        $collection->updateOne(['companyID' => (int)$key],
                            ['$inc' => ['counter' => 1]]);
        return $lastID;
    }

    public function getNextSequence($name,$collection) 
    {
        $cursor = $collection->counter->find(['_id'=>$name]);
        $arr = iterator_to_array($cursor);
        $id = 0;
        foreach ($arr as $value) 
        {
            $id = $value['seq'];
        }
        $id += 1;

        $collection->counter->findOneAndUpdate(['_id'=>$name],['$set'=>['seq'=>$id]]);
        return $id;
    }
    // particular object counter Increment
    function getDocumentSequenceId($type,$collection1,$arrayName,$companyid) 
    {
        $cursor = $collection1->find(['companyID' => $companyid],[
        $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
        ]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value)
        {
            $counterID = $value[$arrayName];
            foreach ($counterID as $row)
            {
                if((int)$type == $row['_id'])
                {
                    $id = $row['counter'];
                }
            }
        }
        $id += 1;
        $collection1->updateOne(['companyID'=>$companyid,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
        return $id;
    }

      // particular object counter Decrement
    function getDocumentDecrementId($type,$collection2,$arrayName,$companyid) 
    {
        $cursor = $collection2->find(['companyID' => $companyid],[
        $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
        ]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value)
        {
            $counterID = $value[$arrayName];
            foreach ($counterID as $row) 
            {
                if((int)$type == $row['_id'])
                {
                    $id = $row['counter'];
                }
            }
        }
        $id -= 1;
        $collection2->updateOne(['companyID'=>1,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
        return $id;
    }
    function fuelCardArray($cardid) 
    {
        $carddata = IftaCardCategory::raw()->aggregate([
            ['$match' => ['companyID' =>(int)Auth::user()->companyID]],
            ['$unwind' => '$fuelCard'],
            ['$match' => ['fuelCard._id' => (int)$cardid]],
            ['$project' => ['fuelCard._id' => 1, 'fuelCard.fuelCardType' => 1]]
        ]);
        $cardarray = array();
        $cardname = array();
        foreach ($carddata as $c) 
        {
            $h = 0;
            $cardarray[$h] = $c['fuelCard'];
            $h++;
            foreach ($cardarray as $cr) 
            {
                $cid = $cr['_id'];
                $cardname[$cid] = $cr['fuelCardType'];
            }
        }
        return $cardname;
    }

    function driverArray($driverid)
    {
        $driverdata = Driver::raw()->aggregate([
            ['$match' => ['companyID' => (int)Auth::user()->companyID]],
            ['$unwind' => '$driver'],
            ['$match' => ['driver._id' => (int)$driverid]],
            ['$project' => ['driver._id' => 1, 'driver.driverName' => 1]]
        ]);
        $driverarray = array();
        foreach ($driverdata as $c) 
        {
            $h = 0;
            $driverarray[$h] = $c['driver'];
            $h++;
            foreach ($driverarray as $cr) 
            {
                $driverid = $cr['_id'];
                $drivername[$driverid] = $cr['driverName'];
            }
        }
        return $drivername;
    }
    public function paginate($docarray)
    {
        $docarray = array_reverse($docarray);
        $value = 100;
        $doc = array();
        $arrSize = sizeof($docarray);
        for($c = 0; $c < $arrSize; $c++) 
        {
            $j = 0;
            $index = array();
            $pages = $docarray[$c]['size'] / $value;
            for($i = 0; $i < $pages; $i++)
            {
                $innerarray = array();
                $innerindex = 0;
                $start = $docarray[$c]['size'] - ($i * $value);
                $end =   $start - $value;
                $innerarray[$innerindex] = array("doc" => $docarray[$c]['id'], "start" => $start, "end" => $end < 0 ? 0 : $end);
                if($start < 100)
                {
                    if($c < sizeof($docarray) - 1)
                    {
                        $diff = $value - $start;
                        $newsize = $docarray[$c+1]['size'] - $diff;
                        $temp = $newsize;
                        if($newsize  < 0)
                        {
                            $newsize = $docarray[$c+1]['size'];   
                        }
                                
                        $innerarray[$innerindex+1] = array("doc" => $docarray[$c+1]['id'], "start" => $docarray[$c+1]['size'], "end" => $newsize);
                        if($temp < 0)
                        {
                            $docarray[$c+1]['size'] = 0;
                        }
                        else
                        {
                            $docarray[$c+1]['size'] = $newsize;
                        }
                    }
                }
                $index[$j] = $innerarray;
                $j++;       
            } 
            $doc[0][] = $index;
                
        }  
        return $doc;
    }
    public function checkDoc($collection,$companyId,$maxLength)
    {
        $show = $collection->count(['companyID' => (int)$companyId]);
        if($show != 0){
                $show = $collection->aggregate([
                    ['$match' => ['companyID' => (int)$companyId]],
                    ['$sort' => ['_id' => -1]],
                    ['$limit' => 1]
                ]);
                foreach ($show as $s1){
                    $doc_id = $s1['_id'];
                    $ncounter = $s1['counter'];
                }  
                if($ncounter >= $maxLength){
                    $document = "No";
                }else{
                    $document = $ncounter ."^". $doc_id;
                } 
        }else{
            $document = "No";
        }
        return $document;
    }
    function getAdminDocumentSequence($key,$collection,$val, $docId) 
    {
        $cursor = $collection->find(['companyID'=>(int)$key, '_id' => (int)$docId]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value)
        {
            $counter = $value['counter'];
            foreach ($value[$val] as $arr) 
            {
                if(isset($arr['_id']))
                {
                    $id = $arr['_id'];
                }
            }
        }
        $id += 1;
       $collection->updateOne(['companyID' => (int)$key,'_id'=>(int)$docId],
        ['$inc' => ['counter' => 1]]);
        return $id;
    }
    public function oodriverinstallment($isownoptr,$daterangefrom,$daterangeto,$drrecurrid) 
    {
        if ($isownoptr == "YES") 
        {
            $daterangeto1 = (int)$daterangeto;
            $daterangefrom1 = (int)$daterangefrom;

            $collection_oo = Owner_operator_driver::raw();
            $ownerdrivername = $collection_oo->aggregate([
                        ['$match'=>['companyID'=> (int)Auth::user()->companyID]],
                        ['$unwind'=> '$ownerOperator'],
                        ['$match' => ['ownerOperator.driverId' => ['$in' => [$drrecurrid]]]]
                        ]);
             
            $oorecurrencesubList = array();
            foreach ($ownerdrivername as $ooval)
            {
                $o = 0;
                $ooarr[$o] = $ooval['ownerOperator'];
                $o++;
                foreach ($ooarr as $ownerval) 
                {
                    $ooid = $ownerval['_id'];
                    $oodriverId = $ownerval['driverId'];
                    $oopercentage = $ownerval['percentage'];
                    $ootruckNo = $ownerval['truckNo'];
                    $ooinstallment = $ownerval['installment'];
                    foreach ($ooinstallment as $ooins) 
                    {

                        if ($ooins['installmentCategory'] != "") 
                        {
                            $ins_id = $ooins['_id'];
                            $ins_installmentCategory = $ooins['installmentCategory'];
                            $ins_installmentType = $ooins['installmentType'];
                            $ins_amount = $ooins['amount'];
                            $ins_installment = $ooins['installment'];
                            $ins_startNo = $ooins['startNo'];
                            $ins_startDate = $ooins['startDate'];
                            $ins_internalNote = $ooins['internalNote'];
                            $ooskipped = array();
                            if(array_key_exists("skiprecurrence", $ooins))
                            {
                                $ooskipped = $ooins['skiprecurrence'];
                            }

                            $insrecurrence_addsub = "sub";
                            $id=$ins_id;
                            $category=$ins_installmentCategory;
                            $type=$ins_installmentType;
                            $amount=$ins_amount;
                            $total_install=$ins_installment;
                            $start_install=$ins_startNo;
                            $startdate=$ins_startDate;
                            $internalnote=$ins_internalNote;
                            $recurrtype=$insrecurrence_addsub;
                            $to=$daterangeto1;
                            $from=$daterangefrom1;
                            $skipped=$ooskipped;

                            $seconds = 604800;
                            if($type == "Monthly")
                            {
                                $seconds = 2592000;
                            }
                            if($type == "Quarterly")
                            {
                                $seconds = 7776000;
                            }
                            if($type == "yearly")
                            {
                                $seconds = 31536000;
                            }
                            $skipped_installment = sizeof($skipped);
                            $skip_arr = array();
                            for($i = 0; $i < $skipped_installment; $i++)
                            {
                                $skip_arr[$skipped[$i]['recurrenceno']] = $skipped[$i]['recurrencedate'];
                            }
                            $enddate =  $startdate + ($total_install * $seconds) + ($skipped_installment * $seconds);
                            $recurrence = array();
                            $totalamount = 0;
                            if($from < $enddate)
                            {
                                $dateDiff = $from - $startdate;
                                $weeks = ceil($dateDiff / $seconds) - $skipped_installment;
                                $no = $start_install;
                                $no += $weeks;
                                for($i = $start_install,$j = 0; $i < $total_install + $skipped_installment; $i++,$j++)
                                {
                                    if($i == 0)
                                    {
                                        $start = $startdate;
                                    }
                                    else
                                    {
                                        $start = $startdate + ($j * $seconds);
                                    }
                                    $recurrencetotalam = 0;
                                    if($start <= $to && $start >= $from)
                                    {
                                        if(array_key_exists($i, $skip_arr)){
                                            $recurrence[] = array("id"=>$id,"no" => $no, "amount" => (float)$amount,"date" => date('m/d/Y', $start),"category"=>$category, "type" => $type, "note" => $internalnote,"recurrtype" => $recurrtype, "skipped" => "yes");
                                            $no++;
                                        }
                                        else
                                        {
                                            $recurrencetotalam += $amount;
                                            $recurrence[] = array("id"=>$id,"no" => $no, "amount" => (float)$amount,"date" => date('m/d/Y', $start),"category"=>$category, "type" => $type, "note" => $internalnote,"recurrtype" => $recurrtype, "skipped" => "no");
                                            $no++;
                                        }
                                    }
                                }
                            }
                            $oorecurrencesubList[] = $recurrence;

                        }  

                    }
                }
            }
            return $oorecurrencesubList;
        }

    }
    public function driverinstallment($id, $category, $type, $amount, $total_install, $start_install, $startdate, $internalnote, $recurrtype, $to, $from, $skipped)
    {
        $seconds = 604800;
        if($type == "Monthly")
        {
            $seconds = 2592000;
        }
        if($type == "Quarterly")
        {
            $seconds = 7776000;
        }
        if($type == "yearly")
        {
            $seconds = 31536000;
        }
        $skipped_installment = sizeof($skipped);
        $skip_arr = array();
        for($i = 0; $i < $skipped_installment; $i++)
        {
            $skip_arr[$skipped[$i]['recurrenceno']] = $skipped[$i]['recurrencedate'];
        }
        $enddate =  intval($startdate) + (intval($total_install) * intval($seconds)) + (intval($skipped_installment) * intval($seconds));
        $recurrence = array();
        $totalamount = 0;
        if($from < $enddate)
        {
            $dateDiff = $from - $startdate;
            $weeks = ceil($dateDiff / $seconds) - $skipped_installment;
            $no = $start_install;
            $no += $weeks;
            for($i = $start_install,$j = 0; $i < $total_install + $skipped_installment; $i++,$j++)
            {
                if($i == 0)
                {
                    $start = $startdate;
                }
                else
                {
                    $start = $startdate + ($j * $seconds);
                }
                $recurrencetotalam = 0;
                if($start <= $to && $start >= $from)
                {
                    if(array_key_exists($i, $skip_arr))
                    {
                        $recurrence[] = array("id"=>$id,"no" => $no, "amount" => (float)$amount,"date" => date('m/d/Y', $start),"category"=>$category, "type" => $type, "note" => $internalnote,"recurrtype" => $recurrtype, "skipped" => "yes");
                        $no++;
                    }
                    else
                    {
                        $recurrencetotalam += $amount;
                        $recurrence[] = array("id"=>$id,"no" => $no, "amount" => (float)$amount,"date" => date('m/d/Y', $start),"category"=>$category, "type" => $type, "note" => $internalnote,"recurrtype" => $recurrtype, "skipped" => "no");
                        $no++;
                    }
                }
            }
        }

        return $recurrence;
        
    }
    public function getIntId($name,$collection) 
    {
        $id=(int)1;
        return $id;
    }
    public function showQueries()
    {
        dd(\DB::getQueryLog());
    }

    public static function instance()
    {
        return new AppHelper();
    }
}