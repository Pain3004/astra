<?php
namespace App\Helpers;
use Auth;
use App\Models\FuelCard;
use App\Models\IftaCardCategory;
use App\Models\FuelVendor;
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
                $id = $arr['_id'];
            }
        }
        $id += 1;
       $collection->updateOne(['companyID' => (int)$key,'_id'=>(int)$docId],
        ['$inc' => ['counter' => 1]]);
        return $id;
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